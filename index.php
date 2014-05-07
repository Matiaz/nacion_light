<?php
include('simple_html_dom.php');
$url = "http://www.nacion.com/".$_SERVER['REQUEST_URI'];
$html = file_get_html($url);
$subtitle = $html->find('.pg-bkn-trail-id');
$title = $html->find('.pg-bkn-headline');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title><?php echo $title[0]->plaintext?></title>
    <base href="http://www.dominio.com/" />
  </head>
  <body>
  	<header>
      <div class="container">
  		<p> <a href="<?php echo $url?>">Link a la noticia</a></p>
      </div>
  	</header>
  	<div class="container">
  		<?php
  		
		echo $subtitle[0];
		echo $title[0];

		$content = $html->find('.pg-bkn-dateline');
		echo str_replace('href="/', 'href="http://nacion.com/', $content[0]);

		$content = $html->find('.pg-bkn-nutfold');
		echo $content[0];

		$content = $html->find('.inset-main-media');
		echo str_replace('src="/', 'src="http://nacion.com/', $content[0]);

		$content = $html->find('.mce-body');
		echo str_replace('src="/', 'src="http://nacion.com/', $content[0]);
  		?>
  	</div>
  	<footer>
      <div class="container">
  		<p>Toda la información es propiedad de Grupo Nación.</p>
    </div>
  	</footer>
  </body>
</html>