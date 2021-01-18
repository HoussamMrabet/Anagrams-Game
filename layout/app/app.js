// Variables
const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'G', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
const consonants = ['B', 'C', 'D', 'F', 'G', 'H', 'G', 'K', 'L', 'M', 'N','P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Z'];
const vowels = ['A','E','I','O', 'U', 'Y'];
const start = document.querySelector('.start');
const tiles = document.querySelectorAll('.tile');
const letterGen = document.querySelector('.letters-gen');
const spots = document.querySelectorAll('.spot');
const wordInput = document.querySelector('.word-guess');
const score = document.querySelector('.score');
const highScore = document.querySelector('.high-score');
const quote = document.querySelector('.quote');
const timer = document.querySelector('.timer');
let lettersGen = [];
let words = [];
let word = [];
let originalTime = 60;
let currentTime = originalTime;
let timerInterval = currentTime;
let timesUp = false;


// Setting the Words List
let request = new XMLHttpRequest();
request.open('GET','words-list.txt',false);
request.send();
words = request.responseText.split('\n');

// Events
start.addEventListener('click', startGame);
window.addEventListener('keydown', play);

// Functions

function startGame() {
    gen();
    start.classList.toggle('active');
    letterGen.classList.toggle('active');
    wordInput.classList.toggle('active');
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
        lettersGen.push(vowels[Math.round(Math.random()*5)]);
    }

    for (let i = 0; i < 2; i++){
        lettersGen.push(letters[Math.round(Math.random()*25)]);
    }

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
            }
            if (currentTime < 1) {
                timer.style.color = 'white';
                quote.innerHTML = "Time's up!";
            }
            render(timer, currentTime);
        } else {
            timesUp = true;
            start.classList.toggle('active');
            letterGen.classList.toggle('active');
            wordInput.classList.toggle('active');
            quote.innerHTML = "Start !!";
            render(timer, originalTime);
            clearInterval(timerInterval);
        }
    }, 1000);

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

    if (key == 8) {
        let deleted = word[word.length - 1];
        word.pop();
        spots[word.length].innerHTML = "__";
        let i = lettersGen.indexOf(deleted)
        if (!tiles[i].classList.contains("active")){
            i = lettersGen.indexOf(deleted, i + 1);
            if (!tiles[i].classList.contains("active")) {
                i = lettersGen.indexOf(deleted, i + 1);
                if (!tiles[i].classList.contains("active")) {
                    i = lettersGen.indexOf(deleted, i + 1);
                } else {
                    tiles[i].classList.remove('active');
                }
            } else {
                tiles[i].classList.remove('active');
            }
        } else {
            tiles[i].classList.remove('active');
        }
    }

    if(word.length > 7) {
        return;
    } else {
        if (lettersGen.includes(String.fromCharCode(key))) {
            let l = word.length;
            let letter = String.fromCharCode(key);
            spots[l].innerHTML = letter.toUpperCase();
            let i = lettersGen.indexOf(String.fromCharCode(key));
            if (tiles[i].classList.contains("active")){
                i = lettersGen.indexOf(String.fromCharCode(key), i + 1);
                if (tiles[i].classList.contains("active")) {
                    i = lettersGen.indexOf(String.fromCharCode(key), i + 1);
                    if (tiles[i].classList.contains("active")) {
                        i = lettersGen.indexOf(String.fromCharCode(key), i + 1);
                    } else {
                        tiles[i].classList.add('active');
                    }
                } else {
                    tiles[i].classList.add('active');
                }
            } else {
                tiles[i].classList.add('active');
            }
            word.push(letter);
        }
    }
}

