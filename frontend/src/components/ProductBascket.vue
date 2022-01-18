<template>
  <div class="container">
    <h2 class="mt-3">PRODUCT BASCKET</h2>
    <hr>
    <div class="row">
      <div class="col-md-4 mt-3" v-for="item in items" :key="1">
        <div class="card bg-light pro-card" style="height:auto;">
            <img :src="'http://localhost:8000/'+item.image" alt="" style="width:100%;padding:10px;height:400px;">
            <div class="card-body">
              <h5>{{ item.name }}</h5>
              <p>{{ item.qty }} Qtys Available Now</p>
              <p>Price {{ item.price }} $</p>
              <div class="row">
              <div class="col-md-5">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
              <div class="col-md-7">
                  <button class="btn btn-danger btn-sm" style="float:right;width:70px;" @click="deleteItem($event)" :id="item.id">DELETE</button>
                  <router-link :to="'/edit/'+ item.id " class="btn btn-primary btn-sm" style="float:right;width:70px;margin-right:10px;">EDIT</router-link>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      items:[]
    }

  },
   created(){
      this.$http.get("http://127.0.0.1:8000/api/items")
          .then(function(response){
              this.items = response.body[1]
              console.log(response);
              console.log(this.items);
          })
    },
    methods:{
        deleteItem(event){
          console.log(event.target.id);
          this.$http.delete("http://127.0.0.1:8000/api/items/"+event.target.id)
              .then(function(response){
                var position = this.items.findIndex(function(element){
                    return element.id == event.target.id;
                });
                this.items.splice(position,1);
              })
        }
    }
}
</script>

<style scoped>
  .pro-card:hover {
    transform: scale(1.02);
    transition: 2s;
    cursor: pointer;
  }
  .checked {
  color: orange;
  }
</style>
