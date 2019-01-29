<template lang="html">
  <v-container >
    <v-layout row wrap>

    <v-flex xs12 sm6>
      <v-form ref="form">
          <v-text-field
            v-model="category.service_category_name"
            label="Category"
            required
          ></v-text-field>

          <v-btn
            @click="addCat"
          >
            submit
          </v-btn>
        </v-form>

      <v-divider></v-divider
    </v-flex>
    </v-flex>
    <v-flex xs12 sm3>
      <v-card v-for="cat in categories" v-bind:key="cat.id">
        <p>Service Category Name: <strong>{{cat.service_category_name}}</strong> </p>
      <!--  <p class="title">service items</p>
        <p class="subheading" v-for="service in cat.services">{{service.service_name}}</p>  -->
      </v-card>
    </v-flex>
  </v-layout>
  </v-container>
</template>

<script>
export default {
  data (){
    return{
      categories:[],
      category:{
        service_category_name:""

      },
      edit:false,
      service_category_id:''

    }
  },
  beforeMount(){
      this.user = JSON.parse(localStorage.getItem('user'))
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

      axios.get(`api/all/service/categories`)
      .then(response => {
          this.categories = response.data
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
    addCat(){

      if (this.edit === false) {
      // Add Vehicle
      axios.post('/api/service/category',this.category)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleAdded().goAway(1500);
          this.clearIt();
          this.fetchCars();

      })
      .catch(error=>{
          console.log(error.response)
      })
    }else {
      // Update
      axios.put('/api/service/category',this.category)

      .then(response=>{
          console.log(response);
          //this.$router.push('/dashboard');
          this.$toasted.global.vehicleUpdated().goAway(1500);
          this.clearIt();
          this.fetchCat();

      })
      .catch(error=>{
          console.log(error.response)
      })

      }
    },
    editCat(category) {
    this.edit = true;
    this.category.id = category.id;
    this.category.service_category_id = category.id;
    this.category.service_category_name = category.service_category_name;

  },
  deleteCat(id) {
    if (confirm('Are You Sure?')) {
      fetch(`api/service/category/${id}`, {
        method: 'delete'
      })
        .then(res => res.json())
        .then(data => {
        //  alert('Vehicle Deleted');
        this.$toasted.global.vehicleDeleted().goAway(1500);
          this.fetchCat();
        })
        .catch(err => console.log(err));
    }
  },

    clearIt() {
      this.$refs.form.reset()
    }
  },
  created(){
    this.fetchCat();
  }
}
</script>

<style lang="css">
</style>
