<template lang="html">
  <v-container grid-list-xs,sm,md,lg,xl>
    <v-layout row wrap>

    <v-flex xs12 sm3 offset-sm3>
      <v-card v-for="vendor in vendors" v-bind:key="vendor.id">
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
          aspect-ratio="2.75"
        ></v-img>

        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{vendor.vendor_title}}</h3>
            <div>{{vendor.vendor_email}}</div>
          </div>
        </v-card-title>

        <v-card-actions>
          <router-link :to="{ path: '/vendor/'+vendor.id}">
          <v-btn flat color="blue">Explore</v-btn>
        </router-link>

        </v-card-actions>
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
