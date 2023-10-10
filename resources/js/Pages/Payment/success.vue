<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col col-md-11 mx-auto">
                            <div class="card p-2 mt-5">
                                <div class="card-body">
                                    Payment Successful
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Layout from '../../Components/Layout.vue'

    export default {
        layout: Layout,
        data () {
            return {
            }
        },
        created () {
            this.$cart.commit('clear')
        },
        methods: {
        }
    }
</script>