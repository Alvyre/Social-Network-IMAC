<template>
	<header>
		<div class="go-home"><a href="#"><img src="../assets/logo.svg" width="50" height="50" />IMAC Talks</a></div>
		<div class="connect"><a href="#!/signup">S'inscire / Connexion</a></div>
		<div class="clear">
	</header>
</template>

<style type="text/css">
	header{
		margin: 0;
		background: #ffffff;
	}

	header .go-home, header .connect{
		padding: 1em;
	}

	header .go-home{
		text-align: left;
		float: left;
		font-size: 20px;
	}

	header .go-home img{
		width: 40px;
		margin-right: 10px;
		height: auto;
		vertical-align: middle;
	}

	header .connect{
		text-align: right;
		float: right;
		margin-top: 12px;
	}

	header .clear{
		clear: both;
	}
</style>