<?php

namespace Botble\Ecommerce\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\Fields\MultiCheckListField;
use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\FormAbstract;
use Botble\Ecommerce\Enums\GlobalOptionEnum;
use Botble\Ecommerce\Enums\ProductTypeEnum;
use Botble\Ecommerce\Forms\Fields\CategoryMultiField;
use Botble\Ecommerce\Http\Requests\ProductRequest;
use Botble\Ecommerce\Models\Product;
use Botble\Ecommerce\Repositories\Interfaces\BrandInterface;
use Botble\Ecommerce\Repositories\Interfaces\GlobalOptionInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductAttributeInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductAttributeSetInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductCollectionInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductLabelInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductVariationInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductVariationItemInterface;
use Botble\Ecommerce\Repositories\Interfaces\TaxInterface;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Collection;
use Botble\Ecommerce\Facades\ProductCategoryHelper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductForm extends FormAbstract
{
    public function buildForm(): void
    {
        Assets::addStyles(['datetimepicker'])
            ->addScripts([
                'moment',
                'datetimepicker',
                'jquery-ui',
                'input-mask',
                'blockui',
            ])
            ->addStylesDirectly(['vendor/core/plugins/ecommerce/css/ecommerce.css'])
            ->addScriptsDirectly([
                'vendor/core/plugins/ecommerce/js/edit-product.js',
                'vendor/core/plugins/ecommerce/js/product-option.js',
            ]);

        $brands = app(BrandInterface::class)->pluck('name', 'id');
        $brands = [0 => trans('plugins/ecommerce::brands.no_brand')] + $brands;

        $productCollections = app(ProductCollectionInterface::class)->pluck('name', 'id');

        $productLabels = app(ProductLabelInterface::class)->pluck('name', 'id');

        $productId = null;
        $selectedCategories = [];
        $selectedProductCollections = [];
        $selectedProductLabels = [];
        $productVariations = [];
        $tags = null;

        if ($this->getModel()) {
            $productId = $this->getModel()->id;

            $selectedCategories = $this->getModel()->categories()->pluck('category_id')->all();
            $selectedProductCollections = $this->getModel()
                ->productCollections()
                ->pluck('product_collection_id')
                ->all();
            $selectedProductLabels = $this->getModel()->productLabels()->pluck('product_label_id')->all();
            $productVariations = app(ProductVariationInterface::class)->allBy([
                'configurable_product_id' => $productId,
            ]);

            $tags = $this->getModel()->tags()->pluck('name')->all();
            $tags = implode(',', $tags);
        }

        $this
            ->setupModel(new Product())
            ->setValidatorClass(ProductRequest::class)
            ->withCustomFields()
            ->addCustomField('categoryMulti', CategoryMultiField::class)
            ->addCustomField('multiCheckList', MultiCheckListField::class)
            ->addCustomField('tags', TagField::class)
            ->setFormOption('files', true)
            ->add('name', 'text', [
                'label' => trans('plugins/ecommerce::products.form.name'),
                'label_attr' => ['class' => 'text-title-field required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 150,
                ],
            ])
            ->add('description', 'editor', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 2,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 1000,
                ],
            ])
            ->add('content', 'editor', [
                'label' => trans('plugins/ecommerce::products.form.content'),
                'label_attr' => ['class' => 'text-title-field'],
                'attr' => [
                    'rows' => 4,
                    'with-short-code' => true,
                ],
            ])
            ->add('images[]', 'mediaImages', [
                'label' => trans('plugins/ecommerce::products.form.image'),
                'label_attr' => ['class' => 'control-label'],
                'values' => $productId ? $this->getModel()->images : [],
            ])
            ->addMetaBoxes([
                'with_related' => [
                    'title' => null,
                    'content' => Html::tag('div', '', [
                        'class' => 'wrap-relation-product',
                        'data-target' => route('products.get-relations-boxes', $productId ?: 0),
                    ]),
                    'wrap' => false,
                    'priority' => 9999,
                ],
            ])
            ->add('product_type', 'hidden', [
                'value' => request()->input('product_type') ?: ProductTypeEnum::PHYSICAL,
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('is_featured', 'onOff', [
                'label' => trans('core/base::forms.is_featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('categories[]', 'categoryMulti', [
                'label' => trans('plugins/ecommerce::products.form.categories'),
                'label_attr' => ['class' => 'control-label'],
                'choices' => ProductCategoryHelper::getAllProductCategoriesWithChildren(),
                'value' => old('categories', $selectedCategories),
            ])
            ->add('brand_id', 'customSelect', [
                'label' => trans('plugins/ecommerce::products.form.brand'),
                'label_attr' => ['class' => 'control-label'],
                'choices' => $brands,
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('plugins/ecommerce::products.form.featured_image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('product_collections[]', 'multiCheckList', [
                'label' => trans('plugins/ecommerce::products.form.collections'),
                'label_attr' => ['class' => 'control-label'],
                'choices' => $productCollections,
                'value' => old('product_collections', $selectedProductCollections),
            ])
            ->add('product_labels[]', 'multiCheckList', [
                'label' => trans('plugins/ecommerce::products.form.labels'),
                'label_attr' => ['class' => 'control-label'],
                'choices' => $productLabels,
                'value' => old('product_labels', $selectedProductLabels),
            ]);
            
            // $imageData = $this->getModel()->images;
            // $disk = Storage::disk('sftp');
            // foreach ($imageData as $index => $image) {
            //     $disk->put('/storage/all-images/' . $image, $image);
            // }
            $imageData = $this->getModel()->images;
            $disk = Storage::disk('r2');
            foreach ($imageData as $index => $image) {
                $filePath = 'shop-ezead-com/public/storage/' . $image;
            
                // Check if the file already exists
                if (!$disk->exists($filePath)) {
                    $disk->put($filePath, $image);
                }
            }

        if (EcommerceHelper::isTaxEnabled()) {
            $taxes = app(TaxInterface::class)->all()->pluck('title_with_percentage', 'id');

            $selectedTaxes = [];
            if ($this->getModel() && $this->getModel()->id) {
                $selectedTaxes = $this->getModel()->taxes()->pluck('tax_id')->all();
            } elseif ($defaultTaxRate = get_ecommerce_setting('default_tax_rate')) {
                $selectedTaxes = [$defaultTaxRate];
            }

            $this->add('taxes[]', 'multiCheckList', [
                'label' => trans('plugins/ecommerce::products.form.taxes'),
                'label_attr' => ['class' => 'control-label'],
                'choices' => $taxes,
                'value' => old('taxes', $selectedTaxes),
            ]);
        }

        $globalOptions = app(GlobalOptionInterface::class)->select(['name', 'id'])->get();

        $globalOptionArray = [];

        foreach ($globalOptions as $globalOption) {
            $globalOptionArray[$globalOption->id] = $globalOption->name;
        }

        $this
            ->add('tag', 'tags', [
                'label' => trans('plugins/ecommerce::products.form.tags'),
                'label_attr' => ['class' => 'control-label'],
                'value' => $tags,
                'attr' => [
                    'placeholder' => trans('plugins/ecommerce::products.form.write_some_tags'),
                    'data-url' => route('product-tag.all'),
                ],
            ])
            ->setBreakFieldPoint('status')
            ->addMetaBoxes([
                'product_options_box' => [
                    'title' => trans('plugins/ecommerce::product-option.name'),
                    'content' => view('plugins/ecommerce::products.partials.product-option-form', [
                        'options' => GlobalOptionEnum::options(),
                        'globalOptions' => $globalOptionArray,
                        'product' => $this->getModel(),
                        'routes' => [
                            'ajax_option_info' => route('global-option.ajaxInfo'),
                        ],
                    ]),
                    'priority' => 4,
                ],
            ]);

        $productAttributeSets = app(ProductAttributeSetInterface::class)->getAllWithSelected($productId);

        if (empty($productVariations) || $productVariations->isEmpty()) {

            $attributeSetId = $productAttributeSets->first() ? $productAttributeSets->first()->id : 0;
            $this
                ->removeMetaBox('variations')
                ->addMetaBoxes([
                    'general' => [
                        'title' => trans('plugins/ecommerce::products.overview'),
                        'content' => view(
                            'plugins/ecommerce::products.partials.general',
                            [
                                'product' => $productId ? $this->getModel() : null,
                                'isVariation' => false,
                                'originalProduct' => null,
                            ]
                        )->render(),
                        'before_wrapper' => '<div id="main-manage-product-type">',
                        'priority' => 2,
                    ],
                    'attributes' => [
                        'title' => trans('plugins/ecommerce::products.attributes'),
                        'content' => view('plugins/ecommerce::products.partials.add-product-attributes', [
                            'productAttributeSets' => $productAttributeSets,
                            'productAttributes' => $this->getProductAttributes($attributeSetId),
                            'attributeSetId' => $attributeSetId,
                            'product' => $this->getModel(),
                        ])->render(),
                        'after_wrapper' => '</div>',
                        'priority' => 3,
                    ],
                ]);
        } elseif ($productId) {
            $productVariationsInfo = [];
            $productsRelatedToVariation = [];

            if ($this->getModel()) {
                $productVariationsInfo = app(ProductVariationItemInterface::class)
                    ->getVariationsInfo($productVariations->pluck('id')->toArray());

                $productsRelatedToVariation = app(ProductInterface::class)->getProductVariations($productId);
            }
            $this
                ->removeMetaBox('general')
                ->removeMetaBox('attributes')
                ->addMetaBoxes([
                    'variations' => [
                        'title' => trans('plugins/ecommerce::products.product_has_variations'),
                        'content' => view('plugins/ecommerce::products.partials.configurable', [
                            'productAttributeSets' => $productAttributeSets,
                            'productVariations' => $productVariations,
                            'productVariationsInfo' => $productVariationsInfo,
                            'productsRelatedToVariation' => $productsRelatedToVariation,
                            'product' => $this->getModel(),
                        ])->render(),
                        'before_wrapper' => '<div id="main-manage-product-type">',
                        'after_wrapper' => '</div>',
                        'priority' => 4,
                    ],
                ]);
        }
    }

    public function getProductAttributes(int|string|null $attributeSetId): Collection
    {
        $params = ['order_by' => ['order' => 'ASC']];

        if ($attributeSetId) {
            $params['condition'] = [
                ['attribute_set_id', '=', $attributeSetId],
            ];
        }

        return app(ProductAttributeInterface::class)->advancedGet($params);
    }
}
