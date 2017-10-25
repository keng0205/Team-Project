//validation
function selectRankingValidation(){
	if(selectRanking.year.value == "")
	{
		alert("Please fill in the year.");
		selectRanking.year.focus();
		return false;
	}
	
	if(selectRanking.category.value == "")
	{
		alert("Please choose a category.");
		selectRanking.category.focus();
		return false;
	}	
		
	return (true);
}

