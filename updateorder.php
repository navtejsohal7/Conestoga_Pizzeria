<?php

session_start();
include("connect.php");
include("model.php");
include("validate.php");

//$unser = unserialize($s);



 if(isset($_POST['update']) && $error =="")
  {
  
  
$query5= mysqli_query($mysqli,"SELECT * FROM Size WHERE SizeId =".$_POST['size']);
while($row2 = mysqli_fetch_array($query5))
{
    $sizecost = $row2['SizeCost'];
}

  $query6= mysqli_query($mysqli,"SELECT * FROM Crust WHERE CrustId =".$_POST['crust']);
while($row1 = mysqli_fetch_array($query6))
{
    $crustcost = $row1['CrustCost'];
}

$query7= mysqli_query($mysqli,"SELECT * FROM  `Tax` WHERE ProvinceId =".$_POST['provinceid']);
while($row = mysqli_fetch_array($query7))
{
   $tax = $row['Tax'];
}

$top = count($_POST['topping']);
if($top>1)
{
$resttop = $top - 1;
$topprice = $resttop * .5;
$cost = $crustcost + $sizecost;
   
    $totalcost = $cost + $topprice; 
    $tottax = $tax / 100;
    $ordertax = $totalcost * $tottax;
    $ordercost = $ordertax + $totalcost;
    $total = $ordercost * $_POST['numberofpizza'];
   
}
else
{
    $cost = $crustcost + $sizecost;
   
    $totalcost = $cost + $topprice; 
    $tottax = $tax / 100;
    $ordertax = $totalcost * $tottax;
    $ordercost = $ordertax + $totalcost;
  $total = $ordercost * $_POST['numberofpizza'];
   
}




    
    
    $sqlstatement_update = "UPDATE `Order` SET CrustId=".$_POST['crust'].",
                                        SizeId=".$_POST['size'].",
                                        Cost=".$total.",
                                        NumberOfPizzas=".$_POST['numberofpizza']."
                                    WHERE OrderId=".$unser['OrderId'];
  
    //echo $sqlstatement_update;                                      
    $query_update = mysqli_query($mysqli,$sqlstatement_update);
//    $sql = "UPDATE `pizzeria_database`.`PersonalInfo` SET `FirstName` = \'sukhas\' WHERE `PersonalInfo`.`UserId` = 167685766;";

    $sqlstatement_update_personalinfo = "UPDATE PersonalInfo SET FirstName='".$_POST['fname']."',
                                                                  LastName = '".$_POST['lname']."',
                                                                  Address = '".$_POST['address']."',
                                                                  City = '".$_POST['city']."',
                                                                  ProvinceId = '".$_POST['provinceid']."',
                                                                  PostalCode = '".$_POST['pcode']."',
                                                                  Telephone = '".$_POST['telephone']."',
                                                                  EmailId = '".$_POST['email']."' 
                                                                  WHERE UserId=".$unser['UserId'];
   $query_update_personalinfo = mysqli_query($mysqli,$sqlstatement_update_personalinfo) or die(mysqli_error($mysqli));
  
  
    $sqlstatement_delete_topping = "DELETE from OrderTopping WHERE OrderId=".$_SESSION['OrderId'];
    
    $query_delete_topping = mysqli_query($mysqli,$sqlstatement_delete_topping) or die(mysqli_error($mysqli));
    $a = count($_POST['topping']);
    for($i=0;$i<$a;$i++)
    {
    $sqlstatement_insert_topping = "INSERT into OrderTopping(OrderId,ToppingId) 
                                    VALUES('".$_SESSION['OrderId']."','".$_POST['topping'][$i]."')" ;
                                    
    echo $sqlstatement_insert_topping;
    $query_insert_topping = mysqli_query($mysqli, $sqlstatement_insert_topping) or die(mysqli_error($mysqli));
    }
    
   header('Location: adminview.php');    
    
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  
</head>
<body>

<div class="container">
  <a href="index.php" style="text-decoration:none"><h2>Conestoga Pizzeria</h2></a>
  <div class="row">
    <div class="col-sm-6" height="500px">
      <form role="form" action="updateorder.php" method="POST" onSubmit="return validateForm()">
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" value = "<?=$_SESSION['FirstName']?>">
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" value="<?=$_SESSION['LastName']?>">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?=$_SESSION['Address']?>" >
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?=$_SESSION['City']?>" >
        </div>
        <div class="form-group">
          <label for="province">Province:</label>
          <select name="provinceid" class="form-control" id="province" >
            <option></option>
            

            
          <?php      
error_reporting(E_ERROR | E_PARSE);		  
            $query3 = "SELECT * FROM Province";
      			$listofprovince = array();
      			$arrayforobjects4 = array();
      			$counter = 0;
      			if ($result3 = $mysqli->query($query3)) 
      			{
      
      				/* fetch object array */
      				while ($obj3 = $result3->fetch_array()) 
      				{
  		   					if($_SESSION['ProvinceId'] == $obj3['ProvinceId'])
  		   					{
  		   					?>
  		   					
  		   					  <option selected="selected" value="<?=$obj3['ProvinceId']?>"><?=$obj3['ProvinceName']?></option>
  		   					<?php
  		   					}
  		   					else
  		   					{
  		   					  ?>
  		   					  <option value="<?=$obj3['ProvinceId']?>"><?=$obj3['ProvinceName']?></option>
  		   					  <?php
  		   					}
  						?>	
      							
						
    						
      				<?php		
      					$counter++;
      					
      					
      				}
      				
      				$result3->close();
      			}
      			?>
            </select>
          </div>
         <div class="form-group">
          <label for="pcode">Postal Code:</label>
          <input type="text" name="pcode" class="form-control" id="pcode" placeholder="Postal Code" value="<?=$_SESSION['PostalCode']?>" >
        </div> 
        <div class="form-group">
          <label for="telephone">Telephone:</label>
          <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone" value="<?=$_SESSION['Telephone']?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?=$_SESSION['EmailId']?>">
        </div>
        
        </div>
        <div class="col-sm-6" height="500px">
        
        
     
   
        <div class="form-group">
          <label for="number">Number Of Pizzas:</label>
          <input type="text" name="numberofpizza" class="form-control" id="numberofpizza" placeholder="Number of Pizza" value="<?=$_SESSION['NumberOfPizzas']?>">
        </div>
         <div class="form-group">
          <label for="topping">Topping:</label>
          <div class="checkbox">
         <?php  
            $query2 = "SELECT * FROM Topping";
      			$listoftopping = array();
      			$arrayforobjects3 = array();
      			$counter = 0;
      			if ($result2 = $mysqli->query($query2)) 
      			{
              /* fetch object array */
      				while ($obj2 = $result2->fetch_array()) 
      				{
      					
      					$arrayforobjects3[$counter] = $obj2;
      				
      					?>
      			 
    						
  						<?php
    					$counter++;
    					
    					
    				}
    				// print_r($_SESSION['topping'][0]);
            //print_r($arrayforobjects3);
              
    			   //echo $_SESSION['topping'][0][0];
    			 //print_r($arrayforobjects3[0]);
    			 //echo count($_SESSION['topping']);
    			 $countfortop = count($_SESSION['topping']);
    			 $j = 0;
    			 
      				for($i=0;$i<12,$j<$countfortop;$i++)
      				{
      				  
      				
      					 if($_SESSION['topping'][$j][0] == $arrayforobjects3[$i][0])
        					{
        					  echo ' <label class="checkbox-inline"><input type="checkbox" Checked name="topping[]" value="'.$arrayforobjects3[$i]['ToppingId'].'">'.$arrayforobjects3[$i]['ToppingName'].'</label>';
        					  		$j++;
        					}
        			
      					
      					
      					else
      					{
      					 echo ' <label class="checkbox-inline"><input type="checkbox" name="topping[]" value="'.$arrayforobjects3[$i]['ToppingId'].'">'.$arrayforobjects3[$i]['ToppingName'].'</label>';

      					}
      					
      					
      					
    					}
      				
    			
    				$result2->close();
    			}
    			?>
         
        </div>
        </div>
        
        <div class="form-group">
          <label for="crust">Crust:</label>
           <?php 
            
            
            $query1 = "SELECT * FROM Crust";
    			$listofcrust = array();
    			$arrayforobjects2 = array();
    			$counter = 0;
    			if ($result1 = $mysqli->query($query1)) 
    			{
    
    				/* fetch object array */
    				while ($obj1 = $result1->fetch_array()) 
    				{
    					
    					//$arrayforobjects2[$counter] = $obj1;
    					//print_r($obj1[0]);
    					if($_SESSION['CrustId'] == $obj1[0])
    					{
    					  ?>
    					  <div class="radio">
                      <label>
    					  <input type="radio" name="crust" checked= "checked" value="<?php echo $obj1[0];?>"> 
    					  <?php echo $obj1[1];?></div>
    					  
    					  <?php
    					}
    					else
    					{
    					 ?> <div class="radio">
                      <label><input type="radio" name="crust"  value="<?php echo $obj1[0];?>"> 
    					  <?php echo $obj1[1];?>
    					  </div>
    					  <?php
    					}
    					
    
    					
    				  $counter++;
  					}
    				
    				  //echo $_SESSION['CrustId'];
    				  $result1->close();
    			}
    			
    			?>
         
        </div>
        
        
        <div class="form-group">
          <label for="size">Size:</label>
           <?php
            
            
          $query = "SELECT * FROM Size";
    			$listofsize = array();
    			$arrayforobjects1 = array();
    			$counter = 0;
    			if ($result = $mysqli->query($query)) 
    			{
    
    				/* fetch object array */
    				while ($obj = $result->fetch_array()) 
    				{
    					
    					//$arrayforobjects2[$counter] = $obj1;
    					//print_r($obj1[0]);
    					if($_SESSION['SizeId'] == $obj[0])
    					{
    					  ?>
    					  <div class="radio">
                      <label>
    					        <input type="radio" name="size" checked= "checked" value="<?php echo $obj[0];?>"> 
    					  <?php echo $obj[1];?>
    					  </div>
    					  
    					  <?php
    					}
    					else
    					{
    					 ?> <div class="radio">
                      <label><input type="radio" name="size"  value="<?php echo $obj[0];?>"> 
    					  <?php echo $obj[1];?>
    					  </div>
    					  <?php
    					}
    					
    
    					
    				  $counter++;
  					}
    				$result->close();
    			}
    			?>
         
        </div>
     </div>
    </div>
        
        <button type="submit" name="update" class="btn btn-default">Update</button>
      </form>
      	
  
 
    
  </div>
</div>

</body>
</html>

