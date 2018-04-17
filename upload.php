<?php include "includes/header.php"; ?>
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
?>

    <!-- Page Content -->
    <div class="container">
		<form class="form" id="upload" action="includes/uploadHelper.php" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Translate any subtitles - <code class="bg-info text-warning">Beta</code></legend>
				<label for="subs">.SRT file to translate (any language)</label>
				<input type="file" name="subFile" id="subs" class="form-control" />
				<label for="target">Target Language:</label>
				<select id="target" name="targetLanguage" class="form-control">
					<option value="" selected disabled>Select a language</option>
					<?php foreach($codes as $key => $val){ ?>
					<option value="<?php echo $key;?>"><?php echo $val; ?></option>
					<?php } ?>
				</select>
				<br />
				<input type="submit" class="btn btn-info" value="Translate" />
			</fieldset>
		</form>
		<div class="well text-center" id="response"></div>
    </div>
    <!-- /.container -->

<?php include "includes/footer.php"; ?>
