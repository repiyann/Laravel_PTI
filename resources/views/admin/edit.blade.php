@extends('admin.app')

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add Foods
</h2>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{ route('foods.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Food Name</span>
            <input name="name" value="{{ old('name', $post->name) }}" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>

        <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">Price</span>
            <!-- focus-within sets the color for the icon when input is focused -->
            <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                <input name="price" id="rupiah" value="{{ old('price', $post->price) }}" required id="myinput" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    Rp.
                </div>
            </div>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Category
            </span>
            <select name="category" value="{{ old('category', $post->category) }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option style="display:none">Select Category</option>
                <option value="Combo">Combo</option>
                <option value="Ala Carte">Ala Carte</option>
                <option value="Drinks">Drinks</option>
                <option value="Snacks">Snacks</option>
            </select>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Image</span>
            <input type="file" name="image" class="form-control block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Description</span>
            <input name="description" value="{{ old('description', $post->description) }}" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>

        <div class="flex mt-6 text-sm">
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Edit Food
            </button>
        </div>
    </form>
</div>
@endsection