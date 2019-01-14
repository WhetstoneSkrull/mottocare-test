<template lang="html">
  <v-app>
<h3>{{bookings.length}}</h3>
      <div class="table-responsive">
      <table class="table">
      <thead class="thead-info">
      <tr>
        <th scope="col">Booking No.</th>
        <th scope="col">status</th>
        <th scope="col">Service name</th>
        <th scope="col">Vehicle</th>
        <th scope="col"></th>
        <th scope="col">make payment</th>
      </tr>
      </thead>
      <tbody>
      <tr  v-for="(booking,index) in bookings" @key="index">
        <td>{{booking.booking_no}}{{booking.id}}</td>
        <td>
          <p  v-if="booking.is_completed == true"><v-btn color="green" dark>completed
             <v-icon dark right>verified_user</v-icon></v-btn> </p>

             <p v-if="booking.is_completed == false"><v-btn color="yellow" dark>not completed
                <v-icon dark right>report</v-icon></v-btn> </p>
        </td>
        <td>{{booking.vehicle_id}}</td>
        <td>{{booking.service_date}}</td>
        <td> <v-btn color="warning">mark as completed</v-btn> </td>
        <td>
          <button type="button" class="fa fa-pencil fa-2x" @click=""> </button>
          <button type="button" class="fa fa-trash fa-2x" @click=""> </button>
        </td>
        <td>
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
              email: "foobar@example.com", // Customer email
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
