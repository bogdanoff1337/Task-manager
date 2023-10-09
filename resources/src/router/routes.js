import Create from '../pages/Create.vue';
import Home from '../pages/Home.vue';
import Task from '../pages/Task.vue';

const routes = [

  {
    path: '/',
    name: 'Home',
    component: Home,
  },

  {
    path: '/Create',
    name: 'Create',
    component: Create,
  },

  {
    path: '/Task',
    name: 'Task',
    component: Task,
  },

];

export default routes;
