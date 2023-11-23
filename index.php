<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staticshop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

 <header>
    <a href="index.php"><div class="logo-header"></div></a>
    
    <div class="menu-header">
        <div class="elem-menu"><a href="pagers/catalog.php" class="link-header">Каталог</a></div>
        <div class="elem-menu"><a href="pagers/otzivi.php" class="link-header">Ваши отзывы</a></div>
        <div class="elem-menu"><a href="pagers/prem.php" class="link-header">Преимущества</a></div>
        <div class="elem-menu"><a href="pagers/dashboard.php" class="link-header">Личный кабинет</a></div>
    </div>

    <div class="slogan">
        <p>магазин<br>Электроники</p>
    </div>
</header>

<main>


<div class="banner">
        <h1>Лучшие электротовары по выгодным ценам!</h1>
        <p>У нас вы найдете широкий ассортимент электротехники высокого качества.</p>
    
    </div>

<div class="zagolovok"> Популярные товары</div>

<div class="popular-row">
<?php 
include("pagers/bd_connect/db.php");
$sql2 = 'SELECT * from phone ';
$result = $con->query($sql2);

while ($row = $result->fetch_assoc()) {
    $id= $row['id'];
    echo '
    <div class="popular-card">
    <img src="../img/'.$row['img'].'" alt="">
         <h2>'.$row['name'].'</h2>
         <p>'.$row['info'].'</p>';
        
          echo ' </div>';
}

?>
</div>
 





</main>



</body>
</html>