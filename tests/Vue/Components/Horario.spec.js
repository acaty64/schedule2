import { shallowMount } from '@vue/test-utils';
import horarioComponent from '@/components/schedule/horario';
import state from '@/store/state';
import getters from '@/store/getters';
import disptach from '@/store/actions';
import Vuex from 'vuex';

let mocks;

describe('Component Schedule Horario', () => {
	beforeEach(() => {
		mocks = {
			$store: {
				state: state,
				getters,
				commit: jest.fn(),
				dispatch: jest.fn(),
			},
		};
	});

	test('it has a name', () => {
		const wrapper = shallowMount(horarioComponent, { mocks });
		expect(wrapper.name()).toBe('Horario');
	});

});