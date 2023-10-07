<template>
	<header class="header">
		<ul class="header__menu nav nav-pills">
			<li class="nav-item">
				<router-link
					aria-current="page"
					class="nav-link"
					to="/"
					>Main
				</router-link>
			</li>
			<li class="nav-item">
				<router-link
					class="nav-link"
					to="/Create"
					>Create task
				</router-link>
			</li>
			<li class="nav-item">
				<router-link
					class="nav-link"
					to="/Login"
					>Login
				</router-link>
			</li>
		</ul>
	</header>
</template>

<script lang="ts">
	import { defineComponent } from 'vue';

	export default defineComponent({
		components: {},
		setup() {
			return {};
		},
	});
</script>

<style lang="less" scoped>
	.header {
		width: 992px;
		margin: 0 auto;
		height: 100px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>