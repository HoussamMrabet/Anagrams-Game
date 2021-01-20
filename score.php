<?php
    include 'init.php';
    include $tpl . 'nav.php';
    $sql1 = "SELECT * FROM user ORDER BY highScore DESC LIMIT 10";
    $res1 = mysqli_query($connexion,$sql1);
    $counter = 1;
    if($res1){
        
?>
<main>
    <h1>Top 10 Scores</h1>
    <div class="rank">
        <ul>
            <?php
                while($members = mysqli_fetch_array($res1)){
                    $username=$members["username"];
                    $score=$members["highScore"];
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

<?php
	include $tpl . 'footer.php'; 
?>