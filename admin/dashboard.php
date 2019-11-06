<?php include('includes/header.php');
	$movies = getEntryNumber('movies',$con);
	$seances = getEntryNumber('seances',$con);
	$theaters = getEntryNumber('theaters',$con);
  $halls = getEntryNumber('halls',$con);
	$users = getEntryNumber('users',$con);
	$logs = getEntryNumber('user_history',$con);

	function getEntryNumber($table, $con){
		$countRaw = mysqli_query($con,"select count(*) as total from $table");
		$data = mysqli_fetch_assoc($countRaw);
		return $data['total'];
	}
?>



  
  <div class="container-fluid row justify-content-end">
  	<?php include('includes/sidebar.php');?>
  	<div class="col-md-10 content">
  		<div class="dashboard-item">
  			<?= "Фильмов в базе: $movies" ?>
  		</div>
  		<div class="dashboard-item">
  			<?= "Сеансов в базе: $seances" ?>
  		</div>
  		<div class="dashboard-item">
  			<?= "Кинотеатров в базе: $theaters" ?>
  		</div>
      <div class="dashboard-item">
        <?= "Залов в базе: $halls" ?>
      </div>
  		<div class="dashboard-item">
  			<?= "Пользователей в базе: $users" ?>
  		</div>
  		<div class="dashboard-item">
  			<?= "Логов записано: $users" ?>
  		</div>
    </div>
  </div>
  



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>