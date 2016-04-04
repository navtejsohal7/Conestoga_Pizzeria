<?php
session_start();
include("connect.php");
include("action.php");

$size = $_SESSION['size'];
$crust = $_SESSION['crust'];
$toppings = array();

$query_size = "SELECT SizeType FROM Size WHERE SizeId=".$size;
$query_crust = "SELECT CrustType FROM Crust WHERE CrustId=".$crust;

 $result = mysqli_query($mysqli,$query_size);
 if($obj = $result->fetch_array())
 {
    $_SESSION['sizetype'] = $obj[0];
     
    }
 
  $result = mysqli_query($mysqli,$query_crust);
 if($obj = $result->fetch_array())
 {
    $_SESSION['crusttype'] = $obj[0];

 }

$toppings = array();


$toppingsname = $_SESSION['topping']; 


for ($i = 0; $i < count($toppingsname); $i++) {
     $query_topping = "SELECT ToppingName FROM Topping WHERE ToppingId=".$toppingsname[$i];
    
     $result = mysqli_query($mysqli,$query_topping);
     if($obj = $result->fetch_array())
     {
        $toppings[$i] = $obj[0];
     }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Confirmed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="index.php" style="text-decoration:none"><h2>Conestoga Pizzeria</h2></a>
        <div class="row">
            <table  class="table table-striped">
             <tr>    
                <td class="alert alert-success" role="alert" colspan="2">
                    Thank you <b><?= $_SESSION['fname'] ?></b> , Your order has been placed.
                </td>
            </tr>    
                
            <th colspan="2">ORDER SUMMARY</th>
           
            <tr>
                <th>
                    Number of Pizzas
                </th>
                <td>
                    <?= $_SESSION['numberofpizza'] ?>
                </td>
                
            </tr>
            <tr>
                <th>
                    Pizza Size
                </th>
                <td>
                    <?= $_SESSION['sizetype'] ?>
                </td>
                
            </tr>
            <tr>
                <th>
                    Crust
                </th>
                <td>
                    <?= $_SESSION['crusttype'] ?>
                </td>
                
            </tr>
            <tr>
                <th>
                    Toppings
 
 
                </th>
                <td>
                    <?php
                        foreach ($toppings as $value) {
                            // code...
                            
                            echo $value.' ';
                            
                            
                            
                        }
                    ?>
                            
                </td>
                
            </tr>
            <tr>
                <th>
                    Subtotal
                </th>
                <td>
                   $<?=$_SESSION['subtotal']?>
                </td>
                
            </tr>
            <tr>
                <th>
                    Tax
                </th>
                <td>
                   $<?=$_SESSION['ordertax']?>
                </td>
                
            </tr>
            <tr>
                <th>
                    Total Amount
                </th>
                <td>
                   $<?=$_SESSION['ordercost']?>
                </td>
                
            </tr>
            
        </table>
        </div>
    </div>
</body>