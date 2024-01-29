<script>
import axios from "axios";

export default {
  data() {
    return {
      todoList: [],
    };
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
  <form>
    <input type="text" name="text"  />
    <input type="submit" value="send"/>
  </form>

  <!-- stampo la todo list a schermo -->
  <h1>Cose da fare</h1>
  <ul>
    <li v-for="(todo, index) in todoList" :key="index">{{ todo.text }}</li>
  </ul>
</template>

<style lang="scss" scoped></style>
