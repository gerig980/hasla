<div class="accordion accordion-icon-none" id="accordionWithouticon">
<h2 class="accordion-header " id="accordionwithiconExample{{ $category->id }}">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_iconExamplecollapse{{ $category->id }}" aria-expanded="false" aria-controls="accor_iconExamplecollapse1" style="background-color: #ffffff;">
        <i class="mdi mdi-folder fs-16 align-middle text-warning me-2"></i> @if($category->isChild()) - @endif{{ $category->name }}
    </button>
</h2>
<div id="accor_iconExamplecollapse{{ $category->id }}" class="accordion-collapse collapse" aria-labelledby="accordionwithiconExample{{ $category->id }}" data-bs-parent="#accordionWithicon"> 
    @include('backend.product.categories.components.categories', ['categories'=>$category->children])
</div>
</div>

