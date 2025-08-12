<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Contact Us</h1>
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
                    <form action="<?= isset($contact_us->id) ? base_url('admin/contact_us/edit/' . $contact_us->id) : base_url('admin/contact_us/add') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="uid" name="uid" value="<?= isset($contact_us->id) ? $contact_us->id : '' ?>">

                        <div class="form-group">
                            <label for="siteTitle">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= ($contact_us->name) ? $contact_us->name : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="siteTitle">Email <span class="text-danger">*</span></label>
                            <input type="text" id="email" name="email" class="form-control" value="<?= ($contact_us->email) ? $contact_us->email : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="siteTitle">Subject <span class="text-danger">*</span></label>
                            <input type="text" id="subject" name="subject" class="form-control" value="<?= ($contact_us->subject) ? $contact_us->subject : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="siteTitle">Service <span class="text-danger">*</span></label>
                            <select id="service_id" name="service_id" class="form-control" required>
                                <option value="" disabled selected>Select a service</option>
                                <?php foreach ($services as $key => $value) { ?>
                                    <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="footerDesc">Message <span class="text-danger">*</span></label>
                            <textarea id="message" name="message" class="form-control" rows="3" required><?= ($contact_us->message) ? $contact_us->message : '' ?></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php $this->load->view('admin/includes/footer') ?>