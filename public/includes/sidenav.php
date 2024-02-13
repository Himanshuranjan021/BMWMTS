<?php $role = $this->session->userdata('bmw_role');
if ($role == 1) {
?>

  <div class="nav-side-menu">
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul id="menu-content" class="menu-content collapse out">
        <li>
          <span class="das-ar"> <i class="fa fa-chart-line"></i></span>
          <a href="<?php echo site_url('index.php/admin/dashboard'); ?>"> Dashboard
          </a>
        </li>

        <li data-toggle="collapse" data-target="#products" class="collapsed active">
          <a href="#"><i class="fa fa-gift fa-lg"></i> Master Entry <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
        </li>
        <ul class="sub-menu collapse" id="products">
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/district'); ?>">District Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/organisation'); ?>">HCF Category Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/hcf_master'); ?>">HCF Type Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/department'); ?>">Adminstrative Unit </a></li>

          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/waste_master'); ?>">Waste Category Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/disposal_method_master'); ?>">Disposal Method Master </a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/vc_type_master'); ?>">Vehicle Type Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/VehicleController/viewVehicles'); ?>">Vehicle List</a></li>
        </ul>

        <li><span class="das-ar"><i class="fa fa-user fa-lg"></i></span><a href="<?php echo site_url('index.php/admin/create_district_headquarter'); ?>">District H.Q Master</a></li>



        <li data-toggle="collapse" data-target="#report" class="collapsed active">
          <a href="#"><i class="fa fa-gift fa-lg"></i> Reports <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
        </li>
        <ul class="sub-menu collapse" id="report">
          <!-- 
          <li><a href="<?php echo site_url('index.php/admin/daily_report'); ?>"><i class="fa fa-user fa-lg"></i> Daily Reports <span class="arrow"><i></i></span></a></li> -->

          <li>
            <a href="<?php echo site_url('index.php/admin/transaction_report'); ?>"><i class="fa fa-user fa-lg"></i> Transaction Reports <span class="arrow"><i></i></span></a>
          </li>
          <li>
            <a href="<?php echo site_url('index.php/admin/date_wise_report'); ?>"><i class="fa fa-user fa-lg"></i> Date Wise Reports <span class="arrow"><i></i></span></a>
          </li>
          <li>
            <a href="<?php echo site_url('index.php/admin/occupancy_average'); ?>"><i class="fa fa-user fa-lg"></i> Occupancy Reports <span class="arrow"><i></i></span></a>
          </li>
          <li>
            <a href="<?php echo site_url('index.php/admin/hcf_profile_report'); ?>"><i class="fa fa-user fa-lg"></i> HCF Profile Reports <span class="arrow"><i></i></span></a>
          </li>

          <li>
            <a href="<?php echo site_url('index.php/admin/pending_report'); ?>"><i class="fa fa-user fa-lg"></i> Pending Reports <span class="arrow"><i></i></span></a>
          </li>

        </ul>
        <li>
          <a href="<?php echo site_url('index.php/admin/track_vehicles'); ?>"><i class="fa fa-user fa-lg"></i> Track Vehicles <span class="arrow"><i></i></span></a>
        </li>
        <li>
          <a href="<?php echo site_url('index.php/admin/track'); ?>"><i class="fa fa-user fa-lg"></i> Track Barcode <span class="arrow"><i></i></span></a>
        </li>
      </ul>
    </div>
  </div>
<?php  } ?>



