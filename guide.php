<?php
    include 'init.php';
    include $tpl . 'nav.php';
?>

<main>
    <h1>How To Play</h1>
    <div class="guide">
        <p>
            When a player starts a game on the server, the server chooses 8 letters at random. The player then has 60 seconds to find as many anagrams as possible using these letters. Each time the player thinks he has found a word, the server must validate it against a dictionary that he embeds. The game ends when the player runs out of time. The server then provides a ranking of players with the possibility of sharing the result on facebook and twitter.
        </p>
        <br>
        <p>
            The goal is to provide fast and responsive play. Typically, each time the player finds a word, their remaining time counter must be increased. Then it must be possible to request a new print run.
        </p>
    </div>
</main>
<a class="exit" href="menu.php"><i class="fas fa-arrow-right"></i></a>
<?php
	include $tpl . 'footer.php'; 
?>