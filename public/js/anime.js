$(function(){
$('body').hover(function () {

    $('.product_content #con1').hide();
    $('.product_content #con2').hide();
    $('.product_content #con3').hide();
    $('.product_content #con4').hide();
    $('.product_content #con5').hide();
    $('.product_content #con6').hide();

})



    $('#ima1').mouseenter(function () {
        $('.text1').hide("slow");
        $('.product_content #con1').show("slow");
        $('.product_content #con1').css('background-color','white');
        return false;


    })
    $('#poo').mouseleave(function () {
        $('.text1').show("slow");
        $('.product_content #con1').hide("slow");
    })



    $('#ima2').mouseenter(function () {
        $('.text2').hide();
        $('.product_content #con2').show("slow");
        $('.product_content #con2').css('background-color','white');
    })
    $('#paa').mouseleave(function () {
        $('.text2').show("slow");
        $('.product_content #con2').hide("slow");
    })


    $('#ima3').mouseenter(function () {
        $('.text3').hide();
        $('.product_content #con3').show("slow");
        $('.product_content #con3').css('background-color','white');
    })
    $('#pzz').mouseleave(function () {
        $('.text3').show("slow");
        $('.product_content #con3').hide("slow");
    })


    $('#ima4').mouseenter(function () {
        $('.text4').hide();
        $('.product_content #con4').show("slow");
        $('.product_content #con4').css('background-color','white');
    })
    $('#pee').mouseleave(function () {
        $('.text4').show("slow");
        $('.product_content #con4').hide("slow");
    })

    $('#ima5').mouseenter(function () {
        $('.text5').hide();
        $('.product_content #con5').show("slow");
        $('.product_content #con5').css('background-color','white');
    })
    $('#prr').mouseleave(function () {
        $('.text5').show("slow");
        $('.product_content #con5').hide("slow");
    })


    $('#ima6').mouseenter(function () {
        $('.text6').hide();
        $('.product_content #con6').show("slow");
        $('.product_content #con6').css('background-color','white');
    })
    $('#ptt').mouseleave(function () {
        $('.text6').show("slow");
        $('.product_content #con6').hide("slow");
    })









});
