export default {
  parameters: (state) => {
    return state.parameters;
  },
  semestres: (state) => { return state.semestres },
  horarios: (state) => { return state.horarios },
  cdocente: (state) => {
    return state.cdocente;
  },
  docente_id: (state) => {
    return state.docente_id;
  },
  dfecha: (state)=>(sfecha) => {
    if((sfecha) instanceof Date){
      return sfecha;
    }else{
      if(sfecha.substr(2,1)=="/"){
        // dd/mm/yyyy
        // 0123456789
        let dd = sfecha.substring(0,2);
        let mm = (sfecha.substring(3,5))-1;
        let yyyy = sfecha.substring(6,10);
        let yfecha = new Date(yyyy, mm, dd, 0, 0, 0, 0);
        return yfecha;
      }else{
        var yfecha = new Date(sfecha);  
        return yfecha;
      }
    }
  },

  qvacaciones: (state, getters) => ([strini, strfin]) => {
    var fini = getters.dfecha(strini);
    var ffin = getters.dfecha(strfin);
    let dayInMillis = 24 * 60 * 60 * 1000;
    return (ffin-fini)/dayInMillis + 1;
  },

  wdia: (state, getters) => (xfecha) => { 
    if(typeof xfecha === 'undefined'){ return ''; };
    if((xfecha) instanceof Date){
        yfecha = xfecha;
    }else{    
      if((xfecha) instanceof Object){
        yfecha = new Date(xfecha.date);
      }else{
        if(xfecha.substr(2,1)=="/"){
          var yfecha = getters.dfecha(xfecha);
        }else{
          var yfecha = new Date(xfecha);  
        }
      }   
    }
    let diaDeSemana = yfecha.getUTCDay();     
    let cdia = "";
    if(diaDeSemana == 0){
      cdia = "DOM";
    }else{
      cdia = state.semana[diaDeSemana-1];
    }
    return cdia + ' ' + getters.cfecha(yfecha) ;
  },

  cDia: (state) => (nDia) => {
    return state.semana[nDia-1];
  }, // end of cDia()

  nDia: (state) => (dia) => {
    for (var i = 0; i < state.semana.length; i++) {
      if(state.semana[i] == dia){
        return i+1;
      }
    }
  }, // end of nDia()

  cfecha: (state) => (xfecha) => {
    if((xfecha) instanceof Date){
      var yfecha = xfecha;
    }else{
      if(xfecha.substr(2,1)=="/"){
        var zfecha = xfecha;
      }else{
        var yfecha = new Date(xfecha);  
      }
    }
    if((yfecha) instanceof Date){
      let d = yfecha.getDate();
      let dd = (d < 10 ? '0' : '').concat(d);
      let m = yfecha.getMonth()+1;
      let mm = (m < 10 ? '0' : '').concat(m);
      let yyyy = yfecha.getFullYear();
      zfecha = dd + '/' + mm + '/' + yyyy
    }
    return zfecha;
  },

  view: (state) => (hora, dia) => {
    let text = ""
    if(typeof state.schedule[hora] != "undefined"){
      if(typeof state.schedule[hora][dia] != "undefined"){
        text = state.schedule[hora][dia];
      }
    }
    return text;
  }, // end of view()

  wturno: (state) => (turno) => {
    switch(turno){
      case 'dia': return 'Diurno';
      case 'noche': return 'Nocturno';
      case 'vacaciones': return 'Vacaciones';
      case 'libre': return 'Libre';
    }
  },
};
