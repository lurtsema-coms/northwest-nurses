@if (!empty($errors))
    <div class="mb-5">
        <p class="font-bold text-red-500">Failed to submit:</p>
        <ul>
            @foreach ($errors as $error)
                <li><span class="text-red-400">* </span><span class="text-slate-600">{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
@endif
