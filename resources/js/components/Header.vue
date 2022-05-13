<template>
  <header>
  <b-navbar toggleable="lg" type="dark">
    <router-link class="navbar-brand" :to="{name: 'home'}"><a href="#"><img src="./../../../public/img/logo-white.png" class="img" alt=""/></a></router-link>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" v-for="itemMenu in navMenu" :key="itemMenu.routeName">
            <router-link class="ms_white" :to="{name: itemMenu.routeName}">{{itemMenu.label}}</router-link>
            </li>
        </ul>       
    
      <b-navbar-nav class="ml-auto">
    
        <ul class="navbar-nav">
              <li class="nav-item">
                <a class="ms_white" href="/admin">Accedi</a>
              </li>
            </ul>

      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
  </header>
</template>

  

<script>
export default {
  name: "Header",

  data() {
    return {
      navMenu: [
        {
          routeName: "home",
          label: "Home",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
 
 header{
   background-color: rgb(41, 49, 51);
 
 }

 img{
   width: 60px;
 }

 .ms_white{
   color: #fff;
   font-weight: bold;
   font-size: 15px;
 }

</style>

