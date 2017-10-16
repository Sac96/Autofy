$('body').on('click', '#btnedit', function () {


    $temp = $('#country_select').val();
 
    $country = $('#textedit').val();
    
    

    $.ajax({
        type: 'post',
        url: 'exec/editcountry.php',
        data: {temp1:$temp,index1: $country},
        success: function (response)
        {
alert(response);
        }

    });

});

$('body').on('click','#btndelete',function(){
   
   $temp = $('#country_select').val();
  
  
  
   $.ajax({
        type: 'post',
        url: 'exec/editcountry.php',
        data: {temp2:$temp},
        success: function (response)
        {

        }
   });
});
