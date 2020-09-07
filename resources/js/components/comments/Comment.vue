<template>
    <div>
        <a class="avatar">
            <img :src="comment.user.avatar" alt="">
        </a>
        <div class="content">
            <div class="d-flex justify-content-between">
                <div>
                    <a v-text="comment.user.name" class="author"></a>
                    <div class="metadata">
                        <div v-text="comment.created_at" class="date"></div>
                    </div>
                </div>
                <div>
                    <!--href="javascrit:void(0)" => au click la page reste au même niveau-->
                    <!-- Ici isEdited = true et Si isEdited = true, v-if="editing === false".Donc pour affichager
                    le formulaire il faudra cliquer sur l'icon-->
                    <a @click="isEdited" href="javascript:void(0)">
                        <i class=" olive pencil icon"></i>
                    </a>
                    <a @click="destroy" href="javascript:void(0)">
                        <i class=" red trash icon"></i>
                    </a>
                </div>
            </div>
            <!--editing est par défaut à false = commentaires sans formulaire-->
            <div v-if="editing === false" v-text="body" class="text"></div>

            <!--si non editing = à true = on montre le formulaire de mis-à-jour du commentaire-->
            <form @submit.prevent="update" v-else action="" method="POST" class="ui form">

                <div class="field">
                    <label>
                        <!--v-model="body" c'est l'équivalent de value en html-->
                        <textarea v-model="body" name="body" rows="4"></textarea>
                    </label>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class=" small ui olive submit icon button">
                        <i class="icon comment"></i> Commenter
                    </button>
                    <!-- Ici is isEdited = false. Et ferme le form au click sur le btn -->
                    <button @click="isEdited" type="button" class=" small ui orange submit icon button">
                        <i class="icon close text-white"></i> Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
export default {
    name: "Comment",
    props:['comment'],
    data() {
        return {
            editing: false, /**pour ouvrir et cacher le form de mis-à-jour d'un commentaire*/

            /**recuperer le body du commentaire à mettre à jour. voir: v-model="body" => update()*/
            body: this.comment.body,
        }
    },
    methods:{

        /** Par défaut on a les commentaires sans le form => editing===false*/
         /** isEdited()= ouvrir le form au click sur le btn/icon,mais aussi le fermer au click sur annuler.*/
        isEdited(){
            if(this.editing===false) return this.editing = true;
            return this.editing = false;
        },

        /** Mis-à-jour des commentaires avec la method update: les étapes*/
        update(){
            /**1- on declare la variable uri = url du commentaire*/
            let uri = `${location.pathname}/${this.comment.id}/comment`;

            /**1.1- patch sert à mettre à jour un enregistrement & post sert à créer un enregistrement */
            axios.patch(uri,{

                /**2- on recupere le body du commentaire via la propriété du v-model="body" */
                body: this.body

                /**3- si tout se passe bien*/
            }).then((response) => {
               this.editing = false;
            });

        },

        /** suppression des commentaires avec la method destroy: les étapes*/
        destroy(){
            /**I- on declare la variable uri et recupere dynamiquement le lien de la page*/
            let uri = `${location.pathname}/${this.comment.id}/comment`;

            /**II- on supprime la route du commentaire =>se météréalise d'abord en bd.
             * sa visibilité niveau vue=refresh*/
            axios.delete(uri);

            /**III- Le cas avec JavaScript: suppression avec création d'un event $emit() qui
             *doit être récupéré dans la boucle des commentaires v-for="comment in comments"*/
            this.$emit("deleted", this.comment.id);

            /**=====================================================================
            Autre cas avec JQuery:
            *on supprime le commentaire et sa route
             *visibilité de l'action niveau vue=immédiate =>en 3s*
            *$(this.$el).fadeOut(300); =>JQuery
            ========================================================================*/
        },

    }
}
</script>

<style scoped>

</style>
