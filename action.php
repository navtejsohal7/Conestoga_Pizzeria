<?php

include('model.php');
include('connect.php');



$crust = new Crust;
$personalinfo = new PersonalInfo;
$order = new Order;
$size = new Size;
$topprice = 0;
$province = new Province;
$numberoftopping = count($_SESSION['topping']);




$province->setProvinceId($_SESSION['provinceid']);

$crust->setCrustId($_SESSION['crust']);

$size->setSizeId($_SESSION['size']);

$userid = rand();

$personalinfo->setUserId($userid);
$personalinfo->setFirstName($_SESSION['fname']);
$personalinfo->setLastName($_SESSION['lname']);
$personalinfo->setAddress($_SESSION['address']);
$personalinfo->setCity($_SESSION['city']);
$personalinfo->setProvinceId($_SESSION['provinceid']);
$personalinfo->setPostalCode($_SESSION['pcode']);
$personalinfo->setTelephone($_SESSION['telephone']);
$personalinfo->setEmailId($_SESSION['email']);


$uid = $personalinfo->getUserId();
$fname = $personalinfo->getFirstName();
$lname = $personalinfo->getLastName();
$address = $personalinfo->getAddress();
$city = $personalinfo->getCity();
$provid = $personalinfo->getProvinceId();
$postalcode = $personalinfo->getPostalCode();
$telephone = $personalinfo->getTelephone();
$email = $personalinfo->getEmailId();
$date = date("Y-m-d h:i:s");

$orderid= rand();


$order->setUserId($uid);
$order->setOrderId($orderid);

$order->setCrustId($_SESSION['crust']);
$order->setSizeId($_SESSION['size']);
// $order->setCost($_SESSION['crust']);
$order->setDateOrdered($date);
$order->setNumberOfPizzas($_SESSION['numberofpizza']);
$order->setIsOrderCompleted("0");


$query7= mysqli_query($mysqli,"SELECT * FROM Tax WHERE ProvinceId =".$_SESSION['provinceid']);
while($row = mysqli_fetch_array($query7))
{
   $order->setTaxId($row['Tax']);
}


$query6= mysqli_query($mysqli,"SELECT * FROM Crust WHERE CrustId =".$_SESSION['crust']);
while($row1 = mysqli_fetch_array($query6))
{
    $crust->setCrustCost($row1['CrustCost']);
}

$query5= mysqli_query($mysqli,"SELECT * FROM Size WHERE SizeId =".$_SESSION['size']);
while($row2 = mysqli_fetch_array($query5))
{
    $size->setSizeCost($row2['SizeCost']);
}

$crustcost = $crust->getCrustCost();
$sizecost = $size->getSizeCost();



$oid = $order->getOrderId();
$ouid = $order->getUserId();
$ocid = $order->getCrustId();
$osid = $order->getSizeId();
// $order->getCost($_SESSION['crust']);
$odate = $order->getDateOrdered();
$onumberofpizza = $order->getNumberOfPizzas();
$ostatus = $order->getIsOrderCompleted();
$tax = $order->getTaxId();


$top = count($_SESSION['topping']);
if($top>1)
{
    $resttop = $top - 1;
    $topprice = $resttop * .5;
    $cost = $crustcost + $sizecost;
   
    $totalcost = $cost + $topprice; 
    $tottax = $tax / 100;
    $ordertax = $totalcost * $tottax;
    $ordercost = $ordertax + $totalcost;
    $total = $ordercost * $_SESSION['numberofpizza'];
    $_SESSION['subtotal'] = $totalcost * $_SESSION['numberofpizza'];;
    $_SESSION['ordertax'] = $ordertax * $_SESSION['numberofpizza'];;
    $_SESSION['ordercost'] = $total;
    $ototal = $_SESSION['ordercost'];
}
else
{
    $cost = $crustcost + $sizecost;
   
    $totalcost = $cost + $topprice; 
    $tottax = $tax / 100;
    $ordertax = $totalcost * $tottax;
    $ordercost = $ordertax + $totalcost;
   $total = $ordercost * $_SESSION['numberofpizza'];
    $_SESSION['subtotal'] = $totalcost * $_SESSION['numberofpizza'];;
    $_SESSION['ordertax'] = $ordertax * $_SESSION['numberofpizza'];;
    $_SESSION['ordercost'] = $total;
    $ototal = $_SESSION['ordercost'];
}


$result1 = mysqli_query($mysqli,"INSERT INTO PersonalInfo (UserId, DateCreated, FirstName, Lastname, Address, City, ProvinceId, PostalCode, Telephone, EmailId) VALUES ('$uid', '$date', '$fname', '$lname', '$address', '$city', '$provid', '$postalcode', '$telephone', '$email')");

$result8 = mysqli_query($mysqli,"INSERT INTO `Order` (`OrderId`, UserId, CrustId, SizeId, Cost, DateOrdered, NumberOfPizzas, IsOrderCompleted, TaxId) VALUES ('$oid', '$ouid', '$ocid', '$osid', '$ototal', '$odate', '$onumberofpizza',  '$ostatus', '$tax')");
//print_r($result8);
if(!$result8)
{
    echo mysqli_error($mysqli);
}

for($i=0; $i<$numberoftopping; $i++)
{
    $topping[]= new Topping;
    $topping[$i]->setToppingId($_SESSION['topping'][$i]);
    $a = $topping[$i]->getToppingId();
    $result = mysqli_query($mysqli,"INSERT INTO OrderTopping (OrderId, ToppingId) VALUES ('$oid', '$a')");
    
if(!$result)
{
    echo mysqli_error($link);
}

}


?>