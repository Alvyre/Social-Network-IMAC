<template>
	<header>
		<div class="go-home"><a v-link="'/home'"><img src="../assets/logo.svg" width="50" height="50" />IMAC Talks</a></div>
		<div class="connect">
			<a v-if="!connected" v-link="'/signup'">S'inscrire / Connexion</a>
			<a v-if="connected"  @click.prevent="logout" href="">Bonjour {{pseudo}} / <span class="logout">Se déconnecter</span></a>
		</div>
		<div class="clear">
	</header>
</template>

<script>
	export default {
    data(){
      return {
      	connected: '',
      	pseudo: ''
      }
  	},
  	methods: {
      	logout: function(){
      		document.cookie = "idUser=; expires=Thu, 01 Jan 1970 00:00:00 GMT"
      		document.cookie = "pseudo=; expires=Thu, 01 Jan 1970 00:00:00 GMT"
      		this.connected = ''
      		this.$route.router.go('/home')
      		location.reload()
      	}
    },
    created(){

    	function getCookie(cname) {
          var name = cname + "=";
          var ca = document.cookie.split(';');
          for(var i = 0; i <ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0)==' ') {
                  c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                  return c.substring(name.length,c.length);
              }
          }
          return "";
        }

        this.pseudo = getCookie("pseudo")
        if(this.pseudo != '' && getCookie('idUser'))
			this.connected = "true" 
    }
  }
</script>


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

	header .connect .logout{
		color: #cb1b29;
	}
</style>