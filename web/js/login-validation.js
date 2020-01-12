// AJAX функция проверяет, правильно ли введено имя пользователя и пароль

$('document').ready(function(){

    $('#log_btn').on('click', function(){
	var username = $('#username').val();
	var password = $('#password').val();

	$.ajax({
	    url: '../app/includes/login-handler.php',
	    type: 'post',
	    data: {
		'save' : 1,
		'username' : username,
		'password' : password,
	    },
	    success: function(response){
		document.location.reload();
	    }
	});
    });
});
