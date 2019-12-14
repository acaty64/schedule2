import { shallowMount } from '@vue/test-utils';
import programadasComponent from '@/components/schedule/programadas';
import state from '@/store/state';
import getters from '@/store/getters';
import Vuex from 'vuex';

let mocks;

describe('Component Schedule Programadas', () => {
	beforeEach(() => {
		mocks = {
			$store: {
				state: state,
				getters
			},
		};
	});

	test('it has a name', () => {
		const wrapper = shallowMount(programadasComponent, { mocks });
		expect(wrapper.name()).toBe('Programadas');
	});



});