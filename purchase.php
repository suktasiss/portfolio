<?php 
  include('includes/header.php');
  include('includes/login-check.php');
  include('includes/date.php');


  login_check(true);
  $id = intval($_GET['id']);
  $theater_id = intval($_GET['theater']);

  $seancerow = mysqli_query($con,"select * from seances where id=$id");
  $seance=mysqli_fetch_array($seancerow);
  $movie_id = $seance['movie_id'];
  $movierow=mysqli_query($con,"select * from movies where id=$movie_id");
  $movie=mysqli_fetch_array($movierow);
  
  $theaterrow=mysqli_query($con,"select * from theaters where id=$theater_id");
  $theater = mysqli_fetch_array($theaterrow);

  $day = Date::getDay($seance['showtime']);
  $month = Date::getMonth($seance['showtime']);
  $time = Date::getTime($seance['showtime']);

  ?>
  	<div id="main">
        <div class="container-fluid clear-top">
          <div class="flex-wrap row"> 
              <div class="movie-poster col-md-3 col-sm-6">
                   <img src="<?= $movie['poster']?>">
              </div>


              <div class="col-md-8 movieinfo">
                      <div class="movie_title">
                        <p><?= $movie['title']; ?></p>
                      </div>
                      <div class="row pg-genre">
                        <div class="sqr">
                          <p><?= $movie['age']; ?>+</p>
                        </div>
                        <div class="movie_genre">
                          <p><?= $movie['categories']; ?></p>
                        </div>
                      </div>

                      <div class="purchase-form">
                        <form action="purchase-process.php" method="post">
                          <div class="purchase">
                            <input type="hidden" value="<?= $seance['id'] ?>" name="id">

                            <div class="theater-form">
                                <?= $theater['name']; ?>
                              </div>
                              <div class="address-form">
                                <?= $theater['address']; ?>
                              </div>

                              <div class="day">
                                <?php echo($day . " " . Date::monthByNumber($month)) . " в " . $time; ?>
                              </div>
                              
                              <div class="free">
                                Свободных мест: <?= $seance['free_space'] ?>
                              </div>

                              <div class="quantity">
                                Количество
                              </div>

                              <div>
                                <select name="quantity" class="select-form"> 
                                  <?php
                                  $i = 1;
                                  while($i <= 5 && $i <= $seance['free_space']){ ?>
                                    <option value="<?= $i ?>" ><?php echo($i); $i++;?></option> 
                                  <?php } ?>
                                </select> 
                              </div>

                              <div class="pay-type">
                                <input type="radio" id="webMoney"
                                 name="pay" value="webmoney" required="">
                                <label for="webMoney">WebMoney</label>

                                <input type="radio" id="card"
                                 name="pay" value="card">
                                <label for="card">Банковская карта</label>

                                <input type="radio" id="qiwi"
                                 name="pay" value="qiwi">
                                <label for="qiwi">Qiwi-кошелёк</label>
                              </div>

                              
                              <button id="valid" class="button-form" type="submit">Подтвердить</button>
                        </div>
                      </form>
                      </div>
                      
              </div>
            </div>
          </div>
  </div>

<?php include('includes/footer.php');?>