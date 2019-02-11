<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm12>
        <p class="title">Vendors</p>
      </v-flex>
      <v-flex xs12 sm3 v-for="vendor in vendors" v-bind:key="vendor.id">
      <v-card hover >
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{vendor.vendor_title}}</h3>
            <div>{{vendor.vendor_email}}</div>
            <div>{{vendor.mobile_no}}</div>
            <p><v-chip color="teal" class="white--text">{{vendor.status}}</v-chip></p>
          </div>
        </v-card-title>
        <router-link :to="{ path: '/admin/vendor/'+vendor.id}">
          <v-card-actions>

            <v-btn>more</v-btn>
          </v-card-actions>
      </router-link>

        <v-divider></v-divider>
      </v-card>
    </v-flex>

  </v-layout>
  </v-container>
</template>

<script>
export default {
  data(){
    return{
      vendors:[]
    }
  },
  beforeMount(){
      this.user = JSON.parse(localStorage.getItem('user'))
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

      axios.get(`api/all/vendors`)
      .then(response => {
          this.vendors = response.data
      })
      .catch(error => {
          console.error(error);
      })
  },
  methods:{
    //
  }
}
</script>

<style lang="css">
</style>
