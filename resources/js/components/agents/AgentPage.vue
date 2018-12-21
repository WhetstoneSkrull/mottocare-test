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
           <h4 class="card-title font-weight-light"></h4>
           <p><v-btn color="green" dark>Active
              <v-icon dark right>verified_user</v-icon></v-btn> </p>
           <p class="card-description font-weight-light">No. 12, Wakeel Pharmacy road, Asokoro, Abuja</p>


  <v-layout row justify-center>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-btn slot="activator" color="blue" dark>Edit</v-btn>
      <v-card>
        <v-container>
        <v-toolbar dark color="blue">
          <v-btn icon dark @click="dialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Make a Booking</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="dialog = false">close</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-list three-line subheader>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>Create a Booking</v-list-tile-title>
              <v-list-tile-sub-title>fill up the form and submit!</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>
        <v-flex xs12 sm8 md6>
          <v-flex>
          <v-text-field
               v-model="booking.booking_title"
               label="what are you booking for?"

               clearable
             ></v-text-field>
           </v-flex>
       </v-flex>

       <v-flex xs12 sm8 md6>
         <v-flex>
         <v-text-field
              v-model="booking.service_time"
              label="service time (HH:MM AM or PM)"

              clearable
            ></v-text-field>
          </v-flex>
      </v-flex>

       <v-flex xs12 sm6 d-flex>
               <v-select
               v-model="booking.vehicle_id"
                 :items="items"
                 label="which vehicle are you booking for?"
               ></v-select>
             </v-flex>
    <!--    <v-flex xs10 sm8 md6>
      <v-dialog
        ref="dialog"
        v-model="modal2"
        :return-value.sync="time"
        persistent
        lazy
        full-width
        width="290px"
      >
        <v-text-field
          slot="activator"
          v-model="time"
          label="Picker in dialog"
          prepend-icon="access_time"
          readonly
        ></v-text-field>
        <v-time-picker
          v-if="modal2"
          v-model="time"
          full-width
        >
          <v-spacer></v-spacer>
          <v-btn flat color="primary" @click="modal2 = false">Cancel</v-btn>
          <v-btn flat color="primary" @click="$refs.dialog.save(time)">OK</v-btn>
        </v-time-picker>
      </v-dialog>
    </v-flex> -->

       <v-flex xs12 sm8 md6>
             <v-dialog
               ref="dialog"
               v-model="modal"
               :return-value.sync="booking.service_date"
               persistent
               lazy
               full-width
               width="290px"
             >
               <v-text-field
                 slot="activator"
                 v-model="booking.service_date"
                 label="Picker in dialog"
                 prepend-icon="event"
                 readonly
               ></v-text-field>
               <v-date-picker v-model="date" scrollable>
                 <v-spacer></v-spacer>
                 <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
                 <v-btn flat color="primary" @click="$refs.dialog.save(booking.service_date)">OK</v-btn>
               </v-date-picker>
             </v-dialog>
           </v-flex>
           <v-flex xs12 sm8 md6>
           <v-btn color="info" @click="makeBooking"  v-loading="'submitting...'">Book</v-btn>
         </v-flex>
         </v-container>
      </v-card>
    </v-dialog>
  </v-layout>



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
        <v-btn flat color="blue">Share</v-btn>
        <v-btn flat color="blue">Explore</v-btn>
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
 <h3 class="headline mb-0">My Vehicles<v-icon large="true">local_car_wash</v-icon></h3>
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
 <h3 class="headline mb-0">My Wallet<v-icon large="true">person_pin</v-icon></h3>
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
