<style>
    h1{
        background-color:  darkturquoise;
        font-weight: 600;
        color: #fff;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-family: 'Times New Roman', Times, serif;
        padding: 8px;
        margin-bottom: 0;
    }
    h3{
        font-weight:bold;
        letter-spacing: 1px;
        text-transform: capitalize;
        font-family: 'Times New Roman', Times, serif;
    }
    a{
        text-decoration: none;
    }
    .container{
        gap: 44px;
        /* background-color: black; */
        text-align: center;
        margin-top: 0;
    }
    form{
        box-shadow: 2px 3px 5px 3px;
        border-radius: 10px;
        height: fit-content;

    }
</style>

<h1 class="text-center  ">CURD APP</h1>
<div class="container d-flex ">
        <button class="btn btn-primary my-3 ml-2"><a href="newcurd.php"class="text-light " >Add User</a></button>
        <!-- <button class="btn btn-primary my-3 ml-2"><a href="edit.php" class="text-light ">Update </a></button> -->
        <button class="btn btn-primary my-3 ml-2"><a href="delete.php" class="text-light ">Delete</a></button>
        <button class="btn btn-primary my-3 ml-2"><a href="showdata.php" class="text-light ">All Data</a></button>

    </div>