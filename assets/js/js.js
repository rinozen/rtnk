function showpass(funcx){
	var pass = $("#pass");
	pass.val("");
	pass.data("funcx",funcx);
	$(".password").css("display","flex").fadeIn("fast");
	pass.focus();
}
$(document).on("keydown","#pass",function(e){
	if (e.keyCode==13){
		if ($(this).val()!="3437"){
			$(".salah").slideDown("fast");
			$(this).select();
		} else {
			var funcx = $(this).data("funcx");
			var tmpFunc = new Function(funcx);
			tmpFunc();
			$(".password").fadeOut("fast");
		}
	} else {
		$(".salah").slideUp("fast");
	}
});
$(document).keydown(function(e){
	if (e.keyCode==27){
		if ($(".password").is(":visible")){
			$(".password").fadeOut("fast");
		} else if ($(".overlay").is(":visible")){
			$(".overlay").fadeOut("fast");
		}
	}
});
$(document).on("click",".close",function(){
	if ($(".password").is(":visible")){
		$(".password").fadeOut("fast");
	} else if ($(".overlay").is(":visible")){
		$(".overlay").fadeOut("fast");
	}
});
$(document).on("click","#input",function(){
	$(this).find("input").focus();
});
$(document).on("focus","#input input",function(){
	$(this).parent().addClass("hover");	
});
$(document).on("blur","#input input",function(){
	$(this).parent().removeClass("hover");	
});
$(document).ready(function(){
	$(".loading").fadeOut("slow");
	$(".konten").focus();
});
$(window).unload(function(){
	$(".loading").fadeOut("slow");	
});