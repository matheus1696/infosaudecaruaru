<!-- Scripts Próprios, Máscaras de Inputs -->
<script src="{{asset('assets/js/maskInput.js')}}"></script>

<!-- Scripts Proteção de envio do formulário -->
<script>
    document.querySelectorAll('.preventSubmitBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            this.disabled = true; // Desativa o botão
            this.closest('form').submit(); // Envia o formulário mais próximo manualmente
        });
    });
</script>

<!-- Configuração do Select2 -->
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    $(document).ready(function() {
        $('.select2-multiple').select2();
    });
</script>

<!-- Configuração do Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
                $('.summernote').summernote({
                    height: 100,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear',]],
                        ['color', ['color']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['height', ['height']],
                        ['font', ['superscript', 'subscript']],
                        // ['table', ['table','addRowDown', 'addRowUp', 'addColLeft', 'addColRight','delete','deleteRow', 'deleteCol', 'deleteTable']],
                        ['view', ['fullscreen']],
                    ],
                    placeholder: 'Digite aqui...',
                });
            });
</script>
