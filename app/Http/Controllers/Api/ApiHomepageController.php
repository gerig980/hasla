<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\CollectionResource;
use App\Http\Resources\FlashSaleResource;
use App\Http\Resources\SliderResource;
use App\Models\Collection;

class ApiHomepageController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status',1)->orderBy('order', 'asc')->get();
        return BannerResource::collection($banners);
    }

    public function sliders()
    {
        $sliders = Slider::where('status',1)->orderBy('order', 'asc')->get();
        return SliderResource::collection($sliders);
    }

    public function menuBanners() {
        $menubanners = Banner::where('status',1)->where('position', 'menu')->orderBy('order', 'desc')->get();
        return BannerResource::collection($menubanners);
    }

    public function getFlashSale() //this function will be used for products that comes from flash-sale, for now is only orderBy id asc, bcs of testing purpose
    {
        $time_now = Carbon::now()->toDateTimeString();
        $featured_products = FlashSale::with('flashSaleProducts')->where(function ($query) use ($time_now) {
            $query->where('status', 1)
                  ->where('featured', 1)
                  ->where('start_date', '<', $time_now)
                  ->where('end_date', '>', $time_now)
                  ->orderBy('created_at', 'desc');
            })->get();
        return FlashSaleResource::collection($featured_products);   
    }

    public function getCollection($slug)
    {
        $collection = Collection::where('slug', $slug)->where('status', 'published')->get();
        return CollectionResource::collection($collection);
    }

    public function getCollections()
    {
        $collections = Collection::where('status', 'published')->orderBy('id', 'desc')->get();
        return CollectionResource::collection($collections);
    }
}