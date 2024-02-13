<html lang="en">

<section id="main">

    <style>
        .MultiCarousel {
            float: left;
            overflow: hidden;
            padding: 15px;
            width: 100%;
            position: relative;
        }

        .MultiCarousel .MultiCarousel-inner {
            transition: 1s ease all;
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item {
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item>div {
            text-align: center;
            padding: 10px;
            margin: 10px;
            background: #f1f1f1;
            color: #666;
        }

        .MultiCarousel .leftLst,
        .MultiCarousel .rightLst {
            position: absolute;
            border-radius: 50%;
            top: calc(50% - 20px);
        }

        .MultiCarousel .leftLst {
            left: 0;
        }

        .MultiCarousel .rightLst {
            right: 0;
        }

        .MultiCarousel .leftLst.over,
        .MultiCarousel .rightLst.over {
            pointer-events: none;
            background: #ccc;
        }

        .impotant_links ul {

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


        body {
            overflow: hidden;
        }

        .rd-mr {
            background: #33b148;
            padding: 5px 10px;
            border-radius: 9px;
            color: #fff;
            margin-top: 20px;
            display: block;
            width: 150px;
            text-align: center;
        }

        .rd-mr:hover {
            background: #000;
            text-decoration: none;
            color: #fff;
        }

        .mainpg-mid-sec {
            background: url('<?php echo base_url(); ?>public/assets/images/mid-bg.jpg') no-repeat;
            height: 80%;
            margin-top: 15px;
            padding: 50px 0;
            color: #fff;

        }

        .mainpg-mid-sec h3 {
            margin-top: 25px;
            padding: 50px 0 20px 0;
            color: #fff;

        }

        .pg-ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .pg-ul li {
            display: block;
        }

        .pg-ul li:before {
            content: "";
            left: 0;
            top: 0;
            background: transparent;
            display: inline-block;
            height: 10px;
            width: 10px;
            border: 2px solid #fff;
            transform: rotate(-45deg);
            margin: 0 10px;
        }



        .ic-box-sec {
            padding: 0 !important;
        }

        .mid-bx {
            width: 140px;
            height: 140px;
            background: rgba(255, 255, 255, 1);
            /* Rotate */
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            /* Rotate Origin */
            -webkit-transform-origin: 0 100%;
            -moz-transform-origin: 0 100%;
            -ms-transform-origin: 0 100%;
            -o-transform-origin: 0 100%;
            transform-origin: 0 100%;
            color: #333;
        }

        .mid-bx i {
            margin: 27% 45%;
            transform: rotate(45deg);
            font-size: 35px;
            box-shadow: none;
        }

        .mid-bx p {
            transform: rotate(43deg);
            margin: -31px 0px;
        }

        .mid-bx::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: 0.5s;
            transform: scale(0.9);
            z-index: -1;
            box-shadow: 0 0 1px #fff;
            transform: scale(1.1);
        }

        .mid-bx:hover::before {
            transform: scale(1.2);
            box-shadow: 0 0 15px #44951d;

        }

        .mid-bx:hover {
            color: #44951d;
            box-shadow: 0 0 5px #44951d;
            text-shadow: 0 0 5px #44951d;
        }

        .mid-bx-1 {
            margin: 50px 0 0 182px;
        }

        .mid-bx-2 {
            margin: -22px 0 0 62px;
        }

        .mid-bx-3 {
            margin: -136px 0 0 299px;
        }

        .mid-bx-4 {
            margin: -20px 0 0 177px;
        }
    </style>

    <div class="row mainpg-mid-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h3>Types of Bio-medical waste</h3>
                    <ul class="pg-ul">
                        <li>Human anatomical waste like tissues, organs and body parts.</li>
                        <li>Animal wastes generated during research from veterinary hospitals.</li>
                        <li>Microbiology and biotechnology wastes.</li>
                        <li>Waste sharps like hypodermic needles, syringes, scalpels and broken glass.</li>
                        <li>Discarded medicines and cytotoxic drugs.</li>
                    </ul>
                    <a class="rd-mr" href="#">Read More</a>
                </div>
                <div class="col-md-5 ic-box-sec">
                    <div class="mid-bx-1">
                        <a href="<?php echo base_url(); ?>index.php/admin">
                            <div class="mid-bx">
                                <i style="color:#e95555;" class="fas fa-user"></i>
                                <p>Admin Login</p>
                            </div>
                        </a>
                    </div>

                    <div class="mid-bx-2">
                        <a href="<?php echo base_url(); ?>index.php/organization">
                            <div class="mid-bx">
                                <i style="color:yellow;" class="fas fa-user"></i>
                                <p>HCF Admin Login</p>
                            </div>
                        </a>
                    </div>

                    <div class="mid-bx-3">
                        <a href="<?php echo base_url(); ?>index.php/user">
                            <div class="mid-bx">
                                <i style="color:#d4d405;" class="fas fa-user"></i>
                                <p>HCF User Login</p>
                            </div>
                        </a>
                    </div>

                    <div class="mid-bx-4">
                        <a href="<?php echo base_url(); ?>index.php/cbwtf">
                            <div class="mid-bx">
                                <i style="color:#2c83ef;" class="fas fa-user"></i>
                                <p>CBWTF Login</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <p style="font-weight: 400;font-size: 16px; text-align:center; color: #333;">Copyright © <?php echo date('Y'); ?> <b>Bio Medical Waste Management Unit. (H & FW Dept, Govt. of Odisha)</b> | All Rights Reserved.</p>
    </div>


    </div>


    <style>
        @media screen and (max-width: 600px) {


            .top-hder .hd-txt {
                padding: 0 !important;
            }

            .top-hder ul {
                padding-left: 0 !important;
            }

            .top-hder .hd-lg {
                width: 80px !important;

            }

            .hd-txt h2 {
                font-size: 26px !important;
            }

            .top-hder ul {
                padding-top: 0 !important;
            }

            .login ul li a {
                font-size: 12px !important;
            }

            .title-bannr {
                height: 30px !important;
            }

            .mainpg-mid-sec {
                height: 875px !important;
            }

            .table {
                margin-bottom: 30px !important;
            }

            .graph h3 {
                padding-top: 15px !important;
            }

            ic-box-sec {
                padding: 0 !important;
            }


            .mid-bx-1 {
                margin: 43px 0 0 150px !important;
            }

            .mid-bx-2 {
                margin: -9px 0 0 70px !important;
            }

            .mid-bx-3 {
                margin: -103px 0 0 235px !important;
            }

            .mid-bx-4 {
                margin: -7px 0 0 158px !important;
            }
        }
    </style>




    <style>
        /* #### Generated By: http://www.cufonfonts.com #### */

        @font-face {
            font-family: 'Circular Std Black';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Black'), url('CircularStd-Black.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Book';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Book'), url('CircularStd-Book.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Medium';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Medium'), url('CircularStd-Medium.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Black Italic';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Black Italic'), url('CircularStd-BlackItalic.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Bold';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Bold'), url('CircularStd-Bold.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Bold Italic';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Bold Italic'), url('CircularStd-BoldItalic.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Book Italic';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Book Italic'), url('CircularStd-BookItalic.woff') format('woff');
        }


        @font-face {
            font-family: 'Circular Std Medium Italic';
            font-style: normal;
            font-weight: normal;
            src: local('Circular Std Medium Italic'), url('CircularStd-MediumItalic.woff') format('woff');
        }

        .mt-40 {
            margin-top: 40px;
        }

        .card-box {
            position: relative;
            background: #fff;
            color: #333333;
            padding: 10px;
            margin: 20px 0px;
            border: 1px solid #fff !important;
            background: linear-gradient(159deg, rgb(48 100 105) 0%, rgb(8 33 123) 100%);
        }


        .card-box h3 {
            line-height: 30px;
            color: #fff;
        }

        .card-box h4 {
            line-height: 0px;
            /*color: #929191;*/
            letter-spacing: 6px;
            color: #fff;
            font-size: 26px;
        }

        .card-box:hover {
            box-shadow: 1px 5px #ccc;
            transition: 0.3s;
            border: 1px solid #1195f261 !important;
        }

        .card-box .icon {
            background: rgb(2, 0, 36);
            background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
            height: 44px;
            width: 44px;
            border-radius: 100%;

            /*	transition: transform 250ms, opacity 400ms;
*/
        }

        .card-box .icon:hover {
            /*	transform: scale(1.2);
opacity: .7;
*/
            transition: 0.70s;
            -webkit-transition: 0.70s;
            -moz-transition: 0.70s;
            -ms-transition: 0.70s;
            -o-transition: 0.70s;
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);

        }

        .card-box .icon:before {
            content: '';
            border: 1px solid #fff;
            height: 55px;
            width: 55px;
            border-radius: 100%;
            position: absolute;
            margin: -5px -5px;
        }

        .card-box .icon img {
            height: 30px;
            /* line-height: 50px; */
            margin: 7px 0 0 7px;
        }

        .card.card-box {
            padding: 20px 31px;
        }

        .graph {
            height: 460px;
            width: 100%;
        }

        .quicklink {
            /*background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(0,164,255,0.4374124649859944) 100%);*/
            background: #fff;
            border-radius: 10px;

        }

        .quicklink h4 {
            padding: 28px 15px 9px 15px;
            line-height: 0px;
            color: #134df3
        }

        .quicklink ul {
            list-style: none;
            padding: 0px 15px 15px 15px;
        }

        .quicklink ul li {
            display: block;
            padding: 5px 0;
            background: transparent;
            margin: 3px;
            border-bottom: 1px dashed #ddd;
        }

        .quicklink ul li:hover {
            display: block;
            padding: 5px 0;
            /* background: rgb(255,255,255);
background: linear-gradient(267deg, rgba(255,255,255,1) 0%, rgba(0,164,255,0.4374124649859944) 100%);*/
            margin: 3px;
            transition: 0.3s;
        }

        .quicklink ul li a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
        }

        .quicklink ul li a:hover {
            color: #1d5bfb;
            font-size: 14px;
            text-decoration: none;
            transition: 0.3s;
        }

        .quick-ic {
            padding: 0 7px;
            font-size: 17px;
        }


        .top-hder .hd-txt-rt {
            padding: 15px 0 0 70px;
        }

        .top-hder .hd-lg {
            float: left;
            height: 80px;
            padding: 0px 15px 0 0;
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: transparent !important;
            border: none !important;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }

        .top-hder ul {
            list-style: none;
            padding: 0px;
            margin: 0;
        }

        .top-hder ul li {
            display: inline;
        }

        .title-bannr {
            height: 200px;
            background-size: cover;
            margin-bottom: 40px;
        }

        .loginew {
            width: 30%;
            background: #ffffffbf;
            margin: 2% auto !important;
            border-radius: 8px;
        }

        .loginew img {
            background: #063;
            padding: 5px 0 5x 0;
            border-radius: 8px 8px 0 0;

        }

        .lognewimg {
            box-shadow: 0px 7px 19px -6px rgba(50, 50, 50, 0.5);
        }

        /*.lognewimg:before
{
background: url(../../../../img/log-hd-shdo.png) no-repeat;
content: "";
position: absolute;
width: 100%;
top:18%;
left:30%;
}*/


        .lgnew-frm {
            padding: 10px 15px 15px 55px;
        }

        .usr-img {
            background: #c7c1c1;
            height: 100px;
            width: 100px;
            margin: 15px auto;
            padding: 15px;
            border-radius: 100%;
            border: #060 solid 1px;
        }

        .lgnew-btnn {
            border-radius: 11px !important;
            padding: 5px 28px !important;
        }




        .ft-imgg {
            position: absolute;
            right: 0;
            bottom: 0;
            background: url(img/lgnew-border.png);
            height: 200px;
        }

        .rw-mlr {
            margin: 0 -5%;
        }

        .das-hd {
            width: 100% !important;
            position: fixed;
            z-index: 100;
        }

        .adm {
            margin-right: 120px;
        }

        .adm-cont {
            margin-top: 70px;
        }


        .br-img {
            height: 70px;
        }

        .das-ar {
            padding: 0 10px;
        }

        .orgisation-m-frm {
            width: 97%;
            padding: 25px;
            border: 1px solid #123276;
        }

        .orgisation-m-frm h5 {
            background: linear-gradient(159deg, rgb(48 100 105) 0%, rgb(8 33 123) 100%);
            width: 30%;
            padding: 4px 8px;
            margin-top: -42px;
            border-radius: 11px 0;
            color: #fff;
            margin-bottom: 40px;
        }

        .adm-lg {
            font-size: 14px;
            height: 30px;
            width: 30px;
            background: #17aee8;
            border-radius: 100%;
            line-height: 30px;
            padding-left: 0px;
            padding-top: 0px;
        }

        .org-btn {
            padding: 5px 15px !important;
        }

        .org-rset {
            position: relative;
            height: 25px;
            width: 25px;
            margin-top: -47px;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .9);
        }

        .nav-usr {
            background: #fff;
            border: 1px solid #17aee8 !important;
        }

        .dropdown-toggle::after {
            display: none;
        }


        .navbar {
            padding: .2rem 1rem !important;
        }

        .nav-side-menu {
            overflow: auto;
            font-family: verdana;
            font-size: 12px;
            font-weight: 200;
            background: linear-gradient(159deg, rgb(48 100 105) 0%, rgb(8 33 123) 100%);
            position: fixed;
            top: 75px;
            width: 300px;
            height: 100vh;
            color: #e1ffff;
        }

        .nav-side-menu .brand {
            background-color: #23282e;
            line-height: 50px;
            display: block;
            text-align: center;
            font-size: 14px;
        }

        .nav-side-menu .toggle-btn {
            display: none;
        }

        .nav-side-menu ul,
        .nav-side-menu li {
            list-style: none;
            padding: 0px;
            margin: 0px;
            line-height: 50px;
            cursor: pointer;
            /*    
.collapsed{
.arrow:before{
         font-family: FontAwesome;
         content: "\f053";
         display: inline-block;
         padding-left:10px;
         padding-right: 10px;
         vertical-align: middle;
         float:right;
    }
}
*/
        }

        .nav-side-menu ul :not(collapsed) .arrow:before,
        .nav-side-menu li :not(collapsed) .arrow:before {
            font-family: FontAwesome;
            content: "";
            display: inline-block;
            padding-left: 10px;
            padding-right: 10px;
            vertical-align: middle;
            /* float: right; */
        }

        .nav-side-menu ul .active,
        .nav-side-menu li .active {
            border-left: 3px solid #7cdbf1;
            background-color: #4f5b69;
        }

        .nav-side-menu ul .sub-menu li.active,
        .nav-side-menu li .sub-menu li.active {
            color: #d19b3d;
        }

        .nav-side-menu ul .sub-menu li.active a,
        .nav-side-menu li .sub-menu li.active a {
            color: #d19b3d;
        }

        .nav-side-menu ul .sub-menu li,
        .nav-side-menu li .sub-menu li {
            background-color: #181c20;
            border: none;
            line-height: 28px;
            border-bottom: 1px solid #23282e;
            margin-left: 0px;
        }

        .nav-side-menu ul .sub-menu li:hover,
        .nav-side-menu li .sub-menu li:hover {
            background-color: #020203;
        }

        .nav-side-menu ul .sub-menu li:before,
        .nav-side-menu li .sub-menu li:before {
            font-family: Fontawesome;
            content: "";
            display: inline-block;
            padding-left: 20px;
            padding-right: 10px;
            vertical-align: middle;
        }

        .nav-side-menu li {
            padding-left: 0px;
            border-left: 3px solid #2e353d;
            border-bottom: 1px solid #23282e;
        }

        .nav-side-menu li a {
            text-decoration: none;
            color: #e1ffff;
        }

        .nav-side-menu li a i {
            padding-left: 10px;
            padding-right: 20px;
        }

        .nav-side-menu li:hover {
            border-left: 3px solid #7cdbf1;
            background-color: #4f5b69;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }

        @media (max-width: 767px) {
            .nav-side-menu {
                position: relative;
                width: 100%;
                margin-bottom: 10px;
            }

            .nav-side-menu .toggle-btn {
                display: block;
                cursor: pointer;
                position: absolute;
                right: 10px;
                top: 10px;
                z-index: 10 !important;
                padding: 3px;
                background-color: #ffffff;
                color: #000;
                width: 40px;
                text-align: center;
            }

            .brand {
                text-align: left !important;
                font-size: 22px;
                padding-left: 20px;
                line-height: 50px !important;
            }

        }

        @media (min-width: 767px) {
            .nav-side-menu .menu-list .menu-content {
                display: block;
            }
        }

        body {
            margin: 0px;
            padding: 0px;
        }

        .nav-side-menu ul .sub-menu ul .sub-line li.active,
        .nav-side-menu li .sub-menu li .sub-line li.active {
            color: #d19b3d;
        }

        .nav-side-menu ul .sub-menu li .sub-line li.active a,
        .nav-side-menu li .sub-menu li .sub-line li.active a {
            color: #d19b3d;
        }

        .nav-side-menu ul .sub-menu li .sub-line li,
        .nav-side-menu li .sub-menu li .sub-line li {
            background-color: #181c20;
            border: none;
            line-height: 28px;
            border-bottom: 1px solid #23282e;
            margin-left: 0px;
        }

        .nav-side-menu ul .sub-menu li .sub-line li:hover,
        .nav-side-menu li .sub-menu li .sub-line li:hover {
            background-color: #020203;
        }

        .nav-side-menu ul .sub-menu li .sub-line li:before,
        .nav-side-menu li .sub-menu li .sub-line li:before {
            font-family: FontAwesome;
            content: "\f105";
            display: inline-block;
            padding-left: 100px;
            padding-right: 10px;
            vertical-align: middle;
        }

        .nav-side-menu .sub-menu li {
            padding-left: 20px;
            border-left: 3px solid #2e353d;
            border-bottom: 1px solid #23282e;
        }

        .nav-side-menu .sub-menu li a {
            text-decoration: none;
            color: #e1ffff;
        }

        .sub-menu li a i {
            padding-left: 10px;
            width: 20px;
            padding-right: 20px;
        }

        .nav-side-menu li .sub-menu li:hover {
            border-left: 3px solid #d19b3d;
            background-color: #4f5b69;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }

        @media (max-width: 767px) {
            .nav-side-menu .sub-menu {
                position: relative;
                width: 100%;
                margin-bottom: 10px;
            }

            .nav-side-menu .sub-menu .toggle-btn {
                display: block;
                cursor: pointer;
                position: absolute;
                right: 10px;
                top: 10px;
                z-index: 10 !important;
                padding: 3px;
                background-color: #ffffff;
                color: #000;
                width: 40px;
                text-align: center;
            }

            .sub-line ul .sub-press li.active,
            .sub-line li .sub-press li.active {
                color: #d19b3d;
            }

            .sub-line ul .sub-press li.active a,
            .sub-line li .sub-press li.active a {
                color: #d19b3d;
            }

            .sub-line ul .sub-press li,
            .sub-line li .sub-press li {
                background-color: #181c20;
                border: none;
                line-height: 28px;
                border-bottom: 1px solid #23282e;
                margin-left: 0px;
            }

            .sub-line ul .sub-press li:hover,
            .sub-line li .sub-press li:hover {
                background-color: #020203;
            }

            .sub-line ul .sub-press li:before,
            .sub-line li .sub-press li:before {
                font-family: Arial;
                content: "\f105";
                display: inline-block;
                padding-left: 50px;
                padding-right: 10px;
                vertical-align: middle;
            }

            .sub-line li {
                padding-left: 20px;
                border-left: 3px solid #2e353d;
                border-bottom: 1px solid #23282e;
            }

            .sub-line li a {
                text-decoration: none;
                color: #e1ffff;
            }

            .sub-line li a i {
                padding-left: 50px;
                width: 20px;
                padding-right: 20px;
            }

            .sub-line li:hover {
                border-left: 3px solid #d19b3d;
                background-color: #4f5b69;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                -ms-transition: all 1s ease;
                transition: all 1s ease;
            }

            @media (max-width: 767px) {
                .sub-line {
                    position: relative;
                    width: 100%;
                    margin-bottom: 10px;
                }

                .sub-line .toggle-btn {
                    display: block;
                    cursor: pointer;
                    position: absolute;
                    right: 10px;
                    top: 10px;
                    z-index: 10 !important;
                    padding: 3px;
                    background-color: #ffffff;
                    color: #000;
                    width: 40px;
                    text-align: center;
                }
            }
        }
    </style>

    </body>

</html>


<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script>
	function getdat(id)
    {
     $.ajax({
            type:'POST',
            url:'admin/ajax_data',
            data:{'id':id},
            success:function(data){
            	var res1 = JSON.parse(data);
            	if (res1.length) {
					$('#view_id').html(res1[0].data.page_content_english);
					$('#view_name').html(id);
				}
                
            }
        });
		
	}	
	
</script> -->


<script type="text/javascript">
    $(document).ready(function() {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function() {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function() {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function() {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({
                    'transform': 'translateX(0px)',
                    'width': itemWidth * itemNumbers
                });
                $(this).find(itemClass).each(function() {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }
        $("#tender").click(function() {
            $(tender).show();
        });
        $("#tariff").click(function() {
            $(tariff).show();
        });


    });
</script>

<style>
    .MultiCarousel {
        float: left;
        overflow: hidden;
        padding: 15px;
        width: 100%;
        position: relative;
    }

    .MultiCarousel .MultiCarousel-inner {
        transition: 1s ease all;
        float: left;
    }

    .MultiCarousel .MultiCarousel-inner .item {
        float: left;
    }

    .MultiCarousel .MultiCarousel-inner .item>div {
        text-align: center;
        padding: 10px;
        margin: 10px;
        background: #f1f1f1;
        color: #666;
    }

    .MultiCarousel .leftLst,
    .MultiCarousel .rightLst {
        position: absolute;
        border-radius: 50%;
        top: calc(50% - 20px);
    }

    .MultiCarousel .leftLst {
        left: 0;
    }

    .MultiCarousel .rightLst {
        right: 0;
    }

    .MultiCarousel .leftLst.over,
    .MultiCarousel .rightLst.over {
        pointer-events: none;
        background: #ccc;
    }

    .impotant_links ul {

        padding: 0 25px;
        overflow-y: scroll;
        height: 240px;

    }

    .guidelines ul {
        padding: 0 25px;
        overflow-y: scroll;
        height: 230px;
    }

    .footer {
        width: 100%;
        /* border-top: 6px solid #01AD42;
    background: url(http://bmwodisha.in/public/assets/images/footer_bg.jpg); */
        color: black;
    }

    .impotant_numbers {
        height: 260px;
        padding: 15px;
        overflow-y: scroll;
    }
</style>
</body>

</html>
<script type="text/javascript">
    // optional
    $('#blogCarousel').carousel({
        interval: 5000
    });
</script>
<script type="text/javascript">
    var $affectedElements = $("div,p,ul,li,nav,h3,h4,span"); // Can be extended, ex. $("div,p,ul,li,nav span.someClass")

    // Storing the original size in a data attribute so size can be reset
    $affectedElements.each(function() {
        var $this = $(this);
        $this.data("orig-size", $this.css("font-size"));
    });

    $("#btn-increase").click(function() {
        changeFontSize(1);
    })

    $("#btn-decrease").click(function() {
        changeFontSize(-1);
    })

    $("#btn-orig").click(function() {
        $affectedElements.each(function() {
            var $this = $(this);
            $this.css("font-size", $this.data("orig-size"));
        });
    })

    function changeFontSize(direction) {
        $affectedElements.each(function() {
            var $this = $(this);
            $this.css("font-size", parseInt($this.css("font-size")) + direction);
        });
    }
</script>


</body>

</html>