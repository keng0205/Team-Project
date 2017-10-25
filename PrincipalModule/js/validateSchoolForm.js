//validation
function validateSchoolForm(){
	if(document.form.schoolname.value == "")
	{
		alert("Please fill in School name.");
		document.form.schoolname.focus();
		return false;
	}
	
	if(document.form.schoolContact.value == "")
	{
		alert("Please fill in School contact.");
		document.form.schoolContact.focus();
		return false;
	}
	
	if(document.form.schoolAdd1.value == "")
	{
		alert("Please fill in Address line 1.");
		document.form.schoolAdd1.focus();
		return false;
	}
	
	if(document.form.schoolPostcode.value == "")
	{
		alert("Please fill in the post code.");
		document.form.schoolPostcode.focus();
		return false;
	}
	
	if(document.form.schoolState.value == "none")
	{
		alert("Please choose the school's state.");
		document.form.schoolState.focus();
		return false;
	}
	
	if(document.form.schoolCity.value == "")
	{
		alert("Please fill in the city of the school.");
		document.form.schoolCity.focus();
		return false;
	}
	
	return (true);
}