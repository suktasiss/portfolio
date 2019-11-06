  <?php include('includes/header.php');
    $hallsraw = mysqli_query($con,"select * from halls");
    $movieraw = mysqli_query($con,"select * from movies");
  ?>

    <div class="container-fluid row justify-content-end">
      <?php include('includes/sidebar.php');?>
      <div class="col-md-10 content">
        <div class="page-title-outer">
          <div class="page-title-inner">
            <h1>Добавление сеанса</h1>
          </div>
        </div>
        
        <div class="form-outer">
          <div class="form-title">
            Добавить сеанс
          </div>
          <form action="add_item.php" method="POST">
            <input type="hidden" value="seances" name="table">

            <div>
              <label for="movie_id">Фильм</label>
              <select name="movie_id" class="select-form"> 
                <?php
                while($item=mysqli_fetch_array($movieraw)){ ?>
                  <option value="<?= $item['id'] ?>" ><?= $item['title']?></option>
              <?php } ?>                   
              </select> 
            </div>
            <div>
              <label for="hall_id">Зал</label>
              <select name="hall_id" class="select-form"> 
                <?php
                while($item=mysqli_fetch_array($hallsraw)){ ?>
                  <option value="<?= $item['id'] ?>" ><?= $item['id']?></option>
              <?php } ?>                   
              </select> 
            </div>
            <div class="form-item">
                <label for="showtime">Время показа</label>
                <input class="form-inner" type="text" name="showtime" value="" required=""
                placeholder="1997-01-12 15:35:12" pattern="^[1-2][0-9]{3}-[0-1][0-9]-[0-9]{2} [0-2][0-9]:[0-6][0-9]:[0-6][0-9]$" />
            </div>
            <div class="form-item">
                <label for="charge">Цена</label>
                <input class="form-inner" type="number" name="charge" required="" />
            </div>
              <button id="valid" class="button-form" type="submit">Добавить</button>
          </form>
        </div>
        
    </div>
    </div>
    
      


  <!-- Bootstrap -->

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <!-- Validation -->

  <script src="js/validation.js"></script>


      

  </script>
</body>
</html>