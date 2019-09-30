
<div class="head">
	<div class="homeicon">
		<a href="./home.php"><img src="./images/IconShop.bmp"></a>
	</div>
	<div class="search">
		<form action="./home.php" class="searchform">			
			<input type="text" name="search" class="searchinput" placeholder="Type here for Searching ...">		
			<div class="searchbutton">
				<button type="submit" class="btn btn-light"><span>Search</span></button>
			</div>
		</form>
	</div>
	<div class="cart">
		<a href="" data-toggle="modal" data-target="#cartModal">
			<img src="./images/carticon.png">
			<b>Cart</b>
		</a>
	</div>
  <?php 
    //$_SESSION["login"]=0;
    if(isset($_SESSION["login"]))
    {
    $idp=$_SESSION["login"][0][0];
    $sql = "select isOnline,username,IsAdmin,id from account where id=$idp";
    $login=query($sql); 
    }
    else
    {    
      $login[0][0]=0;
    }
    if ($login[0][0]==0 or is_null($login[0][0]))
    {  
    ?>
  <div class="login">
    <a href="" data-toggle="modal" data-target="#loginModal"><img src="./images/login.png"><b>Login</b></a>
  </div>
    <?php
    }
    elseif($login[0][0]==1)
    {
    ?>
  <div class="login" style="width: 200px;">
    <a href="" data-toggle="modal" data-target="#acountModal"><img src="./images/login.png"><b>A-info</b></a>
  </div>
    <?php  
    }
    
   ?>

</div>


<!-- Login Formmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
<div class="container">
  <!-- The Modal -->
  	<div class="modal fade" id="loginModal">
   		<div class="modal-dialog">
    		<div class="modal-content">
       <!-- Modal Header -->
       			<div class="modal-header">
         			<h4 class="modal-title" style="font-size:30px;">Login</h4>
         			<button type="button" class="close" data-dismiss="modal">&times;</button>
       			</div>
       
       <!-- Modal body -->
       			<div class="modal-body">
        			<form action="" method="post" ">
        				<table class="formsignup">
	        				<tr>
	        					<td><b>Username : </b></td>
	        					<td colspan="2"><input type="text" name="username" style="width: 100%;"></td>
	        				</tr>
	        				<tr>
	        					<td><span><b>Password : </b></span></td>
	        					<td colspan="2"><input type="Password" name="Password" style="width: 100%;"></td>
	        				</tr>
	        				<tr>
		        				<td><input type="radio" name="admin">Admin Login</td>
		        				<td align="center">
		        					<span style="font-size: 15px;">Don't have?</span>
		        					<a href="" data-toggle="modal" data-target="#signupModal">
		        						<button type="button" class="btn btn-danger" data-dismiss="modal">SignUp</button>
		        					</a>
		        				</td>
		        				<td>
                      <button type="submit" class="btn btn-success" style="width: 100%;">Login</button>
		        					
		        				</td>
	        				</tr>
                  <?php 
                  if(isset($_POST['username']))
                  {
                    $user=$_POST['username'];
                    $pass=$_POST['Password'];
                    $sql = "select * from account where username='$user' and password='$pass'";
                    $logins=query($sql);
                    if(isset($logins[0]))
                    {
                      $ida=$logins[0][0];
                      $sql = "UPDATE account SET isOnline='1' WHERE id=$ida";
                      update($sql);
                      $_SESSION["login"]=$logins;
                      header("Refresh:0"); 
                    }
                    else
                    {
                  ?>
                  <tr>
                    <td><span><b>Wrong Username or Password</b></span></td>
                  </tr>
                  <?php    
                    }
                  }
                   ?>
        				</table>
        			</form>
       			</div>
            
       <!-- Modal footer -->
       			<div class="modal-footer">
         			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       			</div>
       
     		</div>
   		</div>
  	</div>
</div>


