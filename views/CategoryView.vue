<template>
  	<h1>Category Title</h1>
  	<p>TRI -
      <a @click="orderKey = 'dateSubject'">Plus récent</a> -
      <a @click="orderKey = 'upVote'">Plus populaire</a>
    </p>
    <template v-for="subject in subjects | orderBy orderKey -1">
    	<section class="row">
    		<div class="col-xs-3">
    			<div class="glyphicon glyphicon-arrow-up"></div> {{ subject.upVote }}
    			<div class="glyphicon glyphicon-arrow-down"></div> {{ subject.downVote }}
    		</div>
    		<div class="col-xs-9"><a v-link="'subject'">{{ subject.titleSubject }}</a></div>
    	</section>
    </template>
</template>

<script>
export default {
    data() {
      return {
        subjects: [
          {
              "idSubject":1,
              "titleSubject":"Sujet 1",
              "contentSubject":"contenu du sujet",
              "dateSubject":"2016-05-20",
              "upVote":45,
              "downVote":7,
              "idUser":3,
              "idCat":1
          },
          {
              "idSubject":2,
              "titleSubject":"Sujet 2",
              "contentSubject":"contenu du sujet 2",
              "dateSubject":"2016-05-27",
              "upVote":50,
              "downVote":25,
              "idUser":5,
              "idCat":1
          },
          {
              "idSubject":3,
              "titleSubject":"Sujet 3",
              "contentSubject":"Contenu du sujet 3",
              "dateSubject":"2016-05-20",
              "upVote":40,
              "downVote":20,
              "idUser":3,
              "idCat":1
          },
          {
              "idSubject":4,
              "titleSubject":"Sujet 4",
              "contentSubject":"Contenu du sujet 4",
              "dateSubject":"2016-05-05",
              "upVote":4,
              "downVote":30,
              "idUser":3,
              "idCat":1
          },
          {
              "idSubject":5,
              "titleSubject":"Sujet 5",
              "contentSubject":"Contenu du sujet 5",
              "dateSubject":"2016-05-28",
              "upVote":38,
              "downVote":35,
              "idUser":5,
              "idCat":1
          },
          {
              "idSubject":6,
              "titleSubject":"Sujet 6",
              "contentSubject":"Contenu du sujet 6",
              "dateSubject":"2016-05-30",
              "upVote":27,
              "downVote":2,
              "idUser":3,
              "idCat":3
          }
        ],
        orderKey: "dateSubject"
      }
    },
    created(){
  		this.$http.get('category').then(
  			(response)=>{this.subjects = response.subjects},
  			(reject)=>{
          console.log("pas bien")
          //this.subjects = []
        }
  		)
  	}/*,
  	components: {
  	}*/
}
</script>

<style type="text/css">
  a{
    cursor: pointer;
  }
</style>