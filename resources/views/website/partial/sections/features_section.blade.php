<div class="container">
    <div class="row">
        @foreach ($features as $record)
            <div class="col-md-3 col-6">
                <div class="services_box">
                    <div class="serv_icon">
                        <img src="{{ asset('img/' . $record->image) }}" alt="..">
                    </div>
                    <div class="serv_name">
                        <h3>{{ $record->title }}</h3>
                    </div>
                    <div class="serv_desc">
                        <p>
                            {{ $record->description }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>