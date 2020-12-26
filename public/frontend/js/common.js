// JavaScript Document
jQuery(function($){
	$.extend({
            "muserbox": function(){
			$("#userbox").find("a.close").click(function(e){
				e.preventDefault();
				$("#userbox").fadeOut("fast");
			});	 
		}
	});
	$.fn.extend({
		"mtab1": function(){
			this.each(function(index, element) {
                var jqthis = $(this);
				var tablits = jqthis.find(">a");
				tablits.on("mshow", function(){
					$($(this).data("tab")).addClass("in");
				}).on("mhide", function(){
					$($(this).data("tab")).removeClass("in");
				}).mouseenter(function(e) {
                    e.preventDefault();
					$(this).trigger("mshow").addClass("current").siblings().trigger("mhide").removeClass("current");
                }).filter(".current").mouseenter();
            });
			return this;
		},
		"mtab2": function(){
			this.each(function(index, element) {
                var jqthis = $(this);
				var tablits = jqthis.find(">a");
				tablits.on("mshow", function(){
					$($(this).attr("href")).addClass("in");
				}).on("mhide", function(){
					$($(this).attr("href")).removeClass("in");
				}).click(function(e) {
                    e.preventDefault();
					$(this).trigger("mshow").addClass("current").siblings().trigger("mhide").removeClass("current");
                }).filter(".current").click();
            });
			return this;
		},
		"mph": function(){
			this.each(function(index, element) {
                var jqthis = $(this);
				jqthis.css("overflow", "hidden");
				var height = jqthis.height();
				var minheight = jqthis.data("mh");
				var show = jqthis.data("show");
				if(show == "m")
					jqthis.css("height", minheight);
				jqthis.on("showm", function(){
					$(this).animate({height:minheight}, "fast");
				}).on("showa", function(){
					$(this).animate({height:height}, "fast");
				});
            });
			return this;
		},
		"mpha": function(target){
			this.each(function(index, element) {
                if(index > 0) return false;
				
				var jqthis = $(this);
				var showtext = jqthis.data("showtext");
				var hidetext = jqthis.data("hidetext");
				
				jqthis.click(function(e) {
                    e.preventDefault();
					var text = $(this).text();
					if(text == showtext){
						$(target).trigger("showa");
						$(this).text(hidetext);
					}else{
						$(target).trigger("showm");
						$(this).text(showtext);
					}
                });
            });
			return this;
		}
	});
	//run
	$.muserbox();
	$("[data-mid=mtab1]").mtab1();
	$("[data-mid=mtab2]").mtab2();
});