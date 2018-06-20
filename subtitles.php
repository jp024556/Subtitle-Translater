<?php include "includes/header.php"; ?>
    <!-- Page Content -->
    <div class="container">
		<?php
			$codes = [
				'af' => 'Afrikaans',
				'sq' => 'Albanian',
				'am' => 'Amharic',
				'ar' => 'Arabic',
				'hy' => 'Armenian',
				'az' => 'Azerbaijani',
				'eu' => 'Basque',
				'be' => 'Belarusian',
				'bn' => 'Bengali',
				'bs' => 'Bosnian',
				'bg' => 'Bulgarian',
				'ca' => 'Catalan',
				'ceb' => 'Cebuano',
				'ny' => 'Chichewa',
				'zh-CN' => 'Chinese (Simplified)',
				'zh-TW' => 'Chinese (Traditional)',
				'co' => 'Corsican',
				'hr' => 'Croatian',
				'cs' => 'Czech',
				'da' => 'Danish',
				'nl' => 'Dutch',
				'en' => 'English',
				'eo' => 'Esperanto',
				'et' => 'Estonian',
				'tl' => 'Filipino',
				'fi' => 'Finnish',
				'fr' => 'French',
				'fy' => 'Frisian',
				'gl' => 'Galician',
				'ka' => 'Georgian',
				'de' => 'German',
				'el' => 'Greek',
				'gu' => 'Gujarati',
				'ht' => 'Haitian Creole',
				'ha' => 'Hausa',
				'haw' => 'Hawaiian',
				'iw' => 'Hebrew',
				'hi' => 'Hindi',
				'hmn' => 'Hmong',
				'hu' => 'Hungarian',
				'is' => 'Icelandic',
				'ig' => 'Igbo',
				'id' => 'Indonesian',
				'ga' => 'Irish',
				'it' => 'Italian',
				'ja' => 'Japanese',
				'jw' => 'Javanese',
				'kn' => 'Kannada',
				'kk' => 'Kazakh',
				'km' => 'Khmer',
				'ko' => 'Korean',
				'ku' => 'Kurdish (Kurmanji)',
				'ky' => 'Kyrgyz',
				'lo' => 'Lao',
				'la' => 'Latin',
				'lv' => 'Latvian',
				'lt' => 'Lithuanian',
				'lb' => 'Luxembourgish',
				'mk' => 'Macedonian',
				'mg' => 'Malagasy',
				'ms' => 'Malay',
				'ml' => 'Malayalam',
				'mt' => 'Maltese',
				'mi' => 'Maori',
				'mr' => 'Marathi',
				'mn' => 'Mongolian',
				'my' => 'Myanmar (Burmese)',
				'ne' => 'Nepali',
				'no' => 'Norwegian',
				'ps' => 'Pashto',
				'fa' => 'Persian',
				'pl' => 'Polish',
				'pt' => 'Portuguese',
				'pa' => 'Punjabi',
				'ro' => 'Romanian',
				'ru' => 'Russian',
				'sm' => 'Samoan',
				'gd' => 'Scots Gaelic',
				'sr' => 'Serbian',
				'st' => 'Sesotho',
				'sn' => 'Shona',
				'sd' => 'Sindhi',
				'si' => 'Sinhala',
				'sk' => 'Slovak',
				'sl' => 'Slovenian',
				'so' => 'Somali',
				'es' => 'Spanish',
				'su' => 'Sundanese',
				'sw' => 'Swahili',
				'sv' => 'Swedish',
				'tg' => 'Tajik',
				'ta' => 'Tamil',
				'te' => 'Telugu',
				'th' => 'Thai',
				'tr' => 'Turkish',
				'uk' => 'Ukrainian',
				'ur' => 'Urdu',
				'uz' => 'Uzbek',
				'vi' => 'Vietnamese',
				'cy' => 'Welsh',
				'xh' => 'Xhosa',
				'yi' => 'Yiddish',
				'yo' => 'Yoruba',
				'zu' => 'Zulu'
			];
			if(isset($_GET['n'])){
				$name = mysqli_real_escape_string($conn, $_GET['n']);
				$query = "SELECT * FROM subs WHERE name = '{$name}'";
				$query_run = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($query_run)){
					$id = $row['id'];
				}
				$count = mysqli_num_rows($query_run);
				if($count != 0){
				echo '<h4 class="alert alert-info" id="heading4">All language files for <code>'.$name.'</code></h4>';
				$q = "SELECT * FROM subs_list WHERE sub_id = '{$id}'";
				$q_run = mysqli_query($conn, $q);
				$records = array();
				while($row = mysqli_fetch_assoc($q_run)){
					//$name = $row['name'];
					//$lang = $row['lang'];
					array_push($records, $row);				
				}
				$count = count($records);
				echo '<table class="table table-hover table-sm">';
				foreach($codes as $key => $val){
					echo '<tr>';
					unset($k);
						for($i = 0; $i < $count; $i++){
							if($records[$i]['lang'] == $key){
								$k = $i;
							echo '
							<td>'.$val.'</td>
							<td class="dwds" data-id="'.$id.'"><a href="download.php?dl='.$records[$i]['name'].'" target="_blank">Download '.$records[$i]['name'].'</a></td>
							';
							}
						}
						if(!isset($k)){
							echo '
							<td>'.$val.'</td>
							<td class="dwds" data-id="'.$id.'"><button class="btn btn-primary result" value="id='.$id.'&targetLanguage='.$key.'">Translate</button></td>
							';
							}
					echo '</tr>';
				}
				echo '</table>';
				}else{
					echo '<div class="alert alert-danger text-center">404 Error !<br />Page Not Found ~_~</div>';
				}
				
			}else{
				header("Location: index.php");
				exit();
			}
		?>
    </div>
    <!-- /.container -->

<?php include "includes/footer.php"; ?>
