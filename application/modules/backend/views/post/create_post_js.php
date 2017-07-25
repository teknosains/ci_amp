<script>
tinymce.init({
    selector: "textarea",
    height:300,
    valid_elements : '*[*]',
    relative_urls: false,
    extended_valid_elements:'script[language|type|src]',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste ",
        "template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor"
});

</script>
