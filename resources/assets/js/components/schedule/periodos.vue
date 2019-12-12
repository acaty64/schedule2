<template> 
  <div class="row">
    <div class="row">          
      <div class="col-md-3"><b>Periodos de Vacaciones</b></div>
    </div>
    <div v-for="item in periodos">              
      <div class="row">
        <div class="col-md-2">Periodo: <b>{{ item.periodo }}</b><br>

        </div>
        <div class="col-md-2">Inicio:
          <!-- <span v-if="panel_data == 'view'">  -->
            <b>{{ wdia(item.fecha_ini) }}</b>
          <!-- </span> -->
        </div>
        <div class="col-md-2">Fin:
          <!-- <span v-if="panel_data == 'view'">  -->
            <b>{{ wdia(item.fecha_fin) }}</b>
          <!-- </span> -->
        </div>
        <!-- <span v-if="panel_data == 'view'">  -->
          <div class="col-md-2">Ganadas: <b>{{ item.ganadas }}</b></div>
          <div class="col-md-2">Por Ganar: <b>{{ item.porganar }}</b></div>
        <!-- </span> -->
      </div>      
      <div class="row">
        <div class="col-md-2">          
          <div v-for="mess in item.message">
            <font color="red">{{ mess }}</font>
          </div>
        </div>
        <div class="col-md-2">Gozadas: <b>{{ item.gozadas }}</b></div>
        <div class="col-md-2">Adelantadas: <b>{{ item.adelantadas }}</b></div>
        <div class="col-md-2">Programadas: <b>{{ item.programadas }}</b></div>
        <div class="col-md-2">Por Programar: <b>{{ item.porprogramar }}</b></div>
      </div>
    </div>
  </div>
</template>
<script>
  import { mapState } from 'vuex';
  import { mapGetters } from 'vuex';
  import { mapActions } from 'vuex';
  import Datepicker from 'vuejs-datepicker';
  import {es} from 'vuejs-datepicker/dist/locale';

  export default {
    mounted() {
    },
    name: 'Periodos',
    components: {
      Datepicker,
    },
        // periodo: (state) => state.periodo,
    computed: {
      ...mapState({
        es: (state) =>state.es,
        periodos: (state) => state.periodos,
        ganadas: (state) => state.ganadas,
        vacPorPeriodo: (state) => state.vacPorPeriodo,
        panel_btn: (state) => state.panel.btn.periodos,
        panel_data: (state) => state.panel.data.periodos,
      }),
      ...mapGetters([
        'wdia'
      ]),
    },
    methods: {

    }, // End of Methods
  };  
</script>
