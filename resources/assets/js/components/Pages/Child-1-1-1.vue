<template>
    <v-ons-page>
        <router-link :to="{name: 'Child-1-1'}">child2</router-link>

    </v-ons-page>
</template>
<script>
    export default{
        data(){
            return {
                msg: 'hello vue'
            }
        },
    }
</script>
