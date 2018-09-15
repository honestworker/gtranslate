/*
Template: AdForest | Largest Classifieds Portal
Author: ScriptsBundle
Version: 1.0
Designed and Development by: ScriptsBundle
*/

(function(){var gtConstEvalStartTime = new Date();function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit2';c._cac='';c._cam='';c._ctkk=eval('((function(){var a\x3d215371421;var b\x3d1061261003;return 426822+\x27.\x27+(a+b)})())');var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();

function googleTranslateElementInit2()
{
    new google.translate.TranslateElement({pageLanguage: 'th', autoDisplay: false}, 'google_translate_element2')
}

function GTranslateGetCurrentLang()
{
    var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');
    return keyValue ? keyValue[2].split('/')[2] : null;
}

function GTranslateFireEvent(element,event)
{
    try{
        if(document.createEventObject){
            var evt=document.createEventObject();
            element.fireEvent('on'+event,evt)
        }else{
            var evt=document.createEvent('HTMLEvents');
            evt.initEvent(event,true,true);
            element.dispatchEvent(evt)
        }}catch(e){}
}

function doGTranslate(lang_pair)
{
    if(lang_pair.value)lang_pair=lang_pair.value;
    if(lang_pair=='')return;
    var lang=lang_pair.split('|')[1];
    if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;
    var teCombo;var sel=document.getElementsByTagName('select');
    for(var i=0;i<sel.length;i++)
        if(/goog-te-combo/.test(sel[i].className)){
            teCombo=sel[i];break;
        }
    if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0)
    {
        setTimeout(function(){
            doGTranslate(lang_pair)
        },500)
    } else
    {
        teCombo.value=lang;GTranslateFireEvent(teCombo,'change');
        GTranslateFireEvent(teCombo,'change')
    }
}

function doChangeMain(base_url, lang, name) {
    jQuery('#main-lang').html('<img height="16" width="16" alt="en" src="' + base_url + '/flags/16/' + lang + '.png">'+name+'<i class="fa fa-angle-down fa-indicator"></i>')
}

if(GTranslateGetCurrentLang() != null)
{
    jQuery(document).ready(function() {
        var lang_html = jQuery('div.switcher div.option').find('img[alt="'+GTranslateGetCurrentLang()+'"]').parent().html();
        if(typeof lang_html != 'undefined')
        jQuery('div.switcher div.selected a').html(lang_html.replace('data-gt-lazy-', ''));
    });
}       