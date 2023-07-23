<template>
    <div>
        <Nav></Nav>

        <div>
            <slot></slot>
        </div>

        <Footer></Footer>
    </div>
</template>

<script setup>
import Nav from './Nav.vue'
import Footer from './Footer.vue'
</script>
