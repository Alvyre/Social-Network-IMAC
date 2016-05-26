  <template>
    <menu-component></menu-component>
    <div class="container-fluid page">

      <h1>Créer un sujet</h1>
      
      <p>Vous n'avez trouvé aucun sujet qui vous intéresse ? Proposez en un ici, il sera validé par l'équipe IMAC Talks au plus vite. De l'aide, des informations sur la vie étudiante ou comment se loger autour de l'équipe, demandez ce que vous voulez, la communauté se chargera de vous répondre !</p>

      <div class="row content">
        <div class="col-xs-10 col-sm-6 col-md-6 col-lg-6 col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
          <form action="" method="POST" role="form">
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
                <option v-for="category in categories" value="{{category.IdCat}}">{{category.titleCat}}</option>
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
    </div>
</template>

<script>

import MenuComponent from '../components/MenuComponent.vue'
import {apiRoot} from '../config/localhost/settings.js'

  export default {
    data(){
      return {
        title: '',
        content: '',
        categories: []
      }
    },
    methods :{
      envoieSujet: function(){
        //date yyyy-mm-dd
        var date = new Date();
        date.now();
        console.log(d);
        this.$http.get( apiRoot() + 'subject-create/'+ this.title +'&' +this.content +'&' + date).then(
          (response)=>{},
          (reject)=>{}
          )
      }
    },
    components: {
      MenuComponent
    },
    created(){
      this.$http.get(apiRoot() + 'category-getall').then(
        (response)=>{
          this.categories = response.data;
          console.log(response)
        },
        (reject)=>{
          console.log("Data not found")
        }
      )
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
</style>