<template lang="html">
  <v-container grid-list-md text-xs-center>
<h1>I am the Title {{vendor.vendor_title}}</h1>
   <v-layout row wrap>
     <!--Header section 12 row-->
     <v-flex sm12>
       <material-card class="v-card-profile">
         <v-avatar
           slot="offset"
           class="mx-auto d-block"
           size="130"
         >
           <img
             src="https://demos.creative-tim.com/vue-material-dashboard/img/marc.aba54d65.jpg"
           >
         </v-avatar>

         <v-card-text class="text-xs-center">
           <h6 class="category text-gray font-weight-thin mb-3">{{vendor.lga}}, {{vendor.city}}</h6>
           <h4 class="card-title font-weight-light">{{vendor.vendor_title}}</h4>

           <p class="card-description font-weight-light">{{vendor.address}}</p>

           <p  v-if="vendor.status === 'active'"><v-btn color="green" dark>Active
              <v-icon dark right>verified_user</v-icon></v-btn> </p>

              <p v-if="vendor.status === 'pending'"><v-btn color="yellow" dark>pending
                 <v-icon dark right>report</v-icon></v-btn> </p>

                 <p v-if="vendor.status === 'suspended'"><v-btn color="yellow" dark>suspended
                    <v-icon dark right>block</v-icon></v-btn> </p>

         </v-card-text>
       </material-card>
     </v-flex>
     <!--End of Header section 12 row-->

     <!--Booking card-->
     <v-flex xs12 sm4>
    <v-card
    hover="true"
    >
      <v-card-title primary-title>
        <div>
          <h3 class="headline mb-0">My Services<v-icon large="true">book</v-icon></h3>
        </div>
      </v-card-title>

      <v-card-actions>
        <v-btn flat color="blue":to="{path: 'services'}">Explore</v-btn>
      </v-card-actions>
    </v-card>
  </v-flex>
  <!--End of Booking card-->

<!--Driver card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
 <h3 class="headline mb-0">My Bookings<v-icon large="true">person_pin</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<v-btn flat color="blue">Share</v-btn>
<v-btn flat color="blue">Explore</v-btn>
</v-card-actions>
</v-card>

</v-flex>
<!--End of Driver card-->

<!--Car card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
<h3 class="headline mb-0">My Wallet<v-icon large="true">local_car_wash</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<v-btn flat color="blue">Share</v-btn>
<v-btn flat color="blue">Explore</v-btn>
</v-card-actions>
</v-card>
</v-flex>
<!--End of Car card-->

    </v-flex>
    <!--End of Recent Bookings-->


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
                  this.vendor = response.data
              })
              .catch(error => {
                  console.error(error);
              })
     },

    methods:{
      //
    },
    computed: {
    //
 },
   created(){
  //
    }
  }
</script>
<style lang="css">
</style>
