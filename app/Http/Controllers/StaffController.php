<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
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
        $staff= Staff::orderBy('first_name','asc')->paginate(20);
        return view('staff.index')->with('staff',$staff);
    }
    public function search(Request $request)
    {
        $name = $request->input('search');
        $search = Staff::where('first_name', 'like', '%' . $name .'%')
            ->orWhere('second_name', 'like', '%' . $name .'%')
            ->orWhere('phone', 'like', '%' . $name .'%')
            ->orWhere('id_number', 'like', '%' . $name .'%')
            ->orWhere('email', 'like', '%' . $name .'%')
            ->orWhere('title', 'like', '%' . $name .'%')
            ->get();
        return view('staff.search',compact('name'))->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
            'first_name' => 'required',
            'second_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'id_no' => 'required',
            'title' => 'required',
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
            $path = $request->file('profile_image')->storeAs('public/staff/profile_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $staff = new Staff;

        $phone=$request->input('phone');
        $email=$request->input('email');
        $id_no=$request->input('id_no');
        $check_phone = Staff::where('phone',$phone)->get();
        $check_email = Staff::where('email',$email)->get();
        $check_id_no = Staff::where('id_number',$id_no)->get();
        if (!empty ($check_phone->first()->phone) Or !empty ($check_email->first()->email) Or !empty ($check_id_no->first()->id_number)) {
            return redirect('/staff/create')->with('error','Failed!That email or phone or id number exists.Try again with different credentials');
        }
        else {
            $staff->first_name=$request->input('first_name');
            $staff->second_name=$request->input('second_name');
            $staff->phone=$request->input('phone');
            $staff->id_number=$request->input('id_no');
            $staff->email=$request->input('email');
            $staff->title=$request->input('title');
            $staff->profile_image = $fileNameToStore;
            $staff->save();
    
            return redirect('/staff')->with('success','Staff member added successfully');
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
        $staff = Staff::find($id);
        return view('staff.show')->with('staff',$staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('staff.edit')->with('staff',$staff);
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
            'first_name' => 'required',
            'second_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'id_no' => 'required',
            'title' => 'required',
            'profile_image'=>'image|nullable|max:1999'
        ]);

        $staff = Staff::find($id);
        $staff->first_name=$request->input('first_name');
        $staff->second_name=$request->input('second_name');
        $staff->phone=$request->input('phone');
        $staff->id_number=$request->input('id_no');
        $staff->email=$request->input('email');
        $staff->title=$request->input('title');
        $staff->save();

        return redirect('/staff')->with('success','Staff record updated successfully');
        // $phone=$request->input('phone');
        // $email=$request->input('email');
        // $id_no=$request->input('id_no');
        // $check_phone = Staff::where('phone',$phone)->get();
        // $check_email = Staff::where('email',$email)->get();
        // $check_id_no = Staff::where('id_number',$id_no)->get();
        // if (count($check_phone) > 1 Or count($check_email) > 1 Or count($check_id_no) > 1) {
        //     return redirect('/staff/create')->with('error','Failed!That email or phone or id number exists.Try again with different credentials');
        // }
        // else {

        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('/staff')->with('error','Staff member removed');
    }
}
