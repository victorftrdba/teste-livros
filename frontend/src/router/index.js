import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ReaderView from "../views/ReaderView.vue";
import BookView from '../views/BookView.vue';
import NewReaderView from "../views/NewReaderView.vue";
import NewBookView from "../views/NewBookView.vue";

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
      path: '/new-book',
      name: 'new-book',
      component: NewBookView
    },
    {
      path: '/readers',
      name: 'readers',
      component: ReaderView
    },
    {
      path: '/new-reader',
      name: 'new-reader',
      component: NewReaderView
    },
  ]
})

export default router
