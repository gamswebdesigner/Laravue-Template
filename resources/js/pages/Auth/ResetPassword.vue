<script setup>
import { useForm } from '@inertiajs/vue3'
import '@/pages/Auth/auth.css'

defineOptions({ layout: null })

const props = defineProps({
    token: String,
    email: String,
})

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <div class="auth-container">
        <form @submit.prevent="submit" class="auth-card">
            <h2>Nova Senha</h2>
            <p>Defina sua nova senha abaixo.</p>

            <input type="email" v-model="form.email" placeholder="E-mail" required />
            <span v-if="form.errors.email" class="error">{{ form.errors.email }}</span>

            <input type="password" v-model="form.password" placeholder="Nova Senha" required />
            <span v-if="form.errors.password" class="error">{{ form.errors.password }}</span>

            <input type="password" v-model="form.password_confirmation" placeholder="Confirmar Senha" required />
            <span v-if="form.errors.password_confirmation" class="error">{{ form.errors.password_confirmation }}</span>

            <button type="submit" :disabled="form.processing">
                {{ form.processing ? 'Salvando...' : 'Redefinir Senha' }}
            </button>

            <Link :href="route('login')">Voltar ao Login</Link>
        </form>
    </div>
</template>
