<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use DB;
use Image;
class PackageController extends Controller
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
        $package=DB::table('packages')
        ->join('package_categories','packages.package_category_id','package_categories.id')
        ->join('subcategories','packages.subcat_id','subcategories.id')
        ->select('packages.*','package_categories.package_category_name','subcategories.subcat')
        ->get();
       return view('admin.package.index',compact('package')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $package_category=DB::table('package_categories')->get();
        $subcategory=DB::table('subcategories')->get();
        return view('admin.package.create',compact('package_category','subcategory'));
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
        'title' => 'required',
        'package_details' => 'required',
     ]);

           $data=array();
           $data['title']=$request->title;
           $data['slug']=strtolower($request->title);
           $data['package_category_id']=$request->package_category_id;
           $data['subcat_id']=$request->subcat_id;
           $data['package_price']=$request->package_price;
           $data['package_details']=$request->package_details;
           $data['date']=$request->date;
           $data['promotion']=$request->promotion;

           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(534,347)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('packages')->insert($data);
         $notification=array(
          'messege'=>'Successfully Save',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }else{
            return Redirect()->back();
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
      $package=DB::table("packages")->where('id',$id)->first();
      $package_category=DB::table('package_categories')->get();
      $subcategories=DB::table('subcategories')->get();
      return view('admin.package.edit',compact('package','package_category','subcategories'));
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
    $validatedData = $request->validate([
        'title' => 'required',
        'package_details' => 'required',
     ]);

           $data=array();
           $data['title']=$request->title;
           $data['slug']=strtolower($request->title);
           $data['package_category_id']=$request->package_category_id;
           $data['subcat_id']=$request->subcat_id;
           $data['package_price']=$request->package_price;
           $data['package_details']=$request->package_details;
           $data['date']=$request->date;
           $data['promotion']=$request->promotion;
         
           $oldimage=$request->old_image;
           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(534,347)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('packages')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->route('packages.index')->with($notification);
           }
            $data['image']=$oldimage;
             DB::table('packages')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully update',
            'alert-type'=>'success'
             );
            return Redirect()->route('packages.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $package=DB::table("packages")->where('id',$id)->first();
           unlink($package->image);
           DB::table("packages")->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Delete',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
