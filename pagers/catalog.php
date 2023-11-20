<?php 
include("header.php");
include("bd_connect/db.php");
include("bd_connect/auth_session.php");
?>
<main>


<div class="zagolovok">Товары</div>

<div class="popular-row">


<?php 
   
                $sql2 = 'SELECT * from phone limit 5';
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






</div>


</main>