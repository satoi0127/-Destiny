function updatechat(){
    $.ajax({
        type: 'POST',
        url: '../modules/updatechat.php',
        dataType: 'text',
        data: {chatmember_id: $("#chatmember_id").val()},
    }).done(function(data){
        console.log("chat updated!");
        $("#ajax").html(data);
    });
}
setInterval(updatechat,500);