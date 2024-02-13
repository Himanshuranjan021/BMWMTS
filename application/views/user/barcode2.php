<script>
  window.addEventListener("load", click);
    function printDiv(eleId){
        var PW = window.open('', '_blank', 'Print content');
        PW.document.write(document.getElementById(eleId).innerHTML);
        PW.document.close();
        PW.focus();
        PW.print();
    }
function click(){     
  document.getElementById('print_button').click();
}
    </script>
   <div id="omm" style="display:none;">
         <img  src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=<?php echo $barcode_img;?>" style="width:50%; padding-left:45px;"/>
         <div style="text-align:center;"><?php echo $barcode_img;?></div>
         <div style="text-align:center;">RED</div>
    </div>
       <button onclick="printDiv('omm');" id="print_button" style="background-color: #05547F; border: 1px solid #05547F;  border-radius:5px; color: #ffffff;padding:6px; display:none">Print</button>  

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<script>
  onload="printDiv('omm');" 
</script>
