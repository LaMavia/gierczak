function events(){
    var getEnter = document.querySelector('input.ent');
    getEnter.addEventListener('click' , spinAnimation);
    
}



function spinAnimation(){
    document.querySelector('input.ent').className = 'ent_spin';
}


//number guesser
var n1 = 1;
var n2 = 90;
var numberToGuess = Math.round(Math.random() * (n2 - n1) + n1);

var points = 0;
var multi = 1;
var pps = 0;

function numberGuesser(){
    var getButton = document.querySelector("input[value='Guess']");
    getButton.addEventListener('click', checkNumber);
}
function checkNumber(){
    var getInput = document.querySelector('div.number > input');
    var getPointsOutput = document.querySelector('div.points');
    var number = getInput.value;
    if (number == numberToGuess){
        alert('You guessed a number :D');
        points = points + 1 * multi;
        getPointsOutput.innerHTML = points;
        numberToGuess = Math.round(Math.random() * (numberToGuess + n2 - n1) * n1);
        if (numberToGuess < 0){
            numberToGuess * (-1);
        }
        else if (numberToGuess > n2){
            numberToGuess = numberToGuess - (numberToGuess - n2);
        }
        else {numberToGuess = numberToGuess};
    }
    else if (number > numberToGuess){
        alert('Too much');
    }
    else {
        alert('Bit more');
    }
    
}
function shop(){
    var getFirst = document.querySelector("div.shop__box > div.shop__item:nth-child(1)");
    var getSnd = document.querySelector("div.shop__box > div.shop__item:nth-child(2)");
    var getThird = document.querySelector("div.shop__box > div.shop__item:nth-child(3)");
    
    //adding events
    getFirst.addEventListener('click' , upMulti);
    getSnd.addEventListener('click' , upRange);
    getThird.addEventListener('click' , upPts);
    
    
}
function PointsAdder(){
    points = points + pps;
    var ptr = points;
    Math.round(ptr * 100)/100;
    document.querySelector('div.points').innerHTML = ptr;
    setTimeout(PointsAdder, 60000);
}
function upMulti(){
    var lvl = 1;
    if (lvl === 1){
        if (points >= 15){
            multi++;
            lvl++;
            points = points - 15;
            alert('Your Multiplier:' + multi);
        }
        else {alert('You need more points');}
    }
    else if (lvl === 2){
        if (points >= 30){
            multi++;
            lvl++;
            points = points - 30;
            alert('Your Multiplier:' + multi);
        }
        else {alert('You need more points');}
    }
    else if (lvl === 3){
        if (points >= 45){
            multi++;
            lvl++;
            points = points - 45;
            alert('Your Multiplier:' + multi);
        }
        else {alert('You need more points');}
    }
    else {alert('ERROR');}
    
    document.querySelector("div.shop__box > div.shop__item:nth-child(1)").innerHTML = "Multiplier: " + multi;
    
}
function placeholder(){
    alert('This is not ready, yet');
}
function upRange(){
    var lvl = 1;
    if (lvl === 1){
        if (points >= 30){
            n2 = 60;
            lvl++;
            points = points - 30;
            alert('Your Range of numbers:1 - ' + n2);
        }
        else {alert('You need more points');}
    }
    else if (lvl === 2){
        if (points >= 60){
            n2 = 45;
            lvl++;
            points = points - 60;
            alert('Your Range of numbers:1 - ' + n2);
        }
        else {alert('You need more points');}
    }
    else if (lvl === 3){
        if (points >= 90){
            multi++;
            lvl++;
            points = points - 90;
            alert('Your Range of numbers:1 - ' + n2);
        }
        else {alert('You need more points');}
    }
    else {alert('ERROR');}
    
    document.querySelector("div.shop__box > div.shop__item:nth-child(2)").innerHTML = "Range: 1-" + n2;
}
function upPts(){
    var lvl = 1;
    if (lvl === 1){
        if (points >= 50){
            pps = 1;
            lvl++;
            points = points - 50;
            alert('Your Points/Min: ' + pps);
            PointsAdder();
        }
        else {alert('You need more points');}
    }
    else if (lvl === 2){
        if (points >= 100){
            pps = 2;
            lvl++;
            points = points - 100;
            alert('Your Points/Min: ' + pps);
            PointsAdder();
        }
        else {alert('You need more points');}
    }
    else if (lvl === 3){
        if (points >= 200){
            pps = 3;
            lvl++;
            points = points - 200;
            alert('Your Points/Min: ' + pps);
            PointsAdder();
        }
        else {alert('You need more points');}
    }
    else {alert('ERROR');}
    
    document.querySelector("div.shop__box > div.shop__item:nth-child(3)").innerHTML = "PTS/Min: " + pps;
}

events();
shop();
numberGuesser();



    