<template>
  <div class="container">
    <div class="row">
      <h2 class="mt-3">EDIT PRODUCTS</h2>
        <hr>
      <div class="col-md-2"></div>
      <div class="col-md-8">

        <form @submit.prevent="updateForm()">
          <fieldset>
            <div class="form-group">
              <label for="p_name" class="form-label mt-4">Product Name</label>
              <input
                type="text"
                class="form-control"
                id="p_name"
                v-model="product.name"
                aria-describedby="emailHelp"
                placeholder="Enter Product Name" required
                >
            </div>
            <div class="form-group">
              <label for="qty" class="form-label mt-4">Product Quentity</label>
              <input
                type="number"
                class="form-control"
                id="qty"
                v-model="product.qty"
                aria-describedby="emailHelp"
                placeholder="Enter Product Quentity" required
                >
            </div>
            <div class="form-group">
              <label for="price" class="form-label mt-4">Product Price P.U $</label>
              <input
                type="number"
                class="form-control"
                id="price"
                 v-model="product.price"
                aria-describedby="emailHelp"
                placeholder="Enter Product Price" required
                >
            </div>
            <div class="form-group">
              <label for="formFile" class="form-label mt-4">Image</label>
              <input class="form-control" type="file" id="formFile">
            </div>

            <center>
                      <button
                        type="submit"
                        class="btn btn-primary mt-3"
                        style="width:100%"
                        >EDIT</button>
            </center>
          </fieldset>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      product:{

      }
    }
  },
  created(){
    this.getData();
    console.log(this.$route.params.id);
//
  },
  methods:{
    getData(){
       this.$http.get("http://127.0.0.1:8000/api/search/"+this.$route.params.id)
            .then(function(response){
                this.product =response.body[1];
                console.log(this.product)
            })
    },
    updateForm(){
        this.$http.put("http://127.0.0.1:8000/api/items/"+this.$route.params.id,this.product)
            .then(function(response){
                this.$router.push("/list");
            })
    }
  }
}
</script>

<style scoped>

</style>
