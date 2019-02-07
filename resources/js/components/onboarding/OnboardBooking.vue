<template lang="html">
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm6>

            <p>{{vehicles.length}}</p>
            <v-select
              :items="vehicles"
              v-model="booking.vehicle_id"
              label="Select Vehicle"
              item-text="model"
              item-value="id"
            ></v-select>

     <v-text-field
       name="name"
       v-model="booking.service_date"
       label="Service Date"
       id="select the date you want your vehicle to be serviced format:(dd-mm-yyyy)"
     ></v-text-field>

     <v-flex>
       <v-select
      :items="items"
      label="Pick a slot"
    ></v-select>
      </v-flex>

      <v-btn
        color="blue"
         @click="makeBooking"
      >
        Book
      </v-btn>
</v-flex>
<v-spacer></v-spacer>

<v-flex xs12 sm4>
 <v-card >
   <v-card-title primary-title>
     <div>
       <div class="headline">Booking Invoice</div>
       <span class="grey--text">{{booking.booking_no}}{{booking.id}}</span>
     </div>
   </v-card-title>
   <v-card-text>
    <!-- <p>Total Amount Payable: &#8358;{{totalMarks | numeral('0,0')}} </p>
     <p> marks are: {{ totalMarks }}</p>
     <p>Vendor: {{selectedDrinkLabel }}</p>
     <p> <strong> Service items:</strong> {{selectedOption}}</p> -->
     <p><strong> Service items test:</strong></p>

   <!--  <p>vehicle: {{booking.vehicle.vehicle_make}}</p> -->
     <p>service date: {{booking.service_date}}</p>
   </v-card-text>
   <v-card-actions>
     <paystack
         :amount="amount"
         :email="email"
         :paystackkey="paystackkey"
         :reference="reference"
         :callback="callback"
         :close="close"
         :embed="false"
     >
        <v-btn color="primary"> Make Payment</v-btn>
        <v-divider></v-divider>
      </paystack>
    </v-card-actions>
    <v-spacer></v-spacer>
   <v-divider></v-divider>
  </v-card>
</v-flex>

   </v-layout>
 </v-container>
</template>

<script>

import paystack from 'vue-paystack';

  export default {
    components: {paystack },
    data () {
      return {
        user:null,
        paystackkey: "pk_test_f05cdb293d594a7ce616748054fd99dc8267a832", //paystack public key
        email: "fooFbar@example.com", // Customer email
        amount: 1000000, //
      //  vendor: [],
        vendors: [],
        drivers: [],
        vehicles: [],
        items: ['slot 1: (08:00-08:30)AM', 'slot 2: (08:31-09:00)AM', 'slot 3: (09:00-09:30)AM', 'slot 4: (10:00-10:30)AM',
                'slot 5: (10:31-11:00)AM','slot 6: (11:01-11:30)AM'],

        booking:{
          user_id:'',
          service_render_id:'',
          vehicle_id:'',
          service_date:'',
          service_time:'',
          is_completed:false

          }
        }
      },

      beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user/${this.user.id}/vehicles`)
        .then(response => {
            this.vehicles = response.data
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
          //  this.$router.push('/bookings');
          localStorage.setItem('booker',JSON.stringify(this.booking))

            this.$toasted.global.bookingAdded().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },


      callback: function(response){
          console.log(response)
        },
        close: function(){
            console.log("Payment closed")
        }
    },
    computed: {
      reference(){
        let text = "";
        let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( let i=0; i < 10; i++ )
          text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
      }
 },
   created(){
      //
    }
  }
</script>
<style lang="css">
</style>
