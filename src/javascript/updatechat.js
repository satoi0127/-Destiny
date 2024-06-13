/*$(function(){
    console.log("jqueryが読み込まれました。");
    $("#sendbutton").on("click",function(){
        console.log("送信ボタンが押されました");
        $.ajax({
            type: 'POST',
            url: 'module/chat_insert.php',
            dataType: 'text',
            data: {message: $("#message").val(), chatroom_id: $("#chatroom_id").val(), user_id : $("#user_id").val()},
        }).done(function(data){
            $("#ajax").html(data);
            //console.log(data);
        });
    });

});
*/
function updatechat(){
    $.ajax({
        type: 'POST',
        url: '../modules/updatechat.php',
        dataType: 'text',
        data: {chatroom_id: $("#chatroom_id").val()},
    }).done(function(data){
        console.log("chat updated!");
        $("#ajax").html(data);
    });
}
setInterval(updatechat,500);