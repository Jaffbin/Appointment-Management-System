// Import Bootstrap and other dependencies
import './bootstrap';

// Import custom SCSS
import '../sass/app.scss';

// Import any other JavaScript modules or libraries
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';

// Create a Vue application instance
const app = createApp({});

// Register components
app.component('example-component', ExampleComponent);

// Mount the Vue application
app.mount('#app');