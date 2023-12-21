<?php include '../classess/Adminlogin.php';?>
<?php
$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUser = filter_input(INPUT_POST, 'adminUser', FILTER_SANITIZE_STRING);
    $adminPassword = filter_input(INPUT_POST, 'adminPassword', FILTER_SANITIZE_STRING);

    $loginchk = $al->adminlogin($adminUser, md5($adminPassword));
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
    <section id="content">
        <form action="login.php" method="post">
            <h1>Admin Login</h1>
            <span style="color: red;font-size: 18px;">
                <?php
                if (isset($loginchk)) {
                    echo $loginchk;
                }
                ?>
            </span>
            <div>
                <input type="text" placeholder="Username" name="adminUser"/>
            </div>
            <div>
                <input type="password" placeholder="Password" name="adminPassword"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="#">Online shopping</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>
