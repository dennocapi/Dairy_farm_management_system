<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use DB;

class InventoryController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::orderBy('date','desc');
        $feeds= DB::select("select id, item_name, type, quantity, date from inventories where type='feed' order by date desc");
        $tools= DB::select("select id, item_name, type, quantity, date from inventories where type='tool' order by date desc");
        $others= DB::select("select id, item_name, type, quantity, date from inventories where type='other' order by date desc");
        $data = [
            'inventory' => $inventory,
            'feeds' => $feeds,
            'tools' => $tools,
            'others' => $others,
        ];
        return view('inventory.index')->with('data',$data);
    }
    public function search(Request $request)
    {
        $item = $request->input('item');
        $search = Inventory::where('item_name', 'like', '%' . $item .'%')->get();
        return view('inventory.search',compact('item'))->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);


        $inventory = new Inventory;
        $inventory->item_name=$request->input('item_name');
        $inventory->type=$request->input('type');
        $inventory->quantity=$request->input('quantity');
        $inventory->date=$request->input('date');

        $date1 = $inventory->date; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/inventory/create')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $inventory->save();
            return redirect('/inventory')->with('success','Item added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Inventory::find($id);
        return view('inventory.show')->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Inventory::find($id);
        return view('inventory.edit')->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);


        $inventory = Inventory::find($id);
        $inventory->item_name=$request->input('item_name');
        $inventory->type=$request->input('type');
        $inventory->quantity=$request->input('quantity');
        $inventory->date=$request->input('date');

        $date1 = $inventory->date; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/inventory')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $inventory->save();
            return redirect('/inventory')->with('success','Item updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Inventory::find($id);
        $item->delete();
        return redirect('/inventory')->with('error','Item Removed');
    }
}
