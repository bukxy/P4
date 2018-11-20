<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=q6gomvnyvqv803fth3s6j79vbx30ey6ywuc01tpwrm1frbfj"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="../public/js/back/events.js"></script>

<script src="../public/js/back/global.js"></script>

<script>
    // TinyMCE
    tinymce.init({
        selector: '#tinyMCE',
        height: 500,
        theme: 'modern',
        plugins: 'print preview powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>

<p>&copy; Company 2017-2018</p>