<?php $role = $this->session->userdata('bmw_role');
if ($role == 2) {
?>

  <div class="nav-side-menu">
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul id="menu-content" class="menu-content collapse out">
        <li>
          <span class="das-ar"> <i class="fa fa-chart-line"></i></span>
          <a href="dashboard"> Dashboard
          </a>
        </li>

        <!-- <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                   <a href="#"><i class="fa fa-gift fa-lg"></i> Master Entry <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
                 </li>
                 <ul class="sub-menu collapse" id="products">
                 
                 <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/dis_area_master'); ?>">District Area Master</a></li>
                 </ul> -->


        <li><span class="das-ar"><i class="fa fa-user fa-lg"></i></span><a href="<?php echo site_url('index.php/admin/create_organisation'); ?>">Create HCF</a></li>
        <li><span class="das-ar"><i class="fa fa-user fa-lg"></i></span><a href="<?php echo site_url('index.php/admin/treatment_plant_master'); ?>">Create CBWTF</a></li>


        <li data-toggle="collapse" data-target="#report" class="collapsed active">
          <a href="#"><i class="fa fa-gift fa-lg"></i> Reports <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
        </li>
        <ul class="sub-menu collapse" id="report">

          <!-- <li><a href="<?php echo site_url('index.php/admin/daily_report'); ?>"><i class="fa fa-user fa-lg"></i> Daily Reports <span class="arrow"><i></i></span></a></li> -->

          <li>
            <a href="<?php echo site_url('index.php/admin/transaction_report'); ?>"><i class="fa fa-user fa-lg"></i> Transaction Reports <span class="arrow"><i></i></span></a>
          </li>
          <li>
            <a href="<?php echo site_url('index.php/admin/date_wise_report'); ?>"><i class="fa fa-user fa-lg"></i> Date Wise Reports <span class="arrow"><i></i></span></a>
          </li>

          <li>
            <a href="<?php echo site_url('index.php/admin/occupancy_average'); ?>"><i class="fa fa-user fa-lg"></i> Occupancy Reports <span class="arrow"><i></i></span></a>
          </li>
          <li>
            <a href="<?php echo site_url('index.php/admin/hcf_profile_report'); ?>"><i class="fa fa-user fa-lg"></i> HCF Profile Reports <span class="arrow"><i></i></span></a>
          </li>

          <li>
            <a href="<?php echo site_url('index.php/admin/pending_report'); ?>"><i class="fa fa-user fa-lg"></i> Pending Reports <span class="arrow"><i></i></span></a>
          </li>

        </ul>
        <li>
          <a href="<?php echo site_url('index.php/admin/track_vehicles'); ?>"><i class="fa fa-user fa-lg"></i> Track Vehicles <span class="arrow"><i></i></span></a>
        </li>

        <li>
          <a href="<?php echo site_url('index.php/admin/track'); ?>"><i class="fa fa-user fa-lg"></i> Track Barcode <span class="arrow"><i></i></span></a>
        </li>
      </ul>
    </div>
  </div>
<?php  } ?>


<?php $role = $this->session->userdata('bmw_role');
if ($role == 3) {
?>

  <div class="nav-side-menu">
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul id="menu-content" class="menu-content collapse out">
        <li>
          <a href="dashboard">
            <i class="fa-thin fa-chart-line"></i> Dashboard
          </a>
        </li>

        <li data-toggle="collapse" data-target="#products" class="collapsed active">
          <a href="#"><i class="fa fa-gift fa-lg"></i> Master Entry <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
        </li>
        <ul class="sub-menu collapse" id="products">
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/district'); ?>">District Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/organisation'); ?>">HCF Category Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/hcf_master'); ?>">HCF Type Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/department'); ?>">Adminstrative Unit </a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/dis_area_master'); ?>">District Area Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/waste_master'); ?>">Waste Master</a></li>
          <li><span class="das-ar"><i class="fa fa-caret-right"></i></span><a href="<?php echo site_url('index.php/admin/vc_type_master'); ?>">Vehicle Type Master</a></li>
        </ul>

        <li><span class="das-ar"><i class="fa fa-user fa-lg"></i></span><a href="<?php echo site_url('index.php/admin/create_district_headquarter'); ?>">District H.Q Master</a></li>
        <li><span class="das-ar"><i class="fa fa-user fa-lg"></i></span><a href="<?php echo site_url('index.php/admin/create_organisation'); ?>">Create HCF</a></li>
        <li><span class="das-ar"><i class="fa fa-user fa-lg"></i></span><a href="<?php echo site_url('index.php/admin/treatment_plant_master'); ?>">Create CBWTF</a></li>


        <li data-toggle="collapse" data-target="#report" class="collapsed active">
          <a href="#"><i class="fa fa-gift fa-lg"></i> Reports <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
        </li>
        <ul class="sub-menu collapse" id="report">

          <li><a href="<?php echo site_url('index.php/admin/daily_report'); ?>"><i class="fa fa-user fa-lg"></i> Daily Reports <span class="arrow"><i></i></span></a></li>

          <li>
            <a href="<?php echo site_url('index.php/admin/transaction_report'); ?>"><i class="fa fa-user fa-lg"></i> Transaction Reports <span class="arrow"><i></i></span></a>
          </li>
          <li>
            <a href="<?php echo site_url('index.php/admin/date_wise_report'); ?>"><i class="fa fa-user fa-lg"></i> Date Wise Reports <span class="arrow"><i></i></span></a>
          </li>

          <li>
            <a href="<?php echo site_url('index.php/admin/hcf_profile'); ?>"><i class="fa fa-user fa-lg"></i> HCF Profile Reports <span class="arrow"><i></i></span></a>
          </li>
        </ul>
        <li>
          <a href="https://loconav.com/v2/track-a-day/08afb8efed?locale=en" target="_blank"><i class="fa fa-user fa-lg"></i> Track Vehicles <span class="arrow"><i></i></span></a>
        </li>
      </ul>
    </div>
  </div>
<?php  } ?>