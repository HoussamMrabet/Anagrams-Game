// Variables
const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'G', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
const consonants = ['B', 'C', 'D', 'F', 'G', 'H', 'G', 'K', 'L', 'M', 'N','P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Z'];
const vowels = ['A','E','I','O', 'U'];
const start = document.querySelector('.start');
const stop = document.querySelector('.stop');
const reload = document.querySelector('.reload');
const tiles = document.querySelectorAll('.tile');
const letterGen = document.querySelector('.letters-gen');
const spots = document.querySelectorAll('.spot');
const wordInput = document.querySelector('.word-guess');
const score = document.querySelector('.score');
const scorePoints = document.querySelector('.scorePoints');
const highScore = document.querySelector('.high-score');
const highScorePoints = document.querySelector('.highScorePoints');
const quote = document.querySelector('.quote');
const timer = document.querySelector('.timer');
const correctSound = document.querySelector('.correctSound');
const endSound = document.querySelector('.endSound');
const incorrectSound = document.querySelector('.incorrectSound');
const emptySound = document.querySelector('.emptySound');
const timeSound = document.querySelector('.timeSound');
const tickSound = document.querySelector('.tickSound');
let lettersGen = [];
let lettersGenUsed = [];
let deleted = [];
let indexDeleted = [];
let words = [];
let word = [];
let wordTaken = [];
let wordPlayed = "";
let points = 0;
let originalTime = 60;
let currentTime = originalTime;
let timerInterval = currentTime;
let timesUp = true;
let reloadChance = 3;

// Setting the Words List
let request = new XMLHttpRequest();
request.open('GET','words-list.txt',false);
request.send();
words = request.responseText.split('\n');

// Events
start.addEventListener('click', startGame);
stop.addEventListener('click', stopGame);
reload.addEventListener('click', rel);
window.addEventListener('keydown', play);

// Functions

function startGame() {
    gen();
    timesUp = false;
    start.classList.toggle('active');
    letterGen.classList.toggle('active');
    wordInput.classList.toggle('active');
    reload.classList.toggle('active');
    stop.classList.toggle('active');
    counter();
    currentTime = originalTime;
}

function gen() {

    for (let i = 0; i < 8; i++){
        lettersGen.pop();
    }

    for (let i = 0; i < 3; i++){
        lettersGen.push(consonants[Math.round(Math.random()*19)]);
    }

    for (let i = 0; i < 3; i++){
        lettersGen.push(vowels[Math.round(Math.random()*4)]);
    }

    for (let i = 0; i < 2; i++){
        lettersGen.push(letters[Math.round(Math.random()*25)]);
    }

    lettersGenUsed = lettersGen.slice(0);
    tilesFill();
}


function tilesFill() {
    tiles.forEach((tile,index) => {
        tile.innerHTML = lettersGen[index];
    });
}

function counter() {
    
    timerInterval = setInterval(function() {
        if (currentTime != 0) {
            currentTime--;
            if (currentTime < 6) {
                timer.style.color = 'red';
                timeSound.currentTime = 0;
                timeSound.play();
            }
            if (currentTime < 1) {
                timer.style.color = 'white';
                quote.innerHTML = "Time's up!";
                endSound.currentTime = 0;
                endSound.play();
            }
            render(timer, currentTime);
        } else {
            stopGame();
        }
    }, 1000);

}

function rel() {
    if (reloadChance > 0) {
        gen();
        tiles.forEach(tile => {
            tile.classList.remove("active");
        });
        spots.forEach(spot => {
            spot.innerHTML = "__";
        });
        deleted = [];
        indexDeleted = [];
        word = [];
        reloadChance--;
        reload.innerHTML = "RELOAD " + reloadChance;
        reload.onfocus = null;
        reload.blur();
        if (!reloadChance) {
            reload.classList.add('reloadActive');
        }
    }
}

function stopGame() {
    timesUp = true;
    start.classList.toggle('active');
    stop.classList.toggle('active');
    letterGen.classList.toggle('active');
    wordInput.classList.toggle('active');
    reload.classList.toggle('active');
    reload.classList.remove('reloadActive');
    quote.innerHTML = "Start !!";
    scorePoints.innerHTML = "0";
    points = 0;
    word = [];
    wordTaken = [];
    wordPlayed = [];
    deleted = [];
    indexDeleted = [];
    lettersGen = [];
    lettersGenUsed = [];
    reloadChance = 3;
    reload.innerHTML = "RELOAD 3";
    tiles.forEach(tile => {
        tile.classList.remove("active");
    });
    spots.forEach(spot => {
        spot.innerHTML = "__";
    });
    render(timer, originalTime);
    clearInterval(timerInterval);
}

function getTimeString(seconds) {
    let ms = seconds / 60;
    let s = Math.floor(seconds%60);
    let m = Math.floor(ms%60);
    let second = s % 10 == s ? "0" + s : s;
    let minute = m % 10 == m ? "0" + m : m;
    return minute + ":" + second;
}

function render(item, seconds) {
    item.innerHTML = getTimeString(seconds);
}

render(timer, currentTime);

function play(e) {
    let key = e.keyCode;

    if (!timesUp) {
        if (key == 13) {
            tiles.forEach(tile => {
                tile.classList.remove("active");
            })
            spots.forEach(spot => {
                spot.innerHTML = "__";
            });
            wordPlayed = word.join("");
            if (words.includes(wordPlayed.toLowerCase())) {
                if (wordTaken.includes(wordPlayed)) {
                    quote.innerHTML = "NO REPEAT!";
                    incorrectSound.currentTime = 0;
                    incorrectSound.play();
                } else {
                    points += word.length;
                    wordTaken.push(wordPlayed)
                    quote.innerHTML = "AWESOME!";
                    scorePoints.innerHTML = points;
                    if (points > highScorePoints.innerText) {
                        highScorePoints.innerHTML = points;
                    }
                    correctSound.currentTime = 0;
                    correctSound.play();
                    currentTime += 5;
                }
            } else {
                quote.innerHTML = "NOPE!"
                incorrectSound.currentTime = 0;
                incorrectSound.play();
            }
            deleted = [];
            indexDeleted = [];
            word = [];
            lettersGenUsed = lettersGen.slice(0);
        }
    
        if (key == 8) {
            if (indexDeleted.length == 0) {
                return;
            } else {
                let i = indexDeleted.length - 1;
                lettersGenUsed[indexDeleted[i]] = deleted[i];
                let index = indexDeleted[i];
                deleted.pop();
                indexDeleted.pop();
                word.pop();
                spots[word.length].innerHTML = "__";
                tiles[index].classList.remove('active');  
                emptySound.currentTime = 0;
                emptySound.play();
            }
        }
    
        if (word.length > 7) {
            return;
        } else {
            if (lettersGenUsed.includes(String.fromCharCode(key))) {
                let l = word.length;
                let letter = String.fromCharCode(key);
                spots[l].innerHTML = letter.toUpperCase();
                let i = lettersGenUsed.indexOf(String.fromCharCode(key));
                tiles[i].classList.add('active');
                deleted.push(lettersGenUsed[i]);
                indexDeleted.push(i);
                lettersGenUsed[i] = null;
                word.push(letter);
                tickSound.currentTime = 0;
                tickSound.play();
            }
        }    
    }
}

