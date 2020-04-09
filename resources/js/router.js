import Router from 'vue-router'
import Home from './views/Home.vue'
import About from './views/About.vue'
import User from './views/User.vue'
import UserDetail from './views/UserDetail.vue'
import UserEdit from './views/UserEdit.vue'
import UserCreate from './views/UserCreate.vue'
import Myprof from './views/Myprof.vue'
import MyEdit from './views/Myedit.vue'
import Message from './views/Message.vue'

export default new Router({
    mode: 'history',
    routes: [
      {
        path: '/',
        name: 'home',
        component: Home
      },
      {
        path: '/about',
        name: 'about',
        component: About
      },
      {
        path: '/user',
        name: 'user',
        component: User
      },
      {
        path: '/user/:id',
        name: 'user_detail',
        component: UserDetail
      },
      {
        path: '/user/:id/edit',
        name: 'user_edit',
        component: UserEdit
      },
      {
        path: '/create',
        name: 'user_create',
        component: UserCreate
      },
      {
        path: '/users/index/:id/',
        name: 'myprof',
        component: Myprof
      },
      {
        path: '/users/edit/:id',
        name: 'myprof_edit',
        component: MyEdit
      },
      {
        path: '/messages/:id',
        name: 'message',
        component: Message
      },
      

    ]
  });
