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
    @if ($message = Session::get('berhasil'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('gagal'))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
    @endif

    <h2>Data Barang</h2>
    <a class="mb-4 float-right" href="{{ route('barang.create') }}"><button type="button" class="btn btn-outline-info">Tambah</button></a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col" style="width: 240px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($barang as $br)
        <tr>
          <td>{{ $br->nama }}</td>
          <td>{{ $br->harga }}</td>
          <td>{{ $br->jumlah }}</td>
          <td>
            <form action="{{ route('barang.destroy',$br->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('barang.show',$br->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('barang.edit',$br->id) }}">Edit</a>
              
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>