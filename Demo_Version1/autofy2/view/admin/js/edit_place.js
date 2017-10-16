$('body').on('click', '#add', function () {

    $district_selected = $('#district_select').val();
    $add_place = $('#add_place').val();

    alert($add_place);
    

    $.ajax({
        type: 'post',
        url: 'exec/edit_place.php',
        data: {district: $district_selected, place: $add_place},
        success: function (response)
        {

        }
    });
});

$('body').on('change', '#country_select', function () {

    $selected_country = $('#country_select').val();

alert($selected_country);

    $.ajax({
        type: 'post',
        url: './exec/edit_place.php',
        data: {index1: $selected_country},
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
            $('#state_select').html($str);

        }
    });
});


$('body').on('change', '#state_select', function () {

    $selected_state = $('#state_select').val();

alert($selected_state);

    $.ajax({
        type: 'post',
        url: './exec/edit_place.php',
        data: {index11: $selected_state},
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




$('body').on('change', '#country_edit_select', function () {

    $selected_country = $('#country_edit_select').val();

alert($selected_country);

    $.ajax({
        type: 'post',
        url: './exec/edit_place.php',
        data: {index2: $selected_country},
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
            $('#state_edit_select').html($str);

        }
    });
});


$('body').on('change', '#state_edit_select', function () {

    $selected_state = $('#state_edit_select').val();

alert($selected_state);

    $.ajax({
        type: 'post',
        url: './exec/edit_place.php',
        data: {index3: $selected_state},
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
            $('#district_edit_select').html($str);

        }
    });
});


$('body').on('change', '#district_edit_select', function () {

    $selected_district = $('#district_edit_select').val();

alert($selected_district);

    $.ajax({
        type: 'post',
        url: './exec/edit_place.php',
        data: {index4: $selected_district},
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
            $('#place_edit_select').html($str);

        }
    });
});


$('body').on('click', '#btnedit', function () {



    $temp = $('#place_edit_select').val();
 
    $place = $('#textedit').val();
    
    alert($temp);


    $.ajax({
        type: 'post',
        url: 'exec/edit_place.php',
        data: {temp1:$temp,edit_place: $place},
        success: function (response)
        {
alert(response);
        }

    });





});

$('body').on('click','#btndelete',function(){
   
   $temp = $('#place_edit_select').val();
  
  
  
   $.ajax({
        type: 'post',
        url: 'exec/edit_place.php',
        data: {temp2:$temp},
        success: function (response)
        {

        }
   });
});
