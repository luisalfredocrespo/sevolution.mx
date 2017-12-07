var QueryLoader = {
	/*
	 * QueryLoader		Preload your site before displaying it!
	 * Author:			Gaya Kessler
	 * Date:			23-09-09
	 * URL:				http://www.gayadesign.com
	 * Version:			1.0
	 * 
	 * A simple jQuery powered preloader to load every image on the page and in the CSS
	 * before displaying the page to the user.
	 */
	
	overlay: "",
	loadBar: "",
	preloader: "",
	items: new Array(),
	doneStatus: 0,
	doneNow: 0,
	selectorPreload: "body",
	ieLoadFixTime: 2000,
	ieTimeout: "",
		
	init: function() {
		if (navigator.userAgent.match(/MSIE (\d+(?:\.\d+)+(?:b\d*)?)/) == "MSIE 6.0,6.0") {
			//break if IE6			
			return false;
		}
		if (QueryLoader.selectorPreload == "body") {
			QueryLoader.spawnLoader();
			QueryLoader.getImages(QueryLoader.selectorPreload);
			QueryLoader.createPreloading();
		} else {
			$(document).ready(function() {
				QueryLoader.spawnLoader();
				QueryLoader.getImages(QueryLoader.selectorPreload);
				QueryLoader.createPreloading();
			});
		}
		
		//help IE drown if it is trying to die :)
		QueryLoader.ieTimeout = setTimeout("QueryLoader.ieLoadFix()", QueryLoader.ieLoadFixTime);
	},
	
	ieLoadFix: function() {
		var ie = navigator.userAgent.match(/MSIE (\d+(?:\.\d+)+(?:b\d*)?)/);
		/*if (ie[0].match("MSIE")) {
			while ((100 / QueryLoader.doneStatus) * QueryLoader.doneNow < 100) {
				QueryLoader.imgCallback();
			}
		}*/
	},
	
	imgCallback: function() {
		QueryLoader.doneNow ++;
		QueryLoader.animateLoader();
	},
	
	getImages: function(selector) {
		var everything = $(selector).find("*:not(script)").each(function() {
			var url = "";
			
			if ($(this).css("background-image") != "none") {
				var url = $(this).css("background-image");
			} 
			
			url = url.replace("url(\"", "");
			url = url.replace("url(", "");
			url = url.replace("\")", "");
			url = url.replace(")", "");
			
			if (url.length > 0) {
				QueryLoader.items.push(url);
			}
		});
	},
	
	createPreloading: function() {
		QueryLoader.preloader = $("<div></div>").appendTo(QueryLoader.selectorPreload);
		jQuery(QueryLoader.preloader).css({
			height: 	"0px",
			width:		"0px",
			overflow:	"hidden"
		});
		
		var length = QueryLoader.items.length; 
		QueryLoader.doneStatus = length;
		
		for (var i = 0; i < length; i++) {
			var imgLoad = $("<img></img>");
			jQuery(imgLoad).attr("src", QueryLoader.items[i]);
			jQuery(imgLoad).unbind("load");
			jQuery(imgLoad).bind("load", function() {
				QueryLoader.imgCallback();
			});
			jQuery(imgLoad).appendTo(jQuery(QueryLoader.preloader));
		}
	},

	spawnLoader: function() {
		if (QueryLoader.selectorPreload == "body") {
			var height = $(window).height();
			var width = $(window).width();
			var position = "fixed";
		} else {
			var height = $(QueryLoader.selectorPreload).outerHeight();
			var width = $(QueryLoader.selectorPreload).outerWidth();
			var position = "absolute";
		}
		var left = $(QueryLoader.selectorPreload).offset()['left'];
		var top = $(QueryLoader.selectorPreload).offset()['top'];
		
		QueryLoader.overlay = $("<div></div>").appendTo($(QueryLoader.selectorPreload));
		jQuery(QueryLoader.overlay).addClass("QOverlay");
		jQuery(QueryLoader.overlay).css({
			position: position,
			top: top,
			left: left,
			width: width + "px",
			height: height + "px"
		});
		
		QueryLoader.loadBar = $("<div></div>").appendTo($(QueryLoader.overlay));
		jQuery(QueryLoader.loadBar).addClass("QLoader");
		
		jQuery(QueryLoader.loadBar).css({
			position: "relative",
			top: "50%",
			width: "0%"
		});
	},
	
	animateLoader: function() {
		var perc = (100 / QueryLoader.doneStatus) * QueryLoader.doneNow;
		if (perc > 99) {
			jQuery(QueryLoader.loadBar).stop().animate({
				width: perc + "%"
			}, 500, "linear", function() { 
				QueryLoader.doneLoad();
			});
		} else {
			jQuery(QueryLoader.loadBar).stop().animate({
				width: perc + "%"
			}, 500, "linear", function() { });
		}
	},
	
	doneLoad: function() {
		//prevent IE from calling the fix
		clearTimeout(QueryLoader.ieTimeout);
		
		//determine the height of the preloader for the effect
		if (QueryLoader.selectorPreload == "body") {
			var height = jQuery(window).height();
		} else {
			var height = jQuery(QueryLoader.selectorPreload).outerHeight();
		}
		
		//The end animation, adjust to your likings
		jQuery(QueryLoader.loadBar).animate({
			height: height + "px",
			top: 0
		}, 500, "linear", function() {
			jQuery(QueryLoader.overlay).fadeOut(800);
			jQuery(QueryLoader.preloader).remove();
		});
	}
}