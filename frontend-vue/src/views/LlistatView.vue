<template>
  <div class="about">
    <h1>This is an about page</h1>
  </div>
</template>

<script>

export default {
  data() {
    return {
      arrayItems: [],
    }
  },
  created() {
    this.getItems();
  },
  methods: {
    async getItems() {

      let url = "http://127.0.0.1:8000/api/interpretes";

      const response = await fetch(url, {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        }
      });

      const jsonResponse = await response.json();
      console.log("interpretes", jsonResponse);
      this.arrayItems = jsonResponse;    
    },
  }
}
</script>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
