<?php
    include 'init.php';
    include $tpl . 'nav.php';
?>
<link rel="stylesheet" href="layout/css/game.css?v=<?php echo time(); ?>">

<h1>ANAGRAMS</h1>
<div class="letters-gen">
    <ul>
        <li class="tile0">A</li>
        <li class="tile1">B</li>
        <li class="tile2">C</li>
        <li class="tile3">D</li>
        <li class="tile4">E</li>
        <li class="tile5">F</li>
        <li class="tile6">G</li>
        <li class="tile7">H</li>
    </ul>
</div>

<button class="start">START</button>
<div class="word-guess">
    <ul>
        <li class="spot0">W</li>
        <li class="spot1">O</li>
        <li class="spot2">R</li>
        <li class="spot3">D</li>
        <li class="spot4">__</li>
        <li class="spot5">__</li>
        <li class="spot6">__</li>
        <li class="spot7">__</li>
    </ul>
</div>

<div class="scores">
    <h2 class="score">Score : 0</h2>
    <h2 class="high-score">High Score : 78</h2>
    <p class="quote">Ready !!</p>
    <p class="timer">01 : 00</p>
</div>

<?php
	include $tpl . 'footer.php'; 
?>