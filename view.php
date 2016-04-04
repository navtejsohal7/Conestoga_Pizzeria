<?php

session_start();
include("connect.php");
include("model.php");
include("validate.php");

 if(isset($_POST['submit']) && $error =="")
  {
    
    $_SESSION = $_POST;
    header('Location: confirmation.php');

    
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Place Order</title>
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
  <?=$error?>
  <div class="row">
    <div class="col-sm-6" height="500px">
      <form role="form" action="view.php" method="POST" onSubmit="return validateForm()">
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="Address"  >
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input type="text" name="city" class="form-control" id="city" placeholder="City"  >
        </div>
        <div class="form-group">
          <label for="province">Province:</label>
          <select name="provinceid" class="form-control" id="province" >

            
           <?php 
            
            
            $query3 = "SELECT * FROM Province";
    			$listofprovince = array();
    			$arrayforobjects4 = array();
    			$counter = 0;
    			if ($result3 = $mysqli->query($query3)) 
    			{
    
    				/* fetch object array */
    				while ($obj3 = $result3->fetch_array()) 
    				{
    					
    					$arrayforobjects4[$counter] = $obj3;
    					
    
    					?>
    						
    							<option value="<?php echo $arrayforobjects4[$counter]['ProvinceId'];?>"><?php echo $arrayforobjects4[$counter]['ProvinceName'];?></option>
    						
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
          <input type="text" name="pcode" class="form-control" id="pcode" placeholder="Postal Code"  >
        </div> 
        <div class="form-group">
          <label for="telephone">Telephone:</label>
          <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email" >
        </div>
        
        </div>
        <div class="col-sm-6" height="500px">
        
        
     
   
        <div class="form-group">
          <label for="number">Number Of Pizzas:</label>
          <input type="text" name="numberofpizza" class="form-control" id="numberofpizza" placeholder="Number of Pizza">
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
    						
    							<label class="checkbox-inline"><input type="checkbox" name="topping[]" value="<?php echo $arrayforobjects3[$counter]['ToppingId'];?>"><?php echo $arrayforobjects3[$counter]['ToppingName'];?></label>
    						
    				<?php		
    					$counter++;
    					
    					
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
    					
    					$arrayforobjects2[$counter] = $obj1;
    					
    
    					?>
    						
    							<div class="radio">
                      <label><input type="radio"  name="crust" value="<?php echo $arrayforobjects2[$counter]['CrustId']; ?>"><?php echo $arrayforobjects2[$counter]['CrustType']; ?></label>
                  </div>
    						
    					<?php
    					$counter++;
    					
    					
    				}
    				
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
    					
    					$arrayforobjects1[$counter] = $obj;
    					
              ?>
    					
    						
    						<div class="radio">
                      <label><input type="radio" name="size" value="<?php echo $arrayforobjects1[$counter]['SizeId'];?>"><?php echo $arrayforobjects1[$counter]['SizeType'];?></label>
                  </div>
    						
    					<?php
    					
    					$counter++;
    					
    					
    				}
    				
    				$result->close();
    			}
    			    ?>
         
        </div>
     </div>
    </div>
        <div class="row text-center" style="margin:25px">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      
      	
      	
 
    
  </div>
</div>

</body>
</html>

