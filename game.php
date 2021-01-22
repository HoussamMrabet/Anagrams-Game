<?php
    include 'init.php';
    include $tpl . 'nav.php';
    if(isset($_SESSION["highScore"])){
        $higherscore = $_SESSION["highScore"];
    }else{
        $higherscore = 0;
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.highScorePoints').bind('DOMSubtreeModified',function(){
            //Selected value
            let newBestScore = $(this).text();
            let id = $('#idUser').text();
            //Ajax for calling php function
            $.ajax({
                type: "POST",
                url: "highscore.php",
                data: {
                    score: newBestScore,
                    id: id,
                },
                cache: false,
            });
        });
    });
</script>
<p id="idUser" style="display:none;"><?php echo $_SESSION["ID"];?></p>
<link rel="stylesheet" href="layout/css/game.css?v=<?php echo time(); ?>">
<h1>ANAGRAMS</h1>
<div class="letters-gen active">
    <ul>
        <li class="tile"></li>
        <li class="tile"></li>
        <li class="tile"></li>
        <li class="tile"></li>
        <li class="tile"></li>
        <li class="tile"></li>
        <li class="tile"></li>
        <li class="tile"></li>
    </ul>
</div>

<button class="start">START</button>
<div class="word-guess active">
    <ul>
        <li class="spot">__</li>
        <li class="spot">__</li>
        <li class="spot">__</li>
        <li class="spot">__</li>
        <li class="spot">__</li>
        <li class="spot">__</li>
        <li class="spot">__</li>
        <li class="spot">__</li>
    </ul>
</div>
<button class="reload active">RELOAD 3</button>
<button class="stop active">STOP</button>
<a class="exit" href="menu.php"><i class="fas fa-times"></i></a>

<div class="scores">
    <h2 class="score">Score : <span class="scorePoints">0</span></h2>
    <h2 class="high-score">High Score : <span class="highScorePoints"><?php echo $higherscore;?></span></h2>
    <p class="quote">Start !!</p>
    <p class="timer"></p>
</div>

<div class="share-container">
    <div class="share-popup">
        <button class="share-close-btn">X</button>
        <h1>Share Your Score</h1>
        <span class="sharePoints"></span>
        <div class="socialShare">
            <div class="fb-share-button" data-href="https://anagrams-game.herokuapp.com/game.php" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fanagrams-game.herokuapp.com%2Fgame.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="vh6Sx6yk"></script>

<audio src="<?php echo $sounds ?>correct.wav" class="correctSound"></audio>
<audio src="<?php echo $sounds ?>end.wav" class="endSound"></audio>
<audio src="<?php echo $sounds ?>incorrect.wav" class="incorrectSound"></audio>
<audio src="<?php echo $sounds ?>empty.wav" class="emptySound"></audio>
<audio src="<?php echo $sounds ?>tick.wav" class="tickSound"></audio>
<audio src="<?php echo $sounds ?>time.wav" class="timeSound"></audio>
<script src="<?php echo $js ?>game.js?v=<?php echo time(); ?>"></script>

<?php
	include $tpl . 'footer.php'; 
?>