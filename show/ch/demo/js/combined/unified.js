function onYouTubeIframeAPIReady() {
    ytp.YTAPIReady || (ytp.YTAPIReady = !0, jQuery(document).trigger("YTAPIReady"))
}

function uncamel(e) {
    return e.replace(/([A-Z])/g, function(e) {
        return "-" + e.toLowerCase()
    })
}

function setUnit(e, t) {
    return "string" != typeof e || e.match(/^[\-0-9\.]+jQuery/) ? "" + e + t : e
}

function setFilter(e, t, i) {
    var r = uncamel(t),
        s = jQuery.browser.mozilla ? "" : jQuery.CSS.sfx;
    e[s + "filter"] = e[s + "filter"] || "", i = setUnit(i > jQuery.CSS.filters[t].max ? jQuery.CSS.filters[t].max : i, jQuery.CSS.filters[t].unit), e[s + "filter"] += r + "(" + i + ") ", delete e[t]
}

function hexToRgb(e) {
    var t = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    e = e.replace(t, function(e, t, i, r) {
        return t + t + i + i + r + r
    });
    var i = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);
    return i ? {
        r: parseInt(i[1], 16),
        g: parseInt(i[2], 16),
        b: parseInt(i[3], 16)
    } : null
}

function clamp(e, t, i) {
    return Math.min(Math.max(e, t), i)
}

function isInArray(e, t) {
    return t.indexOf(e) > -1
}

function parseBool(e, t) {
    return t = t || {},
        function(e) {
            return "false" === e ? !1 : "true" === e ? !0 : t.force ? !!e : e
        }(t.ignoreCase && "string" == typeof e ? e.toLowerCase() : e)
}

function imgCoverEffect(e, t) {
    "use strict";

    function i() {
        if (t.watchResize === !0 && requestAnimationFrame(i), c || (c = u ? e.width / e.height : e.naturalWidth / e.naturalHeight), n = r.clientWidth, o = r.clientHeight, l = n / o, n !== s || o !== a) {
            if (l >= c ? (e.width = n, e.height = e.width / c) : (e.width = o * c, e.height = o), s = n, a = o, "left" === String(t.alignX).toLowerCase()) e.style.left = 0;
            else if ("center" === String(t.alignX).toLowerCase()) e.style.left = (n - e.width) / 2 + "px";
            else {
                if ("right" !== String(t.alignX).toLowerCase()) throw new Error('From imgCoverEffect(): Unsupported horizontal align value. Property "alignX" can only be set to one of the following values: "left", "center", or "right".');
                e.style.left = n - e.width + "px"
            }
            if ("top" === String(t.alignY).toLowerCase()) e.style.top = 0;
            else if ("center" === String(t.alignY).toLowerCase()) e.style.top = (o - e.height) / 2 + "px";
            else {
                if ("bottom" !== String(t.alignY).toLowerCase()) throw new Error('From imgCoverEffect(): Unsupported vertical align value. Property "alignY" can only be set to one of the following values: "top", "center", or "bottom".');
                e.style.top = o - e.height + "px"
            }
        }
    }
    if (t.watchResize = t.watchResize !== !1, t.alignX = t.alignX || "left", t.alignY = t.alignY || "top", "boolean" != typeof t.watchResize) throw new Error('From imgCoverEffect(): "watchResize" property must be set to a Boolean when the option is specified.');
    if (!e.parentNode) throw new Error("From imgCoverEffect(): passed HTMLImageElement has no parent DOM element.");
    var r = e.parentNode,
        s = 0,
        a = 0,
        n = 0,
        o = 0,
        l = 0,
        c = 0,
        u = void 0 === e.naturalWidth;
    r.style.overflow = "hidden", r.style.position = "relative", e.style.position = "absolute", e.style.top = 0, e.style.left = 0, e.style.zIndex = -1, !u && e.naturalWidth && e.naturalHeight || u && e.width && e.height ? i() : e.addEventListener ? e.addEventListener("load", i, !1) : e.attachEvent && e.attachEvent("onload", i)
}

function randomInt(e, t) {
    return Math[_0x52e7[499]](Math[_0x52e7[197]]() * (t - e + 1) + e)
}

function randomFloat(e, t) {
    return (Math[_0x52e7[197]]() * (t - e) + e)[_0x52e7[70]](1)
}

function isFloat(e) {
    return e === +e && e !== (0 | e)
}

function shuffleArray(e) {
    for (var t = e[_0x52e7[54]] - 1; t > 0; t--) {
        var i = Math[_0x52e7[499]](Math[_0x52e7[197]]() * (t + 1)),
            r = e[t];
        e[t] = e[i], e[i] = r
    }
    return e
}

function centerArray(e) {
    for (var t = [], i = Math[_0x52e7[175]](e[_0x52e7[54]] / 2), r = i - 1; r >= 0;) t[_0x52e7[249]](e[r--]), i < e[_0x52e7[54]] && t[_0x52e7[249]](e[i++]);
    return t
}
this.createjs = this.createjs || {},
    function() {
        "use strict";
        var e = createjs.PreloadJS = createjs.PreloadJS || {};
        e.version = "NEXT", e.buildDate = "Thu, 10 Mar 2016 17:20:13 GMT"
    }(), this.createjs = this.createjs || {}, createjs.extend = function(e, t) {
    "use strict";

    function i() {
        this.constructor = e
    }
    return i.prototype = t.prototype, e.prototype = new i
}, this.createjs = this.createjs || {}, createjs.promote = function(e, t) {
    "use strict";
    var i = e.prototype,
        r = Object.getPrototypeOf && Object.getPrototypeOf(i) || i.__proto__;
    if (r) {
        i[(t += "_") + "constructor"] = r.constructor;
        for (var s in r) i.hasOwnProperty(s) && "function" == typeof r[s] && (i[t + s] = r[s])
    }
    return e
}, this.createjs = this.createjs || {},
    function() {
        "use strict";
        createjs.proxy = function(e, t) {
            var i = Array.prototype.slice.call(arguments, 2);
            return function() {
                return e.apply(t, Array.prototype.slice.call(arguments, 0).concat(i))
            }
        }
    }(), this.createjs = this.createjs || {}, createjs.indexOf = function(e, t) {
    "use strict";
    for (var i = 0, r = e.length; r > i; i++)
        if (t === e[i]) return i;
    return -1
}, this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.type = e, this.target = null, this.currentTarget = null, this.eventPhase = 0, this.bubbles = !!t, this.cancelable = !!i, this.timeStamp = (new Date).getTime(), this.defaultPrevented = !1, this.propagationStopped = !1, this.immediatePropagationStopped = !1, this.removed = !1
        }
        var t = e.prototype;
        t.preventDefault = function() {
            this.defaultPrevented = this.cancelable && !0
        }, t.stopPropagation = function() {
            this.propagationStopped = !0
        }, t.stopImmediatePropagation = function() {
            this.immediatePropagationStopped = this.propagationStopped = !0
        }, t.remove = function() {
            this.removed = !0
        }, t.clone = function() {
            return new e(this.type, this.bubbles, this.cancelable)
        }, t.set = function(e) {
            for (var t in e) this[t] = e[t];
            return this
        }, t.toString = function() {
            return "[Event (type=" + this.type + ")]"
        }, createjs.Event = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.Event_constructor("error"), this.title = e, this.message = t, this.data = i
        }
        var t = createjs.extend(e, createjs.Event);
        t.clone = function() {
            return new createjs.ErrorEvent(this.title, this.message, this.data)
        }, createjs.ErrorEvent = createjs.promote(e, "Event")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e() {
            this._listeners = null, this._captureListeners = null
        }
        var t = e.prototype;
        e.initialize = function(e) {
            e.addEventListener = t.addEventListener, e.on = t.on, e.removeEventListener = e.off = t.removeEventListener, e.removeAllEventListeners = t.removeAllEventListeners, e.hasEventListener = t.hasEventListener, e.dispatchEvent = t.dispatchEvent, e._dispatchEvent = t._dispatchEvent, e.willTrigger = t.willTrigger
        }, t.addEventListener = function(e, t, i) {
            var r;
            r = i ? this._captureListeners = this._captureListeners || {} : this._listeners = this._listeners || {};
            var s = r[e];
            return s && this.removeEventListener(e, t, i), s = r[e], s ? s.push(t) : r[e] = [t], t
        }, t.on = function(e, t, i, r, s, a) {
            return t.handleEvent && (i = i || t, t = t.handleEvent), i = i || this, this.addEventListener(e, function(e) {
                t.call(i, e, s), r && e.remove()
            }, a)
        }, t.removeEventListener = function(e, t, i) {
            var r = i ? this._captureListeners : this._listeners;
            if (r) {
                var s = r[e];
                if (s)
                    for (var a = 0, n = s.length; n > a; a++)
                        if (s[a] == t) {
                            1 == n ? delete r[e] : s.splice(a, 1);
                            break
                        }
            }
        }, t.off = t.removeEventListener, t.removeAllEventListeners = function(e) {
            e ? (this._listeners && delete this._listeners[e], this._captureListeners && delete this._captureListeners[e]) : this._listeners = this._captureListeners = null
        }, t.dispatchEvent = function(e, t, i) {
            if ("string" == typeof e) {
                var r = this._listeners;
                if (!(t || r && r[e])) return !0;
                e = new createjs.Event(e, t, i)
            } else e.target && e.clone && (e = e.clone());
            try {
                e.target = this
            } catch (s) {}
            if (e.bubbles && this.parent) {
                for (var a = this, n = [a]; a.parent;) n.push(a = a.parent);
                var o, l = n.length;
                for (o = l - 1; o >= 0 && !e.propagationStopped; o--) n[o]._dispatchEvent(e, 1 + (0 == o));
                for (o = 1; l > o && !e.propagationStopped; o++) n[o]._dispatchEvent(e, 3)
            } else this._dispatchEvent(e, 2);
            return !e.defaultPrevented
        }, t.hasEventListener = function(e) {
            var t = this._listeners,
                i = this._captureListeners;
            return !!(t && t[e] || i && i[e])
        }, t.willTrigger = function(e) {
            for (var t = this; t;) {
                if (t.hasEventListener(e)) return !0;
                t = t.parent
            }
            return !1
        }, t.toString = function() {
            return "[EventDispatcher]"
        }, t._dispatchEvent = function(e, t) {
            var i, r = 1 == t ? this._captureListeners : this._listeners;
            if (e && r) {
                var s = r[e.type];
                if (!s || !(i = s.length)) return;
                try {
                    e.currentTarget = this
                } catch (a) {}
                try {
                    e.eventPhase = t
                } catch (a) {}
                e.removed = !1, s = s.slice();
                for (var n = 0; i > n && !e.immediatePropagationStopped; n++) {
                    var o = s[n];
                    o.handleEvent ? o.handleEvent(e) : o(e), e.removed && (this.off(e.type, o, 1 == t), e.removed = !1)
                }
            }
        }, createjs.EventDispatcher = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.Event_constructor("progress"), this.loaded = e, this.total = null == t ? 1 : t, this.progress = 0 == t ? 0 : this.loaded / this.total
        }
        var t = createjs.extend(e, createjs.Event);
        t.clone = function() {
            return new createjs.ProgressEvent(this.loaded, this.total)
        }, createjs.ProgressEvent = createjs.promote(e, "Event")
    }(window),
    function() {
        function e(t, r) {
            function a(e) {
                if (a[e] !== x) return a[e];
                var t;
                if ("bug-string-char-index" == e) t = "a" != "a" [0];
                else if ("json" == e) t = a("json-stringify") && a("json-parse");
                else {
                    var i, s = '{"a":[1,true,false,null,"\\u0000\\b\\n\\f\\r\\t"]}';
                    if ("json-stringify" == e) {
                        var l = r.stringify,
                            u = "function" == typeof l && v;
                        if (u) {
                            (i = function() {
                                return 1
                            }).toJSON = i;
                            try {
                                u = "0" === l(0) && "0" === l(new n) && '""' == l(new o) && l(y) === x && l(x) === x && l() === x && "1" === l(i) && "[1]" == l([i]) && "[null]" == l([x]) && "null" == l(null) && "[null,null,null]" == l([x, y, null]) && l({
                                    a: [i, !0, !1, null, "\x00\b\n\f\r	"]
                                }) == s && "1" === l(null, i) && "[\n 1,\n 2\n]" == l([1, 2], null, 1) && '"-271821-04-20T00:00:00.000Z"' == l(new c(-864e13)) && '"+275760-09-13T00:00:00.000Z"' == l(new c(864e13)) && '"-000001-01-01T00:00:00.000Z"' == l(new c(-621987552e5)) && '"1969-12-31T23:59:59.999Z"' == l(new c(-1))
                            } catch (_) {
                                u = !1
                            }
                        }
                        t = u
                    }
                    if ("json-parse" == e) {
                        var h = r.parse;
                        if ("function" == typeof h) try {
                            if (0 === h("0") && !h(!1)) {
                                i = h(s);
                                var d = 5 == i.a.length && 1 === i.a[0];
                                if (d) {
                                    try {
                                        d = !h('"	"')
                                    } catch (_) {}
                                    if (d) try {
                                        d = 1 !== h("01")
                                    } catch (_) {}
                                    if (d) try {
                                        d = 1 !== h("1.")
                                    } catch (_) {}
                                }
                            }
                        } catch (_) {
                            d = !1
                        }
                        t = d
                    }
                }
                return a[e] = !!t
            }
            t || (t = s.Object()), r || (r = s.Object());
            var n = t.Number || s.Number,
                o = t.String || s.String,
                l = t.Object || s.Object,
                c = t.Date || s.Date,
                u = t.SyntaxError || s.SyntaxError,
                _ = t.TypeError || s.TypeError,
                h = t.Math || s.Math,
                d = t.JSON || s.JSON;
            "object" == typeof d && d && (r.stringify = d.stringify, r.parse = d.parse);
            var p, f, x, m = l.prototype,
                y = m.toString,
                v = new c(-0xc782b5b800cec);
            try {
                v = -109252 == v.getUTCFullYear() && 0 === v.getUTCMonth() && 1 === v.getUTCDate() && 10 == v.getUTCHours() && 37 == v.getUTCMinutes() && 6 == v.getUTCSeconds() && 708 == v.getUTCMilliseconds()
            } catch (g) {}
            if (!a("json")) {
                var b = "[object Function]",
                    T = "[object Date]",
                    P = "[object Number]",
                    w = "[object String]",
                    j = "[object Array]",
                    S = "[object Boolean]",
                    A = a("bug-string-char-index");
                if (!v) var E = h.floor,
                    L = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334],
                    R = function(e, t) {
                        return L[t] + 365 * (e - 1970) + E((e - 1969 + (t = +(t > 1))) / 4) - E((e - 1901 + t) / 100) + E((e - 1601 + t) / 400)
                    };
                if ((p = m.hasOwnProperty) || (p = function(e) {
                    var t, i = {};
                    return (i.__proto__ = null, i.__proto__ = {
                        toString: 1
                    }, i).toString != y ? p = function(e) {
                        var t = this.__proto__,
                            i = e in (this.__proto__ = null, this);
                        return this.__proto__ = t, i
                    } : (t = i.constructor, p = function(e) {
                        var i = (this.constructor || t).prototype;
                        return e in this && !(e in i && this[e] === i[e])
                    }), i = null, p.call(this, e)
                }), f = function(e, t) {
                    var r, s, a, n = 0;
                    (r = function() {
                        this.valueOf = 0
                    }).prototype.valueOf = 0, s = new r;
                    for (a in s) p.call(s, a) && n++;
                    return r = s = null, n ? f = 2 == n ? function(e, t) {
                        var i, r = {},
                            s = y.call(e) == b;
                        for (i in e) s && "prototype" == i || p.call(r, i) || !(r[i] = 1) || !p.call(e, i) || t(i)
                    } : function(e, t) {
                        var i, r, s = y.call(e) == b;
                        for (i in e) s && "prototype" == i || !p.call(e, i) || (r = "constructor" === i) || t(i);
                        (r || p.call(e, i = "constructor")) && t(i)
                    } : (s = ["valueOf", "toString", "toLocaleString", "propertyIsEnumerable", "isPrototypeOf", "hasOwnProperty", "constructor"], f = function(e, t) {
                        var r, a, n = y.call(e) == b,
                            o = !n && "function" != typeof e.constructor && i[typeof e.hasOwnProperty] && e.hasOwnProperty || p;
                        for (r in e) n && "prototype" == r || !o.call(e, r) || t(r);
                        for (a = s.length; r = s[--a]; o.call(e, r) && t(r));
                    }), f(e, t)
                }, !a("json-stringify")) {
                    var Y = {
                            92: "\\\\",
                            34: '\\"',
                            8: "\\b",
                            12: "\\f",
                            10: "\\n",
                            13: "\\r",
                            9: "\\t"
                        },
                        C = "000000",
                        k = function(e, t) {
                            return (C + (t || 0)).slice(-e)
                        },
                        I = "\\u00",
                        M = function(e) {
                            for (var t = '"', i = 0, r = e.length, s = !A || r > 10, a = s && (A ? e.split("") : e); r > i; i++) {
                                var n = e.charCodeAt(i);
                                switch (n) {
                                    case 8:
                                    case 9:
                                    case 10:
                                    case 12:
                                    case 13:
                                    case 34:
                                    case 92:
                                        t += Y[n];
                                        break;
                                    default:
                                        if (32 > n) {
                                            t += I + k(2, n.toString(16));
                                            break
                                        }
                                        t += s ? a[i] : e.charAt(i)
                                }
                            }
                            return t + '"'
                        },
                        O = function(e, t, i, r, s, a, n) {
                            var o, l, c, u, h, d, m, v, g, b, A, L, Y, C, I, D;
                            try {
                                o = t[e]
                            } catch (Q) {}
                            if ("object" == typeof o && o)
                                if (l = y.call(o), l != T || p.call(o, "toJSON")) "function" == typeof o.toJSON && (l != P && l != w && l != j || p.call(o, "toJSON")) && (o = o.toJSON(e));
                                else if (o > -1 / 0 && 1 / 0 > o) {
                                    if (R) {
                                        for (h = E(o / 864e5), c = E(h / 365.2425) + 1970 - 1; R(c + 1, 0) <= h; c++);
                                        for (u = E((h - R(c, 0)) / 30.42); R(c, u + 1) <= h; u++);
                                        h = 1 + h - R(c, u), d = (o % 864e5 + 864e5) % 864e5, m = E(d / 36e5) % 24, v = E(d / 6e4) % 60, g = E(d / 1e3) % 60, b = d % 1e3
                                    } else c = o.getUTCFullYear(), u = o.getUTCMonth(), h = o.getUTCDate(), m = o.getUTCHours(), v = o.getUTCMinutes(), g = o.getUTCSeconds(), b = o.getUTCMilliseconds();
                                    o = (0 >= c || c >= 1e4 ? (0 > c ? "-" : "+") + k(6, 0 > c ? -c : c) : k(4, c)) + "-" + k(2, u + 1) + "-" + k(2, h) + "T" + k(2, m) + ":" + k(2, v) + ":" + k(2, g) + "." + k(3, b) + "Z"
                                } else o = null;
                            if (i && (o = i.call(t, e, o)), null === o) return "null";
                            if (l = y.call(o), l == S) return "" + o;
                            if (l == P) return o > -1 / 0 && 1 / 0 > o ? "" + o : "null";
                            if (l == w) return M("" + o);
                            if ("object" == typeof o) {
                                for (C = n.length; C--;)
                                    if (n[C] === o) throw _();
                                if (n.push(o), A = [], I = a, a += s, l == j) {
                                    for (Y = 0, C = o.length; C > Y; Y++) L = O(Y, o, i, r, s, a, n), A.push(L === x ? "null" : L);
                                    D = A.length ? s ? "[\n" + a + A.join(",\n" + a) + "\n" + I + "]" : "[" + A.join(",") + "]" : "[]"
                                } else f(r || o, function(e) {
                                    var t = O(e, o, i, r, s, a, n);
                                    t !== x && A.push(M(e) + ":" + (s ? " " : "") + t)
                                }), D = A.length ? s ? "{\n" + a + A.join(",\n" + a) + "\n" + I + "}" : "{" + A.join(",") + "}" : "{}";
                                return n.pop(), D
                            }
                        };
                    r.stringify = function(e, t, r) {
                        var s, a, n, o;
                        if (i[typeof t] && t)
                            if ((o = y.call(t)) == b) a = t;
                            else if (o == j) {
                                n = {};
                                for (var l, c = 0, u = t.length; u > c; l = t[c++], o = y.call(l), (o == w || o == P) && (n[l] = 1));
                            }
                        if (r)
                            if ((o = y.call(r)) == P) {
                                if ((r -= r % 1) > 0)
                                    for (s = "", r > 10 && (r = 10); s.length < r; s += " ");
                            } else o == w && (s = r.length <= 10 ? r : r.slice(0, 10));
                        return O("", (l = {}, l[""] = e, l), a, n, s, "", [])
                    }
                }
                if (!a("json-parse")) {
                    var D, Q, F = o.fromCharCode,
                        N = {
                            92: "\\",
                            34: '"',
                            47: "/",
                            98: "\b",
                            116: "	",
                            110: "\n",
                            102: "\f",
                            114: "\r"
                        },
                        B = function() {
                            throw D = Q = null, u()
                        },
                        q = function() {
                            for (var e, t, i, r, s, a = Q, n = a.length; n > D;) switch (s = a.charCodeAt(D)) {
                                case 9:
                                case 10:
                                case 13:
                                case 32:
                                    D++;
                                    break;
                                case 123:
                                case 125:
                                case 91:
                                case 93:
                                case 58:
                                case 44:
                                    return e = A ? a.charAt(D) : a[D], D++, e;
                                case 34:
                                    for (e = "@", D++; n > D;)
                                        if (s = a.charCodeAt(D), 32 > s) B();
                                        else if (92 == s) switch (s = a.charCodeAt(++D)) {
                                            case 92:
                                            case 34:
                                            case 47:
                                            case 98:
                                            case 116:
                                            case 110:
                                            case 102:
                                            case 114:
                                                e += N[s], D++;
                                                break;
                                            case 117:
                                                for (t = ++D, i = D + 4; i > D; D++) s = a.charCodeAt(D), s >= 48 && 57 >= s || s >= 97 && 102 >= s || s >= 65 && 70 >= s || B();
                                                e += F("0x" + a.slice(t, D));
                                                break;
                                            default:
                                                B()
                                        } else {
                                            if (34 == s) break;
                                            for (s = a.charCodeAt(D), t = D; s >= 32 && 92 != s && 34 != s;) s = a.charCodeAt(++D);
                                            e += a.slice(t, D)
                                        }
                                    if (34 == a.charCodeAt(D)) return D++, e;
                                    B();
                                default:
                                    if (t = D, 45 == s && (r = !0, s = a.charCodeAt(++D)), s >= 48 && 57 >= s) {
                                        for (48 == s && (s = a.charCodeAt(D + 1), s >= 48 && 57 >= s) && B(), r = !1; n > D && (s = a.charCodeAt(D), s >= 48 && 57 >= s); D++);
                                        if (46 == a.charCodeAt(D)) {
                                            for (i = ++D; n > i && (s = a.charCodeAt(i), s >= 48 && 57 >= s); i++);
                                            i == D && B(), D = i
                                        }
                                        if (s = a.charCodeAt(D), 101 == s || 69 == s) {
                                            for (s = a.charCodeAt(++D), (43 == s || 45 == s) && D++, i = D; n > i && (s = a.charCodeAt(i), s >= 48 && 57 >= s); i++);
                                            i == D && B(), D = i
                                        }
                                        return +a.slice(t, D)
                                    }
                                    if (r && B(), "true" == a.slice(D, D + 4)) return D += 4, !0;
                                    if ("false" == a.slice(D, D + 5)) return D += 5, !1;
                                    if ("null" == a.slice(D, D + 4)) return D += 4, null;
                                    B()
                            }
                            return "$"
                        },
                        U = function(e) {
                            var t, i;
                            if ("$" == e && B(), "string" == typeof e) {
                                if ("@" == (A ? e.charAt(0) : e[0])) return e.slice(1);
                                if ("[" == e) {
                                    for (t = []; e = q(), "]" != e; i || (i = !0)) i && ("," == e ? (e = q(), "]" == e && B()) : B()), "," == e && B(), t.push(U(e));
                                    return t
                                }
                                if ("{" == e) {
                                    for (t = {}; e = q(), "}" != e; i || (i = !0)) i && ("," == e ? (e = q(), "}" == e && B()) : B()), ("," == e || "string" != typeof e || "@" != (A ? e.charAt(0) : e[0]) || ":" != q()) && B(), t[e.slice(1)] = U(q());
                                    return t
                                }
                                B()
                            }
                            return e
                        },
                        X = function(e, t, i) {
                            var r = z(e, t, i);
                            r === x ? delete e[t] : e[t] = r
                        },
                        z = function(e, t, i) {
                            var r, s = e[t];
                            if ("object" == typeof s && s)
                                if (y.call(s) == j)
                                    for (r = s.length; r--;) X(s, r, i);
                                else f(s, function(e) {
                                    X(s, e, i)
                                });
                            return i.call(e, t, s)
                        };
                    r.parse = function(e, t) {
                        var i, r;
                        return D = 0, Q = "" + e, i = U(q()), "$" != q() && B(), D = Q = null, t && y.call(t) == b ? z((r = {}, r[""] = i, r), "", t) : i
                    }
                }
            }
            return r.runInContext = e, r
        }
        var t = "function" == typeof define && define.amd,
            i = {
                "function": !0,
                object: !0
            },
            r = i[typeof exports] && exports && !exports.nodeType && exports,
            s = i[typeof window] && window || this,
            a = r && i[typeof module] && module && !module.nodeType && "object" == typeof global && global;
        if (!a || a.global !== a && a.window !== a && a.self !== a || (s = a), r && !t) e(s, r);
        else {
            var n = s.JSON,
                o = s.JSON3,
                l = !1,
                c = e(s, s.JSON3 = {
                    noConflict: function() {
                        return l || (l = !0, s.JSON = n, s.JSON3 = o, n = o = null), c
                    }
                });
            s.JSON = {
                parse: c.parse,
                stringify: c.stringify
            }
        }
        t && define(function() {
            return c
        })
    }.call(this),
    function() {
        var e = {};
        e.a = function() {
            return e.el("a")
        }, e.svg = function() {
            return e.el("svg")
        }, e.object = function() {
            return e.el("object")
        }, e.image = function() {
            return e.el("image")
        }, e.img = function() {
            return e.el("img")
        }, e.style = function() {
            return e.el("style")
        }, e.link = function() {
            return e.el("link")
        }, e.script = function() {
            return e.el("script")
        }, e.audio = function() {
            return e.el("audio")
        }, e.video = function() {
            return e.el("video")
        }, e.text = function(e) {
            return document.createTextNode(e)
        }, e.el = function(e) {
            return document.createElement(e)
        }, createjs.Elements = e
    }(),
    function() {
        var e = {};
        e.ABSOLUTE_PATT = /^(?:\w+:)?\/{2}/i, e.RELATIVE_PATT = /^[.\/]*?\//i, e.EXTENSION_PATT = /\/?[^\/]+\.(\w{1,5})$/i, e.parseURI = function(t) {
            var i = {
                absolute: !1,
                relative: !1,
                protocol: null,
                hostname: null,
                port: null,
                pathname: null,
                search: null,
                hash: null,
                host: null
            };
            if (null == t) return i;
            var r = createjs.Elements.a();
            r.href = t;
            for (var s in i) s in r && (i[s] = r[s]);
            var a = t.indexOf("?");
            a > -1 && (t = t.substr(0, a));
            var n;
            return e.ABSOLUTE_PATT.test(t) ? i.absolute = !0 : e.RELATIVE_PATT.test(t) && (i.relative = !0), (n = t.match(e.EXTENSION_PATT)) && (i.extension = n[1].toLowerCase()), i
        }, e.formatQueryString = function(e, t) {
            if (null == e) throw new Error("You must specify data.");
            var i = [];
            for (var r in e) i.push(r + "=" + escape(e[r]));
            return t && (i = i.concat(t)), i.join("&")
        }, e.buildURI = function(e, t) {
            if (null == t) return e;
            var i = [],
                r = e.indexOf("?");
            if (-1 != r) {
                var s = e.slice(r + 1);
                i = i.concat(s.split("&"))
            }
            return -1 != r ? e.slice(0, r) + "?" + this.formatQueryString(t, i) : e + "?" + this.formatQueryString(t, i)
        }, e.isCrossDomain = function(e) {
            var t = createjs.Elements.a();
            t.href = e.src;
            var i = createjs.Elements.a();
            i.href = location.href;
            var r = "" != t.hostname && (t.port != i.port || t.protocol != i.protocol || t.hostname != i.hostname);
            return r
        }, e.isLocal = function(e) {
            var t = createjs.Elements.a();
            return t.href = e.src, "" == t.hostname && "file:" == t.protocol
        }, createjs.URLUtils = e
    }(),
    function() {
        var e = {};
        e.appendToHead = function(t) {
            e.getHead().appendChild(t)
        }, e.appendToBody = function(t) {
            e.getBody().appendChild(t)
        }, e.getHead = function() {
            return document.head || document.getElementsByTagName("head")[0]
        }, e.getBody = function() {
            return document.body || document.getElementsByTagName("body")[0]
        }, e.removeChild = function(e) {
            e.parent && e.parent.removeChild(e)
        }, e.isImageTag = function(e) {
            return e instanceof HTMLImageElement
        }, e.isAudioTag = function(e) {
            return window.HTMLAudioElement ? e instanceof HTMLAudioElement : !1
        }, e.isVideoTag = function(e) {
            return window.HTMLVideoElement ? e instanceof HTMLVideoElement : !1
        }, createjs.DomUtils = e
    }(),
    function() {
        var e = {};
        e.parseXML = function(e) {
            var t = null;
            try {
                if (window.DOMParser) {
                    var i = new DOMParser;
                    t = i.parseFromString(e, "text/xml")
                }
            } catch (r) {}
            if (!t) try {
                t = new ActiveXObject("Microsoft.XMLDOM"), t.async = !1, t.loadXML(e)
            } catch (r) {
                t = null
            }
            return t
        }, e.parseJSON = function(e) {
            if (null == e) return null;
            try {
                return JSON.parse(e)
            } catch (t) {
                throw t
            }
        }, createjs.DataUtils = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e() {
            this.src = null, this.type = null, this.id = null, this.maintainOrder = !1, this.callback = null, this.data = null, this.method = createjs.LoadItem.GET, this.values = null, this.headers = null, this.withCredentials = !1, this.mimeType = null, this.crossOrigin = null, this.loadTimeout = i.LOAD_TIMEOUT_DEFAULT
        }
        var t = e.prototype = {},
            i = e;
        i.LOAD_TIMEOUT_DEFAULT = 8e3, i.create = function(t) {
            if ("string" == typeof t) {
                var r = new e;
                return r.src = t, r
            }
            if (t instanceof i) return t;
            if (t instanceof Object && t.src) return null == t.loadTimeout && (t.loadTimeout = i.LOAD_TIMEOUT_DEFAULT), t;
            throw new Error("Type not recognized.")
        }, t.set = function(e) {
            for (var t in e) this[t] = e[t];
            return this
        }, createjs.LoadItem = i
    }(),
    function() {
        var e = {};
        e.isBinary = function(e) {
            switch (e) {
                case createjs.AbstractLoader.IMAGE:
                case createjs.AbstractLoader.BINARY:
                    return !0;
                default:
                    return !1
            }
        }, e.isText = function(e) {
            switch (e) {
                case createjs.AbstractLoader.TEXT:
                case createjs.AbstractLoader.JSON:
                case createjs.AbstractLoader.MANIFEST:
                case createjs.AbstractLoader.XML:
                case createjs.AbstractLoader.CSS:
                case createjs.AbstractLoader.SVG:
                case createjs.AbstractLoader.JAVASCRIPT:
                case createjs.AbstractLoader.SPRITESHEET:
                    return !0;
                default:
                    return !1
            }
        }, e.getTypeByExtension = function(e) {
            if (null == e) return createjs.AbstractLoader.TEXT;
            switch (e.toLowerCase()) {
                case "jpeg":
                case "jpg":
                case "gif":
                case "png":
                case "webp":
                case "bmp":
                    return createjs.AbstractLoader.IMAGE;
                case "ogg":
                case "mp3":
                case "webm":
                    return createjs.AbstractLoader.SOUND;
                case "mp4":
                case "webm":
                case "ts":
                    return createjs.AbstractLoader.VIDEO;
                case "json":
                    return createjs.AbstractLoader.JSON;
                case "xml":
                    return createjs.AbstractLoader.XML;
                case "css":
                    return createjs.AbstractLoader.CSS;
                case "js":
                    return createjs.AbstractLoader.JAVASCRIPT;
                case "svg":
                    return createjs.AbstractLoader.SVG;
                default:
                    return createjs.AbstractLoader.TEXT
            }
        }, createjs.RequestUtils = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.EventDispatcher_constructor(), this.loaded = !1, this.canceled = !1, this.progress = 0, this.type = i, this.resultFormatter = null, this._item = e ? createjs.LoadItem.create(e) : null, this._preferXHR = t, this._result = null, this._rawResult = null, this._loadedItems = null, this._tagSrcAttribute = null, this._tag = null
        }
        var t = createjs.extend(e, createjs.EventDispatcher),
            i = e;
        i.POST = "POST", i.GET = "GET", i.BINARY = "binary", i.CSS = "css", i.IMAGE = "image", i.JAVASCRIPT = "javascript", i.JSON = "json", i.JSONP = "jsonp", i.MANIFEST = "manifest", i.SOUND = "sound", i.VIDEO = "video", i.SPRITESHEET = "spritesheet", i.SVG = "svg", i.TEXT = "text", i.XML = "xml", t.getItem = function() {
            return this._item
        }, t.getResult = function(e) {
            return e ? this._rawResult : this._result
        }, t.getTag = function() {
            return this._tag
        }, t.setTag = function(e) {
            this._tag = e
        }, t.load = function() {
            this._createRequest(), this._request.on("complete", this, this), this._request.on("progress", this, this), this._request.on("loadStart", this, this), this._request.on("abort", this, this), this._request.on("timeout", this, this), this._request.on("error", this, this);
            var e = new createjs.Event("initialize");
            e.loader = this._request, this.dispatchEvent(e), this._request.load()
        }, t.cancel = function() {
            this.canceled = !0, this.destroy()
        }, t.destroy = function() {
            this._request && (this._request.removeAllEventListeners(), this._request.destroy()), this._request = null, this._item = null, this._rawResult = null, this._result = null, this._loadItems = null, this.removeAllEventListeners()
        }, t.getLoadedItems = function() {
            return this._loadedItems
        }, t._createRequest = function() {
            this._request = this._preferXHR ? new createjs.XHRRequest(this._item) : new createjs.TagRequest(this._item, this._tag || this._createTag(), this._tagSrcAttribute)
        }, t._createTag = function() {
            return null
        }, t._sendLoadStart = function() {
            this._isCanceled() || this.dispatchEvent("loadstart")
        }, t._sendProgress = function(e) {
            if (!this._isCanceled()) {
                var t = null;
                "number" == typeof e ? (this.progress = e, t = new createjs.ProgressEvent(this.progress)) : (t = e, this.progress = e.loaded / e.total, t.progress = this.progress, (isNaN(this.progress) || 1 / 0 == this.progress) && (this.progress = 0)), this.hasEventListener("progress") && this.dispatchEvent(t)
            }
        }, t._sendComplete = function() {
            if (!this._isCanceled()) {
                this.loaded = !0;
                var e = new createjs.Event("complete");
                e.rawResult = this._rawResult, null != this._result && (e.result = this._result), this.dispatchEvent(e)
            }
        }, t._sendError = function(e) {
            !this._isCanceled() && this.hasEventListener("error") && (null == e && (e = new createjs.ErrorEvent("PRELOAD_ERROR_EMPTY")), this.dispatchEvent(e))
        }, t._isCanceled = function() {
            return null == window.createjs || this.canceled ? !0 : !1
        }, t.resultFormatter = null, t.handleEvent = function(e) {
            switch (e.type) {
                case "complete":
                    this._rawResult = e.target._response;
                    var t = this.resultFormatter && this.resultFormatter(this);
                    t instanceof Function ? t.call(this, createjs.proxy(this._resultFormatSuccess, this), createjs.proxy(this._resultFormatFailed, this)) : (this._result = t || this._rawResult, this._sendComplete());
                    break;
                case "progress":
                    this._sendProgress(e);
                    break;
                case "error":
                    this._sendError(e);
                    break;
                case "loadstart":
                    this._sendLoadStart();
                    break;
                case "abort":
                case "timeout":
                    this._isCanceled() || this.dispatchEvent(new createjs.ErrorEvent("PRELOAD_" + e.type.toUpperCase() + "_ERROR"))
            }
        }, t._resultFormatSuccess = function(e) {
            this._result = e, this._sendComplete()
        }, t._resultFormatFailed = function(e) {
            this._sendError(e)
        }, t.buildPath = function(e, t) {
            return createjs.URLUtils.buildURI(e, t)
        }, t.toString = function() {
            return "[PreloadJS AbstractLoader]"
        }, createjs.AbstractLoader = createjs.promote(e, "EventDispatcher")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractLoader_constructor(e, t, i), this.resultFormatter = this._formatResult, this._tagSrcAttribute = "src", this.on("initialize", this._updateXHR, this)
        }
        var t = createjs.extend(e, createjs.AbstractLoader);
        t.load = function() {
            this._tag || (this._tag = this._createTag(this._item.src)), this._tag.preload = "auto", this._tag.load(), this.AbstractLoader_load()
        }, t._createTag = function() {}, t._createRequest = function() {
            this._request = this._preferXHR ? new createjs.XHRRequest(this._item) : new createjs.MediaTagRequest(this._item, this._tag || this._createTag(), this._tagSrcAttribute)
        }, t._updateXHR = function(e) {
            e.loader.setResponseType && e.loader.setResponseType("blob")
        }, t._formatResult = function(e) {
            if (this._tag.removeEventListener && this._tag.removeEventListener("canplaythrough", this._loadedHandler), this._tag.onstalled = null, this._preferXHR) {
                var t = window.URL || window.webkitURL,
                    i = e.getResult(!0);
                e.getTag().src = t.createObjectURL(i)
            }
            return e.getTag()
        }, createjs.AbstractMediaLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";
        var e = function(e) {
                this._item = e
            },
            t = createjs.extend(e, createjs.EventDispatcher);
        t.load = function() {}, t.destroy = function() {}, t.cancel = function() {}, createjs.AbstractRequest = createjs.promote(e, "EventDispatcher")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractRequest_constructor(e), this._tag = t, this._tagSrcAttribute = i, this._loadedHandler = createjs.proxy(this._handleTagComplete, this), this._addedToDOM = !1, this._startTagVisibility = null
        }
        var t = createjs.extend(e, createjs.AbstractRequest);
        t.load = function() {
            this._tag.onload = createjs.proxy(this._handleTagComplete, this), this._tag.onreadystatechange = createjs.proxy(this._handleReadyStateChange, this), this._tag.onerror = createjs.proxy(this._handleError, this);
            var e = new createjs.Event("initialize");
            e.loader = this._tag, this.dispatchEvent(e), this._hideTag(), this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), this._item.loadTimeout), this._tag[this._tagSrcAttribute] = this._item.src, null == this._tag.parentNode && (createjs.DomUtils.appendToBody(this._tag), this._addedToDOM = !0)
        }, t.destroy = function() {
            this._clean(), this._tag = null, this.AbstractRequest_destroy()
        }, t._handleReadyStateChange = function() {
            clearTimeout(this._loadTimeout);
            var e = this._tag;
            ("loaded" == e.readyState || "complete" == e.readyState) && this._handleTagComplete()
        }, t._handleError = function() {
            this._clean(), this.dispatchEvent("error")
        }, t._handleTagComplete = function() {
            this._rawResult = this._tag, this._result = this.resultFormatter && this.resultFormatter(this) || this._rawResult, this._clean(), this._showTag(), this.dispatchEvent("complete")
        }, t._handleTimeout = function() {
            this._clean(), this.dispatchEvent(new createjs.Event("timeout"))
        }, t._clean = function() {
            this._tag.onload = null, this._tag.onreadystatechange = null, this._tag.onerror = null, this._addedToDOM && null != this._tag.parentNode && this._tag.parentNode.removeChild(this._tag), clearTimeout(this._loadTimeout)
        }, t._hideTag = function() {
            this._startTagVisibility = this._tag.style.visibility, this._tag.style.visibility = "hidden"
        }, t._showTag = function() {
            this._tag.style.visibility = this._startTagVisibility
        }, t._handleStalled = function() {}, createjs.TagRequest = createjs.promote(e, "AbstractRequest")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractRequest_constructor(e), this._tag = t, this._tagSrcAttribute = i, this._loadedHandler = createjs.proxy(this._handleTagComplete, this)
        }
        var t = createjs.extend(e, createjs.TagRequest);
        t.load = function() {
            var e = createjs.proxy(this._handleStalled, this);
            this._stalledCallback = e;
            var t = createjs.proxy(this._handleProgress, this);
            this._handleProgress = t, this._tag.addEventListener("stalled", e), this._tag.addEventListener("progress", t), this._tag.addEventListener && this._tag.addEventListener("canplaythrough", this._loadedHandler, !1), this.TagRequest_load()
        }, t._handleReadyStateChange = function() {
            clearTimeout(this._loadTimeout);
            var e = this._tag;
            ("loaded" == e.readyState || "complete" == e.readyState) && this._handleTagComplete()
        }, t._handleStalled = function() {}, t._handleProgress = function(e) {
            if (e && !(e.loaded > 0 && 0 == e.total)) {
                var t = new createjs.ProgressEvent(e.loaded, e.total);
                this.dispatchEvent(t)
            }
        }, t._clean = function() {
            this._tag.removeEventListener && this._tag.removeEventListener("canplaythrough", this._loadedHandler), this._tag.removeEventListener("stalled", this._stalledCallback), this._tag.removeEventListener("progress", this._progressCallback), this.TagRequest__clean()
        }, createjs.MediaTagRequest = createjs.promote(e, "TagRequest")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractRequest_constructor(e), this._request = null, this._loadTimeout = null, this._xhrLevel = 1, this._response = null, this._rawResponse = null, this._canceled = !1, this._handleLoadStartProxy = createjs.proxy(this._handleLoadStart, this), this._handleProgressProxy = createjs.proxy(this._handleProgress, this), this._handleAbortProxy = createjs.proxy(this._handleAbort, this), this._handleErrorProxy = createjs.proxy(this._handleError, this), this._handleTimeoutProxy = createjs.proxy(this._handleTimeout, this), this._handleLoadProxy = createjs.proxy(this._handleLoad, this), this._handleReadyStateChangeProxy = createjs.proxy(this._handleReadyStateChange, this), !this._createXHR(e)
        }
        var t = createjs.extend(e, createjs.AbstractRequest);
        e.ACTIVEX_VERSIONS = ["Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.5.0", "Msxml2.XMLHTTP.4.0", "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"], t.getResult = function(e) {
            return e && this._rawResponse ? this._rawResponse : this._response
        }, t.cancel = function() {
            this.canceled = !0, this._clean(), this._request.abort()
        }, t.load = function() {
            if (null == this._request) return void this._handleError();
            null != this._request.addEventListener ? (this._request.addEventListener("loadstart", this._handleLoadStartProxy, !1), this._request.addEventListener("progress", this._handleProgressProxy, !1), this._request.addEventListener("abort", this._handleAbortProxy, !1), this._request.addEventListener("error", this._handleErrorProxy, !1), this._request.addEventListener("timeout", this._handleTimeoutProxy, !1), this._request.addEventListener("load", this._handleLoadProxy, !1), this._request.addEventListener("readystatechange", this._handleReadyStateChangeProxy, !1)) : (this._request.onloadstart = this._handleLoadStartProxy, this._request.onprogress = this._handleProgressProxy, this._request.onabort = this._handleAbortProxy, this._request.onerror = this._handleErrorProxy, this._request.ontimeout = this._handleTimeoutProxy, this._request.onload = this._handleLoadProxy, this._request.onreadystatechange = this._handleReadyStateChangeProxy), 1 == this._xhrLevel && (this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), this._item.loadTimeout));
            try {
                this._item.values ? this._request.send(createjs.URLUtils.formatQueryString(this._item.values)) : this._request.send()
            } catch (e) {
                this.dispatchEvent(new createjs.ErrorEvent("XHR_SEND", null, e))
            }
        }, t.setResponseType = function(e) {
            "blob" === e && (e = window.URL ? "blob" : "arraybuffer", this._responseType = e), this._request.responseType = e
        }, t.getAllResponseHeaders = function() {
            return this._request.getAllResponseHeaders instanceof Function ? this._request.getAllResponseHeaders() : null
        }, t.getResponseHeader = function(e) {
            return this._request.getResponseHeader instanceof Function ? this._request.getResponseHeader(e) : null
        }, t._handleProgress = function(e) {
            if (e && !(e.loaded > 0 && 0 == e.total)) {
                var t = new createjs.ProgressEvent(e.loaded, e.total);
                this.dispatchEvent(t)
            }
        }, t._handleLoadStart = function() {
            clearTimeout(this._loadTimeout), this.dispatchEvent("loadstart")
        }, t._handleAbort = function(e) {
            this._clean(), this.dispatchEvent(new createjs.ErrorEvent("XHR_ABORTED", null, e))
        }, t._handleError = function(e) {
            this._clean(), this.dispatchEvent(new createjs.ErrorEvent(e.message))
        }, t._handleReadyStateChange = function() {
            4 == this._request.readyState && this._handleLoad();
        }, t._handleLoad = function() {
            if (!this.loaded) {
                this.loaded = !0;
                var e = this._checkError();
                if (e) return void this._handleError(e);
                if (this._response = this._getResponse(), "arraybuffer" === this._responseType) try {
                    this._response = new Blob([this._response])
                } catch (t) {
                    if (window.BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder || window.MSBlobBuilder, "TypeError" === t.name && window.BlobBuilder) {
                        var i = new BlobBuilder;
                        i.append(this._response), this._response = i.getBlob()
                    }
                }
                this._clean(), this.dispatchEvent(new createjs.Event("complete"))
            }
        }, t._handleTimeout = function(e) {
            this._clean(), this.dispatchEvent(new createjs.ErrorEvent("PRELOAD_TIMEOUT", null, e))
        }, t._checkError = function() {
            var e = parseInt(this._request.status);
            return e >= 400 && 599 >= e ? new Error(e) : null
        }, t._getResponse = function() {
            if (null != this._response) return this._response;
            if (null != this._request.response) return this._request.response;
            try {
                if (null != this._request.responseText) return this._request.responseText
            } catch (e) {}
            try {
                if (null != this._request.responseXML) return this._request.responseXML
            } catch (e) {}
            return null
        }, t._createXHR = function(e) {
            var t = createjs.URLUtils.isCrossDomain(e),
                i = {},
                r = null;
            if (window.XMLHttpRequest) r = new XMLHttpRequest, t && void 0 === r.withCredentials && window.XDomainRequest && (r = new XDomainRequest);
            else {
                for (var a = 0, n = s.ACTIVEX_VERSIONS.length; n > a; a++) {
                    var o = s.ACTIVEX_VERSIONS[a];
                    try {
                        r = new ActiveXObject(o);
                        break
                    } catch (l) {}
                }
                if (null == r) return !1
            }
            null == e.mimeType && createjs.RequestUtils.isText(e.type) && (e.mimeType = "text/plain; charset=utf-8"), e.mimeType && r.overrideMimeType && r.overrideMimeType(e.mimeType), this._xhrLevel = "string" == typeof r.responseType ? 2 : 1;
            var c = null;
            if (c = e.method == createjs.AbstractLoader.GET ? createjs.URLUtils.buildURI(e.src, e.values) : e.src, r.open(e.method || createjs.AbstractLoader.GET, c, !0), t && r instanceof XMLHttpRequest && 1 == this._xhrLevel && (i.Origin = location.origin), e.values && e.method == createjs.AbstractLoader.POST && (i["Content-Type"] = "application/x-www-form-urlencoded"), t || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest"), e.headers)
                for (var u in e.headers) i[u] = e.headers[u];
            for (u in i) r.setRequestHeader(u, i[u]);
            return r instanceof XMLHttpRequest && void 0 !== e.withCredentials && (r.withCredentials = e.withCredentials), this._request = r, !0
        }, t._clean = function() {
            clearTimeout(this._loadTimeout), null != this._request.removeEventListener ? (this._request.removeEventListener("loadstart", this._handleLoadStartProxy), this._request.removeEventListener("progress", this._handleProgressProxy), this._request.removeEventListener("abort", this._handleAbortProxy), this._request.removeEventListener("error", this._handleErrorProxy), this._request.removeEventListener("timeout", this._handleTimeoutProxy), this._request.removeEventListener("load", this._handleLoadProxy), this._request.removeEventListener("readystatechange", this._handleReadyStateChangeProxy)) : (this._request.onloadstart = null, this._request.onprogress = null, this._request.onabort = null, this._request.onerror = null, this._request.ontimeout = null, this._request.onload = null, this._request.onreadystatechange = null)
        }, t.toString = function() {
            return "[PreloadJS XHRRequest]"
        }, createjs.XHRRequest = createjs.promote(e, "AbstractRequest")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractLoader_constructor(), this._plugins = [], this._typeCallbacks = {}, this._extensionCallbacks = {}, this.next = null, this.maintainScriptOrder = !0, this.stopOnError = !1, this._maxConnections = 1, this._availableLoaders = [createjs.ImageLoader, createjs.JavaScriptLoader, createjs.CSSLoader, createjs.JSONLoader, createjs.JSONPLoader, createjs.SoundLoader, createjs.ManifestLoader, createjs.SpriteSheetLoader, createjs.XMLLoader, createjs.SVGLoader, createjs.BinaryLoader, createjs.VideoLoader, createjs.TextLoader], this._defaultLoaderLength = this._availableLoaders.length, this.init(e, t, i)
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        t.init = function(e, t, i) {
            this.useXHR = !0, this.preferXHR = !0, this._preferXHR = !0, this.setPreferXHR(e), this._paused = !1, this._basePath = t, this._crossOrigin = i, this._loadStartWasDispatched = !1, this._currentlyLoadingScript = null, this._currentLoads = [], this._loadQueue = [], this._loadQueueBackup = [], this._loadItemsById = {}, this._loadItemsBySrc = {}, this._loadedResults = {}, this._loadedRawResults = {}, this._numItems = 0, this._numItemsLoaded = 0, this._scriptOrder = [], this._loadedScripts = [], this._lastProgress = NaN
        }, i.loadTimeout = 8e3, i.LOAD_TIMEOUT = 0, i.BINARY = createjs.AbstractLoader.BINARY, i.CSS = createjs.AbstractLoader.CSS, i.IMAGE = createjs.AbstractLoader.IMAGE, i.JAVASCRIPT = createjs.AbstractLoader.JAVASCRIPT, i.JSON = createjs.AbstractLoader.JSON, i.JSONP = createjs.AbstractLoader.JSONP, i.MANIFEST = createjs.AbstractLoader.MANIFEST, i.SOUND = createjs.AbstractLoader.SOUND, i.VIDEO = createjs.AbstractLoader.VIDEO, i.SVG = createjs.AbstractLoader.SVG, i.TEXT = createjs.AbstractLoader.TEXT, i.XML = createjs.AbstractLoader.XML, i.POST = createjs.AbstractLoader.POST, i.GET = createjs.AbstractLoader.GET, t.registerLoader = function(e) {
            if (!e || !e.canLoadItem) throw new Error("loader is of an incorrect type.");
            if (-1 != this._availableLoaders.indexOf(e)) throw new Error("loader already exists.");
            this._availableLoaders.unshift(e)
        }, t.unregisterLoader = function(e) {
            var t = this._availableLoaders.indexOf(e); - 1 != t && t < this._defaultLoaderLength - 1 && this._availableLoaders.splice(t, 1)
        }, t.setUseXHR = function(e) {
            return this.setPreferXHR(e)
        }, t.setPreferXHR = function(e) {
            return this.preferXHR = 0 != e && null != window.XMLHttpRequest, this.preferXHR
        }, t.removeAll = function() {
            this.remove()
        }, t.remove = function(e) {
            var t = null;
            if (e && !Array.isArray(e)) t = [e];
            else if (e) t = e;
            else if (arguments.length > 0) return;
            var i = !1;
            if (t) {
                for (; t.length;) {
                    var r = t.pop(),
                        s = this.getResult(r);
                    for (a = this._loadQueue.length - 1; a >= 0; a--)
                        if (n = this._loadQueue[a].getItem(), n.id == r || n.src == r) {
                            this._loadQueue.splice(a, 1)[0].cancel();
                            break
                        } for (a = this._loadQueueBackup.length - 1; a >= 0; a--)
                        if (n = this._loadQueueBackup[a].getItem(), n.id == r || n.src == r) {
                            this._loadQueueBackup.splice(a, 1)[0].cancel();
                            break
                        } if (s) this._disposeItem(this.getItem(r));
                    else
                        for (var a = this._currentLoads.length - 1; a >= 0; a--) {
                            var n = this._currentLoads[a].getItem();
                            if (n.id == r || n.src == r) {
                                this._currentLoads.splice(a, 1)[0].cancel(), i = !0;
                                break
                            }
                        }
                }
                i && this._loadNext()
            } else {
                this.close();
                for (var o in this._loadItemsById) this._disposeItem(this._loadItemsById[o]);
                this.init(this.preferXHR, this._basePath)
            }
        }, t.reset = function() {
            this.close();
            for (var e in this._loadItemsById) this._disposeItem(this._loadItemsById[e]);
            for (var t = [], i = 0, r = this._loadQueueBackup.length; r > i; i++) t.push(this._loadQueueBackup[i].getItem());
            this.loadManifest(t, !1)
        }, t.installPlugin = function(e) {
            if (null != e && null != e.getPreloadHandlers) {
                this._plugins.push(e);
                var t = e.getPreloadHandlers();
                if (t.scope = e, null != t.types)
                    for (var i = 0, r = t.types.length; r > i; i++) this._typeCallbacks[t.types[i]] = t;
                if (null != t.extensions)
                    for (i = 0, r = t.extensions.length; r > i; i++) this._extensionCallbacks[t.extensions[i]] = t
            }
        }, t.setMaxConnections = function(e) {
            this._maxConnections = e, !this._paused && this._loadQueue.length > 0 && this._loadNext()
        }, t.loadFile = function(e, t, i) {
            if (null == e) {
                var r = new createjs.ErrorEvent("PRELOAD_NO_FILE");
                return void this._sendError(r)
            }
            this._addItem(e, null, i), this.setPaused(t !== !1 ? !1 : !0)
        }, t.loadManifest = function(e, t, r) {
            var s = null,
                a = null;
            if (Array.isArray(e)) {
                if (0 == e.length) {
                    var n = new createjs.ErrorEvent("PRELOAD_MANIFEST_EMPTY");
                    return void this._sendError(n)
                }
                s = e
            } else if ("string" == typeof e) s = [{
                src: e,
                type: i.MANIFEST
            }];
            else {
                if ("object" != typeof e) {
                    var n = new createjs.ErrorEvent("PRELOAD_MANIFEST_NULL");
                    return void this._sendError(n)
                }
                if (void 0 !== e.src) {
                    if (null == e.type) e.type = i.MANIFEST;
                    else if (e.type != i.MANIFEST) {
                        var n = new createjs.ErrorEvent("PRELOAD_MANIFEST_TYPE");
                        this._sendError(n)
                    }
                    s = [e]
                } else void 0 !== e.manifest && (s = e.manifest, a = e.path)
            }
            for (var o = 0, l = s.length; l > o; o++) this._addItem(s[o], a, r);
            this.setPaused(t !== !1 ? !1 : !0)
        }, t.load = function() {
            this.setPaused(!1)
        }, t.getItem = function(e) {
            return this._loadItemsById[e] || this._loadItemsBySrc[e]
        }, t.getResult = function(e, t) {
            var i = this._loadItemsById[e] || this._loadItemsBySrc[e];
            if (null == i) return null;
            var r = i.id;
            return t && this._loadedRawResults[r] ? this._loadedRawResults[r] : this._loadedResults[r]
        }, t.getItems = function(e) {
            var t = [];
            for (var i in this._loadItemsById) {
                var r = this._loadItemsById[i],
                    s = this.getResult(i);
                (e !== !0 || null != s) && t.push({
                    item: r,
                    result: s,
                    rawResult: this.getResult(i, !0)
                })
            }
            return t
        }, t.setPaused = function(e) {
            this._paused = e, this._paused || this._loadNext()
        }, t.close = function() {
            for (; this._currentLoads.length;) this._currentLoads.pop().cancel();
            this._scriptOrder.length = 0, this._loadedScripts.length = 0, this.loadStartWasDispatched = !1, this._itemCount = 0, this._lastProgress = NaN
        }, t._addItem = function(e, t, i) {
            var r = this._createLoadItem(e, t, i);
            if (null != r) {
                var s = this._createLoader(r);
                null != s && ("plugins" in s && (s.plugins = this._plugins), r._loader = s, this._loadQueue.push(s), this._loadQueueBackup.push(s), this._numItems++, this._updateProgress(), (this.maintainScriptOrder && r.type == createjs.LoadQueue.JAVASCRIPT || r.maintainOrder === !0) && (this._scriptOrder.push(r), this._loadedScripts.push(null)))
            }
        }, t._createLoadItem = function(e, t, i) {
            var r = createjs.LoadItem.create(e);
            if (null == r) return null;
            var s = "",
                a = i || this._basePath;
            if (r.src instanceof Object) {
                if (!r.type) return null;
                if (t) {
                    s = t;
                    var n = createjs.URLUtils.parseURI(t);
                    null == a || n.absolute || n.relative || (s = a + s)
                } else null != a && (s = a)
            } else {
                var o = createjs.URLUtils.parseURI(r.src);
                o.extension && (r.ext = o.extension), null == r.type && (r.type = createjs.RequestUtils.getTypeByExtension(r.ext));
                var l = r.src;
                if (!o.absolute && !o.relative)
                    if (t) {
                        s = t;
                        var n = createjs.URLUtils.parseURI(t);
                        l = t + l, null == a || n.absolute || n.relative || (s = a + s)
                    } else null != a && (s = a);
                r.src = s + r.src
            }
            r.path = s, (void 0 === r.id || null === r.id || "" === r.id) && (r.id = l);
            var c = this._typeCallbacks[r.type] || this._extensionCallbacks[r.ext];
            if (c) {
                var u = c.callback.call(c.scope, r, this);
                if (u === !1) return null;
                u === !0 || null != u && (r._loader = u), o = createjs.URLUtils.parseURI(r.src), null != o.extension && (r.ext = o.extension)
            }
            return this._loadItemsById[r.id] = r, this._loadItemsBySrc[r.src] = r, null == r.crossOrigin && (r.crossOrigin = this._crossOrigin), r
        }, t._createLoader = function(e) {
            if (null != e._loader) return e._loader;
            for (var t = this.preferXHR, i = 0; i < this._availableLoaders.length; i++) {
                var r = this._availableLoaders[i];
                if (r && r.canLoadItem(e)) return new r(e, t)
            }
            return null
        }, t._loadNext = function() {
            if (!this._paused) {
                this._loadStartWasDispatched || (this._sendLoadStart(), this._loadStartWasDispatched = !0), this._numItems == this._numItemsLoaded ? (this.loaded = !0, this._sendComplete(), this.next && this.next.load && this.next.load()) : this.loaded = !1;
                for (var e = 0; e < this._loadQueue.length && !(this._currentLoads.length >= this._maxConnections); e++) {
                    var t = this._loadQueue[e];
                    this._canStartLoad(t) && (this._loadQueue.splice(e, 1), e--, this._loadItem(t))
                }
            }
        }, t._loadItem = function(e) {
            e.on("fileload", this._handleFileLoad, this), e.on("progress", this._handleProgress, this), e.on("complete", this._handleFileComplete, this), e.on("error", this._handleError, this), e.on("fileerror", this._handleFileError, this), this._currentLoads.push(e), this._sendFileStart(e.getItem()), e.load()
        }, t._handleFileLoad = function(e) {
            e.target = null, this.dispatchEvent(e)
        }, t._handleFileError = function(e) {
            var t = new createjs.ErrorEvent("FILE_LOAD_ERROR", null, e.item);
            this._sendError(t)
        }, t._handleError = function(e) {
            var t = e.target;
            this._numItemsLoaded++, this._finishOrderedItem(t, !0), this._updateProgress();
            var i = new createjs.ErrorEvent("FILE_LOAD_ERROR", null, t.getItem());
            this._sendError(i), this.stopOnError ? this.setPaused(!0) : (this._removeLoadItem(t), this._cleanLoadItem(t), this._loadNext())
        }, t._handleFileComplete = function(e) {
            var t = e.target,
                i = t.getItem(),
                r = t.getResult();
            this._loadedResults[i.id] = r;
            var s = t.getResult(!0);
            null != s && s !== r && (this._loadedRawResults[i.id] = s), this._saveLoadedItems(t), this._removeLoadItem(t), this._finishOrderedItem(t) || this._processFinishedLoad(i, t), this._cleanLoadItem(t)
        }, t._saveLoadedItems = function(e) {
            var t = e.getLoadedItems();
            if (null !== t)
                for (var i = 0; i < t.length; i++) {
                    var r = t[i].item;
                    this._loadItemsBySrc[r.src] = r, this._loadItemsById[r.id] = r, this._loadedResults[r.id] = t[i].result, this._loadedRawResults[r.id] = t[i].rawResult
                }
        }, t._finishOrderedItem = function(e, t) {
            var i = e.getItem();
            if (this.maintainScriptOrder && i.type == createjs.LoadQueue.JAVASCRIPT || i.maintainOrder) {
                e instanceof createjs.JavaScriptLoader && (this._currentlyLoadingScript = !1);
                var r = createjs.indexOf(this._scriptOrder, i);
                return -1 == r ? !1 : (this._loadedScripts[r] = t === !0 ? !0 : i, this._checkScriptLoadOrder(), !0)
            }
            return !1
        }, t._checkScriptLoadOrder = function() {
            for (var e = this._loadedScripts.length, t = 0; e > t; t++) {
                var i = this._loadedScripts[t];
                if (null === i) break;
                if (i !== !0) {
                    var r = this._loadedResults[i.id];
                    i.type == createjs.LoadQueue.JAVASCRIPT && createjs.DomUtils.appendToHead(r);
                    var s = i._loader;
                    this._processFinishedLoad(i, s), this._loadedScripts[t] = !0
                }
            }
        }, t._processFinishedLoad = function(e, t) {
            if (this._numItemsLoaded++, !this.maintainScriptOrder && e.type == createjs.LoadQueue.JAVASCRIPT) {
                var i = t.getTag();
                createjs.DomUtils.appendToHead(i)
            }
            this._updateProgress(), this._sendFileComplete(e, t), this._loadNext()
        }, t._canStartLoad = function(e) {
            if (!this.maintainScriptOrder || e.preferXHR) return !0;
            var t = e.getItem();
            if (t.type != createjs.LoadQueue.JAVASCRIPT) return !0;
            if (this._currentlyLoadingScript) return !1;
            for (var i = this._scriptOrder.indexOf(t), r = 0; i > r;) {
                var s = this._loadedScripts[r];
                if (null == s) return !1;
                r++
            }
            return this._currentlyLoadingScript = !0, !0
        }, t._removeLoadItem = function(e) {
            for (var t = this._currentLoads.length, i = 0; t > i; i++)
                if (this._currentLoads[i] == e) {
                    this._currentLoads.splice(i, 1);
                    break
                }
        }, t._cleanLoadItem = function(e) {
            var t = e.getItem();
            t && delete t._loader
        }, t._handleProgress = function(e) {
            var t = e.target;
            this._sendFileProgress(t.getItem(), t.progress), this._updateProgress()
        }, t._updateProgress = function() {
            var e = this._numItemsLoaded / this._numItems,
                t = this._numItems - this._numItemsLoaded;
            if (t > 0) {
                for (var i = 0, r = 0, s = this._currentLoads.length; s > r; r++) i += this._currentLoads[r].progress;
                e += i / t * (t / this._numItems)
            }
            this._lastProgress != e && (this._sendProgress(e), this._lastProgress = e)
        }, t._disposeItem = function(e) {
            delete this._loadedResults[e.id], delete this._loadedRawResults[e.id], delete this._loadItemsById[e.id], delete this._loadItemsBySrc[e.src]
        }, t._sendFileProgress = function(e, t) {
            if (!this._isCanceled() && !this._paused && this.hasEventListener("fileprogress")) {
                var i = new createjs.Event("fileprogress");
                i.progress = t, i.loaded = t, i.total = 1, i.item = e, this.dispatchEvent(i)
            }
        }, t._sendFileComplete = function(e, t) {
            if (!this._isCanceled() && !this._paused) {
                var i = new createjs.Event("fileload");
                i.loader = t, i.item = e, i.result = this._loadedResults[e.id], i.rawResult = this._loadedRawResults[e.id], e.completeHandler && e.completeHandler(i), this.hasEventListener("fileload") && this.dispatchEvent(i)
            }
        }, t._sendFileStart = function(e) {
            var t = new createjs.Event("filestart");
            t.item = e, this.hasEventListener("filestart") && this.dispatchEvent(t)
        }, t.toString = function() {
            return "[PreloadJS LoadQueue]"
        }, createjs.LoadQueue = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractLoader_constructor(e, !0, createjs.AbstractLoader.TEXT)
        }
        var t = (createjs.extend(e, createjs.AbstractLoader), e);
        t.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.TEXT
        }, createjs.TextLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractLoader_constructor(e, !0, createjs.AbstractLoader.BINARY), this.on("initialize", this._updateXHR, this)
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.BINARY
        }, t._updateXHR = function(e) {
            e.loader.setResponseType("arraybuffer")
        }, createjs.BinaryLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractLoader_constructor(e, t, createjs.AbstractLoader.CSS), this.resultFormatter = this._formatResult, this._tagSrcAttribute = "href", this._tag = t ? createjs.Elements.style() : createjs.Elements.link(), this._tag.rel = "stylesheet", this._tag.type = "text/css"
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.CSS
        }, t._formatResult = function(e) {
            if (this._preferXHR) {
                var t = e.getTag();
                if (t.styleSheet) t.styleSheet.cssText = e.getResult(!0);
                else {
                    var i = createjs.Elements.text(e.getResult(!0));
                    t.appendChild(i)
                }
            } else t = this._tag;
            return createjs.DomUtils.appendToHead(t), t
        }, createjs.CSSLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractLoader_constructor(e, t, createjs.AbstractLoader.IMAGE), this.resultFormatter = this._formatResult, this._tagSrcAttribute = "src", createjs.DomUtils.isImageTag(e) ? this._tag = e : createjs.DomUtils.isImageTag(e.src) ? this._tag = e.src : createjs.DomUtils.isImageTag(e.tag) && (this._tag = e.tag), null != this._tag ? this._preferXHR = !1 : this._tag = createjs.Elements.img(), this.on("initialize", this._updateXHR, this)
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.IMAGE
        }, t.load = function() {
            if ("" != this._tag.src && this._tag.complete) return void this._sendComplete();
            var e = this._item.crossOrigin;
            1 == e && (e = "Anonymous"), null == e || createjs.URLUtils.isLocal(this._item.src) || (this._tag.crossOrigin = e), this.AbstractLoader_load()
        }, t._updateXHR = function(e) {
            e.loader.mimeType = "text/plain; charset=x-user-defined-binary", e.loader.setResponseType && e.loader.setResponseType("blob")
        }, t._formatResult = function() {
            return this._formatImage
        }, t._formatImage = function(e, t) {
            var i = this._tag,
                r = window.URL || window.webkitURL;
            if (this._preferXHR)
                if (r) {
                    var s = r.createObjectURL(this.getResult(!0));
                    i.src = s, i.addEventListener("load", this._cleanUpURL, !1), i.addEventListener("error", this._cleanUpURL, !1)
                } else i.src = this._item.src;
            i.complete ? e(i) : (i.onload = createjs.proxy(function() {
                e(this._tag)
            }, this), i.onerror = createjs.proxy(function() {
                t(this._tag)
            }, this))
        }, t._cleanUpURL = function(e) {
            var t = window.URL || window.webkitURL;
            t.revokeObjectURL(e.target.src)
        }, createjs.ImageLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractLoader_constructor(e, t, createjs.AbstractLoader.JAVASCRIPT), this.resultFormatter = this._formatResult, this._tagSrcAttribute = "src", this.setTag(createjs.Elements.script())
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.JAVASCRIPT
        }, t._formatResult = function(e) {
            var t = e.getTag();
            return this._preferXHR && (t.text = e.getResult(!0)), t
        }, createjs.JavaScriptLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractLoader_constructor(e, !0, createjs.AbstractLoader.JSON), this.resultFormatter = this._formatResult
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.JSON
        }, t._formatResult = function(e) {
            var t = null;
            try {
                t = createjs.DataUtils.parseJSON(e.getResult(!0))
            } catch (i) {
                var r = new createjs.ErrorEvent("JSON_FORMAT", null, i);
                return this._sendError(r), i
            }
            return t
        }, createjs.JSONLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractLoader_constructor(e, !1, createjs.AbstractLoader.JSONP), this.setTag(createjs.Elements.script()), this.getTag().type = "text/javascript"
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.JSONP
        }, t.cancel = function() {
            this.AbstractLoader_cancel(), this._dispose()
        }, t.load = function() {
            if (null == this._item.callback) throw new Error("callback is required for loading JSONP requests.");
            if (null != window[this._item.callback]) throw new Error("JSONP callback '" + this._item.callback + "' already exists on window. You need to specify a different callback or re-name the current one.");
            window[this._item.callback] = createjs.proxy(this._handleLoad, this), createjs.DomUtils.appendToBody(this._tag), this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), this._item.loadTimeout), this._tag.src = this._item.src
        }, t._handleLoad = function(e) {
            this._result = this._rawResult = e, this._sendComplete(), this._dispose()
        }, t._handleTimeout = function() {
            this._dispose(), this.dispatchEvent(new createjs.ErrorEvent("timeout"))
        }, t._dispose = function() {
            createjs.DomUtils.removeChild(this._tag), delete window[this._item.callback], clearTimeout(this._loadTimeout)
        }, createjs.JSONPLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractLoader_constructor(e, null, createjs.AbstractLoader.MANIFEST), this.plugins = null, this._manifestQueue = null
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.MANIFEST_PROGRESS = .25, i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.MANIFEST
        }, t.load = function() {
            this.AbstractLoader_load()
        }, t._createRequest = function() {
            var e = this._item.callback;
            this._request = null != e ? new createjs.JSONPLoader(this._item) : new createjs.JSONLoader(this._item)
        }, t.handleEvent = function(e) {
            switch (e.type) {
                case "complete":
                    return this._rawResult = e.target.getResult(!0), this._result = e.target.getResult(), this._sendProgress(i.MANIFEST_PROGRESS), void this._loadManifest(this._result);
                case "progress":
                    return e.loaded *= i.MANIFEST_PROGRESS, this.progress = e.loaded / e.total, (isNaN(this.progress) || 1 / 0 == this.progress) && (this.progress = 0), void this._sendProgress(e)
            }
            this.AbstractLoader_handleEvent(e)
        }, t.destroy = function() {
            this.AbstractLoader_destroy(), this._manifestQueue.close()
        }, t._loadManifest = function(e) {
            if (e && e.manifest) {
                var t = this._manifestQueue = new createjs.LoadQueue;
                t.on("fileload", this._handleManifestFileLoad, this), t.on("progress", this._handleManifestProgress, this), t.on("complete", this._handleManifestComplete, this, !0), t.on("error", this._handleManifestError, this, !0);
                for (var i = 0, r = this.plugins.length; r > i; i++) t.installPlugin(this.plugins[i]);
                t.loadManifest(e)
            } else this._sendComplete()
        }, t._handleManifestFileLoad = function(e) {
            e.target = null, this.dispatchEvent(e)
        }, t._handleManifestComplete = function() {
            this._loadedItems = this._manifestQueue.getItems(!0), this._sendComplete()
        }, t._handleManifestProgress = function(e) {
            this.progress = e.progress * (1 - i.MANIFEST_PROGRESS) + i.MANIFEST_PROGRESS, this._sendProgress(this.progress)
        }, t._handleManifestError = function(e) {
            var t = new createjs.Event("fileerror");
            t.item = e.data, this.dispatchEvent(t)
        }, createjs.ManifestLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractMediaLoader_constructor(e, t, createjs.AbstractLoader.SOUND), createjs.DomUtils.isAudioTag(e) ? this._tag = e : createjs.DomUtils.isAudioTag(e.src) ? this._tag = e : createjs.DomUtils.isAudioTag(e.tag) && (this._tag = createjs.DomUtils.isAudioTag(e) ? e : e.src), null != this._tag && (this._preferXHR = !1)
        }
        var t = createjs.extend(e, createjs.AbstractMediaLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.SOUND
        }, t._createTag = function(e) {
            var t = createjs.Elements.audio();
            return t.autoplay = !1, t.preload = "none", t.src = e, t
        }, createjs.SoundLoader = createjs.promote(e, "AbstractMediaLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractMediaLoader_constructor(e, t, createjs.AbstractLoader.VIDEO), createjs.DomUtils.isVideoTag(e) || createjs.DomUtils.isVideoTag(e.src) ? (this.setTag(createjs.DomUtils.isVideoTag(e) ? e : e.src), this._preferXHR = !1) : this.setTag(this._createTag())
        }
        var t = createjs.extend(e, createjs.AbstractMediaLoader),
            i = e;
        t._createTag = function() {
            return createjs.Elements.video()
        }, i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.VIDEO
        }, createjs.VideoLoader = createjs.promote(e, "AbstractMediaLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractLoader_constructor(e, t, createjs.AbstractLoader.SPRITESHEET), this._manifestQueue = null
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.SPRITESHEET_PROGRESS = .25, i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.SPRITESHEET
        }, t.destroy = function() {
            this.AbstractLoader_destroy(), this._manifestQueue.close()
        }, t._createRequest = function() {
            var e = this._item.callback;
            this._request = null != e ? new createjs.JSONPLoader(this._item) : new createjs.JSONLoader(this._item)
        }, t.handleEvent = function(e) {
            switch (e.type) {
                case "complete":
                    return this._rawResult = e.target.getResult(!0), this._result = e.target.getResult(), this._sendProgress(i.SPRITESHEET_PROGRESS), void this._loadManifest(this._result);
                case "progress":
                    return e.loaded *= i.SPRITESHEET_PROGRESS, this.progress = e.loaded / e.total, (isNaN(this.progress) || 1 / 0 == this.progress) && (this.progress = 0), void this._sendProgress(e)
            }
            this.AbstractLoader_handleEvent(e)
        }, t._loadManifest = function(e) {
            if (e && e.images) {
                var t = this._manifestQueue = new createjs.LoadQueue(this._preferXHR, this._item.path, this._item.crossOrigin);
                t.on("complete", this._handleManifestComplete, this, !0), t.on("fileload", this._handleManifestFileLoad, this), t.on("progress", this._handleManifestProgress, this), t.on("error", this._handleManifestError, this, !0), t.loadManifest(e.images)
            }
        }, t._handleManifestFileLoad = function(e) {
            var t = e.result;
            if (null != t) {
                var i = this.getResult().images,
                    r = i.indexOf(e.item.src);
                i[r] = t
            }
        }, t._handleManifestComplete = function() {
            this._result = new createjs.SpriteSheet(this._result), this._loadedItems = this._manifestQueue.getItems(!0), this._sendComplete()
        }, t._handleManifestProgress = function(e) {
            this.progress = e.progress * (1 - i.SPRITESHEET_PROGRESS) + i.SPRITESHEET_PROGRESS, this._sendProgress(this.progress)
        }, t._handleManifestError = function(e) {
            var t = new createjs.Event("fileerror");
            t.item = e.data, this.dispatchEvent(t)
        }, createjs.SpriteSheetLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.AbstractLoader_constructor(e, t, createjs.AbstractLoader.SVG), this.resultFormatter = this._formatResult, this._tagSrcAttribute = "data", t ? this.setTag(createjs.Elements.svg()) : (this.setTag(createjs.Elements.object()), this.getTag().type = "image/svg+xml")
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.SVG
        }, t._formatResult = function(e) {
            var t = createjs.DataUtils.parseXML(e.getResult(!0)),
                i = e.getTag();
            return !this._preferXHR && document.body.contains(i) && document.body.removeChild(i), null != t.documentElement ? (i.appendChild(t.documentElement), i.style.visibility = "visible", i) : t
        }, createjs.SVGLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractLoader_constructor(e, !0, createjs.AbstractLoader.XML), this.resultFormatter = this._formatResult
        }
        var t = createjs.extend(e, createjs.AbstractLoader),
            i = e;
        i.canLoadItem = function(e) {
            return e.type == createjs.AbstractLoader.XML
        }, t._formatResult = function(e) {
            return createjs.DataUtils.parseXML(e.getResult(!0))
        }, createjs.XMLLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        var e = createjs.SoundJS = createjs.SoundJS || {};
        e.version = "NEXT", e.buildDate = "Fri, 04 Dec 2015 17:24:04 GMT"
    }(), this.createjs = this.createjs || {}, createjs.extend = function(e, t) {
    "use strict";

    function i() {
        this.constructor = e
    }
    return i.prototype = t.prototype, e.prototype = new i
}, this.createjs = this.createjs || {}, createjs.promote = function(e, t) {
    "use strict";
    var i = e.prototype,
        r = Object.getPrototypeOf && Object.getPrototypeOf(i) || i.__proto__;
    if (r) {
        i[(t += "_") + "constructor"] = r.constructor;
        for (var s in r) i.hasOwnProperty(s) && "function" == typeof r[s] && (i[t + s] = r[s])
    }
    return e
}, this.createjs = this.createjs || {}, createjs.indexOf = function(e, t) {
    "use strict";
    for (var i = 0, r = e.length; r > i; i++)
        if (t === e[i]) return i;
    return -1
}, this.createjs = this.createjs || {},
    function() {
        "use strict";
        createjs.proxy = function(e, t) {
            var i = Array.prototype.slice.call(arguments, 2);
            return function() {
                return e.apply(t, Array.prototype.slice.call(arguments, 0).concat(i))
            }
        }
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e() {
            throw "BrowserDetect cannot be instantiated"
        }
        var t = e.agent = window.navigator.userAgent;
        e.isWindowPhone = t.indexOf("IEMobile") > -1 || t.indexOf("Windows Phone") > -1, e.isFirefox = t.indexOf("Firefox") > -1, e.isOpera = null != window.opera, e.isChrome = t.indexOf("Chrome") > -1, e.isIOS = (t.indexOf("iPod") > -1 || t.indexOf("iPhone") > -1 || t.indexOf("iPad") > -1) && !e.isWindowPhone, e.isAndroid = t.indexOf("Android") > -1 && !e.isWindowPhone, e.isBlackberry = t.indexOf("Blackberry") > -1, createjs.BrowserDetect = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e() {
            this._listeners = null, this._captureListeners = null
        }
        var t = e.prototype;
        e.initialize = function(e) {
            e.addEventListener = t.addEventListener, e.on = t.on, e.removeEventListener = e.off = t.removeEventListener, e.removeAllEventListeners = t.removeAllEventListeners, e.hasEventListener = t.hasEventListener, e.dispatchEvent = t.dispatchEvent, e._dispatchEvent = t._dispatchEvent, e.willTrigger = t.willTrigger
        }, t.addEventListener = function(e, t, i) {
            var r;
            r = i ? this._captureListeners = this._captureListeners || {} : this._listeners = this._listeners || {};
            var s = r[e];
            return s && this.removeEventListener(e, t, i), s = r[e], s ? s.push(t) : r[e] = [t], t
        }, t.on = function(e, t, i, r, s, a) {
            return t.handleEvent && (i = i || t, t = t.handleEvent), i = i || this, this.addEventListener(e, function(e) {
                t.call(i, e, s), r && e.remove()
            }, a)
        }, t.removeEventListener = function(e, t, i) {
            var r = i ? this._captureListeners : this._listeners;
            if (r) {
                var s = r[e];
                if (s)
                    for (var a = 0, n = s.length; n > a; a++)
                        if (s[a] == t) {
                            1 == n ? delete r[e] : s.splice(a, 1);
                            break
                        }
            }
        }, t.off = t.removeEventListener, t.removeAllEventListeners = function(e) {
            e ? (this._listeners && delete this._listeners[e], this._captureListeners && delete this._captureListeners[e]) : this._listeners = this._captureListeners = null
        }, t.dispatchEvent = function(e, t, i) {
            if ("string" == typeof e) {
                var r = this._listeners;
                if (!(t || r && r[e])) return !0;
                e = new createjs.Event(e, t, i)
            } else e.target && e.clone && (e = e.clone());
            try {
                e.target = this
            } catch (s) {}
            if (e.bubbles && this.parent) {
                for (var a = this, n = [a]; a.parent;) n.push(a = a.parent);
                var o, l = n.length;
                for (o = l - 1; o >= 0 && !e.propagationStopped; o--) n[o]._dispatchEvent(e, 1 + (0 == o));
                for (o = 1; l > o && !e.propagationStopped; o++) n[o]._dispatchEvent(e, 3)
            } else this._dispatchEvent(e, 2);
            return !e.defaultPrevented
        }, t.hasEventListener = function(e) {
            var t = this._listeners,
                i = this._captureListeners;
            return !!(t && t[e] || i && i[e])
        }, t.willTrigger = function(e) {
            for (var t = this; t;) {
                if (t.hasEventListener(e)) return !0;
                t = t.parent
            }
            return !1
        }, t.toString = function() {
            return "[EventDispatcher]"
        }, t._dispatchEvent = function(e, t) {
            var i, r = 1 == t ? this._captureListeners : this._listeners;
            if (e && r) {
                var s = r[e.type];
                if (!s || !(i = s.length)) return;
                try {
                    e.currentTarget = this
                } catch (a) {}
                try {
                    e.eventPhase = t
                } catch (a) {}
                e.removed = !1, s = s.slice();
                for (var n = 0; i > n && !e.immediatePropagationStopped; n++) {
                    var o = s[n];
                    o.handleEvent ? o.handleEvent(e) : o(e), e.removed && (this.off(e.type, o, 1 == t), e.removed = !1)
                }
            }
        }, createjs.EventDispatcher = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.type = e, this.target = null, this.currentTarget = null, this.eventPhase = 0, this.bubbles = !!t, this.cancelable = !!i, this.timeStamp = (new Date).getTime(), this.defaultPrevented = !1, this.propagationStopped = !1, this.immediatePropagationStopped = !1, this.removed = !1
        }
        var t = e.prototype;
        t.preventDefault = function() {
            this.defaultPrevented = this.cancelable && !0
        }, t.stopPropagation = function() {
            this.propagationStopped = !0
        }, t.stopImmediatePropagation = function() {
            this.immediatePropagationStopped = this.propagationStopped = !0
        }, t.remove = function() {
            this.removed = !0
        }, t.clone = function() {
            return new e(this.type, this.bubbles, this.cancelable)
        }, t.set = function(e) {
            for (var t in e) this[t] = e[t];
            return this
        }, t.toString = function() {
            return "[Event (type=" + this.type + ")]"
        }, createjs.Event = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.Event_constructor("error"), this.title = e, this.message = t, this.data = i
        }
        var t = createjs.extend(e, createjs.Event);
        t.clone = function() {
            return new createjs.ErrorEvent(this.title, this.message, this.data)
        }, createjs.ErrorEvent = createjs.promote(e, "Event")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t) {
            this.Event_constructor("progress"), this.loaded = e, this.total = null == t ? 1 : t, this.progress = 0 == t ? 0 : this.loaded / this.total
        }
        var t = createjs.extend(e, createjs.Event);
        t.clone = function() {
            return new createjs.ProgressEvent(this.loaded, this.total)
        }, createjs.ProgressEvent = createjs.promote(e, "Event")
    }(window), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e() {
            this.src = null, this.type = null, this.id = null, this.maintainOrder = !1, this.callback = null, this.data = null, this.method = createjs.LoadItem.GET, this.values = null, this.headers = null, this.withCredentials = !1, this.mimeType = null, this.crossOrigin = null, this.loadTimeout = i.LOAD_TIMEOUT_DEFAULT
        }
        var t = e.prototype = {},
            i = e;
        i.LOAD_TIMEOUT_DEFAULT = 8e3, i.create = function(t) {
            if ("string" == typeof t) {
                var r = new e;
                return r.src = t, r
            }
            if (t instanceof i) return t;
            if (t instanceof Object && t.src) return null == t.loadTimeout && (t.loadTimeout = i.LOAD_TIMEOUT_DEFAULT), t;
            throw new Error("Type not recognized.")
        }, t.set = function(e) {
            for (var t in e) this[t] = e[t];
            return this
        }, createjs.LoadItem = i
    }(),
    function() {
        var e = {};
        e.ABSOLUTE_PATT = /^(?:\w+:)?\/{2}/i, e.RELATIVE_PATT = /^[.\/]*?\//i, e.EXTENSION_PATT = /\/?[^\/]+\.(\w{1,5})$/i, e.parseURI = function(t) {
            var i = {
                absolute: !1,
                relative: !1
            };
            if (null == t) return i;
            var r = t.indexOf("?");
            r > -1 && (t = t.substr(0, r));
            var s;
            return e.ABSOLUTE_PATT.test(t) ? i.absolute = !0 : e.RELATIVE_PATT.test(t) && (i.relative = !0), (s = t.match(e.EXTENSION_PATT)) && (i.extension = s[1].toLowerCase()), i
        }, e.formatQueryString = function(e, t) {
            if (null == e) throw new Error("You must specify data.");
            var i = [];
            for (var r in e) i.push(r + "=" + escape(e[r]));
            return t && (i = i.concat(t)), i.join("&")
        }, e.buildPath = function(e, t) {
            if (null == t) return e;
            var i = [],
                r = e.indexOf("?");
            if (-1 != r) {
                var s = e.slice(r + 1);
                i = i.concat(s.split("&"))
            }
            return -1 != r ? e.slice(0, r) + "?" + this.formatQueryString(t, i) : e + "?" + this.formatQueryString(t, i)
        }, e.isCrossDomain = function(e) {
            var t = document.createElement("a");
            t.href = e.src;
            var i = document.createElement("a");
            i.href = location.href;
            var r = "" != t.hostname && (t.port != i.port || t.protocol != i.protocol || t.hostname != i.hostname);
            return r
        }, e.isLocal = function(e) {
            var t = document.createElement("a");
            return t.href = e.src, "" == t.hostname && "file:" == t.protocol
        }, e.isBinary = function(e) {
            switch (e) {
                case createjs.AbstractLoader.IMAGE:
                case createjs.AbstractLoader.BINARY:
                    return !0;
                default:
                    return !1
            }
        }, e.isImageTag = function(e) {
            return e instanceof HTMLImageElement
        }, e.isAudioTag = function(e) {
            return window.HTMLAudioElement ? e instanceof HTMLAudioElement : !1
        }, e.isVideoTag = function(e) {
            return window.HTMLVideoElement ? e instanceof HTMLVideoElement : !1
        }, e.isText = function(e) {
            switch (e) {
                case createjs.AbstractLoader.TEXT:
                case createjs.AbstractLoader.JSON:
                case createjs.AbstractLoader.MANIFEST:
                case createjs.AbstractLoader.XML:
                case createjs.AbstractLoader.CSS:
                case createjs.AbstractLoader.SVG:
                case createjs.AbstractLoader.JAVASCRIPT:
                case createjs.AbstractLoader.SPRITESHEET:
                    return !0;
                default:
                    return !1
            }
        }, e.getTypeByExtension = function(e) {
            if (null == e) return createjs.AbstractLoader.TEXT;
            switch (e.toLowerCase()) {
                case "jpeg":
                case "jpg":
                case "gif":
                case "png":
                case "webp":
                case "bmp":
                    return createjs.AbstractLoader.IMAGE;
                case "ogg":
                case "mp3":
                case "webm":
                    return createjs.AbstractLoader.SOUND;
                case "mp4":
                case "webm":
                case "ts":
                    return createjs.AbstractLoader.VIDEO;
                case "json":
                    return createjs.AbstractLoader.JSON;
                case "xml":
                    return createjs.AbstractLoader.XML;
                case "css":
                    return createjs.AbstractLoader.CSS;
                case "js":
                    return createjs.AbstractLoader.JAVASCRIPT;
                case "svg":
                    return createjs.AbstractLoader.SVG;
                default:
                    return createjs.AbstractLoader.TEXT
            }
        }, createjs.RequestUtils = e
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.EventDispatcher_constructor(), this.loaded = !1, this.canceled = !1, this.progress = 0, this.type = i, this.resultFormatter = null, this._item = e ? createjs.LoadItem.create(e) : null, this._preferXHR = t, this._result = null, this._rawResult = null, this._loadedItems = null, this._tagSrcAttribute = null, this._tag = null
        }
        var t = createjs.extend(e, createjs.EventDispatcher),
            i = e;
        i.POST = "POST", i.GET = "GET", i.BINARY = "binary", i.CSS = "css", i.IMAGE = "image", i.JAVASCRIPT = "javascript", i.JSON = "json", i.JSONP = "jsonp", i.MANIFEST = "manifest", i.SOUND = "sound", i.VIDEO = "video", i.SPRITESHEET = "spritesheet", i.SVG = "svg", i.TEXT = "text", i.XML = "xml", t.getItem = function() {
            return this._item
        }, t.getResult = function(e) {
            return e ? this._rawResult : this._result
        }, t.getTag = function() {
            return this._tag
        }, t.setTag = function(e) {
            this._tag = e
        }, t.load = function() {
            this._createRequest(), this._request.on("complete", this, this), this._request.on("progress", this, this), this._request.on("loadStart", this, this), this._request.on("abort", this, this), this._request.on("timeout", this, this), this._request.on("error", this, this);
            var e = new createjs.Event("initialize");
            e.loader = this._request, this.dispatchEvent(e), this._request.load()
        }, t.cancel = function() {
            this.canceled = !0, this.destroy()
        }, t.destroy = function() {
            this._request && (this._request.removeAllEventListeners(), this._request.destroy()), this._request = null, this._item = null, this._rawResult = null, this._result = null, this._loadItems = null, this.removeAllEventListeners()
        }, t.getLoadedItems = function() {
            return this._loadedItems
        }, t._createRequest = function() {
            this._request = this._preferXHR ? new createjs.XHRRequest(this._item) : new createjs.TagRequest(this._item, this._tag || this._createTag(), this._tagSrcAttribute)
        }, t._createTag = function() {
            return null
        }, t._sendLoadStart = function() {
            this._isCanceled() || this.dispatchEvent("loadstart")
        }, t._sendProgress = function(e) {
            if (!this._isCanceled()) {
                var t = null;
                "number" == typeof e ? (this.progress = e, t = new createjs.ProgressEvent(this.progress)) : (t = e, this.progress = e.loaded / e.total, t.progress = this.progress, (isNaN(this.progress) || 1 / 0 == this.progress) && (this.progress = 0)), this.hasEventListener("progress") && this.dispatchEvent(t)
            }
        }, t._sendComplete = function() {
            if (!this._isCanceled()) {
                this.loaded = !0;
                var e = new createjs.Event("complete");
                e.rawResult = this._rawResult, null != this._result && (e.result = this._result), this.dispatchEvent(e)
            }
        }, t._sendError = function(e) {
            !this._isCanceled() && this.hasEventListener("error") && (null == e && (e = new createjs.ErrorEvent("PRELOAD_ERROR_EMPTY")), this.dispatchEvent(e))
        }, t._isCanceled = function() {
            return null == window.createjs || this.canceled ? !0 : !1
        }, t.resultFormatter = null, t.handleEvent = function(e) {
            switch (e.type) {
                case "complete":
                    this._rawResult = e.target._response;
                    var t = this.resultFormatter && this.resultFormatter(this);
                    t instanceof Function ? t.call(this, createjs.proxy(this._resultFormatSuccess, this), createjs.proxy(this._resultFormatFailed, this)) : (this._result = t || this._rawResult, this._sendComplete());
                    break;
                case "progress":
                    this._sendProgress(e);
                    break;
                case "error":
                    this._sendError(e);
                    break;
                case "loadstart":
                    this._sendLoadStart();
                    break;
                case "abort":
                case "timeout":
                    this._isCanceled() || this.dispatchEvent(new createjs.ErrorEvent("PRELOAD_" + e.type.toUpperCase() + "_ERROR"))
            }
        }, t._resultFormatSuccess = function(e) {
            this._result = e, this._sendComplete()
        }, t._resultFormatFailed = function(e) {
            this._sendError(e)
        }, t.buildPath = function(e, t) {
            return createjs.RequestUtils.buildPath(e, t)
        }, t.toString = function() {
            return "[PreloadJS AbstractLoader]"
        }, createjs.AbstractLoader = createjs.promote(e, "EventDispatcher")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractLoader_constructor(e, t, i), this.resultFormatter = this._formatResult, this._tagSrcAttribute = "src", this.on("initialize", this._updateXHR, this)
        }
        var t = createjs.extend(e, createjs.AbstractLoader);
        t.load = function() {
            this._tag || (this._tag = this._createTag(this._item.src)), this._tag.preload = "auto", this._tag.load(), this.AbstractLoader_load()
        }, t._createTag = function() {}, t._createRequest = function() {
            this._request = this._preferXHR ? new createjs.XHRRequest(this._item) : new createjs.MediaTagRequest(this._item, this._tag || this._createTag(), this._tagSrcAttribute)
        }, t._updateXHR = function(e) {
            e.loader.setResponseType && e.loader.setResponseType("blob")
        }, t._formatResult = function(e) {
            if (this._tag.removeEventListener && this._tag.removeEventListener("canplaythrough", this._loadedHandler), this._tag.onstalled = null, this._preferXHR) {
                var t = window.URL || window.webkitURL,
                    i = e.getResult(!0);
                e.getTag().src = t.createObjectURL(i)
            }
            return e.getTag()
        }, createjs.AbstractMediaLoader = createjs.promote(e, "AbstractLoader")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";
        var e = function(e) {
                this._item = e
            },
            t = createjs.extend(e, createjs.EventDispatcher);
        t.load = function() {}, t.destroy = function() {}, t.cancel = function() {}, createjs.AbstractRequest = createjs.promote(e, "EventDispatcher")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractRequest_constructor(e), this._tag = t, this._tagSrcAttribute = i, this._loadedHandler = createjs.proxy(this._handleTagComplete, this), this._addedToDOM = !1, this._startTagVisibility = null
        }
        var t = createjs.extend(e, createjs.AbstractRequest);
        t.load = function() {
            this._tag.onload = createjs.proxy(this._handleTagComplete, this), this._tag.onreadystatechange = createjs.proxy(this._handleReadyStateChange, this), this._tag.onerror = createjs.proxy(this._handleError, this);
            var e = new createjs.Event("initialize");
            e.loader = this._tag, this.dispatchEvent(e), this._hideTag(), this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), this._item.loadTimeout), this._tag[this._tagSrcAttribute] = this._item.src, null == this._tag.parentNode && (window.document.body.appendChild(this._tag), this._addedToDOM = !0)
        }, t.destroy = function() {
            this._clean(), this._tag = null, this.AbstractRequest_destroy()
        }, t._handleReadyStateChange = function() {
            clearTimeout(this._loadTimeout);
            var e = this._tag;
            ("loaded" == e.readyState || "complete" == e.readyState) && this._handleTagComplete()
        }, t._handleError = function() {
            this._clean(), this.dispatchEvent("error")
        }, t._handleTagComplete = function() {
            this._rawResult = this._tag, this._result = this.resultFormatter && this.resultFormatter(this) || this._rawResult, this._clean(), this._showTag(), this.dispatchEvent("complete")
        }, t._handleTimeout = function() {
            this._clean(), this.dispatchEvent(new createjs.Event("timeout"))
        }, t._clean = function() {
            this._tag.onload = null, this._tag.onreadystatechange = null, this._tag.onerror = null, this._addedToDOM && null != this._tag.parentNode && this._tag.parentNode.removeChild(this._tag), clearTimeout(this._loadTimeout)
        }, t._hideTag = function() {
            this._startTagVisibility = this._tag.style.visibility, this._tag.style.visibility = "hidden"
        }, t._showTag = function() {
            this._tag.style.visibility = this._startTagVisibility
        }, t._handleStalled = function() {}, createjs.TagRequest = createjs.promote(e, "AbstractRequest")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e, t, i) {
            this.AbstractRequest_constructor(e), this._tag = t, this._tagSrcAttribute = i, this._loadedHandler = createjs.proxy(this._handleTagComplete, this)
        }
        var t = createjs.extend(e, createjs.TagRequest);
        t.load = function() {
            var e = createjs.proxy(this._handleStalled, this);
            this._stalledCallback = e;
            var t = createjs.proxy(this._handleProgress, this);
            this._handleProgress = t, this._tag.addEventListener("stalled", e), this._tag.addEventListener("progress", t), this._tag.addEventListener && this._tag.addEventListener("canplaythrough", this._loadedHandler, !1), this.TagRequest_load()
        }, t._handleReadyStateChange = function() {
            clearTimeout(this._loadTimeout);
            var e = this._tag;
            ("loaded" == e.readyState || "complete" == e.readyState) && this._handleTagComplete()
        }, t._handleStalled = function() {}, t._handleProgress = function(e) {
            if (e && !(e.loaded > 0 && 0 == e.total)) {
                var t = new createjs.ProgressEvent(e.loaded, e.total);
                this.dispatchEvent(t)
            }
        }, t._clean = function() {
            this._tag.removeEventListener && this._tag.removeEventListener("canplaythrough", this._loadedHandler), this._tag.removeEventListener("stalled", this._stalledCallback), this._tag.removeEventListener("progress", this._progressCallback), this.TagRequest__clean()
        }, createjs.MediaTagRequest = createjs.promote(e, "TagRequest")
    }(), this.createjs = this.createjs || {},
    function() {
        "use strict";

        function e(e) {
            this.AbstractRequest_constructor(e), this._request = null, this._loadTimeout = null, this._xhrLevel = 1, this._response = null, this._rawResponse = null, this._canceled = !1, this._handleLoadStartProxy = createjs.proxy(this._handleLoadStart, this), this._handleProgressProxy = createjs.proxy(this._handleProgress, this), this._handleAbortProxy = createjs.proxy(this._handleAbort, this), this._handleErrorProxy = createjs.proxy(this._handleError, this), this._handleTimeoutProxy = createjs.proxy(this._handleTimeout, this), this._handleLoadProxy = createjs.proxy(this._handleLoad, this), this._handleReadyStateChangeProxy = createjs.proxy(this._handleReadyStateChange, this), !this._createXHR(e)
        }
        var t = createjs.extend(e, createjs.AbstractRequest);
        e.ACTIVEX_VERSIONS = ["Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.5.0", "Msxml2.XMLHTTP.4.0", "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"], t.getResult = function(e) {
            return e && this._rawResponse ? this._rawResponse : this._response
        }, t.cancel = function() {
            this.canceled = !0, this._clean(), this._request.abort()
        }, t.load = function() {
            if (null == this._request) return void this._handleError();
            null != this._request.addEventListener ? (this._request.addEventListener("loadstart", this._handleLoadStartProxy, !1), this._request.addEventListener("progress", this._handleProgressProxy, !1), this._request.addEventListener("abort", this._handleAbortProxy, !1), this._request.addEventListener("error", this._handleErrorProxy, !1), this._request.addEventListener("timeout", this._handleTimeoutProxy, !1), this._request.addEventListener("load", this._handleLoadProxy, !1), this._request.addEventListener("readystatechange", this._handleReadyStateChangeProxy, !1)) : (this._request.onloadstart = this._handleLoadStartProxy, this._request.onprogress = this._handleProgressProxy, this._request.onabort = this._handleAbortProxy, this._request.onerror = this._handleErrorProxy, this._request.ontimeout = this._handleTimeoutProxy, this._request.onload = this._handleLoadProxy, this._request.onreadystatechange = this._handleReadyStateChangeProxy), 1 == this._xhrLevel && (this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), this._item.loadTimeout));
            try {
                this._item.values && this._item.method != createjs.AbstractLoader.GET ? this._item.method == createjs.AbstractLoader.POST && this._request.send(createjs.RequestUtils.formatQueryString(this._item.values)) : this._request.send()
            } catch (e) {
                this.dispatchEvent(new createjs.ErrorEvent("XHR_SEND", null, e))
            }
        }, t.setResponseType = function(e) {
            "blob" === e && (e = window.URL ? "blob" : "arraybuffer", this._responseType = e), this._request.responseType = e
        }, t.getAllResponseHeaders = function() {
            return this._request.getAllResponseHeaders instanceof Function ? this._request.getAllResponseHeaders() : null
        }, t.getResponseHeader = function(e) {
            return this._request.getResponseHeader instanceof Function ? this._request.getResponseHeader(e) : null
        }, t._handleProgress = function(e) {
            if (e && !(e.loaded > 0 && 0 == e.total)) {
                var t = new createjs.ProgressEvent(e.loaded, e.total);
                this.dispatchEvent(t)
            }
        }, t._handleLoadStart = function() {
            clearTimeout(this._loadTimeout), this.dispatchEvent("loadstart")
        }, t._handleAbort = function(e) {
            this._clean(), this.dispatchEvent(new createjs.ErrorEvent("XHR_ABORTED", null, e))
        }, t._handleError = function(e) {
            this._clean(), this.dispatchEvent(new createjs.ErrorEvent(e.message))
        }, t._handleReadyStateChange = function() {
            4 == this._request.readyState && this._handleLoad()
        }, t._handleLoad = function() {
            if (!this.loaded) {
                this.loaded = !0;
                var e = this._checkError();
                if (e) return void this._handleError(e);
                if (this._response = this._getResponse(), "arraybuffer" === this._responseType) try {
                    this._response = new Blob([this._response])
                } catch (t) {
                    if (window.BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder || window.MSBlobBuilder, "TypeError" === t.name && window.BlobBuilder) {
                        var i = new BlobBuilder;
                        i.append(this._response), this._response = i.getBlob()
                    }
                }
                this._clean(), this.dispatchEvent(new createjs.Event("complete"))
            }
        }, t._handleTimeout = function(e) {
            this._clean(), this.dispatchEvent(new createjs.ErrorEvent("PRELOAD_TIMEOUT", null, e))
        }, t._checkError = function() {
            var e = parseInt(this._request.status);
            switch (e) {
                case 404:
                case 0:
                    return new Error(e)
            }
            return null
        }, t._getResponse = function() {
            if (null != this._response) return this._response;
            if (null != this._request.response) return this._request.response;
            try {
                if (null != this._request.responseText) return this._request.responseText
            } catch (e) {}
            try {
                if (null != this._request.responseXML) return this._request.responseXML
            } catch (e) {}
            return null
        }, t._createXHR = function(e) {
            var t = createjs.RequestUtils.isCrossDomain(e),
                i = {},
                r = null;
            if (window.XMLHttpRequest) r = new XMLHttpRequest, t && void 0 === r.withCredentials && window.XDomainRequest && (r = new XDomainRequest);
            else {
                for (var a = 0, n = s.ACTIVEX_VERSIONS.length; n > a; a++) {
                    var o = s.ACTIVEX_VERSIONS[a];
                    try {
                        r = new ActiveXObject(o);
                        break
                    } catch (l) {}
                }
                if (null == r) return !1
            }
            null == e.mimeType && createjs.RequestUtils.isText(e.type) && (e.mimeType = "text/plain; charset=utf-8"), e.mimeType && r.overrideMimeType && r.overrideMimeType(e.mimeType), this._xhrLevel = "string" == typeof r.responseType ? 2 : 1;
            var c = null;
            if (c = e.method == createjs.AbstractLoader.GET ? createjs.RequestUtils.buildPath(e.src, e.values) : e.src, r.open(e.method || createjs.AbstractLoader.GET, c, !0), t && r instanceof XMLHttpRequest && 1 == this._xhrLevel && (i.Origin = location.origin), e.values && e.method == createjs.AbstractLoader.POST && (i["Content-Type"] = "application/x-www-form-urlencoded"), t || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest"), e.headers)
                for (var u in e.headers) i[u] = e.headers[u];
            for (u in i) r.setRequestHeader(u, i[u]);
            return r instanceof XMLHttpRequest && void 0 !== e.withCredentials && (r.withCredentials = e.withCredentials), this._request = r, !0
        }, t._clean = function() {
            clearTimeout(this._loadTimeout), null != this._request.removeEventListener ? (this._request.removeEventListener("loadstart", this._handleLoadStartProxy), this._request.removeEventListener("progress", this._handleProgressProxy), this._request.removeEventListener("abort", this._handleAbortProxy), this._request.removeEventListener("error", this._handleErrorProxy), this._request.removeEventListener("timeout", this._handleTimeoutProxy), this._request.removeEventListener("load", this._handleLoadProxy), this._request.removeEventListener("readystatechange", this._handleReadyStateChangeProxy)) : (this._request.onloadstart = null, this._request.onprogress = null, this._request.onabort = null, this._request.onerror = null, this._request.ontimeout = null, this._request.onload = null, this._request.onreadystatechange = null)
        }, t.toString = function() {
            return "[PreloadJS XHRRequest]"
        }, createjs.XHRRequest = createjs.promote(e, "AbstractRequest")
    }(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e(e, t) {
        this.AbstractMediaLoader_constructor(e, t, createjs.AbstractLoader.SOUND), createjs.RequestUtils.isAudioTag(e) ? this._tag = e : createjs.RequestUtils.isAudioTag(e.src) ? this._tag = e : createjs.RequestUtils.isAudioTag(e.tag) && (this._tag = createjs.RequestUtils.isAudioTag(e) ? e : e.src), null != this._tag && (this._preferXHR = !1)
    }
    var t = createjs.extend(e, createjs.AbstractMediaLoader),
        i = e;
    i.canLoadItem = function(e) {
        return e.type == createjs.AbstractLoader.SOUND
    }, t._createTag = function(e) {
        var t = document.createElement("audio");
        return t.autoplay = !1, t.preload = "none", t.src = e, t
    }, createjs.SoundLoader = createjs.promote(e, "AbstractMediaLoader")
}(), this.createjs = this.createjs || {},
function() {
    "use strict";
    var e = function() {
            this.interrupt = null, this.delay = null, this.offset = null, this.loop = null, this.volume = null, this.pan = null, this.startTime = null, this.duration = null
        },
        t = e.prototype = {},
        i = e;
    i.create = function(e) {
        if (e instanceof i || e instanceof Object) {
            var t = new createjs.PlayPropsConfig;
            return t.set(e), t
        }
        throw new Error("Type not recognized.")
    }, t.set = function(e) {
        for (var t in e) this[t] = e[t];
        return this
    }, t.toString = function() {
        return "[PlayPropsConfig]"
    }, createjs.PlayPropsConfig = i
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e() {
        throw "Sound cannot be instantiated"
    }

    function t(e, t) {
        this.init(e, t)
    }
    var i = e;
    i.INTERRUPT_ANY = "any", i.INTERRUPT_EARLY = "early", i.INTERRUPT_LATE = "late", i.INTERRUPT_NONE = "none", i.PLAY_INITED = "playInited", i.PLAY_SUCCEEDED = "playSucceeded", i.PLAY_INTERRUPTED = "playInterrupted", i.PLAY_FINISHED = "playFinished", i.PLAY_FAILED = "playFailed", i.SUPPORTED_EXTENSIONS = ["mp3", "ogg", "opus", "mpeg", "wav", "m4a", "mp4", "aiff", "wma", "mid"], i.EXTENSION_MAP = {
        m4a: "mp4"
    }, i.FILE_PATTERN = /^(?:(\w+:)\/{2}(\w+(?:\.\w+)*\/?))?([\/.]*?(?:[^?]+)?\/)?((?:[^\/?]+)\.(\w+))(?:\?(\S+)?)?$/, i.defaultInterruptBehavior = i.INTERRUPT_NONE, i.alternateExtensions = [], i.activePlugin = null, i._masterVolume = 1, Object.defineProperty(i, "volume", {
        get: function() {
            return this._masterVolume
        },
        set: function(e) {
            if (null == Number(e)) return !1;
            if (e = Math.max(0, Math.min(1, e)), i._masterVolume = e, !this.activePlugin || !this.activePlugin.setVolume || !this.activePlugin.setVolume(e))
                for (var t = this._instances, r = 0, s = t.length; s > r; r++) t[r].setMasterVolume(e)
        }
    }), i._masterMute = !1, Object.defineProperty(i, "muted", {
        get: function() {
            return this._masterMute
        },
        set: function(e) {
            if (null == e) return !1;
            if (this._masterMute = e, !this.activePlugin || !this.activePlugin.setMute || !this.activePlugin.setMute(e))
                for (var t = this._instances, i = 0, r = t.length; r > i; i++) t[i].setMasterMute(e);
            return !0
        }
    }), Object.defineProperty(i, "capabilities", {
        get: function() {
            return null == i.activePlugin ? null : i.activePlugin._capabilities
        },
        set: function() {
            return !1
        }
    }), i._pluginsRegistered = !1, i._lastID = 0, i._instances = [], i._idHash = {}, i._preloadHash = {}, i._defaultPlayPropsHash = {}, i.addEventListener = null, i.removeEventListener = null, i.removeAllEventListeners = null, i.dispatchEvent = null, i.hasEventListener = null, i._listeners = null, createjs.EventDispatcher.initialize(i), i.getPreloadHandlers = function() {
        return {
            callback: createjs.proxy(i.initLoad, i),
            types: ["sound"],
            extensions: i.SUPPORTED_EXTENSIONS
        }
    }, i._handleLoadComplete = function(e) {
        var t = e.target.getItem().src;
        if (i._preloadHash[t])
            for (var r = 0, s = i._preloadHash[t].length; s > r; r++) {
                var a = i._preloadHash[t][r];
                if (i._preloadHash[t][r] = !0, i.hasEventListener("fileload")) {
                    var e = new createjs.Event("fileload");
                    e.src = a.src, e.id = a.id, e.data = a.data, e.sprite = a.sprite, i.dispatchEvent(e)
                }
            }
    }, i._handleLoadError = function(e) {
        var t = e.target.getItem().src;
        if (i._preloadHash[t])
            for (var r = 0, s = i._preloadHash[t].length; s > r; r++) {
                var a = i._preloadHash[t][r];
                if (i._preloadHash[t][r] = !1, i.hasEventListener("fileerror")) {
                    var e = new createjs.Event("fileerror");
                    e.src = a.src, e.id = a.id, e.data = a.data, e.sprite = a.sprite, i.dispatchEvent(e)
                }
            }
    }, i._registerPlugin = function(e) {
        return e.isSupported() ? (i.activePlugin = new e, !0) : !1
    }, i.registerPlugins = function(e) {
        i._pluginsRegistered = !0;
        for (var t = 0, r = e.length; r > t; t++)
            if (i._registerPlugin(e[t])) return !0;
        return !1
    }, i.initializeDefaultPlugins = function() {
        return null != i.activePlugin ? !0 : i._pluginsRegistered ? !1 : i.registerPlugins([createjs.WebAudioPlugin, createjs.HTMLAudioPlugin]) ? !0 : !1
    }, i.isReady = function() {
        return null != i.activePlugin
    }, i.getCapabilities = function() {
        return null == i.activePlugin ? null : i.activePlugin._capabilities
    }, i.getCapability = function(e) {
        return null == i.activePlugin ? null : i.activePlugin._capabilities[e]
    }, i.initLoad = function(e) {
        return i._registerSound(e)
    }, i._registerSound = function(e) {
        if (!i.initializeDefaultPlugins()) return !1;
        var r;
        if (e.src instanceof Object ? (r = i._parseSrc(e.src), r.src = e.path + r.src) : r = i._parsePath(e.src), null == r) return !1;
        e.src = r.src, e.type = "sound";
        var s = e.data,
            a = null;
        if (null != s && (isNaN(s.channels) ? isNaN(s) || (a = parseInt(s)) : a = parseInt(s.channels), s.audioSprite))
            for (var n, o = s.audioSprite.length; o--;) n = s.audioSprite[o], i._idHash[n.id] = {
                src: e.src,
                startTime: parseInt(n.startTime),
                duration: parseInt(n.duration)
            }, n.defaultPlayProps && (i._defaultPlayPropsHash[n.id] = createjs.PlayPropsConfig.create(n.defaultPlayProps));
        null != e.id && (i._idHash[e.id] = {
            src: e.src
        });
        var l = i.activePlugin.register(e);
        return t.create(e.src, a), null != s && isNaN(s) ? e.data.channels = a || t.maxPerChannel() : e.data = a || t.maxPerChannel(), l.type && (e.type = l.type), e.defaultPlayProps && (i._defaultPlayPropsHash[e.src] = createjs.PlayPropsConfig.create(e.defaultPlayProps)), l
    }, i.registerSound = function(e, t, r, s, a) {
        var n = {
            src: e,
            id: t,
            data: r,
            defaultPlayProps: a
        };
        e instanceof Object && e.src && (s = t, n = e), n = createjs.LoadItem.create(n), n.path = s, null == s || n.src instanceof Object || (n.src = s + e);
        var o = i._registerSound(n);
        if (!o) return !1;
        if (i._preloadHash[n.src] || (i._preloadHash[n.src] = []), i._preloadHash[n.src].push(n), 1 == i._preloadHash[n.src].length) o.on("complete", createjs.proxy(this._handleLoadComplete, this)), o.on("error", createjs.proxy(this._handleLoadError, this)), i.activePlugin.preload(o);
        else if (1 == i._preloadHash[n.src][0]) return !0;
        return n
    }, i.registerSounds = function(e, t) {
        var i = [];
        e.path && (t ? t += e.path : t = e.path, e = e.manifest);
        for (var r = 0, s = e.length; s > r; r++) i[r] = createjs.Sound.registerSound(e[r].src, e[r].id, e[r].data, t, e[r].defaultPlayProps);
        return i
    }, i.removeSound = function(e, r) {
        if (null == i.activePlugin) return !1;
        e instanceof Object && e.src && (e = e.src);
        var s;
        if (e instanceof Object ? s = i._parseSrc(e) : (e = i._getSrcById(e).src, s = i._parsePath(e)), null == s) return !1;
        e = s.src, null != r && (e = r + e);
        for (var a in i._idHash) i._idHash[a].src == e && delete i._idHash[a];
        return t.removeSrc(e), delete i._preloadHash[e], i.activePlugin.removeSound(e), !0
    }, i.removeSounds = function(e, t) {
        var i = [];
        e.path && (t ? t += e.path : t = e.path, e = e.manifest);
        for (var r = 0, s = e.length; s > r; r++) i[r] = createjs.Sound.removeSound(e[r].src, t);
        return i
    }, i.removeAllSounds = function() {
        i._idHash = {}, i._preloadHash = {}, t.removeAll(), i.activePlugin && i.activePlugin.removeAllSounds()
    }, i.loadComplete = function(e) {
        if (!i.isReady()) return !1;
        var t = i._parsePath(e);
        return e = t ? i._getSrcById(t.src).src : i._getSrcById(e).src, void 0 == i._preloadHash[e] ? !1 : 1 == i._preloadHash[e][0]
    }, i._parsePath = function(e) {
        "string" != typeof e && (e = e.toString());
        var t = e.match(i.FILE_PATTERN);
        if (null == t) return !1;
        for (var r = t[4], s = t[5], a = i.capabilities, n = 0; !a[s];)
            if (s = i.alternateExtensions[n++], n > i.alternateExtensions.length) return null;
        e = e.replace("." + t[5], "." + s);
        var o = {
            name: r,
            src: e,
            extension: s
        };
        return o
    }, i._parseSrc = function(e) {
        var t = {
                name: void 0,
                src: void 0,
                extension: void 0
            },
            r = i.capabilities;
        for (var s in e)
            if (e.hasOwnProperty(s) && r[s]) {
                t.src = e[s], t.extension = s;
                break
            } if (!t.src) return !1;
        var a = t.src.lastIndexOf("/");
        return t.name = -1 != a ? t.src.slice(a + 1) : t.src, t
    }, i.play = function(e, t, r, s, a, n, o, l, c) {
        var u;
        u = createjs.PlayPropsConfig.create(t instanceof Object || t instanceof createjs.PlayPropsConfig ? t : {
            interrupt: t,
            delay: r,
            offset: s,
            loop: a,
            volume: n,
            pan: o,
            startTime: l,
            duration: c
        });
        var _ = i.createInstance(e, u.startTime, u.duration),
            h = i._playInstance(_, u);
        return h || _._playFailed(), _
    }, i.createInstance = function(e, r, s) {
        if (!i.initializeDefaultPlugins()) return new createjs.DefaultSoundInstance(e, r, s);
        var a = i._defaultPlayPropsHash[e];
        e = i._getSrcById(e);
        var n = i._parsePath(e.src),
            o = null;
        return null != n && null != n.src ? (t.create(n.src), null == r && (r = e.startTime), o = i.activePlugin.create(n.src, r, s || e.duration), a = a || i._defaultPlayPropsHash[n.src], a && o.applyPlayProps(a)) : o = new createjs.DefaultSoundInstance(e, r, s), o.uniqueId = i._lastID++, o
    }, i.stop = function() {
        for (var e = this._instances, t = e.length; t--;) e[t].stop()
    }, i.setVolume = function(e) {
        if (null == Number(e)) return !1;
        if (e = Math.max(0, Math.min(1, e)), i._masterVolume = e, !this.activePlugin || !this.activePlugin.setVolume || !this.activePlugin.setVolume(e))
            for (var t = this._instances, r = 0, s = t.length; s > r; r++) t[r].setMasterVolume(e)
    }, i.getVolume = function() {
        return this._masterVolume
    }, i.setMute = function(e) {
        if (null == e) return !1;
        if (this._masterMute = e, !this.activePlugin || !this.activePlugin.setMute || !this.activePlugin.setMute(e))
            for (var t = this._instances, i = 0, r = t.length; r > i; i++) t[i].setMasterMute(e);
        return !0
    }, i.getMute = function() {
        return this._masterMute
    }, i.setDefaultPlayProps = function(e, t) {
        e = i._getSrcById(e), i._defaultPlayPropsHash[i._parsePath(e.src).src] = createjs.PlayPropsConfig.create(t)
    }, i.getDefaultPlayProps = function(e) {
        return e = i._getSrcById(e), i._defaultPlayPropsHash[i._parsePath(e.src).src]
    }, i._playInstance = function(e, t) {
        var r = i._defaultPlayPropsHash[e.src] || {};
        if (null == t.interrupt && (t.interrupt = r.interrupt || i.defaultInterruptBehavior), null == t.delay && (t.delay = r.delay || 0), null == t.offset && (t.offset = e.getPosition()), null == t.loop && (t.loop = e.loop), null == t.volume && (t.volume = e.volume), null == t.pan && (t.pan = e.pan), 0 == t.delay) {
            var s = i._beginPlaying(e, t);
            if (!s) return !1
        } else {
            var a = setTimeout(function() {
                i._beginPlaying(e, t)
            }, t.delay);
            e.delayTimeoutId = a
        }
        return this._instances.push(e), !0
    }, i._beginPlaying = function(e, i) {
        if (!t.add(e, i.interrupt)) return !1;
        var r = e._beginPlaying(i);
        if (!r) {
            var s = createjs.indexOf(this._instances, e);
            return s > -1 && this._instances.splice(s, 1), !1
        }
        return !0
    }, i._getSrcById = function(e) {
        return i._idHash[e] || {
            src: e
        }
    }, i._playFinished = function(e) {
        t.remove(e);
        var i = createjs.indexOf(this._instances, e);
        i > -1 && this._instances.splice(i, 1)
    }, createjs.Sound = e, t.channels = {}, t.create = function(e, i) {
        var r = t.get(e);
        return null == r ? (t.channels[e] = new t(e, i), !0) : !1
    }, t.removeSrc = function(e) {
        var i = t.get(e);
        return null == i ? !1 : (i._removeAll(), delete t.channels[e], !0)
    }, t.removeAll = function() {
        for (var e in t.channels) t.channels[e]._removeAll();
        t.channels = {}
    }, t.add = function(e, i) {
        var r = t.get(e.src);
        return null == r ? !1 : r._add(e, i)
    }, t.remove = function(e) {
        var i = t.get(e.src);
        return null == i ? !1 : (i._remove(e), !0)
    }, t.maxPerChannel = function() {
        return r.maxDefault
    }, t.get = function(e) {
        return t.channels[e]
    };
    var r = t.prototype;
    r.constructor = t, r.src = null, r.max = null, r.maxDefault = 100, r.length = 0, r.init = function(e, t) {
        this.src = e, this.max = t || this.maxDefault, -1 == this.max && (this.max = this.maxDefault), this._instances = []
    }, r._get = function(e) {
        return this._instances[e]
    }, r._add = function(e, t) {
        return this._getSlot(t, e) ? (this._instances.push(e), this.length++, !0) : !1
    }, r._remove = function(e) {
        var t = createjs.indexOf(this._instances, e);
        return -1 == t ? !1 : (this._instances.splice(t, 1), this.length--, !0)
    }, r._removeAll = function() {
        for (var e = this.length - 1; e >= 0; e--) this._instances[e].stop()
    }, r._getSlot = function(t) {
        var i, r;
        if (t != e.INTERRUPT_NONE && (r = this._get(0), null == r)) return !0;
        for (var s = 0, a = this.max; a > s; s++) {
            if (i = this._get(s), null == i) return !0;
            if (i.playState == e.PLAY_FINISHED || i.playState == e.PLAY_INTERRUPTED || i.playState == e.PLAY_FAILED) {
                r = i;
                break
            }
            t != e.INTERRUPT_NONE && (t == e.INTERRUPT_EARLY && i.getPosition() < r.getPosition() || t == e.INTERRUPT_LATE && i.getPosition() > r.getPosition()) && (r = i)
        }
        return null != r ? (r._interrupt(), this._remove(r), !0) : !1
    }, r.toString = function() {
        return "[Sound SoundChannel]"
    }
}(), this.createjs = this.createjs || {},
function() {
    "use strict";
    var e = function(e, t, i, r) {
            this.EventDispatcher_constructor(), this.src = e, this.uniqueId = -1, this.playState = null, this.delayTimeoutId = null, this._volume = 1, Object.defineProperty(this, "volume", {
                get: this.getVolume,
                set: this.setVolume
            }), this._pan = 0, Object.defineProperty(this, "pan", {
                get: this.getPan,
                set: this.setPan
            }), this._startTime = Math.max(0, t || 0), Object.defineProperty(this, "startTime", {
                get: this.getStartTime,
                set: this.setStartTime
            }), this._duration = Math.max(0, i || 0), Object.defineProperty(this, "duration", {
                get: this.getDuration,
                set: this.setDuration
            }), this._playbackResource = null, Object.defineProperty(this, "playbackResource", {
                get: this.getPlaybackResource,
                set: this.setPlaybackResource
            }), r !== !1 && r !== !0 && this.setPlaybackResource(r), this._position = 0, Object.defineProperty(this, "position", {
                get: this.getPosition,
                set: this.setPosition
            }), this._loop = 0, Object.defineProperty(this, "loop", {
                get: this.getLoop,
                set: this.setLoop
            }), this._muted = !1, Object.defineProperty(this, "muted", {
                get: this.getMuted,
                set: this.setMuted
            }), this._paused = !1, Object.defineProperty(this, "paused", {
                get: this.getPaused,
                set: this.setPaused
            })
        },
        t = createjs.extend(e, createjs.EventDispatcher);
    t.play = function(e, t, i, r, s, a) {
        var n;
        return n = createjs.PlayPropsConfig.create(e instanceof Object || e instanceof createjs.PlayPropsConfig ? e : {
            interrupt: e,
            delay: t,
            offset: i,
            loop: r,
            volume: s,
            pan: a
        }), this.playState == createjs.Sound.PLAY_SUCCEEDED ? (this.applyPlayProps(n), void(this._paused && this.setPaused(!1))) : (this._cleanUp(), createjs.Sound._playInstance(this, n), this)
    }, t.stop = function() {
        return this._position = 0, this._paused = !1, this._handleStop(), this._cleanUp(), this.playState = createjs.Sound.PLAY_FINISHED, this
    }, t.destroy = function() {
        this._cleanUp(), this.src = null, this.playbackResource = null, this.removeAllEventListeners()
    }, t.applyPlayProps = function(e) {
        return null != e.offset && this.setPosition(e.offset), null != e.loop && this.setLoop(e.loop), null != e.volume && this.setVolume(e.volume), null != e.pan && this.setPan(e.pan), null != e.startTime && (this.setStartTime(e.startTime), this.setDuration(e.duration)), this
    }, t.toString = function() {
        return "[AbstractSoundInstance]"
    }, t.getPaused = function() {
        return this._paused
    }, t.setPaused = function(e) {
        return e !== !0 && e !== !1 || this._paused == e || 1 == e && this.playState != createjs.Sound.PLAY_SUCCEEDED ? void 0 : (this._paused = e,
            e ? this._pause() : this._resume(), clearTimeout(this.delayTimeoutId), this)
    }, t.setVolume = function(e) {
        return e == this._volume ? this : (this._volume = Math.max(0, Math.min(1, e)), this._muted || this._updateVolume(), this)
    }, t.getVolume = function() {
        return this._volume
    }, t.setMuted = function(e) {
        return e === !0 || e === !1 ? (this._muted = e, this._updateVolume(), this) : void 0
    }, t.getMuted = function() {
        return this._muted
    }, t.setPan = function(e) {
        return e == this._pan ? this : (this._pan = Math.max(-1, Math.min(1, e)), this._updatePan(), this)
    }, t.getPan = function() {
        return this._pan
    }, t.getPosition = function() {
        return this._paused || this.playState != createjs.Sound.PLAY_SUCCEEDED || (this._position = this._calculateCurrentPosition()), this._position
    }, t.setPosition = function(e) {
        return this._position = Math.max(0, e), this.playState == createjs.Sound.PLAY_SUCCEEDED && this._updatePosition(), this
    }, t.getStartTime = function() {
        return this._startTime
    }, t.setStartTime = function(e) {
        return e == this._startTime ? this : (this._startTime = Math.max(0, e || 0), this._updateStartTime(), this)
    }, t.getDuration = function() {
        return this._duration
    }, t.setDuration = function(e) {
        return e == this._duration ? this : (this._duration = Math.max(0, e || 0), this._updateDuration(), this)
    }, t.setPlaybackResource = function(e) {
        return this._playbackResource = e, 0 == this._duration && this._setDurationFromSource(), this
    }, t.getPlaybackResource = function() {
        return this._playbackResource
    }, t.getLoop = function() {
        return this._loop
    }, t.setLoop = function(e) {
        null != this._playbackResource && (0 != this._loop && 0 == e ? this._removeLooping(e) : 0 == this._loop && 0 != e && this._addLooping(e)), this._loop = e
    }, t._sendEvent = function(e) {
        var t = new createjs.Event(e);
        this.dispatchEvent(t)
    }, t._cleanUp = function() {
        clearTimeout(this.delayTimeoutId), this._handleCleanUp(), this._paused = !1, createjs.Sound._playFinished(this)
    }, t._interrupt = function() {
        this._cleanUp(), this.playState = createjs.Sound.PLAY_INTERRUPTED, this._sendEvent("interrupted")
    }, t._beginPlaying = function(e) {
        return this.setPosition(e.offset), this.setLoop(e.loop), this.setVolume(e.volume), this.setPan(e.pan), null != e.startTime && (this.setStartTime(e.startTime), this.setDuration(e.duration)), null != this._playbackResource && this._position < this._duration ? (this._paused = !1, this._handleSoundReady(), this.playState = createjs.Sound.PLAY_SUCCEEDED, this._sendEvent("succeeded"), !0) : (this._playFailed(), !1)
    }, t._playFailed = function() {
        this._cleanUp(), this.playState = createjs.Sound.PLAY_FAILED, this._sendEvent("failed")
    }, t._handleSoundComplete = function() {
        return this._position = 0, 0 != this._loop ? (this._loop--, this._handleLoop(), void this._sendEvent("loop")) : (this._cleanUp(), this.playState = createjs.Sound.PLAY_FINISHED, void this._sendEvent("complete"))
    }, t._handleSoundReady = function() {}, t._updateVolume = function() {}, t._updatePan = function() {}, t._updateStartTime = function() {}, t._updateDuration = function() {}, t._setDurationFromSource = function() {}, t._calculateCurrentPosition = function() {}, t._updatePosition = function() {}, t._removeLooping = function() {}, t._addLooping = function() {}, t._pause = function() {}, t._resume = function() {}, t._handleStop = function() {}, t._handleCleanUp = function() {}, t._handleLoop = function() {}, createjs.AbstractSoundInstance = createjs.promote(e, "EventDispatcher"), createjs.DefaultSoundInstance = createjs.AbstractSoundInstance
}(), this.createjs = this.createjs || {},
function() {
    "use strict";
    var e = function() {
            this._capabilities = null, this._loaders = {}, this._audioSources = {}, this._soundInstances = {}, this._volume = 1, this._loaderClass, this._soundInstanceClass
        },
        t = e.prototype;
    e._capabilities = null, e.isSupported = function() {
        return !0
    }, t.register = function(e) {
        var t = this._loaders[e.src];
        return t && !t.canceled ? this._loaders[e.src] : (this._audioSources[e.src] = !0, this._soundInstances[e.src] = [], t = new this._loaderClass(e), t.on("complete", this._handlePreloadComplete, this), this._loaders[e.src] = t, t)
    }, t.preload = function(e) {
        e.on("error", this._handlePreloadError, this), e.load()
    }, t.isPreloadStarted = function(e) {
        return null != this._audioSources[e]
    }, t.isPreloadComplete = function(e) {
        return !(null == this._audioSources[e] || 1 == this._audioSources[e])
    }, t.removeSound = function(e) {
        if (this._soundInstances[e]) {
            for (var t = this._soundInstances[e].length; t--;) {
                var i = this._soundInstances[e][t];
                i.destroy()
            }
            delete this._soundInstances[e], delete this._audioSources[e], this._loaders[e] && this._loaders[e].destroy(), delete this._loaders[e]
        }
    }, t.removeAllSounds = function() {
        for (var e in this._audioSources) this.removeSound(e)
    }, t.create = function(e, t, i) {
        this.isPreloadStarted(e) || this.preload(this.register(e));
        var r = new this._soundInstanceClass(e, t, i, this._audioSources[e]);
        return this._soundInstances[e].push(r), r
    }, t.setVolume = function(e) {
        return this._volume = e, this._updateVolume(), !0
    }, t.getVolume = function() {
        return this._volume
    }, t.setMute = function() {
        return this._updateVolume(), !0
    }, t.toString = function() {
        return "[AbstractPlugin]"
    }, t._handlePreloadComplete = function(e) {
        var t = e.target.getItem().src;
        this._audioSources[t] = e.result;
        for (var i = 0, r = this._soundInstances[t].length; r > i; i++) {
            var s = this._soundInstances[t][i];
            s.setPlaybackResource(this._audioSources[t])
        }
    }, t._handlePreloadError = function() {}, t._updateVolume = function() {}, createjs.AbstractPlugin = e
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e(e) {
        this.AbstractLoader_constructor(e, !0, createjs.AbstractLoader.SOUND)
    }
    var t = createjs.extend(e, createjs.AbstractLoader);
    e.context = null, t.toString = function() {
        return "[WebAudioLoader]"
    }, t._createRequest = function() {
        this._request = new createjs.XHRRequest(this._item, !1), this._request.setResponseType("arraybuffer")
    }, t._sendComplete = function() {
        e.context.decodeAudioData(this._rawResult, createjs.proxy(this._handleAudioDecoded, this), createjs.proxy(this._sendError, this))
    }, t._handleAudioDecoded = function(e) {
        this._result = e, this.AbstractLoader__sendComplete()
    }, createjs.WebAudioLoader = createjs.promote(e, "AbstractLoader")
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e(e, t, r, s) {
        this.AbstractSoundInstance_constructor(e, t, r, s), this.gainNode = i.context.createGain(), this.panNode = i.context.createPanner(), this.panNode.panningModel = i._panningModel, this.panNode.connect(this.gainNode), this._updatePan(), this.sourceNode = null, this._soundCompleteTimeout = null, this._sourceNodeNext = null, this._playbackStartTime = 0, this._endedHandler = createjs.proxy(this._handleSoundComplete, this)
    }
    var t = createjs.extend(e, createjs.AbstractSoundInstance),
        i = e;
    i.context = null, i._scratchBuffer = null, i.destinationNode = null, i._panningModel = "equalpower", t.destroy = function() {
        this.AbstractSoundInstance_destroy(), this.panNode.disconnect(0), this.panNode = null, this.gainNode.disconnect(0), this.gainNode = null
    }, t.toString = function() {
        return "[WebAudioSoundInstance]"
    }, t._updatePan = function() {
        this.panNode.setPosition(this._pan, 0, -.5)
    }, t._removeLooping = function() {
        this._sourceNodeNext = this._cleanUpAudioNode(this._sourceNodeNext)
    }, t._addLooping = function() {
        this.playState == createjs.Sound.PLAY_SUCCEEDED && (this._sourceNodeNext = this._createAndPlayAudioNode(this._playbackStartTime, 0))
    }, t._setDurationFromSource = function() {
        this._duration = 1e3 * this.playbackResource.duration
    }, t._handleCleanUp = function() {
        this.sourceNode && this.playState == createjs.Sound.PLAY_SUCCEEDED && (this.sourceNode = this._cleanUpAudioNode(this.sourceNode), this._sourceNodeNext = this._cleanUpAudioNode(this._sourceNodeNext)), 0 != this.gainNode.numberOfOutputs && this.gainNode.disconnect(0), clearTimeout(this._soundCompleteTimeout), this._playbackStartTime = 0
    }, t._cleanUpAudioNode = function(e) {
        if (e) {
            e.stop(0), e.disconnect(0);
            try {
                e.buffer = i._scratchBuffer
            } catch (t) {}
            e = null
        }
        return e
    }, t._handleSoundReady = function() {
        this.gainNode.connect(i.destinationNode);
        var e = .001 * this._duration,
            t = .001 * this._position;
        t > e && (t = e), this.sourceNode = this._createAndPlayAudioNode(i.context.currentTime - e, t), this._playbackStartTime = this.sourceNode.startTime - t, this._soundCompleteTimeout = setTimeout(this._endedHandler, 1e3 * (e - t)), 0 != this._loop && (this._sourceNodeNext = this._createAndPlayAudioNode(this._playbackStartTime, 0))
    }, t._createAndPlayAudioNode = function(e, t) {
        var r = i.context.createBufferSource();
        r.buffer = this.playbackResource, r.connect(this.panNode);
        var s = .001 * this._duration;
        return r.startTime = e + s, r.start(r.startTime, t + .001 * this._startTime, s - t), r
    }, t._pause = function() {
        this._position = 1e3 * (i.context.currentTime - this._playbackStartTime), this.sourceNode = this._cleanUpAudioNode(this.sourceNode), this._sourceNodeNext = this._cleanUpAudioNode(this._sourceNodeNext), 0 != this.gainNode.numberOfOutputs && this.gainNode.disconnect(0), clearTimeout(this._soundCompleteTimeout)
    }, t._resume = function() {
        this._handleSoundReady()
    }, t._updateVolume = function() {
        var e = this._muted ? 0 : this._volume;
        e != this.gainNode.gain.value && (this.gainNode.gain.value = e)
    }, t._calculateCurrentPosition = function() {
        return 1e3 * (i.context.currentTime - this._playbackStartTime)
    }, t._updatePosition = function() {
        this.sourceNode = this._cleanUpAudioNode(this.sourceNode), this._sourceNodeNext = this._cleanUpAudioNode(this._sourceNodeNext), clearTimeout(this._soundCompleteTimeout), this._paused || this._handleSoundReady()
    }, t._handleLoop = function() {
        this._cleanUpAudioNode(this.sourceNode), this.sourceNode = this._sourceNodeNext, this._playbackStartTime = this.sourceNode.startTime, this._sourceNodeNext = this._createAndPlayAudioNode(this._playbackStartTime, 0), this._soundCompleteTimeout = setTimeout(this._endedHandler, this._duration)
    }, t._updateDuration = function() {
        this.playState == createjs.Sound.PLAY_SUCCEEDED && (this._pause(), this._resume())
    }, createjs.WebAudioSoundInstance = createjs.promote(e, "AbstractSoundInstance")
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e() {
        this.AbstractPlugin_constructor(), this._panningModel = i._panningModel, this.context = i.context, this.dynamicsCompressorNode = this.context.createDynamicsCompressor(), this.dynamicsCompressorNode.connect(this.context.destination), this.gainNode = this.context.createGain(), this.gainNode.connect(this.dynamicsCompressorNode), createjs.WebAudioSoundInstance.destinationNode = this.gainNode, this._capabilities = i._capabilities, this._loaderClass = createjs.WebAudioLoader, this._soundInstanceClass = createjs.WebAudioSoundInstance, this._addPropsToClasses()
    }
    var t = createjs.extend(e, createjs.AbstractPlugin),
        i = e;
    i._capabilities = null, i._panningModel = "equalpower", i.context = null, i._scratchBuffer = null, i._unlocked = !1, i.isSupported = function() {
        var e = createjs.BrowserDetect.isIOS || createjs.BrowserDetect.isAndroid || createjs.BrowserDetect.isBlackberry;
        return "file:" != location.protocol || e || this._isFileXHRSupported() ? (i._generateCapabilities(), null == i.context ? !1 : !0) : !1
    }, i.playEmptySound = function() {
        if (null != i.context) {
            var e = i.context.createBufferSource();
            e.buffer = i._scratchBuffer, e.connect(i.context.destination), e.start(0, 0, 0)
        }
    }, i._isFileXHRSupported = function() {
        var e = !0,
            t = new XMLHttpRequest;
        try {
            t.open("GET", "WebAudioPluginTest.fail", !1)
        } catch (i) {
            return e = !1
        }
        t.onerror = function() {
            e = !1
        }, t.onload = function() {
            e = 404 == this.status || 200 == this.status || 0 == this.status && "" != this.response
        };
        try {
            t.send()
        } catch (i) {
            e = !1
        }
        return e
    }, i._generateCapabilities = function() {
        if (null == i._capabilities) {
            var e = document.createElement("audio");
            if (null == e.canPlayType) return null;
            if (null == i.context)
                if (window.AudioContext) i.context = new AudioContext;
                else {
                    if (!window.webkitAudioContext) return null;
                    i.context = new webkitAudioContext
                } null == i._scratchBuffer && (i._scratchBuffer = i.context.createBuffer(1, 1, 22050)), i._compatibilitySetUp(), "ontouchstart" in window && "running" != i.context.state && (i._unlock(), document.addEventListener("mousedown", i._unlock, !0), document.addEventListener("touchend", i._unlock, !0)), i._capabilities = {
                panning: !0,
                volume: !0,
                tracks: -1
            };
            for (var t = createjs.Sound.SUPPORTED_EXTENSIONS, r = createjs.Sound.EXTENSION_MAP, s = 0, a = t.length; a > s; s++) {
                var n = t[s],
                    o = r[n] || n;
                i._capabilities[n] = "no" != e.canPlayType("audio/" + n) && "" != e.canPlayType("audio/" + n) || "no" != e.canPlayType("audio/" + o) && "" != e.canPlayType("audio/" + o)
            }
            i.context.destination.numberOfChannels < 2 && (i._capabilities.panning = !1)
        }
    }, i._compatibilitySetUp = function() {
        if (i._panningModel = "equalpower", !i.context.createGain) {
            i.context.createGain = i.context.createGainNode;
            var e = i.context.createBufferSource();
            e.__proto__.start = e.__proto__.noteGrainOn, e.__proto__.stop = e.__proto__.noteOff, i._panningModel = 0
        }
    }, i._unlock = function() {
        i._unlocked || (i.playEmptySound(), "running" == i.context.state && (document.removeEventListener("mousedown", i._unlock, !0), document.removeEventListener("touchend", i._unlock, !0), i._unlocked = !0))
    }, t.toString = function() {
        return "[WebAudioPlugin]"
    }, t._addPropsToClasses = function() {
        var e = this._soundInstanceClass;
        e.context = this.context, e._scratchBuffer = i._scratchBuffer, e.destinationNode = this.gainNode, e._panningModel = this._panningModel, this._loaderClass.context = this.context
    }, t._updateVolume = function() {
        var e = createjs.Sound._masterMute ? 0 : this._volume;
        e != this.gainNode.gain.value && (this.gainNode.gain.value = e)
    }, createjs.WebAudioPlugin = createjs.promote(e, "AbstractPlugin")
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e() {
        throw "HTMLAudioTagPool cannot be instantiated"
    }

    function t() {
        this._tags = []
    }
    var i = e;
    i._tags = {}, i._tagPool = new t, i._tagUsed = {}, i.get = function(e) {
        var t = i._tags[e];
        return null == t ? (t = i._tags[e] = i._tagPool.get(), t.src = e) : i._tagUsed[e] ? (t = i._tagPool.get(), t.src = e) : i._tagUsed[e] = !0, t
    }, i.set = function(e, t) {
        t == i._tags[e] ? i._tagUsed[e] = !1 : i._tagPool.set(t)
    }, i.remove = function(e) {
        var t = i._tags[e];
        return null == t ? !1 : (i._tagPool.set(t), delete i._tags[e], delete i._tagUsed[e], !0)
    }, i.getDuration = function(e) {
        var t = i._tags[e];
        return null != t && t.duration ? 1e3 * t.duration : 0
    }, createjs.HTMLAudioTagPool = e;
    var r = t.prototype;
    r.constructor = t, r.get = function() {
        var e;
        return e = 0 == this._tags.length ? this._createTag() : this._tags.pop(), null == e.parentNode && document.body.appendChild(e), e
    }, r.set = function(e) {
        var t = createjs.indexOf(this._tags, e); - 1 == t && (this._tags.src = null, this._tags.push(e))
    }, r.toString = function() {
        return "[TagPool]"
    }, r._createTag = function() {
        var e = document.createElement("audio");
        return e.autoplay = !1, e.preload = "none", e
    }
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e(e, t, i, r) {
        this.AbstractSoundInstance_constructor(e, t, i, r), this._audioSpriteStopTime = null, this._delayTimeoutId = null, this._endedHandler = createjs.proxy(this._handleSoundComplete, this), this._readyHandler = createjs.proxy(this._handleTagReady, this), this._stalledHandler = createjs.proxy(this._playFailed, this), this._audioSpriteEndHandler = createjs.proxy(this._handleAudioSpriteLoop, this), this._loopHandler = createjs.proxy(this._handleSoundComplete, this), i ? this._audioSpriteStopTime = .001 * (t + i) : this._duration = createjs.HTMLAudioTagPool.getDuration(this.src)
    }
    var t = createjs.extend(e, createjs.AbstractSoundInstance);
    t.setMasterVolume = function() {
        this._updateVolume()
    }, t.setMasterMute = function() {
        this._updateVolume()
    }, t.toString = function() {
        return "[HTMLAudioSoundInstance]"
    }, t._removeLooping = function() {
        null != this._playbackResource && (this._playbackResource.loop = !1, this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1))
    }, t._addLooping = function() {
        null == this._playbackResource || this._audioSpriteStopTime || (this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1), this._playbackResource.loop = !0)
    }, t._handleCleanUp = function() {
        var e = this._playbackResource;
        if (null != e) {
            e.pause(), e.loop = !1, e.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_ENDED, this._endedHandler, !1), e.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_READY, this._readyHandler, !1), e.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_STALLED, this._stalledHandler, !1), e.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1), e.removeEventListener(createjs.HTMLAudioPlugin._TIME_UPDATE, this._audioSpriteEndHandler, !1);
            try {
                e.currentTime = this._startTime
            } catch (t) {}
            createjs.HTMLAudioTagPool.set(this.src, e), this._playbackResource = null
        }
    }, t._beginPlaying = function(e) {
        return this._playbackResource = createjs.HTMLAudioTagPool.get(this.src), this.AbstractSoundInstance__beginPlaying(e)
    }, t._handleSoundReady = function() {
        if (4 !== this._playbackResource.readyState) {
            var e = this._playbackResource;
            return e.addEventListener(createjs.HTMLAudioPlugin._AUDIO_READY, this._readyHandler, !1), e.addEventListener(createjs.HTMLAudioPlugin._AUDIO_STALLED, this._stalledHandler, !1), e.preload = "auto", void e.load()
        }
        this._updateVolume(), this._playbackResource.currentTime = .001 * (this._startTime + this._position), this._audioSpriteStopTime ? this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._TIME_UPDATE, this._audioSpriteEndHandler, !1) : (this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._AUDIO_ENDED, this._endedHandler, !1), 0 != this._loop && (this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1), this._playbackResource.loop = !0)), this._playbackResource.play()
    }, t._handleTagReady = function() {
        this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_READY, this._readyHandler, !1), this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_STALLED, this._stalledHandler, !1), this._handleSoundReady()
    }, t._pause = function() {
        this._playbackResource.pause()
    }, t._resume = function() {
        this._playbackResource.play()
    }, t._updateVolume = function() {
        if (null != this._playbackResource) {
            var e = this._muted || createjs.Sound._masterMute ? 0 : this._volume * createjs.Sound._masterVolume;
            e != this._playbackResource.volume && (this._playbackResource.volume = e)
        }
    }, t._calculateCurrentPosition = function() {
        return 1e3 * this._playbackResource.currentTime - this._startTime
    }, t._updatePosition = function() {
        this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1), this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._handleSetPositionSeek, !1);
        try {
            this._playbackResource.currentTime = .001 * (this._position + this._startTime)
        } catch (e) {
            this._handleSetPositionSeek(null)
        }
    }, t._handleSetPositionSeek = function() {
        null != this._playbackResource && (this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._handleSetPositionSeek, !1), this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1))
    }, t._handleAudioSpriteLoop = function() {
        this._playbackResource.currentTime <= this._audioSpriteStopTime || (this._playbackResource.pause(), 0 == this._loop ? this._handleSoundComplete(null) : (this._position = 0, this._loop--, this._playbackResource.currentTime = .001 * this._startTime, this._paused || this._playbackResource.play(), this._sendEvent("loop")))
    }, t._handleLoop = function() {
        0 == this._loop && (this._playbackResource.loop = !1, this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_SEEKED, this._loopHandler, !1))
    }, t._updateStartTime = function() {
        this._audioSpriteStopTime = .001 * (this._startTime + this._duration), this.playState == createjs.Sound.PLAY_SUCCEEDED && (this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_ENDED, this._endedHandler, !1), this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._TIME_UPDATE, this._audioSpriteEndHandler, !1))
    }, t._updateDuration = function() {
        this._audioSpriteStopTime = .001 * (this._startTime + this._duration), this.playState == createjs.Sound.PLAY_SUCCEEDED && (this._playbackResource.removeEventListener(createjs.HTMLAudioPlugin._AUDIO_ENDED, this._endedHandler, !1), this._playbackResource.addEventListener(createjs.HTMLAudioPlugin._TIME_UPDATE, this._audioSpriteEndHandler, !1))
    }, t._setDurationFromSource = function() {
        this._duration = createjs.HTMLAudioTagPool.getDuration(this.src), this._playbackResource = null
    }, createjs.HTMLAudioSoundInstance = createjs.promote(e, "AbstractSoundInstance")
}(), this.createjs = this.createjs || {},
function() {
    "use strict";

    function e() {
        this.AbstractPlugin_constructor(), this.defaultNumChannels = 2, this._capabilities = i._capabilities, this._loaderClass = createjs.SoundLoader, this._soundInstanceClass = createjs.HTMLAudioSoundInstance
    }
    var t = createjs.extend(e, createjs.AbstractPlugin),
        i = e;
    i.MAX_INSTANCES = 30, i._AUDIO_READY = "canplaythrough", i._AUDIO_ENDED = "ended", i._AUDIO_SEEKED = "seeked", i._AUDIO_STALLED = "stalled", i._TIME_UPDATE = "timeupdate", i._capabilities = null, i.isSupported = function() {
        return i._generateCapabilities(), null != i._capabilities
    }, i._generateCapabilities = function() {
        if (null == i._capabilities) {
            var e = document.createElement("audio");
            if (null == e.canPlayType) return null;
            i._capabilities = {
                panning: !1,
                volume: !0,
                tracks: -1
            };
            for (var t = createjs.Sound.SUPPORTED_EXTENSIONS, r = createjs.Sound.EXTENSION_MAP, s = 0, a = t.length; a > s; s++) {
                var n = t[s],
                    o = r[n] || n;
                i._capabilities[n] = "no" != e.canPlayType("audio/" + n) && "" != e.canPlayType("audio/" + n) || "no" != e.canPlayType("audio/" + o) && "" != e.canPlayType("audio/" + o)
            }
        }
    }, t.register = function(e) {
        var t = createjs.HTMLAudioTagPool.get(e.src),
            i = this.AbstractPlugin_register(e);
        return i.setTag(t), i
    }, t.removeSound = function(e) {
        this.AbstractPlugin_removeSound(e), createjs.HTMLAudioTagPool.remove(e)
    }, t.create = function(e, t, i) {
        var r = this.AbstractPlugin_create(e, t, i);
        return r.setPlaybackResource(null), r
    }, t.toString = function() {
        return "[HTMLAudioPlugin]"
    }, t.setVolume = t.getVolume = t.setMute = null, createjs.HTMLAudioPlugin = createjs.promote(e, "AbstractPlugin")
}();
var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;
(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function() {
    "use strict";
    _gsScope._gsDefine("TweenMax", ["core.Animation", "core.SimpleTimeline", "TweenLite"], function(e, t, i) {
        var r = function(e) {
                var t, i = [],
                    r = e.length;
                for (t = 0; t !== r; i.push(e[t++]));
                return i
            },
            s = function(e, t, i) {
                var r, s, a = e.cycle;
                for (r in a) s = a[r], e[r] = "function" == typeof s ? s.call(t[i], i) : s[i % s.length];
                delete e.cycle
            },
            a = function(e, t, r) {
                i.call(this, e, t, r), this._cycle = 0, this._yoyo = this.vars.yoyo === !0, this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._dirty = !0, this.render = a.prototype.render
            },
            n = 1e-10,
            o = i._internals,
            l = o.isSelector,
            c = o.isArray,
            u = a.prototype = i.to({}, .1, {}),
            _ = [];
        a.version = "1.18.5", u.constructor = a, u.kill()._gc = !1, a.killTweensOf = a.killDelayedCallsTo = i.killTweensOf, a.getTweensOf = i.getTweensOf, a.lagSmoothing = i.lagSmoothing, a.ticker = i.ticker, a.render = i.render, u.invalidate = function() {
            return this._yoyo = this.vars.yoyo === !0, this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._uncache(!0), i.prototype.invalidate.call(this)
        }, u.updateTo = function(e, t) {
            var r, s = this.ratio,
                a = this.vars.immediateRender || e.immediateRender;
            t && this._startTime < this._timeline._time && (this._startTime = this._timeline._time, this._uncache(!1), this._gc ? this._enabled(!0, !1) : this._timeline.insert(this, this._startTime - this._delay));
            for (r in e) this.vars[r] = e[r];
            if (this._initted || a)
                if (t) this._initted = !1, a && this.render(0, !0, !0);
                else if (this._gc && this._enabled(!0, !1), this._notifyPluginsOfEnabled && this._firstPT && i._onPluginEvent("_onDisable", this), this._time / this._duration > .998) {
                    var n = this._totalTime;
                    this.render(0, !0, !1), this._initted = !1, this.render(n, !0, !1)
                } else if (this._initted = !1, this._init(), this._time > 0 || a)
                    for (var o, l = 1 / (1 - s), c = this._firstPT; c;) o = c.s + c.c, c.c *= l, c.s = o - c.c, c = c._next;
            return this
        }, u.render = function(e, t, i) {
            this._initted || 0 === this._duration && this.vars.repeat && this.invalidate();
            var r, s, a, l, c, u, _, h, d = this._dirty ? this.totalDuration() : this._totalDuration,
                p = this._time,
                f = this._totalTime,
                x = this._cycle,
                m = this._duration,
                y = this._rawPrevTime;
            if (e >= d - 1e-7 ? (this._totalTime = d, this._cycle = this._repeat, this._yoyo && 0 !== (1 & this._cycle) ? (this._time = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0) : (this._time = m, this.ratio = this._ease._calcEnd ? this._ease.getRatio(1) : 1), this._reversed || (r = !0, s = "onComplete", i = i || this._timeline.autoRemoveChildren), 0 === m && (this._initted || !this.vars.lazy || i) && (this._startTime === this._timeline._duration && (e = 0), (0 > y || 0 >= e && e >= -1e-7 || y === n && "isPause" !== this.data) && y !== e && (i = !0, y > n && (s = "onReverseComplete")), this._rawPrevTime = h = !t || e || y === e ? e : n)) : 1e-7 > e ? (this._totalTime = this._time = this._cycle = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0, (0 !== f || 0 === m && y > 0) && (s = "onReverseComplete", r = this._reversed), 0 > e && (this._active = !1, 0 === m && (this._initted || !this.vars.lazy || i) && (y >= 0 && (i = !0), this._rawPrevTime = h = !t || e || y === e ? e : n)), this._initted || (i = !0)) : (this._totalTime = this._time = e, 0 !== this._repeat && (l = m + this._repeatDelay, this._cycle = this._totalTime / l >> 0, 0 !== this._cycle && this._cycle === this._totalTime / l && e >= f && this._cycle--, this._time = this._totalTime - this._cycle * l, this._yoyo && 0 !== (1 & this._cycle) && (this._time = m - this._time), this._time > m ? this._time = m : this._time < 0 && (this._time = 0)), this._easeType ? (c = this._time / m, u = this._easeType, _ = this._easePower, (1 === u || 3 === u && c >= .5) && (c = 1 - c), 3 === u && (c *= 2), 1 === _ ? c *= c : 2 === _ ? c *= c * c : 3 === _ ? c *= c * c * c : 4 === _ && (c *= c * c * c * c), 1 === u ? this.ratio = 1 - c : 2 === u ? this.ratio = c : this._time / m < .5 ? this.ratio = c / 2 : this.ratio = 1 - c / 2) : this.ratio = this._ease.getRatio(this._time / m)), p === this._time && !i && x === this._cycle) return void(f !== this._totalTime && this._onUpdate && (t || this._callback("onUpdate")));
            if (!this._initted) {
                if (this._init(), !this._initted || this._gc) return;
                if (!i && this._firstPT && (this.vars.lazy !== !1 && this._duration || this.vars.lazy && !this._duration)) return this._time = p, this._totalTime = f, this._rawPrevTime = y, this._cycle = x, o.lazyTweens.push(this), void(this._lazy = [e, t]);
                this._time && !r ? this.ratio = this._ease.getRatio(this._time / m) : r && this._ease._calcEnd && (this.ratio = this._ease.getRatio(0 === this._time ? 0 : 1))
            }
            for (this._lazy !== !1 && (this._lazy = !1), this._active || !this._paused && this._time !== p && e >= 0 && (this._active = !0), 0 === f && (2 === this._initted && e > 0 && this._init(), this._startAt && (e >= 0 ? this._startAt.render(e, t, i) : s || (s = "_dummyGS")), this.vars.onStart && (0 !== this._totalTime || 0 === m) && (t || this._callback("onStart"))), a = this._firstPT; a;) a.f ? a.t[a.p](a.c * this.ratio + a.s) : a.t[a.p] = a.c * this.ratio + a.s, a = a._next;
            this._onUpdate && (0 > e && this._startAt && this._startTime && this._startAt.render(e, t, i), t || (this._totalTime !== f || s) && this._callback("onUpdate")), this._cycle !== x && (t || this._gc || this.vars.onRepeat && this._callback("onRepeat")), s && (!this._gc || i) && (0 > e && this._startAt && !this._onUpdate && this._startTime && this._startAt.render(e, t, i), r && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[s] && this._callback(s), 0 === m && this._rawPrevTime === n && h !== n && (this._rawPrevTime = 0))
        }, a.to = function(e, t, i) {
            return new a(e, t, i)
        }, a.from = function(e, t, i) {
            return i.runBackwards = !0, i.immediateRender = 0 != i.immediateRender, new a(e, t, i)
        }, a.fromTo = function(e, t, i, r) {
            return r.startAt = i, r.immediateRender = 0 != r.immediateRender && 0 != i.immediateRender, new a(e, t, r)
        }, a.staggerTo = a.allTo = function(e, t, n, o, u, h, d) {
            o = o || 0;
            var p, f, x, m, y = 0,
                v = [],
                g = function() {
                    n.onComplete && n.onComplete.apply(n.onCompleteScope || this, arguments), u.apply(d || n.callbackScope || this, h || _)
                },
                b = n.cycle,
                T = n.startAt && n.startAt.cycle;
            for (c(e) || ("string" == typeof e && (e = i.selector(e) || e), l(e) && (e = r(e))), e = e || [], 0 > o && (e = r(e), e.reverse(), o *= -1), p = e.length - 1, x = 0; p >= x; x++) {
                f = {};
                for (m in n) f[m] = n[m];
                if (b && (s(f, e, x), null != f.duration && (t = f.duration, delete f.duration)), T) {
                    T = f.startAt = {};
                    for (m in n.startAt) T[m] = n.startAt[m];
                    s(f.startAt, e, x)
                }
                f.delay = y + (f.delay || 0), x === p && u && (f.onComplete = g), v[x] = new a(e[x], t, f), y += o
            }
            return v
        }, a.staggerFrom = a.allFrom = function(e, t, i, r, s, n, o) {
            return i.runBackwards = !0, i.immediateRender = 0 != i.immediateRender, a.staggerTo(e, t, i, r, s, n, o)
        }, a.staggerFromTo = a.allFromTo = function(e, t, i, r, s, n, o, l) {
            return r.startAt = i, r.immediateRender = 0 != r.immediateRender && 0 != i.immediateRender, a.staggerTo(e, t, r, s, n, o, l)
        }, a.delayedCall = function(e, t, i, r, s) {
            return new a(t, 0, {
                delay: e,
                onComplete: t,
                onCompleteParams: i,
                callbackScope: r,
                onReverseComplete: t,
                onReverseCompleteParams: i,
                immediateRender: !1,
                useFrames: s,
                overwrite: 0
            })
        }, a.set = function(e, t) {
            return new a(e, 0, t)
        }, a.isTweening = function(e) {
            return i.getTweensOf(e, !0).length > 0
        };
        var h = function(e, t) {
                for (var r = [], s = 0, a = e._first; a;) a instanceof i ? r[s++] = a : (t && (r[s++] = a), r = r.concat(h(a, t)), s = r.length), a = a._next;
                return r
            },
            d = a.getAllTweens = function(t) {
                return h(e._rootTimeline, t).concat(h(e._rootFramesTimeline, t))
            };
        a.killAll = function(e, i, r, s) {
            null == i && (i = !0), null == r && (r = !0);
            var a, n, o, l = d(0 != s),
                c = l.length,
                u = i && r && s;
            for (o = 0; c > o; o++) n = l[o], (u || n instanceof t || (a = n.target === n.vars.onComplete) && r || i && !a) && (e ? n.totalTime(n._reversed ? 0 : n.totalDuration()) : n._enabled(!1, !1))
        }, a.killChildTweensOf = function(e, t) {
            if (null != e) {
                var s, n, u, _, h, d = o.tweenLookup;
                if ("string" == typeof e && (e = i.selector(e) || e), l(e) && (e = r(e)), c(e))
                    for (_ = e.length; --_ > -1;) a.killChildTweensOf(e[_], t);
                else {
                    s = [];
                    for (u in d)
                        for (n = d[u].target.parentNode; n;) n === e && (s = s.concat(d[u].tweens)), n = n.parentNode;
                    for (h = s.length, _ = 0; h > _; _++) t && s[_].totalTime(s[_].totalDuration()), s[_]._enabled(!1, !1)
                }
            }
        };
        var p = function(e, i, r, s) {
            i = i !== !1, r = r !== !1, s = s !== !1;
            for (var a, n, o = d(s), l = i && r && s, c = o.length; --c > -1;) n = o[c], (l || n instanceof t || (a = n.target === n.vars.onComplete) && r || i && !a) && n.paused(e)
        };
        return a.pauseAll = function(e, t, i) {
            p(!0, e, t, i)
        }, a.resumeAll = function(e, t, i) {
            p(!1, e, t, i)
        }, a.globalTimeScale = function(t) {
            var r = e._rootTimeline,
                s = i.ticker.time;
            return arguments.length ? (t = t || n, r._startTime = s - (s - r._startTime) * r._timeScale / t, r = e._rootFramesTimeline, s = i.ticker.frame, r._startTime = s - (s - r._startTime) * r._timeScale / t, r._timeScale = e._rootTimeline._timeScale = t, t) : r._timeScale
        }, u.progress = function(e, t) {
            return arguments.length ? this.totalTime(this.duration() * (this._yoyo && 0 !== (1 & this._cycle) ? 1 - e : e) + this._cycle * (this._duration + this._repeatDelay), t) : this._time / this.duration()
        }, u.totalProgress = function(e, t) {
            return arguments.length ? this.totalTime(this.totalDuration() * e, t) : this._totalTime / this.totalDuration()
        }, u.time = function(e, t) {
            return arguments.length ? (this._dirty && this.totalDuration(), e > this._duration && (e = this._duration), this._yoyo && 0 !== (1 & this._cycle) ? e = this._duration - e + this._cycle * (this._duration + this._repeatDelay) : 0 !== this._repeat && (e += this._cycle * (this._duration + this._repeatDelay)), this.totalTime(e, t)) : this._time
        }, u.duration = function(t) {
            return arguments.length ? e.prototype.duration.call(this, t) : this._duration
        }, u.totalDuration = function(e) {
            return arguments.length ? -1 === this._repeat ? this : this.duration((e - this._repeat * this._repeatDelay) / (this._repeat + 1)) : (this._dirty && (this._totalDuration = -1 === this._repeat ? 999999999999 : this._duration * (this._repeat + 1) + this._repeatDelay * this._repeat, this._dirty = !1), this._totalDuration)
        }, u.repeat = function(e) {
            return arguments.length ? (this._repeat = e, this._uncache(!0)) : this._repeat
        }, u.repeatDelay = function(e) {
            return arguments.length ? (this._repeatDelay = e, this._uncache(!0)) : this._repeatDelay
        }, u.yoyo = function(e) {
            return arguments.length ? (this._yoyo = e, this) : this._yoyo
        }, a
    }, !0), _gsScope._gsDefine("TimelineLite", ["core.Animation", "core.SimpleTimeline", "TweenLite"], function(e, t, i) {
        var r = function(e) {
                t.call(this, e), this._labels = {}, this.autoRemoveChildren = this.vars.autoRemoveChildren === !0, this.smoothChildTiming = this.vars.smoothChildTiming === !0, this._sortChildren = !0, this._onUpdate = this.vars.onUpdate;
                var i, r, s = this.vars;
                for (r in s) i = s[r], l(i) && -1 !== i.join("").indexOf("{self}") && (s[r] = this._swapSelfInParams(i));
                l(s.tweens) && this.add(s.tweens, 0, s.align, s.stagger)
            },
            s = 1e-10,
            a = i._internals,
            n = r._internals = {},
            o = a.isSelector,
            l = a.isArray,
            c = a.lazyTweens,
            u = a.lazyRender,
            _ = _gsScope._gsDefine.globals,
            h = function(e) {
                var t, i = {};
                for (t in e) i[t] = e[t];
                return i
            },
            d = function(e, t, i) {
                var r, s, a = e.cycle;
                for (r in a) s = a[r], e[r] = "function" == typeof s ? s.call(t[i], i) : s[i % s.length];
                delete e.cycle
            },
            p = n.pauseCallback = function() {},
            f = function(e) {
                var t, i = [],
                    r = e.length;
                for (t = 0; t !== r; i.push(e[t++]));
                return i
            },
            x = r.prototype = new t;
        return r.version = "1.18.5", x.constructor = r, x.kill()._gc = x._forcingPlayhead = x._hasPause = !1, x.to = function(e, t, r, s) {
            var a = r.repeat && _.TweenMax || i;
            return t ? this.add(new a(e, t, r), s) : this.set(e, r, s)
        }, x.from = function(e, t, r, s) {
            return this.add((r.repeat && _.TweenMax || i).from(e, t, r), s)
        }, x.fromTo = function(e, t, r, s, a) {
            var n = s.repeat && _.TweenMax || i;
            return t ? this.add(n.fromTo(e, t, r, s), a) : this.set(e, s, a)
        }, x.staggerTo = function(e, t, s, a, n, l, c, u) {
            var _, p, x = new r({
                    onComplete: l,
                    onCompleteParams: c,
                    callbackScope: u,
                    smoothChildTiming: this.smoothChildTiming
                }),
                m = s.cycle;
            for ("string" == typeof e && (e = i.selector(e) || e), e = e || [], o(e) && (e = f(e)), a = a || 0, 0 > a && (e = f(e), e.reverse(), a *= -1), p = 0; p < e.length; p++) _ = h(s), _.startAt && (_.startAt = h(_.startAt), _.startAt.cycle && d(_.startAt, e, p)), m && (d(_, e, p), null != _.duration && (t = _.duration, delete _.duration)), x.to(e[p], t, _, p * a);
            return this.add(x, n)
        }, x.staggerFrom = function(e, t, i, r, s, a, n, o) {
            return i.immediateRender = 0 != i.immediateRender, i.runBackwards = !0, this.staggerTo(e, t, i, r, s, a, n, o)
        }, x.staggerFromTo = function(e, t, i, r, s, a, n, o, l) {
            return r.startAt = i, r.immediateRender = 0 != r.immediateRender && 0 != i.immediateRender, this.staggerTo(e, t, r, s, a, n, o, l)
        }, x.call = function(e, t, r, s) {
            return this.add(i.delayedCall(0, e, t, r), s)
        }, x.set = function(e, t, r) {
            return r = this._parseTimeOrLabel(r, 0, !0), null == t.immediateRender && (t.immediateRender = r === this._time && !this._paused), this.add(new i(e, 0, t), r)
        }, r.exportRoot = function(e, t) {
            e = e || {}, null == e.smoothChildTiming && (e.smoothChildTiming = !0);
            var s, a, n = new r(e),
                o = n._timeline;
            for (null == t && (t = !0), o._remove(n, !0), n._startTime = 0, n._rawPrevTime = n._time = n._totalTime = o._time, s = o._first; s;) a = s._next, t && s instanceof i && s.target === s.vars.onComplete || n.add(s, s._startTime - s._delay), s = a;
            return o.add(n, 0), n
        }, x.add = function(s, a, n, o) {
            var c, u, _, h, d, p;
            if ("number" != typeof a && (a = this._parseTimeOrLabel(a, 0, !0, s)), !(s instanceof e)) {
                if (s instanceof Array || s && s.push && l(s)) {
                    for (n = n || "normal", o = o || 0, c = a, u = s.length, _ = 0; u > _; _++) l(h = s[_]) && (h = new r({
                        tweens: h
                    })), this.add(h, c), "string" != typeof h && "function" != typeof h && ("sequence" === n ? c = h._startTime + h.totalDuration() / h._timeScale : "start" === n && (h._startTime -= h.delay())), c += o;
                    return this._uncache(!0)
                }
                if ("string" == typeof s) return this.addLabel(s, a);
                if ("function" != typeof s) throw "Cannot add " + s + " into the timeline; it is not a tween, timeline, function, or string.";
                s = i.delayedCall(0, s)
            }
            if (t.prototype.add.call(this, s, a), (this._gc || this._time === this._duration) && !this._paused && this._duration < this.duration())
                for (d = this, p = d.rawTime() > s._startTime; d._timeline;) p && d._timeline.smoothChildTiming ? d.totalTime(d._totalTime, !0) : d._gc && d._enabled(!0, !1), d = d._timeline;
            return this
        }, x.remove = function(t) {
            if (t instanceof e) {
                this._remove(t, !1);
                var i = t._timeline = t.vars.useFrames ? e._rootFramesTimeline : e._rootTimeline;
                return t._startTime = (t._paused ? t._pauseTime : i._time) - (t._reversed ? t.totalDuration() - t._totalTime : t._totalTime) / t._timeScale, this
            }
            if (t instanceof Array || t && t.push && l(t)) {
                for (var r = t.length; --r > -1;) this.remove(t[r]);
                return this
            }
            return "string" == typeof t ? this.removeLabel(t) : this.kill(null, t)
        }, x._remove = function(e, i) {
            t.prototype._remove.call(this, e, i);
            var r = this._last;
            return r ? this._time > r._startTime + r._totalDuration / r._timeScale && (this._time = this.duration(), this._totalTime = this._totalDuration) : this._time = this._totalTime = this._duration = this._totalDuration = 0, this
        }, x.append = function(e, t) {
            return this.add(e, this._parseTimeOrLabel(null, t, !0, e))
        }, x.insert = x.insertMultiple = function(e, t, i, r) {
            return this.add(e, t || 0, i, r)
        }, x.appendMultiple = function(e, t, i, r) {
            return this.add(e, this._parseTimeOrLabel(null, t, !0, e), i, r)
        }, x.addLabel = function(e, t) {
            return this._labels[e] = this._parseTimeOrLabel(t), this
        }, x.addPause = function(e, t, r, s) {
            var a = i.delayedCall(0, p, r, s || this);
            return a.vars.onComplete = a.vars.onReverseComplete = t, a.data = "isPause", this._hasPause = !0, this.add(a, e)
        }, x.removeLabel = function(e) {
            return delete this._labels[e], this
        }, x.getLabelTime = function(e) {
            return null != this._labels[e] ? this._labels[e] : -1
        }, x._parseTimeOrLabel = function(t, i, r, s) {
            var a;
            if (s instanceof e && s.timeline === this) this.remove(s);
            else if (s && (s instanceof Array || s.push && l(s)))
                for (a = s.length; --a > -1;) s[a] instanceof e && s[a].timeline === this && this.remove(s[a]);
            if ("string" == typeof i) return this._parseTimeOrLabel(i, r && "number" == typeof t && null == this._labels[i] ? t - this.duration() : 0, r);
            if (i = i || 0, "string" != typeof t || !isNaN(t) && null == this._labels[t]) null == t && (t = this.duration());
            else {
                if (a = t.indexOf("="), -1 === a) return null == this._labels[t] ? r ? this._labels[t] = this.duration() + i : i : this._labels[t] + i;
                i = parseInt(t.charAt(a - 1) + "1", 10) * Number(t.substr(a + 1)), t = a > 1 ? this._parseTimeOrLabel(t.substr(0, a - 1), 0, r) : this.duration()
            }
            return Number(t) + i
        }, x.seek = function(e, t) {
            return this.totalTime("number" == typeof e ? e : this._parseTimeOrLabel(e), t !== !1)
        }, x.stop = function() {
            return this.paused(!0)
        }, x.gotoAndPlay = function(e, t) {
            return this.play(e, t)
        }, x.gotoAndStop = function(e, t) {
            return this.pause(e, t)
        }, x.render = function(e, t, i) {
            this._gc && this._enabled(!0, !1);
            var r, a, n, o, l, _, h, d = this._dirty ? this.totalDuration() : this._totalDuration,
                p = this._time,
                f = this._startTime,
                x = this._timeScale,
                m = this._paused;
            if (e >= d - 1e-7) this._totalTime = this._time = d, this._reversed || this._hasPausedChild() || (a = !0, o = "onComplete", l = !!this._timeline.autoRemoveChildren, 0 === this._duration && (0 >= e && e >= -1e-7 || this._rawPrevTime < 0 || this._rawPrevTime === s) && this._rawPrevTime !== e && this._first && (l = !0, this._rawPrevTime > s && (o = "onReverseComplete"))), this._rawPrevTime = this._duration || !t || e || this._rawPrevTime === e ? e : s, e = d + 1e-4;
            else if (1e-7 > e)
                if (this._totalTime = this._time = 0, (0 !== p || 0 === this._duration && this._rawPrevTime !== s && (this._rawPrevTime > 0 || 0 > e && this._rawPrevTime >= 0)) && (o = "onReverseComplete", a = this._reversed), 0 > e) this._active = !1, this._timeline.autoRemoveChildren && this._reversed ? (l = a = !0, o = "onReverseComplete") : this._rawPrevTime >= 0 && this._first && (l = !0), this._rawPrevTime = e;
                else {
                    if (this._rawPrevTime = this._duration || !t || e || this._rawPrevTime === e ? e : s, 0 === e && a)
                        for (r = this._first; r && 0 === r._startTime;) r._duration || (a = !1), r = r._next;
                    e = 0, this._initted || (l = !0)
                }
            else {
                if (this._hasPause && !this._forcingPlayhead && !t) {
                    if (e >= p)
                        for (r = this._first; r && r._startTime <= e && !_;) r._duration || "isPause" !== r.data || r.ratio || 0 === r._startTime && 0 === this._rawPrevTime || (_ = r), r = r._next;
                    else
                        for (r = this._last; r && r._startTime >= e && !_;) r._duration || "isPause" === r.data && r._rawPrevTime > 0 && (_ = r), r = r._prev;
                    _ && (this._time = e = _._startTime, this._totalTime = e + this._cycle * (this._totalDuration + this._repeatDelay))
                }
                this._totalTime = this._time = this._rawPrevTime = e
            }
            if (this._time !== p && this._first || i || l || _) {
                if (this._initted || (this._initted = !0), this._active || !this._paused && this._time !== p && e > 0 && (this._active = !0), 0 === p && this.vars.onStart && (0 === this._time && this._duration || t || this._callback("onStart")), h = this._time, h >= p)
                    for (r = this._first; r && (n = r._next, h === this._time && (!this._paused || m));)(r._active || r._startTime <= h && !r._paused && !r._gc) && (_ === r && this.pause(), r._reversed ? r.render((r._dirty ? r.totalDuration() : r._totalDuration) - (e - r._startTime) * r._timeScale, t, i) : r.render((e - r._startTime) * r._timeScale, t, i)), r = n;
                else
                    for (r = this._last; r && (n = r._prev, h === this._time && (!this._paused || m));) {
                        if (r._active || r._startTime <= p && !r._paused && !r._gc) {
                            if (_ === r) {
                                for (_ = r._prev; _ && _.endTime() > this._time;) _.render(_._reversed ? _.totalDuration() - (e - _._startTime) * _._timeScale : (e - _._startTime) * _._timeScale, t, i), _ = _._prev;
                                _ = null, this.pause()
                            }
                            r._reversed ? r.render((r._dirty ? r.totalDuration() : r._totalDuration) - (e - r._startTime) * r._timeScale, t, i) : r.render((e - r._startTime) * r._timeScale, t, i)
                        }
                        r = n
                    }
                this._onUpdate && (t || (c.length && u(), this._callback("onUpdate"))), o && (this._gc || (f === this._startTime || x !== this._timeScale) && (0 === this._time || d >= this.totalDuration()) && (a && (c.length && u(), this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[o] && this._callback(o)))
            }
        }, x._hasPausedChild = function() {
            for (var e = this._first; e;) {
                if (e._paused || e instanceof r && e._hasPausedChild()) return !0;
                e = e._next
            }
            return !1
        }, x.getChildren = function(e, t, r, s) {
            s = s || -9999999999;
            for (var a = [], n = this._first, o = 0; n;) n._startTime < s || (n instanceof i ? t !== !1 && (a[o++] = n) : (r !== !1 && (a[o++] = n), e !== !1 && (a = a.concat(n.getChildren(!0, t, r)), o = a.length))), n = n._next;
            return a
        }, x.getTweensOf = function(e, t) {
            var r, s, a = this._gc,
                n = [],
                o = 0;
            for (a && this._enabled(!0, !0), r = i.getTweensOf(e), s = r.length; --s > -1;)(r[s].timeline === this || t && this._contains(r[s])) && (n[o++] = r[s]);
            return a && this._enabled(!1, !0), n
        }, x.recent = function() {
            return this._recent
        }, x._contains = function(e) {
            for (var t = e.timeline; t;) {
                if (t === this) return !0;
                t = t.timeline
            }
            return !1
        }, x.shiftChildren = function(e, t, i) {
            i = i || 0;
            for (var r, s = this._first, a = this._labels; s;) s._startTime >= i && (s._startTime += e), s = s._next;
            if (t)
                for (r in a) a[r] >= i && (a[r] += e);
            return this._uncache(!0)
        }, x._kill = function(e, t) {
            if (!e && !t) return this._enabled(!1, !1);
            for (var i = t ? this.getTweensOf(t) : this.getChildren(!0, !0, !1), r = i.length, s = !1; --r > -1;) i[r]._kill(e, t) && (s = !0);
            return s
        }, x.clear = function(e) {
            var t = this.getChildren(!1, !0, !0),
                i = t.length;
            for (this._time = this._totalTime = 0; --i > -1;) t[i]._enabled(!1, !1);
            return e !== !1 && (this._labels = {}), this._uncache(!0)
        }, x.invalidate = function() {
            for (var t = this._first; t;) t.invalidate(), t = t._next;
            return e.prototype.invalidate.call(this)
        }, x._enabled = function(e, i) {
            if (e === this._gc)
                for (var r = this._first; r;) r._enabled(e, !0), r = r._next;
            return t.prototype._enabled.call(this, e, i)
        }, x.totalTime = function(t, i, r) {
            this._forcingPlayhead = !0;
            var s = e.prototype.totalTime.apply(this, arguments);
            return this._forcingPlayhead = !1, s
        }, x.duration = function(e) {
            return arguments.length ? (0 !== this.duration() && 0 !== e && this.timeScale(this._duration / e), this) : (this._dirty && this.totalDuration(), this._duration)
        }, x.totalDuration = function(e) {
            if (!arguments.length) {
                if (this._dirty) {
                    for (var t, i, r = 0, s = this._last, a = 999999999999; s;) t = s._prev, s._dirty && s.totalDuration(), s._startTime > a && this._sortChildren && !s._paused ? this.add(s, s._startTime - s._delay) : a = s._startTime, s._startTime < 0 && !s._paused && (r -= s._startTime, this._timeline.smoothChildTiming && (this._startTime += s._startTime / this._timeScale), this.shiftChildren(-s._startTime, !1, -9999999999), a = 0), i = s._startTime + s._totalDuration / s._timeScale, i > r && (r = i), s = t;
                    this._duration = this._totalDuration = r, this._dirty = !1
                }
                return this._totalDuration
            }
            return e && this.totalDuration() ? this.timeScale(this._totalDuration / e) : this
        }, x.paused = function(t) {
            if (!t)
                for (var i = this._first, r = this._time; i;) i._startTime === r && "isPause" === i.data && (i._rawPrevTime = 0), i = i._next;
            return e.prototype.paused.apply(this, arguments)
        }, x.usesFrames = function() {
            for (var t = this._timeline; t._timeline;) t = t._timeline;
            return t === e._rootFramesTimeline
        }, x.rawTime = function() {
            return this._paused ? this._totalTime : (this._timeline.rawTime() - this._startTime) * this._timeScale
        }, r
    }, !0), _gsScope._gsDefine("TimelineMax", ["TimelineLite", "TweenLite", "easing.Ease"], function(e, t, i) {
        var r = function(t) {
                e.call(this, t), this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._cycle = 0, this._yoyo = this.vars.yoyo === !0, this._dirty = !0
            },
            s = 1e-10,
            a = t._internals,
            n = a.lazyTweens,
            o = a.lazyRender,
            l = new i(null, null, 1, 0),
            c = r.prototype = new e;
        return c.constructor = r, c.kill()._gc = !1, r.version = "1.18.5", c.invalidate = function() {
            return this._yoyo = this.vars.yoyo === !0, this._repeat = this.vars.repeat || 0, this._repeatDelay = this.vars.repeatDelay || 0, this._uncache(!0), e.prototype.invalidate.call(this)
        }, c.addCallback = function(e, i, r, s) {
            return this.add(t.delayedCall(0, e, r, s), i)
        }, c.removeCallback = function(e, t) {
            if (e)
                if (null == t) this._kill(null, e);
                else
                    for (var i = this.getTweensOf(e, !1), r = i.length, s = this._parseTimeOrLabel(t); --r > -1;) i[r]._startTime === s && i[r]._enabled(!1, !1);
            return this
        }, c.removePause = function(t) {
            return this.removeCallback(e._internals.pauseCallback, t)
        }, c.tweenTo = function(e, i) {
            i = i || {};
            var r, s, a, n = {
                ease: l,
                useFrames: this.usesFrames(),
                immediateRender: !1
            };
            for (s in i) n[s] = i[s];
            return n.time = this._parseTimeOrLabel(e), r = Math.abs(Number(n.time) - this._time) / this._timeScale || .001, a = new t(this, r, n), n.onStart = function() {
                a.target.paused(!0), a.vars.time !== a.target.time() && r === a.duration() && a.duration(Math.abs(a.vars.time - a.target.time()) / a.target._timeScale), i.onStart && a._callback("onStart")
            }, a
        }, c.tweenFromTo = function(e, t, i) {
            i = i || {}, e = this._parseTimeOrLabel(e), i.startAt = {
                onComplete: this.seek,
                onCompleteParams: [e],
                callbackScope: this
            }, i.immediateRender = i.immediateRender !== !1;
            var r = this.tweenTo(t, i);
            return r.duration(Math.abs(r.vars.time - e) / this._timeScale || .001)
        }, c.render = function(e, t, i) {
            this._gc && this._enabled(!0, !1);
            var r, a, l, c, u, _, h, d, p = this._dirty ? this.totalDuration() : this._totalDuration,
                f = this._duration,
                x = this._time,
                m = this._totalTime,
                y = this._startTime,
                v = this._timeScale,
                g = this._rawPrevTime,
                b = this._paused,
                T = this._cycle;
            if (e >= p - 1e-7) this._locked || (this._totalTime = p, this._cycle = this._repeat), this._reversed || this._hasPausedChild() || (a = !0, c = "onComplete", u = !!this._timeline.autoRemoveChildren, 0 === this._duration && (0 >= e && e >= -1e-7 || 0 > g || g === s) && g !== e && this._first && (u = !0, g > s && (c = "onReverseComplete"))), this._rawPrevTime = this._duration || !t || e || this._rawPrevTime === e ? e : s, this._yoyo && 0 !== (1 & this._cycle) ? this._time = e = 0 : (this._time = f, e = f + 1e-4);
            else if (1e-7 > e)
                if (this._locked || (this._totalTime = this._cycle = 0), this._time = 0, (0 !== x || 0 === f && g !== s && (g > 0 || 0 > e && g >= 0) && !this._locked) && (c = "onReverseComplete", a = this._reversed), 0 > e) this._active = !1, this._timeline.autoRemoveChildren && this._reversed ? (u = a = !0, c = "onReverseComplete") : g >= 0 && this._first && (u = !0), this._rawPrevTime = e;
                else {
                    if (this._rawPrevTime = f || !t || e || this._rawPrevTime === e ? e : s, 0 === e && a)
                        for (r = this._first; r && 0 === r._startTime;) r._duration || (a = !1), r = r._next;
                    e = 0, this._initted || (u = !0)
                }
            else if (0 === f && 0 > g && (u = !0), this._time = this._rawPrevTime = e, this._locked || (this._totalTime = e, 0 !== this._repeat && (_ = f + this._repeatDelay, this._cycle = this._totalTime / _ >> 0, 0 !== this._cycle && this._cycle === this._totalTime / _ && e >= m && this._cycle--, this._time = this._totalTime - this._cycle * _, this._yoyo && 0 !== (1 & this._cycle) && (this._time = f - this._time), this._time > f ? (this._time = f, e = f + 1e-4) : this._time < 0 ? this._time = e = 0 : e = this._time)), this._hasPause && !this._forcingPlayhead && !t) {
                if (e = this._time, e >= x)
                    for (r = this._first; r && r._startTime <= e && !h;) r._duration || "isPause" !== r.data || r.ratio || 0 === r._startTime && 0 === this._rawPrevTime || (h = r), r = r._next;
                else
                    for (r = this._last; r && r._startTime >= e && !h;) r._duration || "isPause" === r.data && r._rawPrevTime > 0 && (h = r), r = r._prev;
                h && (this._time = e = h._startTime, this._totalTime = e + this._cycle * (this._totalDuration + this._repeatDelay))
            }
            if (this._cycle !== T && !this._locked) {
                var P = this._yoyo && 0 !== (1 & T),
                    w = P === (this._yoyo && 0 !== (1 & this._cycle)),
                    j = this._totalTime,
                    S = this._cycle,
                    A = this._rawPrevTime,
                    E = this._time;
                if (this._totalTime = T * f, this._cycle < T ? P = !P : this._totalTime += f, this._time = x, this._rawPrevTime = 0 === f ? g - 1e-4 : g, this._cycle = T, this._locked = !0, x = P ? 0 : f, this.render(x, t, 0 === f), t || this._gc || this.vars.onRepeat && this._callback("onRepeat"), x !== this._time) return;
                if (w && (x = P ? f + 1e-4 : -1e-4, this.render(x, !0, !1)), this._locked = !1, this._paused && !b) return;
                this._time = E, this._totalTime = j, this._cycle = S, this._rawPrevTime = A
            }
            if (!(this._time !== x && this._first || i || u || h)) return void(m !== this._totalTime && this._onUpdate && (t || this._callback("onUpdate")));
            if (this._initted || (this._initted = !0), this._active || !this._paused && this._totalTime !== m && e > 0 && (this._active = !0), 0 === m && this.vars.onStart && (0 === this._totalTime && this._totalDuration || t || this._callback("onStart")), d = this._time, d >= x)
                for (r = this._first; r && (l = r._next, d === this._time && (!this._paused || b));)(r._active || r._startTime <= this._time && !r._paused && !r._gc) && (h === r && this.pause(), r._reversed ? r.render((r._dirty ? r.totalDuration() : r._totalDuration) - (e - r._startTime) * r._timeScale, t, i) : r.render((e - r._startTime) * r._timeScale, t, i)), r = l;
            else
                for (r = this._last; r && (l = r._prev, d === this._time && (!this._paused || b));) {
                    if (r._active || r._startTime <= x && !r._paused && !r._gc) {
                        if (h === r) {
                            for (h = r._prev; h && h.endTime() > this._time;) h.render(h._reversed ? h.totalDuration() - (e - h._startTime) * h._timeScale : (e - h._startTime) * h._timeScale, t, i), h = h._prev;
                            h = null, this.pause()
                        }
                        r._reversed ? r.render((r._dirty ? r.totalDuration() : r._totalDuration) - (e - r._startTime) * r._timeScale, t, i) : r.render((e - r._startTime) * r._timeScale, t, i)
                    }
                    r = l
                }
            this._onUpdate && (t || (n.length && o(), this._callback("onUpdate"))), c && (this._locked || this._gc || (y === this._startTime || v !== this._timeScale) && (0 === this._time || p >= this.totalDuration()) && (a && (n.length && o(), this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[c] && this._callback(c)))
        }, c.getActive = function(e, t, i) {
            null == e && (e = !0), null == t && (t = !0), null == i && (i = !1);
            var r, s, a = [],
                n = this.getChildren(e, t, i),
                o = 0,
                l = n.length;
            for (r = 0; l > r; r++) s = n[r], s.isActive() && (a[o++] = s);
            return a
        }, c.getLabelAfter = function(e) {
            e || 0 !== e && (e = this._time);
            var t, i = this.getLabelsArray(),
                r = i.length;
            for (t = 0; r > t; t++)
                if (i[t].time > e) return i[t].name;
            return null
        }, c.getLabelBefore = function(e) {
            null == e && (e = this._time);
            for (var t = this.getLabelsArray(), i = t.length; --i > -1;)
                if (t[i].time < e) return t[i].name;
            return null
        }, c.getLabelsArray = function() {
            var e, t = [],
                i = 0;
            for (e in this._labels) t[i++] = {
                time: this._labels[e],
                name: e
            };
            return t.sort(function(e, t) {
                return e.time - t.time
            }), t
        }, c.progress = function(e, t) {
            return arguments.length ? this.totalTime(this.duration() * (this._yoyo && 0 !== (1 & this._cycle) ? 1 - e : e) + this._cycle * (this._duration + this._repeatDelay), t) : this._time / this.duration()
        }, c.totalProgress = function(e, t) {
            return arguments.length ? this.totalTime(this.totalDuration() * e, t) : this._totalTime / this.totalDuration()
        }, c.totalDuration = function(t) {
            return arguments.length ? -1 !== this._repeat && t ? this.timeScale(this.totalDuration() / t) : this : (this._dirty && (e.prototype.totalDuration.call(this), this._totalDuration = -1 === this._repeat ? 999999999999 : this._duration * (this._repeat + 1) + this._repeatDelay * this._repeat), this._totalDuration)
        }, c.time = function(e, t) {
            return arguments.length ? (this._dirty && this.totalDuration(), e > this._duration && (e = this._duration), this._yoyo && 0 !== (1 & this._cycle) ? e = this._duration - e + this._cycle * (this._duration + this._repeatDelay) : 0 !== this._repeat && (e += this._cycle * (this._duration + this._repeatDelay)), this.totalTime(e, t)) : this._time
        }, c.repeat = function(e) {
            return arguments.length ? (this._repeat = e, this._uncache(!0)) : this._repeat
        }, c.repeatDelay = function(e) {
            return arguments.length ? (this._repeatDelay = e, this._uncache(!0)) : this._repeatDelay
        }, c.yoyo = function(e) {
            return arguments.length ? (this._yoyo = e, this) : this._yoyo
        }, c.currentLabel = function(e) {
            return arguments.length ? this.seek(e, !0) : this.getLabelBefore(this._time + 1e-8)
        }, r
    }, !0),
        function() {
            var e = 180 / Math.PI,
                t = [],
                i = [],
                r = [],
                s = {},
                a = _gsScope._gsDefine.globals,
                n = function(e, t, i, r) {
                    i === r && (i = r - (r - t) / 1e6), e === t && (t = e + (i - e) / 1e6), this.a = e, this.b = t, this.c = i, this.d = r, this.da = r - e, this.ca = i - e, this.ba = t - e
                },
                o = ",x,y,z,left,top,right,bottom,marginTop,marginLeft,marginRight,marginBottom,paddingLeft,paddingTop,paddingRight,paddingBottom,backgroundPosition,backgroundPosition_y,",
                l = function(e, t, i, r) {
                    var s = {
                            a: e
                        },
                        a = {},
                        n = {},
                        o = {
                            c: r
                        },
                        l = (e + t) / 2,
                        c = (t + i) / 2,
                        u = (i + r) / 2,
                        _ = (l + c) / 2,
                        h = (c + u) / 2,
                        d = (h - _) / 8;
                    return s.b = l + (e - l) / 4, a.b = _ + d, s.c = a.a = (s.b + a.b) / 2, a.c = n.a = (_ + h) / 2, n.b = h - d, o.b = u + (r - u) / 4, n.c = o.a = (n.b + o.b) / 2, [s, a, n, o]
                },
                c = function(e, s, a, n, o) {
                    var c, u, _, h, d, p, f, x, m, y, v, g, b, T = e.length - 1,
                        P = 0,
                        w = e[0].a;
                    for (c = 0; T > c; c++) d = e[P], u = d.a, _ = d.d, h = e[P + 1].d, o ? (v = t[c], g = i[c], b = (g + v) * s * .25 / (n ? .5 : r[c] || .5), p = _ - (_ - u) * (n ? .5 * s : 0 !== v ? b / v : 0), f = _ + (h - _) * (n ? .5 * s : 0 !== g ? b / g : 0), x = _ - (p + ((f - p) * (3 * v / (v + g) + .5) / 4 || 0))) : (p = _ - (_ - u) * s * .5, f = _ + (h - _) * s * .5, x = _ - (p + f) / 2), p += x, f += x, d.c = m = p, 0 !== c ? d.b = w : d.b = w = d.a + .6 * (d.c - d.a), d.da = _ - u, d.ca = m - u, d.ba = w - u, a ? (y = l(u, w, m, _), e.splice(P, 1, y[0], y[1], y[2], y[3]), P += 4) : P++, w = f;
                    d = e[P], d.b = w, d.c = w + .4 * (d.d - w), d.da = d.d - d.a, d.ca = d.c - d.a, d.ba = w - d.a, a && (y = l(d.a, w, d.c, d.d), e.splice(P, 1, y[0], y[1], y[2], y[3]))
                },
                u = function(e, r, s, a) {
                    var o, l, c, u, _, h, d = [];
                    if (a)
                        for (e = [a].concat(e), l = e.length; --l > -1;) "string" == typeof(h = e[l][r]) && "=" === h.charAt(1) && (e[l][r] = a[r] + Number(h.charAt(0) + h.substr(2)));
                    if (o = e.length - 2, 0 > o) return d[0] = new n(e[0][r], 0, 0, e[-1 > o ? 0 : 1][r]), d;
                    for (l = 0; o > l; l++) c = e[l][r], u = e[l + 1][r], d[l] = new n(c, 0, 0, u), s && (_ = e[l + 2][r], t[l] = (t[l] || 0) + (u - c) * (u - c), i[l] = (i[l] || 0) + (_ - u) * (_ - u));
                    return d[l] = new n(e[l][r], 0, 0, e[l + 1][r]), d
                },
                _ = function(e, a, n, l, _, h) {
                    var d, p, f, x, m, y, v, g, b = {},
                        T = [],
                        P = h || e[0];
                    _ = "string" == typeof _ ? "," + _ + "," : o, null == a && (a = 1);
                    for (p in e[0]) T.push(p);
                    if (e.length > 1) {
                        for (g = e[e.length - 1], v = !0, d = T.length; --d > -1;)
                            if (p = T[d], Math.abs(P[p] - g[p]) > .05) {
                                v = !1;
                                break
                            } v && (e = e.concat(), h && e.unshift(h), e.push(e[1]), h = e[e.length - 3])
                    }
                    for (t.length = i.length = r.length = 0, d = T.length; --d > -1;) p = T[d], s[p] = -1 !== _.indexOf("," + p + ","), b[p] = u(e, p, s[p], h);
                    for (d = t.length; --d > -1;) t[d] = Math.sqrt(t[d]), i[d] = Math.sqrt(i[d]);
                    if (!l) {
                        for (d = T.length; --d > -1;)
                            if (s[p])
                                for (f = b[T[d]], y = f.length - 1, x = 0; y > x; x++) m = f[x + 1].da / i[x] + f[x].da / t[x] || 0, r[x] = (r[x] || 0) + m * m;
                        for (d = r.length; --d > -1;) r[d] = Math.sqrt(r[d])
                    }
                    for (d = T.length, x = n ? 4 : 1; --d > -1;) p = T[d], f = b[p], c(f, a, n, l, s[p]), v && (f.splice(0, x), f.splice(f.length - x, x));
                    return b
                },
                h = function(e, t, i) {
                    t = t || "soft";
                    var r, s, a, o, l, c, u, _, h, d, p, f = {},
                        x = "cubic" === t ? 3 : 2,
                        m = "soft" === t,
                        y = [];
                    if (m && i && (e = [i].concat(e)), null == e || e.length < x + 1) throw "invalid Bezier data";
                    for (h in e[0]) y.push(h);
                    for (c = y.length; --c > -1;) {
                        for (h = y[c], f[h] = l = [], d = 0, _ = e.length, u = 0; _ > u; u++) r = null == i ? e[u][h] : "string" == typeof(p = e[u][h]) && "=" === p.charAt(1) ? i[h] + Number(p.charAt(0) + p.substr(2)) : Number(p), m && u > 1 && _ - 1 > u && (l[d++] = (r + l[d - 2]) / 2), l[d++] = r;
                        for (_ = d - x + 1, d = 0, u = 0; _ > u; u += x) r = l[u], s = l[u + 1], a = l[u + 2], o = 2 === x ? 0 : l[u + 3], l[d++] = p = 3 === x ? new n(r, s, a, o) : new n(r, (2 * s + r) / 3, (2 * s + a) / 3, a);
                        l.length = d
                    }
                    return f
                },
                d = function(e, t, i) {
                    for (var r, s, a, n, o, l, c, u, _, h, d, p = 1 / i, f = e.length; --f > -1;)
                        for (h = e[f], a = h.a, n = h.d - a, o = h.c - a, l = h.b - a, r = s = 0, u = 1; i >= u; u++) c = p * u, _ = 1 - c, r = s - (s = (c * c * n + 3 * _ * (c * o + _ * l)) * c), d = f * i + u - 1, t[d] = (t[d] || 0) + r * r
                },
                p = function(e, t) {
                    t = t >> 0 || 6;
                    var i, r, s, a, n = [],
                        o = [],
                        l = 0,
                        c = 0,
                        u = t - 1,
                        _ = [],
                        h = [];
                    for (i in e) d(e[i], n, t);
                    for (s = n.length, r = 0; s > r; r++) l += Math.sqrt(n[r]), a = r % t, h[a] = l, a === u && (c += l, a = r / t >> 0, _[a] = h, o[a] = c, l = 0, h = []);
                    return {
                        length: c,
                        lengths: o,
                        segments: _
                    }
                },
                f = _gsScope._gsDefine.plugin({
                    propName: "bezier",
                    priority: -1,
                    version: "1.3.6",
                    API: 2,
                    global: !0,
                    init: function(e, t, i) {
                        this._target = e, t instanceof Array && (t = {
                            values: t
                        }), this._func = {}, this._round = {}, this._props = [], this._timeRes = null == t.timeResolution ? 6 : parseInt(t.timeResolution, 10);
                        var r, s, a, n, o, l = t.values || [],
                            c = {},
                            u = l[0],
                            d = t.autoRotate || i.vars.orientToBezier;
                        this._autoRotate = d ? d instanceof Array ? d : [
                            ["x", "y", "rotation", d === !0 ? 0 : Number(d) || 0]
                        ] : null;
                        for (r in u) this._props.push(r);
                        for (a = this._props.length; --a > -1;) r = this._props[a], this._overwriteProps.push(r), s = this._func[r] = "function" == typeof e[r], c[r] = s ? e[r.indexOf("set") || "function" != typeof e["get" + r.substr(3)] ? r : "get" + r.substr(3)]() : parseFloat(e[r]), o || c[r] !== l[0][r] && (o = c);
                        if (this._beziers = "cubic" !== t.type && "quadratic" !== t.type && "soft" !== t.type ? _(l, isNaN(t.curviness) ? 1 : t.curviness, !1, "thruBasic" === t.type, t.correlate, o) : h(l, t.type, c), this._segCount = this._beziers[r].length, this._timeRes) {
                            var f = p(this._beziers, this._timeRes);
                            this._length = f.length, this._lengths = f.lengths, this._segments = f.segments, this._l1 = this._li = this._s1 = this._si = 0, this._l2 = this._lengths[0], this._curSeg = this._segments[0], this._s2 = this._curSeg[0], this._prec = 1 / this._curSeg.length
                        }
                        if (d = this._autoRotate)
                            for (this._initialRotations = [], d[0] instanceof Array || (this._autoRotate = d = [d]), a = d.length; --a > -1;) {
                                for (n = 0; 3 > n; n++) r = d[a][n], this._func[r] = "function" == typeof e[r] ? e[r.indexOf("set") || "function" != typeof e["get" + r.substr(3)] ? r : "get" + r.substr(3)] : !1;
                                r = d[a][2], this._initialRotations[a] = (this._func[r] ? this._func[r].call(this._target) : this._target[r]) || 0
                            }
                        return this._startRatio = i.vars.runBackwards ? 1 : 0, !0
                    },
                    set: function(t) {
                        var i, r, s, a, n, o, l, c, u, _, h = this._segCount,
                            d = this._func,
                            p = this._target,
                            f = t !== this._startRatio;
                        if (this._timeRes) {
                            if (u = this._lengths, _ = this._curSeg, t *= this._length, s = this._li, t > this._l2 && h - 1 > s) {
                                for (c = h - 1; c > s && (this._l2 = u[++s]) <= t;);
                                this._l1 = u[s - 1], this._li = s, this._curSeg = _ = this._segments[s], this._s2 = _[this._s1 = this._si = 0]
                            } else if (t < this._l1 && s > 0) {
                                for (; s > 0 && (this._l1 = u[--s]) >= t;);
                                0 === s && t < this._l1 ? this._l1 = 0 : s++, this._l2 = u[s], this._li = s, this._curSeg = _ = this._segments[s], this._s1 = _[(this._si = _.length - 1) - 1] || 0, this._s2 = _[this._si]
                            }
                            if (i = s, t -= this._l1, s = this._si, t > this._s2 && s < _.length - 1) {
                                for (c = _.length - 1; c > s && (this._s2 = _[++s]) <= t;);
                                this._s1 = _[s - 1], this._si = s
                            } else if (t < this._s1 && s > 0) {
                                for (; s > 0 && (this._s1 = _[--s]) >= t;);
                                0 === s && t < this._s1 ? this._s1 = 0 : s++, this._s2 = _[s], this._si = s
                            }
                            o = (s + (t - this._s1) / (this._s2 - this._s1)) * this._prec || 0
                        } else i = 0 > t ? 0 : t >= 1 ? h - 1 : h * t >> 0, o = (t - i * (1 / h)) * h;
                        for (r = 1 - o, s = this._props.length; --s > -1;) a = this._props[s], n = this._beziers[a][i], l = (o * o * n.da + 3 * r * (o * n.ca + r * n.ba)) * o + n.a, this._round[a] && (l = Math.round(l)), d[a] ? p[a](l) : p[a] = l;
                        if (this._autoRotate) {
                            var x, m, y, v, g, b, T, P = this._autoRotate;
                            for (s = P.length; --s > -1;) a = P[s][2], b = P[s][3] || 0, T = P[s][4] === !0 ? 1 : e, n = this._beziers[P[s][0]], x = this._beziers[P[s][1]], n && x && (n = n[i], x = x[i], m = n.a + (n.b - n.a) * o, v = n.b + (n.c - n.b) * o, m += (v - m) * o, v += (n.c + (n.d - n.c) * o - v) * o, y = x.a + (x.b - x.a) * o, g = x.b + (x.c - x.b) * o, y += (g - y) * o, g += (x.c + (x.d - x.c) * o - g) * o, l = f ? Math.atan2(g - y, v - m) * T + b : this._initialRotations[s], d[a] ? p[a](l) : p[a] = l)
                        }
                    }
                }),
                x = f.prototype;
            f.bezierThrough = _, f.cubicToQuadratic = l, f._autoCSS = !0, f.quadraticToCubic = function(e, t, i) {
                return new n(e, (2 * t + e) / 3, (2 * t + i) / 3, i)
            }, f._cssRegister = function() {
                var e = a.CSSPlugin;
                if (e) {
                    var t = e._internals,
                        i = t._parseToProxy,
                        r = t._setPluginRatio,
                        s = t.CSSPropTween;
                    t._registerComplexSpecialProp("bezier", {
                        parser: function(e, t, a, n, o, l) {
                            t instanceof Array && (t = {
                                values: t
                            }), l = new f;
                            var c, u, _, h = t.values,
                                d = h.length - 1,
                                p = [],
                                x = {};
                            if (0 > d) return o;
                            for (c = 0; d >= c; c++) _ = i(e, h[c], n, o, l, d !== c), p[c] = _.end;
                            for (u in t) x[u] = t[u];
                            return x.values = p, o = new s(e, "bezier", 0, 0, _.pt, 2), o.data = _, o.plugin = l, o.setRatio = r, 0 === x.autoRotate && (x.autoRotate = !0), !x.autoRotate || x.autoRotate instanceof Array || (c = x.autoRotate === !0 ? 0 : Number(x.autoRotate), x.autoRotate = null != _.end.left ? [
                                ["left", "top", "rotation", c, !1]
                            ] : null != _.end.x ? [
                                ["x", "y", "rotation", c, !1]
                            ] : !1), x.autoRotate && (n._transform || n._enableTransforms(!1), _.autoRotate = n._target._gsTransform, _.proxy.rotation = _.autoRotate.rotation || 0), l._onInitTween(_.proxy, x, n._tween), o
                        }
                    })
                }
            }, x._roundProps = function(e, t) {
                for (var i = this._overwriteProps, r = i.length; --r > -1;)(e[i[r]] || e.bezier || e.bezierThrough) && (this._round[i[r]] = t)
            }, x._kill = function(e) {
                var t, i, r = this._props;
                for (t in this._beziers)
                    if (t in e)
                        for (delete this._beziers[t], delete this._func[t], i = r.length; --i > -1;) r[i] === t && r.splice(i, 1);
                return this._super._kill.call(this, e)
            }
        }(), _gsScope._gsDefine("plugins.CSSPlugin", ["plugins.TweenPlugin", "TweenLite"], function(e, t) {
        var i, r, s, a, n = function() {
                e.call(this, "css"), this._overwriteProps.length = 0, this.setRatio = n.prototype.setRatio
            },
            o = _gsScope._gsDefine.globals,
            l = {},
            c = n.prototype = new e("css");
        c.constructor = n, n.version = "1.18.5", n.API = 2, n.defaultTransformPerspective = 0, n.defaultSkewType = "compensated", n.defaultSmoothOrigin = !0, c = "px", n.suffixMap = {
            top: c,
            right: c,
            bottom: c,
            left: c,
            width: c,
            height: c,
            fontSize: c,
            padding: c,
            margin: c,
            perspective: c,
            lineHeight: ""
        };
        var u, _, h, d, p, f, x = /(?:\-|\.|\b)(\d|\.|e\-)+/g,
            m = /(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,
            y = /(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,
            v = /(?![+-]?\d*\.?\d+|[+-]|e[+-]\d+)[^0-9]/g,
            g = /(?:\d|\-|\+|=|#|\.)*/g,
            b = /opacity *= *([^)]*)/i,
            T = /opacity:([^;]*)/i,
            P = /alpha\(opacity *=.+?\)/i,
            w = /^(rgb|hsl)/,
            j = /([A-Z])/g,
            S = /-([a-z])/gi,
            A = /(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,
            E = function(e, t) {
                return t.toUpperCase()
            },
            L = /(?:Left|Right|Width)/i,
            R = /(M11|M12|M21|M22)=[\d\-\.e]+/gi,
            Y = /progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,
            C = /,(?=[^\)]*(?:\(|$))/gi,
            k = /[\s,\(]/i,
            I = Math.PI / 180,
            M = 180 / Math.PI,
            O = {},
            D = document,
            Q = function(e) {
                return D.createElementNS ? D.createElementNS("http://www.w3.org/1999/xhtml", e) : D.createElement(e)
            },
            F = Q("div"),
            N = Q("img"),
            B = n._internals = {
                _specialProps: l
            },
            q = navigator.userAgent,
            U = function() {
                var e = q.indexOf("Android"),
                    t = Q("a");
                return h = -1 !== q.indexOf("Safari") && -1 === q.indexOf("Chrome") && (-1 === e || Number(q.substr(e + 8, 1)) > 3), p = h && Number(q.substr(q.indexOf("Version/") + 8, 1)) < 6, d = -1 !== q.indexOf("Firefox"), (/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(q) || /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/.exec(q)) && (f = parseFloat(RegExp.$1)), t ? (t.style.cssText = "top:1px;opacity:.55;", /^0.55/.test(t.style.opacity)) : !1
            }(),
            X = function(e) {
                return b.test("string" == typeof e ? e : (e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? parseFloat(RegExp.$1) / 100 : 1
            },
            z = function(e) {
                window.console && console.log(e)
            },
            H = "",
            V = "",
            W = function(e, t) {
                t = t || F;
                var i, r, s = t.style;
                if (void 0 !== s[e]) return e;
                for (e = e.charAt(0).toUpperCase() + e.substr(1), i = ["O", "Moz", "ms", "Ms", "Webkit"], r = 5; --r > -1 && void 0 === s[i[r] + e];);
                return r >= 0 ? (V = 3 === r ? "ms" : i[r], H = "-" + V.toLowerCase() + "-", V + e) : null
            },
            G = D.defaultView ? D.defaultView.getComputedStyle : function() {},
            J = n.getStyle = function(e, t, i, r, s) {
                var a;
                return U || "opacity" !== t ? (!r && e.style[t] ? a = e.style[t] : (i = i || G(e)) ? a = i[t] || i.getPropertyValue(t) || i.getPropertyValue(t.replace(j, "-$1").toLowerCase()) : e.currentStyle && (a = e.currentStyle[t]), null == s || a && "none" !== a && "auto" !== a && "auto auto" !== a ? a : s) : X(e)
            },
            $ = B.convertToPixels = function(e, i, r, s, a) {
                if ("px" === s || !s) return r;
                if ("auto" === s || !r) return 0;
                var o, l, c, u = L.test(i),
                    _ = e,
                    h = F.style,
                    d = 0 > r,
                    p = 1 === r;
                if (d && (r = -r), p && (r *= 100), "%" === s && -1 !== i.indexOf("border")) o = r / 100 * (u ? e.clientWidth : e.clientHeight);
                else {
                    if (h.cssText = "border:0 solid red;position:" + J(e, "position") + ";line-height:0;", "%" !== s && _.appendChild && "v" !== s.charAt(0) && "rem" !== s) h[u ? "borderLeftWidth" : "borderTopWidth"] = r + s;
                    else {
                        if (_ = e.parentNode || D.body, l = _._gsCache, c = t.ticker.frame, l && u && l.time === c) return l.width * r / 100;
                        h[u ? "width" : "height"] = r + s
                    }
                    _.appendChild(F), o = parseFloat(F[u ? "offsetWidth" : "offsetHeight"]), _.removeChild(F), u && "%" === s && n.cacheWidths !== !1 && (l = _._gsCache = _._gsCache || {}, l.time = c, l.width = o / r * 100), 0 !== o || a || (o = $(e, i, r, s, !0))
                }
                return p && (o /= 100), d ? -o : o
            },
            Z = B.calculateOffset = function(e, t, i) {
                if ("absolute" !== J(e, "position", i)) return 0;
                var r = "left" === t ? "Left" : "Top",
                    s = J(e, "margin" + r, i);
                return e["offset" + r] - ($(e, t, parseFloat(s), s.replace(g, "")) || 0)
            },
            K = function(e, t) {
                var i, r, s, a = {};
                if (t = t || G(e, null))
                    if (i = t.length)
                        for (; --i > -1;) s = t[i], (-1 === s.indexOf("-transform") || Se === s) && (a[s.replace(S, E)] = t.getPropertyValue(s));
                    else
                        for (i in t)(-1 === i.indexOf("Transform") || je === i) && (a[i] = t[i]);
                else if (t = e.currentStyle || e.style)
                    for (i in t) "string" == typeof i && void 0 === a[i] && (a[i.replace(S, E)] = t[i]);
                return U || (a.opacity = X(e)), r = Fe(e, t, !1), a.rotation = r.rotation, a.skewX = r.skewX, a.scaleX = r.scaleX, a.scaleY = r.scaleY, a.x = r.x, a.y = r.y, Ee && (a.z = r.z, a.rotationX = r.rotationX, a.rotationY = r.rotationY, a.scaleZ = r.scaleZ), a.filters && delete a.filters, a
            },
            ee = function(e, t, i, r, s) {
                var a, n, o, l = {},
                    c = e.style;
                for (n in i) "cssText" !== n && "length" !== n && isNaN(n) && (t[n] !== (a = i[n]) || s && s[n]) && -1 === n.indexOf("Origin") && ("number" == typeof a || "string" == typeof a) && (l[n] = "auto" !== a || "left" !== n && "top" !== n ? "" !== a && "auto" !== a && "none" !== a || "string" != typeof t[n] || "" === t[n].replace(v, "") ? a : 0 : Z(e, n), void 0 !== c[n] && (o = new fe(c, n, c[n], o)));
                if (r)
                    for (n in r) "className" !== n && (l[n] = r[n]);
                return {
                    difs: l,
                    firstMPT: o
                }
            },
            te = {
                width: ["Left", "Right"],
                height: ["Top", "Bottom"]
            },
            ie = ["marginLeft", "marginRight", "marginTop", "marginBottom"],
            re = function(e, t, i) {
                if ("svg" === (e.nodeName + "").toLowerCase()) return (i || G(e))[t] || 0;
                if (e.getBBox && Oe(e)) return e.getBBox()[t] || 0;
                var r = parseFloat("width" === t ? e.offsetWidth : e.offsetHeight),
                    s = te[t],
                    a = s.length;
                for (i = i || G(e, null); --a > -1;) r -= parseFloat(J(e, "padding" + s[a], i, !0)) || 0, r -= parseFloat(J(e, "border" + s[a] + "Width", i, !0)) || 0;
                return r
            },
            se = function(e, t) {
                if ("contain" === e || "auto" === e || "auto auto" === e) return e + " ";
                (null == e || "" === e) && (e = "0 0");
                var i, r = e.split(" "),
                    s = -1 !== e.indexOf("left") ? "0%" : -1 !== e.indexOf("right") ? "100%" : r[0],
                    a = -1 !== e.indexOf("top") ? "0%" : -1 !== e.indexOf("bottom") ? "100%" : r[1];
                if (r.length > 3 && !t) {
                    for (r = e.split(", ").join(",").split(","), e = [], i = 0; i < r.length; i++) e.push(se(r[i]));
                    return e.join(",")
                }
                return null == a ? a = "center" === s ? "50%" : "0" : "center" === a && (a = "50%"), ("center" === s || isNaN(parseFloat(s)) && -1 === (s + "").indexOf("=")) && (s = "50%"), e = s + " " + a + (r.length > 2 ? " " + r[2] : ""), t && (t.oxp = -1 !== s.indexOf("%"), t.oyp = -1 !== a.indexOf("%"), t.oxr = "=" === s.charAt(1), t.oyr = "=" === a.charAt(1), t.ox = parseFloat(s.replace(v, "")), t.oy = parseFloat(a.replace(v, "")), t.v = e), t || e
            },
            ae = function(e, t) {
                return "string" == typeof e && "=" === e.charAt(1) ? parseInt(e.charAt(0) + "1", 10) * parseFloat(e.substr(2)) : parseFloat(e) - parseFloat(t) || 0
            },
            ne = function(e, t) {
                return null == e ? t : "string" == typeof e && "=" === e.charAt(1) ? parseInt(e.charAt(0) + "1", 10) * parseFloat(e.substr(2)) + t : parseFloat(e) || 0
            },
            oe = function(e, t, i, r) {
                var s, a, n, o, l, c = 1e-6;
                return null == e ? o = t : "number" == typeof e ? o = e : (s = 360, a = e.split("_"), l = "=" === e.charAt(1), n = (l ? parseInt(e.charAt(0) + "1", 10) * parseFloat(a[0].substr(2)) : parseFloat(a[0])) * (-1 === e.indexOf("rad") ? 1 : M) - (l ? 0 : t), a.length && (r && (r[i] = t + n), -1 !== e.indexOf("short") && (n %= s, n !== n % (s / 2) && (n = 0 > n ? n + s : n - s)), -1 !== e.indexOf("_cw") && 0 > n ? n = (n + 9999999999 * s) % s - (n / s | 0) * s : -1 !== e.indexOf("ccw") && n > 0 && (n = (n - 9999999999 * s) % s - (n / s | 0) * s)), o = t + n), c > o && o > -c && (o = 0), o
            },
            le = {
                aqua: [0, 255, 255],
                lime: [0, 255, 0],
                silver: [192, 192, 192],
                black: [0, 0, 0],
                maroon: [128, 0, 0],
                teal: [0, 128, 128],
                blue: [0, 0, 255],
                navy: [0, 0, 128],
                white: [255, 255, 255],
                fuchsia: [255, 0, 255],
                olive: [128, 128, 0],
                yellow: [255, 255, 0],
                orange: [255, 165, 0],
                gray: [128, 128, 128],
                purple: [128, 0, 128],
                green: [0, 128, 0],
                red: [255, 0, 0],
                pink: [255, 192, 203],
                cyan: [0, 255, 255],
                transparent: [255, 255, 255, 0]
            },
            ce = function(e, t, i) {
                return e = 0 > e ? e + 1 : e > 1 ? e - 1 : e, 255 * (1 > 6 * e ? t + (i - t) * e * 6 : .5 > e ? i : 2 > 3 * e ? t + (i - t) * (2 / 3 - e) * 6 : t) + .5 | 0
            },
            ue = n.parseColor = function(e, t) {
                var i, r, s, a, n, o, l, c, u, _, h;
                if (e)
                    if ("number" == typeof e) i = [e >> 16, e >> 8 & 255, 255 & e];
                    else {
                        if ("," === e.charAt(e.length - 1) && (e = e.substr(0, e.length - 1)), le[e]) i = le[e];
                        else if ("#" === e.charAt(0)) 4 === e.length && (r = e.charAt(1), s = e.charAt(2), a = e.charAt(3), e = "#" + r + r + s + s + a + a), e = parseInt(e.substr(1), 16), i = [e >> 16, e >> 8 & 255, 255 & e];
                        else if ("hsl" === e.substr(0, 3))
                            if (i = h = e.match(x), t) {
                                if (-1 !== e.indexOf("=")) return e.match(m)
                            } else n = Number(i[0]) % 360 / 360, o = Number(i[1]) / 100, l = Number(i[2]) / 100, s = .5 >= l ? l * (o + 1) : l + o - l * o, r = 2 * l - s, i.length > 3 && (i[3] = Number(e[3])), i[0] = ce(n + 1 / 3, r, s), i[1] = ce(n, r, s), i[2] = ce(n - 1 / 3, r, s);
                        else i = e.match(x) || le.transparent;
                        i[0] = Number(i[0]), i[1] = Number(i[1]), i[2] = Number(i[2]), i.length > 3 && (i[3] = Number(i[3]))
                    }
                else i = le.black;
                return t && !h && (r = i[0] / 255, s = i[1] / 255, a = i[2] / 255, c = Math.max(r, s, a), u = Math.min(r, s, a), l = (c + u) / 2, c === u ? n = o = 0 : (_ = c - u, o = l > .5 ? _ / (2 - c - u) : _ / (c + u), n = c === r ? (s - a) / _ + (a > s ? 6 : 0) : c === s ? (a - r) / _ + 2 : (r - s) / _ + 4, n *= 60), i[0] = n + .5 | 0, i[1] = 100 * o + .5 | 0, i[2] = 100 * l + .5 | 0), i
            },
            _e = function(e, t) {
                var i, r, s, a = e.match(he) || [],
                    n = 0,
                    o = a.length ? "" : e;
                for (i = 0; i < a.length; i++) r = a[i], s = e.substr(n, e.indexOf(r, n) - n), n += s.length + r.length, r = ue(r, t), 3 === r.length && r.push(1), o += s + (t ? "hsla(" + r[0] + "," + r[1] + "%," + r[2] + "%," + r[3] : "rgba(" + r.join(",")) + ")";
                return o + e.substr(n)
            },
            he = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3}){1,2}\\b";
        for (c in le) he += "|" + c + "\\b";
        he = new RegExp(he + ")", "gi"), n.colorStringFilter = function(e) {
            var t, i = e[0] + e[1];
            he.test(i) && (t = -1 !== i.indexOf("hsl(") || -1 !== i.indexOf("hsla("), e[0] = _e(e[0], t), e[1] = _e(e[1], t)), he.lastIndex = 0
        }, t.defaultStringFilter || (t.defaultStringFilter = n.colorStringFilter);
        var de = function(e, t, i, r) {
                if (null == e) return function(e) {
                    return e
                };
                var s, a = t ? (e.match(he) || [""])[0] : "",
                    n = e.split(a).join("").match(y) || [],
                    o = e.substr(0, e.indexOf(n[0])),
                    l = ")" === e.charAt(e.length - 1) ? ")" : "",
                    c = -1 !== e.indexOf(" ") ? " " : ",",
                    u = n.length,
                    _ = u > 0 ? n[0].replace(x, "") : "";
                return u ? s = t ? function(e) {
                    var t, h, d, p;
                    if ("number" == typeof e) e += _;
                    else if (r && C.test(e)) {
                        for (p = e.replace(C, "|").split("|"), d = 0; d < p.length; d++) p[d] = s(p[d]);
                        return p.join(",")
                    }
                    if (t = (e.match(he) || [a])[0], h = e.split(t).join("").match(y) || [], d = h.length, u > d--)
                        for (; ++d < u;) h[d] = i ? h[(d - 1) / 2 | 0] : n[d];
                    return o + h.join(c) + c + t + l + (-1 !== e.indexOf("inset") ? " inset" : "")
                } : function(e) {
                    var t, a, h;
                    if ("number" == typeof e) e += _;
                    else if (r && C.test(e)) {
                        for (a = e.replace(C, "|").split("|"), h = 0; h < a.length; h++) a[h] = s(a[h]);
                        return a.join(",")
                    }
                    if (t = e.match(y) || [], h = t.length, u > h--)
                        for (; ++h < u;) t[h] = i ? t[(h - 1) / 2 | 0] : n[h];
                    return o + t.join(c) + l
                } : function(e) {
                    return e
                }
            },
            pe = function(e) {
                return e = e.split(","),
                    function(t, i, r, s, a, n, o) {
                        var l, c = (i + "").split(" ");
                        for (o = {}, l = 0; 4 > l; l++) o[e[l]] = c[l] = c[l] || c[(l - 1) / 2 >> 0];
                        return s.parse(t, o, a, n)
                    }
            },
            fe = (B._setPluginRatio = function(e) {
                this.plugin.setRatio(e);
                for (var t, i, r, s, a, n = this.data, o = n.proxy, l = n.firstMPT, c = 1e-6; l;) t = o[l.v], l.r ? t = Math.round(t) : c > t && t > -c && (t = 0), l.t[l.p] = t, l = l._next;
                if (n.autoRotate && (n.autoRotate.rotation = o.rotation), 1 === e || 0 === e)
                    for (l = n.firstMPT, a = 1 === e ? "e" : "b"; l;) {
                        if (i = l.t, i.type) {
                            if (1 === i.type) {
                                for (s = i.xs0 + i.s + i.xs1, r = 1; r < i.l; r++) s += i["xn" + r] + i["xs" + (r + 1)];
                                i[a] = s
                            }
                        } else i[a] = i.s + i.xs0;
                        l = l._next
                    }
            }, function(e, t, i, r, s) {
                this.t = e, this.p = t, this.v = i, this.r = s, r && (r._prev = this, this._next = r)
            }),
            xe = (B._parseToProxy = function(e, t, i, r, s, a) {
                var n, o, l, c, u, _ = r,
                    h = {},
                    d = {},
                    p = i._transform,
                    f = O;
                for (i._transform = null, O = t, r = u = i.parse(e, t, r, s), O = f, a && (i._transform = p, _ && (_._prev = null, _._prev && (_._prev._next = null))); r && r !== _;) {
                    if (r.type <= 1 && (o = r.p, d[o] = r.s + r.c, h[o] = r.s, a || (c = new fe(r, "s", o, c, r.r), r.c = 0), 1 === r.type))
                        for (n = r.l; --n > 0;) l = "xn" + n, o = r.p + "_" + l, d[o] = r.data[l], h[o] = r[l], a || (c = new fe(r, l, o, c, r.rxp[l]));
                    r = r._next
                }
                return {
                    proxy: h,
                    end: d,
                    firstMPT: c,
                    pt: u
                }
            }, B.CSSPropTween = function(e, t, r, s, n, o, l, c, u, _, h) {
                this.t = e, this.p = t, this.s = r, this.c = s, this.n = l || t, e instanceof xe || a.push(this.n), this.r = c, this.type = o || 0, u && (this.pr = u, i = !0), this.b = void 0 === _ ? r : _, this.e = void 0 === h ? r + s : h, n && (this._next = n, n._prev = this)
            }),
            me = function(e, t, i, r, s, a) {
                var n = new xe(e, t, i, r - i, s, -1, a);
                return n.b = i, n.e = n.xs0 = r, n
            },
            ye = n.parseComplex = function(e, t, i, r, s, a, o, l, c, _) {
                i = i || a || "", o = new xe(e, t, 0, 0, o, _ ? 2 : 1, null, !1, l, i, r), r += "", s && he.test(r + i) && (r = [i, r], n.colorStringFilter(r), i = r[0], r = r[1]);
                var h, d, p, f, y, v, g, b, T, P, w, j, S, A = i.split(", ").join(",").split(" "),
                    E = r.split(", ").join(",").split(" "),
                    L = A.length,
                    R = u !== !1;
                for ((-1 !== r.indexOf(",") || -1 !== i.indexOf(",")) && (A = A.join(" ").replace(C, ", ").split(" "), E = E.join(" ").replace(C, ", ").split(" "), L = A.length), L !== E.length && (A = (a || "").split(" "), L = A.length), o.plugin = c, o.setRatio = _, he.lastIndex = 0, h = 0; L > h; h++)
                    if (f = A[h], y = E[h], b = parseFloat(f), b || 0 === b) o.appendXtra("", b, ae(y, b), y.replace(m, ""), R && -1 !== y.indexOf("px"), !0);
                    else if (s && he.test(f)) j = y.indexOf(")") + 1, j = ")" + (j ? y.substr(j) : ""), S = -1 !== y.indexOf("hsl") && U, f = ue(f, S), y = ue(y, S), T = f.length + y.length > 6, T && !U && 0 === y[3] ? (o["xs" + o.l] += o.l ? " transparent" : "transparent", o.e = o.e.split(E[h]).join("transparent")) : (U || (T = !1), S ? o.appendXtra(T ? "hsla(" : "hsl(", f[0], ae(y[0], f[0]), ",", !1, !0).appendXtra("", f[1], ae(y[1], f[1]), "%,", !1).appendXtra("", f[2], ae(y[2], f[2]), T ? "%," : "%" + j, !1) : o.appendXtra(T ? "rgba(" : "rgb(", f[0], y[0] - f[0], ",", !0, !0).appendXtra("", f[1], y[1] - f[1], ",", !0).appendXtra("", f[2], y[2] - f[2], T ? "," : j, !0), T && (f = f.length < 4 ? 1 : f[3], o.appendXtra("", f, (y.length < 4 ? 1 : y[3]) - f, j, !1))), he.lastIndex = 0;
                    else if (v = f.match(x)) {
                        if (g = y.match(m), !g || g.length !== v.length) return o;
                        for (p = 0, d = 0; d < v.length; d++) w = v[d], P = f.indexOf(w, p), o.appendXtra(f.substr(p, P - p), Number(w), ae(g[d], w), "", R && "px" === f.substr(P + w.length, 2), 0 === d), p = P + w.length;
                        o["xs" + o.l] += f.substr(p)
                    } else o["xs" + o.l] += o.l || o["xs" + o.l] ? " " + y : y;
                if (-1 !== r.indexOf("=") && o.data) {
                    for (j = o.xs0 + o.data.s, h = 1; h < o.l; h++) j += o["xs" + h] + o.data["xn" + h];
                    o.e = j + o["xs" + h]
                }
                return o.l || (o.type = -1, o.xs0 = o.e), o.xfirst || o
            },
            ve = 9;
        for (c = xe.prototype, c.l = c.pr = 0; --ve > 0;) c["xn" + ve] = 0, c["xs" + ve] = "";
        c.xs0 = "", c._next = c._prev = c.xfirst = c.data = c.plugin = c.setRatio = c.rxp = null, c.appendXtra = function(e, t, i, r, s, a) {
            var n = this,
                o = n.l;
            return n["xs" + o] += a && (o || n["xs" + o]) ? " " + e : e || "", i || 0 === o || n.plugin ? (n.l++, n.type = n.setRatio ? 2 : 1, n["xs" + n.l] = r || "", o > 0 ? (n.data["xn" + o] = t + i, n.rxp["xn" + o] = s, n["xn" + o] = t, n.plugin || (n.xfirst = new xe(n, "xn" + o, t, i, n.xfirst || n, 0, n.n, s, n.pr), n.xfirst.xs0 = 0), n) : (n.data = {
                s: t + i
            }, n.rxp = {}, n.s = t, n.c = i, n.r = s, n)) : (n["xs" + o] += t + (r || ""), n)
        };
        var ge = function(e, t) {
                t = t || {}, this.p = t.prefix ? W(e) || e : e, l[e] = l[this.p] = this, this.format = t.formatter || de(t.defaultValue, t.color, t.collapsible, t.multi), t.parser && (this.parse = t.parser), this.clrs = t.color, this.multi = t.multi, this.keyword = t.keyword, this.dflt = t.defaultValue, this.pr = t.priority || 0
            },
            be = B._registerComplexSpecialProp = function(e, t, i) {
                "object" != typeof t && (t = {
                    parser: i
                });
                var r, s, a = e.split(","),
                    n = t.defaultValue;
                for (i = i || [n], r = 0; r < a.length; r++) t.prefix = 0 === r && t.prefix, t.defaultValue = i[r] || n, s = new ge(a[r], t)
            },
            Te = function(e) {
                if (!l[e]) {
                    var t = e.charAt(0).toUpperCase() + e.substr(1) + "Plugin";
                    be(e, {
                        parser: function(e, i, r, s, a, n, c) {
                            var u = o.com.greensock.plugins[t];
                            return u ? (u._cssRegister(), l[r].parse(e, i, r, s, a, n, c)) : (z("Error: " + t + " js file not loaded."), a)
                        }
                    })
                }
            };
        c = ge.prototype, c.parseComplex = function(e, t, i, r, s, a) {
            var n, o, l, c, u, _, h = this.keyword;
            if (this.multi && (C.test(i) || C.test(t) ? (o = t.replace(C, "|").split("|"), l = i.replace(C, "|").split("|")) : h && (o = [t], l = [i])), l) {
                for (c = l.length > o.length ? l.length : o.length, n = 0; c > n; n++) t = o[n] = o[n] || this.dflt, i = l[n] = l[n] || this.dflt, h && (u = t.indexOf(h), _ = i.indexOf(h), u !== _ && (-1 === _ ? o[n] = o[n].split(h).join("") : -1 === u && (o[n] += " " + h)));
                t = o.join(", "), i = l.join(", ")
            }
            return ye(e, this.p, t, i, this.clrs, this.dflt, r, this.pr, s, a)
        }, c.parse = function(e, t, i, r, a, n, o) {
            return this.parseComplex(e.style, this.format(J(e, this.p, s, !1, this.dflt)), this.format(t), a, n)
        }, n.registerSpecialProp = function(e, t, i) {
            be(e, {
                parser: function(e, r, s, a, n, o, l) {
                    var c = new xe(e, s, 0, 0, n, 2, s, !1, i);
                    return c.plugin = o, c.setRatio = t(e, r, a._tween, s), c
                },
                priority: i
            })
        }, n.useSVGTransformAttr = h || d;
        var Pe, we = "scaleX,scaleY,scaleZ,x,y,z,skewX,skewY,rotation,rotationX,rotationY,perspective,xPercent,yPercent".split(","),
            je = W("transform"),
            Se = H + "transform",
            Ae = W("transformOrigin"),
            Ee = null !== W("perspective"),
            Le = B.Transform = function() {
                this.perspective = parseFloat(n.defaultTransformPerspective) || 0, this.force3D = n.defaultForce3D !== !1 && Ee ? n.defaultForce3D || "auto" : !1
            },
            Re = window.SVGElement,
            Ye = function(e, t, i) {
                var r, s = D.createElementNS("http://www.w3.org/2000/svg", e),
                    a = /([a-z])([A-Z])/g;
                for (r in i) s.setAttributeNS(null, r.replace(a, "$1-$2").toLowerCase(), i[r]);
                return t.appendChild(s), s
            },
            Ce = D.documentElement,
            ke = function() {
                var e, t, i, r = f || /Android/i.test(q) && !window.chrome;
                return D.createElementNS && !r && (e = Ye("svg", Ce), t = Ye("rect", e, {
                    width: 100,
                    height: 50,
                    x: 100
                }), i = t.getBoundingClientRect().width, t.style[Ae] = "50% 50%", t.style[je] = "scaleX(0.5)", r = i === t.getBoundingClientRect().width && !(d && Ee), Ce.removeChild(e)), r
            }(),
            Ie = function(e, t, i, r, s, a) {
                var o, l, c, u, _, h, d, p, f, x, m, y, v, g, b = e._gsTransform,
                    T = Qe(e, !0);
                b && (v = b.xOrigin, g = b.yOrigin), (!r || (o = r.split(" ")).length < 2) && (d = e.getBBox(), t = se(t).split(" "), o = [(-1 !== t[0].indexOf("%") ? parseFloat(t[0]) / 100 * d.width : parseFloat(t[0])) + d.x, (-1 !== t[1].indexOf("%") ? parseFloat(t[1]) / 100 * d.height : parseFloat(t[1])) + d.y]), i.xOrigin = u = parseFloat(o[0]), i.yOrigin = _ = parseFloat(o[1]), r && T !== De && (h = T[0], d = T[1], p = T[2], f = T[3], x = T[4], m = T[5], y = h * f - d * p, l = u * (f / y) + _ * (-p / y) + (p * m - f * x) / y, c = u * (-d / y) + _ * (h / y) - (h * m - d * x) / y, u = i.xOrigin = o[0] = l, _ = i.yOrigin = o[1] = c), b && (a && (i.xOffset = b.xOffset, i.yOffset = b.yOffset, b = i), s || s !== !1 && n.defaultSmoothOrigin !== !1 ? (l = u - v, c = _ - g, b.xOffset += l * T[0] + c * T[2] - l, b.yOffset += l * T[1] + c * T[3] - c) : b.xOffset = b.yOffset = 0), a || e.setAttribute("data-svg-origin", o.join(" "))
            },
            Me = function(e) {
                try {
                    return e.getBBox()
                } catch (e) {}
            },
            Oe = function(e) {
                return !!(Re && e.getBBox && e.getCTM && Me(e) && (!e.parentNode || e.parentNode.getBBox && e.parentNode.getCTM))
            },
            De = [1, 0, 0, 1, 0, 0],
            Qe = function(e, t) {
                var i, r, s, a, n, o, l = e._gsTransform || new Le,
                    c = 1e5,
                    u = e.style;
                if (je ? r = J(e, Se, null, !0) : e.currentStyle && (r = e.currentStyle.filter.match(R), r = r && 4 === r.length ? [r[0].substr(4), Number(r[2].substr(4)), Number(r[1].substr(4)), r[3].substr(4), l.x || 0, l.y || 0].join(",") : ""), i = !r || "none" === r || "matrix(1, 0, 0, 1, 0, 0)" === r, i && je && ((o = "none" === G(e).display) || !e.parentNode) && (o && (a = u.display, u.display = "block"), e.parentNode || (n = 1, Ce.appendChild(e)), r = J(e, Se, null, !0), i = !r || "none" === r || "matrix(1, 0, 0, 1, 0, 0)" === r, a ? u.display = a : o && Ue(u, "display"), n && Ce.removeChild(e)), (l.svg || e.getBBox && Oe(e)) && (i && -1 !== (u[je] + "").indexOf("matrix") && (r = u[je], i = 0), s = e.getAttribute("transform"), i && s && (-1 !== s.indexOf("matrix") ? (r = s, i = 0) : -1 !== s.indexOf("translate") && (r = "matrix(1,0,0,1," + s.match(/(?:\-|\b)[\d\-\.e]+\b/gi).join(",") + ")", i = 0))), i) return De;
                for (s = (r || "").match(x) || [], ve = s.length; --ve > -1;) a = Number(s[ve]), s[ve] = (n = a - (a |= 0)) ? (n * c + (0 > n ? -.5 : .5) | 0) / c + a : a;
                return t && s.length > 6 ? [s[0], s[1], s[4], s[5], s[12], s[13]] : s
            },
            Fe = B.getTransform = function(e, i, r, s) {
                if (e._gsTransform && r && !s) return e._gsTransform;
                var a, o, l, c, u, _, h = r ? e._gsTransform || new Le : new Le,
                    d = h.scaleX < 0,
                    p = 2e-5,
                    f = 1e5,
                    x = Ee ? parseFloat(J(e, Ae, i, !1, "0 0 0").split(" ")[2]) || h.zOrigin || 0 : 0,
                    m = parseFloat(n.defaultTransformPerspective) || 0;
                if (h.svg = !(!e.getBBox || !Oe(e)), h.svg && (Ie(e, J(e, Ae, i, !1, "50% 50%") + "", h, e.getAttribute("data-svg-origin")), Pe = n.useSVGTransformAttr || ke), a = Qe(e), a !== De) {
                    if (16 === a.length) {
                        var y, v, g, b, T, P = a[0],
                            w = a[1],
                            j = a[2],
                            S = a[3],
                            A = a[4],
                            E = a[5],
                            L = a[6],
                            R = a[7],
                            Y = a[8],
                            C = a[9],
                            k = a[10],
                            I = a[12],
                            O = a[13],
                            D = a[14],
                            Q = a[11],
                            F = Math.atan2(L, k);
                        h.zOrigin && (D = -h.zOrigin, I = Y * D - a[12], O = C * D - a[13], D = k * D + h.zOrigin - a[14]), h.rotationX = F * M, F && (b = Math.cos(-F), T = Math.sin(-F), y = A * b + Y * T, v = E * b + C * T, g = L * b + k * T, Y = A * -T + Y * b, C = E * -T + C * b, k = L * -T + k * b, Q = R * -T + Q * b, A = y, E = v, L = g), F = Math.atan2(-j, k), h.rotationY = F * M, F && (b = Math.cos(-F), T = Math.sin(-F), y = P * b - Y * T, v = w * b - C * T, g = j * b - k * T, C = w * T + C * b, k = j * T + k * b, Q = S * T + Q * b, P = y, w = v, j = g), F = Math.atan2(w, P), h.rotation = F * M, F && (b = Math.cos(-F), T = Math.sin(-F), P = P * b + A * T, v = w * b + E * T, E = w * -T + E * b, L = j * -T + L * b, w = v), h.rotationX && Math.abs(h.rotationX) + Math.abs(h.rotation) > 359.9 && (h.rotationX = h.rotation = 0, h.rotationY = 180 - h.rotationY), h.scaleX = (Math.sqrt(P * P + w * w) * f + .5 | 0) / f, h.scaleY = (Math.sqrt(E * E + C * C) * f + .5 | 0) / f, h.scaleZ = (Math.sqrt(L * L + k * k) * f + .5 | 0) / f, h.rotationX || h.rotationY ? h.skewX = 0 : (h.skewX = A || E ? Math.atan2(A, E) * M + h.rotation : h.skewX || 0, Math.abs(h.skewX) > 90 && Math.abs(h.skewX) < 270 && (d ? (h.scaleX *= -1, h.skewX += h.rotation <= 0 ? 180 : -180, h.rotation += h.rotation <= 0 ? 180 : -180) : (h.scaleY *= -1, h.skewX += h.skewX <= 0 ? 180 : -180))), h.perspective = Q ? 1 / (0 > Q ? -Q : Q) : 0, h.x = I, h.y = O, h.z = D, h.svg && (h.x -= h.xOrigin - (h.xOrigin * P - h.yOrigin * A), h.y -= h.yOrigin - (h.yOrigin * w - h.xOrigin * E))
                    } else if (!Ee || s || !a.length || h.x !== a[4] || h.y !== a[5] || !h.rotationX && !h.rotationY) {
                        var N = a.length >= 6,
                            B = N ? a[0] : 1,
                            q = a[1] || 0,
                            U = a[2] || 0,
                            X = N ? a[3] : 1;
                        h.x = a[4] || 0, h.y = a[5] || 0, l = Math.sqrt(B * B + q * q), c = Math.sqrt(X * X + U * U), u = B || q ? Math.atan2(q, B) * M : h.rotation || 0, _ = U || X ? Math.atan2(U, X) * M + u : h.skewX || 0, Math.abs(_) > 90 && Math.abs(_) < 270 && (d ? (l *= -1, _ += 0 >= u ? 180 : -180, u += 0 >= u ? 180 : -180) : (c *= -1, _ += 0 >= _ ? 180 : -180)), h.scaleX = l, h.scaleY = c, h.rotation = u, h.skewX = _, Ee && (h.rotationX = h.rotationY = h.z = 0, h.perspective = m, h.scaleZ = 1), h.svg && (h.x -= h.xOrigin - (h.xOrigin * B + h.yOrigin * U), h.y -= h.yOrigin - (h.xOrigin * q + h.yOrigin * X))
                    }
                    h.zOrigin = x;
                    for (o in h) h[o] < p && h[o] > -p && (h[o] = 0)
                }
                return r && (e._gsTransform = h, h.svg && (Pe && e.style[je] ? t.delayedCall(.001, function() {
                    Ue(e.style, je)
                }) : !Pe && e.getAttribute("transform") && t.delayedCall(.001, function() {
                    e.removeAttribute("transform")
                }))), h
            },
            Ne = function(e) {
                var t, i, r = this.data,
                    s = -r.rotation * I,
                    a = s + r.skewX * I,
                    n = 1e5,
                    o = (Math.cos(s) * r.scaleX * n | 0) / n,
                    l = (Math.sin(s) * r.scaleX * n | 0) / n,
                    c = (Math.sin(a) * -r.scaleY * n | 0) / n,
                    u = (Math.cos(a) * r.scaleY * n | 0) / n,
                    _ = this.t.style,
                    h = this.t.currentStyle;
                if (h) {
                    i = l, l = -c, c = -i, t = h.filter, _.filter = "";
                    var d, p, x = this.t.offsetWidth,
                        m = this.t.offsetHeight,
                        y = "absolute" !== h.position,
                        v = "progid:DXImageTransform.Microsoft.Matrix(M11=" + o + ", M12=" + l + ", M21=" + c + ", M22=" + u,
                        T = r.x + x * r.xPercent / 100,
                        P = r.y + m * r.yPercent / 100;
                    if (null != r.ox && (d = (r.oxp ? x * r.ox * .01 : r.ox) - x / 2, p = (r.oyp ? m * r.oy * .01 : r.oy) - m / 2, T += d - (d * o + p * l), P += p - (d * c + p * u)), y ? (d = x / 2, p = m / 2, v += ", Dx=" + (d - (d * o + p * l) + T) + ", Dy=" + (p - (d * c + p * u) + P) + ")") : v += ", sizingMethod='auto expand')", -1 !== t.indexOf("DXImageTransform.Microsoft.Matrix(") ? _.filter = t.replace(Y, v) : _.filter = v + " " + t, (0 === e || 1 === e) && 1 === o && 0 === l && 0 === c && 1 === u && (y && -1 === v.indexOf("Dx=0, Dy=0") || b.test(t) && 100 !== parseFloat(RegExp.$1) || -1 === t.indexOf(t.indexOf("Alpha")) && _.removeAttribute("filter")), !y) {
                        var w, j, S, A = 8 > f ? 1 : -1;
                        for (d = r.ieOffsetX || 0, p = r.ieOffsetY || 0, r.ieOffsetX = Math.round((x - ((0 > o ? -o : o) * x + (0 > l ? -l : l) * m)) / 2 + T), r.ieOffsetY = Math.round((m - ((0 > u ? -u : u) * m + (0 > c ? -c : c) * x)) / 2 + P), ve = 0; 4 > ve; ve++) j = ie[ve], w = h[j], i = -1 !== w.indexOf("px") ? parseFloat(w) : $(this.t, j, parseFloat(w), w.replace(g, "")) || 0, S = i !== r[j] ? 2 > ve ? -r.ieOffsetX : -r.ieOffsetY : 2 > ve ? d - r.ieOffsetX : p - r.ieOffsetY, _[j] = (r[j] = Math.round(i - S * (0 === ve || 2 === ve ? 1 : A))) + "px"
                    }
                }
            },
            Be = B.set3DTransformRatio = B.setTransformRatio = function(e) {
                var t, i, r, s, a, n, o, l, c, u, _, h, p, f, x, m, y, v, g, b, T, P, w, j = this.data,
                    S = this.t.style,
                    A = j.rotation,
                    E = j.rotationX,
                    L = j.rotationY,
                    R = j.scaleX,
                    Y = j.scaleY,
                    C = j.scaleZ,
                    k = j.x,
                    M = j.y,
                    O = j.z,
                    D = j.svg,
                    Q = j.perspective,
                    F = j.force3D;
                if (((1 === e || 0 === e) && "auto" === F && (this.tween._totalTime === this.tween._totalDuration || !this.tween._totalTime) || !F) && !O && !Q && !L && !E && 1 === C || Pe && D || !Ee) return void(A || j.skewX || D ? (A *= I, P = j.skewX * I, w = 1e5, t = Math.cos(A) * R, s = Math.sin(A) * R, i = Math.sin(A - P) * -Y, a = Math.cos(A - P) * Y, P && "simple" === j.skewType && (y = Math.tan(P), y = Math.sqrt(1 + y * y), i *= y, a *= y, j.skewY && (t *= y, s *= y)), D && (k += j.xOrigin - (j.xOrigin * t + j.yOrigin * i) + j.xOffset, M += j.yOrigin - (j.xOrigin * s + j.yOrigin * a) + j.yOffset, Pe && (j.xPercent || j.yPercent) && (f = this.t.getBBox(), k += .01 * j.xPercent * f.width, M += .01 * j.yPercent * f.height), f = 1e-6, f > k && k > -f && (k = 0), f > M && M > -f && (M = 0)), g = (t * w | 0) / w + "," + (s * w | 0) / w + "," + (i * w | 0) / w + "," + (a * w | 0) / w + "," + k + "," + M + ")", D && Pe ? this.t.setAttribute("transform", "matrix(" + g) : S[je] = (j.xPercent || j.yPercent ? "translate(" + j.xPercent + "%," + j.yPercent + "%) matrix(" : "matrix(") + g) : S[je] = (j.xPercent || j.yPercent ? "translate(" + j.xPercent + "%," + j.yPercent + "%) matrix(" : "matrix(") + R + ",0,0," + Y + "," + k + "," + M + ")");
                if (d && (f = 1e-4, f > R && R > -f && (R = C = 2e-5), f > Y && Y > -f && (Y = C = 2e-5), !Q || j.z || j.rotationX || j.rotationY || (Q = 0)), A || j.skewX) A *= I, x = t = Math.cos(A), m = s = Math.sin(A), j.skewX && (A -= j.skewX * I, x = Math.cos(A), m = Math.sin(A), "simple" === j.skewType && (y = Math.tan(j.skewX * I), y = Math.sqrt(1 + y * y), x *= y, m *= y, j.skewY && (t *= y, s *= y))), i = -m, a = x;
                else {
                    if (!(L || E || 1 !== C || Q || D)) return void(S[je] = (j.xPercent || j.yPercent ? "translate(" + j.xPercent + "%," + j.yPercent + "%) translate3d(" : "translate3d(") + k + "px," + M + "px," + O + "px)" + (1 !== R || 1 !== Y ? " scale(" + R + "," + Y + ")" : ""));
                    t = a = 1, i = s = 0
                }
                c = 1, r = n = o = l = u = _ = 0, h = Q ? -1 / Q : 0, p = j.zOrigin, f = 1e-6, b = ",", T = "0", A = L * I, A && (x = Math.cos(A), m = Math.sin(A), o = -m, u = h * -m, r = t * m, n = s * m, c = x, h *= x, t *= x, s *= x), A = E * I, A && (x = Math.cos(A), m = Math.sin(A), y = i * x + r * m, v = a * x + n * m, l = c * m, _ = h * m, r = i * -m + r * x, n = a * -m + n * x, c *= x, h *= x, i = y, a = v), 1 !== C && (r *= C, n *= C, c *= C, h *= C), 1 !== Y && (i *= Y, a *= Y, l *= Y, _ *= Y), 1 !== R && (t *= R, s *= R, o *= R, u *= R), (p || D) && (p && (k += r * -p, M += n * -p, O += c * -p + p), D && (k += j.xOrigin - (j.xOrigin * t + j.yOrigin * i) + j.xOffset, M += j.yOrigin - (j.xOrigin * s + j.yOrigin * a) + j.yOffset), f > k && k > -f && (k = T), f > M && M > -f && (M = T), f > O && O > -f && (O = 0)), g = j.xPercent || j.yPercent ? "translate(" + j.xPercent + "%," + j.yPercent + "%) matrix3d(" : "matrix3d(", g += (f > t && t > -f ? T : t) + b + (f > s && s > -f ? T : s) + b + (f > o && o > -f ? T : o), g += b + (f > u && u > -f ? T : u) + b + (f > i && i > -f ? T : i) + b + (f > a && a > -f ? T : a), E || L || 1 !== C ? (g += b + (f > l && l > -f ? T : l) + b + (f > _ && _ > -f ? T : _) + b + (f > r && r > -f ? T : r), g += b + (f > n && n > -f ? T : n) + b + (f > c && c > -f ? T : c) + b + (f > h && h > -f ? T : h) + b) : g += ",0,0,0,0,1,0,", g += k + b + M + b + O + b + (Q ? 1 + -O / Q : 1) + ")", S[je] = g
            };
        c = Le.prototype, c.x = c.y = c.z = c.skewX = c.skewY = c.rotation = c.rotationX = c.rotationY = c.zOrigin = c.xPercent = c.yPercent = c.xOffset = c.yOffset = 0, c.scaleX = c.scaleY = c.scaleZ = 1, be("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,svgOrigin,transformPerspective,directionalRotation,parseTransform,force3D,skewType,xPercent,yPercent,smoothOrigin", {
            parser: function(e, t, i, r, a, o, l) {
                if (r._lastParsedTransform === l) return a;
                r._lastParsedTransform = l;
                var c, u, _, h, d, p, f, x, m, y = e._gsTransform,
                    v = e.style,
                    g = 1e-6,
                    b = we.length,
                    T = l,
                    P = {},
                    w = "transformOrigin",
                    j = Fe(e, s, !0, l.parseTransform);
                if (r._transform = j, "string" == typeof T.transform && je) u = F.style, u[je] = T.transform, u.display = "block", u.position = "absolute", D.body.appendChild(F), c = Fe(F, null, !1), j.svg && (f = j.xOrigin, x = j.yOrigin, c.x -= j.xOffset, c.y -= j.yOffset, (T.transformOrigin || T.svgOrigin) && (_ = {}, Ie(e, se(T.transformOrigin), _, T.svgOrigin, T.smoothOrigin, !0), f = _.xOrigin, x = _.yOrigin, c.x -= _.xOffset - j.xOffset, c.y -= _.yOffset - j.yOffset), (f || x) && (m = Qe(F, !0), c.x -= f - (f * m[0] + x * m[2]), c.y -= x - (f * m[1] + x * m[3]))), D.body.removeChild(F), c.perspective || (c.perspective = j.perspective), null != T.xPercent && (c.xPercent = ne(T.xPercent, j.xPercent)), null != T.yPercent && (c.yPercent = ne(T.yPercent, j.yPercent));
                else if ("object" == typeof T) {
                    if (c = {
                        scaleX: ne(null != T.scaleX ? T.scaleX : T.scale, j.scaleX),
                        scaleY: ne(null != T.scaleY ? T.scaleY : T.scale, j.scaleY),
                        scaleZ: ne(T.scaleZ, j.scaleZ),
                        x: ne(T.x, j.x),
                        y: ne(T.y, j.y),
                        z: ne(T.z, j.z),
                        xPercent: ne(T.xPercent, j.xPercent),
                        yPercent: ne(T.yPercent, j.yPercent),
                        perspective: ne(T.transformPerspective, j.perspective)
                    }, p = T.directionalRotation, null != p)
                        if ("object" == typeof p)
                            for (u in p) T[u] = p[u];
                        else T.rotation = p;
                    "string" == typeof T.x && -1 !== T.x.indexOf("%") && (c.x = 0, c.xPercent = ne(T.x, j.xPercent)), "string" == typeof T.y && -1 !== T.y.indexOf("%") && (c.y = 0, c.yPercent = ne(T.y, j.yPercent)), c.rotation = oe("rotation" in T ? T.rotation : "shortRotation" in T ? T.shortRotation + "_short" : "rotationZ" in T ? T.rotationZ : j.rotation - j.skewY, j.rotation - j.skewY, "rotation", P), Ee && (c.rotationX = oe("rotationX" in T ? T.rotationX : "shortRotationX" in T ? T.shortRotationX + "_short" : j.rotationX || 0, j.rotationX, "rotationX", P), c.rotationY = oe("rotationY" in T ? T.rotationY : "shortRotationY" in T ? T.shortRotationY + "_short" : j.rotationY || 0, j.rotationY, "rotationY", P)), c.skewX = oe(T.skewX, j.skewX - j.skewY), (c.skewY = oe(T.skewY, j.skewY)) && (c.skewX += c.skewY, c.rotation += c.skewY)
                }
                for (Ee && null != T.force3D && (j.force3D = T.force3D, d = !0), j.skewType = T.skewType || j.skewType || n.defaultSkewType, h = j.force3D || j.z || j.rotationX || j.rotationY || c.z || c.rotationX || c.rotationY || c.perspective, h || null == T.scale || (c.scaleZ = 1); --b > -1;) i = we[b], _ = c[i] - j[i], (_ > g || -g > _ || null != T[i] || null != O[i]) && (d = !0, a = new xe(j, i, j[i], _, a), i in P && (a.e = P[i]), a.xs0 = 0, a.plugin = o, r._overwriteProps.push(a.n));
                return _ = T.transformOrigin, j.svg && (_ || T.svgOrigin) && (f = j.xOffset, x = j.yOffset, Ie(e, se(_), c, T.svgOrigin, T.smoothOrigin), a = me(j, "xOrigin", (y ? j : c).xOrigin, c.xOrigin, a, w), a = me(j, "yOrigin", (y ? j : c).yOrigin, c.yOrigin, a, w), (f !== j.xOffset || x !== j.yOffset) && (a = me(j, "xOffset", y ? f : j.xOffset, j.xOffset, a, w), a = me(j, "yOffset", y ? x : j.yOffset, j.yOffset, a, w)), _ = Pe ? null : "0px 0px"), (_ || Ee && h && j.zOrigin) && (je ? (d = !0, i = Ae, _ = (_ || J(e, i, s, !1, "50% 50%")) + "", a = new xe(v, i, 0, 0, a, -1, w), a.b = v[i], a.plugin = o, Ee ? (u = j.zOrigin, _ = _.split(" "), j.zOrigin = (_.length > 2 && (0 === u || "0px" !== _[2]) ? parseFloat(_[2]) : u) || 0, a.xs0 = a.e = _[0] + " " + (_[1] || "50%") + " 0px", a = new xe(j, "zOrigin", 0, 0, a, -1, a.n), a.b = u, a.xs0 = a.e = j.zOrigin) : a.xs0 = a.e = _) : se(_ + "", j)), d && (r._transformType = j.svg && Pe || !h && 3 !== this._transformType ? 2 : 3), a
            },
            prefix: !0
        }), be("boxShadow", {
            defaultValue: "0px 0px 0px 0px #999",
            prefix: !0,
            color: !0,
            multi: !0,
            keyword: "inset"
        }), be("borderRadius", {
            defaultValue: "0px",
            parser: function(e, t, i, a, n, o) {
                t = this.format(t);
                var l, c, u, _, h, d, p, f, x, m, y, v, g, b, T, P, w = ["borderTopLeftRadius", "borderTopRightRadius", "borderBottomRightRadius", "borderBottomLeftRadius"],
                    j = e.style;
                for (x = parseFloat(e.offsetWidth), m = parseFloat(e.offsetHeight), l = t.split(" "), c = 0; c < w.length; c++) this.p.indexOf("border") && (w[c] = W(w[c])), h = _ = J(e, w[c], s, !1, "0px"), -1 !== h.indexOf(" ") && (_ = h.split(" "), h = _[0], _ = _[1]), d = u = l[c], p = parseFloat(h), v = h.substr((p + "").length), g = "=" === d.charAt(1), g ? (f = parseInt(d.charAt(0) + "1", 10), d = d.substr(2), f *= parseFloat(d), y = d.substr((f + "").length - (0 > f ? 1 : 0)) || "") : (f = parseFloat(d), y = d.substr((f + "").length)), "" === y && (y = r[i] || v), y !== v && (b = $(e, "borderLeft", p, v), T = $(e, "borderTop", p, v), "%" === y ? (h = b / x * 100 + "%", _ = T / m * 100 + "%") : "em" === y ? (P = $(e, "borderLeft", 1, "em"), h = b / P + "em", _ = T / P + "em") : (h = b + "px", _ = T + "px"), g && (d = parseFloat(h) + f + y, u = parseFloat(_) + f + y)), n = ye(j, w[c], h + " " + _, d + " " + u, !1, "0px", n);
                return n
            },
            prefix: !0,
            formatter: de("0px 0px 0px 0px", !1, !0)
        }), be("borderBottomLeftRadius,borderBottomRightRadius,borderTopLeftRadius,borderTopRightRadius", {
            defaultValue: "0px",
            parser: function(e, t, i, r, a, n) {
                return ye(e.style, i, this.format(J(e, i, s, !1, "0px 0px")), this.format(t), !1, "0px", a)
            },
            prefix: !0,
            formatter: de("0px 0px", !1, !0)
        }), be("backgroundPosition", {
            defaultValue: "0 0",
            parser: function(e, t, i, r, a, n) {
                var o, l, c, u, _, h, d = "background-position",
                    p = s || G(e, null),
                    x = this.format((p ? f ? p.getPropertyValue(d + "-x") + " " + p.getPropertyValue(d + "-y") : p.getPropertyValue(d) : e.currentStyle.backgroundPositionX + " " + e.currentStyle.backgroundPositionY) || "0 0"),
                    m = this.format(t);
                if (-1 !== x.indexOf("%") != (-1 !== m.indexOf("%")) && m.split(",").length < 2 && (h = J(e, "backgroundImage").replace(A, ""), h && "none" !== h)) {
                    for (o = x.split(" "), l = m.split(" "), N.setAttribute("src", h), c = 2; --c > -1;) x = o[c], u = -1 !== x.indexOf("%"), u !== (-1 !== l[c].indexOf("%")) && (_ = 0 === c ? e.offsetWidth - N.width : e.offsetHeight - N.height, o[c] = u ? parseFloat(x) / 100 * _ + "px" : parseFloat(x) / _ * 100 + "%");
                    x = o.join(" ")
                }
                return this.parseComplex(e.style, x, m, a, n)
            },
            formatter: se
        }), be("backgroundSize", {
            defaultValue: "0 0",
            formatter: se
        }), be("perspective", {
            defaultValue: "0px",
            prefix: !0
        }), be("perspectiveOrigin", {
            defaultValue: "50% 50%",
            prefix: !0
        }), be("transformStyle", {
            prefix: !0
        }), be("backfaceVisibility", {
            prefix: !0
        }), be("userSelect", {
            prefix: !0
        }), be("margin", {
            parser: pe("marginTop,marginRight,marginBottom,marginLeft")
        }), be("padding", {
            parser: pe("paddingTop,paddingRight,paddingBottom,paddingLeft")
        }), be("clip", {
            defaultValue: "rect(0px,0px,0px,0px)",
            parser: function(e, t, i, r, a, n) {
                var o, l, c;
                return 9 > f ? (l = e.currentStyle, c = 8 > f ? " " : ",", o = "rect(" + l.clipTop + c + l.clipRight + c + l.clipBottom + c + l.clipLeft + ")", t = this.format(t).split(",").join(c)) : (o = this.format(J(e, this.p, s, !1, this.dflt)), t = this.format(t)), this.parseComplex(e.style, o, t, a, n)
            }
        }), be("textShadow", {
            defaultValue: "0px 0px 0px #999",
            color: !0,
            multi: !0
        }), be("autoRound,strictUnits", {
            parser: function(e, t, i, r, s) {
                return s
            }
        }), be("border", {
            defaultValue: "0px solid #000",
            parser: function(e, t, i, r, a, n) {
                var o = J(e, "borderTopWidth", s, !1, "0px"),
                    l = this.format(t).split(" "),
                    c = l[0].replace(g, "");
                return "px" !== c && (o = parseFloat(o) / $(e, "borderTopWidth", 1, c) + c), this.parseComplex(e.style, this.format(o + " " + J(e, "borderTopStyle", s, !1, "solid") + " " + J(e, "borderTopColor", s, !1, "#000")), l.join(" "), a, n)
            },
            color: !0,
            formatter: function(e) {
                var t = e.split(" ");
                return t[0] + " " + (t[1] || "solid") + " " + (e.match(he) || ["#000"])[0]
            }
        }), be("borderWidth", {
            parser: pe("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")
        }), be("float,cssFloat,styleFloat", {
            parser: function(e, t, i, r, s, a) {
                var n = e.style,
                    o = "cssFloat" in n ? "cssFloat" : "styleFloat";
                return new xe(n, o, 0, 0, s, -1, i, !1, 0, n[o], t)
            }
        });
        var qe = function(e) {
            var t, i = this.t,
                r = i.filter || J(this.data, "filter") || "",
                s = this.s + this.c * e | 0;
            100 === s && (-1 === r.indexOf("atrix(") && -1 === r.indexOf("radient(") && -1 === r.indexOf("oader(") ? (i.removeAttribute("filter"), t = !J(this.data, "filter")) : (i.filter = r.replace(P, ""), t = !0)), t || (this.xn1 && (i.filter = r = r || "alpha(opacity=" + s + ")"), -1 === r.indexOf("pacity") ? 0 === s && this.xn1 || (i.filter = r + " alpha(opacity=" + s + ")") : i.filter = r.replace(b, "opacity=" + s))
        };
        be("opacity,alpha,autoAlpha", {
            defaultValue: "1",
            parser: function(e, t, i, r, a, n) {
                var o = parseFloat(J(e, "opacity", s, !1, "1")),
                    l = e.style,
                    c = "autoAlpha" === i;
                return "string" == typeof t && "=" === t.charAt(1) && (t = ("-" === t.charAt(0) ? -1 : 1) * parseFloat(t.substr(2)) + o), c && 1 === o && "hidden" === J(e, "visibility", s) && 0 !== t && (o = 0), U ? a = new xe(l, "opacity", o, t - o, a) : (a = new xe(l, "opacity", 100 * o, 100 * (t - o), a), a.xn1 = c ? 1 : 0, l.zoom = 1, a.type = 2, a.b = "alpha(opacity=" + a.s + ")", a.e = "alpha(opacity=" + (a.s + a.c) + ")", a.data = e, a.plugin = n, a.setRatio = qe), c && (a = new xe(l, "visibility", 0, 0, a, -1, null, !1, 0, 0 !== o ? "inherit" : "hidden", 0 === t ? "hidden" : "inherit"), a.xs0 = "inherit", r._overwriteProps.push(a.n), r._overwriteProps.push(i)), a
            }
        });
        var Ue = function(e, t) {
                t && (e.removeProperty ? (("ms" === t.substr(0, 2) || "webkit" === t.substr(0, 6)) && (t = "-" + t), e.removeProperty(t.replace(j, "-$1").toLowerCase())) : e.removeAttribute(t))
            },
            Xe = function(e) {
                if (this.t._gsClassPT = this, 1 === e || 0 === e) {
                    this.t.setAttribute("class", 0 === e ? this.b : this.e);
                    for (var t = this.data, i = this.t.style; t;) t.v ? i[t.p] = t.v : Ue(i, t.p), t = t._next;
                    1 === e && this.t._gsClassPT === this && (this.t._gsClassPT = null)
                } else this.t.getAttribute("class") !== this.e && this.t.setAttribute("class", this.e)
            };
        be("className", {
            parser: function(e, t, r, a, n, o, l) {
                var c, u, _, h, d, p = e.getAttribute("class") || "",
                    f = e.style.cssText;
                if (n = a._classNamePT = new xe(e, r, 0, 0, n, 2), n.setRatio = Xe, n.pr = -11, i = !0, n.b = p, u = K(e, s), _ = e._gsClassPT) {
                    for (h = {}, d = _.data; d;) h[d.p] = 1, d = d._next;
                    _.setRatio(1)
                }
                return e._gsClassPT = n, n.e = "=" !== t.charAt(1) ? t : p.replace(new RegExp("(?:\\s|^)" + t.substr(2) + "(?![\\w-])"), "") + ("+" === t.charAt(0) ? " " + t.substr(2) : ""), e.setAttribute("class", n.e), c = ee(e, u, K(e), l, h), e.setAttribute("class", p), n.data = c.firstMPT, e.style.cssText = f, n = n.xfirst = a.parse(e, c.difs, n, o)
            }
        });
        var ze = function(e) {
            if ((1 === e || 0 === e) && this.data._totalTime === this.data._totalDuration && "isFromStart" !== this.data.data) {
                var t, i, r, s, a, n = this.t.style,
                    o = l.transform.parse;
                if ("all" === this.e) n.cssText = "", s = !0;
                else
                    for (t = this.e.split(" ").join("").split(","), r = t.length; --r > -1;) i = t[r], l[i] && (l[i].parse === o ? s = !0 : i = "transformOrigin" === i ? Ae : l[i].p), Ue(n, i);
                s && (Ue(n, je), a = this.t._gsTransform, a && (a.svg && (this.t.removeAttribute("data-svg-origin"), this.t.removeAttribute("transform")), delete this.t._gsTransform))
            }
        };
        for (be("clearProps", {
            parser: function(e, t, r, s, a) {
                return a = new xe(e, r, 0, 0, a, 2), a.setRatio = ze, a.e = t, a.pr = -10, a.data = s._tween, i = !0, a
            }
        }), c = "bezier,throwProps,physicsProps,physics2D".split(","), ve = c.length; ve--;) Te(c[ve]);
        c = n.prototype, c._firstPT = c._lastParsedTransform = c._transform = null, c._onInitTween = function(e, t, o) {
            if (!e.nodeType) return !1;
            this._target = e, this._tween = o, this._vars = t, u = t.autoRound, i = !1, r = t.suffixMap || n.suffixMap, s = G(e, ""), a = this._overwriteProps;
            var c, d, f, x, m, y, v, g, b, P = e.style;
            if (_ && "" === P.zIndex && (c = J(e, "zIndex", s), ("auto" === c || "" === c) && this._addLazySet(P, "zIndex", 0)), "string" == typeof t && (x = P.cssText, c = K(e, s), P.cssText = x + ";" + t, c = ee(e, c, K(e)).difs, !U && T.test(t) && (c.opacity = parseFloat(RegExp.$1)), t = c, P.cssText = x), t.className ? this._firstPT = d = l.className.parse(e, t.className, "className", this, null, null, t) : this._firstPT = d = this.parse(e, t, null), this._transformType) {
                for (b = 3 === this._transformType, je ? h && (_ = !0, "" === P.zIndex && (v = J(e, "zIndex", s), ("auto" === v || "" === v) && this._addLazySet(P, "zIndex", 0)), p && this._addLazySet(P, "WebkitBackfaceVisibility", this._vars.WebkitBackfaceVisibility || (b ? "visible" : "hidden"))) : P.zoom = 1, f = d; f && f._next;) f = f._next;
                g = new xe(e, "transform", 0, 0, null, 2), this._linkCSSP(g, null, f), g.setRatio = je ? Be : Ne, g.data = this._transform || Fe(e, s, !0), g.tween = o, g.pr = -1, a.pop()
            }
            if (i) {
                for (; d;) {
                    for (y = d._next, f = x; f && f.pr > d.pr;) f = f._next;
                    (d._prev = f ? f._prev : m) ? d._prev._next = d: x = d, (d._next = f) ? f._prev = d : m = d, d = y
                }
                this._firstPT = x
            }
            return !0
        }, c.parse = function(e, t, i, a) {
            var n, o, c, _, h, d, p, f, x, m, y = e.style;
            for (n in t) d = t[n], o = l[n], o ? i = o.parse(e, d, n, this, i, a, t) : (h = J(e, n, s) + "", x = "string" == typeof d, "color" === n || "fill" === n || "stroke" === n || -1 !== n.indexOf("Color") || x && w.test(d) ? (x || (d = ue(d), d = (d.length > 3 ? "rgba(" : "rgb(") + d.join(",") + ")"), i = ye(y, n, h, d, !0, "transparent", i, 0, a)) : x && k.test(d) ? i = ye(y, n, h, d, !0, null, i, 0, a) : (c = parseFloat(h), p = c || 0 === c ? h.substr((c + "").length) : "", ("" === h || "auto" === h) && ("width" === n || "height" === n ? (c = re(e, n, s), p = "px") : "left" === n || "top" === n ? (c = Z(e, n, s), p = "px") : (c = "opacity" !== n ? 0 : 1, p = "")), m = x && "=" === d.charAt(1), m ? (_ = parseInt(d.charAt(0) + "1", 10), d = d.substr(2), _ *= parseFloat(d), f = d.replace(g, "")) : (_ = parseFloat(d), f = x ? d.replace(g, "") : ""), "" === f && (f = n in r ? r[n] : p), d = _ || 0 === _ ? (m ? _ + c : _) + f : t[n], p !== f && "" !== f && (_ || 0 === _) && c && (c = $(e, n, c, p), "%" === f ? (c /= $(e, n, 100, "%") / 100, t.strictUnits !== !0 && (h = c + "%")) : "em" === f || "rem" === f || "vw" === f || "vh" === f ? c /= $(e, n, 1, f) : "px" !== f && (_ = $(e, n, _, f), f = "px"), m && (_ || 0 === _) && (d = _ + c + f)), m && (_ += c), !c && 0 !== c || !_ && 0 !== _ ? void 0 !== y[n] && (d || d + "" != "NaN" && null != d) ? (i = new xe(y, n, _ || c || 0, 0, i, -1, n, !1, 0, h, d), i.xs0 = "none" !== d || "display" !== n && -1 === n.indexOf("Style") ? d : h) : z("invalid " + n + " tween value: " + t[n]) : (i = new xe(y, n, c, _ - c, i, 0, n, u !== !1 && ("px" === f || "zIndex" === n), 0, h, d), i.xs0 = f))), a && i && !i.plugin && (i.plugin = a);
            return i
        }, c.setRatio = function(e) {
            var t, i, r, s = this._firstPT,
                a = 1e-6;
            if (1 !== e || this._tween._time !== this._tween._duration && 0 !== this._tween._time)
                if (e || this._tween._time !== this._tween._duration && 0 !== this._tween._time || this._tween._rawPrevTime === -1e-6)
                    for (; s;) {
                        if (t = s.c * e + s.s, s.r ? t = Math.round(t) : a > t && t > -a && (t = 0), s.type)
                            if (1 === s.type)
                                if (r = s.l, 2 === r) s.t[s.p] = s.xs0 + t + s.xs1 + s.xn1 + s.xs2;
                                else if (3 === r) s.t[s.p] = s.xs0 + t + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3;
                                else if (4 === r) s.t[s.p] = s.xs0 + t + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3 + s.xn3 + s.xs4;
                                else if (5 === r) s.t[s.p] = s.xs0 + t + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3 + s.xn3 + s.xs4 + s.xn4 + s.xs5;
                                else {
                                    for (i = s.xs0 + t + s.xs1, r = 1; r < s.l; r++) i += s["xn" + r] + s["xs" + (r + 1)];
                                    s.t[s.p] = i
                                } else -1 === s.type ? s.t[s.p] = s.xs0 : s.setRatio && s.setRatio(e);
                        else s.t[s.p] = t + s.xs0;
                        s = s._next
                    } else
                    for (; s;) 2 !== s.type ? s.t[s.p] = s.b : s.setRatio(e), s = s._next;
            else
                for (; s;) {
                    if (2 !== s.type)
                        if (s.r && -1 !== s.type)
                            if (t = Math.round(s.s + s.c), s.type) {
                                if (1 === s.type) {
                                    for (r = s.l, i = s.xs0 + t + s.xs1, r = 1; r < s.l; r++) i += s["xn" + r] + s["xs" + (r + 1)];
                                    s.t[s.p] = i
                                }
                            } else s.t[s.p] = t + s.xs0;
                        else s.t[s.p] = s.e;
                    else s.setRatio(e);
                    s = s._next
                }
        }, c._enableTransforms = function(e) {
            this._transform = this._transform || Fe(this._target, s, !0), this._transformType = this._transform.svg && Pe || !e && 3 !== this._transformType ? 2 : 3
        };
        var He = function(e) {
            this.t[this.p] = this.e, this.data._linkCSSP(this, this._next, null, !0)
        };
        c._addLazySet = function(e, t, i) {
            var r = this._firstPT = new xe(e, t, 0, 0, this._firstPT, 2);
            r.e = i, r.setRatio = He, r.data = this
        }, c._linkCSSP = function(e, t, i, r) {
            return e && (t && (t._prev = e), e._next && (e._next._prev = e._prev), e._prev ? e._prev._next = e._next : this._firstPT === e && (this._firstPT = e._next, r = !0), i ? i._next = e : r || null !== this._firstPT || (this._firstPT = e),
                e._next = t, e._prev = i), e
        }, c._kill = function(t) {
            var i, r, s, a = t;
            if (t.autoAlpha || t.alpha) {
                a = {};
                for (r in t) a[r] = t[r];
                a.opacity = 1, a.autoAlpha && (a.visibility = 1)
            }
            return t.className && (i = this._classNamePT) && (s = i.xfirst, s && s._prev ? this._linkCSSP(s._prev, i._next, s._prev._prev) : s === this._firstPT && (this._firstPT = i._next), i._next && this._linkCSSP(i._next, i._next._next, s._prev), this._classNamePT = null), e.prototype._kill.call(this, a)
        };
        var Ve = function(e, t, i) {
            var r, s, a, n;
            if (e.slice)
                for (s = e.length; --s > -1;) Ve(e[s], t, i);
            else
                for (r = e.childNodes, s = r.length; --s > -1;) a = r[s], n = a.type, a.style && (t.push(K(a)), i && i.push(a)), 1 !== n && 9 !== n && 11 !== n || !a.childNodes.length || Ve(a, t, i)
        };
        return n.cascadeTo = function(e, i, r) {
            var s, a, n, o, l = t.to(e, i, r),
                c = [l],
                u = [],
                _ = [],
                h = [],
                d = t._internals.reservedProps;
            for (e = l._targets || l.target, Ve(e, u, h), l.render(i, !0, !0), Ve(e, _), l.render(0, !0, !0), l._enabled(!0), s = h.length; --s > -1;)
                if (a = ee(h[s], u[s], _[s]), a.firstMPT) {
                    a = a.difs;
                    for (n in r) d[n] && (a[n] = r[n]);
                    o = {};
                    for (n in a) o[n] = u[s][n];
                    c.push(t.fromTo(h[s], i, o, a))
                } return c
        }, e.activate([n]), n
    }, !0),
        function() {
            var e = _gsScope._gsDefine.plugin({
                    propName: "roundProps",
                    version: "1.5",
                    priority: -1,
                    API: 2,
                    init: function(e, t, i) {
                        return this._tween = i, !0
                    }
                }),
                t = function(e) {
                    for (; e;) e.f || e.blob || (e.r = 1), e = e._next
                },
                i = e.prototype;
            i._onInitAllProps = function() {
                for (var e, i, r, s = this._tween, a = s.vars.roundProps.join ? s.vars.roundProps : s.vars.roundProps.split(","), n = a.length, o = {}, l = s._propLookup.roundProps; --n > -1;) o[a[n]] = 1;
                for (n = a.length; --n > -1;)
                    for (e = a[n], i = s._firstPT; i;) r = i._next, i.pg ? i.t._roundProps(o, !0) : i.n === e && (2 === i.f && i.t ? t(i.t._firstPT) : (this._add(i.t, e, i.s, i.c), r && (r._prev = i._prev), i._prev ? i._prev._next = r : s._firstPT === i && (s._firstPT = r), i._next = i._prev = null, s._propLookup[e] = l)), i = r;
                return !1
            }, i._add = function(e, t, i, r) {
                this._addTween(e, t, i, i + r, t, !0), this._overwriteProps.push(t)
            }
        }(),
        function() {
            _gsScope._gsDefine.plugin({
                propName: "attr",
                API: 2,
                version: "0.5.0",
                init: function(e, t, i) {
                    var r;
                    if ("function" != typeof e.setAttribute) return !1;
                    for (r in t) this._addTween(e, "setAttribute", e.getAttribute(r) + "", t[r] + "", r, !1, r), this._overwriteProps.push(r);
                    return !0
                }
            })
        }(), _gsScope._gsDefine.plugin({
        propName: "directionalRotation",
        version: "0.2.1",
        API: 2,
        init: function(e, t, i) {
            "object" != typeof t && (t = {
                rotation: t
            }), this.finals = {};
            var r, s, a, n, o, l, c = t.useRadians === !0 ? 2 * Math.PI : 360,
                u = 1e-6;
            for (r in t) "useRadians" !== r && (l = (t[r] + "").split("_"), s = l[0], a = parseFloat("function" != typeof e[r] ? e[r] : e[r.indexOf("set") || "function" != typeof e["get" + r.substr(3)] ? r : "get" + r.substr(3)]()), n = this.finals[r] = "string" == typeof s && "=" === s.charAt(1) ? a + parseInt(s.charAt(0) + "1", 10) * Number(s.substr(2)) : Number(s) || 0, o = n - a, l.length && (s = l.join("_"), -1 !== s.indexOf("short") && (o %= c, o !== o % (c / 2) && (o = 0 > o ? o + c : o - c)), -1 !== s.indexOf("_cw") && 0 > o ? o = (o + 9999999999 * c) % c - (o / c | 0) * c : -1 !== s.indexOf("ccw") && o > 0 && (o = (o - 9999999999 * c) % c - (o / c | 0) * c)), (o > u || -u > o) && (this._addTween(e, r, a, a + o, r), this._overwriteProps.push(r)));
            return !0
        },
        set: function(e) {
            var t;
            if (1 !== e) this._super.setRatio.call(this, e);
            else
                for (t = this._firstPT; t;) t.f ? t.t[t.p](this.finals[t.p]) : t.t[t.p] = this.finals[t.p], t = t._next
        }
    })._autoCSS = !0, _gsScope._gsDefine("easing.Back", ["easing.Ease"], function(e) {
        var t, i, r, s = _gsScope.GreenSockGlobals || _gsScope,
            a = s.com.greensock,
            n = 2 * Math.PI,
            o = Math.PI / 2,
            l = a._class,
            c = function(t, i) {
                var r = l("easing." + t, function() {}, !0),
                    s = r.prototype = new e;
                return s.constructor = r, s.getRatio = i, r
            },
            u = e.register || function() {},
            _ = function(e, t, i, r, s) {
                var a = l("easing." + e, {
                    easeOut: new t,
                    easeIn: new i,
                    easeInOut: new r
                }, !0);
                return u(a, e), a
            },
            h = function(e, t, i) {
                this.t = e, this.v = t, i && (this.next = i, i.prev = this, this.c = i.v - t, this.gap = i.t - e)
            },
            d = function(t, i) {
                var r = l("easing." + t, function(e) {
                        this._p1 = e || 0 === e ? e : 1.70158, this._p2 = 1.525 * this._p1
                    }, !0),
                    s = r.prototype = new e;
                return s.constructor = r, s.getRatio = i, s.config = function(e) {
                    return new r(e)
                }, r
            },
            p = _("Back", d("BackOut", function(e) {
                return (e -= 1) * e * ((this._p1 + 1) * e + this._p1) + 1
            }), d("BackIn", function(e) {
                return e * e * ((this._p1 + 1) * e - this._p1)
            }), d("BackInOut", function(e) {
                return (e *= 2) < 1 ? .5 * e * e * ((this._p2 + 1) * e - this._p2) : .5 * ((e -= 2) * e * ((this._p2 + 1) * e + this._p2) + 2)
            })),
            f = l("easing.SlowMo", function(e, t, i) {
                t = t || 0 === t ? t : .7, null == e ? e = .7 : e > 1 && (e = 1), this._p = 1 !== e ? t : 0, this._p1 = (1 - e) / 2, this._p2 = e, this._p3 = this._p1 + this._p2, this._calcEnd = i === !0
            }, !0),
            x = f.prototype = new e;
        return x.constructor = f, x.getRatio = function(e) {
            var t = e + (.5 - e) * this._p;
            return e < this._p1 ? this._calcEnd ? 1 - (e = 1 - e / this._p1) * e : t - (e = 1 - e / this._p1) * e * e * e * t : e > this._p3 ? this._calcEnd ? 1 - (e = (e - this._p3) / this._p1) * e : t + (e - t) * (e = (e - this._p3) / this._p1) * e * e * e : this._calcEnd ? 1 : t
        }, f.ease = new f(.7, .7), x.config = f.config = function(e, t, i) {
            return new f(e, t, i)
        }, t = l("easing.SteppedEase", function(e) {
            e = e || 1, this._p1 = 1 / e, this._p2 = e + 1
        }, !0), x = t.prototype = new e, x.constructor = t, x.getRatio = function(e) {
            return 0 > e ? e = 0 : e >= 1 && (e = .999999999), (this._p2 * e >> 0) * this._p1
        }, x.config = t.config = function(e) {
            return new t(e)
        }, i = l("easing.RoughEase", function(t) {
            t = t || {};
            for (var i, r, s, a, n, o, l = t.taper || "none", c = [], u = 0, _ = 0 | (t.points || 20), d = _, p = t.randomize !== !1, f = t.clamp === !0, x = t.template instanceof e ? t.template : null, m = "number" == typeof t.strength ? .4 * t.strength : .4; --d > -1;) i = p ? Math.random() : 1 / _ * d, r = x ? x.getRatio(i) : i, "none" === l ? s = m : "out" === l ? (a = 1 - i, s = a * a * m) : "in" === l ? s = i * i * m : .5 > i ? (a = 2 * i, s = a * a * .5 * m) : (a = 2 * (1 - i), s = a * a * .5 * m), p ? r += Math.random() * s - .5 * s : d % 2 ? r += .5 * s : r -= .5 * s, f && (r > 1 ? r = 1 : 0 > r && (r = 0)), c[u++] = {
                x: i,
                y: r
            };
            for (c.sort(function(e, t) {
                return e.x - t.x
            }), o = new h(1, 1, null), d = _; --d > -1;) n = c[d], o = new h(n.x, n.y, o);
            this._prev = new h(0, 0, 0 !== o.t ? o : o.next)
        }, !0), x = i.prototype = new e, x.constructor = i, x.getRatio = function(e) {
            var t = this._prev;
            if (e > t.t) {
                for (; t.next && e >= t.t;) t = t.next;
                t = t.prev
            } else
                for (; t.prev && e <= t.t;) t = t.prev;
            return this._prev = t, t.v + (e - t.t) / t.gap * t.c
        }, x.config = function(e) {
            return new i(e)
        }, i.ease = new i, _("Bounce", c("BounceOut", function(e) {
            return 1 / 2.75 > e ? 7.5625 * e * e : 2 / 2.75 > e ? 7.5625 * (e -= 1.5 / 2.75) * e + .75 : 2.5 / 2.75 > e ? 7.5625 * (e -= 2.25 / 2.75) * e + .9375 : 7.5625 * (e -= 2.625 / 2.75) * e + .984375
        }), c("BounceIn", function(e) {
            return (e = 1 - e) < 1 / 2.75 ? 1 - 7.5625 * e * e : 2 / 2.75 > e ? 1 - (7.5625 * (e -= 1.5 / 2.75) * e + .75) : 2.5 / 2.75 > e ? 1 - (7.5625 * (e -= 2.25 / 2.75) * e + .9375) : 1 - (7.5625 * (e -= 2.625 / 2.75) * e + .984375)
        }), c("BounceInOut", function(e) {
            var t = .5 > e;
            return e = t ? 1 - 2 * e : 2 * e - 1, e = 1 / 2.75 > e ? 7.5625 * e * e : 2 / 2.75 > e ? 7.5625 * (e -= 1.5 / 2.75) * e + .75 : 2.5 / 2.75 > e ? 7.5625 * (e -= 2.25 / 2.75) * e + .9375 : 7.5625 * (e -= 2.625 / 2.75) * e + .984375, t ? .5 * (1 - e) : .5 * e + .5
        })), _("Circ", c("CircOut", function(e) {
            return Math.sqrt(1 - (e -= 1) * e)
        }), c("CircIn", function(e) {
            return -(Math.sqrt(1 - e * e) - 1)
        }), c("CircInOut", function(e) {
            return (e *= 2) < 1 ? -.5 * (Math.sqrt(1 - e * e) - 1) : .5 * (Math.sqrt(1 - (e -= 2) * e) + 1)
        })), r = function(t, i, r) {
            var s = l("easing." + t, function(e, t) {
                    this._p1 = e >= 1 ? e : 1, this._p2 = (t || r) / (1 > e ? e : 1), this._p3 = this._p2 / n * (Math.asin(1 / this._p1) || 0), this._p2 = n / this._p2
                }, !0),
                a = s.prototype = new e;
            return a.constructor = s, a.getRatio = i, a.config = function(e, t) {
                return new s(e, t)
            }, s
        }, _("Elastic", r("ElasticOut", function(e) {
            return this._p1 * Math.pow(2, -10 * e) * Math.sin((e - this._p3) * this._p2) + 1
        }, .3), r("ElasticIn", function(e) {
            return -(this._p1 * Math.pow(2, 10 * (e -= 1)) * Math.sin((e - this._p3) * this._p2))
        }, .3), r("ElasticInOut", function(e) {
            return (e *= 2) < 1 ? -.5 * (this._p1 * Math.pow(2, 10 * (e -= 1)) * Math.sin((e - this._p3) * this._p2)) : this._p1 * Math.pow(2, -10 * (e -= 1)) * Math.sin((e - this._p3) * this._p2) * .5 + 1
        }, .45)), _("Expo", c("ExpoOut", function(e) {
            return 1 - Math.pow(2, -10 * e)
        }), c("ExpoIn", function(e) {
            return Math.pow(2, 10 * (e - 1)) - .001
        }), c("ExpoInOut", function(e) {
            return (e *= 2) < 1 ? .5 * Math.pow(2, 10 * (e - 1)) : .5 * (2 - Math.pow(2, -10 * (e - 1)))
        })), _("Sine", c("SineOut", function(e) {
            return Math.sin(e * o)
        }), c("SineIn", function(e) {
            return -Math.cos(e * o) + 1
        }), c("SineInOut", function(e) {
            return -.5 * (Math.cos(Math.PI * e) - 1)
        })), l("easing.EaseLookup", {
            find: function(t) {
                return e.map[t]
            }
        }, !0), u(s.SlowMo, "SlowMo", "ease,"), u(i, "RoughEase", "ease,"), u(t, "SteppedEase", "ease,"), p
    }, !0)
}), _gsScope._gsDefine && _gsScope._gsQueue.pop()(),
    function(e, t) {
        "use strict";
        var i = {},
            r = e.GreenSockGlobals = e.GreenSockGlobals || e;
        if (!r.TweenLite) {
            var s, a, n, o, l, c = function(e) {
                    var t, i = e.split("."),
                        s = r;
                    for (t = 0; t < i.length; t++) s[i[t]] = s = s[i[t]] || {};
                    return s
                },
                u = c("com.greensock"),
                _ = 1e-10,
                h = function(e) {
                    var t, i = [],
                        r = e.length;
                    for (t = 0; t !== r; i.push(e[t++]));
                    return i
                },
                d = function() {},
                p = function() {
                    var e = Object.prototype.toString,
                        t = e.call([]);
                    return function(i) {
                        return null != i && (i instanceof Array || "object" == typeof i && !!i.push && e.call(i) === t)
                    }
                }(),
                f = {},
                x = function(s, a, n, o) {
                    this.sc = f[s] ? f[s].sc : [], f[s] = this, this.gsClass = null, this.func = n;
                    var l = [];
                    this.check = function(u) {
                        for (var _, h, d, p, m, y = a.length, v = y; --y > -1;)(_ = f[a[y]] || new x(a[y], [])).gsClass ? (l[y] = _.gsClass, v--) : u && _.sc.push(this);
                        if (0 === v && n) {
                            if (h = ("com.greensock." + s).split("."), d = h.pop(), p = c(h.join("."))[d] = this.gsClass = n.apply(n, l), o)
                                if (r[d] = p, m = "undefined" != typeof module && module.exports, !m && "function" == typeof define && define.amd) define((e.GreenSockAMDPath ? e.GreenSockAMDPath + "/" : "") + s.split(".").pop(), [], function() {
                                    return p
                                });
                                else if (m)
                                    if (s === t) {
                                        module.exports = i[t] = p;
                                        for (y in i) p[y] = i[y]
                                    } else i[t] && (i[t][d] = p);
                            for (y = 0; y < this.sc.length; y++) this.sc[y].check()
                        }
                    }, this.check(!0)
                },
                m = e._gsDefine = function(e, t, i, r) {
                    return new x(e, t, i, r)
                },
                y = u._class = function(e, t, i) {
                    return t = t || function() {}, m(e, [], function() {
                        return t
                    }, i), t
                };
            m.globals = r;
            var v = [0, 0, 1, 1],
                g = [],
                b = y("easing.Ease", function(e, t, i, r) {
                    this._func = e, this._type = i || 0, this._power = r || 0, this._params = t ? v.concat(t) : v
                }, !0),
                T = b.map = {},
                P = b.register = function(e, t, i, r) {
                    for (var s, a, n, o, l = t.split(","), c = l.length, _ = (i || "easeIn,easeOut,easeInOut").split(","); --c > -1;)
                        for (a = l[c], s = r ? y("easing." + a, null, !0) : u.easing[a] || {}, n = _.length; --n > -1;) o = _[n], T[a + "." + o] = T[o + a] = s[o] = e.getRatio ? e : e[o] || new e
                };
            for (n = b.prototype, n._calcEnd = !1, n.getRatio = function(e) {
                if (this._func) return this._params[0] = e, this._func.apply(null, this._params);
                var t = this._type,
                    i = this._power,
                    r = 1 === t ? 1 - e : 2 === t ? e : .5 > e ? 2 * e : 2 * (1 - e);
                return 1 === i ? r *= r : 2 === i ? r *= r * r : 3 === i ? r *= r * r * r : 4 === i && (r *= r * r * r * r), 1 === t ? 1 - r : 2 === t ? r : .5 > e ? r / 2 : 1 - r / 2
            }, s = ["Linear", "Quad", "Cubic", "Quart", "Quint,Strong"], a = s.length; --a > -1;) n = s[a] + ",Power" + a, P(new b(null, null, 1, a), n, "easeOut", !0), P(new b(null, null, 2, a), n, "easeIn" + (0 === a ? ",easeNone" : "")), P(new b(null, null, 3, a), n, "easeInOut");
            T.linear = u.easing.Linear.easeIn, T.swing = u.easing.Quad.easeInOut;
            var w = y("events.EventDispatcher", function(e) {
                this._listeners = {}, this._eventTarget = e || this
            });
            n = w.prototype, n.addEventListener = function(e, t, i, r, s) {
                s = s || 0;
                var a, n, c = this._listeners[e],
                    u = 0;
                for (this !== o || l || o.wake(), null == c && (this._listeners[e] = c = []), n = c.length; --n > -1;) a = c[n], a.c === t && a.s === i ? c.splice(n, 1) : 0 === u && a.pr < s && (u = n + 1);
                c.splice(u, 0, {
                    c: t,
                    s: i,
                    up: r,
                    pr: s
                })
            }, n.removeEventListener = function(e, t) {
                var i, r = this._listeners[e];
                if (r)
                    for (i = r.length; --i > -1;)
                        if (r[i].c === t) return void r.splice(i, 1)
            }, n.dispatchEvent = function(e) {
                var t, i, r, s = this._listeners[e];
                if (s)
                    for (t = s.length, i = this._eventTarget; --t > -1;) r = s[t], r && (r.up ? r.c.call(r.s || i, {
                        type: e,
                        target: i
                    }) : r.c.call(r.s || i))
            };
            var j = e.requestAnimationFrame,
                S = e.cancelAnimationFrame,
                A = Date.now || function() {
                    return (new Date).getTime()
                },
                E = A();
            for (s = ["ms", "moz", "webkit", "o"], a = s.length; --a > -1 && !j;) j = e[s[a] + "RequestAnimationFrame"], S = e[s[a] + "CancelAnimationFrame"] || e[s[a] + "CancelRequestAnimationFrame"];
            y("Ticker", function(e, t) {
                var i, r, s, a, n, c = this,
                    u = A(),
                    h = t !== !1 && j ? "auto" : !1,
                    p = 500,
                    f = 33,
                    x = "tick",
                    m = function(e) {
                        var t, o, l = A() - E;
                        l > p && (u += l - f), E += l, c.time = (E - u) / 1e3, t = c.time - n, (!i || t > 0 || e === !0) && (c.frame++, n += t + (t >= a ? .004 : a - t), o = !0), e !== !0 && (s = r(m)), o && c.dispatchEvent(x)
                    };
                w.call(c), c.time = c.frame = 0, c.tick = function() {
                    m(!0)
                }, c.lagSmoothing = function(e, t) {
                    p = e || 1 / _, f = Math.min(t, p, 0)
                }, c.sleep = function() {
                    null != s && (h && S ? S(s) : clearTimeout(s), r = d, s = null, c === o && (l = !1))
                }, c.wake = function(e) {
                    null !== s ? c.sleep() : e ? u += -E + (E = A()) : c.frame > 10 && (E = A() - p + 5), r = 0 === i ? d : h && j ? j : function(e) {
                        return setTimeout(e, 1e3 * (n - c.time) + 1 | 0)
                    }, c === o && (l = !0), m(2)
                }, c.fps = function(e) {
                    return arguments.length ? (i = e, a = 1 / (i || 60), n = this.time + a, void c.wake()) : i
                }, c.useRAF = function(e) {
                    return arguments.length ? (c.sleep(), h = e, void c.fps(i)) : h
                }, c.fps(e), setTimeout(function() {
                    "auto" === h && c.frame < 5 && "hidden" !== document.visibilityState && c.useRAF(!1)
                }, 1500)
            }), n = u.Ticker.prototype = new u.events.EventDispatcher, n.constructor = u.Ticker;
            var L = y("core.Animation", function(e, t) {
                if (this.vars = t = t || {}, this._duration = this._totalDuration = e || 0, this._delay = Number(t.delay) || 0, this._timeScale = 1, this._active = t.immediateRender === !0, this.data = t.data, this._reversed = t.reversed === !0, W) {
                    l || o.wake();
                    var i = this.vars.useFrames ? V : W;
                    i.add(this, i._time), this.vars.paused && this.paused(!0)
                }
            });
            o = L.ticker = new u.Ticker, n = L.prototype, n._dirty = n._gc = n._initted = n._paused = !1, n._totalTime = n._time = 0, n._rawPrevTime = -1, n._next = n._last = n._onUpdate = n._timeline = n.timeline = null, n._paused = !1;
            var R = function() {
                l && A() - E > 2e3 && o.wake(), setTimeout(R, 2e3)
            };
            R(), n.play = function(e, t) {
                return null != e && this.seek(e, t), this.reversed(!1).paused(!1)
            }, n.pause = function(e, t) {
                return null != e && this.seek(e, t), this.paused(!0)
            }, n.resume = function(e, t) {
                return null != e && this.seek(e, t), this.paused(!1)
            }, n.seek = function(e, t) {
                return this.totalTime(Number(e), t !== !1)
            }, n.restart = function(e, t) {
                return this.reversed(!1).paused(!1).totalTime(e ? -this._delay : 0, t !== !1, !0)
            }, n.reverse = function(e, t) {
                return null != e && this.seek(e || this.totalDuration(), t), this.reversed(!0).paused(!1)
            }, n.render = function(e, t, i) {}, n.invalidate = function() {
                return this._time = this._totalTime = 0, this._initted = this._gc = !1, this._rawPrevTime = -1, (this._gc || !this.timeline) && this._enabled(!0), this
            }, n.isActive = function() {
                var e, t = this._timeline,
                    i = this._startTime;
                return !t || !this._gc && !this._paused && t.isActive() && (e = t.rawTime()) >= i && e < i + this.totalDuration() / this._timeScale
            }, n._enabled = function(e, t) {
                return l || o.wake(), this._gc = !e, this._active = this.isActive(), t !== !0 && (e && !this.timeline ? this._timeline.add(this, this._startTime - this._delay) : !e && this.timeline && this._timeline._remove(this, !0)), !1
            }, n._kill = function(e, t) {
                return this._enabled(!1, !1)
            }, n.kill = function(e, t) {
                return this._kill(e, t), this
            }, n._uncache = function(e) {
                for (var t = e ? this : this.timeline; t;) t._dirty = !0, t = t.timeline;
                return this
            }, n._swapSelfInParams = function(e) {
                for (var t = e.length, i = e.concat(); --t > -1;) "{self}" === e[t] && (i[t] = this);
                return i
            }, n._callback = function(e) {
                var t = this.vars;
                t[e].apply(t[e + "Scope"] || t.callbackScope || this, t[e + "Params"] || g)
            }, n.eventCallback = function(e, t, i, r) {
                if ("on" === (e || "").substr(0, 2)) {
                    var s = this.vars;
                    if (1 === arguments.length) return s[e];
                    null == t ? delete s[e] : (s[e] = t, s[e + "Params"] = p(i) && -1 !== i.join("").indexOf("{self}") ? this._swapSelfInParams(i) : i, s[e + "Scope"] = r), "onUpdate" === e && (this._onUpdate = t)
                }
                return this
            }, n.delay = function(e) {
                return arguments.length ? (this._timeline.smoothChildTiming && this.startTime(this._startTime + e - this._delay), this._delay = e, this) : this._delay
            }, n.duration = function(e) {
                return arguments.length ? (this._duration = this._totalDuration = e, this._uncache(!0), this._timeline.smoothChildTiming && this._time > 0 && this._time < this._duration && 0 !== e && this.totalTime(this._totalTime * (e / this._duration), !0), this) : (this._dirty = !1, this._duration)
            }, n.totalDuration = function(e) {
                return this._dirty = !1, arguments.length ? this.duration(e) : this._totalDuration
            }, n.time = function(e, t) {
                return arguments.length ? (this._dirty && this.totalDuration(), this.totalTime(e > this._duration ? this._duration : e, t)) : this._time
            }, n.totalTime = function(e, t, i) {
                if (l || o.wake(), !arguments.length) return this._totalTime;
                if (this._timeline) {
                    if (0 > e && !i && (e += this.totalDuration()), this._timeline.smoothChildTiming) {
                        this._dirty && this.totalDuration();
                        var r = this._totalDuration,
                            s = this._timeline;
                        if (e > r && !i && (e = r), this._startTime = (this._paused ? this._pauseTime : s._time) - (this._reversed ? r - e : e) / this._timeScale, s._dirty || this._uncache(!1), s._timeline)
                            for (; s._timeline;) s._timeline._time !== (s._startTime + s._totalTime) / s._timeScale && s.totalTime(s._totalTime, !0), s = s._timeline
                    }
                    this._gc && this._enabled(!0, !1), (this._totalTime !== e || 0 === this._duration) && (M.length && J(), this.render(e, t, !1), M.length && J())
                }
                return this
            }, n.progress = n.totalProgress = function(e, t) {
                var i = this.duration();
                return arguments.length ? this.totalTime(i * e, t) : i ? this._time / i : this.ratio
            }, n.startTime = function(e) {
                return arguments.length ? (e !== this._startTime && (this._startTime = e, this.timeline && this.timeline._sortChildren && this.timeline.add(this, e - this._delay)), this) : this._startTime
            }, n.endTime = function(e) {
                return this._startTime + (0 != e ? this.totalDuration() : this.duration()) / this._timeScale
            }, n.timeScale = function(e) {
                if (!arguments.length) return this._timeScale;
                if (e = e || _, this._timeline && this._timeline.smoothChildTiming) {
                    var t = this._pauseTime,
                        i = t || 0 === t ? t : this._timeline.totalTime();
                    this._startTime = i - (i - this._startTime) * this._timeScale / e
                }
                return this._timeScale = e, this._uncache(!1)
            }, n.reversed = function(e) {
                return arguments.length ? (e != this._reversed && (this._reversed = e, this.totalTime(this._timeline && !this._timeline.smoothChildTiming ? this.totalDuration() - this._totalTime : this._totalTime, !0)), this) : this._reversed
            }, n.paused = function(e) {
                if (!arguments.length) return this._paused;
                var t, i, r = this._timeline;
                return e != this._paused && r && (l || e || o.wake(), t = r.rawTime(), i = t - this._pauseTime, !e && r.smoothChildTiming && (this._startTime += i, this._uncache(!1)), this._pauseTime = e ? t : null, this._paused = e, this._active = this.isActive(), !e && 0 !== i && this._initted && this.duration() && (t = r.smoothChildTiming ? this._totalTime : (t - this._startTime) / this._timeScale, this.render(t, t === this._totalTime, !0))), this._gc && !e && this._enabled(!0, !1), this
            };
            var Y = y("core.SimpleTimeline", function(e) {
                L.call(this, 0, e), this.autoRemoveChildren = this.smoothChildTiming = !0
            });
            n = Y.prototype = new L, n.constructor = Y, n.kill()._gc = !1, n._first = n._last = n._recent = null, n._sortChildren = !1, n.add = n.insert = function(e, t, i, r) {
                var s, a;
                if (e._startTime = Number(t || 0) + e._delay, e._paused && this !== e._timeline && (e._pauseTime = e._startTime + (this.rawTime() - e._startTime) / e._timeScale), e.timeline && e.timeline._remove(e, !0), e.timeline = e._timeline = this, e._gc && e._enabled(!0, !0), s = this._last, this._sortChildren)
                    for (a = e._startTime; s && s._startTime > a;) s = s._prev;
                return s ? (e._next = s._next, s._next = e) : (e._next = this._first, this._first = e), e._next ? e._next._prev = e : this._last = e, e._prev = s, this._recent = e, this._timeline && this._uncache(!0), this
            }, n._remove = function(e, t) {
                return e.timeline === this && (t || e._enabled(!1, !0), e._prev ? e._prev._next = e._next : this._first === e && (this._first = e._next), e._next ? e._next._prev = e._prev : this._last === e && (this._last = e._prev), e._next = e._prev = e.timeline = null, e === this._recent && (this._recent = this._last), this._timeline && this._uncache(!0)), this
            }, n.render = function(e, t, i) {
                var r, s = this._first;
                for (this._totalTime = this._time = this._rawPrevTime = e; s;) r = s._next, (s._active || e >= s._startTime && !s._paused) && (s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (e - s._startTime) * s._timeScale, t, i) : s.render((e - s._startTime) * s._timeScale, t, i)), s = r
            }, n.rawTime = function() {
                return l || o.wake(), this._totalTime
            };
            var C = y("TweenLite", function(t, i, r) {
                    if (L.call(this, i, r), this.render = C.prototype.render, null == t) throw "Cannot tween a null target.";
                    this.target = t = "string" != typeof t ? t : C.selector(t) || t;
                    var s, a, n, o = t.jquery || t.length && t !== e && t[0] && (t[0] === e || t[0].nodeType && t[0].style && !t.nodeType),
                        l = this.vars.overwrite;
                    if (this._overwrite = l = null == l ? H[C.defaultOverwrite] : "number" == typeof l ? l >> 0 : H[l], (o || t instanceof Array || t.push && p(t)) && "number" != typeof t[0])
                        for (this._targets = n = h(t), this._propLookup = [], this._siblings = [], s = 0; s < n.length; s++) a = n[s], a ? "string" != typeof a ? a.length && a !== e && a[0] && (a[0] === e || a[0].nodeType && a[0].style && !a.nodeType) ? (n.splice(s--, 1), this._targets = n = n.concat(h(a))) : (this._siblings[s] = $(a, this, !1), 1 === l && this._siblings[s].length > 1 && K(a, this, null, 1, this._siblings[s])) : (a = n[s--] = C.selector(a), "string" == typeof a && n.splice(s + 1, 1)) : n.splice(s--, 1);
                    else this._propLookup = {}, this._siblings = $(t, this, !1), 1 === l && this._siblings.length > 1 && K(t, this, null, 1, this._siblings);
                    (this.vars.immediateRender || 0 === i && 0 === this._delay && this.vars.immediateRender !== !1) && (this._time = -_, this.render(Math.min(0, -this._delay)))
                }, !0),
                k = function(t) {
                    return t && t.length && t !== e && t[0] && (t[0] === e || t[0].nodeType && t[0].style && !t.nodeType)
                },
                I = function(e, t) {
                    var i, r = {};
                    for (i in e) z[i] || i in t && "transform" !== i && "x" !== i && "y" !== i && "width" !== i && "height" !== i && "className" !== i && "border" !== i || !(!q[i] || q[i] && q[i]._autoCSS) || (r[i] = e[i], delete e[i]);
                    e.css = r
                };
            n = C.prototype = new L, n.constructor = C, n.kill()._gc = !1, n.ratio = 0, n._firstPT = n._targets = n._overwrittenProps = n._startAt = null, n._notifyPluginsOfEnabled = n._lazy = !1, C.version = "1.18.5", C.defaultEase = n._ease = new b(null, null, 1, 1), C.defaultOverwrite = "auto", C.ticker = o, C.autoSleep = 120, C.lagSmoothing = function(e, t) {
                o.lagSmoothing(e, t)
            }, C.selector = e.$ || e.jQuery || function(t) {
                var i = e.$ || e.jQuery;
                return i ? (C.selector = i, i(t)) : "undefined" == typeof document ? t : document.querySelectorAll ? document.querySelectorAll(t) : document.getElementById("#" === t.charAt(0) ? t.substr(1) : t)
            };
            var M = [],
                O = {},
                D = /(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,
                Q = function(e) {
                    for (var t, i = this._firstPT, r = 1e-6; i;) t = i.blob ? e ? this.join("") : this.start : i.c * e + i.s, i.r ? t = Math.round(t) : r > t && t > -r && (t = 0), i.f ? i.fp ? i.t[i.p](i.fp, t) : i.t[i.p](t) : i.t[i.p] = t, i = i._next
                },
                F = function(e, t, i, r) {
                    var s, a, n, o, l, c, u, _ = [e, t],
                        h = 0,
                        d = "",
                        p = 0;
                    for (_.start = e, i && (i(_), e = _[0], t = _[1]), _.length = 0, s = e.match(D) || [], a = t.match(D) || [], r && (r._next = null, r.blob = 1, _._firstPT = r), l = a.length, o = 0; l > o; o++) u = a[o], c = t.substr(h, t.indexOf(u, h) - h), d += c || !o ? c : ",", h += c.length, p ? p = (p + 1) % 5 : "rgba(" === c.substr(-5) && (p = 1), u === s[o] || s.length <= o ? d += u : (d && (_.push(d), d = ""), n = parseFloat(s[o]), _.push(n), _._firstPT = {
                        _next: _._firstPT,
                        t: _,
                        p: _.length - 1,
                        s: n,
                        c: ("=" === u.charAt(1) ? parseInt(u.charAt(0) + "1", 10) * parseFloat(u.substr(2)) : parseFloat(u) - n) || 0,
                        f: 0,
                        r: p && 4 > p
                    }), h += u.length;
                    return d += t.substr(h), d && _.push(d), _.setRatio = Q, _
                },
                N = function(e, t, i, r, s, a, n, o) {
                    var l, c, u = "get" === i ? e[t] : i,
                        _ = typeof e[t],
                        h = "string" == typeof r && "=" === r.charAt(1),
                        d = {
                            t: e,
                            p: t,
                            s: u,
                            f: "function" === _,
                            pg: 0,
                            n: s || t,
                            r: a,
                            pr: 0,
                            c: h ? parseInt(r.charAt(0) + "1", 10) * parseFloat(r.substr(2)) : parseFloat(r) - u || 0
                        };
                    return "number" !== _ && ("function" === _ && "get" === i && (c = t.indexOf("set") || "function" != typeof e["get" + t.substr(3)] ? t : "get" + t.substr(3), d.s = u = n ? e[c](n) : e[c]()), "string" == typeof u && (n || isNaN(u)) ? (d.fp = n, l = F(u, r, o || C.defaultStringFilter, d), d = {
                        t: l,
                        p: "setRatio",
                        s: 0,
                        c: 1,
                        f: 2,
                        pg: 0,
                        n: s || t,
                        pr: 0
                    }) : h || (d.s = parseFloat(u), d.c = parseFloat(r) - d.s || 0)), d.c ? ((d._next = this._firstPT) && (d._next._prev = d), this._firstPT = d, d) : void 0
                },
                B = C._internals = {
                    isArray: p,
                    isSelector: k,
                    lazyTweens: M,
                    blobDif: F
                },
                q = C._plugins = {},
                U = B.tweenLookup = {},
                X = 0,
                z = B.reservedProps = {
                    ease: 1,
                    delay: 1,
                    overwrite: 1,
                    onComplete: 1,
                    onCompleteParams: 1,
                    onCompleteScope: 1,
                    useFrames: 1,
                    runBackwards: 1,
                    startAt: 1,
                    onUpdate: 1,
                    onUpdateParams: 1,
                    onUpdateScope: 1,
                    onStart: 1,
                    onStartParams: 1,
                    onStartScope: 1,
                    onReverseComplete: 1,
                    onReverseCompleteParams: 1,
                    onReverseCompleteScope: 1,
                    onRepeat: 1,
                    onRepeatParams: 1,
                    onRepeatScope: 1,
                    easeParams: 1,
                    yoyo: 1,
                    immediateRender: 1,
                    repeat: 1,
                    repeatDelay: 1,
                    data: 1,
                    paused: 1,
                    reversed: 1,
                    autoCSS: 1,
                    lazy: 1,
                    onOverwrite: 1,
                    callbackScope: 1,
                    stringFilter: 1,
                    id: 1
                },
                H = {
                    none: 0,
                    all: 1,
                    auto: 2,
                    concurrent: 3,
                    allOnStart: 4,
                    preexisting: 5,
                    "true": 1,
                    "false": 0
                },
                V = L._rootFramesTimeline = new Y,
                W = L._rootTimeline = new Y,
                G = 30,
                J = B.lazyRender = function() {
                    var e, t = M.length;
                    for (O = {}; --t > -1;) e = M[t], e && e._lazy !== !1 && (e.render(e._lazy[0], e._lazy[1], !0), e._lazy = !1);
                    M.length = 0
                };
            W._startTime = o.time, V._startTime = o.frame, W._active = V._active = !0, setTimeout(J, 1), L._updateRoot = C.render = function() {
                var e, t, i;
                if (M.length && J(), W.render((o.time - W._startTime) * W._timeScale, !1, !1), V.render((o.frame - V._startTime) * V._timeScale, !1, !1), M.length && J(), o.frame >= G) {
                    G = o.frame + (parseInt(C.autoSleep, 10) || 120);
                    for (i in U) {
                        for (t = U[i].tweens, e = t.length; --e > -1;) t[e]._gc && t.splice(e, 1);
                        0 === t.length && delete U[i]
                    }
                    if (i = W._first, (!i || i._paused) && C.autoSleep && !V._first && 1 === o._listeners.tick.length) {
                        for (; i && i._paused;) i = i._next;
                        i || o.sleep()
                    }
                }
            }, o.addEventListener("tick", L._updateRoot);
            var $ = function(e, t, i) {
                    var r, s, a = e._gsTweenID;
                    if (U[a || (e._gsTweenID = a = "t" + X++)] || (U[a] = {
                        target: e,
                        tweens: []
                    }), t && (r = U[a].tweens, r[s = r.length] = t, i))
                        for (; --s > -1;) r[s] === t && r.splice(s, 1);
                    return U[a].tweens
                },
                Z = function(e, t, i, r) {
                    var s, a, n = e.vars.onOverwrite;
                    return n && (s = n(e, t, i, r)), n = C.onOverwrite, n && (a = n(e, t, i, r)), s !== !1 && a !== !1
                },
                K = function(e, t, i, r, s) {
                    var a, n, o, l;
                    if (1 === r || r >= 4) {
                        for (l = s.length, a = 0; l > a; a++)
                            if ((o = s[a]) !== t) o._gc || o._kill(null, e, t) && (n = !0);
                            else if (5 === r) break;
                        return n
                    }
                    var c, u = t._startTime + _,
                        h = [],
                        d = 0,
                        p = 0 === t._duration;
                    for (a = s.length; --a > -1;)(o = s[a]) === t || o._gc || o._paused || (o._timeline !== t._timeline ? (c = c || ee(t, 0, p), 0 === ee(o, c, p) && (h[d++] = o)) : o._startTime <= u && o._startTime + o.totalDuration() / o._timeScale > u && ((p || !o._initted) && u - o._startTime <= 2e-10 || (h[d++] = o)));
                    for (a = d; --a > -1;)
                        if (o = h[a], 2 === r && o._kill(i, e, t) && (n = !0), 2 !== r || !o._firstPT && o._initted) {
                            if (2 !== r && !Z(o, t)) continue;
                            o._enabled(!1, !1) && (n = !0)
                        } return n
                },
                ee = function(e, t, i) {
                    for (var r = e._timeline, s = r._timeScale, a = e._startTime; r._timeline;) {
                        if (a += r._startTime, s *= r._timeScale, r._paused) return -100;
                        r = r._timeline
                    }
                    return a /= s, a > t ? a - t : i && a === t || !e._initted && 2 * _ > a - t ? _ : (a += e.totalDuration() / e._timeScale / s) > t + _ ? 0 : a - t - _
                };
            n._init = function() {
                var e, t, i, r, s, a = this.vars,
                    n = this._overwrittenProps,
                    o = this._duration,
                    l = !!a.immediateRender,
                    c = a.ease;
                if (a.startAt) {
                    this._startAt && (this._startAt.render(-1, !0), this._startAt.kill()), s = {};
                    for (r in a.startAt) s[r] = a.startAt[r];
                    if (s.overwrite = !1, s.immediateRender = !0, s.lazy = l && a.lazy !== !1, s.startAt = s.delay = null, this._startAt = C.to(this.target, 0, s), l)
                        if (this._time > 0) this._startAt = null;
                        else if (0 !== o) return
                } else if (a.runBackwards && 0 !== o)
                    if (this._startAt) this._startAt.render(-1, !0), this._startAt.kill(), this._startAt = null;
                    else {
                        0 !== this._time && (l = !1), i = {};
                        for (r in a) z[r] && "autoCSS" !== r || (i[r] = a[r]);
                        if (i.overwrite = 0, i.data = "isFromStart", i.lazy = l && a.lazy !== !1, i.immediateRender = l, this._startAt = C.to(this.target, 0, i), l) {
                            if (0 === this._time) return
                        } else this._startAt._init(), this._startAt._enabled(!1), this.vars.immediateRender && (this._startAt = null)
                    } if (this._ease = c = c ? c instanceof b ? c : "function" == typeof c ? new b(c, a.easeParams) : T[c] || C.defaultEase : C.defaultEase, a.easeParams instanceof Array && c.config && (this._ease = c.config.apply(c, a.easeParams)), this._easeType = this._ease._type, this._easePower = this._ease._power, this._firstPT = null, this._targets)
                    for (e = this._targets.length; --e > -1;) this._initProps(this._targets[e], this._propLookup[e] = {}, this._siblings[e], n ? n[e] : null) && (t = !0);
                else t = this._initProps(this.target, this._propLookup, this._siblings, n);
                if (t && C._onPluginEvent("_onInitAllProps", this), n && (this._firstPT || "function" != typeof this.target && this._enabled(!1, !1)), a.runBackwards)
                    for (i = this._firstPT; i;) i.s += i.c, i.c = -i.c, i = i._next;
                this._onUpdate = a.onUpdate, this._initted = !0
            }, n._initProps = function(t, i, r, s) {
                var a, n, o, l, c, u;
                if (null == t) return !1;
                O[t._gsTweenID] && J(), this.vars.css || t.style && t !== e && t.nodeType && q.css && this.vars.autoCSS !== !1 && I(this.vars, t);
                for (a in this.vars)
                    if (u = this.vars[a], z[a]) u && (u instanceof Array || u.push && p(u)) && -1 !== u.join("").indexOf("{self}") && (this.vars[a] = u = this._swapSelfInParams(u, this));
                    else if (q[a] && (l = new q[a])._onInitTween(t, this.vars[a], this)) {
                        for (this._firstPT = c = {
                            _next: this._firstPT,
                            t: l,
                            p: "setRatio",
                            s: 0,
                            c: 1,
                            f: 1,
                            n: a,
                            pg: 1,
                            pr: l._priority
                        }, n = l._overwriteProps.length; --n > -1;) i[l._overwriteProps[n]] = this._firstPT;
                        (l._priority || l._onInitAllProps) && (o = !0), (l._onDisable || l._onEnable) && (this._notifyPluginsOfEnabled = !0), c._next && (c._next._prev = c)
                    } else i[a] = N.call(this, t, a, "get", u, a, 0, null, this.vars.stringFilter);
                return s && this._kill(s, t) ? this._initProps(t, i, r, s) : this._overwrite > 1 && this._firstPT && r.length > 1 && K(t, this, i, this._overwrite, r) ? (this._kill(i, t), this._initProps(t, i, r, s)) : (this._firstPT && (this.vars.lazy !== !1 && this._duration || this.vars.lazy && !this._duration) && (O[t._gsTweenID] = !0), o)
            }, n.render = function(e, t, i) {
                var r, s, a, n, o = this._time,
                    l = this._duration,
                    c = this._rawPrevTime;
                if (e >= l - 1e-7) this._totalTime = this._time = l, this.ratio = this._ease._calcEnd ? this._ease.getRatio(1) : 1, this._reversed || (r = !0, s = "onComplete", i = i || this._timeline.autoRemoveChildren), 0 === l && (this._initted || !this.vars.lazy || i) && (this._startTime === this._timeline._duration && (e = 0), (0 > c || 0 >= e && e >= -1e-7 || c === _ && "isPause" !== this.data) && c !== e && (i = !0, c > _ && (s = "onReverseComplete")), this._rawPrevTime = n = !t || e || c === e ? e : _);
                else if (1e-7 > e) this._totalTime = this._time = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0, (0 !== o || 0 === l && c > 0) && (s = "onReverseComplete", r = this._reversed), 0 > e && (this._active = !1, 0 === l && (this._initted || !this.vars.lazy || i) && (c >= 0 && (c !== _ || "isPause" !== this.data) && (i = !0), this._rawPrevTime = n = !t || e || c === e ? e : _)), this._initted || (i = !0);
                else if (this._totalTime = this._time = e, this._easeType) {
                    var u = e / l,
                        h = this._easeType,
                        d = this._easePower;
                    (1 === h || 3 === h && u >= .5) && (u = 1 - u), 3 === h && (u *= 2), 1 === d ? u *= u : 2 === d ? u *= u * u : 3 === d ? u *= u * u * u : 4 === d && (u *= u * u * u * u), 1 === h ? this.ratio = 1 - u : 2 === h ? this.ratio = u : .5 > e / l ? this.ratio = u / 2 : this.ratio = 1 - u / 2
                } else this.ratio = this._ease.getRatio(e / l);
                if (this._time !== o || i) {
                    if (!this._initted) {
                        if (this._init(), !this._initted || this._gc) return;
                        if (!i && this._firstPT && (this.vars.lazy !== !1 && this._duration || this.vars.lazy && !this._duration)) return this._time = this._totalTime = o, this._rawPrevTime = c, M.push(this), void(this._lazy = [e, t]);
                        this._time && !r ? this.ratio = this._ease.getRatio(this._time / l) : r && this._ease._calcEnd && (this.ratio = this._ease.getRatio(0 === this._time ? 0 : 1))
                    }
                    for (this._lazy !== !1 && (this._lazy = !1), this._active || !this._paused && this._time !== o && e >= 0 && (this._active = !0), 0 === o && (this._startAt && (e >= 0 ? this._startAt.render(e, t, i) : s || (s = "_dummyGS")), this.vars.onStart && (0 !== this._time || 0 === l) && (t || this._callback("onStart"))), a = this._firstPT; a;) a.f ? a.t[a.p](a.c * this.ratio + a.s) : a.t[a.p] = a.c * this.ratio + a.s, a = a._next;
                    this._onUpdate && (0 > e && this._startAt && e !== -1e-4 && this._startAt.render(e, t, i), t || (this._time !== o || r || i) && this._callback("onUpdate")), s && (!this._gc || i) && (0 > e && this._startAt && !this._onUpdate && e !== -1e-4 && this._startAt.render(e, t, i), r && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !t && this.vars[s] && this._callback(s), 0 === l && this._rawPrevTime === _ && n !== _ && (this._rawPrevTime = 0))
                }
            }, n._kill = function(e, t, i) {
                if ("all" === e && (e = null), null == e && (null == t || t === this.target)) return this._lazy = !1, this._enabled(!1, !1);
                t = "string" != typeof t ? t || this._targets || this.target : C.selector(t) || t;
                var r, s, a, n, o, l, c, u, _, h = i && this._time && i._startTime === this._startTime && this._timeline === i._timeline;
                if ((p(t) || k(t)) && "number" != typeof t[0])
                    for (r = t.length; --r > -1;) this._kill(e, t[r], i) && (l = !0);
                else {
                    if (this._targets) {
                        for (r = this._targets.length; --r > -1;)
                            if (t === this._targets[r]) {
                                o = this._propLookup[r] || {}, this._overwrittenProps = this._overwrittenProps || [], s = this._overwrittenProps[r] = e ? this._overwrittenProps[r] || {} : "all";
                                break
                            }
                    } else {
                        if (t !== this.target) return !1;
                        o = this._propLookup, s = this._overwrittenProps = e ? this._overwrittenProps || {} : "all"
                    }
                    if (o) {
                        if (c = e || o, u = e !== s && "all" !== s && e !== o && ("object" != typeof e || !e._tempKill), i && (C.onOverwrite || this.vars.onOverwrite)) {
                            for (a in c) o[a] && (_ || (_ = []), _.push(a));
                            if ((_ || !e) && !Z(this, i, t, _)) return !1
                        }
                        for (a in c)(n = o[a]) && (h && (n.f ? n.t[n.p](n.s) : n.t[n.p] = n.s, l = !0), n.pg && n.t._kill(c) && (l = !0), n.pg && 0 !== n.t._overwriteProps.length || (n._prev ? n._prev._next = n._next : n === this._firstPT && (this._firstPT = n._next), n._next && (n._next._prev = n._prev), n._next = n._prev = null), delete o[a]), u && (s[a] = 1);
                        !this._firstPT && this._initted && this._enabled(!1, !1)
                    }
                }
                return l
            }, n.invalidate = function() {
                return this._notifyPluginsOfEnabled && C._onPluginEvent("_onDisable", this), this._firstPT = this._overwrittenProps = this._startAt = this._onUpdate = null, this._notifyPluginsOfEnabled = this._active = this._lazy = !1, this._propLookup = this._targets ? {} : [], L.prototype.invalidate.call(this), this.vars.immediateRender && (this._time = -_, this.render(Math.min(0, -this._delay))), this
            }, n._enabled = function(e, t) {
                if (l || o.wake(), e && this._gc) {
                    var i, r = this._targets;
                    if (r)
                        for (i = r.length; --i > -1;) this._siblings[i] = $(r[i], this, !0);
                    else this._siblings = $(this.target, this, !0)
                }
                return L.prototype._enabled.call(this, e, t), this._notifyPluginsOfEnabled && this._firstPT ? C._onPluginEvent(e ? "_onEnable" : "_onDisable", this) : !1
            }, C.to = function(e, t, i) {
                return new C(e, t, i)
            }, C.from = function(e, t, i) {
                return i.runBackwards = !0, i.immediateRender = 0 != i.immediateRender, new C(e, t, i)
            }, C.fromTo = function(e, t, i, r) {
                return r.startAt = i, r.immediateRender = 0 != r.immediateRender && 0 != i.immediateRender, new C(e, t, r)
            }, C.delayedCall = function(e, t, i, r, s) {
                return new C(t, 0, {
                    delay: e,
                    onComplete: t,
                    onCompleteParams: i,
                    callbackScope: r,
                    onReverseComplete: t,
                    onReverseCompleteParams: i,
                    immediateRender: !1,
                    lazy: !1,
                    useFrames: s,
                    overwrite: 0
                })
            }, C.set = function(e, t) {
                return new C(e, 0, t)
            }, C.getTweensOf = function(e, t) {
                if (null == e) return [];
                e = "string" != typeof e ? e : C.selector(e) || e;
                var i, r, s, a;
                if ((p(e) || k(e)) && "number" != typeof e[0]) {
                    for (i = e.length, r = []; --i > -1;) r = r.concat(C.getTweensOf(e[i], t));
                    for (i = r.length; --i > -1;)
                        for (a = r[i], s = i; --s > -1;) a === r[s] && r.splice(i, 1)
                } else
                    for (r = $(e).concat(), i = r.length; --i > -1;)(r[i]._gc || t && !r[i].isActive()) && r.splice(i, 1);
                return r
            }, C.killTweensOf = C.killDelayedCallsTo = function(e, t, i) {
                "object" == typeof t && (i = t, t = !1);
                for (var r = C.getTweensOf(e, t), s = r.length; --s > -1;) r[s]._kill(i, e)
            };
            var te = y("plugins.TweenPlugin", function(e, t) {
                this._overwriteProps = (e || "").split(","), this._propName = this._overwriteProps[0], this._priority = t || 0, this._super = te.prototype
            }, !0);
            if (n = te.prototype, te.version = "1.18.0", te.API = 2, n._firstPT = null, n._addTween = N, n.setRatio = Q, n._kill = function(e) {
                var t, i = this._overwriteProps,
                    r = this._firstPT;
                if (null != e[this._propName]) this._overwriteProps = [];
                else
                    for (t = i.length; --t > -1;) null != e[i[t]] && i.splice(t, 1);
                for (; r;) null != e[r.n] && (r._next && (r._next._prev = r._prev), r._prev ? (r._prev._next = r._next, r._prev = null) : this._firstPT === r && (this._firstPT = r._next)), r = r._next;
                return !1
            }, n._roundProps = function(e, t) {
                for (var i = this._firstPT; i;)(e[this._propName] || null != i.n && e[i.n.split(this._propName + "_").join("")]) && (i.r = t), i = i._next
            }, C._onPluginEvent = function(e, t) {
                var i, r, s, a, n, o = t._firstPT;
                if ("_onInitAllProps" === e) {
                    for (; o;) {
                        for (n = o._next, r = s; r && r.pr > o.pr;) r = r._next;
                        (o._prev = r ? r._prev : a) ? o._prev._next = o: s = o, (o._next = r) ? r._prev = o : a = o, o = n
                    }
                    o = t._firstPT = s
                }
                for (; o;) o.pg && "function" == typeof o.t[e] && o.t[e]() && (i = !0), o = o._next;
                return i
            }, te.activate = function(e) {
                for (var t = e.length; --t > -1;) e[t].API === te.API && (q[(new e[t])._propName] = e[t]);
                return !0
            }, m.plugin = function(e) {
                if (!(e && e.propName && e.init && e.API)) throw "illegal plugin definition.";
                var t, i = e.propName,
                    r = e.priority || 0,
                    s = e.overwriteProps,
                    a = {
                        init: "_onInitTween",
                        set: "setRatio",
                        kill: "_kill",
                        round: "_roundProps",
                        initAll: "_onInitAllProps"
                    },
                    n = y("plugins." + i.charAt(0).toUpperCase() + i.substr(1) + "Plugin", function() {
                        te.call(this, i, r), this._overwriteProps = s || []
                    }, e.global === !0),
                    o = n.prototype = new te(i);
                o.constructor = n, n.API = e.API;
                for (t in a) "function" == typeof e[t] && (o[a[t]] = e[t]);
                return n.version = e.version, te.activate([n]), n
            }, s = e._gsQueue) {
                for (a = 0; a < s.length; a++) s[a]();
                for (n in f) f[n].func || e.console.log("GSAP encountered missing dependency: com.greensock." + n)
            }
            l = !1
        }
    }("undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window, "TweenMax");
var ytp = ytp || {},
    getYTPVideoID = function(e) {
        var t, i;
        return e.indexOf("youtu.be") > 0 ? (t = e.substr(e.lastIndexOf("/") + 1, e.length), i = t.indexOf("?list=") > 0 ? t.substr(t.lastIndexOf("="), t.length) : null, t = i ? t.substr(0, t.lastIndexOf("?")) : t) : e.indexOf("http") > -1 ? (t = e.match(/[\\?&]v=([^&#]*)/)[1], i = e.indexOf("list=") > 0 ? e.match(/[\\?&]list=([^&#]*)/)[1] : null) : (t = e.length > 15 ? null : e, i = t ? null : e), {
            videoID: t,
            playlistID: i
        }
    };
! function(jQuery, ytp) {
    jQuery.mbYTPlayer = {
        name: "jquery.mb.YTPlayer",
        version: "3.0.6",
        build: "5873",
        author: "Matteo Bicocchi",
        apiKey: "",
        defaults: {
            containment: "body",
            ratio: "auto",
            videoURL: null,
            playlistURL: null,
            startAt: 0,
            stopAt: 0,
            autoPlay: !0,
            vol: 50,
            addRaster: !1,
            mask: !1,
            opacity: 1,
            quality: "default",
            mute: !1,
            loop: !0,
            showControls: !0,
            showAnnotations: !1,
            showYTLogo: !0,
            stopMovieOnBlur: !0,
            realfullscreen: !0,
            mobileFallbackImage: null,
            gaTrack: !0,
            optimizeDisplay: !0,
            align: "center,center",
            onReady: function(e) {}
        },
        controls: {
            play: "P",
            pause: "p",
            mute: "M",
            unmute: "A",
            onlyYT: "O",
            showSite: "R",
            ytLogo: "Y"
        },
        controlBar: null,
        loading: null,
        locationProtocol: "https:",
        filters: {
            grayscale: {
                value: 0,
                unit: "%"
            },
            hue_rotate: {
                value: 0,
                unit: "deg"
            },
            invert: {
                value: 0,
                unit: "%"
            },
            opacity: {
                value: 0,
                unit: "%"
            },
            saturate: {
                value: 0,
                unit: "%"
            },
            sepia: {
                value: 0,
                unit: "%"
            },
            brightness: {
                value: 0,
                unit: "%"
            },
            contrast: {
                value: 0,
                unit: "%"
            },
            blur: {
                value: 0,
                unit: "px"
            }
        },
        buildPlayer: function(options) {
            return this.each(function() {
                var YTPlayer = this,
                    $YTPlayer = jQuery(YTPlayer);
                YTPlayer.loop = 0, YTPlayer.opt = {}, YTPlayer.state = {}, YTPlayer.filters = jQuery.mbYTPlayer.filters, YTPlayer.filtersEnabled = !0, YTPlayer.id = YTPlayer.id || "YTP_" + (new Date).getTime(), $YTPlayer.addClass("mb_YTPlayer");
                var property = $YTPlayer.data("property") && "string" == typeof $YTPlayer.data("property") ? eval("(" + $YTPlayer.data("property") + ")") : $YTPlayer.data("property");
                "undefined" != typeof property && "undefined" != typeof property.vol && (property.vol = 0 === property.vol ? property.vol = 1 : property.vol), jQuery.extend(YTPlayer.opt, jQuery.mbYTPlayer.defaults, options, property), YTPlayer.hasChanged || (YTPlayer.defaultOpt = {}, jQuery.extend(YTPlayer.defaultOpt, jQuery.mbYTPlayer.defaults, options)), "true" == YTPlayer.opt.loop && (YTPlayer.opt.loop = 9999), YTPlayer.isRetina = window.retina || window.devicePixelRatio > 1;
                var isIframe = function() {
                    var e = !1;
                    try {
                        self.location.href != top.location.href && (e = !0)
                    } catch (t) {
                        e = !0
                    }
                    return e
                };
                YTPlayer.canGoFullScreen = !(jQuery.browser.msie || jQuery.browser.opera || isIframe()), YTPlayer.canGoFullScreen || (YTPlayer.opt.realfullscreen = !1), $YTPlayer.attr("id") || $YTPlayer.attr("id", "video_" + (new Date).getTime());
                var playerID = "mbYTP_" + YTPlayer.id;
                YTPlayer.isAlone = !1, YTPlayer.hasFocus = !0;
                var videoID = this.opt.videoURL ? getYTPVideoID(this.opt.videoURL).videoID : $YTPlayer.attr("href") ? getYTPVideoID($YTPlayer.attr("href")).videoID : !1,
                    playlistID = this.opt.videoURL ? getYTPVideoID(this.opt.videoURL).playlistID : $YTPlayer.attr("href") ? getYTPVideoID($YTPlayer.attr("href")).playlistID : !1;
                YTPlayer.videoID = videoID, YTPlayer.playlistID = playlistID, YTPlayer.opt.showAnnotations = YTPlayer.opt.showAnnotations ? "0" : "3";
                var playerVars = {
                    modestbranding: 1,
                    autoplay: 0,
                    controls: 0,
                    showinfo: 0,
                    rel: 0,
                    enablejsapi: 1,
                    version: 3,
                    playerapiid: playerID,
                    origin: "*",
                    allowfullscreen: !0,
                    wmode: "transparent",
                    iv_load_policy: YTPlayer.opt.showAnnotations
                };
                if (document.createElement("video").canPlayType && jQuery.extend(playerVars, {
                    html5: 1
                }), jQuery.browser.msie && jQuery.browser.version < 9 && (this.opt.opacity = 1), YTPlayer.isSelf = "self" == YTPlayer.opt.containment, YTPlayer.defaultOpt.containment = YTPlayer.opt.containment = jQuery("self" == YTPlayer.opt.containment ? this : YTPlayer.opt.containment), YTPlayer.isBackground = YTPlayer.opt.containment.is("body"), !YTPlayer.isBackground || !ytp.backgroundIsInited) {
                    var isPlayer = YTPlayer.opt.containment.is(jQuery(this));
                    YTPlayer.canPlayOnMobile = isPlayer && 0 === jQuery(this).children().length, YTPlayer.isPlayer = !1, isPlayer ? YTPlayer.isPlayer = !0 : $YTPlayer.hide();
                    var overlay = jQuery("<div/>").css({
                        position: "absolute",
                        top: 0,
                        left: 0,
                        width: "100%",
                        height: "100%"
                    }).addClass("YTPOverlay");
                    YTPlayer.isPlayer && overlay.on("click", function() {
                        $YTPlayer.YTPTogglePlay()
                    });
                    var wrapper = jQuery("<div/>").addClass("mbYTP_wrapper").attr("id", "wrapper_" + playerID);
                    wrapper.css({
                        position: "absolute",
                        zIndex: 0,
                        minWidth: "100%",
                        minHeight: "100%",
                        left: 0,
                        top: 0,
                        overflow: "hidden",
                        opacity: 0
                    });
                    var playerBox = jQuery("<div/>").attr("id", playerID).addClass("playerBox");
                    if (playerBox.css({
                        position: "absolute",
                        zIndex: 0,
                        width: "100%",
                        height: "100%",
                        top: 0,
                        left: 0,
                        overflow: "hidden"
                    }), wrapper.append(playerBox), YTPlayer.opt.containment.children().not("script, style").each(function() {
                        "static" == jQuery(this).css("position") && jQuery(this).css("position", "relative")
                    }), YTPlayer.isBackground ? (jQuery("body").css({
                        boxSizing: "border-box"
                    }), wrapper.css({
                        position: "fixed",
                        top: 0,
                        left: 0,
                        zIndex: 0
                    }), $YTPlayer.hide()) : "static" == YTPlayer.opt.containment.css("position") && YTPlayer.opt.containment.css({
                        position: "relative"
                    }), YTPlayer.opt.containment.prepend(wrapper), YTPlayer.wrapper = wrapper, playerBox.css({
                        opacity: 1
                    }), jQuery.browser.mobile || (playerBox.after(overlay), YTPlayer.overlay = overlay), YTPlayer.isBackground || overlay.on("mouseenter", function() {
                        YTPlayer.controlBar.length && YTPlayer.controlBar.addClass("visible")
                    }).on("mouseleave", function() {
                        YTPlayer.controlBar.length && YTPlayer.controlBar.removeClass("visible")
                    }), ytp.YTAPIReady) setTimeout(function() {
                        jQuery(document).trigger("YTAPIReady")
                    }, 100);
                    else {
                        jQuery("#YTAPI").remove();
                        var tag = jQuery("<script></script>").attr({
                            src: jQuery.mbYTPlayer.locationProtocol + "//www.youtube.com/iframe_api?v=" + jQuery.mbYTPlayer.version,
                            id: "YTAPI"
                        });
                        jQuery("head").prepend(tag)
                    }
                    if (jQuery.browser.mobile && !YTPlayer.canPlayOnMobile) return YTPlayer.opt.mobileFallbackImage && YTPlayer.opt.containment.css({
                        backgroundImage: "url(" + YTPlayer.opt.mobileFallbackImage + ")",
                        backgroundPosition: "center center",
                        backgroundSize: "cover",
                        backgroundRepeat: "no-repeat"
                    }), $YTPlayer.remove(), void jQuery(document).trigger("YTPUnavailable");
                    jQuery(document).on("YTAPIReady", function() {
                        YTPlayer.isBackground && ytp.backgroundIsInited || YTPlayer.isInit || (YTPlayer.isBackground && (ytp.backgroundIsInited = !0), YTPlayer.opt.autoPlay = "undefined" == typeof YTPlayer.opt.autoPlay ? !!YTPlayer.isBackground : YTPlayer.opt.autoPlay, YTPlayer.opt.vol = YTPlayer.opt.vol ? YTPlayer.opt.vol : 100, jQuery.mbYTPlayer.getDataFromAPI(YTPlayer), jQuery(YTPlayer).on("YTPChanged", function() {
                            if (!YTPlayer.isInit) {
                                if (YTPlayer.isInit = !0, jQuery.browser.mobile && YTPlayer.canPlayOnMobile) {
                                    if (YTPlayer.opt.containment.outerWidth() > jQuery(window).width()) {
                                        YTPlayer.opt.containment.css({
                                            maxWidth: "100%"
                                        });
                                        var h = .563 * YTPlayer.opt.containment.outerWidth();
                                        YTPlayer.opt.containment.css({
                                            maxHeight: h
                                        })
                                    }
                                    return void new YT.Player(playerID, {
                                        videoId: YTPlayer.videoID.toString(),
                                        host: 'https://www.youtube.com',
                                        origin: "https://dev.tracking.dupliglobal.com/",
                                        widget_referrer: "https://dev.tracking.dupliglobal.com/",
                                        width: "100%",
                                        height: h,
                                        playerVars: playerVars,
                                        events: {
                                            onReady: function(e) {
                                                YTPlayer.player = e.target, playerBox.css({
                                                    opacity: 1
                                                }), YTPlayer.wrapper.css({
                                                    opacity: 1
                                                })
                                            }
                                        }
                                    })
                                }
                                new YT.Player(playerID, {
                                    videoId: YTPlayer.videoID.toString(),
                                    playerVars: playerVars,
                                    events: {
                                        onReady: function(e) {
                                            YTPlayer.player = e.target, YTPlayer.isReady || (YTPlayer.isReady = !YTPlayer.isPlayer || YTPlayer.opt.autoPlay, YTPlayer.playerEl = YTPlayer.player.getIframe(), jQuery(YTPlayer.playerEl).unselectable(), $YTPlayer.optimizeDisplay(), YTPlayer.videoID = videoID, jQuery(window).off("resize.YTP_" + YTPlayer.id).on("resize.YTP_" + YTPlayer.id, function() {
                                                $YTPlayer.optimizeDisplay()
                                            }), jQuery.mbYTPlayer.checkForState(YTPlayer))
                                        },
                                        onStateChange: function(event) {
                                            if ("function" == typeof event.target.getPlayerState) {
                                                var state = event.target.getPlayerState();
                                                if (YTPlayer.preventTrigger) return void(YTPlayer.preventTrigger = !1);
                                                YTPlayer.state = state;
                                                var eventType;
                                                switch (state) {
                                                    case -1:
                                                        eventType = "YTPUnstarted";
                                                        break;
                                                    case 0:
                                                        eventType = "YTPEnd";
                                                        break;
                                                    case 1:
                                                        eventType = "YTPPlay", YTPlayer.controlBar.length && YTPlayer.controlBar.find(".mb_YTPPlaypause").html(jQuery.mbYTPlayer.controls.pause), "undefined" != typeof _gaq && eval(YTPlayer.opt.gaTrack) && _gaq.push(["_trackEvent", "YTPlayer", "Play", YTPlayer.hasData ? YTPlayer.videoData.title : YTPlayer.videoID.toString()]), "undefined" != typeof ga && eval(YTPlayer.opt.gaTrack) && ga("send", "event", "YTPlayer", "play", YTPlayer.hasData ? YTPlayer.videoData.title : YTPlayer.videoID.toString());
                                                        break;
                                                    case 2:
                                                        eventType = "YTPPause", YTPlayer.controlBar.length && YTPlayer.controlBar.find(".mb_YTPPlaypause").html(jQuery.mbYTPlayer.controls.play);
                                                        break;
                                                    case 3:
                                                        YTPlayer.player.setPlaybackQuality(YTPlayer.opt.quality), eventType = "YTPBuffering", YTPlayer.controlBar.length && YTPlayer.controlBar.find(".mb_YTPPlaypause").html(jQuery.mbYTPlayer.controls.play);
                                                        break;
                                                    case 5:
                                                        eventType = "YTPCued"
                                                }
                                                var YTPEvent = jQuery.Event(eventType);
                                                YTPEvent.time = YTPlayer.currentTime, YTPlayer.canTrigger && jQuery(YTPlayer).trigger(YTPEvent)
                                            }
                                        },
                                        onPlaybackQualityChange: function(e) {
                                            var t = e.target.getPlaybackQuality(),
                                                i = jQuery.Event("YTPQualityChange");
                                            i.quality = t, jQuery(YTPlayer).trigger(i)
                                        },
                                        onError: function(e) {
                                            150 == e.data && (console.log("Embedding this video is restricted by Youtube."), YTPlayer.isPlayList && jQuery(YTPlayer).playNext()), 2 == e.data && YTPlayer.isPlayList && jQuery(YTPlayer).playNext(), "function" == typeof YTPlayer.opt.onError && YTPlayer.opt.onError($YTPlayer, e)
                                        }
                                    }
                                })
                            }
                        }))
                    }), $YTPlayer.off("YTPTime.mask"), jQuery.mbYTPlayer.applyMask(YTPlayer)
                }
            })
        },
        getDataFromAPI: function(e) {
            if (e.videoData = jQuery.mbStorage.get("YTPlayer_data_" + e.videoID), jQuery(e).off("YTPData.YTPlayer").on("YTPData.YTPlayer", function() {
                if (e.hasData && e.isPlayer && !e.opt.autoPlay) {
                    var t = e.videoData.thumb_max || e.videoData.thumb_high || e.videoData.thumb_medium;
                    e.opt.containment.css({
                        background: "rgba(0,0,0,0.5) url(" + t + ") center center",
                        backgroundSize: "cover"
                    }), e.opt.backgroundUrl = t
                }
            }), e.videoData) setTimeout(function() {
                e.opt.ratio = "auto" == e.opt.ratio ? "16/9" : e.opt.ratio, e.dataReceived = !0, jQuery(e).trigger("YTPChanged");
                var t = jQuery.Event("YTPData");
                t.prop = {};
                for (var i in e.videoData) t.prop[i] = e.videoData[i];
                jQuery(e).trigger(t)
            }, 500), e.hasData = !0;
            else if (jQuery.mbYTPlayer.apiKey) jQuery.getJSON(jQuery.mbYTPlayer.locationProtocol + "//www.googleapis.com/youtube/v3/videos?id=" + e.videoID + "&key=" + jQuery.mbYTPlayer.apiKey + "&part=snippet", function(t) {
                function i(t) {
                    e.videoData = {}, e.videoData.id = e.videoID, e.videoData.channelTitle = t.channelTitle, e.videoData.title = t.title, e.videoData.description = t.description.length < 400 ? t.description : t.description.substring(0, 400) + " ...", e.videoData.aspectratio = "auto" == e.opt.ratio ? "16/9" : e.opt.ratio, e.opt.ratio = e.videoData.aspectratio, e.videoData.thumb_max = t.thumbnails.maxres ? t.thumbnails.maxres.url : null, e.videoData.thumb_high = t.thumbnails.high ? t.thumbnails.high.url : null, e.videoData.thumb_medium = t.thumbnails.medium ? t.thumbnails.medium.url : null, jQuery.mbStorage.set("YTPlayer_data_" + e.videoID, e.videoData)
                }
                e.dataReceived = !0, jQuery(e).trigger("YTPChanged"), i(t.items[0].snippet), e.hasData = !0;
                var r = jQuery.Event("YTPData");
                r.prop = {};
                for (var s in e.videoData) r.prop[s] = e.videoData[s];
                jQuery(e).trigger(r)
            });
            else {
                if (setTimeout(function() {
                    jQuery(e).trigger("YTPChanged")
                }, 50), e.isPlayer && !e.opt.autoPlay) {
                    var t = jQuery.mbYTPlayer.locationProtocol + "//i.ytimg.com/vi/" + e.videoID + "/hqdefault.jpg";
                    e.opt.containment.css({
                        background: "rgba(0,0,0,0.5) url(" + t + ") center center",
                        backgroundSize: "cover"
                    }), e.opt.backgroundUrl = t
                }
                e.videoData = null, e.opt.ratio = "auto" == e.opt.ratio ? "16/9" : e.opt.ratio
            }!e.isPlayer || e.opt.autoPlay || jQuery.browser.mobile || (e.loading = jQuery("<div/>").addClass("loading").html("Loading").hide(), jQuery(e).append(e.loading), e.loading.fadeIn())
        },
        removeStoredData: function() {
            jQuery.mbStorage.remove()
        },
        getVideoData: function() {
            var e = this.get(0);
            return e.videoData
        },
        getVideoID: function() {
            var e = this.get(0);
            return e.videoID || !1
        },
        setVideoQuality: function(e) {
            var t = this.get(0);
            t.player.setPlaybackQuality(e)
        },
        playlist: function(e, t, i, r) {
            var s = this,
                a = s.get(0);
            return a.isPlayList = !0, t && (e = jQuery.shuffle(e)), a.videoID || (a.videos = e, a.videoCounter = 0, a.videoLength = e.length, jQuery(a).data("property", e[0]), jQuery(a).mb_YTPlayer()), "function" == typeof i && jQuery(a).one("YTPChanged", function() {
                i(a)
            }), jQuery(a).on("YTPEnd", function() {
                r = "undefined" == typeof r ? !0 : r, jQuery(a).playNext(r)
            }), s
        },
        playNext: function(e) {
            var t = this.get(0);
            return t.checkForStartAt && (clearTimeout(t.checkForStartAt), clearInterval(t.getState)), t.videoCounter++, t.videoCounter >= t.videoLength && e && (t.videoCounter = 0), t.videoCounter < t.videoLength && jQuery(t).changeMovie(t.videos[t.videoCounter]), this
        },
        playPrev: function() {
            var e = this.get(0);
            return e.checkForStartAt && (clearInterval(e.checkForStartAt), clearInterval(e.getState)), e.videoCounter--, e.videoCounter < 0 && (e.videoCounter = e.videoLength - 1), jQuery(e).changeMovie(e.videos[e.videoCounter]), this
        },
        playIndex: function(e) {
            var t = this.get(0);
            return t.checkForStartAt && (clearInterval(t.checkForStartAt), clearInterval(t.getState)), t.videoCounter = e, t.videoCounter >= t.videoLength - 1 && (t.videoCounter = t.videoLength - 1), jQuery(t).changeMovie(t.videos[t.videoCounter]), this
        },
        changeMovie: function(e) {
            var t = this,
                i = t.get(0);
            i.opt.startAt = 0, i.opt.stopAt = 0, i.opt.mask = !1, i.opt.mute = !0, i.hasData = !1, i.hasChanged = !0, i.player.loopTime = void 0, e && jQuery.extend(i.opt, e), i.videoID = getYTPVideoID(i.opt.videoURL).videoID, "true" == i.opt.loop && (i.opt.loop = 9999), jQuery(i.playerEl).CSSAnimate({
                opacity: 0
            }, 200, function() {
                var e = jQuery.Event("YTPChangeMovie");
                e.time = i.currentTime, e.videoId = i.videoID, jQuery(i).trigger(e), jQuery(i).YTPGetPlayer().cueVideoByUrl(encodeURI(jQuery.mbYTPlayer.locationProtocol + "//www.youtube.com/v/" + i.videoID), 1, i.opt.quality), jQuery(i).optimizeDisplay(), jQuery.mbYTPlayer.checkForState(i), jQuery.mbYTPlayer.getDataFromAPI(i)
            }), jQuery.mbYTPlayer.applyMask(i)
        },
        getPlayer: function() {
            return jQuery(this).get(0).player
        },
        playerDestroy: function() {
            var e = this.get(0);
            ytp.YTAPIReady = !0, ytp.backgroundIsInited = !1, e.isInit = !1, e.videoID = null;
            var t = e.wrapper;
            return t.remove(), jQuery("#controlBar_" + e.id).remove(), clearInterval(e.checkForStartAt), clearInterval(e.getState), this
        },
        fullscreen: function(real) {
            function hideMouse() {
                YTPlayer.overlay.css({
                    cursor: "none"
                })
            }

            function RunPrefixMethod(e, t) {
                for (var i, r, s = ["webkit", "moz", "ms", "o", ""], a = 0; a < s.length && !e[i];) {
                    if (i = t, "" == s[a] && (i = i.substr(0, 1).toLowerCase() + i.substr(1)), i = s[a] + i, r = typeof e[i], "undefined" != r) return s = [s[a]], "function" == r ? e[i]() : e[i];
                    a++
                }
            }

            function launchFullscreen(e) {
                RunPrefixMethod(e, "RequestFullScreen")
            }

            function cancelFullscreen() {
                (RunPrefixMethod(document, "FullScreen") || RunPrefixMethod(document, "IsFullScreen")) && RunPrefixMethod(document, "CancelFullScreen")
            }
            var YTPlayer = this.get(0);
            "undefined" == typeof real && (real = YTPlayer.opt.realfullscreen), real = eval(real);
            var controls = jQuery("#controlBar_" + YTPlayer.id),
                fullScreenBtn = controls.find(".mb_OnlyYT"),
                videoWrapper = YTPlayer.isSelf ? YTPlayer.opt.containment : YTPlayer.wrapper;
            if (real) {
                var fullscreenchange = jQuery.browser.mozilla ? "mozfullscreenchange" : jQuery.browser.webkit ? "webkitfullscreenchange" : "fullscreenchange";
                jQuery(document).off(fullscreenchange).on(fullscreenchange, function() {
                    var e = RunPrefixMethod(document, "IsFullScreen") || RunPrefixMethod(document, "FullScreen");
                    e ? (jQuery(YTPlayer).YTPSetVideoQuality("default"), jQuery(YTPlayer).trigger("YTPFullScreenStart")) : (YTPlayer.isAlone = !1, fullScreenBtn.html(jQuery.mbYTPlayer.controls.onlyYT), jQuery(YTPlayer).YTPSetVideoQuality(YTPlayer.opt.quality), videoWrapper.removeClass("YTPFullscreen"), videoWrapper.CSSAnimate({
                        opacity: YTPlayer.opt.opacity
                    }, 500), videoWrapper.css({
                        zIndex: 0
                    }), YTPlayer.isBackground ? jQuery("body").after(controls) : YTPlayer.wrapper.before(controls), jQuery(window).resize(), jQuery(YTPlayer).trigger("YTPFullScreenEnd"))
                })
            }
            return YTPlayer.isAlone ? (jQuery(document).off("mousemove.YTPlayer"), YTPlayer.overlay.css({
                cursor: "auto"
            }), real ? cancelFullscreen() : (videoWrapper.CSSAnimate({
                opacity: YTPlayer.opt.opacity
            }, 500), videoWrapper.css({
                zIndex: 0
            })), fullScreenBtn.html(jQuery.mbYTPlayer.controls.onlyYT), YTPlayer.isAlone = !1) : (jQuery(document).on("mousemove.YTPlayer", function(e) {
                YTPlayer.overlay.css({
                    cursor: "auto"
                }), clearTimeout(YTPlayer.hideCursor), jQuery(e.target).parents().is(".mb_YTPBar") || (YTPlayer.hideCursor = setTimeout(hideMouse, 3e3))
            }), hideMouse(), real ? (videoWrapper.css({
                opacity: 0
            }), videoWrapper.addClass("YTPFullscreen"), launchFullscreen(videoWrapper.get(0)), setTimeout(function() {
                videoWrapper.CSSAnimate({
                    opacity: 1
                }, 1e3), YTPlayer.wrapper.append(controls), jQuery(YTPlayer).optimizeDisplay(), YTPlayer.player.seekTo(YTPlayer.player.getCurrentTime() + .1, !0)
            }, 500)) : videoWrapper.css({
                zIndex: 1e4
            }).CSSAnimate({
                opacity: 1
            }, 1e3), fullScreenBtn.html(jQuery.mbYTPlayer.controls.showSite), YTPlayer.isAlone = !0), this
        },
        toggleLoops: function() {
            var e = this.get(0),
                t = e.opt;
            return 1 == t.loop ? t.loop = 0 : (t.startAt ? e.player.seekTo(t.startAt) : e.player.playVideo(), t.loop = 1), this
        },
        play: function() {
            var e = this.get(0);
            if (!e.isReady) return this;
            e.player.playVideo(), e.wrapper.CSSAnimate({
                opacity: e.isAlone ? 1 : e.opt.opacity
            }, 2e3), jQuery(e.playerEl).CSSAnimate({
                opacity: 1
            }, 1e3);
            var t = jQuery("#controlBar_" + e.id),
                i = t.find(".mb_YTPPlaypause");
            return i.html(jQuery.mbYTPlayer.controls.pause), e.state = 1, jQuery(e).css("background-image", "none"), this
        },
        togglePlay: function(e) {
            var t = this.get(0);
            return 1 == t.state ? this.YTPPause() : this.YTPPlay(), "function" == typeof e && e(t.state), this
        },
        stop: function() {
            var e = this.get(0),
                t = jQuery("#controlBar_" + e.id),
                i = t.find(".mb_YTPPlaypause");
            return i.html(jQuery.mbYTPlayer.controls.play), e.player.stopVideo(), this
        },
        pause: function() {
            var e = this.get(0);
            return e.player.pauseVideo(), e.state = 2, this
        },
        seekTo: function(e) {
            var t = this.get(0);
            return t.player.seekTo(e, !0), this
        },
        setVolume: function(e) {
            var t = this.get(0);
            return e || t.opt.vol || 0 != t.player.getVolume() ? !e && t.player.getVolume() > 0 || e && t.opt.vol == e ? t.isMute ? jQuery(t).YTPUnmute() : jQuery(t).YTPMute() : (t.opt.vol = e, t.player.setVolume(t.opt.vol), t.volumeBar && t.volumeBar.length && t.volumeBar.updateSliderVal(e)) : jQuery(t).YTPUnmute(), this
        },
        toggleVolume: function() {
            var e = this.get(0);
            return e ? e.player.isMuted() ? (jQuery(e).YTPUnmute(), !0) : (jQuery(e).YTPMute(), !1) : void 0
        },
        mute: function() {
            var e = this.get(0);
            if (!e.isMute) {
                e.player.mute(), e.isMute = !0, e.player.setVolume(0), e.volumeBar && e.volumeBar.length && e.volumeBar.width() > 10 && e.volumeBar.updateSliderVal(0);
                var t = jQuery("#controlBar_" + e.id),
                    i = t.find(".mb_YTPMuteUnmute");
                i.html(jQuery.mbYTPlayer.controls.unmute), jQuery(e).addClass("isMuted"), e.volumeBar && e.volumeBar.length && e.volumeBar.addClass("muted");
                var r = jQuery.Event("YTPMuted");
                return r.time = e.currentTime, e.canTrigger && jQuery(e).trigger(r), this
            }
        },
        unmute: function() {
            var e = this.get(0);
            if (e.isMute) {
                e.player.unMute(), e.isMute = !1, e.player.setVolume(e.opt.vol), e.volumeBar && e.volumeBar.length && e.volumeBar.updateSliderVal(e.opt.vol > 10 ? e.opt.vol : 10);
                var t = jQuery("#controlBar_" + e.id),
                    i = t.find(".mb_YTPMuteUnmute");
                i.html(jQuery.mbYTPlayer.controls.mute), jQuery(e).removeClass("isMuted"), e.volumeBar && e.volumeBar.length && e.volumeBar.removeClass("muted");
                var r = jQuery.Event("YTPUnmuted");
                return r.time = e.currentTime, e.canTrigger && jQuery(e).trigger(r), this
            }
        },
        applyFilter: function(e, t) {
            return this.each(function() {
                var i = this;
                i.filters[e].value = t, i.filtersEnabled && jQuery(i).YTPEnableFilters()
            })
        },
        applyFilters: function(e) {
            return this.each(function() {
                var t = this;
                if (!t.isReady) return void jQuery(t).on("YTPReady", function() {
                    jQuery(t).YTPApplyFilters(e)
                });
                for (var i in e) jQuery(t).YTPApplyFilter(i, e[i]);
                jQuery(t).trigger("YTPFiltersApplied")
            })
        },
        toggleFilter: function(e, t) {
            return this.each(function() {
                var i = this;
                i.filters[e].value ? i.filters[e].value = 0 : i.filters[e].value = t, i.filtersEnabled && jQuery(this).YTPEnableFilters()
            })
        },
        toggleFilters: function(e) {
            return this.each(function() {
                var t = this;
                t.filtersEnabled ? (jQuery(t).trigger("YTPDisableFilters"), jQuery(t).YTPDisableFilters()) : (jQuery(t).YTPEnableFilters(), jQuery(t).trigger("YTPEnableFilters")), "function" == typeof e && e(t.filtersEnabled)
            })
        },
        disableFilters: function() {
            return this.each(function() {
                var e = this,
                    t = jQuery(e.playerEl);
                t.css("-webkit-filter", ""), t.css("filter", ""), e.filtersEnabled = !1
            })
        },
        enableFilters: function() {
            return this.each(function() {
                var e = this,
                    t = jQuery(e.playerEl),
                    i = "";
                for (var r in e.filters) e.filters[r].value && (i += r.replace("_", "-") + "(" + e.filters[r].value + e.filters[r].unit + ") ");
                t.css("-webkit-filter", i), t.css("filter", i), e.filtersEnabled = !0
            })
        },
        removeFilter: function(e, t) {
            return this.each(function() {
                var i = this;
                if ("function" == typeof e && (t = e, e = null), e) jQuery(this).YTPApplyFilter(e, 0), "function" == typeof t && t(e);
                else
                    for (var r in i.filters) jQuery(this).YTPApplyFilter(r, 0), "function" == typeof t && t(r)
            })
        },
        getFilters: function() {
            var e = this.get(0);
            return e.filters
        },
        addMask: function(e) {
            var t = this.get(0),
                i = t.overlay;
            e || (e = t.actualMask);
            var r = jQuery("<img/>").attr("src", e).on("load", function() {
                i.CSSAnimate({
                    opacity: 0
                }, 500, function() {
                    t.hasMask = !0, r.remove(), i.css({
                        backgroundImage: "url(" + e + ")",
                        backgroundRepeat: "no-repeat",
                        backgroundPosition: "center center",
                        backgroundSize: "cover"
                    }), i.CSSAnimate({
                        opacity: 1
                    }, 500)
                })
            });
            return this
        },
        removeMask: function() {
            var e = this.get(0),
                t = e.overlay;
            return t.CSSAnimate({
                opacity: 0
            }, 500, function() {
                e.hasMask = !1, t.css({
                    backgroundImage: "",
                    backgroundRepeat: "",
                    backgroundPosition: "",
                    backgroundSize: ""
                }), t.CSSAnimate({
                    opacity: 1
                }, 500)
            }), this
        },
        applyMask: function(e) {
            var t = jQuery(e);
            if (t.off("YTPTime.mask"), e.opt.mask)
                if ("string" == typeof e.opt.mask) t.YTPAddMask(e.opt.mask), e.actualMask = e.opt.mask;
                else if ("object" == typeof e.opt.mask) {
                    for (var i in e.opt.mask) e.opt.mask[i] && jQuery("<img/>").attr("src", e.opt.mask[i]);
                    e.opt.mask[0] && t.YTPAddMask(e.opt.mask[0]), t.on("YTPTime.mask", function(i) {
                        for (var r in e.opt.mask) i.time == r && (e.opt.mask[r] ? (t.YTPAddMask(e.opt.mask[r]), e.actualMask = e.opt.mask[r]) : t.YTPRemoveMask())
                    })
                }
        },
        toggleMask: function() {
            var e = this.get(0),
                t = $(e);
            return e.hasMask ? t.YTPRemoveMask() : t.YTPAddMask(), this
        },
        manageProgress: function() {
            var e = this.get(0),
                t = jQuery("#controlBar_" + e.id),
                i = t.find(".mb_YTPProgress"),
                r = t.find(".mb_YTPLoaded"),
                s = t.find(".mb_YTPseekbar"),
                a = i.outerWidth(),
                n = Math.floor(e.player.getCurrentTime()),
                o = Math.floor(e.player.getDuration()),
                l = n * a / o,
                c = 0,
                u = 100 * e.player.getVideoLoadedFraction();
            return r.css({
                left: c,
                width: u + "%"
            }), s.css({
                left: 0,
                width: l
            }), {
                totalTime: o,
                currentTime: n
            }
        },
        buildControls: function(YTPlayer) {
            var data = YTPlayer.opt;
            if (data.showYTLogo = data.showYTLogo || data.printUrl, !jQuery("#controlBar_" + YTPlayer.id).length) {
                YTPlayer.controlBar = jQuery("<span/>").attr("id", "controlBar_" + YTPlayer.id).addClass("mb_YTPBar").css({
                    whiteSpace: "noWrap",
                    position: YTPlayer.isBackground ? "fixed" : "absolute",
                    zIndex: YTPlayer.isBackground ? 1e4 : 1e3
                }).hide();
                var buttonBar = jQuery("<div/>").addClass("buttonBar"),
                    playpause = jQuery("<span>" + jQuery.mbYTPlayer.controls.play + "</span>").addClass("mb_YTPPlaypause ytpicon").click(function() {
                        1 == YTPlayer.player.getPlayerState() ? jQuery(YTPlayer).YTPPause() : jQuery(YTPlayer).YTPPlay()
                    }),
                    MuteUnmute = jQuery("<span>" + jQuery.mbYTPlayer.controls.mute + "</span>").addClass("mb_YTPMuteUnmute ytpicon").click(function() {
                        0 == YTPlayer.player.getVolume() ? jQuery(YTPlayer).YTPUnmute() : jQuery(YTPlayer).YTPMute()
                    }),
                    volumeBar = jQuery("<div/>").addClass("mb_YTPVolumeBar").css({
                        display: "inline-block"
                    });
                YTPlayer.volumeBar = volumeBar;
                var idx = jQuery("<span/>").addClass("mb_YTPTime"),
                    vURL = data.videoURL ? data.videoURL : "";
                vURL.indexOf("http") < 0 && (vURL = jQuery.mbYTPlayer.locationProtocol + "//www.youtube.com/watch?v=" + data.videoURL);
                var movieUrl = jQuery("<span/>").html(jQuery.mbYTPlayer.controls.ytLogo).addClass("mb_YTPUrl ytpicon").attr("title", "view on YouTube").on("click", function() {
                        window.open(vURL, "viewOnYT")
                    }),
                    onlyVideo = jQuery("<span/>").html(jQuery.mbYTPlayer.controls.onlyYT).addClass("mb_OnlyYT ytpicon").on("click", function() {
                        jQuery(YTPlayer).YTPFullscreen(data.realfullscreen)
                    }),
                    progressBar = jQuery("<div/>").addClass("mb_YTPProgress").css("position", "absolute").click(function(e) {
                        timeBar.css({
                            width: e.clientX - timeBar.offset().left
                        }), YTPlayer.timeW = e.clientX - timeBar.offset().left, YTPlayer.controlBar.find(".mb_YTPLoaded").css({
                            width: 0
                        });
                        var t = Math.floor(YTPlayer.player.getDuration());
                        YTPlayer["goto"] = timeBar.outerWidth() * t / progressBar.outerWidth(), YTPlayer.player.seekTo(parseFloat(YTPlayer["goto"]), !0), YTPlayer.controlBar.find(".mb_YTPLoaded").css({
                            width: 0
                        })
                    }),
                    loadedBar = jQuery("<div/>").addClass("mb_YTPLoaded").css("position", "absolute"),
                    timeBar = jQuery("<div/>").addClass("mb_YTPseekbar").css("position", "absolute");
                progressBar.append(loadedBar).append(timeBar), buttonBar.append(playpause).append(MuteUnmute).append(volumeBar).append(idx), data.showYTLogo && buttonBar.append(movieUrl), (YTPlayer.isBackground || eval(YTPlayer.opt.realfullscreen) && !YTPlayer.isBackground) && buttonBar.append(onlyVideo), YTPlayer.controlBar.append(buttonBar).append(progressBar), YTPlayer.isBackground ? jQuery("body").after(YTPlayer.controlBar) : (YTPlayer.controlBar.addClass("inlinePlayer"), YTPlayer.wrapper.before(YTPlayer.controlBar)), volumeBar.simpleSlider({
                    initialval: YTPlayer.opt.vol,
                    scale: 100,
                    orientation: "h",
                    callback: function(e) {
                        0 == e.value ? jQuery(YTPlayer).YTPMute() : jQuery(YTPlayer).YTPUnmute(), YTPlayer.player.setVolume(e.value), YTPlayer.isMute || (YTPlayer.opt.vol = e.value)
                    }
                })
            }
        },
        checkForState: function(YTPlayer) {
            var interval = YTPlayer.opt.showControls ? 100 : 400;
            return clearInterval(YTPlayer.getState), jQuery.contains(document, YTPlayer) ? (jQuery.mbYTPlayer.checkForStart(YTPlayer), void(YTPlayer.getState = setInterval(function() {
                var prog = jQuery(YTPlayer).YTPManageProgress(),
                    $YTPlayer = jQuery(YTPlayer),
                    data = YTPlayer.opt,
                    startAt = YTPlayer.opt.startAt ? YTPlayer.opt.startAt : 1,
                    stopAt = YTPlayer.opt.stopAt > YTPlayer.opt.startAt ? YTPlayer.opt.stopAt : 0;
                if (stopAt = stopAt < YTPlayer.player.getDuration() ? stopAt : 0, YTPlayer.currentTime != prog.currentTime) {
                    var YTPEvent = jQuery.Event("YTPTime");
                    YTPEvent.time = YTPlayer.currentTime, jQuery(YTPlayer).trigger(YTPEvent)
                }
                if (YTPlayer.currentTime = prog.currentTime, YTPlayer.totalTime = YTPlayer.player.getDuration(), 0 == YTPlayer.player.getVolume() ? $YTPlayer.addClass("isMuted") : $YTPlayer.removeClass("isMuted"), YTPlayer.opt.showControls && (prog.totalTime ? YTPlayer.controlBar.find(".mb_YTPTime").html(jQuery.mbYTPlayer.formatTime(prog.currentTime) + " / " + jQuery.mbYTPlayer.formatTime(prog.totalTime)) : YTPlayer.controlBar.find(".mb_YTPTime").html("-- : -- / -- : --")), eval(YTPlayer.opt.stopMovieOnBlur) && (document.hasFocus() ? document.hasFocus() && !YTPlayer.hasFocus && -1 != YTPlayer.state && 0 != YTPlayer.state && (YTPlayer.hasFocus = !0, $YTPlayer.YTPPlay()) : 1 == YTPlayer.state && (YTPlayer.hasFocus = !1, $YTPlayer.YTPPause())), YTPlayer.controlBar.length && YTPlayer.controlBar.outerWidth() <= 400 && !YTPlayer.isCompact ? (YTPlayer.controlBar.addClass("compact"), YTPlayer.isCompact = !0, !YTPlayer.isMute && YTPlayer.volumeBar && YTPlayer.volumeBar.updateSliderVal(YTPlayer.opt.vol)) : YTPlayer.controlBar.length && YTPlayer.controlBar.outerWidth() > 400 && YTPlayer.isCompact && (YTPlayer.controlBar.removeClass("compact"), YTPlayer.isCompact = !1, !YTPlayer.isMute && YTPlayer.volumeBar && YTPlayer.volumeBar.updateSliderVal(YTPlayer.opt.vol)), 1 == YTPlayer.player.getPlayerState() && (parseFloat(YTPlayer.player.getDuration() - 1.5) < YTPlayer.player.getCurrentTime() || stopAt > 0 && parseFloat(YTPlayer.player.getCurrentTime()) > stopAt)) {
                    if (YTPlayer.isEnded) return;
                    if (YTPlayer.isEnded = !0, setTimeout(function() {
                        YTPlayer.isEnded = !1
                    }, 1e3), YTPlayer.isPlayList) {
                        if (!data.loop || data.loop > 0 && YTPlayer.player.loopTime === data.loop - 1) {
                            YTPlayer.player.loopTime = void 0, clearInterval(YTPlayer.getState);
                            var YTPEnd = jQuery.Event("YTPEnd");
                            return YTPEnd.time = YTPlayer.currentTime, void jQuery(YTPlayer).trigger(YTPEnd)
                        }
                    } else if (!data.loop || data.loop > 0 && YTPlayer.player.loopTime === data.loop - 1) return YTPlayer.player.loopTime = void 0, YTPlayer.preventTrigger = !0, YTPlayer.state = 2, jQuery(YTPlayer).YTPPause(), void YTPlayer.wrapper.CSSAnimate({
                        opacity: 0
                    }, 500, function() {
                        YTPlayer.controlBar.length && YTPlayer.controlBar.find(".mb_YTPPlaypause").html(jQuery.mbYTPlayer.controls.play);
                        var e = jQuery.Event("YTPEnd");
                        e.time = YTPlayer.currentTime, jQuery(YTPlayer).trigger(e), YTPlayer.player.seekTo(startAt, !0), YTPlayer.isBackground || YTPlayer.opt.containment.css({
                            background: "rgba(0,0,0,0.5) url(" + YTPlayer.opt.backgroundUrl + ") center center",
                            backgroundSize: "cover"
                        })
                    });
                    YTPlayer.player.loopTime = YTPlayer.player.loopTime ? ++YTPlayer.player.loopTime : 1, startAt = startAt || 1, YTPlayer.preventTrigger = !0, YTPlayer.state = 2, jQuery(YTPlayer).YTPPause(), YTPlayer.player.seekTo(startAt, !0), $YTPlayer.YTPPlay()
                }
            }, interval))) : (jQuery(YTPlayer).YTPPlayerDestroy(), clearInterval(YTPlayer.getState), void clearInterval(YTPlayer.checkForStartAt))
        },
        getTime: function() {
            var e = this.get(0);
            return jQuery.mbYTPlayer.formatTime(e.currentTime)
        },
        getTotalTime: function() {
            var e = this.get(0);
            return jQuery.mbYTPlayer.formatTime(e.totalTime)
        },
        checkForStart: function(e) {
            var t = jQuery(e);
            if (!jQuery.contains(document, e)) return void jQuery(e).YTPPlayerDestroy();
            if (e.preventTrigger = !0, e.state = 2, jQuery(e).YTPPause(), jQuery(e).muteYTPVolume(), jQuery("#controlBar_" + e.id).remove(), e.controlBar = !1, e.opt.showControls && jQuery.mbYTPlayer.buildControls(e), e.opt.addRaster) {
                var i = "dot" == e.opt.addRaster ? "raster-dot" : "raster";
                e.overlay.addClass(e.isRetina ? i + " retina" : i)
            } else e.overlay.removeClass(function(e, t) {
                var i = t.split(" "),
                    r = [];
                return jQuery.each(i, function(e, t) {
                    /raster.*/.test(t) && r.push(t)
                }), r.push("retina"), r.join(" ")
            });
            var r = e.opt.startAt ? e.opt.startAt : 1;
            e.player.playVideo(), e.player.seekTo(r, !0), e.checkForStartAt = setInterval(function() {
                jQuery(e).YTPMute();
                var i = e.player.getVideoLoadedFraction() >= r / e.player.getDuration();
                if (e.player.getDuration() > 0 && e.player.getCurrentTime() >= r && i) {
                    clearInterval(e.checkForStartAt), "function" == typeof e.opt.onReady && e.opt.onReady(e), e.isReady = !0;
                    var s = jQuery.Event("YTPReady");
                    if (s.time = e.currentTime, jQuery(e).trigger(s), e.preventTrigger = !0, e.state = 2, jQuery(e).YTPPause(),
                    e.opt.mute || jQuery(e).YTPUnmute(), e.canTrigger = !0, e.opt.autoPlay) {
                        var a = jQuery.Event("YTPStart");
                        a.time = e.currentTime, jQuery(e).trigger(a), t.css("background-image", "none"), jQuery(e.playerEl).CSSAnimate({
                            opacity: 1
                        }, 1e3), t.YTPPlay(), e.wrapper.CSSAnimate({
                            opacity: e.isAlone ? 1 : e.opt.opacity
                        }, 1e3), jQuery.browser.safari && (e.safariPlay = setInterval(function() {
                            1 != e.state ? t.YTPPlay() : clearInterval(e.safariPlay)
                        }, 10)), t.on("YTPReady", function() {
                            t.YTPPlay()
                        })
                    } else e.player.pauseVideo(), e.isPlayer || (jQuery(e.playerEl).CSSAnimate({
                        opacity: 1
                    }, 500), e.wrapper.CSSAnimate({
                        opacity: e.isAlone ? 1 : e.opt.opacity
                    }, 500)), e.controlBar.length && e.controlBar.find(".mb_YTPPlaypause").html(jQuery.mbYTPlayer.controls.play);
                    e.isPlayer && !e.opt.autoPlay && e.loading && e.loading.length && (e.loading.html("Ready"), setTimeout(function() {
                        e.loading.fadeOut()
                    }, 100)), e.controlBar && e.controlBar.length && e.controlBar.slideDown(1e3)
                } else jQuery.browser.safari && (e.player.playVideo(), r >= 0 && e.player.seekTo(r, !0))
            }, 1)
        },
        setAlign: function(e) {
            var t = this;
            t.optimizeDisplay(e)
        },
        getAlign: function() {
            var e = this.get(0);
            return e.opt.align
        },
        formatTime: function(e) {
            var t = Math.floor(e / 60),
                i = Math.floor(e - 60 * t);
            return (9 >= t ? "0" + t : t) + " : " + (9 >= i ? "0" + i : i)
        }
    }, jQuery.fn.optimizeDisplay = function(e) {
        var t = this.get(0),
            i = jQuery(t.playerEl),
            r = {};
        t.opt.align = e || t.opt.align, t.opt.align = "undefined " != typeof t.opt.align ? t.opt.align : "center,center";
        var s = t.opt.align.split(",");
        if (t.opt.optimizeDisplay) {
            var a = {},
                n = t.wrapper;
            a.width = n.outerWidth(), a.height = n.outerHeight(), r.width = a.width, r.height = "16/9" == t.opt.ratio ? Math.ceil(a.width * (9 / 16)) : Math.ceil(.75 * a.width), r.width = a.width, r.height = "16/9" == t.opt.ratio ? Math.ceil(a.width * (9 / 16)) : Math.ceil(.75 * a.width), r.marginTop = -((r.height - a.height) / 2), r.marginLeft = 0;
            var o = r.height < a.height;
            o && (r.height = a.height, r.width = "16/9" == t.opt.ratio ? Math.floor(a.height * (16 / 9)) : Math.floor(a.height * (4 / 3)), r.marginTop = 0, r.marginLeft = -((r.width - a.width) / 2));
            for (var l in s) {
                var c = s[l].trim();
                switch (c) {
                    case "top":
                        r.marginTop = o ? -((r.height - a.height) / 2) : 0;
                        break;
                    case "bottom":
                        r.marginTop = o ? 0 : -(r.height - a.height);
                        break;
                    case "left":
                        r.marginLeft = 0;
                        break;
                    case "right":
                        r.marginLeft = o ? -(r.width - a.width) : 0
                }
            }
        } else r.width = "100%", r.height = "100%", r.marginTop = 0, r.marginLeft = 0;
        i.css({
            width: r.width,
            height: r.height,
            marginTop: r.marginTop,
            marginLeft: r.marginLeft
        })
    }, jQuery.shuffle = function(e) {
        for (var t = e.slice(), i = t.length, r = i; r--;) {
            var s = parseInt(Math.random() * i),
                a = t[r];
            t[r] = t[s], t[s] = a
        }
        return t
    }, jQuery.fn.unselectable = function() {
        return this.each(function() {
            jQuery(this).css({
                "-moz-user-select": "none",
                "-webkit-user-select": "none",
                "user-select": "none"
            }).attr("unselectable", "on")
        })
    }, jQuery.fn.YTPlayer = jQuery.mbYTPlayer.buildPlayer, jQuery.fn.YTPGetPlayer = jQuery.mbYTPlayer.getPlayer, jQuery.fn.YTPGetVideoID = jQuery.mbYTPlayer.getVideoID, jQuery.fn.YTPChangeMovie = jQuery.mbYTPlayer.changeMovie, jQuery.fn.YTPPlayerDestroy = jQuery.mbYTPlayer.playerDestroy, jQuery.fn.YTPPlay = jQuery.mbYTPlayer.play, jQuery.fn.YTPTogglePlay = jQuery.mbYTPlayer.togglePlay, jQuery.fn.YTPStop = jQuery.mbYTPlayer.stop, jQuery.fn.YTPPause = jQuery.mbYTPlayer.pause, jQuery.fn.YTPSeekTo = jQuery.mbYTPlayer.seekTo, jQuery.fn.YTPlaylist = jQuery.mbYTPlayer.playlist, jQuery.fn.YTPPlayNext = jQuery.mbYTPlayer.playNext, jQuery.fn.YTPPlayPrev = jQuery.mbYTPlayer.playPrev, jQuery.fn.YTPPlayIndex = jQuery.mbYTPlayer.playIndex, jQuery.fn.YTPMute = jQuery.mbYTPlayer.mute, jQuery.fn.YTPUnmute = jQuery.mbYTPlayer.unmute, jQuery.fn.YTPToggleVolume = jQuery.mbYTPlayer.toggleVolume, jQuery.fn.YTPSetVolume = jQuery.mbYTPlayer.setVolume, jQuery.fn.YTPGetVideoData = jQuery.mbYTPlayer.getVideoData, jQuery.fn.YTPFullscreen = jQuery.mbYTPlayer.fullscreen, jQuery.fn.YTPToggleLoops = jQuery.mbYTPlayer.toggleLoops, jQuery.fn.YTPSetVideoQuality = jQuery.mbYTPlayer.setVideoQuality, jQuery.fn.YTPManageProgress = jQuery.mbYTPlayer.manageProgress, jQuery.fn.YTPApplyFilter = jQuery.mbYTPlayer.applyFilter, jQuery.fn.YTPApplyFilters = jQuery.mbYTPlayer.applyFilters, jQuery.fn.YTPToggleFilter = jQuery.mbYTPlayer.toggleFilter, jQuery.fn.YTPToggleFilters = jQuery.mbYTPlayer.toggleFilters, jQuery.fn.YTPRemoveFilter = jQuery.mbYTPlayer.removeFilter, jQuery.fn.YTPDisableFilters = jQuery.mbYTPlayer.disableFilters, jQuery.fn.YTPEnableFilters = jQuery.mbYTPlayer.enableFilters, jQuery.fn.YTPGetFilters = jQuery.mbYTPlayer.getFilters, jQuery.fn.YTPGetTime = jQuery.mbYTPlayer.getTime, jQuery.fn.YTPGetTotalTime = jQuery.mbYTPlayer.getTotalTime, jQuery.fn.YTPAddMask = jQuery.mbYTPlayer.addMask, jQuery.fn.YTPRemoveMask = jQuery.mbYTPlayer.removeMask, jQuery.fn.YTPToggleMask = jQuery.mbYTPlayer.toggleMask, jQuery.fn.YTPSetAlign = jQuery.mbYTPlayer.setAlign, jQuery.fn.YTPGetAlign = jQuery.mbYTPlayer.getAlign, jQuery.fn.mb_YTPlayer = jQuery.mbYTPlayer.buildPlayer, jQuery.fn.playNext = jQuery.mbYTPlayer.playNext, jQuery.fn.playPrev = jQuery.mbYTPlayer.playPrev, jQuery.fn.changeMovie = jQuery.mbYTPlayer.changeMovie, jQuery.fn.getVideoID = jQuery.mbYTPlayer.getVideoID, jQuery.fn.getPlayer = jQuery.mbYTPlayer.getPlayer, jQuery.fn.playerDestroy = jQuery.mbYTPlayer.playerDestroy, jQuery.fn.fullscreen = jQuery.mbYTPlayer.fullscreen, jQuery.fn.buildYTPControls = jQuery.mbYTPlayer.buildControls, jQuery.fn.playYTP = jQuery.mbYTPlayer.play, jQuery.fn.toggleLoops = jQuery.mbYTPlayer.toggleLoops, jQuery.fn.stopYTP = jQuery.mbYTPlayer.stop, jQuery.fn.pauseYTP = jQuery.mbYTPlayer.pause, jQuery.fn.seekToYTP = jQuery.mbYTPlayer.seekTo, jQuery.fn.muteYTPVolume = jQuery.mbYTPlayer.mute, jQuery.fn.unmuteYTPVolume = jQuery.mbYTPlayer.unmute, jQuery.fn.setYTPVolume = jQuery.mbYTPlayer.setVolume, jQuery.fn.setVideoQuality = jQuery.mbYTPlayer.setVideoQuality, jQuery.fn.manageYTPProgress = jQuery.mbYTPlayer.manageProgress, jQuery.fn.YTPGetDataFromFeed = jQuery.mbYTPlayer.getVideoData
}(jQuery, ytp), jQuery.support.CSStransition = function() {
    var e = document.body || document.documentElement,
        t = e.style;
    return void 0 !== t.transition || void 0 !== t.WebkitTransition || void 0 !== t.MozTransition || void 0 !== t.MsTransition || void 0 !== t.OTransition
}(), jQuery.CSS = {
    name: "mb.CSSAnimate",
    author: "Matteo Bicocchi",
    version: "2.0.0",
    transitionEnd: "transitionEnd",
    sfx: "",
    filters: {
        blur: {
            min: 0,
            max: 100,
            unit: "px"
        },
        brightness: {
            min: 0,
            max: 400,
            unit: "%"
        },
        contrast: {
            min: 0,
            max: 400,
            unit: "%"
        },
        grayscale: {
            min: 0,
            max: 100,
            unit: "%"
        },
        hueRotate: {
            min: 0,
            max: 360,
            unit: "deg"
        },
        invert: {
            min: 0,
            max: 100,
            unit: "%"
        },
        saturate: {
            min: 0,
            max: 400,
            unit: "%"
        },
        sepia: {
            min: 0,
            max: 100,
            unit: "%"
        }
    },
    normalizeCss: function(e) {
        var t = jQuery.extend(!0, {}, e);
        jQuery.browser.webkit || jQuery.browser.opera ? jQuery.CSS.sfx = "-webkit-" : jQuery.browser.mozilla ? jQuery.CSS.sfx = "-moz-" : jQuery.browser.msie && (jQuery.CSS.sfx = "-ms-");
        for (var i in t) {
            "transform" === i && (t[jQuery.CSS.sfx + "transform"] = t[i], delete t[i]), "transform-origin" === i && (t[jQuery.CSS.sfx + "transform-origin"] = e[i], delete t[i]), "filter" !== i || jQuery.browser.mozilla || (t[jQuery.CSS.sfx + "filter"] = e[i], delete t[i]), "blur" === i && setFilter(t, "blur", e[i]), "brightness" === i && setFilter(t, "brightness", e[i]), "contrast" === i && setFilter(t, "contrast", e[i]), "grayscale" === i && setFilter(t, "grayscale", e[i]), "hueRotate" === i && setFilter(t, "hueRotate", e[i]), "invert" === i && setFilter(t, "invert", e[i]), "saturate" === i && setFilter(t, "saturate", e[i]), "sepia" === i && setFilter(t, "sepia", e[i]);
            var r = "";
            "x" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " translateX(" + setUnit(e[i], "px") + ")", delete t[i]), "y" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " translateY(" + setUnit(e[i], "px") + ")", delete t[i]), "z" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " translateZ(" + setUnit(e[i], "px") + ")", delete t[i]), "rotate" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " rotate(" + setUnit(e[i], "deg") + ")", delete t[i]), "rotateX" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " rotateX(" + setUnit(e[i], "deg") + ")", delete t[i]), "rotateY" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " rotateY(" + setUnit(e[i], "deg") + ")", delete t[i]), "rotateZ" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " rotateZ(" + setUnit(e[i], "deg") + ")", delete t[i]), "scale" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " scale(" + setUnit(e[i], "") + ")", delete t[i]), "scaleX" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " scaleX(" + setUnit(e[i], "") + ")", delete t[i]), "scaleY" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " scaleY(" + setUnit(e[i], "") + ")", delete t[i]), "scaleZ" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " scaleZ(" + setUnit(e[i], "") + ")", delete t[i]), "skew" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " skew(" + setUnit(e[i], "deg") + ")", delete t[i]), "skewX" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " skewX(" + setUnit(e[i], "deg") + ")", delete t[i]), "skewY" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " skewY(" + setUnit(e[i], "deg") + ")", delete t[i]), "perspective" === i && (r = jQuery.CSS.sfx + "transform", t[r] = t[r] || "", t[r] += " perspective(" + setUnit(e[i], "px") + ")", delete t[i])
        }
        return t
    },
    getProp: function(e) {
        var t = [];
        for (var i in e) t.indexOf(i) < 0 && t.push(uncamel(i));
        return t.join(",")
    },
    animate: function(e, t, i, r, s) {
        return this.each(function() {
            function a() {
                n.called = !0, n.CSSAIsRunning = !1, o.off(jQuery.CSS.transitionEnd + "." + n.id), clearTimeout(n.timeout), o.css(jQuery.CSS.sfx + "transition", ""), "function" == typeof s && s.apply(n), "function" == typeof n.CSSqueue && (n.CSSqueue(), n.CSSqueue = null)
            }
            var n = this,
                o = jQuery(this);
            n.id = n.id || "CSSA_" + (new Date).getTime();
            var l = l || {
                type: "noEvent"
            };
            if (n.CSSAIsRunning && n.eventType == l.type && !jQuery.browser.msie && jQuery.browser.version <= 9) return void(n.CSSqueue = function() {
                o.CSSAnimate(e, t, i, r, s)
            });
            if (n.CSSqueue = null, n.eventType = l.type, 0 !== o.length && e) {
                if (e = jQuery.normalizeCss(e), n.CSSAIsRunning = !0, "function" == typeof t && (s = t, t = jQuery.fx.speeds._default), "function" == typeof i && (r = i, i = 0), "string" == typeof i && (s = i, i = 0), "function" == typeof r && (s = r, r = "cubic-bezier(0.65,0.03,0.36,0.72)"), "string" == typeof t)
                    for (var c in jQuery.fx.speeds) {
                        if (t == c) {
                            t = jQuery.fx.speeds[c];
                            break
                        }
                        t = jQuery.fx.speeds._default
                    }
                if (t || (t = jQuery.fx.speeds._default), "string" == typeof s && (r = s, s = null), !jQuery.support.CSStransition) {
                    for (var u in e) {
                        if ("transform" === u && delete e[u], "filter" === u && delete e[u], "transform-origin" === u && delete e[u], "auto" === e[u] && delete e[u], "x" === u) {
                            var _ = e[u],
                                h = "left";
                            e[h] = _, delete e[u]
                        }
                        if ("y" === u) {
                            var _ = e[u],
                                h = "top";
                            e[h] = _, delete e[u]
                        }("-ms-transform" === u || "-ms-filter" === u) && delete e[u]
                    }
                    return void o.delay(i).animate(e, t, s)
                }
                var d = {
                    "default": "ease",
                    "in": "ease-in",
                    out: "ease-out",
                    "in-out": "ease-in-out",
                    snap: "cubic-bezier(0,1,.5,1)",
                    easeOutCubic: "cubic-bezier(.215,.61,.355,1)",
                    easeInOutCubic: "cubic-bezier(.645,.045,.355,1)",
                    easeInCirc: "cubic-bezier(.6,.04,.98,.335)",
                    easeOutCirc: "cubic-bezier(.075,.82,.165,1)",
                    easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)",
                    easeInExpo: "cubic-bezier(.95,.05,.795,.035)",
                    easeOutExpo: "cubic-bezier(.19,1,.22,1)",
                    easeInOutExpo: "cubic-bezier(1,0,0,1)",
                    easeInQuad: "cubic-bezier(.55,.085,.68,.53)",
                    easeOutQuad: "cubic-bezier(.25,.46,.45,.94)",
                    easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)",
                    easeInQuart: "cubic-bezier(.895,.03,.685,.22)",
                    easeOutQuart: "cubic-bezier(.165,.84,.44,1)",
                    easeInOutQuart: "cubic-bezier(.77,0,.175,1)",
                    easeInQuint: "cubic-bezier(.755,.05,.855,.06)",
                    easeOutQuint: "cubic-bezier(.23,1,.32,1)",
                    easeInOutQuint: "cubic-bezier(.86,0,.07,1)",
                    easeInSine: "cubic-bezier(.47,0,.745,.715)",
                    easeOutSine: "cubic-bezier(.39,.575,.565,1)",
                    easeInOutSine: "cubic-bezier(.445,.05,.55,.95)",
                    easeInBack: "cubic-bezier(.6,-.28,.735,.045)",
                    easeOutBack: "cubic-bezier(.175, .885,.32,1.275)",
                    easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)"
                };
                d[r] && (r = d[r]), o.off(jQuery.CSS.transitionEnd + "." + n.id);
                var p = jQuery.CSS.getProp(e),
                    f = {};
                jQuery.extend(f, e), f[jQuery.CSS.sfx + "transition-property"] = p, f[jQuery.CSS.sfx + "transition-duration"] = t + "ms", f[jQuery.CSS.sfx + "transition-delay"] = i + "ms", f[jQuery.CSS.sfx + "transition-timing-function"] = r, setTimeout(function() {
                    o.one(jQuery.CSS.transitionEnd + "." + n.id, a), o.css(f)
                }, 1), n.timeout = setTimeout(function() {
                    return n.called || !s ? (n.called = !1, void(n.CSSAIsRunning = !1)) : (o.css(jQuery.CSS.sfx + "transition", ""), s.apply(n), n.CSSAIsRunning = !1, void("function" == typeof n.CSSqueue && (n.CSSqueue(), n.CSSqueue = null)))
                }, t + i + 10)
            }
        })
    }
}, jQuery.fn.CSSAnimate = jQuery.CSS.animate, jQuery.normalizeCss = jQuery.CSS.normalizeCss, jQuery.fn.css3 = function(e) {
    return this.each(function() {
        var t = jQuery(this),
            i = jQuery.normalizeCss(e);
        t.css(i)
    })
};
var nAgt = navigator.userAgent;
if (!jQuery.browser) {
    jQuery.browser = {}, jQuery.browser.mozilla = !1, jQuery.browser.webkit = !1, jQuery.browser.opera = !1, jQuery.browser.safari = !1, jQuery.browser.chrome = !1, jQuery.browser.androidStock = !1, jQuery.browser.msie = !1, jQuery.browser.ua = nAgt, jQuery.browser.name = navigator.appName, jQuery.browser.fullVersion = "" + parseFloat(navigator.appVersion), jQuery.browser.majorVersion = parseInt(navigator.appVersion, 10);
    var nameOffset, verOffset, ix;
    if (-1 != (verOffset = nAgt.indexOf("Opera"))) jQuery.browser.opera = !0, jQuery.browser.name = "Opera", jQuery.browser.fullVersion = nAgt.substring(verOffset + 6), -1 != (verOffset = nAgt.indexOf("Version")) && (jQuery.browser.fullVersion = nAgt.substring(verOffset + 8));
    else if (-1 != (verOffset = nAgt.indexOf("OPR"))) jQuery.browser.opera = !0, jQuery.browser.name = "Opera", jQuery.browser.fullVersion = nAgt.substring(verOffset + 4);
    else if (-1 != (verOffset = nAgt.indexOf("MSIE"))) jQuery.browser.msie = !0, jQuery.browser.name = "Microsoft Internet Explorer", jQuery.browser.fullVersion = nAgt.substring(verOffset + 5);
    else if (-1 != nAgt.indexOf("Trident") || -1 != nAgt.indexOf("Edge")) {
        jQuery.browser.msie = !0, jQuery.browser.name = "Microsoft Internet Explorer";
        var start = nAgt.indexOf("rv:") + 3,
            end = start + 4;
        jQuery.browser.fullVersion = nAgt.substring(start, end)
    } else -1 != (verOffset = nAgt.indexOf("Chrome")) ? (jQuery.browser.webkit = !0, jQuery.browser.chrome = !0, jQuery.browser.name = "Chrome", jQuery.browser.fullVersion = nAgt.substring(verOffset + 7)) : nAgt.indexOf("mozilla/5.0") > -1 && nAgt.indexOf("android ") > -1 && nAgt.indexOf("applewebkit") > -1 && !(nAgt.indexOf("chrome") > -1) ? (verOffset = nAgt.indexOf("Chrome"), jQuery.browser.webkit = !0, jQuery.browser.androidStock = !0, jQuery.browser.name = "androidStock", jQuery.browser.fullVersion = nAgt.substring(verOffset + 7)) : -1 != (verOffset = nAgt.indexOf("Safari")) ? (jQuery.browser.webkit = !0, jQuery.browser.safari = !0, jQuery.browser.name = "Safari", jQuery.browser.fullVersion = nAgt.substring(verOffset + 7), -1 != (verOffset = nAgt.indexOf("Version")) && (jQuery.browser.fullVersion = nAgt.substring(verOffset + 8))) : -1 != (verOffset = nAgt.indexOf("AppleWebkit")) ? (jQuery.browser.webkit = !0, jQuery.browser.safari = !0, jQuery.browser.name = "Safari", jQuery.browser.fullVersion = nAgt.substring(verOffset + 7), -1 != (verOffset = nAgt.indexOf("Version")) && (jQuery.browser.fullVersion = nAgt.substring(verOffset + 8))) : -1 != (verOffset = nAgt.indexOf("Firefox")) ? (jQuery.browser.mozilla = !0, jQuery.browser.name = "Firefox", jQuery.browser.fullVersion = nAgt.substring(verOffset + 8)) : (nameOffset = nAgt.lastIndexOf(" ") + 1) < (verOffset = nAgt.lastIndexOf("/")) && (jQuery.browser.name = nAgt.substring(nameOffset, verOffset), jQuery.browser.fullVersion = nAgt.substring(verOffset + 1), jQuery.browser.name.toLowerCase() == jQuery.browser.name.toUpperCase() && (jQuery.browser.name = navigator.appName)); - 1 != (ix = jQuery.browser.fullVersion.indexOf(";")) && (jQuery.browser.fullVersion = jQuery.browser.fullVersion.substring(0, ix)), -1 != (ix = jQuery.browser.fullVersion.indexOf(" ")) && (jQuery.browser.fullVersion = jQuery.browser.fullVersion.substring(0, ix)), jQuery.browser.majorVersion = parseInt("" + jQuery.browser.fullVersion, 10), isNaN(jQuery.browser.majorVersion) && (jQuery.browser.fullVersion = "" + parseFloat(navigator.appVersion), jQuery.browser.majorVersion = parseInt(navigator.appVersion, 10)), jQuery.browser.version = jQuery.browser.majorVersion
}
jQuery.browser.android = /Android/i.test(nAgt), jQuery.browser.blackberry = /BlackBerry|BB|PlayBook/i.test(nAgt), jQuery.browser.ios = /iPhone|iPad|iPod|webOS/i.test(nAgt), jQuery.browser.operaMobile = /Opera Mini/i.test(nAgt), jQuery.browser.windowsMobile = /IEMobile|Windows Phone/i.test(nAgt), jQuery.browser.kindle = /Kindle|Silk/i.test(nAgt), jQuery.browser.mobile = jQuery.browser.android || jQuery.browser.blackberry || jQuery.browser.ios || jQuery.browser.windowsMobile || jQuery.browser.operaMobile || jQuery.browser.kindle, jQuery.isMobile = jQuery.browser.mobile, jQuery.isTablet = jQuery.browser.mobile && jQuery(window).width() > 765, jQuery.isAndroidDefault = jQuery.browser.android && !/chrome/i.test(nAgt), ! function(e) {
    var t = (/iphone|ipod|ipad|android|ie|blackberry|fennec/.test(navigator.userAgent.toLowerCase()), "ontouchstart" in window || window.navigator && window.navigator.msPointerEnabled && window.MSGesture || window.DocumentTouch && document instanceof DocumentTouch || !1);
    e.simpleSlider = {
        defaults: {
            initialval: 0,
            scale: 100,
            orientation: "h",
            readonly: !1,
            callback: !1
        },
        events: {
            start: t ? "touchstart" : "mousedown",
            end: t ? "touchend" : "mouseup",
            move: t ? "touchmove" : "mousemove"
        },
        init: function(i) {
            return this.each(function() {
                var r = this,
                    s = e(r);
                s.addClass("simpleSlider"), r.opt = {}, e.extend(r.opt, e.simpleSlider.defaults, i), e.extend(r.opt, s.data());
                var a = "h" == r.opt.orientation ? "horizontal" : "vertical",
                    n = e("<div/>").addClass("level").addClass(a);
                s.prepend(n), r.level = n, s.css({
                    cursor: "default"
                }), "auto" == r.opt.scale && (r.opt.scale = e(r).outerWidth()), s.updateSliderVal(), r.opt.readonly || (s.on(e.simpleSlider.events.start, function(e) {
                    t && (e = e.changedTouches[0]), r.canSlide = !0, s.updateSliderVal(e), s.css({
                        cursor: "col-resize"
                    }), e.preventDefault(), e.stopPropagation()
                }), e(document).on(e.simpleSlider.events.move, function(i) {
                    t && (i = i.changedTouches[0]), r.canSlide && (e(document).css({
                        cursor: "default"
                    }), s.updateSliderVal(i), i.preventDefault(), i.stopPropagation())
                }).on(e.simpleSlider.events.end, function() {
                    e(document).css({
                        cursor: "auto"
                    }), r.canSlide = !1, s.css({
                        cursor: "auto"
                    })
                }))
            })
        },
        updateSliderVal: function(t) {
            function i(e, t) {
                return Math.floor(100 * e / t)
            }
            var r = this,
                s = r.get(0);
            if (s.opt) {
                s.opt.initialval = "number" == typeof s.opt.initialval ? s.opt.initialval : s.opt.initialval(s);
                var a = e(s).outerWidth(),
                    n = e(s).outerHeight();
                s.x = "object" == typeof t ? t.clientX + document.body.scrollLeft - r.offset().left : "number" == typeof t ? t * a / s.opt.scale : s.opt.initialval * a / s.opt.scale, s.y = "object" == typeof t ? t.clientY + document.body.scrollTop - r.offset().top : "number" == typeof t ? (s.opt.scale - s.opt.initialval - t) * n / s.opt.scale : s.opt.initialval * n / s.opt.scale, s.y = r.outerHeight() - s.y, s.scaleX = s.x * s.opt.scale / a, s.scaleY = s.y * s.opt.scale / n, s.outOfRangeX = s.scaleX > s.opt.scale ? s.scaleX - s.opt.scale : s.scaleX < 0 ? s.scaleX : 0, s.outOfRangeY = s.scaleY > s.opt.scale ? s.scaleY - s.opt.scale : s.scaleY < 0 ? s.scaleY : 0, s.outOfRange = "h" == s.opt.orientation ? s.outOfRangeX : s.outOfRangeY, "undefined" != typeof t ? s.value = "h" == s.opt.orientation ? s.x >= r.outerWidth() ? s.opt.scale : s.x <= 0 ? 0 : s.scaleX : s.y >= r.outerHeight() ? s.opt.scale : s.y <= 0 ? 0 : s.scaleY : s.value = "h" == s.opt.orientation ? s.scaleX : s.scaleY, "h" == s.opt.orientation ? s.level.width(i(s.x, a) + "%") : s.level.height(i(s.y, n)), "function" == typeof s.opt.callback && s.opt.callback(s)
            }
        }
    }, e.fn.simpleSlider = e.simpleSlider.init, e.fn.updateSliderVal = e.simpleSlider.updateSliderVal
}(jQuery), ! function(e) {
    e.mbCookie = {
        set: function(e, t, i, r) {
            t = JSON.stringify(t), i || (i = 7), r = r ? "; domain=" + r : "";
            var s, a = new Date;
            a.setTime(a.getTime() + 864e5 * i), s = "; expires=" + a.toGMTString(), document.cookie = e + "=" + t + s + "; path=/" + r
        },
        get: function(e) {
            for (var t = e + "=", i = document.cookie.split(";"), r = 0; r < i.length; r++) {
                for (var s = i[r];
                     " " == s.charAt(0);) s = s.substring(1, s.length);
                if (0 == s.indexOf(t)) return JSON.parse(s.substring(t.length, s.length))
            }
            return null
        },
        remove: function(t) {
            e.mbCookie.set(t, "", -1)
        }
    }, e.mbStorage = {
        set: function(e, t) {
            t = JSON.stringify(t), localStorage.setItem(e, t)
        },
        get: function(e) {
            return localStorage[e] ? JSON.parse(localStorage[e]) : null
        },
        remove: function(e) {
            e ? localStorage.removeItem(e) : localStorage.clear()
        }
    }
}(jQuery);
var pJS = function(e, t) {
    var i = document.querySelector("#" + e + " > .particles-js-canvas-el");
    this.pJS = {
        canvas: {
            el: i,
            w: i.offsetWidth,
            h: i.offsetHeight
        },
        particles: {
            number: {
                value: 400,
                density: {
                    enable: !0,
                    value_area: 800
                }
            },
            color: {
                value: "#fff"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#ff0000"
                },
                polygon: {
                    nb_sides: 5
                },
                image: {
                    src: "",
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: 1,
                random: !1,
                anim: {
                    enable: !1,
                    speed: 2,
                    opacity_min: 0,
                    sync: !1
                }
            },
            size: {
                value: 20,
                random: !1,
                anim: {
                    enable: !1,
                    speed: 20,
                    size_min: 0,
                    sync: !1
                }
            },
            line_linked: {
                enable: !0,
                distance: 100,
                color: "#fff",
                opacity: 1,
                width: 1
            },
            move: {
                enable: !0,
                speed: 2,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "out",
                bounce: !1,
                attract: {
                    enable: !1,
                    rotateX: 3e3,
                    rotateY: 3e3
                }
            },
            array: []
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: !0,
                    mode: "grab"
                },
                onclick: {
                    enable: !0,
                    mode: "push"
                },
                resize: !0
            },
            modes: {
                grab: {
                    distance: 100,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 200,
                    size: 80,
                    duration: .4
                },
                repulse: {
                    distance: 200,
                    duration: .4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            },
            mouse: {}
        },
        retina_detect: !1,
        fn: {
            interact: {},
            modes: {},
            vendors: {}
        },
        tmp: {}
    };
    var r = this.pJS;
    t && Object.deepExtend(r, t), r.tmp.obj = {
        size_value: r.particles.size.value,
        size_anim_speed: r.particles.size.anim.speed,
        move_speed: r.particles.move.speed,
        line_linked_distance: r.particles.line_linked.distance,
        line_linked_width: r.particles.line_linked.width,
        mode_grab_distance: r.interactivity.modes.grab.distance,
        mode_bubble_distance: r.interactivity.modes.bubble.distance,
        mode_bubble_size: r.interactivity.modes.bubble.size,
        mode_repulse_distance: r.interactivity.modes.repulse.distance
    }, r.fn.retinaInit = function() {
        r.retina_detect && window.devicePixelRatio > 1 ? (r.canvas.pxratio = window.devicePixelRatio, r.tmp.retina = !0) : (r.canvas.pxratio = 1, r.tmp.retina = !1), r.canvas.w = r.canvas.el.offsetWidth * r.canvas.pxratio, r.canvas.h = r.canvas.el.offsetHeight * r.canvas.pxratio, r.particles.size.value = r.tmp.obj.size_value * r.canvas.pxratio, r.particles.size.anim.speed = r.tmp.obj.size_anim_speed * r.canvas.pxratio, r.particles.move.speed = r.tmp.obj.move_speed * r.canvas.pxratio, r.particles.line_linked.distance = r.tmp.obj.line_linked_distance * r.canvas.pxratio, r.interactivity.modes.grab.distance = r.tmp.obj.mode_grab_distance * r.canvas.pxratio, r.interactivity.modes.bubble.distance = r.tmp.obj.mode_bubble_distance * r.canvas.pxratio, r.particles.line_linked.width = r.tmp.obj.line_linked_width * r.canvas.pxratio, r.interactivity.modes.bubble.size = r.tmp.obj.mode_bubble_size * r.canvas.pxratio, r.interactivity.modes.repulse.distance = r.tmp.obj.mode_repulse_distance * r.canvas.pxratio
    }, r.fn.canvasInit = function() {
        r.canvas.ctx = r.canvas.el.getContext("2d")
    }, r.fn.canvasSize = function() {
        r.canvas.el.width = r.canvas.w, r.canvas.el.height = r.canvas.h, r && r.interactivity.events.resize && window.addEventListener("resize", function() {
            r.canvas.w = r.canvas.el.offsetWidth, r.canvas.h = r.canvas.el.offsetHeight, r.tmp.retina && (r.canvas.w *= r.canvas.pxratio, r.canvas.h *= r.canvas.pxratio), r.canvas.el.width = r.canvas.w, r.canvas.el.height = r.canvas.h, r.particles.move.enable || (r.fn.particlesEmpty(), r.fn.particlesCreate(), r.fn.particlesDraw(), r.fn.vendors.densityAutoParticles()), r.fn.vendors.densityAutoParticles()
        })
    }, r.fn.canvasPaint = function() {
        r.canvas.ctx.fillRect(0, 0, r.canvas.w, r.canvas.h)
    }, r.fn.canvasClear = function() {
        r.canvas.ctx.clearRect(0, 0, r.canvas.w, r.canvas.h)
    }, r.fn.particle = function(e, t, i) {
        if (this.radius = (r.particles.size.random ? Math.random() : 1) * r.particles.size.value, r.particles.size.anim.enable && (this.size_status = !1, this.vs = r.particles.size.anim.speed / 100, r.particles.size.anim.sync || (this.vs = this.vs * Math.random())), this.x = i ? i.x : Math.random() * r.canvas.w, this.y = i ? i.y : Math.random() * r.canvas.h, this.x > r.canvas.w - 2 * this.radius ? this.x = this.x - this.radius : this.x < 2 * this.radius && (this.x = this.x + this.radius), this.y > r.canvas.h - 2 * this.radius ? this.y = this.y - this.radius : this.y < 2 * this.radius && (this.y = this.y + this.radius), r.particles.move.bounce && r.fn.vendors.checkOverlap(this, i), this.color = {}, "object" == typeof e.value)
            if (e.value instanceof Array) {
                var s = e.value[Math.floor(Math.random() * r.particles.color.value.length)];
                this.color.rgb = hexToRgb(s)
            } else void 0 != e.value.r && void 0 != e.value.g && void 0 != e.value.b && (this.color.rgb = {
                r: e.value.r,
                g: e.value.g,
                b: e.value.b
            }), void 0 != e.value.h && void 0 != e.value.s && void 0 != e.value.l && (this.color.hsl = {
                h: e.value.h,
                s: e.value.s,
                l: e.value.l
            });
        else "random" == e.value ? this.color.rgb = {
            r: Math.floor(256 * Math.random()) + 0,
            g: Math.floor(256 * Math.random()) + 0,
            b: Math.floor(256 * Math.random()) + 0
        } : "string" == typeof e.value && (this.color = e, this.color.rgb = hexToRgb(this.color.value));
        this.opacity = (r.particles.opacity.random ? Math.random() : 1) * r.particles.opacity.value, r.particles.opacity.anim.enable && (this.opacity_status = !1, this.vo = r.particles.opacity.anim.speed / 100, r.particles.opacity.anim.sync || (this.vo = this.vo * Math.random()));
        var a = {};
        switch (r.particles.move.direction) {
            case "top":
                a = {
                    x: 0,
                    y: -1
                };
                break;
            case "top-right":
                a = {
                    x: .5,
                    y: -.5
                };
                break;
            case "right":
                a = {
                    x: 1,
                    y: -0
                };
                break;
            case "bottom-right":
                a = {
                    x: .5,
                    y: .5
                };
                break;
            case "bottom":
                a = {
                    x: 0,
                    y: 1
                };
                break;
            case "bottom-left":
                a = {
                    x: -.5,
                    y: 1
                };
                break;
            case "left":
                a = {
                    x: -1,
                    y: 0
                };
                break;
            case "top-left":
                a = {
                    x: -.5,
                    y: -.5
                };
                break;
            default:
                a = {
                    x: 0,
                    y: 0
                }
        }
        r.particles.move.straight ? (this.vx = a.x, this.vy = a.y, r.particles.move.random && (this.vx = this.vx * Math.random(), this.vy = this.vy * Math.random())) : (this.vx = a.x + Math.random() - .5, this.vy = a.y + Math.random() - .5), this.vx_i = this.vx, this.vy_i = this.vy;
        var n = r.particles.shape.type;
        if ("object" == typeof n) {
            if (n instanceof Array) {
                var o = n[Math.floor(Math.random() * n.length)];
                this.shape = o
            }
        } else this.shape = n;
        if ("image" == this.shape) {
            var l = r.particles.shape;
            this.img = {
                src: l.image.src,
                ratio: l.image.width / l.image.height
            }, this.img.ratio || (this.img.ratio = 1), "svg" == r.tmp.img_type && void 0 != r.tmp.source_svg && (r.fn.vendors.createSvgImg(this), r.tmp.pushing && (this.img.loaded = !1))
        }
    }, r.fn.particle.prototype.draw = function() {
        function e() {
            r.canvas.ctx.drawImage(n, t.x - i, t.y - i, 2 * i, 2 * i / t.img.ratio)
        }
        var t = this;
        if (void 0 != t.radius_bubble) var i = t.radius_bubble;
        else var i = t.radius;
        if (void 0 != t.opacity_bubble) var s = t.opacity_bubble;
        else var s = t.opacity;
        if (t.color.rgb) var a = "rgba(" + t.color.rgb.r + "," + t.color.rgb.g + "," + t.color.rgb.b + "," + s + ")";
        else var a = "hsla(" + t.color.hsl.h + "," + t.color.hsl.s + "%," + t.color.hsl.l + "%," + s + ")";
        switch (r.canvas.ctx.fillStyle = a, r.canvas.ctx.beginPath(), t.shape) {
            case "circle":
                r.canvas.ctx.arc(t.x, t.y, i, 0, 2 * Math.PI, !1);
                break;
            case "edge":
                r.canvas.ctx.rect(t.x - i, t.y - i, 2 * i, 2 * i);
                break;
            case "triangle":
                r.fn.vendors.drawShape(r.canvas.ctx, t.x - i, t.y + i / 1.66, 2 * i, 3, 2);
                break;
            case "polygon":
                r.fn.vendors.drawShape(r.canvas.ctx, t.x - i / (r.particles.shape.polygon.nb_sides / 3.5), t.y - i / .76, 2.66 * i / (r.particles.shape.polygon.nb_sides / 3), r.particles.shape.polygon.nb_sides, 1);
                break;
            case "star":
                r.fn.vendors.drawShape(r.canvas.ctx, t.x - 2 * i / (r.particles.shape.polygon.nb_sides / 4), t.y - i / 1.52, 2 * i * 2.66 / (r.particles.shape.polygon.nb_sides / 3), r.particles.shape.polygon.nb_sides, 2);
                break;
            case "image":
                if ("svg" == r.tmp.img_type) var n = t.img.obj;
                else var n = r.tmp.img_obj;
                n && e()
        }
        r.canvas.ctx.closePath(), r.particles.shape.stroke.width > 0 && (r.canvas.ctx.strokeStyle = r.particles.shape.stroke.color, r.canvas.ctx.lineWidth = r.particles.shape.stroke.width, r.canvas.ctx.stroke()), r.canvas.ctx.fill()
    }, r.fn.particlesCreate = function() {
        for (var e = 0; e < r.particles.number.value; e++) r.particles.array.push(new r.fn.particle(r.particles.color, r.particles.opacity.value))
    }, r.fn.particlesUpdate = function() {
        for (var e = 0; e < r.particles.array.length; e++) {
            var t = r.particles.array[e];
            if (r.particles.move.enable) {
                var i = r.particles.move.speed / 2;
                t.x += t.vx * i, t.y += t.vy * i
            }
            if (r.particles.opacity.anim.enable && (1 == t.opacity_status ? (t.opacity >= r.particles.opacity.value && (t.opacity_status = !1), t.opacity += t.vo) : (t.opacity <= r.particles.opacity.anim.opacity_min && (t.opacity_status = !0), t.opacity -= t.vo), t.opacity < 0 && (t.opacity = 0)), r.particles.size.anim.enable && (1 == t.size_status ? (t.radius >= r.particles.size.value && (t.size_status = !1), t.radius += t.vs) : (t.radius <= r.particles.size.anim.size_min && (t.size_status = !0), t.radius -= t.vs), t.radius < 0 && (t.radius = 0)), "bounce" == r.particles.move.out_mode) var s = {
                x_left: t.radius,
                x_right: r.canvas.w,
                y_top: t.radius,
                y_bottom: r.canvas.h
            };
            else var s = {
                x_left: -t.radius,
                x_right: r.canvas.w + t.radius,
                y_top: -t.radius,
                y_bottom: r.canvas.h + t.radius
            };
            switch (t.x - t.radius > r.canvas.w ? (t.x = s.x_left, t.y = Math.random() * r.canvas.h) : t.x + t.radius < 0 && (t.x = s.x_right, t.y = Math.random() * r.canvas.h), t.y - t.radius > r.canvas.h ? (t.y = s.y_top, t.x = Math.random() * r.canvas.w) : t.y + t.radius < 0 && (t.y = s.y_bottom, t.x = Math.random() * r.canvas.w), r.particles.move.out_mode) {
                case "bounce":
                    t.x + t.radius > r.canvas.w ? t.vx = -t.vx : t.x - t.radius < 0 && (t.vx = -t.vx), t.y + t.radius > r.canvas.h ? t.vy = -t.vy : t.y - t.radius < 0 && (t.vy = -t.vy)
            }
            if (isInArray("grab", r.interactivity.events.onhover.mode) && r.fn.modes.grabParticle(t), (isInArray("bubble", r.interactivity.events.onhover.mode) || isInArray("bubble", r.interactivity.events.onclick.mode)) && r.fn.modes.bubbleParticle(t), (isInArray("repulse", r.interactivity.events.onhover.mode) || isInArray("repulse", r.interactivity.events.onclick.mode)) && r.fn.modes.repulseParticle(t), r.particles.line_linked.enable || r.particles.move.attract.enable)
                for (var a = e + 1; a < r.particles.array.length; a++) {
                    var n = r.particles.array[a];
                    r.particles.line_linked.enable && r.fn.interact.linkParticles(t, n), r.particles.move.attract.enable && r.fn.interact.attractParticles(t, n), r.particles.move.bounce && r.fn.interact.bounceParticles(t, n)
                }
        }
    }, r.fn.particlesDraw = function() {
        r.canvas.ctx.clearRect(0, 0, r.canvas.w, r.canvas.h), r.fn.particlesUpdate();
        for (var e = 0; e < r.particles.array.length; e++) {
            var t = r.particles.array[e];
            t.draw()
        }
    }, r.fn.particlesEmpty = function() {
        r.particles.array = []
    }, r.fn.particlesRefresh = function() {
        cancelRequestAnimFrame(r.fn.checkAnimFrame), cancelRequestAnimFrame(r.fn.drawAnimFrame), r.tmp.source_svg = void 0, r.tmp.img_obj = void 0, r.tmp.count_svg = 0, r.fn.particlesEmpty(), r.fn.canvasClear(), r.fn.vendors.start()
    }, r.fn.interact.linkParticles = function(e, t) {
        var i = e.x - t.x,
            s = e.y - t.y,
            a = Math.sqrt(i * i + s * s);
        if (a <= r.particles.line_linked.distance) {
            var n = r.particles.line_linked.opacity - a / (1 / r.particles.line_linked.opacity) / r.particles.line_linked.distance;
            if (n > 0) {
                var o = r.particles.line_linked.color_rgb_line;
                r.canvas.ctx.strokeStyle = "rgba(" + o.r + "," + o.g + "," + o.b + "," + n + ")", r.canvas.ctx.lineWidth = r.particles.line_linked.width, r.canvas.ctx.beginPath(), r.canvas.ctx.moveTo(e.x, e.y), r.canvas.ctx.lineTo(t.x, t.y), r.canvas.ctx.stroke(), r.canvas.ctx.closePath()
            }
        }
    }, r.fn.interact.attractParticles = function(e, t) {
        var i = e.x - t.x,
            s = e.y - t.y,
            a = Math.sqrt(i * i + s * s);
        if (a <= r.particles.line_linked.distance) {
            var n = i / (1e3 * r.particles.move.attract.rotateX),
                o = s / (1e3 * r.particles.move.attract.rotateY);
            e.vx -= n, e.vy -= o, t.vx += n, t.vy += o
        }
    }, r.fn.interact.bounceParticles = function(e, t) {
        var i = e.x - t.x,
            r = e.y - t.y,
            s = Math.sqrt(i * i + r * r),
            a = e.radius + t.radius;
        a >= s && (e.vx = -e.vx, e.vy = -e.vy, t.vx = -t.vx, t.vy = -t.vy)
    }, r.fn.modes.pushParticles = function(e, t) {
        r.tmp.pushing = !0;
        for (var i = 0; e > i; i++) r.particles.array.push(new r.fn.particle(r.particles.color, r.particles.opacity.value, {
            x: t ? t.pos_x : Math.random() * r.canvas.w,
            y: t ? t.pos_y : Math.random() * r.canvas.h
        })), i == e - 1 && (r.particles.move.enable || r.fn.particlesDraw(), r.tmp.pushing = !1)
    }, r.fn.modes.removeParticles = function(e) {
        r.particles.array.splice(0, e), r.particles.move.enable || r.fn.particlesDraw()
    }, r.fn.modes.bubbleParticle = function(e) {
        function t() {
            e.opacity_bubble = e.opacity, e.radius_bubble = e.radius
        }

        function i(t, i, s, a, o) {
            if (t != i)
                if (r.tmp.bubble_duration_end) {
                    if (void 0 != s) {
                        var l = a - _ * (a - t) / r.interactivity.modes.bubble.duration,
                            c = t - l;
                        h = t + c, "size" == o && (e.radius_bubble = h), "opacity" == o && (e.opacity_bubble = h)
                    }
                } else if (n <= r.interactivity.modes.bubble.distance) {
                    if (void 0 != s) var u = s;
                    else var u = a;
                    if (u != t) {
                        var h = a - _ * (a - t) / r.interactivity.modes.bubble.duration;
                        "size" == o && (e.radius_bubble = h), "opacity" == o && (e.opacity_bubble = h)
                    }
                } else "size" == o && (e.radius_bubble = void 0), "opacity" == o && (e.opacity_bubble = void 0)
        }
        if (r.interactivity.events.onhover.enable && isInArray("bubble", r.interactivity.events.onhover.mode)) {
            var s = e.x - r.interactivity.mouse.pos_x,
                a = e.y - r.interactivity.mouse.pos_y,
                n = Math.sqrt(s * s + a * a),
                o = 1 - n / r.interactivity.modes.bubble.distance;
            if (n <= r.interactivity.modes.bubble.distance) {
                if (o >= 0 && "mousemove" == r.interactivity.status) {
                    if (r.interactivity.modes.bubble.size != r.particles.size.value)
                        if (r.interactivity.modes.bubble.size > r.particles.size.value) {
                            var l = e.radius + r.interactivity.modes.bubble.size * o;
                            l >= 0 && (e.radius_bubble = l)
                        } else {
                            var c = e.radius - r.interactivity.modes.bubble.size,
                                l = e.radius - c * o;
                            l > 0 ? e.radius_bubble = l : e.radius_bubble = 0
                        } if (r.interactivity.modes.bubble.opacity != r.particles.opacity.value)
                        if (r.interactivity.modes.bubble.opacity > r.particles.opacity.value) {
                            var u = r.interactivity.modes.bubble.opacity * o;
                            u > e.opacity && u <= r.interactivity.modes.bubble.opacity && (e.opacity_bubble = u)
                        } else {
                            var u = e.opacity - (r.particles.opacity.value - r.interactivity.modes.bubble.opacity) * o;
                            u < e.opacity && u >= r.interactivity.modes.bubble.opacity && (e.opacity_bubble = u)
                        }
                }
            } else t();
            "mouseleave" == r.interactivity.status && t()
        } else if (r.interactivity.events.onclick.enable && isInArray("bubble", r.interactivity.events.onclick.mode)) {
            if (r.tmp.bubble_clicking) {
                var s = e.x - r.interactivity.mouse.click_pos_x,
                    a = e.y - r.interactivity.mouse.click_pos_y,
                    n = Math.sqrt(s * s + a * a),
                    _ = ((new Date).getTime() - r.interactivity.mouse.click_time) / 1e3;
                _ > r.interactivity.modes.bubble.duration && (r.tmp.bubble_duration_end = !0), _ > 2 * r.interactivity.modes.bubble.duration && (r.tmp.bubble_clicking = !1, r.tmp.bubble_duration_end = !1)
            }
            r.tmp.bubble_clicking && (i(r.interactivity.modes.bubble.size, r.particles.size.value, e.radius_bubble, e.radius, "size"), i(r.interactivity.modes.bubble.opacity, r.particles.opacity.value, e.opacity_bubble, e.opacity, "opacity"))
        }
    }, r.fn.modes.repulseParticle = function(e) {
        function t() {
            var t = Math.atan2(h, _);
            if (e.vx = p * Math.cos(t), e.vy = p * Math.sin(t), "bounce" == r.particles.move.out_mode) {
                var i = {
                    x: e.x + e.vx,
                    y: e.y + e.vy
                };
                i.x + e.radius > r.canvas.w ? e.vx = -e.vx : i.x - e.radius < 0 && (e.vx = -e.vx), i.y + e.radius > r.canvas.h ? e.vy = -e.vy : i.y - e.radius < 0 && (e.vy = -e.vy)
            }
        }
        if (r.interactivity.events.onhover.enable && isInArray("repulse", r.interactivity.events.onhover.mode) && "mousemove" == r.interactivity.status) {
            var i = e.x - r.interactivity.mouse.pos_x,
                s = e.y - r.interactivity.mouse.pos_y,
                a = Math.sqrt(i * i + s * s),
                n = {
                    x: i / a,
                    y: s / a
                },
                o = r.interactivity.modes.repulse.distance,
                l = 100,
                c = clamp(1 / o * (-1 * Math.pow(a / o, 2) + 1) * o * l, 0, 50),
                u = {
                    x: e.x + n.x * c,
                    y: e.y + n.y * c
                };
            "bounce" == r.particles.move.out_mode ? (u.x - e.radius > 0 && u.x + e.radius < r.canvas.w && (e.x = u.x), u.y - e.radius > 0 && u.y + e.radius < r.canvas.h && (e.y = u.y)) : (e.x = u.x, e.y = u.y)
        } else if (r.interactivity.events.onclick.enable && isInArray("repulse", r.interactivity.events.onclick.mode))
            if (r.tmp.repulse_finish || (r.tmp.repulse_count++, r.tmp.repulse_count == r.particles.array.length && (r.tmp.repulse_finish = !0)), r.tmp.repulse_clicking) {
                var o = Math.pow(r.interactivity.modes.repulse.distance / 6, 3),
                    _ = r.interactivity.mouse.click_pos_x - e.x,
                    h = r.interactivity.mouse.click_pos_y - e.y,
                    d = _ * _ + h * h,
                    p = -o / d * 1;
                o >= d && t()
            } else 0 == r.tmp.repulse_clicking && (e.vx = e.vx_i, e.vy = e.vy_i)
    }, r.fn.modes.grabParticle = function(e) {
        if (r.interactivity.events.onhover.enable && "mousemove" == r.interactivity.status) {
            var t = e.x - r.interactivity.mouse.pos_x,
                i = e.y - r.interactivity.mouse.pos_y,
                s = Math.sqrt(t * t + i * i);
            if (s <= r.interactivity.modes.grab.distance) {
                var a = r.interactivity.modes.grab.line_linked.opacity - s / (1 / r.interactivity.modes.grab.line_linked.opacity) / r.interactivity.modes.grab.distance;
                if (a > 0) {
                    var n = r.particles.line_linked.color_rgb_line;
                    r.canvas.ctx.strokeStyle = "rgba(" + n.r + "," + n.g + "," + n.b + "," + a + ")", r.canvas.ctx.lineWidth = r.particles.line_linked.width, r.canvas.ctx.beginPath(), r.canvas.ctx.moveTo(e.x, e.y), r.canvas.ctx.lineTo(r.interactivity.mouse.pos_x, r.interactivity.mouse.pos_y), r.canvas.ctx.stroke(), r.canvas.ctx.closePath()
                }
            }
        }
    }, r.fn.vendors.eventsListeners = function() {
        "window" == r.interactivity.detect_on ? r.interactivity.el = window : r.interactivity.el = r.canvas.el, (r.interactivity.events.onhover.enable || r.interactivity.events.onclick.enable) && (r.interactivity.el.addEventListener("mousemove", function(e) {
            if (r.interactivity.el == window) var t = e.clientX,
                i = e.clientY;
            else var t = e.offsetX || e.clientX,
                i = e.offsetY || e.clientY;
            r.interactivity.mouse.pos_x = t, r.interactivity.mouse.pos_y = i, r.tmp.retina && (r.interactivity.mouse.pos_x *= r.canvas.pxratio, r.interactivity.mouse.pos_y *= r.canvas.pxratio), r.interactivity.status = "mousemove"
        }), r.interactivity.el.addEventListener("mouseleave", function(e) {
            r.interactivity.mouse.pos_x = null, r.interactivity.mouse.pos_y = null, r.interactivity.status = "mouseleave"
        })), r.interactivity.events.onclick.enable && r.interactivity.el.addEventListener("click", function() {
            if (r.interactivity.mouse.click_pos_x = r.interactivity.mouse.pos_x, r.interactivity.mouse.click_pos_y = r.interactivity.mouse.pos_y, r.interactivity.mouse.click_time = (new Date).getTime(), r.interactivity.events.onclick.enable) switch (r.interactivity.events.onclick.mode) {
                case "push":
                    r.particles.move.enable ? r.fn.modes.pushParticles(r.interactivity.modes.push.particles_nb, r.interactivity.mouse) : 1 == r.interactivity.modes.push.particles_nb ? r.fn.modes.pushParticles(r.interactivity.modes.push.particles_nb, r.interactivity.mouse) : r.interactivity.modes.push.particles_nb > 1 && r.fn.modes.pushParticles(r.interactivity.modes.push.particles_nb);
                    break;
                case "remove":
                    r.fn.modes.removeParticles(r.interactivity.modes.remove.particles_nb);
                    break;
                case "bubble":
                    r.tmp.bubble_clicking = !0;
                    break;
                case "repulse":
                    r.tmp.repulse_clicking = !0, r.tmp.repulse_count = 0, r.tmp.repulse_finish = !1, setTimeout(function() {
                        r.tmp.repulse_clicking = !1
                    }, 1e3 * r.interactivity.modes.repulse.duration)
            }
        })
    }, r.fn.vendors.densityAutoParticles = function() {
        if (r.particles.number.density.enable) {
            var e = r.canvas.el.width * r.canvas.el.height / 1e3;
            r.tmp.retina && (e /= 2 * r.canvas.pxratio);
            var t = e * r.particles.number.value / r.particles.number.density.value_area,
                i = r.particles.array.length - t;
            0 > i ? r.fn.modes.pushParticles(Math.abs(i)) : r.fn.modes.removeParticles(i)
        }
    }, r.fn.vendors.checkOverlap = function(e, t) {
        for (var i = 0; i < r.particles.array.length; i++) {
            var s = r.particles.array[i],
                a = e.x - s.x,
                n = e.y - s.y,
                o = Math.sqrt(a * a + n * n);
            o <= e.radius + s.radius && (e.x = t ? t.x : Math.random() * r.canvas.w, e.y = t ? t.y : Math.random() * r.canvas.h, r.fn.vendors.checkOverlap(e))
        }
    }, r.fn.vendors.createSvgImg = function(e) {
        var t = r.tmp.source_svg,
            i = /#([0-9A-F]{3,6})/gi,
            s = t.replace(i, function(t, i, r, s) {
                if (e.color.rgb) var a = "rgba(" + e.color.rgb.r + "," + e.color.rgb.g + "," + e.color.rgb.b + "," + e.opacity + ")";
                else var a = "hsla(" + e.color.hsl.h + "," + e.color.hsl.s + "%," + e.color.hsl.l + "%," + e.opacity + ")";
                return a
            }),
            a = new Blob([s], {
                type: "image/svg+xml;charset=utf-8"
            }),
            n = window.URL || window.webkitURL || window,
            o = n.createObjectURL(a),
            l = new Image;
        l.addEventListener("load", function() {
            e.img.obj = l, e.img.loaded = !0, n.revokeObjectURL(o), r.tmp.count_svg++
        }), l.src = o
    }, r.fn.vendors.destroypJS = function() {
        cancelAnimationFrame(r.fn.drawAnimFrame), i.remove(), pJSDom = null
    }, r.fn.vendors.drawShape = function(e, t, i, r, s, a) {
        var n = s * a,
            o = s / a,
            l = 180 * (o - 2) / o,
            c = Math.PI - Math.PI * l / 180;
        e.save(), e.beginPath(), e.translate(t, i), e.moveTo(0, 0);
        for (var u = 0; n > u; u++) e.lineTo(r, 0), e.translate(r, 0), e.rotate(c);
        e.fill(), e.restore()
    }, r.fn.vendors.exportImg = function() {
        window.open(r.canvas.el.toDataURL("image/png"), "_blank")
    }, r.fn.vendors.loadImg = function(e) {
        if (r.tmp.img_error = void 0, "" != r.particles.shape.image.src)
            if ("svg" == e) {
                var t = new XMLHttpRequest;
                t.open("GET", r.particles.shape.image.src), t.onreadystatechange = function(e) {
                    4 == t.readyState && (200 == t.status ? (r.tmp.source_svg = e.currentTarget.response, r.fn.vendors.checkBeforeDraw()) : (console.log("Error pJS - Image not found"), r.tmp.img_error = !0))
                }, t.send()
            } else {
                var i = new Image;
                i.addEventListener("load", function() {
                    r.tmp.img_obj = i, r.fn.vendors.checkBeforeDraw()
                }), i.src = r.particles.shape.image.src
            }
        else console.log("Error pJS - No image.src"), r.tmp.img_error = !0
    }, r.fn.vendors.draw = function() {
        "image" == r.particles.shape.type ? "svg" == r.tmp.img_type ? r.tmp.count_svg >= r.particles.number.value ? (r.fn.particlesDraw(), r.particles.move.enable ? r.fn.drawAnimFrame = requestAnimFrame(r.fn.vendors.draw) : cancelRequestAnimFrame(r.fn.drawAnimFrame)) : r.tmp.img_error || (r.fn.drawAnimFrame = requestAnimFrame(r.fn.vendors.draw)) : void 0 != r.tmp.img_obj ? (r.fn.particlesDraw(), r.particles.move.enable ? r.fn.drawAnimFrame = requestAnimFrame(r.fn.vendors.draw) : cancelRequestAnimFrame(r.fn.drawAnimFrame)) : r.tmp.img_error || (r.fn.drawAnimFrame = requestAnimFrame(r.fn.vendors.draw)) : (r.fn.particlesDraw(), r.particles.move.enable ? r.fn.drawAnimFrame = requestAnimFrame(r.fn.vendors.draw) : cancelRequestAnimFrame(r.fn.drawAnimFrame))
    }, r.fn.vendors.checkBeforeDraw = function() {
        "image" == r.particles.shape.type ? "svg" == r.tmp.img_type && void 0 == r.tmp.source_svg ? r.tmp.checkAnimFrame = requestAnimFrame(check) : (cancelRequestAnimFrame(r.tmp.checkAnimFrame), r.tmp.img_error || (r.fn.vendors.init(), r.fn.vendors.draw())) : (r.fn.vendors.init(), r.fn.vendors.draw())
    }, r.fn.vendors.init = function() {
        r.fn.retinaInit(), r.fn.canvasInit(), r.fn.canvasSize(), r.fn.canvasPaint(), r.fn.particlesCreate(), r.fn.vendors.densityAutoParticles(), r.particles.line_linked.color_rgb_line = hexToRgb(r.particles.line_linked.color)
    }, r.fn.vendors.start = function() {
        isInArray("image", r.particles.shape.type) ? (r.tmp.img_type = r.particles.shape.image.src.substr(r.particles.shape.image.src.length - 3), r.fn.vendors.loadImg(r.tmp.img_type)) : r.fn.vendors.checkBeforeDraw()
    }, r.fn.vendors.eventsListeners(), r.fn.vendors.start()
};
Object.deepExtend = function(e, t) {
    for (var i in t) t[i] && t[i].constructor && t[i].constructor === Object ? (e[i] = e[i] || {}, arguments.callee(e[i], t[i])) : e[i] = t[i];
    return e
}, window.requestAnimFrame = function() {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(e) {
        window.setTimeout(e, 1e3 / 60)
    }
}(), window.cancelRequestAnimFrame = function() {
    return window.cancelAnimationFrame || window.webkitCancelRequestAnimationFrame || window.mozCancelRequestAnimationFrame || window.oCancelRequestAnimationFrame || window.msCancelRequestAnimationFrame || clearTimeout
}(), window.pJSDom = [], window.particlesJS = function(e, t) {
    "string" != typeof e && (t = e, e = "particles-js"), e || (e = "particles-js");
    var i = document.getElementById(e),
        r = "particles-js-canvas-el",
        s = i.getElementsByClassName(r);
    if (s.length)
        for (; s.length > 0;) i.removeChild(s[0]);
    var a = document.createElement("canvas");
    a.className = r, a.style.width = "100%", a.style.height = "100%";
    var n = document.getElementById(e).appendChild(a);
    null != n && pJSDom.push(new pJS(e, t))
}, window.particlesJS.load = function(e, t, i) {
    var r = new XMLHttpRequest;
    r.open("GET", t), r.onreadystatechange = function(t) {
        if (4 == r.readyState)
            if (200 == r.status) {
                var s = JSON.parse(t.currentTarget.response);
                window.particlesJS(e, s), i && i()
            } else console.log("Error pJS - XMLHttpRequest status: " + r.status), console.log("Error pJS - File config not found")
    }, r.send()
}, ! function(e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : e(jQuery)
}(function(e) {
    "use strict";

    function t(e) {
        if (e instanceof Date) return e;
        if (String(e).match(n)) return String(e).match(/^[0-9]*$/) && (e = Number(e)), String(e).match(/\-/) && (e = String(e).replace(/\-/g, "/")), new Date(e);
        throw new Error("Couldn't cast `" + e + "` to a date object.")
    }

    function i(e) {
        var t = e.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(t)
    }

    function r(e) {
        return function(t) {
            var r = t.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (r)
                for (var a = 0, n = r.length; n > a; ++a) {
                    var o = r[a].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        c = i(o[0]),
                        u = o[1] || "",
                        _ = o[3] || "",
                        h = null;
                    o = o[2], l.hasOwnProperty(o) && (h = l[o], h = Number(e[h])), null !== h && ("!" === u && (h = s(_, h)), "" === u && 10 > h && (h = "0" + h.toString()), t = t.replace(c, h.toString()))
                }
            return t = t.replace(/%%/, "%")
        }
    }

    function s(e, t) {
        var i = "s",
            r = "";
        return e && (e = e.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === e.length ? i = e[0] : (r = e[0], i = e[1])), 1 === Math.abs(t) ? r : i
    }
    var a = [],
        n = [],
        o = {
            precision: 100,
            elapse: !1
        };
    n.push(/^[0-9]*$/.source), n.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), n.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), n = new RegExp(n.join("|"));
    var l = {
            Y: "years",
            m: "months",
            n: "daysToMonth",
            w: "weeks",
            d: "daysToWeek",
            D: "totalDays",
            H: "hours",
            M: "minutes",
            S: "seconds"
        },
        c = function(t, i, r) {
            this.el = t, this.$el = e(t), this.interval = null, this.offset = {}, this.options = e.extend({}, o), this.instanceNumber = a.length, a.push(this), this.$el.data("countdown-instance", this.instanceNumber), r && ("function" == typeof r ? (this.$el.on("update.countdown", r), this.$el.on("stoped.countdown", r), this.$el.on("finish.countdown", r)) : this.options = e.extend({}, o, r)), this.setFinalDate(i), this.start()
        };
    e.extend(c.prototype, {
        start: function() {
            null !== this.interval && clearInterval(this.interval);
            var e = this;
            this.update(), this.interval = setInterval(function() {
                e.update.call(e)
            }, this.options.precision)
        },
        stop: function() {
            clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
        },
        toggle: function() {
            this.interval ? this.stop() : this.start()
        },
        pause: function() {
            this.stop()
        },
        resume: function() {
            this.start()
        },
        remove: function() {
            this.stop.call(this), a[this.instanceNumber] = null, delete this.$el.data().countdownInstance
        },
        setFinalDate: function(e) {
            this.finalDate = t(e)
        },
        update: function() {
            if (0 === this.$el.closest("html").length) return void this.remove();
            var t, i = void 0 !== e._data(this.el, "events"),
                r = new Date;
            t = this.finalDate.getTime() - r.getTime(), t = Math.ceil(t / 1e3), t = !this.options.elapse && 0 > t ? 0 : Math.abs(t), this.totalSecsLeft !== t && i && (this.totalSecsLeft = t, this.elapsed = r >= this.finalDate, this.offset = {
                seconds: this.totalSecsLeft % 60,
                minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
                totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
                years: Math.abs(this.finalDate.getFullYear() - r.getFullYear())
            }, this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish")))
        },
        dispatchEvent: function(t) {
            var i = e.Event(t + ".countdown");
            i.finalDate = this.finalDate, i.elapsed = this.elapsed, i.offset = e.extend({}, this.offset), i.strftime = r(this.offset), this.$el.trigger(i)
        }
    }), e.fn.countdown = function() {
        var t = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var i = e(this).data("countdown-instance");
            if (void 0 !== i) {
                var r = a[i],
                    s = t[0];
                c.prototype.hasOwnProperty(s) ? r[s].apply(r, t.slice(1)) : null === String(s).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (r.setFinalDate.call(r, s), r.start()) : e.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, s))
            } else new c(this, t[0], t[1])
        })
    }
});
var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;
(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function() {
    "use strict";
    var e = function(t) {
            var i = t.nodeType,
                r = "";
            if (1 === i || 9 === i || 11 === i) {
                if ("string" == typeof t.textContent) return t.textContent;
                for (t = t.firstChild; t; t = t.nextSibling) r += e(t)
            } else if (3 === i || 4 === i) return t.nodeValue;
            return r
        },
        t = _gsScope._gsDefine.plugin({
            propName: "text",
            API: 2,
            version: "0.5.1",
            init: function(t, i, r) {
                var s, a;
                if (!("innerHTML" in t)) return !1;
                if (this._target = t, "object" != typeof i && (i = {
                    value: i
                }), void 0 === i.value) return this._text = this._original = [""], !0;
                for (this._delimiter = i.delimiter || "", this._original = e(t).replace(/\s+/g, " ").split(this._delimiter), this._text = i.value.replace(/\s+/g, " ").split(this._delimiter), this._runBackwards = r.vars.runBackwards === !0, this._runBackwards && (s = this._original, this._original = this._text, this._text = s), "string" == typeof i.newClass && (this._newClass = i.newClass, this._hasClass = !0), "string" == typeof i.oldClass && (this._oldClass = i.oldClass, this._hasClass = !0), s = this._original.length - this._text.length, a = 0 > s ? this._original : this._text, this._fillChar = i.fillChar || (i.padSpace ? "&nbsp;" : ""), 0 > s && (s = -s); --s > -1;) a.push(this._fillChar);
                return !0
            },
            set: function(e) {
                e > 1 ? e = 1 : 0 > e && (e = 0), this._runBackwards && (e = 1 - e);
                var t, i, r, s = this._text.length,
                    a = 0 | e * s + .5;
                this._hasClass ? (t = this._newClass && 0 !== a, i = this._oldClass && a !== s, r = (t ? "<span class='" + this._newClass + "'>" : "") + this._text.slice(0, a).join(this._delimiter) + (t ? "</span>" : "") + (i ? "<span class='" + this._oldClass + "'>" : "") + this._delimiter + this._original.slice(a).join(this._delimiter) + (i ? "</span>" : "")) : r = this._text.slice(0, a).join(this._delimiter) + this._delimiter + this._original.slice(a).join(this._delimiter), this._target.innerHTML = "&nbsp;" === this._fillChar && -1 !== r.indexOf("  ") ? r.split("  ").join("&nbsp;&nbsp;") : r
            }
        }),
        i = t.prototype;
    i._newClass = i._oldClass = i._delimiter = ""
}), _gsScope._gsDefine && _gsScope._gsQueue.pop()();
var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;
! function(e) {
    "use strict";
    var t = e.GreenSockGlobals || e,
        i = function(e) {
            var i, r = e.split("."),
                s = t;
            for (i = 0; r.length > i; i++) s[r[i]] = s = s[r[i]] || {};
            return s
        },
        r = i("com.greensock.utils"),
        s = function(e) {
            var t = e.nodeType,
                i = "";
            if (1 === t || 9 === t || 11 === t) {
                if ("string" == typeof e.textContent) return e.textContent;
                for (e = e.firstChild; e; e = e.nextSibling) i += s(e)
            } else if (3 === t || 4 === t) return e.nodeValue;
            return i
        },
        a = document,
        n = a.defaultView ? a.defaultView.getComputedStyle : function() {},
        o = /([A-Z])/g,
        l = function(e, t, i, r) {
            var s;
            return (i = i || n(e, null)) ? (e = i.getPropertyValue(t.replace(o, "-$1").toLowerCase()), s = e || i.length ? e : i[t]) : e.currentStyle && (i = e.currentStyle, s = i[t]), r ? s : parseInt(s, 10) || 0
        },
        c = function(e) {
            return e.length && e[0] && (e[0].nodeType && e[0].style && !e.nodeType || e[0].length && e[0][0]) ? !0 : !1
        },
        u = function(e) {
            var t, i, r, s = [],
                a = e.length;
            for (t = 0; a > t; t++)
                if (i = e[t], c(i))
                    for (r = i.length, r = 0; i.length > r; r++) s.push(i[r]);
                else s.push(i);
            return s
        },
        _ = ")eefec303079ad17405c",
        h = /(?:<br>|<br\/>|<br \/>)/gi,
        d = a.all && !a.addEventListener,
        p = "<div style='position:relative;display:inline-block;" + (d ? "*display:inline;*zoom:1;'" : "'"),
        f = function(e) {
            e = e || "";
            var t = -1 !== e.indexOf("++"),
                i = 1;
            return t && (e = e.split("++").join("")),
                function() {
                    return p + (e ? " class='" + e + (t ? i++ : "") + "'>" : ">")
                }
        },
        x = r.SplitText = t.SplitText = function(e, t) {
            if ("string" == typeof e && (e = x.selector(e)), !e) throw "cannot split a null element.";
            this.elements = c(e) ? u(e) : [e], this.chars = [], this.words = [], this.lines = [], this._originals = [], this.vars = t || {}, this.split(t)
        },
        m = function(e, t, i) {
            var r = e.nodeType;
            if (1 === r || 9 === r || 11 === r)
                for (e = e.firstChild; e; e = e.nextSibling) m(e, t, i);
            else(3 === r || 4 === r) && (e.nodeValue = e.nodeValue.split(t).join(i))
        },
        y = function(e, t) {
            for (var i = t.length; --i > -1;) e.push(t[i])
        },
        v = function(e, t, i, r, o) {
            h.test(e.innerHTML) && (e.innerHTML = e.innerHTML.replace(h, _));
            var c, u, d, p, x, v, g, b, T, P, w, j, S, A, E = s(e),
                L = t.type || t.split || "chars,words,lines",
                R = -1 !== L.indexOf("lines") ? [] : null,
                Y = -1 !== L.indexOf("words"),
                C = -1 !== L.indexOf("chars"),
                k = "absolute" === t.position || t.absolute === !0,
                I = k ? "&#173; " : " ",
                M = -999,
                O = n(e),
                D = l(e, "paddingLeft", O),
                Q = l(e, "borderBottomWidth", O) + l(e, "borderTopWidth", O),
                F = l(e, "borderLeftWidth", O) + l(e, "borderRightWidth", O),
                N = l(e, "paddingTop", O) + l(e, "paddingBottom", O),
                B = l(e, "paddingLeft", O) + l(e, "paddingRight", O),
                q = l(e, "textAlign", O, !0),
                U = e.clientHeight,
                X = e.clientWidth,
                z = "</div>",
                H = f(t.wordsClass),
                V = f(t.charsClass),
                W = -1 !== (t.linesClass || "").indexOf("++"),
                G = t.linesClass,
                J = -1 !== E.indexOf("<"),
                $ = !0,
                Z = [],
                K = [],
                ee = [];
            for (W && (G = G.split("++").join("")), J && (E = E.split("<").join("{{LT}}")), c = E.length, p = H(), x = 0; c > x; x++)
                if (g = E.charAt(x), ")" === g && E.substr(x, 20) === _) p += ($ ? z : "") + "<BR/>", $ = !1, x !== c - 20 && E.substr(x + 20, 20) !== _ && (p += " " + H(), $ = !0), x += 19;
                else if (" " === g && " " !== E.charAt(x - 1) && x !== c - 1 && E.substr(x - 20, 20) !== _) {
                    for (p += $ ? z : "", $ = !1;
                         " " === E.charAt(x + 1);) p += I, x++;
                    (")" !== E.charAt(x + 1) || E.substr(x + 1, 20) !== _) && (p += I + H(), $ = !0)
                } else "{" === g && "{{LT}}" === E.substr(x, 6) ? (p += C ? V() + "{{LT}}</div>" : "{{LT}}", x += 5) : p += C && " " !== g ? V() + g + "</div>" : g;
            for (e.innerHTML = p + ($ ? z : ""), J && m(e, "{{LT}}", "<"), v = e.getElementsByTagName("*"), c = v.length, b = [], x = 0; c > x; x++) b[x] = v[x];
            if (R || k)
                for (x = 0; c > x; x++) T = b[x], d = T.parentNode === e, (d || k || C && !Y) && (P = T.offsetTop, R && d && P !== M && "BR" !== T.nodeName && (u = [], R.push(u), M = P), k && (T._x = T.offsetLeft, T._y = P, T._w = T.offsetWidth, T._h = T.offsetHeight), R && (Y !== d && C || (u.push(T), T._x -= D), d && x && (b[x - 1]._wordEnd = !0), "BR" === T.nodeName && T.nextSibling && "BR" === T.nextSibling.nodeName && R.push([])));
            for (x = 0; c > x; x++) T = b[x], d = T.parentNode === e, "BR" !== T.nodeName ? (k && (j = T.style, Y || d || (T._x += T.parentNode._x, T._y += T.parentNode._y), j.left = T._x + "px", j.top = T._y + "px", j.position = "absolute", j.display = "block", j.width = T._w + 1 + "px", j.height = T._h + "px"), Y ? d && "" !== T.innerHTML ? K.push(T) : C && Z.push(T) : d ? (e.removeChild(T), b.splice(x--, 1), c--) : !d && C && (P = !R && !k && T.nextSibling, e.appendChild(T), P || e.appendChild(a.createTextNode(" ")), Z.push(T))) : R || k ? (e.removeChild(T), b.splice(x--, 1), c--) : Y || e.appendChild(T);
            if (R) {
                for (k && (w = a.createElement("div"), e.appendChild(w), S = w.offsetWidth + "px", P = w.offsetParent === e ? 0 : e.offsetLeft, e.removeChild(w)), j = e.style.cssText, e.style.cssText = "display:none;"; e.firstChild;) e.removeChild(e.firstChild);
                for (A = !k || !Y && !C, x = 0; R.length > x; x++) {
                    for (u = R[x], w = a.createElement("div"), w.style.cssText = "display:block;text-align:" + q + ";position:" + (k ? "absolute;" : "relative;"), G && (w.className = G + (W ? x + 1 : "")), ee.push(w), c = u.length, v = 0; c > v; v++) "BR" !== u[v].nodeName && (T = u[v], w.appendChild(T), A && (T._wordEnd || Y) && w.appendChild(a.createTextNode(" ")), k && (0 === v && (w.style.top = T._y + "px", w.style.left = D + P + "px"), T.style.top = "0px", P && (T.style.left = T._x - P + "px")));
                    0 === c && (w.innerHTML = "&nbsp;"), Y || C || (w.innerHTML = s(w).split(String.fromCharCode(160)).join(" ")), k && (w.style.width = S, w.style.height = T._h + "px"), e.appendChild(w)
                }
                e.style.cssText = j
            }
            k && (U > e.clientHeight && (e.style.height = U - N + "px", U > e.clientHeight && (e.style.height = U + Q + "px")), X > e.clientWidth && (e.style.width = X - B + "px", X > e.clientWidth && (e.style.width = X + F + "px"))), y(i, Z), y(r, K), y(o, ee)
        },
        g = x.prototype;
    g.split = function(e) {
        this.isSplit && this.revert(), this.vars = e || this.vars, this._originals.length = this.chars.length = this.words.length = this.lines.length = 0;
        for (var t = this.elements.length; --t > -1;) this._originals[t] = this.elements[t].innerHTML, v(this.elements[t], this.vars, this.chars, this.words, this.lines);
        return this.chars.reverse(), this.words.reverse(), this.lines.reverse(), this.isSplit = !0, this
    }, g.revert = function() {
        if (!this._originals) throw "revert() call wasn't scoped properly.";
        for (var e = this._originals.length; --e > -1;) this.elements[e].innerHTML = this._originals[e];
        return this.chars = [], this.words = [], this.lines = [], this.isSplit = !1, this
    }, x.selector = e.$ || e.jQuery || function(t) {
        var i = e.$ || e.jQuery;
        return i ? (x.selector = i, i(t)) : "undefined" == typeof document ? t : document.querySelectorAll ? document.querySelectorAll(t) : document.getElementById("#" === t.charAt(0) ? t.substr(1) : t)
    }, x.version = "0.3.4"
}(_gsScope),
    function(e) {
        "use strict";
        var t = function() {
            return (_gsScope.GreenSockGlobals || _gsScope)[e]
        };
        "function" == typeof define && define.amd ? define(["TweenLite"], t) : "undefined" != typeof module && module.exports && (module.exports = t())
    }("SplitText"), ! function(e) {
    "use strict";
    var t = /iPhone/i,
        i = /iPod/i,
        r = /iPad/i,
        s = /(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,
        a = /Android/i,
        n = /(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,
        o = /(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,
        l = /IEMobile/i,
        c = /(?=.*\bWindows\b)(?=.*\bARM\b)/i,
        u = /BlackBerry/i,
        _ = /BB10/i,
        h = /Opera Mini/i,
        d = /(CriOS|Chrome)(?=.*\bMobile\b)/i,
        p = /(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,
        f = new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)", "i"),
        x = function(e, t) {
            return e.test(t)
        },
        m = function(e) {
            var m = e || navigator.userAgent,
                y = m.split("[FBAN");
            return "undefined" != typeof y[1] && (m = y[0]), y = m.split("Twitter"), "undefined" != typeof y[1] && (m = y[0]), this.apple = {
                phone: x(t, m),
                ipod: x(i, m),
                tablet: !x(t, m) && x(r, m),
                device: x(t, m) || x(i, m) || x(r, m)
            }, this.amazon = {
                phone: x(n, m),
                tablet: !x(n, m) && x(o, m),
                device: x(n, m) || x(o, m)
            }, this.android = {
                phone: x(n, m) || x(s, m),
                tablet: !x(n, m) && !x(s, m) && (x(o, m) || x(a, m)),
                device: x(n, m) || x(o, m) || x(s, m) || x(a, m)
            }, this.windows = {
                phone: x(l, m),
                tablet: x(c, m),
                device: x(l, m) || x(c, m)
            }, this.other = {
                blackberry: x(u, m),
                blackberry10: x(_, m),
                opera: x(h, m),
                firefox: x(p, m),
                chrome: x(d, m),
                device: x(u, m) || x(_, m) || x(h, m) || x(p, m) || x(d, m)
            }, this.seven_inch = x(f, m), this.any = this.apple.device || this.android.device || this.windows.device || this.other.device || this.seven_inch, this.phone = this.apple.phone || this.android.phone || this.windows.phone, this.tablet = this.apple.tablet || this.android.tablet || this.windows.tablet, "undefined" == typeof window ? this : void 0
        },
        y = function() {
            var e = new m;
            return e.Class = m, e
        };
    "undefined" != typeof module && module.exports && "undefined" == typeof window ? module.exports = m : "undefined" != typeof module && module.exports && "undefined" != typeof window ? module.exports = y() : "function" == typeof define && define.amd ? define("isMobile", [], e.isMobile = y()) : e.isMobile = y()
}(this), $(function() {
    "use strict";

    function e() {
        var e = $(this),
            t = e.find(".modal-dialog");
        e.css("display", "block"), t.css("margin-top", Math.max(0, ($(window).height() - t.height()) / 2))
    }
    $(".modal").on("show.bs.modal", e), $(window).on("resize", function() {
        $(".modal:visible").each(e)
    })
}), ! function(e, t) {
    "use strict";

    function i(e, t, i, r, s, a, n) {
        var o;
        if (n = "number" == typeof n ? n : 0, e.css(i, r + a), o = e.width(), o >= t) {
            if (e.css(i, ""), o === t) return {
                match: "exact",
                size: parseFloat((parseFloat(r) - .1).toFixed(3))
            };
            var l = t - n,
                c = o - t;
            return {
                match: "estimate",
                size: parseFloat((parseFloat(r) - ("word-spacing" === i && n && l > c ? 0 : s)).toFixed(3))
            }
        }
        return o
    }

    function r(e, r, s, a, n) {
        var o = e.clone(!0).addClass("bigtext-cloned").css({
                fontFamily: e.css("font-family"),
                textTransform: e.css("text-transform"),
                wordSpacing: e.css("word-spacing"),
                letterSpacing: e.css("letter-spacing"),
                position: "absolute",
                left: l.DEBUG_MODE ? 0 : -9999,
                top: l.DEBUG_MODE ? 0 : -9999
            }).appendTo(document.body),
            c = [],
            u = [],
            _ = [],
            h = [];
        return r.css("float", "left").each(function() {
            var e, r, o = t(this),
                u = l.supports.wholeNumberFontSizeOnly ? [8, 4, 1] : [8, 4, 1, .1];
            if (o.hasClass(l.EXEMPT_CLASS)) return c.push(null), h.push(null), void _.push(!1);
            var d = 32,
                p = parseFloat(o.css("font-size")),
                f = (o.width() / p).toFixed(6);
            r = parseInt(s / f, 10) - d;
            e: for (var x = 0, m = u.length; m > x; x++) t: for (var y = 1, v = 10; v >= y; y++) {
                if (r + y * u[x] > a) {
                    r = a;
                    break e
                }
                if (e = i(o, s, "font-size", r + y * u[x], u[x], "px", e), "number" != typeof e) {
                    if (r = e.size, "exact" === e.match) break e;
                    break t
                }
            }
            h.push(s / r), r > a ? (c.push(a), _.push(!1)) : n && n > r ? (c.push(n), _.push(!0)) : (c.push(r), _.push(!1))
        }).each(function(e) {
            var r, a = t(this),
                n = 0,
                o = 1;
            if (a.hasClass(l.EXEMPT_CLASS)) return void u.push(null);
            a.css("font-size", c[e] + "px");
            for (var _ = 1, h = 3; h > _; _ += o)
                if (r = i(a, s, "word-spacing", _, o, "px", r), "number" != typeof r) {
                    n = r.size;
                    break
                } a.css("font-size", ""), u.push(n)
        }).removeAttr("style"), l.DEBUG_MODE ? o.css({
            "background-color": "rgba(255,255,255,.4)"
        }) : o.remove(), {
            fontSizes: c,
            wordSpacings: u,
            ratios: h,
            minFontSizes: _
        }
    }
    var s = 0,
        a = t("head"),
        n = e.BigText,
        o = t.fn.bigtext,
        l = {
            DEBUG_MODE: !1,
            DEFAULT_MIN_FONT_SIZE_PX: null,
            DEFAULT_MAX_FONT_SIZE_PX: 528,
            GLOBAL_STYLE_ID: "bigtext-style",
            STYLE_ID: "bigtext-id",
            LINE_CLASS_PREFIX: "bigtext-line",
            EXEMPT_CLASS: "bigtext-exempt",
            noConflict: function(i) {
                return i && (t.fn.bigtext = o, e.BigText = n), l
            },
            supports: {
                wholeNumberFontSizeOnly: function() {
                    if (!("getComputedStyle" in e)) return !0;
                    var i = t("<div/>").css({
                            position: "absolute",
                            "font-size": "14.1px"
                        }).insertBefore(t("script").eq(0)),
                        r = e.getComputedStyle(i[0], null),
                        s = r && "14px" === r.getPropertyValue("font-size");
                    return i.remove(), s
                }()
            },
            init: function() {
                t("#" + l.GLOBAL_STYLE_ID).length || a.append(l.generateStyleTag(l.GLOBAL_STYLE_ID, [".bigtext * { white-space: nowrap; } .bigtext > * { display: block; }", ".bigtext ." + l.EXEMPT_CLASS + ", .bigtext ." + l.EXEMPT_CLASS + " * { white-space: normal; }"]))
            },
            bindResize: function(i, r) {
                var s;
                t(e).unbind(i).bind(i, function() {
                    s && clearTimeout(s), s = setTimeout(r, 100)
                })
            },
            getStyleId: function(e) {
                return l.STYLE_ID + "-" + e
            },
            generateStyleTag: function(e, i) {
                return t("<style>" + i.join("\n") + "</style>").attr("id", e)
            },
            clearCss: function(e) {
                var i = l.getStyleId(e);
                t("#" + i).remove()
            },
            generateCss: function(e, t, i, r) {
                var s = [];
                l.clearCss(e);
                for (var a = 0, n = t.length; n > a; a++) s.push("#" + e + " ." + l.LINE_CLASS_PREFIX + a + " {" + (r[a] ? " white-space: normal;" : "") + (t[a] ? " font-size: " + t[a] + "px;" : "") + (i[a] ? " word-spacing: " + i[a] + "px;" : "") + "}");
                return l.generateStyleTag(l.getStyleId(e), s)
            },
            jQueryMethod: function(e) {
                return l.init(), e = t.extend({
                    minfontsize: l.DEFAULT_MIN_FONT_SIZE_PX,
                    maxfontsize: l.DEFAULT_MAX_FONT_SIZE_PX,
                    childSelector: "",
                    resize: !0
                }, e || {}), this.each(function() {
                    var i = t(this).addClass("bigtext"),
                        n = i.width(),
                        o = i.attr("id"),
                        c = e.childSelector ? i.find(e.childSelector) : i.children();
                    o || (o = "bigtext-id" + s++, i.attr("id", o)), e.resize && l.bindResize("resize.bigtext-event-" + o, function() {
                        l.jQueryMethod.call(t("#" + o), e)
                    }), l.clearCss(o), c.addClass(function(e, t) {
                        return [t.replace(new RegExp("\\b" + l.LINE_CLASS_PREFIX + "\\d+\\b"), ""), l.LINE_CLASS_PREFIX + e].join(" ")
                    });
                    var u = r(i, c, n, e.maxfontsize, e.minfontsize);
                    a.append(l.generateCss(o, u.fontSizes, u.wordSpacings, u.minFontSizes))
                }), this.trigger("bigtext:complete")
            }
        };
    t.fn.bigtext = l.jQueryMethod, e.BigText = l
}(this, jQuery), ! function(e) {
    "use strict";
    var t, i, r = e.event;
    t = r.special.debouncedresize = {
        setup: function() {
            e(this).on("resize", t.handler)
        },
        teardown: function() {
            e(this).off("resize", t.handler)
        },
        handler: function(e, s) {
            var a = this,
                n = arguments,
                o = function() {
                    e.type = "debouncedresize", r.dispatch.apply(a, n)
                };
            i && clearTimeout(i), s ? o() : i = setTimeout(o, t.threshold)
        },
        threshold: 150
    }
}(jQuery), ! function(e) {
    "use strict";
    e.svenPreloaders = function(t, i) {
        function r() {
            t.addClass("stretchDelay").prepend("<div class='stretcher'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");
            var e = t.find(".stretcher > div");
            TweenMax.set(e, {
                scaleY: .4,
                scaleX: 1,
                force3D: !0,
                rotationZ: "0.01deg"
            });
            var i = [{
                scaleX: 1,
                scaleY: .4
            }, {
                scaleX: 1,
                scaleY: 1
            }, {
                scaleX: 1,
                scaleY: .4
            }];
            _.staggerTo(e, .6, {
                bezier: {
                    curviness: 0,
                    values: i
                },
                ease: Linear.easeInOut
            }, .12)
        }

        function s() {
            _.repeat(0), t.addClass("boxFall").prepend("<div class='sq-wrapper'><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div></div>");
            var i, r, s, a = e(".sq-box"),
                n = 10,
                l = 200,
                c = 150,
                h = 200,
                d = {};
            a.each(function(t, a) {
                i = t % 2 == 0 ? o(-l, -n) : o(n, l), r = .75 * t, s = e(this).find(".sq-fill"), d["sven-" + t] = new TimelineMax({
                    repeat: -1,
                    repeatDelay: .75,
                    yoyo: !1
                }), d["sven-" + t].from(s, .75, {
                    backgroundColor: "transparent"
                }), d["sven-" + t].from(e(this), 1.5, {
                    rotation: 720,
                    opacity: 0,
                    x: i + "px",
                    y: o(-h, -c) + "px",
                    ease: u.ease
                }), d["sven-" + t].to(s, .25, {
                    y: "104%",
                    ease: Linear.easeNone
                }), _.add(d["sven-" + t], r)
            })
        }

        function a() {
            _.repeat(0), t.addClass("boxShoot").prepend("<div class='sq-wrapper'><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div><div class='sq-box'><div class='sq-fill'></div></div></div>");
            var i, r, s, a = e(".sq-box"),
                n = 10,
                l = 200,
                c = {};
            a.each(function(t, a) {
                i = t % 2 == 0 ? o(-l, -n) : o(n, l), r = .75 * t, s = e(this).find(".sq-fill"), c["sven-" + t] = new TimelineMax({
                    repeat: -1,
                    repeatDelay: .75,
                    yoyo: !1
                }), c["sven-" + t].from(s, .75, {
                    y: "104%",
                    backgroundColor: "transparent"
                }), c["sven-" + t].to(e(this), 3, {
                    rotation: 720,
                    opacity: 0,
                    x: i + "px",
                    y: o(-200, -150) + "px",
                    ease: u.ease
                }), _.add(c["sven-" + t], r)
            })
        }

        function n() {
            t.addClass("bounceDelay").prepend("<div class='bouncer'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            var e = t.find(".bouncer > div");
            TweenMax.set(e, {
                scale: 0,
                force3D: !0,
                rotationZ: "0.01deg"
            });
            var i = [{
                scaleX: 0,
                scaleY: 0
            }, {
                scaleX: .5,
                scaleY: .5
            }, {
                scaleX: 1,
                scaleY: 1
            }, {
                scaleX: .5,
                scaleY: .5
            }, {
                scaleX: 0,
                scaleY: 0
            }];
            _.staggerTo(e, 1.2, {
                bezier: {
                    curviness: 0,
                    values: i
                },
                ease: Linear.easeInOut
            }, .16)
        }

        function o(e, t) {
            return Math.floor(Math.random() * (t - e + 1) + e)
        }
        var l = {
                loaderPreset: "bounceDelay",
                ease: Linear.easeNone,
                speed: 1
            },
            c = this,
            u = e.extend({}, l, i),
            _ = new TimelineMax({
                delay: 0,
                repeat: -1,
                paused: !0
            });
        c.init = function() {
            return "bounceDelay" === u.loaderPreset ? n() : "stretchDelay" === u.loaderPreset ? r() : "boxFall" === u.loaderPreset ? s() : "boxShoot" === u.loaderPreset ? a() : n(), _.timeScale(u.speed), _.progress(1).progress(0).play(), c
        }, e.fn.svenPreloaders.pause = function() {
            return _.pause(), c
        }, e.fn.svenPreloaders.resume = function() {
            return _.resume(), c
        }, c.init()
    }, e.fn.svenPreloaders = function(t) {
        var i = this;
        return this.each(function() {
            if (void 0 == e(this).data("svenPreloaders")) {
                var r = new e.svenPreloaders(i, t);
                e(this).data("svenPreloaders", r)
            }
        })
    }
}(jQuery);
var _0x52e7 = ["use strict", "svenPlugin", "init", "show", "loaded", "round", "splash-image", "id", "item", "getItem", "background-image", "url(", "src", ")", "css", "log", "data", " File preload exceeds timeout", "single-image", "static-image", "<img src='", "' width='", "naturalWidth", "' height='", "naturalHeight", "' alt=''/>", "append", "img", "find", "mobileImagePos", "center center", " ", "split", "preview-image", "sceneVideo", "sceneImage", "mobileImage", "<div class='scene-image gpu-hack ", " abs-fs'><img src='", "' alt=''/></div>", ".", " img", "sceneImagePos", " abs-fs'><div class='noimage'></div></div>", "each", "play", "Sound", "loop", "position", "complete", "on", "paused", "video-bg", "youtube", "length", "YTPReady", ".mbYTP_wrapper", "onTeaserReady", "isFunction", "call", "set-overflow", "addClass", "body", "set", "autoStart", "STUnMuted", "trigger", "STMuted", "undefined", "duration", "toFixed", "totalTime", "timeScale", "pause", "html5", "sceneIndex", "grep", "videoURL", "indexOf", "currentSrc", "timeupdate", "off", "ended", "mute", "muted", "startAt", "currentTime", "stopAt", "loadeddata", "one", "opt", "autoPlay", "changeMovie", "onTeaserStart", "hide", "freezeOnBlur", "playing", "resume", "isMute", "STEnd", "onTeaserEnd", "hasFocus", "continueTeaser", "freezeTeaser", "totalDuration", "imageZoomer", "addLabel", "add", "to", "trans", "transDur", "transPattern", "concurrent", "attr", ".sven-slide:first", "prevAll", ".extinct", "sven-nothing", " img, .", " div", "img, div", ",.", "not", ".scene-image", "no", "pursueVideo", "-before", ".bt-container", "xStart", "-100%", "fontMax", "<div class='bt-wrapper'></div>", "wrapInner", ".bt-wrapper", "h1", "bigtext", "default", "vegas", "name", "fade-screen", "template", "easeNone", "none", "hideP-", "visible", "type", "throughout", "alphaDuration", "ease", "in", "out", "prior", "-prior", "-label", "-alpha", "full", "from", "fromTo", "sequential", "end", "alphaPos", "videoType", "staggerTime", "content0", "inEase", "", "outEase", "easeIn", "split0", "wrapper0", "halign-left", "slideAlignment", "halign-center", "offLeft", "-", "ceil", "px", "offRight", "extWidth", "reverse", "chars", "-50%", "inPattern", "0px", "content1", "split1", "wrapper1", "backdrop1", "right center", "left center", "marker", "0%", "staggerTo", "inDur", "outDur", "-=0.4", "-=0.3", "random", "outerWidth", "outerHeight", "rect(0px, 0px, 0px, 0px)", "rect(", "px, ", "px)", "px, 0px, ", "px, 0px)", "rect(0px, ", "easeOut", "place-left", "hasClass", "left top", "place-right", "right top", "center top", "repeat", "tweenFromTo", "-=", "px, 0px, 0px)", "hidden", "-104%", "-=1", "rotate-in-", "center bottom", "+=0.35", "config", "left", "offset", "clone", "parent", ".sven-char-", "eq", "2px", "20px", "color", "0 0 ", "transparent", "blurSub", "+=0", "blurSub+=", "lines", "after", "rect(0px, 0px, 0px 0px)", ".sven-line-", "pos-", "sven-char-sub-", "<div class='", "' style='width: ", "px; height: ", "px'></div>", "push", "absolute", "+=0.2", "+=0.1", "+=0.4", "+=3", "+=2", "comingSubContent", "+=0.3", ".centered", "children", "halign-right", "place-center", "<span class='ws-fix'> &nbsp; </span>", ".ws-fix", "remove", "content", "align", "place-", "boxType", "contain", "<div class='content-wrapper content-wrapper-", "' style='position:relative;width:100%;'></div>", "wrap", "wrapper", ".content-wrapper-", "display", "inline-block", "block", "removeClass", "words,chars,lines", "gpu-hack sven-word-++", "sven-char-++", "sven-line-++", "0.01deg", "last", "width", "padRight", "top", "height", "horz", "vert", "<div class='lt-boxed content-backdrop-", "'></div>", "backdrop", ".content-backdrop-", "100%", "extHeight", "padTop", "padding-top", "padding-right", "padBottom", "padding-bottom", "padLeft", "padding-left", "borTop", "border-top-width", "borRight", "border-right-width", "borBottom", "border-bottom-width", "borLeft", "border-left-width", "median", "reverse-median", "parse", "map", "match", "apply", "freezeTime", "sceneDelay", "-beforeIn", "+=", "-beforeFreeze", "-beforeOut", "animate-colors", "colors", "sceneDur", "freeze", "showAnimationSummary", "in: ", "s<br/> out: ", "s<br/> freeze: ", "s<br/> scene: ", "s", "anim", "animate", "yes", "xEnd", "dur", "onBeforeScene", "onBeforeIn", "onBeforeFreeze", "onBeforeOut", "onAfterScene", "-after", "xhr", "#E7464F", "#CDAA20", "#80993B", "#07BABA", "#9B2C9D", "extend", "any", "firefox", "toLowerCase", "userAgent", "data-enable-sound", "data-sound-loop", "data-auto-play-sound", "data-auto-stop-sound", "data-static-image", "data-mobile-image", "staticImagePos", "zoomOrigin", "zoomType", "zoomDur", "auto", "zoomScale", "data-splash-image", "data-mute-video", "videoQuality", "highres", "videoStart", "videoStop", "data-video-loop", "data-auto-stop-video", "staticVideo", "mixed", "mobileSound", "<div class='sven-wrapper'></div>", "<div class='slideshow-wrapper abs-fs'><div class='slideshow-overlay abs-fs'></div></div>", ".slideshow-wrapper", "<div class='single-wrapper abs-fs'><div class='single-overlay abs-fs'></div><div class='single-image abs-fs'></div></div><div class='black-bg abs-fs'></div>", ".single-image", ".black-bg", "fileTimeout", "<div class='black-bg gpu-hack abs-fs'></div>", "<div class='video-wrapper abs-fs'><div class='preview-image abs-fs bg-cover'></div></div><div class='splash-wrapper abs-fs'><div class='splash-overlay abs-fs'></div><div class='splash-image abs-fs bg-cover'></div></div><div class='color-wrapper gpu-hack abs-fs'></div>", ".preview-image", ".video-wrapper", ".color-wrapper", ".splash-wrapper", ".splash-image", "preloadFiles", ".sven-slide", "className", "getPlayer", "#big-video-wrap", "<div class='bv-overlay abs-fs'></div>", "<div id='bgndVideo' class='player' data-property='{showYTLogo: false, loop: ", ', stopMovieOnBlur: false, quality: "', '",showControls: false, videoURL: "', '", containment:".', '", autoPlay: false, mute: ', ", startAt: ", ", stopAt: ", ", opacity: 1}'>My video</div>", "<div id='bgndVideo' class='player' data-property=", "stringify", ">My video</div>", "#bgndVideo", "YTPEnd", "<div id='summary-handle'><i class='fa fa-info'></i></div><div id='summary-container'><div class='details'><h3 class='animation-name'></h3><p class='scene-info'></p><h3 class='total-duration'></h3></div></div>", "#summary-handle", "#summary-container .animation-name", "#summary-container .scene-info", "#summary-container .total-duration", "sound-", "start", "click", "active", "toggleClass", "fade-in-bg", "alignment", "center-center", "mobileAlignment", "mobileTrans", "right-top top-right right-bottom bottom-right right-center center-right", "left-top top-left left-bottom bottom-left left-center center-left", " halign-left", " halign-right", " halign-center", "<div class='sven-scene ", "'><div class='centered ", "'></div></div>", ".content-container", "sequenital-fall-lt", "sequential-fall-lt", "fall-hide-lt", "appear-lt", "rotate-in-reveal-lt", "stripes-reveal-lt", "random-reveal-lt", "rainfall-reveal-lt", "scale-reveal-lt", "particles-reveal-lt", "scale-rotate-lt", "line-height", "0% 50%", "staggerFrom", "random-alpha-reveal-lt", "blur-reveal-lt", "blur-alpha-lt", "flyin-reveal-lt", "slice", "outPattern", "dominos-reveal-lt", "glitch-one-lt", "The animation you mentioned in ", " does not exist. Check data-anim spelling for errors", "fullDuration", "Teaser Duration: ", "html", "seek", "STPlay", "STPause", "restart", "progress", "skipToLast", "fn", "currentLabel", "togglePlay", "toggleSound", "playFinished", "playState", "changeSpeed", "videoPlaybackChange", "playbackRate", "setPlaybackRate", "preloadMethod", "LoadQueue", "installPlugin", "HTMLAudioPlugin", "registerPlugins", "setMaxConnections", "alternateExtensions", "ogg", "fileload", "error", "fileerror", "audioTimeout", "loadFile", "loadManifest", "load", "debouncedresize", "time", "kill", "prepend", "TEASER NOT YET INITIALIZED", "floor"];
_0x52e7[0],
    function(e) {
        e[_0x52e7[1]] = function(t, i) {
            function r(t, i, r) {
                return t = new e.BigVideo({
                    useFlashForFirefox: !1,
                    container: Ve,
                    doLoop: t
                }), t[_0x52e7[2]](), t[_0x52e7[3]](i, {
                    ambient: r
                }), t
            }

            function s(e) {
                Math[_0x52e7[5]](100 * e[_0x52e7[4]])
            }

            function a(e) {
                _0x52e7[6] == e[_0x52e7[8]][_0x52e7[7]] && (e = W[_0x52e7[9]](_0x52e7[6]), Je[_0x52e7[14]](_0x52e7[10], _0x52e7[11] + e[_0x52e7[12]] + _0x52e7[13]))
            }

            function n(e) {
                console[_0x52e7[15]](e)
            }

            function o(e) {
                if (_0x52e7[6] == e[_0x52e7[16]][_0x52e7[7]]) {
                    var t = W[_0x52e7[9]](_0x52e7[6]);
                    Je[_0x52e7[14]](_0x52e7[10], _0x52e7[11] + t[_0x52e7[12]] + _0x52e7[13])
                }
                console[_0x52e7[15]](e[_0x52e7[16]][_0x52e7[7]] + _0x52e7[17])
            }

            function l(i) {
                Te && (_0x52e7[18] === G ? (i = W[_0x52e7[9]](_0x52e7[19]), Xe[_0x52e7[26]](_0x52e7[20] + i[_0x52e7[12]] + _0x52e7[21] + i[_0x52e7[22]] + _0x52e7[23] + i[_0x52e7[24]] + _0x52e7[25]), Xe = Xe[_0x52e7[28]](_0x52e7[27]), pe && (we = t[_0x52e7[16]]()[_0x52e7[29]] ? t[_0x52e7[16]]()[_0x52e7[29]] : _0x52e7[30]), we = we[_0x52e7[32]](_0x52e7[31]), imgCoverEffect(Xe[0], {
                    alignX: we[0],
                    alignY: we[1],
                    watchResize: !1
                })) : (i = W[_0x52e7[9]](_0x52e7[33]), He[_0x52e7[14]](_0x52e7[10], _0x52e7[11] + i[_0x52e7[12]] + _0x52e7[13])));
                var r, s = 0;
                $e[_0x52e7[44]](function(t, i) {
                    if (!pe && e(this)[_0x52e7[16]]()[_0x52e7[34]]) 0 == s && (e(this)[_0x52e7[16]]()[_0x52e7[35]] && (r = W[_0x52e7[9]](e(this)[0][_0x52e7[7]]), He[_0x52e7[14]](_0x52e7[10], _0x52e7[11] + r[_0x52e7[12]] + _0x52e7[13])), s += 1);
                    else if (e(this)[_0x52e7[16]]()[_0x52e7[35]] || e(this)[_0x52e7[16]]()[_0x52e7[36]]) {
                        r = W[_0x52e7[9]](e(this)[0][_0x52e7[7]]), Ue[_0x52e7[26]](_0x52e7[37] + e(this)[0][_0x52e7[7]] + _0x52e7[38] + r[_0x52e7[12]] + _0x52e7[21] + r[_0x52e7[22]] + _0x52e7[23] + r[_0x52e7[24]] + _0x52e7[39]);
                        var a, n = Ue[_0x52e7[28]](_0x52e7[40] + e(this)[0][_0x52e7[7]] + _0x52e7[41]);
                        a = pe ? e(this)[_0x52e7[16]]()[_0x52e7[29]] ? e(this)[_0x52e7[16]]()[_0x52e7[29]] : _0x52e7[30] : e(this)[_0x52e7[16]]()[_0x52e7[42]] ? e(this)[_0x52e7[16]]()[_0x52e7[42]] : _0x52e7[30], a = a[_0x52e7[32]](_0x52e7[31]), imgCoverEffect(n[0], {
                            alignX: a[0],
                            alignY: a[1],
                            watchResize: !1
                        })
                    } else Ue[_0x52e7[26]](_0x52e7[37] + e(this)[0][_0x52e7[7]] + _0x52e7[43])
                }), ye && (lt = createjs[_0x52e7[46]][_0x52e7[45]](ut), lt[_0x52e7[47]] = ee, lt[_0x52e7[48]] = 100, lt[_0x52e7[50]](_0x52e7[49], _), lt[_0x52e7[51]] = !0), !Ie && (_0x52e7[52] === G && _0x52e7[53] === Me || !pe && 0 < ue[_0x52e7[54]]) ? rt[_0x52e7[50]](_0x52e7[55], function() {
                    0 === me && (tt = Ve[_0x52e7[28]](_0x52e7[56]), c(G))
                }) : c()
            }

            function c() {
                e[_0x52e7[58]](se[_0x52e7[57]]) && se[_0x52e7[57]][_0x52e7[59]](t), e(_0x52e7[62])[_0x52e7[61]](_0x52e7[60]), _0x52e7[52] === G && _0x52e7[53] === Me && TweenMax[_0x52e7[63]](He, {
                    autoAlpha: 0
                }), se[_0x52e7[64]] ? t[_0x52e7[66]](_0x52e7[65]) : t[_0x52e7[66]](_0x52e7[67]), re[_0x52e7[2]]()
            }

            function u() {
                if (lt[_0x52e7[45]](), _0x52e7[68] !== typeof lt) {
                    var e = Math[_0x52e7[5]](lt[_0x52e7[69]]),
                        i = Math[_0x52e7[5]](1e3 * _e[de][_0x52e7[71]]()[_0x52e7[70]](1) / _e[de][_0x52e7[72]]()),
                        r = i;
                    0 > ee && i > e && (r = i % e), lt[_0x52e7[48]] = r, t[_0x52e7[66]](_0x52e7[65])
                }
            }

            function _() {
                oe = !0, lt[_0x52e7[51]] = !0, t[_0x52e7[66]](_0x52e7[67])
            }

            function h() {
                Ze && Ke[_0x52e7[73]](), it && it.YTPPause()
            }

            function d() {
                Ze && Ke[_0x52e7[45]](), it && it.YTPPlay()
            }

            function p() {
                Ce && Ke[_0x52e7[73]](), ke && it.YTPPause()
            }

            function f() {
                Ce && Ke[_0x52e7[45]](), ke && it.YTPPlay()
            }

            function x(t, i, r) {
                if (i[_0x52e7[16]]()[_0x52e7[35]] && (i = W[_0x52e7[9]](i[0][_0x52e7[7]])[_0x52e7[12]], He[_0x52e7[14]](_0x52e7[10], _0x52e7[11] + i + _0x52e7[13])), TweenMax[_0x52e7[63]](He, {
                    autoAlpha: 1
                }), _0x52e7[74] === r) {
                    Ce = !0, ke = !1, TweenMax[_0x52e7[63]](et, {
                        autoAlpha: 1
                    });
                    var s = e[_0x52e7[76]](ce, function(e) {
                        return e[_0x52e7[75]] == t
                    }); - 1 == Ke[_0x52e7[79]]()[_0x52e7[78]](s[0][_0x52e7[77]]) && Ze[_0x52e7[3]](s[0][_0x52e7[77]]), Ke[_0x52e7[81]](_0x52e7[80]), Ke[_0x52e7[81]](_0x52e7[82]), Ke[_0x52e7[84]](s[0][_0x52e7[83]]), Ke[_0x52e7[86]](s[0][_0x52e7[85]]), Re ? (1 < ce[_0x52e7[54]] && (Re = !1), m(), Ke[_0x52e7[50]](_0x52e7[80], function() {
                        (0 != s[0][_0x52e7[87]] && Ke[_0x52e7[86]]() >= s[0][_0x52e7[87]] || 0 == s[0][_0x52e7[87]] && Ke[_0x52e7[86]]() >= Ke[_0x52e7[69]]()) && (s[0][_0x52e7[47]] ? (Ke[_0x52e7[47]](!0), Ke[_0x52e7[86]](s[0][_0x52e7[85]]), Ke[_0x52e7[45]]()) : (Ce = !1, Ke[_0x52e7[73]]()))
                    }), Ke[_0x52e7[45]]()) : Ke[_0x52e7[89]](_0x52e7[88], function() {
                        m(), Ke[_0x52e7[50]](_0x52e7[80], function() {
                            (0 != s[0][_0x52e7[87]] && Ke[_0x52e7[86]]() >= s[0][_0x52e7[87]] || 0 == s[0][_0x52e7[87]] && Ke[_0x52e7[86]]() >= Ke[_0x52e7[69]]()) && (s[0][_0x52e7[47]] ? (Ke[_0x52e7[47]](!0), Ke[_0x52e7[86]](s[0][_0x52e7[85]]), Ke[_0x52e7[45]]()) : (Ce = !1, Ke[_0x52e7[73]]()))
                        }), Ke[_0x52e7[45]]()
                    })
                } else Ce = !1, ke = !0, s = e[_0x52e7[76]](ue, function(e) {
                    return e[_0x52e7[75]] == t
                }), s[0][_0x52e7[77]] == rt[0][_0x52e7[90]][_0x52e7[77]] ? (m(), it.YTPSeekTo(s[0][_0x52e7[85]]), TweenMax[_0x52e7[63]](tt, {
                    autoAlpha: 1
                }), it.YTPPlay()) : (s[0][_0x52e7[91]] = !0, it[_0x52e7[92]](s[0]), rt[_0x52e7[89]](_0x52e7[55], function() {
                    m(), e(this).YTPSeekTo(s[0][_0x52e7[85]]), TweenMax[_0x52e7[63]](tt, {
                        autoAlpha: 1
                    }), e(this).YTPPlay()
                }))
            }

            function m() {
                TweenMax[_0x52e7[63]](He, {
                    autoAlpha: 0
                })
            }

            function y() {
                if (e[_0x52e7[58]](se[_0x52e7[93]]) && se[_0x52e7[93]][_0x52e7[59]](t), Ge[_0x52e7[94]](), se[_0x52e7[95]] && (clearInterval(V), V = setInterval(g, 400)), _0x52e7[68] !== typeof lt && ((!pe || pe && !se[_0x52e7[64]]) && ge && _0x52e7[51] != K || _0x52e7[96] === K ? (u(), lt[_0x52e7[51]] = !1, t[_0x52e7[66]](_0x52e7[65]), K = _0x52e7[96]) : (lt[_0x52e7[51]] = !0, t[_0x52e7[66]](_0x52e7[67]), K = _0x52e7[51])), _0x52e7[18] === G && ie[_0x52e7[51]]() && ie[_0x52e7[97]](), _0x52e7[52] === G) {
                    var i = Qe;
                    Ze && Ke[_0x52e7[86]](i), it && it.YTPSeekTo(i), _0x52e7[53] === Me && TweenMax[_0x52e7[63]](tt, {
                        autoAlpha: 1
                    }), d(), ye || _0x52e7[52] !== G || Oe || (_0x52e7[74] === Me ? Ke[_0x52e7[84]]() ? t[_0x52e7[66]](_0x52e7[67]) : t[_0x52e7[66]](_0x52e7[65]) : rt[_0x52e7[98]] ? t[_0x52e7[66]](_0x52e7[67]) : t[_0x52e7[66]](_0x52e7[65]))
                }
            }

            function v() {
                t[_0x52e7[66]](_0x52e7[99]), _0x52e7[68] !== typeof lt && be && _(), _0x52e7[52] === G && Be && h(), e[_0x52e7[58]](se[_0x52e7[100]]) && se[_0x52e7[100]][_0x52e7[59]](t)
            }

            function g() {
                document[_0x52e7[101]]() ? re[_0x52e7[102]]() : re[_0x52e7[103]]()
            }

            function b(e) {
                ie = new TimelineMax({
                    delay: 0
                });
                var t = e[_0x52e7[104]]();
                te = t + .75, Ee && (ie[_0x52e7[106]](_0x52e7[105]), e[_0x52e7[107]](ie, t)), e[_0x52e7[108]](Xe, .75, {
                    opacity: 1
                })
            }

            function T() {
                ie[_0x52e7[73]]()
            }

            function P(e) {
                _0x52e7[18] === G && e[_0x52e7[63]](Xe, {
                    autoAlpha: 0,
                    onComplete: T,
                    onCompleteParams: []
                }), _0x52e7[52] === G && e[_0x52e7[63]](Ve, {
                    autoAlpha: 0,
                    onComplete: h,
                    onCompleteParams: []
                })
            }

            function w(t, i, r, s) {
                var a, n, o = r[_0x52e7[109]],
                    l = r[_0x52e7[110]],
                    c = r[_0x52e7[111]] ? r[_0x52e7[111]] : _0x52e7[112],
                    u = t[_0x52e7[113]](_0x52e7[7]),
                    _ = !1;
                0 != i ? (n = t[_0x52e7[115]](_0x52e7[114]), a = n[_0x52e7[113]](_0x52e7[7])) : (n = e(_0x52e7[116]), a = _0x52e7[117]);
                var h = Ue[_0x52e7[28]](_0x52e7[40] + u + _0x52e7[118] + u + _0x52e7[119]),
                    d = Ue[_0x52e7[28]](_0x52e7[40] + a + _0x52e7[118] + a + _0x52e7[119]);
                a = e(_0x52e7[123])[_0x52e7[122]](_0x52e7[40] + u + _0x52e7[121] + a)[_0x52e7[28]](_0x52e7[120]), s[_0x52e7[63]](a, {
                    autoAlpha: 0
                }), pe || !r[_0x52e7[34]] && !r[_0x52e7[35]] && _0x52e7[124] !== r[_0x52e7[125]] || (_ = !0), s[_0x52e7[106]](u + _0x52e7[126]);
                var p;
                if (a = t[_0x52e7[28]](_0x52e7[127]), 0 < a[_0x52e7[54]]) {
                    var f = a[_0x52e7[16]]()[_0x52e7[128]] ? a[_0x52e7[16]]()[_0x52e7[128]] : _0x52e7[129],
                        m = a[_0x52e7[16]]()[_0x52e7[130]] ? parseInt(a[_0x52e7[16]]()[_0x52e7[130]]) : 728;
                    a[_0x52e7[132]](_0x52e7[131]), p = a[_0x52e7[28]](_0x52e7[133]), p[_0x52e7[135]]({
                        childSelector: _0x52e7[134],
                        maxfontsize: m,
                        resize: !1
                    }), s[_0x52e7[63]](a, {
                        x: f
                    })
                }
                var y, l = _0x52e7[136] == l ? 1.4 : parseFloat(l),
                    l = l / 2;
                a = e[_0x52e7[76]](svenTransitions[_0x52e7[137]], function(e) {
                    return e[_0x52e7[138]] == o
                }), 0 != i && (y = e[_0x52e7[76]](svenTransitions[_0x52e7[137]], function(e) {
                    return e[_0x52e7[138]] == n[_0x52e7[16]]()[_0x52e7[109]]
                })), _0x52e7[139] == a[0][_0x52e7[140]] ? (s[_0x52e7[108]](ze, l, {
                    autoAlpha: 1,
                    ease: Linear[_0x52e7[141]]
                }), P(s), s[_0x52e7[63]](n, {
                    display: _0x52e7[142]
                }), _ && s[_0x52e7[106]](_0x52e7[143] + i), 0 < h[_0x52e7[54]] && s[_0x52e7[63]](h, {
                    autoAlpha: 1
                })) : (_0x52e7[142] != o && P(s), s[_0x52e7[63]](n, {
                    display: _0x52e7[142]
                }), _ && s[_0x52e7[106]](_0x52e7[143] + i)), s[_0x52e7[63]](t, {
                    visibility: _0x52e7[144]
                }), p = a[0][_0x52e7[145]] ? a[0][_0x52e7[145]] : _0x52e7[146], f = a[0][_0x52e7[147]] ? parseFloat(a[0][_0x52e7[147]]) : .95, a[0][_0x52e7[149]][0][_0x52e7[108]][_0x52e7[148]] || (a[0][_0x52e7[149]][0][_0x52e7[108]][_0x52e7[148]] = Linear[_0x52e7[141]]), a[0][_0x52e7[150]] && !a[0][_0x52e7[150]][0][_0x52e7[108]][_0x52e7[148]] && (a[0][_0x52e7[150]][0][_0x52e7[108]][_0x52e7[148]] = Linear[_0x52e7[141]]), _0x52e7[151] == p && (u += _0x52e7[152], s[_0x52e7[106]](u + _0x52e7[153])), he[u] = new TimelineMax, he[u + _0x52e7[154]] = new TimelineMax, he[u + _0x52e7[154]][_0x52e7[108]](h, f, {
                    autoAlpha: 1
                }, 0), _0x52e7[139] == a[0][_0x52e7[140]] && he[u + _0x52e7[154]][_0x52e7[108]](ze, l, {
                    autoAlpha: 0
                }, 0), he[u][_0x52e7[16]] = {}, he[u][_0x52e7[16]][_0x52e7[69]] = a[0][_0x52e7[149]][0][_0x52e7[69]] ? a[0][_0x52e7[149]][0][_0x52e7[69]] : _0x52e7[155], he[u][_0x52e7[157]](h, 1.08, a[0][_0x52e7[149]][0][_0x52e7[156]], a[0][_0x52e7[149]][0][_0x52e7[108]], 0), _0x52e7[158] == c ? 0 < d[_0x52e7[54]] && he[u + _0x52e7[154]][_0x52e7[63]](d, {
                    autoAlpha: 0
                }) : y && 0 < y[_0x52e7[54]] && y[0][_0x52e7[150]] ? (y[0][_0x52e7[150]][0][_0x52e7[156]] && y[0][_0x52e7[150]][0][_0x52e7[108]] ? he[u][_0x52e7[157]](d, 1.08, y[0][_0x52e7[150]][0][_0x52e7[156]], y[0][_0x52e7[150]][0][_0x52e7[108]], 0) : y[0][_0x52e7[150]][0][_0x52e7[108]] && he[u][_0x52e7[108]](d, 1.08, y[0][_0x52e7[150]][0][_0x52e7[108]], 0), _0x52e7[159] == y[0][_0x52e7[150]][0][_0x52e7[160]] ? 0 < d[_0x52e7[54]] && he[u][_0x52e7[63]](d, {
                    autoAlpha: 0
                }) : 0 < d[_0x52e7[54]] && he[u + _0x52e7[154]][_0x52e7[108]](d, f, {
                    autoAlpha: 0
                }, 0)) : 0 < d[_0x52e7[54]] && he[u + _0x52e7[154]][_0x52e7[63]](d, {
                    autoAlpha: 0
                }), _0x52e7[151] == p && (l = a[0][_0x52e7[149]][0][_0x52e7[69]] ? a[0][_0x52e7[149]][0][_0x52e7[69]] : 1.5, s[_0x52e7[107]](he[u + _0x52e7[154]], u + _0x52e7[153]), s[_0x52e7[107]](he[u][_0x52e7[69]](l), u + _0x52e7[153])), _ && s[_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onStart: j,
                    onStartParams: []
                }, _0x52e7[143] + i), !pe && r[_0x52e7[34]] && s[_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: x,
                    onCompleteParams: [i, t, r[_0x52e7[161]]]
                })
            }

            function j() {
                it && (ke = !1, TweenMax[_0x52e7[63]](tt, {
                    autoAlpha: 0
                })), et && (Ce = !1, TweenMax[_0x52e7[63]](et, {
                    autoAlpha: 0
                })), h()
            }

            function S(e, t, i, r, s, a, n) {
                s = Q(e, i, r, s, !1, !1);
                var o, l, c, u, _, h, d;
                if (d = s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .08, u = s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? z(s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]]) : _0x52e7[165], _ = s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : Circ[_0x52e7[167]], h = s[_0x52e7[168]], l = N(s[_0x52e7[169]]), _0x52e7[170] == s[_0x52e7[171]] || _0x52e7[172] == s[_0x52e7[171]] ? (o = l[_0x52e7[173]], o = _0x52e7[174] + Math[_0x52e7[175]](.6 * o) + _0x52e7[176], l = Math[_0x52e7[175]](l[_0x52e7[177]] + l[_0x52e7[178]]) + _0x52e7[176], c = _0x52e7[158]) : (o = l[_0x52e7[177]], o = Math[_0x52e7[175]](.6 * o) + _0x52e7[176], l = _0x52e7[174] + Math[_0x52e7[175]](l[_0x52e7[173]] + l[_0x52e7[178]]) + _0x52e7[176], c = _0x52e7[179]), a[_0x52e7[63]](s[_0x52e7[169]], {
                    x: o
                }), a[_0x52e7[63]](h[_0x52e7[180]], {
                    y: _0x52e7[181],
                    opacity: 0
                }), c = s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? s[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : c, h[_0x52e7[180]] = X(c, h[_0x52e7[180]]), n || (l = _0x52e7[183]), s[_0x52e7[184]]) {
                    var p, f, x, m, y, v, g, b;
                    b = s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[162]]) : .08, m = s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[182]] ? s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[158], y = s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? z(s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]]) : _0x52e7[165], v = s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(s[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], g = s[_0x52e7[185]], p = N(s[_0x52e7[186]]), f = N(s[_0x52e7[187]]), _0x52e7[170] == s[_0x52e7[171]] ? (o = f[_0x52e7[173]], c = _0x52e7[188], x = _0x52e7[189], n = _0x52e7[174] + Math[_0x52e7[175]](o + f[_0x52e7[178]]) + _0x52e7[176], p = Math[_0x52e7[175]](p[_0x52e7[177]] + p[_0x52e7[178]]) + _0x52e7[176], o = F(o, s[_0x52e7[187]]), f = Math[_0x52e7[175]](f[_0x52e7[177]] / f[_0x52e7[178]]) + 2) : (o = f[_0x52e7[177]], c = _0x52e7[189], x = _0x52e7[188], n = Math[_0x52e7[175]](o + f[_0x52e7[178]]) + _0x52e7[176], p = _0x52e7[174] + Math[_0x52e7[175]](p[_0x52e7[173]] + p[_0x52e7[178]]) + _0x52e7[176], o = F(o, s[_0x52e7[187]]), f = Math[_0x52e7[175]](f[_0x52e7[173]] / f[_0x52e7[178]]) + 2), a[_0x52e7[63]](s[_0x52e7[187]], {
                        x: n,
                        transformOrigin: c,
                        scaleX: o
                    }), a[_0x52e7[63]](g[_0x52e7[180]], {
                        y: _0x52e7[181],
                        opacity: 0
                    }), g[_0x52e7[180]] = X(m, g[_0x52e7[180]])
                }
                a[_0x52e7[63]](r, {
                    visibility: _0x52e7[144]
                }), a[_0x52e7[106]](s[_0x52e7[190]]), a = U(!1), a[_0x52e7[149]][_0x52e7[192]](h[_0x52e7[180]], .2, {
                    y: _0x52e7[191],
                    opacity: 1,
                    ease: u
                }, d, 0), a[_0x52e7[149]][_0x52e7[108]](s[_0x52e7[169]], a[_0x52e7[149]][_0x52e7[69]]() + .1, {
                    x: _0x52e7[183]
                }, 0), s[_0x52e7[184]] && (a[_0x52e7[149]][_0x52e7[108]](s[_0x52e7[187]], 1, {
                    scaleX: 1,
                    rotation: .01,
                    x: 0
                }, .18 * a[_0x52e7[149]][_0x52e7[69]]()), a[_0x52e7[149]][_0x52e7[192]](g[_0x52e7[180]], .2, {
                    y: _0x52e7[191],
                    opacity: 1,
                    ease: y
                }, b, .8 * a[_0x52e7[149]][_0x52e7[69]]())), i[_0x52e7[193]] && a[_0x52e7[149]][_0x52e7[69]](parseFloat(i[_0x52e7[193]])), _0x52e7[142] != i[_0x52e7[194]] && (a[_0x52e7[150]][_0x52e7[108]](s[_0x52e7[169]], .5, {
                    x: l,
                    opacity: 0,
                    ease: _
                }), s[_0x52e7[184]] && (a[_0x52e7[150]][_0x52e7[108]](s[_0x52e7[187]], .5, {
                    scaleX: f,
                    rotation: .01,
                    transformOrigin: x
                }, _0x52e7[195]), a[_0x52e7[150]][_0x52e7[108]](s[_0x52e7[186]], .35, {
                    x: p,
                    opacity: 0,
                    ease: v
                }, _0x52e7[196])), i[_0x52e7[194]] && a[_0x52e7[150]][_0x52e7[69]](parseFloat(i[_0x52e7[194]]))), H(e, a, t, i, s[_0x52e7[190]], r, !1)
            }

            function A(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o, l, c, u, _, h, d, p, f;
                if (f = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .08, u = a[_0x52e7[168]], o = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[197], l = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]]) : _0x52e7[165], c = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], u[_0x52e7[180]] = X(o, u[_0x52e7[180]]), e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    _ = e(i)[_0x52e7[198]](), h = e(i)[_0x52e7[199]](), d = [_0x52e7[200], _0x52e7[201] + h + _0x52e7[202] + _ + _0x52e7[202] + h + _0x52e7[202] + _ + _0x52e7[203], _0x52e7[201] + h + _0x52e7[204] + h + _0x52e7[205], _0x52e7[206] + _ + _0x52e7[204] + _ + _0x52e7[203]], p = d[t % 4], n[_0x52e7[63]](e(i), {
                        clip: p
                    })
                }), a[_0x52e7[184]]) {
                    var x, m;
                    x = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]]) : Bounce[_0x52e7[207]], m = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], o = a[_0x52e7[184]][_0x52e7[209]](_0x52e7[208]) ? _0x52e7[210] : a[_0x52e7[184]][_0x52e7[209]](_0x52e7[211]) ? _0x52e7[212] : _0x52e7[213], n[_0x52e7[63]](a[_0x52e7[187]], {
                        scale: 0,
                        transformOrigin: o
                    }), n[_0x52e7[63]](a[_0x52e7[184]], {
                        opacity: 0,
                        transformOrigin: o
                    })
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var y = U(!0);
                e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    var r = (t + 1) * f;
                    _ = e(i)[_0x52e7[198]](), h = e(i)[_0x52e7[199]](), y[_0x52e7[214]][_0x52e7[108]](e(i), 1.25, {
                        clip: _0x52e7[206] + _ + _0x52e7[202] + h + _0x52e7[205],
                        ease: l
                    }, r)
                }), y[_0x52e7[149]][_0x52e7[107]](y[_0x52e7[214]]), a[_0x52e7[184]] && (y[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[187]], .25, {
                    scale: 1.2,
                    rotation: .01,
                    ease: Linear[_0x52e7[141]]
                }), y[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[187]], .6, {
                    scale: 1,
                    rotation: .01,
                    ease: x
                }), y[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[184]], .75, {
                    opacity: 1
                })), r[_0x52e7[193]] && y[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (y[_0x52e7[150]][_0x52e7[107]](y[_0x52e7[214]][_0x52e7[215]](0, y[_0x52e7[214]][_0x52e7[69]](), {
                    ease: c
                })[_0x52e7[72]](2)[_0x52e7[179]]()), a[_0x52e7[184]] && y[_0x52e7[150]][_0x52e7[108]]([a[_0x52e7[184]], a[_0x52e7[187]]], .6 * y[_0x52e7[150]][_0x52e7[69]](), {
                    scale: 0,
                    rotation: .01,
                    ease: m
                }, _0x52e7[216] + .8 * y[_0x52e7[150]][_0x52e7[69]]()), r[_0x52e7[194]] && y[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, y, i, r, a[_0x52e7[190]], s, !0)
            }

            function E(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o, l, c, u, _, h, d;
                if (d = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .08, u = a[_0x52e7[168]], o = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[197], l = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : _0x52e7[165], c = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], u[_0x52e7[180]] = X(o, u[_0x52e7[180]]), e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    _ = e(i)[_0x52e7[198]](), n[_0x52e7[63]](e(i), {
                        clip: _0x52e7[206] + _ + _0x52e7[217]
                    })
                }), a[_0x52e7[184]]) {
                    var p = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]],
                        f = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                    n[_0x52e7[63]](a[_0x52e7[186]], {
                        overflow: _0x52e7[218]
                    }), n[_0x52e7[63]]([a[_0x52e7[184]], a[_0x52e7[187]]], {
                        y: _0x52e7[219]
                    })
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var x = U(!0);
                e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    var r = t * d;
                    _ = e(i)[_0x52e7[198]](), h = e(i)[_0x52e7[199]](), x[_0x52e7[214]][_0x52e7[108]](e(i), 1.5, {
                        clip: _0x52e7[206] + _ + _0x52e7[202] + h + _0x52e7[205],
                        ease: l
                    }, r)
                }), x[_0x52e7[149]][_0x52e7[107]](x[_0x52e7[214]]), a[_0x52e7[184]] && x[_0x52e7[149]][_0x52e7[108]]([a[_0x52e7[184]], a[_0x52e7[187]]], .8, {
                    y: _0x52e7[191],
                    ease: p
                }), r[_0x52e7[193]] && x[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (x[_0x52e7[150]][_0x52e7[107]](x[_0x52e7[214]][_0x52e7[215]](0, x[_0x52e7[214]][_0x52e7[69]](), {
                    ease: c
                })[_0x52e7[72]](2)[_0x52e7[179]]()), a[_0x52e7[184]] && x[_0x52e7[150]][_0x52e7[108]](a[_0x52e7[186]], .8, {
                    opacity: 0,
                    ease: f
                }, _0x52e7[220]), r[_0x52e7[194]] && x[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, x, i, r, a[_0x52e7[190]], s, !0)
            }

            function L(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o, l, c, u, _, h, d;
                if (d = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .04, u = a[_0x52e7[168]], o = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[197], l = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : _0x52e7[165], c = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], u[_0x52e7[180]] = X(o, u[_0x52e7[180]]), e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    _ = e(i)[_0x52e7[198]](), n[_0x52e7[63]](e(i), {
                        clip: _0x52e7[206] + _ + _0x52e7[217],
                        scale: 0
                    })
                }), a[_0x52e7[184]]) {
                    var p = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]],
                        f = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                    n[_0x52e7[63]](a[_0x52e7[186]], {
                        overflow: _0x52e7[218]
                    }), n[_0x52e7[63]]([a[_0x52e7[184]], a[_0x52e7[187]]], {
                        y: _0x52e7[219]
                    })
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var x = U(!0);
                e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    var r = t * d;
                    _ = e(i)[_0x52e7[198]](), h = e(i)[_0x52e7[199]](), x[_0x52e7[214]][_0x52e7[108]](e(i), .8, {
                        clip: _0x52e7[206] + _ + _0x52e7[202] + h + _0x52e7[205],
                        scale: 1,
                        ease: l
                    }, r)
                }), x[_0x52e7[149]][_0x52e7[107]](x[_0x52e7[214]]), a[_0x52e7[184]] && x[_0x52e7[149]][_0x52e7[108]]([a[_0x52e7[184]], a[_0x52e7[187]]], .8, {
                    y: _0x52e7[191],
                    ease: p
                }), r[_0x52e7[193]] && x[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (x[_0x52e7[150]][_0x52e7[107]](x[_0x52e7[214]][_0x52e7[215]](0, x[_0x52e7[214]][_0x52e7[69]](), {
                    ease: c
                })[_0x52e7[72]](2)[_0x52e7[179]]()), a[_0x52e7[184]] && x[_0x52e7[150]][_0x52e7[108]](a[_0x52e7[186]], .8, {
                    opacity: 0,
                    ease: f
                }, _0x52e7[220]), r[_0x52e7[194]] && x[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, x, i, r, a[_0x52e7[190]], s, !0)
            }

            function R(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o, l, c, u;
                if (u = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .15, c = a[_0x52e7[168]], o = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[158], a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] && a[_0x52e7[163]][_0x52e7[16]](), l = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], c[_0x52e7[180]] = X(o, c[_0x52e7[180]]), n[_0x52e7[63]](c[_0x52e7[180]], {
                    autoAlpha: 0,
                    scale: .7
                }), a[_0x52e7[184]]) {
                    var _ = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]],
                        h = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                    n[_0x52e7[63]](a[_0x52e7[186]], {
                        overflow: _0x52e7[218]
                    }), n[_0x52e7[63]]([a[_0x52e7[184]], a[_0x52e7[187]]], {
                        y: _0x52e7[219]
                    })
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var d = U(!0);
                e[_0x52e7[44]](c[_0x52e7[180]], function(t, i) {
                    d[_0x52e7[214]][_0x52e7[106]](_0x52e7[221] + t, t * u), d[_0x52e7[214]][_0x52e7[108]](e(i), .35, {
                        autoAlpha: 1,
                        rotation: 30,
                        transformOrigin: _0x52e7[222],
                        scale: 1.1
                    }, _0x52e7[221] + t), d[_0x52e7[214]][_0x52e7[108]](e(i), .25, {
                        rotation: 0,
                        scale: 1,
                        transformOrigin: _0x52e7[222],
                        ease: Back[_0x52e7[167]]
                    }, _0x52e7[221] + t + _0x52e7[223])
                }), d[_0x52e7[149]][_0x52e7[107]](d[_0x52e7[214]]), a[_0x52e7[184]] && d[_0x52e7[149]][_0x52e7[108]]([a[_0x52e7[184]], a[_0x52e7[187]]], .8, {
                    y: _0x52e7[191],
                    ease: _
                }), r[_0x52e7[193]] && d[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (d[_0x52e7[150]][_0x52e7[107]](d[_0x52e7[214]][_0x52e7[215]](0, d[_0x52e7[214]][_0x52e7[69]](), {
                    ease: l
                })[_0x52e7[72]](2)[_0x52e7[179]]()), a[_0x52e7[184]] && d[_0x52e7[150]][_0x52e7[108]](a[_0x52e7[186]], .8, {
                    opacity: 0,
                    ease: h
                }, _0x52e7[220]), r[_0x52e7[194]] && d[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, d, i, r, a[_0x52e7[190]], s, !0)
            }

            function Y(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o, l, c, u, _, h, d = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : SlowMo[_0x52e7[148]][_0x52e7[224]](3, .7, !1),
                    p = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165],
                    f = a[_0x52e7[168]],
                    x = 1;
                if (a[_0x52e7[163]][_0x52e7[209]](_0x52e7[208]) ? h = _0x52e7[174] + Math[_0x52e7[175]](q(a[_0x52e7[169]], t) + a[_0x52e7[169]][_0x52e7[198]]()) + _0x52e7[176] : a[_0x52e7[163]][_0x52e7[209]](_0x52e7[211]) ? h = Math[_0x52e7[175]](a[_0x52e7[169]][_0x52e7[226]]()[_0x52e7[225]] + a[_0x52e7[169]][_0x52e7[198]]()) + _0x52e7[176] : (h = Math[_0x52e7[175]](a[_0x52e7[169]][_0x52e7[226]]()[_0x52e7[225]] + a[_0x52e7[169]][_0x52e7[198]]()) + _0x52e7[176], x = 0), e(f[_0x52e7[180]])[_0x52e7[44]](function(t, i) {
                    l = Math[_0x52e7[175]](e(i)[_0x52e7[199]]() / 4), o = Math[_0x52e7[175]](e(i)[_0x52e7[198]]() / 2);
                    for (var r = 0; 7 > r; r++) e(i)[_0x52e7[228]]()[_0x52e7[26]](e(i)[_0x52e7[227]]());
                    for (u = s[_0x52e7[28]](_0x52e7[229] + (t + 1)), r = 0; 2 > r; r++) _ = _0x52e7[206] + o * (r + 1) + _0x52e7[202] + 1 * l + _0x52e7[202] + o * r + _0x52e7[203], c = r, n[_0x52e7[63]](u[_0x52e7[230]](c), {
                        x: h,
                        opacity: x,
                        clip: _
                    });
                    for (r = 0; 2 > r; r++) _ = _0x52e7[201] + 1 * l + _0x52e7[202] + o * (r + 1) + _0x52e7[202] + 2 * l + _0x52e7[202] + o * r + _0x52e7[203], c = r + 2, n[_0x52e7[63]](u[_0x52e7[230]](c), {
                        x: h,
                        opacity: x,
                        clip: _
                    });
                    for (r = 0; 2 > r; r++) _ = _0x52e7[201] + 2 * l + _0x52e7[202] + o * (r + 1) + _0x52e7[202] + 3 * l + _0x52e7[202] + o * r + _0x52e7[203], c = r + 4, n[_0x52e7[63]](u[_0x52e7[230]](c), {
                        x: h,
                        opacity: x,
                        clip: _
                    });
                    for (r = 0; 2 > r; r++) _ = _0x52e7[201] + 3 * l + _0x52e7[202] + o * (r + 1) + _0x52e7[202] + 4 * l + _0x52e7[202] + o * r + _0x52e7[203], c = r + 6, n[_0x52e7[63]](u[_0x52e7[230]](c), {
                        x: h,
                        opacity: x,
                        clip: _
                    })
                }), a[_0x52e7[184]]) {
                    var m, y = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : _0x52e7[165],
                        v = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                    m = a[_0x52e7[184]][_0x52e7[209]](_0x52e7[208]) ? _0x52e7[188] : a[_0x52e7[184]][_0x52e7[209]](_0x52e7[211]) ? _0x52e7[189] : _0x52e7[30], n[_0x52e7[63]](a[_0x52e7[187]], {
                        scaleX: 0,
                        transformOrigin: m
                    }), n[_0x52e7[63]](a[_0x52e7[184]], {
                        opacity: 0
                    })
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var g = U(!0);
                e(f[_0x52e7[180]])[_0x52e7[44]](function(e, t) {
                    u = s[_0x52e7[28]](_0x52e7[229] + (e + 1)), g[_0x52e7[214]][_0x52e7[192]](u, .1, {
                        x: 0,
                        opacity: 1,
                        ease: d
                    }, .08, 1 * Math[_0x52e7[197]]())
                }), g[_0x52e7[149]][_0x52e7[107]](g[_0x52e7[214]], 0), a[_0x52e7[184]] && (g[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[187]], g[_0x52e7[214]][_0x52e7[69]]() - .2, {
                    scaleX: 1,
                    rotation: .01,
                    ease: y
                }, .2), g[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[184]], .75, {
                    opacity: 1
                })), r[_0x52e7[193]] && g[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (g[_0x52e7[150]][_0x52e7[107]](g[_0x52e7[214]][_0x52e7[215]](0, g[_0x52e7[214]][_0x52e7[69]](), {
                    ease: p
                })[_0x52e7[72]](2)[_0x52e7[179]]()), y = g[_0x52e7[150]][_0x52e7[69]](), a[_0x52e7[184]] && (g[_0x52e7[150]][_0x52e7[108]](a[_0x52e7[184]], .2 * y, {
                    opacity: 0
                }, 0), g[_0x52e7[150]][_0x52e7[108]](a[_0x52e7[187]], .65 * y, {
                    scaleX: 0,
                    rotation: .01,
                    ease: v
                }, 0)), r[_0x52e7[194]] && g[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, g, i, r, a[_0x52e7[190]], s, !0)
            }

            function C(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o, l, c, u, _;
                if (u = a[_0x52e7[168]], _ = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .08, o = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[197], l = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : _0x52e7[165], c = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], u[_0x52e7[180]] = X(o, u[_0x52e7[180]]), a[_0x52e7[184]]) {
                    var h = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]],
                        d = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                    n[_0x52e7[63]](a[_0x52e7[186]], {
                        overflow: _0x52e7[218]
                    }), n[_0x52e7[63]]([a[_0x52e7[184]], a[_0x52e7[187]]], {
                        y: _0x52e7[219]
                    })
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var p = U(!0);
                e[_0x52e7[44]](u[_0x52e7[180]], function(t, i) {
                    var r = t * _;
                    p[_0x52e7[214]][_0x52e7[156]](e(i), .8, {
                        opacity: 0,
                        ease: l
                    }, r)
                }), p[_0x52e7[149]][_0x52e7[107]](p[_0x52e7[214]]), a[_0x52e7[184]] && p[_0x52e7[149]][_0x52e7[108]]([a[_0x52e7[184]], a[_0x52e7[187]]], .8, {
                    y: _0x52e7[191],
                    ease: h
                }), r[_0x52e7[193]] && p[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (a[_0x52e7[184]] && p[_0x52e7[150]][_0x52e7[108]]([a[_0x52e7[184]], a[_0x52e7[187]]], .1, {
                    y: _0x52e7[129],
                    ease: d
                }), p[_0x52e7[150]][_0x52e7[107]](p[_0x52e7[214]][_0x52e7[215]](0, p[_0x52e7[214]][_0x52e7[69]](), {
                    ease: c
                })[_0x52e7[72]](2)[_0x52e7[179]]()), r[_0x52e7[194]] && p[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, p, i, r, a[_0x52e7[190]], s, !0)
            }

            function k(t, i, r, s, a, n, o) {
                a = Q(t, r, s, a, !1, !1);
                var l;
                l = fe ? _0x52e7[183] : pe ? _0x52e7[231] : _0x52e7[232];
                var c, u, _, h, d, p = a[_0x52e7[168]];
                if (h = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .04, c = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[197], u = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : Linear[_0x52e7[141]], _ = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], p[_0x52e7[180]] = X(c, p[_0x52e7[180]]), d = a[_0x52e7[163]][_0x52e7[14]](_0x52e7[233]), a[_0x52e7[184]]) {
                    var f, x, m, y;
                    x = a[_0x52e7[185]], m = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[162]]) : .04, c = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[197], f = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]], a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] && z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]), x[_0x52e7[180]] = X(c, x[_0x52e7[180]]), y = a[_0x52e7[184]][_0x52e7[14]](_0x52e7[233])
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var v = U(!0);
                e[_0x52e7[44]](p[_0x52e7[180]], function(t, i) {
                    var r = t * h;
                    v[_0x52e7[214]][_0x52e7[157]](e(i), .8, {
                        opacity: 0,
                        textShadow: _0x52e7[234] + l + _0x52e7[31] + d,
                        scale: 1.2,
                        color: _0x52e7[235],
                        ease: u
                    }, {
                        opacity: 1,
                        scale: 1,
                        color: d,
                        textShadow: _0x52e7[142]
                    }, r)
                }), a[_0x52e7[184]] && (v[_0x52e7[214]][_0x52e7[106]](_0x52e7[236], _0x52e7[237]), e[_0x52e7[44]](x[_0x52e7[180]], function(t, i) {
                    var r = _0x52e7[238] + t * m;
                    v[_0x52e7[214]][_0x52e7[157]](e(i), .8, {
                        opacity: 0,
                        textShadow: _0x52e7[234] + l + _0x52e7[31] + y,
                        scale: 1.2,
                        color: _0x52e7[235],
                        ease: f
                    }, {
                        opacity: 1,
                        scale: 1,
                        color: y,
                        textShadow: _0x52e7[142]
                    }, r)
                })), v[_0x52e7[149]][_0x52e7[107]](v[_0x52e7[214]]), r[_0x52e7[193]] && v[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (o ? v[_0x52e7[150]][_0x52e7[108]](a[_0x52e7[184]] ? [a[_0x52e7[169]], a[_0x52e7[186]]] : [a[_0x52e7[169]]], .75, {
                    autoAlpha: 0
                }) : v[_0x52e7[150]][_0x52e7[107]](v[_0x52e7[214]][_0x52e7[215]](0, v[_0x52e7[214]][_0x52e7[69]](), {
                    ease: _
                })[_0x52e7[72]](2)[_0x52e7[179]]()), r[_0x52e7[194]] && v[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, v, i, r, a[_0x52e7[190]], s, !0)
            }

            function I(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !0), e[_0x52e7[44]](a[_0x52e7[168]][_0x52e7[239]], function(t, i) {
                    Math[_0x52e7[175]](e(i)[_0x52e7[199]]() / 8), Math[_0x52e7[175]](e(i)[_0x52e7[198]]());
                    for (var r = 0; 7 > r; r++) e(this)[_0x52e7[240]](e(i)[_0x52e7[227]]());
                    e(this)[_0x52e7[228]]()[_0x52e7[28]](_0x52e7[242] + (t + 1))[_0x52e7[44]](function(t, i) {
                        n[_0x52e7[63]](e(i), {
                            clip: _0x52e7[241]
                        })
                    })
                }), a[_0x52e7[184]] && n[_0x52e7[63]](a[_0x52e7[186]], {
                    autoAlpha: 0
                }), n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var o = U(!0);
                e[_0x52e7[44]](a[_0x52e7[168]][_0x52e7[239]], function(t, i) {
                    var r = Math[_0x52e7[175]](e(i)[_0x52e7[199]]() / 8),
                        s = Math[_0x52e7[175]](e(i)[_0x52e7[198]]()),
                        a = e(this)[_0x52e7[228]]()[_0x52e7[28]](_0x52e7[242] + (t + 1)),
                        n = new TimelineMax;
                    a[_0x52e7[44]](function(i, a) {
                        var o, l = 0;
                        o = 0 == i % 2 ? _0x52e7[201] + r * i + _0x52e7[204] + r * (i + 1) + _0x52e7[205] : _0x52e7[201] + r * i + _0x52e7[202] + s + _0x52e7[202] + r * (i + 1) + _0x52e7[202] + s + _0x52e7[203], 4 > i ? (n[_0x52e7[106]](_0x52e7[243] + t + _0x52e7[174] + i), l = _0x52e7[243] + t + _0x52e7[174] + i) : l = _0x52e7[243] + t + _0x52e7[174] + (7 - i), n[_0x52e7[157]](e(a), .6, {
                            clip: o
                        }, {
                            clip: _0x52e7[201] + r * i + _0x52e7[202] + s + _0x52e7[202] + r * (i + 1) + _0x52e7[205]
                        }, l)
                    }), o[_0x52e7[214]][_0x52e7[107]](n, 0)
                }), o[_0x52e7[149]][_0x52e7[107]](o[_0x52e7[214]]), a[_0x52e7[184]] && o[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[186]], .75, {
                    autoAlpha: 1
                }), r[_0x52e7[193]] && o[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (o[_0x52e7[150]][_0x52e7[107]](o[_0x52e7[214]][_0x52e7[215]](0, o[_0x52e7[214]][_0x52e7[69]]())[_0x52e7[72]](2)[_0x52e7[179]]()), a[_0x52e7[184]] && o[_0x52e7[150]][_0x52e7[108]]([a[_0x52e7[186]]], .75, {
                    autoAlpha: 0
                }, 0), r[_0x52e7[194]] && o[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, o, i, r, a[_0x52e7[190]], s, !0)
            }

            function M(t, i, r, s, a, n) {
                a = Q(t, r, s, a, !1, !1);
                var o;
                o = fe ? _0x52e7[183] : pe ? _0x52e7[231] : _0x52e7[232];
                var l, c, u, _, h;
                _ = a[_0x52e7[168]], h = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .08, l = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[158], c = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]], u = a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(a[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], _[_0x52e7[180]] = X(l, _[_0x52e7[180]]);
                var d, p, f, x = [];
                if (n[_0x52e7[63]](_[_0x52e7[180]], {
                    overflow: _0x52e7[218]
                }), e[_0x52e7[44]](_[_0x52e7[180]], function(t, i) {
                    d = _0x52e7[244] + (t + 1), p = e(i)[_0x52e7[198]](), f = e(i)[_0x52e7[199]](), e(i)[_0x52e7[132]](_0x52e7[245] + d + _0x52e7[246] + p + _0x52e7[247] + f + _0x52e7[248]), x[_0x52e7[249]](e(i)[_0x52e7[28]](_0x52e7[40] + d))
                }), n[_0x52e7[63]](x, {
                    x: _0x52e7[129]
                }), a[_0x52e7[184]]) {
                    var m, y, v, g;
                    y = a[_0x52e7[185]], v = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[162]]) : .08, l = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[182]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[158], m = a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : _0x52e7[165], a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] && z(a[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]),
                        y[_0x52e7[180]] = X(l, y[_0x52e7[180]]), g = a[_0x52e7[184]][_0x52e7[14]](_0x52e7[233])
                }
                n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var b = U(!0);
                e[_0x52e7[44]](x, function(t, i) {
                    var r = t * h;
                    b[_0x52e7[214]][_0x52e7[108]](e(i), 1.25, {
                        x: _0x52e7[191],
                        ease: c
                    }, r)
                }), a[_0x52e7[184]] && (b[_0x52e7[214]][_0x52e7[106]](_0x52e7[236], _0x52e7[237]), e[_0x52e7[44]](y[_0x52e7[180]], function(t, i) {
                    var r = _0x52e7[238] + t * v;
                    b[_0x52e7[214]][_0x52e7[157]](e(i), .8, {
                        opacity: 0,
                        textShadow: _0x52e7[234] + o + _0x52e7[31] + g,
                        scale: 1.2,
                        rotation: .01,
                        color: _0x52e7[235],
                        ease: m
                    }, {
                        opacity: 1,
                        scale: 1,
                        color: g,
                        textShadow: _0x52e7[142]
                    }, r)
                })), b[_0x52e7[149]][_0x52e7[107]](b[_0x52e7[214]]), r[_0x52e7[193]] && b[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (b[_0x52e7[150]][_0x52e7[107]](b[_0x52e7[214]][_0x52e7[215]](0, b[_0x52e7[214]][_0x52e7[69]](), {
                    ease: u
                })[_0x52e7[72]](2)[_0x52e7[179]]()), r[_0x52e7[194]] && b[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, b, i, r, a[_0x52e7[190]], s, !0)
            }

            function O(t, i, r, s, a, n) {
                if (a = Q(t, r, s, a, !0, !0), 100 > a[_0x52e7[163]][_0x52e7[199]]()) var o = Math[_0x52e7[175]](a[_0x52e7[163]][_0x52e7[199]]() - 1),
                    l = 1;
                else o = 99, l = Math[_0x52e7[175]](a[_0x52e7[163]][_0x52e7[199]]() / 100);
                for (var c = a[_0x52e7[163]][_0x52e7[198]](), u = 0; o > u; u++) a[_0x52e7[169]][_0x52e7[26]](a[_0x52e7[163]][_0x52e7[227]]());
                o = a[_0x52e7[169]][_0x52e7[28]](_0x52e7[134]), o[_0x52e7[44]](function(t, i) {
                    n[_0x52e7[63]](e(i), {
                        position: _0x52e7[250],
                        left: 0,
                        top: 0,
                        x: 0,
                        opacity: 1,
                        clip: _0x52e7[201] + l * t + _0x52e7[202] + c + _0x52e7[202] + l * (t + 1) + _0x52e7[205]
                    })
                }), n[_0x52e7[63]](a[_0x52e7[169]], {
                    autoAlpha: 0
                }), a[_0x52e7[184]] && n[_0x52e7[63]](a[_0x52e7[186]], {
                    autoAlpha: 0
                }), n[_0x52e7[63]](s, {
                    visibility: _0x52e7[144]
                }), n[_0x52e7[106]](a[_0x52e7[190]]);
                var _ = U(!0);
                _[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[169]], .75, {
                    autoAlpha: 1
                }, 0), o[_0x52e7[44]](function(t, i) {
                    _[_0x52e7[214]][_0x52e7[108]](e(this), .1, {
                        x: randomInt(-5, 5),
                        opacity: randomFloat(.8, 1),
                        ease: RoughEase[_0x52e7[148]][_0x52e7[224]]({
                            strength: 5,
                            points: 50,
                            template: SlowMo[_0x52e7[148]],
                            clamp: !1,
                            taper: _0x52e7[150]
                        })
                    }, 0)
                }), _[_0x52e7[149]][_0x52e7[107]](_[_0x52e7[214]], _0x52e7[251]), D(_[_0x52e7[149]], _[_0x52e7[214]], o, 1, !1, _0x52e7[252]), D(_[_0x52e7[149]], _[_0x52e7[214]], o, .5, !1, _0x52e7[253]), D(_[_0x52e7[149]], _[_0x52e7[214]], o, .5, !0, _0x52e7[254]), D(_[_0x52e7[149]], _[_0x52e7[214]], o, .5, !1, _0x52e7[253]), D(_[_0x52e7[149]], _[_0x52e7[214]], o, .5, !1, _0x52e7[255]), _[_0x52e7[149]][_0x52e7[108]](o, .25, {
                    x: 0,
                    opacity: 1,
                    ease: RoughEase[_0x52e7[148]][_0x52e7[224]]({
                        strength: 5,
                        points: 50,
                        template: SlowMo[_0x52e7[148]],
                        clamp: !1,
                        taper: _0x52e7[150]
                    })
                }), _[_0x52e7[149]][_0x52e7[63]](o, {
                    x: 0,
                    opacity: 1
                }), a[_0x52e7[184]] && _[_0x52e7[149]][_0x52e7[108]](a[_0x52e7[186]], .75, {
                    autoAlpha: 1
                }, _0x52e7[256]), r[_0x52e7[193]] && _[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (_[_0x52e7[150]][_0x52e7[108]]([a[_0x52e7[163]]], .75, {
                    autoAlpha: 0
                }, 0), a[_0x52e7[184]] && _[_0x52e7[150]][_0x52e7[108]]([a[_0x52e7[186]]], .75, {
                    autoAlpha: 0
                }, 0), r[_0x52e7[194]] && _[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(t, _, i, r, a[_0x52e7[190]], s, !1)
            }

            function D(e, t, i, r, s, a) {
                e[_0x52e7[108]](i, .25, {
                    x: 0,
                    opacity: 1,
                    ease: RoughEase[_0x52e7[148]][_0x52e7[224]]({
                        strength: 5,
                        points: 50,
                        template: SlowMo[_0x52e7[148]],
                        clamp: !1,
                        taper: _0x52e7[150]
                    })
                }), s && e[_0x52e7[106]](_0x52e7[256], _0x52e7[257]), e[_0x52e7[107]](t[_0x52e7[215]](0, t[_0x52e7[69]]())[_0x52e7[72]](r), a)
            }

            function Q(t, i, r, s, a, n) {
                var o = {};
                o[_0x52e7[190]] = t[_0x52e7[113]](_0x52e7[7]), i = t[_0x52e7[28]](_0x52e7[258]), t = t[_0x52e7[259]]();
                var l;
                t[_0x52e7[209]](_0x52e7[170]) ? (l = _0x52e7[208], o[_0x52e7[171]] = _0x52e7[170]) : t[_0x52e7[209]](_0x52e7[260]) ? (l = _0x52e7[211], o[_0x52e7[171]] = _0x52e7[260]) : (l = _0x52e7[261], o[_0x52e7[171]] = _0x52e7[172]), t = B(r);
                var c = 0;
                return s[_0x52e7[44]](function(t, i) {
                    e(this)[_0x52e7[26]](_0x52e7[262]);
                    var s = e(this)[_0x52e7[28]](_0x52e7[263]),
                        u = Math[_0x52e7[175]](s[_0x52e7[198]]());
                    s[_0x52e7[264]](), o[_0x52e7[265] + t] = e(this);
                    var _ = B(e(this)),
                        h = e(this)[_0x52e7[16]]()[_0x52e7[266]] ? _0x52e7[267] + e(this)[_0x52e7[16]]()[_0x52e7[266]] : l,
                        s = e(this)[_0x52e7[16]]()[_0x52e7[268]] ? e(this)[_0x52e7[16]]()[_0x52e7[268]] : _0x52e7[269];
                    if (e(this)[_0x52e7[272]](_0x52e7[270] + t + _0x52e7[271]), o[_0x52e7[273] + t] = r[_0x52e7[28]](_0x52e7[274] + t), 0 != t && _0x52e7[269] === s && e(this)[_0x52e7[14]](_0x52e7[275], _0x52e7[276]), e(this)[_0x52e7[14]]({
                        display: _0x52e7[277],
                        position: _0x52e7[250],
                        width: Math[_0x52e7[175]](e(this)[_0x52e7[198]]() + u) + _0x52e7[176],
                        height: Math[_0x52e7[175]](e(this)[_0x52e7[199]]()) + _0x52e7[176]
                    })[_0x52e7[61]](_0x52e7[208]), 0 == t && a || 1 == t && n || t > 1) {
                        var d;
                        e(this)[_0x52e7[278]](_0x52e7[208])[_0x52e7[61]](h), o[_0x52e7[273] + t][_0x52e7[14]]({
                            height: Math[_0x52e7[175]](e(this)[_0x52e7[199]]()) + _0x52e7[176]
                        }), d = Math[_0x52e7[175]](e(this)[_0x52e7[198]]()), d > c && (c = d)
                    } else {
                        o[_0x52e7[32] + t] = new SplitText(e(this), {
                            type: _0x52e7[279],
                            wordsClass: _0x52e7[280],
                            charsClass: _0x52e7[281],
                            linesClass: _0x52e7[282],
                            position: _0x52e7[250]
                        }), TweenMax[_0x52e7[63]](o[_0x52e7[32] + t][_0x52e7[180]], {
                            force3D: !0,
                            rotationZ: _0x52e7[283]
                        }), e(this)[_0x52e7[278]](_0x52e7[208])[_0x52e7[61]](h), d = 0;
                        var p, f, x = o[_0x52e7[32] + t][_0x52e7[239]][_0x52e7[54]];
                        e[_0x52e7[44]](o[_0x52e7[32] + t][_0x52e7[239]], function(t, i) {
                            var r = e(i)[_0x52e7[259]]()[_0x52e7[284]]();
                            p = parseInt(r[_0x52e7[14]](_0x52e7[225])) + parseInt(r[_0x52e7[14]](_0x52e7[285])), e(i)[_0x52e7[14]]({
                                width: p + _0x52e7[176],
                                right: _[_0x52e7[286]] + _0x52e7[176]
                            })[_0x52e7[61]](h), p > d && (d = p), t == x - 1 && (f = parseInt(e(this)[_0x52e7[14]](_0x52e7[287])) + parseInt(e(this)[_0x52e7[14]](_0x52e7[288])))
                        }), e(this)[_0x52e7[14]]({
                            width: d + _[_0x52e7[289]] + _0x52e7[176],
                            height: f + _[_0x52e7[290]] / 2 + _0x52e7[176]
                        }), o[_0x52e7[273] + t][_0x52e7[14]]({
                            height: f + _[_0x52e7[290]] / 2 + _0x52e7[176]
                        }), d > c && (c = d + _[_0x52e7[289]])
                    }
                    t > 0 && (e(this)[_0x52e7[240]](_0x52e7[291] + t + _0x52e7[292]), o[_0x52e7[293] + t] = r[_0x52e7[28]](_0x52e7[294] + t), u = _0x52e7[155] == s ? _0x52e7[295] : e(i)[_0x52e7[198]]() + _0x52e7[176], o[_0x52e7[293] + t][_0x52e7[14]]({
                        position: _0x52e7[250],
                        width: u,
                        height: e(i)[_0x52e7[199]]() + _0x52e7[176]
                    }), o[_0x52e7[293] + t][_0x52e7[61]](h))
                }), r[_0x52e7[14]]({
                    width: c + t[_0x52e7[289]] + _0x52e7[176]
                }), i[_0x52e7[14]]({
                    "max-width": c + t[_0x52e7[289]] + _0x52e7[176]
                }), o
            }

            function F(e, t) {
                return t[_0x52e7[198]]() > e ? 3 : Math[_0x52e7[175]](e / t[_0x52e7[198]]()) + 2
            }

            function N(e) {
                var t = {};
                return t[_0x52e7[173]] = e[_0x52e7[226]]()[_0x52e7[225]] - qe[_0x52e7[226]]()[_0x52e7[225]], t[_0x52e7[177]] = qe[_0x52e7[285]]() - (t[_0x52e7[173]] + e[_0x52e7[198]]()), t[_0x52e7[178]] = e[_0x52e7[198]](), t[_0x52e7[296]] = e[_0x52e7[199]](), t
            }

            function B(e) {
                var t = {};
                return t[_0x52e7[297]] = parseInt(e[_0x52e7[14]](_0x52e7[298])), t[_0x52e7[286]] = parseInt(e[_0x52e7[14]](_0x52e7[299])), t[_0x52e7[300]] = parseInt(e[_0x52e7[14]](_0x52e7[301])), t[_0x52e7[302]] = parseInt(e[_0x52e7[14]](_0x52e7[303])), t[_0x52e7[304]] = parseInt(e[_0x52e7[14]](_0x52e7[305])), t[_0x52e7[306]] = parseInt(e[_0x52e7[14]](_0x52e7[307])), t[_0x52e7[308]] = parseInt(e[_0x52e7[14]](_0x52e7[309])), t[_0x52e7[310]] = parseInt(e[_0x52e7[14]](_0x52e7[311])), t[_0x52e7[289]] = t[_0x52e7[302]] + t[_0x52e7[286]] + t[_0x52e7[310]] + t[_0x52e7[306]], t[_0x52e7[290]] = t[_0x52e7[297]] + t[_0x52e7[300]] + t[_0x52e7[304]] + t[_0x52e7[308]], t
            }

            function q(e, t) {
                return t[_0x52e7[285]]() - (e[_0x52e7[226]]()[_0x52e7[225]] + e[_0x52e7[198]]())
            }

            function U(e) {
                var t = {};
                return t[_0x52e7[149]] = new TimelineMax, t[_0x52e7[150]] = new TimelineMax, t[_0x52e7[155]] = new TimelineMax, e && (t[_0x52e7[214]] = new TimelineMax), t
            }

            function X(e, t) {
                return _0x52e7[197] === e ? shuffleArray(t) : _0x52e7[179] === e ? t[_0x52e7[179]]() : _0x52e7[312] === e ? centerArray(t) : _0x52e7[313] === e ? centerArray(t)[_0x52e7[179]]() : t
            }

            function z(e) {
                var t = e[_0x52e7[32]](_0x52e7[40]);
                return 2 === t[_0x52e7[54]] ? window[t[0]][t[1]] : (e = e[_0x52e7[316]](/true|false|(-?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi)[_0x52e7[315]](JSON[_0x52e7[314]]), window[t[0]][t[1]][_0x52e7[224]][_0x52e7[317]](null, e))
            }

            function H(i, r, s, a, n, o, l) {
                var c = _0x52e7[136] == a[_0x52e7[318]] ? 1.5 : parseFloat(a[_0x52e7[318]]),
                    u = a[_0x52e7[319]] ? parseFloat(a[_0x52e7[319]]) : 0;
                r[_0x52e7[155]][_0x52e7[106]](n + _0x52e7[320]), r[_0x52e7[155]][_0x52e7[107]](r[_0x52e7[149]], _0x52e7[321] + u), r[_0x52e7[155]][_0x52e7[106]](n + _0x52e7[322]), r[_0x52e7[155]][_0x52e7[106]](n + _0x52e7[323], _0x52e7[321] + c), _0x52e7[142] != a[_0x52e7[194]] ? (r[_0x52e7[155]][_0x52e7[107]](r[_0x52e7[150]], n + _0x52e7[323]), r[_0x52e7[155]][_0x52e7[63]](o, {
                    visibility: _0x52e7[218]
                })) : r[_0x52e7[155]][_0x52e7[63]]({}, {
                    immediateRender: !1
                }, n + _0x52e7[323]), t[_0x52e7[209]](_0x52e7[324]) && (o = s % se[_0x52e7[325]][_0x52e7[54]], r[_0x52e7[155]][_0x52e7[108]](We, r[_0x52e7[155]][_0x52e7[69]](), {
                    backgroundColor: se[_0x52e7[325]][o]
                }, 0)), l && r[_0x52e7[155]][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: function() {
                        r[_0x52e7[214]][_0x52e7[97]]()
                    }
                }), a[_0x52e7[326]] && r[_0x52e7[155]][_0x52e7[69]](parseFloat(a[_0x52e7[326]]));
                var _ = {};
                if (l = r[_0x52e7[155]][_0x52e7[72]](), _[_0x52e7[149]] = r[_0x52e7[149]][_0x52e7[69]]() / r[_0x52e7[149]][_0x52e7[72]]() / l, _[_0x52e7[150]] = r[_0x52e7[150]][_0x52e7[69]]() / r[_0x52e7[150]][_0x52e7[72]]() / l, _[_0x52e7[155]] = r[_0x52e7[155]][_0x52e7[69]]() / l, _[_0x52e7[327]] = c / l, se[_0x52e7[328]] && (c = _0x52e7[329] + _[_0x52e7[149]][_0x52e7[70]](1) + _0x52e7[330] + _[_0x52e7[150]][_0x52e7[70]](1) + _0x52e7[331] + _[_0x52e7[327]][_0x52e7[70]](1) + _0x52e7[332] + _[_0x52e7[155]][_0x52e7[70]](1) + _0x52e7[333], r[_0x52e7[155]][_0x52e7[63]](nt, {
                    text: c
                }, .1), r[_0x52e7[155]][_0x52e7[63]](at, {
                    text: a[_0x52e7[334]]
                }, .1)), c = i[_0x52e7[28]](_0x52e7[127]), 0 < c[_0x52e7[54]]) {
                    l = c[_0x52e7[16]]()[_0x52e7[335]] ? c[_0x52e7[16]]()[_0x52e7[335]] : _0x52e7[336], o = c[_0x52e7[16]]()[_0x52e7[337]] ? c[_0x52e7[16]]()[_0x52e7[337]] : _0x52e7[191];
                    var u = c[_0x52e7[16]]()[_0x52e7[338]] ? parseFloat(c[_0x52e7[16]]()[_0x52e7[338]]) : r[_0x52e7[149]][_0x52e7[69]](),
                        h = c[_0x52e7[16]]()[_0x52e7[148]] ? z(c[_0x52e7[16]]()[_0x52e7[148]]) : Power4[_0x52e7[207]];
                    _0x52e7[336] === l ? _e[de][_0x52e7[108]](c, u, {
                        x: o,
                        ease: h,
                        force3D: !0,
                        rotationZ: _0x52e7[283]
                    }, n) : _e[de][_0x52e7[63]](c, {
                        x: _0x52e7[191]
                    }, n)
                }
                _e[de][_0x52e7[107]](r[_0x52e7[155]], n), he[n] && (_e[de][_0x52e7[107]](he[n + _0x52e7[154]], n), _0x52e7[155] == he[n][_0x52e7[16]][_0x52e7[69]] ? _e[de][_0x52e7[107]](he[n][_0x52e7[69]](_[_0x52e7[155]]), n) : _0x52e7[149] == he[n][_0x52e7[16]][_0x52e7[69]] ? _e[de][_0x52e7[107]](he[n][_0x52e7[69]](_[_0x52e7[149]]), n) : _e[de][_0x52e7[107]](he[n][_0x52e7[69]](he[n][_0x52e7[16]][_0x52e7[69]]), n)), _e[de][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: function() {
                        e[_0x52e7[58]](se[_0x52e7[339]]) && se[_0x52e7[339]][_0x52e7[59]](t, s, i, _, Z)
                    }
                }, n + _0x52e7[126]), r[_0x52e7[155]][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: function() {
                        e[_0x52e7[58]](se[_0x52e7[340]]) && se[_0x52e7[340]][_0x52e7[59]](t, s, i, _, Z)
                    }
                }, n + _0x52e7[320]), r[_0x52e7[155]][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: function() {
                        e[_0x52e7[58]](se[_0x52e7[341]]) && se[_0x52e7[341]][_0x52e7[59]](t, s, i, _, Z)
                    }
                }, n + _0x52e7[322]), _0x52e7[142] != a[_0x52e7[194]] && r[_0x52e7[155]][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: function() {
                        e[_0x52e7[58]](se[_0x52e7[342]]) && se[_0x52e7[342]][_0x52e7[59]](t, s, i, _, Z)
                    }
                }, n + _0x52e7[323]), _e[de][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: function() {
                        e[_0x52e7[58]](se[_0x52e7[343]]) && se[_0x52e7[343]][_0x52e7[59]](t, s, i, _, Z)
                    }
                }, n + _0x52e7[344])
            }
            var V, W, G, J, $, Z, K, ee, te, ie, re = this,
                se = e[_0x52e7[351]]({}, {
                    autoStart: !0,
                    fullDuration: _0x52e7[136],
                    preloadMethod: _0x52e7[345],
                    preloadFiles: [],
                    fileTimeout: 8e3,
                    audioTimeout: 8e3,
                    colors: [_0x52e7[346], _0x52e7[347], _0x52e7[348], _0x52e7[349], _0x52e7[350]],
                    showAnimationSummary: !1,
                    freezeOnBlur: !0,
                    videoPlaybackChange: !0,
                    onTeaserReady: function() {},
                    onTeaserStart: function() {},
                    onTeaserEnd: function() {},
                    onBeforeScene: function() {},
                    onBeforeIn: function() {},
                    onBeforeFreeze: function() {},
                    onBeforeOut: function() {},
                    onAfterScene: function() {}
                }, i),
                ae = _0x52e7[96],
                ne = !0,
                oe = !1,
                le = [],
                ce = [],
                ue = [],
                _e = {},
                he = {},
                de = t[_0x52e7[113]](_0x52e7[7]),
                pe = isMobile[_0x52e7[352]],
                fe = -1 < navigator[_0x52e7[355]][_0x52e7[354]]()[_0x52e7[78]](_0x52e7[353]),
                xe = e(window)[_0x52e7[285]](),
                me = 0,
                ye = t[_0x52e7[113]](_0x52e7[356]) ? parseBool(t[_0x52e7[113]](_0x52e7[356])) : !1,
                ve = t[_0x52e7[113]](_0x52e7[357]) ? parseBool(t[_0x52e7[113]](_0x52e7[357])) : !1,
                ge = t[_0x52e7[113]](_0x52e7[358]) ? parseBool(t[_0x52e7[113]](_0x52e7[358])) : !0,
                be = t[_0x52e7[113]](_0x52e7[359]) ? parseBool(t[_0x52e7[113]](_0x52e7[359])) : !1,
                Te = t[_0x52e7[113]](_0x52e7[360]) ? parseBool(t[_0x52e7[113]](_0x52e7[360])) : !1,
                Pe = t[_0x52e7[113]](_0x52e7[361]) ? parseBool(t[_0x52e7[113]](_0x52e7[361])) : !1,
                we = t[_0x52e7[16]]()[_0x52e7[362]] ? t[_0x52e7[16]]()[_0x52e7[362]] : _0x52e7[30],
                je = t[_0x52e7[16]]()[_0x52e7[363]] ? t[_0x52e7[16]]()[_0x52e7[363]] : _0x52e7[30],
                Se = t[_0x52e7[16]]()[_0x52e7[364]] ? t[_0x52e7[16]]()[_0x52e7[364]] : _0x52e7[149],
                Ae = t[_0x52e7[16]]()[_0x52e7[365]] ? parseFloat(t[_0x52e7[16]]()[_0x52e7[365]]) : _0x52e7[366],
                Ee = t[_0x52e7[16]]()[_0x52e7[367]] ? parseFloat(t[_0x52e7[16]]()[_0x52e7[367]]) : !1,
                Le = t[_0x52e7[113]](_0x52e7[368]) ? parseBool(t[_0x52e7[113]](_0x52e7[368])) : !1,
                Re = !1,
                Ye = !1,
                Ce = !1,
                ke = !1,
                Ie = !1,
                Me = t[_0x52e7[16]]()[_0x52e7[161]] ? t[_0x52e7[16]]()[_0x52e7[161]] : _0x52e7[74],
                Oe = t[_0x52e7[113]](_0x52e7[369]) ? parseBool(t[_0x52e7[113]](_0x52e7[369])) : !0,
                De = t[_0x52e7[16]]()[_0x52e7[370]] ? t[_0x52e7[16]]()[_0x52e7[370]] : _0x52e7[371],
                Qe = t[_0x52e7[16]]()[_0x52e7[372]] ? parseInt(t[_0x52e7[16]]()[_0x52e7[372]]) : .01,
                Fe = t[_0x52e7[16]]()[_0x52e7[373]] ? parseInt(t[_0x52e7[16]]()[_0x52e7[373]]) : 0,
                Ne = t[_0x52e7[113]](_0x52e7[374]) ? parseBool(t[_0x52e7[113]](_0x52e7[374])) : !0,
                Be = t[_0x52e7[113]](_0x52e7[375]) ? parseBool(t[_0x52e7[113]](_0x52e7[375])) : !1;
            G = t[_0x52e7[16]]()[_0x52e7[376]] && !pe ? _0x52e7[52] : Te || Pe ? _0x52e7[18] : _0x52e7[377], ee = ve ? -1 : 0, pe && t[_0x52e7[16]]()[_0x52e7[378]] && (ye = t[_0x52e7[16]]()[_0x52e7[378]]), pe && Pe && (Te = Pe), t[_0x52e7[272]](_0x52e7[379]);
            var qe = t[_0x52e7[228]]();
            qe[_0x52e7[26]](_0x52e7[380]);
            var Ue = qe[_0x52e7[28]](_0x52e7[381]);
            if (_0x52e7[18] === G) {
                qe[_0x52e7[26]](_0x52e7[382]);
                var Xe = qe[_0x52e7[28]](_0x52e7[383]),
                    ze = qe[_0x52e7[28]](_0x52e7[384]);
                le[_0x52e7[249]]({
                    id: _0x52e7[19],
                    src: Te,
                    loadTimeout: se[_0x52e7[385]]
                })
            } else _0x52e7[52] === G && Te && le[_0x52e7[249]]({
                id: _0x52e7[33],
                src: Te,
                loadTimeout: se[_0x52e7[385]]
            }), qe[_0x52e7[26]](_0x52e7[386]), ze = qe[_0x52e7[28]](_0x52e7[384]);
            qe[_0x52e7[26]](_0x52e7[387]);
            var He = qe[_0x52e7[28]](_0x52e7[388]),
                Ve = qe[_0x52e7[28]](_0x52e7[389]),
                We = qe[_0x52e7[28]](_0x52e7[390]),
                Ge = qe[_0x52e7[28]](_0x52e7[391]),
                Je = Ge[_0x52e7[28]](_0x52e7[392]);
            se[_0x52e7[64]] && (Le = !1, Ge[_0x52e7[94]]()), t[_0x52e7[209]](_0x52e7[324]) && We[_0x52e7[14]]({
                "background-color": se[_0x52e7[325]][0]
            }), Le && le[_0x52e7[249]]({
                id: _0x52e7[6],
                src: Le,
                loadTimeout: se[_0x52e7[385]]
            }), 0 < se[_0x52e7[393]][_0x52e7[54]] && e[_0x52e7[44]](se[_0x52e7[393]], function(e, t) {
                le[_0x52e7[249]]({
                    src: t,
                    loadTimeout: se[_0x52e7[385]]
                })
            });
            var $e = t[_0x52e7[28]](_0x52e7[394]);
            if ($e[_0x52e7[44]](function(t, i) {
                var r;
                if ((e(this)[_0x52e7[16]]()[_0x52e7[35]] || e(this)[_0x52e7[16]]()[_0x52e7[36]]) && (e(this)[_0x52e7[16]]()[_0x52e7[35]] && (r = e(this)[_0x52e7[16]]()[_0x52e7[35]]), pe && e(this)[_0x52e7[16]]()[_0x52e7[36]] && (r = e(this)[_0x52e7[16]]()[_0x52e7[36]]), r && le[_0x52e7[249]]({
                    id: e(this)[0][_0x52e7[7]],
                    src: r,
                    loadTimeout: se[_0x52e7[385]]
                })), !pe)
                    if (_0x52e7[74] == e(this)[_0x52e7[16]]()[_0x52e7[161]]) {
                        r = e(this)[_0x52e7[113]](_0x52e7[369]) ? parseBool(e(this)[_0x52e7[113]](_0x52e7[369])) : !0;
                        var s = e(this)[_0x52e7[16]]()[_0x52e7[372]] ? parseInt(e(this)[_0x52e7[16]]()[_0x52e7[372]]) : 0,
                            a = e(this)[_0x52e7[16]]()[_0x52e7[373]] ? parseInt(e(this)[_0x52e7[16]]()[_0x52e7[373]]) : 0,
                            n = e(this)[_0x52e7[113]](_0x52e7[374]) ? parseBool(e(this)[_0x52e7[113]](_0x52e7[374])) : !0;
                        r = {
                            videoURL: e(this)[_0x52e7[16]]()[_0x52e7[34]],
                            mute: r,
                            startAt: s,
                            stopAt: a,
                            loop: n,
                            sceneIndex: t
                        }, ce[_0x52e7[249]](r)
                    } else if (_0x52e7[53] == e(this)[_0x52e7[16]]()[_0x52e7[161]]) {
                        r = e(this)[_0x52e7[113]](_0x52e7[369]) ? parseBool(e(this)[_0x52e7[113]](_0x52e7[369])) : !0;
                        var o = e(this)[_0x52e7[16]]()[_0x52e7[370]] ? e(this)[_0x52e7[16]]()[_0x52e7[370]] : _0x52e7[371],
                            s = e(this)[_0x52e7[16]]()[_0x52e7[372]] ? parseInt(e(this)[_0x52e7[16]]()[_0x52e7[372]]) : .01,
                            a = e(this)[_0x52e7[16]]()[_0x52e7[373]] ? parseInt(e(this)[_0x52e7[16]]()[_0x52e7[373]]) : 0,
                            n = e(this)[_0x52e7[113]](_0x52e7[374]) ? parseBool(e(this)[_0x52e7[113]](_0x52e7[374])) : !1;
                        r = {
                            autoPlay: !1,
                            showYTLogo: !1,
                            stopMovieOnBlur: !1,
                            showControls: !1,
                            opacity: 1,
                            videoURL: e(this)[_0x52e7[16]]()[_0x52e7[34]],
                            containment: _0x52e7[40] + Ve[0][_0x52e7[395]][_0x52e7[32]](_0x52e7[31])[0],
                            quality: o,
                            mute: r,
                            startAt: s,
                            stopAt: a,
                            loop: n,
                            sceneIndex: t
                        }, ue[_0x52e7[249]](r)
                    }
            }), !pe && (0 < ce[_0x52e7[54]] || 0 < ue[_0x52e7[54]] || _0x52e7[52] === G)) {
                if (_0x52e7[52] != G && ye ? Oe = !0 : Oe || (ye = !1), _0x52e7[52] === G && _0x52e7[74] === Me || 0 < ce[_0x52e7[54]]) {
                    var Ze, Ke, et;
                    _0x52e7[52] === G && _0x52e7[74] === Me ? (TweenMax[_0x52e7[63]](He, {
                        autoAlpha: 1
                    }), Ze = r(Ne, t[_0x52e7[16]]()[_0x52e7[376]], Oe), Ke = Ze[_0x52e7[396]](), Ke[_0x52e7[81]](_0x52e7[82]), Ke[_0x52e7[86]](Qe), Ke[_0x52e7[50]](_0x52e7[88], function() {
                        TweenMax[_0x52e7[63]](et, {
                            autoAlpha: 1
                        }), TweenMax[_0x52e7[108]](He, .5, {
                            autoAlpha: 0
                        }), Ke[_0x52e7[50]](_0x52e7[80], function() {
                            (0 != Fe && Ke[_0x52e7[86]]() >= Fe || 0 == Fe && Ke[_0x52e7[86]]() >= Ke[_0x52e7[69]]()) && (Ne ? (Ke[_0x52e7[47]](!0), Ke[_0x52e7[86]](Qe), Ke[_0x52e7[45]]()) : (Ye = !0, Ke[_0x52e7[73]]()))
                        })
                    })) : (Ze = r(ce[0][_0x52e7[47]], ce[0][_0x52e7[77]], ce[0][_0x52e7[83]]), Ke = Ze[_0x52e7[396]](), Ke[_0x52e7[81]](_0x52e7[82]), Ke[_0x52e7[86]](ce[0][_0x52e7[85]]), Ke[_0x52e7[89]](_0x52e7[88], function() {
                        Re = !0
                    })), et = Ve[_0x52e7[28]](_0x52e7[397]), et[_0x52e7[26]](_0x52e7[398])
                }
                if (_0x52e7[52] === G && _0x52e7[53] === Me || 0 < ue[_0x52e7[54]]) {
                    _0x52e7[52] === G && _0x52e7[53] === Me ? (TweenMax[_0x52e7[63]](He, {
                        autoAlpha: 1
                    }), Ve[_0x52e7[26]](_0x52e7[399] + Ne + _0x52e7[400] + De + _0x52e7[401] + t[_0x52e7[16]]()[_0x52e7[376]] + _0x52e7[402] + Ve[0][_0x52e7[395]][_0x52e7[32]](_0x52e7[31])[0] + _0x52e7[403] + Oe + _0x52e7[404] + Qe + _0x52e7[405] + Fe + _0x52e7[406])) : Ve[_0x52e7[26]](_0x52e7[407] + JSON[_0x52e7[408]](ue[0]) + _0x52e7[409]);
                    var tt, it = Ve[_0x52e7[28]](_0x52e7[410]),
                        rt = it.YTPlayer();
                    rt[_0x52e7[50]](_0x52e7[55], function() {
                        tt = Ve[_0x52e7[28]](_0x52e7[56]), Ie = !0
                    }), rt[_0x52e7[50]](_0x52e7[411], function() {
                        _0x52e7[52] === G ? Ye = !0 : ke = !1
                    })
                }
            }
            if (se[_0x52e7[328]]) {
                qe[_0x52e7[26]](_0x52e7[412]);
                var st = qe[_0x52e7[28]](_0x52e7[413]),
                    at = qe[_0x52e7[28]](_0x52e7[414]),
                    nt = qe[_0x52e7[28]](_0x52e7[415]),
                    ot = qe[_0x52e7[28]](_0x52e7[416])
            }
            var lt, ct = ye,
                ut = _0x52e7[417] + de;
            re[_0x52e7[2]] = function() {
                return re[_0x52e7[418]](t, _0x52e7[418], se[_0x52e7[64]]), se[_0x52e7[328]] && st[_0x52e7[50]](_0x52e7[419], function(e) {
                    st[_0x52e7[421]](_0x52e7[420])
                }), re
            }, re[_0x52e7[418]] = function(t, i, r) {
                J = t[_0x52e7[227]](!0), me += 1, _e[de] = new TimelineMax({
                    paused: !0,
                    delay: .2,
                    repeat: 0,
                    onStart: y
                }), _0x52e7[18] === G && b(_e[de]), t = t[_0x52e7[28]](_0x52e7[394]);
                var s = t[_0x52e7[54]];
                t[_0x52e7[44]](function(t, i) {
                    var r = e(this)[_0x52e7[16]](),
                        a = r[_0x52e7[334]];
                    (!r[_0x52e7[34]] && r[_0x52e7[35]] || pe && r[_0x52e7[35]]) && (r[_0x52e7[109]] = r[_0x52e7[109]] ? r[_0x52e7[109]] : _0x52e7[422]), r[_0x52e7[423]] || (r[_0x52e7[423]] = _0x52e7[424]), r[_0x52e7[125]] || (r[_0x52e7[125]] = _0x52e7[336]), pe && r[_0x52e7[425]] && (r[_0x52e7[423]] = r[_0x52e7[425]]), r[_0x52e7[109]] || (r[_0x52e7[109]] = _0x52e7[142]), pe && r[_0x52e7[426]] && (r[_0x52e7[109]] = r[_0x52e7[426]]), r[_0x52e7[318]] || (r[_0x52e7[318]] = _0x52e7[136]), r[_0x52e7[110]] || (r[_0x52e7[110]] = _0x52e7[136]), a || (a = _0x52e7[142]);
                    var n;
                    if (n = _0x52e7[427][_0x52e7[32]](_0x52e7[31]), n = -1 != _0x52e7[428][_0x52e7[32]](_0x52e7[31])[_0x52e7[78]](r[_0x52e7[423]]) ? a + _0x52e7[429] : -1 != n[_0x52e7[78]](r[_0x52e7[423]]) ? a + _0x52e7[430] : a + _0x52e7[431], _0x52e7[142] !== a) {
                        e(this)[_0x52e7[28]](_0x52e7[435])[_0x52e7[272]](_0x52e7[432] + n + _0x52e7[433] + r[_0x52e7[423]] + _0x52e7[434]);
                        var o = e(this)[_0x52e7[28]](_0x52e7[435]),
                            l = o[_0x52e7[28]](_0x52e7[134])
                    }
                    if (t == s - 1 && (r[_0x52e7[194]] = _0x52e7[142], $ = e(this)[_0x52e7[113]](_0x52e7[7])), w(e(this), t, r, _e[de]), _0x52e7[436] === a || _0x52e7[437] === a) S(e(this), t, r, o, l, _e[de], !0);
                    else if (_0x52e7[438] === a) S(e(this), t, r, o, l, _e[de], !1);
                    else if (_0x52e7[439] === a) {
                        var c = e(this),
                            u = o,
                            _ = _e[de],
                            h = Q(c, r, u, l, !0, !0),
                            l = h[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? h[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : _0x52e7[165],
                            o = h[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(h[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                        if (_[_0x52e7[63]](h[_0x52e7[169]], {
                            opacity: 0
                        }), h[_0x52e7[184]]) {
                            var d = h[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? h[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]],
                                p = h[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(h[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                            _[_0x52e7[63]](h[_0x52e7[186]], {
                                overflow: _0x52e7[218]
                            }), _[_0x52e7[63]]([h[_0x52e7[184]], h[_0x52e7[187]]], {
                                y: _0x52e7[219]
                            })
                        }
                        _[_0x52e7[63]](u, {
                            visibility: _0x52e7[144]
                        }), _[_0x52e7[106]](h[_0x52e7[190]]), _ = U(!0), _[_0x52e7[214]][_0x52e7[108]](h[_0x52e7[169]], 2.5, {
                            delay: .8,
                            opacity: 1,
                            ease: l
                        }), _[_0x52e7[149]][_0x52e7[107]](_[_0x52e7[214]]), h[_0x52e7[184]] && _[_0x52e7[149]][_0x52e7[108]]([h[_0x52e7[184]], h[_0x52e7[187]]], .8, {
                            y: _0x52e7[191],
                            ease: d
                        }), r[_0x52e7[193]] && _[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (h[_0x52e7[184]] && _[_0x52e7[150]][_0x52e7[108]]([h[_0x52e7[184]], h[_0x52e7[187]]], .1, {
                            y: _0x52e7[129],
                            ease: p
                        }), _[_0x52e7[150]][_0x52e7[107]](_[_0x52e7[214]][_0x52e7[215]](0, _[_0x52e7[214]][_0x52e7[69]](), {
                            ease: o
                        })[_0x52e7[72]](2)[_0x52e7[179]]()), r[_0x52e7[194]] && _[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(c, _, t, r, h[_0x52e7[190]], u, !0)
                    } else if (_0x52e7[440] === a) R(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[441] === a) I(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[442] === a) A(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[443] === a) E(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[444] === a) L(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[445] === a) Y(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[446] === a) {
                        var f, c = e(this),
                            u = o,
                            d = _e[de],
                            l = Q(c, r, u, l, !1, !1),
                            a = l[_0x52e7[168]];
                        n = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]] ? parseFloat(l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[162]]) : .05, f = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : _0x52e7[158], p = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] : Back[_0x52e7[207]], o = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], a[_0x52e7[180]] = X(f, a[_0x52e7[180]]), f = Math[_0x52e7[175]](parseInt(l[_0x52e7[163]][_0x52e7[14]](_0x52e7[447]))), l[_0x52e7[184]] && (_ = l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Bounce[_0x52e7[207]], h = l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165], d[_0x52e7[63]](l[_0x52e7[186]], {
                            overflow: _0x52e7[218]
                        }), d[_0x52e7[63]]([l[_0x52e7[184]], l[_0x52e7[187]]], {
                            y: _0x52e7[219]
                        })), d[_0x52e7[63]](u, {
                            visibility: _0x52e7[144]
                        }), d[_0x52e7[106]](l[_0x52e7[190]]), d = U(!0), d[_0x52e7[214]][_0x52e7[449]](a[_0x52e7[180]], .8, {
                            opacity: 0,
                            scale: 0,
                            y: f,
                            rotationX: 180,
                            transformOrigin: _0x52e7[448],
                            ease: p
                        }, n), d[_0x52e7[149]][_0x52e7[107]](d[_0x52e7[214]]), l[_0x52e7[184]] && d[_0x52e7[149]][_0x52e7[108]]([l[_0x52e7[184]], l[_0x52e7[187]]], .8, {
                            y: _0x52e7[191],
                            ease: _
                        }), r[_0x52e7[193]] && d[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (l[_0x52e7[184]] && d[_0x52e7[150]][_0x52e7[108]]([l[_0x52e7[184]], l[_0x52e7[187]]], .1, {
                            y: _0x52e7[129],
                            ease: h
                        }), d[_0x52e7[150]][_0x52e7[107]](d[_0x52e7[214]][_0x52e7[215]](0, d[_0x52e7[214]][_0x52e7[69]](), {
                            ease: o
                        })[_0x52e7[72]](2)[_0x52e7[179]]()), r[_0x52e7[194]] && d[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(c, d, t, r, l[_0x52e7[190]], u, !0)
                    } else if (_0x52e7[450] === a) C(e(this), t, r, o, l, _e[de]);
                    else if (_0x52e7[451] === a) k(e(this), t, r, o, l, _e[de], !1);
                    else if (_0x52e7[452] === a) k(e(this), t, r, o, l, _e[de], !0);
                    else if (_0x52e7[453] === a) {
                        var x, _ = e(this),
                            h = o,
                            p = _e[de],
                            l = Q(_, r, h, l, !1, !1);
                        if (n = l[_0x52e7[168]], o = n[_0x52e7[180]][_0x52e7[454]](0), d = n[_0x52e7[180]][_0x52e7[454]](0), l[_0x52e7[163]][_0x52e7[209]](_0x52e7[208]) ? (a = _0x52e7[174] + Math[_0x52e7[175]](l[_0x52e7[169]][_0x52e7[226]]()[_0x52e7[225]] + l[_0x52e7[169]][_0x52e7[198]]()) + _0x52e7[176], f = _0x52e7[158], x = _0x52e7[179]) : (a = Math[_0x52e7[175]](q(l[_0x52e7[169]], _) + l[_0x52e7[169]][_0x52e7[198]]()) + _0x52e7[176], f = _0x52e7[179], x = _0x52e7[158]), p[_0x52e7[63]](n[_0x52e7[180]], {
                            x: a,
                            opacity: 0
                        }), f = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] ? l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[182]] : f, x = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[455]] ? l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[455]] : x, n = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]] ? z(l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[164]]) : Back[_0x52e7[207]], a = l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]] ? z(l[_0x52e7[163]][_0x52e7[16]]()[_0x52e7[166]]) : Back[_0x52e7[167]][_0x52e7[224]](4), o = X(f, o), d = X(x, d), l[_0x52e7[184]]) {
                            var m, c = l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] ? l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[164]] : Back[_0x52e7[207]],
                                u = l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]] ? z(l[_0x52e7[184]][_0x52e7[16]]()[_0x52e7[166]]) : _0x52e7[165];
                            l[_0x52e7[184]][_0x52e7[209]](_0x52e7[208]) ? (m = l[_0x52e7[184]][_0x52e7[226]]()[_0x52e7[225]], f = _0x52e7[188], x = _0x52e7[174] + Math[_0x52e7[175]](m + l[_0x52e7[184]][_0x52e7[198]]()) + _0x52e7[176]) : l[_0x52e7[184]][_0x52e7[209]](_0x52e7[211]) ? (m = q(l[_0x52e7[184]], _), f = _0x52e7[189], x = Math[_0x52e7[175]](m + l[_0x52e7[184]][_0x52e7[198]]()) + _0x52e7[176]) : (m = q(l[_0x52e7[187]], _), f = _0x52e7[189], x = Math[_0x52e7[175]](m + l[_0x52e7[187]][_0x52e7[198]]()) + _0x52e7[176]), m = F(m, l[_0x52e7[184]]), p[_0x52e7[63]](l[_0x52e7[187]], {
                                x: x,
                                transformOrigin: f,
                                scaleX: m
                            }), p[_0x52e7[63]](l[_0x52e7[184]], {
                                opacity: 0
                            })
                        }
                        p[_0x52e7[63]](h, {
                            visibility: _0x52e7[144]
                        }), p[_0x52e7[106]](l[_0x52e7[190]]), p = U(!0), p[_0x52e7[149]][_0x52e7[192]](o, 1.3, {
                            x: 0,
                            opacity: 1,
                            ease: n
                        }, .15), o = p[_0x52e7[149]][_0x52e7[69]](), l[_0x52e7[184]] && (p[_0x52e7[214]][_0x52e7[108]](l[_0x52e7[187]], .5 * o, {
                            scaleX: 1,
                            x: 0,
                            rotation: .01,
                            ease: c
                        }), p[_0x52e7[214]][_0x52e7[108]](l[_0x52e7[184]], .5, {
                            opacity: 1
                        }), p[_0x52e7[149]][_0x52e7[107]](p[_0x52e7[214]], .18 * o)), r[_0x52e7[193]] && p[_0x52e7[149]][_0x52e7[69]](parseFloat(r[_0x52e7[193]])), _0x52e7[142] != r[_0x52e7[194]] && (p[_0x52e7[150]][_0x52e7[192]](d, 1, {
                            y: _0x52e7[295],
                            opacity: 0,
                            ease: a
                        }, .08), l[_0x52e7[184]] && p[_0x52e7[150]][_0x52e7[107]](p[_0x52e7[214]][_0x52e7[215]](0, p[_0x52e7[214]][_0x52e7[69]](), {
                            ease: u
                        })[_0x52e7[72]](2)[_0x52e7[179]](), .5), r[_0x52e7[194]] && p[_0x52e7[150]][_0x52e7[69]](parseFloat(r[_0x52e7[194]]))), H(_, p, t, r, l[_0x52e7[190]], h, !0)
                    } else _0x52e7[456] === a ? M(e(this), t, r, o, l, _e[de]) : _0x52e7[457] === a ? O(e(this), t, r, o, l, _e[de]) : _0x52e7[142] !== a && console[_0x52e7[15]](_0x52e7[458] + i[_0x52e7[7]] + _0x52e7[459])
                });
                var a = t = _e[de][_0x52e7[104]]();
                if (_0x52e7[136] != se[_0x52e7[460]] && 0 < se[_0x52e7[460]] && (a = se[_0x52e7[460]], _e[de][_0x52e7[104]](a)), se[_0x52e7[328]]) {
                    var n = _0x52e7[461] + a[_0x52e7[70]](1) + _0x52e7[333];
                    ot[_0x52e7[462]](n)
                }
                if (Z = _e[de][_0x52e7[72]](), _0x52e7[18] === G && Ee) {
                    var n = new TimelineMax({
                            delay: 0
                        }),
                        o = Ee;
                    t = _0x52e7[366] === Ae || isNaN(Ae) ? ((t - te) / t * a)[_0x52e7[70]](1) : Ae, _0x52e7[149] === Se ? n[_0x52e7[157]](Xe, t, {
                        scale: 1
                    }, {
                        scale: o,
                        rotation: .01,
                        transformOrigin: je
                    }) : _0x52e7[150] === Se ? n[_0x52e7[157]](Xe, t, {
                        scale: o
                    }, {
                        scale: 1,
                        rotation: .01,
                        transformOrigin: je
                    }) : (n[_0x52e7[157]](Xe, t / 2, {
                        scale: 1
                    }, {
                        scale: o,
                        rotation: .01,
                        transformOrigin: je
                    }), n[_0x52e7[108]](Xe, t / 2, {
                        scale: 1,
                        rotation: .01,
                        transformOrigin: je
                    })), ie[_0x52e7[107]](n, _0x52e7[105])
                }
                _e[de][_0x52e7[63]]({}, {
                    immediateRender: !1,
                    onComplete: v
                }), r ? (ae = _0x52e7[96], re[_0x52e7[45]](i)) : (ae = _0x52e7[51], re[_0x52e7[463]](i))
            }, re[_0x52e7[45]] = function(e) {
                _0x52e7[418] === e ? _e[de][_0x52e7[45]]() : _e[de][_0x52e7[45]](e), t[_0x52e7[66]](_0x52e7[464])
            }, re[_0x52e7[463]] = function(e) {
                _e[de][_0x52e7[463]](e), t[_0x52e7[66]](_0x52e7[465])
            }, re[_0x52e7[466]] = function() {
                _e[de][_0x52e7[466]]()
            }, re[_0x52e7[73]] = function() {
                _e[de][_0x52e7[73]](), t[_0x52e7[66]](_0x52e7[465])
            }, re[_0x52e7[102]] = function() {
                _e[de][_0x52e7[51]]() && _0x52e7[96] == ae ? (_e[de][_0x52e7[97]](), t[_0x52e7[66]](_0x52e7[464]), _0x52e7[52] !== G || Ye || d(), f(), _0x52e7[68] == typeof lt || _0x52e7[51] === K || oe || u()) : 1 <= _e[de][_0x52e7[467]]() && ne && (ne = !1, _0x52e7[52] !== G || Ye || d(), f(), _0x52e7[51] === K || oe || _0x52e7[68] === typeof lt || (lt[_0x52e7[51]] = !1, t[_0x52e7[66]](_0x52e7[65])))
            }, re[_0x52e7[103]] = function() {
                _e[de][_0x52e7[51]]() || _0x52e7[96] != ae || 1 <= _e[de][_0x52e7[467]]() ? 1 <= _e[de][_0x52e7[467]]() && (ne = !0, _0x52e7[52] !== G || Ye || h(), p(), _0x52e7[68] === typeof lt || oe || (lt[_0x52e7[51]] = !0, t[_0x52e7[66]](_0x52e7[67]))) : (_e[de][_0x52e7[73]](), _0x52e7[52] !== G || Ye || h(), p(), t[_0x52e7[66]](_0x52e7[465]), _0x52e7[68] === typeof lt || oe || (lt[_0x52e7[51]] = !0, t[_0x52e7[66]](_0x52e7[67])))
            }, e[_0x52e7[469]][_0x52e7[1]][_0x52e7[468]] = function() {
                return _e[de][_0x52e7[470]]() != $ ? (_e[de][_0x52e7[463]]($, !1)[_0x52e7[45]](), _0x52e7[68] !== typeof lt && (_0x52e7[51] == K || oe || u()), !0) : !1
            }, e[_0x52e7[469]][_0x52e7[1]][_0x52e7[471]] = function() {
                _e[de][_0x52e7[51]]() ? (_e[de][_0x52e7[97]](), t[_0x52e7[66]](_0x52e7[464]), _0x52e7[52] !== G || Ye || d(), f(), _0x52e7[68] != typeof lt && _0x52e7[51] !== K && u(), ae = _0x52e7[96]) : 1 <= _e[de][_0x52e7[467]]() ? (_0x52e7[52] != G && j(), oe = ke = Ce = Ye = !1, _e[de][_0x52e7[466]](), t[_0x52e7[66]](_0x52e7[464]), ae = _0x52e7[96]) : (_e[de][_0x52e7[73]](), _0x52e7[52] !== G || Ye || h(), p(), t[_0x52e7[66]](_0x52e7[465]), _0x52e7[68] !== typeof lt && (lt[_0x52e7[51]] = !0, t[_0x52e7[66]](_0x52e7[67])), ae = _0x52e7[51])
            }, e[_0x52e7[469]][_0x52e7[1]][_0x52e7[472]] = function() {
                ye ? lt[_0x52e7[51]] ? (u(), K = _0x52e7[96]) : _0x52e7[473] != lt[_0x52e7[474]] && (lt[_0x52e7[51]] = !0, t[_0x52e7[66]](_0x52e7[67]), K = _0x52e7[51]) : _0x52e7[52] !== G || Oe || (_0x52e7[74] === Me ? Ke[_0x52e7[84]]() ? (t[_0x52e7[66]](_0x52e7[65]), Ke[_0x52e7[84]](!1)) : (t[_0x52e7[66]](_0x52e7[67]), Ke[_0x52e7[84]](!0)) : rt[_0x52e7[98]] ? (t[_0x52e7[66]](_0x52e7[65]), it.YTPUnmute(), rt[_0x52e7[98]] = !1) : (t[_0x52e7[66]](_0x52e7[67]), it.YTPMute(), rt[_0x52e7[98]] = !0))
            }, e[_0x52e7[469]][_0x52e7[1]][_0x52e7[475]] = function(e) {
                se[_0x52e7[476]] && (Ze && Ke[_0x52e7[477]](e), it && it.YTPGetPlayer()[_0x52e7[478]](e)), e *= Z, _e[de][_0x52e7[72]](e)
            }, Te || ye || 0 < le[_0x52e7[54]] ? e(window)[_0x52e7[493]](function() {
                _0x52e7[345] === se[_0x52e7[479]] ? (W = new createjs[_0x52e7[480]], W[_0x52e7[481]](createjs.Sound)) : (W = new createjs.LoadQueue(!1), W[_0x52e7[481]](createjs.Sound), createjs[_0x52e7[46]][_0x52e7[483]]([createjs[_0x52e7[482]]])), W[_0x52e7[484]](500), createjs[_0x52e7[46]][_0x52e7[485]] = [_0x52e7[486]], W[_0x52e7[50]](_0x52e7[467], s), W[_0x52e7[50]](_0x52e7[487], a), W[_0x52e7[50]](_0x52e7[49], l), W[_0x52e7[50]](_0x52e7[488], o), W[_0x52e7[50]](_0x52e7[489], n), ye && W[_0x52e7[491]]({
                    id: ut,
                    src: ct,
                    loadTimeout: se[_0x52e7[490]]
                }), 0 < le[_0x52e7[54]] && W[_0x52e7[492]](le)
            }) : e(window)[_0x52e7[493]](function() {
                !Ie && (_0x52e7[52] === G && _0x52e7[53] === Me || !pe && 0 < ue[_0x52e7[54]]) ? rt[_0x52e7[50]](_0x52e7[55], function() {
                    0 === me && (tt = Ve[_0x52e7[28]](_0x52e7[56]), c(G))
                }) : c()
            }), e(window)[_0x52e7[50]](_0x52e7[494], function(i) {
                if (me > 0) {
                    if (!pe || e(window)[_0x52e7[285]]() != xe) {
                        xe = e(window)[_0x52e7[285]](), i = _e[de][_0x52e7[51]]() ? !1 : !0;
                        var r = _e[de][_0x52e7[495]]();
                        _e[de][_0x52e7[496]](), t[_0x52e7[264]](), t = J, qe[_0x52e7[497]](t), t[_0x52e7[28]](_0x52e7[394])[_0x52e7[44]](function(t, i) {
                            if ((pe || !e(this)[_0x52e7[16]]()[_0x52e7[34]]) && (e(this)[_0x52e7[16]]()[_0x52e7[35]] || e(this)[_0x52e7[16]]()[_0x52e7[36]] && pe)) {
                                var r, s = Ue[_0x52e7[28]](_0x52e7[40] + e(this)[0][_0x52e7[7]] + _0x52e7[41]);
                                r = pe ? e(this)[_0x52e7[16]]()[_0x52e7[29]] ? e(this)[_0x52e7[16]]()[_0x52e7[29]] : _0x52e7[30] : e(this)[_0x52e7[16]]()[_0x52e7[42]] ? e(this)[_0x52e7[16]]()[_0x52e7[42]] : _0x52e7[30], r = r[_0x52e7[32]](_0x52e7[31]), imgCoverEffect(s[0], {
                                    alignX: r[0],
                                    alignY: r[1],
                                    watchResize: !1
                                })
                            }
                        }), _0x52e7[18] === G && imgCoverEffect(Xe[0], {
                            alignX: we[0],
                            alignY: we[1],
                            watchResize: !1
                        }), re[_0x52e7[418]](t, r, i)
                    }
                } else console[_0x52e7[15]](_0x52e7[498])
            })
        }, e[_0x52e7[469]][_0x52e7[1]] = function(t) {
            var i = this;
            return this[_0x52e7[44]](function() {
                if (void 0 == e(this)[_0x52e7[16]](_0x52e7[1])) {
                    var r = new e[_0x52e7[1]](i, t);
                    e(this)[_0x52e7[16]](_0x52e7[1], r)
                }
            })
        }
    }(jQuery);