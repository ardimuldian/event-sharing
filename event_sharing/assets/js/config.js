CKEDITOR.editorConfig=function(config){config.toolbar='Full';config.toolbar_Basic=[{name:'styles',items:['Font']},{name:'basicstyles',items:['Bold','Italic','Underline','-']},{name:'links',items:['Link']}];config.toolbar_Full=[{name:'styles',items:['Font','FontSize','lineheight']},{name:'basicstyles',items:['Bold','Italic','Underline','-','RemoveFormat']},{name:'colors',items:['TextColor','BGColor']},{name:'paragraph',items:['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']},{name:'links',items:['Link']},{name:'insert',items:['Image','oembed']}];config.embed_provider='//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}'
config.format_tags='p;h1;h2;h3;pre';config.removeDialogTabs='image:advanced;link:advanced';};