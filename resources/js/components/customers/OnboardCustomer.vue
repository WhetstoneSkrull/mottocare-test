<template lang="html">
<v-stepper v-model="e1">
  <v-stepper-header>
    <v-stepper-step :complete="e1 > 1" step="1">Basic Customer Details</v-stepper-step>

    <v-divider></v-divider>

    <v-stepper-step :complete="e1 > 2" step="2">Register Vehicles</v-stepper-step>

    <v-divider></v-divider>

    <v-stepper-step  :complete="e1 > 3" step="3">Add Drivers   <small>(optional)</small></v-stepper-step>

    <v-divider></v-divider>

    <v-stepper-step  :complete="e1 > 4" step="4">Make First Booking</v-stepper-step>
    <v-divider></v-divider>

    <v-stepper-step  :complete="e1 > 5" step="5">Payment</v-stepper-step>

  </v-stepper-header>

  <v-stepper-items>
    <v-stepper-content step="1">

      <v-container
        fill-height
        fluid
        grid-list-xl>
        <v-layout
          justify
          wrap
        >
          <v-flex
            xs12
            md8
          >
            <material-card
              color="green"
              title="Edit Profile"
              text="Complete your profile"
            >
              <v-form>
                <v-container py-0>
                  <v-layout wrap>
                    <v-flex
                      xs12
                      md4
                    >

                      <v-text-field
                        label="First Name"
                        v-model="user.first_name"
                        />
                    </v-flex>
                    <v-flex
                      xs12
                      md4
                    >
                      <v-text-field
                        class="purple-input"
                        label="Last Name"
                        v-model="user.last_name"
                      />
                    </v-flex>
                    <v-flex
                      xs12
                      md4
                    >
                      <v-text-field
                        label="Email Address"
                        class="purple-input"
                        v-model="user.email"
                        disabled/>
                    </v-flex>
                    <v-flex
                      xs12
                      md6
                    >
                      <v-text-field
                        label="Mobile No"
                        v-model="profile.mobile_no"
                        class="purple-input"/>
                    </v-flex>
                    <v-flex
                      xs12
                      md6
                    >
                      <v-text-field
                        label="D o B"
                        v-model="profile.DoB"
                        hint="dd-mm-yyyy"
                        class="purple-input"/>
                    </v-flex>
                    <v-flex
                      xs12
                      md12
                    >
                      <v-text-field
                        label="Adress"
                        v-model="profile.address"
                        class="purple-input"/>
                    </v-flex>
                    <v-flex
                      xs12
                      md4>
                      <v-select
                        :items="states"
                        v-model="profile.state"
                        label="State"
                      ></v-select>

                    </v-flex>
                    <v-flex
                      xs12
                      md4>
                        <v-select
                          :items="lgas"
                          v-model="profile.lga"
                          label="LGA"
                        ></v-select>
                    </v-flex>
                    <v-text-field
                      name="name"
                      label="City"
                      v-model="profile.city"
                    ></v-text-field>

                    <v-flex
                      xs12
                      text-xs-right
                    >
                      <v-btn
                        class="mx-0 font-weight-light"
                        color="success"
                        @click="updateProfile"
                      >
                        Update Profile
                      </v-btn>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-form>
            </material-card>
          </v-flex>
          <v-flex
            xs12
            md4
          >
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
                <h6 class="category text-gray font-weight-thin mb-3"></h6>
                <h4 class="card-title font-weight-light">{{auth_user.first_name}} {{auth_user.last_name}}</h4>
                <p class="card-description font-weight-light">{{auth_user.city}} {{auth_user.lga}}</p>
                <v-btn
                  color="success"
                  round
                  class="font-weight-light"
                >change profile pic</v-btn>

                <v-btn
                  color="success"
                  round
                  class="font-weight-light"
                  @click="editUser(auth_user)"
                >edit</v-btn>

              </v-card-text>
            </material-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-btn
        color="primary"
        @click="e1 = 2"
      >
        Next
      </v-btn>

  <!--    <v-btn flat >Cancel</v-btn> -->
    </v-stepper-content>

    <v-stepper-content step="2">
      <v-container  grid-list-md text-xs-center>
        <v-layout row wrap>
          <v-flex xs12 sm6 >
            <h4>Vehicle Details</h4>

            <v-form ref="form" v-model="valid" lazy-validation>

                <v-select
                  :items="automobiles"
                  v-model="vehicle.automobile_id"
                  item-text="name"
                  item-value="id"
                  label="Select Automobile"
                ></v-select>

                <v-select
                  :items="cars"
                  v-model="vehicle.car_id"
                  item-text="car_manufacturer"
                  item-value="id"
                  label="Select Vehicle Make"
                ></v-select>

                <v-text-field
                  v-model="vehicle.model"
                  label="Model"
                  hint="e.g Toyota has models such as Camry, Carina etc"
                  required
                ></v-text-field>

                <v-select
                  :items="years"
                  v-model="vehicle.year"
                  label="Year"
                ></v-select>

                <v-text-field
                  v-model="vehicle.vehicle_reg_no"
                  label="Vehicle Registration number"
                  hint="your vehicle number"
                  required
                ></v-text-field>

                <v-btn
                  :disabled="!valid"
                  @click="addVehicle"
                >
                  add
                </v-btn>

                <v-btn
                  color="primary"
                  @click="e1 = 3"
                >
                  Next
                </v-btn>

                <v-btn flat @click="e1 = 1">Back</v-btn>

              </v-form>

            <v-divider></v-divider

          </v-flex>
          </v-flex>
          <!--{{vehicles.length}} -->
          <v-flex xs12 sm2>
            <v-card class="white--text" v-for="vehicle in vehicles" v-bind:key="vehicle.id">
              <v-card-title primary-title>
                <v-flex xs12 sm6>
                  <v-img
                    src="/images/stock.jpg"
                    height="50px"
                    contain
                  ></v-img>
                </v-flex>
              </v-card-title>
              <v-card-text>
                <div>
                  <div class="headline">{{vehicle.car.car_manufacturer}}</div>
                  <p>Model: {{vehicle.model}}</p>
                  <p>Year: {{vehicle.year}}</p>
                  <p>Vehicle Registration Number: {{vehicle.vehicle_reg_no}}</p>
                </div>
              </v-card-text>
              <v-card-actions>
                <v-btn flat dark>
                    <v-icon @click="editVehicle(vehicle)">edit</v-icon>
                </v-btn>
                <v-btn flat dark>
                    <v-icon @click="deleteVehicle(vehicle.id)">delete</v-icon>
                </v-btn>
              </v-card-actions>
              <v-divider> </v-divider>

            </v-card>
          </v-flex>

        </v-layout>

      </v-container>

    </v-stepper-content>

    <v-stepper-content step="3">
      <v-container  grid-list-md text-xs-left>
        <v-layout row wrap>
          <v-flex xs12 sm6>
            <h3>Driver details</h3>

            <v-form ref="form" v-model="valid" lazy-validation>
                <v-text-field
                  v-model="driver.driver_first_name"
                  label="First Name"
                  hint="your driver's first name"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.driver_last_name"
                  label="Last Name"
                  hint="your driver's last name"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.email"
                  label="E-mail address"
                  hint="e-mail address of driver"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.driver_dob"
                  label="Date of Birth"
                  hint="format:(dd-mm-yyyy)"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.driving_license_no"
                  label="Driver License No."
                  hint="license number"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.driving_license_expiry_date"
                  label="Expiry date"
                  hint="format:(dd-mm-yyyy)"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.contact_no"
                  label="Contact no."
                  hint="mobile no."
                  required
                ></v-text-field>

                <v-btn
                  :disabled="!valid"
                  @click="addDriver"
                >
                  add
                </v-btn>

              </v-form>

              <v-btn
                color="primary"
                @click="e1 = 4"
              >
                Next
              </v-btn>

              <v-btn flat @click="e1 = 2">Back</v-btn>
            <v-divider></v-divider

          </v-flex>
          </v-flex>

    <v-flex xs12 sm3>
      <v-card v-for="driver in drivers"v-bind:key="driver.id">
        <v-card-title primary-title>
          <div>
            <div class="headline">{{driver.driver_first_name}} {{driver.driver_last_name}}</div>
            <span class="grey--text">{{driver.email}}</span>
          </div>
        </v-card-title>
        <v-card-text>
          <p>Dirver's date of birth: {{driver.driver_dob}}</p>
          <p>License no: {{driver.driving_license_no}}</p>
          <p>License expiry date: {{driver.driving_license_expiry_date}}</p>
          <p>contact no: {{driver.contact_no}}</p>
        </v-card-text>
        <v-spacer></v-spacer>
      <v-divider></v-divider>
      </v-card>
    </v-flex>

        </v-layout>

      </v-container>
    </v-stepper-content>

    <v-stepper-content step="4">
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <v-container grid-list-xs,sm,md,lg,xl>
            <v-card>

              <div class="input-group spacer col-md-4">
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
                v-model="selected"
                item-text="vendor_title"
                item-value="id"
                label="Select Vendor"
                v-on:change="onChange" >
              ></v-select>

              <v-select
                :items="vendor.servicerenders"
                v-model="booking.service_renders"
                label="Select Service"
                item-text="price"
              ></v-select>

              <v-text-field
                name="name"
                label="Select Date"
                v-model="booking.service_date"
               hint="date format:(dd-mm-yyyy)"
              ></v-text-field>

            </v-card>

       <v-btn
         color="blue"
          @click="makeBooking"
       >
         Book
       </v-btn>

       </v-container>
     </v-flex>

      <v-flex xs12 sm6>
        <v-card >
          <v-card-title primary-title>
            <div>
              <div class="headline">Booking Invoice</div>
              <span class="grey--text">{{booking.booking_no}}{{booking.id}}</span>
            </div>
          </v-card-title>
          <v-card-text>

          </v-card-text>
          <v-card-actions>
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
               <v-divider></v-divider>
            </paystack>

          </v-card-actions>
          <v-spacer></v-spacer>
        <v-divider></v-divider>
        </v-card>
      </v-flex>

      <v-btn
        color="primary"
        @click="e1 = 5"
      >
        Next
      </v-btn>

      <v-btn flat @click="e1 = 3">Back</v-btn>
    </v-layout>
    </v-stepper-content>
    <v-stepper-content step="5">
      <v-container >

        <v-card xs12 sm6>
          <v-card-title primary-title>
            <div>
              <div class="headline">Booking Invoice</div>
              <span class="grey--text">{{booking.booking_no}}{{booking.id}}</span>
            </div>
          </v-card-title>
          <v-card-text>
            <p>Amount Payable: &#8358;{{amount | numeral('0,0')}} </p>
        <!--    <p>Vendor: {{selectedDrinkLabel }}</p> -->
            <p> <strong> Service items:</strong> </p>

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
        <v-btn
          color="primary"
          @click="e1 = 4"
        >
          Back
        </v-btn>

      </v-container>

    </v-stepper-content>
  </v-stepper-items>
