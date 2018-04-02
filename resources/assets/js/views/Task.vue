<template>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">

                    <!-- New Task Form -->
                    <form @submit.prevent="add" class="form-horizontal">

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" id="task-name" class="form-control" v-model="form.name">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            <div v-if="hasTasks" class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        <tr v-for="task in view.tasks" :key="task.id">
                            <td class="table-text"><div>{{ task.name }}</div></td>

                            <!-- Task Delete Button -->
                            <td>
                                <button @click.prevent.stop="remove(task.id)" type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentId: 3,
                form: {
                    name: ''
                },
                view: {
                    tasks: []
                }
            }
        },
        created () {
            this.fetchTasks();
        },
        computed: {
            hasTasks () {
                return this.view.tasks.length > 0;
            }
        },
        methods: {
            fetchTasks () {
                axios.get('/api/task')
                    .then(response => {
                        this.view.tasks = response.data;
                    });
            },
            add () {
                if (this.form.task === '') {
                    return false;
                }

                axios.post('/api/task', this.form)
                    .then(() => {
                        this.fetchTasks();
                        this.resetForm();
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            remove (id) {
                axios.delete('/api/task/' + id)
                    .then(() => {
                        this.fetchTasks();
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            resetForm () {
                this.form.name = '';
            }
        }
    }
</script>
