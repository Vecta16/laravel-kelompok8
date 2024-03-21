<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
     <!--<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Data Pesanan
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    
    
    
    <?php if($berhasil_hapus = Session::get('berhasil_hapus')): ?>
    <script>
        Swal.fire({
            title: "Berhasil",
            text: "<?php echo e($berhasil_hapus); ?>",
            icon: "success"
        });
    </script>
    
    <?php elseif($berhasil_tambah = Session::get('berhasil_tambah')): ?>
    <script>
        Swal.fire({
            title: "Berhasil",
            text: "<?php echo e($berhasil_tambah); ?>",
            icon: "success"
        });
    </script>
    
    <?php elseif($success = Session::get('success')): ?>
    <script>
        Swal.fire({
            title: "Berhasil",
            text: "<?php echo e($success); ?>",
            icon: "success"
        });
    </script>
    <?php endif; ?>

    
    
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Kelompok 8</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Data Pesanan</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Tabel Data Pesanan</h6>

                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div style="margin-left: 1rem;">
                                <button onclick="addForm()" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah</button>
                            </div>
                            <div id="alertMessage" class="alert" style="display: none;"></div>
                            <div class="table-responsive p-3 pt-0 pb-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 5%;">No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width:10%">Id barang</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width:50%">Kode Pesanan</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width:10%">harga</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:15%">pelanggan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:15%">Tanggal Pesanan</th>
                                             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width:10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        
                                        <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($item->id_barang); ?></td>
                                            <td><?php echo e($item->kode_pesanan); ?></td>
                                            <td><?php echo e($item->harga); ?></td>
                                            <td><?php echo e($item->pelanggan); ?></td>
                                            <td><?php echo e($item->tanggal_pesanan); ?></td>
                                            <td>
                                                <!-- Tombol Update -->
                                                <a href="<?php echo e(route('dashboard.edit', $item->id_barang)); ?>" class="btn btn-warning text-white mb-2">
                                                    <i class="bi bi-pen-fill"></i> Update
                                                </a>
                                                
                                                <!-- Tombol Delete -->
                                                <form action="<?php echo e(route('dashboard.destroy', $item->id_barang)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Apakah kamu yakin ingin menghapus ini?')">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
                <div class="modal-dialog" role="document">
                    
                    <form action="<?php echo e(route('dashboard.store')); ?>" class="form-horizontal" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <!--<input type="hidden" name="id" id="id" class="form-control">-->
                                <!--<div class="input-group input-group-outline my-3">-->
                                <!--    <label for="form-label">Kode Pesanan</label>-->
                                <!--    <input type="text" class="form-control" placeholder="Kode Pesanan" name="kode_pesanan" id="kode_pesanan" style="width: inherit;" required>-->
                                <!--</div>-->
                                <div class="input-group input-group-outline my-3">
                                    <label for="form-label">Kode Pesanan</label>
                                    <input type="text" class="form-control" placeholder="Nama Pelanggan" name="kode_pesanan" id="Kode_pesanan" style="width: inherit;" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="form-label">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" style="width: inherit;" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="form-label">Pelanggan</label>
                                    <input type="text" class="form-control" placeholder="Pelanggan" name="pelanggan" id="pelanggan" style="width: inherit;" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="form-label">Tanggal Pesanan</label>
                                    <input type="date" class="form-control" placeholder="Tanggal pesanan" name="tanggal_pesanan" id="tanggal_pesanan" style="width: inherit;" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-flat btn-primary" id="saveBtn"><i class="fa fa-save"></i> Save</button>
                                <button type="button" class="btn btn-sm btn-flat btn-warning close-btn" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                Created by
                                <a href="#" class="font-weight-bold" target="_blank">Kelompok 8</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <?php if ($__env->exists('dashboard.form')) echo $__env->make('dashboard.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    </script>
    <script>
        // Setting header csrf token laravel untuk semua request ajax
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //membuat datatables
        // var table = $('.table').DataTable({
        //     processing: true,
        //     autoWidth: false,
        //     responsive: true,
        //     lengthChange: true,
        //     processing: true,
        //     serverSide: true,
        //     dom: 'lfrtip',
        //     //mengambil data dengan Pesanan controller
        //     ajax: "<?php echo e(route('dashboard.index')); ?>",
        //     columns: [{
        //             data: 'DT_RowIndex',
        //             searchable: false,
        //             className: 'text-center',
        //         },
        //         {
        //             data: 'id_barang',
        //             name: 'id_barang',
        //         }, {
        //             data: 'nama_barang',
        //             name: 'nama_barang',
        //         },
        //         {
        //             data: 'harga',
        //             name: 'harga',
        //         },
        //         {
        //             data: 'stok',
        //             name: 'stok',
        //             render: function(data, type, row) {
        //                 if (type === 'display' && data) {
        //                     return new Date(data).toLocaleDateString('id-ID');
        //                 }
        //                 return data;
        //             }
        //         },
                // {
                //     data: 'total_harga',
                //     name: 'total_harga',
                //     className: 'text-center',
                //     render: function(data, type, row) {
                //         if (type === 'display') {
                //             return 'Rp. ' + data;
                //         }
                //         return data;
                //     }
                // },
        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searchable: false
        //         },
        //     ]
        // });

        $('.close-btn').click(function(e) {
            $('.modal').modal('hide')
        });

        $('#saveBtn').click(function(e) {
            var formdata = $("#modal-form form").serializeArray();
            var data = {};
            $(formdata).each(function(index, obj) {
                data[obj.name] = obj.value;
            });
            if (validation(data)) {
                $.ajax({
                    data: $('#modal-form form').serialize(),
                    url: "<?php echo e(route('dashboard.store')); ?>",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#modal-form').modal('hide');
                        $('.table').DataTable().draw();
                        var message = response.message;
                        $('#alertMessage').html('<strong>' + message + '</strong>').addClass('alert-success').fadeIn();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            }

        });

        $('body').on('click', '.editPesanan', function() {
            var id = $(this).data('id');
            console.log(id);
            $.get("<?php echo e(route('dashboard.index')); ?>" + '/' + id + '/edit', function(data) {
                $('.modal-title').text('Edit Category');
                $('#modal-form').modal('show');
                $('#id').val(data.id);
                $('#kode_pesanan').val(data.kode_pesanan);
                $('#tanggal_pesanan').val(data.tanggal_pesanan);
                $('#pelanggan').val(data.pelanggan);
                $('#total_harga').val(data.total_harga);
            })
        });


        $('body').on('click', '.deletePesanan', function() {
            var id = $(this).data('id');
            if (confirm("Are You sure want to delete !") == true) {
                $.ajax({
                    type: "DELETE",
                    url: "<?php echo e(route('dashboard.store')); ?>" + '/' + id,
                    success: function(data) {
                        $('.table').DataTable().draw();
                        var message = response.message;
                        $('#alertMessage').html('<strong>' + message + '</strong>').addClass('alert-success').fadeIn();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        function addForm() {
            $("#modal-form").modal('show');
            $('#id').val('');
            $('.modal-title').text('Tambah Pesanan');
            $('#modal-form form')[0].reset();
            $('#modal-form [name=kode_pesanan]').focus();
        }

        function validation(data) {
            let formIsValid = true;
            $('span[id^="error"]').text('');
            if (!data.pelanggan) {
                formIsValid = false;
                $("#error-pelanggan").text('The name field is required.')
            }
            return formIsValid;
        }

        function submitHandler() {
            $('#saveBtn').click();
        }
    </script>
</body>

</html><?php /**PATH /storage/ssd3/260/21931260/laravel/resources/views/dashboard.blade.php ENDPATH**/ ?>