<template lang="html">
  <v-app>
  <v-container>

     <v-stepper v-model="e1">
       <v-stepper-header>
         <v-stepper-step :complete="e1 > 1" step="1">Select Vehicle</v-stepper-step>

         <v-divider></v-divider>

         <v-stepper-step :complete="e1 > 2" step="2">Select Vendor</v-stepper-step>

         <v-divider></v-divider>

         <v-stepper-step :complete="e1 > 3" step="3">Preview</v-stepper-step>
         <v-divider></v-divider>

         <v-stepper-step :complete="e1 > 4" step="4">Payment</v-stepper-step>
       </v-stepper-header>

       <v-stepper-items>
         <v-stepper-content step="1">
           <v-form ref="form" v-model="valid" lazy-validation>

             <div class="col-xs-12 col-md-12">
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


             </v-form>

           <v-btn
             color="blue"
             @click="e1 = 2"
           >
             Continue
           </v-btn>
         </v-stepper-content>

         <v-stepper-content step="2">
           <v-form ref="form" v-model="valid" lazy-validation>

             <!--Services -->
             <v-flex xs12 sm6>
               <v-card>
                   <v-layout
                 column
                 justify-center
               >
                 <v-subheader class="font-weight-medium">Select Vendor </v-subheader>

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

                       <v-flex sm5 md3>
                         <strong >{{service.service.service_name}}</strong>
                        <!-- <span
                           class="grey--text"
                         >
                           &nbsp;({{service.vendor.city}})
                         </span>  -->
                       </v-flex>


                     </v-layout>

                     <v-card>
                       <v-divider></v-divider>
                       <v-card-text>

                         <!--book now-->
                         <v-layout row justify-center>
            <v-dialog v-model="dialog" persistent max-width="600px">
             <v-btn slot="activator" color="primary" dark>Book</v-btn>
             <v-card>
               <v-card-title>
                 <span class="headline">Book this Service</span>
               </v-card-title>

               <v-card-text>
                 <v-container grid-list-md>
                   <v-layout wrap>
                     <v-flex xs12 md12>
                       <p>
                         <strong>
                         {{service.service.service_name}}
                       </strong>
                        </p>
                     </v-flex>


                    <v-flex xs12 md12>
                      <v-flex>
                      <v-text-field
                           v-model="booking.service_date"
                           hint="(YYY-MM-DD)"
                           label="service date"
                           clearable
                         ></v-text-field>
                       </v-flex>
                   </v-flex>

                   <v-flex xs12 md12>
                     <v-flex>
                     <v-text-field
                          v-model="booking.service_time"
                          hint="(HH:MM)"
                          label="service time"
                          clearable
                        ></v-text-field>
                      </v-flex>
                  </v-flex>



                        <v-flex xs12 md12>
                        <v-btn color="info" @click="makeBooking">Book</v-btn>
                      </v-flex>


                   </v-layout>
                 </v-container>
               </v-card-text>
               <v-card-actions>
                 <v-spacer></v-spacer>
                 <v-btn color="blue darken-1" flat @click="dialog = false">Close</v-btn>
                 <v-btn color="blue darken-1" flat @click="dialog = false">Save</v-btn>
               </v-card-actions>
             </v-card>
            </v-dialog>
            </v-layout>
                       <!--end of book now-->

                         <p class="font-weight-bold">Service Details</p>
            <!--             <p> <v-icon>business</v-icon> <strong>service category</strong> <span class="font-weight-regular"> {{service.vendor.vendor_title}}</span></p> -->
                         <p> <v-icon>money</v-icon> <strong>price</strong> <span class="font-weight-regular">&#8358;{{service.price}}</span></p>
                         <p> <v-icon>local_library</v-icon> <strong>description</strong> <span class="font-weight-regular"> {{service.description}}</span></p>
                         <p> <v-icon>date_range</v-icon> <strong>created on</strong> <span class="font-weight-regular"> {{service.create_at}}</span></p>

                         <p class="font-weight-bold">Vendor Details</p>
                         <p> <v-icon>business</v-icon> <strong>Business name</strong> <span class="font-weight-regular"> {{service.vendor.vendor_title}}</span></p>
                         <p>  <v-icon>date_range</v-icon> <strong>Joined</strong> {{moment(service.created_at).startOf('hour').fromNow()}}</p>
                         <!-- <p>  <v-icon>date_range</v-icon> <strong>Joined</strong> {{moment(service.create_at, "YYYYMMDD").fromNow()}}</p> -->
                         <p> <v-icon>location_on</v-icon> <strong>City</strong>  {{service.vendor.address}}</p>
                         <p> <v-icon>payment</v-icon> <strong>capacity </strong> {{service.vendor.capacity}}</p>
                         <p> <v-icon>access_time</v-icon> <strong>opening time </strong> {{service.vendor.opening_time}}</p>
                         <p> <v-icon>timelapse</v-icon> <strong>closing time </strong> {{service.vendor.closing_time}}</p>
                         <p><strong> e-mail</strong>   <a  :href="'mailto:'+service.vendor.vendor_email"  >
                           <v-chip color="indigo" text-color="white">
                               <v-avatar>
                                 <v-icon>mail</v-icon>
                               </v-avatar>
                               {{service.vendor.vendor_email}}
                             </v-chip>
                         </a> </p>
                         <p> <strong>contact</strong>
                            <a :href="'tel:'+ service.vendor.mobile_no" >
                              <v-chip color="indigo" text-color="white">
                                  <v-avatar>
                                    <v-icon>call</v-icon>
                                  </v-avatar>
                                {{service.vendor.mobile_no}}
                                </v-chip>

                              </a> </p>
                       </v-card-text>

                      </v-card>
                   </v-expansion-panel-content>
                 </v-expansion-panel>
               </v-layout>
             </v-card>
            </v-flex>
             <!--End of Services -->


             </v-form>

           <v-btn
             color="blue"
             @click="e1 = 3"
           >
             Continue
           </v-btn>
           <v-btn flat   @click="e1 = 1">Back</v-btn>
         </v-stepper-content>

         <v-stepper-content step="3">
           <v-form ref="form" v-model="valid" lazy-validation>
               <v-text-field
                 v-model="booking.mechanic_first_name"
                 :rules="nameRules"
                 :counter="10"
                 label="Mechanic First Name"
                 required
               ></v-text-field>
               <v-text-field
                 v-model="booking.mechanic_last_name"
                 :rules="nameRules"
                 :counter="10"
                 label="Mechanic Last Name"
                 required
               ></v-text-field>

             </v-form>

           <v-btn
             color="blue"
             @click="e1 = 4"
           >
             Continue
           </v-btn>

           <v-btn flat   @click="e1 = 2">Back</v-btn>
         </v-stepper-content>

         <v-stepper-content step="4">

           <v-form ref="form" v-model="valid" lazy-validation>


               <v-text-field
                 v-model="booking.off_day"
                 :rules="nameRules"
                 :counter="10"
                 label="Off days"
                 required
               ></v-text-field>
             </v-form>

           <v-btn
             color="blue"
             @click="e1 = 5"
           >
             Continue
           </v-btn>

           <v-btn flat   @click="e1 = 3">Back</v-btn>
         </v-stepper-content>

         <v-stepper-content step="5">
           <v-layout>
               <v-flex xs12 sm6 offset-sm3>

                 <v-card>
                   <v-card-title primary-title>
                     <div>
                       <h3 class="headline mb-0">Manager Details</h3>
                       <div class="text-center">

                   </div>
                     </div>
                   </v-card-title>
                   <v-card-actions>
                     <v-btn flat color="orange" @click="e1 = 1">Edit</v-btn>
                   </v-card-actions>
                 </v-card>
                 <v-divider></v-divider>

                 <v-card>
                   <v-card-title primary-title>
                     <div>
                       <h3 class="headline mb-0">Mechanic Details</h3>
                       <div class="text-center">

                     </div>
                     </div>
                   </v-card-title>
                   <v-card-actions>
                     <v-btn flat color="orange" @click="e1 = 2">Edit</v-btn>
                     <v-btn flat color="orange">Explore</v-btn>
                   </v-card-actions>
                 </v-card>
                 <v-divider></v-divider>

                 <v-card>
                   <v-card-title primary-title>
                     <div>
                       <h3 class="headline mb-0">Mechanic Details</h3>
                       <div class="text-center">

                   </div>
                     </div>
                   </v-card-title>
                   <v-card-actions>
                     <v-btn flat color="orange" @click="e1 = 3">Edit</v-btn>
                   </v-card-actions>
                 </v-card>


               </v-flex>
             </v-layout>
           <v-btn
             color="blue"
              @click="makeBooking"
           >
             Book
           </v-btn>

           <v-btn flat   @click="e1 = 5">Back</v-btn>
         </v-stepper-content>
       </v-stepper-items>
     </v-stepper>

   </v-container>
 </v-app>
</template>

<script>
import moment from 'moment'
export default {
  data() {
    return{
      menu2: false,
      user : null,
      vehicles : [],
      services : [],
      time: null,
      dialog: false,
    //  menu2: false,
      modal2: false,
      booking:{
        id:"",
        user_id:"",
        vehicle_id:"",
        service_render_id:"",
        service_date:new Date().toISOString().substr(0, 10),
        service_time:"",
        is_completed:false
      },
      service:{
        id: "",
        price:"",
        description:""
      }

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
      makeBooking(){
        axios.post('/api/booking',this.booking)
        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.bookingAdded().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      },
      moment: function () {
      return moment();
    },
    /*  fetchVehicles() {

      axios.get(`api/auth/user/${this.user.id}/vehicles`)
      .then(response => {
          this.vehicles = response.data
      })
      .catch(error => {
          console.error(error);
        })
      }, */
      fetchServices() {
      axios.get(`api/service/render/1`)
      .then(response => {
          this.services = response.data
      })
      .catch(error => {
          console.error(error);
        })
      }
    },
    created() {
//    this.fetchVehicles();
    this.fetchServices();
    }
  }
</script>

<style lang="css">
</style>
