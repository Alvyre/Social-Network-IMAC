<?php
	require __DIR__ . '/api/vendor/autoload.php';

	use Assetic\Asset\AssetCollection;
	use Assetic\Asset\FileAsset;
	use Assetic\Asset\GlobAsset;

	$js = new AssetCollection(array(
	    new GlobAsset(__DIR__ . '/assets/js/*')
	));

	$css = new AssetCollection(array(
	    new GlobAsset(__DIR__ . '/assets/css/*')
	));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Semaine Web</title>
	<style type="text/css"><?php echo $css->dump(); ?></style>
</head>
<body>
	<div id="app"></div>
	<script type="text/javascript"><?php echo $js->dump(); ?></script>
</body>
</html>