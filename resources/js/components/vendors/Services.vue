<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm6>
        <v-form ref="form" v-model="valid" lazy-validation>

            <v-text-field
              v-model="service.vehicle_make"
              label="Vehicle Make"
              :rules="nameRules"
              hint="e.g Honda, Toyota etc"
              required
            ></v-text-field>

            <v-text-field
              v-model="service.model"
              label="Model"
              :rules="nameRules"
              hint="e.g Toyota has models such as Camry, Carina etc"
              required
            ></v-text-field>

            <v-text-field
              v-model="service.price"
              label="Year"
              :rules="nameRules"
              hint="your vehicle manufactured date"
              required
            ></v-text-field>

            <v-text-field
              v-model="service.description"
              label="Vehicle Registration number"
              :rules="nameRules"
              hint="your vehicle number"
              required
            ></v-text-field>

            <v-btn
              :disabled="!valid"
              @click="addService"
            >
              submit
            </v-btn>
            <v-btn @click="clearIt">clear</v-btn>
          </v-form>

        <v-divider></v-divider

      </v-flex>
      </v-flex>

      <!--Services -->
      <v-flex xs12 sm6>
        <v-card>
            <v-layout
          column
          justify-center
        >
          <v-subheader class="font-weight-medium">Services </v-subheader>

          <v-expansion-panel popout>
            <v-expansion-panel-content
              v-for="service in services"
              :key="service.id"
              hide-actions
            >
              <v-layout
                slot="header"
                align-center
                row
                spacer
              >
                <v-flex xs4 sm2 md1>
                  <v-avatar
                    slot="activator"
                    size="36px"
                  >
                    <img
                      src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
                      alt="Avatar"
                    >
                    <v-icon
                    ></v-icon>
                  </v-avatar>
                </v-flex>

              </v-layout>

              <v-card>
                <v-divider></v-divider>
                <v-card-text>


                  <p class="font-weight-bold">Service Details</p>
                   <p> <v-icon>business</v-icon> <strong>service category</strong> <span class="font-weight-regular"> {{service.servicecategory.service_category_name}}</span></p>
                   <p> <v-icon>business</v-icon> <strong>service title</strong> <span class="font-weight-regular"> {{service.service.service_name}}</span></p>
                  <p> <v-icon>money</v-icon> <strong>price</strong> <span class="font-weight-regular">&#8358;{{service.price}}</span></p>
                  <p> <v-icon>local_library</v-icon> <strong>description</strong> <span class="font-weight-regular"> {{service.description}}</span></p>
                  <p> <v-icon>date_range</v-icon> <strong>created on</strong> <span class="font-weight-regular"> {{service.create_at}}</span></p>


                </v-card-text>

               </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>
        </v-layout>
      </v-card>
    </v-flex>
      <!--End of Services -->





    </v-layout>

  </v-container>
</template>

<script>
import moment from 'moment'

export default {
  data (){
    return {
      valid: true,
      user : null,
      services : [],
      nameRules: [
        v => !!v || 'This field is required'
      ],
      service:{
        id:"",
        user_id:2,
        vendor_id:2,
        service_category_id:"",
        service_id:"",
        price:"",
        description:""
      },
        edit: false,
        service_id:'',
        name: ''
    }
  },
    beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user/${this.user.id}/services`)
        .then(response => {
            this.services = response.data
        })
        .catch(error => {
            console.error(error);
        })
    },
    methods:{
      fetchServices() {

      axios.get(`api/auth/user/${this.user.id}/services`)
      .then(response => {
          this.services = response.data
      })
      .catch(error => {
          console.error(error);
      })
    },
      addService(){

        if (this.edit === false) {
        // Add Vehicle
        axios.post('/api/service/render',this.service)

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
        axios.put('/api/service/render',this.service)

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
      editVehicle(vehicle) {
      this.edit = true;
      this.service.id = service.id;
      this.service.service_render_id = service.id;
      this.service.service_category_id = service.service_category_id;
      this.service.service_id = service.service_id;
      this.service.price = service.price;
      this.service.description = service.description;
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
    created() {
    this.fetchServices();
  }
}
</script>

<style lang="css">
</style>
