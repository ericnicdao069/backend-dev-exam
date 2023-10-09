import './bootstrap';
import './ziggy';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import CKEditor from '@ckeditor/ckeditor5-vue';

import { createApp, h } from 'vue/dist/vue.esm-bundler'
import { createInertiaApp } from '@inertiajs/vue3'

const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#6c757d',
};

createInertiaApp({
    resolve: name => {
      const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
      return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(VueSweetalert2, options)
        .use(CKEditor)
        .mount(el)
    },
})