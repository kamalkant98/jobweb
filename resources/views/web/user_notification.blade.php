@extends('web.layouts.app')
@section('content')
<style>
.subcategorybox{
    background-color: #fbfbfb;
    padding: 5px;
    margin: auto;
    border-top-right-radius: 10px;
    border: solid 1px #f3f3f3;
    border-top-left-radius: 10px;
}
.container .row .subcategorybox:hover{
    border-color: #B2F2D0;
  color: #00D363;
  background-color: #f3f3f3c6;
  text-decoration: none;
  transform: scale(1.05);
  transition: all 0.5s ease;
  
}
.container .row .subcategorybox :hover h5{
    color: #00D363;
  
}
.jb_cover{
    background: #f1f1f1;
    border-radius: 10px;
    margin-top: -50px;
}
.search{
    margin-top:20px;
    margin-bottom:20px;
}
.notificaton-row{
                background: #efefef42;
                padding: 15px 10px;
                border-bottom: solid 1px #e6e3e3;
             }
             .time_ago{
                position: absolute;
                right: 25px;
                
             }

</style>
    <div class="bradcam_area " style="margin-bottom:5px;">
        <div class="container">
        <div class="card">
            <div class="card-header">Notification</div>
            <div class="card-body">
            @forelse(Auth::user()->Notifications as $notification)
                            @if($notification->notifiable_id  == auth()->user()->id)
                                @if($notification->type == 'App\Notifications\noti_progress')
                                <div class="">
                                   
                                    <a class="dropdown-item d-flex align-items-center notificaton-row" data="{{$notification->id}}" href="{{url('profile/applied_jobs')}}">
                                        @if($notification->read_at == null)
                                      
                                        <span><i class="fas fa-circle" style="margin: 5px; color: #3f6ad8;"></i></span>
                                        @else
                                        <span><i class="far fa-eye"style="margin: 5px; color: #3f6ad8;"></i></span>
                                        @endif
                                        <span>  Dear <strong>{{ getuser($notification->data['data']['user_id'] ?? '')->name}} </strong>you applyed for <strong>{{ get_job($notification->data['data']['job_id'] ?? '')->job_title}}</strong> 
                                            @if($notification->data['data']['actively_progress'] == '1')
                                          
                                             &nbsp;<i class="far fa-clock" style="color:#f7b924;"></i> <strong> In Progress</strong>
                                               
                                            @elseif($notification->data['data']['actively_progress'] == '2')
                                            &nbsp;<i class="fas fa-clipboard-check" style="color:#3f6ad8;"></i><strong> Resume Selected </strong>
                                            @elseif($notification->data['data']['actively_progress'] == '3')
                                                @if($notification->data['data']['reason'] !== null)
                                                &nbsp;<i class="far fa-calendar-check" style="color:#3f6ad8;"></i><strong> Interview Re-Schedule </strong>
                                                @else
                                                &nbsp;<i class="far fa-calendar-check" style="color:#3f6ad8;"></i><strong>Interview Schedule </strong>

                                                @endif
                                            @elseif($notification->data['data']['actively_progress'] == '4')
                                            &nbsp;<i class="fas fa-check-double"  style="color:#2eb72e;"></i><strong>Hired</strong>
                                            @elseif($notification->data['data']['actively_progress'] == '0')
                                            &nbsp;<i class="far fa-times-circle" style="color:#d21945;"></i><strong> Not Selected </strong>
                                            @endif
                                        </span>

                                        <div class="time_ago">{{$notification->created_at->diffForHumans()}}</div>
                                    </a>
                                </div>
                               @endif
                            @endif
                        @empty

                       
                       <i class="far fa-bell-slash" style="margin: 5px; color: #3f6ad8; margin: auto;font-size: 100px;"></i>
                      
                        @endforelse
            </div>  

        </div>
                
                    
            
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