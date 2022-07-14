import {defineStore} from "pinia";
import axios from "axios";
import sweet2 from "sweetalert2";

export const useAuthStore = defineStore('auth', {
    state: () => {
        return {
            user: {
                firstname: 'rytis', lastname: 'klimavicius', is_admin: false
            }
        }

    },
    getters: {
        userFullName(state) {
            return state.user.firstname + ' ' + state.user.lastname;
        },
        // async isLoggedInAdmin(){
        //     return new Promise((resolve, reject) => {
        //         axios.get('/api/user').then(res => {
        //             // console.log(res);
        //             resolve('confirmed');
        //         }).catch(e => {
        //             // console.log('caught it');
        //             reject('canceled');
        //         })
        //     });
        // },
    },
    actions: {
        checkIfLoggedInAsAdmin() {
            axios.get('/api/user').then(res => {
                this.user.is_admin = true;
            }).catch((err) => {
                this.user.is_admin = false;
            })
        }
    }
})
