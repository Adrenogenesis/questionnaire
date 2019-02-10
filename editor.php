<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
 
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.2/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.2/css/froala_style.min.css" rel="stylesheet" type="text/css" />
  </head>
 
  <body>
    <!-- Create a tag that we will use as the editable area. -->
    <!-- You can use a div tag as well. -->
    <textarea></textarea>
 
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.2/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> $(function() { $('textarea').froalaEditor() }); </script>


    <div id="myEditor"></div>
<button id="saveButton">Save</button>
 
<script>
  $(function() {
    $('#myEditor')
      .froalaEditor({
        // Set the save param.
        saveParam: 'content',
 
        // Set the save URL.
        saveURL: 'http://example.com/save',
 
        // HTTP request type.
        saveMethod: 'POST',
 
        // Additional save params.
        saveParams: {id: 'my_editor'}
      })
      .on('froalaEditor.save.before', function (e, editor) {
        // Before save request is made.
      })
      .on('froalaEditor.save.after', function (e, editor, response) {
        // After successfully save request.
      })
      .on('froalaEditor.save.error', function (e, editor, error) {
        // Do something here.
      })
  });
 
  $('#saveButton').click (function () {
    $('#myEditor').froalaEditor('save.save')
  })
</script>

  </body>
</html>
