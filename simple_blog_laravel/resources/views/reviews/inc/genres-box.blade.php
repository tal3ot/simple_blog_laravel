<div>
    <h3 class="text-lg font-semibold text-yellow mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($genres as $genre)
        <x-reviews.genre-badge :genre="$genre" />
        @endforeach
    </div>
</div>