<template>
  <div class="container">
    <div class="row">
      <h2 class="mt-3">ADD PRODUCTS</h2>
        <hr>
      <div class="col-md-2"></div>
      <div class="col-md-8">

        <form @submit.prevent="submitForm()">
          <fieldset>
            <div class="form-group">
              <label for="p_name" class="form-label mt-4">Product Name</label>
              <input
                type="text"
                class="form-control"
                id="p_name"
                v-model="item.name"
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
                v-model="item.qty"
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
                v-model="item.price"
                aria-describedby="emailHelp"
                placeholder="Enter Product Price" required
                >
            </div>
            <div class="form-group">
              <label for="formFile" class="form-label mt-4">Image</label>
              <input class="form-control"
              type="file"
              id="formFile"
              placeholder="Image"
              @change="getImage($event)"
              >
            </div>

            <center>
                      <button
                        type="submit"
                        class="btn btn-primary mt-3"
                        style="width:100%"
                        v-show="item.name && item.qty && item.price"
                        >ADD</button>
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
  data() {
      return{
        item:{
          name:'',
          qty:'',
          price:'',
          image:''
        }
      }
  },
  methods:{
    submitForm(){
      this.$http.post("http://127.0.0.1:8000/api/items",this.item)
          .then(function (response){
            this.$router.push("/list")
          });

          },
      getImage(event){
          var fileReader= new FileReader();
          fileReader.readAsDataURL(event.target.files[0]);
          fileReader.onload = (event)=>{
              this.item.image = event.target.result;
          }
          console.log(this.item);
      }
    }
  }

</script>

<style scoped>

</style>
