<?php
include "config.php";
$FOOTER = '        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 6Pun 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>

    <script type="text/javascript">

        var datastring = $("#contactForm").serialize();
        $.ajax({
            type: "POST",
            url: "your url.php",
            data: datastring,
            dataType: "json",
            success: function(data) {
                //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
                // do what ever you want with the server response
            },
            error: function() {
                alert('error handing here');
            }
        });

    </script>

</body>

</html>
';