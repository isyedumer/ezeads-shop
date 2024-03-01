<?php

namespace Botble\Translation\Tables;

use Botble\Base\Supports\Language;
use Illuminate\Http\JsonResponse;
use Botble\Translation\Repositories\Interfaces\TranslationInterface;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Translation\Manager;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;

class ThemeTranslationTable extends TableAbstract
{
    protected $hasOperations = false;

    protected $view = 'core/table::simple-table';

    protected $hasCheckbox = false;

    protected string $locale;

    protected array $groups;

    public function __construct(
        DataTables $table,
        UrlGenerator $urlGenerator,
        TranslationInterface $repository,
        protected Manager $manager
    ) {
        $this->type = self::TABLE_TYPE_SIMPLE;

        parent::__construct($table, $urlGenerator);

        $this->repository = $repository;
        $this->locale = 'en';
        $this->groups = Language::getAvailableLocales();
    }

    public function ajax(): JsonResponse
    {
        $url = route('translations.theme-translations.post');

        $table = $this->table
            ->of($this->manager->getTranslationData($this->locale))
            ->editColumn('key', fn (array $item) => $this->htmlentities($item['key']))
            ->editColumn(
                $this->locale,
                fn (array $item) => Html::link('#edit', $this->htmlentities($item['value']), [
                    'class' => 'editable',
                    'data-locale' => $this->locale,
                    'data-name' => $item['key'],
                    'data-type' => 'textarea',
                    'data-pk' => $this->locale,
                    'data-title' => trans('plugins/translation::translation.edit_title'),
                    'data-url' => $url,
                ])
            );

        return $this->toJson($table);
    }

    public function columns(): array
    {
        return [
            'key' => [
                'class' => 'text-start',
            ],
            $this->locale => [
                'title' => Arr::get($this->groups, $this->locale . '.name', $this->locale),
                'class' => 'text-start',
            ],
        ];
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    protected function htmlentities(?string $value): ?string
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }

    public function htmlDrawCallback(): ?string
    {
        return $this->htmlInitComplete();
    }

    public function htmlInitComplete(): ?string
    {
        return 'function () {$(".editable").editable({mode: "inline"});}';
    }
}
