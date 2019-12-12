<template>
  <div class="container">
    <div class="row">
      <router-link :to="{ name: 'list' }">Lista de Docentes</router-link>
    </div>
    <div>
      <router-view :key="$route.fullpath"></router-view>
    </div>
  </div>	
</template>
<script>
  export default {
    mounted() {
      // console.log('schedule/main.vue mounted.');
    },

    name: 'ScheduleMain',

  };	
</script>