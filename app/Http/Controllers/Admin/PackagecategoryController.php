<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package_category;
class PackagecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *hhh
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package_category = Package_category::all();
        return view('admin.package_category.index',compact('package_category'));
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
        'package_category_name' => 'required',
        
     ]);
        $package_category = New Package_category();
        $package_category->package_category_name = $request->package_category_name;
        $package_category->slug = strtolower($request->package_category_name);

        $package_category->save();

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
    public function update(Request $request)
    {
        $package_category = Package_category::find($request->package_category_id);
        $package_category->package_category_name = $request->package_category_name;
        $package_category->slug = strtolower($request->package_category_name);
        $package_category->save();
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
        Package_category::find($id)->delete();
        $notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
}
