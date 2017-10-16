$('body').on('change', '#country_select', function () {

    $index = $('#country_select').val();



    $.ajax({
        type: 'post',
        url: './exec/data_get.php',
        data: {index: $index},
        success: function (response)

        {

            //console.log(response);
            $ar = response.split(",");
            $str = '<option value="-1" selected disabled hidden ></option>';

            if (response.trim() != "")
            {
                $ar = response.split(",");

                for (var i = 0; i < $ar.length; i++)
                {
                    $ar1 = $ar[i].split(":");
                    $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
                }

                $('#place_error').html("");
                $('#place_error').addClass("hide_error");
            } else {
                $('#place_error').html("*Select a valid place");
                $('#place_error').removeClass("hide_error");
            }


            $('#state_select').html($str);

        }
    });
});



$('body').on('change', '#state_select', function () {

    $selected_state = $('#state_select').val();



    $.ajax({
        type: 'post',
        url: './exec/data_get.php',
        data: {index1: $selected_state},
        success: function (response)

        {

            console.log(response);
            $ar = response.split(",");
            $str = '<option value="-1" selected disabled hidden ></option>';

            if (response.trim() != "")
            {
                $ar = response.split(",");


                for (var i = 0; i < $ar.length; i++)
                {
                    $ar1 = $ar[i].split(":");
                    $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
                }

             $('#place_error').html("");
                $('#place_error').addClass("hide_error");
            } else {
                $('#place_error').html("*Select a valid place");
                $('#place_error').removeClass("hide_error");
            }


            $('#district_select').html($str);

        }
    });
});





$('body').on('change', '#district_select', function () {

    $selected_district = $('#district_select').val();



    $.ajax({
        type: 'post',
        url: './exec/data_get.php',
        data: {index2: $selected_district},
        success: function (response)

        {

            console.log(response);
            $ar = response.split(",");
            $str = '<option value="-1" selected disabled hidden ></option>';

            if (response.trim() != "")
            {
                $ar = response.split(",");


                for (var i = 0; i < $ar.length; i++)
                {
                    $ar1 = $ar[i].split(":");
                    $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
                }

             $('#place_error').html("");
                $('#place_error').addClass("hide_error");
            } else {
                $('#place_error').html("*Select a valid place");
                $('#place_error').removeClass("hide_error");
            }

            $('#place_select').html($str);

        }
    });
});








$('body').on('change', '#place_select', function () {

    $selected_place = $('#place_select').val();



    $.ajax({
        type: 'post',
        url: './exec/data_get.php',
        data: {index3: $selected_place},
        success: function (response)

        {

            console.log(response);
            $ar = response.split(",");
            $str = '<option value="-1" selected disabled hidden ></option>';

            if (response.trim() != "")
            {
                $ar = response.split(",");

                for (var i = 0; i < $ar.length; i++)
                {
                    $ar1 = $ar[i].split(":");
                    $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
                }

             $('#place_error').html("");
                $('#place_error').addClass("hide_error");
            } else {
                $('#place_error').html("*Select a valid place");
                $('#place_error').removeClass("hide_error");
            }

            $('#find').html($str);

        }
    });
});




$('body').on('click', '#find', function () {

    $find = $('#place_select').val();

    alert($find);

    $.ajax({
        type: 'post',
        url: './auto_stands.php',
        data: {data: $find},
        success: function (response)

        {
            $('#find_autostand').html(response);
        }
    });

});










$('body').on('click', '.sendlocid', function () {


    $phone = $(this).data('phone');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);

    } else {
        x = "Geolocation is not supported by this browser.";
    }

});

$phone = "";

function showPosition(position) {
    x = +position.coords.latitude;

    y = +position.coords.longitude;

    $latitude = x;
    $longitude = y;

    //  $phone=($(this).data('phone'));

    $.ajax({
        type: 'post',
        url: './geoexec.php',
        data: {lat1: $latitude, long2: $longitude, phone: $phone},
        success: function (response)

        {
            alert(response);
            $('#send_loc').val(response);
        }
    });

}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            x = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x = "An unknown error occurred."
            break;
    }
}


