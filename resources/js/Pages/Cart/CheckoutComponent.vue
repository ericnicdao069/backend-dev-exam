<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0 text-dark">Products</h1>
                </div>
                <div class="col-6">
                    <a :href="$route('product.form')" class="btn btn-primary btn-round float-right">Create</a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-12 col-md-6">
                    <cart-list-component></cart-list-component>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row py-2">
                        <input class="form-control" type="text" name="name" placeholder="Juan Dela Cruz">
                    </div>
                    <div class="row py-2">
                        <select class="form-control">
                            <option>GCash</option>
                            <option>Credit Card</option>
                        </select>
                    </div>
                    <div class="row py-2">
                        <input class="form-control" type="text" name="number" placeholder="09XX XXX XXXX">
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Pagination from '../../Components/Pagination.vue'
    import CartComponent from './ListComponent.vue'

    export default {
        components: { Pagination },
        props: ['token'],
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