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
                    $id= $row['id'];
                    echo '
                    <div class="popular-card">
                    <img src="../img/'.$row['img'].'" alt="">
                         <h2>'.$row['name'].'</h2>
                         <p>'.$row['info'].'</p>';
                         if($_SESSION['user_name_last'] == 'admin'){
                            echo ' <form method="post"><input type="submit" value="Удалить" class="btn-del" name='.$id.'></form>';
                          if(isset($_POST["$id"])){
                         $query="DELETE FROM `phone` WHERE id=$id";
                          mysqli_query($con , $query) or die ;
                          }
                        }
                        
                          echo ' </div>';
                }


                if($_SESSION['user_name_last'] == 'admin'){

                    echo '<div class="block-changes">
                    <h2>Панель добавления товара</h2>
                    <form  method="post" id="form-changes">
                    
                    <h3 class="name-card">Название товара</h3>
                    <input type="text" class="inp-chang" name="name" required>
                    
                    <h3 class="name-card">Описание товара</h3>
                    <textarea  id="area" cols="20" rows="5"  name="info" required></textarea>
                    
                    <h3 class="name-card">Имя файла изображения</h3>
                    <input type="text" class="inp-chang" name="silk" required>
                    <p class="ss">пример: 1.jpg , 2.png (файлые которые есть у вас)</p>

                    <h3 class="name-card">Цена товара</h3>
                    <input type="text" class="inp-chang" name="cost" required>

                    <input type="submit" value="Добавить" class="btn-chang" name="send">
                    </form>
                    
                    </div>';

                    if(isset($_POST['send'])) {
                        $sql2 = 'SELECT * from phone ';

                        $name = stripslashes($_REQUEST['name']);    
                        $name = mysqli_real_escape_string($con, $name);
                
                        $info = stripslashes($_REQUEST['info']);
                        $info = mysqli_real_escape_string($con, $info);

                        $silk = stripslashes($_REQUEST['silk']);
                        $silk = mysqli_real_escape_string($con, $silk);

                        $cost = stripslashes($_REQUEST['cost']);
                        $cost = mysqli_real_escape_string($con, $cost);

                        $allowedPattern = '/^\d+\.jpg$/';
                        if (preg_match($allowedPattern, $silk)){
                        

                            $query = "INSERT into `phone` (name, info, img,cost) VALUES ('$name', '$info', '$silk', '$cost')";

                            $ult = mysqli_query($con, $query);
    
                            // чекаем все поля все ли хорошо там
    
                            if($ult){
                                echo "<div class='form'>
                                <h3>Добавили товар</h3><br/>
                                </div>";
                            }else{
                                echo "<div class='form'>
                                <h3>Ты где то напакостил</h3><br/>
                                </div>";
                                 }    

                        } else {
                            // Введенные данные содержат запрещенные символы
                            echo "Ошибка! Недопустимые символы в данных.";
                        }
                       
                      

                    }

                }



            ?>






<!-- https://intop24.ru/article_15_lesson_5.php -->

<!-- https://intop24.ru/article_15_lesson_6.php -->

</div>


</main>
<script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>