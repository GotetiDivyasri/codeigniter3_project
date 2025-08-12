<?php
$this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Admin Login Logs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/login') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Admin Login Logs</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <a href="<?= base_url('admin/admin_login_logs/add') ?>">
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
                                <th>Address</th>
                                <th>Admin</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Address</th>
                                <th>Admin</th>
                                <th>Created at</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sno = 1;
                            foreach ($admin_login_logs as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $sno ?></td>
                                    <td><?= $value->address ?></td>
                                    <td><?= $value->admin ?></td>
                                    <td><?= $value->created_at ?></td>
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