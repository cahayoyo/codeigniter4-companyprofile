<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Product
                        </div>
                        <div class="card-body">

                            <!-- Alert Success -->
                            <?php if (session('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Alert Failed -->
                            <?php if (session('failed')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('failed'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/daftar-product/create-product'); ?>" method="post"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="nama_product" class="form-label">Nama Product</label>
                                        <input type="text" name="nama_product" id="nama_product"
                                            class="form-control <?= $validation->hasError('nama_product') ? 'is-invalid' : '' ?>">

                                        <?php if ($validation->hasError('nama_product')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_product'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="kategori_slug" class="form-label">Kategori Product</label>
                                        <select name="kategori_slug" id="kategori_slug"
                                            class="form-select <?= $validation->hasError('kategori_slug') ? 'is-invalid' : '' ?>">
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($kategori_product as $kategori): ?>
                                                <option value="<?= $kategori->slug_kategori; ?>">
                                                    <?= $kategori->nama_kategori ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <?php if ($validation->hasError('kategori_slug')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kategori_slug'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="10" cols="30"
                                        class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : '' ?>"></textarea>

                                    <?php if ($validation->hasError('deskripsi')): ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('deskripsi'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_product" class="form-label">Gambar Product</label>
                                    <input type="text" name="gambar_product" id="gambar_product" class="form-control">
                                </div>
                                <div class="justify-content-end d-flex">
                                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?= $this->endSection(); ?>