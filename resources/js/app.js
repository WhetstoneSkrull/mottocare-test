import Vue from 'vue'
    import VueRouter from 'vue-router'


    Vue.use(VueRouter)

    import App from './views/App'
    import Welcome from './views/Welcome'
    import Register from './components/Register'
    import Login from './components/Login'

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
        ],
    });

    const app = new Vue({
        el: '#app',
        components: { App },
        router,
    });
