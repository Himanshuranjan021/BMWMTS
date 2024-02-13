
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
.loginew {
    background: #ffffffbf;
    margin-top: 1%!important;
    border-radius: 8px;
    padding: 0!important;
}

</style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BMW</title>
  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url(); ?>public/assets/admin_new/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>public/assets/admin_new/css/style2.css" rel="stylesheet">
</head>
<?php include('application/views/header.php') ?>
<!-- <?php
echo'<b><div class="text-danger mt-5" style="text-align:center;">';
echo $error = isset($error)? $error :'';
echo'</div></b>';
?> -->
 <div class="alertback">
          <?php if ($this->session->flashdata('success')) { ?>
            
              <div class="alert alert-success alert-white rounded alertrsize">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                <p><?php echo $data1 = $this->session->flashdata('success');  ?></p>
              </div>
           
          <?php } else {} ?>

          <?php if ($this->session->flashdata('error')) { ?>
          
              <div class="alert alert-danger alert-white rounded alertrsize">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                <p><?php echo $data1 = $this->session->flashdata('error');  ?></p>
              </div>
          <?php } else {} ?>
		</div>



<body style="background: linear-gradient(45deg, transparent,#99d5c3);   overflow:hidden; mt-5">
  <!-- <body style="background: linear-gradient(45deg, transparent,#99d5c3);"> -->

  <div class="container-fluid">
    <div class="row">
      <!-- <div class="col-md-4 offset-4"> -->

      <div class="col-md-4">
      </div>
      <div class="loginew col-md-4 col-12">
        <div class="lognewimg">
        <h4 class="text-center">HCF LOGIN</h4>
          <!-- <img src="<?php echo base_url(); ?>public/assets/images/log-hd.png" class="img-fluid" /> -->
        </div>
        <div class="usr-img">
          <img class="img-thumbnail" src="<?php echo base_url(); ?>public/assets/images/user.png" />
        </div>
     

        <form class="lgnew-frm" method="post" action="" enctype="multipart/form-data" onsubmit="ValidCaptcha();">

          <div class="row">
            <div class="col-md-12">
              <input type="text" name="user_name" id="user_name" class="form-control loguname" placeholder="Username" value="" autocomplete="off" maxlength="50">
            </div>

            <div class="col-md-12 mt-3">
              <input type="Password" name="admin_pass" class="form-control loguname" placeholder="Password" id="admin_pass" autocomplete="off" maxlength="50">
            </div>



            <!-- captcha -->
            <div class="col-md-12 mt-3">
              <div class="capt d-flex ml-5" style="text-align:center;">
                <h2 type="text" id="digit1"> </h2>
                <h2>&nbsp;+&nbsp;</h2>
                <h2 type="text" id="digit2"></h2>
                <h2>&nbsp;= &nbsp;?</h2>

                <p><input type="button" id="refresh" value="&#8634;" onclick="randomNums();" /></p>
              </div>

              <input type="text" class="form-control" id="txtInput" placeholder="Enter Captcha" style="border-radius: 30px;" required />
              <div class="col-md-12 mt-4 m-0 p-0">
                <button name="admin_login" type="submit" name="submit" id="submit" value="Login" class="btn btn-success" onclick="addNums();" style="width:100%; border-radius:30px;"> Login</button><br>
                <div class="text-center pt-3">
                  <a href="<?php echo base_url() ?>index.php/organization/forgot_password" class="forgot">Forgot Password</a>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-4"> </div>


      <?php $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
      ); ?>
      <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
      </form>

    </div>
  </div>
  </div>

  <div class="container-fluid pt-5 pl-0 pr-0 pb-0 mt-4 d-none d-md-block">
    <img class="ft-imgg" src="<?php echo base_url(); ?>public/assets/images/bio-slide.png" />
  </div>
</body>

</html>


<script>
  window.onload = randomNums();

  function addNums() {

    var answer = document.getElementById("txtInput").value;

    var digit1 = parseInt(document.getElementById("digit1").innerHTML);

    var digit2 = parseInt(document.getElementById("digit2").innerHTML);

    var sum = digit1 + digit2;

    if (answer == "") {

      alert("Please add the numbers");
      return true;

    } else if (answer != sum) {

      alert("Your math is so poor. Validation Failed !");
      event.preventDefault();
      randomNums();
      document.getElementById("txtInput").value = "";

    } else {

      // all good now! //

      //document.getElementById("status").innerHTML = "Correct, it is now safe to submit the form";

      //document.getElementById("txtInput").value = "";

    }





  }

  function randomNums() {

    var rand_num1 = Math.floor(Math.random() * 10) + 1;

    var rand_num2 = Math.floor(Math.random() * 10) + 1;

    document.getElementById("digit1").innerHTML = rand_num1;

    document.getElementById("digit2").innerHTML = rand_num2;

  }





  //   window.onload =Captcha();
  //    function Captcha(){
  //      var alpha = new Array('A','B','C','D','E','F','G','H','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
  // 	 	'a','b','c','d','e','f','g','h','j','k','m','n','o','p','q','r','s','t','u','v','w','x','y','z', 
  //  	    	'0','1','2','3','4','5','6','7','8','9');
  //      var i;
  //      for (i=0;i<6;i++){
  //          var a = alpha[Math.floor(Math.random() * alpha.length)];
  //          var b = alpha[Math.floor(Math.random() * alpha.length)];
  //          var c = alpha[Math.floor(Math.random() * alpha.length)];
  //          var d = alpha[Math.floor(Math.random() * alpha.length)];
  //          var e = alpha[Math.floor(Math.random() * alpha.length)];
  //          var f = alpha[Math.floor(Math.random() * alpha.length)];
  //          var g = alpha[Math.floor(Math.random() * alpha.length)];
  //                       }
  //          var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
  //          document.getElementById("mainCaptcha").innerHTML = code
  // 		 document.getElementById("mainCaptcha").value = code
  //        }
  // function ValidCaptcha(){
  //      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
  //      var string2 =         removeSpaces(document.getElementById('txtInput').value);
  //      if (string1 == string2){
  //            // $cap= true;
  //            return true;

  //            //document.getElementById("txtInput").setCustomValidity("");
  //      }else{ 
  //       //document.getElementById("txtInput").setCustomValidity("Enter A Valid Captcha") ;      
  //          // return false;
  //           alert( "Captcha Validation Failed !");
  //           event.preventDefault(); 
  //           Captcha();
  //         //  document. getElementById("submit").disabled = true;
  //           }
  // }
  // function removeSpaces(string){
  //      return string.split(' ').join('');
  // }
  // document.getElementsByName("submit")[0].onclick="alert(ValidCaptcha());"
</script>

<style>
  #refresh {
    float: right;
    margin-top: -10px;
    margin-right: 10px;
    margin-left: 20px;
    width: 30px;
    height: 30px;
  }
</style>