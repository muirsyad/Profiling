<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="https://imgur.com/a/4Xzkf8Y" class="logo" alt="LHI logo"> --}}
<img src="{{ asset('assets/img/lhi.png') }}" class="logo" alt="LHI logo">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
