<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class ConfigController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$config=DB::table('configs')->first();
    	return view ('admin.config.index',compact('config'));
    }

    public function update(Request $request,$id)
    {
  

           $data=array();
           $data['phone_one']=$request->phone_one;
           $data['phone_two']=$request->phone_two;
           $data['phone_three']=$request->phone_three;
           $data['phone_four']=$request->phone_four;
           $data['phone_five']=$request->phone_five;
           $data['phone_six']=$request->phone_six;
           $data['email']=$request->email;
           $data['location']=$request->location;
           $data['facebook']=$request->facebook;
           $data['twitter']=$request->twitter;
           $data['google_plus']=$request->google_plus;
           $data['youtube']=$request->youtube; 
    $update=DB::table('configs')->where('id',$id)->update($data);
    if($update){
       $notification=array(
                    'messege'=>'Successfully Update ',
                    'alert-type'=>'success'
                    );
       return Redirect()->back()->with($notification);
    }else{
       $notification=array(
                    'messege'=>'Sorry',
                    'alert-type'=>'error'
                    );
       return Redirect()->back()->with($notification);
    }

    }

    public function updatephoto(Request $request,$id)
    { 

           $data=array();
         
           $oldlogo=$request->old_logo;
           $oldfavicon=$request->old_fav_icon;
           

           $logo=$request->logo;
           $fav_icon=$request->fav_icon;
           if($logo && $fav_icon){
            $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();
          $fav_icon_name=uniqid().'.'.$fav_icon->getClientOriginalExtension();

            
            Image::make($logo)->resize(400,83)->save('public/uploads/'.$logo_name);
          Image::make($fav_icon)->resize(50,50)->save('public/uploads/'.$fav_icon_name);
          
            $data['logo']='public/uploads/'.$logo_name;
          $data['fav_icon']='public/uploads/'.$fav_icon_name;

            DB::table('configs')->where('id',$id)->update($data);
            unlink($oldlogo);
            unlink($oldfavicon);
         $notification=array(
          'messege'=>'Successfully logo and fav icon update',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }
           if($logo){
            $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();
            Image::make($logo)->resize(400,83)->save('public/uploads/'.$logo_name);
            $data['logo']='public/uploads/'.$logo_name;
            DB::table('configs')->where('id',$id)->update($data);
            unlink($oldlogo);
         $notification=array(
          'messege'=>'Successfully Logo update',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }if($fav_icon){
            $fav_icon_name=uniqid().'.'.$fav_icon->getClientOriginalExtension();
            Image::make($fav_icon)->resize(50,50)->save('public/uploads/'.$fav_icon_name);
            $data['fav_icon']='public/uploads/'.$fav_icon_name;
            DB::table('configs')->where('id',$id)->update($data);
            unlink($oldfavicon);
         $notification=array(
          'messege'=>'Successfully Fav icon update',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }
            $data['logo']=$oldlogo;
            $data['fav_icon']=$oldfavicon;
            DB::table('configs')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully logo and fav icon update',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    public function updatesocial(Request $request,$id)
    {

        $old_facebook_logo=$request->old_facebook_logo;
        $old_twitter_logo=$request->old_twitter_logo;
        $old_google_logo=$request->old_google_logo;
        $old_youtube_logo=$request->old_youtube_logo;
        $old_instagram_logo=$request->old_instagram_logo;
        $old_linkedin_logo=$request->old_linkedin_logo;
        
        $data=array();

        $facebook_logo=$request->file('facebook_logo');
        $twitter_logo=$request->file('twitter_logo');
        $google_logo=$request->file('google_logo');
        $youtube_logo=$request->file('youtube_logo');
        $instagram_logo=$request->file('instagram_logo');
        $linkedin_logo=$request->file('linkedin_logo');
            
            if ($facebook_logo) {
                unlink($old_facebook_logo);
                $facebook_logo_name=uniqid().'.'.$facebook_logo->getClientOriginalExtension();
                $facebook_logo_full_name=$facebook_logo_name;
                $upload_path='public/uploads/';
                $image_url=$upload_path.$facebook_logo_full_name;
                $success=$facebook_logo->move($upload_path,$facebook_logo_full_name);
                $data['facebook_logo']=$image_url;
                $facebook_logo=DB::table('configs')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }
                  if ($twitter_logo) {
                unlink($old_twitter_logo);
                $twitter_logo_name=uniqid().'.'.$twitter_logo->getClientOriginalExtension();
                $twitter_logo_full_name=$twitter_logo_name;
                $upload_path='public/uploads/';
                $image_url=$upload_path.$twitter_logo_full_name;
                $success=$twitter_logo->move($upload_path,$twitter_logo_full_name);
                $data['twitter_logo']=$image_url;
                $twitter_logo=DB::table('configs')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }                    
        
                if ($google_logo) {
                unlink($old_google_logo);
                $google_logo_name=uniqid().'.'.$google_logo->getClientOriginalExtension();
                $google_logo_full_name=$google_logo_name;
                $upload_path='public/uploads/';
                $image_url=$upload_path.$google_logo_full_name;
                $success=$google_logo->move($upload_path,$google_logo_full_name);
                $data['google_logo']=$image_url;
                $google_logo=DB::table('configs')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }
                if ($youtube_logo) {
                unlink($old_youtube_logo);
                $youtube_logo_name=uniqid().'.'.$youtube_logo->getClientOriginalExtension();
                $youtube_logo_full_name=$youtube_logo_name;
                $upload_path='public/uploads/';
                $image_url=$upload_path.$youtube_logo_full_name;
                $success=$youtube_logo->move($upload_path,$youtube_logo_full_name);
                $data['youtube_logo']=$image_url;
                $youtube_logo=DB::table('configs')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }
                if ($instagram_logo) {
                unlink($old_instagram_logo);
                $instagram_logo_name=uniqid().'.'.$instagram_logo->getClientOriginalExtension();
                $instagram_logo_full_name=$instagram_logo_name;
                $upload_path='public/uploads/';
                $image_url=$upload_path.$instagram_logo_full_name;
                $success=$instagram_logo->move($upload_path,$instagram_logo_full_name);
                $data['instagram_logo']=$image_url;
                $youtube_logo=DB::table('configs')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }
                if ($linkedin_logo) {
                unlink($old_linkedin_logo);
                $linkedin_logo_name=uniqid().'.'.$linkedin_logo->getClientOriginalExtension();
                $linkedin_logo_full_name=$linkedin_logo_name;
                $upload_path='public/uploads/';
                $image_url=$upload_path.$linkedin_logo_full_name;
                $success=$linkedin_logo->move($upload_path,$linkedin_logo_full_name);
                $data['linkedin_logo']=$image_url;
                $linkedin_logo=DB::table('configs')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }
            else{
              DB::table('configs')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }
    }

}
