let lat = 0.0;
let lon = 0.0;
let location_data = new Array();

function getCoordinate(pos){
    lat = pos.coords.latitude;
    lon = pos.coords.longitude;
    console.log("緯度 : "+lat+" 経度 : "+lon);
    $("#latitude").html(lat);
    $("#longitude").html(lon);
}

$(function(){
    console.log("jqueryが読み込まれました。");

    $("#updatelocation").click(function(){
        
        console.log("位置情報更新ボタンが押されました");

        navigator.geolocation.getCurrentPosition(getCoordinate);
        
        
        $.ajax({
            type: 'POST',
            url: '../modules/updatelocation.php',
            dataType: 'text',
            data: {latitude: lat, longitude: lon, user_id : $("#user_id").val()},
        }).done(function(data){
            location_data = data.split('|');
            console.log("php execution successful "+data);
        });
        
        console.log("test");
    });

});