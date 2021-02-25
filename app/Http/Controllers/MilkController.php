<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milk_record;
use App\Models\Cows;
use App\Models\Dairy;
use DB;
class MilkController extends Controller
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
        $milk_record = Milk_record::orderBy('day','desc')->paginate(10);
        $dairy = Dairy::orderBy('date','desc')->first();
        return view('milk.index')->with('data',['milk_record'=>$milk_record,'dairy' => $dairy]);
    }
    public function search(Request $request)
    {
        $name = $request->input('search');
        $search = Milk_record::where('cow_name', 'like', '%' . $name .'%')
            ->orWhere('day', 'like', '%' . $name .'%')
            ->get();
        return view('milk.search',compact('name'))->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('milk.create');
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
            'date' => 'required',
            'morning' => 'required',
            'afternoon' => 'required',
            'evening' => 'required'
        ]);


        $milk = new Milk_record;
        $milk->cow_name=$request->input('cow_name');
        $milk->day=$request->input('date');
        $milk->morning=$request->input('morning');
        $milk->afternoon=$request->input('afternoon');
        $milk->evening=$request->input('evening');
        
        $cowName=$request->input('cow_name');
        $cow = Cows::where('cow_name',$cowName)->get();

        $date1 = $milk->day; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/milk/create')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            if (!empty ($cow->first()->cow_name) ) {
                $milk->cow_id=$cow->first()->id;
    
                $milk_date = $request->input('date');
                $check_record = DB::select("select cow_name,day from milk_records where cow_name='$cowName' and day='$milk_date'");
                if (empty($check_record)) {
                    $milk->save();
                    return redirect('/milk/create')->with('success','Milk record added successfully');
                }
                else {
                    return redirect('/milk/create')->with('error','Failed!Milk Record for ' . $cowName . ' on ' . $milk_date . ' already exists.');
                }
    
            }
            else {
                return redirect('/milk/create')->with('error','Failed!That cow does not exist.Try again');
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
        $milk_record = Milk_record::find($id);
        return view('milk.show')->with('milk_record',$milk_record);
    }

    // function to show all milk records of a single cow
    public function show_all($cow_id)
    {

        if (Milk_record::where('cow_id',$cow_id)->exists()) {
            $milk_record = Milk_record::where('cow_id',$cow_id)->get();
            return view('milk.show_all')->with('milk_record',$milk_record);
        }
        else{
            return redirect()->back() ->with('error', 'No Milk record found for this cow');
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
        $milk_record = Milk_record::find($id);
        return view('milk.edit')->with('milk_record',$milk_record);
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
            'date' => 'required',
            'morning' => 'required',
            'afternoon' => 'required',
            'evening' => 'required'
        ]);

        $milk = Milk_record::find($id);
        $milk->cow_name=$request->input('cow_name');
        $milk->day=$request->input('date');
        $date1 = $milk->day; 
        $date2 = date('Y-m-d H:i:s');
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        if($dateTimestamp1 > $dateTimestamp2){
            return redirect('/milk')->with('error','Invalid date! You can\'t enter a future date');
        }
        else{
            $milk->morning=$request->input('morning');
            $milk->afternoon=$request->input('afternoon');
            $milk->evening=$request->input('evening');
            
            $cowName=$request->input('cow_name');
            $cow = Cows::where('cow_name',$cowName)->get();
    
    
            if (!empty ($cow->first()->cow_name) ) {
                $milk->cow_id=$cow->first()->id;
                $milk->save();
                return redirect('/milk')->with('success','Milk record updated successfully');
    
            }
            else {
                return redirect('/milk/create')->with('error','Failed!That cow does not exist.Try again');
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
        $milk_record = Milk_record::find($id);
        $milk_record->delete();
        return redirect('/milk')->with('error','Milk record Removed');
    }
}
