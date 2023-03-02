$(document).ready(function()
{
    $.post("./php/fwb_all_page.php",
    {
        dir_type: '1'
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
            var button_td_id3 = "bt3"+index_i;
            var button_td_id4 = "bt4"+index_i;
            var tr_id = "sanzi_tr_id"+index_i;
            var td3_id = "td3_id"+index_i;
            var a1_id = "a1_id"+index_i;
            var a2_id = "a2_id"+index_i;


            var tr0 = document.createElement("TR");
            var th1 = document.createElement("TH");
            var td1 = document.createElement("TD");
            var td2 = document.createElement("TD");
            var td3 = document.createElement("TD");

            var button1 = document.createElement("BUTTON");
            var button2 = document.createElement("BUTTON");
            var button3 = document.createElement("BUTTON");
            var button4 = document.createElement("BUTTON");
            var i1 = document.createElement("I");
            var i2 = document.createElement("I");
            var i3 = document.createElement("I");
            var i4 = document.createElement("I");
            var a1 = document.createElement("A");
            var a2 = document.createElement("A");


            tr0.id = tr_id;
            td3.id=td3_id;
            a1.id = a1_id;
            a2.id = a2_id;

            th1.setAttribute("scope", "row");

            button1.id = button_td_id1;
            button2.id = button_td_id2;
            button3.id = button_td_id3;
            button4.id = button_td_id4;


            button1.setAttribute("type", "button");
            button1.setAttribute("data-ripple-color", "dark");
            button1.classList.add("btn");
            button1.classList.add("btn-info");
            button1.classList.add("btn-sm");
            button1.classList.add("px-3");
            button1.classList.add("download_1");
            a1.setAttribute("href", "https://just-do-it.vip/w2h/HtmlDownload/rich_show.zip")

            button2.setAttribute("type", "button");
            button2.setAttribute("data-ripple-color", "dark");
            button2.classList.add("btn");
            button2.classList.add("btn-danger");
            button2.classList.add("btn-sm");
            button2.classList.add("px-3");
            button2.classList.add("delete_1");

            button3.setAttribute("type", "button");
            button3.setAttribute("data-ripple-color", "dark");
            button3.classList.add("btn");
            button3.classList.add("btn-info");
            button3.classList.add("btn-sm");
            button3.classList.add("px-3");
            button3.classList.add("edit_1");
            // a2.setAttribute("href", "./utf8-php/update.html")
            button4.setAttribute("type", "button");
            button4.setAttribute("data-ripple-color", "dark");
            button4.classList.add("btn");
            button4.classList.add("btn-success");
            button4.classList.add("btn-sm");
            button4.classList.add("px-3");
            button4.classList.add("show_1");
             
            th1.innerHTML = data[i].fwb_id;
            td1.innerHTML = data[i].title;
            td2.innerHTML = data[i].fwb_time;

            i1.classList.add("fas");
            i1.classList.add("fa-cloud-download-alt");

            i2.classList.add("fas");
            i2.classList.add("fa-trash-alt");

            i3.classList.add("fas");
            i3.classList.add("fa-highlighter");

            i4.classList.add("fas");
            i4.classList.add("fa-eye");
            var tr_id_app = "#"+tr_id;
            var td3_id_app = "#"+td3_id;
            var button1_td_id_app = "#"+button_td_id1;
            var button2_td_id_app = "#"+button_td_id2;
            var button3_td_id_app = "#"+button_td_id3;
            var button4_td_id_app = "#"+button_td_id4;
            var a1_app = "#"+a1_id;
            var a2_app = "#"+a2_id;
            $("#multiple_file").append(tr0);
            $(tr_id_app).append(th1);
            $(tr_id_app).append(td1);
            $(tr_id_app).append(td2);
            $(tr_id_app).append(td3);

            $(td3_id_app).append(button4);
            $(td3_id_app).append(button3);
            // $(td3_id_app).append(button1);
            $(td3_id_app).append(button2);
            
            
            $(button3_td_id_app).append(a2);
            $(a2_app).append(i3);
            $(button1_td_id_app).append(a1);
            $(a1_app).append(i1);

            $(button2_td_id_app).append(i2);
			$(button4_td_id_app).append(i4);
		}
		$(".delete_1").click(function()
		{
			var fwb_id = $(this).parent().siblings()[0].innerHTML;
            $.post("./php/fwb_info_delete.php",
            {
                fwb_id: fwb_id
            },
            function(data,status)
            {
                // alert(data);
                window.location.reload();
                // data = JSON.parse(Array(data));
            });
		});

        $(".edit_1").click(function()
		{
			var fwb_id = $(this).parent().siblings()[0].innerHTML;
            if (window.localStorage) {
                //存储变量的值
               localStorage.fwb_id = fwb_id;
               location.href = './utf8-php/update.html';
           }

		});

        $(".show_1").click(function()
		{
			var fwb_id = $(this).parent().siblings()[0].innerHTML;
            if (window.localStorage) {
                //存储变量的值
               localStorage.fwb_id = fwb_id;
               location.href = './rich_show.html?fwb_id='+fwb_id;
           }

		});

        // $(".download_1").click(function()
		// {
		// 	var fwb_id = $(this).parent().siblings()[0].innerHTML;
        //     $.post("./php/save_html.php",
        //     {
        //         fwb_id: fwb_id
        //     },
        //     function(data,status)
        //     {
        //         alert(data);
        //         window.location.reload();
        //         // data = JSON.parse(Array(data));
        //     });

		// });
	});
})