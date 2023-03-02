$(document).ready(function()
{
    $.post("./get_dir_info.php",
    {
        dir_type: 0
    },
	function(data,status)
    {
        // alert(data.length);
        data = JSON.parse(Array(data));
        for (var i=0;i<data.length;i++)
        {
            var index_i = ""+i;
            var button_td_id1 = "bt1"+index_i;
            var button_td_id2 = "bt2"+index_i;
            var tr_id = "sanzi_tr_id"+index_i;
            var td3_id = "td3_id"+index_i;
            var a1_id = "a1_id"+index_i;
    
    
            var tr0 = document.createElement("TR");
            var th1 = document.createElement("TH");
            var td1 = document.createElement("TD");
            var td2 = document.createElement("TD");
            var td3 = document.createElement("TD");
    
            var button1 = document.createElement("BUTTON");
            var button2 = document.createElement("BUTTON");
            var i1 = document.createElement("I");
            var i2 = document.createElement("I");
            var a1 = document.createElement("A");
    
            tr0.id = tr_id;
            td3.id=td3_id;
            a1.id = a1_id;
    
            th1.setAttribute("scope", "row");
            i1.classList.add("fas");
    
            button1.id = button_td_id1;
            button2.id = button_td_id2;
    
    
            button1.setAttribute("type", "button");
            button1.setAttribute("data-ripple-color", "dark");
            button1.classList.add("btn");
            button1.classList.add("btn-info");
            button1.classList.add("btn-sm");
            button1.classList.add("px-3");
            button1.classList.add("download_1");
            a1.setAttribute("href", "https://just-do-it.vip/w2h/"+data[i].dir.replace("./", ""));
    
            button2.setAttribute("type", "button");
            button2.setAttribute("data-ripple-color", "dark");
            button2.classList.add("btn");
            button2.classList.add("btn-danger");
            button2.classList.add("btn-sm");
            button2.classList.add("px-3");
            button2.classList.add("delete_1");
    
            th1.innerHTML = ""+(i+1);
            td1.innerHTML = data[i].dir.replace("./upload/", "");
            td2.innerHTML = data[i].time;
    
            i1.classList.add("fas");
            i1.classList.add("fa-cloud-download-alt");
    
            i2.classList.add("fas");
            i2.classList.add("fa-trash-alt");
            
            var tr_id_app = "#"+tr_id;
            var td3_id_app = "#"+td3_id;
            var button1_td_id_app = "#"+button_td_id1;
            var button2_td_id_app = "#"+button_td_id2;
            var a1_app = "#"+a1_id;
            $("#multiple_file").append(tr0);
            $(tr_id_app).append(th1);
            $(tr_id_app).append(td1);
            $(tr_id_app).append(td2);
            $(tr_id_app).append(td3);
    
            $(td3_id_app).append(button1);
            $(td3_id_app).append(button2);
    
            $(button1_td_id_app).append(a1);
            $(a1_app).append(i1);
            $(button2_td_id_app).append(i2);
           
       }
		$(".delete_1").click(function()
		{
			var dir = $(this).parent().siblings()[1].innerHTML;
			//alert(dir);
            $.post("./delete_dir.php",
            {
                dir: "./upload/"+dir
            },
            function(data,status)
            {
                //alert(data);
                window.location.reload();
                // data = JSON.parse(Array(data));
            });
		});
	});
})
