var baseUrl = $("body").data("url");

function setTerima(xid, xterima){
	var xbea = $(".ibea[data-id='"+xid+"']").val();
	if (xterima==0){
		$(".ibea[data-id='"+xid+"']").val("0");
		xbea = 0;
	}
	$.ajax({
		type : "POST",
		url  : baseUrl+"trx/rx/setTerima",
		data : {id : xid, bea : xbea, terima : xterima}
	}).done(function(){
		location.reload();
	});
}
function setAksi(){
	$("td[data-stat]").each(function(){
		var id = $(this).data("id");
		if ($(this).data("stat")=="Received"){
			$("td.btn-set[data-id='"+id+"']").html("");
		} else {
			var div   = $("<div id='input'/>")
			var i     = $("<i class='fas fa-calculator fa-fw'/>")
			var input = $("<input class='ibea angka' data-id='"+id+"' placeholder='Bea Tertanggung'/>")
			div.append(i).append(input);
			$("td.bea[data-id='"+id+"']").html(div);
		}
	});
}
$(".konten").on("click",".terima",function(){
	var id  = $(this).parent().data("id");
	var bea = $(".ibea[data-id='"+id+"']");
	if (bea.val().trim()==""){
		bea.focus();
	} else {
		showpass("setTerima('"+id+"',1)");
	}
});
$(".konten").on("click",".tidak-terima",function(){
	var id  = $(this).parent().data("id");
	showpass("setTerima('"+id+"',0)");
});
$(".konten").on("click","td[data-stat='Shipping (Set Received)']",function(){
	$(".ibea[data-id='"+$(this).data("id")+"']").focus();
});
$(document).ready(function(){
	setAksi();
});