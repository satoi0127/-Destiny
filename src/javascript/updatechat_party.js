function updatechat_party(){
    $.ajax({
        type: 'POST',
        url: '../modules/updatechat_party.php',
        dataType: 'text',
        data: {party_id: $("#party_id").val()},
    }).done(function(data){
        console.log("chat updated!");
        $("#ajax").html(data);
    });
}
setInterval(updatechat_party,500);