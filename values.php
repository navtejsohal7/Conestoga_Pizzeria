<?php

include('connect.php');
session_start();


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
        <h2>Conestoga Pizzeria</h2>
    
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
                        u.FirstName,
                        s.SizeType,
                        c.CrustType FROM `Order` o
                        LEFT JOIN PersonalInfo u 
                        ON o.UserId = u.UserId
                        left join Size s
                        on o.SizeId = s.SizeId
                        left join Crust c
                        on o.CrustId = c.CrustId
                        ";

        $query = mysqli_query($mysqli, $query5) or die (mysqli_error($mysqli)); 
        
        echo "<pre>";
        while($obj = $query->fetch_array())
        {
            ?>
            <tr>
                <?php
                    $sql7 = "SELECT t.ToppingName FROM OrderTopping ot left join Topping t on ot.ToppingId = t.ToppingId WHERE OrderId = ".$obj['OrderId'];
                    $query7 = mysqli_query($mysqli, $sql7);
                    while($obj2 = $query7->fetch_array())
                    {
                        ?>
                        <td><?=$obj['OrderId'] ?></td>
                        <td><?=$obj['FirstName'] ?></td>
                        <td><?=$obj['SizeType'] ?></td>
                        <td><?=$obj['CrustType'] ?></td>
                        <td>
                        <?php
                            foreach ($obj2 as $value) {
                                echo $value.' ';
                            }
                        ?>
                        </td>
                        <td><?=$obj['NumberOfPizzas'] ?></td>
                        <td><?=$obj['DateOrdered'] ?></td>
                        <td><?=$obj['Cost'] ?></td>
                        <td><?php 
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
                        <form action = 'value.php'
                        <td>
                            <button type="button" class="btn btn-default" aria-label="Left Align">Delete
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>
                        <?php
                    }
                
                
            
            
        ?>
        </tr>
        <?php
        }
        ?>  
        </table>
        </div>
        
    </table>
    </div>