<template>
	<header-component></header-component>
	<router-view
      keep-alive
      transition
      transition-mode="out-in">
    </router-view>
  <footer-component></footer-component>
</template>

<script>

import HeaderComponent from './HeaderComponent.vue'
import FooterComponent from './FooterComponent.vue'

export default {
  components: {
  	HeaderComponent,
  	FooterComponent
  }
}
</script>

<style type="text/css">

	@import url(https://fonts.googleapis.com/css?family=Cutive+Mono);
	@import url(https://fonts.googleapis.com/css?family=Lato:400,100,300,100italic,900italic,900,700italic,700,400italic,300italic);

	html, body{
		margin:0;
		font-family: 'Lato';
		background: #F6F6F8;
	}

	a:link, a:visited, a:hover, a:active {
    	color: #333333;
    	text-decoration: none;
	}

	.container-fluid{
		padding: 0;
		margin: 0;
	}

	

</style>