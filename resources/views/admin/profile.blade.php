<x-admin-layout>
    <h2 class="text-lg font-medium mb-4">Profil Admin</h2>

    @if(session('status'))
        <div class="text-green-600 mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('PUT')

        <!-- Nama Panggilan -->
        <div class="mb-4">
            <label for="nickname">Nama Panggilan</label>
            <input id="nickname" type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}" required>
            @error('nickname') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <!-- Nomor Telepon -->
        <div class="mb-4">
            <label for="phone">Nomor Telepon</label>
            <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" required>
            @error('phone') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <!-- Password Lama -->
        <div class="mb-4">
            <label for="current_password">Password Lama</label>
            <input id="current_password" type="password" name="current_password" required>
            @error('current_password') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <!-- Password Baru -->
        <div class="mb-4">
            <label for="password">Password Baru</label>
            <input id="password" type="password" name="password">
            @error('password') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <!-- Konfirmasi Password Baru -->
        <div class="mb-4">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</x-admin-layout>
