<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>

    <div id="dynamic-content-container">
        <!-- Some content -->
    </div>

    <a href="<?= url_to('my-url-name', 'extra-data') ?>" onclick="updateWithAjax(this, event)">
        Link to update content with AJAX
    </a>

    <script>
        function updateWithAjax(el, event) {
            event.preventDefault() // Prevent the default link behavior

            var url = el.getAttribute('href')

            fetch(url, {
                    method: 'GET',
                    // Set headers according to the docs
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Update the content with the received HTML
                    let contentContainer = document.getElementById('dynamic-content-container')
                    contentContainer.innerHTML = data.newContent
                })
                .catch(error => {
                    console.error('Error:', error)
                })
        }
    </script>

</body>

</html>
