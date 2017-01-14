@extends('layout.frontend.guest.guest_template')

@section('content')
<!-- <div style="max-width: 350px"> -->
<div class="col-sm-3 col-sm-offset-6 col-md-12 col-md-offset-0">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-check mr-xs"></i> Payment Confirmation</h2>
    </div>
    <div class="panel-body">
    @include('flash::message')
    @if (Session::has('notice'))
      <div class="alert alert-info">{!! Session::get('notice') !!}</div>
    @endif
        <form method="POST" action="{{ route('payment-confirmation-form-action') }}" class="jquery-form-payment-confirmation" enctype="multipart/form-data" autocomplete="off" accept-charset="UTF-8">
            <input type="hidden" name="funnel_id" value="{{$funnel_id}}">
            <input type="hidden" name="order_id" value="{{$order_id}}">
            <div class="form-group mb-lg">
                <label>Image <b class="text-danger">*</b></label>
                    {!! form_input_file_img('file','file_image') !!}
            </div>            
                    <p class="has-error text-danger payment-confirmation-file_image"></p>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'Submit']) !!}
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
@endsection
@section('heads')

        {!! Html::style('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.css') !!}

@endsection
@section('scripts')
        {!! Html::script('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.js') !!}
        {!! Html::script('assets/backend/custom/jquery.form/jquery.form.js') !!}
<script type="text/javascript">

    $('.jquery-form-payment-confirmation').ajaxForm({
        success: function(response) {
            if(response.indexOf('success') >= 0){
                var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                new PNotify({
                    title: "Success",
                    text: "Thank You For Your Confirmation",
                    type: 'success',
                    addclass: "stack-custom",
                    stack: myStack
                });
                setTimeout(function(){
                   //window.location.reload(1);
                }, 0);
            }else{
                $('.errorsMessage').html(response);
            }

        },
        beforeSend: function() {
          $('.has-error').html('');
        },
        error: function(response){
          if (response.status === 422) {
              var data = response.responseJSON;
              $.each(data,function(key,val){
                  $('.payment-confirmation-'+key).html(val);
              });
            var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                new PNotify({
                    title: "Failed",
                    text: "Validate Error, Check Your Data Again",
                    type: 'danger',
                    addclass: "stack-custom",
                    stack: myStack
                });
          } else {
              $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
          }
        }
    }); 
</script>
@endsection