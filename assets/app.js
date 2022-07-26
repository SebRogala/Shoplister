/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import { createApp } from 'vue';
import router from "./router";

import vuetify from './plugins/vuetify'

import Vue from './App'

createApp(Vue)
  .use(router)
  .use(vuetify)
  .mount('#app');
