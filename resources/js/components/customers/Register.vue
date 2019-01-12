<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">



                        <form v-loading="'submitting...'"   @submit.prevent='registerUser'>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="register.first_name"  required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lname" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" v-model="register.last_name"  required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="register.email" value="" required>


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="hidden" id="role" name="name" class="form-control" v-model="register.role" value="ddd" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="register.password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c-password" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="c-password" type="password" class="form-control" v-model="register.password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                    <p>
                                      <a href="/login/google">
                                      <v-btn color="error">
                                        <span class="fa fa-google">  Sign with Google</span>
                                      </v-btn>  </a>

                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props : ['nextUrl'],
    data(){
        return {
            register:{
                first_name:"",
                last_name:"",
                email:"",
                password:"",
                user_role:1,
                password_confirmation:""
            }
        }
    },

    methods:{
        registerUser(){
            axios.post('/api/auth/signup',this.register)
            .then(response=>{
              localStorage.setItem('user',JSON.stringify(this.register))
              localStorage.setItem('jwt',response.data.access_token)
              if (localStorage.getItem('jwt') != null){
                            this.$emit('loggedIn')
                            if(this.$route.params.nextUrl != null){
                                this.$router.push(this.$route.params.nextUrl)
                            }
                            else{
                                this.$router.push('/login')
                            }
                        }
                console.log(response);
                this.$router.push('/login');
                this.$toasted.global.signup().goAway(1500);

            })
            .catch(error=>{
                console.log(error.response)
            })
        }
    }
}
</script>
