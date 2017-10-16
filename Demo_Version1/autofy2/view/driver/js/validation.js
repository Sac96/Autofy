



function validateEmail() {
    
    
    var x = document.getElementById("driver_email").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {

        $('#vemail').html("*Not a valid e-mail address");
        $('#vemail').removeClass("hide_error");
        return false;
    } else {
        $('#vemail').html("");
        $('#vemail').addClass("hide_error");
        return true;
    }
}




function CheckPassword()
{
    var passd = document.getElementById("password").value;
    var passw = /^[A-Za-z]\w{7,14}$/;
    if (passd.length > 8)
    {
        $('#vpassword').html("");
        $('#vpassword').addClass("hide_error");
        return true;
    } else
    {
        $('#vpassword').html("*Atleast 8 characters should be added");
        $('#vpassword').removeClass("hide_error");
        return false;
    }
}


function reg_num()
{
    var reg_numb = document.getElementById("reg_number").value;
    var check = /^[A-Z]{1,2}\s[0-9]{1,2}\s([A-Z]{1,2})?(\s)?[0-9]{1,4}$/



    if (check.test(reg_numb))
    {
        $('#vrnum').html("");
        $('#vrnum').addClass("hide_error");
        return true;

    } else {

        $('#vrnum').html("*Enter a valid Registration Number");
        $('#vrnum').removeClass("hide_error");
        return false;
    }
}

function val_name()
{
    var a = document.getElementById("driver_name").value;
    var alph= /^[a-zA-Z]*(\s)?[a-zA-Z]*$/
    if (a == "")
    {

        $('#vname').html("*Please enter your name");
        $('#vname').removeClass("hide_error");
        return false;
    }
    else if (!isNaN(a))
    {

        $('#vname').html("*Enter Only Characters");
        $('#vname').removeClass("hide_error");
        //   $('#vmob').removeClass("show_error");

        return false;
    }
    else if (alph.test(a)){
        $('#vname').html("");
        $('#vname').addClass("hide_error");
        return true;
        
    }
    else{
        $('#vname').html("*Enter a valid name");
        $('#vname').removeClass("hide_error");
        return false;
    }
    
}




function mob_num()
{

    var phn = document.getElementById("driver_mob").value;

    if ((phn.length != 13)) {
        $('#vmob').html("*Enter a valid mobile number");
        $('#vmob').removeClass("hide_error");
        //   $('#vmob').removeClass("show_error");
        return false;



    } else if ((isNaN(phn))) {
        alert("The phone number contains illegal characters.");
        return false;

    } else {
        $('#vmob').html("");
        $('#vmob').addClass("hide_error");
        return true;
    }
}





