<template lang="html">
  <v-container grid-list-md text-xs-center>
    <v-flex xs12 sm6 offset-lg3>
      <v-card>
        <v-container grid-list-xs,sm,md,lg,xl>
        <v-form>
          <h5>Create a new password</h5>

          <v-text-field
            name="email"
            label="Email"
            prepend-icon="email"
            v-model="CreatePassword.email"
            single-line
          ></v-text-field>

          <v-text-field
            name="password"
            label="Password"
            type="password"
            prepend-icon="lock"
            v-model="CreatePassword.password"
            single-line
          ></v-text-field>
          <v-text-field
            name="password"
            type="password"
            label="Confirm Password"
            prepend-icon="lock"
            v-model="CreatePassword.password_confirmation"
            single-line
          ></v-text-field>
          <v-btn color="primary" @click="Reset">Reset Password</v-btn>
        </v-form>
      </v-container>
      </v-card>
    </v-flex>
  </v-container>
</template>

<script>
  export default {
    data(){
      return{
        CreatePassword:{
          email:"",
          password:"",
          password_confirmation:"",
          token:localStorage.getItem('reset_token')
        }
      }
    },
    methods:{
      Reset(){
        axios.post('/api/password/reset',this.CreatePassword)
        .then(response=>{
            console.log(response);
            this.$router.push('/login');
            this.$toasted.global.createPassword().goAway(5000);

        })
        .catch(error=>{
            console.log(error.response)
        })
      }
    }
  }

</script>

<style lang="css">
</style>
