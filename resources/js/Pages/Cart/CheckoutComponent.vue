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
                    <div class="row justify-content-around">
                        <div class="col-md-8">
                            <div class="row card">
                                <div class="card-header p-2 bg-dark text-center">
                                    <h5>Cart Details</h5>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-3">Item</th>
                                                <th class="col-4">Description</th>
                                                <th class="col-1">Quantity</th>
                                                <th class="col-2">Price</th>
                                                <th class="col-2">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in $cart.getters.list" :key="item.id">
                                                <td class="align-middle col-3">{{ item.name }}</td>
                                                <td class="col-4">{{ item.description }}</td>
                                                <td class="align-middle col-1">{{ item.quantity }}</td>
                                                <td class="align-middle col-2">₱ {{ item.price }}</td>
                                                <td class="align-middle text-right  col-2">₱ {{ item.subtotal }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-right font-weight-bold" colspan="4">Total</td>
                                                <td class="text-right">₱ {{ total }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row card">
                                <div class="card-header p-2 bg-dark text-center">
                                    <h5>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="firstName">First Name</label>
                                            <input v-model="form.firstname" type="email" class="form-control" id="firstName" placeholder="Enter First Name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input v-model="form.lastname" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Delivery Address</label>
                                        <input class="form-control" v-model="form.address" type="text" placeholder="Enter Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact #</label>
                                        <input class="form-control" v-model="form.contact" type="text" name="contact" placeholder="Enter Contact Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <cart :form="form" />
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
                form: {
                    firstname: '',
                    lastname: '',
                    address: '',
                    contact: '',
                    address: ''
                }
            }
        },
        computed: {
            total () {
                return this.$cart.getters.list.reduce((accumulator, item) => accumulator + +item.subtotal, 0).toFixed(2)
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