<!DOCTYPE html>

<html>
<head>
    <title>LoginChat</title>
    <meta nane="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" href="Styles/login.css">
    <link rel="stylesheet" href="Styles/extendedStyles.css">
</head>

<?php

$name = "";
$password = "";
if(isset($_COOKIE["type"]) && $_COOKIE["type"] === "admin")
{
    header('Location: /test/index.php');
}
else
{
    if(isset($_COOKIE["name"]))
        $name = $_COOKIE["name"];
    if(isset($_COOKIE["password"]))
        $password = $_COOKIE["password"];
}
?>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post" action="authorization.php">
            <div class="txt_field">
                <input type="text" name="name" required value= <?php echo $name;?>>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password"abo name="password" required value = <?php echo $password; ?>>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">
              <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="color: #a6a6a6; text-decoration:none">Forgot Password?</a>
            </div>
            <input type="submit" value="Login" />
            <div class="signup_link">
                Not a member? <a href="signup.html">Sign up</a>
            </div>
        </form>
    </div>
</body>

</html>
