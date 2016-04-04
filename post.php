-<?php
//print_r($_POST);
?> 

<?php
include('model.php');

$count = count($_POST[topping]);
echo $count;

$topping = new Topping('1','1');

print_r($topping->getToppingList());



// for ($i=1;$i<=$count;$i++)
// {
//     $topping.$i = new Topping($i)
// }

// $topping = new Topping()
// $tax = new Tax("1","101","362");

// $province = new Province("1","Ontario");


// echo $tax->getProvinceId();

// print_r($province);

?>