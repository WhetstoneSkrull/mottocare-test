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
           <h4 class="card-title font-weight-light">Oando Auto-Shop</h4>
           <p>{{vendor.vendor_title}}</p>

           <p class="card-description font-weight-light">No. 12, Wakeel Pharmacy road, Asokoro, Abuja</p>
           <p><v-btn color="green" dark>Active
              <v-icon dark right>verified_user</v-icon></v-btn> </p>

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

  <!--Car card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
 <h3 class="headline mb-0">Our Mechanic<v-icon large="true">local_car_wash</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<v-btn flat color="blue">Share</v-btn>
<v-btn flat color="blue">Explore</v-btn>
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
 <h3 class="headline mb-0">Service Vehicles<v-icon large="true">person_pin</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<v-btn flat color="blue">Share</v-btn>
<v-btn flat color="blue">Explore</v-btn>
</v-card-actions>
</v-card>

</v-flex>
<!--End of Driver card-->


<!--Recent Bookings-->

    <v-flex xs12 sm8 md12>
      <v-flex>
      <v-text-field
           v-model="message1"
           label="find service in vendor"
            append-icon="search"
           clearable
         ></v-text-field>
       </v-flex>
   </v-flex>
    <v-flex xs12 sm12>
      <v-card>
        <v-list two-line subheader>
          <v-subheader inset>My Services</v-subheader>

          <v-list-tile v-for="item in items2" :key="item.title" @click="">
            <v-list-tile-avatar>
              <v-icon :class="[item.iconClass]">{{ item.icon }}</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}</v-list-tile-title>
              <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>
            </v-list-tile-content>
            <v-list-tile-action>

                <v-btn icon            >
                <v-icon color="grey lighten-1">info</v-icon>
              </v-btn>

            </v-list-tile-action>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>

      </v-card>
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
      //  dialog: false,
        id: this.$route.params.id,
      //  date: new Date().toISOString().substr(0, 10),
        dialog: false,
        //menu: false,
      //  modal: false,
        menu2: false,
        time: null,
      //  menu2: false,
        modal2: false,
    //    vendor:{        },
    booking:{
      id:"",
      user_id:"",
      vehicle_id:"",
      service_date:new Date().toISOString().substr(0, 10),
      service_time:"",
      vendor_id:"1"
    },
    items: ['1', '2', '3', '4'],
              items2: [
                { icon: 'assignment', iconClass: 'blue white--text', title: 'Wheel alignment', subtitle: 'Jan 20, 2014' },
                { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Alternator change', subtitle: 'Jan 10, 2014' }
              ]
            }
      },

      beforeMount(){
            axios.get('/api/vendor/'+this.id)
            .then(response => {
                this.vendor = response.data
            })
            .catch(error => {
                console.error(error);
            })
        },

    methods:{
      makeBooking(){
        axios.post('/api/booking',this.booking)
        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.booking().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      }
    },
  /*  created(){
      axios.get('/api/vendor/' + this.id + '.json')
      .then(response => {
                this.vendor = response.json
            })
            .catch(error => {
                console.error(error);
            })
    } */
  }
</script>
<style lang="css">
</style>
