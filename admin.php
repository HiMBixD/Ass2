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
<div class="adminmiddle" style="background-image: linear-gradient(to bottom left,  #50C2E7, #7EC913); color: #550E0E;font-size: 20px;">
	<div class="row" >
		<div class="col-1">ID</div>
    	<div class="col-1">Name</div>
    	<div class="col-2">Img</div>
    	<div class="col-1">Url</div>
    	<div class="col-1">Price</div>
    	<div class="col-1">CategoryID:</div>
    	<div class="col-3">Description:</div>
    </div>
<?php
	if(isset($_GET['aName']))//update
	{
		$aName=$_GET['aName'];
		$aUrl=$_GET['aUrl'];
		$aPrice=$_GET['aPrice'];
		$aCatid=$_GET['aCatid'];
		$aDesc=$_GET['aDesc'];
		$aId=$_GET['aId'];
		$sql ="UPDATE product SET productname='$aName',image='$aUrl',price=$aPrice,catid=$aCatid,productinfo='$aDesc' WHERE productid=$aId";
		update($sql);
	} 
	elseif(isset($_GET['dpid']))//delete
	{
		$dpid=$_GET['dpid'];
        $sql="DELETE FROM product WHERE productid=$dpid";
        delete($sql);
	}
	elseif(isset($_GET['adName']))//insert
	{
		$adName=$_GET['adName'];
		$adUrl=$_GET['adUrl'];
		$adPrice=$_GET['adPrice'];
		$adCatid=$_GET['adCatid'];
		$adDesc=$_GET['adDesc'];
		$adId=$_GET['adId'];
		$sql ="INSERT into product(productid,productname,image,price,catid,productinfo) values ($adId,'$adName','$adUrl',$adPrice,$adCatid,'$adDesc')";
		insert($sql);
	} 
	$sql = "select * from product";
	$productAdtable=query($sql);
	for($i=0;$i<count($productAdtable);$i++)
	{
?>
	<form action="">
		<div class="row" style="border: 1px solid black">
			<div class="col-1" style="border-right: 1px solid black"><?=$productAdtable[$i][0]?>
				<input type="hidden" name="aId" value="<?=$productAdtable[$i][0]?>">
			</div>
	    	<div class="col-1" style="border-right: 1px solid black">
	    		<input type="text" name="aName" style="width: 100%;" value="<?=$productAdtable[$i][1]?>">
	    	</div>
	    	<div class="col-2" style="border-right: 1px solid black">
	    		<img src="<?=$productAdtable[$i][2]?>" style="width: 100%;height: 100%;">
	    	</div>
	    	<div class="col-1" style="overflow: auto;border-right: 1px solid black">
	    		<input type="text" name="aUrl" style="width: 100%;" value="<?=$productAdtable[$i][2]?>">
	    	</div>
	    	<div class="col-1" style="border-right: 1px solid black">
	    		<input type="text" name="aPrice" style="width: 100%;" value="<?=$productAdtable[$i][3]?>">
	    	</div>
	    	<div class="col-1" style="border-right: 1px solid black">
	    		<input type="text" name="aCatid" style="width: 100%;" value="<?=$productAdtable[$i][4]?>">
	    	</div>
	    	<div class="col-3" style="border-right: 1px solid black">
	    		<input type="text" name="aDesc" style="width: 100%;" value="<?=$productAdtable[$i][5]?>">
	    	</div>
	    	<div class="col-1">
	    		<a href="">
	    			<button type="submit" class="btn btn-danger">Update</button>
	    		</a>
	    	</div>
	    	<div class="col-1">
	    		<a href="./admin.php?<?=$_SERVER['QUERY_STRING']?>&dpid=<?=$productAdtable[$i][0]?>">
	    			<button type="button" class="btn btn-danger">Delete</button>
	    		</a>
	    	</div>
		</div>
	</form>
	
<?php 
	}
 ?>
 	<form>
 		<div class="row" style="border: 1px solid black">
			<div class="col-1" style="border-right: 1px solid black"><?=count($productAdtable)+1?>
				<input type="hidden" name="adId" style="width: 100%;" value="<?=count($productAdtable)+1?>">
			</div>
	    	<div class="col-1" style="border-right: 1px solid black">
	    		<input type="text" name="adName" style="width: 100%;">
	    	</div>
	    	<div class="col-2" style="border-right: 1px solid black">
	    		<img src="" style="width: 100%;height: 100%;">
	    	</div>
	    	<div class="col-1" style="overflow: auto;border-right: 1px solid black">
	    		<input type="text" name="adUrl" style="width: 100%;" value="">
	    	</div>
	    	<div class="col-1" style="border-right: 1px solid black">
	    		<input type="text" name="adPrice" style="width: 100%;" value="">
	    	</div>
	    	<div class="col-1" style="border-right: 1px solid black">
	    		<input type="text" name="adCatid" style="width: 100%;" value="">
	    	</div>
	    	<div class="col-3" style="border-right: 1px solid black">
	    		<input type="text" name="adDesc" style="width: 100%;" value="">
	    	</div>
	    	<div class="col-1">
	    		<a href="">
	    			<button type="submit" class="btn btn-danger">Add</button>
	    		</a>
	    	</div>
		</div>
 	</form>
 		
<?php 
	require_once("./bottom.php")
 ?>
</body>
</html>