<!-- Sign up Formmmmmmmmmmmmmmmmmmm -->
<div class="container">
  <!-- The Modal -->
  	<div class="modal fade" id="signupModal">
   		<div class="modal-dialog">
    		<div class="modal-content">
       <!-- Modal Header -->
       			<div class="modal-header">
         			<h4 class="modal-title" style="font-size:30px;">SignUp</h4>
         			<button type="button" class="close" data-dismiss="modal">&times;</button>
       			</div>
       
       <!-- Modal body -->
       			<div class="modal-body">
              <?php //add acount to sql
              if(isset($_POST['susername']))
              {
                $signup=[$_POST['susername'],$_POST['sPassword'],$_POST['sRe-Password']];
                if($signup[1]==$signup[2])
                {
                  $sql="INSERT into account(username,password) values('$signup[0]','$signup[1]')";
                  insert($sql);
                }
                else
                {
                  echo "<div>Password do not match</div>";
                }
              }
               ?>
        			<form method="post">
        				<table class="formsignup">
        					<tr>
        						<td>Username:</td>
        					</tr>
	        				<tr>
	        					<td colspan="2"><input type="text" name="susername" style="width: 100%;"></td>
	        				</tr>
	        				<tr>
        						<td>Password:</td>
        					</tr>
	        				<tr>
	        					<td colspan="2"><input type="Password" name="sPassword" style="width: 100%;"></td>
	        				</tr>
	        				<tr>
        						<td>ReEnter Password:</td>
        					</tr>
	        				<tr>
	        					<td colspan="2"><input type="Password" name="sRe-Password" style="width: 100%;"></td>
	        				</tr>
	        				<tr>
		        				<td align="center">
		        					<a href="" data-toggle="modal" data-target="#loginModal">
		        						<button type="button" class="btn btn-danger" data-dismiss="modal">Go back to Login</button>
		        					</a>
		        				</td>
		        				<td>
		        					<button class="btn btn-success" style="width: 100%;">SignUp</button>
		        				</td>
	        				</tr>
        				</table>

        			</form>
       			</div>
       
       <!-- Modal footer -->
       			<div class="modal-footer">
         			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       			</div>
       
     		</div>
   		</div>
  	</div>
</div>




<!-- Cart Formmmmmmmmmmmmmmmmmmm -->
<div class="container">
  <!-- The Modal -->
  	<div class="modal fade" id="cartModal">
   		<div class="modal-dialog modal-xl">
    		<div class="modal-content">
       <!-- Modal Header -->
       			<div class="modal-header">
         			<h4 class="modal-title" style="font-size:30px;">Cart</h4>
         			<button type="button" class="close" data-dismiss="modal">&times;</button>
       			</div>
       
       <!-- Modal body -->
       			<div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-2">Name</div>
                  <div class="col-3">Img</div>
                  <div class="col-1">Price</div>
                  <div class="col-1">Quantity:</div>
                </div>
                <?php 
                if(isset($_SESSION['login']))
                {
                  $idc=$login[0][3];
                  $sql="select * from cart where CusId=$idc";
                  $cartz=query($sql);
                  if(isset($_GET['prodid']))//delete pro in cart
                  {
                    $prodid=$_GET['prodid'];
                    $sql="DELETE FROM cart WHERE productid=$prodid and CusId=$idc";
                    delete($sql);
                ?>
                  <meta http-equiv="Refresh" name="" content="0;URL=./home.php">
                <?php
                  }
                   
                  if(isset($_GET['qty']))//update pro in cart
                   {
                     $prouid=$_GET['prouid'];
                     $qty=$_GET['qty'];
                     $sql="UPDATE cart SET Qty=$qty WHERE productid=$prouid and CusId=$idc";
                     update($sql);
                  ?>
                    <meta http-equiv="Refresh" name="" content="0;URL=./home.php">
                  <?php
                   }
                     
                  if(isset($_GET['addcart']))
                  {
                    $procart=$_GET['proid'];
                    $sql="select*from cart where productid=$procart and CusId=$idc";
                    $check=query($sql);// check if existed
                    if($check==null)
                    {
                     $sql="INSERT into cart(CusId,Productid,Qty) values($idc,$procart,1)";
                      insert($sql); 
                ?>
                  <meta http-equiv="Refresh" name="" content="0;URL=./home.php">
                <?php
                    }
                
                  }
                  if($cartz==null)
                  {
                    $tablez=0;
                  }
                  else
                  {
                    for($i=0;$i<count($cartz);$i++)
                    {
                    $p=$cartz[$i][1];
                    $sql="select*from product where productid=$p";
                    $tablez=query($sql);
                    
                ?>
                <form action="./home.php?prouid=<?=$cartz[$i][1]?>">
                  <div class="row" style="border: 1px solid black;">
                    <div class="col-2"><?=$tablez[0][1]?></div>
                    <div class="col-3"><a href="./product.php?proid=<?=$p?>"><img style="width: 100%;height: 100%;" src="<?=$tablez[0][2]?>"></a></div>
                    <div class="col-1"><?=$tablez[0][3]?></div>
                    <div class="col-1">
                      <input type="hidden" name="prouid" value="<?=$p?>">
                      <input type="text" style="width: 100%;"name="qty" value="<?=$cartz[$i][2]?>">
                    </div>
                    <div class="col-2">
                      <a href="./home.php?prouid=<?=$cartz[$i][1]?>"><button type="submit" class="btn btn-danger">Update</button></a>
                    </div>
                    <div class="col-2">
                      <a href="<?=$_SERVER['PHP_SELF']?>?<?=$_SERVER['QUERY_STRING']?>&prodid=<?=$cartz[$i][1]?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                  </div>
                </form>
                <?php
                    }
                  }           
                }
               ?>
              </form>
              
              
        		  
       			</div>
       
       <!-- Modal footer -->
       			<div class="modal-footer">
         			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       			</div>
       
     		</div>
   		</div>
  	</div>
