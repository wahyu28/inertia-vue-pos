<template>
    <head>
        <title>Login Account - Aplikasi Kasir</title>
    </head>
    <div class="col-md-4">
        <div class="fade-in">
            <div class="text-center mb-4">
                <a href="" class="text-dark text-decoration-none">
                    <img src="/images/cash-machine.png" width="70">
                    <h3 class="mt-2 font-weight-bold">APLIKASI KASIR</h3>
                </a>
            </div>
            <div class="card-group">
                <div class="card border-top-purple border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="text-start">
                            <h5>LOGIN ACCOUNT</h5>
                            <p class="text-muted">Sign in to your account</p>
                        </div>
                        <hr>
                        <div v-if="session.status" class="alert alert-success mt-2">
                            {{ session.status }}
                        </div>
                        <form @submit.prevent="submit">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" v-model="form.email" :class="{'is-invalid': errors.email}" placeholder="Email Adress">
                            </div>
                            <div v-if="errors.email" class="alert alert-danger">
                                {{ errors.email }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" v-model="form.password" :class="{ 'is-invalid': errors.password }" type="password" placeholder="Password">
                            </div>
                            <div v-if="errors.password" class="alert alert-danger">
                                {{ errors.password }}
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3 text-end">
                                    <Link href="/forgot-password">Forgot Password?</Link>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary shadow-sm rounded-sm px-4 w-100" type="submit">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue';
import LayoutAuth from '../../Layouts/Auth';
import {Inertia} from '@inertiajs/inertia';

import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

export default {
    layout: LayoutAuth,

    components: {
        Head, Link
    },

    props: {
        errors: Object,
        session: Object
    },

    setup() {
        const form = reactive({
            email: '',
            password: '',
        });

        const submit = () => {
            Inertia.post('/login', {
                email: form.email,
                password: form.password,
            });
        }

        return {
            form,
            submit
        };
    }
}
</script>