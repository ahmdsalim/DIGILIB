<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #25476a;
  color: white;
}
</style>
    <title>Daftar Buku</title>
</head>
<body style="text-align: center;">
<h2>Daftar Buku</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Tahun Terbit</th>
    <th>Jumlah Halaman</th>
    <th>Kategori</th>
    <th>Email</th>
    <th>No ISBN</th>
    <th>Jumlah Baca</th>
    <th>Status</th>
  </tr>
  @foreach ($data as $buku)
  <tr>
    <td>{{ $buku->id }}</td>
    <td>{{ $buku->judul }}</td>
    <td>{{ $buku->penulis }}</td>
    <td>{{ $buku->penerbit }}</td>
    <td>{{ $buku->tahun_terbit }}</td>
    <td>{{ $buku->jumlah_halaman }}</td>
    <td>{{ $buku->kategori->kategori }}</td>
    <td>{{ $buku->email }}</td>
    <td>{{ $buku->no_isbn }}</td>  
    <td>{{ $buku->jumlah_baca }}</td>  
    <td>{{ $buku->status }}</td>    
  </tr>
  @endforeach
</table>

</body>
</html>


