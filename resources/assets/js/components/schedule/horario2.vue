<template>
  <div class="col-md-10">
    <div class="panel-body">
      <div class="row">
        <div class="col col-md-2">Semestre</div>
        <div class="col col-md-1">LUN</div>
        <div class="col col-md-1">MAR</div>
        <div class="col col-md-1">MIE</div>
        <div class="col col-md-1">JUE</div>
        <div class="col col-md-1">VIE</div>
        <div class="col col-md-1">SAB</div>
      </div>

      <span v-for="semestre in datos">
        <div class="row">
          <!-- <span > -->
          <span v-for="item in semestre">
            <div class="col col-md-1">
              {{ item }}
            </div>
          </span>              
            <!-- </span> -->
        </div>
      </span>
    </div>
  </div>
</template>

<script>
  import { mapState } from 'vuex';
  import { mapGetters } from 'vuex';
  import Datepicker from 'vuejs-datepicker';
  import {es} from 'vuejs-datepicker/dist/locale';

  export default {
    async mounted() {
      await this.getRegistros();
      this.fillTabla();
    },
    name: 'Horario',
    components: {
      Datepicker,
    },
    data(){
      return {
        registros: [],
        datos: []
      }
    },
    computed: {
      ...mapState({
        es: (state) =>state.es,
        horarios: (state) => state.horarios,
        semestres: (state) => state.semestres,
        mess_horario: (state) => state.mess_horario,
        component_key: (state) => state.component_key,
      }),
      ...mapGetters([
        'wdia', 'view', 'wturno'
      ]),
    },
    methods: {
      getRegistros(){
        for (var i = this.semestres.length - 1; i >= 0; i--) {
          let xsemestre = this.semestres[i]['semestre'];
          let filtro = this.horarios.filter(function (reg) {
            return reg['semestre'] == xsemestre ;
          });
          let data = [];
          data['semestre'] = xsemestre;
          data['dias'] = filtro;
          this.registros.push(data);
        }
        console.log('horario2', this.registros);
      },
      fillTabla(){
        let columnas = ['semestre', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
        for (var i = 0; i < this.registros.length; i++) {
          let data = [this.registros[i].semestre];
          for (var j = 1; j < columnas.length; j++) {
            let xdia = columnas[j];
            let xreg = this.registros[i].dias.filter(function (value) {
              return value['dia'] == xdia;
            });
            data.push(xreg[0]['turno']);
          }
          this.datos.push(data);
        }
        console.log('fillTabla', this.datos);
      }

    }, // End of Methods
  };  
</script>
