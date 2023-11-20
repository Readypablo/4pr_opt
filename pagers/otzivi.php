<?php 
include("header.php");
include("bd_connect/db.php");
include("bd_connect/auth_session.php");
?>

<main>
<div class="zagolovok"> Ваши отзывы </div>
        <div class="reviews-contain">
            <?php 
            $sql3 = 'SELECT * from Reviews order by rand() limit 20';
            $result2 = $con->query($sql3);
            while ($row2 = $result2->fetch_assoc()) {
                echo '<div class="review-item">';
                echo $row2['Content'];
                echo '</div>';
            }
            ?>
        </div>
        
        </main>