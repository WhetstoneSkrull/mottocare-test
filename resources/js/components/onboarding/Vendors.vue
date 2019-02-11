<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm8 offset-sm2>
        <p class="headline">make first booking</p>
      </v-flex>

    <v-flex xs12 sm8 offset-sm2>
      <v-card>
        <div class="input-group spacer col-md-6">
          <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">Select Vehicle</label>
          </div>
          <select class="custom-select" id="inputGroupSelect02" v-model="booking.vehicle_id">
            <option selected>Choose...</option>
              <option :value="vehicle.id" v-for="vehicle in vehicles">
                {{vehicle.car.car_manufacturer}}
              </option>
            </select>
        </div>
          <v-select
            :items="vendors"
            v-model="booking.vendor_id"
            item-text="vendor_title"
            item-value="id"
            label="Select Vendor"
            v-on:change="onChange" >
          ></v-select>

          <v-select
            :items="vendor.servicerenders"
            v-model="booking.service_renders"
            label="Vendor"
            item-text="service.service_name"
            item-value="id"
            multiple
          ></v-select>

          <v-text-field
            name="name"
            label="Select Date"
            v-model="booking.service_date"
           hint="date format:(dd-mm-yyyy)"
          ></v-text-field>
        </v-card>

   <v-btn  @click="makeBooking">
     Continue
   </v-btn>
      </v-card>
    </v-flex>

    <v-spacer></v-spacer>

  </v-layout>
  </v-container>
</template>

<script>
export default {
  data(){
    return{
      vendors:[],
      vehicles:[],
      vendor:[],
      value:"",
      selected:"",
      booking:{
        id:"",
        user_id:"",
        vehicle_id:"",
        service_renders:"",
        service_date:new Date().toISOString().substr(0, 10),
        service_time:"12:00",
        is_completed:false
      }
    }
  },
  beforeMount(){
      this.user = JSON.parse(localStorage.getItem('user'))
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

      axios.get(`api/all/vendors`)
      .then(response => {
          this.vendors = response.data
      })
      .catch(error => {
          console.error(error);
      })
  },
  methods:{
    onChange: function (){
      var self = this
      console.log(self.vendor);
       axios.get('/api/vendor/'+this.booking.vendor_id)
        .then(function (response) {
          console.log(response);
          self.vendor = response.data.data;
        //  console.log('before list');
          //console.log(self.list);
          console.log();
        })
        .catch(function (error) {
          console.log(error);
        });
     },
     fetchVehicles() {
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
     makeBooking(){
       axios.post('/api/booking',this.booking)
       .then(response=>{
           console.log(response);
         localStorage.setItem('booking',JSON.stringify(response.data.data))
           this.$router.push('/confirm-booking');

          // this.$toasted.global.bookingAdded().goAway(1500);

       })
       .catch(error=>{
           console.log(error.response)
       })
     }

  },
    created(){
      this.fetchVehicles();
    }
}
</script>

<style lang="css">
</style>
