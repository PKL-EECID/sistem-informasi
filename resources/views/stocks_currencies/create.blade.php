@extends('layouts.app', ['activePage' => 'stock_currency', 'titlePage' => __('Input Stocks and their currencies')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Input Inventory with Exchange Rate</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
                <p class="mb-4 text-center h3">Harga Kurs Sekarang : <span class="text-primary">$1000</span></p>
                <form action="{{ url('stock_currency/') }}" method="POST">
                  @csrf
                    <div class="form-group my-4">
                      <label for="site_id">Pilih Site(?)</label>
                      <input type="text" class="form-control" id="site_id" name="site_id" placeholder="Site(?) nnt dropdown / checkbox">
                    </div>
                    <div class="form-group my-4">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang">
                      <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group my-4">
                      <label for="part_number">Part Number</label>
                      <input type="text" class="form-control" id="part_number" name="part_number" placeholder="Masukkan part number">
                    </div>
                    <div class="form-group my-4">
                      <label for="serial_number">Serial Number</label>
                      <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Masukkan part number">
                    </div>
                    <div class="form-group my-4">
                      <label for="tgl_masuk">Tanggal Masuk / Edit</label>
                      <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Tanggal Input">
                    </div>
                    <div class="form-group my-4">
                      <label for="expired">Life expectancy</label>
                      <input type="date" class="form-control" id="expired" name="expired" placeholder="Expected lifetime">
                    </div>
                    <div class="form-group my-4">
                      <label for="kurs_beli">Kurs Beli</label>
                      <input type="text" class="form-control" id="kurs_beli" name="kurs_beli" placeholder="Kurs Beli">
                    </div>
                    <div class="form-group my-4">
                      <label for="jumlah_unit">Jumlah Stok</label>
                      <input type="text" class="form-control" id="jumlah_unit" name="jumlah_unit" placeholder="Stok yg ada">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('stock_currency/') }}" class="btn btn-info ml-3 d-inline">Kembali</a>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection