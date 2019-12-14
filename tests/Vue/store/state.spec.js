import state from '@/store/state'
import Datepicker from 'vuejs-datepicker';
import {es} from 'vuejs-datepicker/dist/locale';

describe('store state', () => {

	test('default state is correct', () => {
		expect(state).toEqual({
			docente_id: 0,
			check_main: [],
			component_key: 0,
			mess_horario: ['','',''],
			parameters: '',			
			status: 'view',
			docente: {},
			cdocente: '',
			URLdomain: window.location.host,
			protocol: window.location.protocol,
			es: es,   // vuejs-datepicker
			semestre: '',
			semestres: [],
			horario: [],
			horarios: [],
			gozadas: {},
			programadas: {},
			derechos: [],
			ganadas: [],
			holidays: [],
			panel: {
				'btn': {
				  rango: 'view',
				  periodos: 'view',
				  programadas: 'view',
				  horario: 'view'
				},
				'data': {
				  rango: 'view',
				  periodos: 'view',
				  programadas: 'view',
				  horario: 'view'
				},
			},
			periodos: [],
			ganadas: [],
			vacaciones_in: {
			  periodos: [
			    {periodo: '2018-2019', fecha_ini: '01/07/2019', fecha_fin: '30/06/2020', ganadas: 30, id: 1},
			    {periodo: '2019-2020', fecha_ini: '01/07/2020', fecha_fin: '30/06/2021', ganadas: 60, id: 2},
			  ],
			  programadas: [
			    ['15/07/2019', '13/08/2019',1],
			    ['15/12/2019', '13/01/2020',2],
			  ],
			},
			vacPorPeriodo: [],
			fini: '',
			ffin: '',
			porDiaWeek: [],
			feriados: [],
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

		});
	});

});