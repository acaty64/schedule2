import { shallowMount } from '@vue/test-utils';
import Example from '@/components/ExampleComponent.vue';

describe('Component ExampleComponent.vue', () => {
	test('it has a name', () => {
		const wrapper = shallowMount(Example);
		expect(wrapper.name()).toBe('ExampleComponent');
	});


});