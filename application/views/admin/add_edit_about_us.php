<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add About Us</h1>
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
                    <form action="<?= isset($about_us->id) ? base_url('admin/about_us/edit/' . $about_us->id) : base_url('admin/about_us/add') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="uid" name="uid" value="<?= isset($about_us->id) ? $about_us->id : '' ?>">

                        <div class="form-group">
                            <label for="siteTitle">Title <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" class="form-control" value="<?= ($about_us->title) ? $about_us->title : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="footerDesc">Description <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control" rows="3" required><?= ($about_us->description) ? $about_us->description : '' ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image">Image <span class="text-danger">*</span></label>
                            <input type="file" id="image" name="image" class="form-control-file" required>
                        </div>
                        <br>
                        <?php if (isset($about_us->image)) { ?>
                            <div class="form-group">
                                <label for="image">Previous Image <span class="text-danger">*</span></label>
                                <img src="<?= base_url('uploads/') . $about_us->image ?>" width="100px" height="100px">
                            </div>
                            <br>
                        <?php } ?>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php $this->load->view('admin/includes/footer') ?>