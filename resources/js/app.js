import { createApp } from 'vue';
import router from './router';

// Register your Vue components
import EnterEmailComponent from './components/EnterEmailComponent.vue';
import VerificationComponent from './components/VerificationComponent.vue';
import VoteComponent from './components/VoteComponent.vue';
import SuccessComponent from './components/SuccessComponent.vue';

const app = createApp({});

app.component('enter-email-component', EnterEmailComponent);
app.component('verification-component', VerificationComponent);
app.component('vote-component', VoteComponent);
app.component('success-component', SuccessComponent);

app.use(router);
app.mount('#app');
