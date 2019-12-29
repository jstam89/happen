<template>
    <tr>
        <td class="cart-item-title" v-text="menu.title">    </td>
        <td>
            <input type="number" class="form-control" :value="menu.quantity" @change="updateQuantity">
        </td>
        <td class="d-flex align-content-end">
            <a id="cart-item-delete" class="btn btn-sm btn-icon cart-delete" href="#" role="button" @click="remove">
                <i class="fas fa-times"></i>
            </a>
        </td>
    </tr>
</template>

<script>
  export default {
    name: "CartItem",
    props: ['menu', 'index'],
    methods: {
      remove() {
        // Trigger action in the event bus
        this.$eventBus.$emit('remove-from-cart', this.index);
      },
      updateQuantity(e) {
        // IMPORTANT!!! emits to parent component not event bus!
        this.$emit('updateQuantity', {
          index: this.index,
          quantity: parseInt(e.target.value)
        })
      }
    }
  }
</script>
