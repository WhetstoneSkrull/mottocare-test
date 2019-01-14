<template>
  <v-container grid-list-xs,sm,md,lg,xl>

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
  </v-container>

</template>

<script type="text/javascript">
import paystack from 'vue-paystack';
export default {
    components: {
        paystack
    },
    data(){
        return{
          paystackkey: "pk_test_f05cdb293d594a7ce616748054fd99dc8267a832", //paystack public key
          email: "foobar@example.com", // Customer email
          amount: 1000000 // in kobo
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
    methods: {
      callback: function(response){
        console.log(response)
      },
      close: function(){
          console.log("Payment closed")
      }
    }
}
</script>
