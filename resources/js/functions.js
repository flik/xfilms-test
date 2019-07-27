/**
 * js script 
 **/
 
function loadUrl(url){
	 params['formURL'] =  base_api_url+'films?page='+url;
	//alert( base_api_url+'films?page='+url);
	loadFilm(token, params);
}

function loadFilm(token, params){
		
	var dat = {token:token,data:params["postData"]};
	var objVal = '';
	var htmlStr = ''; 
	var i;
	if(params["postData"]){
		$('#ajaxLoader').show();
	}
	
	 $.get(params["formURL"], dat, function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			//One Film
			objVal = data['data']['films']['data'][0];
			strGenres = data['data']['films']['data']['genres'];
			
			Object.keys(objVal).forEach(function(k){ 
				
				   // console.log(k + ' - ' + objVal[k]); 
					htmlStr = '';
					htmlStr += '<img src="'+objVal['photo_url']+'" alt="'+objVal['name']+'" width="40%">';
					htmlStr += '<div class="caption">';
                    htmlStr += '<h3>'+objVal['name']+'</h3>';
					htmlStr += '<p>'+objVal['description']+' </p>';
					htmlStr += '<p><b>Release Date:</b> '+objVal['release_date']+'</p>';
					htmlStr += '<p><b>Rating:</b>'+objVal['rating']+'</p>';
					htmlStr += '<p><b>Ticket Price:</b> '+objVal['ticket_price']+'</p>';
					htmlStr += '<p><b>Country:</b> '+objVal['country']+'</p>';
					htmlStr += '<p><b>Genres:</b> ' +strGenres+''; 
                    htmlStr += '</p>';
                    htmlStr += '<p>';
                    htmlStr += '<a href="'+base_url+'films/'+objVal['slug']+'" class="btn btn-primary" role="button">Show</a>';
                    htmlStr += '<a href="'+base_url+'films/'+objVal['id']+'/edit" class="btn btn-default" role="button">Edit</a>';
                    htmlStr += '</p><form method="POST" action="'+base_url+'films/'+objVal['id']+'" accept-charset="UTF-8" onsubmit="return confirm(&quot;Are you sure ?&quot;)"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="Vt4Cvrb3e5R8DrmauN7YmPxC1SkYyuqqvWygNhf6">';
                    htmlStr += '<input class="btn btn-danger" type="submit" value="Delete">';
                    htmlStr += '</form>';
                    htmlStr += '<p></p>';
                    htmlStr += '</div>';
           });
          
           $('.filmData').html(htmlStr);
           // Film Pagination
			objVal = data['data']['films']; 
			
			Object.keys(objVal).forEach(function(k){
				htmlStr = '';
				htmlStr += '<ul class="pagination" role="navigation">';

				htmlStr += '<li class="page-item">';
				htmlStr += '	<a class="page-link" onclick="loadUrl(1)" href="#" rel="next" aria-label="">« First</a>';
				htmlStr += '</li>';
				 
				for (i = 1; i <= parseInt(objVal['total']); i++) { 
					if(objVal['current_page']==i) 
						htmlStr += '<li class="page-item active"><a class="page-link" onclick="loadUrl('+i+')" href="#" >'+i+'</a></li>';
					else
						htmlStr += '<li class="page-item "><a class="page-link" onclick="loadUrl('+i+')" href="#" >'+i+'</a></li>';
					
					
				}
				  
				htmlStr += '<li class="page-item">';
				htmlStr += '	<a class="page-link" onclick="loadUrl('+objVal['total']+')" rel="next" aria-label="Last »">Last »</a>';
				htmlStr += '</li>';
				htmlStr += '</ul>';
           });
           
         //Pagination Div
         $('#pages').html(htmlStr);

		}).done(function() {
			//alert( "second success" );
	   })
	   .fail(function() {
	  alert( "error" );
	   })
	   .always(function() {
		   // After finish
		$('#ajaxLoader').hide();
	   });
}

$("#logoutX").click(function () {
    localStorage.removeItem("token");
    localStorage.removeItem("UserDataStr");
    window.location = ".";
});
 

function postForm(token, params){
		
	var dat = {token:token,data:params["postData"]};
	 $.post(params["formURL"], dat, function(data, status){
			alert("Data: " + data + "\nStatus: " + status);
		}).done(function() {
	  alert( "second success" );
	   })
	   .fail(function() {
	  alert( "error" );
	   })
	   .always(function() {
	  alert( "finished" );
	   });
}


