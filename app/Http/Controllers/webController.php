<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\job;
use App\Models\city;
use App\Models\usermeta;
use App\Models\qualification;
use App\Models\contentcategory;
use App\Models\education;
use App\Models\work_experience;
use App\Models\certification;
use App\Models\additional_informations;
use App\Models\language;
use App\Models\skill;
use App\Models\subscription;
use App\Models\payment;
use App\Models\appliedjob;
use App\Models\actively_progress;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

use App\Notifications\noti_newuser;
use App\Notifications\noti_jobadd;
use App\Notifications\noti_applyforjob;
use App\Notifications\noti_progress;
use Notification;
use Cookie;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class webController extends Controller
{  

   public function search (Request $request){
       
      $jobsfiltered= job::select('jobs.id','jobs.job_title','jobs.state','jobs.city','jobs.employer','jobs.job_type','jobs.salary_minimum','jobs.salary_maximum','jobs.experience_minimum','jobs.experience_maximum','jobs.created_at','jobs.category')
      ->join('states','states.id','=','jobs.state')
      ->join('cities','cities.id','=','jobs.city')
      ->where('jobs.status','1')
      ->where('jobs.job_title','LIKE',"%{$request->job_title}%")
      ->orwhere('cities.name','LIKE',"%{$request->location}%")
      ->orwhere('states.name','LIKE',"%{$request->location}%")->get();

    
      $response = new Response('added');
      $topsearch=json_decode(Cookie::get('name'));
    
    
    /*  */  
/*   */
          array_push($topsearch,$request->job_title);
        /*   dd ( $topsearch); */
     $array_json=json_encode($topsearch);
 /*   dd ( $array_json); 
 */
      return back()->with(['jobsfiltered'=>$jobsfiltered])->withinput()->withCookie(cookie()->forever('name',$array_json)); 
   }





   public function index(Request $request){
   /* $data= job::where('status','1')->groupBy('category')->get(); */  
   
      $value= $request->cookie('name');
        $data=[
         'alljobs'=>job::where('status','1')->orderBy('id','DESC')->get(),
         'popularcategories'=>contentcategory::where('status','1')->where('parent_id','0')->get(),
         'topemployers'=>User::where('usertype','1')->get(),
       
         
        ] ;
        return view('web.index',compact('data'));
   }

   public function subcategory($name){
      $id=contentcategory::where('name',$name)->first();
      $data=[
         'subcategory'=>contentcategory::where('parent_id',$id->id)->get(),
         'maincategory'=>contentcategory::where('name',$name)->first()

      ];
    
      return view('web.pages.category.subcategory',compact('data'));
   }
   public function jobs(Request $request){

         if(isset($request->job_filter)){
               $string= $request->price_range;
               preg_match_all('!\d+!', $string, $matches);
               $salary_minimum= $matches['0']['0'];
               $salary_maximum= $matches['0']['1'];
   
            $data= job::join('states','states.id','=','jobs.state')
                        ->join('cities','cities.id','=','jobs.city')
                        ->join('users','users.id','=','jobs.employer')
                        ->join('qualifications','qualifications.id','=','jobs.minimum_qualifaction')
                        ->where('jobs.status','1')
                        ->where('jobs.job_title','LIKE',"%{$request->job_title}%")
                        ->orwhere('states.name','LIKE',"%{$request->state}%") 
                        ->orwhere('cities.name','LIKE',"%{$request->city}%") 
                        ->orwhere('users.name','LIKE',"%{$request->compony}%") 
                        ->orwhere('jobs.job_type','LIKE',"%{$request->job_type}%") 
                        ->orwhere('jobs.minimum_qualifaction','LIKE',"%{$request->qualification}%") 
                        ->orderBy('jobs.id','DESC')->paginate(5)->setPath ('');  

                        
                        
         }else{
            $data=job::where('status','1')->orderBy('id','DESC')->paginate(5); 
         }
       
          
     
    return view('web.pages.jobs.job',['data'=>$data]);
   }

   public function jobfilter(){
      
         $data= contentcategory::select('id','name')->where('parent_id',0)->get();
        
         foreach($data as $maincategory){
              
               $maindata= contentcategory::
               join('jobs','jobs.category','=','content_category.id')
               ->where('content_category.parent_id',$maincategory->id)->where('jobs.status','1')
               ->sum("jobs.no_of_requirement");

               print_r($maindata.'</br>');
         }
   }

   public function job_details($id){
      $job= job::where('id',$id)->first();
      $data=[
        /*  'jobdetails'=>job::join('users','users.id','=','jobs.employer')->where('jobs.id',$id)->first() */
        'jobdetails'=>job::where('id',$id)->first(),
        'employerdetails'=>User::where('id',$job->employer)->first()
      ];
    /*   print_r ($data['jobdetails']);  die; */
      return view('web.pages.jobs.job_details',compact('data'));
   }

   public function user_profile(){
      $id= auth()->user()->id;
      $data= User::where('id',$id)->first();
      return view('web.pages.authprofile.profile',['profile'=>$data]);
   }

   public function profile_edit($user_id , Request $request){

      $validator =   Validator::make($request->all(), [
         'name' => ['required'],
      /*    'mobile_no' => ['required','min:11','numeric'], */
         'alternate_contact'=>['nullable','min:11','numeric'],
        
         'home_state'=>['required'],
         'home_city'=>['required'],
         'profile_image'=>['file','mimes:jpeg,png,jpg'],
         'cover_image'=>['file','mimes:jpeg,png,jpg'],
         'resume' => ['file','mimes:pdf,doc,docx'],
         'resume_cepture_image' =>['image','mimes:jpeg,png,jpg'],
         'salary_slip' => ['file','mimes:pdf,doc,docx'] 
     ]);
     if ($validator->fails()) {
       return back()->withErrors($validator)->withinput();
     }else {

        
            $user= User::where('id',$user_id)->first();
            $user->name=$request->name;
            $user->state= $request->home_state;
            $user->city=$request->home_city;

            if($request->hasfile('profile_image')){
               $path=public_path('assest/web/assest/images/profile_image');
               $filename= Str::random(7).time().'.'.$request->file('profile_image')->Extension();
               $image= $request->file('profile_image')->move($path,$filename);
               $user->profile_image=$filename;
               
            }
            if($request->hasfile('cover_image')){
               $path=public_path('assest/web/assest/images/cover_image');
               $filename= Str::random(7).time().'.'.$request->file('cover_image')->Extension();
               $image= $request->file('cover_image')->move($path,$filename);
               $user->cover_image=$filename;
               
            }
            
         if($user->save()){
               $data= [
                  'alternate_contact'=> $request->alternate_contact,
                  'date_of_birth'=>$request->date_of_birth,
                  'demo_link'=>$request->demo_link,
               ];
               if($request->hasfile('resume')){
                  $pathresume=public_path('assest/web/assest/images/resumes');
                  $filenameresume= Str::random(7).time().'.'.$request->file('resume')->Extension();
                  $image= $request->file('resume')->move($pathresume,$filenameresume);
                  $data['resume']=$filenameresume; 
               }
      
               if($request->hasfile('resume_cepture_image')){
                  $pathresume_cepture_image=public_path('assest/web/assest/images/resume_cepture');
                  $filenameresume_cepture_image= Str::random(7).time().'.'.$request->file('resume_cepture_image')->Extension();
                  $image= $request->file('resume_cepture_image')->move($pathresume_cepture_image,$filenameresume_cepture_image);
                  
                  $data['resume_cepture_image']=$filenameresume_cepture_image; 
               }
      
               if($request->hasfile('salary_slip')){
                  $pathsalary_slip=public_path('assest/web/assest/images/salary_slip');
                  $filenamesalary_slip= Str::random(7).time().'.'.$request->file('salary_slip')->Extension();
                  $image= $request->file('salary_slip')->move($pathsalary_slip,$filenamesalary_slip);
                  $data['salary_slip']=$filenamesalary_slip; 
              
               }
           
               usermeta::updateOrNew($user_id,$data);
           
               cache()->forget('user.' . $user_id . '.metas.pluck.value');
               cache()->forget('user.' . $user_id . '.meta');
               foreach ($data as $key => $value) {
                  cache()->forget('user.' . $user_id . '.meta.' . $key);
               }
            
               return back()->with('success','Profile has been Updated successfully.');; 

            }
         }
   }


   public function resume_download($filename){
      $file_path = public_path("assest/web/assest/images/resumes/".$filename);
    
         $headers = array(
            'Content-Disposition: attachment; filename='.$filename,
         );
         if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
         } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
         }
   }

   public function resume_cepture_image($filename){
      $file_path = public_path("assest/web/assest/images/resume_cepture/".$filename);
    
         $headers = array(
            'Content-Disposition: attachment; filename='.$filename,
         );
         if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
         } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
         }
   }
  

   public function salary_slip ($filename){
      $file_path = public_path("assest/web/assest/images/salary_slip/".$filename);
    
         $headers = array(
            'Content-Disposition: attachment; filename='.$filename,
         );
         if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
         } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
         }
   }

   public function profile_resume($id){
      $data=[
         'education'=>education::where('user_id',auth()->user()->id)->get(),
         'workexperience'=>work_experience::where('user_id',auth()->user()->id)->get(),
         'certifications'=>certification::where('user_id',auth()->user()->id)->get(),
         'additional_info'=>additional_informations::where('user_id',auth()->user()->id)->get(),
         'languages'=>language::where('user_id',auth()->user()->id)->get(),
         'skills'=>skill::where('user_id',auth()->user()->id)->get()
      ];

      return view('web.pages.authprofile.profile_resume',compact('data'));
   }

   public  function add_education( Request $request){

         $education = new education;
         $education->user_id=$request->userid;
         $education->level_of_education= $request->level_of_education;
         $education->field_of_study= ucwords($request->field_of_study);
         $education->college_or_university= ucwords($request->college_or_university);
         $education->location= ucwords($request->education_location);
         $education->currently_enrolled=$request->currently_enrolled;
         $education->time_period_from= $request->time_period_from;
         if(empty($request->currently_enrolled)){
            $education->time_period_to =$request->time_period_to;
         }
         $education->status ='1';
         if($education->save()){
            return back();
         }
   }

   public function delete_education($id){
      if(education::where('id',$id)->delete()){
         return back();
      }
   }

   public function update_education($id,Request $request){
         $education = education::where('id',$id)->first();
         $education->level_of_education= $request->level_of_education;
         $education->field_of_study= ucwords($request->field_of_study);
         $education->college_or_university= ucwords($request->college_or_university);
         $education->location= ucwords($request->education_location);
         $education->currently_enrolled=$request->currently_enrolled;
         $education->time_period_from= $request->time_period_from;
         if(empty($request->currently_enrolled)){
            $education->time_period_to =$request->time_period_to;
         }else{
            $education->time_period_to =null;
         }

         if($education->save()){
            return back();
         }

   }



   public function add_experience(Request $request){
      $experience= new work_experience;
      $experience->user_id=$request->userid;
      $experience->job_title=ucwords($request->job_title);
      $experience->company_name=ucwords($request->company);
      $experience->location=ucwords($request->work_location);
      $experience->time_period=$request->work_time_period;
      $experience->work_time_period_from=$request->work_time_period_from;
      if(empty($request->work_time_period)){
       $experience->work_time_period_to=$request->work_time_period_to;  
      }
      $experience->job_description=$request->experience_description;
      $experience->status='1';
      if($experience->save()){
         return back();
      }
   }

   public function update_experience($id ,Request $request){
     
      $experience= work_experience::where('id',$id)->first();
      $experience->job_title=ucwords($request->job_title);
      $experience->company_name=ucwords($request->company);
      $experience->location=ucwords($request->work_location);
      $experience->time_period=$request->work_time_period;
      $experience->work_time_period_from=$request->work_time_period_from;
      if(empty($request->work_time_period)){
         $experience->work_time_period_to =$request->work_time_period_to;
      }else{
         $experience->work_time_period_to =null;
      }
      $experience->job_description=$request->experience_description;
      if($experience->save()){
         return back();
      }
   }

   public function delete_experience($id){
      if(work_experience::where('id',$id)->delete()){
         return back();
      }
   }


   public function add_certifications(Request $request){
      $certification= new certification;
      $certification->user_id= $request->userid;
      $certification->certification_title=ucwords($request->certification_title);
      $certification->certification_time_period= $request->certification_expire;
      $certification->certification_time_period_from= $request->certification_time_period_from;
         if(empty($request->certification_expire)){
            $certification->certification_time_period_to= $request->certification_time_period_to;
         }
      $certification->certification_description= $request->certification_description;
      $certification->status='1';
      if($certification->save()){
         return back();
      }

      
   }


   public function update_certifications($id , Request $request){
         $certification=certification::where('id',$id)->first();
         $certification->certification_title=ucwords($request->certification_title);
         $certification->certification_time_period= $request->certification_expire;
         $certification->certification_time_period_from= $request->certification_time_period_from;
         $certification->certification_description= $request->certification_description;
         if(empty($request->certification_expire)){
            $certification->certification_time_period_to= $request->certification_time_period_to;
         }else{
            $certification->certification_time_period_to=null;
         }
         if($certification->save()){
            return back();
         }
   }

   public function delete_certifications($id){
      if(certification::where('id',$id)->delete()){
         return back();
      }
   }

   public function add_additional_information(Request $request){
         if(empty($request->additional_information)){
            return back();
         }else{
            $information= new additional_informations;
            $information->user_id=$request->userid;
            $information->informations=$request->additional_information;
            $information->status='1';
            if($information->save()){
               return back();
            }
         }
   }

   public function update_additional_information($id,Request $request){
      if(empty($request->additional_information)){
         return back();
      }else{
         $information=additional_informations::where('id',$id)->first();
         $information->informations=$request->additional_information;
         if($information->save()){
            return back();
         }

      }
   }

   public function delete_informations($id){
      if(additional_informations::where('id',$id)->delete()){
         return back();
      }
   }


   public function add_language(Request $request){
      $language= new language;
      $language->user_id=$request->userid;
      $language->language=ucwords($request->language);
      $language->proficiency_language=$request->proficiency_language;
      $language->status='1';
      if($language->save()){
         return back();
      }
   }

   public function update_language ($id, Request $request){
      $language=language::where('id',$id)->first();
      $language->language=ucwords($request->language);
      $language->proficiency_language=$request->proficiency_language;
      if($language->save()){
         return back();
      }

   }

   public function delete_language ($id){
      if(language::where('id',$id)->delete()){
         return back();
      }
   }

   public function add_skill(Request $request){
      $skill=new skill;
      $skill->user_id=$request->userid;
      $skill->skill=ucwords($request->skill);
      $skill->proficiency_skill=$request->experience_skill;
      $skill->status='1';
      if($skill->save()){
         return back();
      }
   }

   public function update_skill($id,Request $request){
      $skill=skill::where('id',$id)->first();
      $skill->skill=ucwords($request->skill);
      $skill->proficiency_skill=$request->experience_skill;
      if($skill->save()){
         return back();
      }
   }

   public function delete_skill($id){
      if(skill::where('id',$id)->delete()){
         return back();
      }
   }

   public function Subscription_plan ($id){
      $category = get_user_meta(auth()->user()->id,'job_category');
      $subscriptions= subscription::where('for_category',$category)->where('status','1')->orwhere('for_category','all')->get();
      $have_subscription= payment::join('subscriptions','subscriptions.id','=','payments.subscription_id')->where('user_id',auth()->user()->id)->where('payment_done','1')->first();
      
      return view('web.pages.authprofile.sub_plan',['subscriptions'=>$subscriptions,'have_subscription'=>$have_subscription]);
   }


   public function select_plan($id){
      $plan = subscription ::where('id',$id)->first();
      $user= User::where('id',auth()->user()->id)->first();
      $recepit=Str::random('20');
      $api= new Api(env('RAZOR_KEY'),env('RAZOR_SECRET'));

         $order  = $api->order->create([
            'receipt'         => $recepit,
            'amount'          => $plan->subscription_price *100, 
            'currency'        => 'INR',
         ]);
       $orderId=$order['id'];
       $userdata= payment::where('user_id',auth()->user()->id)->first();
       if(!empty($userdata)){
         $payment= payment::where('user_id',auth()->user()->id)->first();
       }else{
         $payment= new payment;
       }
       $payment->user_id= $user->id;
       $payment->subscription_id=$plan->id;
       $payment->payment_id=$orderId; 
            
      if($payment->save()){
            $data=[
                  'plan'=>subscription::where('id',$id)->first(),
                  'user'=>User::where('id',auth()->user()->id)->first(),
                  'payment'=>$payment 
               ];
            return view('web.pages.authprofile.payment',compact('data')); 
      }  
   }

   public function pay(Request $request){
         
         $pay = payment::where('payment_id', $request->razorpay_order_id)->first();
         $data= subscription::where('id',$pay->subscription_id)->first();
      
         $pay->payment_done = true;
         $pay->razorpay_id = $request->razorpay_payment_id;
         date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
         $strt_time= date('d-m-Y H:i:s');
         $end_time= date('d-m-Y H:i:s',strtotime('+'.$data->subscription_days.' day', strtotime($strt_time)));

         $pay->start_time= $strt_time ;
         $pay->end_time= $end_time ;

         $api= new Api(env('RAZOR_KEY'),env('RAZOR_SECRET'));
               
         try{
               $attributes = array(
                  'razorpay_signature' => $request->razorpay_signature,
                  'razorpay_payment_id' => $request->razorpay_payment_id,
                  'razorpay_order_id' => $request->razorpay_order_id
               );
               $order = $api->utility->verifyPaymentSignature($attributes);
               $success = true;
         }catch(SignatureVerificationError $e){
               $succes = false;
         }
         if($success){
               $pay->save();
               return redirect('/')->with('success','congratulations you have subscriptions you have all control .');
         }else{
      
               return redirect('/')->with('error','something went worng,please try again ');
         }

   }

   public function applied_jobs (){
      $applied_jobs= appliedjob::select('job_actively_progress.actively_progress','jobs.id','jobs.job_title','jobs.employer','jobs.city','jobs.state','jobs.job_type','jobs.salary_minimum','jobs.salary_maximum','jobs.experience_minimum','jobs.experience_maximum','jobs.category')
                                 ->join('jobs','jobs.id','=','appliedjobs.job_id')
                                 ->join('job_actively_progress','job_actively_progress.job_id','=','appliedjobs.job_id')
                                 ->where('job_actively_progress.user_id',auth()->user()->id)->where('appliedjobs.user_id',auth()->user()->id)
                                 ->orderBy('appliedjobs.id','DESC')->get();

         return view('web.pages.authprofile.applied_jobs',['applied_jobs'=>$applied_jobs]);

   }

   public function apply_for_job($id){
      if (Auth::check()) {
         if(round(calculate_profile(auth()->user()->id)) > '92'){

        
         $check= appliedjob:: where('job_id',$id)->where('user_id',auth()->user()->id)->first();
         $checkprogress= actively_progress::where('job_id',$id)->where('user_id',auth()->user()->id)->first();
         $employer= job::where('id',$id)->first();
         $for=User::where('id',$employer->employer)->first();

         if(!empty($check)){
            if(!empty($checkprogress)){
               $checkprogress->delete();
            }
            $check->delete();
            return back();
         }else{
            $apply= new appliedjob;
            $apply->user_id= auth()->user()->id;
            $apply->job_id= $id;
            $progress= new actively_progress;
            $progress->user_id= auth()->user()->id;
            $progress->job_id= $id;
            $progress->actively_progress='1';
            $progress->save();

            $data=$apply;
          
            if($apply->save()){
                  $delay = now()->addMinutes(10);
                  $user= auth::user();
                  $for->notify((new noti_applyforjob($progress,$user))->delay(  ['database' => now()->addMinutes(5)]));
                  $user->notify((new noti_progress($progress,$for))->delay(  ['database' => now()->addMinutes(5)]));
                  
                  
               return back();
            }
         }
      }else{
         return back()->with('info', 'please update your profile');
      }
      }
   }

   public function interview_schedules (){
      $user_id= auth()->user()->id;

      $data= actively_progress::select('job_actively_progress.actively_progress','job_actively_progress.date','job_actively_progress.time','job_actively_progress.address','job_actively_progress.address','job_actively_progress.job_id','jobs.job_title','jobs.employer','jobs.id')
                              ->join('jobs','jobs.id','=','job_actively_progress.job_id')
                              ->where('job_actively_progress.actively_progress','3')
                              ->where('job_actively_progress.user_id',$user_id)->get();

         return view('web.pages.authprofile.Interview_schedule',['data'=>$data]);

   }

   public function user_notification(){
      return view('web.user_notification');
   }

   public function actively_update_user($job_id,$user_id,$data, Request  $request){
   
      $progress= actively_progress::where('user_id',$user_id)->where('job_id',$job_id)->first();
      $progress->actively_progress=$data; 
      if($data == '3'){
         $progress->time=$request->time;
         $progress->date=$request->date;
         $progress->address=$request->address;
         $progress->reason=$request->reason;
         $progress->status='1';
      }
      if($progress->save()){
      
         $employer= job::where('id',$job_id)->first();
         $for=User::where('id',$employer->employer)->first();
        getuser($user_id)->notify((new noti_progress($progress,$for))->delay(  ['database' => now()->addMinutes(5)]));
         return back();
      } 
   }


   
