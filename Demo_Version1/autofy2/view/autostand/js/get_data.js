$('body').on('change', '#country_select', function () {

    $index = $('#country_select').val();



    $.ajax({
        type: 'post',
        url: './exec/get_data.php',
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
        url: './exec/get_data.php',
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
        url: './exec/get_data.php',
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
            $('#place_select').html($str);

        }
    });
});


$('body').on('change', '#place_select', function () {

    $selected_place = $('#place_select').val();


    $.ajax({
        type: 'post',
        url: './exec/get_data.php',
        data: {index3: $selected_place},
        success: function (response)

        {

            console.log(response);
            $str = '<option value="-1" selected disabled hidden ></option>';
            if (response.trim() != "")
            {
                $ar = response.split(",");

                for (var i = 0; i < $ar.length; i++)
                {
                    $ar1 = $ar[i].split(":");
                    $str += '<option value="' + $ar1[0] + '">' + $ar1[1] + "</option>";
                }
            }
            else{
                alert('no data');
            }
            $('#autostand_select').html($str);

        }
    });
});












































