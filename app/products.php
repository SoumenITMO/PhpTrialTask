<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    // Table
	protected $table = 'products';
	
	// Insert  product
	public function insertProduct($product_data)
	{
		return DB::table('products')->insert($product_data);
	}
	
	// Fetch all product
	public function getAllproducts()
	{
		return DB::table('products')->get();
	}
	
	// Fetch single product
	public function getProduct($pname)
	{
		return DB::table('products')->where(['name'=>$pname])->get();
	}
	
	// Delete a single product
	public function delProduct($product_id)
	{
		return DB::table('products')->where(['id'=>$product_id])->delete();
	}
	
	// Update a single product
	public function updateProduct($product_id, $product_data)
	{
		return DB::table('products')->where(['id'=>$product_id])->update($product_data);
	}
}
