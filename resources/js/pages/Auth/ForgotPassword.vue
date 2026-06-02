<script setup>
import { useForm } from '@inertiajs/vue3'
import '@/pages/Auth/auth.css'

defineOptions({ layout: null })

const form = useForm({ email: '' })

const submit = () => {
    form.post(route('password.email'))
}
</script>

<template>
    <div class="auth-container">
        <form @submit.prevent="submit" class="auth-card">
            <h2>Recuperar Senha</h2>
            <p>Insira seu e-mail e enviaremos um link de redefinição.</p>

            <div v-if="$page.props.flash?.status" class="success">
                {{ $page.props.flash.status }}
            </div>

            <input type="email" v-model="form.email" placeholder="Seu E-mail" required />
            <span v-if="form.errors.email" class="error">{{ form.errors.email }}</span>

            <button type="submit" :disabled="form.processing">
                {{ form.processing ? 'Enviando...' : 'Enviar Link' }}
            </button>

            <Link :href="route('login')">Voltar ao Login</Link>
        </form>
    </div>
</template>
