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
             color="blue white--text"
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

<!--Recent Services-->
    <v-flex xs12 sm6>
      <v-card>
        <v-list two-line subheader>
          <v-subheader inset>Top Services</v-subheader>

          <v-list-tile v-for="item in items2" :key="item.title" @click="">
            <v-list-tile-avatar>
              <v-icon :class="[item.iconClass]">{{ item.icon }}</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}
                </v-list-tile-title>
              <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>

            </v-list-tile-content>
            <v-list-tile-action>

              <v-chip color="teal" text-color="white" content-class="right">
                    <v-avatar>
                      <v-icon>watch_later</v-icon>
                    </v-avatar>
                    pending
                  </v-chip>

            </v-list-tile-action>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>

      </v-card>
    </v-flex>
    <!--End of Recent Services-->

  <!--Services -->
  <v-flex xs12 sm6>
    <v-card>
        <v-layout
      column
      justify-center
    >
      <v-subheader>Agents near me</v-subheader>

      <v-expansion-panel popout>
        <v-expansion-panel-content
          v-for="agent in agents"
          :key="agent.id"
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
              <strong >{{agent.agent_first_name}} {{agent.agent_last_name}}</strong>
              <span
                class="grey--text"
              >
                &nbsp;({{agent.state}})
              </span>
            <!--  <p><v-chip color="teal" text-color="white">
                  <v-avatar>
                    <v-icon>verified_user</v-icon>
                  </v-avatar>
                  {{agent.status}}
                </v-chip>
              </p> -->
            </v-flex>

          </v-layout>

          <v-card>
            <v-divider></v-divider>
            <v-card-text>
              <!--<p>  <v-icon>date_range</v-icon> <strong>Joined</strong> {{moment(agent.created_at).startOf('hour').fromNow()}}</p> -->
              <p>  <v-icon>date_range</v-icon> <strong>Joined</strong> {{moment(agent.create_at, "YYYYMMDD").fromNow()}}</p>
              <p> <v-icon>location_on</v-icon> <strong>City</strong>  {{agent.lga}}</p>
              <p> <v-icon>payment</v-icon> <strong>commission </strong>  2.5%</p>
              <p><strong> e-mail</strong>   <a  :href="'mailto:'+agent.agent_email"  >
                <v-chip color="indigo" text-color="white">
                    <v-avatar>
                      <v-icon>mail</v-icon>
                    </v-avatar>
                    {{agent.agent_email}}
                  </v-chip>
              </a> </p>
              <p> <strong>contact</strong>
                 <a href="tel:48484338484" >
                   <v-chip color="indigo" text-color="white">
                       <v-avatar>
                         <v-icon>call</v-icon>
                       </v-avatar>
                       080897544
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


   </v-layout>
 </v-container>
</template>

<script>
import moment from 'moment'
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
        agents: [],
        user: null,
        dialog: false,
        agent:{
                  agent_first_name:"",
                  agent_last_name:"",
                  id:"",
                  agent_email:"",
                  user_id:2,
                //  mobile_no:"",
                  agent_category:"",
                  agent_commission:"",
                  state:"",
                  city:"",
                  created_at:"",
                  status:"",
                  lga:""
              },

        items2: [
          { icon: 'assignment', iconClass: 'blue white--text', title: 'Wheel alignment', subtitle: 'Jan 20, 2014' },
          { icon: 'call_to_action', iconClass: 'amber white--text', title: 'Alternator change', subtitle: 'Jan 10, 2014' }
        ],
        messages: [
        {
          avatar: 'https://avatars0.githubusercontent.com/u/9064066?v=4&s=460',
          name: 'John Stamos',
          title: 'Garki',
          total: 3,

          excerpt: 'bronze'
        },
        {
          color: 'red',
          icon: 'people',
          name: 'Social',
          new: 1,
          total: 3,
          title: 'Twitter'
        },
        {
          color: 'teal',
          icon: 'local_offer',
          name: 'Promos',
          new: 2,
          total: 4,
          title: 'Shop your way',
          exceprt: 'New deals available, Join Today'
        }
      ],
      lorem: 'ril menandrinostro voluptaria sea eu. in consul constituam cum.'
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
      fetchAgents (page_url) {
      let vm = this
      page_url = page_url || 'http://localhost:8000/api/agents/'
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.agents = res.data
          vm.makePagination(res.meta, res.links)
        })
        .catch(err => console.log(err))
    },
    moment: function () {
    return moment();
  }
  },
  filters: {
            moment: function (date) {
                  return moment(date).format('MMMM Do YYYY, h:mm:ss a');
                  }
          },

    created(){
      this.fetchAgents()

    }
  }
</script>
<style lang="css">
</style>
