import {defineStore} from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => {
        return {
            user: {
                first_name: 'rytis', lastname_name: 'rytis', is_admin: true
            }
        }
    }
})
