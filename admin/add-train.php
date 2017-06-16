<?php require('./header.php');?>
<?php require('./top-nav.php');?>
<?php require('./side-nav.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Train</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">
                                <h4>Train Details</h4>
                                <div class="col-lg-12">
                                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                      <label>Train No</label>
                                      <input class="form-control" name="train-no" placeholder="Enter train no">
                                      <p class="help-block">Only number</p>
                                  </div>
                                  <div class="form-group col-lg-4 col-lg-4 col-md-6 col-sm-12">
                                      <label>Train name</label>
                                      <input class="form-control" name="train-name" placeholder="Enter train name">
                                  </div>
                                  <div class="form-group col-lg-4 col-lg-4 col-md-6 col-sm-12">
                                      <label>Source</label>
                                      <input class="form-control" name="source" placeholder="Enter source">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                      <label>Destination</label>
                                      <input class="form-control" name="destination" placeholder="Enter destination">
                                  </div>
                                  <div class="form-group col-lg-4 col-lg-4 col-md-6 col-sm-12">
                                      <label>Distance</label>
                                      <input class="form-control" name="distance" placeholder="Enter distnce">
                                  </div>
                                  <div class="form-group col-lg-4 col-lg-4 col-md-6 col-sm-12">
                                      <label>Arrival time</label>
                                      <input class="form-control" name="arrival-time" placeholder="Enter enter arrival time">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                      <label>Deparature time</label>
                                      <input class="form-control" name="deparature-time" placeholder="Enter deparature time">
                                  </div>
                                </div>

                                <h4>Class details</h4>
                                <div class="col-lg-12">
                                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                      <label>Train No</label>
                                      <input class="form-control" name="train-no" placeholder="Enter train no">
                                      <p class="help-block">Only number</p>
                                  </div>
                                  <div class="form-group col-lg-4 col-lg-4 col-md-6 col-sm-12">
                                      <label>Train name</label>
                                      <input class="form-control" name="train-name" placeholder="Enter train name">
                                  </div>
                                  <div class="form-group col-lg-4 col-lg-4 col-md-6 col-sm-12">
                                      <label>Source</label>
                                      <input class="form-control" name="source" placeholder="Enter source">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <button type="submit" class="btn btn-default">Submit Button</button>
                                  <button type="reset" class="btn btn-default">Reset Button</button>
                                </div>
                          </form>

                      </div>

                    </div>

                  </div>

                </div>

              </div>




<?php require('./footer.php');?>
