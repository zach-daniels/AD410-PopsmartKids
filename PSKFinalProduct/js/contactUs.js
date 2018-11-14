

$(document).ready(function(){

    $("#comment_form").show();
    $("#testimonial_form").hide();

    $("#comment_button").click(function(){
        $("#comment_form").show();
        $("#testimonial_form").hide();
    });

    $("#testimonial_button").click(function(){
        $("#testimonial_form").show();
        $("#comment_form").hide();
    });

});
