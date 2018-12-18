<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showProducts extends Controller
{
    // Show All Products
	public function index()
	{
		return view('products');
	}
}
