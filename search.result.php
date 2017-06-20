<?php
error_reporting(0);
include('header.train.search.php');
?>




<div class="container">
    <div class="wrapper">
        <h1 class="title_main text-center">Trains</h1>
          <table class="table table-striped table-bordered table-hover table-responsive">
              <thead>

                  <?php
                    $result =  $_SESSION['search-result'];
                    $total = $result['total'];
                    $trains = $result['train'];
                   ?>
                <tr style="text-align:center">
                    <th>Train no</th>
                    <th>Train name</th>
                    <th>Depara. time</th>
                    <th>Arriv Time</th>
                  <!--  <th>Fare</th> -->
                    <th>Days of run</th>
                    <th>Availabilty</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for($i = 0; $i<$total; $i++){
                  $days = $trains[$i]['days'];
                  $classes = $trains[$i]['classes'];
                  echo '<tr>';
                  echo '<td id="number">'.$trains[$i]['number'].'</td>';
                  echo '<td id="name">'.$trains[$i]['name'].'</td>';

                  echo '<td id="from" style="display:none">'.$trains[$i]['from']['name'].'</td>';
                  echo '<td id="from-code" style="display:none">'.$trains[$i]['from']['code'].'</td>';
                  echo '<td id="to" style="display:none">'.$trains[$i]['to']['name'].'</td>';
                  echo '<td id="to-code" style="display:none">'.$trains[$i]['to']['code'].'</td>';


                  echo '<td id="d_time">'.$trains[$i]['src_departure_time'].'</td>';
                  echo '<td id="a_time">'.$trains[$i]['dest_arrival_time'].'</td>';

                  echo '<td>';
                  foreach ($days as $key => $value) {
                    //print_r($days);
                    foreach($value as $key1 => $value1){
                      $day = trim($value1[0],'Y');
                      $day = trim($day,'N');
                      echo $day." ";
                    }
                  }
                  echo '</td>';
                  echo '<td>';
                  foreach ($classes as $key => $value) {
                    //print_r($days);
                    foreach($value as $key1 => $value1){
                      echo $value1." ";
                    }
                  }
                  echo '</td>';
                  //echo '<td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
                  echo '<td><button id="book" class="btn btn_frm">Book</button></td>';
                  echo '</tr>';
                } ?>
              </tbody>
          </table>
    </div>
</div>
<?php include('footer.search.page.php');?>

<script>
$(document).on("click", "#book", function () {
        var t_num = $(this).closest("tr").find('#number').text();
        var t_name = $(this).closest("tr").find('#name').text();
        var from = $(this).closest("tr").find('#from').text();
        var from_code = $(this).closest("tr").find('#from-code').text();
        var to = $(this).closest("tr").find('#to').text();
        var to_code = $(this).closest("tr").find('#to-code').text();
        var d_time = $(this).closest("tr").find('#d_time').text();
        var a_time = $(this).closest("tr").find('#a_time').text();
        var url = './book.php?t_num='+t_num+'&t_name='+t_name+'&from='+from+'&from-code='+from_code+'&to='+to+'&to-code='+to_code;
        url += '&a_time='+a_time+'&d_time='+d_time;
        //alert(url);
        window.location= url;
});
</script>
