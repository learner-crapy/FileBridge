$(document).ready(function()
{
    $("#docx_doc").ajaxForm(function (data) {
		if (data.replace("bool(true)\n", "").substring(0,5) == "http:")
		{
            $("#file_name").html("下载后请解压查看!");
            $("#download").attr("href", data.replace("bool(true)\n", ""));
            const myModalEl = document.getElementById('staticBackdrop');
            const modal = new mdb.Modal(myModalEl);
            modal.show();
		}
		else
		{
			alert(data);
			window.location.reload();
		}
    });
});
