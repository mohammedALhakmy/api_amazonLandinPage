<script setup>
import { Link} from '@inertiajs/vue3';
import { toRefs } from "vue";
const props = defineProps({product: Object});
const {product} = toRefs(props);
</script>

<template>
    <div class="border border-gray-300 rounded-md bg-white p-1.5">
        <Link :href="route('product.index', product.id)">
            <img class="rounded-md" :src="product.image" alt="">
            <div class="text-left">
                <div class="text-[16px] text-gray-900 font-extrabold cursor-pointer">
                    {{product.title}}
                </div>

                <div class="flex justify-between items-center">
                    <div class="text-2xl p-1 font-semibold w-full text-left">${{product.price}}</div>
                    <img src="/images/logo/PRIME_LOGO.png" width="80" alt="">
                </div>

                <div class="flex justify-between items-center">
                    <div class="text-2xl p-1 font-semibold w-full text-left">In Stock</div>
                </div>

                <div class="flex justify-between items-center">
                    <img src="/images/STARS.png" width="80" alt="">
                </div>
            </div>
        </Link>
    </div>
</template>
