<?php
$exist_user  = false;
$insert_data  = false;
if (isset($_POST['submit'])) {
    include "_connect.php";
    // $id= mysqli_real_escape_string($conn, $_POST['serial']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $sql = "SELECT first_name from `new_curd_table` where first_name = '{$fname}'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $exist_user = true;
    } else {
        $sql1 = "INSERT INTO `new_curd_table`(first_name,last_name,email,password,role) VALUES('$fname','$lname','$email','$pass','$role')";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            // echo '<p class="text-center my-3">data inserted successfully</p>' or die("query failed.");
            $insert_data = true;
        }
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


<body>

    <?php
    include "header.php";
    if ($exist_user) {
        echo '<p class="text-center my-3">username already exist</p>';
    }
    if ($insert_data) {
        echo '<p class="text-center my-3">data inserted successfully</p>';
    }
    ?>
    <div class="row">

        <form class="mx-auto col-6 col-md-6 col-lg-4 " method="post" action="newcurd.php" autocomplete="off">
            <div class="mb-3">
                <h3 class="text-center my-2 text-info">Add User Data </h3>
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" name="fname" class="form-control" id="fname" aria-describedby="emailHelp">
                <!-- <div id="fname" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" name="lname" class="form-control" id="lname" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="pass">
                <div id="passhelp" class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <!-- <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="exampleInputPassword1"> -->
                <label for="validationCustom04" class="form-label">User type</label>
                <select class="form-select" id="validationCustom04" name="role">
                    <option value="">select</option>
                    <option value="0">Admin</option>
                    <option value="1">Normal User</option>
                </select>
            </div>


            <button type="submit" name="submit" id="click" class="btn btn-primary col-lg-12 my-4">ADD USER</button>
        </form>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        let fname = document.getElementById('fname');
        let lname = document.getElementById('lname');
        let email = document.getElementById('email');
        let pass = document.getElementById('pass');
        let btn = document.getElementById('click');

        btn.addEventListener("click", shwmsg);

        function shwmsg() {

            fname.addEventListener("input",()=>{
                let val1 = this.value;
                console.log(val1)
            })

            function mas() {
                let passval = this.value;
                let passvalLen = passval.length;
                if (passvalLen < 5) {
                    document.getElementById("passhelp").innerHTML = "password will be greater than 5 charac.";

                }
            }
        }
    </script>
</body>

</html>