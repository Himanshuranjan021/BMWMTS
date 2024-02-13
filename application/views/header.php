<style> 

@media screen and (max-width: 600px) {




    .box {
    width: 100% !important;
    margin: 7% !important;
}
	
	body {
    overflow: scroll!important;
}
.row{margin:0!important;}
.mainpg-mid-sec {
    background: url(mid-bg.jpg) no-repeat;
    height: 100%!important;
	padding: 0 15px!important
	}
	
	.top-divder {
    display: none!important;
}
.top-hder .hd-txt {
    padding: 10px 0 0 70px!important;
}
.top-hder .hd-txt h5 {
    font-size:15px!important;
}
.ic-box-sec {
    padding: 0 0 0 0 !important;
}
.mid-bx {
    width: 100px !important;
    height: 100px !important;
	}
	
.mid-bx-4 {
    margin:-7px 0 0 188px !important;
}
.mid-bx-2 {
   margin: -9px 0 0 102px !important;
}
.mid-bx-1 {
    margin: 43px 0 0 190px !important;
}
.mid-bx-3 {
    margin: -103px 0 0 278px !important;
}
/* .top-logo {
    height: 80px;
    padding: 8px!important;
} */
/* .top-hder .hd-txt {
    padding: 12px 0 0 75px!important;
	width: 96%;
	text-align:center;
} */

	
.top-hder .hd-txt-rt h5 {
     font-size:15px!important;
}	
	
	
}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMW</title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/fullcalendar.css">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>    
</head>

  <body>
  <section  id="main">

<style>
.MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }

.impotant_links ul{

  padding: 0 25px;
  overflow-y: scroll;
  height: 240px;

}
 
.guidelines ul {
    padding: 0 25px;
    overflow-y: scroll;
    height: 230px; 
}

.impotant_numbers {
    height: 260px;
    padding: 15px;
    overflow-y: scroll;
}
</style>

<script type="text/javascript">
 var $affectedElements = $("div,p,ul,li,nav,h3,h4,span"); // Can be extended, ex. $("div,p,ul,li,nav span.someClass")

// Storing the original size in a data attribute so size can be reset
$affectedElements.each( function(){
  var $this = $(this);
  $this.data("orig-size", $this.css("font-size") );
});

$("#btn-increase").click(function(){
  changeFontSize(1);
})

$("#btn-decrease").click(function(){
  changeFontSize(-1);
})

$("#btn-orig").click(function(){
  $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , $this.data("orig-size") );
   });
})

function changeFontSize(direction){
    $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , parseInt($this.css("font-size"))+direction );
    });
}
</script>

<div class="top-hder">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <a href="<?php echo base_url(); ?>">
			<div class="hd-lg"><img class="top-logo"  src="http://bmwodisha.in/public/assets/images/logo-hd.png" /></div>
            <div class="hd-txt">
                <h5 style="line-height: 30px;color: #000;">Bio-Medical Waste Management & Tracking System</h5>
            </div>
			</a>
        </div>
		
		<div class="top-divder col-md-1 col-xs-12"></div>

       <div class="col-md-5 col-xs-12 login">
				<a href="<?php echo base_url(); ?>">
					<div class="hd-lg"><img class="top-logo"  src="<?php echo base_url(); ?>public/assets/images/odisha-govt.png" /></div>
					<div class="hd-txt-rt">
						<h5 style="line-height: 30px;color: #000;">Health & Family Welfare Department</h5>
						<h5 style="line-height:10px; text-align:left;color: #000;">Government of Odisha</h5>
					</div>
				</a>
    
        </div>
    </div>
</div>

<style>
  .top-logo
{
    height: 80px !important;
    padding: 10px 25px 10px 10px !important;
}
.top-hder {
    padding: 0;
    width: 100%;
    background: #fff;
}
.top-hder .hd-txt-rt {
    padding: 15px 0 0 70px;
}

.top-hder .hd-lg {
    float: left;
    height: 80px;
    padding: 0px 15px 0 0;
}
.top-divder {
    background:transparent;
    height: 50px;
    width: 3px;
    border-left: 1px solid #ccc;
    margin-top: 17px;
}
	
.lognewimg {
    box-shadow: 0px 7px 19px -6px rgba(50, 50, 50, 0.5);
    background: #28a745;
    color: #fff;
	padding: 5px 0;
	border-radius: 8px 8px 0 0;
}
.ft-imgg {
    bottom: 0;
    background: url(img/lgnew-border.png);
    /* height: 200px; */
    width: 100%;
    background-size: cover;
    position: absolute;
	left:0;
	right:0;
}
.usr-img {
    background: #c7c1c1;
    height: 70px;
    width: 70px;
    margin: 10px auto;
    padding: 3px;
    border-radius: 100%;
    border: #060 solid 1px;
}

/* 
.top-hder .hd-txt {
        padding: 0 !important;
    } */

    .top-hder .hd-txt {
    padding: 26px 0 0 70px;
}
	

    .top-hder ul {
        padding-left: 0 !important;
    }

  


    .hd-txt h2 {
        font-size: 26px !important;
    }
</style>