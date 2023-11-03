@extends('layouts.app')

@section('content')
<div class="h-full mx-auto px-4">
    <div class="flex  w-6/12 items-center justify-between ml-80">
        <h1 class="text-xl  font-bold m-4">
            Categories
        </h1>
        <a href="/dashboard">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <div class="flex items-center justify-center ">
        <table class="table-auto w-6/12">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class=" border px-4 py-2">{{ $category->name }}</td>
                    <td class=" border flex justify-between  px-4 py-2">
                        <!-- Edit and Delete buttons here -->
                        <a href="{{ route('categories.edit', $category) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
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