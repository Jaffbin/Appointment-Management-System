<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class ProductController extends Controller
{
    public function add(){
        $r=request();//get all data from html input
        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'price'=>$r->productPrice,
            'quantity'=>$r->productQuantity,
            'categoryID'=>'1',
            'image'=>' ',

        ]);
        return redirect()->route('showProduct');
    }
    public function show(){
        $viewProducts=Product::all();
        return view('showProduct')->with('products', $viewProducts);
    }
    public function searchProduct(){
        $r=request();
        $keyword=$r->keyword;
        $product=DB::table('products')->where('name','like','%'.$keyword.'%')->get();
        return view('showProduct')->with('products',$product);
       }
    public function edit($id){
        $products=Product::all()->where('id',$id);
        //select*fromproducts where id='$id'
        return view('editProduct')->with('products', $products);
    }
    public function update(){
        $r=request();
        $products=Product::find($r->id);
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');
            $image->move('image',$image->getClientOriginalName());
            $products->image=$image->getClientOriginalName();
        }

        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->price=$r->productPrice;
        $products->quantity=$r->productQuantity;
        $products->save();//update products set name='$productName',price='$productPrice'... where id='$id'
        return redirect()->route('showProduct');
        
    }
    public function delete($id){
        $product=Product::find($id);
        $product->delete();//delete from products where id='$id'
        return redirect()->route('showProduct');
    }
    public function detail($id){
        $products=Product::all()->where('id',$id);
        return view('productDetail')->with('products', $products);
    }
}