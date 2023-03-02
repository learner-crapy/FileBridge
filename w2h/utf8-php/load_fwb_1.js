$(document).ready(function()
{
    var activity_id=localStorage["activity_id_rep"];
    // window.localStorage.removeItem('activity_id_detail')  //清除
	// $(function () { $("[data-toggle='tooltip']").tooltip(); });// 激活tip工具
	// var username = localStorage["username"];
	$.post("../../PHP/Activity_detail.php",
	{
		activity_id: activity_id
		// url: "http://47.98.233.221"
	},
	function(data,status)
	{
		data = JSON.parse(Array(data));
		// $("#activity_detail_show").html(data[0].fwb_info);
        // var ue = UE.getEditor('editor');
        UE.getEditor('editor').execCommand('insertHtml', data[0].fwb_info)
	});
})