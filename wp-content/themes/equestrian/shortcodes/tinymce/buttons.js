/* [column size="1/2"] */
(function() {  
    tinymce.create('tinymce.plugins.column_12', {  
        init : function(ed, url) {  
            ed.addButton('column_12', {  
                title : 'Add One Half Column',  
                image : url+'/icons/columns_12.png',  
                onclick : function() {  
                     ed.selection.setContent('[column size="1/2" margin="" last="no"]...[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('column_12', tinymce.plugins.column_12);  
})();

/* [column size="1/3"] */
(function() {  
    tinymce.create('tinymce.plugins.column_13', {  
        init : function(ed, url) {  
            ed.addButton('column_13', {  
                title : 'Add One Third Column',  
                image : url+'/icons/columns_13.png',  
                onclick : function() {  
                     ed.selection.setContent('[column size="1/3" margin="" last="no"]...[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('column_13', tinymce.plugins.column_13);  
})();

/* [column size="1/4"] */
(function() {  
    tinymce.create('tinymce.plugins.column_14', {  
        init : function(ed, url) {  
            ed.addButton('column_14', {  
                title : 'Add One Fourth Column',  
                image : url+'/icons/columns_14.png',  
                onclick : function() {  
                     ed.selection.setContent('[column size="1/4" margin="" last="no"]...[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('column_14', tinymce.plugins.column_14);  
})();

/* [column size="2/3"] */
(function() {  
    tinymce.create('tinymce.plugins.column_23', {  
        init : function(ed, url) {  
            ed.addButton('column_23', {  
                title : 'Add Two Thirds Column',  
                image : url+'/icons/columns_23.png',  
                onclick : function() {  
                     ed.selection.setContent('[column size="2/3" margin="" last="no"]...[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('column_23', tinymce.plugins.column_23);  
})();

/* [column size="2/4"] */
(function() {  
    tinymce.create('tinymce.plugins.column_24', {  
        init : function(ed, url) {  
            ed.addButton('column_24', {  
                title : 'Add Two Fourths Column',  
                image : url+'/icons/columns_24.png',  
                onclick : function() {  
                     ed.selection.setContent('[column size="2/4" margin="" last="no"]...[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('column_24', tinymce.plugins.column_24);  
})();

/* [column size="3/4"] */
(function() {  
    tinymce.create('tinymce.plugins.column_34', {  
        init : function(ed, url) {  
            ed.addButton('column_34', {  
                title : 'Add Three Fourths Column',  
                image : url+'/icons/columns_34.png',  
                onclick : function() {  
                     ed.selection.setContent('[column size="3/4" margin="" last="no"]...[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('column_34', tinymce.plugins.column_34);  
})();

/* [divider style="1"] */
(function() {  
    tinymce.create('tinymce.plugins.divider', {  
        init : function(ed, url) {  
            ed.addButton('divider', {  
                title : 'Add Content Divider',  
                image : url+'/icons/divider.png',  
                onclick : function() {  
                     ed.selection.setContent('[divider style="1, 2, 3, 4, 5" before="" after=""]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('divider', tinymce.plugins.divider);  
})();

/* [button link="#" color="default, red" size="small, medium, large, extra-large" title="Add a Button Title" target="_self" rel="follow"] */
(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add Button',  
                image : url+'/icons/button.png',  
                onclick : function() {  
                     ed.selection.setContent('[button link="#" color="default, red, green, blue, violet, navy, gray" size="mini, small, large" title="Add a Button Title" target="_self" rel="nofollow"] Button Text [/button]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();

/* [alert color="red"] */
(function() {  
    tinymce.create('tinymce.plugins.alert', {  
        init : function(ed, url) {  
            ed.addButton('alert', {  
                title : 'Add Alert Box',  
                image : url+'/icons/alert.png',  
                onclick : function() {  
                     ed.selection.setContent('[alert color="yellow, red, blue, green"] '+ ed.selection.getContent() + ' [/alert]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('alert', tinymce.plugins.alert);  
})();

/* [blockquote cite="Person"] */
(function() {  
    tinymce.create('tinymce.plugins.blockquotee', {  
        init : function(ed, url) {  
            ed.addButton('blockquotee', {  
                title : 'Add Blockquote',  
                image : url+'/icons/blockquote.png',  
                onclick : function() {  
                     ed.selection.setContent('[blockquote cite="Person Name" image=""] ' + ed.selection.getContent() +  ' [/blockquote]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('blockquotee', tinymce.plugins.blockquotee);  
})();

/* [list type="bullets"] */
(function() {  
    tinymce.create('tinymce.plugins.lists', {  
        init : function(ed, url) {  
            ed.addButton('lists', {  
                title : 'Add List',  
                image : url+'/icons/list.png',  
                onclick : function() {  
                     ed.selection.setContent('[list type="default, bullets, square, circle, checklist, crosslist"] ... [/list]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('lists', tinymce.plugins.lists);  
})();

/* [abbr title="Descriptive Title of Abbreviation"] */
(function() {  
    tinymce.create('tinymce.plugins.abbrr', {  
        init : function(ed, url) {  
            ed.addButton('abbrr', {  
                title : 'Add Abbreviation',  
                image : url+'/icons/abbr.png',  
                onclick : function() {  
                     ed.selection.setContent('[abbr title=""]' + ed.selection.getContent() + '[/abbr]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('abbrr', tinymce.plugins.abbrr);  
})();

/* [dropcap style=""] */
(function() {  
    tinymce.create('tinymce.plugins.dropcap', {  
        init : function(ed, url) {  
            ed.addButton('dropcap', {  
                title : 'Add Dropcap',  
                image : url+'/icons/dropcap.png',  
                onclick : function() {  
                     ed.selection.setContent('[dropcap]' + ed.selection.getContent() + '[/dropcap]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);  
})();

/* [highlight] */
(function() {  
    tinymce.create('tinymce.plugins.highlight', {  
        init : function(ed, url) {  
            ed.addButton('highlight', {  
                title : 'Add Highlighted Paragraph',  
                image : url+'/icons/highlight.png',  
                onclick : function() {  
                     ed.selection.setContent('[highlight align="left, right, center" style="default, different"]' + ed.selection.getContent() + '[/highlight]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('highlight', tinymce.plugins.highlight);  
})();

/* [call2action] */
(function() {  
    tinymce.create('tinymce.plugins.action', {  
        init : function(ed, url) {  
            ed.addButton('action', {  
                title : 'Add Call to Action Box',  
                image : url+'/icons/action.png',  
                onclick : function() {  
                     ed.selection.setContent('[call2action title="" link="" button=""]' + ed.selection.getContent() + '[/call2action]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('action', tinymce.plugins.action);  
})();

/* [person name="" picture="" facebook="" twitter="" linkedin email=""] */
(function() {  
    tinymce.create('tinymce.plugins.person', {  
        init : function(ed, url) {  
            ed.addButton('person', {  
                title : 'Add Team / Person',  
                image : url+'/icons/person.png',  
                onclick : function() {  
                     ed.selection.setContent('[person name="" position="" picture="" style="default, mini" facebook="" twitter="" linkedin="" email=""] Descriptive text [/person]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('person', tinymce.plugins.person);  
})();

/* [testimonials] */
(function() {  
    tinymce.create('tinymce.plugins.testimonials', {  
        init : function(ed, url) {  
            ed.addButton('testimonials', {  
                title : 'Add Testimonials',  
                image : url+'/icons/testimonials.png',  
                onclick : function() {  
                     ed.selection.setContent('[testimonials] <br> [testimonial name=""] Testimonial Body [/testimonial] <br> [/testimonials]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('testimonials', tinymce.plugins.testimonials);  
})();

/* [youtube] */
(function() {  
    tinymce.create('tinymce.plugins.youtube', {  
        init : function(ed, url) {  
            ed.addButton('youtube', {  
                title : 'Add YouTube Video',  
                image : url+'/icons/youtube.png',  
                onclick : function() {  
                     ed.selection.setContent('[youtube id="(e.g. video id number R4em3LKQCAQ)" width="700" height="390" fullwidth="yes"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);  
})();

/* [vimeo] */
(function() {  
    tinymce.create('tinymce.plugins.vimeo', {  
        init : function(ed, url) {  
            ed.addButton('vimeo', {  
                title : 'Add Vimeo Video',  
                image : url+'/icons/vimeo.png',  
                onclick : function() {  
                     ed.selection.setContent('[vimeo id="(e.g. video id number 61589662)" width="700" height="390" fullwidth="yes"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);  
})();

/* [toggle] */
(function() {  
    tinymce.create('tinymce.plugins.toggle', {  
        init : function(ed, url) {  
            ed.addButton('toggle', {  
                title : 'Add Toggle Box',  
                image : url+'/icons/toggle.png',  
                onclick : function() {  
                     ed.selection.setContent('[toggle-box title="Toggle Title"] '+ ed.selection.getContent() + ' [/toggle-box]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);  
})();

/* [slider] */
(function() {  
    tinymce.create('tinymce.plugins.slider', {  
        init : function(ed, url) {  
            ed.addButton('slider', {  
                title : 'Add New Slider',  
                image : url+'/icons/slides.png',  
                onclick : function() {  
                     ed.selection.setContent('[slider] <br> [slide] Slide 1 Content [/slide] <br> [slide] Slide 2 Content [/slide] <br> [/slider]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('slider', tinymce.plugins.slider);  
})();

/* [marker] */
(function() {  
    tinymce.create('tinymce.plugins.marker', {  
        init : function(ed, url) {  
            ed.addButton('marker', {  
                title : 'Mark Text',  
                image : url+'/icons/marker.png',  
                onclick : function() {  
                     ed.selection.setContent('[marker color="default, red, blue, orange, green, black"] ' + ed.selection.getContent() + ' [/marker]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('marker', tinymce.plugins.marker);  
})();

/* [boxes] */
(function() {  
    tinymce.create('tinymce.plugins.boxes', {  
        init : function(ed, url) {  
            ed.addButton('boxes', {  
                title : 'Add Special Box',  
                image : url+'/icons/boxes.png',  
                onclick : function() {  
                     ed.selection.setContent('[box] '+ ed.selection.getContent() + ' [/box]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('boxes', tinymce.plugins.boxes);  
})();

/* [progress] */
(function() {  
    tinymce.create('tinymce.plugins.progress', {  
        init : function(ed, url) {  
            ed.addButton('progress', {  
                title : 'Add Progress Bar',  
                image : url+'/icons/progress.png',  
                onclick : function() {  
                     ed.selection.setContent('[progress color="red, blue, green, orange" percent="50"] '+ ed.selection.getContent() + ' [/progress]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('progress', tinymce.plugins.progress);  
})();

/* [pricing] */
(function() {  
    tinymce.create('tinymce.plugins.pricing', {  
        init : function(ed, url) {  
            ed.addButton('pricing', {  
                title : 'Add Pricing Tables',  
                image : url+'/icons/pricing.png',  
                onclick : function() {  
                     ed.selection.setContent('[pricing-table]<br>[pricing-column size="1/2, 1/3, 1/4" last="no" highlight="no"]<br>[pricing-header currency="" price="" frequency=""] Title [/pricing-header]<br>[pricing-row] Description [/pricing-row]<br>[pricing-footer][button link="#" color="default, red, green, blue, violet, navy, gray" size="mini, small, large"] Button Text [/button][/pricing-footer]<br>[/pricing-column] <br>[/pricing-table]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('pricing', tinymce.plugins.pricing);  
})();

/* [clear] */
(function() {  
    tinymce.create('tinymce.plugins.clear', {  
        init : function(ed, url) {  
            ed.addButton('clear', {  
                title : 'Clear Floats',  
                image : url+'/icons/clear.png',  
                onclick : function() {  
                     ed.selection.setContent('[clear]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('clear', tinymce.plugins.clear);  
})();

/* [social] */
(function() {  
    tinymce.create('tinymce.plugins.social', {  
        init : function(ed, url) {  
            ed.addButton('social', {  
                title : 'Add Social Box',  
                image : url+'/icons/social.png',  
                onclick : function() {  
                     ed.selection.setContent('[social facebook="" twitter="" flickr="" google="" pinterest="" dribbble="" digg="" yahoo="" rss="" email="" tumblr="" linkedin="" skype=""]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('social', tinymce.plugins.social);  
})();

/* [icon] */
(function() {  
    tinymce.create('tinymce.plugins.icon', {  
        init : function(ed, url) {  
            ed.addButton('icon', {  
                title : 'Add Icon',  
                image : url+'/icons/icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[icon icon="" position="left, center, right" boxed="no" size="2x, 3x, 4x" color="" bg="" border=""]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('icon', tinymce.plugins.icon);  
})();

/* [clients] */
(function() {  
    tinymce.create('tinymce.plugins.clients', {  
        init : function(ed, url) {  
            ed.addButton('clients', {  
                title : 'Add Clients Slider',  
                image : url+'/icons/clients.png',  
                onclick : function() {  
                     ed.selection.setContent('[clients] <br> [client name="" link="" image=""] <br> [client name="" link="" image=""] <br> [/clients]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('clients', tinymce.plugins.clients);  
})();

/* [responsive-image] */
(function() {  
    tinymce.create('tinymce.plugins.photoframe', {  
        init : function(ed, url) {  
            ed.addButton('photoframe', {  
                title : 'Add Photo Frame',  
                image : url+'/icons/responsive.png',  
                onclick : function() {  
                     ed.selection.setContent('[photo-frame] '+ ed.selection.getContent() + ' [/photo-frame]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('photoframe', tinymce.plugins.photoframe);  
})();

/* [lightbox] */
(function() {  
    tinymce.create('tinymce.plugins.lightbox', {  
        init : function(ed, url) {  
            ed.addButton('lightbox', {  
                title : 'Add Lightbox Image',  
                image : url+'/icons/lightbox.png',  
                onclick : function() {  
                     ed.selection.setContent('[pretty-photo title="" image="image file"] '+ ed.selection.getContent() + ' [/pretty-photo]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('lightbox', tinymce.plugins.lightbox);  
})();

/* [recentposts] */
(function() {  
    tinymce.create('tinymce.plugins.recentposts', {  
        init : function(ed, url) {  
            ed.addButton('recentposts', {  
                title : 'Add Recent Posts',  
                image : url+'/icons/recentposts.png',  
                onclick : function() {  
                     ed.selection.setContent('[recent-posts posts="3, 4" category_id="" thumbnail="yes" title="yes" description="no" meta="hide, show"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('recentposts', tinymce.plugins.recentposts);  
})();

/* [recentworks] */
(function() {  
    tinymce.create('tinymce.plugins.recentworks', {  
        init : function(ed, url) {  
            ed.addButton('recentworks', {  
                title : 'Add Recent Works',  
                image : url+'/icons/recentworks.png',  
                onclick : function() {  
                     ed.selection.setContent('[recent-work posts="3,4" category_id=""]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('recentworks', tinymce.plugins.recentworks);  
})();

/* [definition] */
(function() {  
    tinymce.create('tinymce.plugins.definition', {  
        init : function(ed, url) {  
            ed.addButton('definition', {  
                title : 'Add Definition List',  
                image : url+'/icons/definition.png',  
                onclick : function() {  
                     ed.selection.setContent('[definition-list] <br> [definition title="Title"] Put some text here [/definition] <br> [/definition-list]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('definition', tinymce.plugins.definition);  
})();

/* [agenda] */
(function() {  
    tinymce.create('tinymce.plugins.agenda', {  
        init : function(ed, url) {  
            ed.addButton('agenda', {  
                title : 'Add Agenda',  
                image : url+'/icons/agenda.png',  
                onclick : function() {  
                     ed.selection.setContent('[agenda] <br> [event-day date=""] Day Name [/event-day] <br> [event time="" room=""] [/event] <br> [/agenda]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('agenda', tinymce.plugins.agenda);  
})();

/* [accordion] */
(function() {  
    tinymce.create('tinymce.plugins.accordion', {  
        init : function(ed, url) {  
            ed.addButton('accordion', {  
                title : 'Add Accordion',  
                image : url+'/icons/accordion.png',  
                onclick : function() {  
                     ed.selection.setContent('[accordion] <br> [toggle title="Some title"] Description [/toggle] <br> [toggle title="Some title"] Description [/toggle] <br> [/accordion]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);  
})();

/* [tabs] */
(function() {  
    tinymce.create('tinymce.plugins.tabs', {  
        init : function(ed, url) {  
            ed.addButton('tabs', {  
                title : 'Add Horizontal Tabs',  
                image : url+'/icons/tabs.png',  
                onclick : function() {  
                     ed.selection.setContent('[tabs tab1="Title Tab 1" tab2="Title Tab 2"] <br> [tab id="1"] Content tab 1 [/tab] <br> [tab id="2"] Content tab 2 [/tab] <br> [/tabs]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);  
})();

/* [picture-zoom image="image file"] */
(function() {  
    tinymce.create('tinymce.plugins.picturezoom', {  
        init : function(ed, url) {  
            ed.addButton('picturezoom', {  
                title : 'Add Picture Zoom',  
                image : url+'/icons/zoom-picture.png',  
                onclick : function() {  
                     ed.selection.setContent('[picture-zoom image="image file"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('picturezoom', tinymce.plugins.picturezoom);  
})();

/* [countdown] */
(function() {  
    tinymce.create('tinymce.plugins.countdown', {  
        init : function(ed, url) {  
            ed.addButton('countdown', {  
                title : 'Add Countdown',  
                image : url+'/icons/countdown.png',  
                onclick : function() {  
                     ed.selection.setContent('[countdown year="" month="" day="" hour="" minutes="" lang="" align="left"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('countdown', tinymce.plugins.countdown);  
})();

/* [map-maker] */
(function() {  
    tinymce.create('tinymce.plugins.mapmaker', {  
        init : function(ed, url) {  
            ed.addButton('mapmaker', {  
                title : 'Add Map',  
                image : url+'/icons/map.png',  
                onclick : function() {  
                     ed.selection.setContent('[map-maker latitude="" longitude="" type="roadmap" zoom="15" height="400"][/map-maker]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('mapmaker', tinymce.plugins.mapmaker);  
})();