<template lang="html">
  <v-container grid-list-md>
    <v-layout row wrap>

      <v-flex xs12 sm6>

        <v-card xs12 sm6>
          <v-card-title primary-title>
            <div>
              <div class="headline">Booking Invoice</div>
              <span class="grey--text">{{booking.booking_no}}{{booking.id}}</span>
            </div>
          </v-card-title>
          <v-card-text>
            <p>Amount Payable: &#8358;{{totalPrice | numeral('0,0')}} </p>
            <p> <strong> Service items:</strong> </p>

            <div v-for="service in booking.servicerenders">
              <p>{{service.service.service_name}}   &#8358;{{service.price  | numeral('0,0')}}</p>
            </div>

            <p>service date: {{booking.service_date}}</p>
          </v-card-text>
          <v-card-actions>

          <!--  <paystack
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

            </paystack>  -->
            <v-btn color="primary" class="white--text"  @click="loader = 'loading'"
              :loading="loading"
              :to="{ path: '/dashboard'}"
            >confirm booking</v-btn>
          </v-card-actions>
          <v-spacer></v-spacer>
        <v-divider></v-divider>
        </v-card>
</v-flex>
<v-spacer></v-spacer>

   </v-layout>
 </v-container>
</template>

<script>
import paystack from 'vue-paystack';

  export default {
    components: {paystack },

    data () {
      return {
        loader: null,
        loading: false,
        user:null,
        paystackkey: "pk_test_f05cdb293d594a7ce616748054fd99dc8267a832", //paystack public key
        email: "fooFbar@example.com", // Customer email
        amount: 1000000, //
        booking: [],

            }
      },

      watch: {
            loader () {
              const l = this.loader
              this[l] = !this[l]

              setTimeout(() => (this[l] = false), 3000)

              this.loader = null
            }
          },
      beforeMount(){
        this.booking = JSON.parse(localStorage.getItem('booking'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`/api/booking/${this.booking.id}`)

              .then(response => {
                  this.booking = response.data.data
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
      },
      totalPrice: function() {
          let total = 0;
          for(let i = 0; i < this.booking.servicerenders.length; i++){
            total += parseInt(this.booking.servicerenders[i].price);
          }
          return total;
        }
 },
   created(){
     //
    }
  }
</script>
<style lang="css">
.custom-loader {
  animation: loader 1s infinite;
  display: flex;
}
@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
