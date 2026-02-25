<div class="min-h-screen bg-white">
    <!-- Header -->
    <div class="bg-blue-600 text-white py-12 px-4">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold">Pendaftaran Peserta Didik Baru (PPDB)</h1>
        </div>
    </div>

    <!-- Form -->
    <div class="max-w-2xl mx-auto py-16 px-4">
        @if (session()->has('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit="submit" class="space-y-6">
            <!-- Nama Siswa -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Siswa *</label>
                <input type="text" 
                       wire:model="student_name" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                       placeholder="Nama lengkap siswa">
                @error('student_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Email *</label>
                <input type="email" 
                       wire:model="email" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                       placeholder="Email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Telepon *</label>
                <input type="tel" 
                       wire:model="phone" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                       placeholder="Nomor telepon">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir *</label>
                <input type="date" 
                       wire:model="birth_date" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('birth_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Sekolah Asal -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Sekolah Asal</label>
                <input type="text" 
                       wire:model="current_school" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                       placeholder="Nama sekolah asal">
                @error('current_school') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Alamat</label>
                <textarea wire:model="address" 
                          rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                          placeholder="Alamat lengkap"></textarea>
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Nama Wali -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Wali/Orang Tua</label>
                <input type="text" 
                       wire:model="guardian_name" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                       placeholder="Nama wali/orang tua">
                @error('guardian_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Nomor Telepon Wali -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Telepon Wali</label>
                <input type="tel" 
                       wire:model="guardian_phone" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                       placeholder="Nomor telepon wali">
                @error('guardian_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition">
                Kirim Pendaftaran
            </button>

            <p class="text-gray-500 text-sm">* Kolom wajib diisi</p>
        </form>
    </div>
</div>
