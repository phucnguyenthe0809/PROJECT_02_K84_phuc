<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;

class HomeController extends Controller
{
    function getIndex() {
        $data['prd_hot']=Product::where('img','<>','no-img.jpg')->where('featured',1)->orderBy('updated_at','desc')->take(4)->get();
        $data['prd_new']=Product::where('img','<>','no-img.jpg')->orderBy('updated_at','desc')->take(4)->get();
        return view('frontend.index',$data);
    }

    function getContact() {
        return view('frontend.contact');
    }

    function getAbout() {
        return view('frontend.about');
    }
}
