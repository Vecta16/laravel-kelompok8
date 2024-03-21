<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    
    <div class="container mt-3">
        <div class="row">
        <div class="col">
            
    <h3>Update data</h3>
    
         <form method="post" id="update" action="{{ route('dashboard.update', $pesanan->id_barang) }}">
                @csrf
                
                @method('PUT')
                
             <div class="form-group">
                    <label for="nama_tugas" class="control-label">Update Kode Pesanan</label>
                    <input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" autocomplete="off"
                        value="{{ $pesanan->nama_barang }}">
                </div>
                
                <div class="form-group">
                    <label for="harga" class="control-label">Update Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" autocomplete="off"
                        value="{{ $pesanan->harga }}">
                </div>
                
                <div class="form-group">
                    <label for="stok" class="control-label">Pelanggan</label>
                    <input type="text" class="form-control" id="pelanggan" name="pelanggan" autocomplete="off"
                        value="{{ $pesanan->stok }}">
                </div>
                
                <div class="form-group">
                    <label for="tanggal_pesanan" class="control-label">Tanggal Pesanan</label>
                    <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" autocomplete="off"
                           value="{{ $pesanan->tanggal_pesanan }}">
                
                <button type="submit" name="update" class="btn btn-warning">Update</button>
                 <a href="{{url('/dashboard')}}" class="btn btn-danger mx-3">Kembali</a>
        </form>
        
        </div>
        </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>