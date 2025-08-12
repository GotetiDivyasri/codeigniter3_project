<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Social Media</h1>
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
                    <form action="<?= isset($social_media->id) ? base_url('admin/social_media/edit/' . $social_media->id) : base_url('admin/social_media/add') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="uid" name="uid" value="<?= isset($social_media->id) ? $social_media->id : '' ?>">

                        <div class="form-group">
                            <label for="siteTitle">Title <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= ($social_media->name) ? $social_media->name : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="footerDesc">Link <span class="text-danger">*</span></label>
                            <input type="text" id="link" name="link" class="form-control" value="<?= ($social_media->link) ? $social_media->link : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="siteTitle">Icon <span class="text-danger">*</span></label>
                            <input type="text" id="icon" name="icon" class="form-control" value="<?= ($social_media->icon) ? $social_media->icon : '' ?>" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php $this->load->view('admin/includes/footer') ?>