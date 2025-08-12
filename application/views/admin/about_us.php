<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">About Us</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/login') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <div class="header-content">
                        <i class="fas fa-table me-1"></i>
                        <span>DataTable Example</span>
                    </div> -->
                    <a href="<?= base_url('admin/about_us/add') ?>">
                        <button class="add-button">
                            <i class="fas fa-plus me-1"></i>
                            Add New
                        </button>
                    </a>
                </div>
                <div class="text-success">
                    <?php echo validation_errors(); ?>
                    <?php
                    if ($this->session->flashdata('type')) {
                        echo "<br /><br /><h4 align='center' class= " . $this->session->flashdata('type') . " >" . $this->session->flashdata('msg') . "</h4>";
                    }
                    ?>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sno = 1;
                            foreach ($about_us as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $sno ?></td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->description ?></td>
                                    <td>
                                        <?php if (isset($value->image)) { ?>
                                            <img src="<?= base_url('uploads/') ?><?= $value->image ?>" width="100px" height="100px">
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/dummy_image.jpg') ?>" width="100px" height="100px">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/about_us/edit/') . $value->id ?>">
                                            <button class="add-button">
                                                Edit
                                            </button>
                                        </a>
                                        <br>
                                        <a href="<?= base_url('admin/about_us/delete/') . $value->id ?>">
                                            <button class="add-button">
                                                Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $sno++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php $this->load->view('admin/includes/footer') ?>