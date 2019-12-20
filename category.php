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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="icon.png">
  <title>Categories</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>
<?php include("includes/header.php")?>
<body>
      
      <div class="container mt-5">
      <?php 
      $category = $_GET['category'];
      $sql1 ="SELECT name,unitPrice,picture from product WHERE category ='$category'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);  

foreach($results1 as $result)
{   
    ?>
    <div class="card sm-3" style="max-width: 300px;">
    <div class="row no-gutters">
        <div class="col" style="background: #868e96;">
            <img src="Upload/<?php echo ($result->picture)?>" style="max-width: 150px;" class="card-img-top h-100" alt="<?php echo ($result->name)?>">
        </div>
        <div class="col">
            <div class="card-body">
                <h5 class="card-title"><?php echo ($result->name)?></h5>
                <p class="card-text"><?php echo ($result->unitPrice)?></p>
                <a  class="btn btn-primary stretched-link" href="product_info.php">View</a>
            </div>
        </div>
    </div>
</div>

    <?php } }?>
    </body>
    
    </html>