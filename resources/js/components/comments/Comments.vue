<template xmlns:comment="http://www.w3.org/1999/html">
   <!--Les commentaires-->
    <div class="mt-5">
        <div class="ui comments">

            <!--@created="add" => evenement - sa method = add-->
            <add-comment @created="add"></add-comment>

            <!--boucle pour recuper les commentaire-->
            <div v-for="(comment, index) in orderByComments" :key="comment.id" class="comment mb-3">
                <!--Composant pour le commentaire de l'utilisateur-->
                <comment :comment="comment" @deleted="remove(index)"></comment>
            </div>

        </div>

    </div>
</template>

<script>
import Comment from "./Comment"; /** use du component Comment => Faudra aussi le déclarer */
import AddComment from "./AddComment";

export default {
    name: "Comments",
    data(){
        return {
            comments: {}, /** c'est le component */
        }
    },

    created(){
       this.fetch(); /**dès que le component comments est créé => appeer fetch()*/
    },

    components: { Comment,AddComment },  /**Déclaration des components*/


    // On modifie l'ordre deparition des commentaires publiés:cible le composant comments
    computed: {
        orderByComments(){
            return _.orderBy(this.comments, 'created_at', 'desc');
        }
    },

    methods:{

        /**fech()=> recup coments */
        fetch(){
            let uri = `${location.pathname}/comment`; /**permet de recuper l'url en cours*/
            axios.get(uri).then((response) =>{
                this.comments = response.data; // pour ne recuperer que le commentaire en question

            });
        },


        // item = on recup le commentaire. push permet l'adjout d'un item à un []
        add(item){
            return this.comments.push(item);
        },


        /** en lien avec l'event deleted de Comment.vue.
         * splice(index,1) => supprimer qu'1 seul commentaire  */
        remove(index){
            return this.comments.splice(index,1);
        },

    }
}
</script>

<style scoped>

</style>
