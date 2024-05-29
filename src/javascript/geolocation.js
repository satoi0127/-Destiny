//const jquery370Min = require("./jquery-3.7.0.min");

function showCoordinate(pos){

    var lat = pos.coords.latitude;
    var lon = pos.coords.latitude;
    console.log("緯度 : "+lat+" 経度 : "+lon);

    $.ajax({
        url: "https://nominatim.openstreetmap.org/reverse?lat="+lat+"&lon="+lon+"&JSON",
        method:"GET",
        datatype:JSON,
        success : function(data){
            var out = JSON.parse(data);
            console.log(out);
        }
    });
}

if('geolocation' in navigator){
    console.log("Geolocation available");
    
    navigator.geolocation.getCurrentPosition(showCoordinate);
}else{
    console.log("Geolocation unavailable");
}