function odliczanie() {
		var dzisiaj = new Date();
		
		var dzien = dzisiaj.getDate();
		var miesiac = dzisiaj.getMonth()+1;
		var rok = dzisiaj.getFullYear();
		
		var godz = dzisiaj.getHours();
		if(godz < 10) godz = "0" + godz;
		
		var minuta = dzisiaj.getMinutes();
		if(minuta < 10) minuta = "0" + minuta;		
		
		var sek = dzisiaj.getSeconds();
		if(sek < 10) sek = "0" + sek;
		
		document.getElementById("clock").innerHTML = dzien + "/" + miesiac + "/" + rok + "|" + godz + ":" + minuta + ":" + sek;
		
		setTimeout("odliczanie()" , 1000);
	}   


function start()
{
    window.scroll(0,0);
}

function scrolling(id)
{
    var el = document.querySelector('#' + id);
    var offset = el.offsetLeft;
    
    window.scroll(offset, 0);
}

//about -> content
function contentToggle(cl)
{
    var el = document.querySelector('div#' + cl);
    var getHid = document.querySelector(".hidden");
    var getShow = document.querySelector(".showing");
    var conDivs = ['#aims' , '#aboutme' , '#webdesign' , '#threede'];
    for (var i = 0; i <= 3; i++){
        document.querySelector(conDivs[i]).className = 'hidden';
    }
    if (el.className === "hidden"){
        el.classList.remove("hidden");
        el.classList.add("showing");
        document.querySelector("div.showing > span.cancel").addEventListener('click', cancleButton);
    }
    else if (el.className === "showing"){
        el.classList.add("hidden");
        el.classList.remove("showing");
    }
 
}


function cancleButton(){
    document.querySelector('div.showing').className = "hidden";
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

shop();
numberGuesser();





    