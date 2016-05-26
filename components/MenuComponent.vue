<template>
	<div class="menu">
		<ul class="nav">
		    <li id="search">
		        <form action="" method="get">
		            <input v-model="searchText" type="text" name="search_text" id="search_text" placeholder="Search"/>
		            <button @click.prevent="sendResearch" type="submit" id="search_button" name="search_button" class="btn btn-success">
                		<i class="fa fa-search"></i>
            		</button>
		        </form>
		    </li>
		    <li id="options">
		        <a href="#">Catégories <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		        <ul class="subnav">
		            <li v-for="category in categories"><a v-link="'/category/'+category.idCat">{{category.titleCat}}</a></li>
		        </ul>
		    </li>
		</ul>
		<div class="clear"></div>
	</div>
</template>

<script>

import {apiRoot} from '../config/localhost/settings.js'

export default {

data() {
      return {
        categories: [],
        searchText: ''
      }
    },
    methods:{
    	sendResearch:function(){
    		this.$route.router.go('/search/' + this.searchText)
    	}
    },
    created(){
  		this.$http.get(apiRoot() + 'category-getall').then(
  			(response)=>{
  				this.categories = response.data;
  			},
  			(reject)=>{
          console.log("Data not found")
        }
  		)
  	}
}
</script>

<style type="text/css">

	.menu{
		background: #333333;
		font-family: 'Lato';
	}

	.menu .clear{
		clear: both;
	}

	.menu .nav {
	    display: inline-block;
	    float: right;
	    padding: 1em;
	}

	.menu .nav li {
	    float: left;
	    list-style-type: none;
	    position: relative;
	}

	.menu .nav li a {
	    color: #ffffff;
	    display: block;
	    line-height: 60px;
	    padding: 0 26px;
	    text-decoration: none;
	    border-left: 1px solid #ffffff;
	    font-size: 16px;
	}
	.menu .nav li a:hover {
	    background-color: #333333;
	}

	.menu #settings a {
	    padding: 18px;
	    height: 24px;
	    font-size: 10px;
	    line-height: 24px;
	}

	.menu #search {
	    width: 357px;
	    margin: 4px;
	}
	.menu #search_text{
	    width: 297px;
	    padding: 15px 0 15px 26px;
	    font-size: 16px;
	    border: 0 none;
	    height: 52px;
	    margin-right: 0;
	    color: white;
	    outline: none;
	    background: #333333;
	    border-bottom: 2px solid #ffffff;
	    float: left;
	    box-sizing: border-box;
	    transition: all 0.15s;
	}
	.menu #search_text::-webkit-input-placeholder { /* WebKit browsers */
	    color: #fff;
	}
	.menu #search_text:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
	    color: #fff;
	}
	.menu #search_text::-moz-placeholder { /* Mozilla Firefox 19+ */
	    color: #fff;
	}
	.menu #search_text:-ms-input-placeholder { /* Internet Explorer 10+ */
	    color: #fff;
	}
	.menu #search_button {
	    border: 0 none;
	    width: 60px;
	    float: left;
	    padding: 0;
	    text-align: center;
	    height: 52px;
	    cursor: pointer;
	    background: #333;
	    border-bottom:2px solid #ffffff;
	    border-right:2px solid #ffffff;
	    border-radius: 0;
	}

	.menu #options a{
	    border-left: 0 none;
	}

	.menu #options a i{
	    margin-left:20px;
	}

	.menu #options>a {
	    background-position: 85% center;
	    background-repeat: no-repeat;
	    padding-right: 42px;
	}
	.menu .subnav {
	    visibility: hidden;
	    position: absolute;
	    top: 110%;
	    right: 0;
	    width: 200px;
	    height: auto;
	    opacity: 0;
	    transition: all 0.1s;
	    background: #333333;
	    padding: 0
	}
	.menu .subnav li {
	    float: none;
	}
	.menu .subnav li a {
	    border-bottom: 1px solid #2e2e2e;
	}
	.menu #options:hover .subnav {
	    visibility: visible;
	    top: 100%;
	    opacity: 1;
		z-index: 9;
	}

	.menu #options > a:focus, .menu #options > a:hover, .menu > a:focus, .menu > a:hover{
		background: #333333;
	}

	@media screen and (max-width: 600px) {
		.menu .nav{
			float: none;
			width: 100%;
			padding: 1em 1em 0.2em 1em;
		}
		.menu #search{
			width: 100%;
			margin: 0 auto;
			display: block;
		}

		.menu #search_text{
			width: 90%;
		}

		.menu #search_button{
			width: 10%;
		}

		.menu #options{
			width: 100%;
			float: left;
			display: block;
			margin-top: 1em;
		}

		.menu #options a{
		    padding: 0 25px;
		}

		.menu #options a i{
    		float: right;
    		margin-top: 20px;
    		display: block;
		}

		.menu .subnav{
			left: 0;
			width: 100%;
		}
	}

</style>