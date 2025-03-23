<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link, Head, useForm, usePage} from '@inertiajs/vue3';
import { toRefs} from "vue";
import MapMarkerOutlineIcon from "vue-material-design-icons/MapMarkerOutline.vue";
import PlusIcon from "vue-material-design-icons/Plus.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
const props = defineProps({ address : Object,address_auth:Object });
const { address } = toRefs(props);

let show = true;

const form = useForm({
    country : 'yemen',
    first_name : usePage().props?.auth?.user?.first_name,
    last_name : usePage().props?.auth?.user?.last_name,
    addr1 : props?.address_auth?.addr1,
    addr2 : props?.address_auth?.addr2,
    city : props?.address_auth?.city,
    postcode : props?.address_auth?.postcode,
});

const submit = () => {
    form.post(route('address_options.store'),{
        onFinish: () => route('address.index'),
    });
}
</script>

<template>
    <Head title="Address" />
    <AuthenticatedLayout >
        <div class="mt-8"></div>

        <div class="w-[500px] mx-auto text-2xl font-extrabold">
            <div class="">Add a new Address</div>

            <form @submit.prevent="submit">
                <div class="text-[15px] -mb-1.5 font-extrabold">Country</div>
                <select name="country" v-model="form.country" id="" class="w-full border-gray-300 rounded-lg shadow-md py-1 bg-gray-200 hover:bg-gray-300 cursor-pointer focus:border-orange-400 focus:ring-orange-400">
                    <option selected value="yemen">Yemen</option>
                    <option value="SA">SA</option>
                    <option value="EG">EG</option>
                </select>

                <div class="mt-4">
                    <InputLabel for="first_name"   value="First Name" calss="-mb-1.5" />
                    <TextInput type="text" v-model="form.first_name"  class="mt-1 block w-full" required/>
                </div>

                <div class="mt-4">
                    <InputLabel for="last_name" value="Last Name" calss="-mb-1.5" />
                    <TextInput type="text" v-model="form.last_name"  class="mt-1 block w-full" required/>
                </div>

                <div class="mt-4">
                    <InputLabel for="address" value="Address" calss="-mb-1.5" />
                    <TextInput type="text" class="mt-1 block w-full" v-model="form.addr1" placeholder="Address Line 1" required/>
                    <TextInput type="text" class="mt-1 block w-full" v-model="form.addr2" placeholder="Address Line 2" required/>
                </div>

                <div class="mt-4">
                    <div class="flex gap-2">
                        <div class="w-full">
                            <InputLabel for="address" value="City" calss="-mb-1.5" />
                            <TextInput type="text" class="mt-1 block w-full" v-model="form.city" placeholder="City" required/>
                        </div>
                        <div class="w-full">
                            <InputLabel for="address" value="PostCode" calss="-mb-1.5" />
                            <TextInput type="text" class="mt-1 block w-full" v-model="form.postcode" placeholder="PostCode" required/>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button class="bg-yellow-400 px-3 font-bold text-[14px] rounded-lg shadow-sm cursor-pointer">Add Address</button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>

</template>

<style scoped>

</style>
