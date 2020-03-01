<h1>Tabs:</h1>

<ol>
	@foreach ($tabs as $tab)
		<li>
			<img src="https://www.google.com/s2/favicons?domain={{optional(parse_url($tab->url))['host']}}"/>
			<a href="{{$tab->url}}" target="_blank" rel="noopener noreferrer">
				{{ $tab->title ?: $tab->url }}
			</a>
		</li>
	@endforeach
</ol>