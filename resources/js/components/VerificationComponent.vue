<!-- resources/js/components/VerificationComponent.vue -->


<template>
    
    <div>
      <h2>Enter Verification Code</h2>
      <input type="text" v-model="verificationCode" placeholder="Enter verification code">
      <button @click="submitVerificationCode">Submit</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios'
  export default {
    
    data() {
      return {
        verificationCode: ''
      };
    },
    methods: {
        
      submitVerificationCode() {
        // Send the verification code to the server for validation
        axios.post('/verify-code', { code: this.verificationCode })
          .then(response => {
            // Handle success response
               
            if (response.data.valid) {
                // Redirect the user to the VoteComponent
                this.$router.push({ name: 'vote', params: { email: this.$route.params.email } });            } else {
                alert('Invalid verification code');
            }
          })
          .catch(error => {
            // Handle error response
          });
      }
    }
  }
  </script>
  