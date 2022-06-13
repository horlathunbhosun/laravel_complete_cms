require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp,Link,Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import vSelect from 'vue-select'
import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

import moment from 'moment';




createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    title: title => title ? `${title} - JustErotica` : ' JustErotica',

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(moment)
            .component('InertiaLink', Link)
            .component('v-select', vSelect)
            .component('Head', Head)
            .component('InertiaProgress', InertiaProgress)
            .component(VueSweetalert2, {
                confirmButtonColor: '#41b882',
                cancelButtonColor: '#ff7674'
            })
            .mount(el)
    },
})

InertiaProgress.init()

