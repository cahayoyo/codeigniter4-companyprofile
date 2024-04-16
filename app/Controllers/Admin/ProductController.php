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
        ];
        return view('admin/product/index', $data);
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
