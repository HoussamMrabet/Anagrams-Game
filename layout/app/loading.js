let text = document.querySelector('.text');
let percent = document.querySelector('.percent');
let progress = document.querySelector('.progress');
let count = 4;
let per = 16;
let loading = setInterval(animate, 50);
function animate(){
    if(count == 100 && per == 400){
        text.textContent = "Completed!";
        text.classList.add("add");
        clearInterval(loading);
    }else{
        per = per + 4;
        count = count + 1;
        progress.style.width = per + 'px';
        percent.textContent = count + '%';
    }
}