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
           <h4 class="card-title font-weight-light">Faisal Nassarawa {{last_name}}</h4>
           <p class="card-description font-weight-light">Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...</p>
           <v-btn
             color="blue"
             round
             class="font-weight-light"
             :to="{path: 'dashboard-edit'}"
           >Edit Profile</v-btn>
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
          <h3 class="headline mb-0">My Bookings  <v-icon large="true">book</v-icon></h3>
        </div>
      </v-card-title>

      <v-card-actions>
        <v-btn flat color="blue" :to="{path: 'make-booking'}">Book Now</v-btn>
        <v-btn flat color="blue" :to="{path: 'bookings'}">Explore</v-btn>
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
 <h3 class="headline mb-0">My Car <v-icon large="true">local_car_wash</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<!--<v-btn flat color="blue">Add</v-btn> -->
<v-btn flat color="blue" :to="{path: 'my-vehicles'}">Explore</v-btn>
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
 <h3 class="headline mb-0">My Driver <v-icon large="true">person_pin</v-icon></h3>
</div>
</v-card-title>

<v-card-actions>
<!--<v-btn flat color="blue">Add</v-btn> -->
<v-btn flat color="blue" :to="{path: 'my-drivers'}">Explore</v-btn>
</v-card-actions>
</v-card>

</v-flex>
<!--End of Driver card-->

<!--Recent Bookings-->
    <v-flex xs12 sm6>
      <v-card>
        <v-list two-line subheader>
          <v-subheader inset>My Bookings</v-subheader>

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


    <v-flex xs12 sm8 md6>

      <v-flex>
      <v-text-field
           v-model="message1"
           label="find vendors"
            prepend-icon="search"
           clearable
         ></v-text-field>
       </v-flex>

     <v-card>
       <v-list two-line>
         <template v-for="(item, index) in items">
           <v-subheader
             v-if="item.header"
             :key="item.header"
             inset
           >
             {{ item.header }}
           </v-subheader>

           <v-divider
             v-else-if="item.divider"
             :key="index"
             inset
           ></v-divider>

           <v-list-tile
             v-else
             :key="item.title"
             avatar
             ripple
             @click=""
           >
             <v-list-tile-avatar>
               <img :src="item.avatar">
             </v-list-tile-avatar>
             <v-list-tile-content>
               <v-list-tile-title v-html="item.title"></v-list-tile-title>
               <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
             </v-list-tile-content>
           </v-list-tile>

         </template>
       </v-list>
     </v-card>



     <v-card>
       <v-list two-line>
         <template>
           <v-subheader>
             Vendors <v-icon>location</v-icon>
           </v-subheader>

           <v-divider

           ></v-divider>

           <v-list-tile
             v-for="vendor in vendors" v-bind:key="vendor.id"
             avatar
             ripple
             @click=""
             :to="{path: '/vendor-dashboard/'+vendor.id}"
             >
             <v-list-tile-avatar>
               <v-icon>business</v-icon>
             </v-list-tile-avatar>
             <v-list-tile-content>
               <v-list-tile-title>{{vendor.vendor_title}}</v-list-tile-title>
               <v-list-tile-sub-title>
                 <span class='text--primary'>{{vendor.state}}</span> &mdash; {{vendor.vendor_address}}
               </v-list-tile-sub-title>
               <v-divider></v-divider>

             </v-list-tile-content>

           </v-list-tile>

         </template>
       </v-list>
     </v-card>

   </v-flex>

   </v-layout>
 </v-container>
</template>

<script>
  export default {
    name: 'Dashboard',
  head: {
    metaInfo: {
      title: 'Dashboard',
      titleTemplate: '%s | User Page'
    },
    meta: [
       { name: 'description',
       content: `Watches: Men's watches, brand name watches, discount watches, watches on sale,
       mens watch brands and ladies watches. Daily Deals on Men's watches &amp; watches for women + the best service guarantee.` }
    ]
  },
    data () {
      return {
        vendors: [],
        user: null,

        vendor:{
                  vendor_first_name:"",
                  vendor_title:"",
                  id:"",
                  vendor_last_name:"",
                  user_id:1,
                  email:"",
                  mobile_no:"",
                  manager_first_name:"",
                  manager_last_name:"",
                  manager_email:"",
                  mechanic_first_name:"",
                  mechanic_last_name:"",
                  mechanic_email:"",
                  mechanic_nationality:"",
                  address:"",
                  state:"",
                  city:"",
                  lga:"",
                  capacity:"",
                  opening_time:"",
                  closing_time:"",
                  off_day:""
                //  membership:"",
                //  lumpsum:"",
                //  status_id:""
              },
        items: [
            {
              header: 'Vendors'
            },
            { divider: true },
            {
              avatar: 'https://picsum.photos/250/300?image=660',
              title: 'Oando Vendor Shop',
              subtitle:
                "<span class='text--primary'>Abuja</span> &mdash; off. Nnamdi street."
            }
          ],
        items2: [
          { icon: 'assignment', iconClass: 'blue white--text', title: 'Wheel alignment', subtitle: 'Jan 20, 2014' },
          { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Alternator change', subtitle: 'Jan 10, 2014' }
        ]
      }
    },
    beforeMount(){
              this.user = JSON.parse(localStorage.getItem('user'))
              axios.defaults.headers.common['Content-Type'] = 'application/json'
              axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

              axios.get(`api/users/${this.user.id}/orders`)
              .then(response => {
                  this.orders = response.data
              })
              .catch(error => {
                  console.error(error);
              })
          },
    methods:{
      fetchVendors (page_url) {
      let vm = this
      page_url = page_url || 'http://localhost:8000/api/vendors/'
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.vendors = res.data
          vm.makePagination(res.meta, res.links)
        })
        .catch(err => console.log(err))
    },
    vendorPage(){

      this.$router.push('vendor-dashboard/'+vendors.id);
      console.log(token);
    }
  },
    created(){
      this.fetchVendors()

    }
  }
</script>
<style lang="css">
</style>
