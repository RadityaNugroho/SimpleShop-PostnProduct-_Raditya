@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        } */
    </style>
@endpush


<div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-backface-hidden">
    <div class="swiper-wrapper" id="swiper-wrapper-1" aria-live="polite"
        style="transition-duration: 0ms;">

        @for ($i = 1; $i < 12; $i++)
            <div class="swiper-slide @if($i == 1) swiper-slide-active @elseif($i == 2) swiper-slide-next @endif" role="group"
                aria-label="{{ $i }}" style="margin-right: 30px;">
                <div class="img-container">
                    <img src="https://via.placeholder.com/100x100.png/CB997E/333333?text={{ $i }}" class="img-fluid rounded" alt="...">
                </div>
            </div>
        @endfor
    </div>

    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
        aria-controls="swiper-wrapper-1" aria-disabled="false"></div>
    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide"
        aria-controls="swiper-wrapper-1" aria-disabled="true"></div>

    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>


@push('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 7,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
