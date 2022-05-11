<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Platea21 - <?php echo $page_title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url().'uploads/platea21_logo.png' ?>" type="image/x-icon"/>
  <!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>assets/mobile/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url() ?>assets/mobile/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url() ?>assets/mobile/css/style.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/mobile/js/jquery-3.4.1.min.js"></script>

  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
     #dynamic_toast{
        position: fixed;
        top:5px;
        z-index: 9999;
        width: 20.2rem;
        right: 10px;
        display:none
      }

  </style>
</head>

<body class="grey lighten-3">
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast"  id="dynamic_toast" auto-hide="true">
  
  <div class="toast-body badge-success badge-type">
    <span class="mr-2"><i class="fa fa-check badge-success badge-type icon-place"></i></span>
    <span class="msg-field"></span>
  </div>
</div>
  <?php include 'nav_bar.php'; ?>


  <?php if((strtolower($page_title)) == 'home'){ 
        include 'carousel.php';
   } ?>
  <!--Main layout-->
  
  <main>
    <div class="container wow fadeIn" style='padding-bottom:20px'>

        <?php include $page_name.".php"; ?>

    </div>
  </main>
  <div class="modal"  role="dialog" id="loader" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="mloader">
            <div class="loader"></div>
          </div>
      </div>
    </div>
  </div>
  <!-- Universal Modal  -->
<div class="modal modal-full-height modal-right"  role="dialog" id="universal_modal" backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:30vw !important">
        <div id="body-content"></div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
    </div>
  </div>
</div>
  <!--Main layout-->
