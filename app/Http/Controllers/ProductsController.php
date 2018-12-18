<?php
namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Session;
use Validator;


class ProductsController extends Controller
{
	// Insert product
	public function insertProduct(Request $request)
	{
		$posts = new products;
		$product_data = array();
		Session::forget('token');
		
		$vaild = Validator::make($request->all(), [
            'product_name' => 'required|string',
			'product_price' => 'required|regex:/^\d*(\.\d{2,2})?$/' 
        ]);

		if ($vaild->fails()) 
		{
			echo json_encode(array("Message"=>"Input Value Error"));
			exit;
		}
		
		$product_name = $request->input('product_name');
		
		$client_price = $request->input('product_price');
		
		$product_data["name"] = $product_name;
		
		$product_data["price"] = $client_price;
		
		if($posts->insertProduct($product_data))
			echo json_encode(array("Message"=>"New Product Added"));
		
		else 
			echo json_encode(array("Message"=>"Something Went wrong"));
	}
	
	// Get all products
	public function getAllproduct()
	{
		$posts = new products;
		Session::forget('token');
		echo json_encode($posts->getAllproducts());
	}
	
	// Search product
	public function searchProduct(Request $request)
	{
		$vaild = Validator::make($request->all(), 
		[
            'product_name' => 'required|string' 
        ]);

		if ($vaild->fails()) 
		{
			echo json_encode(array("Message"=>"Input Value Error"));
			exit;
		}
		
		$product_name = $request->input('product_name');
		$posts = new products;
		Session::forget('token');
		echo json_encode($posts->getProduct($product_name));
	}
	
	// Update a product
	public function editProduct(Request $request)
	{
		$posts = new products;
		$product_data = array();
		
		Session::forget('token');
		
		
		$vaild = Validator::make($request->all(), 
		[
			'product_id' => 'required|integer',
            'product_name' => 'required|string',
			'product_price' => 'required|regex:/^\d*(\.\d{2,2})?$/' 
        ]);

		if ($vaild->fails()) 
		{
			echo json_encode(array("Message"=>"Input Value Error"));
			exit;
		}
		
		$product_id = $request->input('product_id');
		$product_name = $request->input('product_name');
		$client_price = $request->input('product_price');
		
		$product_data["name"] = $product_name;
		$product_data["price"] = $client_price;
		
		if($posts->updateProduct($product_id, $product_data) == 1)
			echo json_encode(array('Message'=>'Product updated'));
		else 
			echo json_encode(array('Message'=>'Something Wrong'));
	}
	
	// Delete a product
	public function deleteProduct($product_id)
	{
		$posts = new products;
		Session::forget('token');
		if($posts->delProduct($product_id) == 1)
			echo json_encode(array('Message'=>'Product Deleted'));
		else 
			echo json_encode(array('Message'=>'Something Wrong'));
	}
}
