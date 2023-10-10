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
        state.items.push(item)
    },
    remove (state, id) {
      const index = state.items.findIndex(product => product.id === id)
      state.items.splice(index, 1)
    }
  },
  actions: {
    // Your actions go here
  },
  getters: {
    list: state => state.items
  },
});