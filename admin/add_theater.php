<?php 
  require_once 'includes/header.php';
?>
  <a hidden id="table">user_history</a>

    <div class="container-fluid row justify-content-end">
      <?php include('includes/sidebar.php');?>
      <div class="col-md-10 content">
        <div class="page-title-outer">
          <div class="page-title-inner">
            <h1>Добавление кинотеатра</h1>
          </div>
        </div>
        
        <div class="form-outer">
          <div class="form-title">
            Добавить кинотеатр
          </div>
          <form action="add_item.php" method="POST">
            <input type="hidden" value="theaters" name="table">
            <div class="form-item">
              <label for="title">Название</label>
              <input class="form-inner" type="text" name="title" value="" required=""/>
              </div>
            <div class="form-item">
                <label for="categories">Адрес</label>
                <input class="form-inner" type="text" name="address" value="" required=""/>
            </div>
            <div class="form-item">
                <label for="age">Контактный номер</label>
                <input class="form-inner" type="text" name="contact_number" value="" required="" pattern="8[0-9]{10}" />
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