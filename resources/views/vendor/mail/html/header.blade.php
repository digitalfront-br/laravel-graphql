<tr>
<td class="header">
    @if (trim($slot) === 'Laravel')
    <h2 style="margin: 0; height: 30px ; font-size:0px; color: #b8bcd3" class="logo">
        <span class="uk-text-primary">.</span>scap
    </h2>
    @else
        {{ $slot }}
    @endif
</td>
</tr>
