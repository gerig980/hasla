<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'parent_id', 'name', 'slug', 'banner', 'icon', 'url', 'attributes', 'filter_attributes','meta_title', 'meta_description', 'meta_keywords'];
    protected $guarded = ['id'];
    
    #return categories
    public static function tree()
    {
        $allCategories = Category::get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id)->values();

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }
    }

    public static function getCategoryBy($slug) //get category by categoryParent slug
    {
        $allCategories = Category::get();

        $rootCategories = $allCategories->whereNull('parent_id')->where('slug',$slug);

        Category::formatTree($rootCategories, $allCategories);
    
        return $rootCategories;
    }

    public static function categoryParentIds($slug)
    {
        $allCategories = Category::getCategoryBy($slug); //parent category
        $parentCategory_ids=[];
        foreach($allCategories as $key => $cat){
            $parentCategory_ids[] =$cat->id;
            foreach($cat->children as $key2 => $fChild){
                $parentCategory_ids[] =$fChild->id;
                foreach($fChild->children as $key3 => $sChild ){
                    $parentCategory_ids[] =$sChild->id;
                }
            }
        }

        return $parentCategory_ids;
    }
    
    public function isChild(): bool
    {
        return $this->parent_id !== null;
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function filterAttributes()
    {
        return $this->belongsToMany(FilterAttribute::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public static function catDetails($slug)
    {
       
        if(!empty($catDetails = Category::select('id', 'parent_id', 'name', 'slug', 'description')->with(['subcategories' => function($query){
             $query->select('id', 'parent_id', 'name', 'slug', 'description')->where('status', 1);
        }])->where('slug', $slug)->first()->toArray()));
       
    
        if($catDetails['parent_id'] == 0){
            $breadcrumbs = '<a href="'.url('category/'.$catDetails['slug']).'">'.$catDetails['name'].'</a>';
        }else
        {
            $parentCategory = Category::select('name', 'slug')->where('id', $catDetails['parent_id'])->first()->toArray();
            $breadcrumbs = '<a href="'.url('category/'.$parentCategory['slug']).'">'.$parentCategory['name'].'</a>&nbsp;<span>/</span>&nbsp;<a href="'.url('category/'.$catDetails['slug']).'">'.$catDetails['name'].'</a>';
        }
       
       
        $catIds = array();
        $catIds[] = $catDetails['id'];
        foreach($catDetails['subcategories'] as $key => $subcat)
        {
            $catIds[] = $subcat['id'];
           
        }
        //dd($catIds); die;
        return array('catIds'=>$catIds, 'catDetails'=>$catDetails, 'breadcrumbs'=>$breadcrumbs);
    }

}