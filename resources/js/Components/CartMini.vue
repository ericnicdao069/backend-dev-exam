<template>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div v-for="item in $cart.getters.list" :key="item.id">
            <div class="media dropdown-item">
                <div class="media-body">
                    <div class="row justify-content-between">
                        <h3 class="dropdown-item-title">{{ item.name }}</h3>
                        <h3 class="dropdown-item-title">{{ item.price }}</h3>
                    </div>
                    <p class="text-sm">{{ preview(item.description) }}</p>
                </div>
                <div class="my-auto ml-3 position-relative">
                    <a href="javascript:void(0)" @click.prevent="remove(item.id)">
                        <i class="fas fa-trash text-danger"></i>
                    </a>
                </div>
            </div>
            <div class="dropdown-divider"></div>
        </div>
        <a v-if="$cart.getters.list.length > 0" :href="$route('cart.create')" class="dropdown-item dropdown-footer">Go to Checkout Page</a>
        <span v-else class="dropdown-item dropdown-footer">Empty Cart</span>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        data () {
            return {}
        },
        created () {
        },
        methods: {
            preview(description) {
                return description.substr(0, 25) + '...'
            },
            remove(id) {
                this.$cart.commit('remove', id)
            }
        }
    })
</script>

<style scoped>
td {
    padding: 5px 25px;
}
</style>