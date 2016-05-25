<template>
  	<h1>Category Title</h1>
  	<p>TRI - Plus récent - Plus populaire</p>
  	<section class="row">
  		<div class="col-xs-3">
  			<div class="glyphicon glyphicon-arrow-up"></div> 45
  			<div class="glyphicon glyphicon-arrow-down"></div> 2
  		</div>
  		<div class="col-xs-9">Subject Title</div>
  	</section>
  	<section class="row">
  		<div class="col-xs-3">
  			<div class="glyphicon glyphicon-arrow-up"></div> 45
  			<div class="glyphicon glyphicon-arrow-down"></div> 2
  		</div>
  		<div class="col-xs-9">Subject Title</div>
  	</section>
  	<section class="row">
  		<div class="col-xs-3">
  			<div class="glyphicon glyphicon-arrow-up"></div> 45
  			<div class="glyphicon glyphicon-arrow-down"></div> 2
  		</div>
  		<div class="col-xs-9">Subject Title</div>
  	</section>
</template>

<script>


export default {
	data() {
		return {subject: {}}
	},
	created(){
		this.$http.get('category').then(
			(response)=>{this.subject = response.data},
			(reject)=>{console.log("pas bien")}
		)
	}/*,
  	components: {
  	}*/
}
</script>

<style type="text/css">

</style>