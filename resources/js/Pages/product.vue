<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link} from '@inertiajs/vue3';
import MapMarkerOutlineIcon from "vue-material-design-icons/MapMarkerOutline.vue";
import { toRefs,computed } from "vue";

import { useCartStore } from '@/store/cart';
import { storeToRefs } from "pinia";
const cartStore = useCartStore();
const { cart } = storeToRefs(cartStore);

const props = defineProps({ product : Object });
const { product } = toRefs(props);

const addToCart = (product) => {
    cart.value.push(product);
}

const isAlreadyInCart = (product) => {
    let res = cart.value.find(c => c.id === product.id);
    if (res) {
        return true;
    } else {
        return false;
    }
}
</script>

<template>
    <Head title="Product" />
    <AuthenticatedLayout>
         <div class="mt-16"></div>

        <div class="max-w-[1200px] mx-auto flex gap-4 justify-between">
           <div class="w-2/5">
               <img :src="product.image" alt="">
           </div>
            <div class="w-2/5">
                <div class="text-xl font-extrabold border-b border-b-gray-300 mb-2 pb-2">{{product.title}}</div>
                <div class="">
                    <div class="text-lg font-extrabold m-1">About This item </div>
                    <div>{{product.description}}</div>
                </div>
            </div>

            <div class="w-2/5">
                <div class="text-xl font-extrabold rounded-lg">
                    <div class="my-2 mx-3 mb-2">
                        <div class="flex items-center justify-center border-b border-gray-300 pb-1">
                            <Link v-if="$page.props.auth.user" :href="route('address.index')" class="flex items-center text-xs font-extrabold text-teal-700 hover:text-red-600 cursor-pointer">
                                <MapMarkerOutlineIcon :size="17"/> Delivery to {{$page.props.auth.user.first_name}} - {{$page.props?.auth?.address?.postcode}}
                            </Link>

                            <Link v-else :href="route('login')" class="flex items-center text-xs font-extrabold text-teal-700 hover:text-red-600">
                                SIGN IN
                            </Link>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <div class="text-red-600 text-sm font-bold">{{product.price}}</div>
                            <button :disabled="isAlreadyInCart(product)" @click="addToCart(product)" class="bg-yellow-400 px-2 font-bold text-sm rounded-lg border- shadow-sm cursor-pointer">
                                <span v-if="isAlreadyInCart">Item Added</span>
                                <span v-else>ADD TO BASKET</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
