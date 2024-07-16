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
    });
});

function getName(){
    $.ajax({
        url: "https://nominatim.openstreetmap.org/reverse?lat="+lat+"&lon="+lon+"&JSON",
        method:"GET",
        datatype:JSON,
        async:false,
        success : function(data){
            let suburb = $(data).find('suburb').text();
            let prov = $(data).find('province').text();
            let city = $(data).find('city').text();
            let country = $(data).find('country').text();

            $("#place_name").html(suburb+prov+city+country);

            $.ajax({
                type: 'POST',
                url: '../modules/updatelocation.php',
                dataType: 'text',
                data: {country: country, city: city, province:prov, suburb: suburb, user_id : $("#user_id").val(),lon : lon,lat : lat},
            }).done(function(data){
                console.log("php execution successful "+data);
            });
            console.log(country);

            $("#ajax").load(location.href+" #ajax*>","");
        }
    });
}

setInterval(getName, 2000);