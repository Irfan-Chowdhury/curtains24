<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FNOMAD CURTAINS - Dubai</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    {{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets_visitor/css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('visitor-css')
</head>

<body>



    @include('visitor.partials.navbar')

    @yield('content-visitor')

    @include('visitor.partials.whatsapp')


    @include('visitor.partials.footer')



    <!-- Bootstrap JS and dependencies -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <!-- Date Picker JS (Optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets_visitor/js/main.js') }}"></script>


    <!-- Client Testimonial  -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <!-- JavaScript (place before closing </body>) -->
    <script>
        const height = document.getElementById('height');
        const width = document.getElementById('width');
        const type = document.getElementById('type');
        const priceDisplay = document.getElementById('price');

        const basePrice = 300;

        function updatePrice() {
            const h = parseFloat(height.value);
            const w = parseFloat(width.value);
            const t = parseFloat(type.value);

            const finalPrice = Math.round(basePrice * h * w * t);
            priceDisplay.innerText = `AED ${finalPrice}`;
        }

        height.addEventListener('change', updatePrice);
        width.addEventListener('change', updatePrice);
        type.addEventListener('change', updatePrice);
    </script>

    <script>
        new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            }
        });
    </script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
        timer: 3000
    });
</script>
@endif


@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Validation Errors',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonColor: '#d33',
    });
</script>
@endif



    @stack('visitor-scripts')

</body>

</html>
