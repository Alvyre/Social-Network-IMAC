<template>
  <menu-component></menu-component>
  <div class="container-fluid page">

    <h1>Connectez-vous avec la communauté IMAC Talks</h1>
    
    <p>Que vous soyez interne à l'école ou pas, venez participer aux discussions autout de l'IMAC. Actuellement <strong>étudiant</strong> ? Faîtes part de votre ressenti et des matières proposées à l'IMAC. <strong>Ancien</strong> étudiant ? Exprimez-vous sur ce que l'IMAC vous a apporté et ce que vous faîtes à présent. <strong>Professeur</strong> ? Confiez des conseils ou des astuces pour mieux apprendre. <strong>Professionnel</strong> ? Partagez vos attentes et votre exprériences.</p>

    <h4>Ici, tout le monde s'y retrouve !</h4>

    <div class="row content">
      <div class="col-xs-10 col-sm-6 col-md-6 col-lg-6 col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
        <div id="btn-choice" class="row">
          <button @click="connect = false, sign = true" type="button" class="btn btn-primary col-md-3 col-md-offset-2 col-xs-8 col-xs-offset-2">S'inscrire</button>
          <button @click="connect = true, sign = false" type="button" class="btn btn-primary col-md-3 col-md-offset-2 col-xs-8 col-xs-offset-2">Se connecter</button>
        </div>

        <div class="inscription" id="inscription" v-show="!connect && sign">
          <form action="" method="POST" role="form">
            <legend>Inscription</legend>

            <div class="form-group col-md-6">
              <div class="alert alert-danger" v-if='!pseudo'>
                <strong>Ce champs est nécessaire</strong>
              </div>
              <label for="pseudo">Pseudo :</label>
              <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" required v-model="pseudo">
            </div>
            <div class="form-group col-md-6">
              <div class="alert alert-danger" v-if='!password'>
                <strong>Ce champs est nécessaire</strong>
              </div>
              <label for="pwd">Mot de passe :</label>
              <input type="password" name="password" class="form-control" id="password" required v-model="password">
            </div>
            <div class="form-group col-md-6">
              <div class="alert alert-danger" v-if='!status'>
              <strong>Ce champs est nécessaire</strong>
              </div>
              <label for="status">Status :</label>
              <input type="text" name="status" class="form-control" id="status" placeholder="IMAC201X, Prof, ..." required v-model="status">
            </div>
            <div class="form-group col-md-6">
              <div class="alert alert-danger" v-if='!mail'>
              <strong>Ce champs est nécessaire</strong>
              </div>
              <div class="alert alert-warning" v-if="mail && !mail.includes('@')">
                <strong>Votre @mail n'est pas valide</strong>
              </div>
              <label for="mail">E-mail :</label>
              <input type="mail" name="mail" class="form-control" id="mail" placeholder="foo@mail.com" required v-model="mail" v-model="mail">
            </div>
            <div class="form-group col-md-12">
              <label for="sex"> Sexe :</label>
              <select name="sex" id="sex" class="form-control" v-model="sex">
                <option value="Homme">Homme</option>
                <option value="Femme" selected>Femme</option>
              </select>
            </div>
            <div class="form-group col-md-12 ">

              <label for="bio">Biographie:</label>
              <textarea class="form-control boxsizingBorder" rows="6" id="bio" name ="bio" v-model="bio" placeholder="Ce que vous faites et aimez dans la vie..."></textarea>
            </div>

            <div class="alert alert-success" v-if="inscriptionConfirm">
              <strong>{{inscriptionConfirm}}</strong>
            </div>
            <div class="alert alert-danger" v-if="inscriptionConfirmNot">
              <strong>{{inscriptionConfirmNot}}</strong>
            </div>
            <button v-show="(pseudo && password && status && mail)" type="submit" class="btn btn-primary center-block" @click.prevent="inscription">Inscription</button>
            
          </form>
        </div>
        <div class="connexion" id="connexion" v-if="connect == true && sign == false">
          <form action="" method="POST" class="" role="form">
              <div class="form-group text-center">
                <legend>Connexion</legend>
              </div>
              <div class="form-group col-md-5 col-md-offset-1 col-xs-6">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" class="form-control">
              </div>
              <div class="form-group col-md-5 col-md-offset-1 col-xs-6">
                <label for="password">Password :</label>
                <input type="password" name="password" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary center-block" @click.prevent="connexion">Connexion</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'
import {apiRoot} from '../settings.js'

  export default {
    data(){
      return {
        pseudo: '',
        password: '',
        status: '',
        mail: '',
        bio: '',
        sex: '',
        connect: false,
        sign: false,
        inscriptionConfirm : '',
        inscriptionConfirmNot: '',
        connectionConfirm: '',
        connectionConfirmNot: '',
        user: [],
        POST_data: []
      }
    },
    methods :{
      setCookie: function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
      },
      inscription: function(){
        this.POST_data = {
          pseudo: this.pseudo,
          status: this.status,
          mail:   this.mail,
          sex:    this.sex,
          bio:    this.bio,
          password: this.password
        }
        this.$http.post( apiRoot() + 'user-create/'  + this.pseudo + '&'
                                                    + this.status + '&'
                                                    + 'photo'          + '&'
                                                    + this.mail   + '&'
                                                    + this.sex    + '&'
                                                    + this.bio    + '&'
                                                    + this.password, this.POST_data).then(
        (response)=>{
          if(response.data == 'true' || response.data == true)
            this.inscriptionConfirm = "Inscrit !"
          else
            this.inscriptionConfirmNot = "Erreur lors de l'inscription, veuillez reessayer"
        },
        (reject)=>{
              this.inscriptionConfirmNot = "Erreur lors de l'inscription, veuillez reessayer"
          }
        )
      },
      connexion: function(){
        // send datas
        if(this.pseudo == '') this.pseudo = ' '
        if(this.password == '') this.password = ' '

        this.$http.get( apiRoot() + 'user-login/'+ this.pseudo + '&' + this.password).then(
        (response)=>{
          this.user = response.data
          console.log(response)
        },
        (reject)=>{
            this.connectionConfirmNot = "Erreur lors de la connexion, veuillez reessayer"
          }
        )








        //receive data
        /*var isConnected = true;
        if(isConnected){
          this.setCookie("idUser",42, 10)
        }*/
      },
    },
    created(){
      /*this.$http.get('http://localhost:8888/Projetweb/Social-Network-IMAC/api/public/').then(
        (response)=>{
          this.subjects = response.data
        },
        (reject)=>{
              console.log("Subjects not found")
          }
      )*/
    },
    components: {
      MenuComponent
    }
  }
</script>

<style type="text/css">
  
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

  .page #btn-choice{
    margin: 1em 0 4em 0;
  }

  .page #btn-choice button, .page #connexion button, .page #inscription button{
    background: #333333;
    outline: none;
    border: 0;
    padding: 1em;
    margin-bottom: 1em;
  }

  .page #inscription{
    margin: 6em auto;
  }
  
  .boxsizingBorder {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
  }
</style>