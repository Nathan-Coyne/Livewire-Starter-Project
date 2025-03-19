<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>
        <form wire:submit.prevent="authenticate" class="mt-6 space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input wire:model="form.email" type="email" id="email" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter your email" required>
                @error('form.email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input wire:model="form.password" type="password" id="password" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter your password" required>
                @error('form.password') <span class="text-danger">{{ $message }}</span> @enderror
                @error('login') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit" class="w-full px-4 py-3 mt-6 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Login</button>
            </div>
        </form>
    </div>
</div>
