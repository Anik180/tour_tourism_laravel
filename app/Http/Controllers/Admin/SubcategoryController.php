<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat=DB::table('subcategories')
        ->join('package_categories','subcategories.package_category_id','package_categories.id')->select('package_categories.package_category_name','subcategories.*')->get();
            $category=DB::table('package_categories')->get();
        return view('admin.subcategory.index',compact('subcat','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $subcat=DB::table('subcategories')
        ->join('package_categories','subcategories.package_category_id','package_categories.id')->select('package_categories.package_category_name','subcategories.*')->get();
            $category=DB::table('package_categories')->get();
        return view('admin.subcategory.create',compact('subcat','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //  $validatedData = $request->validate([
     //    'title' => 'required',
     //    'package_details' => 'required',
     // ]);

           $data=array();
           $data['package_category_id']=$request->package_category_id;
           $data['subcat']=$request->subcat;

            DB::table('subcategories')->insert($data);
           $notification=array(
          'messege'=>'Successfully Save',
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
             $packagesub=DB::table("subcategories")->where('id',$id)->first();
      $package_category=DB::table('package_categories')->get();
      return view('admin.subcategory.edit',compact('packagesub','package_category'));
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

      $data=array();
      $data['package_category_id']=$request->package_category_id;
      $data['subcat']=$request->subcat;
      DB::table('subcategories')->where('id',$id)->update($data);
      $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('package-subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
DB::table('subcategories')->where('id',$id)->delete();
$notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
}
