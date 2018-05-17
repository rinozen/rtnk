$(".sidebar").on("mouseenter",".menu",function(){
	if (!$(this).hasClass("page") && !$(this).hasClass("aktif")){
		$(this).addClass("hover");
	}
});
$(".sidebar").on("mouseleave",".menu",function(){
	if (!$(this).hasClass("page") && !$(this).hasClass("aktif")){
		$(this).removeClass("hover");
	}
});
$(".sidebar").on("mouseenter",".submenu",function(){
	if (!$(this).hasClass("spage")){
		$(this).addClass("hover");
	}
});
$(".sidebar").on("mouseleave",".submenu",function(){
	if (!$(this).hasClass("page")){
		$(this).removeClass("hover");
	}
});
$(".sidebar").on("click",".menu",function(){
	if (!$(this).hasClass("page")){
		submenu = $(this).find(".submenu");
		if (submenu.length>0){
			if (submenu.is(":visible")){
				submenu.slideUp("fast");
				$(this).removeClass("aktif").addClass("hover");
			} else {
				$(".menu").each(function(){
					if (!$(this).hasClass("page")){
						$(this).find(".submenu").slideUp("fast");
						$(this).removeClass("aktif hover");
					}
				});
				submenu.slideDown("fast");
				$(this).removeClass("hover").addClass("aktif");
			}
		}
	}
});
$(".sidebar").on("click","a",function(){
	$(".loading").fadeIn("fast");
	var parent=$(this).parent();
	var child=$(this).children();
	if(parent.hasClass("menu")){
		if(!parent.hasClass("page")){
			parent.removeClass("hover aktif").addClass("page");
		} else {
			parent.find(".submenu").removeClass("spage");
		}
		if(!child.hasClass("spage")){
			child.removeClass("hover").addClass("spage");
		}
	} else {
		$(".sidebar .menu .submenu").removeClass("spage").slideUp("fast");
	}
});