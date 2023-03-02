function fetch_progress()
{
	$.get('progress.php',{"key":"file1"}, function(data)
	{
		$("#process_1").attr("style","width:"+data+"%;");
		$("#process_1").html(data+"%");
		//document.getElementById("percent").innerText = data+"%";
		//document.getElementById("percent").setAttribute("style","width:"+data+"%;");
		//document.getElementsByClassName("progress")[0].setAttribute("style","display: block;");
		if(data == 100)
		{
			const myModalE2 = document.getElementById('exampleModal_1');
            const modal = new mdb.Modal(myModalE2);
            modal.hide();
			return;
		}	
		else
		{
			setTimeout(fetch_progress,100);
		}
	});
}
$('#docx_doc').submit(function()
{
	setTimeout(fetch_progress,100);
});
