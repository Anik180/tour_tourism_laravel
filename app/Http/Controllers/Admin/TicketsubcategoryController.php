<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Ticketsubcategory;
class TicketsubcategoryController extends Controller
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
        $sub=DB::table('ticketsubcategories')
        ->join('ticketcategories','ticketsubcategories.ticket_category_id','ticketcategories.id')
        ->select('ticketsubcategories.*','ticketcategories.ticket_category')
        ->get();
       return view('admin.air_ticket.air_ticket_subcategory',compact('sub')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket_category=DB::table('ticketcategories')->get();
        return view('admin.air_ticket.subcategory_create',compact('ticket_category'));
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
        'ticket_subcategory' => 'required',
        'ticket_category_id' => 'required',
     ]);

           $data=array();
           $data['ticket_subcategory']=$request->ticket_subcategory;
           $data['slug']=strtolower($request->ticket_subcategory);
           $data['ticket_category_id']=$request->ticket_category_id;
        DB::table('ticketsubcategories')->insert($data);
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
      
      $ticketsubcategories=DB::table("ticketsubcategories")->where('id',$id)->first();
      $ticketcategories=DB::table('ticketcategories')->get();
      return view('admin.air_ticket.subcategory_edit',compact('ticketsubcategories','ticketcategories'));
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
      $data['ticket_subcategory']=$request->ticket_subcategory;
      $data['slug']=strtolower($request->ticket_subcategory);
      $data['ticket_category_id']=$request->ticket_category_id;
      DB::table('ticketsubcategories')->where('id',$id)->update($data);
     $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('ticket-subcategories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ticketsubcategories')->where('id',$id)->delete();
        $notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
}
