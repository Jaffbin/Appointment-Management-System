<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Event;



class EventController extends Controller
{
    public function add(){
        $r=request();
        $addEvent=Event::create([
            'name'=>$r->eventName,
            'description'=>$r->eventDescription,
            'organization'=>$r->organization,
            'place'=>$r->eventPlace,
            'start'=>$r->eventStart,
            'end'=>$r->eventEnd,
            'time'=>$r->eventTime,
            'seat'=>$r->seat,
            'image'=>'poster.jpg',

        ]);
        return redirect()->route('myEvent');
    }

    public function show(){
        $viewEvent=Event::all();
        return view('myEvent')->with('events', $viewEvent);
    }
    public function edit($id){
        $event=Event::all()->where('id',$id);
        //select*fromevents where id='$id'
        return view('editEvent')->with('events', $event);
    }
    

    public function update(){
        $r=request();
        $events=Event::find($r->id);
        if($r->file('image')!=''){
            $image=$r->file('productImage');
            $image->move('image',$image->getClientOriginalName());
            $events->image=$image->getClientOriginalName();
        }
        $events->name=$r->eventName;
        $events->description=$r->eventDescription;
        $events->organization=$r->organization;
        $events->place=$r->eventPlace;
        $events->start=$r->eventStart;
        $events->end=$r->eventEnd;
        $events->time=$r->eventTime;
        $events->seat=$r->seat;

        $events->save();//update events set name='$productName',price='$productPrice'... where id='$id'
        return redirect()->route('myEvent');
        
    }
    public function detail($id){
        $events=Event::all()->where('id',$id);
        return view('eventDetail')->with('events', $events);
    }
    public function delete($id){
        $events=Event::find($id);
        $events->delete();//delete from events where id='$id'
        return redirect()->route('myEvent');
    }
}




/* public function add(){
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
    $viewevents=Product::all();
    return view('showProduct')->with('events', $viewevents);
}
public function searchProduct(){
    $r=request();
    $keyword=$r->keyword;
    $product=DB::table('events')->where('name','like','%'.$keyword.'%')->get();
    return view('showProduct')->with('events',$product);
   }
public function edit($id){
    $events=Product::all()->where('id',$id);
    //select*fromevents where id='$id'
    return view('editProduct')->with('events', $events);
}
public function update(){
    $r=request();
    $events=Product::find($r->id);
    if($r->file('productImage')!=''){
        $image=$r->file('productImage');
        $image->move('image',$image->getClientOriginalName());
        $events->image=$image->getClientOriginalName();
    }

    $events->name=$r->productName;
    $events->description=$r->productDescription;
    $events->price=$r->productPrice;
    $events->quantity=$r->productQuantity;
    $events->save();//update events set name='$productName',price='$productPrice'... where id='$id'
    return redirect()->route('showProduct');
    
}
public function delete($id){
    $product=Product::find($id);
    $product->delete();//delete from events where id='$id'
    return redirect()->route('showProduct');
}
public function detail($id){
    $events=Product::all()->where('id',$id);
    return view('productDetail')->with('events', $events);
} */