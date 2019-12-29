<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Plaats je bestelling</h3>
        </div>

        <div class="alert" :class="feedbackClass" role="alert" v-if="feedback.message" v-text="feedback.message"></div>

        <div class="card-body">
            <table class="table table-borderless" id="cartTable">
                <thead>
                    <th>Menu</th>
                    <th>Aantal</th>
                    <th></th>
                </thead>

                <tbody class="cart-items">
                    <vue-cart-item v-for="(menu, index) of menus"
                                   :key="menu.title"
                                   :index="index"
                                   :menu="menu"
                                   @updateQuantity="updateQuantity">
                    </vue-cart-item>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div>
                <button type="submit" id="cart-submit" class="btn btn-primary" @click="order">Bestellen</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

  export default {
    name: "Cart",
    props: ['dataMenus', 'routePost', 'routeSession'],
    data() {
      return {
        menus: [],
        feedback: {
          isError: false,
          message: undefined
        }
      }
    },
    computed: {
      feedbackClass() {
        return {
          'alert-success': !this.feedback.isError,
          'alert-danger': this.feedback.isError
        }
      }
    },
    methods: {
      updateQuantity({ index, quantity }) {
        this.menus[index].quantity = quantity;
        this.save();
      },
      save() {
        axios.post(this.routeSession, this.menus);
      },
      order() {
        if(this.menus.length === 0) {
          return;
        }

        axios.post(this.routePost, { cart: this.menus }
        ).then( response => {
          this.setFeedback(response.data);
        }).catch( error => {
          this.setFeedback(error.response.data, true);
        })
      },
      setFeedback(message, isError = false) {
        this.feedback.message = message;
        this.feedback.isError = isError;
      }
    },
    created() {
      // Get data from session
      if (this.dataMenus) {
        this.menus = this.dataMenus;
      }

      // Listen for event from the event bus
      this.$eventBus.$on('add-to-cart', menu => {
        let isAdded = false;

        // Check if item is already in cart
        for (let m of this.menus) {
          // if so update quantity
          if (m.title === menu.title) {
            m.quantity++;
            isAdded = true;
            break;
          }
        }

        // If not, set new menu item
        if(!isAdded) {
          this.menus.push({
            ...menu, // copy object
            quantity: 1
          });
        }

        this.save();
      });

      // Listen for event from the event bus
      this.$eventBus.$on('remove-from-cart', index => {
        this.menus.splice(index, 1);
        this.save();
      });
    }
  }
</script>
