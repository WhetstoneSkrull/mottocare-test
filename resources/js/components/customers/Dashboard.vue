<template lang="html">
  <v-container grid-list-md text-xs-center>
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
           <h6 class="category text-gray font-weight-thin mb-3">Garki, Abuja</h6>
           <h4 class="card-title font-weight-light">{{first_name}} {{last_name}}</h4>

           <v-btn
             color="blue white--text"
             round
             class="font-weight-light"
             :to="{path: 'dashboard-edit'}"
           >Edit Profile</v-btn>
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
          <h3 class="headline mb-0">My Bookings<v-icon large="true">book</v-icon></h3>
        </div>
      </v-card-title>

      <v-card-actions>
        <v-btn flat color="blue" :to="{path: 'make-booking'}">Book Now</v-btn>
        <v-btn flat color="blue" :to="{path: 'bookings'}">Explore</v-btn>
      </v-card-actions>
    </v-card>
  </v-flex>
  <!--End of Booking card-->

  <!--Car card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
 <h3 class="headline mb-0">My Car <v-icon large="true">local_car_wash</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<!--<v-btn flat color="blue">Add</v-btn> -->
<v-btn flat color="blue" :to="{path: 'my-vehicles'}">Explore</v-btn>
</v-card-actions>
</v-card>
</v-flex>
<!--End of Car card-->

<!--Driver card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
 <h3 class="headline mb-0">My Driver <v-icon large="true">person_pin</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<!--<v-btn flat color="blue">Add</v-btn> -->
<v-btn flat color="blue" :to="{path: 'my-drivers'}">Explore</v-btn>
</v-card-actions>
</v-card>

</v-flex>
<!--End of Driver card-->

<!--Recent Services-->
    <v-flex xs12 sm6>
      <v-card>
        <v-list two-line subheader>
          <v-subheader inset>Pending Bookings</v-subheader>

          <v-list-tile v-for="item in items2" :key="item.title" @click="">
            <v-list-tile-avatar>
              <v-icon :class="[item.iconClass]">{{ item.icon }}</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}
                </v-list-tile-title>
              <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>

            </v-list-tile-content>
            <v-list-tile-action>

              <v-chip color="teal" text-color="white" content-class="right">
                    <v-avatar>
                      <v-icon>watch_later</v-icon>
                    </v-avatar>
                    pending
                  </v-chip>

            </v-list-tile-action>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>

      </v-card>
    </v-flex>
    <!--End of Recent Services-->


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
    }
  }
</script>
<style lang="css">
</style>
