/*! highlight.js v9.3.0 | BSD3 License | git.io/hljslicense */ ! function(e) { var n = "object" == typeof window && window || "object" == typeof self && self; "undefined" != typeof exports ? e(exports) : n && (n.hljs = e({}), "function" == typeof define && define.amd && define([], function() { return n.hljs })) }(function(e) {
    function n(e) { return e.replace(/&/gm, "&amp;").replace(/</gm, "&lt;").replace(/>/gm, "&gt;") }

    function t(e) { return e.nodeName.toLowerCase() }

    function r(e, n) { var t = e && e.exec(n); return t && 0 == t.index }

    function a(e) { return /^(no-?highlight|plain|text)$/i.test(e) }

    function i(e) {
        var n, t, r, i = e.className + " ";
        if (i += e.parentNode ? e.parentNode.className : "", t = /\blang(?:uage)?-([\w-]+)\b/i.exec(i)) return w(t[1]) ? t[1] : "no-highlight";
        for (i = i.split(/\s+/), n = 0, r = i.length; r > n; n++)
            if (w(i[n]) || a(i[n])) return i[n]
    }

    function o(e, n) {
        var t, r = {};
        for (t in e) r[t] = e[t];
        if (n)
            for (t in n) r[t] = n[t];
        return r
    }

    function u(e) { var n = []; return function r(e, a) { for (var i = e.firstChild; i; i = i.nextSibling) 3 == i.nodeType ? a += i.nodeValue.length : 1 == i.nodeType && (n.push({ event: "start", offset: a, node: i }), a = r(i, a), t(i).match(/br|hr|img|input/) || n.push({ event: "stop", offset: a, node: i })); return a }(e, 0), n }

    function c(e, r, a) {
        function i() { return e.length && r.length ? e[0].offset != r[0].offset ? e[0].offset < r[0].offset ? e : r : "start" == r[0].event ? e : r : e.length ? e : r }

        function o(e) {
            function r(e) { return " " + e.nodeName + '="' + n(e.value) + '"' }
            f += "<" + t(e) + Array.prototype.map.call(e.attributes, r).join("") + ">"
        }

        function u(e) { f += "</" + t(e) + ">" }

        function c(e) {
            ("start" == e.event ? o : u)(e.node)
        }
        for (var s = 0, f = "", l = []; e.length || r.length;) {
            var g = i();
            if (f += n(a.substr(s, g[0].offset - s)), s = g[0].offset, g == e) {
                l.reverse().forEach(u);
                do c(g.splice(0, 1)[0]), g = i(); while (g == e && g.length && g[0].offset == s);
                l.reverse().forEach(o)
            } else "start" == g[0].event ? l.push(g[0].node) : l.pop(), c(g.splice(0, 1)[0])
        }
        return f + n(a.substr(s))
    }

    function s(e) {
        function n(e) { return e && e.source || e }

        function t(t, r) { return new RegExp(n(t), "m" + (e.cI ? "i" : "") + (r ? "g" : "")) }

        function r(a, i) {
            if (!a.compiled) {
                if (a.compiled = !0, a.k = a.k || a.bK, a.k) {
                    var u = {},
                        c = function(n, t) {
                            e.cI && (t = t.toLowerCase()), t.split(" ").forEach(function(e) {
                                var t = e.split("|");
                                u[t[0]] = [n, t[1] ? Number(t[1]) : 1]
                            })
                        };
                    "string" == typeof a.k ? c("keyword", a.k) : Object.keys(a.k).forEach(function(e) { c(e, a.k[e]) }), a.k = u
                }
                a.lR = t(a.l || /\w+/, !0), i && (a.bK && (a.b = "\\b(" + a.bK.split(" ").join("|") + ")\\b"), a.b || (a.b = /\B|\b/), a.bR = t(a.b), a.e || a.eW || (a.e = /\B|\b/), a.e && (a.eR = t(a.e)), a.tE = n(a.e) || "", a.eW && i.tE && (a.tE += (a.e ? "|" : "") + i.tE)), a.i && (a.iR = t(a.i)), void 0 === a.r && (a.r = 1), a.c || (a.c = []);
                var s = [];
                a.c.forEach(function(e) { e.v ? e.v.forEach(function(n) { s.push(o(e, n)) }) : s.push("self" == e ? a : e) }), a.c = s, a.c.forEach(function(e) { r(e, a) }), a.starts && r(a.starts, i);
                var f = a.c.map(function(e) { return e.bK ? "\\.?(" + e.b + ")\\.?" : e.b }).concat([a.tE, a.i]).map(n).filter(Boolean);
                a.t = f.length ? t(f.join("|"), !0) : { exec: function() { return null } }
            }
        }
        r(e)
    }

    function f(e, t, a, i) {
        function o(e, n) {
            for (var t = 0; t < n.c.length; t++)
                if (r(n.c[t].bR, e)) return n.c[t]
        }

        function u(e, n) { if (r(e.eR, n)) { for (; e.endsParent && e.parent;) e = e.parent; return e } return e.eW ? u(e.parent, n) : void 0 }

        function c(e, n) { return !a && r(n.iR, e) }

        function g(e, n) { var t = N.cI ? n[0].toLowerCase() : n[0]; return e.k.hasOwnProperty(t) && e.k[t] }

        function p(e, n, t, r) {
            var a = r ? "" : E.classPrefix,
                i = '<span class="' + a,
                o = t ? "" : "</span>";
            return i += e + '">', i + n + o
        }

        function h() {
            if (!k.k) return n(M);
            var e = "",
                t = 0;
            k.lR.lastIndex = 0;
            for (var r = k.lR.exec(M); r;) {
                e += n(M.substr(t, r.index - t));
                var a = g(k, r);
                a ? (B += a[1], e += p(a[0], n(r[0]))) : e += n(r[0]), t = k.lR.lastIndex, r = k.lR.exec(M)
            }
            return e + n(M.substr(t))
        }

        function d() { var e = "string" == typeof k.sL; if (e && !R[k.sL]) return n(M); var t = e ? f(k.sL, M, !0, y[k.sL]) : l(M, k.sL.length ? k.sL : void 0); return k.r > 0 && (B += t.r), e && (y[k.sL] = t.top), p(t.language, t.value, !1, !0) }

        function b() { L += void 0 !== k.sL ? d() : h(), M = "" }

        function v(e, n) { L += e.cN ? p(e.cN, "", !0) : "", k = Object.create(e, { parent: { value: k } }) }

        function m(e, n) {
            if (M += e, void 0 === n) return b(), 0;
            var t = o(n, k);
            if (t) return t.skip ? M += n : (t.eB && (M += n), b(), t.rB || t.eB || (M = n)), v(t, n), t.rB ? 0 : n.length;
            var r = u(k, n);
            if (r) {
                var a = k;
                a.skip ? M += n : (a.rE || a.eE || (M += n), b(), a.eE && (M = n));
                do k.cN && (L += "</span>"), k.skip || (B += k.r), k = k.parent; while (k != r.parent);
                return r.starts && v(r.starts, ""), a.rE ? 0 : n.length
            }
            if (c(n, k)) throw new Error('Illegal lexeme "' + n + '" for mode "' + (k.cN || "<unnamed>") + '"');
            return M += n, n.length || 1
        }
        var N = w(e);
        if (!N) throw new Error('Unknown language: "' + e + '"');
        s(N);
        var x, k = i || N,
            y = {},
            L = "";
        for (x = k; x != N; x = x.parent) x.cN && (L = p(x.cN, "", !0) + L);
        var M = "",
            B = 0;
        try {
            for (var C, j, I = 0;;) {
                if (k.t.lastIndex = I, C = k.t.exec(t), !C) break;
                j = m(t.substr(I, C.index - I), C[0]), I = C.index + j
            }
            for (m(t.substr(I)), x = k; x.parent; x = x.parent) x.cN && (L += "</span>");
            return { r: B, value: L, language: e, top: k }
        } catch (O) { if (-1 != O.message.indexOf("Illegal")) return { r: 0, value: n(t) }; throw O }
    }

    function l(e, t) {
        t = t || E.languages || Object.keys(R);
        var r = { r: 0, value: n(e) },
            a = r;
        return t.filter(w).forEach(function(n) {
            var t = f(n, e, !1);
            t.language = n, t.r > a.r && (a = t), t.r > r.r && (a = r, r = t)
        }), a.language && (r.second_best = a), r
    }

    function g(e) { return E.tabReplace && (e = e.replace(/^((<[^>]+>|\t)+)/gm, function(e, n) { return n.replace(/\t/g, E.tabReplace) })), E.useBR && (e = e.replace(/\n/g, "<br>")), e }

    function p(e, n, t) {
        var r = n ? x[n] : t,
            a = [e.trim()];
        return e.match(/\bhljs\b/) || a.push("hljs"), -1 === e.indexOf(r) && a.push(r), a.join(" ").trim()
    }

    function h(e) {
        var n = i(e);
        if (!a(n)) {
            var t;
            E.useBR ? (t = document.createElementNS("http://www.w3.org/1999/xhtml", "div"), t.innerHTML = e.innerHTML.replace(/\n/g, "").replace(/<br[ \/]*>/g, "\n")) : t = e;
            var r = t.textContent,
                o = n ? f(n, r, !0) : l(r),
                s = u(t);
            if (s.length) {
                var h = document.createElementNS("http://www.w3.org/1999/xhtml", "div");
                h.innerHTML = o.value, o.value = c(s, u(h), r)
            }
            o.value = g(o.value), e.innerHTML = o.value, e.className = p(e.className, n, o.language), e.result = { language: o.language, re: o.r }, o.second_best && (e.second_best = { language: o.second_best.language, re: o.second_best.r })
        }
    }

    function d(e) { E = o(E, e) }

    function b() {
        if (!b.called) {
            b.called = !0;
            var e = document.querySelectorAll("pre code");
            Array.prototype.forEach.call(e, h)
        }
    }

    function v() { addEventListener("DOMContentLoaded", b, !1), addEventListener("load", b, !1) }

    function m(n, t) {
        var r = R[n] = t(e);
        r.aliases && r.aliases.forEach(function(e) { x[e] = n })
    }

    function N() { return Object.keys(R) }

    function w(e) { return e = (e || "").toLowerCase(), R[e] || R[x[e]] }
    var E = { classPrefix: "hljs-", tabReplace: null, useBR: !1, languages: void 0 },
        R = {},
        x = {};
    return e.highlight = f, e.highlightAuto = l, e.fixMarkup = g, e.highlightBlock = h, e.configure = d, e.initHighlighting = b, e.initHighlightingOnLoad = v, e.registerLanguage = m, e.listLanguages = N, e.getLanguage = w, e.inherit = o, e.IR = "[a-zA-Z]\\w*", e.UIR = "[a-zA-Z_]\\w*", e.NR = "\\b\\d+(\\.\\d+)?", e.CNR = "(-?)(\\b0[xX][a-fA-F0-9]+|(\\b\\d+(\\.\\d*)?|\\.\\d+)([eE][-+]?\\d+)?)", e.BNR = "\\b(0b[01]+)", e.RSR = "!|!=|!==|%|%=|&|&&|&=|\\*|\\*=|\\+|\\+=|,|-|-=|/=|/|:|;|<<|<<=|<=|<|===|==|=|>>>=|>>=|>=|>>>|>>|>|\\?|\\[|\\{|\\(|\\^|\\^=|\\||\\|=|\\|\\||~", e.BE = { b: "\\\\[\\s\\S]", r: 0 }, e.ASM = { cN: "string", b: "'", e: "'", i: "\\n", c: [e.BE] }, e.QSM = { cN: "string", b: '"', e: '"', i: "\\n", c: [e.BE] }, e.PWM = { b: /\b(a|an|the|are|I'm|isn't|don't|doesn't|won't|but|just|should|pretty|simply|enough|gonna|going|wtf|so|such|will|you|your|like)\b/ }, e.C = function(n, t, r) { var a = e.inherit({ cN: "comment", b: n, e: t, c: [] }, r || {}); return a.c.push(e.PWM), a.c.push({ cN: "doctag", b: "(?:TODO|FIXME|NOTE|BUG|XXX):", r: 0 }), a }, e.CLCM = e.C("//", "$"), e.CBCM = e.C("/\\*", "\\*/"), e.HCM = e.C("#", "$"), e.NM = { cN: "number", b: e.NR, r: 0 }, e.CNM = { cN: "number", b: e.CNR, r: 0 }, e.BNM = { cN: "number", b: e.BNR, r: 0 }, e.CSSNM = { cN: "number", b: e.NR + "(%|em|ex|ch|rem|vw|vh|vmin|vmax|cm|mm|in|pt|pc|px|deg|grad|rad|turn|s|ms|Hz|kHz|dpi|dpcm|dppx)?", r: 0 }, e.RM = { cN: "regexp", b: /\//, e: /\/[gimuy]*/, i: /\n/, c: [e.BE, { b: /\[/, e: /\]/, r: 0, c: [e.BE] }] }, e.TM = { cN: "title", b: e.IR, r: 0 }, e.UTM = { cN: "title", b: e.UIR, r: 0 }, e.METHOD_GUARD = { b: "\\.\\s*" + e.UIR, r: 0 }, e
});
hljs.registerLanguage("css", function(e) {
    var c = "[a-zA-Z-][a-zA-Z0-9_-]*",
        t = { b: /[A-Z\_\.\-]+\s*:/, rB: !0, e: ";", eW: !0, c: [{ cN: "attribute", b: /\S/, e: ":", eE: !0, starts: { eW: !0, eE: !0, c: [{ b: /[\w-]+\(/, rB: !0, c: [{ cN: "built_in", b: /[\w-]+/ }, { b: /\(/, e: /\)/, c: [e.ASM, e.QSM] }] }, e.CSSNM, e.QSM, e.ASM, e.CBCM, { cN: "number", b: "#[0-9A-Fa-f]+" }, { cN: "meta", b: "!important" }] } }] };
    return { cI: !0, i: /[=\/|'\$]/, c: [e.CBCM, { cN: "selector-id", b: /#[A-Za-z0-9_-]+/ }, { cN: "selector-class", b: /\.[A-Za-z0-9_-]+/ }, { cN: "selector-attr", b: /\[/, e: /\]/, i: "$" }, { cN: "selector-pseudo", b: /:(:)?[a-zA-Z0-9\_\-\+\(\)"'.]+/ }, { b: "@(font-face|page)", l: "[a-z-]+", k: "font-face page" }, { b: "@", e: "[{;]", i: /:/, c: [{ cN: "keyword", b: /\w+/ }, { b: /\s/, eW: !0, eE: !0, r: 0, c: [e.ASM, e.QSM, e.CSSNM] }] }, { cN: "selector-tag", b: c, r: 0 }, { b: "{", e: "}", i: /\S/, c: [e.CBCM, t] }] }
});
hljs.registerLanguage("javascript", function(e) { return { aliases: ["js", "jsx"], k: { keyword: "in of if for while finally var new function do return void else break catch instanceof with throw case default try this switch continue typeof delete let yield const export super debugger as async await static import from as", literal: "true false null undefined NaN Infinity", built_in: "eval isFinite isNaN parseFloat parseInt decodeURI decodeURIComponent encodeURI encodeURIComponent escape unescape Object Function Boolean Error EvalError InternalError RangeError ReferenceError StopIteration SyntaxError TypeError URIError Number Math Date String RegExp Array Float32Array Float64Array Int16Array Int32Array Int8Array Uint16Array Uint32Array Uint8Array Uint8ClampedArray ArrayBuffer DataView JSON Intl arguments require module console window document Symbol Set Map WeakSet WeakMap Proxy Reflect Promise" }, c: [{ cN: "meta", r: 10, b: /^\s*['"]use (strict|asm)['"]/ }, { cN: "meta", b: /^#!/, e: /$/ }, e.ASM, e.QSM, { cN: "string", b: "`", e: "`", c: [e.BE, { cN: "subst", b: "\\$\\{", e: "\\}" }] }, e.CLCM, e.CBCM, { cN: "number", v: [{ b: "\\b(0[bB][01]+)" }, { b: "\\b(0[oO][0-7]+)" }, { b: e.CNR }], r: 0 }, { b: "(" + e.RSR + "|\\b(case|return|throw)\\b)\\s*", k: "return throw case", c: [e.CLCM, e.CBCM, e.RM, { b: /</, e: /(\/\w+|\w+\/)>/, sL: "xml", c: [{ b: /<\w+\s*\/>/, skip: !0 }, { b: /<\w+/, e: /(\/\w+|\w+\/)>/, skip: !0, c: ["self"] }] }], r: 0 }, { cN: "function", bK: "function", e: /\{/, eE: !0, c: [e.inherit(e.TM, { b: /[A-Za-z$_][0-9A-Za-z$_]*/ }), { cN: "params", b: /\(/, e: /\)/, eB: !0, eE: !0, c: [e.CLCM, e.CBCM] }], i: /\[|%/ }, { b: /\$[(.]/ }, e.METHOD_GUARD, { cN: "class", bK: "class", e: /[{;=]/, eE: !0, i: /[:"\[\]]/, c: [{ bK: "extends" }, e.UTM] }, { bK: "constructor", e: /\{/, eE: !0 }], i: /#(?!!)/ } });
hljs.registerLanguage("xml", function(s) {
    var e = "[A-Za-z0-9\\._:-]+",
        t = { eW: !0, i: /</, r: 0, c: [{ cN: "attr", b: e, r: 0 }, { b: /=\s*/, r: 0, c: [{ cN: "string", endsParent: !0, v: [{ b: /"/, e: /"/ }, { b: /'/, e: /'/ }, { b: /[^\s"'=<>`]+/ }] }] }] };
    return { aliases: ["html", "xhtml", "rss", "atom", "xsl", "plist"], cI: !0, c: [{ cN: "meta", b: "<!DOCTYPE", e: ">", r: 10, c: [{ b: "\\[", e: "\\]" }] }, s.C("<!--", "-->", { r: 10 }), { b: "<\\!\\[CDATA\\[", e: "\\]\\]>", r: 10 }, { b: /<\?(php)?/, e: /\?>/, sL: "php", c: [{ b: "/\\*", e: "\\*/", skip: !0 }] }, { cN: "tag", b: "<style(?=\\s|>|$)", e: ">", k: { name: "style" }, c: [t], starts: { e: "</style>", rE: !0, sL: ["css", "xml"] } }, { cN: "tag", b: "<script(?=\\s|>|$)", e: ">", k: { name: "script" }, c: [t], starts: { e: "</script>", rE: !0, sL: ["actionscript", "javascript", "handlebars", "xml"] } }, { cN: "meta", v: [{ b: /<\?xml/, e: /\?>/, r: 10 }, { b: /<\?\w+/, e: /\?>/ }] }, { cN: "tag", b: "</?", e: "/?>", c: [{ cN: "name", b: /[^\/><\s]+/, r: 0 }, t] }] }
});