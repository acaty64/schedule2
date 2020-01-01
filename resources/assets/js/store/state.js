import Datepicker from 'vuejs-datepicker';
import {es} from 'vuejs-datepicker/dist/locale';

export default {
	docente_id: 0,
	// editable: false,
	tmail_id: false,
	confirm: false,
	check_main: [],
	holidays: [],
	component_key: 0,
	mess_horario: ['','', ''],
	// parameters: {
	// 	horario: { qdias: 5, noches: 3 }, 
	// 	turnos_sab: ['noche', 'vacaciones', 'none'] 
	// },
	parameters: '',
	status: '',
	cdocente: '',
	docente: {},
	periodos: [],
	gozadas: {},
	programadas: {},
	semestres: [],
	derechos: [],
	ganadas: [],
	feriados: [],
	vacPorPeriodo: [],
	fini: '',
	ffin: '',
	porDiaWeek: [],
	horario: [],
	horarios: [],
	URLdomain: window.location.host,
	protocol: window.location.protocol,
	es: es,   // vuejs-datepicker
	semestre: '',
	// semestre: '2019-2',
	panel: {
		btn: {
			// agregar_p: false,
		  confirmar: false,
		  editar: false,
		  grabar: false,
		  rehacer: false
		},
		data: {
		  periodos: 'view',
		  programadas: 'view',
		  rango: 'view',
		  horario: 'view'
		},
	},
	btn_prog: {
		agregar: false,
	},
	vacaciones_in: {
	  periodos: [
	    {periodo: '2018-2019', fecha_ini: '01/07/2019', fecha_fin: '30/06/2020', ganadas: 30, id: 1},
	    {periodo: '2019-2020', fecha_ini: '01/07/2020', fecha_fin: '30/06/2021', ganadas: 60, id: 2},
	  ],
	  programadas: [
	    ['15/07/2019', '13/08/2019', 1],
	    ['15/12/2019', '13/01/2020', 2],
	  ],
	},
	message: "",
	turnos: {
	  'LUN': 'none',
	  'MAR': 'none',
	  'MIE': 'none',
	  'JUE': 'none',
	  'VIE': 'none',
	  'SAB': 'none',
	},
	ini: '08:30',
	fin: '22:30',
	franjas: {
	  'LUN': ['dia', 'noche', 'none', 'vacaciones'],
	  'MAR': ['dia', 'noche', 'none', 'vacaciones'],
	  'MIE': ['dia', 'noche', 'none', 'vacaciones'],
	  'JUE': ['dia', 'noche', 'none', 'vacaciones'],
	  'VIE': ['dia', 'noche', 'none', 'vacaciones'],
	  'SAB': ['noche', 'none', 'vacaciones'],          
	},
	horas: [],
	schedule: {},
	semana: [
	  'LUN', 
	  'MAR', 
	  'MIE', 
	  'JUE', 
	  'VIE', 
	  'SAB'
	],
	turno_dia: [
	  ['08:30-09:30', 'activo'],
	  ['09:30-10:30', 'activo'],
	  ['10:30-11:30', 'activo'],
	  ['11:30-12:30', 'activo'],
	  ['12:30-13:30', 'activo'],
	  ['13:30-14:30', 'descanso'],
	  ['14:30-15:30', 'activo'],
	  ['15:30-16:30', 'activo'],
	  ['16:30-17:30', 'activo'],
	],
	turno_noche: [
	  ['13:30-14:30', 'activo'],
	  ['14:30-15:30', 'activo'],
	  ['15:30-16:30', 'activo'],
	  ['16:30-17:30', 'descanso'],
	  ['17:30-18:30', 'activo'],
	  ['18:30-19:30', 'activo'],
	  ['19:30-20:30', 'activo'],
	  ['20:30-21:30', 'activo'],
	  ['21:30-22:30', 'activo'],
	],
	turno_vacaciones: [
	  ['08:30-09:30', 'activo'],
	  ['09:30-10:30', 'activo'],
	  ['10:30-11:30', 'activo'],
	  ['11:30-12:30', 'activo'],
	  ['12:30-13:30', 'activo'],
	  ['13:30-14:30', 'descanso'],
	  ['14:30-15:30', 'activo'],
	  ['15:30-16:30', 'activo'],
	  ['16:30-17:30', 'activo'],
	],
};