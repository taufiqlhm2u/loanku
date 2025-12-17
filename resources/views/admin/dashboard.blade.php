<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    @push('css')
    <style>
        h1 {
            color: red;
        }
    </style>
    @endpush
    <h1 id="title">Hello</h1>
</x-layout>