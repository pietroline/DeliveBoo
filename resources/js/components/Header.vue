<template>
<header>

        <b-navbar toggleable="lg">
         <router-link class="navbar-brand" :to="{name: 'home'}"><a href="#"><img src="./../../../public/img/logo-white.png" class="img" alt=""/></a></router-link>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

             <b-collapse id="nav-collapse" is-nav>

               <ul class="navbar-nav mr-auto">

                    <li class="nav-item" v-for="itemMenu in navMenu" :key="itemMenu.routeName">
                        <router-link class="ms_white" :to="{name: itemMenu.routeName}">{{itemMenu.label}}</router-link>
                    </li>

                </ul>

                
                <b-navbar-nav class="ml-auto">
                    <b-nav-form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="ms_white" href="/admin">Accedi</a>
                        </li>
                    </ul>
                </b-nav-form>
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
   background-color: #ff8c28;
   height: 80px;
 }

 img{
    
 }

 .ms_white{
   color: #fff;
   font-weight: bold;
   font-size: 20px;
 }
</style>


 