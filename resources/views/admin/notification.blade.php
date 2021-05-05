@extends('admin.layouts.app')
@section('content')

    <style>
             .notificaton-row{
                background: #efefef42;
                padding: 15px 10px;
                border-bottom: solid 1px #e6e3e3;
             }
             .time_ago{
                position: absolute;
                right: 25px;
                
             }
             .noti_image{
                width: 39px;
                height: 39px;
                object-fit: cover;
                border-radius: 50%;
                border: solid 1px #3f6ad8;
             }
    </style>

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                        <div class="page-title-icon">
                                        <i class="far fa-bell" ></i>
                                            </div>Notification</div>
                                <div class="page-title-actions">
                                   
                                    <a href="{{url('/admin')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                                </div>
                            </div>
                        </div>  
                        <div class="card" style="padding:10px;">
                        @foreach(Auth::user()->Notifications as $notification)
                            @if($notification->notifiable_id  == auth()->user()->id)
                                @if($notification->type == 'App\Notifications\noti_newuser')
                                <div class="">
                                    @if($notification->data['data']['usertype'] == 1)
                                    <a class="dropdown-item d-flex align-items-center notificaton-row" data="{{$notification->id}}" href="{{url('admin/employer/edit')}}/{{$notification->data['data']['id']}}">
                                    @elseif($notification->data['data']['usertype'] == 2)
                                    <a class="dropdown-item d-flex align-items-center notificaton-row" data="{{$notification->id}}" href="{{url('admin/employe/edit')}}/{{$notification->data['data']['id']}}">
                                    @endif 

                                        @if($notification->read_at == null)
                                        <span><i class="fas fa-circle" style="margin: 5px; color: #3f6ad8;"></i></span>
                                        @endif
                                        <span><img  class="noti_image" src="{{asset('assest/web/assest/images/profile_image')}}/{{getuser($notification->data['data']['id'])->profile_image ?? 'profile.jpg'}}"/>  <strong>{{$notification->data['data']['name'] ?? ''}} </strong> New register </span>

                                        <div class="time_ago">{{$notification->created_at->diffForHumans()}}</div>
                                    </a>
                                </div>
                                @elseif($notification->type == 'App\Notifications\noti_jobadd')
                                <div class="">
                                   
                                    <a class="dropdown-item d-flex align-items-center notificaton-row" data="{{$notification->id}}" href="{{url('admin/job/edit')}}/{{$notification->data['data']['id']}}"><!-- {{url('admin/job/edit')}}/{{$notification->data['data']['id']}} -->
                                  

                                        @if($notification->read_at == null)
                                        <span><i class="fas fa-circle" style="margin: 5px; color: #3f6ad8;"></i></span>
                                        @endif
                                        <span> <img  class="noti_image" src="{{asset('assest/web/assest/images/profile_image')}}/{{getuser($notification->data['data']['employer'])->profile_image ?? 'profile.jpg'}}"/>  <strong> </strong> create a job {{$notification->data['data']['job_title'] ?? ''}}</span>

                                        <div class="time_ago">{{$notification->created_at->diffForHumans()}}</div>
                                    </a>
                                </div>


                                @endif
                            @endif
                        @endforeach

                        </div>
                </div>
                         
<script>
          $(document).ready(function (){
            $(document).on('click','.notificaton-row',function(){
                var noti_id=$(this).attr('data');
                $.ajax({
                headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/notificaton_read')}}/"+noti_id+"",
                type: "POST",
                success: function (data) {
                     
                }
            });
            });

          });
</script>
            
@endsection