<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// print_r($name);
// die;
$this->load->view('includes/header');
?>
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 hero-content">
                <h1 class="hero-title"><?= $slider->title ?></h1>
                <p class="hero-subtitle"><?= $slider->description ?></p>
                <div class="d-flex gap-3 flex-wrap">
                    <button class="btn btn-primary-custom">Get Started</button>
                    <button class="btn btn-outline-custom">Learn More</button>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url('uploads/') . $slider->image ?>" alt="Hero Image" class="img-fluid hero-image rounded-3 shadow">
            </div>
        </div>
    </div>
</section>
<!-- Features Section -->
<section id="features" class="features-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold"><?= $site_settings->why_choose_title ?></h2>
            <p class="lead text-muted"><?= $site_settings->why_choose_desc ?></p>
        </div>
        <div class="row g-4">
            <?php foreach ($why_choose_us as $why_choose) { ?>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="<?= $why_choose->icon ?>"></i>
                        </div>
                        <h4><?= $why_choose->title ?></h4>
                        <p class="text-muted"><?= $why_choose->description ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="<?= base_url('uploads/') . $about_us->image ?>" alt="About Us" class="img-fluid about-image">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4"><?= $about_us->title ?></h2>
                <p><?= $about_us->description ?></p>
                <!-- <p class="lead mb-4">We're passionate about helping businesses transform through technology.</p>
                <p class="text-muted mb-4">With over a decade of experience, we've helped hundreds of companies streamline their operations, increase efficiency, and achieve their digital transformation goals.</p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Expert Team</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Cutting Edge</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Proven Results</span>
                        </div>
                    </div>
                </div> -->
                <button class="btn btn-primary">Learn More About Us</button>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold"><?= $site_settings->our_service_title ?></h2>
            <p class="lead text-muted"><?= $site_settings->our_service_desc ?></p>
        </div>
        <div class="row g-4">
            <?php foreach ($services as $service) { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="<?= $service->icon ?>"></i>
                        </div>
                        <h4><?= $service->name ?></h4>
                        <p class="text-muted"><?= $service->description ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold"><?= $site_settings->our_client_title ?></h2>
            <p class="lead"><?= $site_settings->our_client_desc ?></p>
        </div>
        <div class="row g-4">
            <?php foreach ($our_clients as $clients) { ?>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <img src="<?= base_url('uploads/') . $clients->image ?>" alt="Client" class="testimonial-avatar">
                        <h5><?= $clients->title ?></h5>
                        <p class="mb-3"><?= $clients->description ?></p>
                        <div class="text-warning">
                            <?php for ($i = 1; $i <= $clients->rating; $i++) { ?>
                                <i class="bi bi-star-fill"></i>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold"><?= $site_settings->contact_title ?></h2>
            <p class="lead text-muted"><?= $site_settings->contact_desc ?></p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-success">
                    <?php echo validation_errors(); ?>
                    <?php
                    if ($this->session->flashdata('type')) {
                        echo "<br /><br /><h4 align='center' class= " . $this->session->flashdata('type') . " >" . $this->session->flashdata('msg') . "</h4>";
                    }
                    ?>
                </div>
                <form class="contact-form" action="<?= base_url('/contactus') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                            <small><?= form_error('name'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
                            <small><?= form_error('email'); ?></small>
                        </div>
                        <div class="col-12">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                            <small><?= form_error('subject'); ?></small>
                        </div>
                        <div class="col-12">
                            <select class="form-select" name="service_id">
                                <option selected>Select Service</option>
                                <?php foreach ($services as $service) { ?>
                                    <option value="<?= $service->id ?>"><?= $service->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                            <small><?= form_error('message'); ?></small>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg px-5">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
$this->load->view('includes/footer');
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<!-- <script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Navbar background on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(255, 255, 255, 0.98)';
            navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
        } else {
            navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
        }
    });

    // Form submission handler
    document.querySelector('.contact-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Create success message
        const successMessage = document.createElement('div');
        successMessage.className = 'alert alert-success alert-dismissible fade show mt-3';
        successMessage.innerHTML = `
                <strong>Success!</strong> Your message has been sent. We'll get back to you soon.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

        // Insert success message
        this.appendChild(successMessage);

        // Reset form
        this.reset();

        // Remove message after 5 seconds
        setTimeout(() => {
            successMessage.remove();
        }, 5000);
    });

    // Add animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all feature cards and service cards
    document.querySelectorAll('.feature-card, .service-card, .testimonial-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
</script> -->
</body>

</html>