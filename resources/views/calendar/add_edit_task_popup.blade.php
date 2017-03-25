@if(isset($task))
    @include('calendar.edit_popup')
@else
    @include('calendar.add_popup')
@endif
