<?php

include('connect.php');
session_start();

if(isset($_POST['delete']))
{
    $deletesql = "DELETE FROM `Order` WHERE OrderId =".$_POST['delete'];
    $deletequery = mysqli_query($mysqli, $deletesql);
}
if(isset($_POST['complete']))
{
    $updatesql = "UPDATE `Order` SET IsOrderCompleted = '1' WHERE OrderId =".$_POST['complete'];
    $updatequery = mysqli_query($mysqli, $updatesql);
}

if(isset($_POST['edit']))
{
    header("Location:updateorder.php");
}
error_reporting(E_ERROR | E_PARSE);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin View Conestoga Pizzeria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="index.php" style="text-decoration:none"><h2>Conestoga Pizzeria</h2></a>
        <h3>Admin View</h3>
    <div class="row">
    <table class="table table-hover table-striped">
        <tr>
            <th>Order Id</th>
            <th>Name</th>
            <th>Size</th>
            <th>Crust</th>
            <th>Toppings</th>
            <th>Number Of Pizzas</th>
            <th>Date Ordered</th>
            <th>Amount</th>
            <th>Order Status</th>
            <th></th>
            <th></th>
            <th></th>
            
            
            
        </tr>
            <?php
            $query5 = "SELECT o.OrderId,o.DateOrdered,o.NumberOfPizzas,
                        o.IsOrderCompleted,o.Cost,
                        u.FirstName,u.UserId, u.LastName, u.Address, u.City, u.PostalCode, u.Telephone, u.EmailId, u.ProvinceId, 
                        s.SizeType, s.SizeId,
                        c.CrustType, c.CrustId FROM `Order` o
                        LEFT JOIN PersonalInfo u 
                        ON o.UserId = u.UserId
                        left join Size s
                        on o.SizeId = s.SizeId
                        left join Crust c
                        on o.CrustId = c.CrustId
                        ";

        $query = mysqli_query($mysqli, $query5) or die (mysqli_error($mysqli)); 
        session_destroy();
        session_start();
		
		$obj = '';
		
      
        while($obj = $query->fetch_array())
        {
			//$str =  serialize($obj);
            $_SESSION = $obj;
			//echo "<pre>";
			//$str = serialize($obj);
			//$_SESSION = $str;
			//print_r($obj[][1]);
           //echo $obj;
		   
		   
            
			//break;
            ?>
            <tr>
                <td><?=$obj['OrderId'] ?></td>
                <td><?=$obj['FirstName'] ?></td>
                <td><?=$obj['SizeType'] ?></td>
                <td><?=$obj['CrustType'] ?></td>
                <?php
                    $sql7 = "SELECT ot.ToppingId, t.ToppingName FROM OrderTopping ot left join Topping t on ot.ToppingId = t.ToppingId WHERE OrderId = ".$obj['OrderId'];
                    $query7 = mysqli_query($mysqli, $sql7);
                    ?>
                    <td>
                        <?php
						$cntr = 0;
						$str2  = '';
						$st = '';
                    while($obj2 = $query7->fetch_array())
                    {
						
						$cntr ++ ;
                        echo $obj2['ToppingName'].' ';
						
					
						
						$_SESSION['topping'] = $str2;
						
						
						
                        
                      
                    }
					
					
                     ?>
                     </td>
                <td><?=$obj['NumberOfPizzas'] ?></td>
                <td><?=$obj['DateOrdered'] ?></td>
                <td>$<?=$obj['Cost'] ?></td>
                <td>
                <?php 
                    if($obj['IsOrderCompleted']==0)
                    {
                        echo 'In Process';
                    }
                    else
                    {
                        echo 'Completed';
                    }
                    ?>
                </td>

                
                
                        <form action = "adminview.php" method="POST">
                            <td>
                                <button type="submit" name="delete" value = "<?php echo $obj['OrderId']?>" class="btn btn-default" aria-label="Left Align">Delete
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </td>
                            <td>
                                <button type="submit" name = "complete" value="<?php echo $obj['OrderId']?>" class="btn btn-default" aria-label="Left Align">Complete
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </button>
                            </td>
                            <td>
                                <button type="submit" name="edit" class="btn btn-default" aria-label="Left Align">Edit
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </td>
                        </form>
                    </tr>
                        <?php
                    
                
                
            
            
        ?>
        </tr>
        <?php
        }
		
		
        ?>  
        </table>
        </div>
        
    </table>
    </div>