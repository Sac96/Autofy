$('body').on('click', '#add', function () {

    $country_selected = $('#country_select').val();
    $add_state = $('#add_state').val();

    alert($add_state);
    

    $.ajax({
        type: 'post',
        url: 'exec/edit_state.php',
        data: {country: $country_selected, state: $add_state},
        success: function (response)
        {

        }
    });
});

$('body').on('change', '#country_edit_select', function () {

    $select_state = $('#country_edit_select').val();

alert($select_state);

    $.ajax({
        type: 'post',
        url: './exec/edit_state.php',
        data: {index1: $select_state},
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

$('body').on('click', '#btnedit', function () {



    $temp = $('#state_select').val();
 
    $state = $('#textedit').val();
    
    alert($temp);


    $.ajax({
        type: 'post',
        url: 'exec/edit_state.php',
        data: {temp1:$temp,edit_state: $state},
        success: function (response)
        {
alert(response);
        }

    });



});

$('body').on('click','#btndelete',function(){
   
   $temp = $('#state_select').val();
  
  
  
   $.ajax({
        type: 'post',
        url: 'exec/edit_state.php',
        data: {temp2:$temp},
        success: function (response)
        {

        }
   });
});
