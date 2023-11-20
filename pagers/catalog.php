<?php 
include("header.php");
include("bd_connect/db.php");
include("bd_connect/auth_session.php");
?>
<main>


<div class="zagolovok">Товары</div>

<div class="popular-row">


<?php 
   
                $sql2 = 'SELECT * from phone ';
                $result = $con->query($sql2);
        
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="popular-card">
                    <img src="../img/'.$row['img'].'" alt="">
                         <h2>'.$row['name'].'</h2>
                         <p>'.$row['info'].'</p>
                    </div>
                   
                ';
                }
            ?>





<!-- https://intop24.ru/article_15_lesson_5.php -->

<!-- https://intop24.ru/article_15_lesson_6.php -->

</div>


</main>