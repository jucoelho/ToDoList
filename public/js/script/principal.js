$(document).ready(function () {

    var myLatLng = {
        lat: -19.977709,
        lng: -44.026712
    };
    var mapProp = {
        center: myLatLng,
        zoom: 19,
        mapTypeId: google.maps.MapTypeId.ROADMAP,

    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    var markers = [];
    showAllmarquers();
    $("#botao").click(function () {

        var iconBase = '{!! URL::to(' / ')!!}/imagens/';
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            

        });
        marker.addListener('dragend', function () {
            toggleBounce(marker);
        });
        markers.push(marker);
    });

    function showAllmarquers() {
        var form = new FormData();
        form.append("id_user", "user_id");
        form.append("lat", "lat");
        form.append("lng", "lng");
        var settings = {
            "url": 'markes/all',
            "method": "POST",

            "processData": false,
            "contentType": false,
            "datatype": "json",
            "mimeType": "multipart/form-data",
            "data": form
        }

        $.ajax(settings).done(function (response) {
            var  markers = [];
            
            
       var iconBase = '{!! URL::to(' / ')!!}../../imagens/';
           var obj =  JSON.parse(response); 
           console.log(obj);
            for (var i = 0;   i < obj.length -1; i++) {
                var myLatLng = {
                                    lat: Number(obj[i].lat),
                                    lng: Number(obj[i].lng)
                                };
            window.setTimeout(function() {
                markers.push(new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  animation: google.maps.Animation.DROP
                }));
              },  i * 200);  
            }
            

        }).fail(function (response) {
            console.warn(response);
            alert('ajax erro');
        });

    }

   
    function toggleBounce(marker) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        var userElement = $('#user-id'),
            user_id = userElement.val().trim(),
            url = userElement.data('url');

        var form = new FormData();
        form.append("id_user", user_id);
        form.append("lat", lat);
        form.append("lng", lng);
        var settings = {
            "url": url,
            "method": "POST",

            "processData": false,
            "contentType": false,
            "mimeType": "multipart/form-data",
            "data": form
        }

        $.ajax(settings).done(function (response) {
            console.log(response);
            $("#alterta").html("Vaga Registrada!");
            $("#alterta").show();
        }).fail(function (response) {
            console.warn(response);
        });

    }

    $(".marcaVeiculo").change(function () {
        var idMarca = $(this).val();
        $.get('getmodelos/' + idMarca, function (modelos) {
            $(".modelo").empty();
            $.each(modelos, function (Key, value) {
                $(".modelo").append('<option value = ' + value.id + '>' + value.descricao + '</option>');
            });
        });

    });

    $("#cadastrarVeiculo").click(function () {

        var userElement = $('#user-id'),
            user_id = userElement.val().trim(),
            url = 'veiculo/send',
            placa = $('#palcaVeiculo').val(),
            marca = $('#marcaVeiculo').val(),
            ano = $('#anoVeiculo').val(),
            modelo = $('#sel1').val();

        var form = new FormData();
        form.append("user_id", user_id);
        form.append("placa", placa);
        form.append("modelo_id", modelo);
        form.append("ano", ano);
        form.append("marca_id", marca);
        var settings = {
            "url": url,
            "method": "POST",

            "processData": false,
            "contentType": false,
            "mimeType": "multipart/form-data",
            "data": form
        }

        $.ajax(settings).done(function (response) {
            console.log(response);
            alert(response);
            $("#myModal").modal('hide');

        }).fail(function (response) {
            console.warn(response);
        });


    });

});
