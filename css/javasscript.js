function validateForm()
 {
 	
    var x = document.forms["myForm"]["fn"].value;
    if (x == "") {
        alert("Frist Name Is Empty");
        return false;
    }
    
    var y = document.forms["myForm"]["gfn"].value;
    if (y == "") {
        alert("Grand Father Name Is Empty");
        return false;
    }
    
    var xx = document.forms["myForm"]["mn"].value;
    if (xx == "") {
        alert("Father Name Is Empty");
        return false;
    }
    var un = document.forms["myForm"]["un"].value;
    if (un == "") {
        alert("un Is Empty");
        return false;
    } 
    
     var mb = document.forms["myForm"]["mb"].value;
if (mb == "") 
{
alert("Phone NumberIs Empty");
return false;
}
var str=document.forms["myForm"]["mb"].value;
var valid="0123456789+"; 
for(i=0;i<str.length;i++)
{
if(valid.indexOf(str.charAt(i))==-1)
{
alert("please insert phone_number number only number");
document.forms["myForm"]["mb"].value="";
document.forms["myForm"]["mb"].focus();
return false;
}
}
if(str.length!=10)
{
alert("please enter phone number 10  digit.");
document.forms["myForm"]["mb"].focus();
return false;
}  
if (str.charAt(0)!="0")
{
alert("phone number should be start with 0");
document.forms["myForm"]["mb"].focus();
return false;
} 
if (str.charAt(1)!="9")			   
{
alert("phone number should be start with 09");
document.forms["myForm"]["mb"].focus();
return false;
} 
   
    
var email = document.forms["myForm"]["email"].value;
if (email == "") 
{
alert("Email Is Empty");
return false;
}

}





var loadFile = function(event) 
		{
		var reader = new FileReader();
		reader.onload = function()
		{
		var output = document.getElementById('output');
		output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
		};
function ValidateAlpha(evt)
{
	var keyCode = (evt.which) ? evt.which : evt.keyCode
	if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32 &&  keyCode != 8  &&  keyCode != 9)
	{
	alert("please enter	Only letters! ")
	return false;
    }
}
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
           {
	        alert("please enter	Only Numbers! ")
	        return false;
          }
      }
      
      
      
  function validateuser()
 {
 	//empty validation
    var x = document.forms["myForm"]["un"].value;
    if (x == "")
     {
        alert("User Name Is Empty Please Enter");
        document.forms["myForm"]["un"].focus();
        return false;
    }
    
    var y = document.forms["myForm"]["pass"].value;
    if (y == "") 
    {
        alert("Password IS empty Please Enter");
        document.forms["myForm"]["pass"].focus();
        return false;
    }
    
//length validation
var pass=document.forms["myForm"]["pass"].value;
if(pass.length<=5)
{
 alert("Password Length IS Must Be Between 6 and 12 Character");
        document.forms["myForm"]["pass"].focus();
        return false;	
}
if(pass.length>12)
{
 alert("Password Length IS Must Be Between 6 and 12 Character");
        document.forms["myForm"]["pass"].focus();
        return false;	
}
  
}    
     
      
      
