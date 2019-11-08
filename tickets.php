<?php 
  require_once 'includes/header.php';
  require_once 'includes/date.php';

  $user_id = intval($_SESSION['id']);
  $bookings = mysqli_query($con, "select s.movie_id, s.showtime, b.quantity, m.title, m.poster from movies m, bookings b join seances s on s.id=b.seance_id where b.user_id=$user_id and s.movie_id=m.id;");

  
  ?>
          <div class="container-fluid">
            <div class="flex-wrap">
              <?php while($item=mysqli_fetch_array($bookings))
              {
              ?>
                <div class="row col-md-6">
                  <div class="purchase-poster col-md-6">
                    <img src="<?= $item['poster']?>" alt="">
                  </div>
                  <div class="items">
                    <div class="purchase-title">
                         <p><?= $item['title']?></p>
                    </div>

                    <div class="purchase-showtime">
                         <p><?php echo(ltrim(Date::getDay($item['showtime']),'0') . " " . Date::monthByNumber(ltrim(Date::getMonth($item['showtime'])),'0') . " в " . Date::getTime($item['showtime']));  ?></p>
                    </div>

                    <div class="purchase-quantity">
                         <p>Билетов: <?= $item['quantity']?></p>
                    </div>
                  </div>
                </div>
          <?php
        }
        ?>
<?php include('includes/footer.php');?>