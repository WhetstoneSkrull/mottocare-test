import Vue from 'vue'
import VueRouter from 'vue-router'
import './bootstrap'
import Toasted from 'vue-toasted';
//import VueProgressBar from 'vue-progressbar'
import FormLoading from 'vue2-form-loading'
import Vuetify from 'vuetify'
//import moment from 'moment'

//import VueDisqus from 'vue-disqus'


    Vue.use(VueRouter)
    Vue.use(Toasted)
//    Vue.use(VueProgressBar, options)
    Vue.use(FormLoading)
    Vue.use(Vuetify)
  //  Vue.use(VueDisqus)

//Vue.config.devtools= false;

    /*********************************
     *      Register GLobal Toasts   *
     *                               *
     *********************************/
     //Auth Toast
    Vue.toasted.register('signup', 'Welcome to Mottocare', {
    type : 'info',
    //icon : 'error_outline'
    });

    Vue.toasted.register('login', 'Logged In Successfully', {
    type : 'info',
    //icon : 'error_outline'
    });

    //Booking Toast
    Vue.toasted.register('bookingAdded', 'Booking Successful', {
    type : 'info',
    icon : 'done'
    });

    //Vehicle Toast
    Vue.toasted.register('vehicleAdded', 'Vehicle Added Successfully!', {
    type : 'info',
    icon : 'done'
    });

    Vue.toasted.register('vehicleDeleted', 'Vehicle Deleted Successfully!', {
    type : 'error',
    icon : 'done'
    });

    Vue.toasted.register('vehicleUpdated', 'Vehicle Updated Successfully!', {
    type : 'success',
    icon : 'done'
    });

    //Driver Toast
    Vue.toasted.register('driverAdded', 'Driver Added Successfully!', {
    type : 'info',
    icon : 'done'
    });

    Vue.toasted.register('driverDeleted', 'Driver Deleted Successfully!', {
    type : 'error',
    icon : 'done'
    });

    Vue.toasted.register('driverUpdated', 'Driver Updated Successfully!', {
    type : 'success',
    icon : 'done'
    });

//*******End of Toasted Service *********//



Vue.component('app-footer', require('./views/Footer.vue')); //component name should be in camel-case
Vue.component('app-header', require('./views/Header.vue'));
Vue.component('vendor-register', require('./components/vendors/VendorRegister.vue'));


//static pages
    import App from './views/App'
    import Welcome from './views/Welcome'
    import Footer from './views/Footer'

    import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
    import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader
    import 'babel-polyfill'


    //customer pages
    import Register from './components/customers/Register'
    import Login from './components/customers/Login'
    import Dashboard from './components/customers/Dashboard'
    import EditProfile from './components/customers/EditProfile'
    import MakeBooking from './components/customers/MakeBooking'
    import Bookings from './components/customers/Bookings'
    import Drivers from './components/customers/Drivers'
    import Vehicles from './components/customers/Vehicles'

    //vendor pages
    import VendorPage from './components/vendors/VendorPage'
    import VendorRegister from './components/vendors/VendorRegister'
    import Services from './components/vendors/Services'

    //Agent Pages
    import AgentRegister from './components/agents/AgentRegister'
    import AgentPage from './components/agents/AgentPage'


    //Admin pages
    import Admin from './components/admins/Admin'
    import AdminLogin from './components/admins/AdminLogin'
    import UserManager from './components/admins/UserManager'

    //Vendor pages

    //Agent pages

    const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/',
                name: 'home',
                component: Welcome
            },
            {
                path: '/login',
                name: 'login',
                component: Login
            },
            {
                path: '/signup',
                name: 'register',
                component: Register
            },
            //User Dashboard
            {
                path: '/dashboard',
                name: 'dashboard',
                component: Dashboard,
                meta: {
                requiresAuth: true
              //  is_user : true
              }
            },
            {
                path: '/dashboard-edit',
                name: 'EditProfile',
                component: EditProfile,
                meta: {
              //  requiresAuth: true
              //  is_user : true
              }
            },
            {
                path: '/make-booking',
                name: 'makeBooking',
                component: MakeBooking,
                meta: {
              //  requiresAuth: true
              //  is_user : true
              }
            },
            {
                path: '/bookings',
                name: 'Bookings',
                component: Bookings,
                meta: {
              //  requiresAuth: true
              //  is_user : true
              }
            },
            {
                path: '/my-drivers',
                name: 'Drivers',
                component: Drivers,
                meta: {
              //  requiresAuth: true
              //  is_user : true
              }
            },
            {
                path: '/my-vehicles',
                name: 'Vehicles',
                component: Vehicles,
                meta: {
              //  requiresAuth: true
              //  is_user : true
              }
            },


            //Admin Pages
            {
                path: '/admin-dashboard',
                name: 'admin',
                component: Admin,
                meta: {
              //  requiresAuth: true
              }
            },
            {
                path: '/admin/user-manager',
                name: 'userManager',
                component: UserManager
            },
            {
                path: '/admin-login',
                name: 'adminLogin',
                component: AdminLogin
            },

            //vendor pages
            {
                path: '/vendor-register',
                name: 'VendorRegister',
                component: VendorRegister
            },
            {
                path: '/vendor-dashboard',
                name: 'vendorPage',
                component: VendorPage
            },
            {
                path: '/services',
                name: 'Services',
                component: Services
            },

            //agent pages
            {
                path: '/agent-register',
                name: 'AgentRegister',
                component: AgentRegister
            },
            {
                path: '/agent-dashboard',
                name: 'vendorPage',
                component: AgentPage
            }
        ],
    });


    router.beforeEach((to, from, next) => {
      if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('jwt') == null) {
          next({
            path: '/login',
            params: { nextUrl: to.fullPath }
          })
        } else {
          let user = JSON.parse(localStorage.getItem('user'))
          if(to.matched.some(record => record.meta.is_admin)) {
            if(user.role == 5){
                next()
            }
            else{
                next({ name: 'dashboard'})
            }
          }
          else if(to.matched.some(record => record.meta.is_user)) {
            if(user.is_admin == 0){
                next()
            }
            else{
                next({ name: 'admin'})
            }
          }
          next()
        }
      } else {
        next()
      }
    })

    const app = new Vue({
        el: '#app',
        components: { App },
        router,
    });
