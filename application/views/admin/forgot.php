<?php
echo $error_msg = isset($error_message)? $error_message :'';
?>

<!-- <?php
//session_start();
	if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
	else{
		echo "<script>alert('Verification code match !');</script>" ;
	}
?> -->
<!DOCTYPE html>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Bio-Medical Waste</title>
    <!-- Bootstrap CSS -->
    
     <link href="<?php echo base_url(); ?>public/assets/admin_new/css/bootstrap.min.css"  rel="stylesheet"> 
     <link href="<?php echo base_url(); ?>public/assets/admin_new/css/style2.css"  rel="stylesheet">
</head>





<body style="background: linear-gradient(45deg, transparent,#99d5c3);"> 
<!-- <body style="background: linear-gradient(45deg, transparent,#99d5c3);"> -->
  
     <div class="container-fluid">
         <div class="row">
             <!-- <div class="col-md-4 offset-4"> -->

                  <div class="col-md-4">
                  </div> 
        <div class="loginew col-md-4 col-12">
          <div class="lognewimg">
          <img src="<?php echo base_url(); ?>public/assets/images/log-hd.png" class="img-fluid"  />
          </div>
            <div class="usr-img">
            <img class="img-thumbnail" src="<?php echo base_url(); ?>public/assets/images/user.png" />
            </div>
             <h4 class="text-center">ADMIN LOGIN</h4>
          
              <form class="lgnew-frm" method="post" action="" enctype="multipart/form-data" onsubmit = "ValidCaptcha();" >

              <div class="row">
                <div class="col-md-12">
                <input type="text" name="admin_email" id="user_name" class="form-control loguname" placeholder="Username"  value="" autocomplete="off" maxlength="50" required>
                </div>

                <div class="col-md-12 mt-3">
                <input  type="Password" name="admin_pass" class="form-control loguname" placeholder="Password" id="admin_pass" autocomplete="off" maxlength="50" required>
                </div>




<!-- captcha -->

<div class="capt"> 
   <h2 type="text" id="mainCaptcha"></h2>
    <p><input type="button" id="refresh" onclick="Captcha();"/></p>
     <!-- <img src="<?php echo base_url(); ?>public/assets/images/refresh.png" alt="">    -->
     <input type="text" id="txtInput" required/>    
   <!-- <input id="Button1" type="button" value="Check" onclick="alert(ValidCaptcha());"/> -->
   </div>


                <div class="col-md-12 mt-4">
                <button name="admin_login" id="submit" name="submit" type="submit" value="Login" class="btn btn-success" style="width:100%; border-radius:30px;" > Login</button><br>
                 <div class="text-center pt-3">    
                <a href="FPassword/1/2" class="forgot">Forgot Password</a>
                </div>
                </div>
             </div>
            </div>
        </div>
        <div class="col-md-4"> </div>
             </form>
            
        </div>
     </div>  

     <div class="container-fluid pt-5 pl-0 pr-0 pb-0 mt-4 d-none d-md-block">
     <img class="ft-imgg" src="<?php echo base_url(); ?>public/assets/images/lg-new-bottom.png" />
</div>
</body>
 
</html>
<script>
  
  window.onload =Captcha();
   function Captcha(){
     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
	 	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', 
 	    	'0','1','2','3','4','5','6','7','8','9');
     var i;
     for (i=0;i<6;i++){
         var a = alpha[Math.floor(Math.random() * alpha.length)];
         var b = alpha[Math.floor(Math.random() * alpha.length)];
         var c = alpha[Math.floor(Math.random() * alpha.length)];
         var d = alpha[Math.floor(Math.random() * alpha.length)];
         var e = alpha[Math.floor(Math.random() * alpha.length)];
         var f = alpha[Math.floor(Math.random() * alpha.length)];
         var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
         var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
         document.getElementById("mainCaptcha").innerHTML = code
		 document.getElementById("mainCaptcha").value = code
       }
function ValidCaptcha(){
     var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
     var string2 =         removeSpaces(document.getElementById('txtInput').value);
     if (string1 == string2){
          
           return true;
         
          
     }else{ 
     
         // return false;
          alert( "Captcha Validation Failed !");
          event.preventDefault(); 
          Captcha();
       
          }
}
function removeSpaces(string){
     return string.split(' ').join('');
}
document.getElementsByName("submit")[0].onclick="alert(ValidCaptcha());"
</script>

<style>
.capt{
	background-color:#eef8f5;
	width: 300px;
	height:100px;
	
}

#mainCaptcha{
	position: relative;
	left : 60px;
	top: 5px;
	
}

#refresh{
	position:relative;
	left:270px;
	width:30px;
	height:30px;
	bottom:45px;
  top:40px

background-image: url(rpt.jpg);
}

#txtInput, #Button1{
	position: relative;
	left:40px;
	bottom: 40px;
//  top: 20px;
}
  </style>
