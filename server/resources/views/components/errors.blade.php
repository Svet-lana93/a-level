<div>
    @if ($errors->any())
        <div>
            <ul class="color-red">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
