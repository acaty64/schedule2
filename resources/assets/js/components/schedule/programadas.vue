<template>
  <div class="container">
    <div class="row">
      <div class="col-md-4"><b>Vacaciones programadas por rango de fechas</b></div>
      <div class="col-md-1">
        <button v-if='btn.agregar' v-on:click='btnAdd(cdocente)' class="btn btn-sm btn-primary">Agregar</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 col-offset-1">Del:</div>
      <div class="col-md-1 col">Días:</div>
      <div class="col-md-2 col">Al:</div>
      <div class="col-md-4 col">Mensaje</div>
    </div>
    <div class="row" v-for="rango in programadas">
      <div class="col-md-2 col-offset-1">
        <span v-if="!rango.editFecha || rango.type != 'new' ">
          {{ wdia(rango.fecha_ini) }}
        </span> 
        <span v-if="rango.editFecha && rango.type == 'new'">
          <datepicker @closed="changeDini(rango)" v-model=rango.fecha_ini zone="local" value-zone="local" :language="es"></datepicker>
        </span> 
      </div> 
      <div class="col-md-1"> 
        <span v-if="!rango.editDias || rango.type == 'closed'">
          {{ rango.dias }}        
        </span>
        <span v-if="rango.editDias && rango.type != 'closed'">
          <select v-model="rango.dias" @change="onChange(rango.type, rango.id, $event.target.value)">
            <option v-for="item in rango.opciones" :value="item" :key="item">
              {{ item }}
            </option>
          </select>
        </span>
      </div> 
      <div class="col-md-2">{{ wdia(rango.fecha_fin) }}</div>
      <span v-if="rango.eliminar">
       <div class="col-md-1"><button v-on:click='btnDel(rango)'  class="btn btn-sm btn-danger">Eliminar</button></div>
      </span>
      <div class="col-md-3">
        <font color='red'>
          <div v-for="mess in rango.message">          
            {{ mess }}        
          </div>
        </font>
      </div>
    </div>
    <br>
    <div>
      <b>Vacaciones programadas por horario: {{ porDiaWeek.length }} dias.</b>
    </div>
    <div class="col-md-9">
      <span v-for="item in porDiaWeek">
        <div class="col-md-2">
          <small>{{ wdia(item) }}</small>
        </div>
      </span>
    </div>
  </div>
</template>

<script>
  import { mapState } from 'vuex';
  import { mapGetters } from 'vuex'
  import Datepicker from 'vuejs-datepicker';
  import {es} from 'vuejs-datepicker/dist/locale';

  export default {
    async mounted(){
      await this.status_ver();
    },
    name: 'Programadas',
    components: {
      Datepicker,
    },
    computed: {
      ...mapState({
        es: (state) =>state.es,
        semestre: (state) => state.semestre,
        cdocente: (state) => state.docente.cdocente,
        docente_id: (state) => state.docente.docente_id,
        status: (state) => state.status,
        programadas: (state) => state.programadas,
        panel_btn: (state) => state.panel.btn.programadas,
        panel_data: (state) => state.panel.data.programadas,
        porDiaWeek: (state) => state.porDiaWeek,
        panel: (state) => state.panel,
        btn: (state) => state.btn_prog,
      }),
      ...mapGetters([
        'wdia', 
      ]),
    },
    watch: {
      status: function () {
        this.status_ver();
      }
    },
    methods: {      
      switchEdit(value){
        for (var i = 0; i < this.programadas.length; i++) {
          if(this.programadas[i]['open'] == true){
            this.programadas[i]['editDias'] = value;
            this.programadas[i]['editFecha'] = value;
          }else{
            this.programadas[i]['editDias'] = false;
            this.programadas[i]['editFecha'] = false;            
          }
        }
      },
      status_ver(){
        switch(this.status){
          case 'view':
            this.switchEdit(false);
            this.btn.agregar = false;
            break;
          case 'editable':
            this.switchEdit(false);
            this.btn.agregar = false;
            break;
          case 'edit':
            this.switchEdit(true);
            this.btn.agregar = true;
            break;
          case 'upgradeable':
            this.switchEdit(true);
            this.btn.agregar = true;
            break;
        }
      },
      btnDel(item){
        this.$store.commit('deleteProgramada', item);
        this.$store.dispatch('changeSemestre', this.semestre);
      },
      changeDini(item){
        this.$store.commit('changeDiasInProgramada', [item.type, item.id, item.dias]);
        this.$store.dispatch('changeSemestre', this.semestre);
      },
      btnAdd(cdocente){
        var array = this.programadas.filter(function(prog){
          return prog.type == 'new';
        });
        if(array.length == 0){
          var max = 0;
        }else{
          var max = Math.max.apply(Math, array.map(function (obj) {
            return obj.id;
          }));          
        }
        var hoy = new Date().setHours(0,0,0,0);
        var newItem = {
          id: max + 1,
          cdocente: cdocente,
          fecha_ini: new Date(hoy),
          fecha_fin: new Date(hoy),
          dias: 1,
          maximo: 7,
          message: "",
          opciones: [1,2,3,4,5,6,7],
          paso: 1,
          type: 'new',
          message: '',
          eliminar: true,
          editFecha: true,
          editDias: true,
          open: true,
        };
        this.$store.commit('addNewProgramada', newItem);
        this.changeDini(newItem);
      },
      async onChange(type, id, value) {
        await this.$store.commit('changeDiasInProgramada', [type, id, value]);
        await this.$store.dispatch('changeSemestre', this.semestre);
        this.$store.commit('component_key');
      }
    }, // End of Methods
  };  
</script>
