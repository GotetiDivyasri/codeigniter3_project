<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Why Choose Us</h1>
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
                    <form action="<?= isset($why_choose_us->id) ? base_url('admin/why_choose_us/edit/' . $why_choose_us->id) : base_url('admin/why_choose_us/add') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="uid" name="uid" value="<?= isset($why_choose_us->id) ? $why_choose_us->id : '' ?>">

                        <div class="form-group">
                            <label for="siteTitle">Title <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" class="form-control" value="<?= ($why_choose_us->title) ? $why_choose_us->title : '' ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="footerDesc">Description <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control" rows="3" required><?= ($why_choose_us->description) ? $why_choose_us->description : '' ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="siteTitle">Icon <span class="text-danger">*</span></label>
                            <input type="text" id="icon" name="icon" class="form-control" value="<?= ($why_choose_us->icon) ? $why_choose_us->icon : '' ?>" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php $this->load->view('admin/includes/footer') ?>