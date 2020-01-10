<?php 
	require_once '../../includes/config.php';
	extract($_POST);

	switch($table){
		case 'movies':{
			$pdo->query("insert into movies(title,categories,age,release_date,synopsis,cast,poster)
	 values('$title','$categories','$age','$release_date','$synopsis','$cast','$poster')");
			break;
		}
		case 'seances' :{
			$pdo->query("insert into seances(movie_id,hall_id,showtime,charge,free_space)values('$movie_id','$hall_id','$showtime','$charge', (select capacity from halls where halls.id = '$hall_id'))");
			break;
		}
		case 'theaters' :{
			$pdo->query("insert into theaters(name,address,contact_number)
	 values('$title', '$address','$contact_number');");
			break;
		}
		case 'halls' :{
			$pdo->query("insert into halls(theater_id,number,capacity)
	 values('$theater_id', '$number','$capacity');");
			break;
		}
	}
    header('location:../dashboard.php');
