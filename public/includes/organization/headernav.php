<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>BMW</title>



     <!-- New includes -->


     <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>public/assets/admin_new/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/css/propstyle.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/vendor/fonts/flag-icon-css/flag-icon.min.css">  -->
     <link href="<?php echo base_url(); ?>public/assets/admin_new/css/jquery-ui.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/admin_new/css/jquery.ui.datepicker.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/css/font-awesome.min.css">
     <link href="<?php echo base_url(); ?>public/assets/admin_new/css/template.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin_new/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" /> 
     <!-- <link rel="stylesheet" href="assets/css/datatables.min.css" />  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/css/datatable.bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body>

<div class="container-fluid">
  

   <div class="row">
     <div class="das-hd">
     <nav class="navbar navbar-expand-md navbar-dark bg-dark sidebarNavigation" data-sidebarClass="navbar-dark bg-dark">        
        <!-- <div class="brand"><img class="br-img img-thumbnail" src="<?php echo base_url(); ?>public/assets/images/final_header_logo.png" /></div> -->
        <div class="hd-lg d-flex" >
        <img src="<?php echo base_url(); ?>public/assets/images/logo-hd.png" style="width:17%;">
        <h2 style="padding-top:25px; padding-left:5px; color:#fff;">Bio Medical Waste Management</h2>
        </div>
       
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
     
            <ul class="nav navbar-nav nav-flex-icons ml-auto adm">
                <li class="nav-item dropdown adm-lg">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="<?php echo site_url('index.php/organization/logout'); ?>">Log Out</a>
                    </div>
                </li>
            </ul>
          
        </div>
        <div class="text-primary"> <?php  $org =$this->session->userdata('bmw_org_name'); echo $org; ?></div>
    </nav>
     </div>
</div>
</div>
</body>
