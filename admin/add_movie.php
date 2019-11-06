  <?php include('includes/header.php');?>

    <div class="container-fluid row justify-content-end">
      <?php include('includes/sidebar.php');?>
      <div class="col-md-10 content">
        <div class="page-title-outer">
          <div class="page-title-inner">
            <h1>Добавление фильма</h1>
          </div>
        </div>
        
        <div class="form-outer">
          <div class="form-title">
            Добавить фильм
          </div>
          <form action="add_item.php" method="POST">
            <input type="hidden" value="movies" name="table">
            <div class="form-item">
              <label for="title">Название</label>
              <input class="form-inner" type="text" name="title" value="" required=""/>
            </div>
            <div class="form-item">
                <label for="categories">Жанры</label>
                <input class="form-inner" type="text" name="categories" value="" required="" 
                pattern="^([а-я,А-Я]*, )+.*$"/>
            </div>
            <div class="form-item">
                <label for="age">Возраст</label>
                <input class="form-inner" type="number" name="age" value="" max="21" required="" />
            </div>
            <div class="form-item">
                <label for="release_date">Дата выхода</label>
                <input class="form-inner" type="text" name="release_date" placeholder="1997-01-12" required="" pattern="^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])$" />
            </div>
            <div class="form-item">
                <label for="synopsis">Синопсис</label>
                <textarea class="form-inner" type="text" name="synopsis"></textarea>
            </div>
            <div class="form-item">
                <label for="cast">Актёры</label>
                <input class="form-inner" type="text" name="cast" placeholder="Имена актёров через запятую" required="" pattern="^([а-я А-Я]*, )+.*$" />
            </div>
            <div class="form-item">
                <label for="poster">Постер</label>
                <input class="form-inner" type="text" name="poster" placeholder="assets/images/image.jpg" required="" pattern="assets/images/.*(jpg|png)" />
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