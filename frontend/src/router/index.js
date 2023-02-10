import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ContatoView from '../views/ContatosView.vue'
import UserView from '../views/UsersView.vue'
import ContatoReadView from '../views/ContatoReadView.vue'
import ContatoCreateView from '../views/ContatoCreateView.vue'
import ContatoUpdateView from '../views/ContatoUpdateView.vue'
import RegisterView from '../views/RegisterView'


const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta: { guestOnly: true }
    },
    
 

  {
    path: '/register',
    name: 'register',
    component: RegisterView,
    meta: { guestOnly: true }
   
  },
  
  {
    path: '/contatos',
    name: 'Contatos',
    component: ContatoView,
    meta: { authOnly: true }
  
    
    
  },

    {
    path: '/users',
    name: 'Users',
    component: UserView

  },


  {

    path: '/create',
    name: 'ContatoCreate',
    component: ContatoCreateView

  },

  {
    path: '/read/:id',
    name: 'ContatoRead',
    component: ContatoReadView
  },




  {
    path: '/update/:id',
    name: 'ContatoUpdate',
    component: ContatoUpdateView
  },

  


]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

//function isLoggedIn() {
  //return localStorage.getItem("token");
//}

//router.beforeEach((to, from, next) => {
  //if (to.matched.some(record => record.meta.authOnly)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    //if (!isLoggedIn()) {
      //next({
        //path: "/home",
        //query: { redirect: to.fullPath }
      //});
    //} else {
      //next();
    //}
  //} else if (to.matched.some(record => record.meta.guestOnly)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    //if (isLoggedIn()) {
      //next({
        //path: "/contatos",
        //query: { redirect: to.fullPath }
      //});
    ///} else {
      ///next();
    //}
  //} else {
    //next(); // make sure to always call next()!
  //}
//});

export default router
