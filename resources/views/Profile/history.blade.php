<x-layout>
    <x-slot:title>History - Writely</x-slot:title>
    <h1 class="mt-1 mb-5">History</h1>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <x-cards.post-mini :post="$post" />
        </div>
        @empty
        <div class="col-md-12" align="center">
            <i>No history yet.</i>
        </div>
        @endforelse
    </div>
</x-layout>
