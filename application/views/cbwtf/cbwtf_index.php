<style>
  @media screen and (max-width: 600px) {

    .box {
      width: 42% !important;
      margin: 1% !important;
    }
  }



  body {
    background: #f0f2f5;
  }


  .dashcard {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 1);
    border-radius: .75rem;
  }

  .dashcard .card-header {
    padding: 1.5rem;
  }

  .card-header:first-child {
    border-radius: .75rem .75rem 0 0;
  }

  .border-radius-xl {
    border-radius: .75rem;
  }

  /* .icon-lg {
    width: 64px;
    height: 64px;
} */
  .text-end {
    text-align: center !important;
  }

  .bg-gradient-primary {
    background-image: linear-gradient(195deg, #2f626a, #2b62d3);
  }

  .mt-n4 {
    margin-top: -1.5rem !important;
  }

  .position-absolute {
    position: absolute !important;
  }



  .box {
    width: 18%;
    margin: 1%;
  }

  .icon-lg {
    width: 35px;
    height: 35px;
    padding: 5px;
    top: -10px;
    left: 40%;
    border-radius: 100%;
  }

  .card-footer {
    border-top: 0;
    background: #f6f6ff00;
  }

  .card-ft-red {
    background: #ed0a0a;
    border-radius: 0 0 30px 30px;
    box-shadow: 0px 4px 5px -3px;
  }

  .card-header {
    background-color: #fcfcfc;
    border-bottom: 1px solid #e6e6f2;
    border-radius: 30px 30px 0 0 !important;
  }

  .card-footer {
    padding: 0 !important;
  }




  .bg-gradient-white {
    background-image: linear-gradient(195deg, #ededed, #a6a6a7);
  }

  .bg-gradient-red {
    background-image: linear-gradient(195deg, #2f626a, #e95555);
  }

  .bg-gradient-yellow {
    background-image: linear-gradient(195deg, #78780b, #ffff00);
  }

  .bg-gradient-gold {
    background-image: linear-gradient(195deg, #2f626a, #d4d405);
  }

  .nav-side-menu li:hover {
    background-color: #0a87e1 !important;
  }

  .card-header {
    background-color: #f7f7f7 !important;
  }

  .adm {
    margin-right: 13px !important;
  }

  .adm-txt {
    margin-right: 99px;
  }

  .card-header {
    box-shadow: 1px 0px 9px #e1e1e1 !important;
  }
</style>




<?php
if (!isset($_SESSION['bmw_plant_id'])) {
  return redirect('index.php/cbwtf');
} else {
  $admin_session = $_SESSION['bmw_plant_id'];
  $random = rand(102548, 984675);
  $date = date('Y-m-d');
?>

  <?php include('public/includes/cbwtf/headernav.php'); ?>


  <body>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 pl-0">
            <?php include('public/includes/cbwtf/sidenav.php'); ?>
          </div>

          <div class="col-md-10" style="min-height:120vh;">
            <div class="row">
              <div class="row pt-3 m-0">
                <!-- New one s1 -->
                <div class="box mt-3">
                  <div class="dashcard">
                    <div class="card-header p-3 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-white  text-center border-radius-xl  position-absolute">
                        <img src="<?php echo base_url(); ?>public/assets/images/icon1.png" style="width:80%;" />
                      </div>
                      <div class="text-end pt-3">
                        <p class="text-sm mb-0 text-capitalize">Today collection</p>
                        <h4 id="today_white" class="mb-0"></h4>
                      </div>

                      <div class="text-end">
                        <p class="text-sm mb-0 text-capitalize">Total collection</p>
                        <h4 id="total_white" class="mb-0"></h4>
                      </div>

                    </div>

                    <div class="card-footer">
                      <p class="mb-0" style="background-color:white; color:black; text-align:center; font-weight:bold; padding:8px; box-shadow: -2px 10px 13px -5px #d1d0d0;">White Collection</p>
                    </div>

                  </div>
                </div>
                <!-- New one end s1-->

                <!-- New one s2 -->
                <div class="box mt-3">
                  <div class="dashcard">
                    <div class="card-header p-3 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-red  text-center border-radius-xl  position-absolute">
                        <img src="<?php echo base_url(); ?>public/assets/images/icon1.png" style="width:80%;" />
                      </div>
                      <div class="text-end pt-3">
                        <p class="text-sm mb-0 text-capitalize">Today's collection</p>
                        <h4 id="today_red" class="mb-0"></h4>
                      </div>

                      <div class="text-end">
                        <p class="text-sm mb-0 text-capitalize">Total collection</p>
                        <h4 id="total_red" class="mb-0"></h4>
                      </div>

                    </div>

                    <div class="card-footer ">
                      <p class="mb-0" style="background-color:#e95555; color:black; text-align:center; font-weight:bold; padding:8px; box-shadow: -2px 10px 13px -5px #d1d0d0;">Red Collection</p>
                    </div>

                  </div>
                </div>
                <!-- New one end s2-->

                <!-- New one s3 -->
                <div class="box mt-3">
                  <div class="dashcard">
                    <div class="card-header p-3 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-primary  text-center border-radius-xl  position-absolute">
                        <img src="<?php echo base_url(); ?>public/assets/images/icon1.png" style="width:80%;" />
                      </div>
                      <div class="text-end pt-3">
                        <p class="text-sm mb-0 text-capitalize">Today collection</p>
                        <h4 id="today_blue" class="mb-0"></h4>
                      </div>

                      <div class="text-end">
                        <p class="text-sm mb-0 text-capitalize">Total collection</p>
                        <h4 id="total_blue" class="mb-0"></h4>
                      </div>

                    </div>
                    <div class="card-footer ">
                      <p class="mb-0" style="background-color:#5b5be6; color:black; text-align:center; font-weight:bold; padding:8px; box-shadow: -2px 10px 13px -5px #d1d0d0;">Blue Collection</p>
                    </div>
                  </div>
                </div>
                <!-- New one end s3-->

                <!-- New one s4 -->
                <div class="box mt-3">
                  <div class="dashcard">
                    <div class="card-header p-3 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-yellow  text-center border-radius-xl  position-absolute">
                        <img src="<?php echo base_url(); ?>public/assets/images/icon1.png" style="width:80%;" />
                      </div>
                      <div class="text-end pt-3">
                        <p class="text-sm mb-0 text-capitalize">Today collection</p>
                        <h4 id="today_yellow" class="mb-0"></h4>
                      </div>

                      <div class="text-end">
                        <p class="text-sm mb-0 text-capitalize">Total collection</p>
                        <h4 id="total_yellow" class="mb-0"></h4>
                      </div>

                    </div>

                    <div class="card-footer ">
                      <p class="mb-0" style="background-color:yellow; color:black; text-align:center; font-weight:bold; padding:8px; box-shadow: -2px 10px 13px -5px #d1d0d0;">Yellow Collection</p>
                    </div>

                  </div>
                </div>
                <!-- New one end s4-->

                <!-- New one s5 -->
                <div class="box mt-3">
                  <div class="dashcard">
                    <div class="card-header p-3 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-gold  text-center border-radius-xl  position-absolute">
                        <img src="<?php echo base_url(); ?>public/assets/images/icon1.png" style="width:80%;" />
                      </div>
                      <div class="text-end pt-3">
                        <p class="text-sm mb-0 text-capitalize">Today collection</p>
                        <h4 id="today_yellowC" class="mb-0"></h4>
                      </div>

                      <div class="text-end">
                        <p class="text-sm mb-0 text-capitalize">Total collection</p>
                        <h4 id="total_yellowC" class="mb-0"></h4>
                      </div>

                    </div>
                    <div class="card-footer ">
                      <p class="mb-0" style="background-color:#d4d405; color:black; text-align:center; font-weight:bold; padding:8px; box-shadow: -2px 10px 13px -5px #d1d0d0;">Yellow(C) Collection</p>
                    </div>
                  </div>
                  <!-- New one end s5-->
                </div>
                <!-- End of today dashboard -->

                <div class="mt-5" id="columnchart_material" style="width: 800px; height: 500px;"></div>

                <!-- <div id="piechart" style="width: 900px; height: 500px;"></div> -->

              </div>
            </div>
            <!-- End of today dashboard -->
          </div>
        </div>
    </section>
    <!-- New one end s5-->



    <footer class="footer">
      <?php include('public/includes/cbwtf/footer.php'); ?>
    </footer>


    <script>
      var data1 = <?php echo json_encode($get_daily_data); ?>;
      //console.log(data1);
      const modData1 = data1.reduce((a, c) => {
        const {
          category
        } = c;

        if (a[category]) {
          a[category]++;
        } else {
          a[category] = 1;
        }
        return a

      }, {});
      //console.log(modData1);


      var data2 = <?php echo json_encode($get_total_data); ?>;
      const modData2 = data2.reduce((a, c) => {
        const {
          category
        } = c;

        if (a[category]) {
          a[category]++;
        } else {
          a[category] = 1;
        }
        return a
      }, {});

      document.getElementById("today_red").innerHTML = modData1['Red'] ?? 0;
      document.getElementById("today_white").innerHTML = modData1['White'] ?? 0;
      document.getElementById("today_blue").innerHTML = modData1['Blue'] ?? 0;
      document.getElementById("today_yellow").innerHTML = modData1['Yellow'] ?? 0;
      document.getElementById("today_yellowC").innerHTML = modData1['Yellow(C)'] ?? 0;

      document.getElementById("total_red").innerHTML = modData2['Red'] ?? 0;
      document.getElementById("total_white").innerHTML = modData2['White'] ?? 0;
      document.getElementById("total_blue").innerHTML = modData2['Blue'] ?? 0;
      document.getElementById("total_yellow").innerHTML = modData2['Yellow'] ?? 0;
      document.getElementById("total_yellowC").innerHTML = modData2['Yellow(C)'] ?? 0;
    </script>




    <!-- <style>


.dashcard {
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 10%), 0 2px 4px -1px rgb(0 0 0 / 6%);
}

.dashcard {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .75rem;
}

.dashcard .card-header {
    padding: 1.5rem;
}
.card-header:first-child {
    border-radius: .75rem .75rem 0 0;
}

.border-radius-xl {
    border-radius: .75rem;
}
.icon-lg {
    width: 64px;
    height: 64px;
}
.text-end {
    text-align: right!important;
}
.bg-gradient-primary {
   background-image: linear-gradient( 
195deg,#2f626a,#133376);
}

.mt-n4 {
    margin-top: -1.5rem!important;
}
.position-absolute {
    position: absolute!important;
}
      </style>
        -->



  <?php } ?>