<?php

class Topping
{
    private $topping_id;
    private $topping_name;
    //private static $topping_list = array();
    
  
    
    // public function Topping($topping_id, $topping_name)
    // {
    //     $this->topping_id = $topping_id;
    //     $this->topping_name = $topping_name;
        
    // }
    
    public function setToppingId($topping_id)
    {
        $this->topping_id = $topping_id;
    }
    public function getToppingId()
    {
        return $this->topping_id;
    }
    
    public function setToppingName($topping_name)
    {
        $this->topping_name = $topping_name;
    }
    public function getToppingName()
    {
        return $this->topping_name;
    }
    
    public function setToppingList($topping_list)
    {
        $this->topping_list = $topping_list;
    }
    public function getToppingList()
    {
        return $this->topping_list;
    }
    
    
}



class Crust
{
    private $crust_id;
    private $crust_name;
    private $crust_cost;
    
    
    // public function Crust($crust_id, $crust_name)
    // {
    //     $this->crust_id = $crust_id;
    //     $this->crust_name = $crust_name;
        
    // }
    public function setCrustId($crust_id)
    {
        $this->crust_id = $crust_id;
    }
    public function getCrustId()
    {
        return $this->crust_id;
    }
    
    public function setCrustName($crust_name)
    {
        $this->crust_name = $crust_name;
    }
    public function getCrustName()
    {
        return $this->crust_name;
    }
     public function setCrustCost($crust_cost)
    {
        $this->crust_cost = $crust_cost;
    }
    public function getCrustCost()
    {
        return $this->crust_cost;
    }
    
}



class Size
{
    private $size_id;
    private $size_name;
    private $size_cost;
    
    
    
    // public function Size($size_id, $size_name)
    // {
    //     $this->size_id = $size_id;
    //     $this->size_name = $size_name;
           
    // }
    
    public function setSizeId($size_id)
    {
        $this->size_id = $size_id;
    }
    public function getSizeId()
    {
        return $this->size_id;
    }
    
    public function setSizeName($size_name)
    {
        $this->size_name = $size_name;
    }
    public function getSizeName()
    {
        return $this->size_name;
    }
    
    public function setSizeCost($size_cost)
    {
        $this->size_cost = $size_cost;
    }
    public function getSizeCost()
    {
        return $this->size_cost;
    }
    
    
}


class Province
{
    private $province_id;
    private $province_name;
    
    // public function Province($province_id, $province_name)
    // {
    //     $this->province_id = $province_id;
    //     $this->province_name = $province_name;
        
    // }
    
    public function setProvinceId($province_id)
    {
        $this->province_id = $province_id;
    }
    public function getProvinceId()
    {
        return $this->province_id;
    }
    
    public function setProvinceName($province_name)
    {
        $this->province_id = $province_name;
    }
    public function getProvinceName()
    {
        return $this->province_id;
    }

}

class PersonalInfo
{
    private $user_id;
    private $first_name;
    private $last_name;
    private $address;
    private $city;
    private $province_id;
    private $postal_code;
    private $telephone;
    private $email_id;
    
    // public function PersonalInfo($user_id, $first_name, $last_name, $address, $city, $province_id, $postal_code, $telephone, $email_id)
    // {
    //     $this->user_id = $user_id;
    //     $this->first_name = $first_name;
    //     $this->last_name = $last_name;
    //     $this->address = $address;
    //     $this->city = $city;
    //     $this->province_id = $province_id;
    //     $this->postal_code= $postal_code;
    //     $this->telephone = $telephone;
    //     $this->email_id = $email_id;
        
    // }
    
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function getCity()
    {
        return $this->city;
    }
    
    public function setProvinceId($province_id)
    {
        $this->province_id = $province_id;
    }
    public function getProvinceId()
    {
        return $this->province_id;
    }
    
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }
    public function getPostalCode()
    {
        return $this->postal_code;
    }
    
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    
    public function setEmailId($email_id)
    {
        $this->email_id = $email_id;
    }
    public function getEmailId()
    {
        return $this->email_id;
    }
    
    
    
}


