@error($name)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm text-red-400']) }}>
        {{ $message }}
    </p>
@enderror
