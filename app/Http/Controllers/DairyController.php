<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dairy;

class DairyController extends Controller
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
        $dairy = Dairy::orderBy('date','desc')->paginate(10);
        return view('dairy.index')->with('dairy',$dairy);
    }
    public function search(Request $request)
    {
        $date = $request->input('date');
        $search = Dairy::where('date', 'like', '%' . $date .'%')->get();
        return view('dairy.search',compact('date'))->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dairy.create');
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
            'date' => 'required',
            'morning' => 'required',
            'afternoon' => 'required',
        ]);
        $dairy = new Dairy;
        $dairy->date=$request->input('date');
        $dairy->morning=$request->input('morning');
        $dairy->afternoon=$request->input('afternoon');

        $date1 = $dairy->date; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        // return $dateTimestamp1 . $dateTimestamp2;
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/dairy/create')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $dairy->save();
            return redirect('/dairy')->with('success','Dairy record added successfully');
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
        $dairy = Dairy::find($id);
        return view('dairy.show')->with('dairy',$dairy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dairy = Dairy::find($id);
        return view('dairy.edit')->with('dairy',$dairy);
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
            'date' => 'required',
            'morning' => 'required',
            'afternoon' => 'required',
        ]);
        $dairy = Dairy::find($id);
        $dairy->date=$request->input('date');
        $dairy->morning=$request->input('morning');
        $dairy->afternoon=$request->input('afternoon');

        $date1 = $dairy->date; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        // return $dateTimestamp1 . $dateTimestamp2;
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/dairy/create')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $dairy->save();
            return redirect('/dairy')->with('success','Dairy record added successfully');
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
        $dairy = Dairy::find($id);
        $dairy->delete();
        return redirect('/dairy')->with('error','Dairy record removed');
    }
}
