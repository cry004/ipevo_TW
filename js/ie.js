/* for IE Social Share Hover Bug */
$(function(){
	
	$(".share_prod").removeClass("share_prod").addClass("share_prod_IE");
	
	$(".share_prod_IE").hover(
		function(){
			$(this).find(".inside").css({"width":"130px","overflow":"visible"});
			$(this).find(".outside").hide();			
		},
		function(){
			$(this).find(".inside").css({"width":"48px","overflow":"hidden"});
			$(this).find(".outside").show();			
		}
	);

});