</v-stepper>
</template>

<script>

import paystack from 'vue-paystack';
import Multiselect from 'vue-multiselect'


export default {
  components: {
      paystack, Multiselect
  },
  data () {
      return {
        paystackkey: "pk_test_f05cdb293d594a7ce616748054fd99dc8267a832", //paystack public key
        email: "fooFbar@example.com", // Customer email
        amount: 10000, //
        show: false,
        e1: 0,
        vehicles: [],
        states: ['Abuja(FCT)','Lagos','Kaduna'],
        lgas: [],
        automobiles: [],
        cars: [],
        dealers: [],
        categories: ['Bike', '3 Wheeler', 'Car', 'Commercial Bus','Luxury Car'],
        years: ['1990', '1991','1992','1993','1994','1995','1996','1997','1998','1999','2000','2001','2002','2003','2004','2005',
                  '2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019'],
        manufacturers:[	'Acura',	'Aston Martin', 'Audi', 	'Bajaj', 'Bentley', 'BMW', 	'Bugatti', 'Buick',
                  	'Cadillac', 	'Chevrolet', 'Chevron', 'Citroën', 'Chrysler', 	'Corvette', 'Daihatsu', 'Dodge',
                  	 'Ferrari', 'Fiat', 	'Ford', 'Genesis', 'GMC', 'Honda', 'Hyundai', 'Isuzu', 'Jaguar', 	'Jeep', 'Kia',
                  	'Lamborghini', 'Land Rover', 	'Lincoln', 	'Maruti', 'Suzuki', 	'Maserati', 	'Mazda', 'McLaren', 'Mercedes-Benz',
                   'Mitsubishi', 	'Nissan', 'Opel', 	'Peugeot', 'Porsche',	'Renault', 'Rolls-Royce',	'Rover',	'Samsung',
                    'Suzuki', 'Tata', 'Tesla', 	'Toyota', 'Trekka', 	'Ultima', 	'Vauxhall Motors', 	'Volkswagen', 'Volvo',	'Yamaha'],
        drivers: [],
        valid: true,
        user : null,
        selected:"",
        vendors:[],
        vendor:[],
        auth_user: {},

        vehicle:{
          id:"",
          user_id:"",
          car_id:"",
          automobile_id:"",
          year:"",
          pic:"",
          vehicle_reg_no:""
        },
        driver:{
          id:"",
          user_id:"",
          driver_first_name:"",
          driver_last_name:"",
          driver_dob:"",
          driving_license_no:"",
          driving_license_expiry_date:"",
          contact_no:"",
          email:""
        },
        profile:{
          first_name:"Motto",
          last_name:"Care",
          mobile_no:"",
          driver_license:"",
          DoB:"",
          address:"",
          license_no:"",
          lga:"",
          city:"",
          account_pic:"sjsj.ssi"
        },
        booking:{
          id:"",
          user_id:"",
          vehicle_id:"",
          service_render_id:1,
          service_date:new Date().toISOString().substr(0, 10),
          service_time:"12:00",
          is_completed:false
        },
        edit1: false,
        edit: false,
        edit2: false,
        driver_id:'',
        vehicle_id:''

      }
    },
    beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/cars`)
        .then(response => {
            this.cars = response.data
        })
        .catch(error => {
            console.error(error);
        })
    },

    methods:{
      clearIt() {
        this.$refs.form.reset()
      },

    fetchVendors(){

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

    onChange: function (){
      var self = this
      console.log(self.vendor);
       axios.get('/api/vendor/'+this.selected)
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

      fetchUser(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user`)
        .then(response => {
            this.auth_user = response.data
        })
        .catch(error => {
            console.error(error);
        })
      },

      fetchAutomobiles() {
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

      axios.get(`api/automobiles`)
      .then(response => {
          this.automobiles = response.data
      })
      .catch(error => {
          console.error(error);
      })
    },
    fetchCar() {
      this.user = JSON.parse(localStorage.getItem('user'))
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

    axios.get(`api/cars`)
    .then(response => {
        this.cars = response.data
    })
    .catch(error => {
        console.error(error);
    })
  },

      updateProfile(){
        axios.put('/api/auth/user/update',this.profile)

        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.vehicleUpdated().goAway(1500);
          //  this.clearIt();
            this.fetchUser();

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      editUser(profile) {
      this.edit1 = true;
      this.profile.first_name = profile.first_name;
      this.profile.last_name = profile.last_name;
      this.profile.email = profile.email;
      this.profile.city = profile.city;
      this.profile.lga = profile.lga;
    },

      fetchDrivers() {
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

      axios.get(`api/auth/user/${this.user.id}/drivers`)
      .then(response => {
          this.drivers = response.data
      })
      .catch(error => {
          console.error(error);
      })
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
    addDriver(){

      if (this.edit2 === false) {
      // Add Driver
      axios.post('/api/driver',this.driver)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.driverAdded().goAway(1500);
          this.clearIt();
          this.fetchDrivers();

      })
      .catch(error=>{
          console.log(error.response)
      })
    }else {
      // Update
      axios.put('/api/driver',this.driver)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.driverUpdated().goAway(1500);
          this.clearIt();
          this.fetchDrivers();

      })
      .catch(error=>{
          console.log(error.response)
        })
      }
    },
    addVehicle(){

      if (this.edit === false) {
      // Add Vehicle
      axios.post('/api/vehicle',this.vehicle)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleAdded().goAway(1500);
          this.clearIt();
          this.fetchVehicles();

      })
      .catch(error=>{
          console.log(error.response)
      })
    }else {
      // Update
      axios.put('/api/vehicle',this.vehicle)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleUpdated().goAway(1500);
          this.clearIt();
          this.fetchVehicles();

      })
      .catch(error=>{
          console.log(error.response)
      })

      }
    },
      clearIt() {
        this.$refs.form.reset()
      },
      editVehicle(vehicle) {
      this.edit = true;
      this.vehicle.id = vehicle.id;
      this.vehicle.vehicle_id = vehicle.id;
      this.vehicle.vehicle_make = vehicle.vehicle_make;
      this.vehicle.year = vehicle.year;
      this.vehicle.model = vehicle.model;
      this.vehicle.vehicle_reg_no = vehicle.vehicle_reg_no;
    },
    callback: function(response){
        console.log(response)
      },
      close: function(){
          console.log("Payment closed")
      }
  },
  computed: {
/*  totalMarks: function() {
    let total = 0;
    for(let i = 0; i < this.vendor.servicerenders.length; i++){
      total += parseInt(this.vendor.servicerenders[i].price);
    }
    return total;
  }, */
  reference(){
    let text = "";
    let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( let i=0; i < 10; i++ )
      text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
  }
},

  created(){
    this.fetchVehicles();
    this.fetchAutomobiles();
    this.fetchDrivers();
    this.fetchUser();
    this.editUser();
    this.fetchCar();
    this.fetchVendors();

  }

}
</script>

<style lang="css" scoped>
.spacer{
  margin-top:20px;
  margin-bottom:20px;
  margin-left: 20px;
  margin-right: 20px;
}

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
