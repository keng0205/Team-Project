//validation
function validateEditOH(){
	if(document.form.ohname.value == "")
	{
		alert("Please fill in the Orphanage Home name.");
		document.form.ohname.focus();
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
	
	if(document.form.pemail.value == "")
	{
		alert("Please fill in the Email Address.");
		document.form.pemail.focus();
		return false;
	}
	
	if(document.form.pphone1.value == "")
	{
		alert("Please fill in the contact number.");
		document.form.pphone1.focus();
		return false;
	}
	
	if(document.form.pphone2.value == "")
	{
		alert("Please fill in the contact number.");
		document.form.pphone2.focus();
		return false;
	}
	
	if(isNaN(document.form.pphone1.value)){
		alert("Invalid contact number.");
		document.form.pphone1.focus();
		return false;
	}
	
	if(isNaN(document.form.pphone2.value)){
		alert("Invalid contact number.");
		document.form.pphone2.focus();
		return false;
	}
	
	return (true);
}