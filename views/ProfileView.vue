<template>
	<menu-component></menu-component>
	<div class="container-fluid page">
		<div class="profile row">

			<h3 class="text-center">Profil de</h3>
			<div class="line green"></div>
			<div class="line blue"></div>
			<div class="line red"></div>
			<h1 class="text-center">{{user.pseudoUser}}</h1>

			<div class="bio col-sm-6">
				<p>{{user.bioUser}}</p>
				<div class="br-bottom"></div>
			</div>

			<div class="clear"></div>

			<div class="avatar col-md-12">
				<div class="img-avatar" v-bind:style="{ backgroundImage: 'url(../assets/' + user.photoUser + ')' }"></div>
			</div>

			<div class="more-info col-md-12">
				<p><span>Statut :</span> {{user.statusUser}}</p>
				<p><span>Email :</span> <a href="mailto:{{ user.emailUser }}">{{ user.emailUser }}</a></p>
			</div>
		</div>
	</div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'

export default {
	data() {
      return {
		user : {
		        "idUser":0,
		        "pseudoUser":"Alichou",
		        "statusUser":"IMAC2017",
		        "photoUser":"avatar.jpg",
		        "emailUser":"alichou@gmail.com",
		        "sexUser":"F",
		        "bioUser": "Coucou les licornes c'est chouette ! Presque autant que les poneys en fait. Mais pas tout à fait ! Parce que les poneys c'est réel du coup c'est forcément mieux",
		        "adminUser":0,
		        "passUser":""
		}
      }
    },/*,
    created(){
  		this.$http.get('category').then(
  			(response)=>{this.subjects = response.subjects},
  			(reject)=>{
          console.log("pas bien")
          //this.subjects = []
        }
  		)
  	},*/
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

	.page .clear{
		clear: both;
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

	.page .profile .bio .br-bottom{
		width: 6px;
		background: #333333;
		height: 300px;
		margin: 1em auto;
		display: none;
	}

	@media screen and (max-width: 767px) {
		
		.page .profile .bio {
		    text-align: center;
		    border-left: 0;
		    padding: 10px;
		    float: right;
		}

		.page .profile .bio .br-bottom{
			margin: 70px auto 0 auto;
			display: block;
		}
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

	.page .profile .more-info{
		margin: 2em auto;
		font-size: 1.2em;
		text-align: center;
	}

	.page .profile .more-info span{
		font-weight: 800;
	}

</style>