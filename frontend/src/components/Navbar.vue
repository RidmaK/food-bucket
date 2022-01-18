<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">FOOD-BUCKET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
             <router-link to="/" style="text-decoration: none;"> <a class="nav-link active" href="#">Home</a></router-link>

            </li>
            <li class="nav-item">
              <router-link to="/add" style="text-decoration: none;"><a class="nav-link" href="#">Add Product</a></router-link>
            </li>
            <li class="nav-item">
              <router-link to="/list" style="text-decoration: none;"><a class="nav-link" href="#">Product Bascket</a></router-link>
            </li>

          </ul>
          <ul class="navbar-nav navbar-right">
            <li class="nav-item">
              <router-link to="/about" style="text-decoration: none;"><a class="nav-link active" href="#">About
              </a></router-link>
            </li>
            <li class="nav-item">
              <router-link to="/contact" style="text-decoration: none;"><a class="nav-link active" >Contact
              </a></router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  setup() {

  },
}
</script>

<style scoped>

</style>
