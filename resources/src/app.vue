<template>
	<div>
	  <PrimaryHeader />
	  <main class="main">
		<router-view />
	  </main>
  
	  <div class="container">
		<h1>Привітання! {{ userName }}</h1>
		<p>
		  Це головна сторінка сайту Task Manager. Тут ви можете створювати, редагувати та видаляти завдання.
		</p>
		<a v-if="!isLoggedIn" class="btn btn-primary" href="/auth/google">Авторизуватися за допомогою Google</a>
		<button v-if="isLoggedIn" class="btn btn-primary" @click="logout">Вийти</button>
	  </div>
	</div>
  </template>
  
  <script lang="ts">
  import { defineComponent } from 'vue';
  import PrimaryHeader from './components/PrimaryHeader.vue';
  import axios from 'axios';

  export default defineComponent({
	data() {
	  return {
		userName: '', // Тут буде зберігатися ім'я користувача
		isLoggedIn: false, // Змінна для визначення статусу аутентифікації
	  };
	},
	mounted() {
	  // Отримуємо ім'я користувача та перевіряємо статус аутентифікації з контролера
	this.fetchUserName();
    this.isLoggedIn = '{{ Auth::check() }}';
	},
	components: {
	  PrimaryHeader,
	},
	methods: {
		async fetchUserName() {
      try {
        const response = await axios.get('/api/getUserName'); // Виконуємо запит до Laravel для отримання імені користувача

        if (response.status === 200) {
          // Успішно отримали дані
          this.userName = response.data.userName; // Встановлюємо ім'я користувача
        } else {
          console.error('Помилка отримання імені користувача');
        }
      } catch (error) {
        console.error('Помилка отримання імені користувача', error);
      }
    },
		async logout() {
  try {
    const response = await axios.get('/auth/google/logout'); // Виконуємо GET-запит на маршрут виходу

    if (response.status === 200) {
      // Успішно вийшли з системи
      this.isLoggedIn = false; // Змінюємо статус аутентифікації на false
      this.userName = ''; // Очищаємо ім'я користувача
      // Тут ви також можете перенаправити користувача на іншу сторінку або зробити інші необхідні дії
    } else {
      console.error('Помилка виходу користувача');
    }
  } catch (error) {
    console.error('Помилка виходу користувача', error);
  }
},

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
  
