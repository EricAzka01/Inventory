<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{ __("Form to add new items") }}

                    <div class="mt-10">
                        <form action="{{ route('submitForm') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" step="1" min="0" max="100" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" id="description" name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image (PNG/JPG/JPEG, max 2MB):</label>
                                <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" required>
                            </div>
                            <div class="form-group">
                                <div class="cursor-pointer">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>
                        
                            @if(session('success'))
                                <div class="alert alert-success">
                                     {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
