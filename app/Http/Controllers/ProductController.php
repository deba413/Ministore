<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
 public function index()
    {
    $products = Product::with(['category', 'subCategory'])->paginate(10);
    return view('admin-panel.products.list', compact('products'));
    }

    

public function create()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin-panel.products.create', compact('categories', 'sub_categories'));
    }

    

    public function store(Request $request)
    {
         $filename = null;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Generate unique filename
            $filename = time() . '_' . Str::random(10) . '.jpg';
            
            // Create directory if it doesn't exist
            $uploadPath = public_path('uploads/products');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            // Move uploaded file (simple method without image processing)
            $image->move($uploadPath, $filename);
            
            // Alternative: Use Laravel Storage
            // $filename = $request->file('image')->store('products', 'public');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Product image is required.');
        }
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->image = 'uploads/products/'. $filename;
        $product->save();
        return redirect()->route('products.list')->with('success', 'Product created successfully');

    
    }
}
