require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';

Vue.component('export-component', require('./components/ExportComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        students: [],
    },
    mounted : function() {
        this.getStudents();
    },
    methods: {
        getStudents() {
            let _this = this;
            axios.get('api/v1/students').then(response => {
                _this.students = response.data;
            });
        }
    }
});
