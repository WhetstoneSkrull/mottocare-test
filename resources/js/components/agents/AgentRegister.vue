<template lang="html">
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
        <v-flex xs12 sm8 offset-md2>
            <v-card
            hover="true"
            class=""
            >
      <v-container grid-list-xs,sm,md,lg,xl>
        <v-card-title primary-title content-class="text-xs-center">
        <div>
         <h3 class="headline mb-0 ">Become an Agent</h3>
        </div>
        </v-card-title>
        <v-form ref="form" v-model="valid" lazy-validation>

            <v-text-field
              v-model="agent.agent_first_name"
              :rules="nameRules"
              :counter="25"
              label="Agent First Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="agent.agent_last_name"
              :rules="nameRules"
              :counter="25"
              label="Agent Last Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="agent.agent_email"
              :rules="emailRules"
              label="Agent E-mail"
              required
            ></v-text-field>

            <v-text-field
              v-model="agent.commission"
              label="Your Commission per transaction"
              hint="your figure in percentage."
              required
            ></v-text-field>

            <v-text-field
              v-model="agent.state"
              label=""
              required
            ></v-text-field>
            <v-text-field
              v-model="agent.lga"
              label="Your City"
              required
            ></v-text-field>
            <v-text-field
              v-model="agent.address"
              label="Your home address"
              required
            ></v-text-field>

            <v-btn
              color="blue"
              class="white--text"
              :disabled="!valid"
              @click="addAgent"
            >
              Continue
            </v-btn>

          </v-form>

          </v-container>
        </v-card>
        </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
    data () {
      return {
        e1: 0,
        valid: true,
      name: '',
      nameRules: [
        v => !!v || 'This Field is required',
        v => (v && v.length <= 25) || 'Name must be less than 25 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      agent:{
                agent_first_name:"",
                agent_last_name:"",
                user_id:2,
                agent_email:"",
                //agent_category:"",
                agent_pic:"hello.jpg",
                commission:"",
                state:"",
                lga:"",
                address:"",
                status:"pending"

            },
      }
    },
    methods:{
      addAgent(){
        axios.post('/api/agent',this.agent)
        .then(response=>{
            console.log(response);
            this.$router.push('/dashboard');
            this.$toasted.global.signup().goAway(1500);

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
