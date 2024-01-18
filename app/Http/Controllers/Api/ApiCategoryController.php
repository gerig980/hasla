<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AllCategoryCollection;

class ApiCategoryController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::tree();
        return new AllCategoryCollection($categories);
    }

    public function getSubCategory()
    {
        return new AllCategoryCollection(Category::where('parent_id', '!=', null)->limit(14)->get());
    }
    
    public function getProductsMainCat($slug)
    {
        $parentCateg_ids = Category::categoryParentIds($slug);
        
        return response()->json([
            "data" => $parentCateg_ids,
        ], 200);

    }
}