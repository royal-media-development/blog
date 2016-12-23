<?php

include "functions.php";
$username=isset($_POST["username"])?$_POST["username"]:null;
$passwort=isset($_POST["passwort"])?$_POST["passwort"]:null;
if ((strlen($username)>0) && (strlen($passwort)>=8)){
echo '<h3 style="color:green;">Sie haben sich erfolgreich angemeldet</h3>';
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