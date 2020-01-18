<template>
    <button @click="add"
            class="add-to-cart btn btn-icon pull-right"
            type="submit">
        <i class="fa fa-shopping-cart"></i>
    </button>
</template>

<script>
    export default {
        name: "AddToCart",
        props: ['menu'],
        methods: {
            add() {
                const menu = {
                    id: this.menu.id,
                    title: this.menu.title,
                };

                this.$eventBus.$emit('add-to-cart', menu);
            }
        },
    }
</script>
