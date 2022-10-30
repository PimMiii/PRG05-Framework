@if(!Auth::guest())
    @if(session()->exists('beersviewed'))
        @php
            $i = session()->get('beersviewed');
            $i ++;
            session()->put('beersviewed', $i)
        @endphp
        @if($i >= 5 and !optional(Auth::user())->is_verified)
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Goed Gedaan</h4>
                <p>Uw account voldoet nu aan de eisen om te verifiëren!</p>
                <hr>
                <a class="btn btn-success" href="{{ route('profile.update-verified', Auth::id()) }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('verify-form').submit();">
                    Account verifiëren!
                </a>
                <form id="verify-form" action="{{ route('profile.update-verified', Auth::id()) }}" method="POST"
                      class="d-none">
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
@endif
