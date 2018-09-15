<?php
// ........

if(!empty($data['show_in_menu'])) {
    add_filter('wp_nav_menu_items', 'gtranslate_menu_item', 10, 2);
    //add_filter('adforest_nav_menu_items', 'gtranslate_menu_item', 10, 2);
    function gtranslate_menu_item($items, $args) {
        $data = get_option('GTranslate');
        GTranslate::load_defaults($data);
        
        $enabled_languages = array();
        $enabled_languages = $data['fincl_langs'];
        
        $wp_plugin_url = preg_replace('/^https?:/i', '', plugins_url() . '/gtranslate');
        
        //adding enabled languages
        $gt_lang_array = array("af"=>"Afrikaans","sq"=>"Albanian","am"=>"Amharic","ar"=>"Arabic","hy"=>"Armenian","az"=>"Azerbaijani","eu"=>"Basque","be"=>"Belarusian","bn"=>"Bengali","bs"=>"Bosnian","bg"=>"Bulgarian","ca"=>"Catalan","ceb"=>"Cebuano","ny"=>"Chichewa","zh-CN"=>"Chinese (Simplified)","zh-TW"=>"Chinese (Traditional)","co"=>"Corsican","hr"=>"Croatian","cs"=>"Czech","da"=>"Danish","nl"=>"Dutch","en"=>"English","eo"=>"Esperanto","et"=>"Estonian","tl"=>"Filipino","fi"=>"Finnish","fr"=>"French","fy"=>"Frisian","gl"=>"Galician","ka"=>"Georgian","de"=>"German","el"=>"Greek","gu"=>"Gujarati","ht"=>"Haitian Creole","ha"=>"Hausa","haw"=>"Hawaiian","iw"=>"Hebrew","hi"=>"Hindi","hmn"=>"Hmong","hu"=>"Hungarian","is"=>"Icelandic","ig"=>"Igbo","id"=>"Indonesian","ga"=>"Irish","it"=>"Italian","ja"=>"Japanese","jw"=>"Javanese","kn"=>"Kannada","kk"=>"Kazakh","km"=>"Khmer","ko"=>"Korean","ku"=>"Kurdish (Kurmanji)","ky"=>"Kyrgyz","lo"=>"Lao","la"=>"Latin","lv"=>"Latvian","lt"=>"Lithuanian","lb"=>"Luxembourgish","mk"=>"Macedonian","mg"=>"Malagasy","ms"=>"Malay","ml"=>"Malayalam","mt"=>"Maltese","mi"=>"Maori","mr"=>"Marathi","mn"=>"Mongolian","my"=>"Myanmar (Burmese)","ne"=>"Nepali","no"=>"Norwegian","ps"=>"Pashto","fa"=>"Persian","pl"=>"Polish","pt"=>"Portuguese","pa"=>"Punjabi","ro"=>"Romanian","ru"=>"Russian","sm"=>"Samoan","gd"=>"Scottish Gaelic","sr"=>"Serbian","st"=>"Sesotho","sn"=>"Shona","sd"=>"Sindhi","si"=>"Sinhala","sk"=>"Slovak","sl"=>"Slovenian","so"=>"Somali","es"=>"Spanish","su"=>"Sudanese","sw"=>"Swahili","sv"=>"Swedish","tg"=>"Tajik","ta"=>"Tamil","te"=>"Telugu","th"=>"Thai","tr"=>"Turkish","uk"=>"Ukrainian","ur"=>"Urdu","uz"=>"Uzbek","vi"=>"Vietnamese","cy"=>"Welsh","xh"=>"Xhosa","yi"=>"Yiddish","yo"=>"Yoruba","zu"=>"Zulu");
        
        $items .= '<li class="hoverTrigger main">';
        if ( count( $enabled_languages > 1 ) ) {
            $items .= '<a id="main-lang" href="#" title="' . $gt_lang_array[$data["default_language"]] . '"><img height="16" width="16" alt="en" src="'. $wp_plugin_url .'/flags/16/'. $data["default_language"] .'.png">'
            . $gt_lang_array[$data["default_language"]] . '<i class="fa fa-angle-down fa-indicator"></i></a>';
            $items .= '<ul class="drop-down-multilevel grid-col-12 effect-expand-top" style="transition: all 400ms ease;">';
        }
        
        foreach( $enabled_languages as $lang ) {
            $items .= '<li class="hoverTrigger switcher"><a href="#" base_url=\'' . plugins_url() . '/gtranslate\' onclick="doGTranslate(\''. $data['default_language'] . '|' . $lang .'\'); doChangeMain(jQuery(this).attr(\'base_url\'), \''. $lang . '\', \'' . $gt_lang_array[$lang] .'\')" title="' . $gt_lang_array[$lang] . '">';
            $items .= '<img data-gt-lazy-src="'. $wp_plugin_url .'/flags/16/'. $lang .'.png" height="16" width="16" alt="en" src="'. $wp_plugin_url .'/flags/16/'. $lang .'.png"> ' . $gt_lang_array[$lang] . '</a>';
            $items .= '</li>';
        }
        
        $items .= '</ul></li>';

        return $items;
    }
}
