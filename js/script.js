/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validateForm()
{


    var errorString = "";
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
   	var address = document.getElementById("address").value;
    var city = document.getElementById("city").value;
    var province = document.getElementById("province").value;
    var postalcode = document.getElementById("pcode").value;
    var telephone = document.getElementById("telephone").value;
    var email = document.getElementById("email").value;
    var noOfPizzas = document.getElementById("numberofpizza").value;
    

   
   
    
    if (fname == null || fname == "") {
        errorString = errorString + "First Name must be filled out \n";
       
        
    }
    if (fname != null)
    {
           
        var filter5=/^[a-zA-Z ]{2,30}$/;
        var pattern5 = new RegExp(filter5);
        if (!pattern5.test(fname))
        {
           errorString = errorString + "Please input a valid First name \n";
        }

    }
    
    
    
    if (lname == null || lname == "") {
        errorString = errorString + "Last Name must be filled out \n";
        
    }
    if (lname != null)
    {
           
        var filter6=/^[a-zA-Z ]{2,30}$/;
        var pattern6 = new RegExp(filter6);
        if (!pattern6.test(lname))
        {
           errorString = errorString + "Please input a valid Last name \n";
        }

    }
    
    if (address == null || address == "") {
        errorString = errorString + "Address must be filled out \n";
        
    }
      
    if (city == null || city == "") {
        errorString = errorString + "City must be filled out \n";
        
    }
 	if (city != null)
    {
           
        var filter4=/^[a-zA-Z ]{2,30}$/;
        var pattern4 = new RegExp(filter4);
        if (!pattern4.test(city))
        {
           errorString = errorString + "Please input a valid City name \n";
        }
    

    }
    // if (province == null || province == "") {
    //     errorString = errorString + "Province must be filled out \n";
        
    // }
   
    if (postalcode == null || postalcode == "") {
        errorString = errorString + "Postal Code must be filled out \n";
        
    }
    if (postalcode != null)
    {
           
        var filter1=/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z]?[0-9][A-Z][0-9]$/;
        var pattern1 = new RegExp(filter1);
        if (!pattern1.test(postalcode))
        {
          errorString = errorString + "Please input a valid Postal Code \n";
        }

    }
    if (telephone == null || telephone == "") {
        errorString = errorString + "Telephone must be filled out \n";
        
    }
  if (telephone != null)
    {
           
        var filter2=/\d{3}-\d{3}-\d{4}|\d{10}/;
        var pattern2 = new RegExp(filter2);
        if (!pattern2.test(telephone))
        {
          errorString = errorString + "Please input a valid Telephone \n";
        }

    }
    
    if (email == null || email == "") {
        errorString = errorString + "Email must be filled out \n";
        
    }
    
    
    if (email != null)
    {
           
        var filter3=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var pattern3 = new RegExp(filter3);
        if (!pattern3.test(email))
        {
          errorString = errorString + "Please input a valid email address! \n";
        }

    }
    
   
   
    if (noOfPizzas == null || noOfPizzas == "") {
        errorString = errorString + "Number of Pizzas must be filled out \n";
        
    }
    if (noOfPizzas != null)
    {
           
        var filter7=/^[0-9]+$/;
        var pattern7 = new RegExp(filter7);
        if (!pattern7.test(noOfPizzas))
        {
          errorString = errorString + "Please input a valid Number \n";
        }

    }
   

   
var size = document.getElementsByName("size");
var flag = false;
    for (var i = 0; i < size.length; i++) {
        if(size[i].checked === true)
        {
                  flag = true;
           
        }
                
    }
    
    if(flag==false)
    {
        errorString =  errorString + "No size selected \n";
    }
    
    
var crust = document.getElementsByName("crust");
var flag1 = false;
    for (i = 0; i < crust.length; i++) {
        if(crust[i].checked === true)
        {
                  flag1 = true;
           
        }
                
    }
    
    if(flag1==false)
    {
        errorString =  errorString + "No crust selected \n";
    }
 
    errorString.trim();
    
   
    
    
    
    if(errorString.length>0)
    {
        alert (errorString);
        return false;
    }
    else
    {
        return true;
    }
 
}

