<template lang="html">
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>

      <v-flex xs12 sm12>
        <p class="title">{{vendor.vendor_title}} </p>
        <v-chip >{{vendor.status}}</v-chip>

        <v-spacer></v-spacer>
        <v-btn color="blue" @click="approveRequest" class="white--text">
          approve application
        </v-btn>
        <v-btn color="red" @click="rejectRequest" class="white--text">
          reject application
        </v-btn>
      </v-flex>
      <v-flex xs12 sm6>
        <v-card>
          <v-card-title primary-title>
            {{vendor.vendor_first_name}} {{vendor.vendor_last_name}}
          </v-card-title>
          <v-card-text>
            <p>{{vendor.vendor_email}}</p>
          </v-card-text>

        </v-card>
    </v-flex>
<v-spacer></v-spacer>

<v-flex xs12 sm4>

</v-flex>

   </v-layout>
 </v-container>
</template>

<script>

  export default {
    data () {
      return {
        vendor: [],
        slot1:{
          slot_name:"(08:00-08:20)am",
          vendor_id:"",
          slot_status:"open"
            },
          slot2:{
          slot_name:"(08:21-08:40)am",
          vendor_id:"",
          slot_status:"open"
            },
          slot3:{
            slot_name:"(08:41-09:00)am",
            vendor_id:"",
            slot_status:"open"
              },
            slot4:{
              slot_name:"(09:01-09:20)am",
              vendor_id:"",
              slot_status:"open"
                },
              slot5:{
                slot_name:"(09:21-09:40)am",
                vendor_id:"",
                slot_status:"open"
                  },
              slot6:{
              slot_name:"(09:41-10:00)am",
              vendor_id:"",
              slot_status:"open"
                },
              slot7:{
                slot_name:"(10:01-10:20)am",
                vendor_id:"",
                slot_status:"open"
                  },
                  slot8:{
                    slot_name:"(10:21-10:40)am",
                    vendor_id:"",
                    slot_status:"open"
                      },
                      slot9:{
                        slot_name:"(10:41-11:00)am",
                        vendor_id:"",
                        slot_status:"open"
                          },
                          slot10:{
                            slot_name:"(11:01-11:20)am",
                            vendor_id:"",
                            slot_status:"open"
                              },
                            slot11:{
                              slot_name:"(11:21-11:40)am",
                              vendor_id:"",
                              slot_status:"open"
                                },
                          slot12:{
                            slot_name:"(11:41-12:00)pm",
                            vendor_id:"",
                            slot_status:"open"
                              },
                          slot13:{
                            slot_name:"(12:01-12:20)pm",
                            vendor_id:"",
                            slot_status:"open"
                              },
                          slot14:{
                            slot_name:"(12:21-12:40)pm",
                            vendor_id:"",
                            slot_status:"open"
                              },
                              slot15:{
                                slot_name:"(12:41-01:00)pm",
                                vendor_id:"",
                                slot_status:"open"
                                  },
                              slot16:{
                                slot_name:"(01:01-01:20)pm",
                                vendor_id:"",
                                slot_status:"open"
                                  },
                              slot17:{
                                slot_name:"(01:21-01:40)pm",
                                vendor_id:"",
                                slot_status:"open"
                                  },
                                  slot18:{
                                    slot_name:"(01:41-02:00)pm",
                                    vendor_id:"",
                                    slot_status:"open"
                                      },
                slot19:{
                  slot_name:"(02:01-02:20)pm",
                  vendor_id:"",
                  slot_status:"open"
                    },
                    slot20:{
                      slot_name:"(02:21-02:40)pm",
                      vendor_id:"",
                      slot_status:"open"
                        },
                        slot21:{
                          slot_name:"(02:41-03:00)pm",
                          vendor_id:"",
                          slot_status:"open"
                            },
                            slot22:{
                              slot_name:"(03:01-03:20)pm",
                              vendor_id:"",
                              slot_status:"open"
                                },
                                slot23:{
                                  slot_name:"(03:21-03:40)pm",
                                  vendor_id:"",
                                  slot_status:"open"
                                    },
                                    slot24:{
                                      slot_name:"(03:41-04:00)pm",
                                      vendor_id:"",
                                      slot_status:"open"
                                        },

          slot25:{
            slot_name:"(04:01-04:20)pm",
            vendor_id:"",
            slot_status:"open"
              },
          slot26:{
            slot_name:"(04:21-04:40)pm",
            vendor_id:"",
          slot_status:"open"
            },
              slot27:{
                slot_name:"(04:41-05:00)pm",
                vendor_id:"",
                slot_status:"open"
                  },
                performingRequest: false,


          }
      },

      beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`/api/vendor/${this.$route.params.id}`)
              .then(response => {
                  this.vendor = response.data.data
              })
              .catch(error => {
                  console.error(error);
              })

     },

    methods:{
      approveRequest(){
        this.performingRequest = true

        axios.patch(`/api/vendor/${this.$route.params.id}/approve`)
        .then(response=>{
            console.log(response);

            this.$toasted.global.doneSuccessfully().goAway(1500);
            this.addSlot1();
            this.addSlot2();
            this.addSlot3();
            this.addSlot4();
            this.addSlot5();
            this.addSlot6();
            this.addSlot7();
            this.addSlot8();
            this.addSlot9();
            this.addSlot10();
            this.addSlot11();
            this.addSlot12();
            this.addSlot13();
            this.addSlot14();
            this.addSlot15();
            this.addSlot16();
            this.addSlot17();
            this.addSlot18();
            this.addSlot19();
            this.addSlot20();
            this.addSlot21();
            this.addSlot22();
            this.addSlot23();
            this.addSlot24();
            this.addSlot25();
            this.addSlot26();
            this.addSlot27();
            this.performingRequest = false

            this.fetchVendor();


        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot1(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot1.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot1.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot2(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot2.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot3(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot3.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot3.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot4(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot4.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot4.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot5(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot5.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot5.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot6(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot6.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot6.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot7(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot7.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot7.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot8(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot8.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot8.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot9(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot9.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot9.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot10(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot10.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot10.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot11(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot11.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot11.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },

      addSlot12(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot12.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot12.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot13(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot13.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot13.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot14(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot14.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot14.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot15(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot15.slot_name,
          vendor_id: this.vendor.id,
          slot_status: this.slot15.slot_status,
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot16(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot16.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot17(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot17.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot18(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot18.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot19(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot19.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot20(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot20.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot21(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot21.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot22(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot22.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot23(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot23.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot24(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot24.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot25(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot25.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot26(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot26.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      addSlot27(){
        axios.post(`/api/slot`, {
          user_id: this.vendor.user_id,
          slot_name: this.slot27.slot_name,
          vendor_id: this.vendor.id,
          slot_status: 'open',
        })
        .then(response=>{
            console.log(response);
            this.$toasted.global.doneSuccessfully().goAway(1500);
        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      rejectRequest(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.patch(`/api/vendor/${this.$route.params.id}/reject`)
              .then(response => {
                  this.vendor = response.data.data
                  this.$toasted.global.doneSuccessfully().goAway(1500);
                  this.fetchVendor();
              })
              .catch(error => {
                  console.error(error);
              })
      },
        fetchVendor(){
          axios.get(`/api/vendor/${this.$route.params.id}`)
                .then(response => {
                    this.vendor = response.data.data
                })
                .catch(error => {
                    console.error(error);
                })
        }


    },
    computed: {
      //
 },
   created(){
      this.fetchVendor()
    }
  }
</script>
<style lang="css">
.overlay{
  position: fixed; /* Sit on top of the page content */
  display: none; /* Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
</style>
