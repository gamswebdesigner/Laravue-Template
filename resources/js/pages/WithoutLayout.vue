<!-- resources/js/Pages/Login.vue -->
<script setup>
defineOptions({
    layout: null
})
</script>

<template>
    <div class="login-page">
        <h1>Tela de Login</h1>
        <p>Esta página está totalmente limpa, sem a Navbar ou Footer do layout padrão!</p>
        <Link :href="route('home')">Voltar para a Home</Link>
    </div>
</template>

<style scoped>
.login-page {
    background-color: #111827;
    color: white;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>
