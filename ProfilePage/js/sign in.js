function usernameValidation() {
	var uName = document.getElementById("uname").value;
	var passWord = document.getElementById("psw").value;
	
	if(document.form.cust.checked){
		document.getElementById("uname").placeholder = "Enter email";
		if (uName == "")
		{
			alert("Please enter USERNAME!");
			return false;
		}
		else if (uName != "jacob.masombuka89@gmail.com")
		{
			alert("We do not have such a USERNAME!");
			return false;
		}
			else if (passWord == "")
		{
			alert("Please enter PASSWORD!");
			return false;
		}
		else if (passWord != "12345")
		{
			alert("Please enter the correct PASSWORD!");
			return false;
		}
		return true;
	}

	if (document.form.admin.checked == true)
	{
		document.getElementById("uname").placeholder = "Enter staff ID";
		if (uName == "")
		{
			alert("Please enter Staff ID!");	
			return false;
		}
		else if (uName != "1234")
		{
			alert("We do not have such USERNAME!");
			return false;
		}
		else if (passWord == "")
		{
			alert("Please enter PASSWORD!");
			return false;
		}
		else if (passWord != "12345")
		{
			alert("Please enter the correct PASSWORD!");
			return false;
		}
	return true;
	}
}

function checkButton(){
    if(document.form.cust.checked){
		alert("CUSTOMER is checked");
		document.getElementById("uname").placeholder = "Enter email";
	}
	else if(document.form.admin.checked ){
		alert("ADMINISTRATOR 2 is checked");
		document.getElementById("uname").placeholder = "Enter staff ID";		
	}	
}