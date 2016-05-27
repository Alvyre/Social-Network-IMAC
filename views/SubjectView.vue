<template>
  <menu-component></menu-component>
  <div class="container-fluid page">
    <p class="category-name"><a v-link="'/category/'+subject.cat.idCat">Catégorie : {{subject.cat.titleCat}}</a></p>
    <h1 class="title-subject">
      <i class="fa fa-quote-left" aria-hidden="true"></i>
        {{subject.titleSubject}}
      <i class="fa fa-quote-right" aria-hidden="true"></i>
    </h1>
    <div class="info">
       <div class="subject-vote col-md-12 text-center"><div class="glyphicon glyphicon-arrow-up"></div> <span>{{  }}</span> <div class="glyphicon glyphicon-arrow-down"></div> <span>{{  }}</span></div>
      <p>Lancé par <a v-link="'/user/'+subject.user.idUser">{{subject.user.pseudoUser}}</a>, le {{subject.dateSubject}}</p>
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
      <template v-for="comment in subject.comment">
        <div class="new-comment col-md-6 col-md-offset-3">
          <div class="comment col-md-12">
            <p>
              <span class="name-user" v-for="user in users">
                <span v-if="user.idUser == comment.idUser"><a v-link="'/user/'+comment.idUser">{{user.pseudoUser}} :</a></span>
              </span>
              <span class="content-comment">{{comment.contentComment}}</span>
              <span class="date-comment">(publié le {{comment.dateComment}})</span>
            </p>
          </div>
        </div>
      </template>
      <div style="clear:both"></div>
      <div class="info-connected" v-if="connected">
          <form action="" method="POST" class="" role="form">
            <div class="form-group text-center col-xs-6 col-xs-offset-3">
              <legend>Ajouter un commentaire</legend>
            </div>
            <div class="form-group col-xs-6 col-xs-offset-3">
              <textarea class="form-control" rows="5" placeholder="Commentaire..." name="comment" class="form-control" required v-model="addNewComment"></textarea> 
            </div>
            <div style="clear:both"></div>
            <div class="alert alert-warning text-center col-xs-4 col-xs-offset-4" v-if="addNewCommentNull">
              <strong>Veuillez entrez un commentaire</strong>
            </div>
            <div class="alert alert-success text-center col-xs-4 col-xs-offset-4" v-if="addCommentConfirm">
              <strong>Commentaire ajouté !</strong>
            </div>
            <div class="alert alert-danger text-center col-xs-4 col-xs-offset-4" v-if="addCommentConfirmNot">
              <strong>Commentaire non ajouté !</strong>
            </div>
            <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-5" @click.prevent="addComment">Ajouter</button>
          </div>
        </form>
      </div>

      <div v-if="!connected" class="info-no-connected text-center col-xs-6 col-xs-offset-3">
        <p>Si vous voulez  participer à cette discussion :</p>
        <button v-link="'/signup'" type="submit" class="btn btn-primary col-xs-4 col-xs-offset-4">Connectez-vous !</button>
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
        subject:[],
        users:[],
        connected: false,
        pseudo: '',
        idUser: '',
        idSubject: '',
        addNewComment: '',
        addNewCommentNull: false,
        addCommentConfirm: false,
        addCommentConfirmText: '',
        addCommentConfirmNot : false,
        addCommentConfirmNotText: ''
      }
    },
    methods:{
      addComment: function(){
        if(this.addNewComment == ''){
          this.addNewCommentNull = true
        }
        else{
          this.addNewCommentNull = false
          this.$http.get(apiRoot()  + '/comment-create/' + this.addNewComment +'&' + this.idUser + '&' + this.idSubject).then(
            (response)=>{
              this.addCommentConfirm = true
              this.addCommentConfirmText = response
              this.getComment()
              this.addNewComment = ''
            },
            (reject)=>{
              this.addCommentConfirmNot = true
              console.log("Cannot add comment")
            }
          )
        }
      },
      getComment: function(){
        this.$http.get(apiRoot()  + 'subject-get/'+ this.idSubject).then(
          (response)=>{
            if(response.data.length == 0){
              this.$route.router.go('/404')
            }
            else{
              this.idSubject = this.idSubject;
              this.subject = response.data[0]
            }
          },
          (reject)=>{
            console.log("Category not found")
          }
        )
      }
    },
    route: {
      data ({ to }) {
        this.$http.get(apiRoot()  + 'subject-get/'+ to.params.id).then(
          (response)=>{
            if(response.data.length == 0){
              this.$route.router.go('/404')
            }
            else{
              this.idSubject = to.params.id;
              this.subject = response.data[0]
            }
          },
          (reject)=>{
            console.log("Category not found")
          }
        ),
        this.$http.get(apiRoot()  + 'user-getall').then(
          (response)=>{
            this.users = response.data
          },
          (reject)=>{
            console.log("Users not found")
          }
        )
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
        this.idUser = getCookie('idUser')
        if(this.pseudo != '' && this.idUser != ''){
          this.connected = true 
        }
    },
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
    margin: 6em auto 1em auto;
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

  .page .info-no-connected{
    background: #ffffff;
    margin-bottom: 6em;
    padding-bottom: 3em;
    text-align: center;
  }

  .page .info-no-connected button, .page .info-connected button{
    background: #333333;
    outline: none !important;
    border: 0;
  }

</style>