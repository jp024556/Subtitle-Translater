<?php include "includes/header.php"; ?>

    <!-- Page Content -->
    <div class="container">
		<table class="table table-hover table-sm">
		<thead>
		  <tr>
			<th class="col-sm-8">Subtitle</th>
			<th class="col-sm-1">Downloads</th>
			<th class="col-sm-1">Languages</th>
		  </tr>
		</thead>
		<tbody>
		<?php
			if(isset($_GET['show']) && $_GET['show'] == 'all'){
				$query = "SELECT * FROM subs ORDER BY id DESC";
			}else{
				$query = "SELECT * FROM subs ORDER BY id DESC LIMIT 100";
			}
			$query_run = mysqli_query($conn, $query);
			$subs = array();
			while($row = mysqli_fetch_assoc($query_run)){
				array_push($subs, $row);
			}
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
		?>
		</tbody>
		</table>
		<?php if(isset($_GET['show']) && $_GET['show'] == 'all'){ ?>
		<h2>Can't find what you're looking for?</h2>
		<h3>Get subtitles in any language from <a href="http://opensubtitles.com">opensubtitles.com</a>, and translate them <a href="upload.php">here</a>.</h3>
		<?php }else{ ?>
		<h2><a href="index.php?show=all">Show everything</a></h2>
		<?php } ?>
    </div>
    <!-- /.container -->

<?php include "includes/footer.php"; ?>