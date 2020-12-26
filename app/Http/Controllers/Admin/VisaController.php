<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visa;
class VisaController extends Controller
{

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
        $visa = Visa::all();
        return view('admin.visa.index',compact('visa'));
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
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'visa_country' => 'required',
        
     ]);
        $visa = New Visa();
        $visa->visa_country = $request->visa_country;
        $visa->slug = strtolower($request->visa_country);

        $visa->save();

        $notification=array(
          'messege'=>'Successfully Data Save',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $visa = Visa::find($request->visa_id);
        $visa->visa_country = $request->visa_country;
        $visa->slug = strtolower($request->visa_country);
        $visa->save();
        $notification=array(
          'messege'=>'Successfully Updated',
          'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visa::find($id)->delete();
        $notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }
}
