<template>
    <div class="list-rendering">
        <ul>
            <li v-for="(todo) in listCompleteTodo" v-bind:key="todo.id">
              {{ todo.name }} - {{ todo.isComplete }} -{{todo.id}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos: [
                    {
                        name: 'to do 1',
                        isComplete: true
                    },
                    {
                        name: 'to do 2',
                        isComplete: false
                    },
                    {
                        name: 'to do 3',
                        isComplete: true
                    },
                ]
            }
        },
        computed: {
            listCompleteTodo() {
                return this.todos.filter(item => item.isComplete==true)
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>
