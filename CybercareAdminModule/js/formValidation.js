function deadlineValidation(){
	var form=this.form;
	
	if(form.category.value == null)
	{
		alert("Please choose a category.");
		document.form.category.focus();
		return false;
	}
	
}