<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @if(! $getShouldUseInlineTheme())
        @push('styles')
            <link href="{{ asset('css/tempest/highlight/' . $getTheme() .'.css') }}" rel="stylesheet">
            <style>
                pre.filament-code-block {
                    white-space: pre-wrap;
                    padding: 1rem;
                    border-radius: 0.5rem;
                }
            </style>
        @endpush
    @endif

    <div>
        <pre class='filament-code-block'><code>{{ $getState() }}</code></pre>
    </div>
</x-dynamic-component>
