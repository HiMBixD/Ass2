<?php session_start();
require_once("./funtion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
	require_once("./Header.php")
 ?>
<div class="middle">
	<div class="menu">
		<ul>
			<li class="badge badge-secondary">Categories</li>
			<li class="badge badge-info"><a href="./home.php?catid=1">Foods</a></li>
			<li class="badge badge-info"><a href="./home.php?catid=2">Drinks</a></li>
			<li class="badge badge-info"><a href="./home.php?catid=3">Electrics</a></li>
			<li class="badge badge-info"><a href="./home.php?catid=4">Wears</a></li>
			<li class="badge badge-info"><a href="./home.php?catid=5">Shoes</a></li>
			<li class="badge badge-info"><a href="./home.php?catid=6">Vehicle</a></li>
			<li class="badge badge-info"><a href="./home.php?catid=7">Sports</a></li>
		</ul>
	</div>
	<div class="row">
		<?php
		require_once("funtion.php");
		if(isset($_GET['proid']))
		{
			$productid=$_GET['proid'];		
		}	
			$sql = "select * from product where ProductId = $productid";
		 	$producttable=query($sql);
		?>
		<div class="col-6" align="center">
			<div class="productid"><h5>Product ID: <?=$producttable[0][0]?></h5></div>
			<div class="productname"><h5>Name: <?=$producttable[0][1]?></h5></div>
			<div class="productimg"><img src="<?=$producttable[0][2]?>"></div>
			<div class="productprice">
				<h5>Price: <?=$producttable[0][3]?>$<a href="<?=$_SERVER['PHP_SELF']?>?<?=$_SERVER['QUERY_STRING']?>&addcart=1">
					<button type="button" class="btn btn-info">Add</button>
				</a>
				</h5>
			</div>
		</div>
		<div class="col-4">
			<h2>Product Infomation </h2><br>
			<p><?=$producttable[0][5]?></p>				
		</div>
	</div>
<?php 
	require_once("./bottom.php")
 ?>
</body>
</html>