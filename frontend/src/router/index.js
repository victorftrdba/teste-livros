import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ReaderView from "../views/Admin/ReaderView.vue";
import BookView from '../views/Admin/BookView.vue';
import NewReaderView from "../views/Admin/NewReaderView.vue";
import UpdateReaderView from "../views/Admin/UpdateReaderView.vue";
import NewBookView from "../views/Admin/NewBookView.vue";
import UpdateBookView from "../views/Admin/UpdateBookView.vue";
import AdminLoginView from "../views/Admin/AdminLoginView.vue";
import ReaderBooksView from "../views/Admin/ReaderBooksView.vue";
import ReaderLoginView from "../views/Reader/ReaderLoginView.vue";
import ReaderBookView from "../views/Reader/ReaderBookView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/admin-login',
      name: 'admin-login',
      component: AdminLoginView
    },
    {
      path: '/admin/books',
      name: 'books',
      component: BookView
    },
    {
      path: '/admin/new-book',
      name: 'new-book',
      component: NewBookView
    },
    {
      path: '/admin/update-book',
      name: 'update-book',
      component: UpdateBookView,
      props: true
    },
    {
      path: '/admin/readers',
      name: 'readers',
      component: ReaderView
    },
    {
      path: '/admin/readers/books',
      name: 'reader-book',
      component: ReaderBooksView,
      props: true
    },
    {
      path: '/admin/new-reader',
      name: 'new-reader',
      component: NewReaderView
    },
    {
      path: '/admin/update-reader',
      name: 'update-reader',
      component: UpdateReaderView,
      props: true
    },
    {
      path: '/reader-login',
      name: 'reader-login',
      component: ReaderLoginView
    },
    {
      path: '/reader/books',
      name: 'reader-books',
      component: ReaderBookView
    }
  ]
})

export default router
