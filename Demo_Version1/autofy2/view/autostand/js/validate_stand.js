
function validateEmail() {
    
    
    var x = document.getElementById("autostand_email").value;
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


function val_name()
{
    var a = document.getElementById("autostand_name").value;
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
