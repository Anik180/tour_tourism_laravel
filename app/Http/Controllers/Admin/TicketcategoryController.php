<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticketcategory;
class TicketcategoryController extends Controller
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
        $ticketcategory = Ticketcategory::all();
        return view('admin.air_ticket.ticket_category',compact('ticketcategory'));
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
        'ticket_category' => 'required',
        
     ]);
        $ticket_category = New Ticketcategory();
        $ticket_category->ticket_category = $request->ticket_category;
        $ticket_category->slug = strtolower($request->ticket_category);

        $ticket_category->save();

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
        $ticket_category = Ticketcategory::find($request->ticket_category_id);
        $ticket_category->ticket_category = $request->ticket_category;
        $ticket_category->slug = strtoupper($request->ticket_category);
        $ticket_category->save();
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
        Ticketcategory::find($id)->delete();
        $notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
}
