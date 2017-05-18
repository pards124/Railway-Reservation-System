<?php include('header.train.search.php');?>
<?php include('filter.php');?>
<div class="container">
    <div class="wrapper">
        <h1 class="title_main text-center">Trains</h1>
          <table class="table table-striped table-bordered table-hover table-responsive">
              <thead>
                <tr style="text-align:center">
                    <th>Train name</th>
                    <th>Depara. time</th>
                    <th>Arriv Time</th>
                    <th>Fare</th>
                    <th>Days of run</th>
                    <th>Availabilty</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Jana shatabdi</td>
                      <td>23:35</td>
                      <td>05:50</td>
                      <td>180</td>
                      <td>S M T W T F S</td>
                      <td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
                      <td><a href="book.php" class="btn">Book</a></td>

                  </tr>
                  <tr>
                      <td>Rajdhani Express</td>
                      <td>06:35</td>
                      <td>07:50</td>
                      <td>480</td>
                      <td>S M T W T F S</td>
                      <td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
                      <td><a href="book.php" class="btn">Book</a></td>

                  </tr>
                  <tr>
                      <td>Sifung Express</td>
                      <td>11:35</td>
                      <td>04:40</td>
                      <td>150</td>
                      <td>S M T W T F S</td>
                      <td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
                      <td><a href="book.php" class="btn">Book</a></td>

                  </tr>
                  <tr>
                      <td>Nagaland Express</td>
                      <td>23:35</td>
                      <td>05:50</td>
                      <td>180</td>
                      <td>S M T W T F S</td>
                      <td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
                      <td><a href="book.php" class="btn">Book</a></td>

                  </tr>
                  <tr>
                      <td>Bongaigaon Passenger</td>
                      <td>07:35</td>
                      <td>11:50</td>
                      <td>80</td>
                      <td>S M T W T F S</td>
                      <td>  <a href="#" class="btn btn-info">Check Availabilty</a></td>
                      <td><a href="book.php" class="btn">Book</a></td>

                  </tr>
              </tbody>
          </table>
    </div>
</div>
<?php include('footer.search.page.php');?>
