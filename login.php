<?php
include "functions.php";
if ($session->isUserLoggedIn()) {
    setRedirect("./index.php");
}
/**
 * @global $session Session
 */
$output = "";
if ($_POST) {


}

?>

<body>
<?php
if ($_POST) {

    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $user = new User("username = '$username' AND password = '$password'");
    if ($user->getValid()) {
        $session->setUserSession($user);
    } else {
        $output = '<h2 style="color:red;">Benutzername oder Passwort falsch!</h2>';
    }
}


echo $HEADER;
?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-xs-12">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>Anmelden</h1>
            <hr>
        </div>

        <div class="col-xs-12">
            <?php
            echo $output;
            ?>
            <form action="#" method="post">
                <div class="form-group">
                    <label>Benutzername</label>
                    <input type="text" class="form-control" placeholder="Benutzername" name="username"/>
                </div>
                <div class="form-group">
                    <label>Passwort</label>
                    <input type="password" class="form-control" placeholder="Passwort" name="password"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Anmelden"/>
                </div>

                <?php
                echo $FOOTER;
                ?>

            </form>

        </div>
        <p>Jetzt <a href="./register.php">Anmelden</a></p>
    </div>
</div>