<template>
  	<div class="container-fluid">
	  	<div class="home">
			<div class="header">
				<div class="title">
					<span>IMAC</span>
					<span>talks</span>
					<span>with you.</span>
				</div>
				<div class="description">Le réseau social de l'IMAC permet l'échange entre professeurs, étudiants et professionnels.</div>
				<i class="home-arrow fa fa-heart-o" aria-hidden="true"></i>
			</div>
			<div class="container">
				<div class="search">
					<div class="terminal-form">
						<form action="" method="get">
			            	<input type="text" name="search_text" id="search_text" placeholder="Rechercher..."/>
			            	<button type="submit" id="search_button" name="search_button" class="btn btn-success">
	                			<i class="fa fa-search"></i>
	            			</button>
			        	</form>
			        	<div class="clear"></div>
		        	</div>
				</div>
				<div class="clear"></div>
				<div class="menu-cat">
					<ul>
						<li><a href="#">Enseignement</a></li>
		            	<li><a href="#">Logement</a></li>
		            	<li><a href="#">Vie étudiante</a></li>
		            	<li><a href="#">Tutos</a></li>
		            	<li><a href="#">Divers</a></li>
		            	<li><a href="#">Actualités</a></li>
					</ul>
				</div>
				<div class="talks-field row">
					<div class="col-md-6">
						<div class="more-recent-talks">
							<p class="title text-uppercase">Sujets<br>recents</p>
							<ul class="subjects">
								<li v-for="subject in subjects"><a href=""> {{subjects.titleSubject}} </a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="more-commented-talks">
							<p class="title text-uppercase">Sujets<br>populaires</p>
							<ul class="subjects">
								<li  v-for="subject in subjects"><a href=""> {{subjects.titleSubject}} </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>


export default {
data() {
      return {
        subjects: []
      }
    },
    created(){
  		this.$http.get('http://localhost:8888/Projetweb/Social-Network-IMAC/api/public/').then(
  			(response)=>{
  				this.subjects = response.subjects;
  				console.log(response)},
  			(reject)=>{
          console.log("pas bien")
          //this.subjects = []
        }
  		)
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

	.home .header .container .clear{
		clear: both;
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

	.home .container .search{
		margin: 3em auto;
	}

	.home .container .search .clear{
		clear: both;
	}

	.home .container .search .terminal-form{
    	width: 80%;
    	margin: 0 auto;
    	position: relative;
    	max-width: 800px;
	    border-bottom:3px solid #333333;
	}

	.home .container .search .terminal-form .info-search{
		display: block;
		font-size: 1em;
		font-style: italic;
		margin: 1em 0;
	}

	.home .container .search .terminal-form #search_text, .home .container .search .terminal-form #search_button{
		font-size: 4em;
		border: none;
	    background: transparent;
	   	border: 0 none;
	   	color: #333333;
	   	outline: none;
	    line-height: normal;
	    display: block;
	    margin: 0 auto;
	    padding: 20px;
	    height: 100%;
	}

	.home .container .search .terminal-form #search_text {
    	width: 80%;
	    max-width: 600px;
	    border-left: 3px solid #333;
	    text-align: left;
	    float: left;
	}

	.home .container .search .terminal-form #search_text::-webkit-input-placeholder { /* WebKit browsers */
	    color: #333333;
	}
	.home .container .search .terminal-form #search_text:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
	    color: #333333;
	}
	.home .container .search .terminal-form #search_text::-moz-placeholder { /* Mozilla Firefox 19+ */
	    color: #333333;
	}
	.home .container .search .terminal-form #search_text:-ms-input-placeholder { /* Internet Explorer 10+ */
	    color: #333333;
	}

	.home .container .search .terminal-form #search_button {
	    width: 19%;
	    text-align: center;
	    cursor: pointer;
	    border-radius: 0;
	    float: right;
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
	    max-width: 900px;
	    width: 100%;
	    margin: 0 auto;
	}

	.home .container .menu-cat ul {
	    text-decoration: none;
	    padding: 0;
	}

	.home .container .menu-cat ul li {
	    display: inline-block;
	    padding: 1em 0;
	    width: 33%;
	    font-weight: 600;
	}

	.home .talks-field{
		width: 100%;
		margin: 7em auto;
		display: block;
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

	@media screen and (max-width: 600px) {

		.home .header .title{
			font-size: 4em;
			line-height: 1.5em;
		}

	    .home .container .search .terminal-form #search_text, .home .container .search .terminal-form #search_button{
	    	font-size: 2em;
	    }
	}

	@media screen and (max-width: 800px) {
		.home .container .menu-cat ul li {
		    display: inline-block;
		    width: 49%;
		}
	}

</style>