<template lang="html">
  <v-container grid-list-md text-xs-center>
    <v-flex xs12 sm6 offset-lg3>
      <v-card>
        <v-container grid-list-xs,sm,md,lg,xl>
        <v-form>
          <h5>Enter your email and a recovery link will be sent to your email</h5>

          <v-text-field
            name="email"
            label="Email"
            v-model="ResetPassword.email"
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
      ResetPassword:{
        email:""
      }
    }
  },
  methods:{
    Reset(){
      axios.post('/api/password/create',this.ResetPassword)
      .then(response=>{
          console.log(response);
          localStorage.setItem('reset_token',response.data.reset_token)

          this.$router.push('/user-create-new-password');
          this.$toasted.global.reset().goAway(5000);

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
