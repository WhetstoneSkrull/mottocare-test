<template>
       <div>
           <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
               <div class="container">
                   <router-link :to="{name: 'home'}" class="navbar-brand">Home</router-link>
                   <router-link :to="{name: 'dashboard'}" class="navbar-brand" v-if="isLoggedIn">MY Dashboard</router-link>
                   <router-link :to="{name: 'adminLogin'}" class="navbar-brand" v-if="isLoggedIn">Admin</router-link>
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>

                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <!-- Left Side Of Navbar -->
                       <ul class="navbar-nav mr-auto"></ul>

                       <ul class="navbar-nav ml-auto">
                       <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                       <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
                       <span v-if="isLoggedIn">
                         <router-link :to="{ name: 'dashboard' }" class="nav-link" v-if="isLoggedIn"> Hi, {{email}}</router-link>
                       </span>
                       <li class="nav-link" v-if="isLoggedIn" @click="logout"> Logout</li>
                   </ul>
                   </div>
               </div>
           </nav>
           <main class="py-4">
               <router-view></router-view>
               <!-- set progressbar -->
        <vue-progress-bar></vue-progress-bar>
           </main>
       </div>
   </template>

   <script>
    export default {
      data(){
          return {
            email        : null,
            user_type   : 0,
            isLoggedIn  : localStorage.getItem('access_token') != null
          }
      },
      mounted() {
        this.setDefaults();
    //    this.$Progress.finish()
      },

      created () {
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start()
    //  hook the progress bar to start before we move router-view
    this.$router.beforeEach((to, from, next) => {
      //  does the page we want to go to have a meta.progress object
      if (to.meta.progress !== undefined) {
        let meta = to.meta.progress
        // parse meta tags
        this.$Progress.parseMeta(meta)
      }
      //  start the progress bar
      this.$Progress.start()
      //  continue to next page
      next()
    })
    //  hook the progress bar to finish after we've finished moving router-view
    this.$router.afterEach((to, from) => {
      //  finish the progress bar
      this.$Progress.finish()
    })
  },

      methods : {
        setDefaults(){
          if(this.isLoggedIn){
            let user        = JSON.parse(localStorage.getItem('user'))
            this.email       = user.email
      //      this.user_type  = user.is_admin
          }
        },
        change(){
            this.isLoggedIn = localStorage.getItem('access_token') != null
            this.setDefaults()

        },
        logout(){
            localStorage.removeItem('access_token')
            localStorage.removeItem('user')
            this.change()
            this.$router.push('/')
        }
      }
    }
</script>
