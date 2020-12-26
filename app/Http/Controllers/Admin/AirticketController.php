<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Airticket;
class AirticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $airticket=DB::table('airtickets')
       ->join('ticketcategories','airtickets.cat_id','ticketcategories.id')
       ->join('ticketsubcategories','airtickets.subcat_id','ticketsubcategories.id')
       ->select('airtickets.*','ticketcategories.ticket_category','ticketsubcategories.ticket_subcategory')
       ->get();

       return view('admin.air_ticket.index',compact('airticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
           $aircat=DB::table('ticketcategories')->get();
           $airsubcat=DB::table('ticketsubcategories')->get();
           return view('admin.air_ticket.create',compact('aircat','airsubcat'));
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
        'cat_id' => 'required',
        'subcat_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        
     ]);
        $airticket = New Airticket();
        $airticket->cat_id = $request->cat_id;
        $airticket->subcat_id = $request->subcat_id;
        $airticket->title = $request->title;
        $airticket->slug = strtolower($request->title);
        $airticket->description = $request->description;
        $airticket->save();

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
         $airtickets=DB::table("airtickets")->where('id',$id)->first();
         $ticketcategory=DB::table('ticketcategories')->get();
         $ticketsubcategory=DB::table('ticketsubcategories')->get();
        return view('admin.air_ticket.edit',compact('airtickets','ticketcategory','ticketsubcategory'));
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
        $airticket = Airticket::find($id);
        $airticket->cat_id = $request->cat_id;
        $airticket->subcat_id = $request->subcat_id;
        $airticket->title = $request->title;
        $airticket->slug = strtolower($request->title);
        $airticket->description = $request->description;
        $airticket->save();
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
        DB::table('airtickets')->where('id',$id)->delete();
       $notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }

}
