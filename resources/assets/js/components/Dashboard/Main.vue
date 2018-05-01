<template>
    <v-ons-page>
        <v-ons-splitter>
            <v-ons-splitter-side

                    swipeable width="150px" collapse="" side="left"
                    :open.sync="$root.$data.openSide"
            >
                <v-ons-page>
                    <v-ons-list>
                        <v-ons-list-item v-for="(page, index) in pages"
                                         :key="index"
                                         tappable modifier="chevron"
                                         @click="currentPage = page; $root.$data.openSide = false"
                        >
                            <div class="center">{{ page }}</div>
                        </v-ons-list-item>
                    </v-ons-list>
                </v-ons-page>
            </v-ons-splitter-side>

            <v-ons-splitter-content>
                <component :is="currentPage" :toggle-menu="() =>  $root.$data.openSide = !$root.$data.openSide"></component>
            </v-ons-splitter-content>
        </v-ons-splitter>
    </v-ons-page>
</template>
<script>
    export default{
        data(){
            return {
                currentPage: 'dashboard',
                pages: ['dashboard', 'about', 'settings'],

            }
        },
    }
</script>
