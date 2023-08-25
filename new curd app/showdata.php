<?php
include "_connect.php";
    $sql = "select * from `new_curd_table`";
    $result = mysqli_query($conn,$sql);

    ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>all data here </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php
    include "header.php";
    ?>
    <!-- <h1 class="text-center">All Data here </h1> -->

    <table class="table table-hover table-fixed">
  <thead class="table-dark">
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Date</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>

  <?php

  while($row = mysqli_fetch_assoc($result)){

 
?>


  <tbody>
    
    <tr class="col-6">
      <th scope="row"><?php echo $row['serial']?></th>
      <td><?php echo $row['first_name'].'  '.$row['last_name']?></td>
      <td> <?php echo $row['email']; ?></td>
      <td> <?php if($row['role'] ==1){
        echo "Admin";
      }else{
        echo "Normal User";
      } ?></td>
      <td> <?php echo $row['date']; ?></td>
      <td><button class="btn btn-primary"><a href='edit.php?id=<?php echo $row["serial"]?>' class="text-light">Edit</a></button>
      <button class="btn btn-primary"><a href="delete.php?id=<?php echo $row["serial"]?>" class="text-light">Delete</a></button>
      
      
      </td>
     
    </tr>
    
  </tbody>
<?php 
} ?>
</table>





    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>