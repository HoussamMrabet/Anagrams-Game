// Variables
const noMusic = document.querySelector('#nomusic');
const music = document.querySelector('#music');
const sound = document.querySelector('#sound');
const mute = document.querySelector('#mute');
const musicFile = document.querySelector('.musicSound');

// Events
window.addEventListener('pageshow', () => {
    musicFile.play();
});
music.addEventListener('click', () => {
    music.classList.toggle('active');   
    noMusic.classList.toggle('active');
    musicFile.volume = 0;
});
sound.addEventListener('click', () => {
    sound.classList.toggle('active');
    mute.classList.toggle('active');
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
});

// Functions
