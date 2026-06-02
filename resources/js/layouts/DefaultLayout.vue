<!-- resources/js/Layouts/DefaultLayout.vue -->
<script setup>
import { ref } from 'vue'

// Exemplo de estado reativo para mostrar que o layout não reinicia entre as páginas
const contador = ref(0)
</script>

<template>
    <div class="layout-container">
        <!-- NAVBAR FIXA -->
        <nav class="navbar">
            <div class="logo">Meu App Template</div>
            <div class="nav-links">
                <!-- Usando o <Link> global e o route() do Ziggy -->
                <Link :href="route('home')" class="nav-item">Home</Link>
                <Link :href="route('semLayout')" class="nav-item">Demo Sem Layout</Link>
                <Link :href="route('login')" class="nav-item">Login</Link>
            </div>
            <div class="demo-state">
                <button @click="contador++">Estado Global: {{ contador }}</button>
            </div>
        </nav>

        <!-- CONTEÚDO DINÂMICO DA PÁGINA -->
        <main class="main-content">
            <!-- O slot padrão é onde o Inertia vai injetar a página atual -->
            <slot />
        </main>

        <!-- FOOTER -->
        <footer class="footer">
            <p>&copy; 2026 - Criado com Laravel + Inertia + Vue</p>
        </footer>
    </div>
</template>

<style scoped>
/* Um estilo básico apenas para você visualizar a estrutura */
.layout-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    font-family: system-ui, sans-serif;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    background-color: #1f2937;
    color: white;
}

.nav-links {
    display: flex;
    gap: 1.5rem;
}

.nav-item {
    color: #9ca3af;
    text-decoration: none;
}

.nav-item:hover {
    color: white;
}

.main-content {
    flex: 1;
    padding: 2rem;
    background-color: #f3f4f6;
}

.footer {
    text-align: center;
    padding: 1rem;
    background-color: #e5e7eb;
    color: #4b5563;
}

.demo-state button {
    background: #3b82f6;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}
</style>
