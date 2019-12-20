<?php
include('includes/config.php');
$s1=$_REQUEST["n"];
$select_query="SELECT * from product where name like '%".$s1."%'";
$query1=$dbh->prepare($select_query);
$s="";
$query1->execute();
$sql=$query1->fetchAll();
foreach($sql as $row)
{	?>
<script>
alert("lol");
</script>
<?php
	$s=$s."
	<a class='link-p-colr ' href='product_info.php?productid=".$row['id']."'>
		<div class='live-outer '>
                <div class='live-product-det '>
                	<div class='live-product-name searchTT'>
                    	<p>".$row['name']."</p>
                    </div>
                    
                </div>	
            </div>
	</a>
	"	;
}
echo $s;
?>