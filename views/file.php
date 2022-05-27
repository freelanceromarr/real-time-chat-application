<script>
    var Tessera = (function(e) {
        var t = {};

        function r(n) {
            if (t[n]) return t[n].exports;
            var o = (t[n] = {
                i: n,
                l: !1,
                exports: {}
            });
            return e[n].call(o.exports, o, o.exports, r), (o.l = !0), o.exports;
        }
        return (
            (r.m = e),
            (r.c = t),
            (r.d = function(e, t, n) {
                r.o(e, t) || Object.defineProperty(e, t, {
                    enumerable: !0,
                    get: n
                });
            }),
            (r.r = function(e) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                    value: "Module"
                }), Object.defineProperty(e, "__esModule", {
                    value: !0
                });
            }),
            (r.t = function(e, t) {
                if ((1 & t && (e = r(e)), 8 & t)) return e;
                if (4 & t && "object" == typeof e && e && e.__esModule) return e;
                var n = Object.create(null);
                if ((r.r(n), Object.defineProperty(n, "default", {
                        enumerable: !0,
                        value: e
                    }), 2 & t && "string" != typeof e))
                    for (var o in e)
                        r.d(
                            n,
                            o,
                            function(t) {
                                return e[t];
                            }.bind(null, o)
                        );
                return n;
            }),
            (r.n = function(e) {
                var t =
                    e && e.__esModule ?
                    function() {
                        return e.default;
                    } :
                    function() {
                        return e;
                    };
                return r.d(t, "a", t), t;
            }),
            (r.o = function(e, t) {
                return Object.prototype.hasOwnProperty.call(e, t);
            }),
            (r.p = ""),
            r((r.s = 8))
        );
    })([
        function(e, t, r) {
            e.exports = !r(7)(function() {
                return (
                    7 !=
                    Object.defineProperty({}, "a", {
                        get: function() {
                            return 7;
                        },
                    }).a
                );
            });
        },
        function(e, t) {
            var r = (e.exports = {
                version: "2.5.7"
            });
            "number" == typeof __e && (__e = r);
        },
        function(e, t) {
            e.exports = function(e) {
                return "object" == typeof e ? null !== e : "function" == typeof e;
            };
        },
        function(e, t, r) {
            "use strict";
            (t.__esModule = !0),
            (t.default = function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
            });
        },
        function(e, t, r) {
            "use strict";
            t.__esModule = !0;
            var n,
                o = r(15),
                i = (n = o) && n.__esModule ? n : {
                    default: n
                };
            t.default = (function() {
                function e(e, t) {
                    for (var r = 0; r < t.length; r++) {
                        var n = t[r];
                        (n.enumerable = n.enumerable || !1), (n.configurable = !0), "value" in n && (n.writable = !0), (0, i.default)(e, n.key, n);
                    }
                }
                return function(t, r, n) {
                    return r && e(t.prototype, r), n && e(t, n), t;
                };
            })();
        },
        function(e, t) {
            var r = (e.exports = "undefined" != typeof window && window.Math == Math ? window : "undefined" != typeof self && self.Math == Math ? self : Function("return this")());
            "number" == typeof __g && (__g = r);
        },
        function(e, t, r) {
            var n = r(22),
                o = r(23),
                i = r(25),
                a = Object.defineProperty;
            t.f = r(0) ?
                Object.defineProperty :
                function(e, t, r) {
                    if ((n(e), (t = i(t, !0)), n(r), o))
                        try {
                            return a(e, t, r);
                        } catch (e) {}
                    if ("get" in r || "set" in r) throw TypeError("Accessors not supported!");
                    return "value" in r && (e[t] = r.value), e;
                };
        },
        function(e, t) {
            e.exports = function(e) {
                try {
                    return !!e();
                } catch (e) {
                    return !0;
                }
            };
        },
        function(e, t, r) {
            r(9), r(11), (e.exports = r(13));
        },
        function(e, t, r) {
            "use strict";
            (t.__esModule = !0),
            (t.definitions = void 0),
            (t.default = function(e) {
                var t = e.types;

                function r(e) {
                    return e.moduleName || "babel-runtime";
                }

                function n(e, t) {
                    return Object.prototype.hasOwnProperty.call(e, t);
                }
                var o = ["interopRequireWildcard", "interopRequireDefault"];
                return {
                    pre: function(e) {
                        var t = r(this.opts);
                        !1 !== this.opts.helpers &&
                            e.set("helperGenerator", function(r) {
                                if (o.indexOf(r) < 0) return e.addImport(t + "/helpers/" + r, "default", r);
                            }),
                            this.setDynamic("regeneratorIdentifier", function() {
                                return e.addImport(t + "/regenerator", "default", "regeneratorRuntime");
                            });
                    },
                    visitor: {
                        ReferencedIdentifier: function(e, o) {
                            var a = e.node,
                                s = e.parent,
                                u = e.scope;
                            if ("regeneratorRuntime" !== a.name || !1 === o.opts.regenerator) {
                                if (!1 !== o.opts.polyfill && !t.isMemberExpression(s) && n(i.default.builtins, a.name) && !u.getBindingIdentifier(a.name)) {
                                    var c = r(o.opts);
                                    e.replaceWith(o.addImport(c + "/core-js/" + i.default.builtins[a.name], "default", a.name));
                                }
                            } else e.replaceWith(o.get("regeneratorIdentifier"));
                        },
                        CallExpression: function(e, n) {
                            if (!1 !== n.opts.polyfill && !e.node.arguments.length) {
                                var o = e.node.callee;
                                if (t.isMemberExpression(o) && o.computed && e.get("callee.property").matchesPattern("Symbol.iterator")) {
                                    var i = r(n.opts);
                                    e.replaceWith(t.callExpression(n.addImport(i + "/core-js/get-iterator", "default", "getIterator"), [o.object]));
                                }
                            }
                        },
                        BinaryExpression: function(e, n) {
                            if (!1 !== n.opts.polyfill && "in" === e.node.operator && e.get("left").matchesPattern("Symbol.iterator")) {
                                var o = r(n.opts);
                                e.replaceWith(t.callExpression(n.addImport(o + "/core-js/is-iterable", "default", "isIterable"), [e.node.right]));
                            }
                        },
                        MemberExpression: {
                            enter: function(e, o) {
                                if (!1 !== o.opts.polyfill && e.isReferenced()) {
                                    var a = e.node,
                                        s = a.object,
                                        u = a.property;
                                    if (t.isReferenced(s, a) && !a.computed && n(i.default.methods, s.name)) {
                                        var c = i.default.methods[s.name];
                                        if (n(c, u.name) && !e.scope.getBindingIdentifier(s.name)) {
                                            if ("Object" === s.name && "defineProperty" === u.name && e.parentPath.isCallExpression()) {
                                                var h = e.parentPath.node;
                                                if (3 === h.arguments.length && t.isLiteral(h.arguments[1])) return;
                                            }
                                            var f = r(o.opts);
                                            e.replaceWith(o.addImport(f + "/core-js/" + c[u.name], "default", s.name + "$" + u.name));
                                        }
                                    }
                                }
                            },
                            exit: function(e, o) {
                                if (!1 !== o.opts.polyfill && e.isReferenced()) {
                                    var a = e.node,
                                        s = a.object;
                                    if (n(i.default.builtins, s.name) && !e.scope.getBindingIdentifier(s.name)) {
                                        var u = r(o.opts);
                                        e.replaceWith(t.memberExpression(o.addImport(u + "/core-js/" + i.default.builtins[s.name], "default", s.name), a.property, a.computed));
                                    }
                                }
                            },
                        },
                    },
                };
            });
            var n,
                o = r(10),
                i = (n = o) && n.__esModule ? n : {
                    default: n
                };
            t.definitions = i.default;
        },
        function(e, t, r) {
            "use strict";
            e.exports = {
                builtins: {
                    Symbol: "symbol",
                    Promise: "promise",
                    Map: "map",
                    WeakMap: "weak-map",
                    Set: "set",
                    WeakSet: "weak-set",
                    Observable: "observable",
                    setImmediate: "set-immediate",
                    clearImmediate: "clear-immediate",
                    asap: "asap"
                },
                methods: {
                    Array: {
                        concat: "array/concat",
                        copyWithin: "array/copy-within",
                        entries: "array/entries",
                        every: "array/every",
                        fill: "array/fill",
                        filter: "array/filter",
                        findIndex: "array/find-index",
                        find: "array/find",
                        forEach: "array/for-each",
                        from: "array/from",
                        includes: "array/includes",
                        indexOf: "array/index-of",
                        join: "array/join",
                        keys: "array/keys",
                        lastIndexOf: "array/last-index-of",
                        map: "array/map",
                        of: "array/of",
                        pop: "array/pop",
                        push: "array/push",
                        reduceRight: "array/reduce-right",
                        reduce: "array/reduce",
                        reverse: "array/reverse",
                        shift: "array/shift",
                        slice: "array/slice",
                        some: "array/some",
                        sort: "array/sort",
                        splice: "array/splice",
                        unshift: "array/unshift",
                        values: "array/values",
                    },
                    JSON: {
                        stringify: "json/stringify"
                    },
                    Object: {
                        assign: "object/assign",
                        create: "object/create",
                        defineProperties: "object/define-properties",
                        defineProperty: "object/define-property",
                        entries: "object/entries",
                        freeze: "object/freeze",
                        getOwnPropertyDescriptor: "object/get-own-property-descriptor",
                        getOwnPropertyDescriptors: "object/get-own-property-descriptors",
                        getOwnPropertyNames: "object/get-own-property-names",
                        getOwnPropertySymbols: "object/get-own-property-symbols",
                        getPrototypeOf: "object/get-prototype-of",
                        isExtensible: "object/is-extensible",
                        isFrozen: "object/is-frozen",
                        isSealed: "object/is-sealed",
                        is: "object/is",
                        keys: "object/keys",
                        preventExtensions: "object/prevent-extensions",
                        seal: "object/seal",
                        setPrototypeOf: "object/set-prototype-of",
                        values: "object/values",
                    },
                    RegExp: {
                        escape: "regexp/escape"
                    },
                    Math: {
                        acosh: "math/acosh",
                        asinh: "math/asinh",
                        atanh: "math/atanh",
                        cbrt: "math/cbrt",
                        clz32: "math/clz32",
                        cosh: "math/cosh",
                        expm1: "math/expm1",
                        fround: "math/fround",
                        hypot: "math/hypot",
                        imul: "math/imul",
                        log10: "math/log10",
                        log1p: "math/log1p",
                        log2: "math/log2",
                        sign: "math/sign",
                        sinh: "math/sinh",
                        tanh: "math/tanh",
                        trunc: "math/trunc",
                        iaddh: "math/iaddh",
                        isubh: "math/isubh",
                        imulh: "math/imulh",
                        umulh: "math/umulh",
                    },
                    Symbol: {
                        for: "symbol/for",
                        hasInstance: "symbol/has-instance",
                        isConcatSpreadable: "symbol/is-concat-spreadable",
                        iterator: "symbol/iterator",
                        keyFor: "symbol/key-for",
                        match: "symbol/match",
                        replace: "symbol/replace",
                        search: "symbol/search",
                        species: "symbol/species",
                        split: "symbol/split",
                        toPrimitive: "symbol/to-primitive",
                        toStringTag: "symbol/to-string-tag",
                        unscopables: "symbol/unscopables",
                    },
                    String: {
                        at: "string/at",
                        codePointAt: "string/code-point-at",
                        endsWith: "string/ends-with",
                        fromCodePoint: "string/from-code-point",
                        includes: "string/includes",
                        matchAll: "string/match-all",
                        padLeft: "string/pad-left",
                        padRight: "string/pad-right",
                        padStart: "string/pad-start",
                        padEnd: "string/pad-end",
                        raw: "string/raw",
                        repeat: "string/repeat",
                        startsWith: "string/starts-with",
                        trim: "string/trim",
                        trimLeft: "string/trim-left",
                        trimRight: "string/trim-right",
                        trimStart: "string/trim-start",
                        trimEnd: "string/trim-end",
                    },
                    Number: {
                        EPSILON: "number/epsilon",
                        isFinite: "number/is-finite",
                        isInteger: "number/is-integer",
                        isNaN: "number/is-nan",
                        isSafeInteger: "number/is-safe-integer",
                        MAX_SAFE_INTEGER: "number/max-safe-integer",
                        MIN_SAFE_INTEGER: "number/min-safe-integer",
                        parseFloat: "number/parse-float",
                        parseInt: "number/parse-int",
                    },
                    Reflect: {
                        apply: "reflect/apply",
                        construct: "reflect/construct",
                        defineProperty: "reflect/define-property",
                        deleteProperty: "reflect/delete-property",
                        enumerate: "reflect/enumerate",
                        getOwnPropertyDescriptor: "reflect/get-own-property-descriptor",
                        getPrototypeOf: "reflect/get-prototype-of",
                        get: "reflect/get",
                        has: "reflect/has",
                        isExtensible: "reflect/is-extensible",
                        ownKeys: "reflect/own-keys",
                        preventExtensions: "reflect/prevent-extensions",
                        setPrototypeOf: "reflect/set-prototype-of",
                        set: "reflect/set",
                        defineMetadata: "reflect/define-metadata",
                        deleteMetadata: "reflect/delete-metadata",
                        getMetadata: "reflect/get-metadata",
                        getMetadataKeys: "reflect/get-metadata-keys",
                        getOwnMetadata: "reflect/get-own-metadata",
                        getOwnMetadataKeys: "reflect/get-own-metadata-keys",
                        hasMetadata: "reflect/has-metadata",
                        hasOwnMetadata: "reflect/has-own-metadata",
                        metadata: "reflect/metadata",
                    },
                    System: {
                        global: "system/global"
                    },
                    Error: {
                        isError: "error/is-error"
                    },
                    Date: {},
                    Function: {},
                },
            };
        },
        function(e, t, r) {
            (function(e) {
                !(function(e) {
                    var t = (function() {
                            try {
                                return !!Symbol.iterator;
                            } catch (e) {
                                return !1;
                            }
                        })(),
                        r = function(e) {
                            var r = {
                                next: function() {
                                    var t = e.shift();
                                    return {
                                        done: void 0 === t,
                                        value: t
                                    };
                                },
                            };
                            return (
                                t &&
                                (r[Symbol.iterator] = function() {
                                    return r;
                                }),
                                r
                            );
                        },
                        n = function(e) {
                            return encodeURIComponent(e).replace(/%20/g, "+");
                        },
                        o = function(e) {
                            return decodeURIComponent(e).replace(/\+/g, " ");
                        };
                    ("URLSearchParams" in e && "a=1" === new URLSearchParams("?a=1").toString()) ||
                    (function() {
                        var i = function(e) {
                                if ((Object.defineProperty(this, "_entries", {
                                        writable: !0,
                                        value: {}
                                    }), "string" == typeof e)) "" !== e && this._fromString(e);
                                else if (e instanceof i) {
                                    var t = this;
                                    e.forEach(function(e, r) {
                                        t.append(r, e);
                                    });
                                }
                            },
                            a = i.prototype;
                        (a.append = function(e, t) {
                            e in this._entries ? this._entries[e].push(t.toString()) : (this._entries[e] = [t.toString()]);
                        }),
                        (a.delete = function(e) {
                            delete this._entries[e];
                        }),
                        (a.get = function(e) {
                            return e in this._entries ? this._entries[e][0] : null;
                        }),
                        (a.getAll = function(e) {
                            return e in this._entries ? this._entries[e].slice(0) : [];
                        }),
                        (a.has = function(e) {
                            return e in this._entries;
                        }),
                        (a.set = function(e, t) {
                            this._entries[e] = [t.toString()];
                        }),
                        (a.forEach = function(e, t) {
                            var r;
                            for (var n in this._entries)
                                if (this._entries.hasOwnProperty(n)) {
                                    r = this._entries[n];
                                    for (var o = 0; o < r.length; o++) e.call(t, r[o], n, this);
                                }
                        }),
                        (a.keys = function() {
                            var e = [];
                            return (
                                this.forEach(function(t, r) {
                                    e.push(r);
                                }),
                                r(e)
                            );
                        }),
                        (a.values = function() {
                            var e = [];
                            return (
                                this.forEach(function(t) {
                                    e.push(t);
                                }),
                                r(e)
                            );
                        }),
                        (a.entries = function() {
                            var e = [];
                            return (
                                this.forEach(function(t, r) {
                                    e.push([r, t]);
                                }),
                                r(e)
                            );
                        }),
                        t && (a[Symbol.iterator] = a.entries),
                            (a.toString = function() {
                                var e = [];
                                return (
                                    this.forEach(function(t, r) {
                                        e.push(n(r) + "=" + n(t));
                                    }),
                                    e.join("&")
                                );
                            }),
                            Object.defineProperty(a, "_fromString", {
                                enumerable: !1,
                                configurable: !1,
                                writable: !1,
                                value: function(e) {
                                    this._entries = {};
                                    for (var t, r = (e = e.replace(/^\?/, "")).split("&"), n = 0; n < r.length; n++)(t = r[n].split("=")), this.append(o(t[0]), t.length > 1 ? o(t[1]) : "");
                                },
                            }),
                            (e.URLSearchParams = i);
                    })(),
                    "function" != typeof URLSearchParams.prototype.sort &&
                        (URLSearchParams.prototype.sort = function() {
                            var e = this,
                                t = [];
                            this.forEach(function(r, n) {
                                    t.push([n, r]), e._entries || e.delete(n);
                                }),
                                t.sort(function(e, t) {
                                    return e[0] < t[0] ? -1 : e[0] > t[0] ? 1 : 0;
                                }),
                                e._entries && (e._entries = {});
                            for (var r = 0; r < t.length; r++) this.append(t[r][0], t[r][1]);
                        });
                })(void 0 !== e ? e : "undefined" != typeof window ? window : "undefined" != typeof self ? self : this),
                (function(e) {
                    if (
                        ((function() {
                                try {
                                    var e = new URL("b", "http://a");
                                    return (e.pathname = "c%20d"), "http://a/c%20d" === e.href && e.searchParams;
                                } catch (e) {
                                    return !1;
                                }
                            })() ||
                            (function() {
                                var t = e.URL,
                                    r = function(t, r) {
                                        "string" != typeof t && (t = String(t));
                                        var n,
                                            o = document;
                                        if (r && (void 0 === e.location || r !== e.location.href)) {
                                            ((n = (o = document.implementation.createHTMLDocument("")).createElement("base")).href = r), o.head.appendChild(n);
                                            try {
                                                if (0 !== n.href.indexOf(r)) throw new Error(n.href);
                                            } catch (e) {
                                                throw new Error("URL unable to set base " + r + " due to " + e);
                                            }
                                        }
                                        var i = o.createElement("a");
                                        if (((i.href = t), n && (o.body.appendChild(i), (i.href = i.href)), ":" === i.protocol || !/:/.test(i.href))) throw new TypeError("Invalid URL");
                                        Object.defineProperty(this, "_anchorElement", {
                                            value: i
                                        });
                                        var a = new URLSearchParams(this.search),
                                            s = !0,
                                            u = !0,
                                            c = this;
                                        ["append", "delete", "set"].forEach(function(e) {
                                                var t = a[e];
                                                a[e] = function() {
                                                    t.apply(a, arguments), s && ((u = !1), (c.search = a.toString()), (u = !0));
                                                };
                                            }),
                                            Object.defineProperty(this, "searchParams", {
                                                value: a,
                                                enumerable: !0
                                            });
                                        var h = void 0;
                                        Object.defineProperty(this, "_updateSearchParams", {
                                            enumerable: !1,
                                            configurable: !1,
                                            writable: !1,
                                            value: function() {
                                                this.search !== h && ((h = this.search), u && ((s = !1), this.searchParams._fromString(this.search), (s = !0)));
                                            },
                                        });
                                    },
                                    n = r.prototype;
                                ["hash", "host", "hostname", "port", "protocol"].forEach(function(e) {
                                        !(function(e) {
                                            Object.defineProperty(n, e, {
                                                get: function() {
                                                    return this._anchorElement[e];
                                                },
                                                set: function(t) {
                                                    this._anchorElement[e] = t;
                                                },
                                                enumerable: !0,
                                            });
                                        })(e);
                                    }),
                                    Object.defineProperty(n, "search", {
                                        get: function() {
                                            return this._anchorElement.search;
                                        },
                                        set: function(e) {
                                            (this._anchorElement.search = e), this._updateSearchParams();
                                        },
                                        enumerable: !0,
                                    }),
                                    Object.defineProperties(n, {
                                        toString: {
                                            get: function() {
                                                var e = this;
                                                return function() {
                                                    return e.href;
                                                };
                                            },
                                        },
                                        href: {
                                            get: function() {
                                                return this._anchorElement.href.replace(/\?$/, "");
                                            },
                                            set: function(e) {
                                                (this._anchorElement.href = e), this._updateSearchParams();
                                            },
                                            enumerable: !0,
                                        },
                                        pathname: {
                                            get: function() {
                                                return this._anchorElement.pathname.replace(/(^\/?)/, "/");
                                            },
                                            set: function(e) {
                                                this._anchorElement.pathname = e;
                                            },
                                            enumerable: !0,
                                        },
                                        origin: {
                                            get: function() {
                                                var e = {
                                                        "http:": 80,
                                                        "https:": 443,
                                                        "ftp:": 21
                                                    } [this._anchorElement.protocol],
                                                    t = this._anchorElement.port != e && "" !== this._anchorElement.port;
                                                return this._anchorElement.protocol + "//" + this._anchorElement.hostname + (t ? ":" + this._anchorElement.port : "");
                                            },
                                            enumerable: !0,
                                        },
                                        password: {
                                            get: function() {
                                                return "";
                                            },
                                            set: function(e) {},
                                            enumerable: !0,
                                        },
                                        username: {
                                            get: function() {
                                                return "";
                                            },
                                            set: function(e) {},
                                            enumerable: !0,
                                        },
                                    }),
                                    (r.createObjectURL = function(e) {
                                        return t.createObjectURL.apply(t, arguments);
                                    }),
                                    (r.revokeObjectURL = function(e) {
                                        return t.revokeObjectURL.apply(t, arguments);
                                    }),
                                    (e.URL = r);
                            })(),
                            void 0 !== e.location && !("origin" in e.location))
                    ) {
                        var t = function() {
                            return e.location.protocol + "//" + e.location.hostname + (e.location.port ? ":" + e.location.port : "");
                        };
                        try {
                            Object.defineProperty(e.location, "origin", {
                                get: t,
                                enumerable: !0
                            });
                        } catch (r) {
                            setInterval(function() {
                                e.location.origin = t();
                            }, 100);
                        }
                    }
                })(void 0 !== e ? e : "undefined" != typeof window ? window : "undefined" != typeof self ? self : this);
            }.call(this, r(12)));
        },
        function(e, t) {
            var r;
            r = (function() {
                return this;
            })();
            try {
                r = r || new Function("return this")();
            } catch (e) {
                "object" == typeof window && (r = window);
            }
            e.exports = r;
        },
        function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var n = r(14);
            t.SDK = n.TesseraApi;
        },
        function(e, t, r) {
            "use strict";
            var n = i(r(3)),
                o = i(r(4));

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                };
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var a = r(28),
                s = (function() {
                    function e(t) {
                        (0, n.default)(this, e), (this.config = t), this.validateConfig(t), this.init();
                    }
                    return (
                        (0, o.default)(e, [{
                                key: "startSession",
                                value: function() {
                                    return this.client.startSession();
                                },
                            },
                            {
                                key: "login",
                                value: function(e, t, r) {
                                    return this.client.authorize({
                                        email: e,
                                        password: t
                                    }, r);
                                },
                            },
                            {
                                key: "logout",
                                value: function() {
                                    this.client.removeAuthorization();
                                },
                            },
                            {
                                key: "getProduct",
                                value: function(e) {
                                    return this.client.getProduct(e);
                                },
                            },
                            {
                                key: "getProducts",
                                value: function(e) {
                                    return this.client.getProducts(e);
                                },
                            },
                            {
                                key: "getMerch",
                                value: function(e) {
                                    return this.client.getMerch(e);
                                },
                            },
                            {
                                key: "setCheckoutOption",
                                value: function(e) {
                                    return this.client.setCheckoutOption(e);
                                },
                            },
                            {
                                key: "setItemQuantity",
                                value: function(e) {
                                    return this.client.setItemQuantity(e);
                                },
                            },
                            {
                                key: "decrementItem",
                                value: function(e) {
                                    return this.client.decrementItem(e);
                                },
                            },
                            {
                                key: "applyCode",
                                value: function(e) {
                                    return this.client.applyCode(e);
                                },
                            },
                            {
                                key: "getCart",
                                value: function() {
                                    return this.client.getCart();
                                },
                            },
                            {
                                key: "getSkuPriceHistory",
                                value: function(e) {
                                    return this.client.getSkuPriceHistory(e);
                                },
                            },
                            {
                                key: "getShowPriceHistory",
                                value: function(e) {
                                    return this.client.getShowPriceHistory(e);
                                },
                            },
                            {
                                key: "addItem",
                                value: function(e) {
                                    return this.client.addItem(e);
                                },
                            },
                            {
                                key: "updateItem",
                                value: function(e) {
                                    return this.client.setItemQuantity(e);
                                },
                            },
                            {
                                key: "removeItem",
                                value: function(e) {
                                    return this.client.removeItem(e);
                                },
                            },
                            {
                                key: "updateCheckoutOption",
                                value: function(e) {
                                    return this.client.setCheckoutOption(e);
                                },
                            },
                            {
                                key: "init",
                                value: function() {
                                    this.config.useMockData ? (this.client = new a.TesseraMockClient(this.config)) : (this.client = new a.TesseraApiClient(this.config));
                                },
                            },
                            {
                                key: "validateConfig",
                                value: function(e) {
                                    if (!e.apiUrl && !e.useMockData) throw new TypeError("API URL must be set.");
                                },
                            },
                        ]),
                        e
                    );
                })();
            t.TesseraApi = s;
        },
        function(e, t, r) {
            e.exports = {
                default: r(16),
                __esModule: !0
            };
        },
        function(e, t, r) {
            r(17);
            var n = r(1).Object;
            e.exports = function(e, t, r) {
                return n.defineProperty(e, t, r);
            };
        },
        function(e, t, r) {
            var n = r(18);
            n(n.S + n.F * !r(0), "Object", {
                defineProperty: r(6).f
            });
        },
        function(e, t, r) {
            var n = r(5),
                o = r(1),
                i = r(19),
                a = r(21),
                s = r(27),
                u = function(e, t, r) {
                    var c,
                        h,
                        f,
                        l = e & u.F,
                        d = e & u.G,
                        p = e & u.S,
                        y = e & u.P,
                        m = e & u.B,
                        g = e & u.W,
                        b = d ? o : o[t] || (o[t] = {}),
                        v = b.prototype,
                        w = d ? n : p ? n[t] : (n[t] || {}).prototype;
                    for (c in (d && (r = t), r))
                        ((h = !l && w && void 0 !== w[c]) && s(b, c)) ||
                        ((f = h ? w[c] : r[c]),
                            (b[c] =
                                d && "function" != typeof w[c] ?
                                r[c] :
                                m && h ?
                                i(f, n) :
                                g && w[c] == f ?
                                (function(e) {
                                    var t = function(t, r, n) {
                                        if (this instanceof e) {
                                            switch (arguments.length) {
                                                case 0:
                                                    return new e();
                                                case 1:
                                                    return new e(t);
                                                case 2:
                                                    return new e(t, r);
                                            }
                                            return new e(t, r, n);
                                        }
                                        return e.apply(this, arguments);
                                    };
                                    return (t.prototype = e.prototype), t;
                                })(f) :
                                y && "function" == typeof f ?
                                i(Function.call, f) :
                                f),
                            y && (((b.virtual || (b.virtual = {}))[c] = f), e & u.R && v && !v[c] && a(v, c, f)));
                };
            (u.F = 1), (u.G = 2), (u.S = 4), (u.P = 8), (u.B = 16), (u.W = 32), (u.U = 64), (u.R = 128), (e.exports = u);
        },
        function(e, t, r) {
            var n = r(20);
            e.exports = function(e, t, r) {
                if ((n(e), void 0 === t)) return e;
                switch (r) {
                    case 1:
                        return function(r) {
                            return e.call(t, r);
                        };
                    case 2:
                        return function(r, n) {
                            return e.call(t, r, n);
                        };
                    case 3:
                        return function(r, n, o) {
                            return e.call(t, r, n, o);
                        };
                }
                return function() {
                    return e.apply(t, arguments);
                };
            };
        },
        function(e, t) {
            e.exports = function(e) {
                if ("function" != typeof e) throw TypeError(e + " is not a function!");
                return e;
            };
        },
        function(e, t, r) {
            var n = r(6),
                o = r(26);
            e.exports = r(0) ?
                function(e, t, r) {
                    return n.f(e, t, o(1, r));
                } :
                function(e, t, r) {
                    return (e[t] = r), e;
                };
        },
        function(e, t, r) {
            var n = r(2);
            e.exports = function(e) {
                if (!n(e)) throw TypeError(e + " is not an object!");
                return e;
            };
        },
        function(e, t, r) {
            e.exports = !r(0) &&
                !r(7)(function() {
                    return (
                        7 !=
                        Object.defineProperty(r(24)("div"), "a", {
                            get: function() {
                                return 7;
                            },
                        }).a
                    );
                });
        },
        function(e, t, r) {
            var n = r(2),
                o = r(5).document,
                i = n(o) && n(o.createElement);
            e.exports = function(e) {
                return i ? o.createElement(e) : {};
            };
        },
        function(e, t, r) {
            var n = r(2);
            e.exports = function(e, t) {
                if (!n(e)) return e;
                var r, o;
                if (t && "function" == typeof(r = e.toString) && !n((o = r.call(e)))) return o;
                if ("function" == typeof(r = e.valueOf) && !n((o = r.call(e)))) return o;
                if (!t && "function" == typeof(r = e.toString) && !n((o = r.call(e)))) return o;
                throw TypeError("Can't convert object to primitive value");
            };
        },
        function(e, t) {
            e.exports = function(e, t) {
                return {
                    enumerable: !(1 & e),
                    configurable: !(2 & e),
                    writable: !(4 & e),
                    value: t
                };
            };
        },
        function(e, t) {
            var r = {}.hasOwnProperty;
            e.exports = function(e, t) {
                return r.call(e, t);
            };
        },
        function(e, t, r) {
            "use strict";
            var n = a(r(29)),
                o = a(r(3)),
                i = a(r(4));

            function a(e) {
                return e && e.__esModule ? e : {
                    default: e
                };
            }
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), r(31);
            var s = (function() {
                function e(t) {
                    (0, o.default)(this, e), (this.config = t), (this.sessionIdKey = "operator-session-id"), this.init();
                }
                return (
                    (0, i.default)(e, [{
                            key: "init",
                            value: function() {
                                var e = sessionStorage.getItem(this.sessionIdKey),
                                    t = localStorage.getItem(this.sessionIdKey);
                                e ? (this.sessionId = e) : t && (this.sessionId = t);
                            },
                        },
                        {
                            key: "startSession",
                            value: function() {
                                var e = this;
                                return fetch(this.config.apiUrl + "/authorization/session", {
                                        method: "POST",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(t) {
                                        return e.setSession(t.sessionId, !0), t;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "authorize",
                            value: function(e, t) {
                                var r = this;
                                return fetch(this.config.apiUrl + "/authorization/token", {
                                        method: "POST",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return r.setSession(e.sessionId, t), e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "removeAuthorization",
                            value: function() {
                                (this.sessionId = ""), localStorage.removeItem(this.sessionIdKey), sessionStorage.removeItem(this.sessionIdKey);
                            },
                        },
                        {
                            key: "getCart",
                            value: function() {
                                return fetch(this.config.apiUrl + "/cart", {
                                        method: "GET",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "decrementItem",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/cart/decrement-item", {
                                        method: "POST",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "addItem",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/cart/add-item", {
                                        method: "POST",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "setSkuQuantity",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/cart/set-quantity", {
                                        method: "POST",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "setCheckoutOption",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/cart/checkout-options/" + e.cartSkuId, {
                                        method: "PUT",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "setItemQuantity",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/cart/items/" + e.cartSkuId, {
                                        method: "PUT",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "removeItem",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/cart/items/" + e.cartSkuId, {
                                        method: "DELETE",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "applyCode",
                            value: function(e) {
                                return fetch(this.config.apiUrl + "/products/" + e.postId + "/apply-code", {
                                        method: "POST",
                                        headers: this.getHeaders(),
                                        body: (0, n.default)(e)
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "getProduct",
                            value: function(e) {
                                var t = new URL(this.config.apiUrl + "/products/shows/" + e.postId);
                                return fetch(t.toString(), {
                                        method: "GET",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "getProducts",
                            value: function(e) {
                                var t = new URL(this.config.apiUrl + "/products/shows");
                                return (
                                    t.searchParams.append("ids", e.postIds.join(",")),
                                    fetch(t.toString(), {
                                        method: "GET",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    })
                                );
                            },
                        },
                        {
                            key: "getMerch",
                            value: function(e) {
                                var t = new URL(this.config.apiUrl + "/products/merch");
                                return (
                                    t.searchParams.append("ids", e.postIds.join(",")),
                                    fetch(t.toString(), {
                                        method: "GET",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    })
                                );
                            },
                        },
                        {
                            key: "getSkuPriceHistory",
                            value: function(e) {
                                var t = new URL(this.config.apiUrl + "/products/shows/skus/" + e.skuId + "/price-history");
                                return fetch(t.toString(), {
                                        method: "GET",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "getShowPriceHistory",
                            value: function(e) {
                                var t = new URL(this.config.apiUrl + "/products/shows/" + e.showId + "/price-history");
                                return fetch(t.toString(), {
                                        method: "GET",
                                        headers: this.getHeaders()
                                    })
                                    .then(this.checkStatus)
                                    .then(this.parseJSON)
                                    .then(function(e) {
                                        return e;
                                    })
                                    .catch(function(e) {
                                        throw Error;
                                    });
                            },
                        },
                        {
                            key: "checkStatus",
                            value: function(e) {
                                if (e.status >= 200 && e.status < 300) return e;
                                var t = new Error(e.statusText);
                                throw ((t.message = e), t);
                            },
                        },
                        {
                            key: "parseJSON",
                            value: function(e) {
                                return 204 === e.status ? "" : e.json();
                            },
                        },
                        {
                            key: "setSession",
                            value: function(e, t) {
                                (this.sessionId = e), t ? localStorage.setItem(this.sessionIdKey, e) : sessionStorage.setItem(this.sessionIdKey, e);
                            },
                        },
                        {
                            key: "getHeaders",
                            value: function() {
                                return new Headers({
                                    "Content-Type": "application/json",
                                    SessionId: this.sessionId
                                });
                            },
                        },
                    ]),
                    e
                );
            })();
            t.TesseraApiClient = s;
            var u = (function() {
                function e(t) {
                    (0, o.default)(this, e), (this.config = t);
                }
                return (
                    (0, i.default)(e, [{
                            key: "getSkuPriceHistory",
                            value: function(e) {
                                throw new Error("Method not implemented.");
                            },
                        },
                        {
                            key: "getShowPriceHistory",
                            value: function(e) {
                                throw new Error("Method not implemented.");
                            },
                        },
                        {
                            key: "startSession",
                            value: function() {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "authorize",
                            value: function(e, t) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "applyCode",
                            value: function(e) {
                                throw new Error("Method not implemented.");
                            },
                        },
                        {
                            key: "removeAuthorization",
                            value: function() {}
                        },
                        {
                            key: "getCart",
                            value: function() {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "addItem",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "setCheckoutOption",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "setItemQuantity",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "removeItem",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "decrementItem",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "getProduct",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "getProducts",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                        {
                            key: "getMerch",
                            value: function(e) {
                                throw new Error("Method not implemented");
                            },
                        },
                    ]),
                    e
                );
            })();
            t.TesseraMockClient = u;
        },
        function(e, t, r) {
            e.exports = {
                default: r(30),
                __esModule: !0
            };
        },
        function(e, t, r) {
            var n = r(1),
                o = n.JSON || (n.JSON = {
                    stringify: JSON.stringify
                });
            e.exports = function(e) {
                return o.stringify.apply(o, arguments);
            };
        },
        function(e, t) {
            !(function(e) {
                "use strict";
                if (!e.fetch) {
                    var t = "URLSearchParams" in e,
                        r = "Symbol" in e && "iterator" in Symbol,
                        n =
                        "FileReader" in e &&
                        "Blob" in e &&
                        (function() {
                            try {
                                return new Blob(), !0;
                            } catch (e) {
                                return !1;
                            }
                        })(),
                        o = "FormData" in e,
                        i = "ArrayBuffer" in e;
                    if (i)
                        var a = [
                                "[object Int8Array]",
                                "[object Uint8Array]",
                                "[object Uint8ClampedArray]",
                                "[object Int16Array]",
                                "[object Uint16Array]",
                                "[object Int32Array]",
                                "[object Uint32Array]",
                                "[object Float32Array]",
                                "[object Float64Array]",
                            ],
                            s = function(e) {
                                return e && DataView.prototype.isPrototypeOf(e);
                            },
                            u =
                            ArrayBuffer.isView ||
                            function(e) {
                                return e && a.indexOf(Object.prototype.toString.call(e)) > -1;
                            };
                    (p.prototype.append = function(e, t) {
                        (e = f(e)), (t = l(t));
                        var r = this.map[e];
                        this.map[e] = r ? r + "," + t : t;
                    }),
                    (p.prototype.delete = function(e) {
                        delete this.map[f(e)];
                    }),
                    (p.prototype.get = function(e) {
                        return (e = f(e)), this.has(e) ? this.map[e] : null;
                    }),
                    (p.prototype.has = function(e) {
                        return this.map.hasOwnProperty(f(e));
                    }),
                    (p.prototype.set = function(e, t) {
                        this.map[f(e)] = l(t);
                    }),
                    (p.prototype.forEach = function(e, t) {
                        for (var r in this.map) this.map.hasOwnProperty(r) && e.call(t, this.map[r], r, this);
                    }),
                    (p.prototype.keys = function() {
                        var e = [];
                        return (
                            this.forEach(function(t, r) {
                                e.push(r);
                            }),
                            d(e)
                        );
                    }),
                    (p.prototype.values = function() {
                        var e = [];
                        return (
                            this.forEach(function(t) {
                                e.push(t);
                            }),
                            d(e)
                        );
                    }),
                    (p.prototype.entries = function() {
                        var e = [];
                        return (
                            this.forEach(function(t, r) {
                                e.push([r, t]);
                            }),
                            d(e)
                        );
                    }),
                    r && (p.prototype[Symbol.iterator] = p.prototype.entries);
                    var c = ["DELETE", "GET", "HEAD", "OPTIONS", "POST", "PUT"];
                    (w.prototype.clone = function() {
                        return new w(this, {
                            body: this._bodyInit
                        });
                    }),
                    v.call(w.prototype),
                        v.call(E.prototype),
                        (E.prototype.clone = function() {
                            return new E(this._bodyInit, {
                                status: this.status,
                                statusText: this.statusText,
                                headers: new p(this.headers),
                                url: this.url
                            });
                        }),
                        (E.error = function() {
                            var e = new E(null, {
                                status: 0,
                                statusText: ""
                            });
                            return (e.type = "error"), e;
                        });
                    var h = [301, 302, 303, 307, 308];
                    (E.redirect = function(e, t) {
                        if (-1 === h.indexOf(t)) throw new RangeError("Invalid status code");
                        return new E(null, {
                            status: t,
                            headers: {
                                location: e
                            }
                        });
                    }),
                    (e.Headers = p),
                    (e.Request = w),
                    (e.Response = E),
                    (e.fetch = function(e, t) {
                        return new Promise(function(r, o) {
                            var i = new w(e, t),
                                a = new XMLHttpRequest();
                            (a.onload = function() {
                                var e,
                                    t,
                                    n = {
                                        status: a.status,
                                        statusText: a.statusText,
                                        headers: ((e = a.getAllResponseHeaders() || ""),
                                            (t = new p()),
                                            e
                                            .replace(/\r?\n[\t ]+/g, " ")
                                            .split(/\r?\n/)
                                            .forEach(function(e) {
                                                var r = e.split(":"),
                                                    n = r.shift().trim();
                                                if (n) {
                                                    var o = r.join(":").trim();
                                                    t.append(n, o);
                                                }
                                            }),
                                            t),
                                    };
                                n.url = "responseURL" in a ? a.responseURL : n.headers.get("X-Request-URL");
                                var o = "response" in a ? a.response : a.responseText;
                                r(new E(o, n));
                            }),
                            (a.onerror = function() {
                                o(new TypeError("Network request failed"));
                            }),
                            (a.ontimeout = function() {
                                o(new TypeError("Network request failed"));
                            }),
                            a.open(i.method, i.url, !0),
                                "include" === i.credentials ? (a.withCredentials = !0) : "omit" === i.credentials && (a.withCredentials = !1),
                                "responseType" in a && n && (a.responseType = "blob"),
                                i.headers.forEach(function(e, t) {
                                    a.setRequestHeader(t, e);
                                }),
                                a.send(void 0 === i._bodyInit ? null : i._bodyInit);
                        });
                    }),
                    (e.fetch.polyfill = !0);
                }

                function f(e) {
                    if (("string" != typeof e && (e = String(e)), /[^a-z0-9\-#$%&'*+.\^_`|~]/i.test(e))) throw new TypeError("Invalid character in header field name");
                    return e.toLowerCase();
                }

                function l(e) {
                    return "string" != typeof e && (e = String(e)), e;
                }

                function d(e) {
                    var t = {
                        next: function() {
                            var t = e.shift();
                            return {
                                done: void 0 === t,
                                value: t
                            };
                        },
                    };
                    return (
                        r &&
                        (t[Symbol.iterator] = function() {
                            return t;
                        }),
                        t
                    );
                }

                function p(e) {
                    (this.map = {}),
                    e instanceof p
                        ?
                        e.forEach(function(e, t) {
                            this.append(t, e);
                        }, this) :
                        Array.isArray(e) ?
                        e.forEach(function(e) {
                            this.append(e[0], e[1]);
                        }, this) :
                        e &&
                        Object.getOwnPropertyNames(e).forEach(function(t) {
                            this.append(t, e[t]);
                        }, this);
                }

                function y(e) {
                    if (e.bodyUsed) return Promise.reject(new TypeError("Already read"));
                    e.bodyUsed = !0;
                }

                function m(e) {
                    return new Promise(function(t, r) {
                        (e.onload = function() {
                            t(e.result);
                        }),
                        (e.onerror = function() {
                            r(e.error);
                        });
                    });
                }

                function g(e) {
                    var t = new FileReader(),
                        r = m(t);
                    return t.readAsArrayBuffer(e), r;
                }

                function b(e) {
                    if (e.slice) return e.slice(0);
                    var t = new Uint8Array(e.byteLength);
                    return t.set(new Uint8Array(e)), t.buffer;
                }

                function v() {
                    return (
                        (this.bodyUsed = !1),
                        (this._initBody = function(e) {
                            if (((this._bodyInit = e), e))
                                if ("string" == typeof e) this._bodyText = e;
                                else if (n && Blob.prototype.isPrototypeOf(e)) this._bodyBlob = e;
                            else if (o && FormData.prototype.isPrototypeOf(e)) this._bodyFormData = e;
                            else if (t && URLSearchParams.prototype.isPrototypeOf(e)) this._bodyText = e.toString();
                            else if (i && n && s(e))(this._bodyArrayBuffer = b(e.buffer)), (this._bodyInit = new Blob([this._bodyArrayBuffer]));
                            else {
                                if (!i || (!ArrayBuffer.prototype.isPrototypeOf(e) && !u(e))) throw new Error("unsupported BodyInit type");
                                this._bodyArrayBuffer = b(e);
                            } else this._bodyText = "";
                            this.headers.get("content-type") ||
                                ("string" == typeof e ?
                                    this.headers.set("content-type", "text/plain;charset=UTF-8") :
                                    this._bodyBlob && this._bodyBlob.type ?
                                    this.headers.set("content-type", this._bodyBlob.type) :
                                    t && URLSearchParams.prototype.isPrototypeOf(e) && this.headers.set("content-type", "application/x-www-form-urlencoded;charset=UTF-8"));
                        }),
                        n &&
                        ((this.blob = function() {
                                var e = y(this);
                                if (e) return e;
                                if (this._bodyBlob) return Promise.resolve(this._bodyBlob);
                                if (this._bodyArrayBuffer) return Promise.resolve(new Blob([this._bodyArrayBuffer]));
                                if (this._bodyFormData) throw new Error("could not read FormData body as blob");
                                return Promise.resolve(new Blob([this._bodyText]));
                            }),
                            (this.arrayBuffer = function() {
                                return this._bodyArrayBuffer ? y(this) || Promise.resolve(this._bodyArrayBuffer) : this.blob().then(g);
                            })),
                        (this.text = function() {
                            var e,
                                t,
                                r,
                                n = y(this);
                            if (n) return n;
                            if (this._bodyBlob) return (e = this._bodyBlob), (t = new FileReader()), (r = m(t)), t.readAsText(e), r;
                            if (this._bodyArrayBuffer)
                                return Promise.resolve(
                                    (function(e) {
                                        for (var t = new Uint8Array(e), r = new Array(t.length), n = 0; n < t.length; n++) r[n] = String.fromCharCode(t[n]);
                                        return r.join("");
                                    })(this._bodyArrayBuffer)
                                );
                            if (this._bodyFormData) throw new Error("could not read FormData body as text");
                            return Promise.resolve(this._bodyText);
                        }),
                        o &&
                        (this.formData = function() {
                            return this.text().then(S);
                        }),
                        (this.json = function() {
                            return this.text().then(JSON.parse);
                        }),
                        this
                    );
                }

                function w(e, t) {
                    var r,
                        n,
                        o = (t = t || {}).body;
                    if (e instanceof w) {
                        if (e.bodyUsed) throw new TypeError("Already read");
                        (this.url = e.url), (this.credentials = e.credentials), t.headers || (this.headers = new p(e.headers)), (this.method = e.method), (this.mode = e.mode), o || null == e._bodyInit || ((o = e._bodyInit), (e.bodyUsed = !0));
                    } else this.url = String(e);
                    if (
                        ((this.credentials = t.credentials || this.credentials || "omit"),
                            (!t.headers && this.headers) || (this.headers = new p(t.headers)),
                            (this.method = ((r = t.method || this.method || "GET"), (n = r.toUpperCase()), c.indexOf(n) > -1 ? n : r)),
                            (this.mode = t.mode || this.mode || null),
                            (this.referrer = null),
                            ("GET" === this.method || "HEAD" === this.method) && o)
                    )
                        throw new TypeError("Body not allowed for GET or HEAD requests");
                    this._initBody(o);
                }

                function S(e) {
                    var t = new FormData();
                    return (
                        e
                        .trim()
                        .split("&")
                        .forEach(function(e) {
                            if (e) {
                                var r = e.split("="),
                                    n = r.shift().replace(/\+/g, " "),
                                    o = r.join("=").replace(/\+/g, " ");
                                t.append(decodeURIComponent(n), decodeURIComponent(o));
                            }
                        }),
                        t
                    );
                }

                function E(e, t) {
                    t || (t = {}),
                        (this.type = "default"),
                        (this.status = void 0 === t.status ? 200 : t.status),
                        (this.ok = this.status >= 200 && this.status < 300),
                        (this.statusText = "statusText" in t ? t.statusText : "OK"),
                        (this.headers = new p(t.headers)),
                        (this.url = t.url || ""),
                        this._initBody(e);
                }
            })("undefined" != typeof self ? self : this);
        },
    ]);


    var affiliate_query = window.location.search;
    var urlParamsArr = new URLSearchParams(affiliate_query);
    var affiliateCode = urlParamsArr.get('code');

    if (affiliateCode != null) {

    } else {
        console.log('not tracked');
    }
</script>