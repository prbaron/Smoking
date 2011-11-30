/*
	smokings.js
	---------------------

	@file 		smoking-1.0.0.js
	@version 	1.0.0
	@date 		November 2011
	@url		http://prbaron.free.fr/smoking/js/smoking-1.0.0.js
	@author 	Pierre Baron <prbaron22@gmail.com>
	
	This work is licensed under a Creative Commons Attribution 3.0 Unported License.
*/

(function($){
	var form;
	var opt;
	
	$.smoking = function(el, opt){}
	
	var opt = {
		activeCheckbox : true,
		activeFile : true,
		activeRadio : true,
		activeSelect : true,
		fileButtonPosition : "left",
		fileButtonText : "Choose file",
		fileText : "No file Selected"
	};
	
	
	$.fn.smoking = function(options) {
		return this.each(function(){
			form = $(this);
	 		opt = $.extend({}, opt, options);
			
			init();
	 	});
	}
	
	/*
	*	Functions
	*/	
	function init(){
		if(opt.activeCheckbox) activeCheckbox();
		if(opt.activeRadio) activeRadio();
		if(opt.activeSelect) activeSelect();
		if(opt.activeFile) activeFile();
	}
	
	/**
	*	Create a new div to style Checkbox element
	*/
	function activeCheckbox(){
		form.find("input[type='checkbox']").each(function(){
			var input = $(this);

			var checkbox = createFalseDiv(input, "checkbox", input.attr("id"));
		
			checkbox.click(function(){
				if(!checkbox.hasClass("disabled")){
					checkbox.toggleClass("checked");
					input.attr("checked") == "checked" ?
						input.removeAttr("checked") :
						input.attr("checked", "checked");
				}
			});
		});
	}
	

	
	/**
	*	Create a new div to style Radio element
	*/
	function activeRadio(){		
		form.find("input[type='radio']").each(function(){
			var input = $(this);
			var radio = createFalseDiv(input, "radio", input.attr("id"));

			radio.click(function(){
				if(!radio.hasClass("disabled")){
					
					//we simulate a click event on the input
					input.trigger("click");
					radio.addClass("checked");
					
					// variables to keep important values
					var radio_name = input.attr("name");
					var radio_value = input.attr("value");
					
					$("input[type='radio'][name='"+radio_name+"']").each(function(){
						var elem = $(this);
						var elem_radio = elem.next(".skg-radio");
						// we have to remove the checked class to the other radio element
						if(elem_radio.hasClass("checked") && elem.attr("value") != radio_value){
							elem_radio.removeClass("checked");
						}
					});
				}	
			});
		});
	}
	
	
	/**
	*	Create a new div to style Select element
	*/
	function activeSelect(){
		form.find("select").each(function(){
			
			//we point on the selected input
			var input = $(this);
			var select = createFalseDiv(input, "select", input.attr("id"));
					
			//we add the button to open the select modal box
			$("<a href='#' class='skg-select-button'>").css("display", "block").appendTo(select).text(input.children("option:selected").text());
			//we point on the button
			var select_button = select.children("a.skg-select-button");
			
			$("<span class='skg-select-arrow'>").appendTo(select_button);
			
			select_button.click(function(e){
				input.trigger("focus");
				if(isMobile()){
					input.trigger("focus");
				}
				else{
					var options_count = 0;
					var width_max = select_button.outerWidth();
					
					//we create an hidden span to know the max width of all the options elements
					$("<span>").appendTo(select).hide();
					
					input.children("option").each(function(){
						select.children("span").text($(this).text());
						//we want to know the largest option
						if(select.children("span").outerWidth() > width_max)
							width_max = select.children("span").outerWidth()
						//we increment the number of options	
						options_count++;
					});
					//we delete our span
					select.children("span").remove();
					
					//we have to change the size attribute to close the modal box
					input.trigger("focus").attr("size", options_count).css({
						"opacity" : "1",
						"width": width_max + "px",
						"z-index" : "0"
					 });
				}
				e.preventDefault();
			});
			
			input.bind("click, change", function(){
				select_button.empty().text(input.children("option:selected").text());
				input.trigger("blur").attr("size", 1).css({
					"opacity" : "0",
					"width": select_button.width() + "px",
					"z-index" : "-1"
				});
				$("<span class='skg-select-arrow'>").appendTo(select_button);
			});	
		});
	} //function activeSelect()


	/**
	*	Create a new div to style File element
	*/
	function activeFile(){
		form.find("input[type='file']").each(function(){
			//we point on the selected input
			var input = $(this);

			var file = createFalseDiv(input, "file", input.attr("id"));
			
			//we add the disabled class if we are on a mobile
			if(isMobile()) file.addClass("disabled");
			
			var skg_file_button = $("<a href='#' class='skg-file-button'>").css("display", "inline-block").text(opt.fileButtonText).appendTo(file);
			var skg_file_text = $("<span class='skg-file-text'>").text(opt.fileText);
			
			//the file input is place behind the false file button
			input.css({
				"height" : skg_file_button.outerHeight() + "px",
				"width" : skg_file_button.outerWidth() + "px"
			});
			
			//we add the button and the text
			switch(opt.fileButtonPosition){
				case "left" : 
					skg_file_text.insertAfter(skg_file_button);
					break;
				
				case "right" : 
					skg_file_text.insertBefore(skg_file_button);
					break;
					
				case "top" : 
					skg_file_text.insertAfter(skg_file_button).before("<br/>");
					break;
					
				case "bottom" : 
					skg_file_text.insertBefore(skg_file_button).after("<br/>");
					break;		
			}
						
			//we simulate a click on the input when we click on the .skg-file-button
			file.children("a.skg-file-button").click(function(e){
				input.click();
				e.preventDefault();
			});
			
			//we show the new path
			input.change(function(){
				var array = input.val().split("\\");
				var info = array[array.length-1];
				file.children(".skg-file-text").empty().text(array[array.length-1]);
			});	
		});
	} // function activeFile()
	
	
	
	
	/**
	*	Create the elements associated to the differents inputs
	*/
	function createFalseDiv(input, typeElem, id){
		// hide the associated input
		input.css("opacity", "0");
		
		// create the div after the input
		$("<div class='skg-"+typeElem+"' >").insertAfter(input);
		// point to the div created
		var type = input.next(".skg-"+typeElem+"");	
			
		//add an id if defined on the associated input
		if(id !== undefined) type.attr("id", id+"Smoking");
		
		if(typeElem === "radio" || typeElem === "checkbox"){
			// style the new div
			type.css({
				"display" : "inline-block",
				"position" : "absolute",
				"left" : input.offset().left + "px",
				"top" : input.offset().top + "px"
			}).insertAfter(input);

			//test to add or remove classes
			if(input.attr("disabled") == "disabled"){
				type.removeClass("checked").addClass("disabled");
			}
			else if(input.attr("checked") == "checked"){
				type.addClass("checked");
			}
		}
		else if(typeElem === "select" || typeElem === "file"){
			//we style the input
			input.css({
				"margin-top" : type.outerHeight()/2 + "px",
				"position" : "absolute",
				"z-index" : "-1"
			});
			
			/**
			*	hack for Opera
			*	Opera does not allow to simulate click event on file element
			*/			
			if(isMobile() == "Opera" && typeElem == "file"){
				input.css({
					"z-index" : "1"
				});
			}	
		
		}
		
		//return the div created in this function
		return type;
	} //function createFalseDiv()

	
	/**
	*	Allow to know whether the device is a mobile
	*/
	function isMobile(){
		if(	(navigator.userAgent.match(/iPhone/i)) || 
			(navigator.userAgent.match(/iPad/i)) ||
			(navigator.userAgent.match(/iPod/i)) || 
			(navigator.userAgent.match(/Android/i)) || 
			(navigator.userAgent.match(/BlackBerry/i))){
				return true;
		}
		else if(navigator.userAgent.match(/Opera/i)){
			return "Opera";
		}
		else {
			return false;
		}	
	} //function isMobile()
	
})(jQuery);