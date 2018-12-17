<template lang="html">
  <v-app>
    <v-flex  md6 offset-md3>
  <v-list three-line subheader>
    <v-list-tile avatar>
      <v-list-tile-content>
        <v-list-tile-title class="font-weight-medium">Create a Booking</v-list-tile-title>
        <v-list-tile-sub-title class="font-weight-light">fill up the form and submit!</v-list-tile-sub-title>
      </v-list-tile-content>
    </v-list-tile>
  </v-list>
</v-flex>
  <v-divider></v-divider>

 <v-flex md6 offset-md3>
   <v-flex>
   <v-text-field
        v-model="booking.service_time"
        hint="(HH:MM)"
        label="service time"

        clearable
      ></v-text-field>
    </v-flex>
</v-flex>

 <v-flex md6 offset-md3>
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

 <v-flex md6 offset-md3>
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
     <v-flex md6 offset-md3>
     <v-btn color="info" @click="makeBooking">Book</v-btn>
   </v-flex>
 </v-app>
</template>

<script>
export default {
  data() {
    return{
      menu2: false,
      user : null,
      time: null,
    //  menu2: false,
      modal2: false,
      booking:{
        id:"",
        user_id:"",
        vehicle_id:"",
        service_render_id:2,
        service_date:new Date().toISOString().substr(0, 10),
        service_time:"",
        is_completed:false
        }
      }
    },
    methods:{
      makeBooking(){
        axios.post('/api/booking',this.booking)
        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.bookingAdded().goAway(1500);

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
