@foreach ($categories as $category)
    <div class="ms-2 {{ $category->isChild() ? 'ms-4' : null }}">
        @include('backend.product.categories.components.category', ['category' => $category])
    </div>
@endforeach
