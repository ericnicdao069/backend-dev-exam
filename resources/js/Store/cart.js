import { createStore } from 'vuex';
import createPersistedState from 'vuex-persistedstate'

export default createStore({
  plugins: [createPersistedState({
      storage: window.sessionStorage,
  })],
  state: {
    items: []
  },
  mutations: {
    set (state, item) {
        const index = state.items.findIndex(product => product.id === item.id)

        if (index != -1) {
          state.items[index].quantity++
          state.items[index].subtotal = state.items[index].quantity * state.items[index].price
        } else {
          item.quantity = 1
          item.subtotal = item.price
          state.items.push(item)
        }
    },
    remove (state, id) {
      const index = state.items.findIndex(product => product.id === id)

      state.items.splice(index, 1)
    },
    update (state, {id: id, quantity: qty}) {
      const index = state.items.findIndex(product => product.id === id)

      if (qty > 0) {
        const item = state.items[index]

        item.quantity = qty
        item.subtotal = item.price * qty
      } else {
        state.items.splice(index, 1)
      }
    },
    clear (state) {
      state.items = []
    }
  },
  actions: {
    // Your actions go here
  },
  getters: {
    list: state => state.items
  },
});