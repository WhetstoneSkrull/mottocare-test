<template lang="html">
  <v-container grid-list-xs,sm,md,lg,xl>
    <v-flex x12 sm6 offset-sm3>
      <p>{{user.first_name}}</p>

      <v-text-field
        name="name"
        label="Amount"
        v-model="withdrawal.amount"
      ></v-text-field>

      <v-form v-model="withdrawal.user_id" v-show="show">
      <v-text-field
        name="name"
        label="ID"
        :value="user.id"
      ></v-text-field>
    </v-form>

         <v-btn color="primary" @click="makeWithdrawal">Request Withdrawal</v-btn>

    </v-flex>
    <v-card>
      <v-card-title primary-title>
        Wallet Balance  &#8358;{{totalMarks | numeral('0,0')}}
      </v-card-title>
    </v-card>
    <div class="table-responsive">

    <table class="table">
  <thead class="thead-info">
    <tr>
      <th scope="col">Transaction type</th>
      <th scope="col">amount</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="trx in transactions"v-bind:key="trx.id">
      <td>{{trx.transaction_type}}</td>
      <td>{{trx.amount}}</td>

    </tr>
  </tbody>
</table>
</div>

  </v-container>
</template>

<script>
import paystack from 'vue-paystack';

export default {
  components: {
      paystack
  },
  data(){
    return{
      paystackkey: "pk_test_f05cdb293d594a7ce616748054fd99dc8267a832", //paystack public key
      email: "admin@admin.com", // Customer email
      amount: 1000000, // in kobo,
      show: false,
        user : null,
        transactions : [],
        withdrawal:{
          user_id:"",
          source:"balance",
          amount:"",
          recipient:"RCP_ttpjki4kawslq1l",
          reference:""
        },
        fund:{
          user_id:"",
          wallet_id:"",
          transaction_type:"withdrawal",
          amount:""
        }
    }
  },
  beforeMount(){
    this.user = JSON.parse(localStorage.getItem('user'))
    axios.defaults.headers.common['Content-Type'] = 'application/json'
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

          axios.get(`api/auth/user/${this.user.id}/transactions`)
          .then(response => {
              this.transactions = response.data
          })
          .catch(error => {
              console.error(error);
          })
  },
  computed: {
    reference(){
      let text = "";
      let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for( let i=0; i < 10; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    },
    totalMarks: function() {
      let total = 0;
      for(let i = 0; i < this.transactions.length; i++){
        total += parseInt(this.transactions[i].amount);
      }
      return total;
    }
  },
  methods:{
    makeWithdrawal(){
      this.$http.post('https://api.paystack.co/transfer', {
                amount: this.withdrawal.amount*100,
                reference: this.withdrawal.reference,
                user_id: this.withdrawal.user_id,
                source: this.withdrawal.source,
                recipient: this.withdrawal.recipient
            }).then(function(data){
                console.log(data);
                this.$toasted.global.madeWithdrawal().goAway(1500);
                this.callback();
                this.fetchTrx();

            });
    },
    callback: function(response){
      this.user = JSON.parse(localStorage.getItem('user'))
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

      axios.post('/api/transaction', {
          user_id: this.withdrawal.user_id,
          transaction_type: this.fund.transaction_type,
          amount: -this.withdrawal.amount-50
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });

    },
    close: function(){
        console.log("Payment closed")
    },
    fetchTrx(){
      axios.get(`api/auth/user/${this.user.id}/transactions`)
      .then(response => {
          this.transactions = response.data
      })
      .catch(error => {
          console.error(error);
      })
    }

  },
  created(){
    //
  }
}
</script>

<style lang="css">
</style>
