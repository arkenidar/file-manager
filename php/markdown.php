<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markdown Viewer</title>
</head>

<body>

    <a href="<?= $uri ?>"><?= $uri ?></a>
    <div class="markdown-url" data-url="<?= $uri ?>"></div>

    <script>
        async function markdownContentLoaded() {
            await processMarkdownElements()
            postProcessMarkdownElements()
        }

        function postProcessMarkdownElements() {
            document.querySelectorAll('.markdown-to-html a').forEach(_ => markdownLink(_))

            function markdownLink(link) {
                console.info('link.href', link.href)

                // If the link ends with .md, append ?view=html to the href
                if (link.href.endsWith('.md')) {
                    link.href += '?view=html';
                }
            }
        }
    </script>
    <script src="/js/markdown.js"></script>

</body>

</html>