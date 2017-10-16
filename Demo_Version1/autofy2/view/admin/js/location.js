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

            for (var i = 0; i < $ar.length; i++)
            {
                $ar1 = $ar[i].split(":");
                $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
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

            for (var i = 0; i < $ar.length; i++)
            {
                $ar1 = $ar[i].split(":");
                $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
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

            for (var i = 0; i < $ar.length; i++)
            {
                $ar1 = $ar[i].split(":");
                $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
            }
            $('#find').html($str);

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

            for (var i = 0; i < $ar.length; i++)
            {
                $ar1 = $ar[i].split(":");
                $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
            }
            $('#find').html($str);

        }
    });
});




$('body').on('click', '#find', function () {

$find = $('#district_select').val();

alert($find);

    $.ajax({
        type: 'post',
        url: './find_places.php',
        data: {data:$find},
        success: function (response)

        {
$('#find_places').html(response);
        }
    });

});

$('body').on('click', '.standupdate', function () {
    
    alert($(this).data('leo'));
    
});