<template>
    <div>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <router-link class="navbar-brand" to="/">TodoMVC</router-link>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li :class="{ active : isNavActive('/') }">
                            <router-link to="/">Home</router-link>
                        </li>
                        <li :class="{ active : isNavActive('/task') }">
                            <router-link to="/task">Task</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        methods:  {
            isNavActive (path) {
                return path === this.$route.fullPath;
            }
        }
    }
</script>
