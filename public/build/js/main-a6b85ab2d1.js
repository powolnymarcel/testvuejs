(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

//Le component  qui sera traduit dans le blade/html par " <template id="todo-list-template">"
var TodoItems = Vue.extend({
    template: '#todo-list-template',

    created: function created() {
        var _this = this;

        this.$http.get('api/v1/todos').then(function (response) {
            console.log(response);
            if (response.status == 200) {
                _this.todos = response.data;
            }
        });
    },
    data: function data() {
        return {
            todos: {}
        };
    },


    //Les données a y injecter

    //Ce template a une méthode qui permet de changer la valeur "completed' d'une todo
    methods: {
        todoCompleted: function todoCompleted(todo) {
            todo.completed = !todo.completed;
        },
        SupprimerTodo: function SupprimerTodo(todo) {
            this.todos.$remove(todo);
        }
    }
});

//Le component  qui sera traduit dans le blade/html par " <template id="todo-add-form">"

var TodoAddForm = Vue.extend({
    template: '#todo-add-form',

    props: ['newtodo'],

    data: function data() {
        return {
            todo: { id: null, title: '', completed: false }
        };
    },


    methods: {
        addTodo: function addTodo() {
            if (this.todo.title == '') {
                return false;
            }
            this.newtodo = this.todo;
            this.todo = { id: null, title: '', completed: false };
        }
    }
});
Vue.component('todo-item', TodoItems);
Vue.component('todo-add-form', TodoAddForm);

//Le coeur de vueJs
new Vue({
    //On selectionne le scope dans lequem vue sera actif
    el: '#vue-app',

    data: {
        todos: [],
        newTodo: {}
    },

    watch: {
        newTodo: function newTodo(newval, oldval) {
            this.todos.push({
                id: Math.floor(Date.now()),
                title: newval.title,
                completed: false
            });
        }
    }
});

},{}]},{},[1]);

//# sourceMappingURL=main.js.map
