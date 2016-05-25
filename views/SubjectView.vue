<template>
    <h1>{{subject.titleSubject}}</h1>
    <p>Auteur : {{subject.author}} - Date : {{subject.dateSubject}}</p>
    <p> {{subject.contentSubject}} </p>

    <h1>Commentaires</h1>
    <template v-for="comment in comments | orderBy 'dateComment' -1">
      <div class="col-xs-2">
        <a href=""><div class="glyphicon glyphicon-arrow-up"></div></a>
        <a href=""><div class="glyphicon glyphicon-arrow-down"></div></a>
      </div>
      <div class="comment col-xs-10">
        <p> {{ users[comment.idUser].pseudoUser }} - {{comment.dateComment}}</p>
        <p> {{comment.contentComment}} </p>
      </div>
    </template>
</template>

<script>
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
    },
    created(){
    this.$http.get('subject').then(
      (response)=>{this.subject = response.subject},
      (reject)=>{console.log("pas bien")}
    )}
}
</script>

<style type="text/css">
</style>