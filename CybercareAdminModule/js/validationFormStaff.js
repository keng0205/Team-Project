//validation
function validateFormStaff(){
	if(document.form.username.value == "")
	{
		alert("Please fill in the username.");
		document.form.username.focus();
		return false;
	}
	
	if(document.form.name.value == "")
	{
		alert("Please fill in name.");
		document.form.name.focus();
		return false;
	}
	
	
	if(document.form.spassword.value == "")
	{
		alert("Please fill in the password.");
		document.form.spassword.focus();
		return false;
	}
	
	if(document.form.rspassword.value == "")
	{
		alert("Please re-type the password.");
		document.form.rspassword.focus();
		return false;
	}
	
	if(document.form.spassword.value.length < 6)
	{
		alert("Password must be atleast 6 characters.");
		document.form.spassword.focus();
		return false;
	}
	
	
	if(document.form.spassword.value != document.form.rspassword.value)
	{
		alert("Passwords do not match. Please re-enter password.");
		document.form.spassword.value = "";
		document.form.rspassword.value = "";
		return false;
	}
	

	
	if(document.form.total.value==0){	
		alert("Please choose atleast ONE right.");
		return false;
	}	
	
	
		
	return (true);
}

