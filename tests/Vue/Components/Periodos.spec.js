import { shallowMount, RouterLinkStub } from '@vue/test-utils';
import periodosComponent from '@/components/schedule/periodos';
import flushPromises from 'flush-promises';
import state from '@/store/state';
import getters from '@/store/getters';
import dispatch from '@/store/actions';
import Vuex from 'vuex';

let mocks;

// jest.mock('axios', () => ({
// 	post: jest.fn(() => Promise.resolve())
// }));

// const { post } = require('axios');

describe('Component Schedule Periodos', () => {
	beforeEach(() => {
		mocks = {
			$store: {
				state: state,
				getters,
				dispatch: jest.fn()
			},
		};
	});

	test('it has a name', () => {
		const wrapper = shallowMount(periodosComponent, { mocks });
		expect(wrapper.name()).toBe('Periodos');
	});

	// test('save button comes to api call', async() => {
	// 	post.mockImplementationOnce( () => Promise.resolve({data: {
	// 			periodos
	// 		}}));
	// 	const wrapper = shallowMount(periodosComponent, {
	// 		mocks,
	// 		stubs: {
	// 			'router-link' : RouterLinkStub
	// 		}
	// 	});
	// 	await flushPromises();
	// 	expect(post).toHaveBeenCalled();
	// 	expect(post.mock.calls[0][0]).toBe(window.location.protocol+'//'+window.location.host+'/api/schedule/periodos/save');
	// 	expect(post.mock.calls[0][1]).toBe(window.location.protocol+'//'+window.location.host+'/api/schedule/periodos/save');

	// });


});