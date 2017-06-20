<?php
error_reporting(0);
require './header.train.search.php';
session_start();
$info = $_SESSION['passenger'];
//print_r($info);
$ticket = new Book($db);
 ?>
 <div class="container">
     <div class="wrapper">
         <h1 class="title_main text-center">Booking your ticket</h1>
             <div class="panel panel-default" style="margin-top:120px">
                 <div class="panel-heading">Passenger details of journey from   <?php echo $info['source']." "?> To  <?php echo $info['destination']." ";?></div>
                 <?php $train->display_errors();?>
                 <div class="panel-body">
                   <form method="post" action="#">
                       <?php
                        if($info['adult'] > 0){?>
                         <div class="form-group col-lg-6">
                           <label for="adult">Name Adult (12years+) </label>
                           <?php
                              for($i = 0; $i<$info['adult']; $i++ ){?>
                                <input type="text" style="margin-bottom:10px;" name="name-adult[]" placeholder="Enter name" class="form-control"/>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-2">
                           <label for="adult">Age</label>
                           <?php
                              for($i = 0; $i<$info['adult']; $i++ ){?>
                                <input type="number" style="margin-bottom:10px;" name="age-adult[]" placeholder="Enter age" class="form-control"/>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-2">
                           <label for="adult">Gender</label>
                           <?php
                              for($i = 0; $i<$info['adult']; $i++ ){?>
                                <select name="gender-adult[]" style="margin-bottom:10px;">
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                </select>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-1">
                           <label for="adult">Berth</label>
                           <?php
                              for($i = 0; $i<$info['adult']; $i++ ){?>
                                <select name="berth-adult[]" style="margin-bottom:10px;">
                                  <option value="LB">LB</option>
                                  <option value="UB">UB</option>
                                </select>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-1">
                           <label for="adult"> Class</label>
                           <?php
                              for($i = 0; $i<$info['adult']; $i++ ){?>
                                <select name="class-adult[]" style="margin-bottom:10px;">
                                  <option value="SL">SL</option>
                                  <option value="AC I">AC I</option>
                                  <option value="AC II">AC II</option>
                                  <option value="AC III">AC III</option>
                                </select>
                            <?php  }
                            ?>
                         </div>



                      <?php }?>
                       <?php
                        if($info['child']>0){?>
                          <div class="form-group col-lg-6">
                            <label for="adult">Name child ( below 12years) </label>
                            <?php
                               for($i = 0; $i<$info['child']; $i++ ){?>
                                 <input type="text" style="margin-bottom:10px;" name="name-child[]" placeholder="Enter name" class="form-control"/>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-2">
                            <label for="adult">Age</label>
                            <?php
                               for($i = 0; $i<$info['child']; $i++ ){?>
                                 <input type="number" style="margin-bottom:10px;" name="age-child[]" placeholder="Enter age" class="form-control"/>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-2">
                            <label for="adult">Gender</label>
                            <?php
                               for($i = 0; $i<$info['child']; $i++ ){?>
                                 <select name="gender-child[]" style="margin-bottom:10px;">
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                                 </select>
                             <?php  }
                             ?>
                          </div>
                         <div class="form-group col-lg-1">
                           <label for="adult">Berth</label>
                           <?php
                              for($i = 0; $i<$info['child']; $i++ ){?>
                                <select name="berth-child[]" style="margin-bottom:10px;">
                                  <option value="LB">LB</option>
                                  <option value="UB">UB</option>
                                </select>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-1">
                           <label for="adult"> Class</label>
                           <?php
                              for($i = 0; $i<$info['child']; $i++ ){?>
                                <select name="class-child[]" style="margin-bottom:10px;">
                                  <option value="SL">SL</option>
                                  <option value="AC I">AC I</option>
                                  <option value="AC II">AC II</option>
                                  <option value="AC III">AC III</option>
                                </select>
                            <?php  }
                            ?>
                         </div>

                      <?php  }
                       ?>
                       <?php
                        if($info['snr-male']>0){?>
                          <div class="form-group col-lg-6">
                            <label for="adult">Name Senior cityzen male </label>
                            <?php
                               for($i = 0; $i<$info['snr-male']; $i++ ){?>
                                 <input type="text" style="margin-bottom:10px;" name="name-snr-male[]" placeholder="Enter name" class="form-control"/>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-2">
                            <label for="adult">Age</label>
                            <?php
                               for($i = 0; $i<$info['snr-male']; $i++ ){?>
                                 <input type="number" style="margin-bottom:10px;" name="age-snr-male[]" placeholder="Enter age" class="form-control"/>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-4">
                            <label for="adult">Gender</label>
                            <?php
                               for($i = 0; $i<$info['snr-male']; $i++ ){?>
                                 <select name="gender-snr-male[]" style="margin-bottom:10px;">
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                                 </select>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-1">
                           <label for="adult">Berth</label>
                           <?php
                              for($i = 0; $i<$info['snr-male']; $i++ ){?>
                                <select name="berth-snr-male[]" style="margin-bottom:10px;">
                                  <option value="LB">LB</option>
                                  <option value="UB">UB</option>
                                </select>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-1">
                           <label for="adult"> Class</label>
                           <?php
                              for($i = 0; $i<$info['snr-male']; $i++ ){?>
                                <select name="class-snr-male[]" style="margin-bottom:10px;">
                                  <option value="SL">SL</option>
                                  <option value="AC I">AC I</option>
                                  <option value="AC II">AC II</option>
                                  <option value="AC III">AC III</option>
                                </select>
                            <?php  }
                            ?>
                         </div>

                      <?php  }
                       ?>
                       <?php
                        if($info['snr-female']>0){?>
                          <div class="form-group col-lg-6">
                            <label for="adult">Name Senior cityzen female </label>
                            <?php
                               for($i = 0; $i<$info['snr-female']; $i++ ){?>
                                 <input type="text" style="margin-bottom:10px;" name="name-snr-female[]" placeholder="Enter name" class="form-control"/>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-2">
                            <label for="adult">Age</label>
                            <?php
                               for($i = 0; $i<$info['snr-female']; $i++ ){?>
                                 <input type="number" style="margin-bottom:10px;" name="age-snr-female[]" placeholder="Enter age" class="form-control"/>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-4">
                            <label for="adult">Gender</label>
                            <?php
                               for($i = 0; $i<$info['snr-female']; $i++ ){?>
                                 <select name="gender-snr-female[]" style="margin-bottom:10px;">
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                                 </select>
                             <?php  }
                             ?>
                          </div>
                          <div class="form-group col-lg-1">
                           <label for="adult">Berth</label>
                           <?php
                              for($i = 0; $i<$info['snr-female']; $i++ ){?>
                                <select name="berth-snr-female[]" style="margin-bottom:10px;">
                                  <option value="LB">LB</option>
                                  <option value="UB">UB</option>
                                </select>
                            <?php  }
                            ?>
                         </div>
                         <div class="form-group col-lg-1">
                           <label for="adult"> Class</label>
                           <?php
                              for($i = 0; $i<$info['snr-female']; $i++ ){?>
                                <select name="class-snr-female[]" style="margin-bottom:10px;">
                                  <option value="SL">SL</option>
                                  <option value="AC I">AC I</option>
                                  <option value="AC II">AC II</option>
                                  <option value="AC III">AC III</option>
                                </select>
                            <?php  }
                            ?>
                         </div>

                      <?php  }
                       ?>
                       <div class="form-group col-lg-12">
                         <button style="float:right; margin-bottom:50px" type="submit" name="finish-details" value="1" class="btn btn_frm">Continue</button>
                       </div>
                   </form>
                 </div>
             </div>
           </div>
         </div>


<?php include('footer.search.page.php');?>
