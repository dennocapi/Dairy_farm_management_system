<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cows;
use App\Models\Milk_record;

class CowsController extends Controller
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
        $cows = Cows::orderBy('cow_name','asc')->paginate(10);
        return view('cows.index')->with('cows',$cows);
    }
    public function search(Request $request)
    {
        $name = $request->input('search');
        $search = Cows::where('cow_name', 'like', '%' . $name .'%')->get();
        return view('cows.search',compact('name'))->with('search',$search);
    }
    // public function milk_calendar()
    // {
    //     return view('cows.show');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cows.create');
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
            'breed' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'milking_status' => 'required',
            'mother' => 'required',
            'profile_image'=>'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasfile('profile_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_image')->storeAs('public/cows/profile_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $cow = new Cows;

        $cowName=$request->input('cow_name');
        $check_cow = Cows::where('cow_name',$cowName)->get();
        if (!empty ($check_cow->first()->cow_name)) {
            return redirect('/cows/create')->with('error','Failed!A cow by that name already exists.Try again');
        }
        else {
            $cow->cow_name=$request->input('cow_name');
            $cow->breed=$request->input('breed');
            $cow->sex=$request->input('sex');
            $cow->dob=$request->input('dob');
            $cow->milking_status=$request->input('milking_status');
            $cow->mother=$request->input('mother');
            $cow->profile_image = $fileNameToStore;
            $cow->save();

            return redirect('/cows')->with('success','Cow added successfully');
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
        $cow = Cows::find($id);
        return view('cows.show')->with('cow',$cow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cow = Cows::find($id);
        return view('cows.edit')->with('cow',$cow);
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
            'breed' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'milking_status' => 'required',
            'mother' => 'required',
            // 'cover_image'=>'required'
        ]);

        $cow = Cows::find($id);
        $cow->cow_name=$request->input('cow_name');
        $cow->breed=$request->input('breed');
        $cow->sex=$request->input('sex');
        $cow->dob=$request->input('dob');
        $cow->milking_status=$request->input('milking_status');
        $cow->mother=$request->input('mother');
        $cow->save();
        return redirect('/cows')->with('success','Cow details updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cow = Cows::find($id);
        $cow->delete();
        return redirect('/cows')->with('error','Cow Removed');
    }
}
