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

        email:"",
        password:""
    }
},
methods:{
    logIn(){
        axios.post('/api/auth/login',{email:this.email,password:this.password})
        .then(response=>{
            let token= response.data.access_token;
            if(token){
               localStorage.setItem('token',token);
               localStorage.setItem('user',JSON.stringify(response.data.user))
               this.$emit('loggedIn')

               let myToast = this.$toasted.show("Welcome Back");
               myToast.text("Welcome Back!").goAway(1500);
            }
            this.$router.push('/');
            console.log(token);
          })
        }
      }
    }
</script>
