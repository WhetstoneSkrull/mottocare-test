<template lang="html">
  <v-container grid-list-md text-xs-center>

<!--
    <v-chip color="indigo" text-color="white" >
         <v-avatar>
         </v-avatar>
         you have {{pending.length}} uncompleted bookings
       </v-chip>
     </div>  -->

    <div class="" v-for="x in vendor" v-bind="x.id">

   <v-layout row wrap>
     <!--Header section 12 row-->
     <v-flex xs12 sm12>
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
           <h6 class="category text-gray font-weight-thin mb-3">{{x.lga}}, {{x.city}}</h6>
           <h4 class="card-title font-weight-light">{{x.vendor_title}}</h4>

           <p class="card-description font-weight-light">{{x.address}}</p>

           <p  v-if="x.status === 'active'"><v-btn color="green" dark>Active
              <v-icon dark right>verified_user</v-icon></v-btn> </p>

              <p v-if="x.status === 'pending'"><v-btn color="yellow" dark>pending
                 <v-icon dark right>report</v-icon></v-btn> </p>

                 <p v-if="x.status === 'suspended'"><v-btn color="yellow" dark>suspended
                    <v-icon dark right>block</v-icon></v-btn> </p>

                    <p><v-btn color="primary" dark :to="{path:'/manage-slots'}">manage slots</v-btn> </p>

         </v-card-text>
       </material-card>
     </v-flex>
     <!--End of Header section 12 row-->

     <!--Booking card-->
     <v-flex xs12 sm4 v-if="x.status === 'active'">
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
      <v-flex xs12 sm4 v-if="x.status === 'active'">
      <v-card
      hover="true"
      >
      <v-card-title primary-title>
      <div>
       <h3 class="headline mb-0">My Bookings<v-icon large="true">person_pin</v-icon></h3>
      </div>
      </v-card-title>


      <v-card-actions>
      <v-btn flat color="blue">Explore</v-btn>
      </v-card-actions>
      </v-card>

      </v-flex>
      <!--End of Driver card-->

      <!--Car card-->
      <v-flex xs12 sm4 v-if="x.status === 'active'">
      <v-card
      hover="true"
      >
      <v-card-title primary-title>
      <div>
      <h3 class="headline mb-0">My Wallet<v-icon large="true">local_car_wash</v-icon></h3>
      </div>
      </v-card-title>

      <v-card-actions>
      <v-btn flat color="blue"></v-btn>
      </v-card-actions>
      </v-card>
      </v-flex>
      <!--End of Car card-->


<!--Recent Bookings-->

   </v-flex>

    <v-flex xs12 sm6 v-if="x.status === 'active'">
      <p class="blue--text">you have {{pending.length}} uncompleted bookings</p>

      <div class="table-responsive">

      <table class="table">
    <thead class="thead-info">
      <tr>
        <th scope="col">Booking no.</th>
    <!--    <th scope="col">Service items</th> -->
        <th scope="col">Date</th>
        <th scope="col">Service time</th>
        <th scope="col">Time</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="booking in pending" :key="booking.id">
        <td>{{booking.booking_no}}</td>
      <!--  <td>  <button type="button" class="btn btn-dark" v-for="service in booking.servicerenders">
                {{service.service.service_name}}
              </button>
         </td> -->
        <td>{{booking.service_date}}</td>
        <td>{{booking.service_time}}</td>
        <td>
          <router-link :to="{ path: '/vendor-booking/'+booking.id}">
           view more
           </router-link>
          </td>


      </tr>
    </tbody>
  </table>
  </div>
    </v-flex>


   </v-layout>
 </div>
 </v-container>
</template>

<script>
  export default {
    data () {
      return {
        vendor: [],
        services: [],
        bookings: [],
      //  dialog: false,
    //    id: this.$route.params.id,
      //  date: new Date().toISOString().substr(0, 10),
        dialog: false,
        //menu: false,
      //  modal: false,
        menu2: false,
        time: null,
      //  menu2: false,
        modal2: false,
      //  pending: x.status ="pending",

    items: ['1', '2', '3', '4'],
              items2: [
                { icon: 'assignment', iconClass: 'blue white--text', title: 'Wheel alignment', subtitle: 'Jan 20, 2014' },
                { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Alternator change', subtitle: 'Jan 10, 2014' }
              ]
            }
      },

      beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user/${this.user.id}/vendor`)
        .then(response => {
            this.vendor = response.data
        })
        .catch(error => {
            console.error(error);
        })
     },

    methods:{
      fetchServices(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')
        axios.get(`api/auth/user/${this.user.id}/bookings/services`)
        .then(response => {
            this.services = response.data
        })
        .catch(error => {
            console.error(error);
        })
      },
      fetchBookings(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')
        axios.get(`api/auth/user/${this.user.id}/vendor/bookings`)
        .then(response => {
            this.bookings = response.data
        })
        .catch(error => {
            console.error(error);
        })
      }
    },
    computed: {
     pending: function() {
       return this.bookings.filter(function(u) {
         return u.is_completed==false
     })
   }
 },
   created(){
    this.fetchServices();
    this.fetchBookings();
    }
  }
</script>
<style lang="css">
</style>
