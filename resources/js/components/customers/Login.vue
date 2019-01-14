<template>
    <v-app id="inspire">
        <v-content>
          <v-container fluid fill-height>
            <v-layout align-center justify-center>
              <v-flex xs12 sm8 md4>
                <v-card class="elevation-12">
                  <v-toolbar dark color="primary">
                    <v-toolbar-title>Login Account</v-toolbar-title>
                    <v-spacer></v-spacer>

                  </v-toolbar>
                  <v-card-text>
                    <v-form v-loading="'submitting...'">
                      <v-text-field prepend-icon="person" name="email" label="email" type="text" v-model="email"></v-text-field>
                      <v-text-field id="password" prepend-icon="lock" name="password" label="Password" type="password" v-model="password"></v-text-field>
                    </v-form>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click.prevent="logIn">Login</v-btn>
                    
                  </v-card-actions>

                </v-card>
                <p ></p>
                  <v-btn color="primary" flat :to="{path: 'reset-password'}" blue>Forgot password?</v-btn>
              </v-flex>
            </v-layout>
          </v-container>
        </v-content>
      </v-app>
</template>

<script>
    export default {

      data(){
          return{
            loader: null,
        loading: false,
              email:"",
              password:"",
              is_admin:""
          }
        },
        watch: {
    loader () {
      const l = this.loader
      this[l] = !this[l]

      setTimeout(() => (this[l] = false), 3000)

      this.loader = null
    }
  },
methods:{
    logIn(){
        axios.post('/api/auth/login',{email:this.email,password:this.password})
        .then(response=>{
            let token= response.data.access_token;
            if(token){
               localStorage.setItem('jwt',token);
              localStorage.setItem('user',JSON.stringify(response.data.user))
               if (localStorage.getItem('jwt') != null){
                             this.$emit('loggedIn')
                             if(this.$route.params.nextUrl != null){
                                 this.$router.push(this.$route.params.nextUrl)
                             }
                             else {
                                     this.$router.push('dashboard')
                                       this.$toasted.global.login().goAway(2000);
                             }
                         }
            }
            this.$router.push('/dashboard');
            console.log(token);
          })
        }
      }
    }
</script>
<style media="screen" scoped>
.custom-loader {
  animation: loader 1s infinite;
  display: flex;
}
@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
