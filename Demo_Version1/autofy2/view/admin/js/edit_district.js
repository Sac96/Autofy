$('body').on('click', '#add', function () {

    $state_selected = $('#state_select').val();
    $add_district = $('#add_district').val();

    alert($state_selected);
    

    $.ajax({
        type: 'post',
        url: 'exec/edit_district.php',
        data: {state: $state_selected, district: $add_district},
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
        url: './exec/edit_district.php',
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


$('body').on('change', '#country_edit_select', function () {

    $selected_country = $('#country_edit_select').val();

alert($selected_country);

    $.ajax({
        type: 'post',
        url: './exec/edit_district.php',
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
        url: './exec/edit_district.php',
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





$('body').on('click', '#btnedit', function () {



    $temp = $('#district_edit_select').val();
 
    $district = $('#textedit').val();
    
    alert($temp);


    $.ajax({
        type: 'post',
        url: 'exec/edit_district.php',
        data: {temp1:$temp,edit_district: $district},
        success: function (response)
        {
alert(response);
        }

    });





});

$('body').on('click','#btndelete',function(){
   
   $temp = $('#district_edit_select').val();
  
  
  
   $.ajax({
        type: 'post',
        url: 'exec/edit_district.php',
        data: {temp2:$temp},
        success: function (response)
        {

        }
   });
});
