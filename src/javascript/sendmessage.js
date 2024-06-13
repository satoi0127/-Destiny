$(function(){
    console.log("jqueryが読み込まれました。");

    $("#sendbutton").on("click",function(){
        console.log("送信ボタンが押されました");
        $.ajax({
            type: 'POST',
            url: '../modules/chat_insert.php',
            dataType: 'text',
            data: {message: $("#message").val(), chatroom_id: $("#chatroom_id").val(), user_id : $("#user_id").val()},
        }).done(function(data){
            $("#message").val("");
            //console.log(data);
        });
    });

});