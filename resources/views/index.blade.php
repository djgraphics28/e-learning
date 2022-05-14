@extends('layouts.app')

@section('content')
<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url({{ asset('assets/img/intro-carousel/brunei.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">BRUNEI</h2>
                            <p class="animate__animated animate__fadeInUp">Independent Islamic sultanate on the northern coast of the island of Borneo in Southeast Asia. It is bounded to the north by the South China Sea and on all other sides by the East Malaysian state of Sarawak, which also divides the state into two disconnected segments of unequal size.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/burma.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">BURMA (MYANMAR)</h2>
                            <p class="animate__animated animate__fadeInUp">Myanmar, also called Burma, country, located in the western portion of mainland Southeast Asia. ... The English name of the city that served as the country's capital from 1948 to 2006, Rangoon, also was dropped in 1989 in favour of the common Burmese name, Yangon.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/cambodia.png') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">CAMBODIA</h2>
                            <p class="animate__animated animate__fadeInUp">Country on the Indochinese mainland of Southeast Asia. Cambodia is largely a land of plains and great rivers and lies amid important overland and river trade routes linking China to India and Southeast Asia.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/indonesia.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">INDONESIA</h2>
                            <p class="animate__animated animate__fadeInUp">The largest country in Southeast Asia, with a maximum dimension from east to west of about 3,200 miles (5,100 km) and an extent from north to south of 1,100 miles (1,800 km). It shares a border with Malaysia in the northern part of Borneo and with Papua New Guinea in the centre of New Guinea.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/laos.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">LAOS</h2>
                            <p class="animate__animated animate__fadeInUp">Landlocked country of northeast-central mainland Southeast Asia. It consists of an irregularly round portion in the north that narrows into a peninsula-like region stretching to the southeast. Overall, the country extends about 650 miles (1,050 km) from northwest to southeast.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/malaysia.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">MALAYSIA</h2>
                            <p class="animate__animated animate__fadeInUp">Boasts one of south-east Asia's most vibrant economies, the fruit of decades of industrial growth and political stability. Consisting of two regions separated by some 640 miles of the South China Sea, Malaysia is a multi-ethnic, multi-religious federation of 13 states and three federal territories.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/philippines.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">PHILIPPINES</h2>
                            <p class="animate__animated animate__fadeInUp">One of the world's largest archipelago nations. It is situated in Southeast Asia in the Western Pacific Ocean. Its islands are classified into three main geographical areas – Luzon, Visayas, and Mindanao. Because of its archipelagic nature, Philippines is a culturally diverse country.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/singapore.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">SINGAPORE</h2>
                            <p class="animate__animated animate__fadeInUp">A wealthy city state in south-east Asia. Once a British colonial trading post, today it is a thriving global financial hub and described as one of Asia's economic "tigers". It is also renowned for its conservatism and strict local laws and the country prides itself on its stability and security.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/thailand.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">THAILAND</h2>
                            <p class="animate__animated animate__fadeInUp">Located in the heart of mainland Southeast Asia, Thailand is a country of mountains, hills, plains and a long coastline along the Gulf of Thailand (1,875 km) and the Andaman Sea (740 km), not including the coastlines of some 400 islands, most of them in the Andaman Sea. ... Thai is the national and official language.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/timor-leste.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">TIMOR-LESTE</h2>
                            <p class="animate__animated animate__fadeInUp">Located in Southeast Asia, on the eastern half of Timor Island (400 miles northwest of Darwin, Australia). The western half of Timor Island is part of Indonesia. Timor-Leste (previously known as East Timor) was declared an Indonesian province in 1975 (previously colonised by Portugal).</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{ asset('assets/img/intro-carousel/vietnam.jpg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">VIETNAM</h2>
                            <p class="animate__animated animate__fadeInUp">A long, narrow nation shaped like the letter s. It is in Southeast Asia on the eastern edge of the peninsula known as Indochina. Its neighbors include China to the north and Laos and Cambodia to the west. The South China Sea lies to the east and south.</p>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section>
@endsection
