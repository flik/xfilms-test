var src = ('https:' == document.location.protocol ? 'https' : 'http'); 
var base_api_url, base_url, fileuploaderPath, dataStr, token, data, params, action_area, action_live;

//remote settings 
 
 
//Local settings 
base_api_url = src + '://localhost/xfilms-test/api/v1/'; 
base_url = src + '://localhost/xfilms-test/'; 
  
 dataStr = localStorage.getItem("dataStr"); 
 token = localStorage.getItem("token"); 
 data = JSON.parse(dataStr); 
$('#ajaxLoader').hide();
params = new Array(); 
params["loader"] = 1; 
params["Method"] = "GET"; 
params["postData"] = '';
params['formURL'] = base_api_url + 'films';
