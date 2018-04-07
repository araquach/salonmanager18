<!--freeTime widget partial view-->

<ul class="info list--unstyled">
    <li>Free Time: {{  $entitlement->staff->free_time_entitlement }} hours</li>
    <li>Used Hours: {{ $total }}</li>
    <li>Hours Remaining: {{ $entitlement->staff->free_time_entitlement - $total }}</li>
</ul>