 <section style="background-color: #036a30;">
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-10">
      <nav id="navigation" class="navbar navbar-expand-lg navbar-light" style="padding: 0;">
              <!-- <a  class="navbar-brand ml-4 text-dark " href="#">COMPANY NAME</a> -->
    <button style="border: 1px solid white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse text-danger" id="navbarSupportedContent">
      <ul class="navbar-nav  mr-auto  ml-4 text-uppercase">
        <li class="nav-item  js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="./">Home</a>
        </li>
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="<?php echo ('Welcome/about_us') ?>">About Us</a>
        </li>
        <!--<li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="<?php echo ('Welcome/page') ?>">Page</a>
        </li>-->
        
		<?php
			foreach ($menu_data as $row)
			{ 
			 $menu_title = $row ['page_name_english']; 
			 $submenu_title = $row ['submenu'];
			 if ($submenu_title)
			 { ?>
		         <li class="nav-item dropdown">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" 
		        		aria-expanded="false" style="color:white;font-size: 15px;"><?php echo $menu_title; ?></a>
		        		 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        <?php 
			      	$str_arr = explode (",", $submenu_title);
			      	for ($i = 0; $i < count($str_arr); $i++)  { ?>
                              <a class="dropdown-item" href="<?php echo ('Welcome/page/').$str_arr[$i];?>"><?php echo $str_arr[$i]; ?></a>
                            
        		<?php 	 } ?>
 			      	 </div>
		      	 </li> 
		<?php } else{ ?>
	
			<li class="nav-item dropdown">
		        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;font-size: 15px;">
		          <?php echo $menu_title; ?>
		        </a>
        	</li>
	
	<?php  }}?>
	
	
	
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="?id=about">Notification</a>
        </li>
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="?id=about">Publication</a>
        </li>
       
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="?id=about">RTI</a>
        </li>
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="?id=about">Media Gallery</a>
        </li>
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="?id=about">Contact Us</a>
        </li>
        <li class="nav-item js-scroll-trigger">
          <a style="color:white;font-size: 15px;" class="nav-link" href="?id=about">Important Links</a>
        </li>
      
                  
        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="color:white;font-weight: bold;font-size: 14px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Projects
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="color:#000;font-size: 14px;" href="?id=currentproject">Current Projects</a>
      <a class="dropdown-item" style="color:#000;font-size: 14px;" href="?id=completed">Completed Projects</a>
      <a class="dropdown-item" style="color:#000;font-size: 14px;" href="?id=upcoming">Upcoming Projects</a>
      <a class="dropdown-item" style="color:#000;font-size: 14px;" href="?id=residental">Residential Projects</a>
      <a class="dropdown-item" style="color:#000;font-size: 14px;" href="?id=commercial">Commercial Projects</a>
         
        </div> -->
  
  </ul>
                
  </div>
  </nav>
  </div>
    <div class="col-md-2">

<div style="background: #1da258;">
          <a style="color:white;font-size: 15px;" class="nav-link" href="<?php echo ('district') ?>"><span><i class="fa fa-sign-in-alt"></i></span> &nbsp;District Login</a>
        </div>
</div>

     </div>
     </div>
   </section>

