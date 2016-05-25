<template>
    <menu-component></menu-component>
    <div class="container-fluid page">
    	<div class="title-page">
        <h1>{{category.titleCat}}</h1>
        <div class="line green"></div>
        <div class="line blue"></div>
        <div class="line red"></div>
      </div>
      <div class="content">
      	<p class="tri">
          <a @click="orderKey = 'dateSubject'">Plus récent</a> -
          <a @click="orderKey = 'upVote'">Plus populaire</a>
        </p>
        <section class="row all-subjects">
        <template v-for="subject in subjects | orderBy orderKey -1">
            <div class="col-md-6 subject">
          		<div class="col-xs-3 vote">
                <div class="up">
          			   <div class="glyphicon glyphicon-arrow-up"></div> {{ subject.upVote }}
                </div>
                <div class="down">
          			   <div class="glyphicon glyphicon-arrow-down"></div> {{ subject.downVote }}
                </div>
          		</div>
          		<div class="col-xs-9 title"><p><a v-link="'subject'">{{ subject.titleSubject }}</a></p></div>
            </div>
        </template>
        </section>
      </div>
    </div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'

export default {
    data() {
      return {
        category: {
          "idCat": 1,
          "titleCat": "Cours"
        },
        subjects: [
          {
              "idSubject":1,
              "titleSubject":"Sujet 1",
              "contentSubject":"contenu du sujet",
              "dateSubject":"2016-05-20",
              "upVote":45,
              "downVote":7,
              "idUser":3,
              "idCat":1
          },
          {
              "idSubject":2,
              "titleSubject":"Sujet 2",
              "contentSubject":"contenu du sujet 2",
              "dateSubject":"2016-05-27",
              "upVote":50,
              "downVote":25,
              "idUser":5,
              "idCat":1
          },
          {
              "idSubject":3,
              "titleSubject":"Sujet 3",
              "contentSubject":"Contenu du sujet 3",
              "dateSubject":"2016-05-20",
              "upVote":40,
              "downVote":20,
              "idUser":3,
              "idCat":1
          },
          {
              "idSubject":4,
              "titleSubject":"Sujet 4",
              "contentSubject":"Contenu du sujet 4",
              "dateSubject":"2016-05-05",
              "upVote":4,
              "downVote":30,
              "idUser":3,
              "idCat":1
          },
          {
              "idSubject":5,
              "titleSubject":"Sujet 5",
              "contentSubject":"Contenu du sujet 5",
              "dateSubject":"2016-05-28",
              "upVote":38,
              "downVote":35,
              "idUser":5,
              "idCat":1
          },
          {
              "idSubject":6,
              "titleSubject":"Sujet 6",
              "contentSubject":"Contenu du sujet 6",
              "dateSubject":"2016-05-30",
              "upVote":27,
              "downVote":2,
              "idUser":3,
              "idCat":3
          }
        ],
        orderKey: "dateSubject"
      }
    },
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


</style>