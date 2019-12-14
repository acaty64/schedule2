import mutations from '@/store/mutations'

describe('store mutations', () => {

	test('addNewProgramada change value', () => {
		const state = {
			programadas: []
		};
		mutations.addNewProgramada(state, [1,2,3]);
		expect(state.programadas).toEqual([[1,2,3]]);		
	});

	test('check_semestre change value', () => {
		const state = {
			semestres:[ 
				{
					semestre: '2019-1',
					check: []
				},
			],
		};
		const item = {
			semestre: '2019-1',
			check1: true,
			check2: false,
			check3: false
		};
		mutations.check_semestre(state, item);
		expect(state.semestres).toEqual(
			[{ semestre: '2019-1', check: [true, false, false]}]
		);		
	});

	test('cdocente change value', () => {
		const state = {
			cdocente: ''
		};
		mutations.cdocente(state, '000000');
		expect(state.cdocente).toBe('000000');		
	});

	// test('changeDiasInProgramada change value', () => {
	// 	const state = {
	// 		programadas: [
	// 			{ 
	// 				fecha_ini: '05/05/2000' ,
	// 				fecha_fin: '31/12/2000' ,
	// 				id: 1 ,
	// 				type: 'fixed'
	// 			},
	// 		]
	// 	};		
	// 	mutations.changeDiasInProgramada(state, ['fixed', 1, 10]);
	// 	expect(state.programadas).toEqual(
	// 			[
	// 				{ 
	// 					fecha_ini: new Date(2000,5,5) ,
	// 					fecha_fin: new Date(2000,5,10) ,
	// 					id: 1 ,
	// 					type: 'fixed'
	// 				},
	// 			]
	// 		);		
	// });

	test('programadas change value', () => {
		let state = { programadas: [] };
		let values = {
			programadas: [
				{ 
					fecha_ini: '05/05/2000' ,
					fecha_fin: '31/12/2000' 
				},
			]
		};
		mutations.programadas(state, values);
		expect(state.programadas).toEqual(
				values
			);		
	});

	test('set value in schedule in index order', () => {
		const state = {
			schedule: {},
			horas: [
				'08:00-08:30',
				'08:30-09:00',
			],
		};
		let index = '08:00-08:30';
		let subindex = '';
		let value = {};
		mutations.schedule(state, [index, subindex, value]);
		expect(state.schedule).toEqual({ '08:00-08:30': {}
					});		
	});

	test('change value in schedule in subindex order', () => {
		const state = {
			schedule: {
				'08:00-08:30': {},
				'08:30-09:00': {},
			}
		};
		let index = '08:30-09:00';
		let subindex = 'MAR';
		let value = 'new data';
		mutations.schedule(state, [index, subindex, value]);
		expect(state.schedule).toEqual({
				'08:00-08:30': {},
				'08:30-09:00': {'MAR':'new data'},
			});		
	});

	// test('change value in schedule subindex order', () => {
	// 	const state = {
	// 		schedule: {
	// 			'08:00-08:30': ['first data', 'data 1.1'],
	// 			'08:30-09:00': ['second data', 'data 2.1'],
	// 		}
	// 	};
	// 	let index = '08:30-09:00';
	// 	let subindex = 1;
	// 	let value = 'new data';
	// 	mutations.schedule(state, [index, subindex, value]);
	// 	expect(state.schedule).toEqual({
	// 			'08:00-08:30': ['first data', 'data 1.1'],
	// 			'08:30-09:00': ['second data', 'new data'],
	// 		});		
	// });

	test('change value in turnos', () => {
		const state = {
			turnos: {
			  'LUN': 'none',
			  'MAR': 'none',
			  'MIE': 'none',
			  'JUE': 'none',
			  'VIE': 'none',
			  'SAB': 'none',
			},
		};
		mutations.turno(state, ['SAB', 'diurno']);
		expect(state.turnos).toEqual({
			  'LUN': 'none',
			  'MAR': 'none',
			  'MIE': 'none',
			  'JUE': 'none',
			  'VIE': 'none',
			  'SAB': 'diurno',
			});		
	});

	test('sort porDiaWeek array', () => {
		const state = {
			porDiaWeek: [
			  new Date(2019,1,5),
			  new Date(2019,1,1),
			  new Date(2019,1,2),
			  new Date(2019,1,3),
			  new Date(2019,1,4),
			],
		};
		mutations.sortPorDiaWeek(state);
		expect(state.porDiaWeek).toEqual([
			  new Date(2019,1,1),
			  new Date(2019,1,2),
			  new Date(2019,1,3),
			  new Date(2019,1,4),
			  new Date(2019,1,5),
			]);		
	});

	test('add a date in porDiaWeek array', () => {
		const state = {
			porDiaWeek: [
			  new Date(2019,1,1),
			  new Date(2019,1,2),
			  new Date(2019,1,3),
			  new Date(2019,1,4),
			  new Date(2019,1,5),
			],
		};
		let fecha = new Date(2019,12,31);
		mutations.addPorDiaWeek(state, fecha);
		expect(state.porDiaWeek).toEqual([
			  new Date(2019,1,1),
			  new Date(2019,1,2),
			  new Date(2019,1,3),
			  new Date(2019,1,4),
			  new Date(2019,1,5),
			  new Date(2019,12,31),
			]);		
	});


	test('add an hour in addHoras array', () => {
		const state = {
			horas: [],
		};
		mutations.addHoras(state, '08:00-08:30');
		expect(state.horas).toEqual(['08:00-08:30']);		
	});


	test('change value in panel array', () => {
		const state = {
			status: 'view',
			panel: {
				btn: {
				  rango: 'none',
				  periodos: 'none',
				  programadas: 'none',
				  horario: 'none'
				},
				data: {
				  rango: 'none',
				  periodos: 'none',
				  programadas: 'none',
				  horario: 'none'
				},
			},
		};
		mutations.btnEdit(state, 'horario');
		expect(state.panel).toEqual({
			btn: {
				  rango: 'none',
				  periodos: 'none',
				  programadas: 'none',
				  horario: 'edit'
			},
			data: {
			  rango: 'view',
			  periodos: 'view',
			  programadas: 'view',
			  horario: 'edit'
			}
		});		
	});

	test('change values to view in panel array', () => {
		const state = {
			status: 'view',
			panel: {
				btn: {
				  rango: 'none',
				  periodos: 'none',
				  programadas: 'none',
				  horario: 'none'
				},
				data: {
				  rango: 'none',
				  periodos: 'none',
				  programadas: 'none',
				  horario: 'none'
				},
			}
		};
		mutations.btnEdit(state, 'periodos');
		expect(state.panel).toEqual({
			btn: {
				  rango: 'none',
				  periodos: 'edit',
				  programadas: 'none',
				  horario: 'none'
			},
			data: {
			  rango: 'view',
			  periodos: 'edit',
			  programadas: 'view',
			  horario: 'view'
			}
		});		
	});

	test('change values with messageCheck mutation', ()=>{
		const state = {
			periodos: [
				{
					periodo: '2018-2019',
					id: 1,
					message: ''
				}
			],
		}
		var type = 'periodos';
		var item = {
			periodo: '2018-2019',
			id: 1,
		};
		var mess = 'Message Check';
		mutations.messageCheck(state, [type, item, mess]);
		expect(state.periodos).toEqual([{
			periodo: '2018-2019',
			id: 1,
			message: 'Message Check'
		}]);
	});
	
});


