
<?php
if(isset($_POST['update'])){

    include "_connect.php";
    $id = mysqli_real_escape_string($conn,$_POST['serial']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['password']));
    $role = mysqli_real_escape_string($conn,$_POST['role']);

    $sql2 = "UPDATE `new_curd_table` SET first_name = '$fname', last_name = '$lname',
    email = '$email', password = '$pass', role = '$role' where serial = '$id' ";

    $result = mysqli_query($conn,$sql2);

    if($result){
        echo "updated successfully";
        header("location: showdata.php");
    }
    


    

}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>new curd app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    form {
        /* border: 2px solid goldenrod; */
        border-radius: 10px;
        box-shadow: 2px 3px 5px 1px;
        height: 500px;

    }
</style>

<body>

    <?php
    include "header.php";

    ?>

    


    <div class="row">
        <?php
        include "_connect.php";
        $id = $_GET['id'];
        $sql = "SELECT  * from  `new_curd_table` where serial = '$id'";

        $result = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($result);
        

        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {

                $id = $rows['serial'];
                $fname = $rows['first_name'];
                $lname = $rows['last_name'];
                $email = $rows['email'];
                $pass = $rows['password'];
                $userrole = $rows['role'];
                // echo "role is = " . $role;


        ?>
                


                <form class="mx-auto col-6 col-md-6 col-lg-4 " method="post" action="<?php $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                
                    <div class="mb-3">
                        
                    <h3 class="text-center my-2 text-info">Update User Data </h3>

                    </div>
                    <div class="mb-3">
                        
                        <input type="hidden" value="<?php echo $id ?>" name="serial" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First name</label>
                        <input type="text" value="<?php echo $fname ?>" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Last name</label>
                        <input type="text" value="<?php echo $lname ?> " name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" value="<?php echo $email ?> " name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" value="<?php echo $pass ?> " name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">


                        <label for="validationCustom04" class="form-label">User type</label>
                        <select class="form-select" id="validationCustom04" name="role">

                            <option value="<?php if ($userrole == 1) {
                                                echo '
                            <option value="0" selected >Admin</option>
                            <option value="1">Normal User</option>';
                                            } else {
                                                echo '
                                <option value="0"  >Admin</option>
                                <option value="1" selected >Normal User</option>';
                                            }
                                            ?>">

                        </select>
                    </div>


                    <button type="submit" name="update" class="btn btn-primary col-lg-12 my-4">Update</button>
                </form>

        <?php
            }
        }
        ?>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>