<div class="msg-btn-field">
      <div class="msg-box-field card shadow" style="display:none">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-white">¿Alguna consulta?, escríbenos!</h6>
            <span class="pull-right close" id="close-msg-box" style="cursor:pointer"><i class="fa fa-minus"></i></span>
          </div>
          
            
          <div class="card-body">
          <div class="msg-box-clone" style="display:none">
              <div class="msg-box msg-left">
                <p class="msg">Hi</p>
                <small class="msg-datetime text-white text-right">December</small>
              </div>
              <div class="msg-box msg-right">
                  <p class="msg">Hello</p>
                <small class=" msg-datetime text-white">December</small>
              </div>
          </div>
          <div id="convo-field">
          </div>
          </div>
            
          <div class="card-footer">
            <form id="msg-frm">
              <div class="col-md-12">
                <div class="row">
                <div class=" input-group input-group-sm">
                <textarea id="nmsg-field" class="md-textarea form-control" name="message" rows="3" style="resize:none;overflow:auto" placeholder="Ingrese mensaje"></textarea>
                  <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-send"></i></button>
                    </div>
              </div>
                </div>
              </div>
            </form>
          </div>
      </div>
      <button class="btn btn-primary btn-circle" id="open-msg-btn"><i class="fa fa-comment-o"></i>
      <span class="badge badge-danger badge-counter" id="msg_count_unread" style="display:none">0</span>
      </button>
    </div>
      
  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--<div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Download MDB
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/platea21/" target="_blank">
        <i class="fa fa-facebook-f mr-3"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-twitter mr-3"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-youtube mr-3" aria-hidden="true"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-globe mr-3"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-dribbble mr-3"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-pinterest mr-3"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-github mr-3"></i>
      </a>

      <a href="https://platea21.blogspot.com" target="_blank">
        <i class="fa fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://platea21.blogspot.com/" target="_blank"> platea21.blogspot.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <!-- Bootstrap tooltips -->
  <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script> 
  <script type="text/javascript" src="<?php echo base_url() ?>assets/mobile/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/mobile/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/mobile/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    var websocket = new WebSocket("ws://<?php echo $_SERVER['SERVER_NAME'] ?>:8090/rios/php-socket.php"); 
    websocket.onopen = function(event){
        
          }
          websocket.onclose = function(event){
            // showMessage("<div class='error'>Problem due to some Error</div>");
            connect();
          };
          
          websocket.onmessage = function(event){
              var Data = JSON.parse(event.data);
              if(typeof Data !=undefined && typeof Data != null){
                if(typeof Data.type !=undefined && Data.type == 'message_renew_user' &&  Data.user_id == '<?php echo $_SESSION['user_id'] ?>' ){
                  if($.isFunction(window.load_msgs))
                  load_msgs(Data.id)
                  if($.isFunction(window.update_msg_unread))
                  update_msg_unread();
                  if($('#msg-box-field').length > 0){
                    if($('#msg-box-field').is(':visible') == true){
                      if($.isFunction(window.update_msg_to_read))
                      update_msg_to_read()
                    }
                  }
                }

                if(Data.type == 'new_cart' && Data.user_id == '<?php echo $_SESSION['user_id'] ?>'){
                   var cur_count = $('#cart_count').html();
                   cur_count++;
                  //  console.log(cur_count);
                   $('#cart_count').html(cur_count);
                   $('#cart_count').show();
               }

               if(Data.type == 'order_update'){
                   if($('.order-list[data-id="'+Data.id+'"]').length > 0){
                       var badge = $('.order-list[data-id="'+Data.id+'"]').find('.status')
                       badge.removeClass('badge-success')
                       badge.removeClass('badge-primary')
                       if(Data.otype == 3){
                           badge.addClass('badge-success').html('Delivered')
                       }else{
                            badge.addClass('badge-success').html('Picked-up')
                       }
                   }
               }

              }
            }
    // Animations initialization
    // new WOW().init();
    var isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
      || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
      isMobile = true;
    }
   $(document).ready(function(){
    // start_loader()
    $('.toast').each(function(){
      $(this).on('hidden.bs.toast', function () {
        $(this).hide()
      })
      $(this).on('show.bs.toast, shown.bs.toast', function () {
        $(this).show()
      })
    })
      $('.modal .modal-dialog').height($(window).height())
    if(isMobile == true){
      $('.modal').height($(window).height())
      $('.modal .modal-content , .modal .modal-dialog').height('100%')
      $('.modal .modal-dialog').width($(window).width())

                if($(window).width() <= 760)
              $('.msg-box-field').width($(window).width())
                if($(window).height() <= 900)
              $('.msg-box-field').height($(window).height()-$('#main_nav').height()-20)
              $('.msg-box-field').css({'z-index':9999,bottom:'5px','left':0})
    }
    $(window).on('resize',()=>{
      $('.modal').height($(window).height())
      $('.modal .modal-content , .modal .modal-dialog').height('100%')
      $('.modal .modal-dialog').width($(window).width())
    })
   
    
   })
    window.Dtoast = ($message='',type='info')=>{
    // console.log('toast');
    $('#dynamic_toast .msg-field').html($message);
    if(type == 'info'){
      var badge = 'badge-info';
      var ico = 'fa-info';
    }else if(type == 'success'){
      var badge = 'badge-success';
      var ico = 'fa-check';
    }else  if(type == 'error'){
      var badge = 'badge-danger';
      var ico = 'fa-exclamation-triangle';
    }else  if(type == 'warning'){
      var badge = 'badge-warning';
      var ico = 'fa-exclamation-triangle';
    }
    $("#dynamic_toast .badge-type").removeClass('badge-success')
    $("#dynamic_toast .badge-type").removeClass('badge-warning')
    $("#dynamic_toast .badge-type").removeClass('badge-danger')
    $("#dynamic_toast .badge-type").removeClass('badge-info')

    $("#dynamic_toast .icon-place").removeClass('fa-check')
    $("#dynamic_toast .icon-place").removeClass('fa-info')
    $("#dynamic_toast .icon-place").removeClass('fa-exclamation-triangle')
    $("#dynamic_toast .icon-place").removeClass('fa-exclamation-triangle')

    $('#dynamic_toast .badge-type').addClass(badge)
    $('#dynamic_toast .icon-place').addClass(ico)

    
    $('#dynamic_toast .msg-field').html($message)
    // $('#dynamic_toast').show()
    $('#dynamic_toast').toast({delay:1500}).toast('show');
  }
  window.start_loader = function(){
    $('body').prepend('<div id="preloader2"></div>')
  }
  window.end_loader = function(){
    $('#preloader2').fadeOut('fast', function() {
          $(this).remove();
        })
  }
  function AjaxUniModal(url='',title=''){
    start_loader()
  $('#universal_modal .modal-title').html(title);
         
  if(url != ''){
    $.ajax({
      method:'POST',
      url:url,
      data:{},
      error:function(err){
        console.log(err)
      },
      success:function(resp){
        if(resp){
          $('#universal_modal .mloader').hide();
          $("#universal_modal #body-content").html(resp)
          $('#universal_modal').modal('show');
          end_loader()
        }else{

        }
      }
    })
  }
}
  </script>
  
  <script>
          $(document).ready(function(){

            $('[name="message"]').keyup(function(e){
              if(isMobile == false){
              if(e.originalEvent.key == 'Enter' && e.originalEvent.shiftKey == false)
              $('#msg-frm').submit();
              }
            })


            $(window).on('resize',function(){
              // alert($(window).height())
              if(isMobile == true){
                if($(window).width() <= 760)
              $('.msg-box-field').width($(window).width())
                if($(window).height() <= 900)
              $('.msg-box-field').height($(window).height()-$('#main_nav').height()-20)
              $('.msg-box-field').css({'z-index':9999,bottom:'5px','left':0})

              $('.msg-box-field .card-body').animate({
                          scrollTop: $('.msg-box-field .card-body')[0].scrollHeight - 10
                      }, 'fast');
              }
            })
            $('#msg-frm').submit(function(e){
              e.preventDefault();
              var frmData= $(this).serialize()
              if($('[name="message"]').val() == '')
              return false;
              var txt = $('[name="message"]').val()
              txt = txt.replace(/\n/gi,'<br>')
              console.log(frmData)
              var mbox_no = $('#convo-field .msg-right').length;
              mbox_no++;
              var mbox = $('.msg-box-clone .msg-box.msg-right').clone()
              mbox.attr('data-no',mbox_no)
              mbox.find('.msg').html(txt)
              mbox.find('.msg-datetime').html('sending....')
              $('#convo-field').append(mbox)
              $('.msg-box-field .card-body').animate({
                            scrollTop: $('.msg-box-field .card-body')[0].scrollHeight - 10
                        }, 'fast');
              $('[name="message"]').val('')

              $.ajax({
                url:'<?php echo base_url('order/message_send') ?>',
                method:'POST',
                data:frmData,
                error:err=>{
                  console.log(err)
                  $('.msg-box[data-no="'+mbox_no+'"]').find('.msg-datetime').html('Sending Failed')
                  $('.msg-box[data-no="'+mbox_no+'"]').find('.msg-datetime').removeClass('text-white').css('color','red')

                  
                },
                success:resp=>{
                  if(typeof resp != undefined && typeof resp != null){
                    resp = JSON.parse(resp)
                    if(resp.status =='success'){
                        $('.msg-box[data-no="'+mbox_no+'"]').find('.msg-datetime').html(resp.data.date_created)
                        websocket.send(JSON.stringify({type:'message_renew',id:resp.data.id,user_id:'<?php echo $_SESSION['user_id'] ?>'}))
                    }
                  }
                }
              })
            })
            $('#open-msg-btn').click(function(){
              $(this).hide()
              $('.msg-box-field').show()
              if(isMobile == true)
              $('.msg-btn-field').css({'left':0,'bottom':0})
              $('.msg-box-field .card-body').animate({
                          scrollTop: $('.msg-box-field .card-body')[0].scrollHeight - 10
                      }, 'fast');
            })
            
            $('#close-msg-box').click(function(){
              $('.msg-box-field').hide()
              $('#open-msg-btn').show()
              if(isMobile == true)
              $('.msg-btn-field').css({'left':'unset','bottom':'15px'})
              update_msg_to_read()
            })
              load_pcards(0,1);
              load_pg();
              load_msgs();
              update_msg_unread();
              $('#filter').on('search',function(){
                load_pcards(0,1);
                $('html, body').animate({
                              scrollTop: $("#product-holder").offset().top - "150"
                          }, 'fast');
              })
              $('#filter').submit(function(e){
                e.preventDefault()
                $('#cat-field').find('.nav-item.active').removeClass('active');
                $('.nav-link[data-cat="all"]').closest('li').addClass('active');
                load_pcards(0,1);
                $('html, body').animate({
                              scrollTop: $("#product-holder").offset().top - "150"
                          }, 'fast');
              })
              // $('#nmsg-field').keyup(function(e){
              //   console.log($(this))
              // })

              var msg_count_interval = function(){
                if($('#msg_count_unread').html() > 0){
                  $('#msg_count_unread').show()
                }else{
                  $('#msg_count_unread').hide()
                }
              }
              setInterval(msg_count_interval,500)
          })

          window.update_msg_to_read = function(){
            $.ajax({
              url:'<?php echo base_url('order/update_msg_to_read') ?>',
              error:err=>console.log(err),
              success:resp=>{
                if(resp == 1){
                  $('#msg_count_unread').html(0)  

                }
              }
            })
          }

          window.update_msg_unread = function(){
            $.ajax({
              url:'<?php echo base_url('order/count_unread_msg') ?>',
              method:'POST',
              data:{user_id:'<?php echo $_SESSION['user_id'] ?>'},
              error:err=>{
                console.log(err)
              },
              success:resp=>{

                if(typeof resp != undefined){
                  resp = JSON.parse(resp)
                  if(resp.status == 'success'){
                    $('#msg_count_unread').html(resp.count)  
                  }
                }
              }
            })
          }

          window.load_msgs = function($id=''){
            if($id == '')
            $('#convo-field').html('<center><i>Loading messages...</i></center>')
            $.ajax({
              url:'<?php echo base_url('order/load_messages') ?>',
              method:'POST',
              data:{id:$id},
              error:err=>{
                console.log(err)
                if($id == '')
                $('#convo-field').html('<center><i>An error occured while loading messages.</i></center>');
                else{
                $('#convo-field').append('<center><i>An error occured while loading new message.</i></center>');

                }
              },
              success:resp=>{
                if(typeof resp != undefined && typeof resp != null){
                  resp = JSON.parse(resp)
                  if(Object.keys(resp).length <= 0){
                    if($id == '' ){
                      var msg_b = $('.msg-box-clone .msg-box.msg-left').clone()
                      msg_b.find('.msg').html('Hi <?php echo $_SESSION['firstname'] ?>!<br> Do you have any question? You can ask the admin by sending your question or message for us. :)');
                      msg_b.find('.msg-datetime').html('')
                      $('#convo-field').html(msg_b)
                    }
                  }else{
                    if($id == ''){
                    var msg_b = $('.msg-box-clone .msg-box.msg-left').clone()
                      msg_b.find('.msg').html('Hi <?php echo $_SESSION['firstname'] ?>!<br> Do you have any question? You can ask the admin by sending your question or message for us. :)');
                      msg_b.find('.msg-datetime').html('')
                      $('#convo-field').html(msg_b)
                      }
                    Object.keys(resp).map(k=>{
                      var row = resp[k]
                      if(row.type ==1)
                      var msg_b = $('.msg-box-clone .msg-box.msg-left').clone();
                      else 
                      var msg_b = $('.msg-box-clone .msg-box.msg-right').clone();
                      var mb_count = $('#convo-field .msg-box').length
                      mb_count++;
                      row.message = row.message.replace(/\n/gi,'<br/>')
                      msg_b.attr({'data-id':row.id,'data-no':mb_count})
                      msg_b.find('.msg').html(row.message)
                      msg_b.find('.msg-datetime').html(row.date_created)
                      if(mb_count <= 1){
                        $('#convo-field').html(msg_b)
                      }else{
                        $('#convo-field').append(msg_b)
                      }
                      $('.msg-box-field .card-body').scrollTop($('.msg-box-field .card-body')[0].scrollHeight - 10)

                    })
                  }
                }
              }
            })
          }
		 window.load_pg = function(){
              var html ='';

              $.ajax({
                url:'<?php echo base_url('order/load_pg') ?>',
                method:'POST',
                data:{},
                error:err=>{
                  console.log(err)
                },
                success:resp=>{
                  if(typeof resp != undefined){
                    resp = JSON.parse(resp)
                    Object.keys(resp).map(k=>{
                      html = '<li class="nav-item">'+
                              '<a class="nav-link" href="javascript:void(0)" data-cat="'+resp[k].id+'">'+resp[k].name+
                                '<span class="sr-only">(current)</span>'+
                              '</a>'+
                            '</li>'

                      $('#cat-field').append(html);
                    })
                  }
                },
                complete:()=>{
                  cat_f();
                }
              })
          }
          window.load_pcards = function($offset=0,$reset=0,$search=$('#filter-field').val()){
                $('#product-holder').html('<center><i>Loading data...</i></center>')
                var catId = $('#nav_cat').find('.nav-item.active .nav-link').attr('data-cat');
                // console.log(catId)
                $.ajax({
                    url:'<?php echo base_url('order/p_load') ?>',
                    method:'POST',
                    data:{cat_id:catId ,offset:$offset,search:$search},
                    error:err=>{
                        console.log(err)

                    },
                    success:resp=>{
                        if(resp){
                            if(typeof resp != undefined){
                                var resp = JSON.parse(resp)
                                var html = '';
                                var data = resp.list;
                                // console.log(Object.keys(data).length)
                                if(Object.keys(data).length > 0)
                                $('#product-holder').html('')
                                else
                               $('#product-holder').html('<center><i>No data to be display...</i></center>')


                                Object.keys(data).map(k=>{
                                    var card = $('#clone_card_data .card-data').clone();
                                    card.find('.card-img-top').attr('src','<?php echo base_url() ?>'+data[k].img_path)
                                    card.find('.cat_name').html(data[k].cat_name)
                                    card.find('.pname').html(data[k].name)
                                    card.find('.price').html('&#36; '+data[k].price)
                                    card.attr('data-id',data[k].id)
                                $('#product-holder').append(card)
                                    // html += card;
                                  pclick_f();
                                })

                                if($reset == 1)
                                {
                                  var pages = parseInt(resp.count) / 8;
                                  pages = parseFloat(pages).toLocaleString('en-US',{style:'decimal',minimumFractionDigits:1,maximumFractionDigits:1,useGrouping:false});
                                  pages = pages.split('.')

                                  if(typeof pages[1] != undefined &&  pages[1] > 0)
                                  pages = parseInt(pages[0]) + 1;
                                  else
                                  pages = pages[0];
                                  // $('#pagination').find('.pg_nums').each(()=>{
                                  // console.log($(this).remove())
                                  //   $(this).remove()
                                  // });
                                  html = $('#paginate-clone').html();
                                  // console.log(html)
                                  $('#pagination').html(html)
                                  html = '';
                                  for(var i = 1;i <= pages;i++ ){
                                    html += '<li class="page-item '+(i == 1 ? 'active' : '')+' pg_nums">'+
                                              ' <a class="page-link" data-topage="'+(i)+'" href="javascript:void(0)">'+
                                              (i)+
                                                '</a>'+
                                            '</li>';
                                  }
                                  $('#pagination .prev-page').after(html);
                                  $('#pagination .prev-page').addClass('disabled');
                                  if(pages == 1)
                                  $('#pagination .next-page').addClass('disabled');
                                  $('#pagination').attr({'data-pages':'true','data-last':pages});

                                }


                                
                            }
                        }
                    },
                    complete:()=>{
                        page_f();
                      }
                })
          }
          window.pclick_f = function(){
            $('#product-holder').find('.card-data').each(function(){
              $(this).click(function(){
                $.ajax({
                  url:'<?php echo base_url('order/get_prod_details') ?>',
                  method:'POST',
                  data:{id:$(this).attr('data-id')},
                  error:err=>{
                    console.log(err)
                  },
                  success:resp=>{
                    if(resp){
                      $('#product_description').find('#order_field').html('')
                      $('#product_description').find('#order_field').html(resp)
                      $('#product_description').modal('show')
                    }
                  }
                })
                
              })
            })
          }
          window.load_pg = function(){
              var html ='';

              $.ajax({
                url:'<?php echo base_url('order/load_pg') ?>',
                method:'POST',
                data:{},
                error:err=>{
                  console.log(err)
                },
                success:resp=>{
                  if(typeof resp != undefined){
                    resp = JSON.parse(resp)
                    Object.keys(resp).map(k=>{
                      html = '<li class="nav-item">'+
                              '<a class="nav-link" href="javascript:void(0)" data-cat="'+resp[k].id+'">'+resp[k].name+
                                '<span class="sr-only">(current)</span>'+
                              '</a>'+
                            '</li>'

                      $('#cat-field').append(html);
                    })
                  }
                },
                complete:()=>{
                  cat_f();
                }
              })
          }
          window.cat_f = function(){
            $('#cat-field').find('.nav-link').each(function(){
              $(this).click(function(){
                $('#filter-field').val('')
                $('#cat-field').find('.nav-item.active').removeClass('active');
                $(this).closest('li').addClass('active');
                load_pcards(0,1)
                $('#basicExampleNav').removeClass('show')
                $('html, body').animate({
                    scrollTop: $("#product-holder").offset().top - "150"
                }, 'fast');
              })
            })
          }
          window.page_f =function(){
            $('#pagination .page-link').each(function(){
              $(this).click(function(){
                var toPage = $(this).attr('data-topage');
                var lastPage = $('#pagination').attr('data-last')
                var a = $('#pagination').find('.page-item.active .page-link').attr('data-topage');

                // console.log(toPage,lastPage,a)
                if(toPage == 'prev'){
                  toPage = parseInt(a) - 1;
                }else if(toPage == 'next'){
                  toPage = parseInt(a) + 1;
                }
                $('#pagination').find('.page-item.active').removeClass('active');
                $('#pagination').find('.page-link[data-topage="'+toPage+'"]').closest('li').addClass('active')

                var offset = (parseInt(toPage) - 1) * 8;
                if(toPage == '1'){
                  $('#pagination').find('.page-item.prev-page').addClass('disabled');
                }else{
                  $('#pagination').find('.page-item.prev-page').removeClass('disabled');
                }
                if(toPage == lastPage){
                  $('#pagination').find('.page-item.next-page').addClass('disabled');
                }else{
                  $('#pagination').find('.page-item.next-page').removeClass('disabled');
                }
                // console.log(toPage == '1',toPage == lastPage)
                load_pcards(offset);
                $('html, body').animate({
                    scrollTop: $("#nav_cat").offset().top
                }, 'fast');

              })
            })
          }
      
		  
</script>

</body>

</html>
