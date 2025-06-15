@extends('auth.dashboard')

@section('title', 'Salles')
@section('content')
    <div class="">
        @php
            $itemsTh = [
                'name' => 'Name',
                'category' => 'Category',
                'location' => 'Location',
                'capacity' => 'Capacity',
                'status' => 'Status',
                'actions' => 'Actions',
            ];
        @endphp

        <div class="bg-white w-full shadow-sm rounded-md p-4 mt-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-sm text-neutral-500 font-semibold">Rooms management</h2>
                <a href="{{ route('room.add') }}"
                    class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">Add Room</a>
            </div>
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 ">

                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b border-gray-300">#
                        </th>
                        @foreach ($itemsTh as $item)
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b border-gray-300">
                                {{ $item }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                            $i = 1;
                    @endphp
                    @foreach ($rooms as $room)
                        
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-neutral-600">{{ $i++}}</td>
                            <td class="px-4 py-2 text-sm text-neutral-600">{{ $room->name }}</td>
                            <td class="px-4 py-2 text-sm text-neutral-600">{{ $room->category->name }}</td>
                            <td class="px-4 py-2 text-sm text-neutral-600">{{ $room->location }}</td>
                            <td class="px-4 py-2 text-sm text-neutral-600">{{ $room->capacity }}</td>
                            <td class="px-4 py-2 text-sm text-neutral-600">{{ $room->status }}</td>
                            <td class="px-4 py-2 text-sm text-neutral-600 flex gap-3 items-center">
                                <a href="{{ route('room.edit', $room->id) }}"
                                    class="bg-blue-200 flex items-center justify-center w-10 h-10 rounded-full">
                                    <img src="{{ asset('./images/pencil.png') }}" alt="" width="18">
                                </a>
                                <form action="{{ route('room.delete', $room->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-200 flex items-center justify-center w-10 h-10 rounded-full">
                                        <img src="{{ asset('./images/delete.png') }}" alt="" width="18">
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
