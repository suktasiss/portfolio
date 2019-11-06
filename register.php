<?php include('includes/header.php');
  include('includes/login-check.php');
  login_check(false);
  include('process.php');?>
	
      <form id="register_form">
          <h1>Регистрация</h1>

          <div id="error_msg"></div>
          <div class="form-group">
            <input name="username" type="text" minlength="2" maxlength="12" placeholder="username" class="form-control" id="username_register" pattern="[a-zA-z0-9]*" required />
            <span></span>
          </div>
          <div class="form-group">
            <input name="password" type="password" minlength="5" maxlength="10" placeholder="Password" pattern="[0-9a-zA-Z]*" class="form-control" id ="password_register" required />
            <span></span>
          </div>
          <div class="form-group">
            <input name="cpassword" type="password" size="25" placeholder="Password" class="form-control" required id="cpassword"/>
            <span></span>
          </div>
          <div class="form-group">
            <input name="phone" type="text" placeholder="Phone" class="form-control" id="phone"
            pattern="8[0-9]{10}" required/>
            <span></span>
          </div>
          <div class="form-group btn-cont">
              <button type="button" class="button-form" name="register" id="reg_btn">Зарегестрироваться</button>
          </div>
          </div>
    </div>
    </form>
    

    <script src="js/register-validation.js"></script>
    <script src="js/login-validation.js"></script>
     

<?php include('includes/footer.php');?>