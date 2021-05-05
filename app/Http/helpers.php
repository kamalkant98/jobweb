<?php

    function countsubcategory($id) {
        $data= \App\Models\contentcategory::where('parent_id',$id)->count();
        if($data != '0'){
             return $data;
        }
       
    }
    function getcategory($id){
        $data = \App\Models\contentcategory::where('id',$id)->first();
        if(!empty($data)){
         return ($data);
        }
    }
    function maincategory(){
        $data = \App\Models\contentcategory::where('parent_id','0')->get();
        if(!empty($data)){
            return $data;
        }
    }
    function subcategory($id){
        $data = \App\Models\contentcategory::where('parent_id',$id)->get();
        if(!empty($data)){
            return $data;
        }
    }

    function states(){
        $data = \App\Models\state::all()->toarray();
        if(!empty($data)){
            return $data;
        }
    }

    function allcategory(){
        $data = \App\Models\contentcategory::where('parent_id','!=','0')->where('status','1')->get();
        if(!empty($data)){
            return $data;
        }
    }

    function allqualification(){
        $data = \App\Models\qualification::where('status','1')->get();
        if(!empty($data)){
            return $data;
        } 
    }
    function getemployer(){
        $data = \App\Models\User::where('usertype','1')->where('status','1')->get();
        if(!empty($data)){
            return $data;
        } 
    }
  
    
     
    function getcity($id){
        $data = \App\Models\city::where('id',$id)->first();
        if(!empty($data)){
            return $data;
        } 
    }
    function getstate($id){
        $data = \App\Models\state::where('id',$id)->first();
        if(!empty($data)){
            return $data;
        } 
    }
    
    function getuser($id){
        $data = \App\Models\User::where('id',$id)->first();
        if(!empty($data)){
            return $data;
        }
    }
    function get_user_meta($user_id, $meta_key, $default = null){
        $cache_key = 'user.' . $user_id . '.meta.' . $meta_key;

        
        $meta = \App\Models\Usermeta::where('user_id', $user_id)
                ->where('option', $meta_key)
                ->first();
    
        if (!empty($meta)){
        return $meta->value;
        }
    }

    if(!function_exists('calculate_profile')){
        function calculate_profile($id){

        $profile= \App\Models\User::where('id',$id)->first();
        $dateofbirst= get_user_meta($id,'date_of_birth');
        if(isset($dateofbirst)){

            if(!empty(get_user_meta($id,'date_of_birth'))){
                $profile['dob']='ture';
            }else{
                $profile['dob']=null;
            }
       
        }else{
            $profile['dob']=null; 
        }

        $resume= get_user_meta($id,'resume');
        if(isset($resume)){
            if (!empty(get_user_meta($id,'resume'))){
                $profile['resume']='ture';
            }else{
                $profile['resume']=null;
            }  
        }else{
            $profile['resume']=null;
        }
        $salary_slip= get_user_meta($id,'salary_slip');
        if(isset($salary_slip)){
            if (!empty(get_user_meta($id,'salary_slip'))){
                $profile['salary_slip']='ture';
             }else{
                $profile['salary_slip']=null;
             }
        }else{
            $profile['salary_slip']=null;
        }
     
      $education= \App\Models\education::where('user_id',$id)->first();
      if(!empty($education)){
         $profile['education']='ture';
      }else{
         $profile['education']=null;
      }
      $work= \App\Models\work_experience::where('user_id',$id)->first();
      if(!empty($work)){
         $profile['work_experience']='ture';
      }else{
         $profile['work_experience']=null;
      }
      $skill= \App\Models\skill::where('user_id',$id)->first();
      if(!empty($skill)){
         $profile['skill']='ture';
      }else{
         $profile['skill']=null;
      }
      $language= \App\Models\language::where('user_id',$id)->first();
      if(!empty($language)){
         $profile['language']='ture';
      }else{
         $profile['language']=null;
      }
      
      if ( ! $profile) {
                return 0;
            }
            $columns    = preg_grep('/(.+ed_at)|(.*id)|(.*password)|(.*status)|(.*remember_token)|(.*usertype)|(.*cover_image)|(.*person_name)|(.*person_email)|(.*person_mobile)|(.*gender)|(.*address)|(.*website)|(.*employee_working)|(.*salary_day)|(.*employer_level)|(.*	person_name)|(.*person_designation)|(.*address_2)|(.*description)|(.*premium_status)|(.*profile_status)|(.*	permissions)|(.*email_verified_at)|(.*created_at)|(.*updated_at)/', array_keys($profile->toArray()), PREG_GREP_INVERT);
            $per_column = 100 / count($columns);
            $total      = 0;
           
           
            foreach ($profile->toArray() as $key => $value) {
                if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
                    $total += $per_column;
                }
            }
            return $total; 
        }
    }


    function Applied_job($jobid,$userid){
        $data= \App\Models\appliedjob::where('job_id',$jobid)->where('user_id',$userid)->first();
        if(!empty($data)){
            return $data;
        }
        
    }

    function get_job($jobid){
        $data= \App\Models\job::where('id',$jobid)->first();
        if(!empty($data)){
            return $data;
        }  
    }

    function totalpostbymaincategory($id){
       $data=  \App\Models\contentcategory::
               join('jobs','jobs.category','=','content_category.id')
               ->where('content_category.parent_id',$id)->where('jobs.status','1')
               ->sum("jobs.no_of_requirement");
               return $data;
    }

    function totalpostbyemployer($id){
        $data=  \App\Models\job::where('employer',$id)->sum("no_of_requirement");
              
                
                return $data;
     }

?>