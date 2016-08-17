

//Le component  qui sera traduit dans le blade/html par " <template id="todo-list-template">"
var TodoItems = Vue.extend({
    template: '#todo-list-template',

    created(){
        this.$http.get('api/v1/todos').then((response)=>{
            console.log(response);
            if(response.status == 200){
                this.todos = response.data;
            }

        });
    },
    data(){
        return {
            todos: {}
        }
    },

    //Les données a y injecter

    //Ce template a une méthode qui permet de changer la valeur "completed' d'une todo
    methods: {
        todoCompleted(todo) {
            todo.completed = !todo.completed
        },
        SupprimerTodo(todo){
            this.todos.$remove(todo);
        }
    }
});


//Le component  qui sera traduit dans le blade/html par " <template id="todo-add-form">"

var TodoAddForm = Vue.extend({
    template: '#todo-add-form',

    props: ['newtodo'],

    data() {
        return {
            todo: {id: null, title: '', completed: false}
        }
    },

    methods: {
        addTodo() {
            if(this.todo.title =='')
            {return false;}
            this.newtodo = this.todo;
            this.todo = {id: null, title: '', completed: false};
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
        newTodo(newval, oldval) {
            this.todos.push({
                id: Math.floor(Date.now()),
                title: newval.title,
                completed: false
            });
        }
    }
});