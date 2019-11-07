<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function getProduct() {
        return view('backend.product.listproduct');
    }
    function getEditProduct() {
        return view('backend.product.editproduct');
    }
    function getAddProduct() {
        return view('backend.product.addproduct');
    }
}
