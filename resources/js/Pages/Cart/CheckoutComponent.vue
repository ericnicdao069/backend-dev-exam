<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0 text-dark">Checkout</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-md-9">
                            <!-- <div class="row py-2">
                                <input class="form-control" type="text" name="name" placeholder="Juan Dela Cruz">
                            </div>
                            <div class="row py-2">
                                <input class="form-control" type="text" name="delivery_address">
                            </div>
                            <div class="row py-2">
                                <input class="form-control" type="text" name="number" placeholder="09XX XXX XXXX">
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-secondary" type="submit">Submit</button>
                            </div> -->
                            <div class="card">
                                <div class="card-header p-2">
                                    <h5>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="checkout-form">
                                            // Put Two Column Form Here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <cart />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Cart from '../../Components/Cart.vue'
    import Layout from '../../Components/Layout.vue'

    export default {
        components: { Cart },
        props: ['token'],
        layout: Layout,
        data () {
            return {
            }
        },
        created () {
            console.log('Component Loaded')
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