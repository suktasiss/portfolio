<?php include('includes/header.php');
  $movies=mysqli_query($con,"select * from movies");
?>

	<div id="main">
      <div class="container-fluid">
      <div class="flex-wrap row">
        
        <?php 
          while($item=mysqli_fetch_array($movies))
          {
          ?>
        <div class="movie-item col-md-3 col-sm-6">
             <a href="movie.php?id=<?= $item['id'];?>"><img src="<?= $item['poster'];?>"></a>
        </div>
        <?php
        }
        ?>


        </div>
      </div>
    </div>

<?php include('includes/footer.php');?>