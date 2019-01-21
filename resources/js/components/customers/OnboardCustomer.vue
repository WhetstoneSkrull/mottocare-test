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

  </v-stepper-header>

  <v-stepper-items>
    <v-stepper-content step="1">

      <v-container
        fill-height
        fluid
        grid-list-xl>
        <v-layout
          justify-center
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
                      <v-text-field
                        label="City"
                        v-model="profile.city"
                        class="purple-input"/>
                    </v-flex>
                    <v-flex
                      xs12
                      md4>
                      <v-text-field
                        label="LGA"
                        v-model="profile.lga"
                        class="purple-input"/>
                    </v-flex>
                    <v-flex
                      xs12
                      md4>
                      <v-text-field
                        class="purple-input"
                        v-model="profile.license_no"
                        label="License No"
                        />
                    </v-flex>

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
        Continue
      </v-btn>

      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-content step="2">
      <v-container  grid-list-md text-xs-center>
        <v-layout row wrap>
          <v-flex xs12 sm12>
            <v-form ref="form" v-model="valid" lazy-validation>

                <v-text-field
                  v-model="vehicle.vehicle_make"
                  label="Vehicle Make"
                  :rules="nameRules"
                  hint="e.g Honda, Toyota etc"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="vehicle.model"
                  label="Model"
                  :rules="nameRules"
                  hint="e.g Toyota has models such as Camry, Carina etc"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="vehicle.year"
                  label="Year"
                  :rules="nameRules"
                  hint="your vehicle manufactured date"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="vehicle.vehicle_reg_no"
                  label="Vehicle Registration number"
                  :rules="nameRules"
                  hint="your vehicle number"
                  required
                ></v-text-field>

                <v-btn
                  :disabled="!valid"
                  @click="addVehicle"
                >
                  submit
                </v-btn>
                <v-btn @click="clearIt">clear</v-btn>
              </v-form>

            <v-divider></v-divider

          </v-flex>
          </v-flex>

          <v-flex xs12 sm12>
            <h3>My cars {{vehicles.length}}</h3>
          </v-flex>

          <v-flex xs12 sm4  v-for="vehicle in vehicles" v-bind:key="vehicle.id">
            <v-card color="blue-grey darken-2" class="white--text" hover="true">
              <v-card-title primary-title>
                <v-flex xs12 sm4>
                  <v-img
                    src="/images/stock.jpg"
                    height="125px"
                    contain
                  ></v-img>
                </v-flex>
                <div>
                  <div class="headline">{{vehicle.vehicle_make}}</div>
                  <span>Model: {{vehicle.model}}</span>
                  <span>Year: {{vehicle.year}}</span>
                  <span>Vehicle Registration Number: {{vehicle.vehicle_reg_no}}</span>
                </div>
              </v-card-title>
              <v-card-actions>
                <v-btn flat dark>
                    <v-icon @click="editVehicle(vehicle)">edit</v-icon>
                </v-btn>
                <v-btn flat dark>
                    <v-icon @click="deleteVehicle(vehicle.id)">delete</v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
            <v-divider> </v-divider>
          </v-flex>

        </v-layout>

      </v-container>

      <v-btn
        color="primary"
        @click="e1 = 3"
      >
        Continue
      </v-btn>

      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-content step="3">
      <v-container  grid-list-md text-xs-center>
        <v-layout row wrap>
          <v-flex xs12 sm12>
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
                  hint="(yyyy-mm-dd)"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.driving_license_no"
                  label="Driver License No."
                  hint="(yyyy-mm-dd)"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="driver.driving_license_expiry_date"
                  label="Expiry date"
                  hint="driver's license expiry date"
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
                  submit
                </v-btn>
                <v-btn @click="clearIt">clear</v-btn>
              </v-form>

            <v-divider></v-divider

          </v-flex>
          </v-flex>

          <v-flex xs12 sm12>
            <h3>My Drivers</h3>
          </v-flex>

          <div class="table-responsive">

          <table class="table">
        <thead class="thead-info">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">License No.</th>
            <th scope="col">Mobile No.</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="driver in drivers"v-bind:key="driver.id">
            <th scope="row">1</th>
            <td>{{driver.driver_first_name}}</td>
            <td>{{driver.driver_last_name}}</td>
            <td>{{driver.driver_dob}}</td>
            <td>{{driver.driving_license_no}}</td>
            <td>{{driver.driving_license_expiry_date}}</td>
            <td>{{driver.contact_no}}</td>
            <td>{{driver.email}}</td>
            <td>
              <button type="button" class="fa fa-pencil fa-2x" @click="editDriver(driver)"> </button>
              <button type="button" class="fa fa-trash fa-2x" @click="deleteDriver(driver.id)"> </button>
            </td>
          </tr>
        </tbody>
      </table>
      </div>


        </v-layout>

      </v-container>

      <v-btn
        color="primary"
        @click="e1 = 4"
      >
        Continue
      </v-btn>

      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
    <v-stepper-content step="4">

      <div class="col-xs-12 col-md-8 spacer">
       <div class="input-group">
         <select class="custom-select" id="inputGroupSelect02" v-model="selectedDrink" @change="selectDrink">
           <option selected>Choose...</option>
             <option  v-for="(vendor,index) in vendors" :value="index">
               {{vendor.label}}
             </option>
           </select>
       <div class="input-group-append">
         <label class="input-group-text" for="inputGroupSelect02">Select Vendor</label>
       </div>
      </div>
      </div>

      <div class="col-xs-12 col-md-8 spacer">
       <div class="input-group">
         <select class="custom-select" id="inputGroupSelect02" v-model="selectedOption" v-if="options.length">
           <option selected>Choose...</option>
             <option  v-for="option in options">
               {{option}}
             </option>
           </select>
       <div class="input-group-append">
         <label class="input-group-text" for="inputGroupSelect02">Select Service</label>
       </div>
      </div>
      </div>


      <div class="col-xs-12 col-md-8 spacer">
       <div class="input-group">
         <select class="custom-select" id="inputGroupSelect02" v-model="booking.vehicle_id">
           <option selected>Choose...</option>
             <option :value="vehicle.id" v-for="vehicle in vehicles">
               {{vehicle.vehicle_make}}  ({{vehicle.model}})
             </option>
           </select>
       <div class="input-group-append">
         <label class="input-group-text" for="inputGroupSelect02">Select Vehicle</label>
       </div>
      </div>
      </div>

        <v-flex xs12 md12>
          <v-flex>
            <v-select
           :items="items"
           label="Pick a slot"
         ></v-select>
           </v-flex>
       </v-flex>

       <v-btn
         color="blue"
          @click="makeBooking"
       >
         Book
       </v-btn>


    <!--  <v-btn
        color="primary"
        @click="e1 = 1"
      >
        Continue
      </v-btn>  -->

      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
  </v-stepper-items>
