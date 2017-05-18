<?php require('header.php'); ?>

<form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-top:50px">
    <header class="form__header">
        <h1 class="form__title"><span>Register</span> your account</h1>
    </header>
      <?php $user->display_errors(); ?>
      <?php $user->display_msg(); ?>
    <fieldset class="form__body">
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Username or email</label>
                <input type="text" name="username" class="form__field" />
            </div>
            <div class="form__item">
                <label class="form__label">Password</label>
                <input type="password" name="password" class="form__field" />
            </div>
        </div>
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Confirm Password</label>
                <input type="password" name="confirm-password" class="form__field" />
            </div>
            <div class="form__item">
                <label class="form__label">First name</label>
                <input type="text" name="first-name" class="form__field" />
            </div>
        </div>
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Last name</label>
                <input type="text" name="last-name" class="form__field" />
            </div>
            <div class="form__item">
                <label class="form__label">Email</label>
                <input type="text" name="email" class="form__field" />
            </div>
        </div>
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Date of birth:</label>
                <input type="text" name="dob" class="form__field form__field_calendar datepickerSecond">
            </div>
        </div>
        <div class="form__row">
            <button type="submit" name="register" class="btn btn_form">Register</button>
        </div>
    </fieldset>
</form>

<?php require('footer.php'); ?>
