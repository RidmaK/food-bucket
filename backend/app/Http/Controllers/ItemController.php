<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items= Item::all();
        return response()->json(['allItems',$items],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        $image =explode(',',$request->image);
        $decode =base64_decode($image[1]);

        if(str_contains($image[0],'png')){
            $exte ='png';
        }else{
            $exte =  'jpg';
        }

        $currentTime =Carbon::now()->timestamp;
        $filename= $currentTime.'.'.$exte;
        $filepath = public_path().'/'.$filename;

        file_put_contents($filepath,$decode);

        $item =Item::create([
            'name'=>$request->name,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'image'=>$filename
        ]);
        return response()->json(['message',$item],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        $items= Item::find($item);
        return response()->json(['items',$items],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $items= Item::find($item);
        return response()->json(['items',$items],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemStoreRequest $request, Item $item)
    {
        $items=Item::find( $item);
        if(!$items){
            return response()->json(['message'=>"Item is not found"],404);
        }
        $item->update([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price
        ]);
        return response()->json(['item'=>$item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {

            $item->delete();
            return response()->json(['message'=>"Item is deleted"],201);


    }
}
