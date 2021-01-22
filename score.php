<?php
    include 'init.php';
    include $tpl . 'nav.php';
    $getStmt = $con->prepare("SELECT * FROM user where highScore>-1 ORDER BY highScore DESC LIMIT 10");

    $getStmt->execute();

    $rows = $getStmt->fetchAll();

    $counter = 1;

    if (! empty($rows)) {
        
?>
<main>
    <h1>Top 10 Scores</h1>
    <div class="rank">
        <ul>
            <?php
				foreach ($rows as $row) {
                    $username=$row["username"];
                    $score=$row["highScore"];
                    echo '<li>';
                    echo '<div class="ranknbr">'.$counter.'</div>';
                    $counter++;
                    echo '<div class="username">'.$username.'</div>';
                    echo '<div class="score">'.$score.'</div>';
                    echo '</li><hr>';
                }}       
            ?>
        </ul>
    </div>
</main>

<a class="exit" href="menu.php"><i class="fas fa-arrow-right"></i></a>

<?php
	include $tpl . 'footer.php'; 
?>