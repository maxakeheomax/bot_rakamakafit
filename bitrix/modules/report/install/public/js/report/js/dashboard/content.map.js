{"version":3,"sources":["content.js"],"names":["BX","namespace","Report","Dashboard","Content","options","this","height","color","errors","data","rendered","widget","layout","container","prototype","isRendered","setRenderStatus","status","getColor","getHeight","setWidget","getWidget","render","create","html","Html","js","css","config","htmlContentWrapper","apply","arguments","counter","callbacks","ready","callback","callCallbackInContext","id","context","__proto__","constructor","loadAssets","length","load","delegate","fillHtmlContentWrapper","bind","style","minHeight","overflow","addCustomEvent","parentNode","setHeight","Empty","styles","Error","i","push","children"],"mappings":"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","file":""}