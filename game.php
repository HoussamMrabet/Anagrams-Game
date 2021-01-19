<?php
    include 'init.php';
    include $tpl . 'nav.php';
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

<div class="scores">
    <h2 class="score">Score : 0</h2>
    <h2 class="high-score">High Score : 0</h2>
    <p class="quote">Start !!</p>
    <p class="timer"></p>
</div>

<script src="<?php echo $js ?>game.js?v=<?php echo time(); ?>"></script>

<?php
	include $tpl . 'footer.php'; 
?>