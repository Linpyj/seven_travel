@if (Auth::check())
    <ul class="footer">
        <li>SEVEN TRAVEL</li>

        <li><a href="{{ route('') }}">ABOUT</a></li>
        
        <li><a href="{{ route('') }}">INFO</a></li>

        <li><a href="{{ route('') }}">FAQ</a></li>

        <li><a href="{{ route('') }}">CONTACT</a></li>
    </ul>
@endif