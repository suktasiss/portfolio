
// проверка на соответствие пароля и подтверждения

function checkPass(){

  var password = $('#password_register').val();
  var cpassword = $('#cpassword').val();
  if (password == '' || cpassword == '') {
    phone_state = false;
    return;
  }
  if(password != cpassword){
        $('#cpassword').parent().removeClass();
        $('#cpassword').parent().addClass("form_error");
        $('#cpassword').siblings("span").text('Пароли не совпадают');
  }
  else{
        $('#cpassword').parent().removeClass();
        $('#cpassword').parent().addClass("form_success");
        $('#cpassword').siblings("span").text('Пароли совпадают');
  }
}

// проверка на то, числится телефон в базе пользователей, или нет

function checkPhone(){
  var phone = $('#phone').val();
  if (phone == '') {
    phone_state = false;
    return;
  }
  $.ajax({
      url: 'includes/process.php',
      type: 'post',
      data: {
        'phone_check' : 1,
        'phone' : phone,
      },
      success: function(response){
        if (response == 'taken' ) {
          phone_state = false;
          $('#phone').parent().removeClass();
          $('#phone').parent().addClass("form_error");
          $('#phone').siblings("span").text('Номер уже зарегестрирован');
        }else if (response == 'not_taken') {
          phone_state = true;
          $('#phone').parent().removeClass();
          $('#phone').parent().addClass("form_success");
          $('#phone').siblings("span").hide();
        }
      }
  });
}

// проверка, занято ли введённое имя пользователя


function checkUsername(){
  var username = $('#username_register').val();
  if (username == '') {
    username_state = false;
    return;
  }
  $.ajax({
    url: 'includes/process.php',
    type: 'post',
    data: {
      'username_check' : 1,
      'username' : username,
    },
    success: function(response){
      if (response == 'taken' ) {
        username_state = false;
        $('#username_register').parent().removeClass();
        $('#username_register').parent().addClass("form_error");
        $('#username_register').siblings("span").text('Имя недоступно');
      }else if (response == 'not_taken') {
        username_state = true;
        $('#username_register').parent().removeClass();
        $('#username_register').parent().addClass("form_success");
        $('#username_register').siblings("span").hide();
      }
    }
  });
}

// заключительная проверка введённых данных для регистрации, в случае успеха добавление пользователя

function checkRegister(){
  var username = $('#username_register').val();
  var phone = $('#phone').val();
  var password = $('#password_register').val();
    if (username_state == false || phone_state == false) {
    $('#error_msg').text('Исправьте ошибки в форме');
  }else{
      // proceed with form submission
      $.ajax({
        url: 'includes/process.php',
        type: 'post',
        data: {
          'save' : 1,
          'phone' : phone,
          'username' : username,
          'password' : password,
        },
        success: function(response){
          window.location.href = "index.php"
        }
      });
  }
}



