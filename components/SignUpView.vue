<template>
  <div class="inscription">
    <form action="" method="POST" role="form">
      <legend>Inscription</legend>
    
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Input your pseudo">
        <label for="pwd">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control" id="status" placeholder="IMAC201X, Prof, ...">
        <label for="mail">e-mail</label>
        <input type="mail" name="mail" class="form-control" id="mail" placeholder="Input your mail">
        <label for="sex"> Sexe</label>
        <select name="sex" id="sex">
          <option value="Homme">Homme</option>
          <option value="Femme" selected>Femme</option>
        </select>
        <label for="bio">Informations Supplémentaires :</label>
        <textarea id="bio" name ="bio"></textarea>
      </div>
    
      
    
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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