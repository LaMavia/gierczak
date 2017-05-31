//buttons' id
var nick = document.querySelector('.usr-mail');
var mail = document.querySelector('.mail-pass');
var pass = document.querySelector('.pass-check');

function events(){
    
    nick.addEventListener('click', scrollToMail, false);
    mail.addEventListener('click', scrollToPass, false);
    pass.addEventListener('click', scrollToCheck, false);
}

function scrollToMail(){
    var el = document.querySelector('#em');
    var offset = el.offsetLeft;
    window.scroll(offset , 0);
}
function scrollToPass(){
    var el = document.querySelector('#p');
    var offset = el.offsetLeft;
    window.scroll(offset , 0);
}
function scrollToCheck(){
    var el = document.querySelector('#ch');
    var offset = el.offsetLeft;
    window.scroll(offset , 0);
}

events();