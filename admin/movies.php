
  <?php include('includes/header.php');?>
  <a hidden id="table">movies</a>

    <div class="container-fluid row justify-content-end">
      <?php include('includes/sidebar.php');?>
      <div class="col-md-10 content">
        <div class="page-title-outer">
          <div class="page-title-inner">
            <h1>Фильмы</h1>
          </div>
        </div>
        
        <div class="table-outer">
          <table id="editableTable" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Название</th>
                <th>Возраст</th>
                <th>Актёры</th>
                <th>Постер</th>
                <th>Категория</th>
                <th>Дата релиза</th>                          
              </tr>
            </thead>
            <tbody>
              <?php  
              $movies=mysqli_query($con,"select * from movies"); 
              while( $item = mysqli_fetch_array($movies) ) { ?>
                 <tr id="<?= $item['id'] ?>">
                 <td><?= $item ['id'] ?></td>
                 <td><?= $item ['title'] ?></td>
                 <td><?= $item ['age'] ?></td>
                 <td><?= $item ['cast'] ?></td>
                 <td><?= $item ['poster'] ?></td>
                 <td><?= $item ['categories'] ?></td>
                 <td><?= $item ['release_date'] ?></td>                               
                 </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
    </div>
    
      


  <!-- Bootstrap -->

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <!-- Editable -->

  <script src="js/editable.js"></script>
  <script src="plugin/bootstable.js"></script>
      

  </script>
</body>
</html>