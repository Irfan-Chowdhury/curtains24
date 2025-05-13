<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Testimonial Slider</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .testimonial-slider {
      position: relative;
      background: #ddd;
      padding: 40px 0;
      overflow: hidden;
    }

    .testimonial-track {
      display: flex;
      transition: transform 0.5s ease;
      will-change: transform;
    }

    .testimonial-item {
      flex: 0 0 33.3333%;
      max-width: 33.3333%;
      padding: 15px;
      transition: transform 0.3s ease;
    }

    .testimonial-item.focused {
      transform: scale(1.05);
      z-index: 2;
    }

    .testimonial-card {
        padding: 7px;
        background: #fff;
        border-radius: 10px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
    }

    .testimonial-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        transform: translateY(-5px);
        filter: brightness(0.8);
    }

    .testimonial-card img {
        width: 100%;
        height: 200px; /* Fixed height */
        object-fit: cover; /* Maintain aspect ratio, crop if needed */
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: #fff;
      border: none;
      font-size: 30px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      z-index: 10;
    }

    .prev-btn {
      left: 10px;
      display: none;
    }

    .next-btn {
      right: 10px;
    }
  </style>
</head>
<body>
<div class="container-fluid testimonial-slider">
  <h2 class="text-center font-weight-bold mb-5">OUR CLIENTS TRUST US</h2>
  <div class="position-relative">
    <button class="nav-btn prev-btn">&#8249;</button>
    <button class="nav-btn next-btn">&#8250;</button>
    <div class="testimonial-track-wrapper overflow-hidden">
      <div class="testimonial-track">
        <div class="testimonial-item">
            <div class="testimonial-card">
              <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91" class="img-fluid rounded" alt="Living Room">
            </div>
          </div>

          <div class="testimonial-item">
              <div class="testimonial-card">
                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38" alt="Testimonial Image" class="img-fluid rounded">
              </div>
          </div>
          <div class="testimonial-item">
              <div class="testimonial-card">
                  <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" class="img-fluid rounded" alt="Modern Design">
              </div>
          </div>
          <div class="testimonial-item">
              <div class="testimonial-card">
                  <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace" class="img-fluid rounded" alt="Sheer Curtains">
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
  const track = document.querySelector('.testimonial-track');
  const items = document.querySelectorAll('.testimonial-item');
  const prevBtn = document.querySelector('.prev-btn');
  const nextBtn = document.querySelector('.next-btn');

  let index = 0;

  function updateSlider() {
    const itemWidth = items[0].offsetWidth;
    track.style.transform = `translateX(-${index * itemWidth}px)`;

    // Add focused class to the middle card
    items.forEach((item, i) => {
      item.classList.remove('focused');
      if (i === index + 1) item.classList.add('focused');
    });

    // Toggle button visibility
    prevBtn.style.display = index > 0 ? 'block' : 'none';
    nextBtn.style.display = index < items.length - 3 ? 'block' : 'none';
  }

  prevBtn.addEventListener('click', () => {
    if (index > 0) {
      index--;
      updateSlider();
    }
  });

  nextBtn.addEventListener('click', () => {
    if (index < items.length - 3) {
      index++;
      updateSlider();
    }
  });

  // Initial update
  updateSlider();
</script>
</body>
</html>
