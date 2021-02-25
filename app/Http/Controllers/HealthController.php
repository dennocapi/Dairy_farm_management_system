<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;
use App\Models\Cows;

class HealthController extends Controller
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
        $health_records = Health::orderBy('day','desc')->paginate(20);
        return view('health.index')->with('health_records',$health_records);
    }
    public function search(Request $request)
    {
        $input = $request->input('search');
        $search = Health::where('cow_name', 'like', '%' . $input .'%')
                ->orWhere('doctor', 'like', '%' . $input .'%')
                ->orWhere('day', 'like', '%' . $input .'%')
                ->get();
        return view('health.search',compact('input'))->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('health.create');
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
            'treatment' => 'required',
            'medication' => 'required',
            'cost' => 'required',
            'date' => 'required',
            'doctor' => 'required',
            'remarks' => 'required'
        ]);


        $health = new Health;
        $health->cow_name=$request->input('cow_name');
        $health->treatment=$request->input('treatment');
        $health->medication=$request->input('medication');
        $health->cost=$request->input('cost');
        $health->day=$request->input('date');
        $health->doctor=$request->input('doctor');
        $health->remarks=$request->input('remarks');

        $date1 = $health->day; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/health/create')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $cowName=$request->input('cow_name');

            $cow = Cows::where('cow_name',$cowName)->get();
            if (!empty ($cow->first()->cow_name)) {
                $health->cow_id=$cow->first()->id;
                $health->save();
                return redirect('/health')->with('success','Health record added successfully');
            }
            else {
                return redirect('/health/create')->with('error','Failed!That cow does not exist.Try again');
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
        $health_record = Health::find($id);
        return view('health.show')->with('health_record',$health_record);
    } 

    // function to show all health records of a single cow
    public function show_all($cow_id)
    {
        
        if (Health::where('cow_id',$cow_id)->exists()) {
            $health_record = Health::where('cow_id',$cow_id)->get();
            return view('health.show_all')->with('health_record',$health_record);
        }
        else{
            return redirect()->back() ->with('error', 'No health record found for this cow');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $health_record = Health::find($id);
        return view('health.edit')->with('health_record',$health_record);
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
            'treatment' => 'required',
            'medication' => 'required',
            'cost' => 'required',
            'date' => 'required',
            'doctor' => 'required',
            'remarks' => 'required'
        ]);
        
        $health = Health::find($id);
        $health->cow_name=$request->input('cow_name');
        $health->treatment=$request->input('treatment');
        $health->medication=$request->input('medication');
        $health->cost=$request->input('cost');
        $health->day=$request->input('date');
        $health->doctor=$request->input('doctor');
        $health->remarks=$request->input('remarks');

        $date1 = $health->day; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/health')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $cowName=$request->input('cow_name');

            $cow = Cows::where('cow_name',$cowName)->get();
            if (!empty ($cow->first()->cow_name)) {
                $health->cow_id=$cow->first()->id;
                $health->save();
                return redirect('/health')->with('success','Health record updated successfully');
            }
            else {
                return redirect('/health/create')->with('error','Health record update failed!That cow doesn\'t exist');
            }
        }
        $cowName=$request->input('cow_name');

        $cow = Cows::where('cow_name',$cowName)->get();
        if (!empty ($cow->first()->cow_name)) {
            $health->cow_id=$cow->first()->id;
            $health->save();
            return redirect('/health')->with('success','Health record updated successfully');
        }
        else {
            return redirect('/health/create')->with('error','Health record update failed!That cow doesn\'t exist');
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
        $health_record = Health::find($id);
        $health_record->delete();
        return redirect('/health')->with('error','Health record removed successfully');
    }
}
