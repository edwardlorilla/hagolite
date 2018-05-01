<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <!-- Styles -->
</head>
<body>
<template id="main">
    <v-ons-navigator swipeable
                     v-on:deviceBackButton="goBack"
                     v-on:postpush="postPush"
                     :page-stack="pageStack"
                     v-on:push-page="pagePush$($event)"
    ></v-ons-navigator>
</template>


<div id="app"></div>
</body>
<script type="text/javascript" src="{{mix('/js/app.js')}}"></script>
@if (Auth::guest())
<script type="text/x-template" id="login">
    <v-ons-page>

            <v-ons-toolbar>
                <div class="center">Log In</div>
            </v-ons-toolbar>
            <div class="login-form">
                <input type="email" v-model="loginData.email" class="text-input--underbar" placeholder="Email" value="">

                <input type="password" v-model="loginData.password" class="text-input--underbar" placeholder="Password"
                       value="">
                <br> <br>
                <ons-button modifier="large" v-on:click="login$" class="login-button">Log In</ons-button>
                <br><br>
                <ons-button modifier="quiet" class="forgot-password">Forgot password?</ons-button>
            </div>

    </v-ons-page>
</script>
@else
@endif
<script>
    @if (Auth::guest())
    var login = Vue.component('login', {
            name: 'login',
            template: '#login',
            data(){
                return {
                    loginData: {
                        email: null,
                        password: null
                    }
                }
            },
            methods: {
                login$() {
                    var vm = this;
                    axios.post('/api/login', vm.loginData)
                        .then(function (response) {
                            vm.$emit('push-page', 'app-view');
                        })
                        .catch(function (error) {
                            var errors = error.response
                        });
                },
            }
        });
    @else
    @endif
        new Vue({
        template: '#main',
        data() {
            return {
                openSide: false,
                loading: false,
                pageStack: []
            };
        },
        created(){
            var vm = this
            vm.pageStack = vm.isGuest
        },
        computed: {
            isGuest(){
                var vm = this;
                @if (Auth::guest())
                    return vm.pageStack = ['login']
                @else
                    return vm.pageStack = ['app-view']
                @endif
            }
        },
        methods: {
            pagePush$(event){
                var vm = this
                vm.loading = true;
                vm.pageStack.push(event)
            },
            goBack(){
                console.log(234)
            },
            postPush(){
                var vm = this;
                vm.loading = true;
                setTimeout(function () {
                    vm.loading = false;
                    vm.pageStack.shift();
                }, 1);

            }
        }
    }).$mount('#app');
</script>
</html>
