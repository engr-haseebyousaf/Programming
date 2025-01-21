@php
    $fruits = ["Orange", "Mango", "Apple", "Banana"];
@endphp
<script>
    var frts = {{ Js::from($fruits) }}
    frts.forEach(element => {
        console.log(element);
        
    });
</script>