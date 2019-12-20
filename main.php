<?php

session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: login.php"); 
    }
    else{

      ?>

<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php 
$id =$_SESSION['userpid'];
echo $_SESSION['alogin']; ?>
    <div>
        <label id="product_a">Onion</label>
        <a href="product_info.php?productid=2"><button>Click me!</button></a>
    </div>
    
    <div>
    <label>Product B.....</label>
    <a href="productinfo.php?productid=3"><button>Click me!</button></a>
    </div>

    <div>
    <label>Product C.....</label>
    <a href="productinfo.php?productid=4"><button>Click me!</button></a>
    <div>
</body>
</html>
    <?php } ?>