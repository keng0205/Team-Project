//validation
function validateForm(){
	if(document.form.ohname.value == "")
	{
		alert("Please fill in the Orphanage Home name.");
		document.form.ohname.focus();
		return false;
	}
	
	if(document.form.pemail.value == "")
	{
		alert("Please fill in the Email Address.");
		document.form.pemail.focus();
		return false;
	}
	
	if(document.form.ppassword.value == "")
	{
		alert("Please fill in the password.");
		document.form.ppassword.focus();
		return false;
	}
	
	if(document.form.ppassword.value.length < 6)
	{
		alert("Password must have atleast 6 characters.");
		document.form.ppassword.focus();
		return false;
	}
	
	
	if(document.form.ppassword.value != document.form.repassword.value)
	{
		alert("Passwords do not match. Please re-enter password.");
		document.form.ppassword.value = "";
		document.form.repassword.value = "";
		return false;
	}
	
	if(document.form.ohadd1.value == "")
	{
		alert("Please fill in Address line 1.");
		document.form.ohadd1.focus();
		return false;
	}
	
	if(document.form.ohpostcode.value == "")
	{
		alert("Please fill in the post code.");
		document.form.ohpostcode.focus();
		return false;
	}
	
	if(document.form.state.value == "none")
	{
		alert("Please choose the orphanage home's state.");
		document.form.state.focus();
		return false;
	}
	
	if(document.form.ohcity.value == "")
	{
		alert("Please fill in the city of the Orphanage Home.");
		document.form.ohcity.focus();
		return false;
	}
	
	if(document.form.pname.value == "")
	{
		alert("Please fill in the Principal's name.");
		document.form.pname.focus();
		return false;
	}
	
	if(document.form.pic.value == "")
	{
		alert("Please fill in the Principal's IC.");
		document.form.pic.focus();
		return false;
	}
	
	if(document.form.pic.value.length < 12)
	{
		alert("IC number must have 12 characters.");
		document.form.pic.focus();
		return false;
	}
	
	if(document.form.pphone.value == "")
	{
		alert("Please fill in the contact number.");
		document.form.pphone.focus();
		return false;
	}
	
	return (true);
}