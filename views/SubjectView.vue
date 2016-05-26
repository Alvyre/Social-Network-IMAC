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
      <template v-for="comment in subject.comment | orderBy 'dateComment' -1">
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
        users:[]
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