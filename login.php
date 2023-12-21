<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
    header("Location:order.php");
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Sanitize user input
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
    
    $custLogin = $cmr->customerLogin(array(
        'email' => $email,
        'pass' => $pass
    ));
}

?>

<div class="main">
    <div class="content">
        <div class="login_panel">

            <?php 

            if (isset($custLogin)) {
                echo $custLogin;
            }
            ?>
            <h3>Existing Customers</h3>
            <p>Sign in with the form below.</p>
            <form action="" method="post">
                <input name="email" placeholder="Email" type="text"/>
                <input name="pass" placeholder="password" type="password"/>
                <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
            </form>
        </div>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            // Sanitize user input for registration
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $city = htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8');
            $zip = htmlspecialchars($_POST['zip'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
            $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
            $country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
            $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
            $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');

            $customerReg = $cmr->customerRegistration(array(
                'name' => $name,
                'city' => $city,
                'zip' => $zip,
                'email' => $email,
                'address' => $address,
                'country' => $country,
                'phone' => $phone,
                'pass' => $pass
            ));
        }

        ?>
        <div class="register_account">
            <?php 

            if (isset($customerReg)) {
                echo $customerReg;
            }
            ?>
            <h3>Register New Account</h3>
            <form action="" method="post">
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <div>
                                <input type="text" name="name" placeholder="Name"/>
                            </div>

                            <div>
                                <input type="text" name="city" placeholder="City"/>
                            </div>

                            <div>
                                <input type="text" name="zip" placeholder="Zip-Code"/>
                            </div>

                            <div>
                                <input type="text" name="email" placeholder="Email"/>
                            </div>
                        </td>
                        <td>
                            <div>
                                <input type="text" name="address" placeholder="Address"/>
                            </div>

                            <div>
                                <input type="text" name="country" placeholder="Country"/>
                            </div>

                            <div>
                                <input type="text" name="phone" placeholder="Phone"/>
                            </div>

                            <div>
                                <input type="password" name="pass" placeholder="Password"/>
                            </div>
                        </td>
                    </tr> 
                    </tbody>
                </table> 
                <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>
<?php include 'inc/footer.php';?>
