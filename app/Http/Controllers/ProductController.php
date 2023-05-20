<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\productImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productForm(){
        $data = [];
        $data ['category'] = ProductCategory::all();
        return view('dashboard.products.product-form',$data);
    }

    public function storeProduct(Request $request){

        $request->validate([
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'description'=>'required',
            'images'=>'required',
            'images.*' => 'mimes:jpeg,jpg,png',
            'category'=>'required',
            'thumbnail'=>'required',
        ]);

        if ($request->hasFile('thumbnail')) {  


            $file = $request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/productImages', $fileName);

            $category_id = null;

            if (isset($request->new_category)) {

                $request->validate([
                    'new_category'=>'required',
                    'new_category_desc'=>'required'
                ]);

                #check if the new_category field is set, if true, create a new category

                $category = ProductCategory::create([
                    'name'=>$request->new_category,
                    'desc'=>$request->new_category_desc

                ]);
                $category_id = $category->id;
                
            }else{  
                # if the new_category field is not set, get the category's id from the form
                $category_id = $request->category;
            }

            $data = Product::create([
                'name'=>$request->name,
                'desc'=>$request->description,
                'category_id'=>$category_id,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'author_id'=> auth()->user()->id,
                'thumbnail'=>$fileName,
            ]);

            $product_id = $data->id;
            
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {
                    $file = $image;
                    $fileName = time() . '.' . $file->clientExtension();
                    $file->storeAs( 'public/productImages', $fileName);

                    $image_data = productImage::create([
                        'image_name'=>$fileName,
                        'product_id'=>$product_id
                    ]);
                }
            }

            if ($image_data){
                return redirect()->route('product_form')->with('success', 'Created successfully!!');
            }
            else{
                return redirect()->route('product_form')->with('error', 'A problem accured!!');
            }
        }

    }


    public function productList(){
        $data = [];
        $data['product'] = Product::all();
        return view('dashboard.products.product-list',$data);
    }

    public function editProduct($id){
        $data = [];
        $data ['category'] = ProductCategory::all();
        $data['product'] = Product::find($id);
        return view('dashboard.products.product-form',$data);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'description'=>'required',
            'images.*' => 'mimes:jpeg,jpg,png',
            'category'=>'required',
        ]);
        
        $data = Product::find($request->id);

        if (isset($request->thumbnail) && $request->hasFile('thumbnail')) {  


            $file = $request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/productImages', $fileName);

            $data -> thumbnail= $fileName; 
        }
        $category_id = null;

        if (isset($request->new_category)) {

            $request->validate([
                'new_category'=>'required',
                'new_category_desc'=>'required'
            ]);

            #check if the new_category field is set, if true, create a new category

            $category = ProductCategory::create([
                'name'=>$request->new_category,
                'desc'=>$request->new_category_desc

            ]);
            $category_id = $category->id;
            
        }else{  
            # if the new_category field is not set, get the category's id from the form
            $category_id = $request->category;
        }

        $data->name = $request-> name;
        $data->desc = $request-> description;
        $data->category_id =$category_id;
        $data->quantity = $request-> quantity;
        $data->price = $request-> price;
        $data->author_id =  auth()->user()->id;

        $data -> save();

        $product_id = $data->id;
        
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $file = $image;
                $fileName = time() . '.' . $file->clientExtension();
                $file->storeAs( 'public/productImages', $fileName);

                $image_data = productImage::create([
                    'image_name'=>$fileName,
                    'product_id'=>$product_id
                ]);
            }
        }

        if ($data){
            return redirect()->route('product_list')->with('success', 'Created successfully!!');
        }
        else{
            return redirect()->back()->with('error', 'A problem accured!!');
        }
        
    }

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();

        $images = productImage::where('product_id','=',$id)->get();

        foreach ($images as $image) {
            $image->delete();
        }

        return redirect()->route('product_list')->with('success','Deleted successfully');
    }

    public function deleteProductImage($id){
        $data = productImage::find($id);
        $data->delete();
        return redirect()->back();
    }
}
