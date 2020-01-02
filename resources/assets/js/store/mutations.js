export default {
  parameters(state, value){
    state.parameters = value;
  },
  confirm(state, value){
    state.confirm = value;
  },
  tmail_id(state, value){
    state.tmail_id = value;
    if(!state.tmail_id){
      state.confirm = false;
    }else{
      state.confirm = true;
    }
  },
  check_main(state, value){
    state.check_main = value;
  },
  deleteProgramada(state, item){
    for(var i in state.programadas){
      if(state.programadas[i]['id'] == item.id && state.programadas[i]['type'] == item.type){
        state.programadas.splice(i,1);
      }
    }
  },
  addNewProgramada(state, item){
    state.programadas.push(item);
  },
  //* Asigna los status de consistencia en el semestre identificado en el item
  check_semestre(state, item){
    for(var i in state.semestres){
      if(state.semestres[i]['semestre'] == item.semestre){
        state.semestres[i]['check'] = [item.check1, item.check2, item.check3];
      }
    }
  },
  //* Asigna el valor de "docente"
  docente (state, value ){
    state.docente = value;
  },
  changeDiasInProgramada(state, [type, index, value]){
    for (var i = 0; i < state.programadas.length; i++) {
      if(state.programadas[i]['type'] == type && state.programadas[i]['id'] == index){
        state.programadas[i].dias = value;
        var fini = state.programadas[i].fecha_ini.getTime();
        var day = 60 * 60 * 24 * 1000;
        state.programadas[i].fecha_fin = new Date(fini+(day * (value-1)));
      }
    }
    state.component_key++;
  },
  //* Asigna el periodo en "holidays"
  changePeriodoInHolidays(state, [index, value]){
    state.holidays[index]['periodo'] = value;
  },
  //* Asigna el numero de dia (correlativo) en "holidays" 
  changeDiaInHolidays(state, [index, value]){
    state.holidays[index]['dia'] = value;
  },
  //* Asigna el tipo o status ('programada', 'adelantada')
  changeTipoInHolidays(state, [index, value]){
    state.holidays[index]['tipo'] = value;
  },
  //* Ordena "holidays"
  sortHolidays(state){
    state.holidays.sort(function (a, b) {
      var dateA = new Date(a['fecha']);
      var dateB = new Date(b['fecha']);
      return dateA - dateB;      
    });
  },
  //* Inicializa "holidays"
  clearHolidays(state){
    state.holidays = [];
  },
  //* Agrega dia a "holidays"
  addHoliday(state, value) {
    // Solo si no existe previamente
    var filtro = state.holidays.filter(function(a, b){
      return a['fecha'] == b['fecha'];
    });
    if(filtro.length == 0){
      state.holidays.push(value);
    }
  },
  //* Transfiere "horario" a "horarios"
  horario2horarios(state) {
    var semestre = state.semestre;
    for (var i = state.horarios.length - 1; i >= 0; i--) {
      if( state.horarios[i]['semestre'] == semestre ) {
        state.horarios.splice(i,1);
      }
    }
    for (var n = 0; n < state.horario.length; n++) {
      var ndia = state.horario[n][0];
      var cdia = state.semana[ndia-1];
      var turno = state.horario[n][1];
      var obj = {
        semestre: semestre,
        dia: cdia,
        turno: turno,
      }
      state.horarios.push(obj);
    }
  },
  //* Agrega 1 a "component_key"
  component_key(state){ state.component_key = state.component_key+1; },
  //* Asigna los mensajes de consistencia
  messageCheck(state, [type, item, mess]){
    switch(type){
      case 'periodos':
        for ( var x in state.periodos){
          if ( state.periodos[x]['periodo'] == item.periodo ){
            state.periodos[x]['message'] = mess;
          }
        }
        break;
      case 'programadas':
        for ( var x in state.programadas){
          if ( state.programadas[x]['type'] == item.type && state.programadas[x]['id'] == item.id ){
            state.programadas[x]['message'] = mess;
          }
        }
        break;
      case 'horario':
        state.mess_horario[item] = mess;
        break;
    }
  },

  status(state, value){ 
    state.status = value;
    switch (state.status){
      case 'view':
        if(state.confirm == false)
        {
          state.panel.btn.confirmar = false,
          state.panel.btn.editar = false,
          state.panel.btn.grabar = false,
          state.panel.btn.rehacer = false,
          state.panel.data.horario = 'view';
          state.panel.data.periodos = 'view';
          state.panel.data.programadas = 'view';
          state.panel.data.rango = 'view';
        }
        break;
      case 'editable':
        if(state.confirm == true)
        {
          state.panel.btn.confirmar = true,
          state.panel.btn.editar = true,
          state.panel.btn.grabar = false,
          state.panel.btn.rehacer = false,
          state.panel.data.horario = 'view';
          state.panel.data.periodos = 'view';
          state.panel.data.programadas = 'view';
          state.panel.data.rango = 'view';
        }
        break;
      case 'edit':
        if(state.confirm == true)
        {
          state.panel.btn.confirmar = false,
          state.panel.btn.editar = false,
          state.panel.btn.grabar = false,
          state.panel.btn.rehacer = true,
          state.panel.data.horario = 'edit';
          state.panel.data.periodos = 'view';
          state.panel.data.programadas = 'edit';
          state.panel.data.rango = 'edit';
        }
        break;
      case 'upgradeable':
        if(state.confirm == true)
        {
          state.panel.btn.confirmar = false,
          state.panel.btn.editar = false,
          state.panel.btn.grabar = true,
          state.panel.btn.rehacer = true,
          state.panel.data.horario = 'edit';
          state.panel.data.periodos = 'view';
          state.panel.data.programadas = 'edit';
          state.panel.data.rango = 'edit';
        }
        break;
    }
  },

  cdocente(state, value){ state.cdocente = value; },
  docente_id(state, value){ state.docente_id = value; },
  feriados(state, value){
    state.feriados = value;
    for (var i = 0; i < state.feriados.length; i++) {
      var fecha = new Date(state.feriados[i]['fecha']+"T00:00:00");
      state.feriados[i]['fecha'] = fecha;
    }
  },    
  fini(state, value){state.fini = value},
  ffin(state, value){state.ffin = value},    
  semestre(state, value){state.semestre = value},
  semestreVacaciones(state, [index, value]){ state.semestres[index].vacaciones = value },  
  semestreColor(state, [semestre, value]){
    for (var i = 0; i < state.semestres.length; i++) {
      if(state.semestres[i]['semestre'] == semestre){
        state.semestres[i]['color'] = value;
      }
    }
  },
      
  horario(state, value){state.horario = value},    
  periodo(state, [periodo, index, value]){
    for (var i = 0; i < state.periodos.length; i++) {
      if(state.periodos[i]['periodo'] == periodo){
        state.periodos[i][index] = value;
      }
    }
    state.periodo = periodo
  }, 
  //* Inicializa los valores de "periodos"   
  periodos(state, pre_periodos){
    state.periodos = [];
    for (var i = 0; i < pre_periodos.length; i++) {
      var fecha_ini = new Date(pre_periodos[i]['fecha_ini']+"T00:00:00");
      var fecha_fin = new Date(pre_periodos[i]['fecha_fin']+"T00:00:00");
      let item = {
        'id': pre_periodos[i]['id'],
        'periodo': pre_periodos[i]['periodo'],
        'fecha_ini': fecha_ini,
        'fecha_fin': fecha_fin,
        'derechos': 0,
        'ganadas': 0,
        'porganar': 0,
        'gozadas': 0,
        'programadas': 0,
        'porprogramar': 0,
        'adelantadas': 0,
        'message': ''
      };
      state.periodos.push(item);
    }
  },
  derechos(state, value){ state.derechos = value; },
  gozadas(state, gozadas){
    state.gozadas = gozadas; 
    for (var i = gozadas.length - 1; i >= 0; i--) {
      state.gozadas[i]['fecha_ini'] = new Date(gozadas[i]['fecha_ini']+"T00:00:00");
      state.gozadas[i]['fecha_fin'] = new Date(gozadas[i]['fecha_fin']+"T00:00:00");
    }
  },
  programadas(state, programadas){
    state.programadas = programadas; 
    for (var i = 0; i < programadas.length; i++) {
        var fecha_ini = new Date(programadas[i]['fecha_ini']+"T00:00:00");
        var fecha_fin = new Date(programadas[i]['fecha_fin']+"T00:00:00");
        state.programadas[i]['fecha_ini'] = fecha_ini;
        state.programadas[i]['fecha_fin'] = fecha_fin;
        state.programadas[i]['message'] = '';
        state.programadas[i]['eliminar'] = false;
        state.programadas[i]['editFecha'] = false;
        state.programadas[i]['editDias'] = false;
        state.programadas[i]['open'] = true;
        if(fecha_fin < new Date().setHours(0,0,0,0)){
          state.programadas[i]['open'] = false;
        }
     } 
  },
  programada(state, item){
    for (var i = 0; i < state.programadas.length; i++) {
      if(state.programadas[i]['id'] == item.id){
        state.programadas[i]['fecha_ini'] = item.fecha_ini;
        state.programadas[i]['dias'] = item.dias;
        state.programadas[i]['fecha_fin'] = item.fecha_fin;
        state.programadas[i]['message'] = item.message;
      }
    }
  },
  horarios(state, value){ state.horarios = value; },
  schedule(state, [index, subindex, value]){
    if(subindex == ''){
      state.schedule[index] = value;
    }else{
      state.schedule[index][subindex] = value;
    }
  },    
  turno(state, [dia, turno]){
    state.turnos[dia] = turno;
  },
  turno2horario(state, [nDia, turno]){
    for (var item in state.horario) {
      if( state.horario[item][0] == nDia ){
        state.horario[item][1] = turno;
      }
    }
  },
  clearPorDiaWeek(state){
    state.porDiaWeek = [];
  },
  sortPorDiaWeek(state){
    if(state.porDiaWeek.length>0){    
      state.porDiaWeek.sort(function (a, b) {
        return a.getTime() > b.getTime();
      });
    }else{
      return [];
    }
  },
  addPorDiaWeek(state, dia){state.porDiaWeek.push(dia)},    
  clearHoras(state){ state.horas = []; },
  addHoras(state, shora){
    state.horas.push(shora);
  },
  semestres(state, value){ 
    state.check_horario = [];
    state.semestres = value; 
    for (var i = 0; i < state.semestres.length; i++) {
      state.semestres[i]['fecha_ini'] = new Date(state.semestres[i]['fecha_ini']+"T00:00:00");
      state.semestres[i]['fecha_fin'] = new Date(state.semestres[i]['fecha_fin']+"T00:00:00");
      state.semestres[i]['color'] = 'green';
      state.semestres[i]['check'] = [];
    }
  },
  clearProgramadas(state){
    state.programadas=[];
  },
  addProgramadas(state, programado){
    state.programadas.push(programado);
  },
  addPeriodos(state, periodo){
    state.periodos.push(periodo);
  },
  clearVacPorPeriodo(state){
    state.vacPorPeriodo = [];
  },
  clearBtnEdit(state){
    state.status = 'editable';
  },
};