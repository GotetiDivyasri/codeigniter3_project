<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h3 class="mb-3"><?= $site_settings->site_title ?></h3>
                <p><?= $site_settings->footer_description ?></p>
                <div class="social-icons">
                    <?php foreach ($social_media as $media) { ?>
                        <a href="<?= $media->link ?>" target="_blank"><i class="<?= $media->icon ?>"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="mb-3">Quick Links</h5>
                <div class="footer-links">
                    <a href="#home" class="d-block mb-2">Home</a>
                    <a href="#about" class="d-block mb-2">About</a>
                    <a href="#services" class="d-block mb-2">Services</a>
                    <a href="#contact" class="d-block mb-2">Contact</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="mb-3">Services</h5>
                <div class="footer-links">
                    <?php foreach ($services as $service) { ?>
                        <a href="#services" class="d-block mb-2"><?= $service->name ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="mb-3">Email</h5>
                <p class="mb-3"><?= $site_settings->site_email ?></p>
                <div class="input-group">
                    <img src="<?= base_url('uploads/') . $site_settings->logo ?>" width="200px" height="100px">
                    <!-- <input type="email" class="form-control" placeholder="Your Email"> -->
                    <!-- <button class="btn btn-primary" type="button">Subscribe</button> -->
                </div>
            </div>
        </div>
        <hr class="my-4 border-secondary">
        <div class="text-center">
            <p class="mb-0">&copy; 2025 TechFlow. All rights reserved.</p>
        </div>
    </div>
</footer>