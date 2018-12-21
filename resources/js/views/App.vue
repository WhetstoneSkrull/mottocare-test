<template>
<v-app>

  <div class="">
    <v-toolbar dark color="blue">
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title class="white--text" @click="goToHome" > Mottocare</v-toolbar-title>
      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>search</v-icon>
      </v-btn>

      <v-menu offset-y>
                <v-btn flat slot="activator" color="white">
                  <v-icon>apps</v-icon>
                </v-btn>

                <v-list>
                  <v-list-tile  :to="{path: 'vendor-dashboard'}">
                    <v-list-tile-title>Vendor Dashboard</v-list-tile-title>
                  </v-list-tile>
                </v-list>

                <v-list>
                  <v-list-tile :to="{path: 'agent-dashboard'}">
                    <v-list-tile-title>Agent Dashboard</v-list-tile-title>
                  </v-list-tile>
                </v-list>
              </v-menu>

  <!--    <v-btn icon>
        <v-icon>more_vert</v-icon>
      </v-btn>  -->
    </v-toolbar>
    <v-navigation-drawer
        v-model="drawer"
        absolute
        temporary
      >
        <v-list class="pa-1">
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="https://randomuser.me/api/portraits/men/85.jpg">
            </v-list-tile-avatar>

            <v-list-tile-content>
              <v-list-tile-title>{{first_name}} {{last_name}}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>

        <v-list class="pt-0" dense>
          <v-list-tile :to="{path: '/'}">
            <v-list-tile-action>
              <v-icon>home</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title > Home</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense>
          <v-list-tile :to="{path: 'dashboard'}">
              <v-list-tile-action>
                <v-icon>question_answer</v-icon>
              </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title> My Dashboard</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense  >
          <v-list-tile>
            <v-list-tile-action>
              <v-icon>history</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Recent Bookings</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense  >
          <v-list-tile  :to="{path: 'vendor-register'}">
            <v-list-tile-action>
              <v-icon>business_center</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Become a Vendor</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense  >
          <v-list-tile :to="{path: 'agent-register'}">
            <v-list-tile-action >
              <v-icon>phonelink</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Become an Agent</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

              <!--Account Group -->
              <v-list>
                    <v-list-group
                    prepend-icon="account_circle"
                      no-action
                    >
                      <v-list-tile slot="activator">
                        <v-list-tile-title>My Account</v-list-tile-title>
                      </v-list-tile>
                      <!--Wallet category -->
                      <v-list-tile :to="{path: ''}">
                        <v-list-tile-title>My Vehicles</v-list-tile-title>
                        <v-list-tile-action>
                          <v-icon>credit_card</v-icon>
                        </v-list-tile-action>
                      </v-list-tile>
                      <!--end of wallet category -->

                      <!--statement category -->
                      <v-list-tile :to="{path: 'dashboard/statements'}">
                        <v-list-tile-title>My Driver</v-list-tile-title>
                        <v-list-tile-action>
                          <v-icon>account_balance_wallet</v-icon>
                        </v-list-tile-action>
                      </v-list-tile>
                      <!--end of wallet category -->

                      <!--statement category -->
                      <v-list-tile :to="{path: 'dashboard-edit'}">
                        <v-list-tile-title>edit profile</v-list-tile-title>
                        <v-list-tile-action>
                          <v-icon>edit</v-icon>
                        </v-list-tile-action>
                      </v-list-tile>
                      <!--end of wallet category -->
                    </v-list-group>
                    <!--End of Group -->
                  </v-list>

                <v-list>
        <!--Payment Group -->
              <v-list-group
              prepend-icon="business"
                no-action
              >
                <v-list-tile slot="activator">
                  <v-list-tile-title>My Payment</v-list-tile-title>
                </v-list-tile>
                <!--Wallet category -->
                <v-list-tile :to="{path: 'dashboard/credit'}">
                  <v-list-tile-title>Wallet</v-list-tile-title>
                  <v-list-tile-action>
                    <v-icon>credit_card</v-icon>
                  </v-list-tile-action>
                </v-list-tile>
                <!--end of wallet category -->

                <!--stateent category -->
                <v-list-tile :to="{path: 'dashboard/statements'}">
                  <v-list-tile-title>Statement</v-list-tile-title>
                  <v-list-tile-action>
                    <v-icon>account_balance_wallet</v-icon>
                  </v-list-tile-action>
                </v-list-tile>
                <!--end of wallet category -->
                <!--Wallet category -->
                <v-list-tile :to="{path: 'dashboard/withdrawals'}">
                  <v-list-tile-title>Withdrawal</v-list-tile-title>
                  <v-list-tile-action>
                    <v-icon>payment</v-icon>
                  </v-list-tile-action>
                </v-list-tile>
                <!--end of wallet category -->

                <!--statement category -->
                <v-list-tile :to="{path: 'dashboard/purchase'}">
                  <v-list-tile-title>Transaction history</v-list-tile-title>
                  <v-list-tile-action>
                    <v-icon>history</v-icon>
                  </v-list-tile-action>
                </v-list-tile>
                <!--end of wallet category -->
              </v-list-group>
              <!--End of Group -->
            </v-list>

          <v-list>
                    <!--Service Group -->
                          <v-list-group
                          prepend-icon="local_car_wash"
                            no-action
                          >
                            <v-list-tile slot="activator">
                              <v-list-tile-title>My Services</v-list-tile-title>
                            </v-list-tile>
                            <!--Wallet category -->
                            <v-list-tile :to="{path: 'dashboard/manage'}">
                              <v-list-tile-title>Service Listings</v-list-tile-title>
                              <v-list-tile-action>
                                <v-icon>view_list</v-icon>
                              </v-list-tile-action>
                            </v-list-tile>
                            <!--end of wallet category -->

                            <!--statement category -->
                            <v-list-tile :to="{path: 'dashboard/upload'}">
                              <v-list-tile-title>Add Service</v-list-tile-title>
                              <v-list-tile-action>
                                <v-icon>add_circle</v-icon>
                              </v-list-tile-action>
                            </v-list-tile>
                            <!--end of wallet category -->
                          </v-list-group>
                          <!--End of Group -->
                        </v-list>

        <v-divider></v-divider>

        <v-list class="pt-0" dense  v-if="isLoggedIn">
          <v-list-tile  @click="logout">
            <v-list-tile-action>
              <v-icon>question_answer</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title> Log out </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense>
          <v-list-tile :to="{path: 'login'}">
            <v-list-tile-action>
              <v-icon>question_answer</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Sign In</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense>
          <v-list-tile :to="{path: 'signup'}">
            <v-list-tile-action>
              <v-icon>question_answer</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Sign Up</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-navigation-drawer>
    </div>
    <v-content>
      <v-container fluid>
            <transition>
                <router-view ></router-view>
            </transition>
          </v-container>
          </v-content>
                <main class="py-4">

                <app-footer></app-footer>
              </main>

            </v-app>
   </template>

   <script>
   import WebFontLoader from 'webfontloader'
    export default {
      data(){
          return {
          first_name   : null,
          last_name    : null,
          email        : null,
            user_type   : 0,
            isLoggedIn  : localStorage.getItem('jwt') != null,
            drawer: null,
            active: '',
            admins: [
              ['Dashboard', 'people_outline'],
              ['My Bookings', 'settings'],
              ['My Services', 'settings']
            ]
          }
      },
      mounted(){
        WebFontLoader.load({
      google: {
        families: ['Roboto:100,300,400,500,700,900']
      },
      active: this.setFontLoaded
    }),
          this.setDefaults()
      },
      methods : {
        goToHome(){
                this.$router.push('/')
            },
        setDefaults(){
          if(this.isLoggedIn){
            let user        = JSON.parse(localStorage.getItem('user'))
            this.first_name       = user.first_name
            this.last_name       = user.last_name
            this.email       = user.email
            this.user_type  = user.is_admin
          }
        },
        change(){
            this.isLoggedIn = localStorage.getItem('jwt') != null
            this.setDefaults()

        },
        logout(){
            localStorage.removeItem('jwt')
            localStorage.removeItem('user')
            this.change()
            this.$router.push('/')
        },
        setFontLoaded () {
      this.$emit('font-loaded')
    }

  },
      created () {
  //
      }
    }
</script>
