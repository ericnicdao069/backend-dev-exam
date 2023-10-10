<template>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div v-for="item in $cart.getters.list" :key="item.id">
            <a href="#" class="dropdown-item">
                <div class="media">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">{{ item.name }}</h3>
                        <p class="text-sm">{{ preview(item.description) }}</p>
                    </div>
                    <div class="my-auto ml-3">
                        <a href="javascript:void(0)" class="">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                    </div>
                </div>
            </a>
            <div class="dropdown-divider"></div>
        </div>
        <a v-if="$cart.getters.list.length > 0" :href="$route('cart.create')" class="dropdown-item dropdown-footer">Go to Checkout Page</a>
        <span v-else class="dropdown-item dropdown-footer">Empty Cart</span>
    </div>
</template>

<script>
    export default {
        props: ['token'],
        data () {
            return {}
        },
        created () {
        },
        methods: {
            preview(description) {
                return description.substr(0, 50) + '...'
            }
        }
    }
</script>

<style scoped>
td {
    padding: 5px 25px;
}
</style>