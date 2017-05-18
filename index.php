<?php
  ob_start();
  require ('header.php');
?>
<?php
  require_once('classes/train.class.php');
  $train = new Train($db);
?>
                            <form class="form" method="post" action="#">
                                <header class="form__header">
                                    <h1 class="form__title"><span>Book</span> your train</h1>
                                </header>
                                <?php $train->display_errors();?>
                                <fieldset class="form__body">
                                    <div class="form__row">
                                        <div class="form__item">
                                            <label class="form__label">From</label>
                                            <select class="form__field" name="from">
                                                <option class="">Guwahati (GHY)</option>
                                                <option class="">Dimapur (DMV)</option>
                                                <option class="">Bongaigaon (BNQ)</option>
                                            </select>
                                        </div>

                                        <div class="form__item">
                                            <label class="form__label">to</label>
                                            <select class="form__field" name="to">
                                              <option class="">Guwahati (GHY)</option>
                                              <option class="">Dimapur (DMV)</option>
                                              <option class="">Bongaigaon (BNQ)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form__row">
                                        <div class="form__item">
                                            <label class="form__label">Departure day:</label>
                                            <input type="text" name="dep-date" class="form__field form__field_calendar datepickerSecond">
                                        </div>
                                        <div class="form__item">
                                            <label class="form__label">Class</label>
                                            <select class="form__field" name="class">
                                              <option class="">Sleeper</option>
                                              <option class="">AC I</option>
                                              <option class="">AC II</option>
                                              <option class="">AC III</option>
                                              <option class="">General</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="search" class="btn btn_form">Search</button>
                                    </div>
                                </fieldset>
                            </form>

<?php
    require ('footer.php');
?>
