<link href="./lib/togglebs.css" rel="stylesheet">
<script src="./lib/togglebs.js"></script>
<script src="./tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    relative_urls : true,
    document_base_url : "http://localhost/harita/",
    menubar:false,
    statusbar:false,
    entity_encoding : "raw",
    selector: '.editor',
    plugins: [
      'advlist autolink link image lists charmap preview hr anchor',
      'visualblocks code fullscreen contextmenu media autoresize',
    ],
    contextmenu: "superscript link bold italic underline",
    toolbar: 'undo redo | styleselect | bold italic superscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | hr link anchor image media charmap | code preview visualblocks fullscreen',
    media_live_embeds: true,
    style_formats: [
           {title: 'Headers', items: [
               {title: 'h1', block: 'h1'},
               {title: 'h2', block: 'h2'},
               {title: 'h3', block: 'h3'},
               {title: 'h4', block: 'h4'},
               {title: 'h5', block: 'h5'},
               {title: 'h6', block: 'h6'}
           ]},
           {title: 'Blocks', items: [
               {title: 'p', block: 'p'},
               {title: 'div', block: 'div'},
               {title: 'pre', block: 'pre'}
           ]},
           {title: 'Tur stilleri', items: [
             {title: 'Blockquote', block: 'blockquote'},
             {title: 'Literature Adana', block: 'p', classes: 'adana'},
             {title: 'Literature Sivas', block: 'p', classes: 'sivas'},
             {title: 'Satır sağa', inline: 'span', classes: 'float-right'},
           ]}
       ]
  });
  tinymce.init({
    selector: '.viewer',
    entity_encoding : "raw",
    menubar:false,
    statusbar:false,
    toolbar: false,
    contextmenu: "link bold italic underline superscript code",
    plugins: ['contextmenu autolink code']
  });
  $(function() {
    $('#vis').bootstrapToggle({
      on: 'Görünsün',
      off: 'Görünmesin',
    });
  })
  $(function() {
    $('#feat').bootstrapToggle({
      on: 'vitrinde',
      off: 'vitrine koy',
    });
  })
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
