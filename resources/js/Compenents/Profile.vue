<script setup>
import { usePage, useForm } from "@inertiajs/vue3";
import { createToaster } from "@meforma/vue-toaster";
import { router, Link } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const errors = computed(() => page.props.flash.errors || {});
const toaster = createToaster({});

const customerId = new URLSearchParams(window.location.search).get(
    "customer_id"
);
const customer = page.props.customer;

const form = useForm({
    name: "",
    email: "",
    phone: "",
    address: "",
});

let URL = "/customer";
if (customerId != 0 && customer != null) {
    form.name = customer.name;
    form.phone = customer.phone;
    form.address = customer.address;
    URL = `/customer/${customerId}`;
}

function submitForm() {
    form.post(URL, {
        preserveScroll: true,
        onSuccess: () => {
            if (page.props.flash.status == false) {
                toaster.error(page.props.flash.message);
            } else if (page.props.flash.status == true) {
                toaster.success(page.props.flash.message);
                router.visit("/customers");
            }
        },
    });
}
</script>

<template>
    <!-- <div class="container py-5">
        <form
            @submit.prevent="submitForm"
            class="mx-auto card p-4 shadow"
            style="max-width: 600px"
        >
            <div class="d-flex justify-content-end mb-3">
                <Link href="/customers" class="btn btn-success">Back</Link>
            </div>

            <h2 class="mb-4 h4">
                {{ customerId == 0 ? "Add Customer" : "Update Customer" }}
            </h2>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    id="name"
                    class="form-control"
                />
                <div v-if="errors.name" class="text-danger small mt-1">
                    {{ errors.name[0] }}
                </div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input
                    v-model="form.phone"
                    type="text"
                    id="phone"
                    class="form-control"
                />
                <div v-if="errors.phone" class="text-danger small mt-1">
                    {{ errors.phone[0] }}
                </div>
            </div>

            <div class="mb-4">
                <label for="address" class="form-label">Address</label>
                <input
                    v-model="form.address"
                    type="text"
                    id="address"
                    class="form-control"
                />
                <div v-if="errors.address" class="text-danger small mt-1">
                    {{ errors.address[0] }}
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">
                {{ customerId == 0 ? "Add Customer" : "Update Customer" }}
            </button>
        </form>
    </div> -->
</template>

<style scoped></style>
