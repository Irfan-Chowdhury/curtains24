<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WhatsApp Floating Button with QR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    /* WhatsApp floating button styles */
    .whatsapp-float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 40px;
      right: 40px;
      background-color: #25d366;
      color: #FFF;
      border-radius: 50%;
      text-align: center;
      font-size: 30px;
      box-shadow: 2px 2px 3px #999;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .whatsapp-float:hover {
      background-color: #128C7E;
      transform: scale(1.1);
      text-decoration: none;
      color: white;
    }

    .whatsapp-float .whatsapp-icon {
      margin-left: 1px;
      margin-bottom: 1px;
    }

    /* QR Code Container */
    .qr-code-popup {
      position: absolute;
      bottom: 70px;
      right: 0;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      padding: 5px;
      display: none;
      width: 130px;
      z-index: 101;
    }

    .qr-code-popup img {
      width: 100%;
      border-radius: 8px;
    }

    .qr-wrapper:hover .qr-code-popup {
      display: block;
    }

    /* Pulse animation */
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    .whatsapp-float.pulse {
      animation: pulse 2s infinite;
    }
  </style>
</head>

<body>

  <!-- Content -->
  <div class="container mt-5">
    <h1 class="text-center">Welcome to Our Website</h1>
    <p class="text-center">Scroll down and hover the WhatsApp button to see the QR code.</p>
  </div>

  <!-- Floating WhatsApp Button with QR Code -->
  <div class="qr-wrapper" style="position: fixed; bottom: 40px; right: 40px;">
    <a href="https://wa.me/8801829498634?text=Hello%20I'm%20interested%20in%20Curtains"
       class="whatsapp-float pulse"
       target="_blank"
       aria-label="Chat on WhatsApp">
      <i class="fab fa-whatsapp whatsapp-icon"></i>
    </a>
    {{-- <div class="qr-code-popup">
      <img src="https://i.imgur.com/6cN9kRt.png" alt="WhatsApp QR Code">
    </div> --}}
  </div>

  <!-- Optional JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
