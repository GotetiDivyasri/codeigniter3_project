<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Site Settings</h1>
            <button class="btn btn-primary btn-sm" onclick="window.history.go(-1)">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
            </button>
            <hr>
            <div class="card mb-4" style="max-width: 1000px; margin: auto;">
                <?php echo validation_errors(); ?>
                <?php
                if ($this->session->flashdata('type')) {
                    echo "<br /><br /><h4 align='center' class= " . $this->session->flashdata('type') . " >" . $this->session->flashdata('msg') . "</h4>";
                }
                ?>
                <div class="card-body">
                    <form action="<?= base_url('admin/site_settings/add') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="uid" name="uid" value="<?= isset($settings->id) ? $settings->id : '' ?>">

                        <div class="form-group">
                            <label for="siteTitle">Site Title <span class="text-danger">*</span></label>
                            <input type="text" id="site_title" name="site_title" class="form-control" value="<?= ($settings->site_title) ? $settings->site_title : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="footerDesc">Footer Description <span class="text-danger">*</span></label>
                            <textarea id="footer_description" name="footer_description" class="form-control" rows="3" required><?= ($settings->footer_description) ? $settings->footer_description : '' ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="siteEmail">Site Email <span class="text-danger">*</span></label>
                            <input type="email" id="site_email" name="site_email" class="form-control" value="<?= ($settings->site_email) ? $settings->site_email : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <input type="tel" id="phone_number" name="phone_number" minlength="10" maxlength="10" value="<?= ($settings->phone_number) ? $settings->phone_number : '' ?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="logo">Logo <span class="text-danger">*</span></label>
                            <input type="file" id="logo" name="logo" class="form-control-file" required>
                            <!-- accept="image/*" -->
                        </div>
                        <br>
                        <?php if (isset($settings->logo)) { ?>
                            <div class="form-group">
                                <label for="logo">Previous Logo <span class="text-danger">*</span></label>
                                <img src="<?= base_url('uploads/') . $settings->logo ?>" width="100px" height="100px">
                            </div>
                            <br>
                        <?php } ?>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" id="fav_icon" name="fav_icon" class="form-control-file">
                        </div>
                        <br>
                        <?php if (isset($settings->fav_icon)) { ?>
                            <div class="form-group">
                                <label for="logo">Previous Favicon <span class="text-danger">*</span></label>
                                <img src="<?= base_url('uploads/') . $settings->fav_icon ?>" width="100px" height="100px">
                            </div>
                            <br>
                        <?php } ?>
                        <div class="form-group">
                            <label for="why_choose_title">Why Choose Title</label>
                            <input type="text" id="why_choose_title" name="why_choose_title" value="<?= ($settings->why_choose_title) ? $settings->why_choose_title : '' ?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="why_choose_desc">Why Choose Description</label>
                            <textarea id="why_choose_desc" name="why_choose_desc" class="form-control" rows="3"><?= ($settings->why_choose_desc) ? $settings->why_choose_desc : '' ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="our_service_title">Our Service Title</label>
                            <input type="text" id="our_service_title" name="our_service_title" class="form-control" value="<?= ($settings->our_service_title) ? $settings->our_service_title : '' ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="our_service_desc">Our Service Description</label>
                            <textarea id="our_service_desc" name="our_service_desc" class="form-control" rows="3"><?= ($settings->our_service_desc) ? $settings->our_service_desc : '' ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="our_client_title">Our Client Title</label>
                            <input type="text" id="our_client_title" name="our_client_title" class="form-control" value="<?= ($settings->our_client_title) ? $settings->our_client_title : '' ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="our_client_desc">Our Client Description</label>
                            <textarea id="our_client_desc" name="our_client_desc" class="form-control" rows="3"><?= ($settings->our_client_desc) ? $settings->our_client_desc : '' ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contact_title">Contact Title</label>
                            <input type="text" id="contact_title" name="contact_title" class="form-control" value="<?= ($settings->contact_title) ? $settings->contact_title : '' ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contact_desc">Contact Description</label>
                            <textarea id="contact_desc" name="contact_desc" class="form-control" rows="3"><?= ($settings->contact_desc) ? $settings->contact_desc : '' ?></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php $this->load->view('admin/includes/footer') ?>