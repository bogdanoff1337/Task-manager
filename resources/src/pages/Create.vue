<template>
    <div class="center-container">
      <div class="task-form">
        <h1>Створити завдання</h1>
        <form @submit.prevent="onSubmit">
          <!-- Ваші поля вводу тут -->
          <div class="form-group">
            <label for="title">Назва</label>
            <input type="text" class="form-control" id="title" v-model="task.title">
          </div>
          <div class="form-group">
          <label for="description">Опис {{ remainingCharacters }}</label>
          <textarea class="form-control no-resize" id="description" v-model="task.description" maxlength="255"></textarea>
        </div>
          <div class="form-group">
            <label for="dueDate">Дата виконання</label>
            <input type="date" class="form-control" id="dueDate" v-model="task.dueDate">
          </div>
          <!-- Кнопка "Створити" -->
          <button type="submit" class="neon-button">Створити</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { defineComponent } from 'vue';
  
  export default defineComponent({
    data() {
      return {
        task: {
          title: '',
          description: '',
          dueDate: '',
        },
        maxDescriptionLength: 255,
      };
    },
    computed: {
    remainingCharacters() {
      return this.maxDescriptionLength - this.task.description.length;
    },
  },
    methods: {
      onSubmit() {
        // Відправка даних на сервер і подальша обробка відповіді
        this.$axios.post('/api/tasks', this.task).then((response) => {
          if (response.status === 201) {
            // Відкриваємо сторінку із списком завдань
            this.$router.push('/tasks');
          } else {
            // Обробка помилки
            console.error(response);
          }
        });
      },
    },
  });
  </script>
  
  <style>
  .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
  }
  
  .task-form {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 30vw;
  }

  textarea {
  max-width: 100%; /* Максимальна ширина textarea */
  width: 100%; /* Розмір textarea на всю ширину контейнера */
  height: 8em; /* Максимальна висота в 6 рядків */
}

  .no-resize {
  resize: none;
}
  </style>
  