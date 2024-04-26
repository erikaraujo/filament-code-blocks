<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $copyableState = $getCopyableState($state) ?? $state;
        $copyMessage = $getCopyMessage($state);
        $copyMessageDuration = $getCopyMessageDuration($state);
        $itemIsCopyable = $isCopyable($state);
    @endphp

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

    <div
        @if($itemIsCopyable)
            style="cursor: pointer;"
            x-on:click="
                window.navigator.clipboard.writeText(@js($copyableState))
                $tooltip(@js($copyMessage), {
                    theme: $store.theme,
                    timeout: @js($copyMessageDuration),
                })
            "
        @endif
    >
        <pre class='filament-code-block'><code>{{ $getState() }}</code></pre>
    </div>
</x-dynamic-component>
