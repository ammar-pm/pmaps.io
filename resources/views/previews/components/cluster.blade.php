var markers_{{ $dataset->id }} = L.markerClusterGroup({
	spiderfyOnMaxZoom: {{ $dataset->options['cluster_spiderfy_on_max_zoom'] }},
	showCoverageOnHover: {{ $dataset->options['cluster_show_coverage_on_hover'] }},
	zoomToBoundsOnClick: {{ $dataset->options['cluster_zoom_to_bounds_on_click'] }},
	removeOutsideVisibleBounds: {{ $dataset->options['cluster_remove_outside_visible_bounds'] }},
	animate: {{ $dataset->options['cluster_animate'] }},
	@if($dataset->options['cluster_disable_clustering_at_zoom'] == "true")
		disableClusteringAtZoom: {{ $dataset->options['clustering_at_zoom'] }},
	@endif
	maxClusterRadius:{{ $dataset->options['cluster_maximum_radius'] }}
});