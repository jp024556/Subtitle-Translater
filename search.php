<?php include "includes/header.php"; ?>

    <!-- Page Content -->
    <div class="container">
		<table class="table table-hover">
		<thead>
		  <tr>
			<th class="col-sm-8">Subtitle</th>
			<th class="col-sm-1">Downloads</th>
			<th class="col-sm-1">Languages</th>
		  </tr>
		</thead>
		<tbody>
		<?php
			if(isset($_GET['submit'])){
				$q = mysqli_real_escape_string($conn, $_GET['q']);
				if(isset($q) && !empty($q)){
					if(strlen($q) >= 3){
						$query = "SELECT * FROM subs WHERE name LIKE '%$q%' ORDER BY id DESC";
						$query_run = mysqli_query($conn, $query);
						$subs = array();
						while($row = mysqli_fetch_assoc($query_run)){
							array_push($subs, $row);
						}
						if(count($subs) != 0){
						echo '<div class="alert alert-info">Subtitles Found for <code>'.$q.'</code></div>';
						$count = array();
						foreach($subs as $sub){
							$query = "SELECT * FROM subs_list WHERE sub_id = '{$sub['id']}'";
							$query_run = mysqli_query($conn, $query);
							$c = mysqli_num_rows($query_run);
							array_push($count, $c);
							mysqli_free_result($query_run);
						}
						$total = count($subs);
						for($i = 0; $i < $total; $i++){
							echo '
								<tr>
									<td><a href="subtitles.php?n='.$subs[$i]['name'].'">'.$subs[$i]['name'].'</a></td>
									<td class="text-center">'.$subs[$i]['downloads'].'</td>
									<td class="text-center">'.$count[$i].'</td>
								</tr>
							';
						}
						}else{
							echo '<div class="alert alert-danger">We have nothing to show regarding your query ~/~</div>';
						}
					}else{
						echo '<div class="alert alert-danger">You search query must be of at least 3 characters or more !</div>';
					}
				}else{
					echo '<div class="alert alert-danger">Search query cannot be empty !</div>';
				}
			}else{
				echo '<div class="alert alert-danger">Invalid approach !</div>';
			}
		?>
		</tbody>
		</table>
		<h2>Can't find what you're looking for?</h2>
		<h3>Get subtitles in any language from <a href="http://opensubtitles.com">opensubtitles.com</a>, and translate them <a href="upload.php">here</a>.</h3>
    </div>
    <!-- /.container -->

<?php include "includes/footer.php"; ?>
