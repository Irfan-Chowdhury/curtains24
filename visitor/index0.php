<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Nomad Tailored Curtains | Dubai</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Global Styles */
        :root {
            --primary: #2a5c7a;
            --secondary: #d4af37;
            --light: #f8f9fa;
            --dark: #343a40;
            --text: #333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            color: var(--text);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        section {
            padding: 80px 0;
        }
        
        h1, h2, h3 {
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        h1 { font-size: 2.5rem; }
        h2 { font-size: 2rem; color: var(--primary); }
        h3 { font-size: 1.5rem; }
        
        .btn {
            display: inline-block;
            background: var(--secondary);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            background: #c19b2c;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        /* Header */
        header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--secondary);
        }
        
        .mobile-menu-btn {
            display: none;
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1513519245088-0e12902e5a38');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            padding-top: 80px;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        /* Process Section */
        .process {
            background: var(--light);
            text-align: center;
        }
        
        .process-steps {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        
        .step {
            flex: 1;
            min-width: 250px;
            padding: 30px;
            margin: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .step:hover {
            transform: translateY(-10px);
        }
        
        .step-icon {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 20px;
        }
        
        /* Calculator Section */
        .calculator {
            background: white;
            text-align: center;
        }
        
        .calculator-container {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        
        .calculator-form {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background: var(--light);
            border-radius: 8px;
            text-align: left;
        }
        
        .calculator-preview {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .price-display {
            font-size: 2rem;
            color: var(--secondary);
            margin: 20px 0;
        }
        
        /* Gallery Section */
        .gallery {
            background: var(--light);
            text-align: center;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }
        
        .gallery-item {
            height: 250px;
            overflow: hidden;
            border-radius: 8px;
            position: relative;
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
        
        /* Contact Section */
        .contact {
            background: white;
        }
        
        .contact-container {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        
        .contact-info {
            flex: 1;
            min-width: 300px;
            padding: 30px;
        }
        
        .contact-info p {
            margin-bottom: 20px;
        }
        
        .contact-info i {
            color: var(--secondary);
            margin-right: 10px;
            width: 20px;
        }
        
        .contact-form {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background: var(--light);
            border-radius: 8px;
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 20px;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 30px;
        }
        
        .footer-section h3 {
            color: var(--secondary);
            margin-bottom: 20px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--secondary);
        }
        
        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .step {
                min-width: 100%;
                margin: 15px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="https://via.placeholder.com/40x40" alt="Nomad Tailored Curtains Logo">
                    <span>THE NOMAD TAILORED CURTAINS</span>
                </div>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="nav-links" id="navLinks">
                    <a href="#process">Process</a>
                    <a href="#calculator">Calculator</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#contact">Contact</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>HAVE YOUR PERFECT CURTAINS WITHOUT LIFTING A FINGER</h1>
                <p>Premium custom curtains tailored to your exact measurements in Dubai</p>
                <a href="#calculator" class="btn">BOOK FREE MEASUREMENTS</a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process" id="process">
        <div class="container">
            <h2>OUR SIMPLE PROCESS</h2>
            <p>Get your perfect curtains in just 3 easy steps</p>
            
            <div class="process-steps">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-ruler-combined"></i>
                    </div>
                    <h3>BOOK FREE MEASUREMENTS</h3>
                    <p>Our team will come to your property with fabric samples</p>
                </div>
                
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>MEET WITH OUR EXPERT</h3>
                    <p>Choose the fabric and color while our expert helps with recommendations</p>
                </div>
                
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>CURTAINS ARE READY</h3>
                    <p>24 hours from measurement to installation</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Calculator Section -->
    <section class="calculator" id="calculator">
        <div class="container">
            <h2>ONLINE CALCULATOR</h2>
            <p>Get an instant estimate for your custom curtains</p>
            
            <div class="calculator-container">
                <div class="calculator-form">
                    <form id="curtainCalculator">
                        <div class="form-group">
                            <label for="width">Width (cm)</label>
                            <input type="number" id="width" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="height">Height (cm)</label>
                            <input type="number" id="height" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="type">Curtain Type</label>
                            <select id="type" required>
                                <option value="standard">Standard</option>
                                <option value="blackout">Blackout</option>
                                <option value="sheer">Sheer</option>
                                <option value="premium">Premium</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="mount">Mount Type</label>
                            <select id="mount" required>
                                <option value="rod">Rod</option>
                                <option value="track">Track</option>
                                <option value="motorized">Motorized</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="windows">Number of Windows</label>
                            <input type="number" id="windows" value="1" min="1" required>
                        </div>
                        
                        <button type="submit" class="btn">CALCULATE PRICE</button>
                    </form>
                </div>
                
                <div class="calculator-preview">
                    <h3>ESTIMATED PRICE</h3>
                    <div class="price-display" id="priceDisplay">AED 0</div>
                    <p>Full custom curtains with professional installation included</p>
                    <p>We speak <strong>English, Arabic, Hindi & Urdu</strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <h2>HOW IT LOOKS</h2>
            <p>Discover how our curtains transform spaces</p>
            
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91" alt="Living Room Curtains">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38" alt="Bedroom Curtains">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" alt="Modern Curtains">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1583845112203-454c42f19691" alt="Office Curtains">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace" alt="Sheer Curtains">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1617806118233-18e1de247200" alt="Blackout Curtains">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2>CONTACT US</h2>
            <p>Get in touch for your free consultation</p>
            
            <div class="contact-container">
                <div class="contact-info">
                    <h3>OUR DETAILS</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Dubai, United Arab Emirates</p>
                    <p><i class="fas fa-phone"></i> +971 50 123 4567</p>
                    <p><i class="fas fa-envelope"></i> info@nomadcurtains.ae</p>
                    <p><i class="fas fa-clock"></i> Open 7 days a week: 9:00 AM - 9:00 PM</p>
                    
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" id="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone *</label>
                            <input type="tel" id="phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" rows="4"></textarea>
                        </div>
                        
                        <button type="submit" class="btn">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>THE NOMAD TAILORED CURTAINS</h3>
                    <p>Premium custom curtains tailored to your exact measurements in Dubai.</p>
                </div>
                
                <div class="footer-section">
                    <h3>QUICK LINKS</h3>
                    <p><a href="#process">Our Process</a></p>
                    <p><a href="#calculator">Price Calculator</a></p>
                    <p><a href="#gallery">Gallery</a></p>
                    <p><a href="#contact">Contact</a></p>
                </div>
                
                <div class="footer-section">
                    <h3>CONTACT</h3>
                    <p>Dubai, UAE</p>
                    <p>+971 50 123 4567</p>
                    <p>info@nomadcurtains.ae</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 The Nomad Tailored Curtains. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');
        
        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
        
        // Calculator Functionality
        const calculatorForm = document.getElementById('curtainCalculator');
        const priceDisplay = document.getElementById('priceDisplay');
        
        calculatorForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form values
            const width = parseFloat(document.getElementById('width').value);
            const height = parseFloat(document.getElementById('height').value);
            const type = document.getElementById('type').value;
            const mount = document.getElementById('mount').value;
            const windows = parseInt(document.getElementById('windows').value);
            
            // Simple calculation (would be more complex in real implementation)
            let basePrice = (width * height) / 1000; // AED per sqm approximation
            
            // Adjust for curtain type
            switch(type) {
                case 'blackout': basePrice *= 1.5; break;
                case 'sheer': basePrice *= 1.2; break;
                case 'premium': basePrice *= 2; break;
            }
            
            // Adjust for mount type
            switch(mount) {
                case 'track': basePrice += 100; break;
                case 'motorized': basePrice += 300; break;
            }
            
            // Calculate total
            let totalPrice = basePrice * windows;
            
            // Minimum price
            if (totalPrice < 300) totalPrice = 300;
            
            // Display result
            priceDisplay.textContent = `AED ${totalPrice.toFixed(0)}`;
        });
        
        // Form Submission
        const contactForm = document.getElementById('contactForm');
        
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you for your message! We will contact you shortly.');
            contactForm.reset();
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>