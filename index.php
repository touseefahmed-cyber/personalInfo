<?php
if(isset($_POST['submit'])){
   // print_r($_POST);exit;
    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(50,20);
    $pdf->SetDrawColor(50,60,100);
    $pdf->Cell(100,10,'Personal Information',1,0,'C',0);
    $pdf->SetXY (10,50);
    $pdf->SetFontSize(10);
    $pdf->Write(5,'Username:   '.$_POST['username'] );
    $pdf->Write(5,'  Email:   '.$_POST['email'] );
    $pdf->Write(5,'  Phone:   '.$_POST['phone'] );
    $pdf->Write(5,'  Job Title:   '.$_POST['job_title'] );
    $pdf->Write(5,'  Interested Product:   '.$_POST['interestedProduct'] );
    $path = $_SERVER['DOCUMENT_ROOT']."/assignment/Info.pdf";
    $pdf->Output($path,'F');
    $livepath = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']."Info.pdf";
    $msg = 'For PDF view Please click Here ! '.$livepath ;
// send email
    mail($_POST['email'],"Personal Info",$msg);
    echo 'For PDF view kindly check your Email! Thank you'; exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Information</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/custom.css" rel="stylesheet" id="custom-css">
</head>
<body>
<div class="form-center">
    <div class="form-con">
        <form class="form-horizontal" action="" method="POST" id="myform" name="myform">
            <fieldset id="account_information" class="">
                <legend class="text-center">Personal information</legend>
                <div class="form-group">
                    <label for="username" class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-3 control-label">Email Address</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-lg-3 control-label">Phone Number</label>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="job_title" class="col-lg-3 control-label">Job title</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job title">
                    </div>
                </div>
                <p class="btn-description"><a class="btn btn-primary next">Next</a></p>
            </fieldset>

            <fieldset id="personal_information" class="">
                <legend class="text-center">Job information</legend>
                <div class="form-group">
                    <label for="username" class="col-lg-3 control-label">What product you are interested in?</label>
                    <div class="col-lg-6">
                        <select name="interestedProduct" class="form-control" id="interestedProduct">
                            <option value="">Select Product</option>
                            <option value="Hanelly">Hanelly</option>
                            <option value="Nakisa">Nakisa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="interestedModulesCon">
                    <label for="username" class="col-lg-4 control-label">What modules you are interested in?</label>
                    <div class="col-lg-8 select-section">
                        <select name="interestedModules[]" id="interestedModules" multiple>
                            <option value="">HR Analytics</option>
                            <option value="">Org Design</option>
                            <option value="">Org Chart</option>
                        </select>
                        </select>
                    </div>
                </div>

                <p class="btn-description"><a class="btn btn-primary" id="previous" >Previous</a></p>
                <p class="btn-description"><input class="btn btn-success" type="submit" value="submit" name="submit"></p>
            </fieldset>

        </form>
    </div>
</div>


<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="assets/js/additional-methods.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>
