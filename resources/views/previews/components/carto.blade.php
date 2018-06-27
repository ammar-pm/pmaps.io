const source_{{ $dataset->id }} = new carto.source.Dataset('{{ $dataset->options['carto_url'] }}');
const style_{{ $dataset->id }} = new carto.style.CartoCSS(`
  #null{
    polygon-fill: '{{ $dataset->options['fill_color'] or null }}';
    polygon-opacity: '{{ $dataset->options['fill_opacity'] or .5 }}';
    line-color: '{{ $dataset->options['stroke_color'] or null }}';
    marker-line-width: 1;
    marker-line-opacity: 1;
    marker-placement: point;
    marker-type: ellipse;
    marker-width: 10;
    marker-fill: '{{ $dataset->options['fill_color'] or null }}';
    marker-allow-overlap: true;
  }
`);

const dataset_{{ $dataset->id }} = new carto.layer.Layer(source_{{ $dataset->id }}, style_{{ $dataset->id }});

cartoclient.addLayer(dataset_{{ $dataset->id }});
var layer_{{ $dataset->id }} = cartoclient.getLeafletLayer().addTo(map);