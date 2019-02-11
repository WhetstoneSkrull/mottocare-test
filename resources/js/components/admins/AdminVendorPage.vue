<template lang="html">
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm12>
        <p class="title">{{vendor.vendor_title}} </p>
        <v-chip >{{vendor.status}}</v-chip>

        <v-spacer></v-spacer>
        <v-btn color="blue" @click="approveRequest" class="white--text">
          approve application
        </v-btn>
        <v-btn color="red" @click="rejectRequest" class="white--text">
          reject application
        </v-btn>
      </v-flex>
      <v-flex xs12 sm6>
        <v-card>
          <v-card-title primary-title>
            {{vendor.vendor_first_name}} {{vendor.vendor_last_name}}
          </v-card-title>
          <v-card-text>
            <p>{{vendor.vendor_email}}</p>
          </v-card-text>

        </v-card>
    </v-flex>
<v-spacer></v-spacer>

<v-flex xs12 sm4>

</v-flex>

   </v-layout>
 </v-container>
</template>

<script>

  export default {
    data () {
      return {
        vendor: [],
          }
      },

      beforeMount(){

        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`/api/vendor/${this.$route.params.id}`)
              .then(response => {
                  this.vendor = response.data.data
              })
              .catch(error => {
                  console.error(error);
              })

     },

    methods:{
      approveRequest(){
        axios.patch(`/api/vendor/${this.$route.params.id}/approve`)
        .then(response=>{
            console.log(response);

            this.$toasted.global.doneSuccessfully().goAway(1500);
            this.fetchVendor();

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      rejectRequest(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.patch(`/api/vendor/${this.$route.params.id}/reject`)
              .then(response => {
                  this.vendor = response.data.data
                  this.$toasted.global.doneSuccessfully().goAway(1500);
                  this.fetchVendor();
              })
              .catch(error => {
                  console.error(error);
              })
      },
        fetchVendor(){
          axios.get(`/api/vendor/${this.$route.params.id}`)
                .then(response => {
                    this.vendor = response.data.data
                })
                .catch(error => {
                    console.error(error);
                })
        }


    },
    computed: {
      //
 },
   created(){
      this.fetchVendor()
    }
  }
</script>
<style lang="css">
</style>
