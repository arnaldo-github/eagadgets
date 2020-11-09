@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>

    <script>
    document.querySelectorAll(".text-red-600").forEach((e)=>
    {
        if (e.innerHTML.indexOf("current")>=0) {
            e.innerHTML = e.innerHTML.replace("current", "actual")

            console.log(e.innerHTML);
            
        }
    
    })
</script>
@enderror

