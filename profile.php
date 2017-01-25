<?php
	include "functions.php";	
	echo $HEADER;
	
	$user = $session->getUserSession();
	
	$connection = new Connection();
	$result = $connection->getSelectFrom("SELECT * FROM user LEFT JOIN post ON user.id=post.user_id WHERE user.id = ".$user->getId());
	
 	if($session->isUserLoggedIn()) : ?>
 	 <div class="container">
 	
		<div class="row">
			<div class="col-xs-12">
				<form action="newpost.php" method="post" enctype="multipart/form-data">
					<input name="file" type="file"/>
					<input class="form-control" type="submit" value="upload"/>
				</form>
			</div>
		</div>
		
		<div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-xs-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Eigene Uploads</h1>

                <hr>
            </div>
        </div>
	<?php else : ; 
		setRedirect("./index.php");
	endif;
	
	foreach ($result as $resu){
			
		$name = $connection->getSelectFrom("SELECT username FROM user LEFT JOIN post ON user.id=post.user_id WHERE user.id = ".$resu["user_id"])[0];
		?>
	        
	        <div class="post">
	            <div class="row">
	                <div class="col-xs-6 col-xs-offset-3">
	                    <div class="well">
	                        <?php echo '<p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM von '.$name["username"].'</p>' ?>
	                        <hr>
	
							<?php echo '<img class="img-rounded" src="img/'.$resu["img"].'">' ?>
	                        <hr>
	                        <button class="btn btn-default"><i class="glyphicon glyphicon-thumbs-up postLike" post_id="12"></i></button>
	                        <a href=""><button class="btn btn-default"><i class="glyphicon glyphicon-thumbs-down postDislike"></i></button></a>
	                        <a href=""><button class="btn btn-default"><i class="glyphicon glyphicon-comment"></i></button></a>
	
	                    </div>
	                    <hr/>
	                </div>
	            </div>
	        </div>
	        
	<?php 
	}
		
	
	echo $FOOTER;
?>

	</div>