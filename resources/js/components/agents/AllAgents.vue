<template lang="html">
  <v-container grid-list-xs,sm,md,lg,xl>

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


  </v-container>
</template>

<script>
export default {
  data(){
    return{
      agents: [],
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

  }
}
</script>

<style lang="css">
</style>
