

<template>
  <div v-if="errors">
    <small v-for="(error, index) in errors" :key="index" class="text-danger">
     
     {{  capitalizeFirstLetter(  error) }}
    </small>
  </div>
</template>

<script>
export default {
  name: 'Error',
  props: {
    errors: {
      type: Object,
      required: true,
    },
  },

  methods : {
    capitalizeFirstLetter(text) {
      // Check if the text is not empty
      if (text) {
        // Convert the first character to uppercase and append the rest of the string
        return text.charAt(0).toUpperCase() + text.slice(1);
      } else {
        return text; // Return unchanged if the text is empty or not a string
      }
    },
  }
};
</script>