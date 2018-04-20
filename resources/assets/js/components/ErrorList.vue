<template>
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>
