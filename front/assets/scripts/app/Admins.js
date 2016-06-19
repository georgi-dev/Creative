var Admins =
{
    login: function(params) {

    	var username = $("#un").val(),
    	password = $("#up").val();


    	$.getJSON(
    		"/admin/includes/receiver.php?req=login&user=" + username + "&password=" + password, 
    		function(response) { 
    			
    			console.log("ddd: " + response);
    			console.log("debaa");
    			if(response.success == true) { 
    				
    				window.location = "/admin/home"; 
    				
    			}
   		});
   	}
}    