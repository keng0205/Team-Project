//validation
function validateChildForm(){
	if(document.form.cIC.value == "")
	{
		alert("Please fill in IC:\n(Mykid/ MyCard number).");
		document.form.cIC.focus();
		return false;
	}
	
	if(document.form.cIC.value.length < 12)
	{
		alert("Please check IC:\n(MyKid/ MyCard number must contain 12 digits).");
		document.form.cIC.focus();
		return false;
	}
	
	if(isNaN(document.form.cIC.value))
	{
		alert("Please check IC:\n(MyKid/ MyCard number must contain only numbers).");
		document.form.cIC.focus();
		return false;
	}
	
	if(document.form.cName.value == "")
	{
		alert("Please fill in the child's name.");
		document.form.cName.focus();
		return false;
	}
	
	return (true);
}