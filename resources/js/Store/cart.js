import { createStore } from 'vuex';

export default createStore({
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