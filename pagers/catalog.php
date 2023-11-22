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


                if($_SESSION['user_name_last'] == 'admin'){
                    echo $_SESSION['user_name_last'];

                    if($_POST['send']) {
                        $sql2 = 'SELECT * from phone ';

                        $name = stripslashes($_REQUEST['name']);    
                        $name = mysqli_real_escape_string($con, $name);
                
                        $opis = stripslashes($_REQUEST['opis']);
                        $opis = mysqli_real_escape_string($con, $opis);

                        $silk = stripslashes($_REQUEST['silk']);
                        $silk = mysqli_real_escape_string($con, $silk);
                    }

                }



            ?>



<div class="block-changes">
<h2>Панель добавления товара</h2>
<form  method="post" id="form-changes">

<h3 class="name-card">Название товара</h3>
<input type="text" class="inp-chang" name="name">

<h3 class="name-card">Описание товара</h3>
<textarea name="" id="area" cols="20" rows="5"  name="opis"></textarea>

<h3 class="name-card">Имя файла изображения</h3>
<input type="text" class="inp-chang" name="silk">
<p class='ss'>пример: 1.jpg , 2.png (файлые которые есть у вас)</p>

<input type="submit" value="Добавить" class="btn-chang" name="send">
</form>
</div>


<!-- https://intop24.ru/article_15_lesson_5.php -->

<!-- https://intop24.ru/article_15_lesson_6.php -->

</div>


</main>
<script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}



</script>