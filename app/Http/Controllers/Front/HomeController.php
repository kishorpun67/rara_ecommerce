<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Testimonial;
use GuzzleHttp\Handler\Proxy;

class HomeController extends Controller
{
    public function home()
    {
        $banners = Banner::all();
        $latestProduct = Product::latest()->limit(8)->get();
        $featuredItems = Product::where(['is_featured' => 'Yes', 'status' => 1])->get();
        $ourProducts = Product::inRandomOrder()->get();
        $topProducts = Product::inRandomOrder()->get();
        $flashSale = Product::latest()->limit(4)->get();
        $testimonial = Testimonial::get();
        $meta_title = "Ecommerce - E-com  Website";
        $meta_keywords="View ecommerce of E-com Website";
        $meta_description ="ecommerce, e-com webiste";
        return view('front.home', compact('banners', 'featuredItems', 'latestProduct', 'ourProducts', 'ourProducts', 'topProducts', 'flashSale','testimonial'
        ,'meta_title','meta_keywords', 'meta_description'));
    }

    public function contact()
    {
        $meta_title = "Contact - E-com  Website";
        $meta_keywords="View contact of E-com Website";
        $meta_description ="contact, e-com webiste";
        return view('front.contact', compact('meta_title','meta_keywords', 'meta_description'));
    }

    public function about()
    {
        $meta_title = "About - E-com  Website";
        $meta_keywords="View about of E-com Website";
        $meta_description ="about, e-com webiste";
        return view('front.about', compact('meta_title','meta_keywords', 'meta_description'));
    }
}
