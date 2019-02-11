<template lang="html">
  <v-container grid-list-md text-xs-center>
   <v-layout row wrap>

     <!--Booking card-->
     <v-flex xs12 sm2>
    <v-card
    hover
    >
      <v-card-title primary-title>
        <div>
          <h3 class="title">Customers</h3>
        </div>
      </v-card-title>

      <v-card-actions>
        <v-btn flat color="blue" :to="{path: 'bookings'}">Explore</v-btn>
      </v-card-actions>
    </v-card>
  </v-flex>
  <!--End of Booking card-->

      <!--Car card-->
    <v-flex xs12 sm2>
    <v-card
    hover
    >
    <v-card-title primary-title>
    <div>
     <h3 class="title">Vendors<v-icon >local_car_wash</v-icon></h3>
    </div>
    </v-card-title>

    <v-card-actions>
    <!--<v-btn flat color="blue">Add</v-btn> -->
    <v-btn flat color="blue" :to="{path: 'admin-vendors'}">Explore</v-btn>
    </v-card-actions>
    </v-card>
    </v-flex>
    <!--End of Car card-->

        <!--Driver card-->
        <v-flex xs12 sm2>
        <v-card
        hover
        >
        <v-card-title primary-title>
        <div>
         <h3 class="title">Agents<v-icon >person_pin</v-icon></h3>
        </div>
        </v-card-title>

        <v-card-actions>
        <!--<v-btn flat color="blue">Add</v-btn> -->
        <v-btn flat color="blue" :to="{path: 'all-agents'}">Explore</v-btn>
        </v-card-actions>
        </v-card>
      </v-flex>

        <!--Driver card-->
        <v-flex xs12 sm2>
        <v-card
        hover
        >
        <v-card-title primary-title>
        <div>
         <h3 class="title">Bookings<v-icon >book</v-icon></h3>
        </div>
        </v-card-title>

        <v-card-actions>
        <!--<v-btn flat color="blue">Add</v-btn> -->
        <v-btn flat color="blue" :to="{path: 'my-drivers'}">Explore</v-btn>
        </v-card-actions>
        </v-card>
      </v-flex>
<!--End of Driver card-->


   </v-layout>
 </v-container>
</template>

<script>
import moment from 'moment'
  export default {
    name: 'Dashboard',
  head: {
    metaInfo: {
      title: 'Dashboard',
      titleTemplate: '%s | User Page'
    },
    meta: [
       { name: 'description',
       content: `Watches: Men's watches, brand name watches, discount watches, watches on sale,
       mens watch brands and ladies watches. Daily Deals on Men's watches &amp; watches for women + the best service guarantee.` }
    ]
  },
    data () {
      return {
        first_name   : null,
        last_name    : null,
        email        : null,
        bookings:[],
        users:[],
          user_type   : 0,
          isLoggedIn  : localStorage.getItem('jwt') != null,
             user: null,
        dialog: false,

        items2: [
          { icon: 'assignment', iconClass: 'blue white--text', title: 'Wheel alignment', subtitle: 'Jan 20, 2014' },
          { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Alternator change', subtitle: 'Jan 10, 2014' }
        ],

      }
    },
    beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user/${this.user.id}`)
        .then(response => {
            this.users = response.data
        })
        .catch(error => {
            console.error(error);
        })
    },
/*          mounted(){

              this.setDefaults()
          }, */
    methods:{

    setDefaults(){
      if(this.isLoggedIn){
        let user        = JSON.parse(localStorage.getItem('user'))
        this.first_name       = user.first_name
        this.last_name       = user.last_name
        this.email       = user.email
        this.user_type  = user.is_admin
      }
    },
    fetchUser() {
    axios.get(`api/auth/user/${this.user.id}`)

    .then(response => {
        this.users = response.data
    })
    .catch(error => {
        console.error(error);
    })
  },
    moment: function () {
    return moment();
    }
  },
  filters: {
            moment: function (date) {
                  return moment(date).format('MMMM Do YYYY, h:mm:ss a');
                  }
          },

    created(){
      this.setDefaults()
      this.fetchUser()
    }
  }
</script>
<style lang="css">
</style>
