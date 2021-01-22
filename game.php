<?php
    include 'init.php';
    include $tpl . 'nav.php';
    if(isset($_SESSION["highScore"])){
        $higherscore = $_SESSION["highScore"];
    }else{
        $higherscore = 0;
    }
?>
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
<a class="exit" href="menu.php">EXIT</a>

<div class="scores">
    <h2 class="score">Score : <span class="scorePoints">0</span></h2>
    <h2 class="high-score">High Score : <span class="highScorePoints"><?php echo $higherscore;?></span></h2>
    <p class="quote">Start !!</p>
    <p class="timer"></p>
</div>

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