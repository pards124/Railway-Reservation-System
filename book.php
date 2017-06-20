<?php
error_reporting(0);
require('header.train.search.php');
$_SESSION['train_number'] = $_GET['t_num'];
$train_name = $_GET['t_name'];
$_SESSION['train-name'] = $train_name;
$from = $_GET['from']." (".$_GET['from-code'].")";
$to = $_GET['to']." (".$_GET['to-code'].")";
$a_time = $_GET['a_time'];
$d_time = $_GET['d_time'];
$ticket = new Book($db, $from, $to, $a_time, $d_time);
 ?>
<div class="container">
    <div class="wrapper">
        <h1 class="title_main text-center">Booking your ticket</h1>
          <div class="panel panel-default">
              <div class="panel-body">
                <strong><?php echo $_SESSION['train_number']." ".$train_name; ?></strong>: <?php echo $from ." to ". $to ?>
              </div>
          </div>
          <div class="panel panel-default col-lg-4 col-md-12">
              <div class="panel-body">
                <strong>Reservation from</strong><br>
                <?php echo $from." : ".$d_time." hrs";?>
              </div>
          </div>
          <div class="panel panel-default col-lg-4 col-md-12">
              <div class="panel-body">
                <strong>Reservation to</strong><br>
                 <?php echo $to." : ".$a_time." hrs";?>
              </div>
          </div>
          <div class="panel panel-default col-lg-4 col-md-12">
              <div class="panel-body">
                <strong>Boarding point</strong><br>
                <?php echo $from." : ".$d_time." hrs";?>
              </div>
          </div>


            <div class="panel panel-default" style="margin-top:120px">
                <div class="panel-heading">Passenger details of journey from   <?php echo $from." "?> To  <?php echo $to." ";?></div>
                <?php $train->display_errors();?>
                <div class="panel-body">
                  <form method="post" action="#">
                      <div class="form-group col-lg-6">
                        <label for="adult">Adult (12years+) </label>
                        <input type="number" name="adult" value="0" class="form-control"/>
                        <label for="child">Child (05years - 12years)</label>
                        <input type="number" name="child" value="0" class="form-control"/>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="adult">Snr. Cityzen male (60years+) </label>
                        <input type="number" name="snr-male" value="0" class="form-control"/>
                          <label for="adult">Snr. Cityzen female (58years+) </label>
                        <input type="number" name="snr-female" value="0" class="form-control"/>
                      </div>
                      <button style="float:right; margin-bottom:50px" type="submit" name="get-details" value="1" class="btn btn_frm">Continue</button>
                  </form>
                    <span style="color:red">*Fare and availability may change.</span><br>
                    <span style="color:magenta">Important:</span> <br>
                    Adult(s)	: Excluding senior citizens with valid age proof<br>
                    Senior Citizen	: Must carry valid document as proof of age to avail discount<br>
                    Children below 5 yrs of age	: No fare, no seat<br>
                    Children between 5-11 yrs of age	: Separate seat, 50% fare discount<br>
                </div>
            </div>
          </div>
        </div>

<?php include('footer.search.page.php');?>
