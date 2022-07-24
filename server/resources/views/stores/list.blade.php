<x-layout>
    <x-slot name="title">All stores</x-slot>
    @foreach ($stores as $store)
        <li>
            <a href="{{ route('getOne', ['id' => $store->id]) }}">
                {{ $store->title . ' ' . $store->address}}
            </a>
        </li>
    @endforeach
</x-layout>
