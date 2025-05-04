<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Nomad Tailored Curtains | Dubai</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --primary: #2a5c7a;
            --secondary: #d4af37;
            --light: #f8f9fa;
            --dark: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .bg-light-gray {
            background-color: #f5f5f5;
        }
        
        .btn-gold {
            background-color: var(--secondary);
            color: white;
            font-weight: 600;
            padding: 10px 25px;
        }
        
        .btn-gold:hover {
            background-color: #c19b2c;
            color: white;
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
        }
        
        .process-step {
            text-align: center;
            padding: 30px 15px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
            transition: transform 0.3s;
        }
        
        .process-step:hover {
            transform: translateY(-10px);
        }
        
        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            line-height: 40px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .calculator-box {
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .form-control {
            height: 45px;
            border: 1px solid #ddd;
        }
        
        .price-display {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary);
        }
        
        .gallery-item {
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 5px;
            height: 200px;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .contact-info i {
            color: var(--secondary);
            width: 20px;
            margin-right: 10px;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand img {
            height: 40px;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1513519245088-0e12902e5a38');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0 100px;
        }
        
        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 120px 0 80px;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .process-step {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/150x40?text=Nomad+Curtains" alt="The Nomad Tailored Curtains">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#process">Process</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calculator">Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">HAVE YOUR PERFECT CURTAINS WITHOUT LIFTING A FINGER</h1>
                    <p class="lead mb-4">Premium custom curtains tailored to your exact measurements in Dubai</p>
                    <a href="#calculator" class="btn btn-gold">BOOK FREE MEASUREMENTS</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">OUR SIMPLE PROCESS</h2>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h4>BOOK FREE MEASUREMENTS</h4>
                        <p>Our team will come to your property with fabric samples</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h4>MEET WITH OUR EXPERT</h4>
                        <p>Choose the fabric and color while our expert helps with recommendations</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h4>CURTAINS ARE READY</h4>
                        <p>24 hours from measurement to installation</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p><strong>We speak English, Arabic, Hindi & Urdu</strong></p>
            </div>
        </div>
    </section>

    <!-- Calculator Section -->
    <section id="calculator" class="py-5 bg-light-gray">
        <div class="container">
            <h2 class="text-center section-title">ONLINE CALCULATOR</h2>
            
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="calculator-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CHOOSE SIZE</label>
                                    <select class="form-control">
                                        <option>Width</option>
                                        <option>1m</option>
                                        <option>2m</option>
                                        <option>3m</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CHOOSE TYPE</label>
                                    <select class="form-control">
                                        <option>Standard</option>
                                        <option>Blackout</option>
                                        <option>Sheer</option>
                                        <option>Premium</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center my-4">
                            <div class="price-display">AED 300</div>
                            <p>Full custom curtains with installation included</p>
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-gold">BOOK FREE MEASUREMENTS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">HOW IT LOOKS</h2>
            <p class="text-center mb-5">Discover how our curtains transform spaces</p>
            
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91" alt="Living Room">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38" alt="Bedroom">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" alt="Modern">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1583845112203-454c42f19691" alt="Office">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace" alt="Sheer">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1617806118233-18e1de247200" alt="Blackout">
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p><strong>FREE CONSULTATION & WARRANTY INCLUDED</strong></p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light-gray">
        <div class="container">
            <h2 class="text-center section-title">CONTACT US</h2>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h4>GET IN TOUCH</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> Dubai, United Arab Emirates</p>
                        <p><i class="fas fa-phone"></i> +971 50 123 4567</p>
                        <p><i class="fas fa-envelope"></i> info@nomadcurtains.ae</p>
                        <p><i class="fas fa-clock"></i> Open 7 days a week: 9:00 AM - 9:00 PM</p>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name *" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email *" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" placeholder="Phone *" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-gold">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left">
                    <p class="mb-0">© 2023 The Nomad Tailored Curtains. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Smooth scrolling for navigation links
        $(document).ready(function(){
            $("a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 70
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }
            });
            
            // Calculator functionality would go here
            // This is just a simple example
            $('.form-control').change(function() {
                // In a real implementation, you would calculate price based on selections
                var basePrice = 300;
                $('.price-display').text('AED ' + basePrice);
            });
        });
    </script>
</body>
</html>