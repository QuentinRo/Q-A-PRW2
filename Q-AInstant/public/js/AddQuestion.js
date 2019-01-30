$(document).ready(function() {
    // adding row of input (answer) with the question number
    i=1;

    $("#add").click(function(){
        if (i <= 10)
        {
           $("#questionaire").last().clone().insertAfter("#questionaire").last();


            i++;
            $("#Qnumber").text(i);

            return false;

        }else
        {

        }
    });

});
