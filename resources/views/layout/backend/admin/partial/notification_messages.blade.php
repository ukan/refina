<li>
    <a href="#" class="dropdown-toggle notification-icon btn-notif" data-toggle="dropdown" data-user="{{ $mails['user_id'] }}">
        <i class="fa fa-envelope"></i>
        <span class="badge" id="badge">{{ ($mails['amount_unread'] != 0) ? $mails['amount_unread'] : '' }}</span>
    </a>
    <div class="dropdown-menu notification-menu">
        <div class="notification-title">
            <span class="pull-right label label-default">{{ $mails['amount'] }}</span>
            Tickets
        </div>
        @if (! $mails['values']->isEmpty())
        <div class="">
            @foreach($mails['values'] as $value)
            <ul >
                @if(($value->status == 'reply' && $value->is_read != 0) || ($value->status == 'ticket' && $value->is_read == false )) 
                <li style="padding : 5px;" onclick="decreaseCounter('{{ $value->id }}','{{ $mails['user_id'] }}','{{ $value->status }}')" id="listMail" name="listMail">
                @else
                <!-- <li onclick="decreaseCounter('{{ $value->id }}','{{ $mails['user_id'] }}','{{ $value->status }}')" style="background-color: #FFF; padding : 5px;" id="listMail" name="listMail"> -->
                @endif
                    <a href="{{ route('hq-admin-message-center-ticket-details', ['id' => $value->id, 'status' => $value->status]) }}" class="clearfix">
                        <span class="message pull-right"><i class="{{ ($value->status == 'ticket') ? 'fa fa-tags' : 'fa fa-reply'}}"></i></span>
                        <figure class="image">
                            <img src="{{ link_to_avatar($value->avatar) }}" style="width: 30px;height: 30px" alt="{{ $value->sender_name }}" class="img-circle" />
                        </figure>
                        <span class="title">{{ $value->subject }}</span>
                        <span class="message truncate">{{ $value->content }}</span>
                    </a>
                </li>
            </ul>
            @endforeach
        </div>
        <div style="padding : 5px;" class="text-right">
            <a href="{{ route('hq-admin-message-center-tickets') }}" class="view-more">View All</a>
        </div>
        @else
            <span>You don't have any ticket</span>
        @endif
    </div>
</li>

<script>
    function decreaseCounter(id,idLog,status){            
        $.ajax({
            type: "POST",
            url: "{{ route('member-message-center-post-counter-admin')}}",
            data: {
                'id': id,
                'idLog' : idLog,
                'status' : status
            },
            dataType: 'json',
            success: function(response){
                
            }
        });
    }
</script>