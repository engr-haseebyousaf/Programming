<h1>This is the header line</h1>
@forelse ($fruits as $key => $fruit)
    <p>{{ $key }} - {{ $fruit }}</p>
@empty
    <p>No value found</p>
@endforelse