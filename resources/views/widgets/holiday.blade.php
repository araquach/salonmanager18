<!--holiday widget partial view-->

<ul class="info list--unstyled">
    <li>Holiday Entitlement: {{ $entitlement->staff->holiday_entitlement }} days</li>
    <li>Total Booked: {{ $total }} days</li>
    <li>Remaining Saturdays:  {{ $remainingSat }}</li>
    <li>Days remaining: {{ $entitlement->staff->holiday_entitlement - $total }}</li>
</ul>