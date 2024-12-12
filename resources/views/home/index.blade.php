<x-layout.eilinger>

    @section('title', 'Homepage')

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <x-heading.decorative class="text-center">
                    {{ __('home.about') }}
                </x-heading.decorative>

                <div class="grid md:grid-cols-2 gap-8 mt-8">
                    {{-- Philosophy Column --}}
                    <div class="space-y-4">
                        <h3 class="font-ubuntu text-[28px] font-bold leading-[1.2] text-black">
                            {{ __('home.philosophy') }}
                        </h3>
                        <p class="text-black leading-relaxed">
                            {{ __('home.philosophy_text1') }}
                        </p>
                        <p class="text-black leading-relaxed">
                            {{ __('home.philosophy_text2') }}
                        </p>
                    </div>

                    {{-- Purpose Column --}}
                    <div class="space-y-4">
                        <h3 class="font-ubuntu text-[28px] font-bold leading-[1.2] text-black">
                            {{ __('home.purpose') }}
                        </h3>
                        <p class="text-black leading-relaxed mb-4">
                            {{ __('home.purpose_text') }}:
                        </p>

                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="bi bi-check2-all text-accent text-xl mr-2"></i>
                                <span class="text-black">{{ __('home.purpose1') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check2-all text-accent text-xl mr-2"></i>
                                <span class="text-black">{{ __('home.purpose2') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check2-all text-accent text-xl mr-2"></i>
                                <span class="text-black">{{ __('home.purpose3') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check2-all text-accent text-xl mr-2"></i>
                                <span class="text-black">{{ __('home.purpose4') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check2-all text-accent text-xl mr-2"></i>
                                <span class="text-black">{{ __('home.purpose5') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Förderbereiche ======= -->
        <section id="our-values" class="bg-bodyBg py-16">
            <div class="container mx-auto px-4">
                <x-heading.decorative class="text-center">
                    {{ __('home.funding') }}
                </x-heading.decorative>

                <!-- First row -->
                <div class="grid md:grid-cols-2 gap-8 mt-8">
                    <!-- Education Card -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg h-[500px]">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ asset('images/Bildung_4.jpg') }}')">
                        </div>
                        <div class="absolute inset-0 px-5 pb-5 pt-[160px]">
                            <div
                                class="w-full h-full bg-white/90 group-hover:bg-[#4f73a8] transition-colors duration-300 rounded-lg">
                                <h3
                                    class="font-ubuntu text-[28px] font-bold text-center mb-4 text-primary group-hover:text-white pt-5">
                                    {{ __('home.education') }}
                                </h3>
                                <div class="px-8">
                                    <p
                                        class="text-[#5e5e5e] group-hover:text-white mb-4 transition-colors duration-300">
                                        {{ __('home.education_text1') }}
                                    </p>
                                    <p class="text-black group-hover:text-black">
                                        {{ __('home.education_text2') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- People in Need Card -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg h-[500px]">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ asset('images/Menschen_5.jpg') }}')">
                        </div>
                        <div class="absolute inset-0 px-5 pb-5 pt-[160px]">
                            <div
                                class="w-full h-full bg-white/90 group-hover:bg-[#4f73a8] transition-colors duration-300 rounded-lg">
                                <h3
                                    class="font-ubuntu text-[28px] font-bold text-center mb-4 text-primary group-hover:text-white pt-5">
                                    {{ __('home.need') }}
                                </h3>
                                <div class="px-8">
                                    <p
                                        class="text-[#5e5e5e] group-hover:text-white mb-4 transition-colors duration-300">
                                        {{ __('home.need_text1') }}
                                    </p>
                                    <p class="text-black group-hover:text-black">
                                        {{ __('home.need_text2') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second row -->
                <div class="grid md:grid-cols-2 gap-8 mt-8">
                    <!-- Animal Welfare Card -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg h-[500px]">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ asset('images/Tier_1.jpeg') }}')">
                        </div>
                        <div class="absolute inset-0 px-5 pb-5 pt-[160px]">
                            <div
                                class="w-full h-full bg-white/90 group-hover:bg-[#4f73a8] transition-colors duration-300 rounded-lg">
                                <h3
                                    class="font-ubuntu text-[28px] font-bold text-center mb-4 text-primary group-hover:text-white pt-5">
                                    {{ __('home.welfare') }}
                                </h3>
                                <div class="px-8">
                                    <p
                                        class="text-[#5e5e5e] group-hover:text-white mb-4 transition-colors duration-300">
                                        {{ __('home.welfare_text1') }}
                                    </p>
                                    <p class="text-black group-hover:text-black">
                                        {{ __('home.welfare_text2') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Environment Card -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg h-[500px]">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ asset('images/Umwelt.jpg') }}')">
                        </div>
                        <div class="absolute inset-0 px-5 pb-5 pt-[160px]">
                            <div
                                class="w-full h-full bg-white/90 group-hover:bg-[#4f73a8] transition-colors duration-300 rounded-lg">
                                <h3
                                    class="font-ubuntu text-[28px] font-bold text-center mb-4 text-primary group-hover:text-white pt-5">
                                    {{ __('home.environment') }}
                                </h3>
                                <div class="px-8">
                                    <p
                                        class="text-[#5e5e5e] group-hover:text-white mb-4 transition-colors duration-300">
                                        {{ __('home.environment_text1') }}
                                    </p>
                                    <p class="text-black group-hover:text-black">
                                        {{ __('home.environment_text2') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third row - centered -->
                <div class="mt-8 max-w-2xl mx-auto">
                    <!-- Human Rights Card -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg h-[500px]">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ asset('images/Menschen_4.jpg') }}')">
                        </div>
                        <div class="absolute inset-0 px-5 pb-5 pt-[160px]">
                            <div
                                class="w-full h-full bg-white/90 group-hover:bg-[#4f73a8] transition-colors duration-300 rounded-lg">
                                <h3
                                    class="font-ubuntu text-[28px] font-bold text-center mb-4 text-primary group-hover:text-white pt-5">
                                    {{ __('home.rights') }}
                                </h3>
                                <div class="px-8">
                                    <p
                                        class="text-[#5e5e5e] group-hover:text-white mb-4 transition-colors duration-300">
                                        {{ __('home.rights_text1') }}
                                    </p>
                                    <p class="text-black group-hover:text-black">
                                        {{ __('home.rights_text2') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Projekte Section ======= -->
        <section id="projekte" class="services">
            <div class="container">
                <div class="section-title">
                    <x-heading.decorative class="text-center">
                        {{ __('home.projects') }}
                    </x-heading.decorative>
                    <p>{{ __('home.projects_text1') }}</p>
                    <p>{{ __('home.projects_text2') }}</p>
                </div>

                <div class="services-grid">
                    <div class="service-item">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                            <h3 class="title">{{ __('home.project1_title') }}</h3>
                            <p class="description">{{ __('home.project1_text') }}</p>
                        </div>
                    </div>

                    <div class="service-item">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-card-checklist" style="color: #e9bf06;"></i></div>
                            <h3 class="title">{{ __('home.project2_title') }}</h3>
                            <p class="description">{{ __('home.project2_text') }}</p>
                        </div>
                    </div>

                    <div class="service-item">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-bar-chart" style="color: #3fcdc7;"></i></div>
                            <h3 class="title">{{ __('home.project3_title') }}</h3>
                            <p class="description">{{ __('home.project3_text') }}</p>
                        </div>
                    </div>

                    <div class="service-item">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-binoculars" style="color: #41cf2e;"></i></div>
                            <h3 class="title">{{ __('home.project4_title') }}</h3>
                            <p class="description">{{ __('home.project4_text') }}</p>
                        </div>
                    </div>

                    <div class="service-item">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-brightness-high" style="color: #d6ff22;"></i></div>
                            <h3 class="title">{{ __('home.project5_title') }}</h3>
                            <p class="description">{{ __('home.project5_text') }}</p>
                        </div>
                    </div>

                    <div class="service-item">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-calendar4-week" style="color: #4680ff;"></i></div>
                            <h3 class="title">{{ __('home.project6_title') }}</h3>
                            <p class="description">{{ __('home.project6_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ======= Gesuche ======= -->
        <section id="gesuche" class="pricing !bg-[#f3f5fa]">
            <div class="container">
                <div class="section-title">
                    <x-heading.decorative class="text-center">
                        {{ __('home.requests') }}
                    </x-heading.decorative>
                    <p>{{ __('home.request_text') }}</p>
                    <ol>
                        <li>{{ __('home.request_text1') }}</li>
                        <li>{{ __('home.request_text2') }}</li>
                        <li>{{ __('home.request_text3') }}</li>
                        <li>{{ __('home.request_text4') }}</li>
                        <li>{{ __('home.request_text5') }}</li>
                    </ol>
                    <p>{{ __('home.request_disclaimer') }}</p>
                    <br />
                    <p>{{ __('home.request_meeting') }}</p>
                </div>

                <div class="pricing-grid">
                    <div class="pricing-item">
                        <div class="box">
                            <h3>{{ __('home.education') }}</h3>
                            <ul>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_stip') }}</li>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_privat') }}</li>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_org') }}</li>
                            </ul>
                            <a href="{{ route('user_dashboard', app()->getLocale()) }}"
                                class="buy-btn">{{ __('home.to_portal') }}</a>
                        </div>
                    </div>

                    <div class="pricing-item">
                        <div class="box">
                            <h3>{{ __('home.welfare') }}</h3>
                            <ul>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_privat') }}</li>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_org') }}</li>
                            </ul>
                            <a href="{{ route('user_dashboard', app()->getLocale()) }}"
                                class="buy-btn">{{ __('home.to_portal') }}</a>
                        </div>
                    </div>

                    <div class="pricing-item">
                        <div class="box">
                            <h3>{{ __('home.rights') }}</h3>
                            <ul>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_privat') }}</li>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_org') }}</li>
                            </ul>
                            <a href="{{ route('user_dashboard', app()->getLocale()) }}"
                                class="buy-btn">{{ __('home.to_portal') }}</a>
                        </div>
                    </div>

                    <div class="pricing-item">
                        <div class="box">
                            <h3>{{ __('home.environment') }}</h3>
                            <ul>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_privat') }}</li>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_org') }}</li>
                            </ul>
                            <a href="{{ route('user_dashboard', app()->getLocale()) }}"
                                class="buy-btn">{{ __('home.to_portal') }}</a>
                        </div>
                    </div>

                    <div class="pricing-item">
                        <div class="box">
                            <h3>{{ __('home.need') }}</h3>
                            <ul>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_privat') }}</li>
                                <li><i class="bi bi-check-all"></i> {{ __('home.app_org') }}</li>
                            </ul>
                            <a href="{{ route('user_dashboard', app()->getLocale()) }}"
                                class="buy-btn">{{ __('home.to_portal') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

</x-layout.eilinger>
