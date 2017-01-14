<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>static page email confirmation</title>

    <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap/css/bootstrap.css') !!}
        {!! Html::style('assets/frontend/custom-page/css/style.css') !!}
        {!! Html::style('assets/frontend/custom-page/css/custom-bootstrap.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.css') !!}
  </head>


  <body>  
  <div class="col-md-12 bg-green">
    &nbsp;
  </div> 

  <div class="logo-confirmation">
    <center><img src="{!! asset('assets/frontend/custom-page/image/logo.png') !!}"></center>
  </div>
  
  <div class="container">
    <p class="email-successfully">
      <span class="fa fa-check"></span>
        <span class="update-from-notification">Apakah barang anda telah diterima ? jika iya klik tombol konfirmasi.</span>
    </p>


    <form class="custom-form col-md-8 col-md-offset-2 hide-on-success"  action="#">
        <input type="checkbox" id="test1" />
        <label for="test1">Saya setuju dengan melakukan Konfirmasi Terima Barang</label>
    </form>


    <div class="confirm hide-on-success">
      <button type="button" class="btn btn-default confirm-button" onclick="javascript:goods_have_been_received_confirm()">Konfirmasi</button>
    </div>

  <p class="confirm-copyright">
      Copyright 2016 support@scoido.com, All Right Reserved
  </p>

  </div>




        {!! Html::script('assets/backend/porto-admin/vendor/jquery/jquery.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap/js/bootstrap.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.js') !!}        
  </body>
  <script type="text/javascript">
    function goods_have_been_received_confirm(){
      if ($('input#test1').is(':checked')) {
        $.ajax({
              type: "POST",
              url: "{{route('process-confirmation-goods-have-been-received','{!! $token !!}') }}",
              dataType:'json',
              data: {
                action:"confirmation",
                token : '{!! $token !!}',
              },
              success: function(response)
              {
                if(response.status == 'success'){
                          var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                          new PNotify({
                              title: "Success",
                              text: response.notification,
                              type: 'success',
                              addclass: "stack-custom",
                              stack: myStack
                          });
                          $('.update-from-notification').html(response.notification);
                          $('.hide-on-success').hide();
                  }else{
                          var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                          new PNotify({
                              title: "Failed",
                              text: response.notification,
                              type: 'danger',
                              addclass: "stack-custom",
                              stack: myStack
                          });
                  }
              }
          });
      }else{
                          var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                          new PNotify({
                              title: "Failed",
                              text: "Please Check Checkbox For Agreement",
                              type: 'danger',
                              addclass: "stack-custom",
                              stack: myStack
                          });
      }
    }
  </script>
</html>

    
