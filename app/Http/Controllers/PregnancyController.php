<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregnancy;
use App\Models\Cows;
use DB;

class PregnancyController extends Controller
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
        $pregnancy = Pregnancy::orderBy('served_on','asc')->paginate(10);
        return view('pregnancy.index')->with('pregnancy',$pregnancy);
    }
    public function search(Request $request)
    {
        $name = $request->input('search');
        $search = Pregnancy::where('cow_name', 'like', '%' . $name .'%')
            ->orWhere('served_on', 'like', '%' . $name .'%')
            ->get();
        return view('pregnancy.search',compact('name'))->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pregnancy.create');
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
            'cow_name' => 'required',
            'served_on' => 'required',
            'bull' => 'required',
            'cost' => 'required',
            'doctor' => 'required'
        ]);


        $pregnancy = new Pregnancy;
        $pregnancy->cow_name=$request->input('cow_name');
        $pregnancy->served_on=$request->input('served_on');
        $pregnancy->deliver_on=$request->input('served_on');
        $pregnancy->bull=$request->input('bull');
        $pregnancy->cost=$request->input('cost');
        $pregnancy->doctor=$request->input('doctor');

        $cowName=$request->input('cow_name');
        $cow = Cows::where('cow_name',$cowName)->get();

        $date1 = $pregnancy->served_on; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect()->back()->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            if (!empty ($cow->first()->cow_name) ) {
                $pregnancy->cow_id=$cow->first()->id;
    
                // $pregnancy = $request->input('served_on');
                $check_record = DB::select("select cow_name from pregnancies where cow_name='$cowName' ");
                if (empty($check_record)) {
                    $pregnancy->save();
                    return redirect('/pregnancy')->with('success','Record added successfully');
                }
                else {
                    return redirect()->back()->with('error','Failed!Pregnancy record for this cow already exists and has not delivered yet');
                }
    
            }
            else {
                return redirect()->back()->with('error','Failed!That cow does not exist.Try again');
            }
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
        $pregnancy = Pregnancy::find($id);
        return view('pregnancy.show')->with('pregnancy',$pregnancy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregnancy = Pregnancy::find($id);
        return view('pregnancy.edit')->with('pregnancy',$pregnancy);
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
            'cow_name' => 'required',
            'served_on' => 'required',
            'bull' => 'required',
            'cost' => 'required',
            'doctor' => 'required'
        ]);


        $pregnancy = Pregnancy::find($id);
        $pregnancy->cow_name=$request->input('cow_name');
        $pregnancy->served_on=$request->input('served_on');
        $pregnancy->deliver_on=$request->input('served_on');
        $pregnancy->bull=$request->input('bull');
        $pregnancy->cost=$request->input('cost');
        $pregnancy->doctor=$request->input('doctor');

        $cowName=$request->input('cow_name');
        $cow = Cows::where('cow_name',$cowName)->get();

        $date1 = $pregnancy->served_on; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect()->back()->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            if (!empty ($cow->first()->cow_name) ) {
                $pregnancy->cow_id=$cow->first()->id;

                $pregnancy->save();
                return redirect('/pregnancy')->with('success','Record updated successfully');
    
                // $pregnancy = $request->input('served_on');
                // $check_record = DB::select("select cow_name from pregnancies where cow_name='$cowName' ");
                // if (empty($check_record)) {
                //     $pregnancy->save();
                //     return redirect('/pregnancy')->with('success','Record added successfully');
                // }
                // else {
                //     return redirect()->back()->with('error','Failed!Pregnancy record for this cow already exists and has not delivered yet');
                // }
    
            }
            else {
                return redirect()->back()->with('error','Failed!That cow does not exist.Try again');
            }
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
        $pregnancy = Pregnancy::find($id);
        $pregnancy->delete();
        return redirect('/pregnancy')->with('error','Pregnancy record removed');
    }
}
