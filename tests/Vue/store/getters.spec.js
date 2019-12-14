import getters from '@/store/getters';
import state from '@/store/state';


describe('', () => {

  // mock getters
  const _getters = {
    dfecha: getters.dfecha(state),
    cfecha: getters.cfecha(state),
  };

	test('dfecha return instanceof Date', () => {
		const sfecha = '31/12/2019';
		const check = new Date(2019, 11, 31, 0, 0, 0, 0);
		expect(getters.dfecha(state)(sfecha)).toEqual(check);
	});


	test('qvacaciones return days between fini to ffin', () => {
		const fini = '01/12/2019';
		const ffin = '02/12/2019';
		expect(getters.qvacaciones(state, _getters)([fini, ffin])).toBe(2);
	});

	test('cfecha return date with format "dd/mm/yyyy" ', () => {
		const xfecha = new Date(2019, 11, 31, 0, 0, 0, 0);
		expect(getters.cfecha(state)(xfecha)).toEqual('31/12/2019');
	});

	test('wdia return date with format "DDD dd/mm/yyyy" ', () => {
		const xfecha = '01/01/2020';
		expect(getters.wdia(state, _getters)(xfecha)).toBe('MIE 01/01/2020');
	});



});