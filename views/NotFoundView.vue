<template>
    <menu-component></menu-component>
    <div class="container-fluid page">
    	<div class="title-page">
        <h1>Rien n'a été trouvé à cet endroit</h1>
        <div class="line green"></div>
        <div class="line blue"></div>
        <div class="line red"></div>
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
        votes: [],
        nbUpVotes: 0,
        orderKey: "dateSubject",
        data_POST: []
      }
    },
    route: {
      data ({ to }) {
        this.data_POST = {
          idCat : to.params.id
        }
        this.$http.post(apiRoot()  + 'category-sub/'+ to.params.id, this.data_POST).then(
          (response)=>{
            this.category = response.data[0]
          },
          (reject)=>{
            console.log("Category not found")
          }
        ),
        this.$http.post(apiRoot()  + 'vote-getall').then(
          (response)=>{
            this.votes = response.data[0]
            console.log(response);
          },
          (reject)=>{
            console.log("Votes not found")
          }
        )
      }
    },
    methods:{
      getUpVote: function getUpVote(idSubject) {
        var nbVotes = 0;
/*        console.log(vote)
        for(var i = 0; i<votes.length; i++){
          console.log(votes[i])
          if(idSubject === vote.idSubject){
            if(vote.upVote) nbVotes++;
          }
        }*/
        return nbVotes;
      },
      getDownVote: function getUpVote(idSubject) {
        var nbVotes = 0;
        /*console.log("downvotes idsubject - " + idSubject)
        votes.foreach(vote) {
          if(idSubject === vote.idSubject){
            if(vote.upVote) nbVotes++;
          }
        }*/
        return nbVotes;
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