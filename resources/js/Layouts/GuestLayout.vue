<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-6"
    >
        <div>
            <Link href="/">
                <img class="h-12 fill-current text-gray-500" src="/images/logo/AMAZON_LOGO_DARK.png" alt="">
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 border shadow-md border-gray-300 max-w-[400px] rounded-sm"
        >
            <slot />
        </div>

        <div class="w-[400px]" v-if="$page.url === '/login'">
          <div class="text-center text-sm text-gray-600 font-bold py-4">New to Amazon?</div>
          <div class="w-full border border-gray-500 bg-gray-200 text-sm font-extrabold p-2 hover:bg-gray-300 text-center">
              <Link :href="route('register')">
                  create Your Amazon account
              </Link>
          </div>
      </div>
    </div>
</template>
