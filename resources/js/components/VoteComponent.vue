<!-- resources/js/components/VoteComponent.vue -->
<template>
  <div>
    <h1>Vote for your favourite Steadfast Collective sandwich</h1>
    <h2>What is your favourite sandwich?</h2>
    <div>
      <label>
        <input type="radio" v-model="selectedItem" value="1">
        Ham
      </label>
    </div>
    <div>
      <label>
        <input type="radio" v-model="selectedItem" value="2">
        Ham & Cheese
      </label>
    </div>
    <div>
      <label>
        <input type="radio" v-model="selectedItem" value="3">
        Cheese & Pickle
      </label>
    </div>
    <div>
      <label>
        <input type="radio" v-model="selectedItem" value="4">
        Tuna
      </label>
    </div>
    <button @click="submitVote">Submit Vote</button>
  </div>
</template>

<script>
 import axios from 'axios'
export default {
  data() {
    return {
      selectedItem: null,
    };
  },
  props:['email'],
  methods: {
    submitVote() {
      if (this.selectedItem === null) {
        alert('Please select an option');
        return;
      }

      axios.post('/submit-vote', {
        email: this.email,
        option_id: this.selectedItem
      })
        .then(response => {
          alert(response.data.message);
          // Redirect to success page or perform other actions
          this.$router.push({name: 'success'});
        })
        .catch(error => {
          console.error(error);
          alert('An error occurred while submitting the vote');
        });
    },
  },
};
</script>
