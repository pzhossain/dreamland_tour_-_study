<template>
  <div class="container py-5">
    <div class="card shadow-sm rounded-4 p-4">
      <div class="text-center position-relative mb-4">
        <img :src="avatarPreview" alt="Profile" class="profile-img" />
        <label for="avatarInput" class="upload-btn">
          <i class="fa fa-camera"></i>
          <input type="file" id="avatarInput" accept="image/*" class="d-none" @change="handleImageChange" />
        </label>
      </div>

      <form @submit.prevent="submitForm">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input v-model="form.name" type="text" class="form-control" placeholder="Your name" />
          </div>
          <div class="col-md-6">
            <label class="form-label">Email Address</label>
            <input v-model="form.email" type="email" class="form-control" placeholder="your@email.com" />
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input v-model="form.phone" type="text" class="form-control" placeholder="+8801XXXXXXX" />
          </div>
          <div class="col-md-6">
            <label class="form-label">Address</label>
            <input v-model="form.address" type="text" class="form-control" placeholder="Your address" />
          </div>
        </div>

        <div class="mt-4 text-end">
          <button type="submit" class="btn btn-primary px-4">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
  name: "",
  email: "",
  phone: "",
  address: "",
  image: null,
});

const avatarPreview = ref("https://via.placeholder.com/150");

function handleImageChange(event) {
  const file = event.target.files[0];
  form.value.image = file;

  const reader = new FileReader();
  reader.onload = () => {
    avatarPreview.value = reader.result;
  };
  if (file) reader.readAsDataURL(file);
}

function submitForm() {
  form.post("/profile", {
    preserveScroll: true,
    onSuccess: () => {
      if (page.props.flash.status == true) {
        toaster.success(page.props.flash.message);
      } else if (page.props.flash.status == false) {
        toaster.error(page.props.flash.message);
      }
    },
  });
}
</script>

<style scoped>
.profile-img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  border: 4px solid #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.upload-btn {
  position: absolute;
  bottom: 0;
  right: 0;
  background-color: #fff;
  border-radius: 50%;
  padding: 5px;
  border: 1px solid #ccc;
  cursor: pointer;
}

.upload-btn:hover {
  background-color: #f8f9fa;
}
</style>
