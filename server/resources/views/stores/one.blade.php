<x-layout>
    <x-slot name="title">Store</x-slot>
    <div>
         {{ 'Title: ' . $store->title }} <br>
         {{ 'Address: ' . $store->address }} <br>
    </div>
</x-layout>
