<script setup>
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
// Slug convert function
function toSlug(text) {
    return text
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^\w-]+/g, "");
}
</script>

<template>
    <div class="container-fluid position-relative p-0">
        <nav
            class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0"
        >
            <a href="" class="navbar-brand p-0">
                <h1 class="m-0">
                    <i class="fa fa-map-marker-alt me-3"></i>Travela
                </h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
            >
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <Link href="/" class="nav-item nav-link active">Home </Link>
                    <Link href="/about" class="nav-item nav-link">About</Link>
                    <Link href="/services" class="nav-item nav-link"
                        >Services</Link
                    >
                    <!-- <Link href="/blog" class="nav-item nav-link">Blog</Link> -->
                    <div class="nav-item dropdown">
                        <a
                            href="#"
                            class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown"
                            >Countries</a
                        >
                        <div class="dropdown-menu m-0">
                            <Link
                                v-for="page in page.props.pages"
                                :key="page.id"
                                :href="`/${toSlug(page.page_name)}`"
                                class="dropdown-item"
                            >
                                {{ page.page_name }}
                            </Link>

                            <!-- <Link href="/destination" class="dropdown-item"
                                >Destination</Link>
                            <Link href="/tour" class="dropdown-item"
                                >Explore Tour</Link>
                            <Link href="/booking" class="dropdown-item"
                                >Travel Booking</Link>
                            <Link href="/gallery" class="dropdown-item"
                                >Our Gallery</Link>
                            <Link href="/guides" class="dropdown-item"
                                >Travel Guides</Link>
                            <Link href="/testimonial" class="dropdown-item"
                                >Testimonial</Link> -->
                        </div>
                    </div>
                    <Link href="/contact" class="nav-item nav-link"
                        >Contact</Link
                    >
                </div>
                <Link
                    href="/booking"
                    class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4"
                    >Book Now</Link
                >
            </div>
        </nav>
    </div>
</template>

<style scoped></style>
