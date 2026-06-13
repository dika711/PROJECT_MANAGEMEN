<x-admin-layout>
    <h2 class="text-lg font-medium mb-4">Data User</h2>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama Lengkap</th>
                <th class="border px-4 py-2">Nama Panggilan</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Nomor Telepon</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Tanggal Registrasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->nickname }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->phone }}</td>
                <td class="border px-4 py-2">{{ $user->role }}</td>
                <td class="border px-4 py-2">{{ $user->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
