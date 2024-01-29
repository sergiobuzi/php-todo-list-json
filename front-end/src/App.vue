<script>
import axios from "axios";

export default {
  data() {
    return {
      todoList: [],
      NewTodoText: "",
    };
  },
  methods: {
    CreateTodo() {

      const params = {
        text: this.NewTodoText
      };
      const config = {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      };

      axios.post("http://localhost/php-boolean/php-todo-list-json/back-end/", params , config)
      .then(res => {
        this.todoList = res.data;
        console.log(res.data);
      })
      .catch(err => console.log(err));
    },
  },
  mounted() {
    axios
      .get("http://localhost/php-boolean/php-todo-list-json/back-end/")
      .then((res) => {
        this.todoList = res.data;
      });
  },
};
</script>

<template>
  <!-- creo il form per inserire i todo -->
  <form @submit.prevent="CreateTodo">
    <input type="text" name="text" v-model="NewTodoText" />
    <input type="submit" value="send" />
  </form>

  <!-- stampo la todo list a schermo -->
  <h1>Cose da fare</h1>
  <ul>
    <li v-for="(todo, index) in todoList" :key="index">{{ todo.text }}</li>
  </ul>
</template>

<style lang="scss" scoped></style>
