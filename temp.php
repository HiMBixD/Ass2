<?php session_start(); ?>
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
	<div class="rowss">
	<?php
	require_once("funtion.php");
	//condition to search
	if(isset($_GET['catid']))
	{
		$_SESSION["cid"]=$_GET['catid'];
		$_SESSION["category"]=1;
		$_SESSION["search"]=0;
		$_SESSION["home"]=0;			
	}
	elseif (isset($_GET['search'])) 
	{
		$_SESSION["searchbox"]=$_GET['search'];
		$_SESSION["category"]=0;
		$_SESSION["search"]=1;
		$_SESSION["home"]=0;				
	}	
	else
	{//no condition
		$_SESSION["category"]=0;
		$_SESSION["search"]=0;
		$_SESSION["home"]=1;	
	}

	if (isset($_GET['pageid'])) 
	{
		$_SESSION["id"]=($_GET['pageid']-1)*20;
	}	
	else
	{
		$_SESSION["id"]=0;
	}
	//show product
	if($_SESSION["category"]=1)
	{
		$cid=$_SESSION["cid"];
		$sql = "select * from product where CatId=$cid";
	 	$producttable=query($sql);
	 	$id=$_SESSION["id"];
		for($i=0;($i<count($producttable)-$id)and $i<20;$i++)
		{
	?>
		<div class="col">
			<div class="productid"><?=$producttable[$i+$id][0]?></div>
			<div class="productname"><?=$producttable[$i+$id][1]?></div>
			<div class="productimg"><img src="<?=$producttable[$i+$id][2]?>"></div>
			<div class="productprice"><?=$producttable[$i+$id][3]?></div>
		</div>
	<?php
		}
		$_SESSION["category"]=0;
	}
	elseif($_SESSION["search"]=1)
	{
		$search=$_SESSION["searchbox"];
		$sql = "select * from product where productname like'%$search%'";
	 	$producttable=query($sql);
	 	$id=$_SESSION["id"];
		for($i=0;($i<count($producttable)-$id)and $i<20;$i++)
		{
	?>
		<div class="col">
			<div class="productid"><?=$producttable[$i+$id][0]?></div>
			<div class="productname"><?=$producttable[$i+$id][1]?></div>
			<div class="productimg"><img src="<?=$producttable[$i+$id][2]?>"></div>
			<div class="productprice"><?=$producttable[$i+$id][3]?></div>
		</div>
	<?php
		}
	}
	elseif($_SESSION["home"]=1)
	{
		$sql = "select * from product";
	 	$producttable=query($sql);
	 	$id=$_SESSION["id"];
		for($i=0;($i<count($producttable)-$id)and $i<20;$i++)
		{
	?>
		<div class="col">
			<div class="productid"><?=$producttable[$i+$id][0]?></div>
			<div class="productname"><?=$producttable[$i+$id][1]?></div>
			<div class="productimg"><img src="<?=$producttable[$i+$id][2]?>"></div>
			<div class="productprice"><?=$producttable[$i+$id][3]?></div>
		</div>
	<?php
		}
	}
	 ?>	
	
	</div>

	<ul class="pagination justify-content-end" style="margin:20px 0; clear: left;">
		<?php 			
			for($z=0;$z<count($producttable)/20;$z++)
			{
		?>
		<li class="page-item"><a class="page-link" href="./home.php?pageid=<?=$z+1?>"><?=$z+1?></a></li>
		<?php		
			}
		 ?>
	    
	</ul>

</div>
 <div class="bottom">zxczxczxc</div>
</body>
</html>