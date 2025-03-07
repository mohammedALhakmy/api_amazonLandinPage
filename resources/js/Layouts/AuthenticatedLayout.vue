<script setup>
import { ref } from 'vue';
import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue';
import MeunDownIcon  from 'vue-material-design-icons/MenuDown.vue';
import MagnifyIcon  from 'vue-material-design-icons/Magnify.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="bg-gray-100 h-full min-w-[1150px] ">
        <div class="flex items-center bg-gray-900 h-[60px] py-2 fixed z-50 min-w-[1150px] w-full">

            <div class="flex">
                <Link
                    class="text-white h-[50px] p-2 pt-3 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                AMAZON
                </Link>
            </div>

            <div
                class="text-white h-[50px] p-2 pt-3 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                <div class="flex justify-center items-center">
                    <MapMarkerOutlineIcon class="pt-2 -ml-1" fillColor="#f5f5f5"/>

                    <div>

                        <div class="text-[13px] text-gray-300 font-extrabold">
                            <div>Delivery to John</div>
                        </div>

                        <div class="text-[15px] text-white -ml-1.5 font-extrabold">
                            <div>London SW2 SW2</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center grow h-[45px] px-1">
                <div class="flex items-center justify-center font-extrabold border border-r bg-gray-100 border-r-gray-300 text-[11px] text-gray-600 w-[60px] h-[40px] rounded-l-md cursor-pointer">
                    <div class="pt-[3px]">All</div>
                    <MeunDownIcon fillColor="#5E5E5E" :size="20" class="-mr-2"/>
                </div>
                <input class="block w-full border border-transparent border-none foucs:border-transparent focus:ring-0" type="text"/>
                <div class="px-2 bg-orange-300 cursor-pointer p-[5px] rounded-r-md">
                    <MagnifyIcon :size="30"/>
                </div>
            </div>
            <div class="flex">
                <div class="h-[50px] p-2 pt-3 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex justify-center items-center px-1 mt-2.5">
                        <img src="https://via.placeholder.com/35x20" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
