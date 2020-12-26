<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package_category;
use DB;
use App\Ceo;
use App\config;
use App\About;
use App\Visa;
use App\Ticketcategory;
use App\Ticketsubcategory;
use App\Hotel_booking;
use App\Subcategory;
use App\Gallery;
class FrontController extends Controller
{


public function packagecategory($id,$slug)
{
	  $package=DB::table('packages')
    ->join('subcategories','packages.subcat_id','subcategories.id')
    ->select('packages.*','subcategories.subcat')
    ->where('subcat_id',$id)->orderBy('id','DESC')->get();
      $subcategory =  Subcategory::findOrFail($id);
    return view('packages',compact('package','subcategory'));
}


public function singlepost($id,$slug)
{
$package=DB::table('packages')
->join('package_categories','packages.package_category_id','package_categories.id')
->select('packages.*','package_categories.package_category_name')
->where('packages.id',$id)
->first();

return view('single_package',compact('package'));
}

  public function ceomassage()
  {
    
    $ceo=Ceo::first();
  	return view('ceo_massage',compact('ceo'));
  }

  public function about()
  {
    
    $about=About::first();
  	return view('about',compact('about'));
  }


  public function visaservice($id,$slug)
{
    $visa_service=DB::table('visa_services')
    ->join('visas','visa_services.visa_id','visas.id')
    ->select('visa_services.*','visas.visa_country')
    ->where('visa_id',$id)->orderBy('id','DESC')->get();
      $visa =  Visa::find($id);
    return view('visa_service',compact('visa_service'))->withVisa($visa);
}

public function singlevisa($id,$slug)
{
$singlevisa=DB::table('visa_services')
->join('visas','visa_services.visa_id','visas.id')
->select('visa_services.*','visas.visa_country')
->where('visa_services.id',$id)
->first();
return view('single_visa',compact('singlevisa'));
}

public function airticketcategory($id,$slug)
{
    $airticket=DB::table('airtickets')
    ->join('ticketsubcategories','airtickets.subcat_id','ticketsubcategories.id')
    ->select('airtickets.*','ticketsubcategories.ticket_subcategory')
    ->where('subcat_id',$id)->orderBy('id','DESC')->get();
    $air_subcategory =  Ticketsubcategory::find($id);
    return view('air_ticket',compact('airticket','air_subcategory'));
}

public function singleairticket($id,$slug)
{
  $singleticket=DB::table('airtickets')->first();
return view('single_ticket',compact('singleticket'));


}

public function contactus()
{
  $contact=DB::table('contacts')->orderBy('id','DESC')->get();
  return view('contact_us',compact('contact'));
}

public function hotel_bookings()
{
  $all_hotel=DB::table('hotel_bookings')->orderBy('id','DESC')->get();
  return view('all_hotel',compact('all_hotel'));
}

public function singleairhotel($id,$slug)
{
  $singleairhotel=DB::table('hotel_bookings')->first();
return view('single_hotel',compact('singleairhotel'));
}

public function photogallery()
{
  $gallery=Gallery::orderBy('id','DESC')->get();
  return view('photo_gallery',compact('gallery'));

}

}
