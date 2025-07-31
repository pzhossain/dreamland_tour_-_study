<script setup>
import { useForm,usePage,router, Link } from '@inertiajs/vue3';
import { createToaster } from "@meforma/vue-toaster";
import { computed } from 'vue';

const page=usePage();
const toaster=createToaster({ });
const errors=computed(() => page.props.errors|| {});


const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
});

const submitForm=() => {
    form.post('/user-registration',{
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            if(page.props.flash.status==true){
                toaster.success(page.props.flash.message);
                router.get('/login');
            }else if(page.props.flash.status==false){
                toaster.error(page.props.flash.message);
            }
        }
    });
};


</script>

<template>
  <div class="register-wrapper">
    <div class="register-box">
      <h2>Create Your Travel Account</h2>
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input v-model="form.name" type="text" class="form-control" placeholder="Enter your name">
          <p v-if="errors.name" class="text-danger mt-2">{{ errors.name[0] }}</p>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input v-model="form.email" type="email" class="form-control" id="email" placeholder="Enter your email">
          <p v-if="errors.email" class="text-danger mt-2">{{ errors.email[0] }}</p>
        </div>

        <div class="mb-3">
          <label for="mobile" class="form-label">Mobile Number</label>
          <input v-model="form.phone" type="tel" class="form-control" id="mobile" placeholder="01XXXXXXXXX">
          <p v-if="errors.phone" class="text-danger mt-2">{{ errors.phone[0] }}</p>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input v-model="form.password" type="password" class="form-control" id="password" placeholder="Create a password">
          <p v-if="errors.password" class="text-danger mt-2">{{ errors.password[0] }}</p>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-travel text-white">Register</button>
        </div>

        <div class="text-center">
          <p class="mb-0">Already have an account? <Link href="/login" class="text-decoration-none">Login</Link></p>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
.register-wrapper {
  background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
              url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1600&q=80')
              no-repeat center center / cover;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.register-box {
  background-color: #ffffffee;
  padding: 35px;
  border-radius: 15px;
  max-width: 450px;
  width: 100%;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.register-box h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #0d6efd;
}

.btn-travel {
  background-color: #0d6efd;
  border: none;
}

.btn-travel:hover {
  background-color: #084298;
}
</style>
