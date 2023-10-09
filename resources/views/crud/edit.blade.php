<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>index</title>
</head>

<body>
  <div class="container mt-3">
    @if ($message = Session::get('create_gagal'))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <h2>Edit Data Barang</h2>
    <a href="{{ route('barang.index') }}"><button type="button" class="btn btn-outline-secondary mb-4">Back</button></a>

    <form action="{{ route('barang.update', $barang->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}" placeholder="Barang A">
      </div>
      <div class="form-group">
        <label for="harga">Harga Barang</label>
        <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" placeholder="20000">
      </div>
      <div class="form-group">
        <label for="jumlah">Jumlah Barang</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $barang->jumlah }}" placeholder="20">
      </div>
      <button type="submit" class="btn btn-outline-success float-right">Ubah</button>
    </form>
  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>