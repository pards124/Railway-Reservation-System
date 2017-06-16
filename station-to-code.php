<?php
require './config/db.php';
require './classes/train.class.php';
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$train = new Train($db);
$station = $train->station_name_to_code('GUWAHATI');
print_r($station);
//$resp = $train->search_train('BONGAIGAON(BNQ))','GUWAHATI(GHY)','17/06/2017');
$resp = $train->display_url();

print_r($resp);

 ?>
 <?php for($i = 0; $i<$total; $i++){
   echo '<tr>';
   echo '<td>'.$trains[$i]['name'].'</td>';
   echo '<td>'.$trains[$i]['src_departure_time'].'</td>';
   echo '<td>'.$trains[$i]['dest_arrival_time'].'</td>';

   echo '
   <td>180</td>
   <td>S M T W T F S</td>
   <td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
   <td><a href="book.php" class="btn">Book</a></td>';
   echo '</tr>';
 } ?>