</div>

<!-- Acount Formmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
<div class="container">
  <!-- The Modal -->
    <div class="modal fade" id="acountModal">
      <div class="modal-dialog">
        <div class="modal-content">
       <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="font-size:30px;">AcountInfo</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
       
       <!-- Modal body -->
            <div class="modal-body">
              <div>UserName: <?=$login[0][1]?></div>
              <div>Is Admin:<?php if($login[0][2]==1) 
              {
                echo" Yes";
                ?>
              <div>
                <a href="./admin.php"><button type="button" class="btn btn-success" style=";">ManageProduct</button></a>
              </div>
                <?php
              } 
              else {echo "No";}?></div>
              <div>
                <a href="" data-toggle="modal" data-target="#profileModal">
                  <button type="button" class="btn btn-success"  data-dismiss="modal">Profiles</button>
                </a>
              </div>
              <a href="./logout.php"><button type="button" class="btn btn-danger">LogOut</button></a>
                
            </div>
       
       <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
       
        </div>
      </div>
    </div>
</div>

<!-- Acount Formmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
<div class="container">
  <!-- The Modal -->
    <div class="modal fade" id="profileModal">
      <div class="modal-dialog">
        <div class="modal-content">
       <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="font-size:30px;">ProfileInfo</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
       
       <!-- Modal body -->
            <div class="modal-body">
              <?php
              if(isset($_SESSION["login"]))
              {
                $idb=$login[0][3];
                $sql="select * from customer where CusId=$idb";
                $account=query($sql);
                if($account==null)
                {
                  $account=0;
                }
                if(isset($_POST['FullName']))
                {
                  $acountt=[$_POST['FullName'],$_POST['Address'],$_POST['Phone'],$_POST['Email']];
                  if(isset($account[0][0]))
                  {
                    $sql="UPDATE customer SET FullName='$acountt[0]',Address='$acountt[1]',Phone='$acountt[2]',Email='$acountt[3]' WHERE CusId=$idb";
                    update($sql);
                  ?>
                  <meta http-equiv="Refresh" name="" content="0;URL=./home.php">
                  <?php
                  }
                  else
                  {
                    $sql="INSERT into customer(CusID,FullName,Address,Phone,Email) values('$idb','$acountt[0]','$acountt[1]','$acountt[2]','$acountt[3]')";
                    insert($sql);
                  ?>
                  <meta http-equiv="Refresh" name="" content="0;URL=./home.php">
                  <?php
                  }
                }

              }
               ?>
              <form action="./home.php" method="post">
                <table>
                  <tr>
                    <td>ID:</td>
                    <td><?=$login[0][3]?></td>
                  </tr>
                  <tr>
                    <td>FullName:</td>
                    <td><input type="text" name="FullName" value="<?=$account[0][1]?>"></td>
                  </tr>
                  <tr>
                    <td>Address:</td>
                    <td><input type="text" name="Address" value="<?=$account[0][2]?>"></td>
                  </tr>
                  <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="Phone" value="<?=$account[0][3]?>"></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><input type="text" name="Email" value="<?=$account[0][4]?>"></td>
                  </tr>
                  <tr>
                    <td><button type="submit" class="btn btn-success" style="width: 100%;">Add-Update</button></td>
                  </tr>
                </table>
              </form>
                       
            </div>
       
       <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
       
        </div>
      </div>
    </div>
</div>