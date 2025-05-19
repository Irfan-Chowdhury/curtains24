<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container d-flex justify-content-between align-items-center">

            <!-- Left: Brand -->
            <a class="navbar-brand" href="#">
                <span>{{ $generalSetting->site_title }}</span>
            </a>

            <!-- Toggler (for mobile) -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right: Phone + Quote Button -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <div class="d-flex align-items-center">
                    <a href="tel:+971524772085" class="phone-link mr-3">
                        <i class="fas fa-phone-alt"></i> {{ $generalSetting->phone }}
                    </a>
                    <a href="https://wa.me/{{ $generalSetting->whatsapp_number }}?text={{ $generalSetting->whatsapp_default_message }}" class="quote-btn btn btn-outline-light" target="_blank">
                        Get Quote
                    </a>
                    {{-- <button class="quote-btn btn btn-outline-light">GET QUOTE</button> --}}
                </div>
            </div>

        </div>
    </nav>

