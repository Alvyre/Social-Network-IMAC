<template>
	<menu-component></menu-component>
	<div class="container-fluid page">
		<div class="profile row">

			<h3 class="text-center">Profil de</h3>
			<div class="line green"></div>
			<div class="line blue"></div>
			<div class="line red"></div>
			<h1 class="text-center">Alice</h1>

			<div class="bio col-md-6">
				Welcome to an all-too-familiar episode of <em>Sunday Night Anxiety</em>. Time to remind myself I've made it through 1325 weeks, and I'm likely to make it through another one. <br><br> <span id="herewego">Here we go.</span>
			</div>

			<div class="avatar col-md-12">
				<div class="img-avatar" style="background-image:url('../assets/avatar.jpg')"/></div>
			</div>
		</div>
	</div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'

export default {
  components: {
  	MenuComponent
  }
}
</script>

<style type="text/css">

	.page .profile{
	    max-width: 800px;
	    width: 80%;
	    margin: 1em auto 4em auto;
	    min-height: 400px;
	}

	.page .profile .line{
	    height: 15px;
	    max-width: 80px;
	    border-bottom: 3px solid #ccc;
	    width: 80%;
	    margin: 0 auto;
	}

	.page .profile .line.green{
	    border-bottom: 6px solid #7ec348;
	}

	.page .profile .line.blue{
	    border-bottom: 6px solid #1c99d6;
	}

	.page .profile .line.red{
	    border-bottom: 6px solid #cb1b29;
	}

	.page .profile h3{
		margin: 2em auto;
		font-size: 1.5em;
		text-transform: uppercase;
	}

	.page .profile h1{
		margin: 2em auto;
		font-size: 4em;
	}

	.page .profile .bio {
	    font-size: 1.5em;
	    text-align: left;
	    border-left: 6px solid #333333;
	    padding: 0px 75px 300px 75px;
	    margin-bottom: 50px;
	    float: right;
	}

	.page .profile .avatar{
		margin: 0 auto;
	}


	.page .profile .avatar .img-avatar{
		width: 250px;
    	height: 250px;
    	border: 6px solid #333333;
    	margin: 0 auto;
    	background-size: cover;
	}
</style>