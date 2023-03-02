$(document).ready(function()
{
    $("#docx_doc").ajaxForm(function (data) 
    {
      if (data.substring(0,5) == "http:")
      {
              $("#file_name").html("下载后请解压查看!");
              $("#download").attr("href", data);
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
