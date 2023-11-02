@extends('layouts.app')

@section('content')
<div class="h-full mx-auto px-4">
<div><h1 class="text-xl font-bold mb-4">Products</h1></div>
<div class="flex items-center justify-center ">
    <table class="table-auto w-full">
        <!-- Table Header -->
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="border px-4 py-2">{{ $product->name }}</td>
                <td class="border px-4 py-2">{{ $product->price }}</td>
                <td class="border px-4 py-2">{{ $product->category->name }}</td>
                <td class="flex justify-between border px-4 py-2">
                <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Edit
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
