$(document).ready(function() {
    // adding row
    $("#add").click(function(){
       $("#myform #questionaire:last").clone(true).insertAfter("#myform #questionaire:last");
       return false;
    });


});