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
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Blog Post Title</h1>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>


                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <img class="img-rounded" src="http://placehold.it/900x300" alt="" width="">
                    <hr>
                    <button type="button" style="background-color: #398439"><span class="glyphicon glyphicon-ok"></span></button><button type="button" style="background-color:#c9302c"><span class="glyphicon glyphicon-remove"></span></button>
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
            </div>
        </div>

        <!-- /.row -->
        <hr>

<?php
echo $FOOTER;
?>