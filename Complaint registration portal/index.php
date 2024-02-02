<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

    
    <body id="page-top" class="bg-dark">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
               
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                     <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin/"><b style="color:slategrey;">Admin login</b></a>
                    </li>
                        <?php if(isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=complaint_list">My Complaint List</a></li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome ".$_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a></li> -->
                        <div class=" dropdown mr-4">
                            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
                              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                                <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                              </div>
                        </div>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">User Login</a></li>
                      <?php endif; ?>
                       
                        
                     
                    </ul>
                </div>
            </div>
        </nav>
  <header class="masthead">
      <div class="container-fluid h-100">
          <div class="row h-100 align-items-center justify-content-center text-center">
              <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">WELCOME TO COMPLAINT REGISTRATION PORTAL</h3>
                  <hr class="divider my-4" />
              <div class="row mb-2 text-left justify-content-center ">
                 <button class="btn btn-primary" type="button" id="report_crime">Report a Complaint</button>
              </div>                        
              </div>
              
          </div>
      </div>
  </header>
  
<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
 
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  <div id="preloader"></div>
       
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#find-car').submit(function(e){
        e.preventDefault()
        location.href = 'index.php?page=search&'+$(this).serialize()
      })
      $('#report_crime').click(function(){
        if('<?php echo !isset($_SESSION['login_id']) ? 1 : 0 ?>'==1){
          uni_modal("Login",'login.php');
          return false;
        }
          uni_modal("Report",'manage_report.php');
      })
      $('#manage_my_account').click(function(){
          uni_modal("Manage Account",'signup.php');
      })
    </script>
    <?php $conn->close() ?>

</html>
