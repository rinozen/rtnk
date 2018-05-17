var baseUrl = $("body").data("url");

function aplod(nb){	
	$("input[data-brg=\""+nb+"\"]").click();
}

$(".konten").on("click","img[data-brg]",function(){
	var nb = $(this).attr("data-brg");
	showpass("aplod(\""+nb+"\")");
});
$(".konten").on("change","input[data-brg]",function(){
	var nb = $(this).attr("data-brg");
	var fx = $(this).prop("files")[0];
	var fd = new FormData();
	fd.append("file",fx);
	fd.append("nb",nb);
	$.ajax({
		type        : "POST",
		url         : baseUrl+"mst/brg/aplod",
		data        : fd,
		contentType : false,
		cache       : false,
		processData : false,
		success: function(data){
			console.log(data);
		}
	}).done(function(){
		var d = new Date();
		$("img[data-brg='"+nb+"']").attr("src",baseUrl+"/assets/img/icon/"+nb+".jpg?"+d.getTime());
	});	
});