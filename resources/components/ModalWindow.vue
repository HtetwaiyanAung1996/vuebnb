<template>
    <div id="modal" :class="{ show : modalOpen }">
        <button @click="modalOpen = false" class="modal-close">&times;</button>
        <div class="modal-content">
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
    
</style>