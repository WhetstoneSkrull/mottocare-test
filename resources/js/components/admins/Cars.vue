<template lang="html">
  <v-container >
    <v-layout row wrap>

    <v-flex xs12 sm6>
      <v-form ref="form">

          <v-text-field
            v-model="car.car_manufacturer"
            label="Car Manufacturer"
            hint="e.g Honda, Toyota etc"
            required
          ></v-text-field>

          <v-btn
            @click="addCar"
          >
            submit
          </v-btn>
        </v-form>

      <v-divider></v-divider
    </v-flex>
    </v-flex>
    <v-flex xs12 sm3>
      <v-card v-for="car in cars" v-bind:key="car.id">
        <p>Car Manufacturer: {{car.car_manufacturer}}</p>
      </v-card>
    </v-flex>
  </v-layout>
  </v-container>
</template>

<script>
export default {
  data (){
    return{
      cars:[],
      car:{
        car_manufacturer:""
      },
      edit:false,
      car_id:''

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
    fetchCar() {

    axios.get(`api/cars`)
    .then(response => {
        this.cars = response.data
    })
    .catch(error => {
        console.error(error);
    })
  },
    addCar(){

      if (this.edit === false) {
      // Add Vehicle
      axios.post('/api/car',this.car)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleAdded().goAway(1500);
          this.clearIt();
          this.fetchCar();

      })
      .catch(error=>{
          console.log(error.response)
      })
    }else {
      // Update
      axios.put('/api/car',this.car)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleUpdated().goAway(1500);
          this.clearIt();
          this.fetchCar();

      })
      .catch(error=>{
          console.log(error.response)
      })

      }
    },
    editCar(car) {
    this.edit = true;
    this.car.id = car.id;
    this.car.car_id = car.id;
    this.car.car_manufacturer = car.car_manufacturer;

  },
  deleteCar(id) {
    if (confirm('Are You Sure?')) {
      fetch(`api/car/${id}`, {
        method: 'delete'
      })
        .then(res => res.json())
        .then(data => {
        //  alert('Vehicle Deleted');
        this.$toasted.global.vehicleDeleted().goAway(1500);
          this.fetchCars();
        })
        .catch(err => console.log(err));
    }
  },

    clearIt() {
      this.$refs.form.reset()
    }
  },
  created(){
    this.fetchCar();
  }
}
</script>

<style lang="css">
</style>
