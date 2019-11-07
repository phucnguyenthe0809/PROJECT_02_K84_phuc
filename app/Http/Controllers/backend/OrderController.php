<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    function getOrder() {
        return view('backend.order.order');
    }

    function getDetail() {
        return view('backend.order.detailorder');
    }

    function getProcessed() {
        return view('backend.order.processed');
    }
}
