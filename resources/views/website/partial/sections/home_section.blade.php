<div class="container-general">
    <div class="gallery-wrap wrap-effect-1">
        @foreach ($categories as $record)
            <div class="item" style="background-image:url('{{ asset('img/' . $record->photo_cover) }}')">
                <div class="layer">
                    <div class="layer_widget">
                        <img src="{{ asset('img/' . $record->icon) }}" alt="">
                        <h3>{{ $record->category_name }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>