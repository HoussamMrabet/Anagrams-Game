// Variables
const noMusic = document.querySelector('#nomusic');
const music = document.querySelector('#music');
const sound = document.querySelector('#sound');
const mute = document.querySelector('#mute');
const musicFile = document.querySelector('.musicSound');

// Events
window.addEventListener('load', () => {
    musicFile.play();
    musicFile.volume = 1;
});

music.addEventListener('click', () => {
    music.classList.toggle('active');   
    noMusic.classList.toggle('active');
    musicFile.volume = 0;
});
sound.addEventListener('click', () => {
    sound.classList.toggle('active');
    mute.classList.toggle('active');
    correctSound.volume = 0;
    incorrectSound.volume = 0;
    endSound.volume = 0;
    emptySound.volume = 0;
    tickSound.volume = 0;
    timeSound.volume = 0;
});
noMusic.addEventListener('click', () => {
    music.classList.toggle('active');   
    noMusic.classList.toggle('active');
    musicFile.play();
    musicFile.volume = 0.1;
});
mute.addEventListener('click', () => {
    sound.classList.toggle('active');
    mute.classList.toggle('active');
    correctSound.volume = 1;
    incorrectSound.volume = 1;
    endSound.volume = 1;
    emptySound.volume = 1;
    tickSound.volume = 1;
    timeSound.volume = 1;
});

// Functions
