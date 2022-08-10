<x-layout>
    <x-slot name="title">Stores</x-slot>
    @foreach ($stores as $store)
        <li>
            <a href="{{ route('getOne', ['id' => $store->id]) }}">
                {{ $store->title . ' ' . $store->address}}
            </a>
        </li>
    @endforeach
</x-layout>
