<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-4"> 
                Docente: <b>{{ docente.wdocente }}</b>
              </div>
              <div class="col-md-2"> 
                <button v-if="status == 'view'" v-on:click='btnEdit()' class="btn btn-sm btn-success">Editar</button>
                <button v-if="status == 'edit'" v-on:click='btnSave()' class="btn btn-sm btn-danger">Grabar</button>
                <button v-if="status == 'edit'" v-on:click='btnRestore(docente_id)' class="btn btn-sm btn-primary">Rehacer</button>
                <a v-if="status == 'view'" class="btn btn-sm btn-primary" role="button" v-bind:href="'/schedule/crono/show/'+ docente_id">Ver Cronograma</a>
              </div>              
              <div class="col-md-6"> 
                <span v-for="mess in check_main">
                  <font color="red">
                    <b>{{ mess }}</b><br>                
                  </font>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 align="center"><b>VACACIONES</b></h5>
          </div>
          <div class="panel-body">
            <div class="container">
                <periodos :key="component_key"></periodos>
            </div>            
            <div class="row">
              <div class="col-md-12"><hr></div>
            </div>
            <div class="container">
                <programadas :key="component_key"></programadas>
            </div> 
          </div>
        </div>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 align="center"><b>HORARIOS</b></h5>
          </div>
          <div class="panel-body"> 
            <div class="container">
                <horario :key="component_key"></horario>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import periodos from './periodos';
import programadas from './programadas';
import horario from './horario';
export default {
  name: 'ScheduleEdit',
  async mounted(){
    await this.getData(this.docente_id);
  },
  components: { periodos, programadas, horario },
  props: ['docente_id'],
  computed: {
    ...mapState({
      status: (state) => state.status,
      component_key: (state) => state.component_key,
      docente: (state) => state.docente,
      check_main: (state) => state.check_main,
    }),
  },
  methods: {
    getData(docente_id){
      this.$store.dispatch('getData', docente_id);
    },
    semestre(semestre){
      this.$store.commit('semestre', semestre);
    },
    btnRestore(docente_id) {
      this.$store.dispatch('restoreData', docente_id);
    },
    btnEdit() {
      this.$store.commit('status', 'edit');
    },
    async btnSave() {
      try {
        await this.$store.dispatch('saveData');
        this.$store.commit('status', 'view');
      } catch (e) {
        alert('Error de grabación.');
      }
    },
  }
};
</script>