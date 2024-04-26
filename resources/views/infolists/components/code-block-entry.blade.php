<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @if(! $getShouldUseInlineTheme())
        @push('styles')
            <link href="{{ asset('css/tempest/highlight/' . $getTheme() .'.css') }}" rel="stylesheet">
        @endpush
    @endif

    <div>
        <pre class='filament-code-block'><code>{{ $getState() }}</code></pre>
    </div>
</x-dynamic-component>
