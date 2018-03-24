<?php
	include 'header.php';
	include 'php/db_connect.php';
	
	// reddit hot alg
	function hot_alg($a, $b, $c) {
		$t = strtotime($c) - 1134028003;
		$x = $a - $b;
		$y; $z;
		if ($x > 0) { $y = 1; }
		else if ($x == 0) { $y = 0; }
		else { $y = -1;}
		if (abs($x) >= 1) { $z = abs($x); }
		else { $z = 1; }
		$ans = log10($z) + ($y * $t / 45000);
		return $ans;
	}
	
	$sql = "SELECT * from 163940_posts;";
	$results = mysqli_query($con, $sql);
	$fetchedArray = array();
	while($row = mysqli_fetch_array($results)) { 
    	$fetchedArray[] = array("id"=>$row[0], "title"=>$row[1], "author"=>$row[2], "body"=>$row[3], "likes"=>$row[4],
    		"dislikes"=>$row[5], "datestamp"=>$row[6], "picUrl"=>$row[7], "sortScore"=>hot_alg($row[4], $row[5], $row[6]));
    	}	

	    usort($fetchedArray, function ($a, $b) {
		    if ($a['sortScore'] == $b['sortScore']) return 0;
		    return ($a['sortScore'] > $b['sortScore']) ? -1 : 1;
		});	
?>



    <!-- Main Content-->
	
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
		<?php foreach ($fetchedArray as $row): ?>
			  <div class="post-preview">
			<?php echo "<a href='post.php?id=". $row["id"] ."'>"?>
			  <img class="img-circle" src="<?php echo $row["picUrl"] ?>" style="height:60px;">
				  <h2 class="post-title">
					<?php echo htmlspecialchars($row['title']) ?>
				  </h2>
				</a>
				<p class="post-meta">Posted by
				  <a href="#"><?php echo htmlspecialchars($row['author']) ?></a>
				  on <?php echo $row['datestamp'] ?></p>
			  </div>
			  <hr>
			  
	    <?php endforeach; ?>
		  
          <!-- Pager 
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>-->
        </div>
      </div>
    </div>

    <hr>
	
<?php
	include 'footer.php';
?>
