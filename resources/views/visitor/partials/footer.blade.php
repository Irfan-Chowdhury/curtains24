    <!-- Footer Start -->
    <footer class="footer py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    {{-- <img src="https://static.wixstatic.com/media/e01eb4_f39182f7b9934a9799ab4d03dad0aa07~mv2.png/v1/fill/w_115,h_42,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/e01eb4_f39182f7b9934a9799ab4d03dad0aa07~mv2.png" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow"> --}}
                    <img src="{{ $generalSetting->site_logo }}" style="width: 115px; height: 42px;" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow">
                </div>
                <div class="font-weight-bold">
                    <a href="javascript:void(0)" id="scrollUpToStartWithBanner" class="text-dark" style="text-decoration: none;">BACK TO TOP <span style="font-size: 25px;">↑</span></a>
                </div>
            </div>

            <hr>

            <div class="row text-center text-md-left py-4">
                <div class="col-md-4 mb-3">
                    <div class="text-center mb-3">
                        <a class="mb-3 font-weight-bold" href="tel:{{ $generalSetting->phone }}" style="color: #000; text-decoration: none;">
                            <h5 class="font-weight-bold" style="text-decoration: underline; margin: 0;">{{ $generalSetting->phone }}</h5>
                        </a>
                        <a class="mt-3" href="mailto:support@thenomad.ae" style="color: #000; text-decoration: none;">
                            {{-- <p style="font-size:18px;margin-top:10px">support@thenomad.ae</p> --}}
                            <p style="font-size:18px;margin-top:10px">{{ config('mail.from.address') }}</p>
                        </a>
                    </div>
                    {{-- <input type="image" src="https://static.wixstatic.com/media/e01eb4_90d20ab6ee754aaf8709a857d03921b8~mv2.jpg/v1/crop/x_24,y_22,w_652,h_115/fill/w_326,h_58,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/%D0%9C%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D0%B0%D1%8F%20%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C%201.jpg" alt=""> --}}
                    <input type="image" src="{{ $generalSetting->payment_logo }}" width="326" height="58" alt="">
                </div>

                <div class="col-md-4 mb-3"></div>

                <div class="col-md-4 mb-3 footer-links">
                    <a href="javascript:void(0)" class="font-weight-bold" id="scrollUpToFreeMeasurements">BOOK FREE MEASUREMENTS</a><br><br>
                    <a href="javascript:void(0)" id="scrollUpToHowItWorks">HOW IT WORKS</a><br><br>
                    <a href="javascript:void(0)" id="scrollUpToCalculator">ONLINE CALCULATOR</a><br><br>
                    <a href="javascript:void(0)" id="scrollUpToHowItLooks">HOW IT LOOKS</a>
                </div>
            </div>

            <hr>



            <div class="d-flex justify-content-center small-links mt-3">
                <a href="{{ route('termsAndCondition') }}">Terms & Conditions</a>
                <a href="{{ route('privacyPolicy') }}">Privacy Policy</a>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
