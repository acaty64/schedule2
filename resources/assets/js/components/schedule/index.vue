<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2>LISTA DE DOCENTES</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row" v-for="docente in docentes">
            <div class="col-md-1">{{ docente.id }}</div>
            <div class="col-md-1">{{ docente.cdocente }}</div>
            <div class="col-md-5">{{ docente.name }}</div>
            <div class="col-md-1">{{ docente.pendientes }}</div>
            <div class="col-md-1">{{ docente.fecha_fin }}</div>
            <div class="col-md-1">
              <router-link :to="{ name: 'edit', params: { docente } }">{{ docente.id }}</router-link>
            </div>
        </div>
      </div>
    </div>
  </div>	
</template>
<script>
  import axios from 'axios';
  export default {
    mounted() {
      // console.log('schedule/index.vue mounted.');
    },

    name: 'ScheduleIndex',

    data() {
      return {
        docentes: [],
        error: false,
        view: 'list'
      }
    },

    created () {
        var URLdomain = window.location.host;
        var protocol = window.location.protocol;
        var url = protocol+'//'+URLdomain+'/api/schedule/index';
        axios.get(url).then(response=>{
// console.log('index.vue response: ', response);
          this.docentes = response.data;
        }).catch(() => {
            this.error = true;
        });
    },
    methods: {
    },  // end of methods

  };	
</script>