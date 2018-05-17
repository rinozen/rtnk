var baseUrl = $("body").data("url");

function validSave(){
	var x = true;
	if ($("#tgl").val().trim()==""){
		$("#dp").focus();
		x = false;
	} else if ($("#buyer").val().trim()==""){
		$("#buyer").focus();
		x = false;
	} else if ($("#kurir").prop('selectedIndex')<0){
		$("#kurir").focus();
		x = false;
	} else if ($("#ongkir").val().trim()==""){
		$("#ongkir").focus();
		x = false;
	} else if ($("tr[data-tr]").length==0){
		$("#cbrg").focus();
		x = false;
	}
	return x;
}
function validAdd(){
	var x = true	
	if ($("#xnb").html().trim()==0){
		$("#cbrg").focus();
		x = false;
	} else if ($("#xmodal").prop('selectedIndex')<0){
		$("#xmodal").focus();
		x = false;
	} else if ($("#xharga").val().trim()==0){
		$("#xharga").focus();
		x = false;
	} else if ($("#xqty").val().trim()==0){
		$("#xqty").focus();
		x = false;
	}
	return x;
}
function saveJual(){
	var xurl    = baseUrl+"trx/tx/saveJual";
	var xtgl    = $("#tgl").val();
	var xmedia  = $("#media").val();
	var xbuyer  = $("#buyer").val();
	var xkurir  = $("#kurir").val();
	var xongkir = $("#ongkir").val();
	var xdtil   = [];
	$("tr[data-tr]").each(function(){
		var xnb   = $(this).attr("data-tr");
		var xmod  = $(this).attr("data-mod");
		var xjual = $(this).attr("data-jual");
		var xqty  = $(this).attr("data-qty");
		xdtil.push({
			nb   : xnb,
			mod  : xmod,
			jual : xjual,
			qty  : xqty
		});
	}).promise().done(function(){
		$.ajax({
			type : "POST",
			url  : xurl,
			data : {
				tgl    : xtgl,
				media  : xmedia,
				buyer  : xbuyer,
				kurir  : xkurir,
				ongkir : xongkir,
				dtil   : JSON.stringify(xdtil)
			}
		}).done(function(){
			location.reload();
		});
	});
}
function inputResi(x){
	$("#input").clone().appendTo(x);
	var id    = x.data("id");
	var i     = x.find("i");
	var input = x.find("input");
	i.removeAttr("class").addClass("fas fa-barcode fa-fw");
	input.removeAttr("class id placeholder type").attr({
		"data-id"     : id,
		"class"       : "iresi",
		"placeholder" : "Masukkan Nomor Resi"
	});
}
function setResi(xid,xresi){
	var xurl = baseUrl+"trx/tx/setResi";
	$.ajax({
		type : "POST",
		url  : xurl,
		data : {id:xid, resi:xresi}
	}).done(function(){
		$("[data-resi][data-id='"+xid+"']").html(xresi);
		$(".stat[data-id='"+xid+"']").html("Shipping (Set Selesai Jual)").removeAttr("data-stat").attr("data-stat","Shipping (Set Selesai Jual)");
	});
}
function setSelesai(xid){
	var xurl = baseUrl+"trx/tx/setSelesai";
	$.ajax({
		type : "POST",
		url  : xurl,
		data : {id:xid}
	}).done(function(){
		$(".stat[data-id='"+xid+"']").html("Selesai").removeAttr("data-stat").attr("data-stat","Selesai");
	});
}
function setLsbrg(){
	var pos = $("#cbrg").parent().offset();
	$("#lsbrg").offset({
		top   : pos.top+$("#cbrg").parent().outerHeight()+1,
		left  : pos.left
	}).css("min-width",$("#cbrg").parent().outerWidth()).hide();
}
function setBrg(x){
	var xurl = baseUrl+"trx/tx/getModal";
	var xnb  = x.data("nb");
	$("#cbrg").val("");
	$.ajax({
		type       : "POST",
		url        : xurl,
		data       : {nb: xnb},
		dataType   : "json",
		beforeSend : function(){
			$("#xmodal").empty();	
		}
	}).done(function(data){
		for (var i = 0; i < data.length; i++) {
			$("<option/>").attr("value", data[i].modal).text(data[i].xmod).appendTo("#xmodal");
		}
		$("#xnb").html(xnb);
		$("#xharga").val("");
		$("#xqty").val("");
		$("#xmodal").focus();
	});
}
function showLsbrg(cbrg){
	var xnb = cbrg.val();
	if (xnb.trim()!=""){
		var icon = cbrg.parent().find("i");
		var xurl = baseUrl+"trx/tx/lsbrg";
		$.ajax({
			type       : "POST",
			url        : xurl,
			data       : {nb: xnb},
			dataType   : "json",
			beforeSend : function(){
				icon.removeClass("fa-search").addClass("fa-spinner fa-spin");
			},
			success    : function(data){
				$("#lsbrg").empty();
				for (var i = 0; i < data.length; i++) {
					var li  = $("<li></li>");
					li.text(data[i].nama_brg);
					var img = $("<img>",{
						src : baseUrl+"assets/img/icon/"+data[i].nama_brg+".jpg"
					}).prependTo(li);
					li.attr("data-nb",data[i].nama_brg);
					li.appendTo("#lsbrg");
				}
			}
		}).done(function(){
			if ($("#lsbrg li").length>0){
				$("li[data-nb]").first().addClass("sHover");
				$("#lsbrg").slideDown("fast");
			} else {
				$("#lsbrg").slideUp("fast");
			}				
			icon.removeClass("fa-spinner fa-spin").addClass("fa-search");
		});	
	} else {
		$("#lsbrg").empty().slideUp("fast");
	}
}
function sum(){
	var jmod  = 0;
	var jml   = 0;
	var jlaba = 0;
	$("tr[data-tr]").each(function(){
		jmod  = jmod+parseFloat($(this).attr("data-jmod"));
		jml   = jml+parseFloat($(this).attr("data-jml"));
		jlaba = jlaba+parseFloat($(this).attr("data-laba"));
	});
	$("th.r.jmod").html(jmod.formatMoney(2,".",","));
	$("th.r.jml").html(jml.formatMoney(2,".",","));
	$("th.r.jlaba").html(jlaba.formatMoney(2,".",","));
}
$(".konten").on("mouseenter","li[data-nb]",function(e){
	$("li[data-nb]").each(function(){
		$(this).removeClass("sHover");
	});
	$(this).addClass("sHover");
});
$(".konten").on("click","li[data-nb]",function(){
	setBrg($(this));
});
$(".konten").on("click","#btn-add",function(){
	if (!validAdd()){
		return;
	}
	var xnb    = $("#xnb").html();
	var url    = baseUrl+"assets/img/icon/"+xnb+".jpg";
	var xmodal = parseFloat($("#xmodal").val());
	var xharga = parseFloat($("#xharga").val());
	var xqty   = parseFloat($("#xqty").val());
	var jmod   = xmodal*xqty;
	var jml    = xharga*xqty;
	var laba   = (xharga-xmodal)*xqty;
	var x      = $(".tempTR tr").clone();
	var aya    = false;
	if ($("tr[data-tr='"+xnb+"']").length>0){
		x=$("tr[data-tr='"+xnb+"']");
		aya = true; 
	}
	x.attr("data-tr",xnb);
	x.attr("data-mod",xmodal);
	x.attr("data-jual",xharga);
	x.attr("data-qty",xqty);
	x.attr("data-jmod",jmod);
	x.attr("data-jml",jml);
	x.attr("data-laba",laba);
	x.find("td:eq(0) img").attr("src",url);
	x.find("td:eq(1)").html(xnb);
	x.find("td:eq(2)").html(xmodal.formatMoney(2,".",","));
	x.find("td:eq(3)").html(xharga.formatMoney(2,".",","));
	x.find("td:eq(4)").html(xqty);
	x.find("td:eq(5)").html(jmod.formatMoney(2,".",","));
	x.find("td:eq(6)").html(jml.formatMoney(2,".",","));
	x.find("td:eq(7)").html(laba.formatMoney(2,".",","));
	if (!aya){
		x.insertBefore("#sum");
	}
	$("#xnb").html("");
	$("#xmodal").empty();
	$("#xharga").val("");
	$("#xqty").val("");
	sum();
	$("#cbrg").focus();
});
$(".konten").on("click","tr[data-tr] td.btn-del",function(){
	$(this).parents("tr").remove();
	sum();
});
$(".konten").on("click","#btn-save",function(){
	if (!validSave()){
		return;
	}
	showpass("saveJual()");
});
$(".konten").on("keydown",".iresi",function(e){
	if (e.keyCode==13){
		var id   = $(this).data("id");
		var resi = $(this).val();
		if (resi.trim()!=""){
			showpass("setResi('"+id+"','"+resi+"')");
		}
	}
});
$(".konten").on("keyup","#cbrg",function(e){
	key = [13, 37,38,39,40];
	if ($.inArray(e.keyCode, key)<0){
		showLsbrg($(this));
	} else {
		if ($("li[data-nb]").length>0){
			if (e.keyCode==40){
				var x=$("li[data-nb].sHover");
				if(x.next("li[data-nb]").length>0){
					x.removeClass("sHover");
					x.next("li[data-nb]").addClass("sHover");					
				}
			} else if (e.keyCode==38){
				var x=$("li[data-nb].sHover");
				if(x.prev("li[data-nb]").length>0){
					x.removeClass("sHover");
					x.prev("li[data-nb]").addClass("sHover");					
				}
			} else if (e.keyCode==13){
				setBrg($("li[data-nb].sHover"));
			}
		}
	}
});
$(".konten").on("focus","#cbrg",function(){
	showLsbrg($(this));
});
$(".konten").on("blur","#cbrg",function(){
	$("#lsbrg").slideUp("fast");	
});
$(".konten").on("change","#dp",function(){
	if ($(this).val().length<8){
		$("#tgl").val("");
	}
});
$(document).on("click","[data-stat='Packing (Masukkan Nomor Resi)']",function(){
	var id = $(this).data("id");
	$(".iresi[data-id='"+id+"'").focus();
});
$(document).on("click","[data-stat='Shipping (Set Selesai Jual)']",function(){
	var id = $(this).data("id");
	showpass("setSelesai('"+id+"')");
});
$(document).ready(function(){
	$("[data-resi='']").each(function(){
		inputResi($(this));		
	});
	$("#dp").datepicker({
		altField    : "#tgl",
		altFormat   : "yy-mm-dd",
		changeYear  : true,
		changeMonth : true,
		duration    : "fast"
	});
	$("#dp").datepicker("option","dateFormat","dd-mm-y");
	$("#dp").datepicker("option","showAnim","slide");	
	setLsbrg();
});
$(window).on("beforeunload",function(){
	$(".loading").fadeIn("fast");
	$("#tgl").val("");
	$("#dp").val("");
	$("#media").val("Tokopedia");
	$("#buyer").val("");
	$("#kurir").val("");
	$("#ongkir").val("");
	$("#cbrg").val("");
	$("#xnb").html("");
	$("#xmodal").empty();
	$("#xharga").val("");
	$("#xqty").val("");
});