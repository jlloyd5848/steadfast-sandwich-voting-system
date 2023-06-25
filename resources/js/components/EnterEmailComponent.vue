<template>
  <div class="flex items-center justify-center h-screen">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg px-6 py-8">
      <h2 class="text-2xl font-bold mb-6">Enter Email Address to Vote</h2>
      <div class="mb-6">
        <input
          type="email"
          v-model="email"
          placeholder="Enter your email"
          class="border border-gray-300 rounded-lg w-full px-4 py-3 focus:outline-none"
        />
      </div>
      <button
        @click="verifyEmail"
        class="bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-lg w-full py-3 focus:outline-none"
      >
        Verify Email
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
    };
  },
  methods: {
    verifyEmail() {
      // Send the email address to the server for verification
      axios
        .post('/verify-email', { email: this.email })
        .then(response => {
          this.$router.push({ name: 'verify', params: { email: this.email } });
        })
        .catch(error => {
          // Handle error response
          alert('User with that email already voted!');
        });
    },
  },
};
</script>
