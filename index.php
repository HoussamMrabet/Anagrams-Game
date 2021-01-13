<?php
    include 'init.php';
?>

<div class="loading">
      <div class="text">Loading ...</div>
       <label class="percent">100%</label>
      <div class="progress-bar">
        <div class="progress"></div>
      </div>
</div>

<?php
	header("refresh:7;url='menu.php'");
	include $tpl . 'footer.php'; 
?>
