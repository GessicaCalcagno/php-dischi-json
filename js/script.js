const { createApp } = Vue;

createApp({
  data() {
    return {
      discs: [],
    };
  },
  created() {
    axios
      .get("http://localhost/boolean/php-dischi-json/server.php")
      .then((resp) => {
        this.discs = resp.data.results;
      });
  },
}).mount("#app");
