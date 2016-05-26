<template>
    <menu-component></menu-component>
    <div class="container-fluid page">
    	<div class="title-page">
        <h1>Recherche</h1>
        <div class="line green"></div>
        <div class="line blue"></div>
        <div class="line red"></div>
      </div>
      <div class="content row">
      	<div v-if="resultsSearchComment.length > 0" class="col-md-3 col-md-offset-2 search-comments">
          <h4>Commentaires</h4>
          <ul>
            <li v-for="resultSearchComment in resultsSearchComment"><a v-link="'/category'">{{resultSearchComment.contentComment}}</a></li>
          </ul>
        </div>
        <div v-if="resultsSearchUser.length > 0" class="col-md-3 col-md-offset-2 search-users">
          <h4>Utilisateurs</h4>
          <ul>
            <li v-for="resultSearchUser in resultsSearchUser"><a v-link="'/category'">{{resultSearchUser.pseudoUser}}, <span>{{resultSearchUser.statusUser}}</span></a></li>
          </ul>
        </div>
        <div v-if="resultsSearchCategory.length > 0" class="col-md-3 col-md-offset-2 search-category">
          <h4>Catégorie</h4>
          <ul>
            <li v-for="resultSearchCategory in resultsSearchCategory"><a v-link="'/category'">{{resultSearchCategory.titleCat}}</a></li>
          </ul>
        </div>
        <div v-if="!noResult" class="no-result">
          <h4>Aucun résultat a été trouvé</h4>
          <p>Chercher un nom d'utilisateur</p>
        </div>
      </div>
    </div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'
import {apiRoot} from '../config/localhost/settings.js'

export default {
    data() {
      return {
        resultsSearchComment: [],
        resultsSearchUser: [],
        resultsSearchCategory: [],
        noResult: false
      }
    },
    route: {
      data ({ to }) {
        this.noResult = false;
        this.$http.get( apiRoot() + 'search/' + to.params.text + '&comment&0&0' ).then(
          (response)=>{
            this.resultsSearchComment = response.data
            if(response.data.length != 0){
              this.noResult = true;
            }
          },
          (reject)=>{
            console.log('Search comments not found')
          }
        ),
        this.$http.get( apiRoot() + 'search/' + to.params.text + '&0&user&0' ).then(
          (response)=>{
            this.resultsSearchUser = response.data
            if(response.data.length != 0){
              this.noResult = true;
            }
          },
          (reject)=>{
            console.log('Search users not found')
          }
        ),
        this.$http.get( apiRoot() + 'search/' + to.params.text + '&0&0&category' ).then(
          (response)=>{
            this.resultsSearchCategory = response.data
            if(response.data.length != 0){
              this.noResult = true;
            }
          },
          (reject)=>{
            console.log('Search category not found')
          }
        )
      }
    },
  	components: {
      MenuComponent
  	}
}
</script>

<style type="text/css">
  a{
    cursor: pointer;
  }

  .page .title-page{
    margin: 0 auto 6em auto;
  }

  .page .title-page h1{
    text-align: center;
    padding: 1em 0 0 0;
    font-size: 5em;
    margin-top:0;
    margin-bottom: 0.5em;
  }

  .page .title-page .line{
    height: 15px;
    max-width: 80px;
    border-bottom: 3px solid #ccc;
    width: 80%;
    margin: 0 auto;
  }

  .page .title-page .line.green{
    border-bottom: 6px solid #7ec348;
  }

  .page .title-page .line.blue{
    border-bottom: 6px solid #1c99d6;
  }

  .page .title-page .line.red{
    border-bottom: 6px solid #cb1b29;
  }

  .page .content .search-comments, .page .content .search-users, .page .content .search-category{
    background: #fff;
    padding-top: 1em;
    padding-bottom: 1em;
  }

  .page .content .search-comments h4:after, .page .content .search-users h4:after, .page .content .search-category h4:after{
    height: 4px;
    width: 50%;
    background: #333333;
    content: '';
    display: block;
    margin: 20px auto;
  }

  .page .content .search-comments ul, .page .content .search-users ul, .page .content .search-category ul{
    padding-bottom: 2em;
    list-style: none;
    padding-left: 0;
  }

  .page .content .search-comments ul li, .page .content .search-users ul li, .page .content .search-category ul li{
    text-align: center;
    padding-bottom: 1em;
    border-bottom: 2px solid #eeeeee;
  }


</style>