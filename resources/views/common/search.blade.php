  <!-- Autocomplete JS -->
  <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
  <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
  <script>
    var client = algoliasearch('{{ env('ALGOLIA_APP_ID') }}', '{{ env('ALGOLIA_SEARCH_KEY') }}');
    var posts = client.initIndex('posts');
    var maps = client.initIndex('maps');
    var datasets = client.initIndex('datasets');

    $('#search-input').autocomplete({ hint: true, autoselect: true, debug: false}, [
      {
        source: $.fn.autocomplete.sources.hits(posts, { hitsPerPage: 10, facetFilters: ["visibility:community"], }),
        displayKey: 'title',

        templates: {
          header: '<p class="m-l-sm m-t-sm text-uppercase">Posts</p>',
          suggestion: function(suggestion) {
            return sugTemplate(suggestion, 'posts');
          }
        }
      },
      {
        source: $.fn.autocomplete.sources.hits(maps, { hitsPerPage: 10, facetFilters: ["visibility:community"], }),
        displayKey: 'title',
        templates: {
          header: '<p class="m-l-sm m-t-sm text-uppercase">Maps</p>',
          suggestion: function(suggestion) {
            return sugTemplate(suggestion, 'maps');
          }
        }
      },
      {
        source: $.fn.autocomplete.sources.hits(datasets, { hitsPerPage: 10, facetFilters: ["visibility:community"], }),
        displayKey: 'title',
        templates: {
          header: '<p class="m-l-sm m-t-sm text-uppercase">Datasets</p>',
          suggestion: function(suggestion) {
            return sugTemplate(suggestion, 'datasets');
          }
        }
      }
    ]).on('autocomplete:selected', function(event, suggestion, dataset) {
      console.log(suggestion, dataset);
    });

    function sugTemplate(suggestion, model)
    {
      return '<a href="/'+model+'/'+suggestion.id+'">'+suggestion._highlightResult.title.value+'</a>'
    }

  </script>