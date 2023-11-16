<template>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="profile-username text-center">Your Cart</h3>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item" v-for="item in $cart.getters.list" :key="item.id">
                    <b>{{ item.name }}</b>
                    <a class="float-right">PhP {{ item.price }}</a>
                </li>
            </ul>

            <button class="btn btn-primary btn-icon btn-block text-dark row justify-content-between" @click="submit('paymaya')">
                <b class="mx-1">Pay via PayMaya</b>
            </button>

            <button class="btn btn-success btn-icon btn-block text-dark row justify-content-between" @click="submit('paymongo')">
                <b class="mx-1">Pay via PayMongo</b>
            </button>
        </div>
    </div>
</template>

<script lang="ts">
    import { defineComponent } from 'vue'
    import axios from 'axios'

    export default defineComponent({
        props: {
            token: {
                required: true,
                type: String
            },
            form: {
                required: true,
                type: Object
            },
            payable: {
                required: true,
                type: Number
            }
        },
        data () {
            return {
            }
        },
        created () {
        },
        methods: {
            submit(payment_method) {
                const data = new FormData()
                data.append('payable', this.payable)
                data.append('contact', this.form.contact)
                data.append('address', this.form.address)
                data.append('payment_method', payment_method)

                this.$cart.getters.list.forEach(item => {
                    data.append('products[]', item.id)
                })

                // for (const key in this.form) {
                //     data.append(key, this.form[key])
                // }

                axios({
                    method: 'POST',
                    url: this.$route('cart.store'),
                    data: data,
                    headers: {
                        Authorization: "Bearer " + this.token,
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(async response => {
                    if (response.status == 200) {
                        window.open(response.data, '_blank');
                    }
                }).catch(error => {
                    console.error('Error fetching data:', error)
                })
            }
        }
    })
</script>

<style scoped>
td {
    padding: 5px 25px;
}

.float_right:after {
    clear: both;
}
</style>