<template lang="html">
  <v-container >
    <v-layout row wrap>

    <v-flex xs12 sm6>
      <v-form ref="form">

        <v-card>
          <v-card-title primary-title>Test Booking</v-card-title>

          <div class="" v-for="vendor in vendors" v-bind:key="vendor.id">
                <p>check: {{vendor.vendor_title}}</p>
                <p v-for="x in vendor.servicerenders" v-bind:key="x.id">
                  service: {{x.price}}
                </p>
          </div>


          <v-select
            :items="vendors"
             v-model="selectedDrink"
             v-on:change="selectDrink"
            label="Select Vendor"
            item-text="vendor_title"
            item-value=""
          ></v-select>

          <v-select
            :items="servicerenders"
            item-text="price"
            v-model="selectedOption"
            label="Select Service"
          ></v-select>

        </v-card>

          <v-text-field
            v-model="automobile.name"
            label="Automobile"
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
      <v-card v-for="automobile in automobiles" v-bind:key="automobile.id">
        <p>Automobile: {{automobile.name}}</p>
      </v-card>
    </v-flex>
  </v-layout>
  </v-container>
</template>

<script>
export default {
  data (){
    return{
      automobiles:[],
      selectedDrink:-1,
      selectedOption:'',
      servicerenders:[],
      selectedDrinkLabel:'',
      firstOption:'',
      secondOption:'',
      vendors:[
        {
          //servicerenders:[]
        }
      ],
      oo:"",
      automobile:{
        name:""
      },
      edit:false,
      automobile_id:''

    }
  },
  beforeMount(){
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
  methods:{

    selectDrink:function() {
    this.selectedOption = '';
    this.servicerenders = this.vendors[this.selectedDrink].servicerenders;
    this.selectedDrinkLabel = this.vendors[this.selectedDrink].vendor_title;
    },

    fetchVendors() {

    axios.get(`api/all/vendors`)
    .then(response => {
        this.vendors = response.data
    })
    .catch(error => {
        console.error(error);
    })
  },
    fetchCar() {

    axios.get(`api/automobiles`)
    .then(response => {
        this.automobiles = response.data
    })
    .catch(error => {
        console.error(error);
    })
  },
    addCar(){

      if (this.edit === false) {
      // Add Vehicle
      axios.post('/api/automobile',this.automobile)

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
      axios.put('/api/automobile',this.automobile)

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
    this.automobile.id = automobile.id;
    this.automobile.auto_id = automobile.id;
    this.automobile.name = automobile.name;

  },
  deleteCar(id) {
    if (confirm('Are You Sure?')) {
      fetch(`api/automobile/${id}`, {
        method: 'delete'
      })
        .then(res => res.json())
        .then(data => {
        //  alert('Vehicle Deleted');
        this.$toasted.global.vehicleDeleted().goAway(1500);
          this.fetchCar();
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
    this.fetchVendors();
  }
}
</script>

<style lang="css">
</style>
