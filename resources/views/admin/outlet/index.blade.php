<!DOCTYPE html>
<html>
<head>
    <title>Outlet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="flex items-center gap-3 mb-4">
    <a href="{{ route('admin.dashboard') }}"
       class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
        ⬅ Dashboard
    </a>

    <a href="{{ route('admin.outlet.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Outlet
    </a>
</div>

<table class="w-full bg-white border">
    <tr class="bg-gray-200">
        <th class="p-2 border">Outlet</th>
        <th class="p-2 border">Alamat</th>
        <th class="p-2 border">No Telp</th>
        <th class="p-2 border">Aksi</th>
    </tr>

    @foreach ($outlets as $outlet)
    <tr>
        <td class="p-2 border">
            <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                 class="w-24 h-24 object-cover mb-2 rounded">
            <div class="font-semibold">{{ $outlet->nama_outlet }}</div>
        </td>
        <td class="p-2 border">{{ $outlet->alamat }}</td>
        <td class="p-2 border">{{ $outlet->no_telp }}</td>
        <td class="p-2 border">


        <td class="p-2 border flex gap-2">
    <a href="{{ route('admin.outlet.edit',$outlet->id) }}"
       class="text-blue-600 hover:underline">Edit</a>
       
            <form action="{{ route('admin.outlet.destroy',$outlet->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
