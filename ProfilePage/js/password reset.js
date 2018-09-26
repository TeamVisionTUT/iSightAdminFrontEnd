function sendPassword()
{
	var email = document.getElementById("email").value;
	if (email == "")
	{
		alert("Please enter your EMAIL!");
		return false;
	}
	else if(email != "jacob.masombuka89@gmail.com")
		{
			alert("Sorry! EMAIL doesn't exist");
			return false;
		}
	else
	{
		var link = 'mailto:email@example.com?subject=Message from '
            +document.getElementById('email').value
            +'&body='+document.getElementById('email').value;
			window.location.href = link;
			alert("Your password have been sent to your email!");
	}
	return true;
}