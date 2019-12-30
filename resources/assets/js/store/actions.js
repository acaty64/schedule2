export default {
  saveData (context) {
    var url = context.state.protocol+'//'+context.state.URLdomain+'/api/schedule/save/';
    var request = {
      'docente': context.state.docente,
      'programadas': context.state.programadas,
      'horarios': context.state.horarios,
      'semestres': context.state.semestres,
      'fini': context.state.fini,
      'ffin': context.state.ffin
    };
    axios.post(url, request).then(response=>{
      return {'success': response.data};
    }).catch(function (error) {
        console.log(error);
    });    
  },
  //* Consistencia global
  setCheckMain (context) {
    var check_main = [];
      // Horarios
    for( var s in context.state.semestres ){
      if(context.state.semestres[s]['color'] == 'red'){
        check_main.push("Verifique los mensajes en el panel HORARIOS.");
        break;
      }
    }
      // Programadas
    for( var q in context.state.programadas ){
      if(context.state.programadas[q]['message'] != ""){
        check_main.push("Verifique los mensajes en el panel VACACIONES PROGRAMADAS.");
        break;
      }
    }
      // Periodos
    for( var p in context.state.periodos ){
      if(context.state.periodos[p]['message'] != ""){
        check_main.push("Verifique los mensajes en el panel PERIODOS");
        break;
      }
    }
    context.commit('check_main', check_main);
  },
    //* Consistencia de horarios todos los semestres
  async setCheckSemestres (context) {
    for ( var i in context.state.semestres ){
      var semestre = context.state.semestres[i]['semestre'];
        await context.dispatch('consistencia_horario', semestre);
    }
    return true;
  },
    //* Transfiere "horario" a "horarios" //
  horario2horarios: (context) => {
    context.commit('horario2horarios');
  },
    //* Consistencia_programadas
  async consistencia_programadas (context) {
    for (var i = 0; i < context.state.programadas.length; i++) {
      var item = context.state.programadas[i];
      let mess_prog = await context.dispatch('check_programadas', item);
      context.commit('messageCheck', ['programadas', item,  mess_prog[1]]);
    }
  },
    //* Consistencia (periodo, programada u horario)
  async consistencia_periodos (context) {
    for(var i in context.state.periodos){
      var check = [];
      var item = context.state.periodos[i];
      let mess1 = await context.dispatch('check_periodos1', item);
      if(!mess1[0]){
        check.push(mess1[1]);
      }
      let mess2 = await context.dispatch('check_periodos2', item);
      if(!mess2[0]){
        check.push(mess2[1]);
      }
      let mess3 = await context.dispatch('check_periodos3', item);
      if(!mess3[0]){
        check.push(mess3[1]);
      }
      context.commit('messageCheck', ['periodos', item,  check]);
    }
  }, // end of consistencia_periodos()
    //* Consistencia_horario
  async consistencia_horario (context, semestre) {
    let check1 = false, check2 = false, check3 = false;
    let mess_hora1 = await context.dispatch('check_horario1', semestre);
    await context.commit('messageCheck', ['horario', 0,  mess_hora1[1]]);
    let mess_hora2 = await context.dispatch('check_horario2', semestre);
    await context.commit('messageCheck', ['horario', 1,  mess_hora2[1]]);
    let mess_hora3 = await context.dispatch('check_horario3', semestre);
    await context.commit('messageCheck', ['horario', 2,  mess_hora3[1]]);
    check1 = mess_hora1[0];
    check2 = mess_hora2[0];
    check3 = mess_hora3[0];
    let check_semestre = {
      semestre: semestre,
      check1: check1,
      check2: check2,
      check3: check3
    }
    await context.commit('check_semestre', check_semestre);
    let color = '';
    if( check1 && check2 && check3){
      color = 'green';
    }else{
      color = 'red';
    }
    await context.commit('semestreColor',[semestre, color]);
    await context.commit('component_key');              
    return [check_semestre, color];
  }, // end of consistencia_horario()
    //* Funcion de verificacion de periodo
  check_periodos1: (context, item) => {
    // TODO: Se ha modificado por AQUISSE (vacaciones adelantadas previamente)
    let periodo = item.periodo;
    let fecha_ini = item.fecha_ini;
    let periodo1 = periodo.substring(0,4);
    let periodo2 = periodo.substring(5,9);
    let limite = new Date(periodo2,0,1);
    if( fecha_ini < limite ){
      return [true, ''];
      // return [false, 'La fecha de inicio debe ser mayor o igual a: ' + context.getters.cfecha(limite)];
    }else{
      return [true, ''];
    }
  },
  check_periodos2: (context, item) => {
      return [true, ''];
    // TODO: Se ha eliminado la consistencia de exceso de vacaciones adelantadas
    // if( item.adelantadas > 7){
    //   return [false, 'La programación de vacaciones adelantadas debe ser menor o igual a 7.'];
    // }else{
    //   return [true, ''];
    // }
  },
  check_periodos3: (context, item) => {
    if(item.porprogramar < 0 || item.porprogramar > 7){
      return [false, 'Las vacaciones por programar deben ser entre 0 a 7.'];
    }else{
      return [true, ''];
    }
  },
  check_programadas: (context, item) => {
    var fini = item.fecha_ini;
    var ffin = item.fecha_fin;
    var message = [];
    for (var i in context.state.programadas) {
      var check = context.state.programadas[i];
      if(item.type != check['type'] || item.id != check['id']){
        var fecha_ini = check['fecha_ini'];
        var fecha_fin = check['fecha_fin'];
        if(fini>=check['fecha_ini'] && fini<=check['fecha_fin']){
          var mess = 'La fecha inicial debe estar fuera del rango: ['+
                      context.getters.wdia(check['fecha_ini'])+", "+
                      context.getters.wdia(check['fecha_fin'])+"]";
          message.push(mess);
        }
        if(ffin>=check['fecha_ini'] && ffin<=check['fecha_fin']){
          var mess = 'La fecha final debe estar fuera del rango: ['+
                      context.getters.wdia(check['fecha_ini'])+", "+
                      context.getters.wdia(check['fecha_fin'])+"]";
          message.push(mess);
        }
      }
    }
    if(message.length == 0 ){
      return [true, ''];
    }else{
      return [false, message];
    }
  },
  //* Funcion de verificacion de horario 1
  check_horario1: (context, semestre) => {
    // cantidad de dias requeridos
    var check = 0;
    var filtro = context.state.horarios.filter(function(value){
      return value['semestre'] == semestre;
    });
    var turnos = filtro.filter(function(value){
      return value['turno'] != 'libre';
    });
    check = turnos.length;

    if( check < context.state.parameters.horario.qdias ){
      return [false, 'Debe seleccionar turno en ' + context.state.parameters.horario.qdias + ' días.'];
    }else{
      if( check > context.state.parameters.horario.qdias ){
        return [false, 'Debe seleccionar turno en solo ' + context.state.parameters.horario.qdias + ' días.'];
      }else{
        return [true, ''];      
      }
    }
  },
  //* Funcion de verificacion de horario 2
  check_horario2: (context, semestre) => {
    // cantidad de turnos nocturnos requeridos
    var check = 0;
    var filtro = context.state.horarios.filter(function(value){
      return value['semestre'] == semestre;
    });
    var turnos = filtro.filter(function(value){
      return value['turno'] == 'noche';
    });
    check = turnos.length;
    if( check < context.state.parameters.horario.noches ){
      return [false, 'Debe seleccionar por lo menos ' + context.state.parameters.horario.noches + ' turnos noche.'];
    }else{
      return [true, ''];      
    }
  },
  //* Funcion de verificacion de horario 3
  check_horario3: (context, semestre) => {
    // Turnos de sabados disponibles
    var check = false;
    var filtro = context.state.horarios.filter(function(value){
      return value['semestre'] == semestre && value['dia'] == 'SAB';
    });
    if(filtro.length>0){
      var turno = filtro[0]['turno'];
    // var turno = context.state.turnos['SAB'];
      for (var i = 0; i < context.state.parameters.turnos_sab.length; i++) {
        if(context.state.parameters.turnos_sab[i] == turno){
          check = true;
        }
      }
      if( !check ){
        return [false, 'El turno ' + turno + ' no está disponible los sábados.'];
      }else{
        return [true, ''];      
      }
    }else{
        return [true, ''];
    }
  },
  //* Recall datos
  restoreData: (context, docente_id) => {
    context.dispatch('getData', docente_id);
    context.commit('clearBtnEdit');
  },
  //* Transfiere "derechos" a "periodos"
  derechos2periodos: (context) => {
    for (var i = 0; i < context.state.derechos.length; i++) {
      let periodo = context.state.derechos[i].periodo;
      let value = context.state.derechos[i].dias;
      context.commit('periodo',[periodo, 'derechos', value]);
    }
  },  // end derechos2periodos()
  //* Calcula porDiaWeek (ordenado) Vacaciones definidas por dia de semana en horario
  calcVacPorDiaWeek: (context) => { // Agrega a porDiaWeek las vacaciones por dia de semana
    let dias_laborables = [];
    let ini = new Date(context.state.fini);
    let fin = new Date(context.state.ffin);
    for (var i = ini; i <= fin; i.setDate(i.getDate()+1)) {
      dias_laborables.push(new Date(i));
    }
    // Descuenta las vacaciones programadas por rango
    for (var i = 0; i < context.state.programadas.length; i++) {
      let ini = new Date(context.state.programadas[i].fecha_ini);
      let fin = new Date(context.state.programadas[i].fecha_fin);
      for (var d = ini; d <= fin; d.setDate(d.getDate()+1)) {
        for (var f = 0; f < dias_laborables.length; f++) {
          if(dias_laborables[f].getTime() == d.getTime()){
            dias_laborables.splice(f,1);
          }
        }
      }
    }
    // Descuenta los feriados
    for (var f = 0; f < context.state.feriados.length; f++) {
      let feriado = context.state.feriados[f].fecha;
      for (var i = 0; i < dias_laborables.length; i++) {
        let d = dias_laborables[i];
        if(feriado.getTime() === new Date(d).getTime()){
          dias_laborables.splice(i,1);
        }
      }
    }
    // Filtra los dias_laborables por semestre
    for (var x in context.state.semestres) { 
      var xsemestre = context.state.semestres[x]['semestre'];
      var semestre_ini = context.state.semestres[x]['fecha_ini'].getTime();
      var semestre_fin = context.state.semestres[x]['fecha_fin'].getTime();
      let rangoDias = dias_laborables.filter(function (value) {
        return value.getTime() >= semestre_ini && value.getTime() <= semestre_fin;
      }); 
      var turnoVacaciones = context.state.horarios.filter(function (value){
        return value['semestre'] == xsemestre && value['turno'] == 'vacaciones';
      });
      for (var i = 0; i < turnoVacaciones.length; i++) {
        var xdia = context.getters.nDia(turnoVacaciones[i]['dia']);
        var filtro = rangoDias.filter(function (value) {
          return value.getDay() == xdia;
        });
        for (var j = 0; j < filtro.length; j++) {
          context.commit('addPorDiaWeek', filtro[j]);              
        }
      }
    }
    context.commit('sortPorDiaWeek');
  }, // end of vacPorDiaWeek()
  //* Calcula Vacaciones[ganadas, porganar, programadas, adelantadas] y asigna a "periodos"
  calcVacPorPeriodo: (context) => {
    // for periodo in periodos
    for ( var p in context.state.periodos ){
      let periodo = context.state.periodos[p]['periodo'];
      let periodoIniY = periodo.substring(0,4);
      let periodoFinY = periodo.substring(5,9);

      // calcular ganadas y porganar
      let hoy = new Date();
      let dd_ = hoy.getDay();
      let mm_ = hoy.getMonth();
      let yyyy_ = hoy.getFullYear();

      let fini = new Date(context.state.periodos[p]['fecha_ini']);
      let iniD = fini.getDay();
      let iniM = fini.getMonth();
      let iniY = periodoIniY;
      let iniP = new Date(iniY, iniM, iniD);
      // let iniY = fini.getFullYear();

      let ffin = new Date(context.state.periodos[p]['fecha_fin']);
      let finD = fini.getDay();
      let finM = fini.getMonth();
      let finY = periodoFinY;
      let finP = new Date(finY, finM, finD);

      let derechos = context.state.periodos[p]['derechos'] 
      let ganadas = derechos;
      let porganar = 0;
      if ( iniP.getTime() <= hoy.getTime() && hoy.getTime() <= finP.getTime() ) {
        let qm = mm_ - iniM;
        if ( qm < 0 ){
          qm = qm + 12;
        }
        qm = qm + 1;
        ganadas = derechos/12 * qm;
        porganar = derechos - ganadas;
      }
      context.commit('periodo', [periodo, 'ganadas', ganadas]);
      context.commit('periodo', [periodo, 'porganar', porganar]);
      // calculo de gozadas
      // calculo de programadas
      // calculo de adelantadas
      // calculo de porprogramar
      var gozadas = 0;
      var programadas = 0;
      var adelantadas = 0;
      var porprogramar = 0;
      for ( var h in context.state.holidays ) {
        if ( context.state.holidays[h]['periodo'] == periodo ){
          switch (context.state.holidays[h]['tipo']){
            case 'gozada':
              ++gozadas;
              break;
            case 'programada':
              ++programadas;
              break;
            case 'adelantada':
              ++adelantadas;
              break;
          }
        }
      }
      context.commit('periodo', [periodo, 'gozadas', gozadas]);
      context.commit('periodo', [periodo, 'programadas', programadas]);
      context.commit('periodo', [periodo, 'adelantadas', adelantadas]);
      // Adelantadas del periodo anterior
      let adelantadasOld = 0;
      if( p > 0){
        let adelantadasOld = context.state.periodos[p-1]['adelantadas'];
      }
      if ( derechos > gozadas + programadas + adelantadasOld ){
        porprogramar = derechos - gozadas - programadas - adelantadas ;
      }
      context.commit('periodo', [periodo, 'porprogramar', porprogramar]);

    }
  }, // end of calcVacPorPeriodo()
  //* Proceso de calculo de vacaciones
  calculoVacaciones: (context) => { // Calcula vacaciones
    context.commit('clearPorDiaWeek');
    var check1 = context.dispatch('calcVacPorDiaWeek');
    check1.then(function (value) {
      context.commit('clearVacPorPeriodo');
      var check2 = context.dispatch('derechos2periodos');
      check2.then(function (value) {
        context.commit('clearHolidays');
        var check3 = context.dispatch('addGozadas2Holidays');
        check3.then(function (value) {
          var check4 = context.dispatch('addProgramadas2Holidays');
          check4.then(function (value) {
            context.commit('sortHolidays');
            var check5 = context.dispatch('periodo2holidays');
            check5.then(function (value) {
                context.dispatch('calcVacPorPeriodo');
            });
          });
        });
      });
    });
  }, // end of calculoVacaciones()
  //* Determina 'periodo' en "holidays"
  periodo2holidays(context){
    for (var per in context.state.periodos) {
      let periodo = context.state.periodos[per]['periodo'];
      let fini = new Date(context.state.periodos[per]['fecha_ini']);
      let ffin = new Date(context.state.periodos[per]['fecha_fin']);
      for (var index in context.state.holidays) {
        let day = new Date(context.state.holidays[index]['fecha']);
        if( fini <= day && day <= ffin){
          context.commit('changePeriodoInHolidays', [index, periodo]);
        }
        // else{
        //   console.log('periodo2holidays false:', [
        //               'index:', index, 
        //               'periodo:' , periodo, 
        //               'day:' , day]);
        // }
      }
      // calcular dia en holidays
      var dia = 0;
      var derechos = context.state.periodos[per]['derechos'];
      for ( var h in context.state.holidays ){
        // if ( periodo == context.state.holidays[h]['periodo'] && context.state.holidays[h]['tipo'] == ''){
        if ( periodo == context.state.holidays[h]['periodo']){
          context.commit('changeDiaInHolidays', [h, ++dia]);
          if ( dia > derechos ){
            context.commit('changeTipoInHolidays', [h, 'adelantada']);
            context.commit('changePeriodoInHolidays', [h, periodo]);

            // var nextPeriodo = '';
            // if ( per < context.state.periodos.length - 1 ){
            //   var newIndex = parseInt(per) + 1;              
            //   nextPeriodo = context.state.periodos[newIndex]['periodo'];
            // }
            // context.commit('changePeriodoInHolidays', [h, nextPeriodo]);
          }else{
    // Cuando es programada y cuando gozada ???
    //            context.commit('changeTipoInHolidays', [h, 'programada']);
            var today = new Date();
            today.setHours(0,0,0);
            if(context.state.holidays[h]['fecha'] <= today){
              context.commit('changeTipoInHolidays', [h, 'gozada']);
            }
          }
        }
      }
    }
  }, // end of periodo2Holidays()
  //* Agrega las vacaciones gozadas a "holidays"
  addGozadas2Holidays(context){  // agrega las gozadas programadas
    for (var item in context.state.gozadas) {
      let fini = context.state.gozadas[item]['fecha_ini'].getTime();
      let ffin = context.state.gozadas[item]['fecha_fin'].getTime();
      let dayInMillis = 24 * 60 * 60 * 1000;

      let qdias = ((ffin-fini)/dayInMillis)+1;
      for (var i = 0; i < qdias ; i++) {
        let obj = {
          fecha: new Date(fini+(i*dayInMillis)),
          periodo: '',
          dia: 0,
          tipo: 'gozada'
        }
        context.commit('addHoliday', obj);
      }      
    }
  }, // end addGozadas2Holidays()
  //* Agrega las vacaciones programadas a "holidays"
  addProgramadas2Holidays(context){  // agrega las vacaciones programadas
    for (var prog in context.state.programadas) {
      let fini = context.state.programadas[prog]['fecha_ini'].getTime();
      let ffin = context.state.programadas[prog]['fecha_fin'].getTime();
      let dayInMillis = 24 * 60 * 60 * 1000;

      let qdias = ((ffin-fini)/dayInMillis)+1;
      for (var i = 0; i < qdias ; i++) {
        let obj = {
          fecha: new Date(fini+(i*dayInMillis)),
          periodo: '',
          dia: 0,
          tipo: 'programada'
        }
        context.commit('addHoliday', obj);
      }      
    }
    for (var dia in context.state.porDiaWeek){
      let obj = {
        fecha: context.state.porDiaWeek[dia],
        periodo: '',
        tipo: 'programada'       
      }
      context.commit('addHoliday', obj);
    }
  }, // end addProgramadas2Holidays()
  //* LLena los datos de "horario" a "schedule"
  fillSchedule: (context) => { // Llenar con datos de horario
    let horario = context.state.horario;
    for (var franja = 0; franja < horario.length; franja++) {
      let xdia = context.getters.cDia(horario[franja][0]);
      let xturno = horario[franja][1];
      for (var i = 0; i < context.state.horas.length; i++) {
        context.commit('schedule', [context.state.horas[i], xdia, '']);
      }
      if(xturno == 'dia'){
        for (var i = 0; i < context.state.turno_dia.length; i++) {
          context.commit('schedule', [context.state.turno_dia[i][0], xdia, context.state.turno_dia[i][1]]);
        }
      }
      if(xturno == 'noche'){
        for (var i = 0; i < context.state.turno_noche.length; i++) {
          context.commit('schedule', [context.state.turno_noche[i][0], xdia, context.state.turno_noche[i][1]]);
        }
      }
      if(xturno == 'vacaciones'){
        for (var i = 0; i < context.state.turno_vacaciones.length; i++) {
          context.commit('schedule', [context.state.turno_vacaciones[i][0], xdia, context.state.turno_vacaciones[i][1]]);
        }
      }
    }
  }, // end of fillSchedule()
  //* Agrega "horas" a "schedule"
  setSchedule: (context) => { // Agrega horas a schedule
    for (var hora = 0; hora < context.state.horas.length; hora++) {
      context.commit('schedule', [context.state.horas[hora], '', {}]);
      for (var dia = 0; dia < context.state.semana.length; dia++) {
        context.commit('schedule', [context.state.horas[hora], context.state.semana[dia], '']);
      }
    }
  },  // end of getSchedule()
  //* Inicializa "horario" segun "semestre"
  setHorario: (context) => {
    var semestre = context.state.semestre; 
    var horario_data = [];
    for (var i = 0; i < context.state.horarios.length; i++) {
      if(context.state.horarios[i]['semestre'] == semestre ){
        var cDia = context.state.horarios[i]['dia'];
        var nDia = context.getters.nDia(cDia);
        horario_data.push([
          nDia ,
          context.state.horarios[i]['turno']
        ]);
      }
    }
    for (var n = 1; n < 7; n++) {
      var check = false;
      for (var i = 0; i < horario_data.length; i++) {
        if(horario_data[i][0] == n){
          check = true;
        }
      }
      if(check == false){
        horario_data.push([ n, 'libre' ]);
      }
    }
    context.commit( 'horario', horario_data );
    return true;
  },  // end of setHorario()
  //* Inicializa "turnos" segun "horario"
  setTurnos: (context) => {
    for (var i = 0; i < context.state.horario.length; i++) {
      let dia = context.getters.cDia(context.state.horario[i][0]);
      let turno = context.state.horario[i][1];
      context.commit('turno',[dia, turno]);
    }
  },
  //* Transfiere "turnos" a "horario"
  turnos2horario: (context) => {
    for(var value in Object.keys(context.state.turnos)){
      let cDia = Object.keys(context.state.turnos)[value];
      let nDia = context.getters.nDia(cDia);
      let turno = context.state.turnos[cDia];
      let check = false;
      context.commit('turno2horario',[nDia, turno]);
    }
  },  // end of turnos2horario_in
  //* Inicializa "semestre"
  setSemestre: (context, semestre) => { 
    context.commit('semestre', semestre);
    return true;
  }, // end of setSemestre()
  //* Setea fini y ffin
  setDateLimit: (context) => {
    var fi = '';
    var ff = '';
    for(var value in context.state.periodos){
      // var fini = context.getters.dfecha(context.state.periodos[value].fecha_ini);
      var fini = context.state.periodos[value].fecha_ini;
      // var ffin = context.getters.dfecha(context.state.periodos[value].fecha_fin);
      var ffin = context.state.periodos[value].fecha_fin;
      fini = new Date(fini);
      ffin = new Date(ffin);
      if(fi == ''){
        fi = fini;
      }else{
        if(fini < fi){
          fi = fini;
        }
      }
      if(ff == ''){
        ff = ffin;
      }else{
        if(ffin > ff){
          ff = ffin;
        }
      }
    }
    context.commit('fini', fi);
    context.commit('ffin', ff);           
    return true;
  }, // end of setDateLimit
  //* Proceso de cambio de semestre
  changeSemestre: (context, semestre) => {  // Setea los datos segun el semestre
    var check = context.dispatch('setSemestre', semestre);
    check.then(function(value){
      context.dispatch('setHorario');
      context.dispatch('setTurnos');
      context.dispatch('setSchedule');
      context.dispatch('fillSchedule');
      var check1 = context.dispatch('calculoVacaciones');
      check1.then(function(value){
        var check2 = context.dispatch('consistencia_horario', semestre);
        check2.then(function(value){
          var check3 = context.dispatch('consistencia_periodos');
          check3.then(function(value){
            var check4 = context.dispatch('consistencia_programadas');
            check4.then(function(value){
              var check5 = context.dispatch('setCheckMain');
              check5.then(function(value){
                context.commit('component_key');
              });
            });
          });
        });
      });
    });
  }, // end of changeSemestre()
  //* Setea las horas del schedule
  async getHoras (context) { 
    await context.commit('clearHoras');
    let hIni = context.state.ini.substring(0,2);
    let mIni = context.state.ini.substring(3,5);

    let i = new Date();
    i.setHours(hIni);
    i.setMinutes(mIni);
    let hFin = context.state.fin.substring(0,2);
    let mFin = context.state.fin.substring(3,5);
    let f = new Date();
    f.setHours(hFin);
    f.setMinutes(mFin);
    let hora = i;
    let n = 0;
    do {
      // De:
      let h = hora.getHours();
      let m = hora.getMinutes();
      if (h<10) {
        h='0'+h;
      }
      if (m<10) {
        m='0'+m;
      }
      let sHora = h + ':' + m; 
      // A:
      hora.setMinutes(hora.getMinutes() + 60);

      h = hora.getHours();
      m = hora.getMinutes();
      if (h<10) {
        h='0'+h;
      }
      if (m<10) {
        m='0'+m;
      }
      sHora = sHora + '-' + h + ':' + m; 

      await context.commit('addHoras', sHora);
    }
    while (hora < f);
  }, // end of getHoras()
  async initialData(context, data){
      await context.commit('parameters', data.parameters);
      await context.commit('editable', data.editable);
      await context.commit('tmail_id', data.tmail_id);
      await context.commit('docente', data.docente);
      await context.commit('semestre', data.semestre);
      await context.commit('feriados', data.feriados);        
      await context.commit('periodos', data.periodos);        
      await context.commit('gozadas', data.gozadas);
      await context.commit('programadas', data.programadas);
      await context.commit('horarios', data.horarios);
      await context.commit('semestres', data.semestres);
      await context.commit('derechos', data.derechos);
      await context.dispatch('getHoras');
      await context.dispatch('setDateLimit');
      await context.dispatch('setCheckSemestres');
  },
  //* Obtiene informacion de "/api/schedule/data/"+docente_id
  getData: (context, docente_id) => {   // Obtiene la Data del backend
    var url = context.state.protocol+'//'+context.state.URLdomain+'/api/schedule/data/'+docente_id;
    axios.get(url).then(response=>{
    // console.log('getData: ', response.data);
        let check = context.dispatch('initialData', response.data);
        check.then(function (value){
          context.dispatch('changeSemestre', response.data.semestre);
          return {'success': true};
      });
    }).catch(function (error) {
        console.log(error);
    });
  }, // end of getData()
  //* Setea el codigo del docente
  setCodDoc: (context, cdocente) => {  
    context.commit('cdocente', cdocente);
  }, // end of setCodDoc()
  //* Setea el id del docente
  setDocenteId: (context, docente_id) => {
    context.commit('docente_id', docente_id);
  }, // end of setDocenteId()
};