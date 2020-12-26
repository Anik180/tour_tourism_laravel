<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visa_service;
use DB;
use Image;
class VisaserviceController extends Controller
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
        $visa_service=DB::table('visa_services')
        ->join('visas','visa_services.visa_id','visas.id')
        ->select('visa_services.*','visas.visa_country')
        ->get();
        return view('admin.visa_service.index',compact('visa_service'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $visa_service=DB::table('visa_services')->get();
        $visa=DB::table('visas')->get();
        return view('admin.visa_service.create',compact('visa_service','visa'));
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
        'visa_id' => 'required',
        'visa_detail' => 'required',
         ]);

            // if($request->image){
            //        $position = strpos($request->image, ';');
            //        $sub=substr($request->image, 0 ,$position);
            //        $ext=explode('/', $sub)[1];
            //        $name=uniqid().".".$ext;
            //        $img=Image::make($request->image)->resize(650,400);
            //        $upload_path='public/uploads/';
            //        $image_url=$upload_path.$name;
            //        $img->save($image_url);

            //        $Visa_service = new Visa_service;
            //        $Visa_service->title = $request->title;
            //        $Visa_service->slug = strtolower($request->title);
            //        $Visa_service->visa_id = $request->visa_id;
            //        $Visa_service->visa_detail = $request->visa_detail;
            //        $Visa_service->date = $request->date;
            //        $Visa_service->comment = $request->comment;
            //        $Visa_service->image =  $image_url;
            //        $Visa_service->save();
            // }else{
            //        $Visa_service = new Visa_service;
            //        $Visa_service->title = $request->title;
            //        $Visa_service->slug = strtolower($request->title);
            //        $Visa_service->visa_id = $request->visa_id;
            //        $Visa_service->visa_detail = $request->visa_detail;
            //        $Visa_service->date = $request->date;
            //        $Visa_service->comment = $request->comment;
            //        $Visa_service->save();
            // }


        $Visa_service = new Visa_service;
        $Visa_service->title = $request->title;
        $Visa_service->slug = strtolower($request->title);
        $Visa_service->visa_id = $request->visa_id;
        $Visa_service->visa_detail = $request->visa_detail;
        $Visa_service->date = $request->date;
        $Visa_service->comment = $request->comment;
        $Visa_service->save();

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
      $visa_service=DB::table("visa_services")->where('id',$id)->first();
      $visa=DB::table('visas')->get();
      return view('admin.visa_service.edit',compact('visa_service','visa'));
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
         //  $data=array();
         //  $data->title = $request->title;
         //  $data->slug = strtolower($request->title);
         //  $data->visa_id = $request->visa_id;
         //  $data->visa_detail = $request->visa_detail;
         //  $data->date = $request->date;
         //  $data->comment = $request->comment;
         
         //   $oldimage=$request->old_image;
         //   $image=$request->image;
         //   if($image){
         //    $image_one=uniqid().'.'.$image->getClientOriginalExtension();
         //    Image::make($image)->resize(650,400)->save('public/uploads/'.$image_one);
         //    $data['image']='public/uploads/'.$image_one;
         //    DB::table('visa_services')->where('id',$id)->update($data);
         //    unlink($oldimage);
         // $notification=array(
         //  'messege'=>'Successfully update',
         //   'alert-type'=>'success'
         //     );
         //    return Redirect()->route('visa_services.index')->with($notification);
         //   }
         //    $data['image']=$oldimage;
         //     DB::table('visa_services')->where('id',$id)->update($data);
            
         //    $notification=array(
         //    'messege'=>'Successfully update',
         //    'alert-type'=>'success'
         //     );
         //    return Redirect()->route('visa_services.index')->with($notification);
        $visa_service = Visa_service::find($id);
        $visa_service->title = $request->title;
        $visa_service->slug = strtolower($request->title);
        $visa_service->visa_id = $request->visa_id;
        $visa_service->visa_detail = $request->visa_detail;
        $visa_service->date = $request->date;
        $visa_service->comment = $request->comment;
        $visa_service->save();
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
Visa_service::find($id)->delete();
        $notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
}
