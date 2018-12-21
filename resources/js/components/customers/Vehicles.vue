<template lang="html">
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
</template>

<script>
export default {
  data (){
    return {
      valid: true,
      user : null,
      vehicles : [],
      nameRules: [
        v => !!v || 'This field is required'
      ],
      vehicle:{
        id:"",
        user_id:2,
        vehicle_make:"",
        year:"",
        pic:"",
        vehicle_reg_no:""
      },
        edit: false,
        vehicle_id:'',
      name: ''
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
      fetchVehicles() {

      axios.get(`api/auth/user/${this.user.id}/vehicles`)
      .then(response => {
          this.vehicles = response.data
      })
      .catch(error => {
          console.error(error);
      })
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
      editVehicle(vehicle) {
      this.edit = true;
      this.vehicle.id = vehicle.id;
      this.vehicle.vehicle_id = vehicle.id;
      this.vehicle.vehicle_make = vehicle.vehicle_make;
      this.vehicle.year = vehicle.year;
      this.vehicle.model = vehicle.model;
      this.vehicle.vehicle_reg_no = vehicle.vehicle_reg_no;
    },
    deleteVehicle(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/vehicle/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
          //  alert('Vehicle Deleted');
          this.$toasted.global.vehicleDeleted().goAway(1500);
            this.fetchVehicles();
          })
          .catch(err => console.log(err));
      }
    },

      clearIt() {
        this.$refs.form.reset()
      }
    },
    created() {
    this.fetchVehicles();
  }
}
</script>

<style lang="css">
</style>
