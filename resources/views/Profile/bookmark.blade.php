<x-layout>
    <x-slot:title>Bookmark - Writely</x-slot:title>
    <h1 class="mt-1 mb-5">Bookmark</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="" method="get">
                <div class="d-flex gap-2 position-relative">
                    <input type="text" name="search" id="searchInput" class="form-control"
                    placeholder="Finding some post or user?" value="" autocomplete="off">
                    
                    <!-- Tombol X -->
                    <button type="button" id="clearSearch" class="btn position-absolute" style="right: 50px; top: 50%; transform: translateY(-50%); display: {{ request('search') ? 'block' : 'none' }};">
                        ✖
                    </button>
                    
                    <button class="btn btn-primary"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <x-cards.post-mini :post="$post" />
        </div>
        @empty
        <div class="col-md-12" align="center">
            <i>No bookmark yet.</i>
        </div>
        @endforelse
    </div>
</x-layout>
