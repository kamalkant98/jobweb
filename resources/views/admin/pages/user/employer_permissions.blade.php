@extends('admin.layouts.app')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->



<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                    <i class="fas fa-key"></i>
                                    </div>
                                    <div>Employer Permissions 
                                   
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="{{url()->previous()}}"><button class="mb-2 mr-2 btn btn-danger "> <i class="fas fa-arrow-left"></i> Back </button></a>
                                   
                                </div>
                            </div>
                        </div>           
                                <div class="card" style="padding:10px;">
                                    <form action="{{url('admin/add_employer_permission')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="userid" value="{{$userid}}">
                                        <input type="hidden"  id="permissions" value="{{$permissions}}">
                                        <table class="table table-bordered text-center" >
                                            <thead>
                                                <tr>
                                                    <th scope="col">Module Name</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">View Permissions</th>
                                                    <th scope="col">Add Permissions</th>
                                                    <th scope="col">Edit Permissions</th>
                                                    <th scope="col">Delete Permissions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Designations & Role</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="designations_role_status" type="checkbox" id="Designations1" class="custom-control-input"><label class="custom-control-label" for="Designations1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="designations_role_view"type="checkbox" id="Designations2" class="custom-control-input"><label class="custom-control-label" for="Designations2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="designations_role_add" type="checkbox" id="Designations3" class="custom-control-input"><label class="custom-control-label" for="Designations3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="designations_role_edit" type="checkbox" id="Designations4" class="custom-control-input"><label class="custom-control-label" for="Designations4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="designations_role_delete" type="checkbox" id="Designations5" class="custom-control-input"><label class="custom-control-label" for="Designations5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Staff & Sub-Admin</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="staff_sub_admin_status" type="checkbox" id="Sub-Admin1" class="custom-control-input"><label class="custom-control-label" for="Sub-Admin1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="staff_sub_admin_view" type="checkbox" id="Sub-Admin2" class="custom-control-input"><label class="custom-control-label" for="Sub-Admin2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="staff_sub_admin_add" type="checkbox" id="Sub-Admin3" class="custom-control-input"><label class="custom-control-label" for="Sub-Admin3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="staff_sub_admin_edit" type="checkbox" id="Sub-Admin4" class="custom-control-input"><label class="custom-control-label" for="Sub-Admin4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="staff_sub_admin_delete" type="checkbox" id="Sub-Admin5" class="custom-control-input"><label class="custom-control-label" for="Sub-Admin5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Website Banners </th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="websiyte_banners_status" type="checkbox" id="Website_Banners1" class="custom-control-input"><label class="custom-control-label" for="Website_Banners1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="websiyte_banners_view" type="checkbox" id="Website_Banners2" class="custom-control-input"><label class="custom-control-label" for="Website_Banners2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="websiyte_banners_add" type="checkbox" id="Website_Banners3" class="custom-control-input"><label class="custom-control-label" for="Website_Banners3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="websiyte_banners_edit" type="checkbox" id="Website_Banners4" class="custom-control-input"><label class="custom-control-label" for="Website_Banners4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="websiyte_banners_delete" type="checkbox" id="Website_Banners5" class="custom-control-input"><label class="custom-control-label" for="Website_Banners5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Job Categories </th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="job_categories_status" type="checkbox" id="Categories1" class="custom-control-input"><label class="custom-control-label" for="Categories1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_categories_view" type="checkbox" id="Categories2" class="custom-control-input"><label class="custom-control-label" for="Categories2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_categories_add" type="checkbox" id="Categories3" class="custom-control-input"><label class="custom-control-label" for="Categories3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_categories_edit" type="checkbox" id="Categories4" class="custom-control-input"><label class="custom-control-label" for="Categories4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_categories_delete" type="checkbox" id="Categories5" class="custom-control-input"><label class="custom-control-label" for="Categories5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Job functions</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="job_functions_status" type="checkbox" id="jon_functions1" class="custom-control-input"><label class="custom-control-label" for="jon_functions1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_functions_view" type="checkbox" id="jon_functions2" class="custom-control-input"><label class="custom-control-label" for="jon_functions2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_functions_add" type="checkbox" id="jon_functions3" class="custom-control-input"><label class="custom-control-label" for="jon_functions3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_functions_edit" type="checkbox" id="jon_functions4" class="custom-control-input"><label class="custom-control-label" for="jon_functions4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_functions_delete" type="checkbox" id="jon_functions5" class="custom-control-input"><label class="custom-control-label" for="jon_functions5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Qualifications</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="qualifications_status" type="checkbox" id="Qualifications1" class="custom-control-input"><label class="custom-control-label" for="Qualifications1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="qualifications_view" type="checkbox" id="Qualifications2" class="custom-control-input"><label class="custom-control-label" for="Qualifications2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="qualifications_add" type="checkbox" id="Qualifications3" class="custom-control-input"><label class="custom-control-label" for="Qualifications3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="qualifications_edit" type="checkbox" id="Qualifications4" class="custom-control-input"><label class="custom-control-label" for="Qualifications4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="qualifications_delete" type="checkbox" id="Qualifications5" class="custom-control-input"><label class="custom-control-label" for="Qualifications5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Employers</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="employers_status" type="checkbox" id="Employers1" class="custom-control-input"><label class="custom-control-label" for="Employers1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="employers_view" type="checkbox" id="Employers2" class="custom-control-input"><label class="custom-control-label" for="Employers2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="employers_add" type="checkbox" id="Employers3" class="custom-control-input"><label class="custom-control-label" for="Employers3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="employers_edit" type="checkbox" id="Employers4" class="custom-control-input"><label class="custom-control-label" for="Employers4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="employers_delete" type="checkbox" id="Employers5" class="custom-control-input"><label class="custom-control-label" for="Employers5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">User Updates</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="user_updates_status" type="checkbox" id="User_Updates1" class="custom-control-input"><label class="custom-control-label" for="User_Updates1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="user_updates_view" type="checkbox" id="User_Updates2" class="custom-control-input"><label class="custom-control-label" for="User_Updates2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="user_updates_add" type="checkbox" id="User_Updates3" class="custom-control-input"><label class="custom-control-label" for="User_Updates3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="user_updates_edit" type="checkbox" id="User_Updates4" class="custom-control-input"><label class="custom-control-label" for="User_Updates4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input  name="permissions[]"  value="user_updates_delete" type="checkbox" id="User_Updates5" class="custom-control-input"><label class="custom-control-label" for="User_Updates5"></label></div></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">User Menagement</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="user_menagement_status" type="checkbox" id="User_Menagement1" class="custom-control-input"><label class="custom-control-label" for="User_Menagement1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="user_menagement_view" type="checkbox" id="User_Menagement2" class="custom-control-input"><label class="custom-control-label" for="User_Menagement2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="user_menagement_add"  type="checkbox" id="User_Menagement3" class="custom-control-input"><label class="custom-control-label" for="User_Menagement3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="user_menagement_edit" type="checkbox" id="User_Menagement4" class="custom-control-input"><label class="custom-control-label" for="User_Menagement4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="user_menagement_delete" type="checkbox" id="User_Menagement5" class="custom-control-input"><label class="custom-control-label" for="User_Menagement5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Job Scheduler</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="job_scheduler_status" type="checkbox" id="Job_Scheduler1" class="custom-control-input"><label class="custom-control-label" for="Job_Scheduler1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_scheduler_view" type="checkbox" id="Job_Scheduler2" class="custom-control-input"><label class="custom-control-label" for="Job_Scheduler2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_scheduler_add" type="checkbox" id="Job_Scheduler3" class="custom-control-input"><label class="custom-control-label" for="Job_Scheduler3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job_scheduler_edit" type="checkbox" id="Job_Scheduler4" class="custom-control-input"><label class="custom-control-label" for="Job_Scheduler4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input  name="permissions[]" value="job_scheduler_delete" type="checkbox" id="Job_Scheduler5" class="custom-control-input"><label class="custom-control-label" for="Job_Scheduler5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Job-Wise Scheduler</th>
                                                    <td> <div class="custom-checkbox custom-control"><input  name="permissions[]" value="job-wise_scheduler_status" type="checkbox" id="Job-Wise-Scheduler1" class="custom-control-input"><label class="custom-control-label" for="Job-Wise-Scheduler1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job-wise_scheduler_view" type="checkbox" id="Job-Wise-Scheduler2" class="custom-control-input"><label class="custom-control-label" for="Job-Wise-Scheduler2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job-wise_scheduler_add" type="checkbox" id="Job-Wise-Scheduler3" class="custom-control-input"><label class="custom-control-label" for="Job-Wise-Scheduler3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="job-wise_scheduler_edit" type="checkbox" id="Job-Wise-Scheduler4" class="custom-control-input"><label class="custom-control-label" for="Job-Wise-Scheduler4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input  name="permissions[]" value="job-wise_scheduler_delete" type="checkbox" id="Job-Wise-Scheduler5" class="custom-control-input"><label class="custom-control-label" for="Job-Wise-Scheduler5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Send Emails</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="send_emails_status" type="checkbox" id="Send_Emails1" class="custom-control-input"><label class="custom-control-label" for="Send_Emails1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_emails_view" type="checkbox" id="Send_Emails2" class="custom-control-input"><label class="custom-control-label" for="Send_Emails2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_emails_add" type="checkbox" id="Send_Emails3" class="custom-control-input"><label class="custom-control-label" for="Send_Emails3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_emails_edit" type="checkbox" id="Send_Emails4" class="custom-control-input"><label class="custom-control-label" for="Send_Emails4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_emails_delete" type="checkbox" id="Send_Emails5" class="custom-control-input"><label class="custom-control-label" for="Send_Emails5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Send Notification</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="send_notification_status" type="checkbox" id="Send_Notification1" class="custom-control-input"><label class="custom-control-label" for="Send_Notification1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_notification_view" type="checkbox" id="Send_Notification2" class="custom-control-input"><label class="custom-control-label" for="Send_Notification2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_notification_add" type="checkbox" id="Send_Notification3" class="custom-control-input"><label class="custom-control-label" for="Send_Notification3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_notification_edit" type="checkbox" id="Send_Notification4" class="custom-control-input"><label class="custom-control-label" for="Send_Notification4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="send_notification_delete" type="checkbox" id="Send_Notification5" class="custom-control-input"><label class="custom-control-label" for="Send_Notification5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Subscribe Us</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="subscribe_us_status" type="checkbox" id="Subscribe_Us1" class="custom-control-input"><label class="custom-control-label" for="Subscribe_Us1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="subscribe_us_view" type="checkbox" id="Subscribe_Us2" class="custom-control-input"><label class="custom-control-label" for="Subscribe_Us2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="subscribe_us_add" type="checkbox" id="Subscribe_Us3" class="custom-control-input"><label class="custom-control-label" for="Subscribe_Us3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="subscribe_us_edit" type="checkbox" id="Subscribe_Us4" class="custom-control-input"><label class="custom-control-label" for="Subscribe_Us4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="subscribe_us_delete" type="checkbox" id="Subscribe_Us5" class="custom-control-input"><label class="custom-control-label" for="Subscribe_Us5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Clients Manager</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="clients_manager_status" type="checkbox" id="Clients_Manager1" class="custom-control-input"><label class="custom-control-label" for="Clients_Manager1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="clients_manager_view" type="checkbox" id="Clients_Manager2" class="custom-control-input"><label class="custom-control-label" for="Clients_Manager2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="clients_manager_add" type="checkbox" id="Clients_Manager3" class="custom-control-input"><label class="custom-control-label" for="Clients_Manager3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="clients_manager_edit" type="checkbox" id="Clients_Manager4" class="custom-control-input"><label class="custom-control-label" for="Clients_Manager4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]"  value="clients_manager_delete" type="checkbox" id="Clients_Manager5" class="custom-control-input"><label class="custom-control-label" for="Clients_Manager5"></label></div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Testimonials</th>
                                                    <td> <div class="custom-checkbox custom-control"><input name="permissions[]" value="testimonials_status" type="checkbox" id="Testimonials1" class="custom-control-input"><label class="custom-control-label" for="Testimonials1"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="testimonials_view" type="checkbox" id="Testimonials2" class="custom-control-input"><label class="custom-control-label" for="Testimonials2"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="testimonials_add" type="checkbox" id="Testimonials3" class="custom-control-input"><label class="custom-control-label" for="Testimonials3"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="testimonials_edit" type="checkbox" id="Testimonials4" class="custom-control-input"><label class="custom-control-label" for="Testimonials4"></label></div></td>
                                                    <td><div class="custom-checkbox custom-control"><input name="permissions[]" value="testimonials_delete" type="checkbox" id="Testimonials5" class="custom-control-input"><label class="custom-control-label" for="Testimonials5"></label></div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="mt-2 btn btn-primary">submit</button>  
                                    </form>      
                                </div>
                                </div>
                            </div>
                         </div>   
                     </div>
                
                    
<script>
     $(document).ready(function(){
        var getval= $('.card').find('#permissions').val();
        var arr= getval.split(',');
            $('.card').find('input[type="checkbox"]').each(function(){
                var getboxval=$(this).val();
                if($.inArray(getboxval,arr) !== -1){
                    $(this).prop('checked',true);
                }else{
                    $(this).removeAttr('checked',false);
                }
            });
    });
   
              
           
</script>
@endsection