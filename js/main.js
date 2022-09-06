//پنل مدیریت
$(document).ready(function() {
    $('.admin-menu > ul > li.user').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-user").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.category').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-category").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.article').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-article").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.slider').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-slider").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.wiget').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-wiget").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.page').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-page").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});


$(document).ready(function() {
    $('.admin-menu > ul > li.sms').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-sms").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.email').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-email").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.phone_book').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-phone_book").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});

$(document).ready(function() {
    $('.admin-menu > ul > li.skyroom').click(function(){
        //$('ul.sub-admin',this).slideToggle();
        $("ul.sub-skyroom").slideToggle();
        //$(".admin-menu  ul  li > ul.sub-admin").slideToggle();
    });
});




$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:true
        },
        1000:{
            items:1,
            nav:true,
            loop:true
        }
    },
    navText:Array ('<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'),
    dots:true,
    autoplay:true,
});



