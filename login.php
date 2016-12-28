<?php

include "functions.php";
?>

    <body>
<?php
$user = new User(1);

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