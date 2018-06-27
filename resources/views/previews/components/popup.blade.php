function onEachFeature_{{ $dataset->id }}(f, l) {
      
                var templatecode = [];
                var shortcodes = "";
                var popup_template_value = {{isset($dataset->popup_template) && !empty($dataset->popup_template) ? "true" : "false"}};

                var template = '<?php echo str_replace(array("\n", "\r"), ' ', $dataset->popup_template);?>';
                var enable_popup = {{ $dataset->enable_popup }};

                var out = [];
                if (f.properties){
                    for(var key in f.properties){
                        templatecode.push("<li><a class='dropdown-item' href='#'>["+key+"]</a></li>");
                        template = template.replace("["+key+"]", f.properties[key]);
                    }
                    if (enable_popup == 1) {
                        l.bindPopup(template);
                    }

                    $('.popup-shortcode').html(templatecode);
                    if (popup_template_value == false) {
                        $('[name=popup_template]').text(shortcodes);
                    }
                }
          
}