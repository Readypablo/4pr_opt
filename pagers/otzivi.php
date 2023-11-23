<?php 
include("header.php");
include("bd_connect/db.php");
include("bd_connect/auth_session.php");
?>

<main>
<div class="zagolovok"> Ваши отзывы </div>
        <div class="reviews-contain">
        <form action="" method="post">
            <?php 
            $sql3 = 'SELECT * from Reviews order by rand() limit 20';
            $result2 = $con->query($sql3);
            while ($row2 = $result2->fetch_assoc()) {
                echo '<div class="review-item">';
                echo $row2['Content'];
                $id= $row2['id'];

                if($_SESSION['user_name_last'] == 'admin'){
                    echo '<input type="submit" value="Удалить" class="btn-del" name='.$id.'>';
                  if(isset($_POST["$id"])){
                 $query="DELETE FROM `phone` WHERE id=$id";
                  mysqli_query($con , $query) or die ;
                  }
                }
           
        
                echo '</div>';


            }

            
?></form>
                                                                       
        </div>
        <script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
        </main>