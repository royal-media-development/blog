<?php

include "functions.php";
$response = "";
if ($_POST) {
    $validation = new Validation();
    $username = $_POST["username"];
    $password = $_POST["passwort"];
    $password2 = $_POST["passwort2"];
    $email = $_POST["email"];

    $allow = $validation->registration(
        $username,
        [
            $password,
            $password2
        ],
        $email
    );

    if ($allow) {
        $registraion = new Registration($username, $password, $email);
        if ($registraion) {
            $response = "<h1 style='color:green;'>Sie haben sich erfolgreich Angemeldet!</h1>";
        } else {
            $response = "<h1 style='color:red;'>Anmeldung fehlgeschlagen!</h1>";
        }
    }
}
?>

    <body>
<?php

echo $HEADER;
?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-xs-12">

                <!-- Blog Post -->
            <?php echo $response; ?>
                <!-- Title -->
                <h1>Registrieren</h1>
                <hr>
            </div>
            <div class="col-xs-12">
                <form action="#" method="post">
                    <div class="form-group">
                        <label>Benutzername</label>
                        <input type="text" class="form-control" placeholder="Benutzername" name="username"/>
                    </div>
                    <div class="form-group">
                        <label>Passwort</label>
                        <input type="password" class="form-control" placeholder="Passwort" name="passwort"/>
                    </div>
                    <div class="form-group">
                        <label>Passwort wiederholen</label>
                        <input type="password" class="form-control" placeholder="Passwort" name="passwort2"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email"/>
                    </div>

                    <div class="form-group">
                        <label>Ich bin kein Roboter!</label>
                        <input type="checkbox" class="checkbox-inline" name="norobot"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registrieren" name="register"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
echo $FOOTER;
?>