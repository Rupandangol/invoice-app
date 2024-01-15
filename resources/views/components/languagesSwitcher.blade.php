<div class="mx-5 mt-3 mb-2 text-right">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
                <button type="button" class="btn btn-success btn-sm">{{ $available_locale }}</button>
        @else
            <a class="btn btn-outline-success btn-sm" href="{{route('lang.switcher',$available_locale)}}">
                {{ $available_locale }}
            {{-- </a>      <a class="btn btn-outline-success btn-sm" href="language/{{ $available_locale }}">
                {{ $available_locale }} --}}
            </a>       
        @endif
             
    @endforeach
</div>