<?php 
include("header.php");
include("bd_connect/db.php")
?>

<?php 

if(isset($_REQUEST['first_name'])){
    // имя
    $first_name = stripcslashes($_REQUEST['first_name']);
    $first_name = mysqli_real_escape_string($con,$first_name);
    // фамилия
    $last_name = stripcslashes($_REQUEST['last_name']);
    $last_name = mysqli_real_escape_string($con,$last_name);
  
    // мобильный
    $mobile = stripcslashes($_REQUEST['mobile']);
    $mobile = mysqli_real_escape_string($con,$mobile);

    // пороль
    $password = stripcslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $query = "INSERT into `users` (first_name, last_name, password,phone ) VALUES ('$first_name', '$last_name', '$password', '$mobile')";



    $ult = mysqli_query($con, $query);

    // чекаем все поля все ли хорошо там
    if($ult){
        echo "<div class='form'>
        <h3>все шик.</h3><br/>
        <p class='link'>Вводи сюда это <a href='login.php'>Login</a></p>
        </div>";
    }else{
        echo "<div class='form'>
        <h3>не все поля заполнил.</h3><br/>
        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
        </div>";
         }    
    
}else{
    ?>

<form action="" class="form" method="post">
<h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="first_name" placeholder="имя" required />
        <input type="text" class="login-input" name="last_name" placeholder="фамилия" required>
        <input type="text" class="login-input"  name="mobile" placeholder="телефон" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>

</form>

<script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <?php }?>