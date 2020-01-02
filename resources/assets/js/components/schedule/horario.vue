<template>
  <div class="col-md-10">
    <div class="row">            
      <div class="col-md-3">SELECCIONAR SEMESTRE</div>
    </div>
    <br>
    <div class="panel-body">
      <span class="form-inline">
        <span v-for="opcion in semestres">
          <font :color="opcion.color">
            <label class="radio-inline col-md-2">
              <input v-if="opcion.status" type="radio" v-model="semestre" :value="opcion.semestre" @click="changeSemestre(opcion.semestre)">
              <b>{{ opcion.semestre }}</b>
            </label>
          </font>
        </span>
      </span>
    </div>
    <div class="panel-body">
      <span v-for="opcion in semestres">
        <span v-if="opcion.vacaciones && opcion.semestre == semestre">
          <div class="col-md-2 col-md-offset-1">
            <font :color="opcion.color">
              VACACIONES
            </font>
          </div>  
        </span>
        <span v-if="!opcion.vacaciones && opcion.semestre == semestre">
          <font :color="opcion.color">
            <div class="col-md-2 col-md-offset-1">
              De: <br>{{ wdia(opcion.fecha_ini) }}
            </div>
            <div class="col-md-2">
              A: <br>{{ wdia(opcion.fecha_fin) }}
            </div>
            <div class="col-md-5">
              <div v-for="(mess, index) in mess_horario"><b>{{ mess }}</b></div>
            </div>
          </font>
        </span>
      </span>
    </div>
    <div class="row"><div class="col-md-9"><hr></div></div> 
    <div class="row">
      <div class="col-md-3">HORARIO SELECCIONADO</div><b>{{ semestre }}</b>
    </div>
    <div class="panel-body">
      <div class="container">
        <div class="row">
          <div class="col-md-2" style="text-align: center">__TURNO__</div>
          <span v-if="status == 'edit' || status == 'upgradeable'">
            <div class="col-md-1" style="text-align: center" v-for="dia in semana">
              <select :value=turnos[dia] @change="changeTurno(dia, $event.target.value)">
                <option value="libre">Libre</option>
                <option value="dia">Diurno</option>
                <option value="noche">Nocturno</option>
                <option value="vacaciones">Vacaciones</option>
              </select>
            </div>
          </span>
          <span v-else>
            <div v-for="turno in turnos" class="col-md-1" style="text-align: 'center'"><b>{{ wturno(turno) }}</b></div>
          </span>
        </div>              
        <div class="row">
          <div class="col-md-2" style="text-align: center"></div>
          <div class="col-md-1" style="text-align: center" v-for="dia in semana">{{ dia }}</div>
        </div>
        <div class="row" v-for="hora in horas">
          <div class="col-md-2" style="text-align: center">{{ hora }}</div>
          <div class="col-md-1" style="text-align: center" v-for="dia in semana"><b>{{ view(hora, dia) }}</b></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { mapState } from 'vuex';
  import { mapGetters } from 'vuex';
  import Datepicker from 'vuejs-datepicker';
  import {es} from 'vuejs-datepicker/dist/locale';

  export default {
    mounted() {
    },
    name: 'Horario',
    components: {
      Datepicker,
    },
    computed: {
      ...mapState({
        es: (state) =>state.es,
        fini: (state) =>state.fini,
        ffin: (state) =>state.ffin,
        horario: (state) => state.horario,
        horas: (state) => state.horas,
        semana: (state) => state.semana,
        semestre: (state) => state.semestre,
        semestres: (state) => state.semestres,
        schedule: (state) => state.schedule,
        status: (state) => state.status,
        turnos: (state) => state.turnos,
        mess_horario: (state) => state.mess_horario,
        component_key: (state) => state.component_key,
      }),
      ...mapGetters([
        'wdia', 'view', 'wturno'
      ]),
    },
    methods: {
      consistencia(){
        this.$store.dispatch('consistencia_horario', this.semestre);
      },
      async changeSemestre (semestre) {
        await this.$store.dispatch('horario2horarios');
        await this.$store.dispatch('changeSemestre', semestre);
        this.$store.commit('component_key');
      },
      async changeTurno(dia, turno){
        await this.$store.commit('turno', [dia, turno]);
        await this.$store.dispatch('turnos2horario');
        await this.$store.dispatch('horario2horarios');
        await this.$store.dispatch('changeSemestre', this.semestre);
        this.$store.commit('component_key');
      },
    }, // End of Methods
  };  
</script>
