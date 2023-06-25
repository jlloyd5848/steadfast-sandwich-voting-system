import { createRouter, createWebHistory } from 'vue-router';

import EnterEmailComponent from './components/EnterEmailComponent.vue';
import VerificationComponent from './components/VerificationComponent.vue';
import VoteComponent from './components/VoteComponent.vue';
import SuccessComponent from './components/SuccessComponent.vue'

const routes = [
  {
    path: '/',
    name: 'enter-email',
    component: EnterEmailComponent
  },
  {
    path: '/verify/:email',
    name: 'verify',
    component: VerificationComponent,
    props: true,
  },
  
  {
    path: '/vote/:email',
    name: 'vote',
    component: VoteComponent,
    props: true,
  },
  {
    path: '/success',
    name: 'success',
    component: SuccessComponent
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
