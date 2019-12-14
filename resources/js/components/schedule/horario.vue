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
              <input type="radio" v-model="semestre" :value="opcion.semestre" @click="changeSemestre(opcion.semestre)">
              <b>{{ opcion.semestre }}</b>
            </label>
          </font>
        </span>
      </span>
    </div>
    <div class="panel-body">
      <span v-for="opcion in semestres">
        <font :color="opcion.color">
          <span v-if="opcion.semestre == semestre">
            <div class="col-md-2 col-md-offset-1">
              De: <br>{{ wdia(opcion.fecha_ini) }}
            </div>
            <div class="col-md-2">
              A: <br>{{ wdia(opcion.fecha_fin) }}
            </div>
            <div class="col-md-5">
              <div v-for="(mess, index) in mess_horario"><b>{{ mess }}</b></div>
            </div>
          </span>
        </font>
      </span>
    </div>
    <div class="row"><div class="col-md-9"><hr></div></div> 
    <div class="row">
      <div class="col-md-3">HORARIO SELECCIONADO</div><b>{{ semestre }}</b>
<!--       <div class="col-md-1">
        <button v-if='panelHorario_btn == "view"' v-on:click='btnEdit("horario")' class="btn btn-sm btn-success">Editar</button>
      </div> -->
    </div>
    <div class="panel-body">
      <div class="container">
        <div class="row">
          <div class="col-md-2" style="text-align: center">__TURNO__</div>
          <span v-if="status == 'edit'">
            <div class="col-md-1" style="text-align: center" v-for="dia in semana">
              <select :value=turnos[dia] @change="changeTurno(dia, $event.target.value)">
                <option value="libre">Libre</option>
                <option value="dia">Diurno</option>
                <option value="noche">Nocturno</option>
                <option value="vacaciones">Vacaciones</option>
              </select>
            </div>
          </span>
          <span v-if="status == 'view'">
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
        panelRango_btn: (state) => state.panel.btn.rango,
        panelRango_data: (state) => state.panel.data.rango,
        panelHorario_btn: (state) => state.panel.btn.horario,
        panelHorario_data: (state) => state.panel.data.horario,
        turnos: (state) => state.turnos,
        mess_horario: (state) => state.mess_horario,
        component_key: (state) => state.component_key,
        // semestreActual: (state) => state.semestre,
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
      btnEdit (type){
        this.$store.commit('btnEdit',type);
      },
    }, // End of Methods
  };  
</script>
