<!-- Floating WhatsApp Button with QR Code -->
<div class="qr-wrapper" style="position: fixed; bottom: 40px; right: 40px;">
    <a href="https://wa.me/{{ $generalSetting->whatsapp_number }}?text={{ $generalSetting->whatsapp_default_message }}" class="whatsapp-float pulse"
        target="_blank" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp whatsapp-icon"></i>
    </a>
</div>
