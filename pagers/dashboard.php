<?php 
include("header.php");
include("bd_connect/db.php");
include("bd_connect/auth_session.php");
?>




<main>

<div class="prof">


<h2>Имя пользователя: <?php echo  $_SESSION['user_name_us'];?></h2>
<h2>Фамилия пользователя: <?php echo  $_SESSION['user_name_last'];?></h2>
<button class="login-button"><a class="link-btn" href="bd_connect/logout.php">выйти</a></button>
</div>

</main>



    