<template>

</template>

<script>

import sweet2 from 'sweetalert2'

export default {
    name: 'Notification',
    data() {
        return {}
    },
    methods: {
        success(title) {
            const Toast = sweet2.mixin({
                toast: true,
                position: 'bottom',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: title
            })

        },
        warning(title) {
            const Toast = sweet2.mixin({
                toast: true,
                position: 'bottom',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'warning',
                title: title
            })
        },
        confirm() { //return a PROMISE
            return new Promise((resolve, reject) => {
                sweet2.fire({
                    icon: 'warning',
                    text: 'Are you sure you want to delete this?',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    confirmButtonColor: '#e3342f',
                }).then((result) => {
                    if (result.isConfirmed) {
                        resolve('confirmed');
                    } else {
                        reject('canceled');
                    }
                })
            });
        }
    },
    mounted() {
        console.log('notification comps is mounted')
    }
}

</script>

<style>

</style>
