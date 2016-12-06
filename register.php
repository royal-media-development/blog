<?php

include "functions.php";
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
                        <input type="text" class="form-control" placeholder="Benutzername"/>
                    </div>
                    <div class="form-group">
                        <label>Passwort</label>
                        <input type="password" class="form-control" placeholder="Passwort"/>
                    </div>
                    <div class="form-group">
                        <label>Passwort wiederholen</label>
                        <input type="password" class="form-control" placeholder="Passwort"/>
                    </div>
                    <div class="form-group">
                         <label>Email</label>
                         <input type="text" class="form-control" placeholder="Email"/>
                    </div>

                    <div class="form-group">
                        <label>Ich bin kein Roboter!</label>
                        <input type="checkbox" class="checkbox-inline"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registrieren"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
echo $FOOTER;
?>