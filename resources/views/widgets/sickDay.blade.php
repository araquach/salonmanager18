<!--sickDay widget partial view-->

<ul class="info list--unstyled">
    
    @if( $total > 0 )
    <li>Sick Days: {{ $total }}</li>
    @else
    <li>No Sick days!</li>
    @endif
    
    @if( $warning > 3)
    <li>Warning! {{ $warning }} Sick instances so far!</li>
    @endif
</ul>