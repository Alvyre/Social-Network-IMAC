<template>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
      <div class="inscription">
        <form action="" method="POST" role="form">
          <legend>Inscription</legend>
        
          <div class="form-group">
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Ce champs est nécéssaire</strong>
          </div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" required>
            </div>
          <div class="form-group">
            <label for="pwd">Mot de passe :</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
          <div class="form-group">
            <label for="status">Status :</label>
            <input type="text" name="status" class="form-control" id="status" placeholder="IMAC201X, Prof, ..." required>
          </div>
          <div class="form-group">
            <label for="mail">E-mail :</label>
            <input type="mail" name="mail" class="form-control" id="mail" placeholder="foo@mail.com" required>
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
            <textarea id="bio" name ="bio" v-model="message" placeholder="Portfolio, links, .."></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>



<script>


export default {
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

</style>

