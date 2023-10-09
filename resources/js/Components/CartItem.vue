<template>
    <div class="row">
        test
    </div>
</template>

<script>
    import Pagination from '../../Components/Pagination.vue'

    export default {
        components: { Pagination },
        props: ['token'],
        data () {
            return {
            }
        },
        created () {
        },
        methods: {
        }
    }
</script>

<style scoped>
td {
    padding: 5px 25px;
}
</style>