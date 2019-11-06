$('document').ready(function(){

	$('#log_btn').on('click', function(){
	  var username = $('#username').val();
	  var password = $('#password').val();

	  $.ajax({
	    url: 'process-login.php',
	    type: 'post',
	    data: {
	      'save' : 1,
	      'username' : username,
	      'password' : password,
	    },
	    success: function(response){
	      if(response != '')
	      	window.location.href = "index.php"
	      else{
	      	$('#error_msg').text('Неверное имя пользователя или пароль');
	      }
	    }
	  });
	});
});