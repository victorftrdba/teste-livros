import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ReaderView from "../views/ReaderView.vue";
import BookView from '../views/BookView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/books',
      name: 'books',
      component: BookView
    },
    {
      path: '/readers',
      name: 'readers',
      component: ReaderView
    }
  ]
})

export default router
