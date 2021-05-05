<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\job;
use App\Models\city;
use App\Models\qualification;
use App\Models\contentcategory;
use App\Models\subscription;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class adminController extends Controller
{
    public function index(){
        $data= User::where('id',auth()->user()->id)->where('usertype','0')->first();
        return view('admin.deshboard',['data'=>$data]);
    }
    public function profile(){
        $user_id= auth()->user()->id;
        $profile= User::where('id',$user_id)->first();
        return view('admin.pages.profile',['profile'=>$profile]);
    }

    public function update_profile(Request $request){

       
        $validator =   Validator::make($request->all(), [
        'name' => ['required'],
        'cover_image' => ['image','mimes:jpeg,png,jpg'],
        'profile_image' => ['image','mimes:jpeg,png,jpg'], 
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withinput();
          }else {
                  $user= User::where('id',auth()->user()->id)->first() ;
                  $user->name=$request->name;
                 
                  if($request->hasfile('profile_image')){
                      $path=public_path('assest/web/assest/images/profile_image');
                      $filename= Str::random(7).time().'.'.$request->file('profile_image')->Extension();
                      $image= $request->file('profile_image')->move($path,$filename);
                      $user->profile_image=$filename ;
                  }
                  if($request->hasfile('cover_image')){
                      $path=public_path('assest/web/assest/images/cover_image');
                      $filename= Str::random(7).time().'.'.$request->file('cover_image')->Extension();
                      $image= $request->file('cover_image')->move($path,$filename);
                      $user->cover_image=$filename ;
                  }
                  if($user->save()){
                      return back()->with('success','profile  has been Updated successfully.');
                  }
  
  
          }

        
    }
    ///emoloyer


    public function add_employer(){
        return view('admin.pages.user.add_employer');
    }
    public function city($id){
      
        $city= city::where('state_id',$id)->get();
        return response()->json(['city'=>$city]); 
    }

    public function job_category($id){
        $jobcategory= contentcategory::where('parent_id',$id)->get();
        return response()->json(['category'=>$jobcategory]);
    }
    public function create_employer(Request $request){
        $validator =   Validator::make($request->all(), [
            'employer_name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'employer_mobile' => ['required','min:11','numeric'],
            'empolyer_password' => ['required','min:6'],
            'employer_website' => ['required','string'],
            'employee_working' => ['required','string'],
            'salary_day' => ['required','numeric'],
            'employer_level' => ['required','numeric'],
            'contact_person_name' => ['required','string'],
            'State' => ['required','string'],
            'contact_person_designation' => ['required','string'],
            'City' => ['required','string'],
            'contact_person_email' => ['required', 'string', 'email', 'max:255','unique:users,person_email'],
            'status' => ['required','string'],
            'premium_status' => ['required','string'],
            'profile_status' => ['required','string'],
            'contact_person_mobile' => ['required','string'],
            'address'=>['required','required'],
            'description'=>['required'],
            'cover_image' => ['image','mimes:jpeg,png,jpg'],
            'profile_image' => ['image','mimes:jpeg,png,jpg'], 
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withinput();
        }else {
                $employer= new User;
                $employer->name=$request->employer_name;
                $employer->email=$request->email;
                $employer->person_email=$request->contact_person_email;
                $employer->password=hash::make($request->empolyer_password);
                $employer->website=$request->employer_website;
                $employer->employee_working=$request->employee_working;
                $employer->salary_day=$request->salary_day;
                $employer->employer_level= $request->employer_level;
                $employer->person_name=$request->contact_person_name;
                $employer->state=$request->State;
                $employer->city=$request->City;
                $employer->person_designation=$request->contact_person_designation;
                $employer->description=$request->description;
                $employer->status=$request->status;
                $employer->premium_status=$request->premium_status;
                $employer->profile_status=$request->profile_status;
                $employer->address=$request->address;
                $employer->mobile=$request->employer_mobile;
                $employer->person_mobile=$request->contact_person_mobile;
                $employer->usertype='1';
                if($request->hasfile('profile_image')){
                    $path=public_path('assest/web/assest/images/profile_image');
                    $filename= Str::random(7).time().'.'.$request->file('profile_image')->Extension();
                    $image= $request->file('profile_image')->move($path,$filename);
                    $employer->profile_image=$filename ;
                }
                if($request->hasfile('cover_image')){
                    $path=public_path('assest/web/assest/images/cover_image');
                    $filename= Str::random(7).time().'.'.$request->file('cover_image')->Extension();
                    $image= $request->file('cover_image')->move($path,$filename);
                    $employer->cover_image=$filename ;
                }
                if($employer->save()){
                    return redirect('admin/employer');
                }


        }
    }

    public function employer_permissions($id){
        $data=User::where('id',$id)->first();
       
       /*  $kaml= explode(",",$data->permissions); */
        $kaml=$data->permissions;
       
        return view('admin.pages.user.employer_permissions',['userid'=>$id,'permissions'=> $kaml]);
    }

    public function add_employer_permission(Request $request){
        $data=User::where('id',$request->userid)->first();

        $permissions='';
        $permissions.=implode(',',$request->permissions);
        $data->permissions=$permissions;
        if($data->save()){
            return back()->with('success','Permission has been Updated successfully.');
        }
      
    }

    public function employer(){
        return view('admin.pages.user.employer');
    }
    public function employerlist(Request $request){
         /*    $product = User::where('usertype','1')->paginate(20); */
            $columns=array(
                       
                      0=>'profile_image',
                      1=>'cover_image',
                      2=>'name',
                      3=>'email',
                      4=>'mobile',
                     
                     );
   
                   $employers = User::where('usertype','1')->count();
                   $productfiltered =$employers;
                   $limit = $request->input('length');
                   $start = $request->input('start');
                   $order = $columns[$request->input('order.0.column')];
                   $dir = $request->input('order.0.dir');
   
                   if(empty($request->input('search.value'))){
                       $allemployers= User::where('usertype','1')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
                   }else{
                       $search=$request->input('search.value');
                       $allemployers = User::where('usertype','1')
                        ->orwhere('name','LIKE',"%{$search}%")
                           ->orWhere('email', 'LIKE',"%{$search}%")
                          ->offset($start)->limit($limit)
                           ->orderBy($order,$dir)->get();
                       
                       $productfiltered = User::where('usertype','1')
                                ->orwhere('name','LIKE',"%{$search}%")
                                ->orWhere('email', 'LIKE',"%{$search}%")
                                ->count();
                    }
   
                    $allemployersdata=array();
                   if(!empty($allemployers)){
                       foreach($allemployers as $employer){
                        if($employer->status == '0'){
                            $status='<div class="mb-2 mr-2 badge badge-danger">Deactive</div>';
                        }elseif($employer->status == '1'){
                            $status='<div class="mb-2 mr-2 badge badge-success">Active</div>';
                        }   
                            $path=asset('assest/web/assest/images/');
                           $edit=url('admin/employer/edit/'.$employer->id.'') ;
                           $delete=url('admin/employer/delete/'.$employer->id.'') ;
                           $permissions=url('admin/employer_permissions/'.$employer->id);
                            $data['profile']='<a href="'.$path.'/profile_image/'.$employer->profile_image.'" target="_blank"><img class="profile-list" src="'.$path.'/profile_image/'.$employer->profile_image.'" title="view profile image"></a>';
                           $data['cover']='<a href="'.$path.'/cover_image/'.$employer->cover_image.'" target="_blank"><img class="cover-list" src="'.$path.'/cover_image/'.$employer->cover_image.'" title="view cover image"></a>'; 
                        
                           $data['name']=$employer->name;
                           $data['email']=$employer->email;
                           $data['mobile']=$employer->mobile;
                            $data['status']=$status;
                           $data['action']='<td>
                           <a href="'.$edit.'"> <i class="far fa-edit" title="Edit category"></i></a>
                           <a href="'.$permissions.'"><i class="fas fa-key" title="Permissons"></i></a>
                           <a  class=" mr-2 mb-2  delete" data-href="'.$delete.'" data-toggle="modal" data-target="#exampleModal">
                           <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                           </a>
                           </td>
                           
                           ';
                           $allemployersdata[]=$data;
   
                       }
                   }
                   $json_data = array(
                       "draw" => intval($request->input('draw')),
                       "recordsTotal"=>intval($employers),
                       "recordsFiltered" => intval($productfiltered),
                       "data"=>$allemployersdata 
   
                   );
                   echo json_encode($json_data); 
    
    }
    public function employer_edit($id){
        $data=User::where('id',$id)->first();
        return view('admin.pages.user.employer_edit',['edit_employer'=>$data]);
    }

    public function update_employer(Request $request){
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
            'contact_person_email' => ['string', 'email', 'max:255','unique:users,person_email,'.$request->userid],
            'status' => ['required','string'],
            'premium_status' => ['required','string'],
            'profile_status' => ['required','string'],
            'contact_person_mobile' => ['required','string'],
            'address'=>['required','required'],
            'description'=>['required'],
            'cover_image' => ['image','mimes:jpeg,png,jpg'],
            'profile_image' => ['image','mimes:jpeg,png,jpg'], 
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator);
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
                return redirect('admin/employer')->with('success','Employer has been Updated successfully.');
            }
         }
    }
    public function employer_delete($id){
        $data= User::where('id',$id)->first();
        $profile_path=public_path('assest/web/assest/images/profile_image/'.$data->profile_image);
        $cover_path=public_path('assest/web/assest/images/cover_image/'.$data->cover_image);
        if(!empty($data)){
           /*  echo $cover_path; die; */
             if($data->delete()){
                if(file_exists($profile_path)){
                     @unlink($profile_path);
                }
                if(file_exists($cover_path)){
                    @unlink($cover_path);
                }
            }
        }
        return redirect('admin/employer')->with('success','Employer has been deleted successfully.');
    }

   ///employee


    public function add_employee(){
      return view('admin.pages.user.add_employee');
    }
    public function employe(){
        return view('admin.pages.user.employe');
    }
    public function create_employee(Request $request){
       
        $validator =   Validator::make($request->all(), [
            'employee_name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'employee_mobile' => ['required','min:11','numeric'],
            'empolyee_password' => ['required','min:6'],
            'State' => ['required','string'],
          
            'City' => ['required','string'],
            'status' => ['required','string'],
         
            'cover_image' => ['image','mimes:jpeg,png,jpg'],
            'profile_image' => ['image','mimes:jpeg,png,jpg'], 
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withinput();
        }else {
                $employer= new User;
                $employer->name=$request->employee_name;
                $employer->email=$request->email;
            
                $employer->password=hash::make($request->empolyee_password);
                $employer->state=$request->State;
                $employer->city=$request->City;
                $employer->description=$request->description;
                $employer->status=$request->status;
                $employer->mobile=$request->employee_mobile;
                $employer->usertype='2';
                if($request->hasfile('profile_image')){
                    $path=public_path('assest/web/assest/images/profile_image');
                    $filename= Str::random(7).time().'.'.$request->file('profile_image')->Extension();
                    $image= $request->file('profile_image')->move($path,$filename);
                    $employer->profile_image=$filename ;
                }
                if($request->hasfile('cover_image')){
                    $path=public_path('assest/web/assest/images/cover_image');
                    $filename= Str::random(7).time().'.'.$request->file('cover_image')->Extension();
                    $image= $request->file('cover_image')->move($path,$filename);
                    $employer->cover_image=$filename ;
                }
                if($employer->save()){
                    return redirect('admin/employe')->with('success','Employee has been  created successfully.');
                }


        }
    }
    public function employelist(Request $request){
        $product = User::where('usertype','2')->paginate(10);
         $columns=array(
                    
               
                    0=>'profile_image',
                    1=>'cover_image',
                    2=>'name',
                    3=>'email',
                    4=>'mobile',
                    5=>'status'
                 
                  
                );

                $employers = User::where('usertype','2')->count();
                $productfiltered =$employers;
                $limit = $request->input('length');
                $start = $request->input('start');
                $order = $columns[$request->input('order.0.column')];
                $dir = $request->input('order.0.dir');

                if(empty($request->input('search.value'))){
                    $allemployers= User::where('usertype','2')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
                }else{
                    $search=$request->input('search.value');
                    $allemployers = User::where('usertype','2')
                     ->orwhere('name','LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                       ->offset($start)->limit($limit)
                        ->orderBy($order,$dir)->get();
                    
                    $productfiltered = User::where('usertype','2')
                             ->orwhere('name','LIKE',"%{$search}%")
                             ->orWhere('email', 'LIKE',"%{$search}%")
                             ->count();
                 }

                 $allemployersdata=array();
                if(!empty($allemployers)){
                    foreach($allemployers as $employer){
                        if($employer->status == '0'){
                            $status='<div class="mb-2 mr-2 badge badge-danger">Deactive</div>';
                        }elseif($employer->status == '1'){
                            $status='<div class="mb-2 mr-2 badge badge-success">Active</div>';
                        } 
                        $path=asset('assest/web/assest/images/');
                        $edit=url('admin/employe/edit/'.$employer->id.'') ;
                        $delete=url('admin/employee/delete/'.$employer->id.'') ;
                        $permissions=url('admin/employee_permissions/'.$employer->id);
                        $data['profile']='<a href="'.$path.'/profile_image/'.$employer->profile_image.'" target="_blank"><img class="profile-list" src="'.$path.'/profile_image/'.$employer->profile_image.'" title="view profile image"></a>';
                        $data['cover']='<a href="'.$path.'/cover_image/'.$employer->cover_image.'" target="_blank"><img class="cover-list" src="'.$path.'/cover_image/'.$employer->cover_image.'" title="view cover image"></a>';
                        $data['name']=$employer->name;
                        $data['email']=$employer->email;
                        $data['status']= $status;
                        $data['action']='<td>
                        <a href="'.$edit.'"> <i class="far fa-edit" title="Edit category"></i></a>
                        <a href="'. $permissions.'"><i class="fas fa-key" title="Permissons"></i></a>
                        <a  class=" mr-2 mb-2  delete" data-href="'.$delete.'" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                        </a>
                       
                        </td>
                        ';
                        $allemployersdata[]=$data;

                    }
                }
                $json_data = array(
                    "draw" => intval($request->input('draw')),
                    "recordsTotal"=>intval($employers),
                    "recordsFiltered" => intval($productfiltered),
                    "data"=>$allemployersdata 

                );
                echo json_encode($json_data); 
    }

    public function employe_edit($id){
        $data=User::where('id',$id)->first();
        return view('admin.pages.user.employe_edit',['edit_employe'=>$data]);
    }
    public function update_employe(Request $request){
       
        $validator =   Validator::make($request->all(), [
            'employee_name' => ['required'],
         
            'State' => ['required','string'],
            'City' => ['required','string'],
            'status' => ['required','string'],
            'cover_image' => ['image','mimes:jpeg,png,jpg'],
            'profile_image' => ['image','mimes:jpeg,png,jpg'], 
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator);
        }else {
            
            $data=User::where('id',$request->userid)->first();
            $data->name=$request->employee_name;
            /* $data->email=$request->email; */
           /*  $data->person_email=$request->contact_person_email; */
           /*  $data->password=hash::make($request->empolyer_password); */
          
            $data->state=$request->State;
            $data->city=$request->City;
         
            $data->description=$request->description;
            $data->status=$request->status;
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
            return redirect('admin/employe')->with('success','Employe has been updated successfully.');
        }
     }
    }

    public function employee_delete($id){
       
        $data= User::where('id',$id)->first();
        $profile_path=public_path('assest/web/assest/images/profile_image/'.$data->profile_image);
        $cover_path=public_path('assest/web/assest/images/cover_image/'.$data->cover_image);
        if(!empty($data)){
           
             if($data->delete()){
                if(file_exists($profile_path)){
                     @unlink($profile_path);
                }
                if(file_exists($cover_path)){
                    @unlink($cover_path);
                }
            }
        }
        return redirect('admin/employe')->with('success','Employee has been deleted successfully.');
    }


///category

    public function main_category(){
        $data=contentcategory::where('parent_id','0')->get();
        return  view('admin.pages.category.main_category',['main_category'=>$data]);    
    }
    public function add_category(){
    /*     $data=contentcategory::where('parent_id','0')->get(); */
        return view('admin.pages.category.add_category');
    }

    
    public function create_category(Request $request){
        $validator =   Validator::make($request->all(), [
            'category_name' => ['required'],
            'status' => ['required'],
            'Meta_title' => ['required'],
            'Meta_description' => ['required'],
            'description' => ['required'],
            'Category_image' => ['required','image','mimes:jpeg,png,jpg'],
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }else {
            $category= new contentcategory;
           $category->name=$request->category_name;
           $category->meta_title=$request->Meta_title;
           $category->meta_description=$request->Meta_description;
           $category->description=$request->description;
           $category->status=$request->status;
           if($request->hasfile('Category_image')){
                $path=public_path('assest/web/assest/images/categoryimages');
                $filename= Str::random(7).time().'.'.$request->file('Category_image')->Extension();
                $image= $request->file('Category_image')->move($path,$filename);
                $category->image=$filename ;
            }
            if(!empty($request->parent_category)){
                $category->parent_id=$request->parent_category;
            }else{
                $category->parent_id='0';
            }
            if($category->save()){
                return back()->with('success','Category has been created successfully.');
            }

        }    
    }

    public function subcategory($id){
        $data=contentcategory::where('parent_id',$id)->get();

        return view('admin.pages.category.subcategory',['subcategory'=>$data]);

    }
    public function edit_maincategory($id){
      /*   $data=contentcategory::where('parent_id','0')->get(); */
        $editdata= contentcategory::where('id',$id)->first();
        return view('admin.pages.category.add_category',['editdata'=>$editdata]);
    }
    public function update_category(Request $request){
        $validator =   Validator::make($request->all(), [
            'category_name' => ['required'],
            'status' => ['required'],
            'Meta_title' => ['required'],
            'Meta_description' => ['required'],
            'description' => ['required'],
             'Category_image' => ['image','mimes:jpeg,png,jpg'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else {
            /* print_r($request->categoryid); exit(); */
            $category=contentcategory::where('id',$request->categoryid)->first();
            $category->name=$request->category_name;
            $category->meta_title=$request->Meta_title;
            $category->meta_description=$request->Meta_description;
            $category->description=$request->description;
            $category->status=$request->status;
            if($request->hasfile('Category_image')){
                $path=public_path('assest/web/assest/images/categoryimages');
                @unlink($path.'/'.$category->image);
                $filename= Str::random(7).time().'.'.$request->file('Category_image')->Extension();
                $image= $request->file('Category_image')->move($path,$filename);
                $category->image=$filename ;
            }
            if(!empty($request->parent_category)){
                $category->parent_id=$request->parent_category;
            }else{
                $category->parent_id='0';
            }
            if($category->save()){
                return back()->with('success','Category has been updated successfully.');
            }
        }
        
    }

    public function update_subcategory(Request $request){
        $validator =   Validator::make($request->all(), [
            'parent_category' => ['required'],
            'category_name' => ['required'],
            'status' => ['required'],
            'Meta_title' => ['required'],
            'Meta_description' => ['required'],
            'description' => ['required'],
             'Category_image' => ['image','mimes:jpeg,png,jpg'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else {
            /* print_r($request->categoryid); exit(); */
            $category=contentcategory::where('id',$request->categoryid)->first();
            $category->name=$request->category_name;
            $category->meta_title=$request->Meta_title;
            $category->meta_description=$request->Meta_description;
            $category->description=$request->description;
            $category->status=$request->status;
            if($request->hasfile('Category_image')){
                $path=public_path('assest/web/assest/images/categoryimages');
                @unlink($path.'/'.$category->image);
                $filename= Str::random(7).time().'.'.$request->file('Category_image')->Extension();
                $image= $request->file('Category_image')->move($path,$filename);
                $category->image=$filename ;
            }
            if(!empty($request->parent_category)){
                $category->parent_id=$request->parent_category;
            }else{
                $category->parent_id='0';
            }
            if($category->save()){
                return redirect('admin/main_category/subcategory/'.$category->parent_id.'')->with('success','Sub-Category has been updated successfully.');
            }
        }
        
    }

    public function category_delete($id){
        $category=contentcategory::where('id',$id)->first();
        $subcategory=contentcategory::where('parent_id',$id)->get();
        
        $path=public_path('assest/web/assest/images/categoryimages');
        $category_image= $path.'/'.$category->image;

         if(!empty($category)){
            if($category->delete()){
                if(file_exists($category_image)){
                    @unlink($category_image);
                }
                foreach($subcategory as $data){
                    if(!empty($data)){
                        $subcategory_image= $path.'/'.$data->image;
                        if($data->delete()){
                            if(file_exists($subcategory_image)){
                                @unlink($subcategory_image);
                            }
                        }
                    }
                }
            }
        } 
        return back()->with('success','Category has been deleted successfully.');
    }

    ///job
    public function all_job(){
        return view('admin.pages.job.job_list');
    }
    public function add_job(){
       return view('admin.pages.job.add_job');
    }

    public function create_job(Request $request){
        $validator =   Validator::make($request->all(), [
            'job_title' => ['required'],
            'employer' => ['required'],
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
            $data->employer=$request->employer;
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
                   return redirect('admin/all_job')->with('success','Job has been updated successfully.'); 
                }else{
                    return redirect('admin/all_job')->with('success','Job has been created successfully.');
                }
                
            } 
        }  
    }

    public function job_list(Request $request){
        $job= job::all();

        $columns=array(
            0=>'job_title',
            1=>'employer',
            2=>'category',
            3=>'subject',
         
        );

        $jobs=job::count();
        $jobsfiltered=$jobs;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $alljob=job::offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else{

            $search=$request->input('search.value');
            $alljob= job::where('job_title','LIKE',"%{$search}%")
                ->orwhere('employer','LIKE',"%{$search}%")
                ->orwhere('job_type','LIKE',"%{$search}%")
                ->orwhere('salary_type','LIKE',"%{$search}%")
                ->orwhere('process_state','LIKE',"%{$search}%")
                ->orwhere('process_city','LIKE',"%{$search}%")
                ->offset($start)->limit($limit)
                ->orderBy($order,$dir)->get();
            $jobsfiltered= job::where('job_title','LIKE',"%{$search}%")
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
               

                $edit=url('admin/job/edit/'.$job->id.'') ;
                $delete=url('admin/job/delete/'.$job->id.'') ;
                $data['job_title']=$job->job_title;
                $data['employer']= getuser($job->employer)->name;
                $data['category']= getcategory($job->category)->name;
                $data['experience']=$job->experience_minimum.'y - '.$job->experience_maximum.'y';
                $data['salary']= $job->salary_minimum.' lac - '.$job->salary_maximum.' lac';
                $data['location']= getcity($job->process_city)->name.', '.getstate($job->process_state)->name;
                $data['status']=$status; 
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
    public function job_edit($id){
        $data= job::where('id',$id)->first();
        return view('admin.pages.job.add_job',['jobedit'=>$data]);

    }
    public function job_delete($id){
        if(job::where('id',$id)->delete()){
            return redirect('admin/all_job')->with('success','Job has been deleted successfully.');
        }
    }


    //qualification

    public function qualification(){
        return view('admin.pages.qualification.qualification');
    }
    public function create_qualification(Request $request){
        if(!empty($request->qualificationid)){
            $validator =   Validator::make($request->all(), [
               
                'qualification_name' => ['required','unique:qualifications,qualification_name,'.$request->qualificationid],
                'status' => ['required'],
             ]);
            
        }else{
            $validator =   Validator::make($request->all(), [
                'qualification_name' => ['required','unique:qualifications,qualification_name'],
                'status' => ['required'],
               
            ]);
        }
       
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else {
            if(!empty($request->qualificationid)){
                $data=qualification::where('id',$request->qualificationid)->first();
            }else{
                $data = new qualification;
            }
            $data->qualification_name=$request->qualification_name;
            $data->status=$request->status;
            if($data->save()){
                if(!empty($request->qualificationid)){
                    return redirect('admin/qualification')->with('success','Qualification has been updated successfully.');
                }else{
                    return redirect('admin/qualification')->with('success','Qualification has been created successfully.');
                }
                
            }
        }
    }
    public function qualification_delete($id){
        if(qualification::where('id',$id)->delete()){
            return redirect('admin/qualification') ->with('success','Qualification has been deleted successfully.');
        }
    }
    public function qualification_list(Request $request){
        $product = qualification::paginate(5);

        $columns=array(
                   
                  0=>'qualification_name',
                  1=>'status',
               );

               $qualifications = qualification::count();
               $qualificationfiltered =$qualifications;
               $limit = $request->input('length');
               $start = $request->input('start');
               $order = $columns[$request->input('order.0.column')];
               $dir = $request->input('order.0.dir');

               if(empty($request->input('search.value'))){
                   $allqualification= qualification::offset($start)->limit($limit)->orderBy($order,$dir)->get();
               }else{
                   $search=$request->input('search.value');
                   $allqualification = qualification::where('qualification_name','LIKE',"%{$search}%")
                                        ->offset($start)->limit($limit)
                                        ->orderBy($order,$dir)->get();
                   
                   $qualificationfiltered = qualification::where('qualification_name','LIKE',"%{$search}%")
                                            ->count();
                }

                $allqualificationdata=array();
               if(!empty($allqualification)){
                   foreach($allqualification as $qualification){
                    if($qualification->status == '0'){
                        $status='<div class="mb-2 mr-2 badge badge-danger">Deactive</div>';
                    }elseif($qualification->status == '1'){
                        $status='<div class="mb-2 mr-2 badge badge-success">Active</div>';
                    }   
                        
                       $edit=url('admin/qualification/edit/'.$qualification->id.'') ;
                       $delete=url('admin/qualification/delete/'.$qualification->id.'') ;
                       $data['name']=$qualification->qualification_name;
                       $data['status']=$status;
                       $data['action']='<td>
                       <a href="'.$edit.'"> <i class="far fa-edit" title="Edit category"></i></a>
                    
                       <a  class=" mr-2 mb-2  delete" data-href="'.$delete.'" data-toggle="modal" data-target="#exampleModal">
                       <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                       </a>
                       </td>
                       
                       ';
                       $allqualificationdata[]=$data;

                   }
               }
               $json_data = array(
                   "draw" => intval($request->input('draw')),
                   "recordsTotal"=>intval($qualifications),
                   "recordsFiltered" => intval($qualificationfiltered),
                   "data"=>$allqualificationdata 

               );
               echo json_encode($json_data); 

    }

    public function qualification_edit($id){
       $data= qualification::where('id',$id)->first();
       return view('admin.pages.qualification.qualification',['qualification_edit'=>$data]);
    }

    public function subscription(){
        return view('admin.pages.subscription.subscriptionlist');
    }
    public function subscription_list(Request $request){
      /**/   $subscription= subscription::all(); 

        $columns=array(
            0=>'subscription_title',
            1=>'subscription_price',
            2=>'subscription_days',
         );

        $subscriptions=subscription::count();
        $subscriptionsfiltered=$subscriptions;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $allsubscription=subscription::offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else{

            $search=$request->input('search.value');
            $allsubscription= subscription::where('subscription_title','LIKE',"%{$search}%")
                ->orwhere('subscription_price','LIKE',"%{$search}%")
                ->orwhere('subscription_days','LIKE',"%{$search}%")
                ->offset($start)->limit($limit)
                ->orderBy($order,$dir)->get();
            $subscriptionsfiltered= subscription::where('subscription_title','LIKE',"%{$search}%")
                ->orwhere('subscription_price','LIKE',"%{$search}%")
                ->orwhere('subscription_days','LIKE',"%{$search}%")
                ->count();

        }
        $allsubscriptiondata= array();
        if(!empty($allsubscription)){
            foreach($allsubscription as $subscription){
                if( $subscription->status == "0"){
                    $status= $status='<div class="mb-2 mr-2 badge badge-danger">Deactive</div>';
                }elseif($subscription->status == "1"){
                    $status='<div class="mb-2 mr-2 badge badge-success">Active</div>'; 
                }
               

                $edit=url('admin/subscription/edit/'.$subscription->id.'') ;
                $delete=url('admin/subscription/delete/'.$subscription->id.'') ;
                $data['subscription_title']=$subscription->subscription_title;
                $data['subscription_price']=$subscription->subscription_price;
                $data['subscription_days']= $subscription->subscription_days;
                if($subscription->for_category !== 'all' ){
                    $data['subscription_category']= getcategory($subscription->for_category)->name;
                }else{
                    $data['subscription_category']= ucfirst($subscription->for_category);
                }
                
                $data['subscription_features']= $subscription->subscription_features;
                $data['status']=$status; 
                $data['action']='<td>
                <a href="'.$edit.'"> <i class="far fa-edit" title="Edit category"></i></a>
                <a  class=" mr-2 mb-2  delete" data-href="'.$delete.'" data-toggle="modal" data-target="#exampleModal">
                <i class="far fa-trash-alt" data="delete"  title="Delete category"></i></a></td>';
                
                $allsubscriptiondata[]=$data;


            }
        }
        $json_data= array(
            "draw"=>intval($request->input('draw')),
            "recordsTotal"=>intval($subscriptions),
            "recordsFiltered" => intval($subscriptionsfiltered),
            "data"=>$allsubscriptiondata 
          
        );
        echo json_encode($json_data); 
    }

    public function add_subscription(){
        return view('admin.pages.subscription.add_subscription');
    }

    public function create_subscription(Request $request){
        $validator =   Validator::make($request->all(), [
            'subscription_title' => ['required'],
            'subscription_price' => ['required'],
            'subscription_days' => ['required'],
            'subscription_features'=>['required'],
            'category' => ['required'],
            'paid_type' => ['required'],
            'payment_type' => ['required'],
            'status' => ['required']
      ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $subscription= new subscription;
            $subscription->subscription_title=ucfirst($request->subscription_title);
            $subscription->subscription_price=$request->subscription_price;
            $subscription->for_category =$request->category;
            $subscription->subscription_days=$request->subscription_days;
            $subscription->paid_type=$request->paid_type;
            $subscription->payment_type=$request->payment_type;
            $subscription->subscription_features=$request->subscription_features;
            $subscription->status=$request->status;
            if($subscription->save()){
                return redirect('admin/subscription')->with('success','Subscription has been created successfully.');
            }

        }
        
    }
    public function  edit_subscription($id){
        $data=subscription::where('id',$id)->first();
        return view('admin.pages.subscription.edit_subscription',compact('data'));
    }
    public function update_subscription(Request $request){
        $validator =   Validator::make($request->all(), [
            'subscription_title' => ['required'],
            'subscription_price' => ['required'],
            'subscription_days' => ['required'],
            'subscription_features'=>['required'],
            'category' => ['required'],
            'status' => ['required']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
           
             $subscription=subscription::where('id',$request->sub_id)->first();
           
            $subscription->subscription_title=ucfirst($request->subscription_title);
            $subscription->subscription_price=$request->subscription_price;
            $subscription->for_category =$request->category;
            $subscription->subscription_days=$request->subscription_days;
            $subscription->subscription_features=$request->subscription_features;
            $subscription->status=$request->status;
            if($subscription->save()){
                return redirect('admin/subscription')->with('success','Subscription has been updated successfully.');
            }
        }
    }

    public function delete_subscription ($id){
        if(subscription::where('id',$id)->delete()){
            return redirect('admin/subscription')->with('success','Subscription has been deleted successfully.');
        }  
    }


    public function notification(){
        return view('admin.notification');
    }
    

   
}
