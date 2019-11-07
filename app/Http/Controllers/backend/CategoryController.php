<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function getCategory() {
        return view('backend.category.category');
    }

    function getEditCategory() {
        return view('backend.category.editcategory');
    }
}
