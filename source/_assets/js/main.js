/* window.docsearch = require('docsearch.js'); */

import hljs from 'highlight.js/lib/highlight';

hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});


if (document.getElementById("console")) {

    var intervalID = window.setInterval(updateScreen, 340);
    var c = document.getElementById("console");

    var txt = [
        '--> {"jsonrpc": "2.0", "method": "subtract", "params": [42, 23], "id": 1}',
        '<-- {"jsonrpc": "2.0", "result": 19, "id": 1}',
        '--> {"jsonrpc": "2.0", "method": "subtract", "params": [23, 42], "id": 2}',
        '<-- {"jsonrpc": "2.0", "result": -19, "id": 2}',
        '--> {"jsonrpc": "2.0", "method": "subtract", "params": {"subtrahend": 23, "minuend": 42}, "id": 3}',
        '<-- {"jsonrpc": "2.0", "result": 19, "id": 3}',
        '--> {"jsonrpc": "2.0", "method": "subtract", "params": {"minuend": 42, "subtrahend": 23}, "id": 4}',
        '<-- {"jsonrpc": "2.0", "result": 19, "id": 4}',
        '--> {"jsonrpc": "2.0", "method": "foobar", "id": 10}',
        '<-- {"jsonrpc": "2.0", "error": {"code": -32601, "message": "Procedure not found."}, "id": 10}',
        '--> {"jsonrpc": "2.0", "method": "foobar", "params": "bar", "baz"]',
        '<-- {"jsonrpc": "2.0", "error": {"code": -32700, "message": "Parse error"}, "id": null}',
        '--> {"jsonrpc": "2.0", "method": 1, "params": "bar"}',
        '<-- {"jsonrpc": "2.0", "error": {"code": -32600, "message": "Invalid JSON-RPC."}, "id": null}',
    ];

    var docfrag = document.createDocumentFragment();

    function updateScreen() {
        //Shuffle the "txt" array
        txt.push(txt.shift());
        //Rebuild document fragment
        txt.forEach(function (e) {
            var p = document.createElement("p");
            p.textContent = e;
            docfrag.appendChild(p);
        });
        //Clear DOM body
        while (c.firstChild) {
            c.removeChild(c.firstChild);
        }
        c.appendChild(docfrag);
    }
}
