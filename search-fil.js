
	jQuery(function() {

		jQuery("input").on("input.highlight", function() {
		  // Determine specified search term
		  var searchTerm = jQuery(this).val();
		  // Highlight search term inside a specific context
		  jQuery(".container").unmark().mark(searchTerm);
		}).trigger("input.highlight").focus();

		// jQuery("body").keypress(function(e){
		// 	var key = e.which || e.keyCode;
	 //    	if(key === 13){ // 13 is enter
		// 		var elmnt = jQuery("mark");
		// 		var offset = elmnt.offset();
		// 		//var y = jQuery("body").scrollTop(offset.top);
		// 		var a = jQuery(this).next('mark').focus();
		// 		var y = jQuery("body").scrollTop(elmnt[3].offsetTop);
		// 		//console.log(a);
				
		// 	}
		
	 //    });

		jQuery("body").keypress(function(e){
			var key = e.which || e.keyCode;
			var dec = 0;
			if(key === 13){ 
				var elmnt = jQuery("mark");
				var offset = elmnt.offset();
				if(typeof(Storage) !== "undefined"){
					var nn = elmnt.length;
					if(localStorage.getItem("sear") && localStorage.getItem("sear") <= nn){
						if(localStorage.getItem("sear") == '0'){
							localStorage.setItem("sear", nn);
						}else{
							var apN = localStorage.getItem("sear");
							if(apN == nn){
								dec = '1';
							}else{
								dec = nn - apN;
							}
							if(dec == '0'){
								dec = '1';
							}
					    	var y = jQuery("body").scrollTop(elmnt[dec].offsetTop);
					    	var menos = apN-1;
					    	localStorage.setItem("sear", menos);
					    	console.log(dec);
				    	}
					}else{
						localStorage.setItem("sear", nn);	
					}
				}else{
				    alert('Desculpe, seu navegador não suporta.')
				}
			}
		});

	});
