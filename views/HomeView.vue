<template>
  	<div class="home">
		<div class="header">
			<div class="title">
				<span>IMAC</span>
				<span>talks</span>
				<span>with you.</span>
			</div>
			<div class="description">Le réseau social de l'IMAC permet l'échange entre professeurs, étudiants et professionnels.</div>
			<i class="home-arrow fa fa-long-arrow-down" aria-hidden="true"></i>
		</div>
		<div class="container">
			<div class="search">
				<form class="terminal-form">
					<input class="morphsearch-input" type="search" placeholder="Search...">
				</form>
			</div>
			<div class="menu-cat">
				<ul>
					<li><a href="">Les matières</a></li>
					<li><a href="">L'étranger</a></li>
					<li><a href="">Se loger</a></li>
					<li><a href="">Se nourrir</a></li>
					<li><a href="">Les débouchés</a></li>
				</ul>
			</div>
			<div class="talks-field row">
				<div class="col-md-6">
					<div class="more-recent-talks">
						<p class="title text-uppercase">Sujets<br>recents</p>
						<ul class="subjects">
							<li><a href="">Sujet 1</a></li>
							<li><a href="">Sujet 2</a></li>
							<li><a href="">Sujet 3</a></li>
							<li><a href="">Sujet 4</a></li>
							<li><a href="">Sujet 5</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="more-commented-talks">
						<p class="title text-uppercase">Sujets<br>populaires</p>
						<ul class="subjects">
							<li><a href="">Sujet 1</a></li>
							<li><a href="">Sujet 2</a></li>
							<li><a href="">Sujet 3</a></li>
							<li><a href="">Sujet 4</a></li>
							<li><a href="">Sujet 5</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>


export default {
  components: {
  }
}
</script>

<style type="text/css">

	.home, .container{
		width: 100%;
		margin: 0 auto;
		background-color: #F6F6F8;
    	padding: 1em 0;
    	position: relative;
	}

	.home .header{
		position: relative;
	    width: 80%;
	    margin: 0 auto;
	    margin-bottom: 25px;
	    overflow: visible;
	    text-align: center;
	}

	.home .header .title {
	    font-family: 'Lato', sans-serif;
	    margin: 0.5em auto;
	    color: #333333;
	    font-size: 7em;
	    line-height: 1.25em;
	    letter-spacing: 1px;
	}

	.home .header .title span:after{
		content:" ";
    	overflow:hidden;
    	color:transparent;
    	display: block;
	}

	.home .header .title span:first-child{
		border-bottom: 6px solid #7ec348;
	}

	.home .header .title span{
		border-bottom: 6px solid #1c99d6;
	}

	.home .header .title span:last-child{
		border-bottom: 6px solid #cb1b29;
	}

	.home .header .description {
	    font-family: 'Cutive Mono', serif;
	    color: #333333;
	    font-size: 1em;
	    line-height: 2em;
	    margin: 6em auto;
	}

	.home .header .container{
		padding: 20px;
		display: block;
	}

	.home .header .home-arrow{
		font-size: 4em;
		color: #333;
	}

	.home .header .container img{
		width: 100px;
		height: auto;
		display: inline-block;
	}

	.home .header .header-titles{
		display: inline-block;
	}

	.home .container .search .terminal-form{
    	width: 80%;
    	height: 160px;
    	margin: 0 auto;
    	position: relative;
	}

	.home .container .search .terminal-form .morphsearch-input {
    	font-size: 4em;
    	width: 100%;
	    height: 100%;
	    padding: 0 10% 0 10px;
	    border: none;
	    background: transparent;
	    color: #333333;
	    outline: none;
	    line-height: normal;
	    text-align: center;
	}

	.home .container .search .terminal-form .morphsearch-submit {
	    pointer-events: auto;
	    opacity: 1;
	    -webkit-transform: translate3d(-30px,-50%,0) scale3d(1,1,1);
	    transform: translate3d(-30px,-50%,0) scale3d(1,1,1);
	    -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
	    transition: opacity 0.3s, transform 0.3s;
	    -webkit-transition-delay: 0.5s;
	    transition-delay: 0.5s;
	    position: absolute;
	    width: 80px;
	    height: 80px;
	    opacity: 0;
	}

	.home .container .search .terminal-form input[type="search"] {
	    -webkit-box-sizing: border-box;
	    box-sizing: border-box;
	    -webkit-appearance: textfield;
	    -moz-box-sizing: content-box;
	    -webkit-box-sizing: content-box;
	    box-sizing: content-box;
	}

	.home .container .menu-cat {
	    text-align: center;
	}

	.home .container .menu-cat ul {
	    text-decoration: none;
	    padding: 0;	
	}

	.home .container .menu-cat ul li {
	    display: inline-block;
	    padding: 1em;
	}

	.home .talks-field{
		width: 100%;
		margin: 7em auto;
	}

	.home .talks-field .more-recent-talks, .home .talks-field .more-commented-talks{
		position: relative;
		text-align: center;
		margin-bottom: 2em;
	}

	.home .talks-field .title{
		font-weight: 800;
    	font-size: 2em;
    	letter-spacing: 1px;
    	vertical-align: middle;
	}

	.home .talks-field .subjects{
	    font-size: 1em;
	    list-style: none;
	    padding: 0;
	}

</style>