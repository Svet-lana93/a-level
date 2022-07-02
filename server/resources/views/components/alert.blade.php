<div {{ $attributes->merge(['class' => $isError() ? 'color-red' : '']) }}>
    @if (isset($title))
        <p>{{ $title }}</p>
    @endif
    <p>{{ $slot }}</p>
</div>

{{--    <p @if($isError()) style='color:red;' @endif>{{ $message }}</p>--}}
{{--    <p @if($isError()) class='color:red' @endif{{$attributes}}>{{ $message }}</p>--}}
{{--    <p style="color:black"> {{ $message }}</p>--}}
