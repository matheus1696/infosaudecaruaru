<div id="accordion">
    {{$slot}}
</div>
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const headers = document.querySelectorAll('.accordion-header');

        headers.forEach(header => {
            header.addEventListener('click', function() {
                const item = header.parentElement;
                const content = item.querySelector('.accordion-content');
                const icon = header.querySelector('.accordion-icon');

                // Toggle content visibility with transition
                if (content.classList.contains('max-h-0')) {
                    content.classList.remove('max-h-0');
                    content.classList.add('max-h-screen');
                } else {
                    content.classList.remove('max-h-screen');
                    content.classList.add('max-h-0');
                }

                // Toggle icon
                if (content.classList.contains('max-h-0')) {
                    icon.classList.remove('rotate-180');
                } else {
                    icon.classList.add('rotate-180');
                }
            });
        });
    });
</script>