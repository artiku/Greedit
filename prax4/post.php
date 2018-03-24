<?php
	include 'header.php';
	include 'php/db_connect.php';
	if (isset($_GET["id"])) {
		$post_id = $_GET["id"];
		$sql = "SELECT * from 163940_posts WHERE post_id=".$post_id.";";
		$results = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($results);

		if (empty($row[0])) {
			header("Location: index.php");
			exit();
		}

		$title = $row[1];
		$author = $row[2];
		$body = $row[3];
		$likes = $row[4];
		$dislikes = $row[5];
		$date = $row[6];
		$picture = $row[7];

		if (isset($_SESSION["user_nickname"])) {
			if (isset($_GET["vote"])) {
				$user_nickname = $_SESSION["user_nickname"];
				
				$votes_sql = "SELECT * from 163940_votes WHERE vote_nickname='".$user_nickname."' AND vote_postid=".$post_id.";";
				$votes_result = mysqli_query($con, $votes_sql);
				$votes_row = mysqli_fetch_array($votes_result);
				if (empty($votes_row[0])) {
					$vote = $_GET["vote"];

					if ($vote == 1) {
						$likes++;
					} else if ($vote == 0) {
						$dislikes++;
					}

					 $insert_vote_sql = "INSERT INTO 163940_votes(vote_nickname, vote_postid) VALUES ('".$user_nickname."', ".$post_id.");";
					 mysqli_query($con, $insert_vote_sql);


					$update_sql = "UPDATE 163940_posts SET post_likes=".$likes.", post_dislikes=".$dislikes." WHERE post_id=".$post_id.";";
					mysqli_query($con, $update_sql);
					header("Location: post.php?id=".$post_id);
				} else {
					echo "<script>alert('You have already voted this post');</script>";
				}

			}
		}

		$comment_sql = "SELECT * from 163940_comments WHERE comment_post=".$post_id." ORDER BY comment_datestamp DESC;";
		$comment_results = mysqli_query($con, $comment_sql);

	} else {
		header("Location: index.php");
		exit();
	}

?>

<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-6 mx-auto">

          <!-- Title -->
          <h1 class="mt-4"><?php echo htmlspecialchars($title)?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo htmlspecialchars($author)?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $date;?></p>

          <hr>

          <!-- Preview Image -->
		  
          <img class="img-fluid rounded" src="<?php echo $picture?>" alt="">

          <!-- Post Content -->
		  <div class="card my-4">
			<p class="lead"><?php echo htmlspecialchars($body);?></p>
		  </div>
		  
            <footer class="blockquote-footer">
				<?php 
					if (isset($_SESSION["user_nickname"])) {
						$likes = "<a class='btn' href='?id=".$post_id."&vote=1'><i class='fa fa-thumbs-up' aria-hidden='true'></i> (".$likes.")</a><a class='btn' href='?id=".$post_id."&vote=0'><i class='fa fa-thumbs-down' ></i> (".$dislikes.")</a>";
					} else {
						$likes = "<a> (".$likes.")</a><a> (".$dislikes.")</a>";
					}
					echo $likes;
				?>
            </footer>
			
          <hr>
		  
		  <!-- Comments Form -->
		  <?php if(isset($_SESSION["user_nickname"])): ?>
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="php/comment.php" method="POST">
                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3"></textarea>
					<input type="hidden" name="post_id" value="<?php echo $post_id?>" />
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
		  <?php endif; ?>
		  
		  
		  <?php while($row = mysqli_fetch_array($comment_results)): ?>
		  <div class="media mb-4">
            <!-- <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt=""> -->
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlspecialchars($row[1]); ?></h5>
				<?php echo htmlspecialchars($row[3]); ?>
			  </div>
			<blockquote class="blockquote">
				<footer class="blockquote-footer">
					<?php echo "<p>".$row[4]."</p>" ?>
				</footer>
          </blockquote>
          </div>
		  
	      <?php endwhile; ?>
		
		  </div>
		</div>
	  </div>

<?php
	include_once 'footer.php';
?>