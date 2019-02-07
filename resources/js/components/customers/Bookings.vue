<template lang="html">
  <v-app>
<h3>{{bookings.length}}</h3>
      <div class="table-responsive">
      <table class="table">
      <thead class="thead-info">
      <tr>
        <th scope="col">Booking No.</th>
        <th scope="col">Vehicle</th>
        <th scope="col">Date of Service</th>
        <th scope="col"></th>
        <th scope="col">make payment</th>
      </tr>
      </thead>
      <tbody>
      <tr  v-for="(booking,index) in bookings" @key="index">
        <td>{{booking.booking_no}}{{booking.id}}</td>

        <td>{{booking.vehicle.vehicle_make}}</td>
        <td>{{booking.service_date}}</td>
        <td>
          <v-btn color="warning">mark as completed</v-btn>
        </td>
        <td>
          <paystack
              :amount="amount"
              :email="user.email"
              :paystackkey="paystackkey"
              :reference="reference"
              :callback="callback"
              :close="close"
              :embed="false"
          >
             <v-btn color="primary"> Make Payment</v-btn>

          </paystack>

        </td>
      </tr>

      </tbody>
      </table>
      </div>

  </v-app>
</template>

<script>
import paystack from 'vue-paystack';

export default {
  components: {
      paystack
  },
  data(){
            return {
              paystackkey: "pk_test_f05cdb293d594a7ce616748054fd99dc8267a832", //paystack public key
              email: "", // Customer email
              amount: 1000000, // in kobo,
                user : null,
                bookings : [],
                vehicle:{
                  id:"",
                  user_id:"",
                  booking_no:"",
                  vehicle_make:"",
                  year:"",
                  pic:"",
                  vehicle_reg_no:""
                  }
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
        beforeMount(){
            this.user = JSON.parse(localStorage.getItem('user'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

            axios.get(`api/auth/user/${this.user.id}/bookings`)
            .then(response => {
                this.bookings = response.data
            })
            .catch(error => {
                console.error(error);
            })
        },
        methods:{
          callback: function(response){
            console.log(response)
          },
          close: function(){
              console.log("Payment closed")
          }
        }

      }
</script>

<style lang="css">
</style>
