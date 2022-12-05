require('./bootstrap');

window.Vue = require("vue");
import Vue from "vue";
import ElementUI from "element-ui";
import locale from "element-ui/lib/locale/lang/en";

Vue.use(ElementUI, { locale });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 Vue.component("add-student", require("./components/AddStudent.vue").default);
 Vue.component("display-student", require("./components/DisplayStudent.vue").default);
 Vue.component("edit-student", require("./components/EditStudent.vue").default);


 const app = new Vue({
    el: "#app"
});