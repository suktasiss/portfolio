<?php 
  require_once 'includes/header.php';
  require_once 'includes/seance.php';
  require_once 'includes/seances.php';


  $movie_id = intval($_GET['id']);
  $movierow=mysqli_query($con,"select * from movies where id=$movie_id");
  $movie=mysqli_fetch_array($movierow);
  $theatersraw= mysqli_query($con,"select * from theaters where theaters.id in(select theater_id from halls h join seances s on h.id=s.hall_id and s.movie_id = $movie_id) order by theaters.id;");


  ?>
  	<div id="main">
        <div class="container-fluid clear-top">
          <div class="flex-wrap row"> 
              <div class="movie-poster col-md-3 col-sm-6">
                   <img src="<?= $movie['poster'] ?>">
              </div>
              <div class="col-md-8 movieinfo">
                      <div class="movie_title">
                        <p><?= $movie['title'] ?> </p>
                      </div>
                      <div class="row pg-genre">
                        <div class="sqr">
                          <p><?= $movie['age'] ?>+</p>
                        </div>
                        <div class="movie_genre">
                          <p><?= $movie['categories']; ?></p>
                        </div>
                      </div>
                      
                      <div class="cast">
                        <p><?= $movie['cast'] ?></p>
                      </div>

                      <div class="synopsis">
                        <p><?= $movie['synopsis'] ?></p>
                      </div>

                      <div class="cinema">
                          

                          
                          
                          <?php while($item=mysqli_fetch_array($theatersraw)){ ?>
                              <div class="theater-outer">
                              <div class="theater">
                                <p><?= $item['name'] ?></p>
                              </div>
                              <div class="address">
                                <p><?= $item['address'] ?></p>
                              </div>
                              <?php 
                                $theater_id = $item['id'];
                                $datesArr = Seances::constructData($theater_id,$con,$movie_id);
                                if(isset($datesArr) && is_array($datesArr)) {
                                foreach($datesArr as $date) {
                                  ?> 
                                  <div class="day">
                                    <p><?php echo(ltrim(Date::getDay($date->timestamp),'0') . " " . 
                                    Date::monthByNumber(ltrim(Date::getMonth($date->timestamp)),'0')); ?> </p>
                                  </div>
                                  <div class="row"> 
                                  <?php
                                  foreach ($date->timeArr as $seance){ ?>
                                            <div class="sqr-time-outer">
                                               <a href="purchase.php?id=<?= $seance->id;?>&theater=<?= $theater_id;?>">
                                              <div class="sqr-time">
                                             
                                              <?=Date::getTime($seance->time);?>
                                              
                                              </div> 
                                            </a>
                                            </div>
                                              
                                  <?php
                                  }
                                  ?> </div> <?php
                                }
                              }
                              ?> </div> <?php
                          }
                          ?>
                      </div>
              </div>
            </div>
          </div>
  </div>

<?php include('includes/footer.php');?>