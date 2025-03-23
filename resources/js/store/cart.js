// stores/counter.js
import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
    state: () => {
        return { cart: [] }
    },
    actions: {
        removeProductFromCart(productId) {
            this.cart.forEach((product,index) => {
                if (product.id === productId) {
                    this.cart.splice(index, 1)
                }
            })
        },

        addToCart(product) {
            this.cart.push(product)
        },

        clearCart() {
            this.cart = []
        },
        increment(product) {
            product.quantity++
        },
        decrement(product) {
            if (product.quantity > 1) {
                product.quantity--
            }
        },
        total() {
            return this.cart.reduce((total, product) => {
                return total + product.price * product.quantity
            }, 0)
        },
        count() {
            return this.cart.reduce((total, product) => {
                return total + product.quantity
            }, 0)
        },
        products() {
            return this.cart
        },
        productQuantity(id) {
            const product = this.cart.find((item) => item.id === id)
            return product ? product.quantity : 0
        },
        productTotal(id) {
            const product = this.cart.find((item) => item.id === id)
            return product ? product.quantity * product.price : 0
        },
        productPrice(id) {
            const product = this.cart.find((item) => item.id === id)
            return product ? product.price : 0
        },
        productImage(id) {
            const product = this.cart.find((item) => item.id === id)
            return product ? product.image : ''
        },
    },

    persist: true
})
