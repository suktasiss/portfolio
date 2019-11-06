<?php 
  include_once('includes/config.php');
  include_once('includes/regexp.php');



  if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!preg_match(user, $username) || !preg_match(password,$password))
      exit();
    $password = md5($password);
    $sql = "select * from users where login='$username' and password='$password'";
    $results = mysqli_query($con, $sql);
    if(mysqli_query($con,$sql) && mysqli_num_rows($results) > 0){
      $obj = mysqli_fetch_array($results);
      $userId = $obj['id'];
      session_start();
      $_SESSION['user'] = $obj['login'];
      $_SESSION['id'] = $userId;
      mysqli_query($con,"insert into user_history(user_id,event) values($userId,'login')");
      header('location:index.php');
    }
    else{
        exit();
    }
  }

?>
