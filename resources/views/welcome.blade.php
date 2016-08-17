@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenue</div>

                <div class="panel-body">
                    Test sur VueJS
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container" id="vue-app">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Ma liste de choses à faire</h1>
                        <todo-item :todos="todos"></todo-item>

                        <todo-add-form :newtodo.sync="newTodo"></todo-add-form>
                    </div>
                </div>

                <template id="todo-list-template">
                    <pre>@{{ $data|json }}</pre>
                    <div>
                        <ul class="list-group">
                            <li
                                    v-for="todo in todos"
                                    class="list-group-item"
                                    v-bind:class="{ 'completed' : todo.completed }">
                                @{{todo.title}}
                                <button class="btn btn-xs pull-right margin-right-10"
                                        v-bind:class="{'btn-success' : todo.completed, 'btn-danger' : !todo.completed}"
                                        v-on:click="todoCompleted(todo)">@{{todo.completed ? 'Completed' : 'Pending'}}</button>
                                <button class="btn btn-xs pull-right margin-right-10"

                                        v-on:click="SupprimerTodo(todo)">Del</button>
                            </li>
                        </ul>
                    </div>
                </template>

                <template id="todo-add-form">
                    <form v-on:submit.prevent="addTodo()">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter new Todo" v-model="todo.title">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Add</button>
                        </div>
                    </form>
                </template>
            </div>        </div>
    </div>
</div>
@endsection
