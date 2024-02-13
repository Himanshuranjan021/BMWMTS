<?php $role = $this->session->userdata('bmw_cbwtf_role');
if ($role == 0) { ?>
  <div class="nav-side-menu">

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul id="menu-content" class="menu-content collapse out">
        <li>
          <span class="das-ar"> <i class="fa fa-chart-line"></i></span>
          <a href="<?php echo site_url('index.php/cbwtf/cbwtf_dashboard'); ?>"> Dashboard
          </a>
        </li>
        <!-- 
                 <li >
                   <a href="<?php echo site_url('index.php/cbwtf/receive_waste_collection'); ?>"><i class="fa fa-item fa-lg"></i>Receive Waste Bag <span class="arrow"><i></i></span></a>
                 </li>

                 <li >
                   <a href="<?php echo site_url('index.php/cbwtf/dispose_waste_collection'); ?>"><i class="fa fa-item fa-lg"></i>Dispose Waste Bag  <span class="arrow"><i></i></span></a>
                 </li>  -->

        <li>
          <a href="<?php echo site_url('index.php/cbwtf/create_user'); ?>"><i class="fa fa-user fa-lg"></i>Create User <span class="arrow"><i></i></span></a>
        </li>


        <li>
          <a href="<?php echo site_url('index.php/cbwtf/weight_machine_master'); ?>"><i class="fa fa-user fa-lg"></i>Register Machine <span class="arrow"><i></i></span></a>
        </li>
        <li>
          <a href="<?php echo site_url('index.php/cbwtf/link_machine'); ?>"><i class="fa fa-user fa-lg"></i>Link Machine with User <span class="arrow"><i></i></span></a>
        </li>
        <li>
          <a href="<?php echo site_url('index.php/cbwtf/track_vehicle'); ?>"><i class="fa fa-truck-pickup"></i> Track Vehicles <span class="arrow"><i></i></span></a>
        </li>


        <li data-toggle="collapse" data-target="#products" class="collapsed active">
          <a href="#"><i class="fa fa-gift fa-lg"></i> Transaction Reports <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
        </li>
        <ul class="sub-menu collapse" id="products">

          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/cbwtf_daily_report'); ?>">Daily Report</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/cbwtf_transaction_report'); ?>">Transaction Report</a></li>

        </ul>

        <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/change_password'); ?>">Update Password</a></li>


      </ul>
    </div>
  </div>
<?php } elseif ($role == 2) { ?>


  <div class="nav-side-menu">

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul id="menu-content" class="menu-content collapse out">
        <li>
          <a href="<?php echo site_url('index.php/cbwtf/cbwtf_dashboard'); ?>">
            <i class="fa fa-dashboard fa-lg"></i> Dashboard
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('index.php/cbwtf/receive_waste_collection'); ?>"><i class="fa fa-item fa-lg"></i>Receive Waste Bag <span class="arrow"><i></i></span></a>
        </li>

        <!-- <li>
          <a href="<?php echo site_url('index.php/cbwtf/receive_waste_collection_manual'); ?>"><i class="fa fa-item fa-lg"></i>Receive Waste Bag Manual<span class="arrow"><i></i></span></a>
        </li> -->
        <li>
          <a href="<?php echo site_url('index.php/cbwtf/dispose_waste_collection'); ?>"><i class="fa fa-item fa-lg"></i>Dispose Waste Bag <span class="arrow"><i></i></span></a>
        </li>

        <!-- <li >
         <a href="<?php echo site_url('index.php/cbwtf/create_user'); ?>"><i class="fa fa-item fa-lg"></i>Create User <span class="arrow"><i></i></span></a>
       </li> -->


        <!-- <li  data-toggle="collapse" data-target="#products" class="collapsed active">
         <a href="#"><i class="fa fa-gift fa-lg"></i> Transaction Reports <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
       </li>
       <ul class="sub-menu collapse" id="products">
       
       <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/cbwtf_daily_report'); ?>">Daily Report</a></li>
       <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/cbwtf_transaction_report'); ?>">Transaction Report</a></li>

       </ul>  -->
        <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/cbwtf_daily_report'); ?>">Daily Report</a></li>
        <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/cbwtf/change_password'); ?>">Update Password</a></li>



      </ul>
    </div>
  </div>




<?php } ?>