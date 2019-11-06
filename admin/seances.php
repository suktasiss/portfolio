  <?php include('includes/header.php');
    $seances=mysqli_query($con,"select * from seances"); 
    $moviesraw=mysqli_query($con,"select * from movies"); 
    $movies = array();
    while($item = mysqli_fetch_array($moviesraw)){
      $movies[$item['id']] = $item['title'];
    }
  ?>
  <a hidden id="table">seances</a>

    <div class="container-fluid row justify-content-end">
      <?php include('includes/sidebar.php');?>
      <div class="col-md-10 content">
        <div class="page-title-outer">
          <div class="page-title-inner">
            <h1>Сеансы</h1>
          </div>
        </div>
        
        <div class="table-outer">
          <table id="editableTable" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Фильм</th>
                <th>id Зала</th>
                <th>Время показа</th>    
                <th>Цена</th>
                <th>Свободные места</th>                    
              </tr>
            </thead>
            <tbody>
              <?php  
              while( $item = mysqli_fetch_array($seances) ) { ?>
                 <tr id="<?php $item['id'] ?>">
                 <td><?= $item['id'] ?></td>
                 <td><?= $movies[$item['movie_id']] ?></td>
                 <td><?= $item ['hall_id'] ?></td>
                 <td><?= $item ['showtime'] ?></td>   
                 <td><?= $item ['charge'] ?></td>
                 <td><?= $item ['free_space'] ?></td>                        
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