<template>
<div class="">
            <app-header></app-header>
            <transition mode="out-in">
                <router-view ></router-view>
            </transition>

                <main class="py-4">
                <vue-progress-bar></vue-progress-bar>
                <app-footer></app-footer>
              </main>

            </div>
   </template>

   <script>
   import WebFontLoader from 'webfontloader'
    export default {
      data(){
          return {
        //    email        : null,
//            user_type   : 1,
            isLoggedIn  : localStorage.getItem('access_token') != null
          }
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
        },
        setFontLoaded () {
      this.$emit('font-loaded')
    }

  },
      mounted() {
        WebFontLoader.load({
      google: {
        families: ['Roboto:100,300,400,500,700,900']
      },
      active: this.setFontLoaded
    }),
        this.setDefaults();

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
  }
    }
</script>
