$(document).ready(function()
{
    // Get object of URL parameters
    // var allVars = $.getUrlVars();
    // Getting URL var by its nam
    var fwb_id = $.getUrlVar('fwb_id');
    

	// var fwb_id = localStorage["fwb_id"];

	$.post("./php/fwb_Main_Page.php",
	{
		fwb_id: fwb_id
		// url: "http://47.98.233.221"
	},
	function(data,status)
	{
		data = JSON.parse(Array(data));
		$("#rich_show").html(data[0].neirong);
        // var ue = UE.getEditor('editor');
        // UE.getEditor('editor').execCommand('insertHtml', data[0].neirong)
	});
})