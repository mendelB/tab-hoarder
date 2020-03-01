<h1>Tabs:</h1>

<ol>
	@foreach ($tabs as $tab)
		<li>
			<a href="{{$tab->url}}" target="_blank" rel="noopener noreferrer">
				{{ $tab->title ?: $tab->url }}
			</a>
		</li>
	@endforeach
</ol>