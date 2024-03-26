<textarea {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}></textarea>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.querySelector('textarea');
        textarea.addEventListener('focus', function() {
            textarea.removeAttribute('placeholder');
        });
        textarea.addEventListener('blur', function() {
            if (!textarea.value.trim()) {
                textarea.setAttribute('placeholder');
            }
        });
    });
</script>