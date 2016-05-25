<template>
	<menu-component></menu-component>
	<div class="container-fluid">
		<div class="row">
			<img v-bind:src="'../assets/'+user.photoUser" class="col-xs-3" />
			<div class="col-xs-9">
				<p>Pseudo : {{user.pseudoUser}} </p>
				<p>Statut : {{user.statusUser}}</p>
				<p>email : {{user.emailUser}}</p>
			</div>

		</div>
		<div class="row">
			<div class="col-xs-10">
				<p>Bio :</p>
				<p> {{user.bioUser}} </p>
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
    }/*,
    created(){
  		this.$http.get('category').then(
  			(response)=>{this.subjects = response.subjects},
  			(reject)=>{
          console.log("pas bien")
          //this.subjects = []
        }
  		)
  	},
  	components: {
  	}*/
}
</script>

<style type="text/css">
img {
}
</style>