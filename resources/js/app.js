// import './bootstrap';
import { createApp } from "vue";
import CreateUser from "./admin-panel/createUser.vue";

const app = createApp(CreateUser);

// app.component('CreateUser', CreateUser);

app.mount("#createuser");
