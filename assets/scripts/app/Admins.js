var Admins =
{
    login: function() {
//console.log(params);
    	 var url = "/admin/includes/receiver.php?req=login";
        url += "&username=" + encodeURIComponent($("#username").val());
        url += "&password=" + encodeURIComponent($("#password").val());
        //console.log(mainUrl + "admin/" + url);

    	$.getJSON(
    		url, function(response) { 
    			
    			console.log(response);
    			if(response.success == true) { 
    				 alert("You successfully logged in");
    				 window.location = "home"; 
    				//console.log("reddirect");
    			} else {
                   alert("Invalid username or password");    
                }
   		});
         
   	}
}    