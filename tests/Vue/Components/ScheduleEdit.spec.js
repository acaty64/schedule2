import { shallowMount } from '@vue/test-utils';
import editComponent from '@/components/schedule/edit';
import state from '@/store/state';
import dispatch from '@/store/actions';
import Vuex from 'vuex';

let mocks;

describe('Component Schedule Edit', () => {
	beforeEach(() => {
		mocks = {
			$route: {
				params: {
					docente: {			
						id: 1,
						cdocente: '000000',
						name: 'JOHN DOE',
						pendientes: 14,
						fecha_fin: '15/05/2019',
					}					
				},
			},
			$store: {
				state: state,
				dispatch: jest.fn(),
			},
			dataReady: true,
		};
	});

	test('it has a name', () => {
		const wrapper = shallowMount(editComponent, { mocks });
		expect(wrapper.name()).toBe('ScheduleEdit');
	});

	test('it renders edit props', () => {
		const wrapper = shallowMount(editComponent, { mocks });
		expect(wrapper.contains(editComponent)).toBe(true);
	});

	// test('it gets the user from the route', () => {
	// 	const wrapper = shallowMount(editComponent, { mocks });
	// 	expect(wrapper.vm.docente).toEqual({
	// 					id: 1,
	// 					cdocente: '000000',
	// 					name: 'JOHN DOE',
	// 					pendientes: 14,
	// 					fecha_fin: '15/05/2019'
	// 			});
	// });

  test('it renders Periodos component', () => {
    const wrapper = shallowMount(editComponent, { 
    	stubs: {
    		periodos: '<div id="header"></div>'
    	},
    	mocks
    });
    expect(wrapper.contains('.container')).toBe(true);
    expect(wrapper.contains('#header')).toBe(true);
  });	

  test('it renders Programadas component', () => {
    const wrapper = shallowMount(editComponent, { 
    	stubs: {
    		Programadas: '<div id="header"></div>'
    	},
    	mocks
    });
    expect(wrapper.contains('#header')).toBe(true);
  });	

  test('it renders Horario component', () => {
    const wrapper = shallowMount(editComponent, { 
    	stubs: {
    		Horario: '<div id="header"></div>'
    	},
    	mocks
    });
    expect(wrapper.contains('#header')).toBe(true);
  });	

});