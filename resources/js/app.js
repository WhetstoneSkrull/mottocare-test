import Vue from 'vue'
import VueRouter from 'vue-router'
import './bootstrap'
import Toasted from 'vue-toasted';
import VueProgressBar from 'vue-progressbar'
import FormLoading from 'vue2-form-loading'
import Vuetify from 'vuetify'



/* axios defaults
window.axios = axios
window.token = localStorage.getItem('token');
axios.defaults.baseURL = 'http://localhost:8000';
axios.defaults.headers.common['Authorization'] = "Bearer"+token;
axios.defaults.headers.post['content-type'] = 'application/json'
*/

    Vue.use(VueRouter)
    Vue.use(Toasted)
    Vue.use(VueProgressBar, options)
    Vue.use(FormLoading)
    Vue.use(Vuetify)



    //Register GLobal Toasts
    Vue.toasted.register('signup', 'Welcome to Mottocare', {
    type : 'success',
    //icon : 'error_outline'
});

const options = {
  color: '#bffaf3',
  failedColor: '#874b4b',
  thickness: '5px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'left',
  inverse: false
}

Vue.component('app-footer', require('./views/Footer.vue')); //component name should be in camel-case
Vue.component('app-header', require('./views/Header.vue'));
Vue.component('vendor-register', require('./components/vendors/VendorRegister.vue'));


//static pages
    import App from './views/App'
    import Welcome from './views/Welcome'
    import Footer from './views/Footer'
    import VendorRegister from './components/vendors/VendorRegister'

    import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
    import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader
    import 'babel-polyfill'


    //customer pages
    import Register from './components/customers/Register'
    import Login from './components/customers/Login'
    import Dashboard from './components/customers/Dashboard'
    import EditProfile from './components/customers/EditProfile'

    //vendor pages
    import VendorPage from './components/vendors/VendorPage'

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
              //  requiresAuth: true
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
            //Admin Pages
            {
                path: '/admin/dashboard',
                name: 'admin',
                component: Admin,
                meta: {
                requiresAuth: true
              }
            },
            {
                path: '/admin/user-manager',
                name: 'userManager',
                component: UserManager
            },
            {
                path: '/admin/login',
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
                path: '/vendor-dashboard/:id',
                name: 'vendorPage',
                component: VendorPage
            }
        ],
    });


    router.beforeEach((to, from, next) => {
      if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('access_token') == null) {
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
