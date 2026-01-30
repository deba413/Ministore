<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
        public function index(Request $request){
        // Remove pagination, get all products
        $products = Product::all();
        $product_four = Product::paginate(4);

        if($request->ajax() && $request->action == "search-product"){
                $product_four = Product::where('sub_category_id', $request->sub_cat_id)->paginate(4);
            }
            
            $data['subcategories'] = SubCategory::all();
            $data['product_four'] = $product_four;
            $data['products'] = $products;
        
            if($request->ajax() && $request->action == "search-product"){
                return view('front_product')->with($data);
            }
            
        
        return view('index')->with($data);
    }


     public function shop(Request $request){
        $perpage = 9;
        $products = Product::paginate($perpage);

        if($request->ajax()){
            if($request->sub_cat_id){
                $where = [
                         ['sub_category_id',$request->sub_cat_id],
                    ];
         
            }
            if($request->cat_id){
                $where = [
                         ['category_id',$request->cat_id],
                    ];
 
            }

            if($request->range){
                $where = [
                         ['price', '<=', $request->range],
                    ];
            }
           $products = Product::where($where)->paginate($perpage);
            }
            
            $data['categories'] = Category::all();
            $data['subcategories'] = SubCategory::all();
            $data['products'] = $products;
            $data['perpage'] = $perpage;
        
            if($request->ajax()){
                return view('shop_product')->with($data);
            }
            
        
        return view('shop')->with($data);
    }
}