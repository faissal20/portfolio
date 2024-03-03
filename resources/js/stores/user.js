import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
    state: () => ({
        _id: null,
        _name: null,
        _email: null,
        _username: null,
        _username: null,
        _role : null,
    }),

    getters: {
        id: (state) => state._id,
        name: (state) => state._name,
        email: (state) => state._email,
        username: (state) => state._username,
        role: (state) => state._role,
    },
    actions: {
        setUser(data) {
            this.setId(data.id)
            this.setName(data.name)
            this.setEmail(data.email)
            this.setUsername(data.username)
            this.setRole(data.role)
        },

        setId(value) {
            this._id = value
        },
        
        setName(value) {
            this._name = value
        },

        setEmail(value) {
            this._email = value
        },

        setUsername(value) {
            this._username = value
        },

        setRole(value) {
            this._role = value
        },
    },
})