<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm6>
        <v-form ref="form" v-model="valid" lazy-validation>
          <h3>Add Service</h3>

       <div class="col-xs-12 col-md-12">
        <div class="input-group">
          <select class="custom-select" id="inputGroupSelect02" v-model="service.service_id">
            <option selected>Choose...</option>
              <option :value="service.id" v-for="service in services">
                {{service.service_name}}
              </option>
            </select>
        <div class="input-group-append">
          <label class="input-group-text" for="inputGroupSelect02">Select Service</label>
        </div>
      </div>
    </div>
            <v-text-field
              v-model="service.price"
              label="Service Price"
              :rules="nameRules"
              hint="your price in naira without comma"
              required
            ></v-text-field>

            <v-text-field
              v-model="service.description"
              label="Service Description"
              :rules="nameRules"
              hint="your service description"
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

        <v-flex xs12 sm6>
          <h4 v-show="renders.length === 1" >{{renders.length}} service created</h4>
          <h4 v-show="renders.length > 1">{{renders.length}} services</h4>
          <h4 v-show="renders.length < 1">you have no services</h4>
        </v-flex>

        <v-card>
            <v-layout
          column
          justify-center
        >
          <v-subheader class="font-weight-medium"> <strong> My Services </strong></v-subheader>

          <v-expansion-panel popout>
            <v-expansion-panel-content
              v-for="service in renders"
              :key="service.id"
              hide-actions
            >
              <v-layout
                slot="header"
                align-center
                row
                spacer
              >
                <v-flex xs6 sm6 md6>
                  <v-avatar
                    slot="activator"
                  >
                  <strong>{{service.service.service_name}}</strong>

                  </v-avatar>
                </v-flex>

              </v-layout>

              <v-card>
                <v-divider></v-divider>
                <v-card-text>


                  <p class="font-weight-bold">Service Details</p>
                <!--   <p> <v-icon>business</v-icon> <strong>service category</strong> <span class="font-weight-regular"> {{service.servicecategory.service_category_name}}</span></p> -->
                   <p> <v-icon>business</v-icon> <strong>service title</strong> <span class="font-weight-regular"> {{service.service.service_name}}</span></p>
                  <p> <v-icon>money</v-icon> <strong>price</strong> <span class="font-weight-regular">&#8358;{{service.price | formatNumber}}</span></p>
                  <p> <v-icon>local_library</v-icon> <strong>description</strong> <span class="font-weight-regular"> {{service.description}}</span></p>
                  <p> <v-icon>date_range</v-icon> <strong>created on</strong> <span class="font-weight-regular"> {{service.create_at}}</span></p>
                  <p>
                    <v-btn flat>
                        <v-icon @click="editService(service)">edit</v-icon>
                    </v-btn>
                    <v-btn flat>
                        <v-icon @click="deleteService(service.id)">delete</v-icon>
                    </v-btn>
                  </p>

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
      renders : [],
      nameRules: [
        v => !!v || 'This field is required'
      ],
      service:{
        id:"",
        user_id:"",
        //vendor_id:2,
        service_category_id:"",
        service_id:"",
        price:"",
        description:""
      },
        edit: false,
        service_render_id:'',
        name: ''
    }
  },
    beforeMount(){

        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user/${this.user.id}/services`)
        .then(response => {
            this.renders = response.data
        })
        .catch(error => {
            console.error(error);
        })
    },
    methods:{

      fetchServices() {

      axios.get(`api/auth/user/${this.user.id}/services`)
      .then(response => {
          this.renders = response.data
      })
      .catch(error => {
          console.error(error);
      })
    },
      fetchServiceName(page_url) {
      let vm = this;
      page_url = page_url || '/api/services';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.services = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
      addService(){

        if (this.edit === false) {
        // Add Vehicle
        axios.post('/api/service/render',this.service)

        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.serviceAdded().goAway(1500);
            this.clearIt();

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
            this.$toasted.global.serviceUpdated().goAway(1500);
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
      this.service.id = service.id;
      this.service.service_render_id = service.id;
      this.service.service_category_id = service.service_category_id;
      this.service.service_id = service.service_id;
      this.service.price = service.price;
      this.service.description = service.description;
    },
    deleteService(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/service/render/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
          //  alert('Vehicle Deleted');
          this.$toasted.global.serviceDeleted().goAway(1500);
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
    this.fetchServiceName()
    this.fetchServices()
  }
}
</script>

<style lang="css">
</style>
