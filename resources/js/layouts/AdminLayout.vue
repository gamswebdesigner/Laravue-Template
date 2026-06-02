<template>
    <div class="app-layout">

        <nav class="navbar">
            <div class="navbar-brand">
                <span class="brand-dot">■</span> MyApp
            </div>

            <button class="btn-logout" @click="logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
                Sair
            </button>
        </nav>

        <main class="main-content">
            <slot />
        </main>

    </div>
</template>

<script>
import { router } from '@inertiajs/vue3';

export default {
    name: 'AdminLayout',
    methods: {
        logout() {
            router.post(route('logout'));
        }
    }
};
</script>

<style scoped>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.app-layout {
    min-height: 100vh;
    background-color: #f4f5f7;
    display: flex;
    flex-direction: column;
}

/* ── NAVBAR ── */
.navbar {
    height: 60px;
    background-color: #ffffff;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 2rem;
    position: sticky;
    top: 0;
    z-index: 100;
}

.navbar-brand {
    font-size: 1.1rem;
    font-weight: 700;
    color: #111827;
    display: flex;
    align-items: center;
    gap: 8px;
}

.brand-dot {
    color: #6366f1;
    font-size: 0.7rem;
}

.btn-logout {
    display: flex;
    align-items: center;
    gap: 8px;
    background: none;
    border: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 0.875rem;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.15s;
}

.btn-logout:hover {
    border-color: #ef4444;
    color: #ef4444;
}

/* ── CONTEÚDO ── */
.main-content {
    flex: 1;
    padding: 2rem;
}
</style>
