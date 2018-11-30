<template lang="html">
  <v-container grid-list-md text-xs-center>
   <v-layout row wrap>
     <!--Header section 12 row-->
     <v-flex sm12>
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
           <h6 class="category text-gray font-weight-thin mb-3">Garki, Abuja</h6>
           <h4 class="card-title font-weight-light">Oando Auto-Shop</h4>
           <p>{{vendor.vendor_title}}</p>
           <p class="card-description font-weight-light">No. 12, Wakeel Pharmacy road, Asokoro, Abuja</p>

           <v-dialog v-model="dialog" persistent max-width="600px">
                 <v-btn slot="activator" color="blue" dark>Book me</v-btn>
                 <v-card>
                   <v-card-title>
                     <span class="headline">Create a Booking</span>
                   </v-card-title>
                   <v-card-text>
                     <v-container grid-list-md>
                       <v-layout wrap>
                         <v-flex xs12>
                           <v-text-field label="Service name" required hint="select the service you want to book for"></v-text-field>
                         </v-flex>

                         <v-flex xs12 sm6>
                           <v-select
                             :items="['Benz', 'Toyota', 'Honda']"
                             label="Select your vehicle"
                             required
                           ></v-select>
                         </v-flex>

                         <div>
                           <v-time-picker v-model="picker" :landscape="landscape"></v-time-picker>
                         </div>


                       </v-layout>
                     </v-container>
                     <small>*indicates required field</small>
                   </v-card-text>
                   <v-card-actions>
                     <v-spacer></v-spacer>
                     <v-btn color="blue darken-1" flat @click="dialog = false">Close</v-btn>
                     <v-btn color="blue darken-1" flat @click="dialog = false">Save</v-btn>
                   </v-card-actions>
                 </v-card>
               </v-dialog>


         </v-card-text>
       </material-card>
     </v-flex>
     <!--End of Header section 12 row-->

     <!--Booking card-->
     <v-flex xs12 sm4>
    <v-card
    hover="true"
    >
      <v-card-title primary-title>
        <div>
          <h3 class="headline mb-0">About us <v-icon large="true">book</v-icon></h3>
        </div>
      </v-card-title>

      <v-card-actions>
        <v-btn flat color="blue">Share</v-btn>
        <v-btn flat color="blue">Explore</v-btn>
      </v-card-actions>
    </v-card>
  </v-flex>
  <!--End of Booking card-->

  <!--Car card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
 <h3 class="headline mb-0">Our Mechanic<v-icon large="true">local_car_wash</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<v-btn flat color="blue">Share</v-btn>
<v-btn flat color="blue">Explore</v-btn>
</v-card-actions>
</v-card>
</v-flex>
<!--End of Car card-->

<!--Driver card-->
<v-flex xs12 sm4>
<v-card
hover="true"
>
<v-card-title primary-title>
<div>
 <h3 class="headline mb-0">Service Vehicles<v-icon large="true">person_pin</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<v-btn flat color="blue">Share</v-btn>
<v-btn flat color="blue">Explore</v-btn>
</v-card-actions>
</v-card>

</v-flex>
<!--End of Driver card-->


<!--Recent Bookings-->

    <v-flex xs12 sm8 md12>
      <v-flex>
      <v-text-field
           v-model="message1"
           label="find service in vendor"
            append-icon="search"
           clearable
         ></v-text-field>
       </v-flex>
   </v-flex>
    <v-flex xs12 sm12>
      <v-card>
        <v-list two-line subheader>
          <v-subheader inset>My Services</v-subheader>

          <v-list-tile v-for="item in items2" :key="item.title" @click="">
            <v-list-tile-avatar>
              <v-icon :class="[item.iconClass]">{{ item.icon }}</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}</v-list-tile-title>
              <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>
            </v-list-tile-content>
            <v-list-tile-action>

                <v-btn icon            >
                <v-icon color="grey lighten-1">info</v-icon>
              </v-btn>

            </v-list-tile-action>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>

      </v-card>
    </v-flex>
    <!--End of Recent Bookings-->

   </v-layout>
 </v-container>
</template>

<script>
  export default {
    data () {
      return {
        vendor: [],
        dialog: false,
        id: this.$route.params.id,
        picker: null,
       landscape: false,
    //    vendor:{        },
              items2: [
                { icon: 'assignment', iconClass: 'blue white--text', title: 'Wheel alignment', subtitle: 'Jan 20, 2014' },
                { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Alternator change', subtitle: 'Jan 10, 2014' }
              ]
            }
      },

      beforeMount(){
            axios.get('/api/vendor/'+this.id)
            .then(response => {
                this.vendor = response.data
            })
            .catch(error => {
                console.error(error);
            })
        },

    methods:{
      //
    },
  /*  created(){
      axios.get('/api/vendor/' + this.id + '.json')
      .then(response => {
                this.vendor = response.json
            })
            .catch(error => {
                console.error(error);
            })
    } */
  }
</script>
<style lang="css">
</style>
