<x-layouts.app :title="'Chỉnh sửa Setting'">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Chỉnh sửa Setting</h1>
            <a href="{{ route('admin.settings.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Quay lại
            </a>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Tên
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $setting->name) }}" 
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="img_path">
                        Ảnh
                    </label>
                    @if($setting->img_path)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $setting->img_path) }}" alt="Current image" class="w-32 h-32 object-cover">
                        </div>
                    @endif
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('img_path') border-red-500 @enderror" 
                        id="img_path" 
                        type="file" 
                        name="img_path" 
                        accept="image/*"
                        onchange="previewImage(this)">
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="preview" src="#" alt="Preview" class="w-32 h-32 object-cover">
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Để trống nếu không muốn thay đổi ảnh</p>
                    @error('img_path')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Mô tả
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" 
                        id="description" 
                        name="description">{{ old('description', $setting->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const previewDiv = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        previewDiv.classList.add('hidden');
    }
}
</script> 