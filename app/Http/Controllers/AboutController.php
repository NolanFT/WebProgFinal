<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Guest + user home.
     */
    public function about(Request $request)
    {
        return view('about');
    }

}