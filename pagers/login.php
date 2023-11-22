<?php 
include("header.php");
include("bd_connect/db.php")
?>

<body>
<main>
<?php
 
    session_start();
// Когда форма отправлена, проверьте и создайте сеанс пользователя.
    if (isset($_POST['mobile'])) {
        $mobile = stripslashes($_REQUEST['mobile']);    
        $mobiles = mysqli_real_escape_string($con, $mobile);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

   // Проверьте, существует ли пользователь в базе данных
        $query    = "SELECT * FROM `users` WHERE phone='$mobile'
                     AND password='$password'";

        $result = mysqli_query($con , $query) or die ;
        $rows = mysqli_num_rows($result);
        if( $rows==1){

            // берем данные из базы чтоб потом их передать
            if($result){
                $main_user = mysqli_fetch_assoc($result);
                $_SESSION['user_name_us']=$main_user['first_name'];
                $_SESSION['user_name_last']=$main_user['last_name'];
                $_SESSION['user_mobile']=$main_user['phone'];
                $_SESSION['user_addres']=$main_user['addres'];
                $_SESSION['first_name'] = $mobile;
        
                    header("Location: dashboard.php");
                
                 
        }
// если данные не совпали
        }else{
            echo "<div class='form'>
            <h3>Incorrect Username/password.</h3><br/>
            <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
            </div>";
        }
    }else{
?>

<form class="form" method="post" name="login">


<h1 class="login-title">LOGIN</h1>

<input type="text" class="login-input" name="mobile" placeholder="телефон" required>

<input type="password" class="login-input" name="password" placeholder="Password">

<input type="submit" value="login" name="submit" class="login-button">

<p class="link"> <a href="registration.php"> NEW Registration </a></p>
</form>

<?php }?>
<script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</main>
</body>