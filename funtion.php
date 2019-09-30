<?php 
	$hostname='localhost';
	$username='root';
	$password='';
	$dbname='shopas2';
	$port='3306';
	function query($sql)
	{
		global $hostname;
		global $username;
		global $password;
		global $dbname;
		global $port;
		$conne = new mysqli($hostname, 
			$username, $password,$dbname,$port);
		if($conne->connect_error)
		{
			echo "connect fail <br>";
			die($conne->connect_error);
		}
		$result = $conne->query($sql);
		if(!$result)
		{
			echo "Sql execution fail <br>";
			die($conne->error);
		}
		$rows = mysqli_fetch_all($result);
		return $rows;
	}

	function insert($sql)
	{
		global $hostname;
		global $username;
		global $password;
		global $dbname;
		global $port;
		$conn = new mysqli($hostname, 
			$username, $password,$dbname,$port);
		if($conn->connect_error)
		{
			echo "connect fail <br>";
			die($conn->connect_error);
		}

		//execude and check at the same time.
		if (mysqli_query($conn, $sql)) {
    		echo "New record created successfully";
		} 
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		
		}
	}
	function update($sql)
	{
		global $hostname;
		global $username;
		global $password;
		global $dbname;
		global $port;

		// Create connection
		$connect = mysqli_connect($hostname, 
			$username, $password,$dbname,$port);
		// Check connection
		if($connect->connect_error)
		{
			echo "connect fail <br>";
			die($connect->connect_error);
		}			
		if (mysqli_query($connect, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($connect);
		}
		
	}
	function delete($sql)
	{
		global $hostname;
		global $username;
		global $password;
		global $dbname;
		global $port;

		// Create connection
		$connect = mysqli_connect($hostname, 
			$username, $password,$dbname,$port);
		// Check connection
		if($connect->connect_error)
		{
			echo "connect fail <br>";
			die($connect->connect_error);
		}			
		if (mysqli_query($connect, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($connect);
		}
		
	}
		

	
?>