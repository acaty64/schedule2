<template>
  <div>
    <span v-for="mess in check_main">
      <div>
        <font color="red"><b>{{ mess }}</b></font>
      </div>
    </span>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
export default {
  name: 'Check',
  async mounted(){
    await this.getData(this.cod_doc);
  },
  props: ['cod_doc'],
  computed: {
    ...mapState({
      component_key: (state) => state.component_key,
      check_main: (state) => state.check_main,
    }),
  },
  methods: {
    getData(cod_doc){
      this.$store.dispatch('getData', cod_doc);
    },
  }
};
</script>