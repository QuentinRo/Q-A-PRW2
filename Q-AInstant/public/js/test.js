$(document).ready(function() {
    // adding row
    i=1;

    $("#add").click(function(){
        if (i <= 10)
        {
            $("#questionaire").last().clone().insertAfter("#questionaire").last();
            i++;
            $("#Qnumber").text(i);

            return false;
            console.log(test);
        }else
        {
            //show error message
        }
    });




});