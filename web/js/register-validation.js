// AJAX функция, проверяет, правильно ли введены данные для регистрации и заняты ли имя пользователя и телефон

$('document').ready(function(){
  
  $('#username_register').on('blur', checkUsername);		
  $('#phone').on('blur', checkPhone);
  $('#cpassword').on('blur', checkPass);
  $('#password_register').on('blur', checkPass);
  $('#reg_btn').on('click', checkRegister);

});