</v-stepper>
</template>

<script>
export default {
  data () {
      return {
        e1: 0,
        vehicles: [],
        drivers: [],
        valid: true,
        user : null,
        items: ['(08:00-08:30)AM', '(08:31-09:00)AM', '(09:00-09:30)AM', '(10:00-10:30)AM', '(10:31-11:00)AM','(11:01-11:30)AM'],
        auth_user: {},
        vendors:[
      {
        label:"Oando Shop",
        options:["Alternator Change","Wiring","Washing"]
      },
      {
        label:"Home Depot Mechanic",
        options:["Full servicing","Panel Beating","Change Oil"]
      },
      {
        label:"Aliyu Helper Mech Boys",
        options:["Painting","Body Spray","Tyres and Wheel Alignment"]
      }
    ],
    selectedDrink:-1,
    selectedOption:'',
    options:[],
    selectedDrinkLabel:'',
        vehicle:{
          id:"",
          user_id:"",
          vehicle_make:"",
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

        axios.get(`api/auth/user/${this.user.id}/drivers`)
        .then(response => {
            this.drivers = response.data
        })
        .catch(error => {
            console.error(error);
        })
    },

    methods:{
      clearIt() {
        this.$refs.form.reset()
      },
      selectDrink:function() {
      this.selectedOption = '';
      this.options = this.vendors[this.selectedDrink].options;
      this.selectedDrinkLabel = this.vendors[this.selectedDrink].label;
    },

    makeBooking(){
      axios.post('/api/booking',this.booking)
      .then(response=>{
          console.log(response);
          this.$router.push('/bookings');
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
    }
  },

  created(){
    this.fetchVehicles();
    this.fetchDrivers();
    this.fetchUser();
    this.editUser();

  }

}
</script>

<style lang="css">
.spacer{
  margin-top:20px;
  margin-bottom:20px;
}
</style>
