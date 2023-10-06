<template>
    <div class="container">
      <h1>Hello, Vue!</h1>
      <p>Це тестовий додаток для Vue 3.</p>
    </div>
  </template>

<script lang="ts">
	import { defineComponent } from 'vue';
	

	export default defineComponent({
		
		setup() {
			return {
				username: 'Михаил',
			};
		},
	});
</script>

<style lang="less" scoped>
	.container {
		width: 992px;
		margin: 0 auto;
		padding: 40px;
	}
</style>
  