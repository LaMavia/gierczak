
$(document).ready(function(){

//block enter key
var arrow_keys_handler = function(e) {
    switch(e.keyCode){ 
        case 17: e.preventDefault(); break;
        case 83: e.preventDefault() , shopShowHid(); break;
        case 65: e.preventDefault() , saving(); break;
        case 77: e.preventDefault() , toggleMedia(); break;
        default: break; // do not block other keys
    }
};
    window.addEventListener("keydown", arrow_keys_handler, false);

    function toggleMedia(){
        $('div.media__container').fadeToggle(500);
    }


var n1 = 1;
var n2 = 90;
var numberToGuess = Math.round(Math.random() * (n2 - n1) + n1);

var points = 0;
var multi = 1;
var pps = 0;

//vars for shop
var pointsForRange = 20;
var pointsForPps = 60;
//end
var hintOutput = $('div.hint');
function HintShowHide(){
    hintOutput.slideUp(200).delay(100).slideDown(200).delay(2000).slideUp(200);
}

alert(numberToGuess); //dev help

function numberGuesser(){
    var getButton = $('div.guess');
    hintOutput.slideUp(0);

    //devBuild
    $('div.dev__build').on('click' , function(){
        points = points + 90;
        $('div.points').html('Points: '+points);
    });

    getButton.on('click', function(){
        var number = $('input[type=number]').val();
        var pointsOutput = $('div.points');

        var numberPattern = /^\d+$/;
        var diff_1 = numberToGuess - number;

        if(number == numberToGuess){
            $('div.hint').html('You Guessed a number');
            HintShowHide();
            points = points +(1 * multi);
            pointsOutput.html('Points: '+ points);
            numberToGuess = Math.round(Math.random() * (numberToGuess + n2 - n1) * n1);
                if (numberToGuess < 0){
                    numberToGuess * (-1);
                }
                else if (numberToGuess > n2){
                    numberToGuess = numberToGuess - (numberToGuess - n2);
                }
                else {numberToGuess = numberToGuess};
            alert(numberToGuess); //Dev help
        }
            else if (number > numberToGuess){
                if(number - numberToGuess < 40){
                    if (number - numberToGuess < 10){
                        hintOutput.html('Bit too much');
                        HintShowHide();
                    }
                    else if (number - numberToGuess >=10){
                        hintOutput.html('Too much');
                        HintShowHide();
                    }
                }
                    else if (number - numberToGuess > 40){
                        hintOutput.html('Way too much');
                        HintShowHide();
                    }
                    else{
                        alert('ERROR, Sorry');
                    }
        }
        else if (number < numberToGuess){
            hintOutput.html('Bit More');
            HintShowHide();
        }
        else{
            alert('Number check Error');
        }
    });

}
//shop
function shop(){
    //events
    $('span.shop__icon').on('click', shopShowHid);
    //Hid box when page loads
    $('div.shop__box').slideUp(0);
    //events for shop items
    $('div.shop__item').on('click', checkItem);
}

function checkItem(){
    var type = $(this).attr('data-item');
    
    //buying range
    if (type === 'range'){
        if(points >= pointsForRange){
            n2 = n2 + 70;
            multi = multi + 1;
            points = points - pointsForRange;
            pointsForRange = pointsForRange*2;
            $('div.shop__item[data-item="range"]').html('Range: 1-'+n2);
            $('div.points').html('Points: '+points);
        }
        else{
            hintOutput.html('Not enough points');
            HintShowHide();
        }
    }

    //buying points per secound
    else if (type === 'pps'){
        if(points >= pointsForPps){
            pps = pps + 0.3;
            points = points - pointsForPps;
            pointsForPps = pointsForPps*2;
            $('div.shop__item[data-item="pps"]').html('Points/sec: '+pps);
            $('div.points').html('Points: '+points);
            pointsPerSec();
        }
        else{
            hintOutput.html('Not enough points');
            HintShowHide();
        }
    }
}

function pointsPerSec(){
    points = points + pps;
    $('div.points').html('Points: '+points);
    setTimeout( pointsPerSec , 1000);
}

function shopShowHid(){
    $('div.shop__box').slideToggle(500);
}

//saving NOT WORKING!! Yet

//Read from DB
    function getData(){
    $.ajax({
        type: 'GET',
        url: 'save.php',
        success: function(data){
            console.log(data);
        },
        error: function(){
            alert('Error Ajax');
        }
    });
}

$('div.save').on('click', saving);
function  saving(){

var $nick = $('span.nick').html(); 
var $scores = points;
var range = n2;
var $upgrades =
    {
        'numbers': range,
        'pointsPerSec': pps,
        'multip': multi
    };
console.log($nick , $scores , $upgrades);

Cookies.set('nick', $nick);
Cookies.set('points' , $scores);
Cookies.set('upgrades' , $upgrades);


    //Save to DB
   /* $.ajax({
        url: "save.php",
        type: "POST",
        data:{
            userID: $nick,
            userPoints: $scores,
            userUpgrades: $upgrades
        },
        async: false,
        cache: false,
        success: function(response){
            alert('Data saved');
            console.log(response);
        },
        error: function(resp){
            alert('You fucked up mate :(');
            alert(resp)
        }
    });*/

}

function media(){
    var mediaBox = $('div.media__container');
    var expandMediaButton =  $('div.media__button');



    mediaBox.fadeOut(0);

   expandMediaButton.on('click', showMediaBox);
   mediaBox.on('click' , hidMediaBox)

    function showMediaBox(){
        mediaBox.fadeIn(500);
    }
    function hidMediaBox(){
        mediaBox.fadeOut(500);
    }

    $('div.media__button').on('click' , share);

    function share(){

        $('div.media__container').fadeIn(500);

        if ($(this).html() === 'fb'){

        FB.ui({
            method: 'share',
            href: 'http://memyselfandi.esy.es/test/game.php',
            quote: 'Just scorred '+$scores+ 'in gierczak :D Come and Join me!',
            display: 'poup',
            }, function(response){
                hintOutput.html(response);
            });
        }
    }
}

//Wywołania
media();
numberGuesser();
shop();
});

$(function (){
    

});