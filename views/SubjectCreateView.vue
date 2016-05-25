  

<template>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
      <form action="" method="POST" role="form">
        <legend>Créer un sujet</legend>
        <div class="form-group">
        <div class="alert alert-danger" v-if="!title">
          <strong>Il nous faut un titre !</strong>
        </div>
          <label for="title">Titre:</label>
          <input class="form-control" type="text" name="title" placeholder="Exemple : Cours de VueJS" v-model="title">
        </div>
        <div class="form-group">
          <label for="category">Categorie</label>
          <select name="category" class="form-control">
            <option v-for="category in categories" value="{{category.IdCat}}">{{category.TitleCat}}</option>
          </select>
        </div>
        <div class="form-group">
        <div class="alert alert-danger" v-if="!content">
          <strong>Tu ne vas pas envoyer un sujet vide quand même !</strong>
        </div>
            <label for="content">Contenu</label>
            <textarea class="form-control boxsizingBorder" rows="6" id="content" name ="content" v-model="content" placeholder="" v-model="content"></textarea>
          </div>
      
        <button type="submit" class="btn btn-primary center-block" v-if="title && content" @click.prevent="envoieSujet">Envoyer</button>
      </form>
    </div>
  </div>
</template>

<script type="text/javascript">
  export default {
    data(){
      return {
        categories : [{"IdCat":"1","TitleCat":"Enseignement"},{"IdCat":"2","TitleCat":"Logement"},{"IdCat":"3","TitleCat":"Vie \u00e9tudiante"},{"IdCat":"4","TitleCat":"Tutos"},{"IdCat":"5","TitleCat":"Divers"}],
        title: '',
        content: ''
      }
    },
    methods :{
      envoieSujet: function(){
        alert("coucou")
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
 .boxsizingBorder {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
</style>