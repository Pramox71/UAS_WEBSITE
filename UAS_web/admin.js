var tombolMenu = $(".tombol-menu");
var menu = $("nav .menu ul");

function klikMenu(){
    tombolMenu.click(function(){
        menu.toggle();
    });
    menu.click(function(){
        menu.toggle();
    });
}
$(document).ready(function(){
    var width = $(Window).width();
    if(width < 900){
        klikMenu();
    }
})