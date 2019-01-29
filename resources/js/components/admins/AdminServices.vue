<template lang="html">
  <v-container >
    <v-layout row wrap>

    <v-flex xs12 sm6>
      <v-form ref="form">
        <router-link :to="{ name: 'ServiceCategory', params: {} }">
            <v-btn color="primary">Add Service Category</v-btn>
        </router-link>

          <div class="form-group">
              <label for="exampleFormControlSelect1">Select Category</label>
              <select class="form-control" id="exampleFormControlSelect1" v-model="service.service_category_id">
                <option v-for="cat in categories" v-bind:key="cat.id" :value="cat.id">{{cat.service_category_name}}</option>
              </select>
            </div>

          <v-text-field
            v-model="service.service_name"
            label="Service name"
            required
          ></v-text-field>

                    <v-select
                      v-model="service.service_cars"
                      :items="cars"
                      name="car_manufacturer"
                      attach
                      chips
                      label="Add Cars to this service"
                      item-text="car_manufacturer"
                      item-value="id"
                      multiple
                    ></v-select>
        <!--  <div>
            <label class="typo__label">Add Cars to this service</label>
            <multiselect v-model="service.service_cars"
            :options="cars" track-by="id"
             label="car_manufacturer" :multiple="true"
             :searchable="true"
             >
          <!-  <template slot="singleLabel" slot-scope="{ car }" >
               <strong>{{ car.car_manufacturer }} </strong>
             </template> -
            </multiselect>
            <pre class="language-json"><code>{{   }}</code></pre>

          </div>  -->

          <v-btn
            @click="addService"
          >
            add service
          </v-btn>
        </v-form>

      <v-divider></v-divider
    </v-flex>
  </v-flex>

    <v-flex xs12 sm3>
      <v-card v-for="service in services" v-bind:key="service.id" class="spacer">
        <v-card-title primary-title>
           <p class="font-weight-regular"> {{service.service_name}} </p>
        </v-card-title>
        <v-card-text>
      <!--    <p class="font-weight-thin font-italic">
            {{service.category.service_category_name}}
          </p>  -->

          <p> <strong>Service Cars</strong> </p>
          <p v-for="car in service.servicecars">{{car.car_manufacturer}} </p>
        </v-card-text>
        <v-divider></v-divider>

      </v-card>
    </v-flex>

  </v-layout>
  </v-container>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: {
       Multiselect
  },
  data (){
    return{
      services:[],
      cars:[],
      categories:[],
      service:{
        service_name:"",
        service_cars:"",
        service_category_id:""
      },
      edit:false,
      service_id:''

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

        fetchCat() {
        axios.get(`api/all/service/categories`)
        .then(response => {
            this.categories = response.data
        })
        .catch(error => {
            console.error(error);
          })
        },

        fetchServices() {
        axios.get(`api/services`)
        .then(response => {
            this.services = response.data
        })
        .catch(error => {
            console.error(error);
          })
        },

    fetchCar() {
    axios.get(`api/cars`)
    .then(response => {
        this.cars = response.data
    })
    .catch(error => {
        console.error(error);
    })
  },
    addService(){

      if (this.edit === false) {
      // Add Vehicle
      axios.post('/api/service',this.service)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleAdded().goAway(1500);
          this.clearIt();
          this.fetchServices();

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
          this.fetchServices();

      })
      .catch(error=>{
          console.log(error.response)
      })

      }
    },
    editService(service) {
    this.edit = true;
    this.car.id = car.id;
    this.car.car_id = car.id;
    this.car.car_manufacturer = car.car_manufacturer;

  },
  deleteService(id) {
    if (confirm('Are You Sure?')) {
      fetch(`api/service/${id}`, {
        method: 'delete'
      })
        .then(res => res.json())
        .then(data => {
        //  alert('Vehicle Deleted');
        this.$toasted.global.vehicleDeleted().goAway(1500);
          this.fetchServices();
        })
        .catch(err => console.log(err));
    }
  },

    clearIt() {
      this.$refs.form.reset()
    }
  },
  created(){
  //  this.fetchCars();
    this.fetchCat();
    this.fetchServices();
  }
}
</script>

<style lang="css">
.spacer{
  margin-left: 20px;
}
</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
