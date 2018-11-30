<template>

  <!--
        <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
              <h1>Mottocare Admin Login</h1>
              <p class="text-muted">Sign In to your account</p>
              <form  @submit.prevent="logIn"   v-loading="'authenticating...'">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input class="form-control" type="email" placeholder="Username" v-model="email" required>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="Password" v-model="password" required>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                  </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  <v-btn
                    slot="activator"
                    :href="source"
                    icon
                    large
                    target="_blank"
                  >
                    <v-icon large>code</v-icon>
                  </v-btn>
                  <span>Source</span>
                </v-tooltip>
                <v-tooltip right>
                  <v-btn slot="activator" icon large href="https://codepen.io/johnjleider/pen/wyYVVj" target="_blank">
                    <v-icon large>mdi-codepen</v-icon>
                  </v-btn>
                  <span>Codepen</span>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" name="login" label="Login" type="text"></v-text-field>
                  <v-text-field id="password" prepend-icon="lock" name="password" label="Password" type="password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary">Login</v-btn>
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
                     localStorage.setItem('access_token',token);
                     localStorage.setItem('user',JSON.stringify(response.data.user))
                     let myToast = this.$toasted.show("Welcome Back");
                     myToast.text("Welcome Back!").goAway(1500);
                  }
                  this.$router.push('/admin/dashboard');

                  console.log(token);
                })
              }
            }
          }
</script>
