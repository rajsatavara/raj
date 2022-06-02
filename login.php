<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sing Up</title>
<link rel="stylesheet" type="text/css" href="global.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script>
function validation()
{
	var x = document.forms["myForm"]["username"].value;
	if(x == null || x == "")
	{
	 	alert("pleas enter name");
        return false;
	}
	var x=document.forms["myForm"]["password"].value;
	if(x == null || x == "")
	{
		alert("please enter password");
		return false;
	}
	alert("succesfully login");
}

</script>
</head>
<body class="bg">
<form class="form"  name="myForm" onsubmit="return  validation()">
<h1>Login</h1>
<table>
	<tr>
		<td>Name:</td>
        <td><input type="text" placeholder="Name"   name="username" class="nm"></td>
	</tr>
    
    <tr>
    	<td>Password:</td>
        <td><input type="Password" placeholder="Password"  name="password"  class="nm"/></td>
    </tr>
    
    <tr>
    <td><input type="submit"  value="Submit" class="bt" /></td>
    <td><input type="submit"  value="Reset" class="re"/></td>
    </tr>
    
    
    <tr>
    <td>
    <ul>
    <li><a href="registration1.php">Registration</a></li></ul></td>
    </tr>
    
    
</table>
</form>
</body>
</html>