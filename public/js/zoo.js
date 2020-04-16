$(function(){
$('.view').magnificPopup({
    type: 'image',
    gallery :{
        enabled: true
    },
});


    $("#myBtn").click(function(){
        $("#myModal").modal();
    });


});
