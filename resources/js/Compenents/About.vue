<script setup>
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
</script>

<template>
    <!-- Header Start -->
    <div
        class="container-fluid bg-breadcrumb"
        :style="{
            backgroundImage: `url(/storage/pageContent/${page.props.aboutContent.image})`,
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: 'no-repeat',
        }"
    >
        <!-- content here -->
        <div class="container text-center py-5" style="max-width: 900px">
            <h3 class="text-white display-3 mb-4">
                {{ page.props.aboutContent.title }}
            </h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">About</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Left side image -->
                <div class="col-lg-5">
                    <div
                        class="h-100"
                        style="
                            border: 50px solid;
                            border-color: transparent #13357b transparent
                                #13357b;
                        "
                    >
                        <img
                            src="../img/about-img.jpg"
                            class="img-fluid w-100 h-100"
                            alt=""
                        />
                    </div>
                </div>

                <!-- Right side content -->
                <div
                    class="col-lg-7"
                    style="
                        background: linear-gradient(
                                rgba(255, 255, 255, 0.8),
                                rgba(255, 255, 255, 0.8)
                            ),
                            url('../img/about-img-1.png');
                        background-size: cover;
                        background-position: center;
                        padding: 30px;
                        border-radius: 10px;
                    "
                >
                    <div v-html="page.props.aboutContent.description"></div>
                    <!-- Button (this needs to be properly formed) -->
                    <a
                        href="#"
                        class="btn btn-primary rounded-pill py-3 px-5 mt-2"
                        >Read More</a
                    >
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->

    <!-- Travel Guide Start -->
    <!-- <div class="container-fluid guide py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px">
                <h5 class="section-title px-3">Travel Guide</h5>
                <h1 class="mb-0">Meet Our Guide</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img
                                    src="../img/guide-1.jpg"
                                    class="img-fluid w-100 rounded-top"
                                    alt="Image"
                                />
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-facebook-f"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-twitter"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-instagram"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-linkedin-in"></i
                                ></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img
                                    src="../img/guide-2.jpg"
                                    class="img-fluid w-100 rounded-top"
                                    alt="Image"
                                />
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-facebook-f"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-twitter"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-instagram"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-linkedin-in"></i
                                ></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img
                                    src="../img/guide-3.jpg"
                                    class="img-fluid w-100 rounded-top"
                                    alt="Image"
                                />
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-facebook-f"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-twitter"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-instagram"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-linkedin-in"></i
                                ></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img
                                    src="../img/guide-4.jpg"
                                    class="img-fluid w-100 rounded-top"
                                    alt="Image"
                                />
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-facebook-f"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-twitter"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-instagram"></i
                                ></a>
                                <a
                                    class="btn btn-square btn-primary rounded-circle mx-1"
                                    href=""
                                    ><i class="fab fa-linkedin-in"></i
                                ></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Travel Guide End -->
</template>

<style scoped></style>
