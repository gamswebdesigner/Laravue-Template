<script setup>
import { useForm } from '@inertiajs/vue3'
import '@/pages/Auth/auth.css'

defineOptions({ layout: null })

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <div class="auth-container">
        <form @submit.prevent="submit" class="auth-card">
            <h2>Login</h2>

            <input type="email" v-model="form.email" placeholder="E-mail" required />
            <span v-if="form.errors.email" class="error">{{ form.errors.email }}</span>

            <input type="password" v-model="form.password" placeholder="Senha" required />
            <span v-if="form.errors.password" class="error">{{ form.errors.password }}</span>

            <label>
                <input type="checkbox" v-model="form.remember"> Lembrar-me
            </label>

            <button type="submit" :disabled="form.processing">
                {{ form.processing ? 'Entrando...' : 'Entrar' }}
            </button>

            <Link :href="route('password.request')">Esqueceu sua senha?</Link>
        </form>
    </div>
</template>
