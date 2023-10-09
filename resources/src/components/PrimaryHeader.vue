<template>
	<header class="header">
		<ul class="header__menu nav nav-pills">
			<li class="neon-link">
				<router-link				
					class="nav-link custom-link"
					to="/"
					>Home
				</router-link>
			</li>
			<li class="neon-link">
				<router-link
					class="nav-link custom-link"
					to="/Create"
					>Create task
				</router-link>
			</li>
			<li class="neon-link">
				<router-link
					class="nav-link custom-link"
					to="/Task"
					>My task
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
.custom-link.active {
  background-color: transparent; 
  border: none; 
  color: inherit; 
  color:antiquewhite;
}
.neon-link {
  color: #39ff14; 
  text-decoration: none;
  position: relative;
  padding: 2px 2px;
  transition: all 0.2s ease-out;
  cursor: pointer;
  font-size: 20px;
}

.neon-link:after {
  content: " ";
  width: 100%;
  height: 1px;
  background: #39ff14;
  position: absolute;
  right: 0;
  bottom: 0;
  transition: all 0.2s ease-out;
}

.neon-link:before {
  content: " ";
  width: 4px;
  height: 4px;
  background: #39ff14;
  position: absolute;
  right: -4px;
  bottom: 0;
  opacity: 0;
}

.neon-link:hover {
  background: rgba(57, 255, 20, 0.1);
  transition: all 0.5s ease-out;
  padding: 2px 8px;
}

.neon-link:hover:after {
  width: 0px;
  transition: all 0.1s ease-out;
}

.neon-link:hover:before {
  opacity: 1;
  animation: blink 0.4s infinite 0.1s;
  transition: all 0.1s ease-out;
}

</style>