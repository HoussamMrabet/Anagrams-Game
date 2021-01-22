// Variables
const noMusic = document.querySelector('#nomusic');
const music = document.querySelector('#music');
const sound = document.querySelector('#sound');
const mute = document.querySelector('#mute');
const musicFile = document.querySelector('.musicSound');
//const successContainer = document.querySelector('.success-container');
const loginContainer = document.querySelector('.login-container');
const login = document.querySelector('#login');
const signinContainer = document.querySelector('.signin-container');
const signin = document.querySelector('#signin');
const loginCloseBtn = document.querySelector('.login-close-btn');
const shareContainer = document.querySelector('.share-container');
const shareCloseBtn = document.querySelector('.share-close-btn');
const signinCloseBtn = document.querySelector('.signin-close-btn');
const inputs = document.querySelectorAll('input[required]');

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
login.addEventListener('click', showLogin);
signin.addEventListener('click', showSignin);
loginCloseBtn.addEventListener('click', closeLogin);
signinCloseBtn.addEventListener('click', closeSignin);
shareCloseBtn.addEventListener('click', closeShare);
/*successContainer.addEventListener("transitionend", () => {
    const popupBox = successContainer.children[0];
    successContainer.classList.remove("isActive");
    popupBox.classList.remove("isActive");
});*/

// Functions
function showLogin(e) {
    const popup = loginContainer.children[0];
    loginContainer.classList.add('isActive');
    popup.classList.add("isActive");  
}
function showSignin(e) {
    const popup = signinContainer.children[0];
    signinContainer.classList.add('isActive');
    popup.classList.add("isActive");  
}
function showShare(e) {
    const popup = shareContainer.children[0];
    shareContainer.classList.add('isActive');
    popup.classList.add("isActive");  
}
function closeLogin(e) {
    const popup = loginContainer.children[0];
    loginContainer.classList.remove("isActive");
    popup.classList.add("isActive");
    clearInputs();
}
function closeSignin(e) {
    const popup = signinContainer.children[0];
    signinContainer.classList.remove("isActive");
    popup.classList.add("isActive");
    clearInputs();
}
function closeShare(e) {
    const popup = shareContainer.children[0];
    shareContainer.classList.remove("isActive");
    popup.classList.add("isActive");
}
function clearInputs() {
    inputs.forEach(input => {
        input.value = "";
    });
}
/*function good() {
    const popupBox = successContainer.children[0];
    successContainer.classList.add("isActive");
    popupBox.classList.add("isActive");
}*/
