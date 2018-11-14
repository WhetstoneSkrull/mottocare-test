import Vue from 'vue'
import VueRouter from 'vue-router'
import './bootstrap'
import Toasted from 'vue-toasted';
import VueProgressBar from 'vue-progressbar'
import FormLoading from 'vue2-form-loading'


    Vue.use(VueRouter)
    Vue.use(Toasted)
    Vue.use(VueProgressBar, options)
    Vue.use(FormLoading)


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


//static pages
    import App from './views/App'
    import Welcome from './views/Welcome'

    //customer pages
    import Register from './components/customers/Register'
    import Login from './components/customers/Login'
    import Dashboard from './components/customers/Dashboard'

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
                path: '/customer/dashboard',
                name: 'dashboard',
                component: Dashboard,
                meta: {
                requiresAuth: true,
                is_user : true
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
        ],
    });

/*
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
    })  */

    const app = new Vue({
        el: '#app',
        components: { App },
        router,
    });
