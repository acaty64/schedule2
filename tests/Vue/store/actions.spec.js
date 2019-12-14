import dispatch from '@/store/actions';
import state from '@/store/state'
import getters from '@/store/getters'
import commit from '@/store/mutations'

describe('store actions', () => {
	let context;

	beforeEach(() => {
		context = {};
	});

	afterEach(() => {
		jest.clearAllMocks();
	});

	test('setCodDoc action calls setCodDoc mutation', () => {
		const commit = jest.fn();
		dispatch.setCodDoc({ getters, state, commit, dispatch }, '000000');
		expect(commit).toHaveBeenCalledTimes(1);
		expect(commit.mock.calls[0][0]).toBe('cdocente');
		expect(commit.mock.calls[0][1]).toEqual('000000');
	});

	test('calcVacPorDiaWeek action without "turnos" calls "sortPorDiaWeek" mutation', () => {
		let getters;
		getters = {
			dfecha: () => new Date(2019,0,1)
		};
		state.porDiaWeek = [
			  new Date(2019,1,5),
			  new Date(2019,1,1),
			  new Date(2019,1,2),
			  new Date(2019,1,3),
			  new Date(2019,1,4),
		];
		state.fini = new Date(2019,0,1);
		state.ffin = new Date(2019,7,31);

		const commit = jest.fn();
		dispatch.calcVacPorDiaWeek({
			state, getters, dispatch, commit
		});
		expect(commit).toHaveBeenCalledTimes(1);
		expect(commit.mock.calls[0][0]).toBe('sortPorDiaWeek');
		expect(commit.mock.calls[0][1]).toEqual();
	});

	// test('calcVacPorDiaWeek action with "turnos" calls "addPorDiaWeek" mutation', () => {
	// 	let getters;
	// 	getters = {
	// 		dfecha: () => new Date(2019,0,1),
	// 		nDia: () => 0,
	// 	};
	// 	state.porDiaWeek = [
	// 		  new Date(2019,1,5),
	// 		  new Date(2019,1,1),
	// 		  new Date(2019,1,2),
	// 		  new Date(2019,1,3),
	// 		  new Date(2019,1,4),
	// 	];
	// 	state.fini = new Date(2019,0,1);
	// 	state.ffin = new Date(2019,7,31);
	// 	state.turnos['LUN'] = 'vacaciones';

	// 	const commit = jest.fn();
	// 	dispatch.calcVacPorDiaWeek({
	// 		state, getters, dispatch, commit
	// 	});
	// 	expect(commit).toHaveBeenCalledTimes(1);
	// 	expect(commit.mock.calls[0][0]).toBe('addPorDiaWeek');
	// 	expect(commit.mock.calls[0][1]).toEqual(new Date(2019,0,6));
	// });

	test('setSchedule action calls "schedule" mutation', () => {
		state.horas = [
			'08:00-08:30',
			'08:30-09:00',
		];

		const commit = jest.fn();
		dispatch.setSchedule({
			state, getters, dispatch:jest.fn(), commit
		});
		expect(commit).toHaveBeenCalledTimes(14);
		expect(commit.mock.calls[0][0]).toBe('schedule');
		expect(commit.mock.calls[0][1]).toEqual(["08:00-08:30","",{}]);
	});

// 	test('fillSchedule action calls "schedule" mutation', () => {
// console.log('TODO fillSchedule jest test');
// 		state.horario = {
// 				'LUN': 'dia',
// 				'MAR': 'mar'
// 			};
// 		state.horas = [
// 			'08:00-08:30',
// 			'08:30-09:00',
// 		];
// 		state.schedule = {
// 			'08:00-08:30': {}, 
// 			'08:30-09:00': {}
// 		};

// 		const commit = jest.fn();
// 		dispatch.fillSchedule({
// 			state, getters, dispatch, commit
// 		});
// 		expect(commit).toHaveBeenCalledTimes(1);
// 		expect(commit.mock.calls[0][0]).toBe('schedule');
// 		expect(commit.mock.calls[0][1]).toEqual(["08:00-08:30","",{}]);
// 	});

	test('setSemestre action calls "fini" mutation', () => {
		let commit = jest.fn();
		state.semestre = '2018-2';
		state.semestres = [
			{id: 0, semestre: '2018-2', fecha_ini: '13/08/2018', fecha_fin: '16/12/2019'}
		];
		dispatch.setSemestre({
			state, getters, dispatch, commit
		});
		expect(commit).toHaveBeenCalledTimes(1);
		expect(commit.mock.calls[0][0]).toBe('semestre');
		// expect(commit.mock.calls[0][1]).toEqual(new Date(2019,2,18));
	});

	test('setHorario action calls "horario" mutation', () => {
		let commit = jest.fn();
		state.semestre = '2018-2';
		state.horarios = [
			{ semestre: '2018-2', dia: 'LUN', turno: 'dia'},
			{ semestre: '2018-2', dia: 'MAR', turno: 'noche'},
		];
		dispatch.setHorario({
			state, getters, dispatch, commit
		});
		expect(commit).toHaveBeenCalledTimes(1);
		expect(commit.mock.calls[0][0]).toBe('horario');
		// expect(commit.mock.calls[0][1]).toEqual(new Date(2019,2,18));
	});

});