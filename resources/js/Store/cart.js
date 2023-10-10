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
    }
  },
  actions: {
    // Your actions go here
  },
  getters: {
    list: state => state.items
  },
});