<template>
    <!--@submit.prevent => pour pas que la page se charge automatqt-->
    <form @submit.prevent="submit" action="" method="POST" class="ui form">

        <div class="field">
            <label>
                <textarea v-model="body" name="body" rows="4"></textarea>
            </label>
        </div>
        <button type="submit" class="ui orange submit icon button">
            <i class="icon comment"></i> Publier votre commentaire
        </button>
    </form>
</template>

<script>
export default {

    name: "AddComment",

    data() {
        return {
            body: null
        }
    },

    methods: {
        submit(){
            let uri = `${location.pathname}/comment`;
            // axios => parceque requete htttp. post() => parceque on crée un commentaire
            axios.post(uri, {
                body: this.body
            }).then((response) =>{

                //response.data=  pour ne recuperer que les données du commentaire en question
                //this.$emit()=  permet de récupérer le commentaire créé
                this.$emit('created',response.data);

                this.body = null;
            });

            //alert('bizzzzzzzzzzzz'); // Test
        }
    },
}
</script>

<style scoped>

</style>
