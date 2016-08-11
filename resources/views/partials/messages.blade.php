@if (session()->has('messages'))
    @foreach (session()->get('messages') as $level => $message)
        <div class="alert alert-{{ $level }}">
            {{ $message }}
        </div>
    @endforeach
@endif
