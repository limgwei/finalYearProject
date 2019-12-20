<?php
session_start();
error_reporting(0);
include('includes/config.php');
$id=1;//$SESSION('id');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" href="icon.png">
</head>
<header>
    <nav class="navbar fixed-top navbar-expand-sm navbar-light green lighten-3 p-2">

        <!-- Collapsible content -->
        
          <!-- Search form -->
          <form class="form-inline">
            <div class="md-form my-0">
              <input class="" type="text" placeholder="Search" aria-label="Search">
              <i class="fas fa-search text-white ml-3" aria-hidden="true"></i>
            </div>
          </form>
      
      
        <!-- Navbar brand -->
        <a class="navbar-brand" href="file:///C:/Users/ASUS/Desktop/2019%20CSEM/Project/test/MDB-Free_4.8.11/MDB-Free_4.8.11/wallet.html"><i class="fas fa-wallet"></i></a>
      
      </nav>
      
</header>
<body>

  <!-- Start your project here-->
  <!--Navbar-->

  
 
      
      <div class="container">
          <div class="row m-1">
              <h2 id="suggest" class="text-success ml-1">Suggestion</h2>
              </div>
    

    
              <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">

<!--Controls-->
<div class="controls-top">
  <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
      class="fas fa-chevron-left"></i></a>
  <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
      class="fas fa-chevron-right"></i></a>
</div>
<!--/.Controls-->

<!-- Indicators -->
<ol class="carousel-indicators">
  <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
  <li data-target="#carousel-example-multi" data-slide-to="1"></li>
  <li data-target="#carousel-example-multi" data-slide-to="2"></li>

</ol>
<!--/.Indicators-->

<div class="carousel-inner v-2" role="listbox">
    
<?php 
$sql1 ="SELECT name,unitPrice,picture from product ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$count=1;
foreach($results1 as $result)
{   
if($count==1){
    ?>
     <div class="carousel-item active">
    <div class="col-12 col-md-4">
      <div class="card mb-2">
        <img class="card-img-top" src="Upload/<?php echo ($result->picture)?>"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title font-weight-bold"><?php echo ($result->name)?></h4>
          <p class="card-text"><?php echo ($result->unitPrice)?></p>
          <a class="btn btn-primary btn-md btn-rounded">View</a>
        </div>
      </div>
    </div>
  </div>

 <?php } 

 else{ ?>
    <div class="carousel-item ">
    <div class="col-12 col-md-4">
      <div class="card mb-2">
        <img class="card-img-top" src="Upload/<?php echo ($result->picture)?>"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title font-weight-bold"><?php echo ($result->name)?></h4>
          <p class="card-text"><?php echo ($result->unitPrice)?></p>
          <a class="btn btn-primary btn-md btn-rounded">View</a>
        </div>
      </div>
    </div>
  </div>  
  <?php } ?>

<?php $count++; } ?>
</div>

</div>



      
      
          <div class="row m-1">
              <h2 class="text-success ">Categories</h2> 
          </div>
        <div class="row">
          <div class="col-4">Fruit Vegetables</div>
          <div class="col-4">Garlic, Chilies & Onions</div>
          <div class="col-4">Leafy Vegetables</div>
        </div>
      
        <div class="row">
          <div class="col-4">Other Vegetables</div>
          <div class="col-4">Mushrooms</div>
          <div class="col-4">Potatoes</div>
        </div>
      
        <div class="row">
          <div class="col-4">Root Vegetables</div>
          <div class="col-4">Shoot Vegetables</div>
          <div class="col-4">Dried Beans & Nuts</div>
        </div>
      
        <div class="row">
          <div class="col-4">Dried Herbs & Spices</div>
          <div class="col-4">Dried Sundries</div>
          <div class="col-4">Dried Vegetables & Fruits</div>
        </div>
      
        
      </div>
<footer>
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-light green lighten-3 ">
        <i class="fab fa-vuejs fa-lg"></i>
     
        <i class="fas fa-shopping-cart fa-lg"></i>
        <i class="fas fa-user fa-lg" ></i>
      
        
      
      </nav>
</footer>
  
    
   
 
  
  
  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <script src="js/myJavascript.js"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/style1.js"></script>
</body>

</html>