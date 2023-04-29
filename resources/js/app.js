/* window.docsearch = require('docsearch.js'); */

import hljs from 'highlight.js/lib/core';;
import { listen, prefetch } from "quicklink";


import javascript from 'highlight.js/lib/languages/javascript';
import php from 'highlight.js/lib/languages/php';
import bash from 'highlight.js/lib/languages/bash';
import html from 'highlight.js/lib/languages/xml';
import json from 'highlight.js/lib/languages/json';

hljs.registerLanguage('bash', bash);
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('php', php);
hljs.registerLanguage('html', html);
hljs.registerLanguage('json', json);


document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});


if (document.getElementById("console")) {

    var intervalID = window.setInterval(updateScreen, 1240);
    var c = document.getElementById("console");

    const txt = [
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": "subtract", "params": [42, 23], "id": 1}').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "result": 19, "id": 1}').value,
        '<span class="text-primary">---</span>',
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": "subtract", "params": [23, 42], "id": 2}').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "result": -19, "id": 2}').value,
        '<span class="text-primary">---</span>',
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": "subtract", "params": {"subtrahend": 23, "minuend": 42}, "id": 3}').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "result": 19, "id": 3}').value,
        '<span class="text-primary">---</span>',
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": "subtract", "params": {"minuend": 42, "subtrahend": 23}, "id": 4}').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "result": 19, "id": 4}').value,
        '<span class="text-primary">---</span>',
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": "foobar", "id": 10}').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "error": {"code": -32601, "message": "Procedure not found."}, "id": 10}').value,
        '<span class="text-primary">---</span>',
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": "foobar", "params": "bar", "baz"]').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "error": {"code": -32700, "message": "Parse error"}, "id": null}').value,
        '<span class="text-primary">---</span>',
        '--> ' + hljs.highlightAuto('{"jsonrpc": "2.0", "method": 1, "params": "bar"}').value,
        '<-- ' + hljs.highlightAuto('{"jsonrpc": "2.0", "error": {"code": -32600, "message": "Invalid JSON-RPC."}, "id": null}').value,
        '<span class="text-primary">---</span>',
    ];

    var docfrag = document.createDocumentFragment();

    function updateScreen() {
        //Shuffle the "txt" array
        txt.push(txt.shift());
        //Rebuild document fragment
        txt.forEach(function (e) {
            var p = document.createElement("p");
            p.innerHTML = e;

            docfrag.appendChild(p);
        });

        //Clear DOM body
        while (c.firstChild) {
            c.removeChild(c.firstChild);
        }

        c.appendChild(docfrag);
    }
    updateScreen();
}


listen();
