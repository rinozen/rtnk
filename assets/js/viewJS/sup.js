var baseUrl = $("body").data("url");

function validSave(){
	var ns   = $("#ns").val();
	var link = $("#ls").val();
	var el   = $("div.box[data-sup=\""+ns+"\"]").length;
	var x    = true;
	if (ns.trim()==""){
		$("#ns").focus().select();
		x = false;
	} else if (el>0){
		$("#ns").focus().select();
		x = false;
	} else if (link.trim()==""){
		$("#ls").focus().select();
		x = false;
	} else if (!isValidURL(link)){
		$("#ls").focus().select();
		x = false;
	}
	return x;
}
function isValidURL(u){
	var elm;
	if(!elm){
		elm = document.createElement('input');
		elm.setAttribute('type', 'url');
	}
	elm.value = u;
	return elm.validity.valid;
}
function save(){
	if (validSave()){
		showpass("saveSup()");
	}
}
function saveSup(){
	var xns   = $("#ns").val();
	var xlink = $("#ls").val();
	var xurl = baseUrl+"mst/sup/saveSup";
	$.ajax({
		type : "POST",
		url  : xurl,
		data : {ns:xns, ls:xlink}
	}).done(function(){		
		location.reload();
	});
}
$(window).on("beforeunload",function(){
	$("#ns").val("");
	$("#ls").val("");
});