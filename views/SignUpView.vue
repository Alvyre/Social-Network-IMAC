  

<template>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
      <div id="btn-choice">
      <button @click="connect = false, sign = true" type="button" class="btn btn-primary center-block btn-block">S'inscrire</button><br/>
      <button @click="connect = true, sign = false" type="button" class="btn btn-primary center-block btn-block">Se connecter</button>
      </div>

      <div class="inscription" id="inscription" v-show="!connect && sign">
        <form action="" method="POST" role="form">
          <legend>Inscription</legend>
        
          <div class="form-group">
          <div class="alert alert-danger" v-if='!pseudo'>
            <strong>Ce champs est nécéssaire</strong>
          </div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" required v-model="pseudo">
            </div>
          <div class="form-group">
            <div class="alert alert-danger" v-if='!password'>
              <strong>Ce champs est nécéssaire</strong>
            </div>
            <label for="pwd">Mot de passe :</label>
            <input type="password" name="password" class="form-control" id="password" required v-model="password">
          </div>
          <div class="form-group">
            <div class="alert alert-danger" v-if='!status'>
            <strong>Ce champs est nécéssaire</strong>
            </div>
            <label for="status">Status :</label>
            <input type="text" name="status" class="form-control" id="status" placeholder="IMAC201X, Prof, ..." required v-model="status">
          </div>
          <div class="form-group">
            <div class="alert alert-danger" v-if='!mail'>
            <strong>Ce champs est nécéssaire</strong>
            </div>
            <div class="alert alert-warning" v-if="mail && !mail.includes('@')">
              <strong>Votre @mail n'est pas valide</strong>
            </div>
            <label for="mail">E-mail :</label>
            <input type="mail" name="mail" class="form-control" id="mail" placeholder="foo@mail.com" required v-model="mail" v-model="mail">
          </div>
          <div class="form-group">
            <label for="sex"> Sexe :</label>
            <select name="sex" id="sex">
              <option value="Homme">Homme</option>
              <option value="Femme" selected>Femme</option>
            </select>
          </div>
          <div class="form-group">

            <label for="bio">Informations Supplémentaires :</label>
            <textarea class="form-control " rows="6" id="bio" name ="bio" v-model="message" placeholder="Portfolio, links, .."></textarea>
          </div>
          
          <button v-show="(pseudo && password && status && mail)" type="submit" class="btn btn-primary center-block" @click.prevent="inscription">Inscription</button>
        </form>
      </div>
      <div class="connexion" id="connexion" v-if="connect == true && sign == false">
        <form action="" method="POST" class="" role="form">
            <div class="form-group">
              <legend>Connexion</legend>
            </div>
            <div class="form-group">
              <label for="pseudo">Pseudo :</label>
              <input type="text" name="pseudo" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary center-block" @click.prevent="connexion">Connexion</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
  export default {
    data(){
      return {
        pseudo: '',
        password: '',
        status: '',
        mail: '',
        connect: false,
        sign: false
      }
    },
    methods :{
      connexion: function(){
        alert("Connexion feedback")
      },
      inscription: function(){
        alert("Inscription feedback")
      }
    },
    components: {
    }
  }
</script>


<!-- GET DATA JSON
,
  data() {
    return {
      tasks: []
    }
  },
  created: function(){
      this.fetchJSON();
  },
  methods: {
    fetchJSON: function(){
      this.$http.get('api/tasks').then(
        (response) => {
          this.tasks = response.data
        },
        (response) => {
          console.log("mes couilles")
        }
      )
    }
-->

<style type="text/css">
  #inscription{
    margin-bottom: 10px;
  }
  .row{
    padding: 10px;
  }
  #btn-choice{
    margin-bottom: 100px;
  }
</style>