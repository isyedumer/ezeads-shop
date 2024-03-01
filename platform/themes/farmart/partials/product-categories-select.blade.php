@foreach ($categories->sortBy('name') as $category)
    @if ($category->parent_id == 0)
        <option value="{{ $category->id }}">{!! BaseHelper::clean($indent) !!}{!! BaseHelper::clean($category->name) !!}</option>
        @if ($category->activeChildren->count())
            {!! Theme::partial('product-categories-select', [
                'categories' => $category->activeChildren,
                'indent' => $indent . '&nbsp;&nbsp;',
            ]) !!}
        @endif
    @endif
@endforeach
