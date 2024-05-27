const { createApp } = Vue;

createApp({
  data() {
    return {
      discs: [],
      apiUrl: "http://localhost/boolean/php-dischi-json/server.php",
    };
  },
  created() {
    axios
      .get("http://localhost/boolean/php-dischi-json/server.php")
      .then((resp) => {
        this.discs = resp.data;
        console.log(resp);
        console.log(this.discs);
      });
  },

  methods: {
    likedDisco(index) {
      console.log(index);
      this.discs[index].disco_liked = !this.discs[index].disco_liked;
      const data = {
        index: index,
      };
      axios
        .post(this.apiUrl, data, {
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((resp) => {
          console.log(resp);
          //this.discs = resp.data; non salvarla o rimane il cuore
        });
    },
  },
}).mount("#app");
