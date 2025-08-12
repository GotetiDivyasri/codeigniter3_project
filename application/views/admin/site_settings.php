<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Site Settings</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/login') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Site Settings</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <div class="header-content">
                        <i class="fas fa-table me-1"></i>
                        <span>DataTable Example</span>
                    </div> -->
                    <!-- <a href="<? //= base_url('admin/site_settings/add') 
                                    ?>">
                        <button class="add-button">
                            <i class="fas fa-plus me-1"></i>
                            Add New
                        </button>
                    </a> -->
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
                                <th>Site Title</th>
                                <th>Footer Description</th>
                                <th>Site Email</th>
                                <th>Logo</th>
                                <th>Favicon</th>
                                <th>Mobile Number</th>
                                <th>Why Choose Title</th>
                                <th>Why Choose Description</th>
                                <th>Our Service Title</th>
                                <th>Our Service Description</th>
                                <th>Our Client Title</th>
                                <th>Our Client Description</th>
                                <th>Contact Title</th>
                                <th>Contact Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Site Title</th>
                                <th>Footer Description</th>
                                <th>Site Email</th>
                                <th>Logo</th>
                                <th>Favicon</th>
                                <th>Mobile Number</th>
                                <th>Why Choose Title</th>
                                <th>Why Choose Description</th>
                                <th>Our Service Title</th>
                                <th>Our Service Description</th>
                                <th>Our Client Title</th>
                                <th>Our Client Description</th>
                                <th>Contact Title</th>
                                <th>Contact Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sno = 1;
                            foreach ($site_settings as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $sno ?></td>
                                    <td><?= $value->site_title ?></td>
                                    <td><?= $value->footer_description ?></td>
                                    <td><?= $value->site_email ?></td>
                                    <td>
                                        <?php if (isset($value->logo)) { ?>
                                            <img src="<?= base_url('uploads/') ?><?= $value->logo ?>" width="100px" height="100px">
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/dummy_image.jpg') ?>" width="100px" height="100px">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if (isset($value->logo)) { ?>
                                            <img src="<?= base_url('uploads/') ?><?= $value->fav_icon ?>" width="100px" height="100px">
                                        <?php } else { ?>
                                            <img src="<?= base_url('uploads/dummy_image.jpg') ?>" width="100px" height="100px">
                                        <?php } ?>
                                    </td>
                                    <td><?= $value->phone_number ?></td>
                                    <td><?= $value->why_choose_title ?></td>
                                    <td><?= $value->why_choose_desc ?></td>
                                    <td><?= $value->our_service_title ?></td>
                                    <td><?= $value->our_service_desc ?></td>
                                    <td><?= $value->our_client_title ?></td>
                                    <td><?= $value->our_client_desc ?></td>
                                    <td><?= $value->contact_title ?></td>
                                    <td><?= $value->contact_desc ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/site_settings/add?id=') . $value->id ?>">
                                            <button class="add-button">
                                                Edit
                                            </button>
                                        </a>
                                        <br>
                                        <!-- <a href="<? //= base_url('admin/site_settings/delete?id=') . $value->id 
                                                        ?>">
                                            <button class="add-button">
                                                Delete
                                            </button>
                                        </a> -->
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