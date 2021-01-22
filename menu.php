<?php
    include 'init.php';
    include $tpl . 'nav.php';
    if(isset($_SESSION['user'])){
        echo $_SESSION['username'];
    }
?>

<main>
    <h1>ANAGRAMS</h1>
    <div class="menu">
        <a href="game.php"><i class="fas fa-play"></i> PLAY</a>
        <a href="score.php"><i class="fas fa-star"></i> TOP SCORES</a>
        <a href="guide.php"><i class="fas fa-question"></i> HOW TO PLAY</a>
    </div>
</main>

<?php
	include $tpl . 'footer.php'; 
?>