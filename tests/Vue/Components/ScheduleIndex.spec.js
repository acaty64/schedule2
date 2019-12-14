import { shallowMount, RouterLinkStub } from '@vue/test-utils';
import flushPromises from 'flush-promises';
import indexComponent from '@/components/schedule/index.vue';

// config.stubs['router-link'] = '<div />';

jest.mock('axios', () => ({
	get: jest.fn(() => Promise.resolve())
}));

const { get } = require('axios');

var xdata = {
	id: 1,
	cdocente: '000000',
	name: 'JOHN DOE',
	pendientes: 14,
	fecha_fin: '31/12/2019'
};

describe('Component index', () => {
	afterEach(() => {
		jest.clearAllMocks();
	});

	test('it has a name', () => {
		const wrapper = shallowMount(indexComponent);
		expect(wrapper.name()).toBe('ScheduleIndex');
	});
	
	test('users comes from api call', async() => {
		get.mockImplementationOnce( () => Promise.resolve({data: {
				id: 1,
				cdocente: '000000',
				name: 'JOHN DOE',
				pendientes: 15,
				fecha_fin: '31/12/2019'
			}}));
		const wrapper = shallowMount(indexComponent, {
			stubs: {
				'router-link' : RouterLinkStub
			}
		});
		await flushPromises();
		expect(get).toHaveBeenCalled();
		expect(get.mock.calls[0][0]).toBe(window.location.protocol+'//'+window.location.host+'/api/schedule/index');
		expect(wrapper.vm.docentes).toEqual({
			id: 1,
			cdocente: '000000',
			name: 'JOHN DOE',
			pendientes: 15,
			fecha_fin: '31/12/2019'
		});
	});


});