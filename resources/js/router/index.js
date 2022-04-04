import { createRouter, createWebHistory } from 'vue-router'

import AllItems from '../AllItems.vue';
import AddItem from '../AddItem.vue';
import EditItem from '../EditIem.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: AllItems
    },
    {
        name: 'add',
        path: '/add',
        component: AddItem
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditItem
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
