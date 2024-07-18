<template>
    <h1>
        welcome oklm
    </h1>
</template> 
 
 <script>
  export default {

        name: 'Welcome',
        props: {
        img_url: String
        },
      data() {
          return {
            details: [],
            showAds: false,
          };
      },
      mounted: function(){
            this.getAds();
        },
        computed: {

            filteredItems() {
                return this.details.filter(detail => {
                    return detail.price >= this.rangeValue;
                });

                },
            searchItems() {
                return this.details.filter(detail => {
    return (
        detail.name.toLowerCase().includes(this.searchText.toLowerCase()) ||
        detail.area.toLowerCase().includes(this.searchText.toLowerCase()) ||
        detail.description.toLowerCase().includes(this.searchText.toLowerCase())
    );
});

           },
        },
    methods:{
        getAds() {
            axios.get('api/script.php?action=sixAds')
                        .then((response) => {
                            console.log(response.data);
                            this.details = response.data;
                        })
                        .catch((error) => {
                            console.error(error);
                         //   alert('Failed to fetch data');
                        });
            alert('ok');

          },
        }
  }
</script>