@if(session()->exists('beersviewed'))
    @php
        $i = session()->get('beersviewed');
        error_log($i);
        $i ++;
        session()->put('beersviewed', $i)

    @endphp
    @if($i >= 5 and !Auth::user()->is_verified)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Goed Gedaan</h4>
            <p>Uw account voldoet nu aan de eisen om te verifiëren!</p>
            <hr>


        <a href="{{ route('profile.update-verified', Auth::id()) }}"
           onclick="event.preventDefault();
                                                     document.getElementById('verify-form').submit();">
            Verifieer account nu!
        </a>

        <form id="verify-form" action="{{ route('profile.update-verified', Auth::id()) }}" method="POST" class="d-none">
            @method('PATCH')
            @csrf
        </form>
        </div>
    @endif
@else
    @php
        session()->put('beersviewed', 1)
    @endphp
@endif
