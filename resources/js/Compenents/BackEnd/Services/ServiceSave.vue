<script setup>
import { usePage, useForm, router } from "@inertiajs/vue3";
import { createToaster } from "@meforma/vue-toaster";
import { ref, computed } from "vue";
import ServiceImage from "./ServiceImage.vue";

const toaster = createToaster();
const page = usePage();
const service_id = new URLSearchParams(window.location.search).get("service_id") ?? 0;
const service = page.props.service;
const errors = computed(() => page.props.errors || {});


const form = useForm({
    service_id: service_id,
    service_category_id: "",
    service_description: "",
    service_image: "",
});

if(service_id != 0 && service != null){
    form.service_description = service.service_description;
    form.service_image = service.service_image;
}

const URL = service_id != 0 ? `/admin/service/${service_id}` : "/admin/service";

function submitForm() {
  form.post(URL, {
    preserveScroll: true,
    onSuccess: () => {
      if (page.props.flash.status == true) {
        toaster.success(page.props.flash.message);
        router.get("/admin/services");
      } else if (page.props.flash.status == false) {
        toaster.error(page.props.flash.message);
      }
    },
  });
}

</script>

<template>
  <div class="container-fluid vh-100 d-flex justify-content-center">
    <div class="row w-100 justify-content-center">
      <!-- Booking Form -->
      <div class="col-md-6">
        <div class="card shadow p-4 bg-white">
          <h4 class="text-center mb-3">{{ service_id == 0 ? "Create Service" : "Update Service" }}</h4>
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label class="form-label">Service Description</label>
              <textarea v-model="form.service_description" type="text" class="form-control">
              </textarea>
              <div v-if="errors.service_description" class="text-danger">{{ errors.service_description[0] }}</div>
            </div>

            <div class="mb-3">
              <ServiceImage :serviceImage="form.image" @image="(e)=> form.image = e" />
              <div v-if="errors.image" class="text-danger">{{ errors.image[0] }}</div>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">
                {{ service_id == 0 ? "Create Country" : "Update Country" }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
