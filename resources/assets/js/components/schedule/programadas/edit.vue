<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2"> 
        <button v-if="status == 'view'" v-on:click='btnEdit()' class="btn btn-sm btn-success">Editar</button>
        <button v-if="status == 'edit'" v-on:click='btnSave()' class="btn btn-sm btn-danger">Grabar</button>
        <button v-if="status == 'edit'" v-on:click='btnRestore(cdocente)' class="btn btn-sm btn-primary">Rehacer</button>
      </div>              
      <div class="col-md-6"> 
        <span v-for="mess in check_main">
          <font color="red">
            <b>{{ mess }}</b><br>                
          </font>
        </span>
      </div>      
    </div>    
    <programadas :key="component_key"></programadas>
  </div>
</template>

<script>
  import { mapState } from 'vuex';
  import programadas from '../programadas';

  export default {
    mounted() {
      this.getData(); 
    },
    name: 'EditProgramadas',
    props: ['cdocente'],
    components: {
      programadas
    },
    computed: {
      ...mapState({
        component_key: (state)=>{state.component_key},
        status: (state) =>state.status,
        check_main: (state) =>state.check_main,
      }),
    },
    methods: {
      getData(){
        this.$store.dispatch('getData', this.cdocente);
      },
      btnEdit() {
        this.$store.commit('status', 'edit');
      },
      btnRestore(cdocente) {
        this.$store.dispatch('restoreData', cdocente);
      },
    },
    // }, // End of Methods
  };  
</script>

