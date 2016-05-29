<template>
    <menu-component></menu-component>
    <div class="container-fluid page">
    	<div class="title-page">
        <h1>{{category.titleCat}}</h1>
        <div class="line green"></div>
        <div class="line blue"></div>
        <div class="line red"></div>
      </div>
      <div class="create-subject row">
        <button class="btn btn-primary col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4" v-link="'/subject-create'">Créer un sujet</button>
      </div>
      <div class="content">
      	<p class="tri">
          <a @click="orderKey = 'dateSubject'">Plus récent</a> -
          <a @click="orderKey = 'upVote'">Plus populaire</a>
        </p>
        <section class="row all-subjects">
        <template v-for="subject in category.sub | orderBy orderKey -1">
            <div class="col-md-6 subject">
          		<div class="col-xs-3 vote">
                <div class="up">
          			   <div class="glyphicon glyphicon-arrow-up"></div> 0
                </div>
                <div class="down">
          			   <div class="glyphicon glyphicon-arrow-down"></div> 0
                </div>
          		</div>
          		<div class="col-xs-9 title"><p><a v-link="'/subject/'+subject.idSubject">{{ subject.titleSubject }}</a></p></div>
            </div>
        </template>
        </section>
      </div>
    </div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'
import {apiRoot} from '../config/localhost/settings.js'

export default {
    data() {
      return {
        category: [],
        orderKey: "dateSubject",
        data_POST: []
      }
    },
    route: {
      data ({ to }) {
        this.data_POST = {
          idCat: to.params.id
        }
        this.$http.post(apiRoot()  + 'category-sub/'+ to.params.id, this.data_POST ).then(
          (response)=>{
            if(response.data.length == 0){
              this.$route.router.go('/404')
            }
             else{
              this.category = response.data[0];
            }
          },
          (reject)=>{
            console.log("Category not found")
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

  .page .content .tri{
    text-align: center;
  }

  .page .content .tri a{
    padding: 1em;
    color: #333333;
    text-transform: uppercase;
  }

  .page .content .all-subjects{
    max-width: 800px;
    margin: 3em auto;
    width: 100%;
    text-align: left;
  }

  .page .content .all-subjects .subject{
    margin: 1em auto;
    height: 5em;
  }

  .page .content .all-subjects .subject .title, .page .content .all-subjects .subject .vote{
    background: #fff;
    padding-top: 1em;
    padding-bottom: 1em;
    height: 5em;
  }

  .page .content .all-subjects .subject .title{
    height: 5em;
    line-height: 3em;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: left;
  }

  .page .content .all-subjects .subject .title p{
    margin: 0 auto;
    text-align: left;
  }

  .page .content .all-subjects .subject .title p a{
    display: block;
    text-align: left;
  }

  .page .content .all-subjects .subject .vote{
    font-weight: 800;
  }

  .page .content .all-subjects .subject .vote .up, .page .content .all-subjects .subject .vote .down{
    display: block;
  }

  .page .content .all-subjects .subject .vote .up .glyphicon{
    color: #7ec348;
  }

  .page .content .all-subjects .subject .vote .down .glyphicon{
    color: #cb1b29;
  }

  .page .create-subject button{
    background: #333333;
    outline: none !important;
    border: 0;
    padding: 1em;
    margin-bottom: 3em;
  }

</style>