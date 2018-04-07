<!--lieuHour widget partial view-->

<ul class="info list--unstyled">
    <li>
        Total Owed: 
        @if($total < 0)
            {{ abs($total) }}
        @else
            0
        @endif
    </li>
    <li>
        Total Available: 
        @if($total > 0)
            {{ $total }}
        @else
            0
        @endif
    </li>
</ul>