//****************************************************//
//****************************************************//
//*********************EMPLOYER PANEL*****************//
//****************************************************//
//****************************************************//

   public function employer_home (){
      $data= User::where('id',auth()->user()->id)->where('usertype','0')->first();
        return view('employer.deshboard',['data'=>$data]);
   }

   public function employer_all_job(){
      return view('employer.pages.job.job_list');
   }

   public function add_job(){
      return view('employer.pages.job.add_job');
   }


   public function job_list(Request $request){
      $user_id=auth()->user()->id;
      $job= job::all();

      $columns=array(
          0=>'job_title',
          1=>'employer',
          2=>'category',
          3=>'subject',
       
      );

      $jobs=job::where('employer',$user_id)->count();
      $jobsfiltered=$jobs;
      $limit = $request->input('length');
      $start = $request->input('start');
      $order = $columns[$request->input('order.0.column')];
      $dir = $request->input('order.0.dir');

      if(empty($request->input('search.value'))){
          $alljob=job::where('employer',$user_id)->offset($start)->limit($limit)->orderBy($order,$dir)->get();
      }else{

          $search=$request->input('search.value');
          $alljob= job::where('employer',$user_id)->where('job_title','LIKE',"%{$search}%")
              ->orwhere('employer','LIKE',"%{$search}%")
              ->orwhere('job_type','LIKE',"%{$search}%")
              ->orwhere('salary_type','LIKE',"%{$search}%")
              ->orwhere('process_state','LIKE',"%{$search}%")
              ->orwhere('process_city','LIKE',"%{$search}%")
              ->offset($start)->limit($limit)
              ->orderBy($order,$dir)->get();
          $jobsfiltered= job::where('employer',$user_id)->where('job_title','LIKE',"%{$search}%")
              ->orwhere('employer','LIKE',"%{$search}%")
              ->orwhere('job_type','LIKE',"%{$search}%")
              ->orwhere('salary_type','LIKE',"%{$search}%")
              ->orwhere('process_state','LIKE',"%{$search}%")
              ->orwhere('process_city','LIKE',"%{$search}%")
              ->count();

      }
      $alljobdata= array();
      if(!empty($alljob)){
          foreach($alljob as $job){
              if( $job->status == "0"){
                  $status= $status='<div class="mb-2 mr-2 badge badge-danger">Deactive</div>';
              }elseif($job->status == "1"){
                  $status='<div class="mb-2 mr-2 badge badge-success">Active</div>'; 
              }
             
              $applicants= appliedjob::where('job_id',$job->id)->count();
              $applicantsurl=url('employer/applicants/'.$job->id);
              $edit=url('employer/job/edit/'.$job->id.'') ;
              $delete=url('employer/job/delete/'.$job->id.'') ;
              $data['job_title']=$job->job_title;
              $data['employer']= getuser($job->employer)->name;
              $data['category']= getcategory($job->category)->name;
              $data['experience']=$job->experience_minimum.'y - '.$job->experience_maximum.'y';
              $data['salary']= $job->salary_minimum.' lac - '.$job->salary_maximum.' lac';
              $data['location']= getcity($job->process_city)->name.', '.getstate($job->process_state)->name;
              $data['status']=$status; 
              $data['applicant']='<a href="'.$applicantsurl.'" style="font-weight: bold;"><i class="fas fa-user"></i> '.$applicants.'</a>';
              $data['action']='<td>
              <a href="'.$edit.'"> <i class="far fa-edit" title="Edit category"></i></a>
              <a  class=" mr-2 mb-2  delete" data-href="'.$delete.'" data-toggle="modal" data-target="#exampleModal">
              <i class="far fa-trash-alt" data="delete"  title="Delete category"></i></a></td>';
              
              $alljobdata[]=$data;
         }
      }
      $json_data= array(
          "draw"=>intval($request->input('draw')),
          "recordsTotal"=>intval($jobs),
          "recordsFiltered" => intval($jobsfiltered),
          "data"=>$alljobdata 
        
      );
      echo json_encode($json_data); 
  }

   public function create_job(Request $request){
     
      $validator =   Validator::make($request->all(), [
         'job_title' => ['required'],
        
         'category' => ['required'],
         'subject' => ['required'],
         'minimum_qualifaction' => ['required'],
         'job_type' => ['required'],
         'no_of_requirement' => ['required'],
         'experience_minimum' => ['required'],
         'experience_maximum'=>['required'],
         'salary_type' => ['required'],
         'salary_minimum' => ['required'],
         'salary_maximum' => ['required'],
         'state' => ['required'],
         'city' => ['required'],
         'meta_title' => ['required'],
         'meta_description' => ['required'],
         'meta_keywords' => ['required'],
         'og_title' => ['required'],
         'og_description' => ['required'],
         'og_keywords' => ['required'],
         'selection_process' => ['required'],
         'process_address' => ['required'],
         'process_state' => ['required'],
         'process_city' => ['required'],
         'job_description' => ['required'],
         'document_requirement' => ['required'],
         'status'=>['required']

         
      ]);
      if ($validator->fails()) {
         return back()->withErrors($validator)->withInput();
      }else {
         if(!empty($request->jobid)){
            $data = job::where('id',$request->jobid)->first();
            $message=['success','Job has been updated successfully.'];
         }else if(empty($request->jobid)){
               $data= new job;
               $message=['success','Job has been created successfully.'];
         }
         
         $data->job_title=$request->job_title;
         $data->employer=auth()->user()->id;
         $data->category=$request->category;
         $data->subject=$request->subject;
         $data->minimum_qualifaction=$request->minimum_qualifaction;
         $data->job_type=$request->job_type;
         $data->no_of_requirement=$request->no_of_requirement;
         $data->experience_minimum=$request->experience_minimum;
         $data->experience_maximum=$request->experience_maximum;
         $data->salary_type=$request->salary_type;
         $data->salary_minimum=$request->salary_minimum;
         $data->salary_maximum=$request->salary_maximum;
         $data->state=$request->state;
         $data->city=$request->city;
         $data->meta_title=$request->meta_title;
         $data->meta_description=$request->meta_description;
         $data->meta_keywords=$request->meta_keywords;
         $data->og_title=$request->og_title;
         $data->og_description=$request->og_description;
         $data->og_keywords=$request->og_keywords;
         $data->selection_process=$request->selection_process;
         $data->process_address=$request->process_address;
         $data->process_state=$request->process_state;
         $data->process_city=$request->process_city;
         $data->job_description=$request->job_description;
         $data->document_requirement=$request->document_requirement;
         $data->status=$request->status;
         $data->publish_by=auth()->user()->id;

         if($data->save()){
            
            if(!empty($request->jobid)){

               return redirect('employer/all_job')->with('success','Job has been updated successfully.'); 
            }else{
                  $admin= User::where('usertype','0')->first();
                  $user= auth::user();
                  $admin->notify(new noti_jobadd($data,$user));
                  return redirect('employer/all_job')->with('success','Job has been created successfully.');
            }
            
         } 
      }  
   }
   public function job_edit($id){
      $data= job::where('id',$id)->first();
      return view('employer.pages.job.add_job',['jobedit'=>$data]);
   }

   public function applicants($id){
         $data= appliedjob::select('jobs.job_title as jobname','users.profile_image','users.name','users.email','users.id','job_actively_progress.actively_progress','appliedjobs.job_id','job_actively_progress.date','job_actively_progress.time','job_actively_progress.address')
                           ->join('users','users.id','=','appliedjobs.user_id')
                           ->join('job_actively_progress','job_actively_progress.user_id','=','appliedjobs.user_id')
                           ->join('jobs','jobs.id','=','appliedjobs.job_id')
                           ->where('job_actively_progress.job_id',$id)
                           ->where('appliedjobs.job_id',$id)->paginate(10);
         
         return view('employer.pages.applicants.applicants_on_job',['applicants'=>$data]);
   }

   public function applicant_details($id){
     
      $data=[
         'profile'=>User::where('id',$id)->first(),
         'education'=>education::where('user_id',$id)->get(),
         'work_experience'=>work_experience::where('user_id',$id)->get(),
         'skills'=>skill::where('user_id',$id)->get(),
         'certifications_Licenses'=>certification::where('user_id',$id)->get(),
         'languages'=>language::where('user_id',$id)->get(),
         'additional_information'=>additional_informations::where('user_id',$id)->get()
      ];
      return view('employer.pages.applicants.applicant_details',compact('data'));
   }

   public function all_applicants(){
      $user_id= auth()->user()->id;
      $applicants=job::join('appliedjobs','appliedjobs.job_id','=','jobs.id')->join('users', 'users.id','=','appliedjobs.user_id')->where('jobs.employer',$user_id)->paginate(10);

      return view('employer.pages.applicants.all_applicants',compact('applicants'));
   }

   public function actively_update($job_id,$user_id,$data, Request  $request){
   
      $progress= actively_progress::where('user_id',$user_id)->where('job_id',$job_id)->first();
      $progress->actively_progress=$data; 
      if($data == '3'){
         $progress->time=$request->time;
         $progress->date=$request->date;
         $progress->address=$request->address;
         $progress->reason=$request->reason;
         $progress->status='1';
      }
      if($progress->save()){
      
         $employer= job::where('id',$job_id)->first();
         $for=User::where('id',$employer->employer)->first();
        getuser($user_id)->notify((new noti_progress($progress,$for))->delay(  ['database' => now()->addMinutes(5)]));
         return back();
      } 
   }

   public function notification(){
      return view('employer.notification');
   }
   
   public function employer_profile(){
      $profile= User::where('id',auth()->user()->id)->first();

      return view('employer.pages.profile',['edit_employer'=>$profile]);
   }

   public function update_profile(Request $request){
      $validator =   Validator::make($request->all(), [
         'employer_name' => ['required'],
         'email' => ['string', 'email', 'max:255','unique:users,email,'.$request->userid],
         'employer_mobile' => ['required','min:11','numeric'],
         'employer_website' => ['required','string'],
         'employee_working' => ['required','string'],
         'salary_day' => ['required','numeric'],
         'employer_level' => ['required','numeric'],
         'contact_person_name' => ['required','string'],
         'State' => ['required','string'],
         'contact_person_designation' => ['required','string'],
         'City' => ['required','string'],
         'contact_person_email' => ['string', 'email', 'max:255'],
       
         'contact_person_mobile' => ['required','string'],
         'address'=>['required','required'],
         'description'=>['required'],
         'cover_image' => ['image','mimes:jpeg,png,jpg'],
         'profile_image' => ['image','mimes:jpeg,png,jpg'], 
     ]);
     if ($validator->fails()) {
       return back()->withErrors($validator)->with('error','Employer has been Updated successfully.');;
     }else {
             $data=User::where('id',$request->userid)->first();
   
             $data->name=$request->employer_name;
             /* $data->email=$request->email; */
            /*  $data->person_email=$request->contact_person_email; */
            /*  $data->password=hash::make($request->empolyer_password); */
             $data->website=$request->employer_website;
             $data->employee_working=$request->employee_working;
             $data->salary_day=$request->salary_day;
             $data->employer_level= $request->employer_level;
             $data->person_name=$request->contact_person_name;
             $data->state=$request->State;
             $data->city=$request->City;
             $data->person_designation=$request->contact_person_designation;
             $data->description=$request->description;
             $data->status=$request->status;
             $data->premium_status=$request->premium_status;
             $data->profile_status=$request->profile_status;
             $data->address=$request->address;
             $data->mobile=$request->employer_mobile;
             $data->person_mobile=$request->contact_person_mobile;
         if($request->hasfile('profile_image')){
             $path=public_path('assest/web/assest/images/profile_image');
             $oldprofile= $path.'/'.$request->profile_image;
             @unlink($oldprofile);
             $filename= Str::random(7).time().'.'.$request->file('profile_image')->Extension();
             $image= $request->file('profile_image')->move($path,$filename);
             $data->profile_image=$filename ;
         }
         if($request->hasfile('cover_image')){
             $path=public_path('assest/web/assest/images/cover_image');
             $oldprofile= $path.'/'.$request->profile_image;
             @unlink($oldprofile);
             $filename= Str::random(7).time().'.'.$request->file('cover_image')->Extension();
             $image= $request->file('cover_image')->move($path,$filename);
             $data->cover_image=$filename ;
         }
         if($data->save()){
             return back()->with('success','Employer has been Updated successfully.');
         }
      }
   }
}
