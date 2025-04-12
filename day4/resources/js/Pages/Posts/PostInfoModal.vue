<template>
    <div>
      <!-- Button to trigger the modal -->
      <button @click="openModal(postId)" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        View Post
      </button>

      <!-- Modal -->
      <div v-if="isModalOpen" class="fixed inset-0 flex justify-center items-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
          <h3 class="text-xl font-bold mb-4">Post Details</h3>
          <div v-if="post">
            <p><strong>Title:</strong> {{ post.title }}</p>
            <p><strong>Description:</strong> {{ post.description }}</p>
            <p><strong>Username:</strong> {{ post.user.name }}</p>
            <p><strong>User Email:</strong> {{ post.user.email }}</p>
          </div>
          <div v-else>
            <p>Loading post data...</p>
          </div>
          <button @click="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Close
          </button>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    props: {
      postId: {
        type: Number,
        required: true
      }
    },
    data() {
      return {
        isModalOpen: false,
        post: null
      };
    },
    methods: {
      // Open modal and fetch post data
      openModal(postId) {
        this.isModalOpen = true;
        axios.get(`/posts/${postId}`) // Ensure your backend returns the post with the necessary data
          .then(response => {
            this.post = response.data; // Assuming your API returns post data with user info
          })
          .catch(error => {
            console.error("There was an error fetching the post:", error);
          });
      },
      // Close the modal
      closeModal() {
        this.isModalOpen = false;
        this.post = null; // Reset post data
      }
    }
  };
  </script>
