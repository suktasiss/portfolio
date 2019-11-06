  <?php include('includes/header.php');?>
  <a hidden id="table">users</a>

    <div class="container-fluid row justify-content-end">
      <?php include('includes/sidebar.php');?>
      <div class="col-md-10 content">
        <div class="page-title-outer">
          <div class="page-title-inner">
            <h1>Пользователи</h1>
          </div>
        </div>
        
        <div class="table-outer">
          <table id="editableTable" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Логин</th>
                <th>Дата создания</th>
                <th>Контактный номер</th>                        
              </tr>
            </thead>
            <tbody>
              <?php  
              $movies=mysqli_query($con,"select * from users "); 
              while( $item = mysqli_fetch_array($movies) ) { ?>
                 <tr id="<?= $item['id'] ?>">
                 <td><?= $item ['id'] ?></td>
                 <td><?= $item ['login'] ?></td>
                 <td><?= $item ['created_at'] ?></td>
                 <td><?= $item ['contact_number'] ?></td>                         
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