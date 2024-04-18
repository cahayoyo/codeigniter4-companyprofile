<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class ProductController extends BaseController
{
    // daftar product
    public function index()
    {
        $data = [
            'title' => 'Daftar Product',
            'daftar_product' => $this->ProductModel->orderBy('id_product', 'DESC')->findAll()
        ];
        return view('admin/product/index', $data);
    }

    public function form_create()
    {
        $data = [
            'title' => 'Tambah Product',
            'kategori_product' => $this->KategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/product/create', $data);
    }

    public function create_product()
    {
        // aturan validasi input
        $rules = $this->validate([
            'nama_product' => 'required',
            'kategori_slug' => 'required',
            'deskripsi' => 'required',
            'gambar_product' => 'max_size[gambar_product,2048]|uploaded[gambar_product]|is_image[gambar_product]|mime_in[gambar_product,image/png,image/jpg]|ext_in[gambar_product,png,jpg,jpeg]'
        ]);

        // jika validasi gagal
        if (!$rules) {
            session()->setFlashdata('failed', 'Data Produk Gagal Ditambahkan');
            return redirect()->back()->withInput();
        }
        // jika data valid
        // membuat slug

        $slug_product = url_title($this->request->getPost('nama_product'), '-', TRUE);

        // ambil file gambar
        $gambar = $this->request->getFile('gambar_product');

        // ambil random nama file
        $namaGambar = $gambar->getRandomName('gambar_product');

        // pindahkan file
        $gambar->move(WRITEPATH . '../public/asset-admin/img', $namaGambar);

        $this->ProductModel->insert([
            'nama_product' => esc($this->request->getPost('nama_product')),
            'kategori_slug' => esc($this->request->getPost('kategori_slug')),
            'deskripsi' => esc($this->request->getPost('deskripsi')),
            'gambar_product' => $namaGambar,
            'slug_product' => $slug_product,
        ]);

        return redirect()->to(base_url('daftar-product'))->with('success', 'Data Product Berhasil Ditambahkan');
    }

    // daftar kategori product
    public function kategori()
    {
        $data = [
            'title' => 'Daftar Kategori Product',
            'daftar_kategori' => $this->KategoriModel->orderBy('id_kategori', 'DESC')->findAll()
        ];
        return view('admin/product/kategori', $data);
    }

    // tambah kategori product
    public function store()
    {
        // ambil slug
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        // simpan data ke database
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->insert($data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Ditambahkan');

    }

    // ubah kategori produk
    public function update($id_kategori)
    {
        // ambil slug
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        // simpan data ke database
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->update($id_kategori, $data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Diubah');
    }

    // hapus kategori produk
    public function destroy($id_kategori)
    {
        $this->KategoriModel->where('id_kategori', $id_kategori)->delete();
        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Dihapus');
    }

}
