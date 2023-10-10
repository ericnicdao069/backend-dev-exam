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

            <a href="javascript:void(0)" class="btn btn-primary btn-icon btn-block text-dark row justify-content-between" @click="submit">
                <svg class="mx-1" fill="none" height="50" viewBox="0 0 192 192" width="50" xmlns="http://www.w3.org/2000/svg">
                    <path d="m84 96h36c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36c9.941 0 18.941 4.03 25.456 10.544" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                    <path d="m145.315 66.564a6 6 0 0 0 -10.815 5.2zm-10.815 53.671a6 6 0 0 0 10.815 5.201zm-16.26-68.552a6 6 0 1 0 7.344-9.49zm7.344 98.124a6 6 0 0 0 -7.344-9.49zm-41.584 2.193c-30.928 0-56-25.072-56-56h-12c0 37.555 30.445 68 68 68zm-56-56c0-30.928 25.072-56 56-56v-12c-37.555 0-68 30.445-68 68zm106.5-24.235c3.523 7.325 5.5 15.541 5.5 24.235h12c0-10.532-2.399-20.522-6.685-29.436l-10.815 5.2zm5.5 24.235c0 8.694-1.977 16.909-5.5 24.235l10.815 5.201c4.286-8.914 6.685-18.904 6.685-29.436zm-56-56c12.903 0 24.772 4.357 34.24 11.683l7.344-9.49a67.733 67.733 0 0 0 -41.584-14.193zm34.24 100.317c-9.468 7.326-21.337 11.683-34.24 11.683v12a67.733 67.733 0 0 0 41.584-14.193z" fill="#000"/><path d="m161.549 58.776c5.416 11.264 8.451 23.89 8.451 37.224s-3.035 25.96-8.451 37.223" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                </svg>
                <b class="mx-1">Pay via GCash</b>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['token', 'form'],
        data () {
            return {
            }
        },
        created () {
        },
        methods: {
            submit() {
                console.log(this.form)
                axios({
                    method: 'POST',
                    url: this.$route('cart.store'),
                    // data: data,
                    headers: {
                        Authorization: "Bearer " + this.token,
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(async response => {
                    if (response.status == 200) {
                        window.open(response.data, '_blank');
                    }
                }).catch(error => {
                    this.errors = error.response.data.errors
                    this.redirectStep(Object.getOwnPropertyNames(error.response.data.errors))
                    console.error('Error fetching data:', error)
                })
            }
        }
    }
</script>

<style scoped>
td {
    padding: 5px 25px;
}

.float_right:after {
    clear: both;
}
</style>