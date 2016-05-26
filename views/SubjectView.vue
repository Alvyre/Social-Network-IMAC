<template>
  <menu-component></menu-component>
  <div class="container-fluid page">
    <p class="category-name"><a v-link="'category'">Catégorie : {{ category.titleCat}}</a></p>
    <h1 class="title-subject">
      <i class="fa fa-quote-left" aria-hidden="true"></i>
        {{subject.titleSubject}}
      <i class="fa fa-quote-right" aria-hidden="true"></i>
    </h1>
    <div class="info">
       <div class="subject-vote col-md-12 text-center"><div class="glyphicon glyphicon-arrow-up"></div> <span>{{subject.upVote}}</span> <div class="glyphicon glyphicon-arrow-down"></div> <span>{{subject.downVote}}</span></div>
      <p>Lancé par {{subject.author}}, le {{subject.dateSubject}}</p>
    </div>
    <div class="content-subject">
      <p> {{subject.contentSubject}} </p>
    </div>

    <div class="subject-comments row">
      <div class="separator">
        <div class="line green"></div>
        <div class="line blue"></div>
        <div class="line red"></div>
      </div>
      <template v-for="comment in comments | orderBy 'dateComment' -1">
        <div class="new-comment col-md-6 col-md-offset-3">
          <div class="vote col-md-12">
            <p><div class="glyphicon glyphicon-arrow-up"></div> {{comment.upVote}} <div class="glyphicon glyphicon-arrow-down"></div> {{comment.downVote}} </p>
          </div>
          <div class="comment col-md-12">
            <p><span class="name-user">{{ users[comment.idUser].pseudoUser }} : </span> <span class="content-comment">{{comment.contentComment}}</span> <span class="date-comment">(publié le {{comment.dateComment}})</span></p>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'

export default {
data () {
      return {
        category: {
          "idCat":1,
          "titleCat":"Cours"
        },
        subject:
        {
          "idSubject":1,
          "titleSubject":"Sujet 1",
          "contentSubject":"contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet contenu du sujet ",
          "dateSubject":"2016-05-20",
          "upVote":45,
          "downVote":7,
          "author": "Alice",
          "idUser":0,
          "idCat":1
        },
        comments:
        [
          {
              "idComment":1,
              "dateComment":"2016-05-18",
              "contentComment":"Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 Contenu du commentaire 1 ",
              "idVote":0,
              "idUser":0,
              "idSubject":1
          },
          {
              "idComment":2,
              "dateComment":"2016-05-10",
              "contentComment":"Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 Contenu du commentaire 2 ",
              "idVote":0,
              "idUser":1,
              "idSubject":1
          },
          {
              "idComment":3,
              "dateComment":"2016-05-27",
              "contentComment":"Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 Commentaire 3 ",
              "idVote":0,
              "idUser":0,
              "idSubject":2
          },
          {
              "idComment":4,
              "dateComment":"2016-05-12",
              "contentComment":"Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 Commentaire 4 ",
              "idVote":0,
              "idUser":0,
              "idSubject":2
          },
          {
              "idComment":5,
              "dateComment":"2016-05-10",
              "contentComment":"Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 Commentaire 5 ",
              "idVote":0,
              "idUser":0,
              "idSubject":2
          },
          {
              "idComment":6,
              "dateComment":"2016-05-11",
              "contentComment":"Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6 Commentaire 6",
              "idVote":0,
              "idUser":0,
              "idSubject":2
          },
          {
              "idComment":7,
              "dateComment":"2016-05-11",
              "contentComment":"Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 Commentaire 7 ",
              "idVote":0,
              "idUser":1,
              "idSubject":4
          },
          {
              "idComment":8,
              "dateComment":"2016-05-03",
              "contentComment":"Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 Commentaire 8 ",
              "idVote":0,
              "idUser":1,
              "idSubject":5
          },
          {
              "idComment":9,
              "dateComment":"2016-05-10",
              "contentComment":"Commentaire 9 Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9 Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9Commentaire 9",
              "idVote":0,
              "idUser":1,
              "idSubject":6
          },
          {
              "idComment":10,
              "dateComment":"2016-05-27",
              "contentComment":"Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 Commentaire 10 ",
              "idVote":0,
              "idUser":1,
              "idSubject":1
          }
        ],
        users:
        [
          {
              "idUser":0,
              "pseudoUser":"Arthur",
              "statusUser":"Galaxy",
              "photoUser":"www.photoUranus.fr",
              "emailUser":"arthur@gmail.com",
              "sexUser":"Autre",
              "bioUser":null,
              "adminUser":0,
              "passUser":""
          },
          {
              "idUser":1,
              "pseudoUser":"Luca",
              "statusUser":"statusUser",
              "photoUser":"photoUser",
              "emailUser":"emailUser",
              "sexUser":"",
              "bioUser":"bioUser",
              "adminUser":0,
              "passUser":"passUser"
          }
        ]
      }
    }/*,
    created(){
    this.$http.get('subject').then(
      (response)=>{this.subject = response.subject},
      (reject)=>{console.log("pas bien")}
    )}*/,
    components: {
      MenuComponent
    }
}
</script>

<style type="text/css">

  @import url(https://fonts.googleapis.com/css?family=Cutive+Mono);

  .page{
    min-height: 100vh;
  }

  .page .content {
    margin-bottom: 3em;
  }

  .page h1, .page p, .page h4{
    text-align: center;
    max-width: 600px;
    margin: 2em auto;
  }

  .page h1.title-subject i{
    display: block;
  }

  .page h1.title-subject i:first-child{
    text-align: left;
    margin-bottom: 1em;
  }

  .page h1.title-subject i:last-child{
    text-align: right;
    margin-top:1em;
  }

  .page p.category-name{
    text-transform: uppercase;
  }

  .page .info{
    font-weight: 600;
  }

  .page .info .subject-vote{
    margin: 1em auto;
  }

  .page .info .subject-vote span{
    padding-right: 1em;
  }

  .page .content-subject{
    font-family: 'Cutive Mono';
  }

  .page .subject-comments{
    margin: 6em auto;
    padding: 1em;
  }

  .page .subject-comments .separator{
    margin-bottom: 6em;
  }

  .page .subject-comments .separator .line{
    height: 15px;
    max-width: 80px;
    border-bottom: 3px solid #ccc;
    width: 80%;
    margin: 0 auto;
  }

  .page .subject-comments .separator .line.green{
    border-bottom: 6px solid #7ec348;
  }

  .page .subject-comments .separator .line.blue{
    border-bottom: 6px solid #1c99d6;
  }

  .page .subject-comments .separator .line.red{
    border-bottom: 6px solid #cb1b29;
  }

  .page .subject-comments .new-comment{
    margin-bottom: 6em;
  }

  .page .subject-comments .vote{
    text-align: right;
  }

  .page .subject-comments .comment{
    border-bottom: 2px solid #E3E3E3;
  }

  .page .subject-comments .comment p{
    text-align: left;
  }

  .page .subject-comments .comment .name-user{
    font-weight: 600;
    text-transform: uppercase;
    color: #cb1b29;
    padding-right: 1em;
  }

  .page .subject-comments .comment .content-comment{
    font-family: 'Cutive Mono';
    letter-spacing: 3px;
  }

  .page .subject-comments .comment .date-comment{
    color: #1c99d6;
    font-style: italic;;
  }

</style>