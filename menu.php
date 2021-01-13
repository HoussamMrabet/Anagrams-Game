<?php
    include 'init.php';
?>

<header>
    <nav class="nav-bar">
        <div class="options">
            <button>song</button>
            <button>sounds</button>
        </div>
        <div class="log-in-out">
            <button>login</button>
            <button>logout</button>
        </div>
    </nav>
</header>
<main>
    <h1>ANAGRAMS</h1>
    <div class="menu">
        <ul>
            <li><a href="#">PLAY</a></li>
            <li><a href="#">TOP SCORES</a></li>
            <li><a href="#">HOW TO PLAY</a></li>
        </ul>
    </div>
</main>

<footer>
    copyright&copy; Reserved 2021
</footer>

<?php
	include $tpl . 'footer.php'; 
?>