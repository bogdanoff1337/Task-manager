<template>
  <div>
    <div class="background">
        <div id="app">
    </div>
    <PrimaryHeader v-if="isLoggedIn" />
    <main class="main">
      <router-view />
    </main>
 
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
          this.isLoggedIn = response.data.isLoggedIn; // Встановлюємо статус аутентифікації
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

.background {
  height: 100vh;
  width: 100vw;
  background-color: #1a1a1a;
}

.container {
  display: flex;
  flex-direction: column;
  width: 1000px;
  margin: 0 auto;
  padding: 40px;
}

.container__menu{
  display: flex;
  align-items: center; 
}

h1{
  margin-right: 10px;
  }

a{
  text-decoration: none;
}

.neon-button {
  color: #39ff14; 
  background: transparent;
  border: 2px solid #39ff14;
  padding: 10px 20px;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.2s ease-out;
  
}

.neon-button:hover {
  background: #39ff14;
  color: black;
  transition: all 0.2s ease-out;
}
</style>