class Tax
{
    private $tax_id;
    private $province_id;
    private $tax_rate;
    
 
    
    public function Tax($tax_id,$province_id,$tax_rate)
    {
        $this->tax_id = $tax_id;
        $this->province_id = $province_id;
        $this->tax_rate = $tax_rate;
    }
    
    
 
    
    public function setTaxId($tax_id)
    {
        $this->tax_id = $tax_id;
    }
    public function getTaxId()
    {
        return $this->this->tax_id;
    }
    
    public function setProvinceId($province_id)
    {
        $this->province_id = $province_id;
    }
    public function getProvinceId()
    {
        return $this->this->province_id;
    }
    
    public function setTaxRate($user_id)
    {
        $this->tax_rate = $tax_rate;
    }
    public function getTaxRate()
    {
        return $this->tax_rate;
    }
    
}

class OrderTopping
{
    private $ordertopping_id;
    private $order_id;
    private $topping_id;
    
    public function OrderTopping()
    {
        $this->ordertopping_id=$ordertopping_id;
        $this->order_id=$order_id;
        $this->topping_id=$topping_id;
    }
    
    public function setOrderToppingId($ordertopping_id)
    {
        $this->ordertopping_id = $ordertopping_id;
    }
    public function getOrderToppingId()
    {
        return $this->ordertopping_id;
    }
    
    public function setOrderId($ordertopping_id)
    {
        $this->order_id = $order_id;
    }
    public function getOrderId()
    {
        return $this->order_id;
    }
    
    public function setToppingId($topping_id)
    {
        $this->topping_id = $topping_id;
    }
    public function getToppingId()
    {
        return $this->topping_id;
    }
    
    
}

class Order
{
    private $order_id;
    private $user_id;
    private $crust_id;
    private $size_id;
    private $ordertopping_id;
    private $cost;
    private $date_ordered;
    private $number_of_pizzas;
    private $is_order_completed;
    private $tax_id;
    
    
    // public function Order($order_id, $user_id, $crust_id, $size_id, $ordertopping_id, $cost, $date_ordered, $number_of_pizzas, $is_order_completed, $tax_id)
    // {
    //     $this->order_id = $order_id;
    //     $this->user_id = $user_id;
    //     $this->crust_id = $crust_id;
    //     $this->size_id = $size_id;
    //     $this->ordertopping_id = $ordertopping_id;
    //     $this->cost = $cost;
    //     $this->date_ordered = $date_ordered;
        
        
        
    // }
    
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }
    public function getOrderId()
    {
        return $this->order_id;
    }
    
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    
    public function setCrustId($crust_id)
    {
        $this->crust_id = $crust_id;
    }
    public function getCrustId()
    {
        return $this->crust_id;
    }
    
    public function setSizeId($size_id)
    {
        $this->size_id = $size_id;
    }
    public function getSizeId()
    {
        return $this->size_id;
    }
    
    public function setOrderToppingId($ordertopping_id)
    {
        $this->ordertopping_id = $ordertopping_id;
    }
    public function getOrderToppingId()
    {
        return $this->ordertopping_id;
    }
    
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    public function getCost()
    {
        return $this->cost;
    }
    
    public function setTaxId($tax_id)
    {
        $this->tax_id = $tax_id;
    }
    public function getTaxId()
    {
        return $this->tax_id;
    }
    
    public function setDateOrdered($date_ordered)
    {
        $this->date_ordered = $date_ordered;
    }
    public function getDateOrdered()
    {
        return $this->date_ordered;
    }
    
    public function setNumberOfPizzas($number_of_pizzas)
    {
        $this->number_of_pizzas = $number_of_pizzas;
    }
    public function getNumberOfPizzas()
    {
        return $this->number_of_pizzas;
    }
    
    public function setIsOrderCompleted($is_order_completed)
    {
        $this->is_order_completed = $is_order_completed;
    }
    public function getIsOrderCompleted()
    {
        return $this->is_order_completed;
    }

    
    
    
    
}




?>