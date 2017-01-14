<li>
    <a href="#" class="dropdown-toggle notification-icon btn-user-notif" data-toggle="dropdown" data-user="{{ $mails['user_id'] }}">
        <i class="fa fa-tasks"></i>
        <span class="badge" id="badge-user-notif">{{ ($mails['user_notifications_log'] != 0) ? $mails['user_notifications_log'] : '' }}</span>
    </a>

    <div class="dropdown-menu notification-menu">
        <div class="notification-title">
            <span class="pull-right label label-default">{{ $mails['user_notifications_log'] }}</span>
            User Notifications
        </div>
        
        <div style="background-color: #E6E6FA;" class="">
                @foreach ($mails['user_notifications'] as $row)
            <ul>
                @if($row->ammount != 0)
                <li style="padding : 5px;" onclick="decreaseCounterAnnouncement('{{ $row->id }}','{{ $mails['user_id'] }}')">
                @else
                <li style="background-color: #FFF;padding : 5px;">
                @endif
                    <a onclick="javascript:show_modal_user_notification('{{ $row->id }}')" class="clearfix cursor-pointer">
                    <div class="image">
                        <i class="fa fa-info bg-info"></i>                        
                    </div>
                        <span class="title">{{ $row->name }}</span>
                        <span class="message">{{ $row->date_time }}</span>
                    </a>
                </li>
            </ul>
                @endforeach
        </div>
        <div style="padding : 5px;" class="text-right">
                <a href="{{ route('member-user-notifications') }}" class="view-more">View All</a>
        </div>
    </div>
</li>
<script>
    // function decreaseCounterAnnouncement(id,idLog){            
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('member-message-center-post-counter-announcement')}}",
    //         data: {
    //             'id': id,
    //             'idLog' : idLog
    //         },
    //         dataType: 'json',
    //         success: function(response){
                
    //         }
    //     });
    // }
</script>