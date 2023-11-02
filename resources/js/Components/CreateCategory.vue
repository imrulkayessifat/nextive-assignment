<template>
    <div class="container mx-auto px-4">
      <form @submit.prevent="createCategory">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Category Name
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Category Name" v-model="categoryName">
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Create Category
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        categoryName: ''
      };
    },
    methods: {
      createCategory() {
        // Send a request to your API to create the category
        // You can use axios or fetch API for this
        axios.post('/categories', {
          name: this.categoryName
        })
        .then(response => {
          // Handle success
          console.log(response);
          this.categoryName = ''; // Clear the input field
        })
        .catch(error => {
          // Handle error
          console.log(error);
        });
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add your Tailwind CSS styles here */
  </style>
  