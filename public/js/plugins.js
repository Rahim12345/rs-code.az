/*!
 * Bootstrap v4.0.0 (https://getbootstrap.com)
 * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
!(function (t, e) {
    'object' == typeof exports && 'undefined' != typeof module
        ? e(
        exports,
        require('jquery'),
        require('../../../../www.innovationplans.com/idesign/vie/vie-light/popper.html')
        )
        : 'function' == typeof define && define.amd
        ? define(['exports', 'jquery', 'popper.js'], e)
        : e((t.bootstrap = {}), t.jQuery, t.Popper);
})(this, function (t, e, n) {
    'use strict';
    function i(t, e) {
        for (var n = 0; n < e.length; n++) {
            var i = e[n];
            (i.enumerable = i.enumerable || !1),
                (i.configurable = !0),
            'value' in i && (i.writable = !0),
                Object.defineProperty(t, i.key, i);
        }
    }
    function s(t, e, n) {
        return e && i(t.prototype, e), n && i(t, n), t;
    }
    function r() {
        return (r =
            Object.assign ||
            function (t) {
                for (var e = 1; e < arguments.length; e++) {
                    var n = arguments[e];
                    for (var i in n)
                        Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
                }
                return t;
            }).apply(this, arguments);
    }
    (e = e && e.hasOwnProperty('default') ? e.default : e),
        (n = n && n.hasOwnProperty('default') ? n.default : n);
    var o,
        a,
        l,
        h,
        c,
        u,
        f,
        d,
        _,
        g,
        p,
        m,
        v,
        E,
        T,
        y,
        C,
        I,
        A,
        b,
        D,
        S,
        w,
        N,
        O,
        k,
        P = (function (t) {
            var e = !1;
            function n(e) {
                var n = this,
                    s = !1;
                return (
                    t(this).one(i.TRANSITION_END, function () {
                        s = !0;
                    }),
                        setTimeout(function () {
                            s || i.triggerTransitionEnd(n);
                        }, e),
                        this
                );
            }
            var i = {
                TRANSITION_END: 'bsTransitionEnd',
                getUID: function (t) {
                    do {
                        t += ~~(1e6 * Math.random());
                    } while (document.getElementById(t));
                    return t;
                },
                getSelectorFromElement: function (e) {
                    var n,
                        i = e.getAttribute('data-target');
                    (i && '#' !== i) || (i = e.getAttribute('href') || ''),
                    '#' === i.charAt(0) &&
                    ((n = i),
                        (i = n =
                            'function' == typeof t.escapeSelector
                                ? t.escapeSelector(n).substr(1)
                                : n.replace(/(:|\.|\[|\]|,|=|@)/g, '\\$1')));
                    try {
                        return t(document).find(i).length > 0 ? i : null;
                    } catch (t) {
                        return null;
                    }
                },
                reflow: function (t) {
                    return t.offsetHeight;
                },
                triggerTransitionEnd: function (n) {
                    t(n).trigger(e.end);
                },
                supportsTransitionEnd: function () {
                    return Boolean(e);
                },
                isElement: function (t) {
                    return (t[0] || t).nodeType;
                },
                typeCheckConfig: function (t, e, n) {
                    for (var s in n)
                        if (Object.prototype.hasOwnProperty.call(n, s)) {
                            var r = n[s],
                                o = e[s],
                                a =
                                    o && i.isElement(o)
                                        ? 'element'
                                        : ((l = o),
                                            {}.toString
                                                .call(l)
                                                .match(/\s([a-zA-Z]+)/)[1]
                                                .toLowerCase());
                            if (!new RegExp(r).test(a))
                                throw new Error(
                                    t.toUpperCase() +
                                    ': Option "' +
                                    s +
                                    '" provided type "' +
                                    a +
                                    '" but expected type "' +
                                    r +
                                    '".'
                                );
                        }
                    var l;
                },
            };
            return (
                (e = ('undefined' == typeof window || !window.QUnit) && {
                    end: 'transitionend',
                }),
                    (t.fn.emulateTransitionEnd = n),
                i.supportsTransitionEnd() &&
                (t.event.special[i.TRANSITION_END] = {
                    bindType: e.end,
                    delegateType: e.end,
                    handle: function (e) {
                        if (t(e.target).is(this))
                            return e.handleObj.handler.apply(this, arguments);
                    },
                }),
                    i
            );
        })(e),
        L =
            ((a = 'alert'),
                (h = '.' + (l = 'bs.alert')),
                (c = (o = e).fn[a]),
                (u = {
                    CLOSE: 'close' + h,
                    CLOSED: 'closed' + h,
                    CLICK_DATA_API: 'click' + h + '.data-api',
                }),
                (f = 'alert'),
                (d = 'fade'),
                (_ = 'show'),
                (g = (function () {
                    function t(t) {
                        this._element = t;
                    }
                    var e = t.prototype;
                    return (
                        (e.close = function (t) {
                            t = t || this._element;
                            var e = this._getRootElement(t);
                            this._triggerCloseEvent(e).isDefaultPrevented() ||
                            this._removeElement(e);
                        }),
                            (e.dispose = function () {
                                o.removeData(this._element, l), (this._element = null);
                            }),
                            (e._getRootElement = function (t) {
                                var e = P.getSelectorFromElement(t),
                                    n = !1;
                                return (
                                    e && (n = o(e)[0]), n || (n = o(t).closest('.' + f)[0]), n
                                );
                            }),
                            (e._triggerCloseEvent = function (t) {
                                var e = o.Event(u.CLOSE);
                                return o(t).trigger(e), e;
                            }),
                            (e._removeElement = function (t) {
                                var e = this;
                                o(t).removeClass(_),
                                    P.supportsTransitionEnd() && o(t).hasClass(d)
                                        ? o(t)
                                            .one(P.TRANSITION_END, function (n) {
                                                return e._destroyElement(t, n);
                                            })
                                            .emulateTransitionEnd(150)
                                        : this._destroyElement(t);
                            }),
                            (e._destroyElement = function (t) {
                                o(t).detach().trigger(u.CLOSED).remove();
                            }),
                            (t._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var n = o(this),
                                        i = n.data(l);
                                    i || ((i = new t(this)), n.data(l, i)),
                                    'close' === e && i[e](this);
                                });
                            }),
                            (t._handleDismiss = function (t) {
                                return function (e) {
                                    e && e.preventDefault(), t.close(this);
                                };
                            }),
                            s(t, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                            ]),
                            t
                    );
                })()),
                o(document).on(
                    u.CLICK_DATA_API,
                    '[data-dismiss="alert"]',
                    g._handleDismiss(new g())
                ),
                (o.fn[a] = g._jQueryInterface),
                (o.fn[a].Constructor = g),
                (o.fn[a].noConflict = function () {
                    return (o.fn[a] = c), g._jQueryInterface;
                }),
                g),
        R =
            ((m = 'button'),
                (E = '.' + (v = 'bs.button')),
                (T = '.data-api'),
                (y = (p = e).fn[m]),
                (C = 'active'),
                (I = 'btn'),
                (A = 'focus'),
                (b = '[data-toggle^="button"]'),
                (D = '[data-toggle="buttons"]'),
                (S = 'input'),
                (w = '.active'),
                (N = '.btn'),
                (O = {
                    CLICK_DATA_API: 'click' + E + T,
                    FOCUS_BLUR_DATA_API: 'focus' + E + T + ' blur' + E + T,
                }),
                (k = (function () {
                    function t(t) {
                        this._element = t;
                    }
                    var e = t.prototype;
                    return (
                        (e.toggle = function () {
                            var t = !0,
                                e = !0,
                                n = p(this._element).closest(D)[0];
                            if (n) {
                                var i = p(this._element).find(S)[0];
                                if (i) {
                                    if ('radio' === i.type)
                                        if (i.checked && p(this._element).hasClass(C))
                                            t = !1;
                                        else {
                                            var s = p(n).find(w)[0];
                                            s && p(s).removeClass(C);
                                        }
                                    if (t) {
                                        if (
                                            i.hasAttribute('disabled') ||
                                            n.hasAttribute('disabled') ||
                                            i.classList.contains('disabled') ||
                                            n.classList.contains('disabled')
                                        )
                                            return;
                                        (i.checked = !p(this._element).hasClass(C)),
                                            p(i).trigger('change');
                                    }
                                    i.focus(), (e = !1);
                                }
                            }
                            e &&
                            this._element.setAttribute(
                                'aria-pressed',
                                !p(this._element).hasClass(C)
                            ),
                            t && p(this._element).toggleClass(C);
                        }),
                            (e.dispose = function () {
                                p.removeData(this._element, v), (this._element = null);
                            }),
                            (t._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var n = p(this).data(v);
                                    n || ((n = new t(this)), p(this).data(v, n)),
                                    'toggle' === e && n[e]();
                                });
                            }),
                            s(t, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                            ]),
                            t
                    );
                })()),
                p(document)
                    .on(O.CLICK_DATA_API, b, function (t) {
                        t.preventDefault();
                        var e = t.target;
                        p(e).hasClass(I) || (e = p(e).closest(N)),
                            k._jQueryInterface.call(p(e), 'toggle');
                    })
                    .on(O.FOCUS_BLUR_DATA_API, b, function (t) {
                        var e = p(t.target).closest(N)[0];
                        p(e).toggleClass(A, /^focus(in)?$/.test(t.type));
                    }),
                (p.fn[m] = k._jQueryInterface),
                (p.fn[m].Constructor = k),
                (p.fn[m].noConflict = function () {
                    return (p.fn[m] = y), k._jQueryInterface;
                }),
                k),
        j = (function (t) {
            var e = 'carousel',
                n = 'bs.carousel',
                i = '.' + n,
                o = t.fn[e],
                a = {
                    interval: 5e3,
                    keyboard: !0,
                    slide: !1,
                    pause: 'hover',
                    wrap: !0,
                },
                l = {
                    interval: '(number|boolean)',
                    keyboard: 'boolean',
                    slide: '(boolean|string)',
                    pause: '(string|boolean)',
                    wrap: 'boolean',
                },
                h = 'next',
                c = 'prev',
                u = 'left',
                f = 'right',
                d = {
                    SLIDE: 'slide' + i,
                    SLID: 'slid' + i,
                    KEYDOWN: 'keydown' + i,
                    MOUSEENTER: 'mouseenter' + i,
                    MOUSELEAVE: 'mouseleave' + i,
                    TOUCHEND: 'touchend' + i,
                    LOAD_DATA_API: 'load' + i + '.data-api',
                    CLICK_DATA_API: 'click' + i + '.data-api',
                },
                _ = 'carousel',
                g = 'active',
                p = 'slide',
                m = 'carousel-item-right',
                v = 'carousel-item-left',
                E = 'carousel-item-next',
                T = 'carousel-item-prev',
                y = {
                    ACTIVE: '.active',
                    ACTIVE_ITEM: '.active.carousel-item',
                    ITEM: '.carousel-item',
                    NEXT_PREV: '.carousel-item-next, .carousel-item-prev',
                    INDICATORS: '.carousel-indicators',
                    DATA_SLIDE: '[data-slide], [data-slide-to]',
                    DATA_RIDE: '[data-ride="carousel"]',
                },
                C = (function () {
                    function o(e, n) {
                        (this._items = null),
                            (this._interval = null),
                            (this._activeElement = null),
                            (this._isPaused = !1),
                            (this._isSliding = !1),
                            (this.touchTimeout = null),
                            (this._config = this._getConfig(n)),
                            (this._element = t(e)[0]),
                            (this._indicatorsElement = t(this._element).find(
                                y.INDICATORS
                            )[0]),
                            this._addEventListeners();
                    }
                    var C = o.prototype;
                    return (
                        (C.next = function () {
                            this._isSliding || this._slide(h);
                        }),
                            (C.nextWhenVisible = function () {
                                !document.hidden &&
                                t(this._element).is(':visible') &&
                                'hidden' !== t(this._element).css('visibility') &&
                                this.next();
                            }),
                            (C.prev = function () {
                                this._isSliding || this._slide(c);
                            }),
                            (C.pause = function (e) {
                                e || (this._isPaused = !0),
                                t(this._element).find(y.NEXT_PREV)[0] &&
                                P.supportsTransitionEnd() &&
                                (P.triggerTransitionEnd(this._element),
                                    this.cycle(!0)),
                                    clearInterval(this._interval),
                                    (this._interval = null);
                            }),
                            (C.cycle = function (t) {
                                t || (this._isPaused = !1),
                                this._interval &&
                                (clearInterval(this._interval),
                                    (this._interval = null)),
                                this._config.interval &&
                                !this._isPaused &&
                                (this._interval = setInterval(
                                    (document.visibilityState
                                            ? this.nextWhenVisible
                                            : this.next
                                    ).bind(this),
                                    this._config.interval
                                ));
                            }),
                            (C.to = function (e) {
                                var n = this;
                                this._activeElement = t(this._element).find(
                                    y.ACTIVE_ITEM
                                )[0];
                                var i = this._getItemIndex(this._activeElement);
                                if (!(e > this._items.length - 1 || e < 0))
                                    if (this._isSliding)
                                        t(this._element).one(d.SLID, function () {
                                            return n.to(e);
                                        });
                                    else {
                                        if (i === e) return this.pause(), void this.cycle();
                                        var s = e > i ? h : c;
                                        this._slide(s, this._items[e]);
                                    }
                            }),
                            (C.dispose = function () {
                                t(this._element).off(i),
                                    t.removeData(this._element, n),
                                    (this._items = null),
                                    (this._config = null),
                                    (this._element = null),
                                    (this._interval = null),
                                    (this._isPaused = null),
                                    (this._isSliding = null),
                                    (this._activeElement = null),
                                    (this._indicatorsElement = null);
                            }),
                            (C._getConfig = function (t) {
                                return (t = r({}, a, t)), P.typeCheckConfig(e, t, l), t;
                            }),
                            (C._addEventListeners = function () {
                                var e = this;
                                this._config.keyboard &&
                                t(this._element).on(d.KEYDOWN, function (t) {
                                    return e._keydown(t);
                                }),
                                'hover' === this._config.pause &&
                                (t(this._element)
                                    .on(d.MOUSEENTER, function (t) {
                                        return e.pause(t);
                                    })
                                    .on(d.MOUSELEAVE, function (t) {
                                        return e.cycle(t);
                                    }),
                                'ontouchstart' in document.documentElement &&
                                t(this._element).on(d.TOUCHEND, function () {
                                    e.pause(),
                                    e.touchTimeout &&
                                    clearTimeout(e.touchTimeout),
                                        (e.touchTimeout = setTimeout(function (t) {
                                            return e.cycle(t);
                                        }, 500 + e._config.interval));
                                }));
                            }),
                            (C._keydown = function (t) {
                                if (!/input|textarea/i.test(t.target.tagName))
                                    switch (t.which) {
                                        case 37:
                                            t.preventDefault(), this.prev();
                                            break;
                                        case 39:
                                            t.preventDefault(), this.next();
                                    }
                            }),
                            (C._getItemIndex = function (e) {
                                return (
                                    (this._items = t.makeArray(t(e).parent().find(y.ITEM))),
                                        this._items.indexOf(e)
                                );
                            }),
                            (C._getItemByDirection = function (t, e) {
                                var n = t === h,
                                    i = t === c,
                                    s = this._getItemIndex(e),
                                    r = this._items.length - 1;
                                if (
                                    ((i && 0 === s) || (n && s === r)) &&
                                    !this._config.wrap
                                )
                                    return e;
                                var o = (s + (t === c ? -1 : 1)) % this._items.length;
                                return -1 === o
                                    ? this._items[this._items.length - 1]
                                    : this._items[o];
                            }),
                            (C._triggerSlideEvent = function (e, n) {
                                var i = this._getItemIndex(e),
                                    s = this._getItemIndex(
                                        t(this._element).find(y.ACTIVE_ITEM)[0]
                                    ),
                                    r = t.Event(d.SLIDE, {
                                        relatedTarget: e,
                                        direction: n,
                                        from: s,
                                        to: i,
                                    });
                                return t(this._element).trigger(r), r;
                            }),
                            (C._setActiveIndicatorElement = function (e) {
                                if (this._indicatorsElement) {
                                    t(this._indicatorsElement)
                                        .find(y.ACTIVE)
                                        .removeClass(g);
                                    var n =
                                        this._indicatorsElement.children[
                                            this._getItemIndex(e)
                                            ];
                                    n && t(n).addClass(g);
                                }
                            }),
                            (C._slide = function (e, n) {
                                var i,
                                    s,
                                    r,
                                    o = this,
                                    a = t(this._element).find(y.ACTIVE_ITEM)[0],
                                    l = this._getItemIndex(a),
                                    c = n || (a && this._getItemByDirection(e, a)),
                                    _ = this._getItemIndex(c),
                                    C = Boolean(this._interval);
                                if (
                                    (e === h
                                        ? ((i = v), (s = E), (r = u))
                                        : ((i = m), (s = T), (r = f)),
                                    c && t(c).hasClass(g))
                                )
                                    this._isSliding = !1;
                                else if (
                                    !this._triggerSlideEvent(c, r).isDefaultPrevented() &&
                                    a &&
                                    c
                                ) {
                                    (this._isSliding = !0),
                                    C && this.pause(),
                                        this._setActiveIndicatorElement(c);
                                    var I = t.Event(d.SLID, {
                                        relatedTarget: c,
                                        direction: r,
                                        from: l,
                                        to: _,
                                    });
                                    P.supportsTransitionEnd() &&
                                    t(this._element).hasClass(p)
                                        ? (t(c).addClass(s),
                                            P.reflow(c),
                                            t(a).addClass(i),
                                            t(c).addClass(i),
                                            t(a)
                                                .one(P.TRANSITION_END, function () {
                                                    t(c)
                                                        .removeClass(i + ' ' + s)
                                                        .addClass(g),
                                                        t(a).removeClass(g + ' ' + s + ' ' + i),
                                                        (o._isSliding = !1),
                                                        setTimeout(function () {
                                                            return t(o._element).trigger(I);
                                                        }, 0);
                                                })
                                                .emulateTransitionEnd(600))
                                        : (t(a).removeClass(g),
                                            t(c).addClass(g),
                                            (this._isSliding = !1),
                                            t(this._element).trigger(I)),
                                    C && this.cycle();
                                }
                            }),
                            (o._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var i = t(this).data(n),
                                        s = r({}, a, t(this).data());
                                    'object' == typeof e && (s = r({}, s, e));
                                    var l = 'string' == typeof e ? e : s.slide;
                                    if (
                                        (i || ((i = new o(this, s)), t(this).data(n, i)),
                                        'number' == typeof e)
                                    )
                                        i.to(e);
                                    else if ('string' == typeof l) {
                                        if ('undefined' == typeof i[l])
                                            throw new TypeError(
                                                'No method named "' + l + '"'
                                            );
                                        i[l]();
                                    } else s.interval && (i.pause(), i.cycle());
                                });
                            }),
                            (o._dataApiClickHandler = function (e) {
                                var i = P.getSelectorFromElement(this);
                                if (i) {
                                    var s = t(i)[0];
                                    if (s && t(s).hasClass(_)) {
                                        var a = r({}, t(s).data(), t(this).data()),
                                            l = this.getAttribute('data-slide-to');
                                        l && (a.interval = !1),
                                            o._jQueryInterface.call(t(s), a),
                                        l && t(s).data(n).to(l),
                                            e.preventDefault();
                                    }
                                }
                            }),
                            s(o, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return a;
                                    },
                                },
                            ]),
                            o
                    );
                })();
            return (
                t(document).on(
                    d.CLICK_DATA_API,
                    y.DATA_SLIDE,
                    C._dataApiClickHandler
                ),
                    t(window).on(d.LOAD_DATA_API, function () {
                        t(y.DATA_RIDE).each(function () {
                            var e = t(this);
                            C._jQueryInterface.call(e, e.data());
                        });
                    }),
                    (t.fn[e] = C._jQueryInterface),
                    (t.fn[e].Constructor = C),
                    (t.fn[e].noConflict = function () {
                        return (t.fn[e] = o), C._jQueryInterface;
                    }),
                    C
            );
        })(e),
        H = (function (t) {
            var e = 'collapse',
                n = 'bs.collapse',
                i = '.' + n,
                o = t.fn[e],
                a = { toggle: !0, parent: '' },
                l = { toggle: 'boolean', parent: '(string|element)' },
                h = {
                    SHOW: 'show' + i,
                    SHOWN: 'shown' + i,
                    HIDE: 'hide' + i,
                    HIDDEN: 'hidden' + i,
                    CLICK_DATA_API: 'click' + i + '.data-api',
                },
                c = 'show',
                u = 'collapse',
                f = 'collapsing',
                d = 'collapsed',
                _ = 'width',
                g = 'height',
                p = {
                    ACTIVES: '.show, .collapsing',
                    DATA_TOGGLE: '[data-toggle="collapse"]',
                },
                m = (function () {
                    function i(e, n) {
                        (this._isTransitioning = !1),
                            (this._element = e),
                            (this._config = this._getConfig(n)),
                            (this._triggerArray = t.makeArray(
                                t(
                                    '[data-toggle="collapse"][href="#' +
                                    e.id +
                                    '"],[data-toggle="collapse"][data-target="#' +
                                    e.id +
                                    '"]'
                                )
                            ));
                        for (var i = t(p.DATA_TOGGLE), s = 0; s < i.length; s++) {
                            var r = i[s],
                                o = P.getSelectorFromElement(r);
                            null !== o &&
                            t(o).filter(e).length > 0 &&
                            ((this._selector = o), this._triggerArray.push(r));
                        }
                        (this._parent = this._config.parent
                            ? this._getParent()
                            : null),
                        this._config.parent ||
                        this._addAriaAndCollapsedClass(
                            this._element,
                            this._triggerArray
                        ),
                        this._config.toggle && this.toggle();
                    }
                    var o = i.prototype;
                    return (
                        (o.toggle = function () {
                            t(this._element).hasClass(c) ? this.hide() : this.show();
                        }),
                            (o.show = function () {
                                var e,
                                    s,
                                    r = this;
                                if (
                                    !this._isTransitioning &&
                                    !t(this._element).hasClass(c) &&
                                    (this._parent &&
                                    0 ===
                                    (e = t.makeArray(
                                        t(this._parent)
                                            .find(p.ACTIVES)
                                            .filter(
                                                '[data-parent="' +
                                                this._config.parent +
                                                '"]'
                                            )
                                    )).length &&
                                    (e = null),
                                        !(
                                            e &&
                                            (s = t(e).not(this._selector).data(n)) &&
                                            s._isTransitioning
                                        ))
                                ) {
                                    var o = t.Event(h.SHOW);
                                    if (
                                        (t(this._element).trigger(o),
                                            !o.isDefaultPrevented())
                                    ) {
                                        e &&
                                        (i._jQueryInterface.call(
                                            t(e).not(this._selector),
                                            'hide'
                                        ),
                                        s || t(e).data(n, null));
                                        var a = this._getDimension();
                                        t(this._element).removeClass(u).addClass(f),
                                            (this._element.style[a] = 0),
                                        this._triggerArray.length > 0 &&
                                        t(this._triggerArray)
                                            .removeClass(d)
                                            .attr('aria-expanded', !0),
                                            this.setTransitioning(!0);
                                        var l = function () {
                                            t(r._element)
                                                .removeClass(f)
                                                .addClass(u)
                                                .addClass(c),
                                                (r._element.style[a] = ''),
                                                r.setTransitioning(!1),
                                                t(r._element).trigger(h.SHOWN);
                                        };
                                        if (P.supportsTransitionEnd()) {
                                            var _ =
                                                'scroll' + (a[0].toUpperCase() + a.slice(1));
                                            t(this._element)
                                                .one(P.TRANSITION_END, l)
                                                .emulateTransitionEnd(600),
                                                (this._element.style[a] =
                                                    this._element[_] + 'px');
                                        } else l();
                                    }
                                }
                            }),
                            (o.hide = function () {
                                var e = this;
                                if (
                                    !this._isTransitioning &&
                                    t(this._element).hasClass(c)
                                ) {
                                    var n = t.Event(h.HIDE);
                                    if (
                                        (t(this._element).trigger(n),
                                            !n.isDefaultPrevented())
                                    ) {
                                        var i = this._getDimension();
                                        if (
                                            ((this._element.style[i] =
                                                this._element.getBoundingClientRect()[i] +
                                                'px'),
                                                P.reflow(this._element),
                                                t(this._element)
                                                    .addClass(f)
                                                    .removeClass(u)
                                                    .removeClass(c),
                                            this._triggerArray.length > 0)
                                        )
                                            for (
                                                var s = 0;
                                                s < this._triggerArray.length;
                                                s++
                                            ) {
                                                var r = this._triggerArray[s],
                                                    o = P.getSelectorFromElement(r);
                                                if (null !== o)
                                                    t(o).hasClass(c) ||
                                                    t(r)
                                                        .addClass(d)
                                                        .attr('aria-expanded', !1);
                                            }
                                        this.setTransitioning(!0);
                                        var a = function () {
                                            e.setTransitioning(!1),
                                                t(e._element)
                                                    .removeClass(f)
                                                    .addClass(u)
                                                    .trigger(h.HIDDEN);
                                        };
                                        (this._element.style[i] = ''),
                                            P.supportsTransitionEnd()
                                                ? t(this._element)
                                                    .one(P.TRANSITION_END, a)
                                                    .emulateTransitionEnd(600)
                                                : a();
                                    }
                                }
                            }),
                            (o.setTransitioning = function (t) {
                                this._isTransitioning = t;
                            }),
                            (o.dispose = function () {
                                t.removeData(this._element, n),
                                    (this._config = null),
                                    (this._parent = null),
                                    (this._element = null),
                                    (this._triggerArray = null),
                                    (this._isTransitioning = null);
                            }),
                            (o._getConfig = function (t) {
                                return (
                                    ((t = r({}, a, t)).toggle = Boolean(t.toggle)),
                                        P.typeCheckConfig(e, t, l),
                                        t
                                );
                            }),
                            (o._getDimension = function () {
                                return t(this._element).hasClass(_) ? _ : g;
                            }),
                            (o._getParent = function () {
                                var e = this,
                                    n = null;
                                P.isElement(this._config.parent)
                                    ? ((n = this._config.parent),
                                    'undefined' != typeof this._config.parent.jquery &&
                                    (n = this._config.parent[0]))
                                    : (n = t(this._config.parent)[0]);
                                var s =
                                    '[data-toggle="collapse"][data-parent="' +
                                    this._config.parent +
                                    '"]';
                                return (
                                    t(n)
                                        .find(s)
                                        .each(function (t, n) {
                                            e._addAriaAndCollapsedClass(
                                                i._getTargetFromElement(n),
                                                [n]
                                            );
                                        }),
                                        n
                                );
                            }),
                            (o._addAriaAndCollapsedClass = function (e, n) {
                                if (e) {
                                    var i = t(e).hasClass(c);
                                    n.length > 0 &&
                                    t(n).toggleClass(d, !i).attr('aria-expanded', i);
                                }
                            }),
                            (i._getTargetFromElement = function (e) {
                                var n = P.getSelectorFromElement(e);
                                return n ? t(n)[0] : null;
                            }),
                            (i._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var s = t(this),
                                        o = s.data(n),
                                        l = r({}, a, s.data(), 'object' == typeof e && e);
                                    if (
                                        (!o &&
                                        l.toggle &&
                                        /show|hide/.test(e) &&
                                        (l.toggle = !1),
                                        o || ((o = new i(this, l)), s.data(n, o)),
                                        'string' == typeof e)
                                    ) {
                                        if ('undefined' == typeof o[e])
                                            throw new TypeError(
                                                'No method named "' + e + '"'
                                            );
                                        o[e]();
                                    }
                                });
                            }),
                            s(i, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return a;
                                    },
                                },
                            ]),
                            i
                    );
                })();
            return (
                t(document).on(h.CLICK_DATA_API, p.DATA_TOGGLE, function (e) {
                    'A' === e.currentTarget.tagName && e.preventDefault();
                    var i = t(this),
                        s = P.getSelectorFromElement(this);
                    t(s).each(function () {
                        var e = t(this),
                            s = e.data(n) ? 'toggle' : i.data();
                        m._jQueryInterface.call(e, s);
                    });
                }),
                    (t.fn[e] = m._jQueryInterface),
                    (t.fn[e].Constructor = m),
                    (t.fn[e].noConflict = function () {
                        return (t.fn[e] = o), m._jQueryInterface;
                    }),
                    m
            );
        })(e),
        W = (function (t) {
            var e = 'dropdown',
                i = 'bs.dropdown',
                o = '.' + i,
                a = '.data-api',
                l = t.fn[e],
                h = new RegExp('38|40|27'),
                c = {
                    HIDE: 'hide' + o,
                    HIDDEN: 'hidden' + o,
                    SHOW: 'show' + o,
                    SHOWN: 'shown' + o,
                    CLICK: 'click' + o,
                    CLICK_DATA_API: 'click' + o + a,
                    KEYDOWN_DATA_API: 'keydown' + o + a,
                    KEYUP_DATA_API: 'keyup' + o + a,
                },
                u = 'disabled',
                f = 'show',
                d = 'dropup',
                _ = 'dropright',
                g = 'dropleft',
                p = 'dropdown-menu-right',
                m = 'dropdown-menu-left',
                v = 'position-static',
                E = '[data-toggle="dropdown"]',
                T = '.dropdown form',
                y = '.dropdown-menu',
                C = '.navbar-nav',
                I = '.dropdown-menu .dropdown-item:not(.disabled)',
                A = 'top-start',
                b = 'top-end',
                D = 'bottom-start',
                S = 'bottom-end',
                w = 'right-start',
                N = 'left-start',
                O = { offset: 0, flip: !0, boundary: 'scrollParent' },
                k = {
                    offset: '(number|string|function)',
                    flip: 'boolean',
                    boundary: '(string|element)',
                },
                L = (function () {
                    function a(t, e) {
                        (this._element = t),
                            (this._popper = null),
                            (this._config = this._getConfig(e)),
                            (this._menu = this._getMenuElement()),
                            (this._inNavbar = this._detectNavbar()),
                            this._addEventListeners();
                    }
                    var l = a.prototype;
                    return (
                        (l.toggle = function () {
                            if (
                                !this._element.disabled &&
                                !t(this._element).hasClass(u)
                            ) {
                                var e = a._getParentFromElement(this._element),
                                    i = t(this._menu).hasClass(f);
                                if ((a._clearMenus(), !i)) {
                                    var s = { relatedTarget: this._element },
                                        r = t.Event(c.SHOW, s);
                                    if ((t(e).trigger(r), !r.isDefaultPrevented())) {
                                        if (!this._inNavbar) {
                                            if ('undefined' == typeof n)
                                                throw new TypeError(
                                                    'Bootstrap dropdown require Popper.js (https://popper.js.org)'
                                                );
                                            var o = this._element;
                                            t(e).hasClass(d) &&
                                            (t(this._menu).hasClass(m) ||
                                                t(this._menu).hasClass(p)) &&
                                            (o = e),
                                            'scrollParent' !== this._config.boundary &&
                                            t(e).addClass(v),
                                                (this._popper = new n(
                                                    o,
                                                    this._menu,
                                                    this._getPopperConfig()
                                                ));
                                        }
                                        'ontouchstart' in document.documentElement &&
                                        0 === t(e).closest(C).length &&
                                        t('body')
                                            .children()
                                            .on('mouseover', null, t.noop),
                                            this._element.focus(),
                                            this._element.setAttribute(
                                                'aria-expanded',
                                                !0
                                            ),
                                            t(this._menu).toggleClass(f),
                                            t(e)
                                                .toggleClass(f)
                                                .trigger(t.Event(c.SHOWN, s));
                                    }
                                }
                            }
                        }),
                            (l.dispose = function () {
                                t.removeData(this._element, i),
                                    t(this._element).off(o),
                                    (this._element = null),
                                    (this._menu = null),
                                null !== this._popper &&
                                (this._popper.destroy(), (this._popper = null));
                            }),
                            (l.update = function () {
                                (this._inNavbar = this._detectNavbar()),
                                null !== this._popper && this._popper.scheduleUpdate();
                            }),
                            (l._addEventListeners = function () {
                                var e = this;
                                t(this._element).on(c.CLICK, function (t) {
                                    t.preventDefault(), t.stopPropagation(), e.toggle();
                                });
                            }),
                            (l._getConfig = function (n) {
                                return (
                                    (n = r(
                                        {},
                                        this.constructor.Default,
                                        t(this._element).data(),
                                        n
                                    )),
                                        P.typeCheckConfig(e, n, this.constructor.DefaultType),
                                        n
                                );
                            }),
                            (l._getMenuElement = function () {
                                if (!this._menu) {
                                    var e = a._getParentFromElement(this._element);
                                    this._menu = t(e).find(y)[0];
                                }
                                return this._menu;
                            }),
                            (l._getPlacement = function () {
                                var e = t(this._element).parent(),
                                    n = D;
                                return (
                                    e.hasClass(d)
                                        ? ((n = A), t(this._menu).hasClass(p) && (n = b))
                                        : e.hasClass(_)
                                        ? (n = w)
                                        : e.hasClass(g)
                                            ? (n = N)
                                            : t(this._menu).hasClass(p) && (n = S),
                                        n
                                );
                            }),
                            (l._detectNavbar = function () {
                                return t(this._element).closest('.navbar').length > 0;
                            }),
                            (l._getPopperConfig = function () {
                                var t = this,
                                    e = {};
                                return (
                                    'function' == typeof this._config.offset
                                        ? (e.fn = function (e) {
                                            return (
                                                (e.offsets = r(
                                                    {},
                                                    e.offsets,
                                                    t._config.offset(e.offsets) || {}
                                                )),
                                                    e
                                            );
                                        })
                                        : (e.offset = this._config.offset),
                                        {
                                            placement: this._getPlacement(),
                                            modifiers: {
                                                offset: e,
                                                flip: { enabled: this._config.flip },
                                                preventOverflow: {
                                                    boundariesElement: this._config.boundary,
                                                },
                                            },
                                        }
                                );
                            }),
                            (a._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var n = t(this).data(i);
                                    if (
                                        (n ||
                                        ((n = new a(
                                            this,
                                            'object' == typeof e ? e : null
                                        )),
                                            t(this).data(i, n)),
                                        'string' == typeof e)
                                    ) {
                                        if ('undefined' == typeof n[e])
                                            throw new TypeError(
                                                'No method named "' + e + '"'
                                            );
                                        n[e]();
                                    }
                                });
                            }),
                            (a._clearMenus = function (e) {
                                if (
                                    !e ||
                                    (3 !== e.which && ('keyup' !== e.type || 9 === e.which))
                                )
                                    for (
                                        var n = t.makeArray(t(E)), s = 0;
                                        s < n.length;
                                        s++
                                    ) {
                                        var r = a._getParentFromElement(n[s]),
                                            o = t(n[s]).data(i),
                                            l = { relatedTarget: n[s] };
                                        if (o) {
                                            var h = o._menu;
                                            if (
                                                t(r).hasClass(f) &&
                                                !(
                                                    e &&
                                                    (('click' === e.type &&
                                                        /input|textarea/i.test(
                                                            e.target.tagName
                                                        )) ||
                                                        ('keyup' === e.type && 9 === e.which)) &&
                                                    t.contains(r, e.target)
                                                )
                                            ) {
                                                var u = t.Event(c.HIDE, l);
                                                t(r).trigger(u),
                                                u.isDefaultPrevented() ||
                                                ('ontouchstart' in
                                                document.documentElement &&
                                                t('body')
                                                    .children()
                                                    .off('mouseover', null, t.noop),
                                                    n[s].setAttribute(
                                                        'aria-expanded',
                                                        'false'
                                                    ),
                                                    t(h).removeClass(f),
                                                    t(r)
                                                        .removeClass(f)
                                                        .trigger(t.Event(c.HIDDEN, l)));
                                            }
                                        }
                                    }
                            }),
                            (a._getParentFromElement = function (e) {
                                var n,
                                    i = P.getSelectorFromElement(e);
                                return i && (n = t(i)[0]), n || e.parentNode;
                            }),
                            (a._dataApiKeydownHandler = function (e) {
                                if (
                                    (/input|textarea/i.test(e.target.tagName)
                                        ? !(
                                            32 === e.which ||
                                            (27 !== e.which &&
                                                ((40 !== e.which && 38 !== e.which) ||
                                                    t(e.target).closest(y).length))
                                        )
                                        : h.test(e.which)) &&
                                    (e.preventDefault(),
                                        e.stopPropagation(),
                                    !this.disabled && !t(this).hasClass(u))
                                ) {
                                    var n = a._getParentFromElement(this),
                                        i = t(n).hasClass(f);
                                    if (
                                        (i || (27 === e.which && 32 === e.which)) &&
                                        (!i || (27 !== e.which && 32 !== e.which))
                                    ) {
                                        var s = t(n).find(I).get();
                                        if (0 !== s.length) {
                                            var r = s.indexOf(e.target);
                                            38 === e.which && r > 0 && r--,
                                            40 === e.which && r < s.length - 1 && r++,
                                            r < 0 && (r = 0),
                                                s[r].focus();
                                        }
                                    } else {
                                        if (27 === e.which) {
                                            var o = t(n).find(E)[0];
                                            t(o).trigger('focus');
                                        }
                                        t(this).trigger('click');
                                    }
                                }
                            }),
                            s(a, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return O;
                                    },
                                },
                                {
                                    key: 'DefaultType',
                                    get: function () {
                                        return k;
                                    },
                                },
                            ]),
                            a
                    );
                })();
            return (
                t(document)
                    .on(c.KEYDOWN_DATA_API, E, L._dataApiKeydownHandler)
                    .on(c.KEYDOWN_DATA_API, y, L._dataApiKeydownHandler)
                    .on(c.CLICK_DATA_API + ' ' + c.KEYUP_DATA_API, L._clearMenus)
                    .on(c.CLICK_DATA_API, E, function (e) {
                        e.preventDefault(),
                            e.stopPropagation(),
                            L._jQueryInterface.call(t(this), 'toggle');
                    })
                    .on(c.CLICK_DATA_API, T, function (t) {
                        t.stopPropagation();
                    }),
                    (t.fn[e] = L._jQueryInterface),
                    (t.fn[e].Constructor = L),
                    (t.fn[e].noConflict = function () {
                        return (t.fn[e] = l), L._jQueryInterface;
                    }),
                    L
            );
        })(e),
        M = (function (t) {
            var e = 'modal',
                n = 'bs.modal',
                i = '.' + n,
                o = t.fn.modal,
                a = { backdrop: !0, keyboard: !0, focus: !0, show: !0 },
                l = {
                    backdrop: '(boolean|string)',
                    keyboard: 'boolean',
                    focus: 'boolean',
                    show: 'boolean',
                },
                h = {
                    HIDE: 'hide' + i,
                    HIDDEN: 'hidden' + i,
                    SHOW: 'show' + i,
                    SHOWN: 'shown' + i,
                    FOCUSIN: 'focusin' + i,
                    RESIZE: 'resize' + i,
                    CLICK_DISMISS: 'click.dismiss' + i,
                    KEYDOWN_DISMISS: 'keydown.dismiss' + i,
                    MOUSEUP_DISMISS: 'mouseup.dismiss' + i,
                    MOUSEDOWN_DISMISS: 'mousedown.dismiss' + i,
                    CLICK_DATA_API: 'click' + i + '.data-api',
                },
                c = 'modal-scrollbar-measure',
                u = 'modal-backdrop',
                f = 'modal-open',
                d = 'fade',
                _ = 'show',
                g = {
                    DIALOG: '.modal-dialog',
                    DATA_TOGGLE: '[data-toggle="modal"]',
                    DATA_DISMISS: '[data-dismiss="modal"]',
                    FIXED_CONTENT:
                        '.fixed-top, .fixed-bottom, .is-fixed, .sticky-top',
                    STICKY_CONTENT: '.sticky-top',
                    NAVBAR_TOGGLER: '.navbar-toggler',
                },
                p = (function () {
                    function o(e, n) {
                        (this._config = this._getConfig(n)),
                            (this._element = e),
                            (this._dialog = t(e).find(g.DIALOG)[0]),
                            (this._backdrop = null),
                            (this._isShown = !1),
                            (this._isBodyOverflowing = !1),
                            (this._ignoreBackdropClick = !1),
                            (this._originalBodyPadding = 0),
                            (this._scrollbarWidth = 0);
                    }
                    var p = o.prototype;
                    return (
                        (p.toggle = function (t) {
                            return this._isShown ? this.hide() : this.show(t);
                        }),
                            (p.show = function (e) {
                                var n = this;
                                if (!this._isTransitioning && !this._isShown) {
                                    P.supportsTransitionEnd() &&
                                    t(this._element).hasClass(d) &&
                                    (this._isTransitioning = !0);
                                    var i = t.Event(h.SHOW, { relatedTarget: e });
                                    t(this._element).trigger(i),
                                    this._isShown ||
                                    i.isDefaultPrevented() ||
                                    ((this._isShown = !0),
                                        this._checkScrollbar(),
                                        this._setScrollbar(),
                                        this._adjustDialog(),
                                        t(document.body).addClass(f),
                                        this._setEscapeEvent(),
                                        this._setResizeEvent(),
                                        t(this._element).on(
                                            h.CLICK_DISMISS,
                                            g.DATA_DISMISS,
                                            function (t) {
                                                return n.hide(t);
                                            }
                                        ),
                                        t(this._dialog).on(
                                            h.MOUSEDOWN_DISMISS,
                                            function () {
                                                t(n._element).one(
                                                    h.MOUSEUP_DISMISS,
                                                    function (e) {
                                                        t(e.target).is(n._element) &&
                                                        (n._ignoreBackdropClick = !0);
                                                    }
                                                );
                                            }
                                        ),
                                        this._showBackdrop(function () {
                                            return n._showElement(e);
                                        }));
                                }
                            }),
                            (p.hide = function (e) {
                                var n = this;
                                if (
                                    (e && e.preventDefault(),
                                    !this._isTransitioning && this._isShown)
                                ) {
                                    var i = t.Event(h.HIDE);
                                    if (
                                        (t(this._element).trigger(i),
                                        this._isShown && !i.isDefaultPrevented())
                                    ) {
                                        this._isShown = !1;
                                        var s =
                                            P.supportsTransitionEnd() &&
                                            t(this._element).hasClass(d);
                                        s && (this._isTransitioning = !0),
                                            this._setEscapeEvent(),
                                            this._setResizeEvent(),
                                            t(document).off(h.FOCUSIN),
                                            t(this._element).removeClass(_),
                                            t(this._element).off(h.CLICK_DISMISS),
                                            t(this._dialog).off(h.MOUSEDOWN_DISMISS),
                                            s
                                                ? t(this._element)
                                                    .one(P.TRANSITION_END, function (t) {
                                                        return n._hideModal(t);
                                                    })
                                                    .emulateTransitionEnd(300)
                                                : this._hideModal();
                                    }
                                }
                            }),
                            (p.dispose = function () {
                                t.removeData(this._element, n),
                                    t(window, document, this._element, this._backdrop).off(
                                        i
                                    ),
                                    (this._config = null),
                                    (this._element = null),
                                    (this._dialog = null),
                                    (this._backdrop = null),
                                    (this._isShown = null),
                                    (this._isBodyOverflowing = null),
                                    (this._ignoreBackdropClick = null),
                                    (this._scrollbarWidth = null);
                            }),
                            (p.handleUpdate = function () {
                                this._adjustDialog();
                            }),
                            (p._getConfig = function (t) {
                                return (t = r({}, a, t)), P.typeCheckConfig(e, t, l), t;
                            }),
                            (p._showElement = function (e) {
                                var n = this,
                                    i =
                                        P.supportsTransitionEnd() &&
                                        t(this._element).hasClass(d);
                                (this._element.parentNode &&
                                    this._element.parentNode.nodeType ===
                                    Node.ELEMENT_NODE) ||
                                document.body.appendChild(this._element),
                                    (this._element.style.display = 'block'),
                                    this._element.removeAttribute('aria-hidden'),
                                    (this._element.scrollTop = 0),
                                i && P.reflow(this._element),
                                    t(this._element).addClass(_),
                                this._config.focus && this._enforceFocus();
                                var s = t.Event(h.SHOWN, { relatedTarget: e }),
                                    r = function () {
                                        n._config.focus && n._element.focus(),
                                            (n._isTransitioning = !1),
                                            t(n._element).trigger(s);
                                    };
                                i
                                    ? t(this._dialog)
                                        .one(P.TRANSITION_END, r)
                                        .emulateTransitionEnd(300)
                                    : r();
                            }),
                            (p._enforceFocus = function () {
                                var e = this;
                                t(document)
                                    .off(h.FOCUSIN)
                                    .on(h.FOCUSIN, function (n) {
                                        document !== n.target &&
                                        e._element !== n.target &&
                                        0 === t(e._element).has(n.target).length &&
                                        e._element.focus();
                                    });
                            }),
                            (p._setEscapeEvent = function () {
                                var e = this;
                                this._isShown && this._config.keyboard
                                    ? t(this._element).on(h.KEYDOWN_DISMISS, function (t) {
                                        27 === t.which && (t.preventDefault(), e.hide());
                                    })
                                    : this._isShown ||
                                    t(this._element).off(h.KEYDOWN_DISMISS);
                            }),
                            (p._setResizeEvent = function () {
                                var e = this;
                                this._isShown
                                    ? t(window).on(h.RESIZE, function (t) {
                                        return e.handleUpdate(t);
                                    })
                                    : t(window).off(h.RESIZE);
                            }),
                            (p._hideModal = function () {
                                var e = this;
                                (this._element.style.display = 'none'),
                                    this._element.setAttribute('aria-hidden', !0),
                                    (this._isTransitioning = !1),
                                    this._showBackdrop(function () {
                                        t(document.body).removeClass(f),
                                            e._resetAdjustments(),
                                            e._resetScrollbar(),
                                            t(e._element).trigger(h.HIDDEN);
                                    });
                            }),
                            (p._removeBackdrop = function () {
                                this._backdrop &&
                                (t(this._backdrop).remove(), (this._backdrop = null));
                            }),
                            (p._showBackdrop = function (e) {
                                var n = this,
                                    i = t(this._element).hasClass(d) ? d : '';
                                if (this._isShown && this._config.backdrop) {
                                    var s = P.supportsTransitionEnd() && i;
                                    if (
                                        ((this._backdrop = document.createElement('div')),
                                            (this._backdrop.className = u),
                                        i && t(this._backdrop).addClass(i),
                                            t(this._backdrop).appendTo(document.body),
                                            t(this._element).on(h.CLICK_DISMISS, function (t) {
                                                n._ignoreBackdropClick
                                                    ? (n._ignoreBackdropClick = !1)
                                                    : t.target === t.currentTarget &&
                                                    ('static' === n._config.backdrop
                                                        ? n._element.focus()
                                                        : n.hide());
                                            }),
                                        s && P.reflow(this._backdrop),
                                            t(this._backdrop).addClass(_),
                                            !e)
                                    )
                                        return;
                                    if (!s) return void e();
                                    t(this._backdrop)
                                        .one(P.TRANSITION_END, e)
                                        .emulateTransitionEnd(150);
                                } else if (!this._isShown && this._backdrop) {
                                    t(this._backdrop).removeClass(_);
                                    var r = function () {
                                        n._removeBackdrop(), e && e();
                                    };
                                    P.supportsTransitionEnd() &&
                                    t(this._element).hasClass(d)
                                        ? t(this._backdrop)
                                            .one(P.TRANSITION_END, r)
                                            .emulateTransitionEnd(150)
                                        : r();
                                } else e && e();
                            }),
                            (p._adjustDialog = function () {
                                var t =
                                    this._element.scrollHeight >
                                    document.documentElement.clientHeight;
                                !this._isBodyOverflowing &&
                                t &&
                                (this._element.style.paddingLeft =
                                    this._scrollbarWidth + 'px'),
                                this._isBodyOverflowing &&
                                !t &&
                                (this._element.style.paddingRight =
                                    this._scrollbarWidth + 'px');
                            }),
                            (p._resetAdjustments = function () {
                                (this._element.style.paddingLeft = ''),
                                    (this._element.style.paddingRight = '');
                            }),
                            (p._checkScrollbar = function () {
                                var t = document.body.getBoundingClientRect();
                                (this._isBodyOverflowing =
                                    t.left + t.right < window.innerWidth),
                                    (this._scrollbarWidth = this._getScrollbarWidth());
                            }),
                            (p._setScrollbar = function () {
                                var e = this;
                                if (this._isBodyOverflowing) {
                                    t(g.FIXED_CONTENT).each(function (n, i) {
                                        var s = t(i)[0].style.paddingRight,
                                            r = t(i).css('padding-right');
                                        t(i)
                                            .data('padding-right', s)
                                            .css(
                                                'padding-right',
                                                parseFloat(r) + e._scrollbarWidth + 'px'
                                            );
                                    }),
                                        t(g.STICKY_CONTENT).each(function (n, i) {
                                            var s = t(i)[0].style.marginRight,
                                                r = t(i).css('margin-right');
                                            t(i)
                                                .data('margin-right', s)
                                                .css(
                                                    'margin-right',
                                                    parseFloat(r) - e._scrollbarWidth + 'px'
                                                );
                                        }),
                                        t(g.NAVBAR_TOGGLER).each(function (n, i) {
                                            var s = t(i)[0].style.marginRight,
                                                r = t(i).css('margin-right');
                                            t(i)
                                                .data('margin-right', s)
                                                .css(
                                                    'margin-right',
                                                    parseFloat(r) + e._scrollbarWidth + 'px'
                                                );
                                        });
                                    var n = document.body.style.paddingRight,
                                        i = t('body').css('padding-right');
                                    t('body')
                                        .data('padding-right', n)
                                        .css(
                                            'padding-right',
                                            parseFloat(i) + this._scrollbarWidth + 'px'
                                        );
                                }
                            }),
                            (p._resetScrollbar = function () {
                                t(g.FIXED_CONTENT).each(function (e, n) {
                                    var i = t(n).data('padding-right');
                                    'undefined' != typeof i &&
                                    t(n)
                                        .css('padding-right', i)
                                        .removeData('padding-right');
                                }),
                                    t(g.STICKY_CONTENT + ', ' + g.NAVBAR_TOGGLER).each(
                                        function (e, n) {
                                            var i = t(n).data('margin-right');
                                            'undefined' != typeof i &&
                                            t(n)
                                                .css('margin-right', i)
                                                .removeData('margin-right');
                                        }
                                    );
                                var e = t('body').data('padding-right');
                                'undefined' != typeof e &&
                                t('body')
                                    .css('padding-right', e)
                                    .removeData('padding-right');
                            }),
                            (p._getScrollbarWidth = function () {
                                var t = document.createElement('div');
                                (t.className = c), document.body.appendChild(t);
                                var e = t.getBoundingClientRect().width - t.clientWidth;
                                return document.body.removeChild(t), e;
                            }),
                            (o._jQueryInterface = function (e, i) {
                                return this.each(function () {
                                    var s = t(this).data(n),
                                        a = r(
                                            {},
                                            o.Default,
                                            t(this).data(),
                                            'object' == typeof e && e
                                        );
                                    if (
                                        (s || ((s = new o(this, a)), t(this).data(n, s)),
                                        'string' == typeof e)
                                    ) {
                                        if ('undefined' == typeof s[e])
                                            throw new TypeError(
                                                'No method named "' + e + '"'
                                            );
                                        s[e](i);
                                    } else a.show && s.show(i);
                                });
                            }),
                            s(o, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return a;
                                    },
                                },
                            ]),
                            o
                    );
                })();
            return (
                t(document).on(h.CLICK_DATA_API, g.DATA_TOGGLE, function (e) {
                    var i,
                        s = this,
                        o = P.getSelectorFromElement(this);
                    o && (i = t(o)[0]);
                    var a = t(i).data(n)
                        ? 'toggle'
                        : r({}, t(i).data(), t(this).data());
                    ('A' !== this.tagName && 'AREA' !== this.tagName) ||
                    e.preventDefault();
                    var l = t(i).one(h.SHOW, function (e) {
                        e.isDefaultPrevented() ||
                        l.one(h.HIDDEN, function () {
                            t(s).is(':visible') && s.focus();
                        });
                    });
                    p._jQueryInterface.call(t(i), a, this);
                }),
                    (t.fn.modal = p._jQueryInterface),
                    (t.fn.modal.Constructor = p),
                    (t.fn.modal.noConflict = function () {
                        return (t.fn.modal = o), p._jQueryInterface;
                    }),
                    p
            );
        })(e),
        U = (function (t) {
            var e = 'tooltip',
                i = 'bs.tooltip',
                o = '.' + i,
                a = t.fn[e],
                l = new RegExp('(^|\\s)bs-tooltip\\S+', 'g'),
                h = {
                    animation: 'boolean',
                    template: 'string',
                    title: '(string|element|function)',
                    trigger: 'string',
                    delay: '(number|object)',
                    html: 'boolean',
                    selector: '(string|boolean)',
                    placement: '(string|function)',
                    offset: '(number|string)',
                    container: '(string|element|boolean)',
                    fallbackPlacement: '(string|array)',
                    boundary: '(string|element)',
                },
                c = {
                    AUTO: 'auto',
                    TOP: 'top',
                    RIGHT: 'right',
                    BOTTOM: 'bottom',
                    LEFT: 'left',
                },
                u = {
                    animation: !0,
                    template:
                        '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                    trigger: 'hover focus',
                    title: '',
                    delay: 0,
                    html: !1,
                    selector: !1,
                    placement: 'top',
                    offset: 0,
                    container: !1,
                    fallbackPlacement: 'flip',
                    boundary: 'scrollParent',
                },
                f = 'show',
                d = 'out',
                _ = {
                    HIDE: 'hide' + o,
                    HIDDEN: 'hidden' + o,
                    SHOW: 'show' + o,
                    SHOWN: 'shown' + o,
                    INSERTED: 'inserted' + o,
                    CLICK: 'click' + o,
                    FOCUSIN: 'focusin' + o,
                    FOCUSOUT: 'focusout' + o,
                    MOUSEENTER: 'mouseenter' + o,
                    MOUSELEAVE: 'mouseleave' + o,
                },
                g = 'fade',
                p = 'show',
                m = '.tooltip-inner',
                v = '.arrow',
                E = 'hover',
                T = 'focus',
                y = 'click',
                C = 'manual',
                I = (function () {
                    function a(t, e) {
                        if ('undefined' == typeof n)
                            throw new TypeError(
                                'Bootstrap tooltips require Popper.js (https://popper.js.org)'
                            );
                        (this._isEnabled = !0),
                            (this._timeout = 0),
                            (this._hoverState = ''),
                            (this._activeTrigger = {}),
                            (this._popper = null),
                            (this.element = t),
                            (this.config = this._getConfig(e)),
                            (this.tip = null),
                            this._setListeners();
                    }
                    var I = a.prototype;
                    return (
                        (I.enable = function () {
                            this._isEnabled = !0;
                        }),
                            (I.disable = function () {
                                this._isEnabled = !1;
                            }),
                            (I.toggleEnabled = function () {
                                this._isEnabled = !this._isEnabled;
                            }),
                            (I.toggle = function (e) {
                                if (this._isEnabled)
                                    if (e) {
                                        var n = this.constructor.DATA_KEY,
                                            i = t(e.currentTarget).data(n);
                                        i ||
                                        ((i = new this.constructor(
                                            e.currentTarget,
                                            this._getDelegateConfig()
                                        )),
                                            t(e.currentTarget).data(n, i)),
                                            (i._activeTrigger.click =
                                                !i._activeTrigger.click),
                                            i._isWithActiveTrigger()
                                                ? i._enter(null, i)
                                                : i._leave(null, i);
                                    } else {
                                        if (t(this.getTipElement()).hasClass(p))
                                            return void this._leave(null, this);
                                        this._enter(null, this);
                                    }
                            }),
                            (I.dispose = function () {
                                clearTimeout(this._timeout),
                                    t.removeData(this.element, this.constructor.DATA_KEY),
                                    t(this.element).off(this.constructor.EVENT_KEY),
                                    t(this.element).closest('.modal').off('hide.bs.modal'),
                                this.tip && t(this.tip).remove(),
                                    (this._isEnabled = null),
                                    (this._timeout = null),
                                    (this._hoverState = null),
                                    (this._activeTrigger = null),
                                null !== this._popper && this._popper.destroy(),
                                    (this._popper = null),
                                    (this.element = null),
                                    (this.config = null),
                                    (this.tip = null);
                            }),
                            (I.show = function () {
                                var e = this;
                                if ('none' === t(this.element).css('display'))
                                    throw new Error('Please use show on visible elements');
                                var i = t.Event(this.constructor.Event.SHOW);
                                if (this.isWithContent() && this._isEnabled) {
                                    t(this.element).trigger(i);
                                    var s = t.contains(
                                        this.element.ownerDocument.documentElement,
                                        this.element
                                    );
                                    if (i.isDefaultPrevented() || !s) return;
                                    var r = this.getTipElement(),
                                        o = P.getUID(this.constructor.NAME);
                                    r.setAttribute('id', o),
                                        this.element.setAttribute('aria-describedby', o),
                                        this.setContent(),
                                    this.config.animation && t(r).addClass(g);
                                    var l =
                                            'function' == typeof this.config.placement
                                                ? this.config.placement.call(
                                                this,
                                                r,
                                                this.element
                                                )
                                                : this.config.placement,
                                        h = this._getAttachment(l);
                                    this.addAttachmentClass(h);
                                    var c =
                                        !1 === this.config.container
                                            ? document.body
                                            : t(this.config.container);
                                    t(r).data(this.constructor.DATA_KEY, this),
                                    t.contains(
                                        this.element.ownerDocument.documentElement,
                                        this.tip
                                    ) || t(r).appendTo(c),
                                        t(this.element).trigger(
                                            this.constructor.Event.INSERTED
                                        ),
                                        (this._popper = new n(this.element, r, {
                                            placement: h,
                                            modifiers: {
                                                offset: { offset: this.config.offset },
                                                flip: {
                                                    behavior: this.config.fallbackPlacement,
                                                },
                                                arrow: { element: v },
                                                preventOverflow: {
                                                    boundariesElement: this.config.boundary,
                                                },
                                            },
                                            onCreate: function (t) {
                                                t.originalPlacement !== t.placement &&
                                                e._handlePopperPlacementChange(t);
                                            },
                                            onUpdate: function (t) {
                                                e._handlePopperPlacementChange(t);
                                            },
                                        })),
                                        t(r).addClass(p),
                                    'ontouchstart' in document.documentElement &&
                                    t('body')
                                        .children()
                                        .on('mouseover', null, t.noop);
                                    var u = function () {
                                        e.config.animation && e._fixTransition();
                                        var n = e._hoverState;
                                        (e._hoverState = null),
                                            t(e.element).trigger(e.constructor.Event.SHOWN),
                                        n === d && e._leave(null, e);
                                    };
                                    P.supportsTransitionEnd() && t(this.tip).hasClass(g)
                                        ? t(this.tip)
                                            .one(P.TRANSITION_END, u)
                                            .emulateTransitionEnd(a._TRANSITION_DURATION)
                                        : u();
                                }
                            }),
                            (I.hide = function (e) {
                                var n = this,
                                    i = this.getTipElement(),
                                    s = t.Event(this.constructor.Event.HIDE),
                                    r = function () {
                                        n._hoverState !== f &&
                                        i.parentNode &&
                                        i.parentNode.removeChild(i),
                                            n._cleanTipClass(),
                                            n.element.removeAttribute('aria-describedby'),
                                            t(n.element).trigger(n.constructor.Event.HIDDEN),
                                        null !== n._popper && n._popper.destroy(),
                                        e && e();
                                    };
                                t(this.element).trigger(s),
                                s.isDefaultPrevented() ||
                                (t(i).removeClass(p),
                                'ontouchstart' in document.documentElement &&
                                t('body')
                                    .children()
                                    .off('mouseover', null, t.noop),
                                    (this._activeTrigger[y] = !1),
                                    (this._activeTrigger[T] = !1),
                                    (this._activeTrigger[E] = !1),
                                    P.supportsTransitionEnd() && t(this.tip).hasClass(g)
                                        ? t(i)
                                            .one(P.TRANSITION_END, r)
                                            .emulateTransitionEnd(150)
                                        : r(),
                                    (this._hoverState = ''));
                            }),
                            (I.update = function () {
                                null !== this._popper && this._popper.scheduleUpdate();
                            }),
                            (I.isWithContent = function () {
                                return Boolean(this.getTitle());
                            }),
                            (I.addAttachmentClass = function (e) {
                                t(this.getTipElement()).addClass('bs-tooltip-' + e);
                            }),
                            (I.getTipElement = function () {
                                return (
                                    (this.tip = this.tip || t(this.config.template)[0]),
                                        this.tip
                                );
                            }),
                            (I.setContent = function () {
                                var e = t(this.getTipElement());
                                this.setElementContent(e.find(m), this.getTitle()),
                                    e.removeClass(g + ' ' + p);
                            }),
                            (I.setElementContent = function (e, n) {
                                var i = this.config.html;
                                'object' == typeof n && (n.nodeType || n.jquery)
                                    ? i
                                    ? t(n).parent().is(e) || e.empty().append(n)
                                    : e.text(t(n).text())
                                    : e[i ? 'html' : 'text'](n);
                            }),
                            (I.getTitle = function () {
                                var t = this.element.getAttribute('data-original-title');
                                return (
                                    t ||
                                    (t =
                                        'function' == typeof this.config.title
                                            ? this.config.title.call(this.element)
                                            : this.config.title),
                                        t
                                );
                            }),
                            (I._getAttachment = function (t) {
                                return c[t.toUpperCase()];
                            }),
                            (I._setListeners = function () {
                                var e = this;
                                this.config.trigger.split(' ').forEach(function (n) {
                                    if ('click' === n)
                                        t(e.element).on(
                                            e.constructor.Event.CLICK,
                                            e.config.selector,
                                            function (t) {
                                                return e.toggle(t);
                                            }
                                        );
                                    else if (n !== C) {
                                        var i =
                                                n === E
                                                    ? e.constructor.Event.MOUSEENTER
                                                    : e.constructor.Event.FOCUSIN,
                                            s =
                                                n === E
                                                    ? e.constructor.Event.MOUSELEAVE
                                                    : e.constructor.Event.FOCUSOUT;
                                        t(e.element)
                                            .on(i, e.config.selector, function (t) {
                                                return e._enter(t);
                                            })
                                            .on(s, e.config.selector, function (t) {
                                                return e._leave(t);
                                            });
                                    }
                                    t(e.element)
                                        .closest('.modal')
                                        .on('hide.bs.modal', function () {
                                            return e.hide();
                                        });
                                }),
                                    this.config.selector
                                        ? (this.config = r({}, this.config, {
                                            trigger: 'manual',
                                            selector: '',
                                        }))
                                        : this._fixTitle();
                            }),
                            (I._fixTitle = function () {
                                var t = typeof this.element.getAttribute(
                                    'data-original-title'
                                );
                                (this.element.getAttribute('title') || 'string' !== t) &&
                                (this.element.setAttribute(
                                    'data-original-title',
                                    this.element.getAttribute('title') || ''
                                ),
                                    this.element.setAttribute('title', ''));
                            }),
                            (I._enter = function (e, n) {
                                var i = this.constructor.DATA_KEY;
                                (n = n || t(e.currentTarget).data(i)) ||
                                ((n = new this.constructor(
                                    e.currentTarget,
                                    this._getDelegateConfig()
                                )),
                                    t(e.currentTarget).data(i, n)),
                                e &&
                                (n._activeTrigger['focusin' === e.type ? T : E] =
                                    !0),
                                    t(n.getTipElement()).hasClass(p) || n._hoverState === f
                                        ? (n._hoverState = f)
                                        : (clearTimeout(n._timeout),
                                            (n._hoverState = f),
                                            n.config.delay && n.config.delay.show
                                                ? (n._timeout = setTimeout(function () {
                                                    n._hoverState === f && n.show();
                                                }, n.config.delay.show))
                                                : n.show());
                            }),
                            (I._leave = function (e, n) {
                                var i = this.constructor.DATA_KEY;
                                (n = n || t(e.currentTarget).data(i)) ||
                                ((n = new this.constructor(
                                    e.currentTarget,
                                    this._getDelegateConfig()
                                )),
                                    t(e.currentTarget).data(i, n)),
                                e &&
                                (n._activeTrigger['focusout' === e.type ? T : E] =
                                    !1),
                                n._isWithActiveTrigger() ||
                                (clearTimeout(n._timeout),
                                    (n._hoverState = d),
                                    n.config.delay && n.config.delay.hide
                                        ? (n._timeout = setTimeout(function () {
                                            n._hoverState === d && n.hide();
                                        }, n.config.delay.hide))
                                        : n.hide());
                            }),
                            (I._isWithActiveTrigger = function () {
                                for (var t in this._activeTrigger)
                                    if (this._activeTrigger[t]) return !0;
                                return !1;
                            }),
                            (I._getConfig = function (n) {
                                return (
                                    'number' ==
                                    typeof (n = r(
                                        {},
                                        this.constructor.Default,
                                        t(this.element).data(),
                                        n
                                    )).delay &&
                                    (n.delay = { show: n.delay, hide: n.delay }),
                                    'number' == typeof n.title &&
                                    (n.title = n.title.toString()),
                                    'number' == typeof n.content &&
                                    (n.content = n.content.toString()),
                                        P.typeCheckConfig(e, n, this.constructor.DefaultType),
                                        n
                                );
                            }),
                            (I._getDelegateConfig = function () {
                                var t = {};
                                if (this.config)
                                    for (var e in this.config)
                                        this.constructor.Default[e] !== this.config[e] &&
                                        (t[e] = this.config[e]);
                                return t;
                            }),
                            (I._cleanTipClass = function () {
                                var e = t(this.getTipElement()),
                                    n = e.attr('class').match(l);
                                null !== n && n.length > 0 && e.removeClass(n.join(''));
                            }),
                            (I._handlePopperPlacementChange = function (t) {
                                this._cleanTipClass(),
                                    this.addAttachmentClass(
                                        this._getAttachment(t.placement)
                                    );
                            }),
                            (I._fixTransition = function () {
                                var e = this.getTipElement(),
                                    n = this.config.animation;
                                null === e.getAttribute('x-placement') &&
                                (t(e).removeClass(g),
                                    (this.config.animation = !1),
                                    this.hide(),
                                    this.show(),
                                    (this.config.animation = n));
                            }),
                            (a._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var n = t(this).data(i),
                                        s = 'object' == typeof e && e;
                                    if (
                                        (n || !/dispose|hide/.test(e)) &&
                                        (n || ((n = new a(this, s)), t(this).data(i, n)),
                                        'string' == typeof e)
                                    ) {
                                        if ('undefined' == typeof n[e])
                                            throw new TypeError(
                                                'No method named "' + e + '"'
                                            );
                                        n[e]();
                                    }
                                });
                            }),
                            s(a, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return u;
                                    },
                                },
                                {
                                    key: 'NAME',
                                    get: function () {
                                        return e;
                                    },
                                },
                                {
                                    key: 'DATA_KEY',
                                    get: function () {
                                        return i;
                                    },
                                },
                                {
                                    key: 'Event',
                                    get: function () {
                                        return _;
                                    },
                                },
                                {
                                    key: 'EVENT_KEY',
                                    get: function () {
                                        return o;
                                    },
                                },
                                {
                                    key: 'DefaultType',
                                    get: function () {
                                        return h;
                                    },
                                },
                            ]),
                            a
                    );
                })();
            return (
                (t.fn[e] = I._jQueryInterface),
                    (t.fn[e].Constructor = I),
                    (t.fn[e].noConflict = function () {
                        return (t.fn[e] = a), I._jQueryInterface;
                    }),
                    I
            );
        })(e),
        x = (function (t) {
            var e = 'popover',
                n = 'bs.popover',
                i = '.' + n,
                o = t.fn[e],
                a = new RegExp('(^|\\s)bs-popover\\S+', 'g'),
                l = r({}, U.Default, {
                    placement: 'right',
                    trigger: 'click',
                    content: '',
                    template:
                        '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                }),
                h = r({}, U.DefaultType, { content: '(string|element|function)' }),
                c = 'fade',
                u = 'show',
                f = '.popover-header',
                d = '.popover-body',
                _ = {
                    HIDE: 'hide' + i,
                    HIDDEN: 'hidden' + i,
                    SHOW: 'show' + i,
                    SHOWN: 'shown' + i,
                    INSERTED: 'inserted' + i,
                    CLICK: 'click' + i,
                    FOCUSIN: 'focusin' + i,
                    FOCUSOUT: 'focusout' + i,
                    MOUSEENTER: 'mouseenter' + i,
                    MOUSELEAVE: 'mouseleave' + i,
                },
                g = (function (r) {
                    var o, g;
                    function p() {
                        return r.apply(this, arguments) || this;
                    }
                    (g = r),
                        ((o = p).prototype = Object.create(g.prototype)),
                        (o.prototype.constructor = o),
                        (o.__proto__ = g);
                    var m = p.prototype;
                    return (
                        (m.isWithContent = function () {
                            return this.getTitle() || this._getContent();
                        }),
                            (m.addAttachmentClass = function (e) {
                                t(this.getTipElement()).addClass('bs-popover-' + e);
                            }),
                            (m.getTipElement = function () {
                                return (
                                    (this.tip = this.tip || t(this.config.template)[0]),
                                        this.tip
                                );
                            }),
                            (m.setContent = function () {
                                var e = t(this.getTipElement());
                                this.setElementContent(e.find(f), this.getTitle());
                                var n = this._getContent();
                                'function' == typeof n && (n = n.call(this.element)),
                                    this.setElementContent(e.find(d), n),
                                    e.removeClass(c + ' ' + u);
                            }),
                            (m._getContent = function () {
                                return (
                                    this.element.getAttribute('data-content') ||
                                    this.config.content
                                );
                            }),
                            (m._cleanTipClass = function () {
                                var e = t(this.getTipElement()),
                                    n = e.attr('class').match(a);
                                null !== n && n.length > 0 && e.removeClass(n.join(''));
                            }),
                            (p._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var i = t(this).data(n),
                                        s = 'object' == typeof e ? e : null;
                                    if (
                                        (i || !/destroy|hide/.test(e)) &&
                                        (i || ((i = new p(this, s)), t(this).data(n, i)),
                                        'string' == typeof e)
                                    ) {
                                        if ('undefined' == typeof i[e])
                                            throw new TypeError(
                                                'No method named "' + e + '"'
                                            );
                                        i[e]();
                                    }
                                });
                            }),
                            s(p, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return l;
                                    },
                                },
                                {
                                    key: 'NAME',
                                    get: function () {
                                        return e;
                                    },
                                },
                                {
                                    key: 'DATA_KEY',
                                    get: function () {
                                        return n;
                                    },
                                },
                                {
                                    key: 'Event',
                                    get: function () {
                                        return _;
                                    },
                                },
                                {
                                    key: 'EVENT_KEY',
                                    get: function () {
                                        return i;
                                    },
                                },
                                {
                                    key: 'DefaultType',
                                    get: function () {
                                        return h;
                                    },
                                },
                            ]),
                            p
                    );
                })(U);
            return (
                (t.fn[e] = g._jQueryInterface),
                    (t.fn[e].Constructor = g),
                    (t.fn[e].noConflict = function () {
                        return (t.fn[e] = o), g._jQueryInterface;
                    }),
                    g
            );
        })(e),
        K = (function (t) {
            var e = 'scrollspy',
                n = 'bs.scrollspy',
                i = '.' + n,
                o = t.fn[e],
                a = { offset: 10, method: 'auto', target: '' },
                l = {
                    offset: 'number',
                    method: 'string',
                    target: '(string|element)',
                },
                h = {
                    ACTIVATE: 'activate' + i,
                    SCROLL: 'scroll' + i,
                    LOAD_DATA_API: 'load' + i + '.data-api',
                },
                c = 'dropdown-item',
                u = 'active',
                f = {
                    DATA_SPY: '[data-spy="scroll"]',
                    ACTIVE: '.active',
                    NAV_LIST_GROUP: '.nav, .list-group',
                    NAV_LINKS: '.nav-link',
                    NAV_ITEMS: '.nav-item',
                    LIST_ITEMS: '.list-group-item',
                    DROPDOWN: '.dropdown',
                    DROPDOWN_ITEMS: '.dropdown-item',
                    DROPDOWN_TOGGLE: '.dropdown-toggle',
                },
                d = 'offset',
                _ = 'position',
                g = (function () {
                    function o(e, n) {
                        var i = this;
                        (this._element = e),
                            (this._scrollElement = 'BODY' === e.tagName ? window : e),
                            (this._config = this._getConfig(n)),
                            (this._selector =
                                this._config.target +
                                ' ' +
                                f.NAV_LINKS +
                                ',' +
                                this._config.target +
                                ' ' +
                                f.LIST_ITEMS +
                                ',' +
                                this._config.target +
                                ' ' +
                                f.DROPDOWN_ITEMS),
                            (this._offsets = []),
                            (this._targets = []),
                            (this._activeTarget = null),
                            (this._scrollHeight = 0),
                            t(this._scrollElement).on(h.SCROLL, function (t) {
                                return i._process(t);
                            }),
                            this.refresh(),
                            this._process();
                    }
                    var g = o.prototype;
                    return (
                        (g.refresh = function () {
                            var e = this,
                                n =
                                    this._scrollElement === this._scrollElement.window
                                        ? d
                                        : _,
                                i =
                                    'auto' === this._config.method
                                        ? n
                                        : this._config.method,
                                s = i === _ ? this._getScrollTop() : 0;
                            (this._offsets = []),
                                (this._targets = []),
                                (this._scrollHeight = this._getScrollHeight()),
                                t
                                    .makeArray(t(this._selector))
                                    .map(function (e) {
                                        var n,
                                            r = P.getSelectorFromElement(e);
                                        if ((r && (n = t(r)[0]), n)) {
                                            var o = n.getBoundingClientRect();
                                            if (o.width || o.height)
                                                return [t(n)[i]().top + s, r];
                                        }
                                        return null;
                                    })
                                    .filter(function (t) {
                                        return t;
                                    })
                                    .sort(function (t, e) {
                                        return t[0] - e[0];
                                    })
                                    .forEach(function (t) {
                                        e._offsets.push(t[0]), e._targets.push(t[1]);
                                    });
                        }),
                            (g.dispose = function () {
                                t.removeData(this._element, n),
                                    t(this._scrollElement).off(i),
                                    (this._element = null),
                                    (this._scrollElement = null),
                                    (this._config = null),
                                    (this._selector = null),
                                    (this._offsets = null),
                                    (this._targets = null),
                                    (this._activeTarget = null),
                                    (this._scrollHeight = null);
                            }),
                            (g._getConfig = function (n) {
                                if ('string' != typeof (n = r({}, a, n)).target) {
                                    var i = t(n.target).attr('id');
                                    i || ((i = P.getUID(e)), t(n.target).attr('id', i)),
                                        (n.target = '#' + i);
                                }
                                return P.typeCheckConfig(e, n, l), n;
                            }),
                            (g._getScrollTop = function () {
                                return this._scrollElement === window
                                    ? this._scrollElement.pageYOffset
                                    : this._scrollElement.scrollTop;
                            }),
                            (g._getScrollHeight = function () {
                                return (
                                    this._scrollElement.scrollHeight ||
                                    Math.max(
                                        document.body.scrollHeight,
                                        document.documentElement.scrollHeight
                                    )
                                );
                            }),
                            (g._getOffsetHeight = function () {
                                return this._scrollElement === window
                                    ? window.innerHeight
                                    : this._scrollElement.getBoundingClientRect().height;
                            }),
                            (g._process = function () {
                                var t = this._getScrollTop() + this._config.offset,
                                    e = this._getScrollHeight(),
                                    n = this._config.offset + e - this._getOffsetHeight();
                                if ((this._scrollHeight !== e && this.refresh(), t >= n)) {
                                    var i = this._targets[this._targets.length - 1];
                                    this._activeTarget !== i && this._activate(i);
                                } else {
                                    if (
                                        this._activeTarget &&
                                        t < this._offsets[0] &&
                                        this._offsets[0] > 0
                                    )
                                        return (
                                            (this._activeTarget = null), void this._clear()
                                        );
                                    for (var s = this._offsets.length; s--; ) {
                                        this._activeTarget !== this._targets[s] &&
                                        t >= this._offsets[s] &&
                                        ('undefined' == typeof this._offsets[s + 1] ||
                                            t < this._offsets[s + 1]) &&
                                        this._activate(this._targets[s]);
                                    }
                                }
                            }),
                            (g._activate = function (e) {
                                (this._activeTarget = e), this._clear();
                                var n = this._selector.split(',');
                                n = n.map(function (t) {
                                    return (
                                        t +
                                        '[data-target="' +
                                        e +
                                        '"],' +
                                        t +
                                        '[href="' +
                                        e +
                                        '"]'
                                    );
                                });
                                var i = t(n.join(','));
                                i.hasClass(c)
                                    ? (i
                                        .closest(f.DROPDOWN)
                                        .find(f.DROPDOWN_TOGGLE)
                                        .addClass(u),
                                        i.addClass(u))
                                    : (i.addClass(u),
                                        i
                                            .parents(f.NAV_LIST_GROUP)
                                            .prev(f.NAV_LINKS + ', ' + f.LIST_ITEMS)
                                            .addClass(u),
                                        i
                                            .parents(f.NAV_LIST_GROUP)
                                            .prev(f.NAV_ITEMS)
                                            .children(f.NAV_LINKS)
                                            .addClass(u)),
                                    t(this._scrollElement).trigger(h.ACTIVATE, {
                                        relatedTarget: e,
                                    });
                            }),
                            (g._clear = function () {
                                t(this._selector).filter(f.ACTIVE).removeClass(u);
                            }),
                            (o._jQueryInterface = function (e) {
                                return this.each(function () {
                                    var i = t(this).data(n);
                                    if (
                                        (i ||
                                        ((i = new o(this, 'object' == typeof e && e)),
                                            t(this).data(n, i)),
                                        'string' == typeof e)
                                    ) {
                                        if ('undefined' == typeof i[e])
                                            throw new TypeError(
                                                'No method named "' + e + '"'
                                            );
                                        i[e]();
                                    }
                                });
                            }),
                            s(o, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                                {
                                    key: 'Default',
                                    get: function () {
                                        return a;
                                    },
                                },
                            ]),
                            o
                    );
                })();
            return (
                t(window).on(h.LOAD_DATA_API, function () {
                    for (var e = t.makeArray(t(f.DATA_SPY)), n = e.length; n--; ) {
                        var i = t(e[n]);
                        g._jQueryInterface.call(i, i.data());
                    }
                }),
                    (t.fn[e] = g._jQueryInterface),
                    (t.fn[e].Constructor = g),
                    (t.fn[e].noConflict = function () {
                        return (t.fn[e] = o), g._jQueryInterface;
                    }),
                    g
            );
        })(e),
        V = (function (t) {
            var e = 'bs.tab',
                n = '.' + e,
                i = t.fn.tab,
                r = {
                    HIDE: 'hide' + n,
                    HIDDEN: 'hidden' + n,
                    SHOW: 'show' + n,
                    SHOWN: 'shown' + n,
                    CLICK_DATA_API: 'click.bs.tab.data-api',
                },
                o = 'dropdown-menu',
                a = 'active',
                l = 'disabled',
                h = 'fade',
                c = 'show',
                u = '.dropdown',
                f = '.nav, .list-group',
                d = '.active',
                _ = '> li > .active',
                g =
                    '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
                p = '.dropdown-toggle',
                m = '> .dropdown-menu .active',
                v = (function () {
                    function n(t) {
                        this._element = t;
                    }
                    var i = n.prototype;
                    return (
                        (i.show = function () {
                            var e = this;
                            if (
                                !(
                                    (this._element.parentNode &&
                                        this._element.parentNode.nodeType ===
                                        Node.ELEMENT_NODE &&
                                        t(this._element).hasClass(a)) ||
                                    t(this._element).hasClass(l)
                                )
                            ) {
                                var n,
                                    i,
                                    s = t(this._element).closest(f)[0],
                                    o = P.getSelectorFromElement(this._element);
                                if (s) {
                                    var h = 'UL' === s.nodeName ? _ : d;
                                    i = (i = t.makeArray(t(s).find(h)))[i.length - 1];
                                }
                                var c = t.Event(r.HIDE, {
                                        relatedTarget: this._element,
                                    }),
                                    u = t.Event(r.SHOW, { relatedTarget: i });
                                if (
                                    (i && t(i).trigger(c),
                                        t(this._element).trigger(u),
                                    !u.isDefaultPrevented() && !c.isDefaultPrevented())
                                ) {
                                    o && (n = t(o)[0]), this._activate(this._element, s);
                                    var g = function () {
                                        var n = t.Event(r.HIDDEN, {
                                                relatedTarget: e._element,
                                            }),
                                            s = t.Event(r.SHOWN, { relatedTarget: i });
                                        t(i).trigger(n), t(e._element).trigger(s);
                                    };
                                    n ? this._activate(n, n.parentNode, g) : g();
                                }
                            }
                        }),
                            (i.dispose = function () {
                                t.removeData(this._element, e), (this._element = null);
                            }),
                            (i._activate = function (e, n, i) {
                                var s = this,
                                    r = (
                                        'UL' === n.nodeName ? t(n).find(_) : t(n).children(d)
                                    )[0],
                                    o =
                                        i &&
                                        P.supportsTransitionEnd() &&
                                        r &&
                                        t(r).hasClass(h),
                                    a = function () {
                                        return s._transitionComplete(e, r, i);
                                    };
                                r && o
                                    ? t(r)
                                        .one(P.TRANSITION_END, a)
                                        .emulateTransitionEnd(150)
                                    : a();
                            }),
                            (i._transitionComplete = function (e, n, i) {
                                if (n) {
                                    t(n).removeClass(c + ' ' + a);
                                    var s = t(n.parentNode).find(m)[0];
                                    s && t(s).removeClass(a),
                                    'tab' === n.getAttribute('role') &&
                                    n.setAttribute('aria-selected', !1);
                                }
                                if (
                                    (t(e).addClass(a),
                                    'tab' === e.getAttribute('role') &&
                                    e.setAttribute('aria-selected', !0),
                                        P.reflow(e),
                                        t(e).addClass(c),
                                    e.parentNode && t(e.parentNode).hasClass(o))
                                ) {
                                    var r = t(e).closest(u)[0];
                                    r && t(r).find(p).addClass(a),
                                        e.setAttribute('aria-expanded', !0);
                                }
                                i && i();
                            }),
                            (n._jQueryInterface = function (i) {
                                return this.each(function () {
                                    var s = t(this),
                                        r = s.data(e);
                                    if (
                                        (r || ((r = new n(this)), s.data(e, r)),
                                        'string' == typeof i)
                                    ) {
                                        if ('undefined' == typeof r[i])
                                            throw new TypeError(
                                                'No method named "' + i + '"'
                                            );
                                        r[i]();
                                    }
                                });
                            }),
                            s(n, null, [
                                {
                                    key: 'VERSION',
                                    get: function () {
                                        return '4.0.0';
                                    },
                                },
                            ]),
                            n
                    );
                })();
            return (
                t(document).on(r.CLICK_DATA_API, g, function (e) {
                    e.preventDefault(), v._jQueryInterface.call(t(this), 'show');
                }),
                    (t.fn.tab = v._jQueryInterface),
                    (t.fn.tab.Constructor = v),
                    (t.fn.tab.noConflict = function () {
                        return (t.fn.tab = i), v._jQueryInterface;
                    }),
                    v
            );
        })(e);
    !(function (t) {
        if ('undefined' == typeof t)
            throw new TypeError(
                "Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript."
            );
        var e = t.fn.jquery.split(' ')[0].split('.');
        if (
            (e[0] < 2 && e[1] < 9) ||
            (1 === e[0] && 9 === e[1] && e[2] < 1) ||
            e[0] >= 4
        )
            throw new Error(
                "Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0"
            );
    })(e),
        (t.Util = P),
        (t.Alert = L),
        (t.Button = R),
        (t.Carousel = j),
        (t.Collapse = H),
        (t.Dropdown = W),
        (t.Modal = M),
        (t.Popover = x),
        (t.Scrollspy = K),
        (t.Tab = V),
        (t.Tooltip = U),
        Object.defineProperty(t, '__esModule', { value: !0 });
});

//# sourceMappingURL=bootstrap.min.js.map

/*
 Copyright (C) Federico Zivolo 2017
 Distributed under the MIT License (license terms are at http://opensource.org/licenses/MIT).
 */ (function (e, t) {
    'object' == typeof exports && 'undefined' != typeof module
        ? (module.exports = t())
        : 'function' == typeof define && define.amd
        ? define(t)
        : (e.Popper = t());
})(this, function () {
    'use strict';
    function e(e) {
        return e && '[object Function]' === {}.toString.call(e);
    }
    function t(e, t) {
        if (1 !== e.nodeType) return [];
        var o = getComputedStyle(e, null);
        return t ? o[t] : o;
    }
    function o(e) {
        return 'HTML' === e.nodeName ? e : e.parentNode || e.host;
    }
    function n(e) {
        if (!e) return document.body;
        switch (e.nodeName) {
            case 'HTML':
            case 'BODY':
                return e.ownerDocument.body;
            case '#document':
                return e.body;
        }
        var i = t(e),
            r = i.overflow,
            p = i.overflowX,
            s = i.overflowY;
        return /(auto|scroll)/.test(r + s + p) ? e : n(o(e));
    }
    function r(e) {
        var o = e && e.offsetParent,
            i = o && o.nodeName;
        return i && 'BODY' !== i && 'HTML' !== i
            ? -1 !== ['TD', 'TABLE'].indexOf(o.nodeName) &&
            'static' === t(o, 'position')
                ? r(o)
                : o
            : e
                ? e.ownerDocument.documentElement
                : document.documentElement;
    }
    function p(e) {
        var t = e.nodeName;
        return 'BODY' !== t && ('HTML' === t || r(e.firstElementChild) === e);
    }
    function s(e) {
        return null === e.parentNode ? e : s(e.parentNode);
    }
    function d(e, t) {
        if (!e || !e.nodeType || !t || !t.nodeType)
            return document.documentElement;
        var o = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
            i = o ? e : t,
            n = o ? t : e,
            a = document.createRange();
        a.setStart(i, 0), a.setEnd(n, 0);
        var l = a.commonAncestorContainer;
        if ((e !== l && t !== l) || i.contains(n)) return p(l) ? l : r(l);
        var f = s(e);
        return f.host ? d(f.host, t) : d(e, s(t).host);
    }
    function a(e) {
        var t =
                1 < arguments.length && void 0 !== arguments[1]
                    ? arguments[1]
                    : 'top',
            o = 'top' === t ? 'scrollTop' : 'scrollLeft',
            i = e.nodeName;
        if ('BODY' === i || 'HTML' === i) {
            var n = e.ownerDocument.documentElement,
                r = e.ownerDocument.scrollingElement || n;
            return r[o];
        }
        return e[o];
    }
    function l(e, t) {
        var o = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
            i = a(t, 'top'),
            n = a(t, 'left'),
            r = o ? -1 : 1;
        return (
            (e.top += i * r),
                (e.bottom += i * r),
                (e.left += n * r),
                (e.right += n * r),
                e
        );
    }
    function f(e, t) {
        var o = 'x' === t ? 'Left' : 'Top',
            i = 'Left' == o ? 'Right' : 'Bottom';
        return (
            parseFloat(e['border' + o + 'Width'], 10) +
            parseFloat(e['border' + i + 'Width'], 10)
        );
    }
    function m(e, t, o, i) {
        return J(
            t['offset' + e],
            t['scroll' + e],
            o['client' + e],
            o['offset' + e],
            o['scroll' + e],
            ie()
                ? o['offset' + e] +
                i['margin' + ('Height' === e ? 'Top' : 'Left')] +
                i['margin' + ('Height' === e ? 'Bottom' : 'Right')]
                : 0
        );
    }
    function h() {
        var e = document.body,
            t = document.documentElement,
            o = ie() && getComputedStyle(t);
        return { height: m('Height', e, t, o), width: m('Width', e, t, o) };
    }
    function c(e) {
        return se({}, e, { right: e.left + e.width, bottom: e.top + e.height });
    }
    function g(e) {
        var o = {};
        if (ie())
            try {
                o = e.getBoundingClientRect();
                var i = a(e, 'top'),
                    n = a(e, 'left');
                (o.top += i), (o.left += n), (o.bottom += i), (o.right += n);
            } catch (e) {}
        else o = e.getBoundingClientRect();
        var r = {
                left: o.left,
                top: o.top,
                width: o.right - o.left,
                height: o.bottom - o.top,
            },
            p = 'HTML' === e.nodeName ? h() : {},
            s = p.width || e.clientWidth || r.right - r.left,
            d = p.height || e.clientHeight || r.bottom - r.top,
            l = e.offsetWidth - s,
            m = e.offsetHeight - d;
        if (l || m) {
            var g = t(e);
            (l -= f(g, 'x')), (m -= f(g, 'y')), (r.width -= l), (r.height -= m);
        }
        return c(r);
    }
    function u(e, o) {
        var i = ie(),
            r = 'HTML' === o.nodeName,
            p = g(e),
            s = g(o),
            d = n(e),
            a = t(o),
            f = parseFloat(a.borderTopWidth, 10),
            m = parseFloat(a.borderLeftWidth, 10),
            h = c({
                top: p.top - s.top - f,
                left: p.left - s.left - m,
                width: p.width,
                height: p.height,
            });
        if (((h.marginTop = 0), (h.marginLeft = 0), !i && r)) {
            var u = parseFloat(a.marginTop, 10),
                b = parseFloat(a.marginLeft, 10);
            (h.top -= f - u),
                (h.bottom -= f - u),
                (h.left -= m - b),
                (h.right -= m - b),
                (h.marginTop = u),
                (h.marginLeft = b);
        }
        return (
            (i ? o.contains(d) : o === d && 'BODY' !== d.nodeName) &&
            (h = l(h, o)),
                h
        );
    }
    function b(e) {
        var t = e.ownerDocument.documentElement,
            o = u(e, t),
            i = J(t.clientWidth, window.innerWidth || 0),
            n = J(t.clientHeight, window.innerHeight || 0),
            r = a(t),
            p = a(t, 'left'),
            s = {
                top: r - o.top + o.marginTop,
                left: p - o.left + o.marginLeft,
                width: i,
                height: n,
            };
        return c(s);
    }
    function w(e) {
        var i = e.nodeName;
        return 'BODY' === i || 'HTML' === i
            ? !1
            : 'fixed' === t(e, 'position') || w(o(e));
    }
    function y(e, t, i, r) {
        var p = { top: 0, left: 0 },
            s = d(e, t);
        if ('viewport' === r) p = b(s);
        else {
            var a;
            'scrollParent' === r
                ? ((a = n(o(t))),
                'BODY' === a.nodeName && (a = e.ownerDocument.documentElement))
                : 'window' === r
                ? (a = e.ownerDocument.documentElement)
                : (a = r);
            var l = u(a, s);
            if ('HTML' === a.nodeName && !w(s)) {
                var f = h(),
                    m = f.height,
                    c = f.width;
                (p.top += l.top - l.marginTop),
                    (p.bottom = m + l.top),
                    (p.left += l.left - l.marginLeft),
                    (p.right = c + l.left);
            } else p = l;
        }
        return (p.left += i), (p.top += i), (p.right -= i), (p.bottom -= i), p;
    }
    function E(e) {
        var t = e.width,
            o = e.height;
        return t * o;
    }
    function v(e, t, o, i, n) {
        var r =
            5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
        if (-1 === e.indexOf('auto')) return e;
        var p = y(o, i, r, n),
            s = {
                top: { width: p.width, height: t.top - p.top },
                right: { width: p.right - t.right, height: p.height },
                bottom: { width: p.width, height: p.bottom - t.bottom },
                left: { width: t.left - p.left, height: p.height },
            },
            d = Object.keys(s)
                .map(function (e) {
                    return se({ key: e }, s[e], { area: E(s[e]) });
                })
                .sort(function (e, t) {
                    return t.area - e.area;
                }),
            a = d.filter(function (e) {
                var t = e.width,
                    i = e.height;
                return t >= o.clientWidth && i >= o.clientHeight;
            }),
            l = 0 < a.length ? a[0].key : d[0].key,
            f = e.split('-')[1];
        return l + (f ? '-' + f : '');
    }
    function O(e, t, o) {
        var i = d(t, o);
        return u(o, i);
    }
    function L(e) {
        var t = getComputedStyle(e),
            o = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
            i = parseFloat(t.marginLeft) + parseFloat(t.marginRight),
            n = { width: e.offsetWidth + i, height: e.offsetHeight + o };
        return n;
    }
    function x(e) {
        var t = { left: 'right', right: 'left', bottom: 'top', top: 'bottom' };
        return e.replace(/left|right|bottom|top/g, function (e) {
            return t[e];
        });
    }
    function S(e, t, o) {
        o = o.split('-')[0];
        var i = L(e),
            n = { width: i.width, height: i.height },
            r = -1 !== ['right', 'left'].indexOf(o),
            p = r ? 'top' : 'left',
            s = r ? 'left' : 'top',
            d = r ? 'height' : 'width',
            a = r ? 'width' : 'height';
        return (
            (n[p] = t[p] + t[d] / 2 - i[d] / 2),
                (n[s] = o === s ? t[s] - i[a] : t[x(s)]),
                n
        );
    }
    function T(e, t) {
        return Array.prototype.find ? e.find(t) : e.filter(t)[0];
    }
    function D(e, t, o) {
        if (Array.prototype.findIndex)
            return e.findIndex(function (e) {
                return e[t] === o;
            });
        var i = T(e, function (e) {
            return e[t] === o;
        });
        return e.indexOf(i);
    }
    function C(t, o, i) {
        var n = void 0 === i ? t : t.slice(0, D(t, 'name', i));
        return (
            n.forEach(function (t) {
                t['function'] &&
                console.warn(
                    '`modifier.function` is deprecated, use `modifier.fn`!'
                );
                var i = t['function'] || t.fn;
                t.enabled &&
                e(i) &&
                ((o.offsets.popper = c(o.offsets.popper)),
                    (o.offsets.reference = c(o.offsets.reference)),
                    (o = i(o, t)));
            }),
                o
        );
    }
    function N() {
        if (!this.state.isDestroyed) {
            var e = {
                instance: this,
                styles: {},
                arrowStyles: {},
                attributes: {},
                flipped: !1,
                offsets: {},
            };
            (e.offsets.reference = O(this.state, this.popper, this.reference)),
                (e.placement = v(
                    this.options.placement,
                    e.offsets.reference,
                    this.popper,
                    this.reference,
                    this.options.modifiers.flip.boundariesElement,
                    this.options.modifiers.flip.padding
                )),
                (e.originalPlacement = e.placement),
                (e.offsets.popper = S(
                    this.popper,
                    e.offsets.reference,
                    e.placement
                )),
                (e.offsets.popper.position = 'absolute'),
                (e = C(this.modifiers, e)),
                this.state.isCreated
                    ? this.options.onUpdate(e)
                    : ((this.state.isCreated = !0), this.options.onCreate(e));
        }
    }
    function k(e, t) {
        return e.some(function (e) {
            var o = e.name,
                i = e.enabled;
            return i && o === t;
        });
    }
    function W(e) {
        for (
            var t = [!1, 'ms', 'Webkit', 'Moz', 'O'],
                o = e.charAt(0).toUpperCase() + e.slice(1),
                n = 0;
            n < t.length - 1;
            n++
        ) {
            var i = t[n],
                r = i ? '' + i + o : e;
            if ('undefined' != typeof document.body.style[r]) return r;
        }
        return null;
    }
    function P() {
        return (
            (this.state.isDestroyed = !0),
            k(this.modifiers, 'applyStyle') &&
            (this.popper.removeAttribute('x-placement'),
                (this.popper.style.left = ''),
                (this.popper.style.position = ''),
                (this.popper.style.top = ''),
                (this.popper.style[W('transform')] = '')),
                this.disableEventListeners(),
            this.options.removeOnDestroy &&
            this.popper.parentNode.removeChild(this.popper),
                this
        );
    }
    function B(e) {
        var t = e.ownerDocument;
        return t ? t.defaultView : window;
    }
    function H(e, t, o, i) {
        var r = 'BODY' === e.nodeName,
            p = r ? e.ownerDocument.defaultView : e;
        p.addEventListener(t, o, { passive: !0 }),
        r || H(n(p.parentNode), t, o, i),
            i.push(p);
    }
    function A(e, t, o, i) {
        (o.updateBound = i),
            B(e).addEventListener('resize', o.updateBound, { passive: !0 });
        var r = n(e);
        return (
            H(r, 'scroll', o.updateBound, o.scrollParents),
                (o.scrollElement = r),
                (o.eventsEnabled = !0),
                o
        );
    }
    function I() {
        this.state.eventsEnabled ||
        (this.state = A(
            this.reference,
            this.options,
            this.state,
            this.scheduleUpdate
        ));
    }
    function M(e, t) {
        return (
            B(e).removeEventListener('resize', t.updateBound),
                t.scrollParents.forEach(function (e) {
                    e.removeEventListener('scroll', t.updateBound);
                }),
                (t.updateBound = null),
                (t.scrollParents = []),
                (t.scrollElement = null),
                (t.eventsEnabled = !1),
                t
        );
    }
    function R() {
        this.state.eventsEnabled &&
        (cancelAnimationFrame(this.scheduleUpdate),
            (this.state = M(this.reference, this.state)));
    }
    function U(e) {
        return '' !== e && !isNaN(parseFloat(e)) && isFinite(e);
    }
    function Y(e, t) {
        Object.keys(t).forEach(function (o) {
            var i = '';
            -1 !==
            ['width', 'height', 'top', 'right', 'bottom', 'left'].indexOf(o) &&
            U(t[o]) &&
            (i = 'px'),
                (e.style[o] = t[o] + i);
        });
    }
    function j(e, t) {
        Object.keys(t).forEach(function (o) {
            var i = t[o];
            !1 === i ? e.removeAttribute(o) : e.setAttribute(o, t[o]);
        });
    }
    function F(e, t, o) {
        var i = T(e, function (e) {
                var o = e.name;
                return o === t;
            }),
            n =
                !!i &&
                e.some(function (e) {
                    return e.name === o && e.enabled && e.order < i.order;
                });
        if (!n) {
            var r = '`' + t + '`';
            console.warn(
                '`' +
                o +
                '`' +
                ' modifier is required by ' +
                r +
                ' modifier in order to work, be sure to include it before ' +
                r +
                '!'
            );
        }
        return n;
    }
    function K(e) {
        return 'end' === e ? 'start' : 'start' === e ? 'end' : e;
    }
    function q(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
            o = ae.indexOf(e),
            i = ae.slice(o + 1).concat(ae.slice(0, o));
        return t ? i.reverse() : i;
    }
    function V(e, t, o, i) {
        var n = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
            r = +n[1],
            p = n[2];
        if (!r) return e;
        if (0 === p.indexOf('%')) {
            var s;
            switch (p) {
                case '%p':
                    s = o;
                    break;
                case '%':
                case '%r':
                default:
                    s = i;
            }
            var d = c(s);
            return (d[t] / 100) * r;
        }
        if ('vh' === p || 'vw' === p) {
            var a;
            return (
                (a =
                    'vh' === p
                        ? J(
                        document.documentElement.clientHeight,
                        window.innerHeight || 0
                        )
                        : J(
                        document.documentElement.clientWidth,
                        window.innerWidth || 0
                        )),
                (a / 100) * r
            );
        }
        return r;
    }
    function z(e, t, o, i) {
        var n = [0, 0],
            r = -1 !== ['right', 'left'].indexOf(i),
            p = e.split(/(\+|\-)/).map(function (e) {
                return e.trim();
            }),
            s = p.indexOf(
                T(p, function (e) {
                    return -1 !== e.search(/,|\s/);
                })
            );
        p[s] &&
        -1 === p[s].indexOf(',') &&
        console.warn(
            'Offsets separated by white space(s) are deprecated, use a comma (,) instead.'
        );
        var d = /\s*,\s*|\s+/,
            a =
                -1 === s
                    ? [p]
                    : [
                        p.slice(0, s).concat([p[s].split(d)[0]]),
                        [p[s].split(d)[1]].concat(p.slice(s + 1)),
                    ];
        return (
            (a = a.map(function (e, i) {
                var n = (1 === i ? !r : r) ? 'height' : 'width',
                    p = !1;
                return e
                    .reduce(function (e, t) {
                        return '' === e[e.length - 1] && -1 !== ['+', '-'].indexOf(t)
                            ? ((e[e.length - 1] = t), (p = !0), e)
                            : p
                                ? ((e[e.length - 1] += t), (p = !1), e)
                                : e.concat(t);
                    }, [])
                    .map(function (e) {
                        return V(e, n, t, o);
                    });
            })),
                a.forEach(function (e, t) {
                    e.forEach(function (o, i) {
                        U(o) && (n[t] += o * ('-' === e[i - 1] ? -1 : 1));
                    });
                }),
                n
        );
    }
    function G(e, t) {
        var o,
            i = t.offset,
            n = e.placement,
            r = e.offsets,
            p = r.popper,
            s = r.reference,
            d = n.split('-')[0];
        return (
            (o = U(+i) ? [+i, 0] : z(i, p, s, d)),
                'left' === d
                    ? ((p.top += o[0]), (p.left -= o[1]))
                    : 'right' === d
                    ? ((p.top += o[0]), (p.left += o[1]))
                    : 'top' === d
                        ? ((p.left += o[0]), (p.top -= o[1]))
                        : 'bottom' === d && ((p.left += o[0]), (p.top += o[1])),
                (e.popper = p),
                e
        );
    }
    for (
        var _ = Math.min,
            X = Math.floor,
            J = Math.max,
            Q = 'undefined' != typeof window && 'undefined' != typeof document,
            Z = ['Edge', 'Trident', 'Firefox'],
            $ = 0,
            ee = 0;
        ee < Z.length;
        ee += 1
    )
        if (Q && 0 <= navigator.userAgent.indexOf(Z[ee])) {
            $ = 1;
            break;
        }
    var i,
        te = Q && window.Promise,
        oe = te
            ? function (e) {
                var t = !1;
                return function () {
                    t ||
                    ((t = !0),
                        window.Promise.resolve().then(function () {
                            (t = !1), e();
                        }));
                };
            }
            : function (e) {
                var t = !1;
                return function () {
                    t ||
                    ((t = !0),
                        setTimeout(function () {
                            (t = !1), e();
                        }, $));
                };
            },
        ie = function () {
            return (
                void 0 == i && (i = -1 !== navigator.appVersion.indexOf('MSIE 10')),
                    i
            );
        },
        ne = function (e, t) {
            if (!(e instanceof t))
                throw new TypeError('Cannot call a class as a function');
        },
        re = (function () {
            function e(e, t) {
                for (var o, n = 0; n < t.length; n++)
                    (o = t[n]),
                        (o.enumerable = o.enumerable || !1),
                        (o.configurable = !0),
                    'value' in o && (o.writable = !0),
                        Object.defineProperty(e, o.key, o);
            }
            return function (t, o, i) {
                return o && e(t.prototype, o), i && e(t, i), t;
            };
        })(),
        pe = function (e, t, o) {
            return (
                t in e
                    ? Object.defineProperty(e, t, {
                        value: o,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                    })
                    : (e[t] = o),
                    e
            );
        },
        se =
            Object.assign ||
            function (e) {
                for (var t, o = 1; o < arguments.length; o++)
                    for (var i in ((t = arguments[o]), t))
                        Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
                return e;
            },
        de = [
            'auto-start',
            'auto',
            'auto-end',
            'top-start',
            'top',
            'top-end',
            'right-start',
            'right',
            'right-end',
            'bottom-end',
            'bottom',
            'bottom-start',
            'left-end',
            'left',
            'left-start',
        ],
        ae = de.slice(3),
        le = {
            FLIP: 'flip',
            CLOCKWISE: 'clockwise',
            COUNTERCLOCKWISE: 'counterclockwise',
        },
        fe = (function () {
            function t(o, i) {
                var n = this,
                    r =
                        2 < arguments.length && void 0 !== arguments[2]
                            ? arguments[2]
                            : {};
                ne(this, t),
                    (this.scheduleUpdate = function () {
                        return requestAnimationFrame(n.update);
                    }),
                    (this.update = oe(this.update.bind(this))),
                    (this.options = se({}, t.Defaults, r)),
                    (this.state = {
                        isDestroyed: !1,
                        isCreated: !1,
                        scrollParents: [],
                    }),
                    (this.reference = o && o.jquery ? o[0] : o),
                    (this.popper = i && i.jquery ? i[0] : i),
                    (this.options.modifiers = {}),
                    Object.keys(se({}, t.Defaults.modifiers, r.modifiers)).forEach(
                        function (e) {
                            n.options.modifiers[e] = se(
                                {},
                                t.Defaults.modifiers[e] || {},
                                r.modifiers ? r.modifiers[e] : {}
                            );
                        }
                    ),
                    (this.modifiers = Object.keys(this.options.modifiers)
                        .map(function (e) {
                            return se({ name: e }, n.options.modifiers[e]);
                        })
                        .sort(function (e, t) {
                            return e.order - t.order;
                        })),
                    this.modifiers.forEach(function (t) {
                        t.enabled &&
                        e(t.onLoad) &&
                        t.onLoad(n.reference, n.popper, n.options, t, n.state);
                    }),
                    this.update();
                var p = this.options.eventsEnabled;
                p && this.enableEventListeners(), (this.state.eventsEnabled = p);
            }
            return (
                re(t, [
                    {
                        key: 'update',
                        value: function () {
                            return N.call(this);
                        },
                    },
                    {
                        key: 'destroy',
                        value: function () {
                            return P.call(this);
                        },
                    },
                    {
                        key: 'enableEventListeners',
                        value: function () {
                            return I.call(this);
                        },
                    },
                    {
                        key: 'disableEventListeners',
                        value: function () {
                            return R.call(this);
                        },
                    },
                ]),
                    t
            );
        })();
    return (
        (fe.Utils = ('undefined' == typeof window ? global : window).PopperUtils),
            (fe.placements = de),
            (fe.Defaults = {
                placement: 'bottom',
                eventsEnabled: !0,
                removeOnDestroy: !1,
                onCreate: function () {},
                onUpdate: function () {},
                modifiers: {
                    shift: {
                        order: 100,
                        enabled: !0,
                        fn: function (e) {
                            var t = e.placement,
                                o = t.split('-')[0],
                                i = t.split('-')[1];
                            if (i) {
                                var n = e.offsets,
                                    r = n.reference,
                                    p = n.popper,
                                    s = -1 !== ['bottom', 'top'].indexOf(o),
                                    d = s ? 'left' : 'top',
                                    a = s ? 'width' : 'height',
                                    l = {
                                        start: pe({}, d, r[d]),
                                        end: pe({}, d, r[d] + r[a] - p[a]),
                                    };
                                e.offsets.popper = se({}, p, l[i]);
                            }
                            return e;
                        },
                    },
                    offset: { order: 200, enabled: !0, fn: G, offset: 0 },
                    preventOverflow: {
                        order: 300,
                        enabled: !0,
                        fn: function (e, t) {
                            var o = t.boundariesElement || r(e.instance.popper);
                            e.instance.reference === o && (o = r(o));
                            var i = y(
                                e.instance.popper,
                                e.instance.reference,
                                t.padding,
                                o
                            );
                            t.boundaries = i;
                            var n = t.priority,
                                p = e.offsets.popper,
                                s = {
                                    primary: function (e) {
                                        var o = p[e];
                                        return (
                                            p[e] < i[e] &&
                                            !t.escapeWithReference &&
                                            (o = J(p[e], i[e])),
                                                pe({}, e, o)
                                        );
                                    },
                                    secondary: function (e) {
                                        var o = 'right' === e ? 'left' : 'top',
                                            n = p[o];
                                        return (
                                            p[e] > i[e] &&
                                            !t.escapeWithReference &&
                                            (n = _(
                                                p[o],
                                                i[e] - ('right' === e ? p.width : p.height)
                                            )),
                                                pe({}, o, n)
                                        );
                                    },
                                };
                            return (
                                n.forEach(function (e) {
                                    var t =
                                        -1 === ['left', 'top'].indexOf(e)
                                            ? 'secondary'
                                            : 'primary';
                                    p = se({}, p, s[t](e));
                                }),
                                    (e.offsets.popper = p),
                                    e
                            );
                        },
                        priority: ['left', 'right', 'top', 'bottom'],
                        padding: 5,
                        boundariesElement: 'scrollParent',
                    },
                    keepTogether: {
                        order: 400,
                        enabled: !0,
                        fn: function (e) {
                            var t = e.offsets,
                                o = t.popper,
                                i = t.reference,
                                n = e.placement.split('-')[0],
                                r = X,
                                p = -1 !== ['top', 'bottom'].indexOf(n),
                                s = p ? 'right' : 'bottom',
                                d = p ? 'left' : 'top',
                                a = p ? 'width' : 'height';
                            return (
                                o[s] < r(i[d]) && (e.offsets.popper[d] = r(i[d]) - o[a]),
                                o[d] > r(i[s]) && (e.offsets.popper[d] = r(i[s])),
                                    e
                            );
                        },
                    },
                    arrow: {
                        order: 500,
                        enabled: !0,
                        fn: function (e, o) {
                            var i;
                            if (!F(e.instance.modifiers, 'arrow', 'keepTogether'))
                                return e;
                            var n = o.element;
                            if ('string' == typeof n) {
                                if (((n = e.instance.popper.querySelector(n)), !n))
                                    return e;
                            } else if (!e.instance.popper.contains(n))
                                return (
                                    console.warn(
                                        'WARNING: `arrow.element` must be child of its popper element!'
                                    ),
                                        e
                                );
                            var r = e.placement.split('-')[0],
                                p = e.offsets,
                                s = p.popper,
                                d = p.reference,
                                a = -1 !== ['left', 'right'].indexOf(r),
                                l = a ? 'height' : 'width',
                                f = a ? 'Top' : 'Left',
                                m = f.toLowerCase(),
                                h = a ? 'left' : 'top',
                                g = a ? 'bottom' : 'right',
                                u = L(n)[l];
                            d[g] - u < s[m] && (e.offsets.popper[m] -= s[m] - (d[g] - u)),
                            d[m] + u > s[g] &&
                            (e.offsets.popper[m] += d[m] + u - s[g]),
                                (e.offsets.popper = c(e.offsets.popper));
                            var b = d[m] + d[l] / 2 - u / 2,
                                w = t(e.instance.popper),
                                y = parseFloat(w['margin' + f], 10),
                                E = parseFloat(w['border' + f + 'Width'], 10),
                                v = b - e.offsets.popper[m] - y - E;
                            return (
                                (v = J(_(s[l] - u, v), 0)),
                                    (e.arrowElement = n),
                                    (e.offsets.arrow =
                                        ((i = {}), pe(i, m, Math.round(v)), pe(i, h, ''), i)),
                                    e
                            );
                        },
                        element: '[x-arrow]',
                    },
                    flip: {
                        order: 600,
                        enabled: !0,
                        fn: function (e, t) {
                            if (k(e.instance.modifiers, 'inner')) return e;
                            if (e.flipped && e.placement === e.originalPlacement)
                                return e;
                            var o = y(
                                e.instance.popper,
                                e.instance.reference,
                                t.padding,
                                t.boundariesElement
                                ),
                                i = e.placement.split('-')[0],
                                n = x(i),
                                r = e.placement.split('-')[1] || '',
                                p = [];
                            switch (t.behavior) {
                                case le.FLIP:
                                    p = [i, n];
                                    break;
                                case le.CLOCKWISE:
                                    p = q(i);
                                    break;
                                case le.COUNTERCLOCKWISE:
                                    p = q(i, !0);
                                    break;
                                default:
                                    p = t.behavior;
                            }
                            return (
                                p.forEach(function (s, d) {
                                    if (i !== s || p.length === d + 1) return e;
                                    (i = e.placement.split('-')[0]), (n = x(i));
                                    var a = e.offsets.popper,
                                        l = e.offsets.reference,
                                        f = X,
                                        m =
                                            ('left' === i && f(a.right) > f(l.left)) ||
                                            ('right' === i && f(a.left) < f(l.right)) ||
                                            ('top' === i && f(a.bottom) > f(l.top)) ||
                                            ('bottom' === i && f(a.top) < f(l.bottom)),
                                        h = f(a.left) < f(o.left),
                                        c = f(a.right) > f(o.right),
                                        g = f(a.top) < f(o.top),
                                        u = f(a.bottom) > f(o.bottom),
                                        b =
                                            ('left' === i && h) ||
                                            ('right' === i && c) ||
                                            ('top' === i && g) ||
                                            ('bottom' === i && u),
                                        w = -1 !== ['top', 'bottom'].indexOf(i),
                                        y =
                                            !!t.flipVariations &&
                                            ((w && 'start' === r && h) ||
                                                (w && 'end' === r && c) ||
                                                (!w && 'start' === r && g) ||
                                                (!w && 'end' === r && u));
                                    (m || b || y) &&
                                    ((e.flipped = !0),
                                    (m || b) && (i = p[d + 1]),
                                    y && (r = K(r)),
                                        (e.placement = i + (r ? '-' + r : '')),
                                        (e.offsets.popper = se(
                                            {},
                                            e.offsets.popper,
                                            S(
                                                e.instance.popper,
                                                e.offsets.reference,
                                                e.placement
                                            )
                                        )),
                                        (e = C(e.instance.modifiers, e, 'flip')));
                                }),
                                    e
                            );
                        },
                        behavior: 'flip',
                        padding: 5,
                        boundariesElement: 'viewport',
                    },
                    inner: {
                        order: 700,
                        enabled: !1,
                        fn: function (e) {
                            var t = e.placement,
                                o = t.split('-')[0],
                                i = e.offsets,
                                n = i.popper,
                                r = i.reference,
                                p = -1 !== ['left', 'right'].indexOf(o),
                                s = -1 === ['top', 'left'].indexOf(o);
                            return (
                                (n[p ? 'left' : 'top'] =
                                    r[o] - (s ? n[p ? 'width' : 'height'] : 0)),
                                    (e.placement = x(t)),
                                    (e.offsets.popper = c(n)),
                                    e
                            );
                        },
                    },
                    hide: {
                        order: 800,
                        enabled: !0,
                        fn: function (e) {
                            if (!F(e.instance.modifiers, 'hide', 'preventOverflow'))
                                return e;
                            var t = e.offsets.reference,
                                o = T(e.instance.modifiers, function (e) {
                                    return 'preventOverflow' === e.name;
                                }).boundaries;
                            if (
                                t.bottom < o.top ||
                                t.left > o.right ||
                                t.top > o.bottom ||
                                t.right < o.left
                            ) {
                                if (!0 === e.hide) return e;
                                (e.hide = !0), (e.attributes['x-out-of-boundaries'] = '');
                            } else {
                                if (!1 === e.hide) return e;
                                (e.hide = !1), (e.attributes['x-out-of-boundaries'] = !1);
                            }
                            return e;
                        },
                    },
                    computeStyle: {
                        order: 850,
                        enabled: !0,
                        fn: function (e, t) {
                            var o = t.x,
                                i = t.y,
                                n = e.offsets.popper,
                                p = T(e.instance.modifiers, function (e) {
                                    return 'applyStyle' === e.name;
                                }).gpuAcceleration;
                            void 0 !== p &&
                            console.warn(
                                'WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!'
                            );
                            var s,
                                d,
                                a = void 0 === p ? t.gpuAcceleration : p,
                                l = r(e.instance.popper),
                                f = g(l),
                                m = { position: n.position },
                                h = {
                                    left: X(n.left),
                                    top: X(n.top),
                                    bottom: X(n.bottom),
                                    right: X(n.right),
                                },
                                c = 'bottom' === o ? 'top' : 'bottom',
                                u = 'right' === i ? 'left' : 'right',
                                b = W('transform');
                            if (
                                ((d = 'bottom' == c ? -f.height + h.bottom : h.top),
                                    (s = 'right' == u ? -f.width + h.right : h.left),
                                a && b)
                            )
                                (m[b] = 'translate3d(' + s + 'px, ' + d + 'px, 0)'),
                                    (m[c] = 0),
                                    (m[u] = 0),
                                    (m.willChange = 'transform');
                            else {
                                var w = 'bottom' == c ? -1 : 1,
                                    y = 'right' == u ? -1 : 1;
                                (m[c] = d * w),
                                    (m[u] = s * y),
                                    (m.willChange = c + ', ' + u);
                            }
                            var E = { 'x-placement': e.placement };
                            return (
                                (e.attributes = se({}, E, e.attributes)),
                                    (e.styles = se({}, m, e.styles)),
                                    (e.arrowStyles = se({}, e.offsets.arrow, e.arrowStyles)),
                                    e
                            );
                        },
                        gpuAcceleration: !0,
                        x: 'bottom',
                        y: 'right',
                    },
                    applyStyle: {
                        order: 900,
                        enabled: !0,
                        fn: function (e) {
                            return (
                                Y(e.instance.popper, e.styles),
                                    j(e.instance.popper, e.attributes),
                                e.arrowElement &&
                                Object.keys(e.arrowStyles).length &&
                                Y(e.arrowElement, e.arrowStyles),
                                    e
                            );
                        },
                        onLoad: function (e, t, o, i, n) {
                            var r = O(n, t, e),
                                p = v(
                                    o.placement,
                                    r,
                                    t,
                                    e,
                                    o.modifiers.flip.boundariesElement,
                                    o.modifiers.flip.padding
                                );
                            return (
                                t.setAttribute('x-placement', p),
                                    Y(t, { position: 'absolute' }),
                                    o
                            );
                        },
                        gpuAcceleration: void 0,
                    },
                },
            }),
            fe
    );
});

// ==================================================
// fancyBox v3.5.7
//
// Licensed GPLv3 for open source use
// or fancyBox Commercial License for commercial use
//
// http://fancyapps.com/fancybox/
// Copyright 2019 fancyApps
//
// ==================================================
!function(t,e,n,o){"use strict";function i(t,e){var o,i,a,s=[],r=0;t&&t.isDefaultPrevented()||(t.preventDefault(),e=e||{},t&&t.data&&(e=h(t.data.options,e)),o=e.$target||n(t.currentTarget).trigger("blur"),(a=n.fancybox.getInstance())&&a.$trigger&&a.$trigger.is(o)||(e.selector?s=n(e.selector):(i=o.attr("data-fancybox")||"",i?(s=t.data?t.data.items:[],s=s.length?s.filter('[data-fancybox="'+i+'"]'):n('[data-fancybox="'+i+'"]')):s=[o]),r=n(s).index(o),r<0&&(r=0),a=n.fancybox.open(s,e,r),a.$trigger=o))}if(t.console=t.console||{info:function(t){}},n){if(n.fn.fancybox)return void console.info("fancyBox already initialized");var a={closeExisting:!1,loop:!1,gutter:50,keyboard:!0,preventCaptionOverlap:!0,arrows:!0,infobar:!0,smallBtn:"auto",toolbar:"auto",buttons:["zoom","slideShow","thumbs","close"],idleTime:3,protect:!1,modal:!1,image:{preload:!1},ajax:{settings:{data:{fancybox:!0}}},iframe:{tpl:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" allowfullscreen="allowfullscreen" allow="autoplay; fullscreen" src=""></iframe>',preload:!0,css:{},attr:{scrolling:"auto"}},video:{tpl:'<video class="fancybox-video" controls controlsList="nodownload" poster="{{poster}}"><source src="{{src}}" type="{{format}}" />Sorry, your browser doesn\'t support embedded videos, <a href="{{src}}">download</a> and watch with your favorite video player!</video>',format:"",autoStart:!0},defaultType:"image",animationEffect:"zoom",animationDuration:366,zoomOpacity:"auto",transitionEffect:"fade",transitionDuration:366,slideClass:"",baseClass:"",baseTpl:'<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-inner"><div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div><div class="fancybox-toolbar">{{buttons}}</div><div class="fancybox-navigation">{{arrows}}</div><div class="fancybox-stage"></div><div class="fancybox-caption"><div class="fancybox-caption__body"></div></div></div></div>',spinnerTpl:'<div class="fancybox-loading"></div>',errorTpl:'<div class="fancybox-error"><p>{{ERROR}}</p></div>',btnTpl:{download:'<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.62 17.09V19H5.38v-1.91zm-2.97-6.96L17 11.45l-5 4.87-5-4.87 1.36-1.32 2.68 2.64V5h1.92v7.77z"/></svg></a>',zoom:'<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.7 17.3l-3-3a5.9 5.9 0 0 0-.6-7.6 5.9 5.9 0 0 0-8.4 0 5.9 5.9 0 0 0 0 8.4 5.9 5.9 0 0 0 7.7.7l3 3a1 1 0 0 0 1.3 0c.4-.5.4-1 0-1.5zM8.1 13.8a4 4 0 0 1 0-5.7 4 4 0 0 1 5.7 0 4 4 0 0 1 0 5.7 4 4 0 0 1-5.7 0z"/></svg></button>',close:'<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"/></svg></button>',arrowLeft:'<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.28 15.7l-1.34 1.37L5 12l4.94-5.07 1.34 1.38-2.68 2.72H19v1.94H8.6z"/></svg></div></button>',arrowRight:'<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.4 12.97l-2.68 2.72 1.34 1.38L19 12l-4.94-5.07-1.34 1.38 2.68 2.72H5v1.94z"/></svg></div></button>',smallBtn:'<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"/></svg></button>'},parentEl:"body",hideScrollbar:!0,autoFocus:!0,backFocus:!0,trapFocus:!0,fullScreen:{autoStart:!1},touch:{vertical:!0,momentum:!0},hash:null,media:{},slideShow:{autoStart:!1,speed:3e3},thumbs:{autoStart:!1,hideOnClose:!0,parentEl:".fancybox-container",axis:"y"},wheel:"auto",onInit:n.noop,beforeLoad:n.noop,afterLoad:n.noop,beforeShow:n.noop,afterShow:n.noop,beforeClose:n.noop,afterClose:n.noop,onActivate:n.noop,onDeactivate:n.noop,clickContent:function(t,e){return"image"===t.type&&"zoom"},clickSlide:"close",clickOutside:"close",dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1,mobile:{preventCaptionOverlap:!1,idleTime:!1,clickContent:function(t,e){return"image"===t.type&&"toggleControls"},clickSlide:function(t,e){return"image"===t.type?"toggleControls":"close"},dblclickContent:function(t,e){return"image"===t.type&&"zoom"},dblclickSlide:function(t,e){return"image"===t.type&&"zoom"}},lang:"en",i18n:{en:{CLOSE:"Close",NEXT:"Next",PREV:"Previous",ERROR:"The requested content cannot be loaded. <br/> Please try again later.",PLAY_START:"Start slideshow",PLAY_STOP:"Pause slideshow",FULL_SCREEN:"Full screen",THUMBS:"Thumbnails",DOWNLOAD:"Download",SHARE:"Share",ZOOM:"Zoom"},de:{CLOSE:"Schlie&szlig;en",NEXT:"Weiter",PREV:"Zur&uuml;ck",ERROR:"Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es sp&auml;ter nochmal.",PLAY_START:"Diaschau starten",PLAY_STOP:"Diaschau beenden",FULL_SCREEN:"Vollbild",THUMBS:"Vorschaubilder",DOWNLOAD:"Herunterladen",SHARE:"Teilen",ZOOM:"Vergr&ouml;&szlig;ern"}}},s=n(t),r=n(e),c=0,l=function(t){return t&&t.hasOwnProperty&&t instanceof n},d=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),u=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||function(e){t.clearTimeout(e)}}(),f=function(){var t,n=e.createElement("fakeelement"),o={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(t in o)if(void 0!==n.style[t])return o[t];return"transitionend"}(),p=function(t){return t&&t.length&&t[0].offsetHeight},h=function(t,e){var o=n.extend(!0,{},t,e);return n.each(e,function(t,e){n.isArray(e)&&(o[t]=e)}),o},g=function(t){var o,i;return!(!t||t.ownerDocument!==e)&&(n(".fancybox-container").css("pointer-events","none"),o={x:t.getBoundingClientRect().left+t.offsetWidth/2,y:t.getBoundingClientRect().top+t.offsetHeight/2},i=e.elementFromPoint(o.x,o.y)===t,n(".fancybox-container").css("pointer-events",""),i)},b=function(t,e,o){var i=this;i.opts=h({index:o},n.fancybox.defaults),n.isPlainObject(e)&&(i.opts=h(i.opts,e)),n.fancybox.isMobile&&(i.opts=h(i.opts,i.opts.mobile)),i.id=i.opts.id||++c,i.currIndex=parseInt(i.opts.index,10)||0,i.prevIndex=null,i.prevPos=null,i.currPos=0,i.firstRun=!0,i.group=[],i.slides={},i.addContent(t),i.group.length&&i.init()};n.extend(b.prototype,{init:function(){var o,i,a=this,s=a.group[a.currIndex],r=s.opts;r.closeExisting&&n.fancybox.close(!0),n("body").addClass("fancybox-active"),!n.fancybox.getInstance()&&!1!==r.hideScrollbar&&!n.fancybox.isMobile&&e.body.scrollHeight>t.innerHeight&&(n("head").append('<style id="fancybox-style-noscroll" type="text/css">.compensate-for-scrollbar{margin-right:'+(t.innerWidth-e.documentElement.clientWidth)+"px;}</style>"),n("body").addClass("compensate-for-scrollbar")),i="",n.each(r.buttons,function(t,e){i+=r.btnTpl[e]||""}),o=n(a.translate(a,r.baseTpl.replace("{{buttons}}",i).replace("{{arrows}}",r.btnTpl.arrowLeft+r.btnTpl.arrowRight))).attr("id","fancybox-container-"+a.id).addClass(r.baseClass).data("FancyBox",a).appendTo(r.parentEl),a.$refs={container:o},["bg","inner","infobar","toolbar","stage","caption","navigation"].forEach(function(t){a.$refs[t]=o.find(".fancybox-"+t)}),a.trigger("onInit"),a.activate(),a.jumpTo(a.currIndex)},translate:function(t,e){var n=t.opts.i18n[t.opts.lang]||t.opts.i18n.en;return e.replace(/\{\{(\w+)\}\}/g,function(t,e){return void 0===n[e]?t:n[e]})},addContent:function(t){var e,o=this,i=n.makeArray(t);n.each(i,function(t,e){var i,a,s,r,c,l={},d={};n.isPlainObject(e)?(l=e,d=e.opts||e):"object"===n.type(e)&&n(e).length?(i=n(e),d=i.data()||{},d=n.extend(!0,{},d,d.options),d.$orig=i,l.src=o.opts.src||d.src||i.attr("href"),l.type||l.src||(l.type="inline",l.src=e)):l={type:"html",src:e+""},l.opts=n.extend(!0,{},o.opts,d),n.isArray(d.buttons)&&(l.opts.buttons=d.buttons),n.fancybox.isMobile&&l.opts.mobile&&(l.opts=h(l.opts,l.opts.mobile)),a=l.type||l.opts.type,r=l.src||"",!a&&r&&((s=r.match(/\.(mp4|mov|ogv|webm)((\?|#).*)?$/i))?(a="video",l.opts.video.format||(l.opts.video.format="video/"+("ogv"===s[1]?"ogg":s[1]))):r.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i)?a="image":r.match(/\.(pdf)((\?|#).*)?$/i)?(a="iframe",l=n.extend(!0,l,{contentType:"pdf",opts:{iframe:{preload:!1}}})):"#"===r.charAt(0)&&(a="inline")),a?l.type=a:o.trigger("objectNeedsType",l),l.contentType||(l.contentType=n.inArray(l.type,["html","inline","ajax"])>-1?"html":l.type),l.index=o.group.length,"auto"==l.opts.smallBtn&&(l.opts.smallBtn=n.inArray(l.type,["html","inline","ajax"])>-1),"auto"===l.opts.toolbar&&(l.opts.toolbar=!l.opts.smallBtn),l.$thumb=l.opts.$thumb||null,l.opts.$trigger&&l.index===o.opts.index&&(l.$thumb=l.opts.$trigger.find("img:first"),l.$thumb.length&&(l.opts.$orig=l.opts.$trigger)),l.$thumb&&l.$thumb.length||!l.opts.$orig||(l.$thumb=l.opts.$orig.find("img:first")),l.$thumb&&!l.$thumb.length&&(l.$thumb=null),l.thumb=l.opts.thumb||(l.$thumb?l.$thumb[0].src:null),"function"===n.type(l.opts.caption)&&(l.opts.caption=l.opts.caption.apply(e,[o,l])),"function"===n.type(o.opts.caption)&&(l.opts.caption=o.opts.caption.apply(e,[o,l])),l.opts.caption instanceof n||(l.opts.caption=void 0===l.opts.caption?"":l.opts.caption+""),"ajax"===l.type&&(c=r.split(/\s+/,2),c.length>1&&(l.src=c.shift(),l.opts.filter=c.shift())),l.opts.modal&&(l.opts=n.extend(!0,l.opts,{trapFocus:!0,infobar:0,toolbar:0,smallBtn:0,keyboard:0,slideShow:0,fullScreen:0,thumbs:0,touch:0,clickContent:!1,clickSlide:!1,clickOutside:!1,dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1})),o.group.push(l)}),Object.keys(o.slides).length&&(o.updateControls(),(e=o.Thumbs)&&e.isActive&&(e.create(),e.focus()))},addEvents:function(){var e=this;e.removeEvents(),e.$refs.container.on("click.fb-close","[data-fancybox-close]",function(t){t.stopPropagation(),t.preventDefault(),e.close(t)}).on("touchstart.fb-prev click.fb-prev","[data-fancybox-prev]",function(t){t.stopPropagation(),t.preventDefault(),e.previous()}).on("touchstart.fb-next click.fb-next","[data-fancybox-next]",function(t){t.stopPropagation(),t.preventDefault(),e.next()}).on("click.fb","[data-fancybox-zoom]",function(t){e[e.isScaledDown()?"scaleToActual":"scaleToFit"]()}),s.on("orientationchange.fb resize.fb",function(t){t&&t.originalEvent&&"resize"===t.originalEvent.type?(e.requestId&&u(e.requestId),e.requestId=d(function(){e.update(t)})):(e.current&&"iframe"===e.current.type&&e.$refs.stage.hide(),setTimeout(function(){e.$refs.stage.show(),e.update(t)},n.fancybox.isMobile?600:250))}),r.on("keydown.fb",function(t){var o=n.fancybox?n.fancybox.getInstance():null,i=o.current,a=t.keyCode||t.which;if(9==a)return void(i.opts.trapFocus&&e.focus(t));if(!(!i.opts.keyboard||t.ctrlKey||t.altKey||t.shiftKey||n(t.target).is("input,textarea,video,audio,select")))return 8===a||27===a?(t.preventDefault(),void e.close(t)):37===a||38===a?(t.preventDefault(),void e.previous()):39===a||40===a?(t.preventDefault(),void e.next()):void e.trigger("afterKeydown",t,a)}),e.group[e.currIndex].opts.idleTime&&(e.idleSecondsCounter=0,r.on("mousemove.fb-idle mouseleave.fb-idle mousedown.fb-idle touchstart.fb-idle touchmove.fb-idle scroll.fb-idle keydown.fb-idle",function(t){e.idleSecondsCounter=0,e.isIdle&&e.showControls(),e.isIdle=!1}),e.idleInterval=t.setInterval(function(){++e.idleSecondsCounter>=e.group[e.currIndex].opts.idleTime&&!e.isDragging&&(e.isIdle=!0,e.idleSecondsCounter=0,e.hideControls())},1e3))},removeEvents:function(){var e=this;s.off("orientationchange.fb resize.fb"),r.off("keydown.fb .fb-idle"),this.$refs.container.off(".fb-close .fb-prev .fb-next"),e.idleInterval&&(t.clearInterval(e.idleInterval),e.idleInterval=null)},previous:function(t){return this.jumpTo(this.currPos-1,t)},next:function(t){return this.jumpTo(this.currPos+1,t)},jumpTo:function(t,e){var o,i,a,s,r,c,l,d,u,f=this,h=f.group.length;if(!(f.isDragging||f.isClosing||f.isAnimating&&f.firstRun)){if(t=parseInt(t,10),!(a=f.current?f.current.opts.loop:f.opts.loop)&&(t<0||t>=h))return!1;if(o=f.firstRun=!Object.keys(f.slides).length,r=f.current,f.prevIndex=f.currIndex,f.prevPos=f.currPos,s=f.createSlide(t),h>1&&((a||s.index<h-1)&&f.createSlide(t+1),(a||s.index>0)&&f.createSlide(t-1)),f.current=s,f.currIndex=s.index,f.currPos=s.pos,f.trigger("beforeShow",o),f.updateControls(),s.forcedDuration=void 0,n.isNumeric(e)?s.forcedDuration=e:e=s.opts[o?"animationDuration":"transitionDuration"],e=parseInt(e,10),i=f.isMoved(s),s.$slide.addClass("fancybox-slide--current"),o)return s.opts.animationEffect&&e&&f.$refs.container.css("transition-duration",e+"ms"),f.$refs.container.addClass("fancybox-is-open").trigger("focus"),f.loadSlide(s),void f.preload("image");c=n.fancybox.getTranslate(r.$slide),l=n.fancybox.getTranslate(f.$refs.stage),n.each(f.slides,function(t,e){n.fancybox.stop(e.$slide,!0)}),r.pos!==s.pos&&(r.isComplete=!1),r.$slide.removeClass("fancybox-slide--complete fancybox-slide--current"),i?(u=c.left-(r.pos*c.width+r.pos*r.opts.gutter),n.each(f.slides,function(t,o){o.$slide.removeClass("fancybox-animated").removeClass(function(t,e){return(e.match(/(^|\s)fancybox-fx-\S+/g)||[]).join(" ")});var i=o.pos*c.width+o.pos*o.opts.gutter;n.fancybox.setTranslate(o.$slide,{top:0,left:i-l.left+u}),o.pos!==s.pos&&o.$slide.addClass("fancybox-slide--"+(o.pos>s.pos?"next":"previous")),p(o.$slide),n.fancybox.animate(o.$slide,{top:0,left:(o.pos-s.pos)*c.width+(o.pos-s.pos)*o.opts.gutter},e,function(){o.$slide.css({transform:"",opacity:""}).removeClass("fancybox-slide--next fancybox-slide--previous"),o.pos===f.currPos&&f.complete()})})):e&&s.opts.transitionEffect&&(d="fancybox-animated fancybox-fx-"+s.opts.transitionEffect,r.$slide.addClass("fancybox-slide--"+(r.pos>s.pos?"next":"previous")),n.fancybox.animate(r.$slide,d,e,function(){r.$slide.removeClass(d).removeClass("fancybox-slide--next fancybox-slide--previous")},!1)),s.isLoaded?f.revealContent(s):f.loadSlide(s),f.preload("image")}},createSlide:function(t){var e,o,i=this;return o=t%i.group.length,o=o<0?i.group.length+o:o,!i.slides[t]&&i.group[o]&&(e=n('<div class="fancybox-slide"></div>').appendTo(i.$refs.stage),i.slides[t]=n.extend(!0,{},i.group[o],{pos:t,$slide:e,isLoaded:!1}),i.updateSlide(i.slides[t])),i.slides[t]},scaleToActual:function(t,e,o){var i,a,s,r,c,l=this,d=l.current,u=d.$content,f=n.fancybox.getTranslate(d.$slide).width,p=n.fancybox.getTranslate(d.$slide).height,h=d.width,g=d.height;l.isAnimating||l.isMoved()||!u||"image"!=d.type||!d.isLoaded||d.hasError||(l.isAnimating=!0,n.fancybox.stop(u),t=void 0===t?.5*f:t,e=void 0===e?.5*p:e,i=n.fancybox.getTranslate(u),i.top-=n.fancybox.getTranslate(d.$slide).top,i.left-=n.fancybox.getTranslate(d.$slide).left,r=h/i.width,c=g/i.height,a=.5*f-.5*h,s=.5*p-.5*g,h>f&&(a=i.left*r-(t*r-t),a>0&&(a=0),a<f-h&&(a=f-h)),g>p&&(s=i.top*c-(e*c-e),s>0&&(s=0),s<p-g&&(s=p-g)),l.updateCursor(h,g),n.fancybox.animate(u,{top:s,left:a,scaleX:r,scaleY:c},o||366,function(){l.isAnimating=!1}),l.SlideShow&&l.SlideShow.isActive&&l.SlideShow.stop())},scaleToFit:function(t){var e,o=this,i=o.current,a=i.$content;o.isAnimating||o.isMoved()||!a||"image"!=i.type||!i.isLoaded||i.hasError||(o.isAnimating=!0,n.fancybox.stop(a),e=o.getFitPos(i),o.updateCursor(e.width,e.height),n.fancybox.animate(a,{top:e.top,left:e.left,scaleX:e.width/a.width(),scaleY:e.height/a.height()},t||366,function(){o.isAnimating=!1}))},getFitPos:function(t){var e,o,i,a,s=this,r=t.$content,c=t.$slide,l=t.width||t.opts.width,d=t.height||t.opts.height,u={};return!!(t.isLoaded&&r&&r.length)&&(e=n.fancybox.getTranslate(s.$refs.stage).width,o=n.fancybox.getTranslate(s.$refs.stage).height,e-=parseFloat(c.css("paddingLeft"))+parseFloat(c.css("paddingRight"))+parseFloat(r.css("marginLeft"))+parseFloat(r.css("marginRight")),o-=parseFloat(c.css("paddingTop"))+parseFloat(c.css("paddingBottom"))+parseFloat(r.css("marginTop"))+parseFloat(r.css("marginBottom")),l&&d||(l=e,d=o),i=Math.min(1,e/l,o/d),l*=i,d*=i,l>e-.5&&(l=e),d>o-.5&&(d=o),"image"===t.type?(u.top=Math.floor(.5*(o-d))+parseFloat(c.css("paddingTop")),u.left=Math.floor(.5*(e-l))+parseFloat(c.css("paddingLeft"))):"video"===t.contentType&&(a=t.opts.width&&t.opts.height?l/d:t.opts.ratio||16/9,d>l/a?d=l/a:l>d*a&&(l=d*a)),u.width=l,u.height=d,u)},update:function(t){var e=this;n.each(e.slides,function(n,o){e.updateSlide(o,t)})},updateSlide:function(t,e){var o=this,i=t&&t.$content,a=t.width||t.opts.width,s=t.height||t.opts.height,r=t.$slide;o.adjustCaption(t),i&&(a||s||"video"===t.contentType)&&!t.hasError&&(n.fancybox.stop(i),n.fancybox.setTranslate(i,o.getFitPos(t)),t.pos===o.currPos&&(o.isAnimating=!1,o.updateCursor())),o.adjustLayout(t),r.length&&(r.trigger("refresh"),t.pos===o.currPos&&o.$refs.toolbar.add(o.$refs.navigation.find(".fancybox-button--arrow_right")).toggleClass("compensate-for-scrollbar",r.get(0).scrollHeight>r.get(0).clientHeight)),o.trigger("onUpdate",t,e)},centerSlide:function(t){var e=this,o=e.current,i=o.$slide;!e.isClosing&&o&&(i.siblings().css({transform:"",opacity:""}),i.parent().children().removeClass("fancybox-slide--previous fancybox-slide--next"),n.fancybox.animate(i,{top:0,left:0,opacity:1},void 0===t?0:t,function(){i.css({transform:"",opacity:""}),o.isComplete||e.complete()},!1))},isMoved:function(t){var e,o,i=t||this.current;return!!i&&(o=n.fancybox.getTranslate(this.$refs.stage),e=n.fancybox.getTranslate(i.$slide),!i.$slide.hasClass("fancybox-animated")&&(Math.abs(e.top-o.top)>.5||Math.abs(e.left-o.left)>.5))},updateCursor:function(t,e){var o,i,a=this,s=a.current,r=a.$refs.container;s&&!a.isClosing&&a.Guestures&&(r.removeClass("fancybox-is-zoomable fancybox-can-zoomIn fancybox-can-zoomOut fancybox-can-swipe fancybox-can-pan"),o=a.canPan(t,e),i=!!o||a.isZoomable(),r.toggleClass("fancybox-is-zoomable",i),n("[data-fancybox-zoom]").prop("disabled",!i),o?r.addClass("fancybox-can-pan"):i&&("zoom"===s.opts.clickContent||n.isFunction(s.opts.clickContent)&&"zoom"==s.opts.clickContent(s))?r.addClass("fancybox-can-zoomIn"):s.opts.touch&&(s.opts.touch.vertical||a.group.length>1)&&"video"!==s.contentType&&r.addClass("fancybox-can-swipe"))},isZoomable:function(){var t,e=this,n=e.current;if(n&&!e.isClosing&&"image"===n.type&&!n.hasError){if(!n.isLoaded)return!0;if((t=e.getFitPos(n))&&(n.width>t.width||n.height>t.height))return!0}return!1},isScaledDown:function(t,e){var o=this,i=!1,a=o.current,s=a.$content;return void 0!==t&&void 0!==e?i=t<a.width&&e<a.height:s&&(i=n.fancybox.getTranslate(s),i=i.width<a.width&&i.height<a.height),i},canPan:function(t,e){var o=this,i=o.current,a=null,s=!1;return"image"===i.type&&(i.isComplete||t&&e)&&!i.hasError&&(s=o.getFitPos(i),void 0!==t&&void 0!==e?a={width:t,height:e}:i.isComplete&&(a=n.fancybox.getTranslate(i.$content)),a&&s&&(s=Math.abs(a.width-s.width)>1.5||Math.abs(a.height-s.height)>1.5)),s},loadSlide:function(t){var e,o,i,a=this;if(!t.isLoading&&!t.isLoaded){if(t.isLoading=!0,!1===a.trigger("beforeLoad",t))return t.isLoading=!1,!1;switch(e=t.type,o=t.$slide,o.off("refresh").trigger("onReset").addClass(t.opts.slideClass),e){case"image":a.setImage(t);break;case"iframe":a.setIframe(t);break;case"html":a.setContent(t,t.src||t.content);break;case"video":a.setContent(t,t.opts.video.tpl.replace(/\{\{src\}\}/gi,t.src).replace("{{format}}",t.opts.videoFormat||t.opts.video.format||"").replace("{{poster}}",t.thumb||""));break;case"inline":n(t.src).length?a.setContent(t,n(t.src)):a.setError(t);break;case"ajax":a.showLoading(t),i=n.ajax(n.extend({},t.opts.ajax.settings,{url:t.src,success:function(e,n){"success"===n&&a.setContent(t,e)},error:function(e,n){e&&"abort"!==n&&a.setError(t)}})),o.one("onReset",function(){i.abort()});break;default:a.setError(t)}return!0}},setImage:function(t){var o,i=this;setTimeout(function(){var e=t.$image;i.isClosing||!t.isLoading||e&&e.length&&e[0].complete||t.hasError||i.showLoading(t)},50),i.checkSrcset(t),t.$content=n('<div class="fancybox-content"></div>').addClass("fancybox-is-hidden").appendTo(t.$slide.addClass("fancybox-slide--image")),!1!==t.opts.preload&&t.opts.width&&t.opts.height&&t.thumb&&(t.width=t.opts.width,t.height=t.opts.height,o=e.createElement("img"),o.onerror=function(){n(this).remove(),t.$ghost=null},o.onload=function(){i.afterLoad(t)},t.$ghost=n(o).addClass("fancybox-image").appendTo(t.$content).attr("src",t.thumb)),i.setBigImage(t)},checkSrcset:function(e){var n,o,i,a,s=e.opts.srcset||e.opts.image.srcset;if(s){i=t.devicePixelRatio||1,a=t.innerWidth*i,o=s.split(",").map(function(t){var e={};return t.trim().split(/\s+/).forEach(function(t,n){var o=parseInt(t.substring(0,t.length-1),10);if(0===n)return e.url=t;o&&(e.value=o,e.postfix=t[t.length-1])}),e}),o.sort(function(t,e){return t.value-e.value});for(var r=0;r<o.length;r++){var c=o[r];if("w"===c.postfix&&c.value>=a||"x"===c.postfix&&c.value>=i){n=c;break}}!n&&o.length&&(n=o[o.length-1]),n&&(e.src=n.url,e.width&&e.height&&"w"==n.postfix&&(e.height=e.width/e.height*n.value,e.width=n.value),e.opts.srcset=s)}},setBigImage:function(t){var o=this,i=e.createElement("img"),a=n(i);t.$image=a.one("error",function(){o.setError(t)}).one("load",function(){var e;t.$ghost||(o.resolveImageSlideSize(t,this.naturalWidth,this.naturalHeight),o.afterLoad(t)),o.isClosing||(t.opts.srcset&&(e=t.opts.sizes,e&&"auto"!==e||(e=(t.width/t.height>1&&s.width()/s.height()>1?"100":Math.round(t.width/t.height*100))+"vw"),a.attr("sizes",e).attr("srcset",t.opts.srcset)),t.$ghost&&setTimeout(function(){t.$ghost&&!o.isClosing&&t.$ghost.hide()},Math.min(300,Math.max(1e3,t.height/1600))),o.hideLoading(t))}).addClass("fancybox-image").attr("src",t.src).appendTo(t.$content),(i.complete||"complete"==i.readyState)&&a.naturalWidth&&a.naturalHeight?a.trigger("load"):i.error&&a.trigger("error")},resolveImageSlideSize:function(t,e,n){var o=parseInt(t.opts.width,10),i=parseInt(t.opts.height,10);t.width=e,t.height=n,o>0&&(t.width=o,t.height=Math.floor(o*n/e)),i>0&&(t.width=Math.floor(i*e/n),t.height=i)},setIframe:function(t){var e,o=this,i=t.opts.iframe,a=t.$slide;t.$content=n('<div class="fancybox-content'+(i.preload?" fancybox-is-hidden":"")+'"></div>').css(i.css).appendTo(a),a.addClass("fancybox-slide--"+t.contentType),t.$iframe=e=n(i.tpl.replace(/\{rnd\}/g,(new Date).getTime())).attr(i.attr).appendTo(t.$content),i.preload?(o.showLoading(t),e.on("load.fb error.fb",function(e){this.isReady=1,t.$slide.trigger("refresh"),o.afterLoad(t)}),a.on("refresh.fb",function(){var n,o,s=t.$content,r=i.css.width,c=i.css.height;if(1===e[0].isReady){try{n=e.contents(),o=n.find("body")}catch(t){}o&&o.length&&o.children().length&&(a.css("overflow","visible"),s.css({width:"100%","max-width":"100%",height:"9999px"}),void 0===r&&(r=Math.ceil(Math.max(o[0].clientWidth,o.outerWidth(!0)))),s.css("width",r||"").css("max-width",""),void 0===c&&(c=Math.ceil(Math.max(o[0].clientHeight,o.outerHeight(!0)))),s.css("height",c||""),a.css("overflow","auto")),s.removeClass("fancybox-is-hidden")}})):o.afterLoad(t),e.attr("src",t.src),a.one("onReset",function(){try{n(this).find("iframe").hide().unbind().attr("src","//about:blank")}catch(t){}n(this).off("refresh.fb").empty(),t.isLoaded=!1,t.isRevealed=!1})},setContent:function(t,e){var o=this;o.isClosing||(o.hideLoading(t),t.$content&&n.fancybox.stop(t.$content),t.$slide.empty(),l(e)&&e.parent().length?((e.hasClass("fancybox-content")||e.parent().hasClass("fancybox-content"))&&e.parents(".fancybox-slide").trigger("onReset"),t.$placeholder=n("<div>").hide().insertAfter(e),e.css("display","inline-block")):t.hasError||("string"===n.type(e)&&(e=n("<div>").append(n.trim(e)).contents()),t.opts.filter&&(e=n("<div>").html(e).find(t.opts.filter))),t.$slide.one("onReset",function(){n(this).find("video,audio").trigger("pause"),t.$placeholder&&(t.$placeholder.after(e.removeClass("fancybox-content").hide()).remove(),t.$placeholder=null),t.$smallBtn&&(t.$smallBtn.remove(),t.$smallBtn=null),t.hasError||(n(this).empty(),t.isLoaded=!1,t.isRevealed=!1)}),n(e).appendTo(t.$slide),n(e).is("video,audio")&&(n(e).addClass("fancybox-video"),n(e).wrap("<div></div>"),t.contentType="video",t.opts.width=t.opts.width||n(e).attr("width"),t.opts.height=t.opts.height||n(e).attr("height")),t.$content=t.$slide.children().filter("div,form,main,video,audio,article,.fancybox-content").first(),t.$content.siblings().hide(),t.$content.length||(t.$content=t.$slide.wrapInner("<div></div>").children().first()),t.$content.addClass("fancybox-content"),t.$slide.addClass("fancybox-slide--"+t.contentType),o.afterLoad(t))},setError:function(t){t.hasError=!0,t.$slide.trigger("onReset").removeClass("fancybox-slide--"+t.contentType).addClass("fancybox-slide--error"),t.contentType="html",this.setContent(t,this.translate(t,t.opts.errorTpl)),t.pos===this.currPos&&(this.isAnimating=!1)},showLoading:function(t){var e=this;(t=t||e.current)&&!t.$spinner&&(t.$spinner=n(e.translate(e,e.opts.spinnerTpl)).appendTo(t.$slide).hide().fadeIn("fast"))},hideLoading:function(t){var e=this;(t=t||e.current)&&t.$spinner&&(t.$spinner.stop().remove(),delete t.$spinner)},afterLoad:function(t){var e=this;e.isClosing||(t.isLoading=!1,t.isLoaded=!0,e.trigger("afterLoad",t),e.hideLoading(t),!t.opts.smallBtn||t.$smallBtn&&t.$smallBtn.length||(t.$smallBtn=n(e.translate(t,t.opts.btnTpl.smallBtn)).appendTo(t.$content)),t.opts.protect&&t.$content&&!t.hasError&&(t.$content.on("contextmenu.fb",function(t){return 2==t.button&&t.preventDefault(),!0}),"image"===t.type&&n('<div class="fancybox-spaceball"></div>').appendTo(t.$content)),e.adjustCaption(t),e.adjustLayout(t),t.pos===e.currPos&&e.updateCursor(),e.revealContent(t))},adjustCaption:function(t){var e,n=this,o=t||n.current,i=o.opts.caption,a=o.opts.preventCaptionOverlap,s=n.$refs.caption,r=!1;s.toggleClass("fancybox-caption--separate",a),a&&i&&i.length&&(o.pos!==n.currPos?(e=s.clone().appendTo(s.parent()),e.children().eq(0).empty().html(i),r=e.outerHeight(!0),e.empty().remove()):n.$caption&&(r=n.$caption.outerHeight(!0)),o.$slide.css("padding-bottom",r||""))},adjustLayout:function(t){var e,n,o,i,a=this,s=t||a.current;s.isLoaded&&!0!==s.opts.disableLayoutFix&&(s.$content.css("margin-bottom",""),s.$content.outerHeight()>s.$slide.height()+.5&&(o=s.$slide[0].style["padding-bottom"],i=s.$slide.css("padding-bottom"),parseFloat(i)>0&&(e=s.$slide[0].scrollHeight,s.$slide.css("padding-bottom",0),Math.abs(e-s.$slide[0].scrollHeight)<1&&(n=i),s.$slide.css("padding-bottom",o))),s.$content.css("margin-bottom",n))},revealContent:function(t){var e,o,i,a,s=this,r=t.$slide,c=!1,l=!1,d=s.isMoved(t),u=t.isRevealed;return t.isRevealed=!0,e=t.opts[s.firstRun?"animationEffect":"transitionEffect"],i=t.opts[s.firstRun?"animationDuration":"transitionDuration"],i=parseInt(void 0===t.forcedDuration?i:t.forcedDuration,10),!d&&t.pos===s.currPos&&i||(e=!1),"zoom"===e&&(t.pos===s.currPos&&i&&"image"===t.type&&!t.hasError&&(l=s.getThumbPos(t))?c=s.getFitPos(t):e="fade"),"zoom"===e?(s.isAnimating=!0,c.scaleX=c.width/l.width,c.scaleY=c.height/l.height,a=t.opts.zoomOpacity,"auto"==a&&(a=Math.abs(t.width/t.height-l.width/l.height)>.1),a&&(l.opacity=.1,c.opacity=1),n.fancybox.setTranslate(t.$content.removeClass("fancybox-is-hidden"),l),p(t.$content),void n.fancybox.animate(t.$content,c,i,function(){s.isAnimating=!1,s.complete()})):(s.updateSlide(t),e?(n.fancybox.stop(r),o="fancybox-slide--"+(t.pos>=s.prevPos?"next":"previous")+" fancybox-animated fancybox-fx-"+e,r.addClass(o).removeClass("fancybox-slide--current"),t.$content.removeClass("fancybox-is-hidden"),p(r),"image"!==t.type&&t.$content.hide().show(0),void n.fancybox.animate(r,"fancybox-slide--current",i,function(){r.removeClass(o).css({transform:"",opacity:""}),t.pos===s.currPos&&s.complete()},!0)):(t.$content.removeClass("fancybox-is-hidden"),u||!d||"image"!==t.type||t.hasError||t.$content.hide().fadeIn("fast"),void(t.pos===s.currPos&&s.complete())))},getThumbPos:function(t){var e,o,i,a,s,r=!1,c=t.$thumb;return!(!c||!g(c[0]))&&(e=n.fancybox.getTranslate(c),o=parseFloat(c.css("border-top-width")||0),i=parseFloat(c.css("border-right-width")||0),a=parseFloat(c.css("border-bottom-width")||0),s=parseFloat(c.css("border-left-width")||0),r={top:e.top+o,left:e.left+s,width:e.width-i-s,height:e.height-o-a,scaleX:1,scaleY:1},e.width>0&&e.height>0&&r)},complete:function(){var t,e=this,o=e.current,i={};!e.isMoved()&&o.isLoaded&&(o.isComplete||(o.isComplete=!0,o.$slide.siblings().trigger("onReset"),e.preload("inline"),p(o.$slide),o.$slide.addClass("fancybox-slide--complete"),n.each(e.slides,function(t,o){o.pos>=e.currPos-1&&o.pos<=e.currPos+1?i[o.pos]=o:o&&(n.fancybox.stop(o.$slide),o.$slide.off().remove())}),e.slides=i),e.isAnimating=!1,e.updateCursor(),e.trigger("afterShow"),o.opts.video.autoStart&&o.$slide.find("video,audio").filter(":visible:first").trigger("play").one("ended",function(){Document.exitFullscreen?Document.exitFullscreen():this.webkitExitFullscreen&&this.webkitExitFullscreen(),e.next()}),o.opts.autoFocus&&"html"===o.contentType&&(t=o.$content.find("input[autofocus]:enabled:visible:first"),t.length?t.trigger("focus"):e.focus(null,!0)),o.$slide.scrollTop(0).scrollLeft(0))},preload:function(t){var e,n,o=this;o.group.length<2||(n=o.slides[o.currPos+1],e=o.slides[o.currPos-1],e&&e.type===t&&o.loadSlide(e),n&&n.type===t&&o.loadSlide(n))},focus:function(t,o){var i,a,s=this,r=["a[href]","area[href]",'input:not([disabled]):not([type="hidden"]):not([aria-hidden])',"select:not([disabled]):not([aria-hidden])","textarea:not([disabled]):not([aria-hidden])","button:not([disabled]):not([aria-hidden])","iframe","object","embed","video","audio","[contenteditable]",'[tabindex]:not([tabindex^="-"])'].join(",");s.isClosing||(i=!t&&s.current&&s.current.isComplete?s.current.$slide.find("*:visible"+(o?":not(.fancybox-close-small)":"")):s.$refs.container.find("*:visible"),i=i.filter(r).filter(function(){return"hidden"!==n(this).css("visibility")&&!n(this).hasClass("disabled")}),i.length?(a=i.index(e.activeElement),t&&t.shiftKey?(a<0||0==a)&&(t.preventDefault(),i.eq(i.length-1).trigger("focus")):(a<0||a==i.length-1)&&(t&&t.preventDefault(),i.eq(0).trigger("focus"))):s.$refs.container.trigger("focus"))},activate:function(){var t=this;n(".fancybox-container").each(function(){var e=n(this).data("FancyBox");e&&e.id!==t.id&&!e.isClosing&&(e.trigger("onDeactivate"),e.removeEvents(),e.isVisible=!1)}),t.isVisible=!0,(t.current||t.isIdle)&&(t.update(),t.updateControls()),t.trigger("onActivate"),t.addEvents()},close:function(t,e){var o,i,a,s,r,c,l,u=this,f=u.current,h=function(){u.cleanUp(t)};return!u.isClosing&&(u.isClosing=!0,!1===u.trigger("beforeClose",t)?(u.isClosing=!1,d(function(){u.update()}),!1):(u.removeEvents(),a=f.$content,o=f.opts.animationEffect,i=n.isNumeric(e)?e:o?f.opts.animationDuration:0,f.$slide.removeClass("fancybox-slide--complete fancybox-slide--next fancybox-slide--previous fancybox-animated"),!0!==t?n.fancybox.stop(f.$slide):o=!1,f.$slide.siblings().trigger("onReset").remove(),i&&u.$refs.container.removeClass("fancybox-is-open").addClass("fancybox-is-closing").css("transition-duration",i+"ms"),u.hideLoading(f),u.hideControls(!0),u.updateCursor(),"zoom"!==o||a&&i&&"image"===f.type&&!u.isMoved()&&!f.hasError&&(l=u.getThumbPos(f))||(o="fade"),"zoom"===o?(n.fancybox.stop(a),s=n.fancybox.getTranslate(a),c={top:s.top,left:s.left,scaleX:s.width/l.width,scaleY:s.height/l.height,width:l.width,height:l.height},r=f.opts.zoomOpacity,
    "auto"==r&&(r=Math.abs(f.width/f.height-l.width/l.height)>.1),r&&(l.opacity=0),n.fancybox.setTranslate(a,c),p(a),n.fancybox.animate(a,l,i,h),!0):(o&&i?n.fancybox.animate(f.$slide.addClass("fancybox-slide--previous").removeClass("fancybox-slide--current"),"fancybox-animated fancybox-fx-"+o,i,h):!0===t?setTimeout(h,i):h(),!0)))},cleanUp:function(e){var o,i,a,s=this,r=s.current.opts.$orig;s.current.$slide.trigger("onReset"),s.$refs.container.empty().remove(),s.trigger("afterClose",e),s.current.opts.backFocus&&(r&&r.length&&r.is(":visible")||(r=s.$trigger),r&&r.length&&(i=t.scrollX,a=t.scrollY,r.trigger("focus"),n("html, body").scrollTop(a).scrollLeft(i))),s.current=null,o=n.fancybox.getInstance(),o?o.activate():(n("body").removeClass("fancybox-active compensate-for-scrollbar"),n("#fancybox-style-noscroll").remove())},trigger:function(t,e){var o,i=Array.prototype.slice.call(arguments,1),a=this,s=e&&e.opts?e:a.current;if(s?i.unshift(s):s=a,i.unshift(a),n.isFunction(s.opts[t])&&(o=s.opts[t].apply(s,i)),!1===o)return o;"afterClose"!==t&&a.$refs?a.$refs.container.trigger(t+".fb",i):r.trigger(t+".fb",i)},updateControls:function(){var t=this,o=t.current,i=o.index,a=t.$refs.container,s=t.$refs.caption,r=o.opts.caption;o.$slide.trigger("refresh"),r&&r.length?(t.$caption=s,s.children().eq(0).html(r)):t.$caption=null,t.hasHiddenControls||t.isIdle||t.showControls(),a.find("[data-fancybox-count]").html(t.group.length),a.find("[data-fancybox-index]").html(i+1),a.find("[data-fancybox-prev]").prop("disabled",!o.opts.loop&&i<=0),a.find("[data-fancybox-next]").prop("disabled",!o.opts.loop&&i>=t.group.length-1),"image"===o.type?a.find("[data-fancybox-zoom]").show().end().find("[data-fancybox-download]").attr("href",o.opts.image.src||o.src).show():o.opts.toolbar&&a.find("[data-fancybox-download],[data-fancybox-zoom]").hide(),n(e.activeElement).is(":hidden,[disabled]")&&t.$refs.container.trigger("focus")},hideControls:function(t){var e=this,n=["infobar","toolbar","nav"];!t&&e.current.opts.preventCaptionOverlap||n.push("caption"),this.$refs.container.removeClass(n.map(function(t){return"fancybox-show-"+t}).join(" ")),this.hasHiddenControls=!0},showControls:function(){var t=this,e=t.current?t.current.opts:t.opts,n=t.$refs.container;t.hasHiddenControls=!1,t.idleSecondsCounter=0,n.toggleClass("fancybox-show-toolbar",!(!e.toolbar||!e.buttons)).toggleClass("fancybox-show-infobar",!!(e.infobar&&t.group.length>1)).toggleClass("fancybox-show-caption",!!t.$caption).toggleClass("fancybox-show-nav",!!(e.arrows&&t.group.length>1)).toggleClass("fancybox-is-modal",!!e.modal)},toggleControls:function(){this.hasHiddenControls?this.showControls():this.hideControls()}}),n.fancybox={version:"3.5.7",defaults:a,getInstance:function(t){var e=n('.fancybox-container:not(".fancybox-is-closing"):last').data("FancyBox"),o=Array.prototype.slice.call(arguments,1);return e instanceof b&&("string"===n.type(t)?e[t].apply(e,o):"function"===n.type(t)&&t.apply(e,o),e)},open:function(t,e,n){return new b(t,e,n)},close:function(t){var e=this.getInstance();e&&(e.close(),!0===t&&this.close(t))},destroy:function(){this.close(!0),r.add("body").off("click.fb-start","**")},isMobile:/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),use3d:function(){var n=e.createElement("div");return t.getComputedStyle&&t.getComputedStyle(n)&&t.getComputedStyle(n).getPropertyValue("transform")&&!(e.documentMode&&e.documentMode<11)}(),getTranslate:function(t){var e;return!(!t||!t.length)&&(e=t[0].getBoundingClientRect(),{top:e.top||0,left:e.left||0,width:e.width,height:e.height,opacity:parseFloat(t.css("opacity"))})},setTranslate:function(t,e){var n="",o={};if(t&&e)return void 0===e.left&&void 0===e.top||(n=(void 0===e.left?t.position().left:e.left)+"px, "+(void 0===e.top?t.position().top:e.top)+"px",n=this.use3d?"translate3d("+n+", 0px)":"translate("+n+")"),void 0!==e.scaleX&&void 0!==e.scaleY?n+=" scale("+e.scaleX+", "+e.scaleY+")":void 0!==e.scaleX&&(n+=" scaleX("+e.scaleX+")"),n.length&&(o.transform=n),void 0!==e.opacity&&(o.opacity=e.opacity),void 0!==e.width&&(o.width=e.width),void 0!==e.height&&(o.height=e.height),t.css(o)},animate:function(t,e,o,i,a){var s,r=this;n.isFunction(o)&&(i=o,o=null),r.stop(t),s=r.getTranslate(t),t.on(f,function(c){(!c||!c.originalEvent||t.is(c.originalEvent.target)&&"z-index"!=c.originalEvent.propertyName)&&(r.stop(t),n.isNumeric(o)&&t.css("transition-duration",""),n.isPlainObject(e)?void 0!==e.scaleX&&void 0!==e.scaleY&&r.setTranslate(t,{top:e.top,left:e.left,width:s.width*e.scaleX,height:s.height*e.scaleY,scaleX:1,scaleY:1}):!0!==a&&t.removeClass(e),n.isFunction(i)&&i(c))}),n.isNumeric(o)&&t.css("transition-duration",o+"ms"),n.isPlainObject(e)?(void 0!==e.scaleX&&void 0!==e.scaleY&&(delete e.width,delete e.height,t.parent().hasClass("fancybox-slide--image")&&t.parent().addClass("fancybox-is-scaling")),n.fancybox.setTranslate(t,e)):t.addClass(e),t.data("timer",setTimeout(function(){t.trigger(f)},o+33))},stop:function(t,e){t&&t.length&&(clearTimeout(t.data("timer")),e&&t.trigger(f),t.off(f).css("transition-duration",""),t.parent().removeClass("fancybox-is-scaling"))}},n.fn.fancybox=function(t){var e;return t=t||{},e=t.selector||!1,e?n("body").off("click.fb-start",e).on("click.fb-start",e,{options:t},i):this.off("click.fb-start").on("click.fb-start",{items:this,options:t},i),this},r.on("click.fb-start","[data-fancybox]",i),r.on("click.fb-start","[data-fancybox-trigger]",function(t){n('[data-fancybox="'+n(this).attr("data-fancybox-trigger")+'"]').eq(n(this).attr("data-fancybox-index")||0).trigger("click.fb-start",{$trigger:n(this)})}),function(){var t=null;r.on("mousedown mouseup focus blur",".fancybox-button",function(e){switch(e.type){case"mousedown":t=n(this);break;case"mouseup":t=null;break;case"focusin":n(".fancybox-button").removeClass("fancybox-focus"),n(this).is(t)||n(this).is("[disabled]")||n(this).addClass("fancybox-focus");break;case"focusout":n(".fancybox-button").removeClass("fancybox-focus")}})}()}}(window,document,jQuery),function(t){"use strict";var e={youtube:{matcher:/(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i,params:{autoplay:1,autohide:1,fs:1,rel:0,hd:1,wmode:"transparent",enablejsapi:1,html5:1},paramPlace:8,type:"iframe",url:"https://www.youtube-nocookie.com/embed/$4",thumb:"https://img.youtube.com/vi/$4/hqdefault.jpg"},vimeo:{matcher:/^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/,params:{autoplay:1,hd:1,show_title:1,show_byline:1,show_portrait:0,fullscreen:1},paramPlace:3,type:"iframe",url:"//player.vimeo.com/video/$2"},instagram:{matcher:/(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,type:"image",url:"//$1/p/$2/media/?size=l"},gmap_place:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/?ll="+(t[9]?t[9]+"&z="+Math.floor(t[10])+(t[12]?t[12].replace(/^\//,"&"):""):t[12]+"").replace(/\?/,"&")+"&output="+(t[12]&&t[12].indexOf("layer=c")>0?"svembed":"embed")}},gmap_search:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(maps\/search\/)(.*)/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/maps?q="+t[5].replace("query=","q=").replace("api=1","")+"&output=embed"}}},n=function(e,n,o){if(e)return o=o||"","object"===t.type(o)&&(o=t.param(o,!0)),t.each(n,function(t,n){e=e.replace("$"+t,n||"")}),o.length&&(e+=(e.indexOf("?")>0?"&":"?")+o),e};t(document).on("objectNeedsType.fb",function(o,i,a){var s,r,c,l,d,u,f,p=a.src||"",h=!1;s=t.extend(!0,{},e,a.opts.media),t.each(s,function(e,o){if(c=p.match(o.matcher)){if(h=o.type,f=e,u={},o.paramPlace&&c[o.paramPlace]){d=c[o.paramPlace],"?"==d[0]&&(d=d.substring(1)),d=d.split("&");for(var i=0;i<d.length;++i){var s=d[i].split("=",2);2==s.length&&(u[s[0]]=decodeURIComponent(s[1].replace(/\+/g," ")))}}return l=t.extend(!0,{},o.params,a.opts[e],u),p="function"===t.type(o.url)?o.url.call(this,c,l,a):n(o.url,c,l),r="function"===t.type(o.thumb)?o.thumb.call(this,c,l,a):n(o.thumb,c),"youtube"===e?p=p.replace(/&t=((\d+)m)?(\d+)s/,function(t,e,n,o){return"&start="+((n?60*parseInt(n,10):0)+parseInt(o,10))}):"vimeo"===e&&(p=p.replace("&%23","#")),!1}}),h?(a.opts.thumb||a.opts.$thumb&&a.opts.$thumb.length||(a.opts.thumb=r),"iframe"===h&&(a.opts=t.extend(!0,a.opts,{iframe:{preload:!1,attr:{scrolling:"no"}}})),t.extend(a,{type:h,src:p,origSrc:a.src,contentSource:f,contentType:"image"===h?"image":"gmap_place"==f||"gmap_search"==f?"map":"video"})):p&&(a.type=a.opts.defaultType)});var o={youtube:{src:"https://www.youtube.com/iframe_api",class:"YT",loading:!1,loaded:!1},vimeo:{src:"https://player.vimeo.com/api/player.js",class:"Vimeo",loading:!1,loaded:!1},load:function(t){var e,n=this;if(this[t].loaded)return void setTimeout(function(){n.done(t)});this[t].loading||(this[t].loading=!0,e=document.createElement("script"),e.type="text/javascript",e.src=this[t].src,"youtube"===t?window.onYouTubeIframeAPIReady=function(){n[t].loaded=!0,n.done(t)}:e.onload=function(){n[t].loaded=!0,n.done(t)},document.body.appendChild(e))},done:function(e){var n,o,i;"youtube"===e&&delete window.onYouTubeIframeAPIReady,(n=t.fancybox.getInstance())&&(o=n.current.$content.find("iframe"),"youtube"===e&&void 0!==YT&&YT?i=new YT.Player(o.attr("id"),{events:{onStateChange:function(t){0==t.data&&n.next()}}}):"vimeo"===e&&void 0!==Vimeo&&Vimeo&&(i=new Vimeo.Player(o),i.on("ended",function(){n.next()})))}};t(document).on({"afterShow.fb":function(t,e,n){e.group.length>1&&("youtube"===n.contentSource||"vimeo"===n.contentSource)&&o.load(n.contentSource)}})}(jQuery),function(t,e,n){"use strict";var o=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),i=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||function(e){t.clearTimeout(e)}}(),a=function(e){var n=[];e=e.originalEvent||e||t.e,e=e.touches&&e.touches.length?e.touches:e.changedTouches&&e.changedTouches.length?e.changedTouches:[e];for(var o in e)e[o].pageX?n.push({x:e[o].pageX,y:e[o].pageY}):e[o].clientX&&n.push({x:e[o].clientX,y:e[o].clientY});return n},s=function(t,e,n){return e&&t?"x"===n?t.x-e.x:"y"===n?t.y-e.y:Math.sqrt(Math.pow(t.x-e.x,2)+Math.pow(t.y-e.y,2)):0},r=function(t){if(t.is('a,area,button,[role="button"],input,label,select,summary,textarea,video,audio,iframe')||n.isFunction(t.get(0).onclick)||t.data("selectable"))return!0;for(var e=0,o=t[0].attributes,i=o.length;e<i;e++)if("data-fancybox-"===o[e].nodeName.substr(0,14))return!0;return!1},c=function(e){var n=t.getComputedStyle(e)["overflow-y"],o=t.getComputedStyle(e)["overflow-x"],i=("scroll"===n||"auto"===n)&&e.scrollHeight>e.clientHeight,a=("scroll"===o||"auto"===o)&&e.scrollWidth>e.clientWidth;return i||a},l=function(t){for(var e=!1;;){if(e=c(t.get(0)))break;if(t=t.parent(),!t.length||t.hasClass("fancybox-stage")||t.is("body"))break}return e},d=function(t){var e=this;e.instance=t,e.$bg=t.$refs.bg,e.$stage=t.$refs.stage,e.$container=t.$refs.container,e.destroy(),e.$container.on("touchstart.fb.touch mousedown.fb.touch",n.proxy(e,"ontouchstart"))};d.prototype.destroy=function(){var t=this;t.$container.off(".fb.touch"),n(e).off(".fb.touch"),t.requestId&&(i(t.requestId),t.requestId=null),t.tapped&&(clearTimeout(t.tapped),t.tapped=null)},d.prototype.ontouchstart=function(o){var i=this,c=n(o.target),d=i.instance,u=d.current,f=u.$slide,p=u.$content,h="touchstart"==o.type;if(h&&i.$container.off("mousedown.fb.touch"),(!o.originalEvent||2!=o.originalEvent.button)&&f.length&&c.length&&!r(c)&&!r(c.parent())&&(c.is("img")||!(o.originalEvent.clientX>c[0].clientWidth+c.offset().left))){if(!u||d.isAnimating||u.$slide.hasClass("fancybox-animated"))return o.stopPropagation(),void o.preventDefault();i.realPoints=i.startPoints=a(o),i.startPoints.length&&(u.touch&&o.stopPropagation(),i.startEvent=o,i.canTap=!0,i.$target=c,i.$content=p,i.opts=u.opts.touch,i.isPanning=!1,i.isSwiping=!1,i.isZooming=!1,i.isScrolling=!1,i.canPan=d.canPan(),i.startTime=(new Date).getTime(),i.distanceX=i.distanceY=i.distance=0,i.canvasWidth=Math.round(f[0].clientWidth),i.canvasHeight=Math.round(f[0].clientHeight),i.contentLastPos=null,i.contentStartPos=n.fancybox.getTranslate(i.$content)||{top:0,left:0},i.sliderStartPos=n.fancybox.getTranslate(f),i.stagePos=n.fancybox.getTranslate(d.$refs.stage),i.sliderStartPos.top-=i.stagePos.top,i.sliderStartPos.left-=i.stagePos.left,i.contentStartPos.top-=i.stagePos.top,i.contentStartPos.left-=i.stagePos.left,n(e).off(".fb.touch").on(h?"touchend.fb.touch touchcancel.fb.touch":"mouseup.fb.touch mouseleave.fb.touch",n.proxy(i,"ontouchend")).on(h?"touchmove.fb.touch":"mousemove.fb.touch",n.proxy(i,"ontouchmove")),n.fancybox.isMobile&&e.addEventListener("scroll",i.onscroll,!0),((i.opts||i.canPan)&&(c.is(i.$stage)||i.$stage.find(c).length)||(c.is(".fancybox-image")&&o.preventDefault(),n.fancybox.isMobile&&c.parents(".fancybox-caption").length))&&(i.isScrollable=l(c)||l(c.parent()),n.fancybox.isMobile&&i.isScrollable||o.preventDefault(),(1===i.startPoints.length||u.hasError)&&(i.canPan?(n.fancybox.stop(i.$content),i.isPanning=!0):i.isSwiping=!0,i.$container.addClass("fancybox-is-grabbing")),2===i.startPoints.length&&"image"===u.type&&(u.isLoaded||u.$ghost)&&(i.canTap=!1,i.isSwiping=!1,i.isPanning=!1,i.isZooming=!0,n.fancybox.stop(i.$content),i.centerPointStartX=.5*(i.startPoints[0].x+i.startPoints[1].x)-n(t).scrollLeft(),i.centerPointStartY=.5*(i.startPoints[0].y+i.startPoints[1].y)-n(t).scrollTop(),i.percentageOfImageAtPinchPointX=(i.centerPointStartX-i.contentStartPos.left)/i.contentStartPos.width,i.percentageOfImageAtPinchPointY=(i.centerPointStartY-i.contentStartPos.top)/i.contentStartPos.height,i.startDistanceBetweenFingers=s(i.startPoints[0],i.startPoints[1]))))}},d.prototype.onscroll=function(t){var n=this;n.isScrolling=!0,e.removeEventListener("scroll",n.onscroll,!0)},d.prototype.ontouchmove=function(t){var e=this;return void 0!==t.originalEvent.buttons&&0===t.originalEvent.buttons?void e.ontouchend(t):e.isScrolling?void(e.canTap=!1):(e.newPoints=a(t),void((e.opts||e.canPan)&&e.newPoints.length&&e.newPoints.length&&(e.isSwiping&&!0===e.isSwiping||t.preventDefault(),e.distanceX=s(e.newPoints[0],e.startPoints[0],"x"),e.distanceY=s(e.newPoints[0],e.startPoints[0],"y"),e.distance=s(e.newPoints[0],e.startPoints[0]),e.distance>0&&(e.isSwiping?e.onSwipe(t):e.isPanning?e.onPan():e.isZooming&&e.onZoom()))))},d.prototype.onSwipe=function(e){var a,s=this,r=s.instance,c=s.isSwiping,l=s.sliderStartPos.left||0;if(!0!==c)"x"==c&&(s.distanceX>0&&(s.instance.group.length<2||0===s.instance.current.index&&!s.instance.current.opts.loop)?l+=Math.pow(s.distanceX,.8):s.distanceX<0&&(s.instance.group.length<2||s.instance.current.index===s.instance.group.length-1&&!s.instance.current.opts.loop)?l-=Math.pow(-s.distanceX,.8):l+=s.distanceX),s.sliderLastPos={top:"x"==c?0:s.sliderStartPos.top+s.distanceY,left:l},s.requestId&&(i(s.requestId),s.requestId=null),s.requestId=o(function(){s.sliderLastPos&&(n.each(s.instance.slides,function(t,e){var o=e.pos-s.instance.currPos;n.fancybox.setTranslate(e.$slide,{top:s.sliderLastPos.top,left:s.sliderLastPos.left+o*s.canvasWidth+o*e.opts.gutter})}),s.$container.addClass("fancybox-is-sliding"))});else if(Math.abs(s.distance)>10){if(s.canTap=!1,r.group.length<2&&s.opts.vertical?s.isSwiping="y":r.isDragging||!1===s.opts.vertical||"auto"===s.opts.vertical&&n(t).width()>800?s.isSwiping="x":(a=Math.abs(180*Math.atan2(s.distanceY,s.distanceX)/Math.PI),s.isSwiping=a>45&&a<135?"y":"x"),"y"===s.isSwiping&&n.fancybox.isMobile&&s.isScrollable)return void(s.isScrolling=!0);r.isDragging=s.isSwiping,s.startPoints=s.newPoints,n.each(r.slides,function(t,e){var o,i;n.fancybox.stop(e.$slide),o=n.fancybox.getTranslate(e.$slide),i=n.fancybox.getTranslate(r.$refs.stage),e.$slide.css({transform:"",opacity:"","transition-duration":""}).removeClass("fancybox-animated").removeClass(function(t,e){return(e.match(/(^|\s)fancybox-fx-\S+/g)||[]).join(" ")}),e.pos===r.current.pos&&(s.sliderStartPos.top=o.top-i.top,s.sliderStartPos.left=o.left-i.left),n.fancybox.setTranslate(e.$slide,{top:o.top-i.top,left:o.left-i.left})}),r.SlideShow&&r.SlideShow.isActive&&r.SlideShow.stop()}},d.prototype.onPan=function(){var t=this;if(s(t.newPoints[0],t.realPoints[0])<(n.fancybox.isMobile?10:5))return void(t.startPoints=t.newPoints);t.canTap=!1,t.contentLastPos=t.limitMovement(),t.requestId&&i(t.requestId),t.requestId=o(function(){n.fancybox.setTranslate(t.$content,t.contentLastPos)})},d.prototype.limitMovement=function(){var t,e,n,o,i,a,s=this,r=s.canvasWidth,c=s.canvasHeight,l=s.distanceX,d=s.distanceY,u=s.contentStartPos,f=u.left,p=u.top,h=u.width,g=u.height;return i=h>r?f+l:f,a=p+d,t=Math.max(0,.5*r-.5*h),e=Math.max(0,.5*c-.5*g),n=Math.min(r-h,.5*r-.5*h),o=Math.min(c-g,.5*c-.5*g),l>0&&i>t&&(i=t-1+Math.pow(-t+f+l,.8)||0),l<0&&i<n&&(i=n+1-Math.pow(n-f-l,.8)||0),d>0&&a>e&&(a=e-1+Math.pow(-e+p+d,.8)||0),d<0&&a<o&&(a=o+1-Math.pow(o-p-d,.8)||0),{top:a,left:i}},d.prototype.limitPosition=function(t,e,n,o){var i=this,a=i.canvasWidth,s=i.canvasHeight;return n>a?(t=t>0?0:t,t=t<a-n?a-n:t):t=Math.max(0,a/2-n/2),o>s?(e=e>0?0:e,e=e<s-o?s-o:e):e=Math.max(0,s/2-o/2),{top:e,left:t}},d.prototype.onZoom=function(){var e=this,a=e.contentStartPos,r=a.width,c=a.height,l=a.left,d=a.top,u=s(e.newPoints[0],e.newPoints[1]),f=u/e.startDistanceBetweenFingers,p=Math.floor(r*f),h=Math.floor(c*f),g=(r-p)*e.percentageOfImageAtPinchPointX,b=(c-h)*e.percentageOfImageAtPinchPointY,m=(e.newPoints[0].x+e.newPoints[1].x)/2-n(t).scrollLeft(),v=(e.newPoints[0].y+e.newPoints[1].y)/2-n(t).scrollTop(),y=m-e.centerPointStartX,x=v-e.centerPointStartY,w=l+(g+y),$=d+(b+x),S={top:$,left:w,scaleX:f,scaleY:f};e.canTap=!1,e.newWidth=p,e.newHeight=h,e.contentLastPos=S,e.requestId&&i(e.requestId),e.requestId=o(function(){n.fancybox.setTranslate(e.$content,e.contentLastPos)})},d.prototype.ontouchend=function(t){var o=this,s=o.isSwiping,r=o.isPanning,c=o.isZooming,l=o.isScrolling;if(o.endPoints=a(t),o.dMs=Math.max((new Date).getTime()-o.startTime,1),o.$container.removeClass("fancybox-is-grabbing"),n(e).off(".fb.touch"),e.removeEventListener("scroll",o.onscroll,!0),o.requestId&&(i(o.requestId),o.requestId=null),o.isSwiping=!1,o.isPanning=!1,o.isZooming=!1,o.isScrolling=!1,o.instance.isDragging=!1,o.canTap)return o.onTap(t);o.speed=100,o.velocityX=o.distanceX/o.dMs*.5,o.velocityY=o.distanceY/o.dMs*.5,r?o.endPanning():c?o.endZooming():o.endSwiping(s,l)},d.prototype.endSwiping=function(t,e){var o=this,i=!1,a=o.instance.group.length,s=Math.abs(o.distanceX),r="x"==t&&a>1&&(o.dMs>130&&s>10||s>50);o.sliderLastPos=null,"y"==t&&!e&&Math.abs(o.distanceY)>50?(n.fancybox.animate(o.instance.current.$slide,{top:o.sliderStartPos.top+o.distanceY+150*o.velocityY,opacity:0},200),i=o.instance.close(!0,250)):r&&o.distanceX>0?i=o.instance.previous(300):r&&o.distanceX<0&&(i=o.instance.next(300)),!1!==i||"x"!=t&&"y"!=t||o.instance.centerSlide(200),o.$container.removeClass("fancybox-is-sliding")},d.prototype.endPanning=function(){var t,e,o,i=this;i.contentLastPos&&(!1===i.opts.momentum||i.dMs>350?(t=i.contentLastPos.left,e=i.contentLastPos.top):(t=i.contentLastPos.left+500*i.velocityX,e=i.contentLastPos.top+500*i.velocityY),o=i.limitPosition(t,e,i.contentStartPos.width,i.contentStartPos.height),o.width=i.contentStartPos.width,o.height=i.contentStartPos.height,n.fancybox.animate(i.$content,o,366))},d.prototype.endZooming=function(){var t,e,o,i,a=this,s=a.instance.current,r=a.newWidth,c=a.newHeight;a.contentLastPos&&(t=a.contentLastPos.left,e=a.contentLastPos.top,i={top:e,left:t,width:r,height:c,scaleX:1,scaleY:1},n.fancybox.setTranslate(a.$content,i),r<a.canvasWidth&&c<a.canvasHeight?a.instance.scaleToFit(150):r>s.width||c>s.height?a.instance.scaleToActual(a.centerPointStartX,a.centerPointStartY,150):(o=a.limitPosition(t,e,r,c),n.fancybox.animate(a.$content,o,150)))},d.prototype.onTap=function(e){var o,i=this,s=n(e.target),r=i.instance,c=r.current,l=e&&a(e)||i.startPoints,d=l[0]?l[0].x-n(t).scrollLeft()-i.stagePos.left:0,u=l[0]?l[0].y-n(t).scrollTop()-i.stagePos.top:0,f=function(t){var o=c.opts[t];if(n.isFunction(o)&&(o=o.apply(r,[c,e])),o)switch(o){case"close":r.close(i.startEvent);break;case"toggleControls":r.toggleControls();break;case"next":r.next();break;case"nextOrClose":r.group.length>1?r.next():r.close(i.startEvent);break;case"zoom":"image"==c.type&&(c.isLoaded||c.$ghost)&&(r.canPan()?r.scaleToFit():r.isScaledDown()?r.scaleToActual(d,u):r.group.length<2&&r.close(i.startEvent))}};if((!e.originalEvent||2!=e.originalEvent.button)&&(s.is("img")||!(d>s[0].clientWidth+s.offset().left))){if(s.is(".fancybox-bg,.fancybox-inner,.fancybox-outer,.fancybox-container"))o="Outside";else if(s.is(".fancybox-slide"))o="Slide";else{if(!r.current.$content||!r.current.$content.find(s).addBack().filter(s).length)return;o="Content"}if(i.tapped){if(clearTimeout(i.tapped),i.tapped=null,Math.abs(d-i.tapX)>50||Math.abs(u-i.tapY)>50)return this;f("dblclick"+o)}else i.tapX=d,i.tapY=u,c.opts["dblclick"+o]&&c.opts["dblclick"+o]!==c.opts["click"+o]?i.tapped=setTimeout(function(){i.tapped=null,r.isAnimating||f("click"+o)},500):f("click"+o);return this}},n(e).on("onActivate.fb",function(t,e){e&&!e.Guestures&&(e.Guestures=new d(e))}).on("beforeClose.fb",function(t,e){e&&e.Guestures&&e.Guestures.destroy()})}(window,document,jQuery),function(t,e){"use strict";e.extend(!0,e.fancybox.defaults,{btnTpl:{slideShow:'<button data-fancybox-play class="fancybox-button fancybox-button--play" title="{{PLAY_START}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 5.4v13.2l11-6.6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.33 5.75h2.2v12.5h-2.2V5.75zm5.15 0h2.2v12.5h-2.2V5.75z"/></svg></button>'},slideShow:{autoStart:!1,speed:3e3,progress:!0}});var n=function(t){this.instance=t,this.init()};e.extend(n.prototype,{timer:null,isActive:!1,$button:null,init:function(){var t=this,n=t.instance,o=n.group[n.currIndex].opts.slideShow;t.$button=n.$refs.toolbar.find("[data-fancybox-play]").on("click",function(){t.toggle()}),n.group.length<2||!o?t.$button.hide():o.progress&&(t.$progress=e('<div class="fancybox-progress"></div>').appendTo(n.$refs.inner))},set:function(t){var n=this,o=n.instance,i=o.current;i&&(!0===t||i.opts.loop||o.currIndex<o.group.length-1)?n.isActive&&"video"!==i.contentType&&(n.$progress&&e.fancybox.animate(n.$progress.show(),{scaleX:1},i.opts.slideShow.speed),n.timer=setTimeout(function(){o.current.opts.loop||o.current.index!=o.group.length-1?o.next():o.jumpTo(0)},i.opts.slideShow.speed)):(n.stop(),o.idleSecondsCounter=0,o.showControls())},clear:function(){var t=this;clearTimeout(t.timer),t.timer=null,t.$progress&&t.$progress.removeAttr("style").hide()},start:function(){var t=this,e=t.instance.current;e&&(t.$button.attr("title",(e.opts.i18n[e.opts.lang]||e.opts.i18n.en).PLAY_STOP).removeClass("fancybox-button--play").addClass("fancybox-button--pause"),t.isActive=!0,e.isComplete&&t.set(!0),t.instance.trigger("onSlideShowChange",!0))},stop:function(){var t=this,e=t.instance.current;t.clear(),t.$button.attr("title",(e.opts.i18n[e.opts.lang]||e.opts.i18n.en).PLAY_START).removeClass("fancybox-button--pause").addClass("fancybox-button--play"),t.isActive=!1,t.instance.trigger("onSlideShowChange",!1),t.$progress&&t.$progress.removeAttr("style").hide()},toggle:function(){var t=this;t.isActive?t.stop():t.start()}}),e(t).on({"onInit.fb":function(t,e){e&&!e.SlideShow&&(e.SlideShow=new n(e))},"beforeShow.fb":function(t,e,n,o){var i=e&&e.SlideShow;o?i&&n.opts.slideShow.autoStart&&i.start():i&&i.isActive&&i.clear()},"afterShow.fb":function(t,e,n){var o=e&&e.SlideShow;o&&o.isActive&&o.set()},"afterKeydown.fb":function(n,o,i,a,s){var r=o&&o.SlideShow;!r||!i.opts.slideShow||80!==s&&32!==s||e(t.activeElement).is("button,a,input")||(a.preventDefault(),r.toggle())},"beforeClose.fb onDeactivate.fb":function(t,e){var n=e&&e.SlideShow;n&&n.stop()}}),e(t).on("visibilitychange",function(){var n=e.fancybox.getInstance(),o=n&&n.SlideShow;o&&o.isActive&&(t.hidden?o.clear():o.set())})}(document,jQuery),function(t,e){"use strict";var n=function(){for(var e=[["requestFullscreen","exitFullscreen","fullscreenElement","fullscreenEnabled","fullscreenchange","fullscreenerror"],["webkitRequestFullscreen","webkitExitFullscreen","webkitFullscreenElement","webkitFullscreenEnabled","webkitfullscreenchange","webkitfullscreenerror"],["webkitRequestFullScreen","webkitCancelFullScreen","webkitCurrentFullScreenElement","webkitCancelFullScreen","webkitfullscreenchange","webkitfullscreenerror"],["mozRequestFullScreen","mozCancelFullScreen","mozFullScreenElement","mozFullScreenEnabled","mozfullscreenchange","mozfullscreenerror"],["msRequestFullscreen","msExitFullscreen","msFullscreenElement","msFullscreenEnabled","MSFullscreenChange","MSFullscreenError"]],n={},o=0;o<e.length;o++){var i=e[o];if(i&&i[1]in t){for(var a=0;a<i.length;a++)n[e[0][a]]=i[a];return n}}return!1}();if(n){var o={request:function(e){e=e||t.documentElement,e[n.requestFullscreen](e.ALLOW_KEYBOARD_INPUT)},exit:function(){t[n.exitFullscreen]()},toggle:function(e){e=e||t.documentElement,this.isFullscreen()?this.exit():this.request(e)},isFullscreen:function(){return Boolean(t[n.fullscreenElement])},enabled:function(){return Boolean(t[n.fullscreenEnabled])}};e.extend(!0,e.fancybox.defaults,{btnTpl:{fullScreen:'<button data-fancybox-fullscreen class="fancybox-button fancybox-button--fsenter" title="{{FULL_SCREEN}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 16h3v3h2v-5H5zm3-8H5v2h5V5H8zm6 11h2v-3h3v-2h-5zm2-11V5h-2v5h5V8z"/></svg></button>'},fullScreen:{autoStart:!1}}),e(t).on(n.fullscreenchange,function(){var t=o.isFullscreen(),n=e.fancybox.getInstance();n&&(n.current&&"image"===n.current.type&&n.isAnimating&&(n.isAnimating=!1,n.update(!0,!0,0),n.isComplete||n.complete()),n.trigger("onFullscreenChange",t),n.$refs.container.toggleClass("fancybox-is-fullscreen",t),n.$refs.toolbar.find("[data-fancybox-fullscreen]").toggleClass("fancybox-button--fsenter",!t).toggleClass("fancybox-button--fsexit",t))})}e(t).on({"onInit.fb":function(t,e){var i;if(!n)return void e.$refs.toolbar.find("[data-fancybox-fullscreen]").remove();e&&e.group[e.currIndex].opts.fullScreen?(i=e.$refs.container,i.on("click.fb-fullscreen","[data-fancybox-fullscreen]",function(t){t.stopPropagation(),t.preventDefault(),o.toggle()}),e.opts.fullScreen&&!0===e.opts.fullScreen.autoStart&&o.request(),e.FullScreen=o):e&&e.$refs.toolbar.find("[data-fancybox-fullscreen]").hide()},"afterKeydown.fb":function(t,e,n,o,i){e&&e.FullScreen&&70===i&&(o.preventDefault(),e.FullScreen.toggle())},"beforeClose.fb":function(t,e){e&&e.FullScreen&&e.$refs.container.hasClass("fancybox-is-fullscreen")&&o.exit()}})}(document,jQuery),function(t,e){"use strict";var n="fancybox-thumbs";e.fancybox.defaults=e.extend(!0,{btnTpl:{thumbs:'<button data-fancybox-thumbs class="fancybox-button fancybox-button--thumbs" title="{{THUMBS}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.59 14.59h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76H5.65V5.65z"/></svg></button>'},thumbs:{autoStart:!1,hideOnClose:!0,parentEl:".fancybox-container",axis:"y"}},e.fancybox.defaults);var o=function(t){this.init(t)};e.extend(o.prototype,{$button:null,$grid:null,$list:null,isVisible:!1,isActive:!1,init:function(t){var e=this,n=t.group,o=0;e.instance=t,e.opts=n[t.currIndex].opts.thumbs,t.Thumbs=e,e.$button=t.$refs.toolbar.find("[data-fancybox-thumbs]");for(var i=0,a=n.length;i<a&&(n[i].thumb&&o++,!(o>1));i++);o>1&&e.opts?(e.$button.removeAttr("style").on("click",function(){e.toggle()}),e.isActive=!0):e.$button.hide()},create:function(){var t,o=this,i=o.instance,a=o.opts.parentEl,s=[];o.$grid||(o.$grid=e('<div class="'+n+" "+n+"-"+o.opts.axis+'"></div>').appendTo(i.$refs.container.find(a).addBack().filter(a)),o.$grid.on("click","a",function(){i.jumpTo(e(this).attr("data-index"))})),o.$list||(o.$list=e('<div class="'+n+'__list">').appendTo(o.$grid)),e.each(i.group,function(e,n){t=n.thumb,t||"image"!==n.type||(t=n.src),s.push('<a href="javascript:;" tabindex="0" data-index="'+e+'"'+(t&&t.length?' style="background-image:url('+t+')"':'class="fancybox-thumbs-missing"')+"></a>")}),o.$list[0].innerHTML=s.join(""),"x"===o.opts.axis&&o.$list.width(parseInt(o.$grid.css("padding-right"),10)+i.group.length*o.$list.children().eq(0).outerWidth(!0))},focus:function(t){var e,n,o=this,i=o.$list,a=o.$grid;o.instance.current&&(e=i.children().removeClass("fancybox-thumbs-active").filter('[data-index="'+o.instance.current.index+'"]').addClass("fancybox-thumbs-active"),n=e.position(),"y"===o.opts.axis&&(n.top<0||n.top>i.height()-e.outerHeight())?i.stop().animate({scrollTop:i.scrollTop()+n.top},t):"x"===o.opts.axis&&(n.left<a.scrollLeft()||n.left>a.scrollLeft()+(a.width()-e.outerWidth()))&&i.parent().stop().animate({scrollLeft:n.left},t))},update:function(){var t=this;t.instance.$refs.container.toggleClass("fancybox-show-thumbs",this.isVisible),t.isVisible?(t.$grid||t.create(),t.instance.trigger("onThumbsShow"),t.focus(0)):t.$grid&&t.instance.trigger("onThumbsHide"),t.instance.update()},hide:function(){this.isVisible=!1,this.update()},show:function(){this.isVisible=!0,this.update()},toggle:function(){this.isVisible=!this.isVisible,this.update()}}),e(t).on({"onInit.fb":function(t,e){var n;e&&!e.Thumbs&&(n=new o(e),n.isActive&&!0===n.opts.autoStart&&n.show())},"beforeShow.fb":function(t,e,n,o){var i=e&&e.Thumbs;i&&i.isVisible&&i.focus(o?0:250)},"afterKeydown.fb":function(t,e,n,o,i){var a=e&&e.Thumbs;a&&a.isActive&&71===i&&(o.preventDefault(),a.toggle())},"beforeClose.fb":function(t,e){var n=e&&e.Thumbs;n&&n.isVisible&&!1!==n.opts.hideOnClose&&n.$grid.hide()}})}(document,jQuery),function(t,e){"use strict";function n(t){var e={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#x2F;","`":"&#x60;","=":"&#x3D;"};return String(t).replace(/[&<>"'`=\/]/g,function(t){return e[t]})}e.extend(!0,e.fancybox.defaults,{btnTpl:{share:'<button data-fancybox-share class="fancybox-button fancybox-button--share" title="{{SHARE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M2.55 19c1.4-8.4 9.1-9.8 11.9-9.8V5l7 7-7 6.3v-3.5c-2.8 0-10.5 2.1-11.9 4.2z"/></svg></button>'},share:{url:function(t,e){return!t.currentHash&&"inline"!==e.type&&"html"!==e.type&&(e.origSrc||e.src)||window.location},
        tpl:'<div class="fancybox-share"><h1>{{SHARE}}</h1><p><a class="fancybox-share__button fancybox-share__button--fb" href="https://www.facebook.com/sharer/sharer.php?u={{url}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196" /></svg><span>Facebook</span></a><a class="fancybox-share__button fancybox-share__button--tw" href="https://twitter.com/intent/tweet?url={{url}}&text={{descr}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m456 133c-14 7-31 11-47 13 17-10 30-27 37-46-15 10-34 16-52 20-61-62-157-7-141 75-68-3-129-35-169-85-22 37-11 86 26 109-13 0-26-4-37-9 0 39 28 72 65 80-12 3-25 4-37 2 10 33 41 57 77 57-42 30-77 38-122 34 170 111 378-32 359-208 16-11 30-25 41-42z" /></svg><span>Twitter</span></a><a class="fancybox-share__button fancybox-share__button--pt" href="https://www.pinterest.com/pin/create/button/?url={{url}}&description={{descr}}&media={{media}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m265 56c-109 0-164 78-164 144 0 39 15 74 47 87 5 2 10 0 12-5l4-19c2-6 1-8-3-13-9-11-15-25-15-45 0-58 43-110 113-110 62 0 96 38 96 88 0 67-30 122-73 122-24 0-42-19-36-44 6-29 20-60 20-81 0-19-10-35-31-35-25 0-44 26-44 60 0 21 7 36 7 36l-30 125c-8 37-1 83 0 87 0 3 4 4 5 2 2-3 32-39 42-75l16-64c8 16 31 29 56 29 74 0 124-67 124-157 0-69-58-132-146-132z" fill="#fff"/></svg><span>Pinterest</span></a></p><p><input class="fancybox-share__input" type="text" value="{{url_raw}}" onclick="select()" /></p></div>'}}),e(t).on("click","[data-fancybox-share]",function(){var t,o,i=e.fancybox.getInstance(),a=i.current||null;a&&("function"===e.type(a.opts.share.url)&&(t=a.opts.share.url.apply(a,[i,a])),o=a.opts.share.tpl.replace(/\{\{media\}\}/g,"image"===a.type?encodeURIComponent(a.src):"").replace(/\{\{url\}\}/g,encodeURIComponent(t)).replace(/\{\{url_raw\}\}/g,n(t)).replace(/\{\{descr\}\}/g,i.$caption?encodeURIComponent(i.$caption.text()):""),e.fancybox.open({src:i.translate(i,o),type:"html",opts:{touch:!1,animationEffect:!1,afterLoad:function(t,e){i.$refs.container.one("beforeClose.fb",function(){t.close(null,0)}),e.$content.find(".fancybox-share__button").click(function(){return window.open(this.href,"Share","width=550, height=450"),!1})},mobile:{autoFocus:!1}}}))})}(document,jQuery),function(t,e,n){"use strict";function o(){var e=t.location.hash.substr(1),n=e.split("-"),o=n.length>1&&/^\+?\d+$/.test(n[n.length-1])?parseInt(n.pop(-1),10)||1:1,i=n.join("-");return{hash:e,index:o<1?1:o,gallery:i}}function i(t){""!==t.gallery&&n("[data-fancybox='"+n.escapeSelector(t.gallery)+"']").eq(t.index-1).focus().trigger("click.fb-start")}function a(t){var e,n;return!!t&&(e=t.current?t.current.opts:t.opts,""!==(n=e.hash||(e.$orig?e.$orig.data("fancybox")||e.$orig.data("fancybox-trigger"):""))&&n)}n.escapeSelector||(n.escapeSelector=function(t){return(t+"").replace(/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,function(t,e){return e?"\0"===t?"�":t.slice(0,-1)+"\\"+t.charCodeAt(t.length-1).toString(16)+" ":"\\"+t})}),n(function(){!1!==n.fancybox.defaults.hash&&(n(e).on({"onInit.fb":function(t,e){var n,i;!1!==e.group[e.currIndex].opts.hash&&(n=o(),(i=a(e))&&n.gallery&&i==n.gallery&&(e.currIndex=n.index-1))},"beforeShow.fb":function(n,o,i,s){var r;i&&!1!==i.opts.hash&&(r=a(o))&&(o.currentHash=r+(o.group.length>1?"-"+(i.index+1):""),t.location.hash!=="#"+o.currentHash&&(s&&!o.origHash&&(o.origHash=t.location.hash),o.hashTimer&&clearTimeout(o.hashTimer),o.hashTimer=setTimeout(function(){"replaceState"in t.history?(t.history[s?"pushState":"replaceState"]({},e.title,t.location.pathname+t.location.search+"#"+o.currentHash),s&&(o.hasCreatedHistory=!0)):t.location.hash=o.currentHash,o.hashTimer=null},300)))},"beforeClose.fb":function(n,o,i){i&&!1!==i.opts.hash&&(clearTimeout(o.hashTimer),o.currentHash&&o.hasCreatedHistory?t.history.back():o.currentHash&&("replaceState"in t.history?t.history.replaceState({},e.title,t.location.pathname+t.location.search+(o.origHash||"")):t.location.hash=o.origHash),o.currentHash=null)}}),n(t).on("hashchange.fb",function(){var t=o(),e=null;n.each(n(".fancybox-container").get().reverse(),function(t,o){var i=n(o).data("FancyBox");if(i&&i.currentHash)return e=i,!1}),e?e.currentHash===t.gallery+"-"+t.index||1===t.index&&e.currentHash==t.gallery||(e.currentHash=null,e.close()):""!==t.gallery&&i(t)}),setTimeout(function(){n.fancybox.getInstance()||i(o())},50))})}(window,document,jQuery),function(t,e){"use strict";var n=(new Date).getTime();e(t).on({"onInit.fb":function(t,e,o){e.$refs.stage.on("",function(t){var o=e.current,i=(new Date).getTime();e.group.length<2||!1===o.opts.wheel||"auto"===o.opts.wheel&&"image"!==o.type||(t.preventDefault(),t.stopPropagation(),o.$slide.hasClass("fancybox-animated")||(t=t.originalEvent||t,i-n<250||(n=i,e[(-t.deltaY||-t.deltaX||t.wheelDelta||-t.detail)<0?"next":"previous"]())))})}})}(document,jQuery);




/*! pace 1.0.0 */
(function () {
    var a,
        b,
        c,
        d,
        e,
        f,
        g,
        h,
        i,
        j,
        k,
        l,
        m,
        n,
        o,
        p,
        q,
        r,
        s,
        t,
        u,
        v,
        w,
        x,
        y,
        z,
        A,
        B,
        C,
        D,
        E,
        F,
        G,
        H,
        I,
        J,
        K,
        L,
        M,
        N,
        O,
        P,
        Q,
        R,
        S,
        T,
        U,
        V,
        W,
        X = [].slice,
        Y = {}.hasOwnProperty,
        Z = function (a, b) {
            function c() {
                this.constructor = a;
            }
            for (var d in b) Y.call(b, d) && (a[d] = b[d]);
            return (
                (c.prototype = b.prototype),
                    (a.prototype = new c()),
                    (a.__super__ = b.prototype),
                    a
            );
        },
        $ =
            [].indexOf ||
            function (a) {
                for (var b = 0, c = this.length; c > b; b++)
                    if (b in this && this[b] === a) return b;
                return -1;
            };
    for (
        u = {
            catchupTime: 100,
            initialRate: 0.03,
            minTime: 250,
            ghostTime: 100,
            maxProgressPerFrame: 20,
            easeFactor: 1.25,
            startOnPageLoad: !0,
            restartOnPushState: !0,
            restartOnRequestAfter: 500,
            target: 'body',
            elements: { checkInterval: 100, selectors: ['body'] },
            eventLag: { minSamples: 10, sampleCount: 3, lagThreshold: 3 },
            ajax: { trackMethods: ['GET'], trackWebSockets: !0, ignoreURLs: [] },
        },
            C = function () {
                var a;
                return null !=
                (a =
                    'undefined' != typeof performance &&
                    null !== performance &&
                    'function' == typeof performance.now
                        ? performance.now()
                        : void 0)
                    ? a
                    : +new Date();
            },
            E =
                window.requestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.msRequestAnimationFrame,
            t = window.cancelAnimationFrame || window.mozCancelAnimationFrame,
        null == E &&
        ((E = function (a) {
            return setTimeout(a, 50);
        }),
            (t = function (a) {
                return clearTimeout(a);
            })),
            G = function (a) {
                var b, c;
                return (
                    (b = C()),
                        (c = function () {
                            var d;
                            return (
                                (d = C() - b),
                                    d >= 33
                                        ? ((b = C()),
                                            a(d, function () {
                                                return E(c);
                                            }))
                                        : setTimeout(c, 33 - d)
                            );
                        })()
                );
            },
            F = function () {
                var a, b, c;
                return (
                    (c = arguments[0]),
                        (b = arguments[1]),
                        (a = 3 <= arguments.length ? X.call(arguments, 2) : []),
                        'function' == typeof c[b] ? c[b].apply(c, a) : c[b]
                );
            },
            v = function () {
                var a, b, c, d, e, f, g;
                for (
                    b = arguments[0],
                        d = 2 <= arguments.length ? X.call(arguments, 1) : [],
                        f = 0,
                        g = d.length;
                    g > f;
                    f++
                )
                    if ((c = d[f]))
                        for (a in c)
                            Y.call(c, a) &&
                            ((e = c[a]),
                                null != b[a] &&
                                'object' == typeof b[a] &&
                                null != e &&
                                'object' == typeof e
                                    ? v(b[a], e)
                                    : (b[a] = e));
                return b;
            },
            q = function (a) {
                var b, c, d, e, f;
                for (c = b = 0, e = 0, f = a.length; f > e; e++)
                    (d = a[e]), (c += Math.abs(d)), b++;
                return c / b;
            },
            x = function (a, b) {
                var c, d, e;
                if (
                    (null == a && (a = 'options'),
                    null == b && (b = !0),
                        (e = document.querySelector('[data-pace-' + a + ']')))
                ) {
                    if (((c = e.getAttribute('data-pace-' + a)), !b)) return c;
                    try {
                        return JSON.parse(c);
                    } catch (f) {
                        return (
                            (d = f),
                                'undefined' != typeof console && null !== console
                                    ? console.error('Error parsing inline pace options', d)
                                    : void 0
                        );
                    }
                }
            },
            g = (function () {
                function a() {}
                return (
                    (a.prototype.on = function (a, b, c, d) {
                        var e;
                        return (
                            null == d && (d = !1),
                            null == this.bindings && (this.bindings = {}),
                            null == (e = this.bindings)[a] && (e[a] = []),
                                this.bindings[a].push({ handler: b, ctx: c, once: d })
                        );
                    }),
                        (a.prototype.once = function (a, b, c) {
                            return this.on(a, b, c, !0);
                        }),
                        (a.prototype.off = function (a, b) {
                            var c, d, e;
                            if (null != (null != (d = this.bindings) ? d[a] : void 0)) {
                                if (null == b) return delete this.bindings[a];
                                for (c = 0, e = []; c < this.bindings[a].length; )
                                    e.push(
                                        this.bindings[a][c].handler === b
                                            ? this.bindings[a].splice(c, 1)
                                            : c++
                                    );
                                return e;
                            }
                        }),
                        (a.prototype.trigger = function () {
                            var a, b, c, d, e, f, g, h, i;
                            if (
                                ((c = arguments[0]),
                                    (a = 2 <= arguments.length ? X.call(arguments, 1) : []),
                                    null != (g = this.bindings) ? g[c] : void 0)
                            ) {
                                for (e = 0, i = []; e < this.bindings[c].length; )
                                    (h = this.bindings[c][e]),
                                        (d = h.handler),
                                        (b = h.ctx),
                                        (f = h.once),
                                        d.apply(null != b ? b : this, a),
                                        i.push(f ? this.bindings[c].splice(e, 1) : e++);
                                return i;
                            }
                        }),
                        a
                );
            })(),
            j = window.Pace || {},
            window.Pace = j,
            v(j, g.prototype),
            D = j.options = v({}, u, window.paceOptions, x()),
            U = ['ajax', 'document', 'eventLag', 'elements'],
            Q = 0,
            S = U.length;
        S > Q;
        Q++
    )
        (K = U[Q]), D[K] === !0 && (D[K] = u[K]);
    (i = (function (a) {
        function b() {
            return (V = b.__super__.constructor.apply(this, arguments));
        }
        return Z(b, a), b;
    })(Error)),
        (b = (function () {
            function a() {
                this.progress = 0;
            }
            return (
                    (a.prototype.update = function (a) {
                        return (this.progress = a), this.render();
                    }),
                    (a.prototype.destroy = function () {
                        try {
                            this.getElement().parentNode.removeChild(this.getElement());
                        } catch (a) {
                            i = a;
                        }
                        return (this.el = void 0);
                    }),
                    (a.prototype.render = function () {
                        var a, b, c, d, e, f, g;
                        if (null == document.querySelector(D.target)) return !1;
                        for (
                            a = this.getElement(),
                                d = 'translate3d(' + this.progress + '%, 0, 0)',
                                g = ['webkitTransform', 'msTransform', 'transform'],
                                e = 0,
                                f = g.length;
                            f > e;
                            e++
                        )
                            (b = g[e]), (a.children[0].style[b] = d);
                        return (
                            (!this.lastRenderedProgress ||
                                this.lastRenderedProgress | (0 !== this.progress) | 0) &&
                            (a.children[0].setAttribute(
                                'data-progress-text',
                                '' + (0 | this.progress) + '%'
                            ),
                                this.progress >= 100
                                    ? (c = '99')
                                    : ((c = this.progress < 10 ? '0' : ''),
                                        (c += 0 | this.progress)),
                                a.children[0].setAttribute('data-progress', '' + c)),
                                (this.lastRenderedProgress = this.progress)
                        );
                    }),
                    (a.prototype.done = function () {
                        return this.progress >= 100;
                    }),
                    a
            );
        })()),
        (h = (function () {
            function a() {
                this.bindings = {};
            }
            return (
                (a.prototype.trigger = function (a, b) {
                    var c, d, e, f, g;
                    if (null != this.bindings[a]) {
                        for (
                            f = this.bindings[a], g = [], d = 0, e = f.length;
                            e > d;
                            d++
                        )
                            (c = f[d]), g.push(c.call(this, b));
                        return g;
                    }
                }),
                    (a.prototype.on = function (a, b) {
                        var c;
                        return (
                            null == (c = this.bindings)[a] && (c[a] = []),
                                this.bindings[a].push(b)
                        );
                    }),
                    a
            );
        })()),
        (P = window.XMLHttpRequest),
        (O = window.XDomainRequest),
        (N = window.WebSocket),
        (w = function (a, b) {
            var c, d, e, f;
            f = [];
            for (d in b.prototype)
                try {
                    (e = b.prototype[d]),
                        f.push(
                            null == a[d] && 'function' != typeof e
                                ? (a[d] = e)
                                : void 0
                        );
                } catch (g) {
                    c = g;
                }
            return f;
        }),
        (A = []),
        (j.ignore = function () {
            var a, b, c;
            return (
                (b = arguments[0]),
                    (a = 2 <= arguments.length ? X.call(arguments, 1) : []),
                    A.unshift('ignore'),
                    (c = b.apply(null, a)),
                    A.shift(),
                    c
            );
        }),
        (j.track = function () {
            var a, b, c;
            return (
                (b = arguments[0]),
                    (a = 2 <= arguments.length ? X.call(arguments, 1) : []),
                    A.unshift('track'),
                    (c = b.apply(null, a)),
                    A.shift(),
                    c
            );
        }),
        (J = function (a) {
            var b;
            if ((null == a && (a = 'GET'), 'track' === A[0])) return 'force';
            if (!A.length && D.ajax) {
                if ('socket' === a && D.ajax.trackWebSockets) return !0;
                if (((b = a.toUpperCase()), $.call(D.ajax.trackMethods, b) >= 0))
                    return !0;
            }
            return !1;
        }),
        (k = (function (a) {
            function b() {
                var a,
                    c = this;
                b.__super__.constructor.apply(this, arguments),
                    (a = function (a) {
                        var b;
                        return (
                            (b = a.open),
                                (a.open = function (d, e) {
                                    return (
                                        J(d) &&
                                        c.trigger('request', {
                                            type: d,
                                            url: e,
                                            request: a,
                                        }),
                                            b.apply(a, arguments)
                                    );
                                })
                        );
                    }),
                    (window.XMLHttpRequest = function (b) {
                        var c;
                        return (c = new P(b)), a(c), c;
                    });
                try {
                    w(window.XMLHttpRequest, P);
                } catch (d) {}
                if (null != O) {
                    window.XDomainRequest = function () {
                        var b;
                        return (b = new O()), a(b), b;
                    };
                    try {
                        w(window.XDomainRequest, O);
                    } catch (d) {}
                }
                if (null != N && D.ajax.trackWebSockets) {
                    window.WebSocket = function (a, b) {
                        var d;
                        return (
                            (d = null != b ? new N(a, b) : new N(a)),
                            J('socket') &&
                            c.trigger('request', {
                                type: 'socket',
                                url: a,
                                protocols: b,
                                request: d,
                            }),
                                d
                        );
                    };
                    try {
                        w(window.WebSocket, N);
                    } catch (d) {}
                }
            }
            return Z(b, a), b;
        })(h)),
        (R = null),
        (y = function () {
            return null == R && (R = new k()), R;
        }),
        (I = function (a) {
            var b, c, d, e;
            for (e = D.ajax.ignoreURLs, c = 0, d = e.length; d > c; c++)
                if (((b = e[c]), 'string' == typeof b)) {
                    if (-1 !== a.indexOf(b)) return !0;
                } else if (b.test(a)) return !0;
            return !1;
        }),
        y().on('request', function (b) {
            var c, d, e, f, g;
            return (
                (f = b.type),
                    (e = b.request),
                    (g = b.url),
                    I(g)
                        ? void 0
                        : j.running ||
                        (D.restartOnRequestAfter === !1 && 'force' !== J(f))
                        ? void 0
                        : ((d = arguments),
                            (c = D.restartOnRequestAfter || 0),
                        'boolean' == typeof c && (c = 0),
                            setTimeout(function () {
                                var b, c, g, h, i, k;
                                if (
                                    (b =
                                        'socket' === f
                                            ? e.readyState < 2
                                            : 0 < (h = e.readyState) && 4 > h)
                                ) {
                                    for (
                                        j.restart(),
                                            i = j.sources,
                                            k = [],
                                            c = 0,
                                            g = i.length;
                                        g > c;
                                        c++
                                    ) {
                                        if (((K = i[c]), K instanceof a)) {
                                            K.watch.apply(K, d);
                                            break;
                                        }
                                        k.push(void 0);
                                    }
                                    return k;
                                }
                            }, c))
            );
        }),
        (a = (function () {
            function a() {
                var a = this;
                (this.elements = []),
                    y().on('request', function () {
                        return a.watch.apply(a, arguments);
                    });
            }
            return (
                (a.prototype.watch = function (a) {
                    var b, c, d, e;
                    return (
                        (d = a.type),
                            (b = a.request),
                            (e = a.url),
                            I(e)
                                ? void 0
                                : ((c = 'socket' === d ? new n(b) : new o(b)),
                                    this.elements.push(c))
                    );
                }),
                    a
            );
        })()),
        (o = (function () {
            function a(a) {
                var b,
                    c,
                    d,
                    e,
                    f,
                    g,
                    h = this;
                if (((this.progress = 0), null != window.ProgressEvent))
                    for (
                        c = null,
                            a.addEventListener(
                                'progress',
                                function (a) {
                                    return (h.progress = a.lengthComputable
                                        ? (100 * a.loaded) / a.total
                                        : h.progress + (100 - h.progress) / 2);
                                },
                                !1
                            ),
                            g = ['load', 'abort', 'timeout', 'error'],
                            d = 0,
                            e = g.length;
                        e > d;
                        d++
                    )
                        (b = g[d]),
                            a.addEventListener(
                                b,
                                function () {
                                    return (h.progress = 100);
                                },
                                !1
                            );
                else
                    (f = a.onreadystatechange),
                        (a.onreadystatechange = function () {
                            var b;
                            return (
                                0 === (b = a.readyState) || 4 === b
                                    ? (h.progress = 100)
                                    : 3 === a.readyState && (h.progress = 50),
                                    'function' == typeof f
                                        ? f.apply(null, arguments)
                                        : void 0
                            );
                        });
            }
            return a;
        })()),
        (n = (function () {
            function a(a) {
                var b,
                    c,
                    d,
                    e,
                    f = this;
                for (
                    this.progress = 0, e = ['error', 'open'], c = 0, d = e.length;
                    d > c;
                    c++
                )
                    (b = e[c]),
                        a.addEventListener(
                            b,
                            function () {
                                return (f.progress = 100);
                            },
                            !1
                        );
            }
            return a;
        })()),
        (d = (function () {
            function a(a) {
                var b, c, d, f;
                for (
                    null == a && (a = {}),
                        this.elements = [],
                    null == a.selectors && (a.selectors = []),
                        f = a.selectors,
                        c = 0,
                        d = f.length;
                    d > c;
                    c++
                )
                    (b = f[c]), this.elements.push(new e(b));
            }
            return a;
        })()),
        (e = (function () {
            function a(a) {
                (this.selector = a), (this.progress = 0), this.check();
            }
            return (
                (a.prototype.check = function () {
                    var a = this;
                    return document.querySelector(this.selector)
                        ? this.done()
                        : setTimeout(function () {
                            return a.check();
                        }, D.elements.checkInterval);
                }),
                    (a.prototype.done = function () {
                        return (this.progress = 100);
                    }),
                    a
            );
        })()),
        (c = (function () {
            function a() {
                var a,
                    b,
                    c = this;
                (this.progress =
                    null != (b = this.states[document.readyState]) ? b : 100),
                    (a = document.onreadystatechange),
                    (document.onreadystatechange = function () {
                        return (
                            null != c.states[document.readyState] &&
                            (c.progress = c.states[document.readyState]),
                                'function' == typeof a ? a.apply(null, arguments) : void 0
                        );
                    });
            }
            return (
                (a.prototype.states = {
                    loading: 0,
                    interactive: 50,
                    complete: 100,
                }),
                    a
            );
        })()),
        (f = (function () {
            function a() {
                var a,
                    b,
                    c,
                    d,
                    e,
                    f = this;
                (this.progress = 0),
                    (a = 0),
                    (e = []),
                    (d = 0),
                    (c = C()),
                    (b = setInterval(function () {
                        var g;
                        return (
                            (g = C() - c - 50),
                                (c = C()),
                                e.push(g),
                            e.length > D.eventLag.sampleCount && e.shift(),
                                (a = q(e)),
                                ++d >= D.eventLag.minSamples && a < D.eventLag.lagThreshold
                                    ? ((f.progress = 100), clearInterval(b))
                                    : (f.progress = 100 * (3 / (a + 3)))
                        );
                    }, 50));
            }
            return a;
        })()),
        (m = (function () {
            function a(a) {
                (this.source = a),
                    (this.last = this.sinceLastUpdate = 0),
                    (this.rate = D.initialRate),
                    (this.catchup = 0),
                    (this.progress = this.lastProgress = 0),
                null != this.source &&
                (this.progress = F(this.source, 'progress'));
            }
            return (
                (a.prototype.tick = function (a, b) {
                    var c;
                    return (
                        null == b && (b = F(this.source, 'progress')),
                        b >= 100 && (this.done = !0),
                            b === this.last
                                ? (this.sinceLastUpdate += a)
                                : (this.sinceLastUpdate &&
                                (this.rate = (b - this.last) / this.sinceLastUpdate),
                                    (this.catchup = (b - this.progress) / D.catchupTime),
                                    (this.sinceLastUpdate = 0),
                                    (this.last = b)),
                        b > this.progress && (this.progress += this.catchup * a),
                            (c = 1 - Math.pow(this.progress / 100, D.easeFactor)),
                            (this.progress += c * this.rate * a),
                            (this.progress = Math.min(
                                this.lastProgress + D.maxProgressPerFrame,
                                this.progress
                            )),
                            (this.progress = Math.max(0, this.progress)),
                            (this.progress = Math.min(100, this.progress)),
                            (this.lastProgress = this.progress),
                            this.progress
                    );
                }),
                    a
            );
        })()),
        (L = null),
        (H = null),
        (r = null),
        (M = null),
        (p = null),
        (s = null),
        (j.running = !1),
        (z = function () {
            return D.restartOnPushState ? j.restart() : void 0;
        }),
    null != window.history.pushState &&
    ((T = window.history.pushState),
        (window.history.pushState = function () {
            return z(), T.apply(window.history, arguments);
        })),
    null != window.history.replaceState &&
    ((W = window.history.replaceState),
        (window.history.replaceState = function () {
            return z(), W.apply(window.history, arguments);
        })),
        (l = { ajax: a, elements: d, document: c, eventLag: f }),
        (B = function () {
            var a, c, d, e, f, g, h, i;
            for (
                j.sources = L = [],
                    g = ['ajax', 'elements', 'document', 'eventLag'],
                    c = 0,
                    e = g.length;
                e > c;
                c++
            )
                (a = g[c]), D[a] !== !1 && L.push(new l[a](D[a]));
            for (
                i = null != (h = D.extraSources) ? h : [], d = 0, f = i.length;
                f > d;
                d++
            )
                (K = i[d]), L.push(new K(D));
            return (j.bar = r = new b()), (H = []), (M = new m());
        })(),
        (j.stop = function () {
            return (
                j.trigger('stop'),
                    (j.running = !1),
                    r.destroy(),
                    (s = !0),
                null != p && ('function' == typeof t && t(p), (p = null)),
                    B()
            );
        }),
        (j.restart = function () {
            return j.trigger('restart'), j.stop(), j.start();
        }),
        (j.go = function () {
            var a;
            return (
                (j.running = !0),
                    r.render(),
                    (a = C()),
                    (s = !1),
                    (p = G(function (b, c) {
                        var d, e, f, g, h, i, k, l, n, o, p, q, t, u, v, w;
                        for (
                            l = 100 - r.progress,
                                e = p = 0,
                                f = !0,
                                i = q = 0,
                                u = L.length;
                            u > q;
                            i = ++q
                        )
                            for (
                                K = L[i],
                                    o = null != H[i] ? H[i] : (H[i] = []),
                                    h = null != (w = K.elements) ? w : [K],
                                    k = t = 0,
                                    v = h.length;
                                v > t;
                                k = ++t
                            )
                                (g = h[k]),
                                    (n = null != o[k] ? o[k] : (o[k] = new m(g))),
                                    (f &= n.done),
                                n.done || (e++, (p += n.tick(b)));
                        return (
                            (d = p / e),
                                r.update(M.tick(b, d)),
                                r.done() || f || s
                                    ? (r.update(100),
                                        j.trigger('done'),
                                        setTimeout(function () {
                                            return (
                                                r.finish(), (j.running = !1), j.trigger('hide')
                                            );
                                        }, Math.max(
                                            D.ghostTime,
                                            Math.max(D.minTime - (C() - a), 0)
                                        )))
                                    : c()
                        );
                    }))
            );
        }),
        (j.start = function (a) {
            v(D, a), (j.running = !0);
            try {
                r.render();
            } catch (b) {
                i = b;
            }
            return document.querySelector('.pace')
                ? (j.trigger('start'), j.go())
                : setTimeout(j.start, 50);
        }),
        'function' == typeof define && define.amd
            ? define(function () {
                return j;
            })
            : 'object' == typeof exports
            ? (module.exports = j)
            : D.startOnPageLoad && j.start();
}.call(this));

!(function (e) {
    e.fn.parallaxie = function (o) {
        o = e.extend(
            {
                speed: 0.2,
                repeat: 'no-repeat',
                size: 'cover',
                pos_x: 'center',
                offset: 0,
            },
            o
        );
        return (
            this.each(function () {
                var a = e(this),
                    t = a.data('parallaxie');
                'object' != typeof t && (t = {}), (t = e.extend({}, o, t));
                var s = a.data('image');
                if (void 0 === s) {
                    if (!(s = a.css('background-image'))) return;
                    var n =
                        t.offset +
                        (a.offset().top - e(window).scrollTop()) * (1 - t.speed);
                    a.css({
                        'background-image': s,
                        'background-size': t.size,
                        'background-repeat': t.repeat,
                        'background-attachment': 'fixed',
                        'background-position': t.pos_x + ' ' + n + 'px',
                    }),
                        e(window).scroll(function () {
                            var o =
                                t.offset +
                                (a.offset().top - e(window).scrollTop()) *
                                (1 - t.speed);
                            a.data('pos_y', o),
                                a.css('background-position', t.pos_x + ' ' + o + 'px');
                        });
                }
            }),
                this
        );
    };
})(jQuery);



/*!
 * simpleParallax.min - simpleParallax is a simple JavaScript library that gives your website parallax animations on any images,
 * @date: 01-02-2020 23:1:26,
 * @version: 5.3.0,
 * @link: https://simpleparallax.com/
 */
!(function (t, e) {
    'object' == typeof exports && 'object' == typeof module
        ? (module.exports = e())
        : 'function' == typeof define && define.amd
        ? define('simpleParallax', [], e)
        : 'object' == typeof exports
            ? (exports.simpleParallax = e())
            : (t.simpleParallax = e());
})(window, function () {
    return (function (t) {
        var e = {};
        function n(i) {
            if (e[i]) return e[i].exports;
            var s = (e[i] = { i: i, l: !1, exports: {} });
            return t[i].call(s.exports, s, s.exports, n), (s.l = !0), s.exports;
        }
        return (
            (n.m = t),
                (n.c = e),
                (n.d = function (t, e, i) {
                    n.o(t, e) ||
                    Object.defineProperty(t, e, { enumerable: !0, get: i });
                }),
                (n.r = function (t) {
                    'undefined' != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(t, Symbol.toStringTag, {
                        value: 'Module',
                    }),
                        Object.defineProperty(t, '__esModule', { value: !0 });
                }),
                (n.t = function (t, e) {
                    if ((1 & e && (t = n(t)), 8 & e)) return t;
                    if (4 & e && 'object' == typeof t && t && t.__esModule) return t;
                    var i = Object.create(null);
                    if (
                        (n.r(i),
                            Object.defineProperty(i, 'default', {
                                enumerable: !0,
                                value: t,
                            }),
                        2 & e && 'string' != typeof t)
                    )
                        for (var s in t)
                            n.d(
                                i,
                                s,
                                function (e) {
                                    return t[e];
                                }.bind(null, s)
                            );
                    return i;
                }),
                (n.n = function (t) {
                    var e =
                        t && t.__esModule
                            ? function () {
                                return t.default;
                            }
                            : function () {
                                return t;
                            };
                    return n.d(e, 'a', e), e;
                }),
                (n.o = function (t, e) {
                    return Object.prototype.hasOwnProperty.call(t, e);
                }),
                (n.p = ''),
                n((n.s = 0))
        );
    })([
        function (t, e, n) {
            'use strict';
            function i(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    (i.enumerable = i.enumerable || !1),
                        (i.configurable = !0),
                    'value' in i && (i.writable = !0),
                        Object.defineProperty(t, i.key, i);
                }
            }
            n.r(e);
            var s = new ((function () {
                    function t() {
                        !(function (t, e) {
                            if (!(t instanceof e))
                                throw new TypeError(
                                    'Cannot call a class as a function'
                                );
                        })(this, t),
                            (this.positions = { top: 0, bottom: 0, height: 0 });
                    }
                    var e, n, s;
                    return (
                        (e = t),
                        (n = [
                            {
                                key: 'setViewportTop',
                                value: function (t) {
                                    return (
                                        (this.positions.top = t
                                            ? t.scrollTop
                                            : window.pageYOffset),
                                            this.positions
                                    );
                                },
                            },
                            {
                                key: 'setViewportBottom',
                                value: function () {
                                    return (
                                        (this.positions.bottom =
                                            this.positions.top + this.positions.height),
                                            this.positions
                                    );
                                },
                            },
                            {
                                key: 'setViewportAll',
                                value: function (t) {
                                    return (
                                        (this.positions.top = t
                                            ? t.scrollTop
                                            : window.pageYOffset),
                                            (this.positions.height = t
                                                ? t.clientHeight
                                                : document.documentElement.clientHeight),
                                            (this.positions.bottom =
                                                this.positions.top + this.positions.height),
                                            this.positions
                                    );
                                },
                            },
                        ]) && i(e.prototype, n),
                        s && i(e, s),
                            t
                    );
                })())(),
                o = function (t) {
                    return NodeList.prototype.isPrototypeOf(t) ||
                    HTMLCollection.prototype.isPrototypeOf(t)
                        ? Array.from(t)
                        : 'string' == typeof t || t instanceof String
                            ? document.querySelectorAll(t)
                            : [t];
                },
                r = (function () {
                    for (
                        var t,
                            e =
                                'transform webkitTransform mozTransform oTransform msTransform'.split(
                                    ' '
                                ),
                            n = 0;
                        void 0 === t;

                    )
                        (t =
                            void 0 !== document.createElement('div').style[e[n]]
                                ? e[n]
                                : void 0),
                            (n += 1);
                    return t;
                })(),
                a = function (t) {
                    return (
                        !!t &&
                        !!t.complete &&
                        (void 0 === t.naturalWidth || 0 !== t.naturalWidth)
                    );
                };
            function l(t) {
                return (
                    (function (t) {
                        if (Array.isArray(t)) {
                            for (var e = 0, n = new Array(t.length); e < t.length; e++)
                                n[e] = t[e];
                            return n;
                        }
                    })(t) ||
                    (function (t) {
                        if (
                            Symbol.iterator in Object(t) ||
                            '[object Arguments]' === Object.prototype.toString.call(t)
                        )
                            return Array.from(t);
                    })(t) ||
                    (function () {
                        throw new TypeError(
                            'Invalid attempt to spread non-iterable instance'
                        );
                    })()
                );
            }
            function u(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    (i.enumerable = i.enumerable || !1),
                        (i.configurable = !0),
                    'value' in i && (i.writable = !0),
                        Object.defineProperty(t, i.key, i);
                }
            }
            var h = (function () {
                function t(e, n) {
                    !(function (t, e) {
                        if (!(t instanceof e))
                            throw new TypeError('Cannot call a class as a function');
                    })(this, t),
                        (this.element = e),
                        (this.elementContainer = e),
                        (this.settings = n),
                        (this.isVisible = !0),
                        (this.isInit = !1),
                        (this.oldTranslateValue = -1),
                        (this.init = this.init.bind(this)),
                        a(e)
                            ? this.init()
                            : this.element.addEventListener('load', this.init);
                }
                var e, n, i;
                return (
                    (e = t),
                    (n = [
                        {
                            key: 'init',
                            value: function () {
                                var t = this;
                                this.isInit ||
                                this.element.closest('.simpleParallax') ||
                                (!1 === this.settings.overflow &&
                                this.wrapElement(this.element),
                                    this.setTransformCSS(),
                                    this.getElementOffset(),
                                    this.intersectionObserver(),
                                    this.getTranslateValue(),
                                    this.animate(),
                                this.settings.delay > 0 &&
                                setTimeout(function () {
                                    t.setTransitionCSS();
                                }, 10),
                                    (this.isInit = !0));
                            },
                        },
                        {
                            key: 'wrapElement',
                            value: function () {
                                var t = this.element.closest('picture') || this.element,
                                    e = document.createElement('div');
                                e.classList.add('simpleParallax'),
                                    (e.style.overflow = 'hidden'),
                                    t.parentNode.insertBefore(e, t),
                                    e.appendChild(t),
                                    (this.elementContainer = e);
                            },
                        },
                        {
                            key: 'unWrapElement',
                            value: function () {
                                var t = this.elementContainer;
                                t.replaceWith.apply(t, l(t.childNodes));
                            },
                        },
                        {
                            key: 'setTransformCSS',
                            value: function () {
                                !1 === this.settings.overflow &&
                                (this.element.style[r] = 'scale('.concat(
                                    this.settings.scale,
                                    ')'
                                )),
                                    (this.element.style.willChange = 'transform');
                            },
                        },
                        {
                            key: 'setTransitionCSS',
                            value: function () {
                                this.element.style.transition = 'transform '
                                    .concat(this.settings.delay, 's ')
                                    .concat(this.settings.transition);
                            },
                        },
                        {
                            key: 'unSetStyle',
                            value: function () {
                                (this.element.style.willChange = ''),
                                    (this.element.style[r] = ''),
                                    (this.element.style.transition = '');
                            },
                        },
                        {
                            key: 'getElementOffset',
                            value: function () {
                                var t = this.elementContainer.getBoundingClientRect();
                                if (
                                    ((this.elementHeight = t.height),
                                        (this.elementTop = t.top + s.positions.top),
                                        this.settings.customContainer)
                                ) {
                                    var e =
                                        this.settings.customContainer.getBoundingClientRect();
                                    this.elementTop = t.top - e.top + s.positions.top;
                                }
                                this.elementBottom =
                                    this.elementHeight + this.elementTop;
                            },
                        },
                        {
                            key: 'buildThresholdList',
                            value: function () {
                                for (var t = [], e = 1; e <= this.elementHeight; e++) {
                                    var n = e / this.elementHeight;
                                    t.push(n);
                                }
                                return t;
                            },
                        },
                        {
                            key: 'intersectionObserver',
                            value: function () {
                                var t = {
                                    root: null,
                                    threshold: this.buildThresholdList(),
                                };
                                (this.observer = new IntersectionObserver(
                                    this.intersectionObserverCallback.bind(this),
                                    t
                                )),
                                    this.observer.observe(this.element);
                            },
                        },
                        {
                            key: 'intersectionObserverCallback',
                            value: function (t) {
                                for (var e = t.length - 1; e >= 0; e--)
                                    t[e].isIntersecting
                                        ? (this.isVisible = !0)
                                        : (this.isVisible = !1);
                            },
                        },
                        {
                            key: 'checkIfVisible',
                            value: function () {
                                return (
                                    this.elementBottom > s.positions.top &&
                                    this.elementTop < s.positions.bottom
                                );
                            },
                        },
                        {
                            key: 'getRangeMax',
                            value: function () {
                                var t = this.element.clientHeight;
                                this.rangeMax = t * this.settings.scale - t;
                            },
                        },
                        {
                            key: 'getTranslateValue',
                            value: function () {
                                var t = (
                                    (s.positions.bottom - this.elementTop) /
                                    ((s.positions.height + this.elementHeight) / 100)
                                ).toFixed(1);
                                return (
                                    (t = Math.min(100, Math.max(0, t))),
                                    0 !== this.settings.maxTransition &&
                                    t > this.settings.maxTransition &&
                                    (t = this.settings.maxTransition),
                                    this.oldPercentage !== t &&
                                    (this.rangeMax || this.getRangeMax(),
                                        (this.translateValue = (
                                            (t / 100) * this.rangeMax -
                                            this.rangeMax / 2
                                        ).toFixed(0)),
                                    this.oldTranslateValue !== this.translateValue &&
                                    ((this.oldPercentage = t),
                                        (this.oldTranslateValue = this.translateValue),
                                        !0))
                                );
                            },
                        },
                        {
                            key: 'animate',
                            value: function () {
                                var t,
                                    e = 0,
                                    n = 0;
                                (this.settings.orientation.includes('left') ||
                                    this.settings.orientation.includes('right')) &&
                                (n = ''.concat(
                                    this.settings.orientation.includes('left')
                                        ? -1 * this.translateValue
                                        : this.translateValue,
                                    'px'
                                )),
                                (this.settings.orientation.includes('up') ||
                                    this.settings.orientation.includes('down')) &&
                                (e = ''.concat(
                                    this.settings.orientation.includes('up')
                                        ? -1 * this.translateValue
                                        : this.translateValue,
                                    'px'
                                )),
                                    (t =
                                        !1 === this.settings.overflow
                                            ? 'translate3d('
                                                .concat(n, ', ')
                                                .concat(e, ', 0) scale(')
                                                .concat(this.settings.scale, ')')
                                            : 'translate3d('
                                                .concat(n, ', ')
                                                .concat(e, ', 0)')),
                                    (this.element.style[r] = t);
                            },
                        },
                    ]) && u(e.prototype, n),
                    i && u(e, i),
                        t
                );
            })();
            function c(t) {
                return (
                    (function (t) {
                        if (Array.isArray(t)) {
                            for (var e = 0, n = new Array(t.length); e < t.length; e++)
                                n[e] = t[e];
                            return n;
                        }
                    })(t) ||
                    (function (t) {
                        if (
                            Symbol.iterator in Object(t) ||
                            '[object Arguments]' === Object.prototype.toString.call(t)
                        )
                            return Array.from(t);
                    })(t) ||
                    (function () {
                        throw new TypeError(
                            'Invalid attempt to spread non-iterable instance'
                        );
                    })()
                );
            }
            function f(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    (i.enumerable = i.enumerable || !1),
                        (i.configurable = !0),
                    'value' in i && (i.writable = !0),
                        Object.defineProperty(t, i.key, i);
                }
            }
            n.d(e, 'default', function () {
                return b;
            });
            var m,
                p,
                d,
                g = !0,
                v = !1,
                y = [],
                b = (function () {
                    function t(e, n) {
                        !(function (t, e) {
                            if (!(t instanceof e))
                                throw new TypeError(
                                    'Cannot call a class as a function'
                                );
                        })(this, t),
                        e &&
                        ((this.elements = o(e)),
                            (this.defaults = {
                                delay: 0.4,
                                orientation: 'up',
                                scale: 1.3,
                                overflow: !1,
                                transition: 'cubic-bezier(0,0,0,1)',
                                customContainer: !1,
                                maxTransition: 0,
                            }),
                            (this.settings = Object.assign(this.defaults, n)),
                        'IntersectionObserver' in window || (g = !1),
                        this.settings.customContainer &&
                        (console.log(o(this.settings.customContainer)[0]),
                            (this.customContainer = o(
                                this.settings.customContainer
                            )[0])),
                            (this.lastPosition = -1),
                            (this.resizeIsDone = this.resizeIsDone.bind(this)),
                            (this.handleResize = this.handleResize.bind(this)),
                            (this.proceedRequestAnimationFrame =
                                this.proceedRequestAnimationFrame.bind(this)),
                            this.init());
                    }
                    var e, n, i;
                    return (
                        (e = t),
                        (n = [
                            {
                                key: 'init',
                                value: function () {
                                    var t = this;
                                    s.setViewportAll(this.customContainer),
                                        (y = [].concat(
                                            c(
                                                this.elements.map(function (e) {
                                                    return new h(e, t.settings);
                                                })
                                            ),
                                            c(y)
                                        )),
                                        (m = y.length),
                                    v ||
                                    (this.proceedRequestAnimationFrame(),
                                        window.addEventListener(
                                            'resize',
                                            this.resizeIsDone
                                        ),
                                        (v = !0));
                                },
                            },
                            {
                                key: 'resizeIsDone',
                                value: function () {
                                    clearTimeout(d),
                                        (d = setTimeout(this.handleResize, 500));
                                },
                            },
                            {
                                key: 'handleResize',
                                value: function () {
                                    s.setViewportAll(this.customContainer);
                                    for (var t = m - 1; t >= 0; t--)
                                        y[t].getElementOffset(), y[t].getRangeMax();
                                    this.lastPosition = -1;
                                },
                            },
                            {
                                key: 'proceedRequestAnimationFrame',
                                value: function () {
                                    if (
                                        (s.setViewportTop(this.customContainer),
                                        this.lastPosition !== s.positions.top)
                                    ) {
                                        s.setViewportBottom();
                                        for (var t = m - 1; t >= 0; t--)
                                            this.proceedElement(y[t]);
                                        (p = window.requestAnimationFrame(
                                            this.proceedRequestAnimationFrame
                                        )),
                                            (this.lastPosition = s.positions.top);
                                    } else
                                        p = window.requestAnimationFrame(
                                            this.proceedRequestAnimationFrame
                                        );
                                },
                            },
                            {
                                key: 'proceedElement',
                                value: function (t) {
                                    (!g || this.customContainer
                                        ? t.checkIfVisible()
                                        : t.isVisible) &&
                                    t.getTranslateValue() &&
                                    t.animate();
                                },
                            },
                            {
                                key: 'destroy',
                                value: function () {
                                    var t = this,
                                        e = [];
                                    y = y.filter(function (n) {
                                        return t.elements.includes(n.element)
                                            ? (e.push(n), !1)
                                            : n;
                                    });
                                    for (var n = e.length - 1; n >= 0; n--)
                                        e[n].unSetStyle(),
                                        !1 === this.settings.overflow &&
                                        e[n].unWrapElement();
                                    (m = y.length) ||
                                    (window.cancelAnimationFrame(p),
                                        window.removeEventListener(
                                            'resize',
                                            this.handleResize
                                        ));
                                },
                            },
                        ]) && f(e.prototype, n),
                        i && f(e, i),
                            t
                    );
                })();
        },
    ]).default;
});

!(function (i) {
    'use strict';
    'function' == typeof define && define.amd
        ? define(['jquery'], i)
        : 'undefined' != typeof exports
        ? (module.exports = i(require('jquery')))
        : i(jQuery);
})(function (i) {
    'use strict';
    var e = window.Slick || {};
    ((e = (function () {
        var e = 0;
        return function (t, o) {
            var s,
                n = this;
            (n.defaults = {
                accessibility: !0,
                adaptiveHeight: !1,
                appendArrows: i(t),
                appendDots: i(t),
                arrows: !0,
                asNavFor: null,
                prevArrow:
                    '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow:
                    '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: !1,
                autoplaySpeed: 3e3,
                centerMode: !1,
                centerPadding: '50px',
                cssEase: 'ease',
                customPaging: function (e, t) {
                    return i('<button type="button" />').text(t + 1);
                },
                dots: !1,
                dotsClass: 'slick-dots',
                draggable: !0,
                easing: 'linear',
                edgeFriction: 0.35,
                fade: !1,
                focusOnSelect: !1,
                focusOnChange: !1,
                infinite: !0,
                initialSlide: 0,
                lazyLoad: 'ondemand',
                mobileFirst: !1,
                pauseOnHover: !0,
                pauseOnFocus: !0,
                pauseOnDotsHover: !1,
                respondTo: 'window',
                responsive: null,
                rows: 1,
                rtl: !1,
                slide: '',
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: !0,
                swipeToSlide: !1,
                touchMove: !0,
                touchThreshold: 5,
                useCSS: !0,
                useTransform: !0,
                variableWidth: !1,
                vertical: !1,
                verticalSwiping: !1,
                waitForAnimate: !0,
                zIndex: 1e3,
            }),
                (n.initials = {
                    animating: !1,
                    dragging: !1,
                    autoPlayTimer: null,
                    currentDirection: 0,
                    currentLeft: null,
                    currentSlide: 0,
                    direction: 1,
                    $dots: null,
                    listWidth: null,
                    listHeight: null,
                    loadIndex: 0,
                    $nextArrow: null,
                    $prevArrow: null,
                    scrolling: !1,
                    slideCount: null,
                    slideWidth: null,
                    $slideTrack: null,
                    $slides: null,
                    sliding: !1,
                    slideOffset: 0,
                    swipeLeft: null,
                    swiping: !1,
                    $list: null,
                    touchObject: {},
                    transformsEnabled: !1,
                    unslicked: !1,
                }),
                i.extend(n, n.initials),
                (n.activeBreakpoint = null),
                (n.animType = null),
                (n.animProp = null),
                (n.breakpoints = []),
                (n.breakpointSettings = []),
                (n.cssTransitions = !1),
                (n.focussed = !1),
                (n.interrupted = !1),
                (n.hidden = 'hidden'),
                (n.paused = !0),
                (n.positionProp = null),
                (n.respondTo = null),
                (n.rowCount = 1),
                (n.shouldClick = !0),
                (n.$slider = i(t)),
                (n.$slidesCache = null),
                (n.transformType = null),
                (n.transitionType = null),
                (n.visibilityChange = 'visibilitychange'),
                (n.windowWidth = 0),
                (n.windowTimer = null),
                (s = i(t).data('slick') || {}),
                (n.options = i.extend({}, n.defaults, o, s)),
                (n.currentSlide = n.options.initialSlide),
                (n.originalSettings = n.options),
                void 0 !== document.mozHidden
                    ? ((n.hidden = 'mozHidden'),
                        (n.visibilityChange = 'mozvisibilitychange'))
                    : void 0 !== document.webkitHidden &&
                    ((n.hidden = 'webkitHidden'),
                        (n.visibilityChange = 'webkitvisibilitychange')),
                (n.autoPlay = i.proxy(n.autoPlay, n)),
                (n.autoPlayClear = i.proxy(n.autoPlayClear, n)),
                (n.autoPlayIterator = i.proxy(n.autoPlayIterator, n)),
                (n.changeSlide = i.proxy(n.changeSlide, n)),
                (n.clickHandler = i.proxy(n.clickHandler, n)),
                (n.selectHandler = i.proxy(n.selectHandler, n)),
                (n.setPosition = i.proxy(n.setPosition, n)),
                (n.swipeHandler = i.proxy(n.swipeHandler, n)),
                (n.dragHandler = i.proxy(n.dragHandler, n)),
                (n.keyHandler = i.proxy(n.keyHandler, n)),
                (n.instanceUid = e++),
                (n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/),
                n.registerBreakpoints(),
                n.init(!0);
        };
    })()).prototype.activateADA = function () {
        this.$slideTrack
            .find('.slick-active')
            .attr({ 'aria-hidden': 'false' })
            .find('a, input, button, select')
            .attr({ tabindex: '0' });
    }),
        (e.prototype.addSlide = e.prototype.slickAdd =
            function (e, t, o) {
                var s = this;
                if ('boolean' == typeof t) (o = t), (t = null);
                else if (t < 0 || t >= s.slideCount) return !1;
                s.unload(),
                    'number' == typeof t
                        ? 0 === t && 0 === s.$slides.length
                        ? i(e).appendTo(s.$slideTrack)
                        : o
                            ? i(e).insertBefore(s.$slides.eq(t))
                            : i(e).insertAfter(s.$slides.eq(t))
                        : !0 === o
                        ? i(e).prependTo(s.$slideTrack)
                        : i(e).appendTo(s.$slideTrack),
                    (s.$slides = s.$slideTrack.children(this.options.slide)),
                    s.$slideTrack.children(this.options.slide).detach(),
                    s.$slideTrack.append(s.$slides),
                    s.$slides.each(function (e, t) {
                        i(t).attr('data-slick-index', e);
                    }),
                    (s.$slidesCache = s.$slides),
                    s.reinit();
            }),
        (e.prototype.animateHeight = function () {
            var i = this;
            if (
                1 === i.options.slidesToShow &&
                !0 === i.options.adaptiveHeight &&
                !1 === i.options.vertical
            ) {
                var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
                i.$list.animate({ height: e }, i.options.speed);
            }
        }),
        (e.prototype.animateSlide = function (e, t) {
            var o = {},
                s = this;
            s.animateHeight(),
            !0 === s.options.rtl && !1 === s.options.vertical && (e = -e),
                !1 === s.transformsEnabled
                    ? !1 === s.options.vertical
                    ? s.$slideTrack.animate(
                        { left: e },
                        s.options.speed,
                        s.options.easing,
                        t
                    )
                    : s.$slideTrack.animate(
                        { top: e },
                        s.options.speed,
                        s.options.easing,
                        t
                    )
                    : !1 === s.cssTransitions
                    ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft),
                        i({ animStart: s.currentLeft }).animate(
                            { animStart: e },
                            {
                                duration: s.options.speed,
                                easing: s.options.easing,
                                step: function (i) {
                                    (i = Math.ceil(i)),
                                        !1 === s.options.vertical
                                            ? ((o[s.animType] =
                                            'translate(' + i + 'px, 0px)'),
                                                s.$slideTrack.css(o))
                                            : ((o[s.animType] =
                                            'translate(0px,' + i + 'px)'),
                                                s.$slideTrack.css(o));
                                },
                                complete: function () {
                                    t && t.call();
                                },
                            }
                        ))
                    : (s.applyTransition(),
                        (e = Math.ceil(e)),
                        !1 === s.options.vertical
                            ? (o[s.animType] = 'translate3d(' + e + 'px, 0px, 0px)')
                            : (o[s.animType] = 'translate3d(0px,' + e + 'px, 0px)'),
                        s.$slideTrack.css(o),
                    t &&
                    setTimeout(function () {
                        s.disableTransition(), t.call();
                    }, s.options.speed));
        }),
        (e.prototype.getNavTarget = function () {
            var e = this,
                t = e.options.asNavFor;
            return t && null !== t && (t = i(t).not(e.$slider)), t;
        }),
        (e.prototype.asNavFor = function (e) {
            var t = this.getNavTarget();
            null !== t &&
            'object' == typeof t &&
            t.each(function () {
                var t = i(this).slick('getSlick');
                t.unslicked || t.slideHandler(e, !0);
            });
        }),
        (e.prototype.applyTransition = function (i) {
            var e = this,
                t = {};
            !1 === e.options.fade
                ? (t[e.transitionType] =
                e.transformType +
                ' ' +
                e.options.speed +
                'ms ' +
                e.options.cssEase)
                : (t[e.transitionType] =
                'opacity ' + e.options.speed + 'ms ' + e.options.cssEase),
                !1 === e.options.fade
                    ? e.$slideTrack.css(t)
                    : e.$slides.eq(i).css(t);
        }),
        (e.prototype.autoPlay = function () {
            var i = this;
            i.autoPlayClear(),
            i.slideCount > i.options.slidesToShow &&
            (i.autoPlayTimer = setInterval(
                i.autoPlayIterator,
                i.options.autoplaySpeed
            ));
        }),
        (e.prototype.autoPlayClear = function () {
            var i = this;
            i.autoPlayTimer && clearInterval(i.autoPlayTimer);
        }),
        (e.prototype.autoPlayIterator = function () {
            var i = this,
                e = i.currentSlide + i.options.slidesToScroll;
            i.paused ||
            i.interrupted ||
            i.focussed ||
            (!1 === i.options.infinite &&
            (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1
                ? (i.direction = 0)
                : 0 === i.direction &&
                ((e = i.currentSlide - i.options.slidesToScroll),
                i.currentSlide - 1 == 0 && (i.direction = 1))),
                i.slideHandler(e));
        }),
        (e.prototype.buildArrows = function () {
            var e = this;
            !0 === e.options.arrows &&
            ((e.$prevArrow = i(e.options.prevArrow).addClass('slick-arrow')),
                (e.$nextArrow = i(e.options.nextArrow).addClass('slick-arrow')),
                e.slideCount > e.options.slidesToShow
                    ? (e.$prevArrow
                        .removeClass('slick-hidden')
                        .removeAttr('aria-hidden tabindex'),
                        e.$nextArrow
                            .removeClass('slick-hidden')
                            .removeAttr('aria-hidden tabindex'),
                    e.htmlExpr.test(e.options.prevArrow) &&
                    e.$prevArrow.prependTo(e.options.appendArrows),
                    e.htmlExpr.test(e.options.nextArrow) &&
                    e.$nextArrow.appendTo(e.options.appendArrows),
                    !0 !== e.options.infinite &&
                    e.$prevArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true'))
                    : e.$prevArrow
                        .add(e.$nextArrow)
                        .addClass('slick-hidden')
                        .attr({ 'aria-disabled': 'true', tabindex: '-1' }));
        }),
        (e.prototype.buildDots = function () {
            var e,
                t,
                o = this;
            if (!0 === o.options.dots) {
                for (
                    o.$slider.addClass('slick-dotted'),
                        t = i('<ul />').addClass(o.options.dotsClass),
                        e = 0;
                    e <= o.getDotCount();
                    e += 1
                )
                    t.append(
                        i('<li />').append(o.options.customPaging.call(this, o, e))
                    );
                (o.$dots = t.appendTo(o.options.appendDots)),
                    o.$dots.find('li').first().addClass('slick-active');
            }
        }),
        (e.prototype.buildOut = function () {
            var e = this;
            (e.$slides = e.$slider
                .children(e.options.slide + ':not(.slick-cloned)')
                .addClass('slick-slide')),
                (e.slideCount = e.$slides.length),
                e.$slides.each(function (e, t) {
                    i(t)
                        .attr('data-slick-index', e)
                        .data('originalStyling', i(t).attr('style') || '');
                }),
                e.$slider.addClass('slick-slider'),
                (e.$slideTrack =
                    0 === e.slideCount
                        ? i('<div class="slick-track"/>').appendTo(e.$slider)
                        : e.$slides.wrapAll('<div class="slick-track"/>').parent()),
                (e.$list = e.$slideTrack
                    .wrap('<div class="slick-list"/>')
                    .parent()),
                e.$slideTrack.css('opacity', 0),
            (!0 !== e.options.centerMode && !0 !== e.options.swipeToSlide) ||
            (e.options.slidesToScroll = 1),
                i('img[data-lazy]', e.$slider)
                    .not('[src]')
                    .addClass('slick-loading'),
                e.setupInfinite(),
                e.buildArrows(),
                e.buildDots(),
                e.updateDots(),
                e.setSlideClasses(
                    'number' == typeof e.currentSlide ? e.currentSlide : 0
                ),
            !0 === e.options.draggable && e.$list.addClass('draggable');
        }),
        (e.prototype.buildRows = function () {
            var i,
                e,
                t,
                o,
                s,
                n,
                r,
                l = this;
            if (
                ((o = document.createDocumentFragment()),
                    (n = l.$slider.children()),
                l.options.rows > 1)
            ) {
                for (
                    r = l.options.slidesPerRow * l.options.rows,
                        s = Math.ceil(n.length / r),
                        i = 0;
                    i < s;
                    i++
                ) {
                    var d = document.createElement('div');
                    for (e = 0; e < l.options.rows; e++) {
                        var a = document.createElement('div');
                        for (t = 0; t < l.options.slidesPerRow; t++) {
                            var c = i * r + (e * l.options.slidesPerRow + t);
                            n.get(c) && a.appendChild(n.get(c));
                        }
                        d.appendChild(a);
                    }
                    o.appendChild(d);
                }
                l.$slider.empty().append(o),
                    l.$slider
                        .children()
                        .children()
                        .children()
                        .css({
                            width: 100 / l.options.slidesPerRow + '%',
                            display: 'inline-block',
                        });
            }
        }),
        (e.prototype.checkResponsive = function (e, t) {
            var o,
                s,
                n,
                r = this,
                l = !1,
                d = r.$slider.width(),
                a = window.innerWidth || i(window).width();
            if (
                ('window' === r.respondTo
                    ? (n = a)
                    : 'slider' === r.respondTo
                        ? (n = d)
                        : 'min' === r.respondTo && (n = Math.min(a, d)),
                r.options.responsive &&
                r.options.responsive.length &&
                null !== r.options.responsive)
            ) {
                s = null;
                for (o in r.breakpoints)
                    r.breakpoints.hasOwnProperty(o) &&
                    (!1 === r.originalSettings.mobileFirst
                        ? n < r.breakpoints[o] && (s = r.breakpoints[o])
                        : n > r.breakpoints[o] && (s = r.breakpoints[o]));
                null !== s
                    ? null !== r.activeBreakpoint
                    ? (s !== r.activeBreakpoint || t) &&
                    ((r.activeBreakpoint = s),
                        'unslick' === r.breakpointSettings[s]
                            ? r.unslick(s)
                            : ((r.options = i.extend(
                            {},
                            r.originalSettings,
                            r.breakpointSettings[s]
                            )),
                            !0 === e && (r.currentSlide = r.options.initialSlide),
                                r.refresh(e)),
                        (l = s))
                    : ((r.activeBreakpoint = s),
                        'unslick' === r.breakpointSettings[s]
                            ? r.unslick(s)
                            : ((r.options = i.extend(
                            {},
                            r.originalSettings,
                            r.breakpointSettings[s]
                            )),
                            !0 === e && (r.currentSlide = r.options.initialSlide),
                                r.refresh(e)),
                        (l = s))
                    : null !== r.activeBreakpoint &&
                    ((r.activeBreakpoint = null),
                        (r.options = r.originalSettings),
                    !0 === e && (r.currentSlide = r.options.initialSlide),
                        r.refresh(e),
                        (l = s)),
                e || !1 === l || r.$slider.trigger('breakpoint', [r, l]);
            }
        }),
        (e.prototype.changeSlide = function (e, t) {
            var o,
                s,
                n,
                r = this,
                l = i(e.currentTarget);
            switch (
                (l.is('a') && e.preventDefault(),
                l.is('li') || (l = l.closest('li')),
                    (n = r.slideCount % r.options.slidesToScroll != 0),
                    (o = n
                        ? 0
                        : (r.slideCount - r.currentSlide) % r.options.slidesToScroll),
                    e.data.message)
                ) {
                case 'previous':
                    (s =
                        0 === o
                            ? r.options.slidesToScroll
                            : r.options.slidesToShow - o),
                    r.slideCount > r.options.slidesToShow &&
                    r.slideHandler(r.currentSlide - s, !1, t);
                    break;
                case 'next':
                    (s = 0 === o ? r.options.slidesToScroll : o),
                    r.slideCount > r.options.slidesToShow &&
                    r.slideHandler(r.currentSlide + s, !1, t);
                    break;
                case 'index':
                    var d =
                        0 === e.data.index
                            ? 0
                            : e.data.index || l.index() * r.options.slidesToScroll;
                    r.slideHandler(r.checkNavigable(d), !1, t),
                        l.children().trigger('focus');
                    break;
                default:
                    return;
            }
        }),
        (e.prototype.checkNavigable = function (i) {
            var e, t;
            if (((e = this.getNavigableIndexes()), (t = 0), i > e[e.length - 1]))
                i = e[e.length - 1];
            else
                for (var o in e) {
                    if (i < e[o]) {
                        i = t;
                        break;
                    }
                    t = e[o];
                }
            return i;
        }),
        (e.prototype.cleanUpEvents = function () {
            var e = this;
            e.options.dots &&
            null !== e.$dots &&
            (i('li', e.$dots)
                .off('click.slick', e.changeSlide)
                .off('mouseenter.slick', i.proxy(e.interrupt, e, !0))
                .off('mouseleave.slick', i.proxy(e.interrupt, e, !1)),
            !0 === e.options.accessibility &&
            e.$dots.off('keydown.slick', e.keyHandler)),
                e.$slider.off('focus.slick blur.slick'),
            !0 === e.options.arrows &&
            e.slideCount > e.options.slidesToShow &&
            (e.$prevArrow && e.$prevArrow.off('click.slick', e.changeSlide),
            e.$nextArrow && e.$nextArrow.off('click.slick', e.changeSlide),
            !0 === e.options.accessibility &&
            (e.$prevArrow &&
            e.$prevArrow.off('keydown.slick', e.keyHandler),
            e.$nextArrow &&
            e.$nextArrow.off('keydown.slick', e.keyHandler))),
                e.$list.off('touchstart.slick mousedown.slick', e.swipeHandler),
                e.$list.off('touchmove.slick mousemove.slick', e.swipeHandler),
                e.$list.off('touchend.slick mouseup.slick', e.swipeHandler),
                e.$list.off('touchcancel.slick mouseleave.slick', e.swipeHandler),
                e.$list.off('click.slick', e.clickHandler),
                i(document).off(e.visibilityChange, e.visibility),
                e.cleanUpSlideEvents(),
            !0 === e.options.accessibility &&
            e.$list.off('keydown.slick', e.keyHandler),
            !0 === e.options.focusOnSelect &&
            i(e.$slideTrack).children().off('click.slick', e.selectHandler),
                i(window).off(
                    'orientationchange.slick.slick-' + e.instanceUid,
                    e.orientationChange
                ),
                i(window).off('resize.slick.slick-' + e.instanceUid, e.resize),
                i('[draggable!=true]', e.$slideTrack).off(
                    'dragstart',
                    e.preventDefault
                ),
                i(window).off('load.slick.slick-' + e.instanceUid, e.setPosition);
        }),
        (e.prototype.cleanUpSlideEvents = function () {
            var e = this;
            e.$list.off('mouseenter.slick', i.proxy(e.interrupt, e, !0)),
                e.$list.off('mouseleave.slick', i.proxy(e.interrupt, e, !1));
        }),
        (e.prototype.cleanUpRows = function () {
            var i,
                e = this;
            e.options.rows > 1 &&
            ((i = e.$slides.children().children()).removeAttr('style'),
                e.$slider.empty().append(i));
        }),
        (e.prototype.clickHandler = function (i) {
            !1 === this.shouldClick &&
            (i.stopImmediatePropagation(),
                i.stopPropagation(),
                i.preventDefault());
        }),
        (e.prototype.destroy = function (e) {
            var t = this;
            t.autoPlayClear(),
                (t.touchObject = {}),
                t.cleanUpEvents(),
                i('.slick-cloned', t.$slider).detach(),
            t.$dots && t.$dots.remove(),
            t.$prevArrow &&
            t.$prevArrow.length &&
            (t.$prevArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display', ''),
            t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()),
            t.$nextArrow &&
            t.$nextArrow.length &&
            (t.$nextArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display', ''),
            t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()),
            t.$slides &&
            (t.$slides
                .removeClass(
                    'slick-slide slick-active slick-center slick-visible slick-current'
                )
                .removeAttr('aria-hidden')
                .removeAttr('data-slick-index')
                .each(function () {
                    i(this).attr('style', i(this).data('originalStyling'));
                }),
                t.$slideTrack.children(this.options.slide).detach(),
                t.$slideTrack.detach(),
                t.$list.detach(),
                t.$slider.append(t.$slides)),
                t.cleanUpRows(),
                t.$slider.removeClass('slick-slider'),
                t.$slider.removeClass('slick-initialized'),
                t.$slider.removeClass('slick-dotted'),
                (t.unslicked = !0),
            e || t.$slider.trigger('destroy', [t]);
        }),
        (e.prototype.disableTransition = function (i) {
            var e = this,
                t = {};
            (t[e.transitionType] = ''),
                !1 === e.options.fade
                    ? e.$slideTrack.css(t)
                    : e.$slides.eq(i).css(t);
        }),
        (e.prototype.fadeSlide = function (i, e) {
            var t = this;
            !1 === t.cssTransitions
                ? (t.$slides.eq(i).css({ zIndex: t.options.zIndex }),
                    t.$slides
                        .eq(i)
                        .animate(
                            { opacity: 1 },
                            t.options.speed,
                            t.options.easing,
                            e
                        ))
                : (t.applyTransition(i),
                    t.$slides.eq(i).css({ opacity: 1, zIndex: t.options.zIndex }),
                e &&
                setTimeout(function () {
                    t.disableTransition(i), e.call();
                }, t.options.speed));
        }),
        (e.prototype.fadeSlideOut = function (i) {
            var e = this;
            !1 === e.cssTransitions
                ? e.$slides
                    .eq(i)
                    .animate(
                        { opacity: 0, zIndex: e.options.zIndex - 2 },
                        e.options.speed,
                        e.options.easing
                    )
                : (e.applyTransition(i),
                    e.$slides
                        .eq(i)
                        .css({ opacity: 0, zIndex: e.options.zIndex - 2 }));
        }),
        (e.prototype.filterSlides = e.prototype.slickFilter =
            function (i) {
                var e = this;
                null !== i &&
                ((e.$slidesCache = e.$slides),
                    e.unload(),
                    e.$slideTrack.children(this.options.slide).detach(),
                    e.$slidesCache.filter(i).appendTo(e.$slideTrack),
                    e.reinit());
            }),
        (e.prototype.focusHandler = function () {
            var e = this;
            e.$slider
                .off('focus.slick blur.slick')
                .on('focus.slick blur.slick', '*', function (t) {
                    t.stopImmediatePropagation();
                    var o = i(this);
                    setTimeout(function () {
                        e.options.pauseOnFocus &&
                        ((e.focussed = o.is(':focus')), e.autoPlay());
                    }, 0);
                });
        }),
        (e.prototype.getCurrent = e.prototype.slickCurrentSlide =
            function () {
                return this.currentSlide;
            }),
        (e.prototype.getDotCount = function () {
            var i = this,
                e = 0,
                t = 0,
                o = 0;
            if (!0 === i.options.infinite)
                if (i.slideCount <= i.options.slidesToShow) ++o;
                else
                    for (; e < i.slideCount; )
                        ++o,
                            (e = t + i.options.slidesToScroll),
                            (t +=
                                i.options.slidesToScroll <= i.options.slidesToShow
                                    ? i.options.slidesToScroll
                                    : i.options.slidesToShow);
            else if (!0 === i.options.centerMode) o = i.slideCount;
            else if (i.options.asNavFor)
                for (; e < i.slideCount; )
                    ++o,
                        (e = t + i.options.slidesToScroll),
                        (t +=
                            i.options.slidesToScroll <= i.options.slidesToShow
                                ? i.options.slidesToScroll
                                : i.options.slidesToShow);
            else
                o =
                    1 +
                    Math.ceil(
                        (i.slideCount - i.options.slidesToShow) /
                        i.options.slidesToScroll
                    );
            return o - 1;
        }),
        (e.prototype.getLeft = function (i) {
            var e,
                t,
                o,
                s,
                n = this,
                r = 0;
            return (
                (n.slideOffset = 0),
                    (t = n.$slides.first().outerHeight(!0)),
                    !0 === n.options.infinite
                        ? (n.slideCount > n.options.slidesToShow &&
                        ((n.slideOffset =
                            n.slideWidth * n.options.slidesToShow * -1),
                            (s = -1),
                        !0 === n.options.vertical &&
                        !0 === n.options.centerMode &&
                        (2 === n.options.slidesToShow
                            ? (s = -1.5)
                            : 1 === n.options.slidesToShow && (s = -2)),
                            (r = t * n.options.slidesToShow * s)),
                        n.slideCount % n.options.slidesToScroll != 0 &&
                        i + n.options.slidesToScroll > n.slideCount &&
                        n.slideCount > n.options.slidesToShow &&
                        (i > n.slideCount
                            ? ((n.slideOffset =
                                (n.options.slidesToShow - (i - n.slideCount)) *
                                n.slideWidth *
                                -1),
                                (r =
                                    (n.options.slidesToShow - (i - n.slideCount)) *
                                    t *
                                    -1))
                            : ((n.slideOffset =
                                (n.slideCount % n.options.slidesToScroll) *
                                n.slideWidth *
                                -1),
                                (r =
                                    (n.slideCount % n.options.slidesToScroll) *
                                    t *
                                    -1))))
                        : i + n.options.slidesToShow > n.slideCount &&
                        ((n.slideOffset =
                            (i + n.options.slidesToShow - n.slideCount) *
                            n.slideWidth),
                            (r = (i + n.options.slidesToShow - n.slideCount) * t)),
                n.slideCount <= n.options.slidesToShow &&
                ((n.slideOffset = 0), (r = 0)),
                    !0 === n.options.centerMode &&
                    n.slideCount <= n.options.slidesToShow
                        ? (n.slideOffset =
                        (n.slideWidth * Math.floor(n.options.slidesToShow)) / 2 -
                        (n.slideWidth * n.slideCount) / 2)
                        : !0 === n.options.centerMode && !0 === n.options.infinite
                        ? (n.slideOffset +=
                            n.slideWidth * Math.floor(n.options.slidesToShow / 2) -
                            n.slideWidth)
                        : !0 === n.options.centerMode &&
                        ((n.slideOffset = 0),
                            (n.slideOffset +=
                                n.slideWidth * Math.floor(n.options.slidesToShow / 2))),
                    (e =
                        !1 === n.options.vertical
                            ? i * n.slideWidth * -1 + n.slideOffset
                            : i * t * -1 + r),
                !0 === n.options.variableWidth &&
                ((o =
                    n.slideCount <= n.options.slidesToShow ||
                    !1 === n.options.infinite
                        ? n.$slideTrack.children('.slick-slide').eq(i)
                        : n.$slideTrack
                            .children('.slick-slide')
                            .eq(i + n.options.slidesToShow)),
                    (e =
                        !0 === n.options.rtl
                            ? o[0]
                            ? -1 *
                            (n.$slideTrack.width() - o[0].offsetLeft - o.width())
                            : 0
                            : o[0]
                            ? -1 * o[0].offsetLeft
                            : 0),
                !0 === n.options.centerMode &&
                ((o =
                    n.slideCount <= n.options.slidesToShow ||
                    !1 === n.options.infinite
                        ? n.$slideTrack.children('.slick-slide').eq(i)
                        : n.$slideTrack
                            .children('.slick-slide')
                            .eq(i + n.options.slidesToShow + 1)),
                    (e =
                        !0 === n.options.rtl
                            ? o[0]
                            ? -1 *
                            (n.$slideTrack.width() -
                                o[0].offsetLeft -
                                o.width())
                            : 0
                            : o[0]
                            ? -1 * o[0].offsetLeft
                            : 0),
                    (e += (n.$list.width() - o.outerWidth()) / 2))),
                    e
            );
        }),
        (e.prototype.getOption = e.prototype.slickGetOption =
            function (i) {
                return this.options[i];
            }),
        (e.prototype.getNavigableIndexes = function () {
            var i,
                e = this,
                t = 0,
                o = 0,
                s = [];
            for (
                !1 === e.options.infinite
                    ? (i = e.slideCount)
                    : ((t = -1 * e.options.slidesToScroll),
                        (o = -1 * e.options.slidesToScroll),
                        (i = 2 * e.slideCount));
                t < i;

            )
                s.push(t),
                    (t = o + e.options.slidesToScroll),
                    (o +=
                        e.options.slidesToScroll <= e.options.slidesToShow
                            ? e.options.slidesToScroll
                            : e.options.slidesToShow);
            return s;
        }),
        (e.prototype.getSlick = function () {
            return this;
        }),
        (e.prototype.getSlideCount = function () {
            var e,
                t,
                o = this;
            return (
                (t =
                    !0 === o.options.centerMode
                        ? o.slideWidth * Math.floor(o.options.slidesToShow / 2)
                        : 0),
                    !0 === o.options.swipeToSlide
                        ? (o.$slideTrack.find('.slick-slide').each(function (s, n) {
                            if (
                                n.offsetLeft - t + i(n).outerWidth() / 2 >
                                -1 * o.swipeLeft
                            )
                                return (e = n), !1;
                        }),
                        Math.abs(i(e).attr('data-slick-index') - o.currentSlide) || 1)
                        : o.options.slidesToScroll
            );
        }),
        (e.prototype.goTo = e.prototype.slickGoTo =
            function (i, e) {
                this.changeSlide(
                    { data: { message: 'index', index: parseInt(i) } },
                    e
                );
            }),
        (e.prototype.init = function (e) {
            var t = this;
            i(t.$slider).hasClass('slick-initialized') ||
            (i(t.$slider).addClass('slick-initialized'),
                t.buildRows(),
                t.buildOut(),
                t.setProps(),
                t.startLoad(),
                t.loadSlider(),
                t.initializeEvents(),
                t.updateArrows(),
                t.updateDots(),
                t.checkResponsive(!0),
                t.focusHandler()),
            e && t.$slider.trigger('init', [t]),
            !0 === t.options.accessibility && t.initADA(),
            t.options.autoplay && ((t.paused = !1), t.autoPlay());
        }),
        (e.prototype.initADA = function () {
            var e = this,
                t = Math.ceil(e.slideCount / e.options.slidesToShow),
                o = e.getNavigableIndexes().filter(function (i) {
                    return i >= 0 && i < e.slideCount;
                });
            e.$slides
                .add(e.$slideTrack.find('.slick-cloned'))
                .attr({ 'aria-hidden': 'true', tabindex: '-1' })
                .find('a, input, button, select')
                .attr({ tabindex: '-1' }),
            null !== e.$dots &&
            (e.$slides
                .not(e.$slideTrack.find('.slick-cloned'))
                .each(function (t) {
                    var s = o.indexOf(t);
                    i(this).attr({
                        role: 'tabpanel',
                        id: 'slick-slide' + e.instanceUid + t,
                        tabindex: -1,
                    }),
                    -1 !== s &&
                    i(this).attr({
                        'aria-describedby':
                            'slick-slide-control' + e.instanceUid + s,
                    });
                }),
                e.$dots
                    .attr('role', 'tablist')
                    .find('li')
                    .each(function (s) {
                        var n = o[s];
                        i(this).attr({ role: 'presentation' }),
                            i(this)
                                .find('button')
                                .first()
                                .attr({
                                    role: 'tab',
                                    id: 'slick-slide-control' + e.instanceUid + s,
                                    'aria-controls':
                                        'slick-slide' + e.instanceUid + n,
                                    'aria-label': s + 1 + ' of ' + t,
                                    'aria-selected': null,
                                    tabindex: '-1',
                                });
                    })
                    .eq(e.currentSlide)
                    .find('button')
                    .attr({ 'aria-selected': 'true', tabindex: '0' })
                    .end());
            for (
                var s = e.currentSlide, n = s + e.options.slidesToShow;
                s < n;
                s++
            )
                e.$slides.eq(s).attr('tabindex', 0);
            e.activateADA();
        }),
        (e.prototype.initArrowEvents = function () {
            var i = this;
            !0 === i.options.arrows &&
            i.slideCount > i.options.slidesToShow &&
            (i.$prevArrow
                .off('click.slick')
                .on('click.slick', { message: 'previous' }, i.changeSlide),
                i.$nextArrow
                    .off('click.slick')
                    .on('click.slick', { message: 'next' }, i.changeSlide),
            !0 === i.options.accessibility &&
            (i.$prevArrow.on('keydown.slick', i.keyHandler),
                i.$nextArrow.on('keydown.slick', i.keyHandler)));
        }),
        (e.prototype.initDotEvents = function () {
            var e = this;
            !0 === e.options.dots &&
            (i('li', e.$dots).on(
                'click.slick',
                { message: 'index' },
                e.changeSlide
            ),
            !0 === e.options.accessibility &&
            e.$dots.on('keydown.slick', e.keyHandler)),
            !0 === e.options.dots &&
            !0 === e.options.pauseOnDotsHover &&
            i('li', e.$dots)
                .on('mouseenter.slick', i.proxy(e.interrupt, e, !0))
                .on('mouseleave.slick', i.proxy(e.interrupt, e, !1));
        }),
        (e.prototype.initSlideEvents = function () {
            var e = this;
            e.options.pauseOnHover &&
            (e.$list.on('mouseenter.slick', i.proxy(e.interrupt, e, !0)),
                e.$list.on('mouseleave.slick', i.proxy(e.interrupt, e, !1)));
        }),
        (e.prototype.initializeEvents = function () {
            var e = this;
            e.initArrowEvents(),
                e.initDotEvents(),
                e.initSlideEvents(),
                e.$list.on(
                    'touchstart.slick mousedown.slick',
                    { action: 'start' },
                    e.swipeHandler
                ),
                e.$list.on(
                    'touchmove.slick mousemove.slick',
                    { action: 'move' },
                    e.swipeHandler
                ),
                e.$list.on(
                    'touchend.slick mouseup.slick',
                    { action: 'end' },
                    e.swipeHandler
                ),
                e.$list.on(
                    'touchcancel.slick mouseleave.slick',
                    { action: 'end' },
                    e.swipeHandler
                ),
                e.$list.on('click.slick', e.clickHandler),
                i(document).on(e.visibilityChange, i.proxy(e.visibility, e)),
            !0 === e.options.accessibility &&
            e.$list.on('keydown.slick', e.keyHandler),
            !0 === e.options.focusOnSelect &&
            i(e.$slideTrack).children().on('click.slick', e.selectHandler),
                i(window).on(
                    'orientationchange.slick.slick-' + e.instanceUid,
                    i.proxy(e.orientationChange, e)
                ),
                i(window).on(
                    'resize.slick.slick-' + e.instanceUid,
                    i.proxy(e.resize, e)
                ),
                i('[draggable!=true]', e.$slideTrack).on(
                    'dragstart',
                    e.preventDefault
                ),
                i(window).on('load.slick.slick-' + e.instanceUid, e.setPosition),
                i(e.setPosition);
        }),
        (e.prototype.initUI = function () {
            var i = this;
            !0 === i.options.arrows &&
            i.slideCount > i.options.slidesToShow &&
            (i.$prevArrow.show(), i.$nextArrow.show()),
            !0 === i.options.dots &&
            i.slideCount > i.options.slidesToShow &&
            i.$dots.show();
        }),
        (e.prototype.keyHandler = function (i) {
            var e = this;
            i.target.tagName.match('TEXTAREA|INPUT|SELECT') ||
            (37 === i.keyCode && !0 === e.options.accessibility
                ? e.changeSlide({
                    data: {
                        message: !0 === e.options.rtl ? 'next' : 'previous',
                    },
                })
                : 39 === i.keyCode &&
                !0 === e.options.accessibility &&
                e.changeSlide({
                    data: {
                        message: !0 === e.options.rtl ? 'previous' : 'next',
                    },
                }));
        }),
        (e.prototype.lazyLoad = function () {
            function e(e) {
                i('img[data-lazy]', e).each(function () {
                    var e = i(this),
                        t = i(this).attr('data-lazy'),
                        o = i(this).attr('data-srcset'),
                        s =
                            i(this).attr('data-sizes') || n.$slider.attr('data-sizes'),
                        r = document.createElement('img');
                    (r.onload = function () {
                        e.animate({ opacity: 0 }, 100, function () {
                            o && (e.attr('srcset', o), s && e.attr('sizes', s)),
                                e
                                    .attr('src', t)
                                    .animate({ opacity: 1 }, 200, function () {
                                        e.removeAttr(
                                            'data-lazy data-srcset data-sizes'
                                        ).removeClass('slick-loading');
                                    }),
                                n.$slider.trigger('lazyLoaded', [n, e, t]);
                        });
                    }),
                        (r.onerror = function () {
                            e
                                .removeAttr('data-lazy')
                                .removeClass('slick-loading')
                                .addClass('slick-lazyload-error'),
                                n.$slider.trigger('lazyLoadError', [n, e, t]);
                        }),
                        (r.src = t);
                });
            }
            var t,
                o,
                s,
                n = this;
            if (
                (!0 === n.options.centerMode
                    ? !0 === n.options.infinite
                        ? (s =
                            (o =
                                n.currentSlide + (n.options.slidesToShow / 2 + 1)) +
                            n.options.slidesToShow +
                            2)
                        : ((o = Math.max(
                            0,
                            n.currentSlide - (n.options.slidesToShow / 2 + 1)
                        )),
                            (s = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide))
                    : ((o = n.options.infinite
                        ? n.options.slidesToShow + n.currentSlide
                        : n.currentSlide),
                        (s = Math.ceil(o + n.options.slidesToShow)),
                    !0 === n.options.fade &&
                    (o > 0 && o--, s <= n.slideCount && s++)),
                    (t = n.$slider.find('.slick-slide').slice(o, s)),
                'anticipated' === n.options.lazyLoad)
            )
                for (
                    var r = o - 1, l = s, d = n.$slider.find('.slick-slide'), a = 0;
                    a < n.options.slidesToScroll;
                    a++
                )
                    r < 0 && (r = n.slideCount - 1),
                        (t = (t = t.add(d.eq(r))).add(d.eq(l))),
                        r--,
                        l++;
            e(t),
                n.slideCount <= n.options.slidesToShow
                    ? e(n.$slider.find('.slick-slide'))
                    : n.currentSlide >= n.slideCount - n.options.slidesToShow
                    ? e(
                        n.$slider
                            .find('.slick-cloned')
                            .slice(0, n.options.slidesToShow)
                    )
                    : 0 === n.currentSlide &&
                    e(
                        n.$slider
                            .find('.slick-cloned')
                            .slice(-1 * n.options.slidesToShow)
                    );
        }),
        (e.prototype.loadSlider = function () {
            var i = this;
            i.setPosition(),
                i.$slideTrack.css({ opacity: 1 }),
                i.$slider.removeClass('slick-loading'),
                i.initUI(),
            'progressive' === i.options.lazyLoad && i.progressiveLazyLoad();
        }),
        (e.prototype.next = e.prototype.slickNext =
            function () {
                this.changeSlide({ data: { message: 'next' } });
            }),
        (e.prototype.orientationChange = function () {
            var i = this;
            i.checkResponsive(), i.setPosition();
        }),
        (e.prototype.pause = e.prototype.slickPause =
            function () {
                var i = this;
                i.autoPlayClear(), (i.paused = !0);
            }),
        (e.prototype.play = e.prototype.slickPlay =
            function () {
                var i = this;
                i.autoPlay(),
                    (i.options.autoplay = !0),
                    (i.paused = !1),
                    (i.focussed = !1),
                    (i.interrupted = !1);
            }),
        (e.prototype.postSlide = function (e) {
            var t = this;
            t.unslicked ||
            (t.$slider.trigger('afterChange', [t, e]),
                (t.animating = !1),
            t.slideCount > t.options.slidesToShow && t.setPosition(),
                (t.swipeLeft = null),
            t.options.autoplay && t.autoPlay(),
            !0 === t.options.accessibility &&
            (t.initADA(),
            t.options.focusOnChange &&
            i(t.$slides.get(t.currentSlide))
                .attr('tabindex', 0)
                .focus()));
        }),
        (e.prototype.prev = e.prototype.slickPrev =
            function () {
                this.changeSlide({ data: { message: 'previous' } });
            }),
        (e.prototype.preventDefault = function (i) {
            i.preventDefault();
        }),
        (e.prototype.progressiveLazyLoad = function (e) {
            e = e || 1;
            var t,
                o,
                s,
                n,
                r,
                l = this,
                d = i('img[data-lazy]', l.$slider);
            d.length
                ? ((t = d.first()),
                    (o = t.attr('data-lazy')),
                    (s = t.attr('data-srcset')),
                    (n = t.attr('data-sizes') || l.$slider.attr('data-sizes')),
                    ((r = document.createElement('img')).onload = function () {
                        s && (t.attr('srcset', s), n && t.attr('sizes', n)),
                            t
                                .attr('src', o)
                                .removeAttr('data-lazy data-srcset data-sizes')
                                .removeClass('slick-loading'),
                        !0 === l.options.adaptiveHeight && l.setPosition(),
                            l.$slider.trigger('lazyLoaded', [l, t, o]),
                            l.progressiveLazyLoad();
                    }),
                    (r.onerror = function () {
                        e < 3
                            ? setTimeout(function () {
                                l.progressiveLazyLoad(e + 1);
                            }, 500)
                            : (t
                                .removeAttr('data-lazy')
                                .removeClass('slick-loading')
                                .addClass('slick-lazyload-error'),
                                l.$slider.trigger('lazyLoadError', [l, t, o]),
                                l.progressiveLazyLoad());
                    }),
                    (r.src = o))
                : l.$slider.trigger('allImagesLoaded', [l]);
        }),
        (e.prototype.refresh = function (e) {
            var t,
                o,
                s = this;
            (o = s.slideCount - s.options.slidesToShow),
            !s.options.infinite && s.currentSlide > o && (s.currentSlide = o),
            s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0),
                (t = s.currentSlide),
                s.destroy(!0),
                i.extend(s, s.initials, { currentSlide: t }),
                s.init(),
            e || s.changeSlide({ data: { message: 'index', index: t } }, !1);
        }),
        (e.prototype.registerBreakpoints = function () {
            var e,
                t,
                o,
                s = this,
                n = s.options.responsive || null;
            if ('array' === i.type(n) && n.length) {
                s.respondTo = s.options.respondTo || 'window';
                for (e in n)
                    if (((o = s.breakpoints.length - 1), n.hasOwnProperty(e))) {
                        for (t = n[e].breakpoint; o >= 0; )
                            s.breakpoints[o] &&
                            s.breakpoints[o] === t &&
                            s.breakpoints.splice(o, 1),
                                o--;
                        s.breakpoints.push(t),
                            (s.breakpointSettings[t] = n[e].settings);
                    }
                s.breakpoints.sort(function (i, e) {
                    return s.options.mobileFirst ? i - e : e - i;
                });
            }
        }),
        (e.prototype.reinit = function () {
            var e = this;
            (e.$slides = e.$slideTrack
                .children(e.options.slide)
                .addClass('slick-slide')),
                (e.slideCount = e.$slides.length),
            e.currentSlide >= e.slideCount &&
            0 !== e.currentSlide &&
            (e.currentSlide = e.currentSlide - e.options.slidesToScroll),
            e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0),
                e.registerBreakpoints(),
                e.setProps(),
                e.setupInfinite(),
                e.buildArrows(),
                e.updateArrows(),
                e.initArrowEvents(),
                e.buildDots(),
                e.updateDots(),
                e.initDotEvents(),
                e.cleanUpSlideEvents(),
                e.initSlideEvents(),
                e.checkResponsive(!1, !0),
            !0 === e.options.focusOnSelect &&
            i(e.$slideTrack).children().on('click.slick', e.selectHandler),
                e.setSlideClasses(
                    'number' == typeof e.currentSlide ? e.currentSlide : 0
                ),
                e.setPosition(),
                e.focusHandler(),
                (e.paused = !e.options.autoplay),
                e.autoPlay(),
                e.$slider.trigger('reInit', [e]);
        }),
        (e.prototype.resize = function () {
            var e = this;
            i(window).width() !== e.windowWidth &&
            (clearTimeout(e.windowDelay),
                (e.windowDelay = window.setTimeout(function () {
                    (e.windowWidth = i(window).width()),
                        e.checkResponsive(),
                    e.unslicked || e.setPosition();
                }, 50)));
        }),
        (e.prototype.removeSlide = e.prototype.slickRemove =
            function (i, e, t) {
                var o = this;
                if (
                    ((i =
                        'boolean' == typeof i
                            ? !0 === (e = i)
                            ? 0
                            : o.slideCount - 1
                            : !0 === e
                            ? --i
                            : i),
                    o.slideCount < 1 || i < 0 || i > o.slideCount - 1)
                )
                    return !1;
                o.unload(),
                    !0 === t
                        ? o.$slideTrack.children().remove()
                        : o.$slideTrack.children(this.options.slide).eq(i).remove(),
                    (o.$slides = o.$slideTrack.children(this.options.slide)),
                    o.$slideTrack.children(this.options.slide).detach(),
                    o.$slideTrack.append(o.$slides),
                    (o.$slidesCache = o.$slides),
                    o.reinit();
            }),
        (e.prototype.setCSS = function (i) {
            var e,
                t,
                o = this,
                s = {};
            !0 === o.options.rtl && (i = -i),
                (e = 'left' == o.positionProp ? Math.ceil(i) + 'px' : '0px'),
                (t = 'top' == o.positionProp ? Math.ceil(i) + 'px' : '0px'),
                (s[o.positionProp] = i),
                !1 === o.transformsEnabled
                    ? o.$slideTrack.css(s)
                    : ((s = {}),
                        !1 === o.cssTransitions
                            ? ((s[o.animType] = 'translate(' + e + ', ' + t + ')'),
                                o.$slideTrack.css(s))
                            : ((s[o.animType] =
                            'translate3d(' + e + ', ' + t + ', 0px)'),
                                o.$slideTrack.css(s)));
        }),
        (e.prototype.setDimensions = function () {
            var i = this;
            !1 === i.options.vertical
                ? !0 === i.options.centerMode &&
                i.$list.css({ padding: '0px ' + i.options.centerPadding })
                : (i.$list.height(
                i.$slides.first().outerHeight(!0) * i.options.slidesToShow
                ),
                !0 === i.options.centerMode &&
                i.$list.css({ padding: i.options.centerPadding + ' 0px' })),
                (i.listWidth = i.$list.width()),
                (i.listHeight = i.$list.height()),
                !1 === i.options.vertical && !1 === i.options.variableWidth
                    ? ((i.slideWidth = Math.ceil(
                    i.listWidth / i.options.slidesToShow
                    )),
                        i.$slideTrack.width(
                            Math.ceil(
                                i.slideWidth *
                                i.$slideTrack.children('.slick-slide').length
                            )
                        ))
                    : !0 === i.options.variableWidth
                    ? i.$slideTrack.width(5e3 * i.slideCount)
                    : ((i.slideWidth = Math.ceil(i.listWidth)),
                        i.$slideTrack.height(
                            Math.ceil(
                                i.$slides.first().outerHeight(!0) *
                                i.$slideTrack.children('.slick-slide').length
                            )
                        ));
            var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
            !1 === i.options.variableWidth &&
            i.$slideTrack.children('.slick-slide').width(i.slideWidth - e);
        }),
        (e.prototype.setFade = function () {
            var e,
                t = this;
            t.$slides.each(function (o, s) {
                (e = t.slideWidth * o * -1),
                    !0 === t.options.rtl
                        ? i(s).css({
                            position: 'relative',
                            right: e,
                            top: 0,
                            zIndex: t.options.zIndex - 2,
                            opacity: 0,
                        })
                        : i(s).css({
                            position: 'relative',
                            left: e,
                            top: 0,
                            zIndex: t.options.zIndex - 2,
                            opacity: 0,
                        });
            }),
                t.$slides
                    .eq(t.currentSlide)
                    .css({ zIndex: t.options.zIndex - 1, opacity: 1 });
        }),
        (e.prototype.setHeight = function () {
            var i = this;
            if (
                1 === i.options.slidesToShow &&
                !0 === i.options.adaptiveHeight &&
                !1 === i.options.vertical
            ) {
                var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
                i.$list.css('height', e);
            }
        }),
        (e.prototype.setOption = e.prototype.slickSetOption =
            function () {
                var e,
                    t,
                    o,
                    s,
                    n,
                    r = this,
                    l = !1;
                if (
                    ('object' === i.type(arguments[0])
                        ? ((o = arguments[0]), (l = arguments[1]), (n = 'multiple'))
                        : 'string' === i.type(arguments[0]) &&
                        ((o = arguments[0]),
                            (s = arguments[1]),
                            (l = arguments[2]),
                            'responsive' === arguments[0] &&
                            'array' === i.type(arguments[1])
                                ? (n = 'responsive')
                                : void 0 !== arguments[1] && (n = 'single')),
                    'single' === n)
                )
                    r.options[o] = s;
                else if ('multiple' === n)
                    i.each(o, function (i, e) {
                        r.options[i] = e;
                    });
                else if ('responsive' === n)
                    for (t in s)
                        if ('array' !== i.type(r.options.responsive))
                            r.options.responsive = [s[t]];
                        else {
                            for (e = r.options.responsive.length - 1; e >= 0; )
                                r.options.responsive[e].breakpoint ===
                                s[t].breakpoint && r.options.responsive.splice(e, 1),
                                    e--;
                            r.options.responsive.push(s[t]);
                        }
                l && (r.unload(), r.reinit());
            }),
        (e.prototype.setPosition = function () {
            var i = this;
            i.setDimensions(),
                i.setHeight(),
                !1 === i.options.fade
                    ? i.setCSS(i.getLeft(i.currentSlide))
                    : i.setFade(),
                i.$slider.trigger('setPosition', [i]);
        }),
        (e.prototype.setProps = function () {
            var i = this,
                e = document.body.style;
            (i.positionProp = !0 === i.options.vertical ? 'top' : 'left'),
                'top' === i.positionProp
                    ? i.$slider.addClass('slick-vertical')
                    : i.$slider.removeClass('slick-vertical'),
            (void 0 === e.WebkitTransition &&
                void 0 === e.MozTransition &&
                void 0 === e.msTransition) ||
            (!0 === i.options.useCSS && (i.cssTransitions = !0)),
            i.options.fade &&
            ('number' == typeof i.options.zIndex
                ? i.options.zIndex < 3 && (i.options.zIndex = 3)
                : (i.options.zIndex = i.defaults.zIndex)),
            void 0 !== e.OTransform &&
            ((i.animType = 'OTransform'),
                (i.transformType = '-o-transform'),
                (i.transitionType = 'OTransition'),
            void 0 === e.perspectiveProperty &&
            void 0 === e.webkitPerspective &&
            (i.animType = !1)),
            void 0 !== e.MozTransform &&
            ((i.animType = 'MozTransform'),
                (i.transformType = '-moz-transform'),
                (i.transitionType = 'MozTransition'),
            void 0 === e.perspectiveProperty &&
            void 0 === e.MozPerspective &&
            (i.animType = !1)),
            void 0 !== e.webkitTransform &&
            ((i.animType = 'webkitTransform'),
                (i.transformType = '-webkit-transform'),
                (i.transitionType = 'webkitTransition'),
            void 0 === e.perspectiveProperty &&
            void 0 === e.webkitPerspective &&
            (i.animType = !1)),
            void 0 !== e.msTransform &&
            ((i.animType = 'msTransform'),
                (i.transformType = '-ms-transform'),
                (i.transitionType = 'msTransition'),
            void 0 === e.msTransform && (i.animType = !1)),
            void 0 !== e.transform &&
            !1 !== i.animType &&
            ((i.animType = 'transform'),
                (i.transformType = 'transform'),
                (i.transitionType = 'transition')),
                (i.transformsEnabled =
                    i.options.useTransform &&
                    null !== i.animType &&
                    !1 !== i.animType);
        }),
        (e.prototype.setSlideClasses = function (i) {
            var e,
                t,
                o,
                s,
                n = this;
            if (
                ((t = n.$slider
                    .find('.slick-slide')
                    .removeClass('slick-active slick-center slick-current')
                    .attr('aria-hidden', 'true')),
                    n.$slides.eq(i).addClass('slick-current'),
                !0 === n.options.centerMode)
            ) {
                var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
                (e = Math.floor(n.options.slidesToShow / 2)),
                !0 === n.options.infinite &&
                (i >= e && i <= n.slideCount - 1 - e
                    ? n.$slides
                        .slice(i - e + r, i + e + 1)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false')
                    : ((o = n.options.slidesToShow + i),
                        t
                            .slice(o - e + 1 + r, o + e + 2)
                            .addClass('slick-active')
                            .attr('aria-hidden', 'false')),
                    0 === i
                        ? t
                            .eq(t.length - 1 - n.options.slidesToShow)
                            .addClass('slick-center')
                        : i === n.slideCount - 1 &&
                        t.eq(n.options.slidesToShow).addClass('slick-center')),
                    n.$slides.eq(i).addClass('slick-center');
            } else
                i >= 0 && i <= n.slideCount - n.options.slidesToShow
                    ? n.$slides
                        .slice(i, i + n.options.slidesToShow)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false')
                    : t.length <= n.options.slidesToShow
                    ? t.addClass('slick-active').attr('aria-hidden', 'false')
                    : ((s = n.slideCount % n.options.slidesToShow),
                        (o =
                            !0 === n.options.infinite
                                ? n.options.slidesToShow + i
                                : i),
                        n.options.slidesToShow == n.options.slidesToScroll &&
                        n.slideCount - i < n.options.slidesToShow
                            ? t
                                .slice(o - (n.options.slidesToShow - s), o + s)
                                .addClass('slick-active')
                                .attr('aria-hidden', 'false')
                            : t
                                .slice(o, o + n.options.slidesToShow)
                                .addClass('slick-active')
                                .attr('aria-hidden', 'false'));
            ('ondemand' !== n.options.lazyLoad &&
                'anticipated' !== n.options.lazyLoad) ||
            n.lazyLoad();
        }),
        (e.prototype.setupInfinite = function () {
            var e,
                t,
                o,
                s = this;
            if (
                (!0 === s.options.fade && (s.options.centerMode = !1),
                !0 === s.options.infinite &&
                !1 === s.options.fade &&
                ((t = null), s.slideCount > s.options.slidesToShow))
            ) {
                for (
                    o =
                        !0 === s.options.centerMode
                            ? s.options.slidesToShow + 1
                            : s.options.slidesToShow,
                        e = s.slideCount;
                    e > s.slideCount - o;
                    e -= 1
                )
                    (t = e - 1),
                        i(s.$slides[t])
                            .clone(!0)
                            .attr('id', '')
                            .attr('data-slick-index', t - s.slideCount)
                            .prependTo(s.$slideTrack)
                            .addClass('slick-cloned');
                for (e = 0; e < o + s.slideCount; e += 1)
                    (t = e),
                        i(s.$slides[t])
                            .clone(!0)
                            .attr('id', '')
                            .attr('data-slick-index', t + s.slideCount)
                            .appendTo(s.$slideTrack)
                            .addClass('slick-cloned');
                s.$slideTrack
                    .find('.slick-cloned')
                    .find('[id]')
                    .each(function () {
                        i(this).attr('id', '');
                    });
            }
        }),
        (e.prototype.interrupt = function (i) {
            var e = this;
            i || e.autoPlay(), (e.interrupted = i);
        }),
        (e.prototype.selectHandler = function (e) {
            var t = this,
                o = i(e.target).is('.slick-slide')
                    ? i(e.target)
                    : i(e.target).parents('.slick-slide'),
                s = parseInt(o.attr('data-slick-index'));
            s || (s = 0),
                t.slideCount <= t.options.slidesToShow
                    ? t.slideHandler(s, !1, !0)
                    : t.slideHandler(s);
        }),
        (e.prototype.slideHandler = function (i, e, t) {
            var o,
                s,
                n,
                r,
                l,
                d = null,
                a = this;
            if (
                ((e = e || !1),
                    !(
                        (!0 === a.animating && !0 === a.options.waitForAnimate) ||
                        (!0 === a.options.fade && a.currentSlide === i)
                    ))
            )
                if (
                    (!1 === e && a.asNavFor(i),
                        (o = i),
                        (d = a.getLeft(o)),
                        (r = a.getLeft(a.currentSlide)),
                        (a.currentLeft = null === a.swipeLeft ? r : a.swipeLeft),
                    !1 === a.options.infinite &&
                    !1 === a.options.centerMode &&
                    (i < 0 || i > a.getDotCount() * a.options.slidesToScroll))
                )
                    !1 === a.options.fade &&
                    ((o = a.currentSlide),
                        !0 !== t
                            ? a.animateSlide(r, function () {
                                a.postSlide(o);
                            })
                            : a.postSlide(o));
                else if (
                    !1 === a.options.infinite &&
                    !0 === a.options.centerMode &&
                    (i < 0 || i > a.slideCount - a.options.slidesToScroll)
                )
                    !1 === a.options.fade &&
                    ((o = a.currentSlide),
                        !0 !== t
                            ? a.animateSlide(r, function () {
                                a.postSlide(o);
                            })
                            : a.postSlide(o));
                else {
                    if (
                        (a.options.autoplay && clearInterval(a.autoPlayTimer),
                            (s =
                                o < 0
                                    ? a.slideCount % a.options.slidesToScroll != 0
                                    ? a.slideCount -
                                    (a.slideCount % a.options.slidesToScroll)
                                    : a.slideCount + o
                                    : o >= a.slideCount
                                    ? a.slideCount % a.options.slidesToScroll != 0
                                        ? 0
                                        : o - a.slideCount
                                    : o),
                            (a.animating = !0),
                            a.$slider.trigger('beforeChange', [a, a.currentSlide, s]),
                            (n = a.currentSlide),
                            (a.currentSlide = s),
                            a.setSlideClasses(a.currentSlide),
                        a.options.asNavFor &&
                        (l = (l = a.getNavTarget()).slick('getSlick'))
                            .slideCount <= l.options.slidesToShow &&
                        l.setSlideClasses(a.currentSlide),
                            a.updateDots(),
                            a.updateArrows(),
                        !0 === a.options.fade)
                    )
                        return (
                            !0 !== t
                                ? (a.fadeSlideOut(n),
                                    a.fadeSlide(s, function () {
                                        a.postSlide(s);
                                    }))
                                : a.postSlide(s),
                                void a.animateHeight()
                        );
                    !0 !== t
                        ? a.animateSlide(d, function () {
                            a.postSlide(s);
                        })
                        : a.postSlide(s);
                }
        }),
        (e.prototype.startLoad = function () {
            var i = this;
            !0 === i.options.arrows &&
            i.slideCount > i.options.slidesToShow &&
            (i.$prevArrow.hide(), i.$nextArrow.hide()),
            !0 === i.options.dots &&
            i.slideCount > i.options.slidesToShow &&
            i.$dots.hide(),
                i.$slider.addClass('slick-loading');
        }),
        (e.prototype.swipeDirection = function () {
            var i,
                e,
                t,
                o,
                s = this;
            return (
                (i = s.touchObject.startX - s.touchObject.curX),
                    (e = s.touchObject.startY - s.touchObject.curY),
                    (t = Math.atan2(e, i)),
                (o = Math.round((180 * t) / Math.PI)) < 0 &&
                (o = 360 - Math.abs(o)),
                    o <= 45 && o >= 0
                        ? !1 === s.options.rtl
                        ? 'left'
                        : 'right'
                        : o <= 360 && o >= 315
                        ? !1 === s.options.rtl
                            ? 'left'
                            : 'right'
                        : o >= 135 && o <= 225
                            ? !1 === s.options.rtl
                                ? 'right'
                                : 'left'
                            : !0 === s.options.verticalSwiping
                                ? o >= 35 && o <= 135
                                    ? 'down'
                                    : 'up'
                                : 'vertical'
            );
        }),
        (e.prototype.swipeEnd = function (i) {
            var e,
                t,
                o = this;
            if (((o.dragging = !1), (o.swiping = !1), o.scrolling))
                return (o.scrolling = !1), !1;
            if (
                ((o.interrupted = !1),
                    (o.shouldClick = !(o.touchObject.swipeLength > 10)),
                void 0 === o.touchObject.curX)
            )
                return !1;
            if (
                (!0 === o.touchObject.edgeHit &&
                o.$slider.trigger('edge', [o, o.swipeDirection()]),
                o.touchObject.swipeLength >= o.touchObject.minSwipe)
            ) {
                switch ((t = o.swipeDirection())) {
                    case 'left':
                    case 'down':
                        (e = o.options.swipeToSlide
                            ? o.checkNavigable(o.currentSlide + o.getSlideCount())
                            : o.currentSlide + o.getSlideCount()),
                            (o.currentDirection = 0);
                        break;
                    case 'right':
                    case 'up':
                        (e = o.options.swipeToSlide
                            ? o.checkNavigable(o.currentSlide - o.getSlideCount())
                            : o.currentSlide - o.getSlideCount()),
                            (o.currentDirection = 1);
                }
                'vertical' != t &&
                (o.slideHandler(e),
                    (o.touchObject = {}),
                    o.$slider.trigger('swipe', [o, t]));
            } else
                o.touchObject.startX !== o.touchObject.curX &&
                (o.slideHandler(o.currentSlide), (o.touchObject = {}));
        }),
        (e.prototype.swipeHandler = function (i) {
            var e = this;
            if (
                !(
                    !1 === e.options.swipe ||
                    ('ontouchend' in document && !1 === e.options.swipe) ||
                    (!1 === e.options.draggable && -1 !== i.type.indexOf('mouse'))
                )
            )
                switch (
                    ((e.touchObject.fingerCount =
                        i.originalEvent && void 0 !== i.originalEvent.touches
                            ? i.originalEvent.touches.length
                            : 1),
                        (e.touchObject.minSwipe =
                            e.listWidth / e.options.touchThreshold),
                    !0 === e.options.verticalSwiping &&
                    (e.touchObject.minSwipe =
                        e.listHeight / e.options.touchThreshold),
                        i.data.action)
                    ) {
                    case 'start':
                        e.swipeStart(i);
                        break;
                    case 'move':
                        e.swipeMove(i);
                        break;
                    case 'end':
                        e.swipeEnd(i);
                }
        }),
        (e.prototype.swipeMove = function (i) {
            var e,
                t,
                o,
                s,
                n,
                r,
                l = this;
            return (
                (n = void 0 !== i.originalEvent ? i.originalEvent.touches : null),
                !(!l.dragging || l.scrolling || (n && 1 !== n.length)) &&
                ((e = l.getLeft(l.currentSlide)),
                    (l.touchObject.curX = void 0 !== n ? n[0].pageX : i.clientX),
                    (l.touchObject.curY = void 0 !== n ? n[0].pageY : i.clientY),
                    (l.touchObject.swipeLength = Math.round(
                        Math.sqrt(
                            Math.pow(l.touchObject.curX - l.touchObject.startX, 2)
                        )
                    )),
                    (r = Math.round(
                        Math.sqrt(
                            Math.pow(l.touchObject.curY - l.touchObject.startY, 2)
                        )
                    )),
                    !l.options.verticalSwiping && !l.swiping && r > 4
                        ? ((l.scrolling = !0), !1)
                        : (!0 === l.options.verticalSwiping &&
                        (l.touchObject.swipeLength = r),
                            (t = l.swipeDirection()),
                        void 0 !== i.originalEvent &&
                        l.touchObject.swipeLength > 4 &&
                        ((l.swiping = !0), i.preventDefault()),
                            (s =
                                (!1 === l.options.rtl ? 1 : -1) *
                                (l.touchObject.curX > l.touchObject.startX ? 1 : -1)),
                        !0 === l.options.verticalSwiping &&
                        (s =
                            l.touchObject.curY > l.touchObject.startY ? 1 : -1),
                            (o = l.touchObject.swipeLength),
                            (l.touchObject.edgeHit = !1),
                        !1 === l.options.infinite &&
                        ((0 === l.currentSlide && 'right' === t) ||
                            (l.currentSlide >= l.getDotCount() &&
                                'left' === t)) &&
                        ((o =
                            l.touchObject.swipeLength * l.options.edgeFriction),
                            (l.touchObject.edgeHit = !0)),
                            !1 === l.options.vertical
                                ? (l.swipeLeft = e + o * s)
                                : (l.swipeLeft =
                                e + o * (l.$list.height() / l.listWidth) * s),
                        !0 === l.options.verticalSwiping &&
                        (l.swipeLeft = e + o * s),
                        !0 !== l.options.fade &&
                        !1 !== l.options.touchMove &&
                        (!0 === l.animating
                            ? ((l.swipeLeft = null), !1)
                            : void l.setCSS(l.swipeLeft))))
            );
        }),
        (e.prototype.swipeStart = function (i) {
            var e,
                t = this;
            if (
                ((t.interrupted = !0),
                1 !== t.touchObject.fingerCount ||
                t.slideCount <= t.options.slidesToShow)
            )
                return (t.touchObject = {}), !1;
            void 0 !== i.originalEvent &&
            void 0 !== i.originalEvent.touches &&
            (e = i.originalEvent.touches[0]),
                (t.touchObject.startX = t.touchObject.curX =
                    void 0 !== e ? e.pageX : i.clientX),
                (t.touchObject.startY = t.touchObject.curY =
                    void 0 !== e ? e.pageY : i.clientY),
                (t.dragging = !0);
        }),
        (e.prototype.unfilterSlides = e.prototype.slickUnfilter =
            function () {
                var i = this;
                null !== i.$slidesCache &&
                (i.unload(),
                    i.$slideTrack.children(this.options.slide).detach(),
                    i.$slidesCache.appendTo(i.$slideTrack),
                    i.reinit());
            }),
        (e.prototype.unload = function () {
            var e = this;
            i('.slick-cloned', e.$slider).remove(),
            e.$dots && e.$dots.remove(),
            e.$prevArrow &&
            e.htmlExpr.test(e.options.prevArrow) &&
            e.$prevArrow.remove(),
            e.$nextArrow &&
            e.htmlExpr.test(e.options.nextArrow) &&
            e.$nextArrow.remove(),
                e.$slides
                    .removeClass(
                        'slick-slide slick-active slick-visible slick-current'
                    )
                    .attr('aria-hidden', 'true')
                    .css('width', '');
        }),
        (e.prototype.unslick = function (i) {
            var e = this;
            e.$slider.trigger('unslick', [e, i]), e.destroy();
        }),
        (e.prototype.updateArrows = function () {
            var i = this;
            Math.floor(i.options.slidesToShow / 2),
            !0 === i.options.arrows &&
            i.slideCount > i.options.slidesToShow &&
            !i.options.infinite &&
            (i.$prevArrow
                .removeClass('slick-disabled')
                .attr('aria-disabled', 'false'),
                i.$nextArrow
                    .removeClass('slick-disabled')
                    .attr('aria-disabled', 'false'),
                0 === i.currentSlide
                    ? (i.$prevArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true'),
                        i.$nextArrow
                            .removeClass('slick-disabled')
                            .attr('aria-disabled', 'false'))
                    : i.currentSlide >= i.slideCount - i.options.slidesToShow &&
                    !1 === i.options.centerMode
                    ? (i.$nextArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true'),
                        i.$prevArrow
                            .removeClass('slick-disabled')
                            .attr('aria-disabled', 'false'))
                    : i.currentSlide >= i.slideCount - 1 &&
                    !0 === i.options.centerMode &&
                    (i.$nextArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true'),
                        i.$prevArrow
                            .removeClass('slick-disabled')
                            .attr('aria-disabled', 'false')));
        }),
        (e.prototype.updateDots = function () {
            var i = this;
            null !== i.$dots &&
            (i.$dots.find('li').removeClass('slick-active').end(),
                i.$dots
                    .find('li')
                    .eq(Math.floor(i.currentSlide / i.options.slidesToScroll))
                    .addClass('slick-active'));
        }),
        (e.prototype.visibility = function () {
            var i = this;
            i.options.autoplay &&
            (document[i.hidden] ? (i.interrupted = !0) : (i.interrupted = !1));
        }),
        (i.fn.slick = function () {
            var i,
                t,
                o = this,
                s = arguments[0],
                n = Array.prototype.slice.call(arguments, 1),
                r = o.length;
            for (i = 0; i < r; i++)
                if (
                    ('object' == typeof s || void 0 === s
                        ? (o[i].slick = new e(o[i], s))
                        : (t = o[i].slick[s].apply(o[i].slick, n)),
                    void 0 !== t)
                )
                    return t;
            return o;
        });
});

!(function (n, t) {
    'object' == typeof exports && 'undefined' != typeof module
        ? (module.exports = t())
        : 'function' == typeof define && define.amd
        ? define(t)
        : (n.Splitting = t());
})(this, function () {
    'use strict';
    var u = document,
        l = u.createTextNode.bind(u);
    function d(n, t, e) {
        n.style.setProperty(t, e);
    }
    function f(n, t) {
        return n.appendChild(t);
    }
    function p(n, t, e, r) {
        var i = u.createElement('span');
        return (
            t && (i.className = t),
            e && (!r && i.setAttribute('data-' + t, e), (i.textContent = e)),
            (n && f(n, i)) || i
        );
    }
    function h(n, t) {
        return n.getAttribute('data-' + t);
    }
    function m(n, t) {
        return n && 0 != n.length
            ? n.nodeName
                ? [n]
                : [].slice.call(n[0].nodeName ? n : (t || u).querySelectorAll(n))
            : [];
    }
    function o(n) {
        for (var t = []; n--; ) t[n] = [];
        return t;
    }
    function g(n, t) {
        n && n.some(t);
    }
    function c(t) {
        return function (n) {
            return t[n];
        };
    }
    var a = {};
    function n(n, t, e, r) {
        return { by: n, depends: t, key: e, split: r };
    }
    function e(n) {
        return (function t(e, n, r) {
            var i = r.indexOf(e);
            if (-1 == i)
                r.unshift(e),
                    g(a[e].depends, function (n) {
                        t(n, e, r);
                    });
            else {
                var u = r.indexOf(n);
                r.splice(i, 1), r.splice(u, 0, e);
            }
            return r;
        })(n, 0, []).map(c(a));
    }
    function t(n) {
        a[n.by] = n;
    }
    function v(n, r, i, u, o) {
        n.normalize();
        var c = [],
            a = document.createDocumentFragment();
        u && c.push(n.previousSibling);
        var s = [];
        return (
            m(n.childNodes).some(function (n) {
                if (!n.tagName || n.hasChildNodes()) {
                    if (n.childNodes && n.childNodes.length)
                        return s.push(n), void c.push.apply(c, v(n, r, i, u, o));
                    var t = n.wholeText || '',
                        e = t.trim();
                    e.length &&
                    (' ' === t[0] && s.push(l(' ')),
                        g(e.split(i), function (n, t) {
                            t && o && s.push(p(a, 'whitespace', ' ', o));
                            var e = p(a, r, n);
                            c.push(e), s.push(e);
                        }),
                    ' ' === t[t.length - 1] && s.push(l(' ')));
                } else s.push(n);
            }),
                g(s, function (n) {
                    f(a, n);
                }),
                (n.innerHTML = ''),
                f(n, a),
                c
        );
    }
    var s = 0;
    var i = 'words',
        r = n(i, s, 'word', function (n) {
            return v(n, 'word', /\s+/, 0, 1);
        }),
        y = 'chars',
        w = n(y, [i], 'char', function (n, e, t) {
            var r = [];
            return (
                g(t[i], function (n, t) {
                    r.push.apply(r, v(n, 'char', '', e.whitespace && t));
                }),
                    r
            );
        });
    function b(t) {
        var f = (t = t || {}).key;
        return m(t.target || '[data-splitting]').map(function (a) {
            var s = a['ðŸŒ'];
            if (!t.force && s) return s;
            s = a['ðŸŒ'] = { el: a };
            var n = e(t.by || h(a, 'splitting') || y),
                l = (function (n, t) {
                    for (var e in t) n[e] = t[e];
                    return n;
                })({}, t);
            return (
                g(n, function (n) {
                    if (n.split) {
                        var t = n.by,
                            e = (f ? '-' + f : '') + n.key,
                            r = n.split(a, l, s);
                        e &&
                        ((i = a),
                            (c = (o = '--' + e) + '-index'),
                            g((u = r), function (n, t) {
                                Array.isArray(n)
                                    ? g(n, function (n) {
                                        d(n, c, t);
                                    })
                                    : d(n, c, t);
                            }),
                            d(i, o + '-total', u.length)),
                            (s[t] = r),
                            a.classList.add(t);
                    }
                    var i, u, o, c;
                }),
                    a.classList.add('splitting'),
                    s
            );
        });
    }
    function N(n, t, e) {
        var r = m(t.matching || n.children, n),
            i = {};
        return (
            g(r, function (n) {
                var t = Math.round(n[e]);
                (i[t] || (i[t] = [])).push(n);
            }),
                Object.keys(i).map(Number).sort(x).map(c(i))
        );
    }
    function x(n, t) {
        return n - t;
    }
    (b.html = function (n) {
        var t = ((n = n || {}).target = p());
        return (t.innerHTML = n.content), b(n), t.outerHTML;
    }),
        (b.add = t);
    var T = n('lines', [i], 'line', function (n, t, e) {
            return N(n, { matching: e[i] }, 'offsetTop');
        }),
        L = n('items', s, 'item', function (n, t) {
            return m(t.matching || n.children, n);
        }),
        k = n('rows', s, 'row', function (n, t) {
            return N(n, t, 'offsetTop');
        }),
        A = n('cols', s, 'col', function (n, t) {
            return N(n, t, 'offsetLeft');
        }),
        C = n('grid', ['rows', 'cols']),
        M = 'layout',
        S = n(M, s, s, function (n, t) {
            var e = (t.rows = +(t.rows || h(n, 'rows') || 1)),
                r = (t.columns = +(t.columns || h(n, 'columns') || 1));
            if (
                ((t.image = t.image || h(n, 'image') || n.currentSrc || n.src),
                    t.image)
            ) {
                var i = m('img', n)[0];
                t.image = i && (i.currentSrc || i.src);
            }
            t.image && d(n, 'background-image', 'url(' + t.image + ')');
            for (var u = e * r, o = [], c = p(s, 'cell-grid'); u--; ) {
                var a = p(c, 'cell');
                p(a, 'cell-inner'), o.push(a);
            }
            return f(n, c), o;
        }),
        H = n('cellRows', [M], 'row', function (n, t, e) {
            var r = t.rows,
                i = o(r);
            return (
                g(e[M], function (n, t, e) {
                    i[Math.floor(t / (e.length / r))].push(n);
                }),
                    i
            );
        }),
        O = n('cellColumns', [M], 'col', function (n, t, e) {
            var r = t.columns,
                i = o(r);
            return (
                g(e[M], function (n, t) {
                    i[t % r].push(n);
                }),
                    i
            );
        }),
        j = n('cells', ['cellRows', 'cellColumns'], 'cell', function (n, t, e) {
            return e[M];
        });
    return t(r), t(w), t(T), t(L), t(k), t(A), t(C), t(S), t(H), t(O), t(j), b;
});



/**
 * Swiper 5.2.0
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 * http://swiperjs.com
 *
 * Copyright 2014-2019 Vladimir Kharlampidi
 *
 * Released under the MIT License
 *
 * Released on: October 26, 2019
 */

!(function (e, t) {
    'object' == typeof exports && 'undefined' != typeof module
        ? (module.exports = t())
        : 'function' == typeof define && define.amd
        ? define(t)
        : ((e = e || self).Swiper = t());
})(this, function () {
    'use strict';
    var e =
            'undefined' == typeof document
                ? {
                    body: {},
                    addEventListener: function () {},
                    removeEventListener: function () {},
                    activeElement: { blur: function () {}, nodeName: '' },
                    querySelector: function () {
                        return null;
                    },
                    querySelectorAll: function () {
                        return [];
                    },
                    getElementById: function () {
                        return null;
                    },
                    createEvent: function () {
                        return { initEvent: function () {} };
                    },
                    createElement: function () {
                        return {
                            children: [],
                            childNodes: [],
                            style: {},
                            setAttribute: function () {},
                            getElementsByTagName: function () {
                                return [];
                            },
                        };
                    },
                    location: { hash: '' },
                }
                : document,
        t =
            'undefined' == typeof window
                ? {
                    document: e,
                    navigator: { userAgent: '' },
                    location: {},
                    history: {},
                    CustomEvent: function () {
                        return this;
                    },
                    addEventListener: function () {},
                    removeEventListener: function () {},
                    getComputedStyle: function () {
                        return {
                            getPropertyValue: function () {
                                return '';
                            },
                        };
                    },
                    Image: function () {},
                    Date: function () {},
                    screen: {},
                    setTimeout: function () {},
                    clearTimeout: function () {},
                }
                : window,
        i = function (e) {
            for (var t = 0; t < e.length; t += 1) this[t] = e[t];
            return (this.length = e.length), this;
        };
    function s(s, a) {
        var r = [],
            n = 0;
        if (s && !a && s instanceof i) return s;
        if (s)
            if ('string' == typeof s) {
                var o,
                    l,
                    d = s.trim();
                if (d.indexOf('<') >= 0 && d.indexOf('>') >= 0) {
                    var h = 'div';
                    for (
                        0 === d.indexOf('<li') && (h = 'ul'),
                        0 === d.indexOf('<tr') && (h = 'tbody'),
                        (0 !== d.indexOf('<td') && 0 !== d.indexOf('<th')) ||
                        (h = 'tr'),
                        0 === d.indexOf('<tbody') && (h = 'table'),
                        0 === d.indexOf('<option') && (h = 'select'),
                            (l = e.createElement(h)).innerHTML = d,
                            n = 0;
                        n < l.childNodes.length;
                        n += 1
                    )
                        r.push(l.childNodes[n]);
                } else
                    for (
                        o =
                            a || '#' !== s[0] || s.match(/[ .<>:~]/)
                                ? (a || e).querySelectorAll(s.trim())
                                : [e.getElementById(s.trim().split('#')[1])],
                            n = 0;
                        n < o.length;
                        n += 1
                    )
                        o[n] && r.push(o[n]);
            } else if (s.nodeType || s === t || s === e) r.push(s);
            else if (s.length > 0 && s[0].nodeType)
                for (n = 0; n < s.length; n += 1) r.push(s[n]);
        return new i(r);
    }
    function a(e) {
        for (var t = [], i = 0; i < e.length; i += 1)
            -1 === t.indexOf(e[i]) && t.push(e[i]);
        return t;
    }
    (s.fn = i.prototype), (s.Class = i), (s.Dom7 = i);
    var r = {
        addClass: function (e) {
            if (void 0 === e) return this;
            for (var t = e.split(' '), i = 0; i < t.length; i += 1)
                for (var s = 0; s < this.length; s += 1)
                    void 0 !== this[s] &&
                    void 0 !== this[s].classList &&
                    this[s].classList.add(t[i]);
            return this;
        },
        removeClass: function (e) {
            for (var t = e.split(' '), i = 0; i < t.length; i += 1)
                for (var s = 0; s < this.length; s += 1)
                    void 0 !== this[s] &&
                    void 0 !== this[s].classList &&
                    this[s].classList.remove(t[i]);
            return this;
        },
        hasClass: function (e) {
            return !!this[0] && this[0].classList.contains(e);
        },
        toggleClass: function (e) {
            for (var t = e.split(' '), i = 0; i < t.length; i += 1)
                for (var s = 0; s < this.length; s += 1)
                    void 0 !== this[s] &&
                    void 0 !== this[s].classList &&
                    this[s].classList.toggle(t[i]);
            return this;
        },
        attr: function (e, t) {
            var i = arguments;
            if (1 === arguments.length && 'string' == typeof e)
                return this[0] ? this[0].getAttribute(e) : void 0;
            for (var s = 0; s < this.length; s += 1)
                if (2 === i.length) this[s].setAttribute(e, t);
                else
                    for (var a in e)
                        (this[s][a] = e[a]), this[s].setAttribute(a, e[a]);
            return this;
        },
        removeAttr: function (e) {
            for (var t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
            return this;
        },
        data: function (e, t) {
            var i;
            if (void 0 !== t) {
                for (var s = 0; s < this.length; s += 1)
                    (i = this[s]).dom7ElementDataStorage ||
                    (i.dom7ElementDataStorage = {}),
                        (i.dom7ElementDataStorage[e] = t);
                return this;
            }
            if ((i = this[0])) {
                if (i.dom7ElementDataStorage && e in i.dom7ElementDataStorage)
                    return i.dom7ElementDataStorage[e];
                var a = i.getAttribute('data-' + e);
                return a || void 0;
            }
        },
        transform: function (e) {
            for (var t = 0; t < this.length; t += 1) {
                var i = this[t].style;
                (i.webkitTransform = e), (i.transform = e);
            }
            return this;
        },
        transition: function (e) {
            'string' != typeof e && (e += 'ms');
            for (var t = 0; t < this.length; t += 1) {
                var i = this[t].style;
                (i.webkitTransitionDuration = e), (i.transitionDuration = e);
            }
            return this;
        },
        on: function () {
            for (var e, t = [], i = arguments.length; i--; ) t[i] = arguments[i];
            var a = t[0],
                r = t[1],
                n = t[2],
                o = t[3];
            function l(e) {
                var t = e.target;
                if (t) {
                    var i = e.target.dom7EventData || [];
                    if ((i.indexOf(e) < 0 && i.unshift(e), s(t).is(r)))
                        n.apply(t, i);
                    else
                        for (var a = s(t).parents(), o = 0; o < a.length; o += 1)
                            s(a[o]).is(r) && n.apply(a[o], i);
                }
            }
            function d(e) {
                var t = (e && e.target && e.target.dom7EventData) || [];
                t.indexOf(e) < 0 && t.unshift(e), n.apply(this, t);
            }
            'function' == typeof t[1] &&
            ((a = (e = t)[0]), (n = e[1]), (o = e[2]), (r = void 0)),
            o || (o = !1);
            for (var h, p = a.split(' '), c = 0; c < this.length; c += 1) {
                var u = this[c];
                if (r)
                    for (h = 0; h < p.length; h += 1) {
                        var v = p[h];
                        u.dom7LiveListeners || (u.dom7LiveListeners = {}),
                        u.dom7LiveListeners[v] || (u.dom7LiveListeners[v] = []),
                            u.dom7LiveListeners[v].push({
                                listener: n,
                                proxyListener: l,
                            }),
                            u.addEventListener(v, l, o);
                    }
                else
                    for (h = 0; h < p.length; h += 1) {
                        var f = p[h];
                        u.dom7Listeners || (u.dom7Listeners = {}),
                        u.dom7Listeners[f] || (u.dom7Listeners[f] = []),
                            u.dom7Listeners[f].push({ listener: n, proxyListener: d }),
                            u.addEventListener(f, d, o);
                    }
            }
            return this;
        },
        off: function () {
            for (var e, t = [], i = arguments.length; i--; ) t[i] = arguments[i];
            var s = t[0],
                a = t[1],
                r = t[2],
                n = t[3];
            'function' == typeof t[1] &&
            ((s = (e = t)[0]), (r = e[1]), (n = e[2]), (a = void 0)),
            n || (n = !1);
            for (var o = s.split(' '), l = 0; l < o.length; l += 1)
                for (var d = o[l], h = 0; h < this.length; h += 1) {
                    var p = this[h],
                        c = void 0;
                    if (
                        (!a && p.dom7Listeners
                            ? (c = p.dom7Listeners[d])
                            : a && p.dom7LiveListeners && (c = p.dom7LiveListeners[d]),
                        c && c.length)
                    )
                        for (var u = c.length - 1; u >= 0; u -= 1) {
                            var v = c[u];
                            r && v.listener === r
                                ? (p.removeEventListener(d, v.proxyListener, n),
                                    c.splice(u, 1))
                                : r &&
                                v.listener &&
                                v.listener.dom7proxy &&
                                v.listener.dom7proxy === r
                                ? (p.removeEventListener(d, v.proxyListener, n),
                                    c.splice(u, 1))
                                : r ||
                                (p.removeEventListener(d, v.proxyListener, n),
                                    c.splice(u, 1));
                        }
                }
            return this;
        },
        trigger: function () {
            for (var i = [], s = arguments.length; s--; ) i[s] = arguments[s];
            for (var a = i[0].split(' '), r = i[1], n = 0; n < a.length; n += 1)
                for (var o = a[n], l = 0; l < this.length; l += 1) {
                    var d = this[l],
                        h = void 0;
                    try {
                        h = new t.CustomEvent(o, {
                            detail: r,
                            bubbles: !0,
                            cancelable: !0,
                        });
                    } catch (t) {
                        (h = e.createEvent('Event')).initEvent(o, !0, !0),
                            (h.detail = r);
                    }
                    (d.dom7EventData = i.filter(function (e, t) {
                        return t > 0;
                    })),
                        d.dispatchEvent(h),
                        (d.dom7EventData = []),
                        delete d.dom7EventData;
                }
            return this;
        },
        transitionEnd: function (e) {
            var t,
                i = ['webkitTransitionEnd', 'transitionend'],
                s = this;
            function a(r) {
                if (r.target === this)
                    for (e.call(this, r), t = 0; t < i.length; t += 1)
                        s.off(i[t], a);
            }
            if (e) for (t = 0; t < i.length; t += 1) s.on(i[t], a);
            return this;
        },
        outerWidth: function (e) {
            if (this.length > 0) {
                if (e) {
                    var t = this.styles();
                    return (
                        this[0].offsetWidth +
                        parseFloat(t.getPropertyValue('margin-right')) +
                        parseFloat(t.getPropertyValue('margin-left'))
                    );
                }
                return this[0].offsetWidth;
            }
            return null;
        },
        outerHeight: function (e) {
            if (this.length > 0) {
                if (e) {
                    var t = this.styles();
                    return (
                        this[0].offsetHeight +
                        parseFloat(t.getPropertyValue('margin-top')) +
                        parseFloat(t.getPropertyValue('margin-bottom'))
                    );
                }
                return this[0].offsetHeight;
            }
            return null;
        },
        offset: function () {
            if (this.length > 0) {
                var i = this[0],
                    s = i.getBoundingClientRect(),
                    a = e.body,
                    r = i.clientTop || a.clientTop || 0,
                    n = i.clientLeft || a.clientLeft || 0,
                    o = i === t ? t.scrollY : i.scrollTop,
                    l = i === t ? t.scrollX : i.scrollLeft;
                return { top: s.top + o - r, left: s.left + l - n };
            }
            return null;
        },
        css: function (e, i) {
            var s;
            if (1 === arguments.length) {
                if ('string' != typeof e) {
                    for (s = 0; s < this.length; s += 1)
                        for (var a in e) this[s].style[a] = e[a];
                    return this;
                }
                if (this[0])
                    return t.getComputedStyle(this[0], null).getPropertyValue(e);
            }
            if (2 === arguments.length && 'string' == typeof e) {
                for (s = 0; s < this.length; s += 1) this[s].style[e] = i;
                return this;
            }
            return this;
        },
        each: function (e) {
            if (!e) return this;
            for (var t = 0; t < this.length; t += 1)
                if (!1 === e.call(this[t], t, this[t])) return this;
            return this;
        },
        html: function (e) {
            if (void 0 === e) return this[0] ? this[0].innerHTML : void 0;
            for (var t = 0; t < this.length; t += 1) this[t].innerHTML = e;
            return this;
        },
        text: function (e) {
            if (void 0 === e) return this[0] ? this[0].textContent.trim() : null;
            for (var t = 0; t < this.length; t += 1) this[t].textContent = e;
            return this;
        },
        is: function (a) {
            var r,
                n,
                o = this[0];
            if (!o || void 0 === a) return !1;
            if ('string' == typeof a) {
                if (o.matches) return o.matches(a);
                if (o.webkitMatchesSelector) return o.webkitMatchesSelector(a);
                if (o.msMatchesSelector) return o.msMatchesSelector(a);
                for (r = s(a), n = 0; n < r.length; n += 1)
                    if (r[n] === o) return !0;
                return !1;
            }
            if (a === e) return o === e;
            if (a === t) return o === t;
            if (a.nodeType || a instanceof i) {
                for (r = a.nodeType ? [a] : a, n = 0; n < r.length; n += 1)
                    if (r[n] === o) return !0;
                return !1;
            }
            return !1;
        },
        index: function () {
            var e,
                t = this[0];
            if (t) {
                for (e = 0; null !== (t = t.previousSibling); )
                    1 === t.nodeType && (e += 1);
                return e;
            }
        },
        eq: function (e) {
            if (void 0 === e) return this;
            var t,
                s = this.length;
            return new i(
                e > s - 1
                    ? []
                    : e < 0
                    ? (t = s + e) < 0
                        ? []
                        : [this[t]]
                    : [this[e]]
            );
        },
        append: function () {
            for (var t, s = [], a = arguments.length; a--; ) s[a] = arguments[a];
            for (var r = 0; r < s.length; r += 1) {
                t = s[r];
                for (var n = 0; n < this.length; n += 1)
                    if ('string' == typeof t) {
                        var o = e.createElement('div');
                        for (o.innerHTML = t; o.firstChild; )
                            this[n].appendChild(o.firstChild);
                    } else if (t instanceof i)
                        for (var l = 0; l < t.length; l += 1)
                            this[n].appendChild(t[l]);
                    else this[n].appendChild(t);
            }
            return this;
        },
        prepend: function (t) {
            var s, a;
            for (s = 0; s < this.length; s += 1)
                if ('string' == typeof t) {
                    var r = e.createElement('div');
                    for (
                        r.innerHTML = t, a = r.childNodes.length - 1;
                        a >= 0;
                        a -= 1
                    )
                        this[s].insertBefore(r.childNodes[a], this[s].childNodes[0]);
                } else if (t instanceof i)
                    for (a = 0; a < t.length; a += 1)
                        this[s].insertBefore(t[a], this[s].childNodes[0]);
                else this[s].insertBefore(t, this[s].childNodes[0]);
            return this;
        },
        next: function (e) {
            return this.length > 0
                ? e
                    ? this[0].nextElementSibling &&
                    s(this[0].nextElementSibling).is(e)
                        ? new i([this[0].nextElementSibling])
                        : new i([])
                    : this[0].nextElementSibling
                        ? new i([this[0].nextElementSibling])
                        : new i([])
                : new i([]);
        },
        nextAll: function (e) {
            var t = [],
                a = this[0];
            if (!a) return new i([]);
            for (; a.nextElementSibling; ) {
                var r = a.nextElementSibling;
                e ? s(r).is(e) && t.push(r) : t.push(r), (a = r);
            }
            return new i(t);
        },
        prev: function (e) {
            if (this.length > 0) {
                var t = this[0];
                return e
                    ? t.previousElementSibling && s(t.previousElementSibling).is(e)
                        ? new i([t.previousElementSibling])
                        : new i([])
                    : t.previousElementSibling
                        ? new i([t.previousElementSibling])
                        : new i([]);
            }
            return new i([]);
        },
        prevAll: function (e) {
            var t = [],
                a = this[0];
            if (!a) return new i([]);
            for (; a.previousElementSibling; ) {
                var r = a.previousElementSibling;
                e ? s(r).is(e) && t.push(r) : t.push(r), (a = r);
            }
            return new i(t);
        },
        parent: function (e) {
            for (var t = [], i = 0; i < this.length; i += 1)
                null !== this[i].parentNode &&
                (e
                    ? s(this[i].parentNode).is(e) && t.push(this[i].parentNode)
                    : t.push(this[i].parentNode));
            return s(a(t));
        },
        parents: function (e) {
            for (var t = [], i = 0; i < this.length; i += 1)
                for (var r = this[i].parentNode; r; )
                    e ? s(r).is(e) && t.push(r) : t.push(r), (r = r.parentNode);
            return s(a(t));
        },
        closest: function (e) {
            var t = this;
            return void 0 === e
                ? new i([])
                : (t.is(e) || (t = t.parents(e).eq(0)), t);
        },
        find: function (e) {
            for (var t = [], s = 0; s < this.length; s += 1)
                for (
                    var a = this[s].querySelectorAll(e), r = 0;
                    r < a.length;
                    r += 1
                )
                    t.push(a[r]);
            return new i(t);
        },
        children: function (e) {
            for (var t = [], r = 0; r < this.length; r += 1)
                for (var n = this[r].childNodes, o = 0; o < n.length; o += 1)
                    e
                        ? 1 === n[o].nodeType && s(n[o]).is(e) && t.push(n[o])
                        : 1 === n[o].nodeType && t.push(n[o]);
            return new i(a(t));
        },
        filter: function (e) {
            for (var t = [], s = 0; s < this.length; s += 1)
                e.call(this[s], s, this[s]) && t.push(this[s]);
            return new i(t);
        },
        remove: function () {
            for (var e = 0; e < this.length; e += 1)
                this[e].parentNode && this[e].parentNode.removeChild(this[e]);
            return this;
        },
        add: function () {
            for (var e = [], t = arguments.length; t--; ) e[t] = arguments[t];
            var i, a;
            for (i = 0; i < e.length; i += 1) {
                var r = s(e[i]);
                for (a = 0; a < r.length; a += 1)
                    (this[this.length] = r[a]), (this.length += 1);
            }
            return this;
        },
        styles: function () {
            return this[0] ? t.getComputedStyle(this[0], null) : {};
        },
    };
    Object.keys(r).forEach(function (e) {
        s.fn[e] = s.fn[e] || r[e];
    });
    var n = {
            deleteProps: function (e) {
                var t = e;
                Object.keys(t).forEach(function (e) {
                    try {
                        t[e] = null;
                    } catch (e) {}
                    try {
                        delete t[e];
                    } catch (e) {}
                });
            },
            nextTick: function (e, t) {
                return void 0 === t && (t = 0), setTimeout(e, t);
            },
            now: function () {
                return Date.now();
            },
            getTranslate: function (e, i) {
                var s, a, r;
                void 0 === i && (i = 'x');
                var n = t.getComputedStyle(e, null);
                return (
                    t.WebKitCSSMatrix
                        ? ((a = n.transform || n.webkitTransform).split(',').length >
                        6 &&
                        (a = a
                            .split(', ')
                            .map(function (e) {
                                return e.replace(',', '.');
                            })
                            .join(', ')),
                            (r = new t.WebKitCSSMatrix('none' === a ? '' : a)))
                        : (s = (r =
                        n.MozTransform ||
                        n.OTransform ||
                        n.MsTransform ||
                        n.msTransform ||
                        n.transform ||
                        n
                            .getPropertyValue('transform')
                            .replace('translate(', 'matrix(1, 0, 0, 1,'))
                            .toString()
                            .split(',')),
                    'x' === i &&
                    (a = t.WebKitCSSMatrix
                        ? r.m41
                        : 16 === s.length
                            ? parseFloat(s[12])
                            : parseFloat(s[4])),
                    'y' === i &&
                    (a = t.WebKitCSSMatrix
                        ? r.m42
                        : 16 === s.length
                            ? parseFloat(s[13])
                            : parseFloat(s[5])),
                    a || 0
                );
            },
            parseUrlQuery: function (e) {
                var i,
                    s,
                    a,
                    r,
                    n = {},
                    o = e || t.location.href;
                if ('string' == typeof o && o.length)
                    for (
                        r = (s = (o =
                            o.indexOf('?') > -1 ? o.replace(/\S*\?/, '') : '')
                            .split('&')
                            .filter(function (e) {
                                return '' !== e;
                            })).length,
                            i = 0;
                        i < r;
                        i += 1
                    )
                        (a = s[i].replace(/#\S+/g, '').split('=')),
                            (n[decodeURIComponent(a[0])] =
                                void 0 === a[1]
                                    ? void 0
                                    : decodeURIComponent(a[1]) || '');
                return n;
            },
            isObject: function (e) {
                return (
                    'object' == typeof e &&
                    null !== e &&
                    e.constructor &&
                    e.constructor === Object
                );
            },
            extend: function () {
                for (var e = [], t = arguments.length; t--; ) e[t] = arguments[t];
                for (var i = Object(e[0]), s = 1; s < e.length; s += 1) {
                    var a = e[s];
                    if (null != a)
                        for (
                            var r = Object.keys(Object(a)), o = 0, l = r.length;
                            o < l;
                            o += 1
                        ) {
                            var d = r[o],
                                h = Object.getOwnPropertyDescriptor(a, d);
                            void 0 !== h &&
                            h.enumerable &&
                            (n.isObject(i[d]) && n.isObject(a[d])
                                ? n.extend(i[d], a[d])
                                : !n.isObject(i[d]) && n.isObject(a[d])
                                    ? ((i[d] = {}), n.extend(i[d], a[d]))
                                    : (i[d] = a[d]));
                        }
                }
                return i;
            },
        },
        o = {
            touch:
                (t.Modernizr && !0 === t.Modernizr.touch) ||
                !!(
                    t.navigator.maxTouchPoints > 0 ||
                    'ontouchstart' in t ||
                    (t.DocumentTouch && e instanceof t.DocumentTouch)
                ),
            pointerEvents:
                !!t.PointerEvent &&
                'maxTouchPoints' in t.navigator &&
                t.navigator.maxTouchPoints > 0,
            observer: 'MutationObserver' in t || 'WebkitMutationObserver' in t,
            passiveListener: (function () {
                var e = !1;
                try {
                    var i = Object.defineProperty({}, 'passive', {
                        get: function () {
                            e = !0;
                        },
                    });
                    t.addEventListener('testPassiveListener', null, i);
                } catch (e) {}
                return e;
            })(),
            gestures: 'ongesturestart' in t,
        },
        l = function (e) {
            void 0 === e && (e = {});
            var t = this;
            (t.params = e),
                (t.eventsListeners = {}),
            t.params &&
            t.params.on &&
            Object.keys(t.params.on).forEach(function (e) {
                t.on(e, t.params.on[e]);
            });
        },
        d = { components: { configurable: !0 } };
    (l.prototype.on = function (e, t, i) {
        var s = this;
        if ('function' != typeof t) return s;
        var a = i ? 'unshift' : 'push';
        return (
            e.split(' ').forEach(function (e) {
                s.eventsListeners[e] || (s.eventsListeners[e] = []),
                    s.eventsListeners[e][a](t);
            }),
                s
        );
    }),
        (l.prototype.once = function (e, t, i) {
            var s = this;
            if ('function' != typeof t) return s;
            function a() {
                for (var i = [], r = arguments.length; r--; ) i[r] = arguments[r];
                t.apply(s, i), s.off(e, a), a.f7proxy && delete a.f7proxy;
            }
            return (a.f7proxy = t), s.on(e, a, i);
        }),
        (l.prototype.off = function (e, t) {
            var i = this;
            return i.eventsListeners
                ? (e.split(' ').forEach(function (e) {
                    void 0 === t
                        ? (i.eventsListeners[e] = [])
                        : i.eventsListeners[e] &&
                        i.eventsListeners[e].length &&
                        i.eventsListeners[e].forEach(function (s, a) {
                            (s === t || (s.f7proxy && s.f7proxy === t)) &&
                            i.eventsListeners[e].splice(a, 1);
                        });
                }),
                    i)
                : i;
        }),
        (l.prototype.emit = function () {
            for (var e = [], t = arguments.length; t--; ) e[t] = arguments[t];
            var i,
                s,
                a,
                r = this;
            if (!r.eventsListeners) return r;
            'string' == typeof e[0] || Array.isArray(e[0])
                ? ((i = e[0]), (s = e.slice(1, e.length)), (a = r))
                : ((i = e[0].events), (s = e[0].data), (a = e[0].context || r));
            var n = Array.isArray(i) ? i : i.split(' ');
            return (
                n.forEach(function (e) {
                    if (r.eventsListeners && r.eventsListeners[e]) {
                        var t = [];
                        r.eventsListeners[e].forEach(function (e) {
                            t.push(e);
                        }),
                            t.forEach(function (e) {
                                e.apply(a, s);
                            });
                    }
                }),
                    r
            );
        }),
        (l.prototype.useModulesParams = function (e) {
            var t = this;
            t.modules &&
            Object.keys(t.modules).forEach(function (i) {
                var s = t.modules[i];
                s.params && n.extend(e, s.params);
            });
        }),
        (l.prototype.useModules = function (e) {
            void 0 === e && (e = {});
            var t = this;
            t.modules &&
            Object.keys(t.modules).forEach(function (i) {
                var s = t.modules[i],
                    a = e[i] || {};
                s.instance &&
                Object.keys(s.instance).forEach(function (e) {
                    var i = s.instance[e];
                    t[e] = 'function' == typeof i ? i.bind(t) : i;
                }),
                s.on &&
                t.on &&
                Object.keys(s.on).forEach(function (e) {
                    t.on(e, s.on[e]);
                }),
                s.create && s.create.bind(t)(a);
            });
        }),
        (d.components.set = function (e) {
            this.use && this.use(e);
        }),
        (l.installModule = function (e) {
            for (var t = [], i = arguments.length - 1; i-- > 0; )
                t[i] = arguments[i + 1];
            var s = this;
            s.prototype.modules || (s.prototype.modules = {});
            var a =
                e.name || Object.keys(s.prototype.modules).length + '_' + n.now();
            return (
                (s.prototype.modules[a] = e),
                e.proto &&
                Object.keys(e.proto).forEach(function (t) {
                    s.prototype[t] = e.proto[t];
                }),
                e.static &&
                Object.keys(e.static).forEach(function (t) {
                    s[t] = e.static[t];
                }),
                e.install && e.install.apply(s, t),
                    s
            );
        }),
        (l.use = function (e) {
            for (var t = [], i = arguments.length - 1; i-- > 0; )
                t[i] = arguments[i + 1];
            var s = this;
            return Array.isArray(e)
                ? (e.forEach(function (e) {
                    return s.installModule(e);
                }),
                    s)
                : s.installModule.apply(s, [e].concat(t));
        }),
        Object.defineProperties(l, d);
    var h = {
        updateSize: function () {
            var e,
                t,
                i = this.$el;
            (e =
                void 0 !== this.params.width
                    ? this.params.width
                    : i[0].clientWidth),
                (t =
                    void 0 !== this.params.height
                        ? this.params.height
                        : i[0].clientHeight),
            (0 === e && this.isHorizontal()) ||
            (0 === t && this.isVertical()) ||
            ((e =
                e -
                parseInt(i.css('padding-left'), 10) -
                parseInt(i.css('padding-right'), 10)),
                (t =
                    t -
                    parseInt(i.css('padding-top'), 10) -
                    parseInt(i.css('padding-bottom'), 10)),
                n.extend(this, {
                    width: e,
                    height: t,
                    size: this.isHorizontal() ? e : t,
                }));
        },
        updateSlides: function () {
            var e = this.params,
                i = this.$wrapperEl,
                s = this.size,
                a = this.rtlTranslate,
                r = this.wrongRTL,
                o = this.virtual && e.virtual.enabled,
                l = o ? this.virtual.slides.length : this.slides.length,
                d = i.children('.' + this.params.slideClass),
                h = o ? this.virtual.slides.length : d.length,
                p = [],
                c = [],
                u = [];
            function v(t) {
                return !e.cssMode || t !== d.length - 1;
            }
            var f = e.slidesOffsetBefore;
            'function' == typeof f && (f = e.slidesOffsetBefore.call(this));
            var m = e.slidesOffsetAfter;
            'function' == typeof m && (m = e.slidesOffsetAfter.call(this));
            var g = this.snapGrid.length,
                b = this.snapGrid.length,
                w = e.spaceBetween,
                y = -f,
                x = 0,
                T = 0;
            if (void 0 !== s) {
                var E, C;
                'string' == typeof w &&
                w.indexOf('%') >= 0 &&
                (w = (parseFloat(w.replace('%', '')) / 100) * s),
                    (this.virtualSize = -w),
                    a
                        ? d.css({ marginLeft: '', marginTop: '' })
                        : d.css({ marginRight: '', marginBottom: '' }),
                e.slidesPerColumn > 1 &&
                ((E =
                    Math.floor(h / e.slidesPerColumn) ===
                    h / this.params.slidesPerColumn
                        ? h
                        : Math.ceil(h / e.slidesPerColumn) * e.slidesPerColumn),
                'auto' !== e.slidesPerView &&
                'row' === e.slidesPerColumnFill &&
                (E = Math.max(E, e.slidesPerView * e.slidesPerColumn)));
                for (
                    var S,
                        M = e.slidesPerColumn,
                        P = E / M,
                        z = Math.floor(h / e.slidesPerColumn),
                        k = 0;
                    k < h;
                    k += 1
                ) {
                    C = 0;
                    var $ = d.eq(k);
                    if (e.slidesPerColumn > 1) {
                        var L = void 0,
                            I = void 0,
                            D = void 0;
                        if ('row' === e.slidesPerColumnFill && e.slidesPerGroup > 1) {
                            var O = Math.floor(
                                k / (e.slidesPerGroup * e.slidesPerColumn)
                                ),
                                A = k - e.slidesPerColumn * e.slidesPerGroup * O,
                                G =
                                    0 === O
                                        ? e.slidesPerGroup
                                        : Math.min(
                                        Math.ceil(
                                            (h - O * M * e.slidesPerGroup) / M
                                        ),
                                        e.slidesPerGroup
                                        );
                            (L =
                                (I =
                                    A -
                                    (D = Math.floor(A / G)) * G +
                                    O * e.slidesPerGroup) +
                                (D * E) / M),
                                $.css({
                                    '-webkit-box-ordinal-group': L,
                                    '-moz-box-ordinal-group': L,
                                    '-ms-flex-order': L,
                                    '-webkit-order': L,
                                    order: L,
                                });
                        } else
                            'column' === e.slidesPerColumnFill
                                ? ((D = k - (I = Math.floor(k / M)) * M),
                                (I > z || (I === z && D === M - 1)) &&
                                (D += 1) >= M &&
                                ((D = 0), (I += 1)))
                                : (I = k - (D = Math.floor(k / P)) * P);
                        $.css(
                            'margin-' + (this.isHorizontal() ? 'top' : 'left'),
                            0 !== D && e.spaceBetween && e.spaceBetween + 'px'
                        );
                    }
                    if ('none' !== $.css('display')) {
                        if ('auto' === e.slidesPerView) {
                            var B = t.getComputedStyle($[0], null),
                                H = $[0].style.transform,
                                N = $[0].style.webkitTransform;
                            if (
                                (H && ($[0].style.transform = 'none'),
                                N && ($[0].style.webkitTransform = 'none'),
                                    e.roundLengths)
                            )
                                C = this.isHorizontal()
                                    ? $.outerWidth(!0)
                                    : $.outerHeight(!0);
                            else if (this.isHorizontal()) {
                                var X = parseFloat(B.getPropertyValue('width')),
                                    V = parseFloat(B.getPropertyValue('padding-left')),
                                    Y = parseFloat(B.getPropertyValue('padding-right')),
                                    F = parseFloat(B.getPropertyValue('margin-left')),
                                    W = parseFloat(B.getPropertyValue('margin-right')),
                                    R = B.getPropertyValue('box-sizing');
                                C =
                                    R && 'border-box' === R
                                        ? X + F + W
                                        : X + V + Y + F + W;
                            } else {
                                var q = parseFloat(B.getPropertyValue('height')),
                                    j = parseFloat(B.getPropertyValue('padding-top')),
                                    K = parseFloat(B.getPropertyValue('padding-bottom')),
                                    U = parseFloat(B.getPropertyValue('margin-top')),
                                    _ = parseFloat(B.getPropertyValue('margin-bottom')),
                                    Z = B.getPropertyValue('box-sizing');
                                C =
                                    Z && 'border-box' === Z
                                        ? q + U + _
                                        : q + j + K + U + _;
                            }
                            H && ($[0].style.transform = H),
                            N && ($[0].style.webkitTransform = N),
                            e.roundLengths && (C = Math.floor(C));
                        } else
                            (C = (s - (e.slidesPerView - 1) * w) / e.slidesPerView),
                            e.roundLengths && (C = Math.floor(C)),
                            d[k] &&
                            (this.isHorizontal()
                                ? (d[k].style.width = C + 'px')
                                : (d[k].style.height = C + 'px'));
                        d[k] && (d[k].swiperSlideSize = C),
                            u.push(C),
                            e.centeredSlides
                                ? ((y = y + C / 2 + x / 2 + w),
                                0 === x && 0 !== k && (y = y - s / 2 - w),
                                0 === k && (y = y - s / 2 - w),
                                Math.abs(y) < 0.001 && (y = 0),
                                e.roundLengths && (y = Math.floor(y)),
                                T % e.slidesPerGroup == 0 && p.push(y),
                                    c.push(y))
                                : (e.roundLengths && (y = Math.floor(y)),
                                T % e.slidesPerGroup == 0 && p.push(y),
                                    c.push(y),
                                    (y = y + C + w)),
                            (this.virtualSize += C + w),
                            (x = C),
                            (T += 1);
                    }
                }
                if (
                    ((this.virtualSize = Math.max(this.virtualSize, s) + m),
                    a &&
                    r &&
                    ('slide' === e.effect || 'coverflow' === e.effect) &&
                    i.css({ width: this.virtualSize + e.spaceBetween + 'px' }),
                    e.setWrapperSize &&
                    (this.isHorizontal()
                        ? i.css({
                            width: this.virtualSize + e.spaceBetween + 'px',
                        })
                        : i.css({
                            height: this.virtualSize + e.spaceBetween + 'px',
                        })),
                    e.slidesPerColumn > 1 &&
                    ((this.virtualSize = (C + e.spaceBetween) * E),
                        (this.virtualSize =
                            Math.ceil(this.virtualSize / e.slidesPerColumn) -
                            e.spaceBetween),
                        this.isHorizontal()
                            ? i.css({
                                width: this.virtualSize + e.spaceBetween + 'px',
                            })
                            : i.css({
                                height: this.virtualSize + e.spaceBetween + 'px',
                            }),
                        e.centeredSlides))
                ) {
                    S = [];
                    for (var Q = 0; Q < p.length; Q += 1) {
                        var J = p[Q];
                        e.roundLengths && (J = Math.floor(J)),
                        p[Q] < this.virtualSize + p[0] && S.push(J);
                    }
                    p = S;
                }
                if (!e.centeredSlides) {
                    S = [];
                    for (var ee = 0; ee < p.length; ee += 1) {
                        var te = p[ee];
                        e.roundLengths && (te = Math.floor(te)),
                        p[ee] <= this.virtualSize - s && S.push(te);
                    }
                    (p = S),
                    Math.floor(this.virtualSize - s) -
                    Math.floor(p[p.length - 1]) >
                    1 && p.push(this.virtualSize - s);
                }
                if (
                    (0 === p.length && (p = [0]),
                    0 !== e.spaceBetween &&
                    (this.isHorizontal()
                        ? a
                            ? d.filter(v).css({ marginLeft: w + 'px' })
                            : d.filter(v).css({ marginRight: w + 'px' })
                        : d.filter(v).css({ marginBottom: w + 'px' })),
                    e.centeredSlides && e.centeredSlidesBounds)
                ) {
                    var ie = 0;
                    u.forEach(function (t) {
                        ie += t + (e.spaceBetween ? e.spaceBetween : 0);
                    });
                    var se = (ie -= e.spaceBetween) - s;
                    p = p.map(function (e) {
                        return e < 0 ? -f : e > se ? se + m : e;
                    });
                }
                if (e.centerInsufficientSlides) {
                    var ae = 0;
                    if (
                        (u.forEach(function (t) {
                            ae += t + (e.spaceBetween ? e.spaceBetween : 0);
                        }),
                        (ae -= e.spaceBetween) < s)
                    ) {
                        var re = (s - ae) / 2;
                        p.forEach(function (e, t) {
                            p[t] = e - re;
                        }),
                            c.forEach(function (e, t) {
                                c[t] = e + re;
                            });
                    }
                }
                n.extend(this, {
                    slides: d,
                    snapGrid: p,
                    slidesGrid: c,
                    slidesSizesGrid: u,
                }),
                h !== l && this.emit('slidesLengthChange'),
                p.length !== g &&
                (this.params.watchOverflow && this.checkOverflow(),
                    this.emit('snapGridLengthChange')),
                c.length !== b && this.emit('slidesGridLengthChange'),
                (e.watchSlidesProgress || e.watchSlidesVisibility) &&
                this.updateSlidesOffset();
            }
        },
        updateAutoHeight: function (e) {
            var t,
                i = [],
                s = 0;
            if (
                ('number' == typeof e
                    ? this.setTransition(e)
                    : !0 === e && this.setTransition(this.params.speed),
                'auto' !== this.params.slidesPerView &&
                this.params.slidesPerView > 1)
            )
                for (t = 0; t < Math.ceil(this.params.slidesPerView); t += 1) {
                    var a = this.activeIndex + t;
                    if (a > this.slides.length) break;
                    i.push(this.slides.eq(a)[0]);
                }
            else i.push(this.slides.eq(this.activeIndex)[0]);
            for (t = 0; t < i.length; t += 1)
                if (void 0 !== i[t]) {
                    var r = i[t].offsetHeight;
                    s = r > s ? r : s;
                }
            s && this.$wrapperEl.css('height', s + 'px');
        },
        updateSlidesOffset: function () {
            for (var e = this.slides, t = 0; t < e.length; t += 1)
                e[t].swiperSlideOffset = this.isHorizontal()
                    ? e[t].offsetLeft
                    : e[t].offsetTop;
        },
        updateSlidesProgress: function (e) {
            void 0 === e && (e = (this && this.translate) || 0);
            var t = this.params,
                i = this.slides,
                a = this.rtlTranslate;
            if (0 !== i.length) {
                void 0 === i[0].swiperSlideOffset && this.updateSlidesOffset();
                var r = -e;
                a && (r = e),
                    i.removeClass(t.slideVisibleClass),
                    (this.visibleSlidesIndexes = []),
                    (this.visibleSlides = []);
                for (var n = 0; n < i.length; n += 1) {
                    var o = i[n],
                        l =
                            (r +
                                (t.centeredSlides ? this.minTranslate() : 0) -
                                o.swiperSlideOffset) /
                            (o.swiperSlideSize + t.spaceBetween);
                    if (t.watchSlidesVisibility) {
                        var d = -(r - o.swiperSlideOffset),
                            h = d + this.slidesSizesGrid[n];
                        ((d >= 0 && d < this.size - 1) ||
                            (h > 1 && h <= this.size) ||
                            (d <= 0 && h >= this.size)) &&
                        (this.visibleSlides.push(o),
                            this.visibleSlidesIndexes.push(n),
                            i.eq(n).addClass(t.slideVisibleClass));
                    }
                    o.progress = a ? -l : l;
                }
                this.visibleSlides = s(this.visibleSlides);
            }
        },
        updateProgress: function (e) {
            if (void 0 === e) {
                var t = this.rtlTranslate ? -1 : 1;
                e = (this && this.translate && this.translate * t) || 0;
            }
            var i = this.params,
                s = this.maxTranslate() - this.minTranslate(),
                a = this.progress,
                r = this.isBeginning,
                o = this.isEnd,
                l = r,
                d = o;
            0 === s
                ? ((a = 0), (r = !0), (o = !0))
                : ((r = (a = (e - this.minTranslate()) / s) <= 0), (o = a >= 1)),
                n.extend(this, { progress: a, isBeginning: r, isEnd: o }),
            (i.watchSlidesProgress || i.watchSlidesVisibility) &&
            this.updateSlidesProgress(e),
            r && !l && this.emit('reachBeginning toEdge'),
            o && !d && this.emit('reachEnd toEdge'),
            ((l && !r) || (d && !o)) && this.emit('fromEdge'),
                this.emit('progress', a);
        },
        updateSlidesClasses: function () {
            var e,
                t = this.slides,
                i = this.params,
                s = this.$wrapperEl,
                a = this.activeIndex,
                r = this.realIndex,
                n = this.virtual && i.virtual.enabled;
            t.removeClass(
                i.slideActiveClass +
                ' ' +
                i.slideNextClass +
                ' ' +
                i.slidePrevClass +
                ' ' +
                i.slideDuplicateActiveClass +
                ' ' +
                i.slideDuplicateNextClass +
                ' ' +
                i.slideDuplicatePrevClass
            ),
                (e = n
                    ? this.$wrapperEl.find(
                        '.' +
                        i.slideClass +
                        '[data-swiper-slide-index="' +
                        a +
                        '"]'
                    )
                    : t.eq(a)).addClass(i.slideActiveClass),
            i.loop &&
            (e.hasClass(i.slideDuplicateClass)
                ? s
                    .children(
                        '.' +
                        i.slideClass +
                        ':not(.' +
                        i.slideDuplicateClass +
                        ')[data-swiper-slide-index="' +
                        r +
                        '"]'
                    )
                    .addClass(i.slideDuplicateActiveClass)
                : s
                    .children(
                        '.' +
                        i.slideClass +
                        '.' +
                        i.slideDuplicateClass +
                        '[data-swiper-slide-index="' +
                        r +
                        '"]'
                    )
                    .addClass(i.slideDuplicateActiveClass));
            var o = e
                .nextAll('.' + i.slideClass)
                .eq(0)
                .addClass(i.slideNextClass);
            i.loop && 0 === o.length && (o = t.eq(0)).addClass(i.slideNextClass);
            var l = e
                .prevAll('.' + i.slideClass)
                .eq(0)
                .addClass(i.slidePrevClass);
            i.loop && 0 === l.length && (l = t.eq(-1)).addClass(i.slidePrevClass),
            i.loop &&
            (o.hasClass(i.slideDuplicateClass)
                ? s
                    .children(
                        '.' +
                        i.slideClass +
                        ':not(.' +
                        i.slideDuplicateClass +
                        ')[data-swiper-slide-index="' +
                        o.attr('data-swiper-slide-index') +
                        '"]'
                    )
                    .addClass(i.slideDuplicateNextClass)
                : s
                    .children(
                        '.' +
                        i.slideClass +
                        '.' +
                        i.slideDuplicateClass +
                        '[data-swiper-slide-index="' +
                        o.attr('data-swiper-slide-index') +
                        '"]'
                    )
                    .addClass(i.slideDuplicateNextClass),
                l.hasClass(i.slideDuplicateClass)
                    ? s
                        .children(
                            '.' +
                            i.slideClass +
                            ':not(.' +
                            i.slideDuplicateClass +
                            ')[data-swiper-slide-index="' +
                            l.attr('data-swiper-slide-index') +
                            '"]'
                        )
                        .addClass(i.slideDuplicatePrevClass)
                    : s
                        .children(
                            '.' +
                            i.slideClass +
                            '.' +
                            i.slideDuplicateClass +
                            '[data-swiper-slide-index="' +
                            l.attr('data-swiper-slide-index') +
                            '"]'
                        )
                        .addClass(i.slideDuplicatePrevClass));
        },
        updateActiveIndex: function (e) {
            var t,
                i = this.rtlTranslate ? this.translate : -this.translate,
                s = this.slidesGrid,
                a = this.snapGrid,
                r = this.params,
                o = this.activeIndex,
                l = this.realIndex,
                d = this.snapIndex,
                h = e;
            if (void 0 === h) {
                for (var p = 0; p < s.length; p += 1)
                    void 0 !== s[p + 1]
                        ? i >= s[p] && i < s[p + 1] - (s[p + 1] - s[p]) / 2
                        ? (h = p)
                        : i >= s[p] && i < s[p + 1] && (h = p + 1)
                        : i >= s[p] && (h = p);
                r.normalizeSlideIndex && (h < 0 || void 0 === h) && (h = 0);
            }
            if (
                ((t =
                    a.indexOf(i) >= 0
                        ? a.indexOf(i)
                        : Math.floor(h / r.slidesPerGroup)) >= a.length &&
                (t = a.length - 1),
                h !== o)
            ) {
                var c = parseInt(
                    this.slides.eq(h).attr('data-swiper-slide-index') || h,
                    10
                );
                n.extend(this, {
                    snapIndex: t,
                    realIndex: c,
                    previousIndex: o,
                    activeIndex: h,
                }),
                    this.emit('activeIndexChange'),
                    this.emit('snapIndexChange'),
                l !== c && this.emit('realIndexChange'),
                (this.initialized || this.runCallbacksOnInit) &&
                this.emit('slideChange');
            } else t !== d && ((this.snapIndex = t), this.emit('snapIndexChange'));
        },
        updateClickedSlide: function (e) {
            var t = this.params,
                i = s(e.target).closest('.' + t.slideClass)[0],
                a = !1;
            if (i)
                for (var r = 0; r < this.slides.length; r += 1)
                    this.slides[r] === i && (a = !0);
            if (!i || !a)
                return (
                    (this.clickedSlide = void 0), void (this.clickedIndex = void 0)
                );
            (this.clickedSlide = i),
                this.virtual && this.params.virtual.enabled
                    ? (this.clickedIndex = parseInt(
                    s(i).attr('data-swiper-slide-index'),
                    10
                    ))
                    : (this.clickedIndex = s(i).index()),
            t.slideToClickedSlide &&
            void 0 !== this.clickedIndex &&
            this.clickedIndex !== this.activeIndex &&
            this.slideToClickedSlide();
        },
    };
    var p = {
        getTranslate: function (e) {
            void 0 === e && (e = this.isHorizontal() ? 'x' : 'y');
            var t = this.params,
                i = this.rtlTranslate,
                s = this.translate,
                a = this.$wrapperEl;
            if (t.virtualTranslate) return i ? -s : s;
            if (t.cssMode) return s;
            var r = n.getTranslate(a[0], e);
            return i && (r = -r), r || 0;
        },
        setTranslate: function (e, t) {
            var i = this.rtlTranslate,
                s = this.params,
                a = this.$wrapperEl,
                r = this.wrapperEl,
                n = this.progress,
                o = 0,
                l = 0;
            this.isHorizontal() ? (o = i ? -e : e) : (l = e),
            s.roundLengths && ((o = Math.floor(o)), (l = Math.floor(l))),
                s.cssMode
                    ? (r[this.isHorizontal() ? 'scrollLeft' : 'scrollTop'] =
                        this.isHorizontal() ? -o : -l)
                    : s.virtualTranslate ||
                    a.transform('translate3d(' + o + 'px, ' + l + 'px, 0px)'),
                (this.previousTranslate = this.translate),
                (this.translate = this.isHorizontal() ? o : l);
            var d = this.maxTranslate() - this.minTranslate();
            (0 === d ? 0 : (e - this.minTranslate()) / d) !== n &&
            this.updateProgress(e),
                this.emit('setTranslate', this.translate, t);
        },
        minTranslate: function () {
            return -this.snapGrid[0];
        },
        maxTranslate: function () {
            return -this.snapGrid[this.snapGrid.length - 1];
        },
        translateTo: function (e, t, i, s, a) {
            var r;
            void 0 === e && (e = 0),
            void 0 === t && (t = this.params.speed),
            void 0 === i && (i = !0),
            void 0 === s && (s = !0);
            var n = this,
                o = n.params,
                l = n.wrapperEl;
            if (n.animating && o.preventInteractionOnTransition) return !1;
            var d,
                h = n.minTranslate(),
                p = n.maxTranslate();
            if (
                ((d = s && e > h ? h : s && e < p ? p : e),
                    n.updateProgress(d),
                    o.cssMode)
            ) {
                var c = n.isHorizontal();
                return (
                    0 === t
                        ? (l[c ? 'scrollLeft' : 'scrollTop'] = -d)
                        : l.scrollTo
                        ? l.scrollTo(
                            (((r = {})[c ? 'left' : 'top'] = -d),
                                (r.behavior = 'smooth'),
                                r)
                        )
                        : (l[c ? 'scrollLeft' : 'scrollTop'] = -d),
                        !0
                );
            }
            return (
                0 === t
                    ? (n.setTransition(0),
                        n.setTranslate(d),
                    i &&
                    (n.emit('beforeTransitionStart', t, a),
                        n.emit('transitionEnd')))
                    : (n.setTransition(t),
                        n.setTranslate(d),
                    i &&
                    (n.emit('beforeTransitionStart', t, a),
                        n.emit('transitionStart')),
                    n.animating ||
                    ((n.animating = !0),
                    n.onTranslateToWrapperTransitionEnd ||
                    (n.onTranslateToWrapperTransitionEnd = function (e) {
                        n &&
                        !n.destroyed &&
                        e.target === this &&
                        (n.$wrapperEl[0].removeEventListener(
                            'transitionend',
                            n.onTranslateToWrapperTransitionEnd
                        ),
                            n.$wrapperEl[0].removeEventListener(
                                'webkitTransitionEnd',
                                n.onTranslateToWrapperTransitionEnd
                            ),
                            (n.onTranslateToWrapperTransitionEnd = null),
                            delete n.onTranslateToWrapperTransitionEnd,
                        i && n.emit('transitionEnd'));
                    }),
                        n.$wrapperEl[0].addEventListener(
                            'transitionend',
                            n.onTranslateToWrapperTransitionEnd
                        ),
                        n.$wrapperEl[0].addEventListener(
                            'webkitTransitionEnd',
                            n.onTranslateToWrapperTransitionEnd
                        ))),
                    !0
            );
        },
    };
    var c = {
        setTransition: function (e, t) {
            this.params.cssMode || this.$wrapperEl.transition(e),
                this.emit('setTransition', e, t);
        },
        transitionStart: function (e, t) {
            void 0 === e && (e = !0);
            var i = this.activeIndex,
                s = this.params,
                a = this.previousIndex;
            if (!s.cssMode) {
                s.autoHeight && this.updateAutoHeight();
                var r = t;
                if (
                    (r || (r = i > a ? 'next' : i < a ? 'prev' : 'reset'),
                        this.emit('transitionStart'),
                    e && i !== a)
                ) {
                    if ('reset' === r)
                        return void this.emit('slideResetTransitionStart');
                    this.emit('slideChangeTransitionStart'),
                        'next' === r
                            ? this.emit('slideNextTransitionStart')
                            : this.emit('slidePrevTransitionStart');
                }
            }
        },
        transitionEnd: function (e, t) {
            void 0 === e && (e = !0);
            var i = this.activeIndex,
                s = this.previousIndex,
                a = this.params;
            if (((this.animating = !1), !a.cssMode)) {
                this.setTransition(0);
                var r = t;
                if (
                    (r || (r = i > s ? 'next' : i < s ? 'prev' : 'reset'),
                        this.emit('transitionEnd'),
                    e && i !== s)
                ) {
                    if ('reset' === r)
                        return void this.emit('slideResetTransitionEnd');
                    this.emit('slideChangeTransitionEnd'),
                        'next' === r
                            ? this.emit('slideNextTransitionEnd')
                            : this.emit('slidePrevTransitionEnd');
                }
            }
        },
    };
    var u = {
        slideTo: function (e, t, i, s) {
            var a;
            void 0 === e && (e = 0),
            void 0 === t && (t = this.params.speed),
            void 0 === i && (i = !0);
            var r = this,
                n = e;
            n < 0 && (n = 0);
            var o = r.params,
                l = r.snapGrid,
                d = r.slidesGrid,
                h = r.previousIndex,
                p = r.activeIndex,
                c = r.rtlTranslate,
                u = r.wrapperEl;
            if (r.animating && o.preventInteractionOnTransition) return !1;
            var v = Math.floor(n / o.slidesPerGroup);
            v >= l.length && (v = l.length - 1),
            (p || o.initialSlide || 0) === (h || 0) &&
            i &&
            r.emit('beforeSlideChangeStart');
            var f,
                m = -l[v];
            if ((r.updateProgress(m), o.normalizeSlideIndex))
                for (var g = 0; g < d.length; g += 1)
                    -Math.floor(100 * m) >= Math.floor(100 * d[g]) && (n = g);
            if (r.initialized && n !== p) {
                if (!r.allowSlideNext && m < r.translate && m < r.minTranslate())
                    return !1;
                if (
                    !r.allowSlidePrev &&
                    m > r.translate &&
                    m > r.maxTranslate() &&
                    (p || 0) !== n
                )
                    return !1;
            }
            if (
                ((f = n > p ? 'next' : n < p ? 'prev' : 'reset'),
                (c && -m === r.translate) || (!c && m === r.translate))
            )
                return (
                    r.updateActiveIndex(n),
                    o.autoHeight && r.updateAutoHeight(),
                        r.updateSlidesClasses(),
                    'slide' !== o.effect && r.setTranslate(m),
                    'reset' !== f &&
                    (r.transitionStart(i, f), r.transitionEnd(i, f)),
                        !1
                );
            if (o.cssMode) {
                var b = r.isHorizontal();
                return (
                    0 === t
                        ? (u[b ? 'scrollLeft' : 'scrollTop'] = -m)
                        : u.scrollTo
                        ? u.scrollTo(
                            (((a = {})[b ? 'left' : 'top'] = -m),
                                (a.behavior = 'smooth'),
                                a)
                        )
                        : (u[b ? 'scrollLeft' : 'scrollTop'] = -m),
                        !0
                );
            }
            return (
                0 === t
                    ? (r.setTransition(0),
                        r.setTranslate(m),
                        r.updateActiveIndex(n),
                        r.updateSlidesClasses(),
                        r.emit('beforeTransitionStart', t, s),
                        r.transitionStart(i, f),
                        r.transitionEnd(i, f))
                    : (r.setTransition(t),
                        r.setTranslate(m),
                        r.updateActiveIndex(n),
                        r.updateSlidesClasses(),
                        r.emit('beforeTransitionStart', t, s),
                        r.transitionStart(i, f),
                    r.animating ||
                    ((r.animating = !0),
                    r.onSlideToWrapperTransitionEnd ||
                    (r.onSlideToWrapperTransitionEnd = function (e) {
                        r &&
                        !r.destroyed &&
                        e.target === this &&
                        (r.$wrapperEl[0].removeEventListener(
                            'transitionend',
                            r.onSlideToWrapperTransitionEnd
                        ),
                            r.$wrapperEl[0].removeEventListener(
                                'webkitTransitionEnd',
                                r.onSlideToWrapperTransitionEnd
                            ),
                            (r.onSlideToWrapperTransitionEnd = null),
                            delete r.onSlideToWrapperTransitionEnd,
                            r.transitionEnd(i, f));
                    }),
                        r.$wrapperEl[0].addEventListener(
                            'transitionend',
                            r.onSlideToWrapperTransitionEnd
                        ),
                        r.$wrapperEl[0].addEventListener(
                            'webkitTransitionEnd',
                            r.onSlideToWrapperTransitionEnd
                        ))),
                    !0
            );
        },
        slideToLoop: function (e, t, i, s) {
            void 0 === e && (e = 0),
            void 0 === t && (t = this.params.speed),
            void 0 === i && (i = !0);
            var a = e;
            return (
                this.params.loop && (a += this.loopedSlides),
                    this.slideTo(a, t, i, s)
            );
        },
        slideNext: function (e, t, i) {
            void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
            var s = this.params,
                a = this.animating;
            return s.loop
                ? !a &&
                (this.loopFix(),
                    (this._clientLeft = this.$wrapperEl[0].clientLeft),
                    this.slideTo(this.activeIndex + s.slidesPerGroup, e, t, i))
                : this.slideTo(this.activeIndex + s.slidesPerGroup, e, t, i);
        },
        slidePrev: function (e, t, i) {
            void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
            var s = this.params,
                a = this.animating,
                r = this.snapGrid,
                n = this.slidesGrid,
                o = this.rtlTranslate;
            if (s.loop) {
                if (a) return !1;
                this.loopFix(), (this._clientLeft = this.$wrapperEl[0].clientLeft);
            }
            function l(e) {
                return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e);
            }
            var d,
                h = l(o ? this.translate : -this.translate),
                p = r.map(function (e) {
                    return l(e);
                }),
                c =
                    (n.map(function (e) {
                        return l(e);
                    }),
                        r[p.indexOf(h)],
                        r[p.indexOf(h) - 1]);
            return (
                void 0 === c &&
                s.cssMode &&
                r.forEach(function (e) {
                    !c && h >= e && (c = e);
                }),
                void 0 !== c &&
                (d = n.indexOf(c)) < 0 &&
                (d = this.activeIndex - 1),
                    this.slideTo(d, e, t, i)
            );
        },
        slideReset: function (e, t, i) {
            return (
                void 0 === e && (e = this.params.speed),
                void 0 === t && (t = !0),
                    this.slideTo(this.activeIndex, e, t, i)
            );
        },
        slideToClosest: function (e, t, i, s) {
            void 0 === e && (e = this.params.speed),
            void 0 === t && (t = !0),
            void 0 === s && (s = 0.5);
            var a = this.activeIndex,
                r = Math.floor(a / this.params.slidesPerGroup),
                n = this.rtlTranslate ? this.translate : -this.translate;
            if (n >= this.snapGrid[r]) {
                var o = this.snapGrid[r];
                n - o > (this.snapGrid[r + 1] - o) * s &&
                (a += this.params.slidesPerGroup);
            } else {
                var l = this.snapGrid[r - 1];
                n - l <= (this.snapGrid[r] - l) * s &&
                (a -= this.params.slidesPerGroup);
            }
            return (
                (a = Math.max(a, 0)),
                    (a = Math.min(a, this.snapGrid.length - 1)),
                    this.slideTo(a, e, t, i)
            );
        },
        slideToClickedSlide: function () {
            var e,
                t = this,
                i = t.params,
                a = t.$wrapperEl,
                r =
                    'auto' === i.slidesPerView
                        ? t.slidesPerViewDynamic()
                        : i.slidesPerView,
                o = t.clickedIndex;
            if (i.loop) {
                if (t.animating) return;
                (e = parseInt(
                    s(t.clickedSlide).attr('data-swiper-slide-index'),
                    10
                )),
                    i.centeredSlides
                        ? o < t.loopedSlides - r / 2 ||
                        o > t.slides.length - t.loopedSlides + r / 2
                        ? (t.loopFix(),
                            (o = a
                                .children(
                                    '.' +
                                    i.slideClass +
                                    '[data-swiper-slide-index="' +
                                    e +
                                    '"]:not(.' +
                                    i.slideDuplicateClass +
                                    ')'
                                )
                                .eq(0)
                                .index()),
                            n.nextTick(function () {
                                t.slideTo(o);
                            }))
                        : t.slideTo(o)
                        : o > t.slides.length - r
                        ? (t.loopFix(),
                            (o = a
                                .children(
                                    '.' +
                                    i.slideClass +
                                    '[data-swiper-slide-index="' +
                                    e +
                                    '"]:not(.' +
                                    i.slideDuplicateClass +
                                    ')'
                                )
                                .eq(0)
                                .index()),
                            n.nextTick(function () {
                                t.slideTo(o);
                            }))
                        : t.slideTo(o);
            } else t.slideTo(o);
        },
    };
    var v = {
        loopCreate: function () {
            var t = this,
                i = t.params,
                a = t.$wrapperEl;
            a.children('.' + i.slideClass + '.' + i.slideDuplicateClass).remove();
            var r = a.children('.' + i.slideClass);
            if (i.loopFillGroupWithBlank) {
                var n = i.slidesPerGroup - (r.length % i.slidesPerGroup);
                if (n !== i.slidesPerGroup) {
                    for (var o = 0; o < n; o += 1) {
                        var l = s(e.createElement('div')).addClass(
                            i.slideClass + ' ' + i.slideBlankClass
                        );
                        a.append(l);
                    }
                    r = a.children('.' + i.slideClass);
                }
            }
            'auto' !== i.slidesPerView ||
            i.loopedSlides ||
            (i.loopedSlides = r.length),
                (t.loopedSlides = Math.ceil(
                    parseFloat(i.loopedSlides || i.slidesPerView, 10)
                )),
                (t.loopedSlides += i.loopAdditionalSlides),
            t.loopedSlides > r.length && (t.loopedSlides = r.length);
            var d = [],
                h = [];
            r.each(function (e, i) {
                var a = s(i);
                e < t.loopedSlides && h.push(i),
                e < r.length && e >= r.length - t.loopedSlides && d.push(i),
                    a.attr('data-swiper-slide-index', e);
            });
            for (var p = 0; p < h.length; p += 1)
                a.append(s(h[p].cloneNode(!0)).addClass(i.slideDuplicateClass));
            for (var c = d.length - 1; c >= 0; c -= 1)
                a.prepend(s(d[c].cloneNode(!0)).addClass(i.slideDuplicateClass));
        },
        loopFix: function () {
            var e,
                t = this.activeIndex,
                i = this.slides,
                s = this.loopedSlides,
                a = this.allowSlidePrev,
                r = this.allowSlideNext,
                n = this.snapGrid,
                o = this.rtlTranslate;
            (this.allowSlidePrev = !0), (this.allowSlideNext = !0);
            var l = -n[t] - this.getTranslate();
            if (t < s)
                (e = i.length - 3 * s + t),
                    (e += s),
                this.slideTo(e, 0, !1, !0) &&
                0 !== l &&
                this.setTranslate((o ? -this.translate : this.translate) - l);
            else if (t >= i.length - s) {
                (e = -i.length + t + s),
                    (e += s),
                this.slideTo(e, 0, !1, !0) &&
                0 !== l &&
                this.setTranslate((o ? -this.translate : this.translate) - l);
            }
            (this.allowSlidePrev = a), (this.allowSlideNext = r);
        },
        loopDestroy: function () {
            var e = this.$wrapperEl,
                t = this.params,
                i = this.slides;
            e
                .children(
                    '.' +
                    t.slideClass +
                    '.' +
                    t.slideDuplicateClass +
                    ',.' +
                    t.slideClass +
                    '.' +
                    t.slideBlankClass
                )
                .remove(),
                i.removeAttr('data-swiper-slide-index');
        },
    };
    var f = {
        setGrabCursor: function (e) {
            if (
                !(
                    o.touch ||
                    !this.params.simulateTouch ||
                    (this.params.watchOverflow && this.isLocked) ||
                    this.params.cssMode
                )
            ) {
                var t = this.el;
                (t.style.cursor = 'move'),
                    (t.style.cursor = e ? '-webkit-grabbing' : '-webkit-grab'),
                    (t.style.cursor = e ? '-moz-grabbin' : '-moz-grab'),
                    (t.style.cursor = e ? 'grabbing' : 'grab');
            }
        },
        unsetGrabCursor: function () {
            o.touch ||
            (this.params.watchOverflow && this.isLocked) ||
            this.params.cssMode ||
            (this.el.style.cursor = '');
        },
    };
    var m,
        g,
        b,
        w,
        y,
        x,
        T,
        E,
        C,
        S,
        M,
        P,
        z,
        k,
        $,
        L = {
            appendSlide: function (e) {
                var t = this.$wrapperEl,
                    i = this.params;
                if (
                    (i.loop && this.loopDestroy(),
                    'object' == typeof e && 'length' in e)
                )
                    for (var s = 0; s < e.length; s += 1) e[s] && t.append(e[s]);
                else t.append(e);
                i.loop && this.loopCreate(),
                (i.observer && o.observer) || this.update();
            },
            prependSlide: function (e) {
                var t = this.params,
                    i = this.$wrapperEl,
                    s = this.activeIndex;
                t.loop && this.loopDestroy();
                var a = s + 1;
                if ('object' == typeof e && 'length' in e) {
                    for (var r = 0; r < e.length; r += 1) e[r] && i.prepend(e[r]);
                    a = s + e.length;
                } else i.prepend(e);
                t.loop && this.loopCreate(),
                (t.observer && o.observer) || this.update(),
                    this.slideTo(a, 0, !1);
            },
            addSlide: function (e, t) {
                var i = this.$wrapperEl,
                    s = this.params,
                    a = this.activeIndex;
                s.loop &&
                ((a -= this.loopedSlides),
                    this.loopDestroy(),
                    (this.slides = i.children('.' + s.slideClass)));
                var r = this.slides.length;
                if (e <= 0) this.prependSlide(t);
                else if (e >= r) this.appendSlide(t);
                else {
                    for (
                        var n = a > e ? a + 1 : a, l = [], d = r - 1;
                        d >= e;
                        d -= 1
                    ) {
                        var h = this.slides.eq(d);
                        h.remove(), l.unshift(h);
                    }
                    if ('object' == typeof t && 'length' in t) {
                        for (var p = 0; p < t.length; p += 1) t[p] && i.append(t[p]);
                        n = a > e ? a + t.length : a;
                    } else i.append(t);
                    for (var c = 0; c < l.length; c += 1) i.append(l[c]);
                    s.loop && this.loopCreate(),
                    (s.observer && o.observer) || this.update(),
                        s.loop
                            ? this.slideTo(n + this.loopedSlides, 0, !1)
                            : this.slideTo(n, 0, !1);
                }
            },
            removeSlide: function (e) {
                var t = this.params,
                    i = this.$wrapperEl,
                    s = this.activeIndex;
                t.loop &&
                ((s -= this.loopedSlides),
                    this.loopDestroy(),
                    (this.slides = i.children('.' + t.slideClass)));
                var a,
                    r = s;
                if ('object' == typeof e && 'length' in e) {
                    for (var n = 0; n < e.length; n += 1)
                        (a = e[n]),
                        this.slides[a] && this.slides.eq(a).remove(),
                        a < r && (r -= 1);
                    r = Math.max(r, 0);
                } else
                    (a = e),
                    this.slides[a] && this.slides.eq(a).remove(),
                    a < r && (r -= 1),
                        (r = Math.max(r, 0));
                t.loop && this.loopCreate(),
                (t.observer && o.observer) || this.update(),
                    t.loop
                        ? this.slideTo(r + this.loopedSlides, 0, !1)
                        : this.slideTo(r, 0, !1);
            },
            removeAllSlides: function () {
                for (var e = [], t = 0; t < this.slides.length; t += 1) e.push(t);
                this.removeSlide(e);
            },
        },
        I =
            ((m = t.navigator.platform),
                (g = t.navigator.userAgent),
                (b = {
                    ios: !1,
                    android: !1,
                    androidChrome: !1,
                    desktop: !1,
                    iphone: !1,
                    ipod: !1,
                    ipad: !1,
                    edge: !1,
                    ie: !1,
                    firefox: !1,
                    macos: !1,
                    windows: !1,
                    cordova: !(!t.cordova && !t.phonegap),
                    phonegap: !(!t.cordova && !t.phonegap),
                    electron: !1,
                }),
                (w = t.screen.width),
                (y = t.screen.height),
                (x = g.match(/(Android);?[\s\/]+([\d.]+)?/)),
                (T = g.match(/(iPad).*OS\s([\d_]+)/)),
                (E = g.match(/(iPod)(.*OS\s([\d_]+))?/)),
                (C = !T && g.match(/(iPhone\sOS|iOS)\s([\d_]+)/)),
                (S = g.indexOf('MSIE ') >= 0 || g.indexOf('Trident/index.html') >= 0),
                (M = g.indexOf('Edge/index.html') >= 0),
                (P =
                    g.indexOf('Gecko/index.html') >= 0 &&
                    g.indexOf('Firefox/index.html') >= 0),
                (z = 'Win32' === m),
                (k = g.toLowerCase().indexOf('electron') >= 0),
                ($ = 'MacIntel' === m),
            !T &&
            $ &&
            o.touch &&
            ((1024 === w && 1366 === y) ||
                (834 === w && 1194 === y) ||
                (834 === w && 1112 === y) ||
                (768 === w && 1024 === y)) &&
            ((T = g.match(/(Version)\/([\d.]+)/)), ($ = !1)),
                (b.ie = S),
                (b.edge = M),
                (b.firefox = P),
            x &&
            !z &&
            ((b.os = 'android'),
                (b.osVersion = x[2]),
                (b.android = !0),
                (b.androidChrome = g.toLowerCase().indexOf('chrome') >= 0)),
            (T || C || E) && ((b.os = 'ios'), (b.ios = !0)),
            C && !E && ((b.osVersion = C[2].replace(/_/g, '.')), (b.iphone = !0)),
            T && ((b.osVersion = T[2].replace(/_/g, '.')), (b.ipad = !0)),
            E &&
            ((b.osVersion = E[3] ? E[3].replace(/_/g, '.') : null),
                (b.ipod = !0)),
            b.ios &&
            b.osVersion &&
            g.indexOf('Version/index.html') >= 0 &&
            '10' === b.osVersion.split('.')[0] &&
            (b.osVersion = g
                .toLowerCase()
                .split('version/index-2.html')[1]
                .split(' ')[0]),
                (b.webView =
                    !(
                        !(C || T || E) ||
                        (!g.match(/.*AppleWebKit(?!.*Safari)/i) &&
                            !t.navigator.standalone)
                    ) ||
                    (t.matchMedia &&
                        t.matchMedia('(display-mode: standalone)').matches)),
                (b.webview = b.webView),
                (b.standalone = b.webView),
                (b.desktop = !(b.ios || b.android) || k),
            b.desktop &&
            ((b.electron = k),
                (b.macos = $),
                (b.windows = z),
            b.macos && (b.os = 'macos'),
            b.windows && (b.os = 'windows')),
                (b.pixelRatio = t.devicePixelRatio || 1),
                b);
    function D(i) {
        var a = this.touchEventsData,
            r = this.params,
            o = this.touches;
        if (!this.animating || !r.preventInteractionOnTransition) {
            var l = i;
            l.originalEvent && (l = l.originalEvent);
            var d = s(l.target);
            if (
                ('wrapper' !== r.touchEventsTarget ||
                    d.closest(this.wrapperEl).length) &&
                ((a.isTouchEvent = 'touchstart' === l.type),
                (a.isTouchEvent || !('which' in l) || 3 !== l.which) &&
                !(
                    (!a.isTouchEvent && 'button' in l && l.button > 0) ||
                    (a.isTouched && a.isMoved)
                ))
            )
                if (
                    r.noSwiping &&
                    d.closest(
                        r.noSwipingSelector
                            ? r.noSwipingSelector
                            : '.' + r.noSwipingClass
                    )[0]
                )
                    this.allowClick = !0;
                else if (!r.swipeHandler || d.closest(r.swipeHandler)[0]) {
                    (o.currentX =
                        'touchstart' === l.type ? l.targetTouches[0].pageX : l.pageX),
                        (o.currentY =
                            'touchstart' === l.type
                                ? l.targetTouches[0].pageY
                                : l.pageY);
                    var h = o.currentX,
                        p = o.currentY,
                        c = r.edgeSwipeDetection || r.iOSEdgeSwipeDetection,
                        u = r.edgeSwipeThreshold || r.iOSEdgeSwipeThreshold;
                    if (!c || !(h <= u || h >= t.screen.width - u)) {
                        if (
                            (n.extend(a, {
                                isTouched: !0,
                                isMoved: !1,
                                allowTouchCallbacks: !0,
                                isScrolling: void 0,
                                startMoving: void 0,
                            }),
                                (o.startX = h),
                                (o.startY = p),
                                (a.touchStartTime = n.now()),
                                (this.allowClick = !0),
                                this.updateSize(),
                                (this.swipeDirection = void 0),
                            r.threshold > 0 && (a.allowThresholdMove = !1),
                            'touchstart' !== l.type)
                        ) {
                            var v = !0;
                            d.is(a.formElements) && (v = !1),
                            e.activeElement &&
                            s(e.activeElement).is(a.formElements) &&
                            e.activeElement !== d[0] &&
                            e.activeElement.blur();
                            var f =
                                v && this.allowTouchMove && r.touchStartPreventDefault;
                            (r.touchStartForcePreventDefault || f) &&
                            l.preventDefault();
                        }
                        this.emit('touchStart', l);
                    }
                }
        }
    }
    function O(t) {
        var i = this.touchEventsData,
            a = this.params,
            r = this.touches,
            o = this.rtlTranslate,
            l = t;
        if ((l.originalEvent && (l = l.originalEvent), i.isTouched)) {
            if (!i.isTouchEvent || 'mousemove' !== l.type) {
                var d =
                    'touchmove' === l.type &&
                    l.targetTouches &&
                    (l.targetTouches[0] || l.changedTouches[0]),
                    h = 'touchmove' === l.type ? d.pageX : l.pageX,
                    p = 'touchmove' === l.type ? d.pageY : l.pageY;
                if (l.preventedByNestedSwiper)
                    return (r.startX = h), void (r.startY = p);
                if (!this.allowTouchMove)
                    return (
                        (this.allowClick = !1),
                            void (
                                i.isTouched &&
                                (n.extend(r, {
                                    startX: h,
                                    startY: p,
                                    currentX: h,
                                    currentY: p,
                                }),
                                    (i.touchStartTime = n.now()))
                            )
                    );
                if (i.isTouchEvent && a.touchReleaseOnEdges && !a.loop)
                    if (this.isVertical()) {
                        if (
                            (p < r.startY && this.translate <= this.maxTranslate()) ||
                            (p > r.startY && this.translate >= this.minTranslate())
                        )
                            return (i.isTouched = !1), void (i.isMoved = !1);
                    } else if (
                        (h < r.startX && this.translate <= this.maxTranslate()) ||
                        (h > r.startX && this.translate >= this.minTranslate())
                    )
                        return;
                if (
                    i.isTouchEvent &&
                    e.activeElement &&
                    l.target === e.activeElement &&
                    s(l.target).is(i.formElements)
                )
                    return (i.isMoved = !0), void (this.allowClick = !1);
                if (
                    (i.allowTouchCallbacks && this.emit('touchMove', l),
                        !(l.targetTouches && l.targetTouches.length > 1))
                ) {
                    (r.currentX = h), (r.currentY = p);
                    var c = r.currentX - r.startX,
                        u = r.currentY - r.startY;
                    if (
                        !(
                            this.params.threshold &&
                            Math.sqrt(Math.pow(c, 2) + Math.pow(u, 2)) <
                            this.params.threshold
                        )
                    ) {
                        var v;
                        if (void 0 === i.isScrolling)
                            (this.isHorizontal() && r.currentY === r.startY) ||
                            (this.isVertical() && r.currentX === r.startX)
                                ? (i.isScrolling = !1)
                                : c * c + u * u >= 25 &&
                                ((v =
                                    (180 * Math.atan2(Math.abs(u), Math.abs(c))) /
                                    Math.PI),
                                    (i.isScrolling = this.isHorizontal()
                                        ? v > a.touchAngle
                                        : 90 - v > a.touchAngle));
                        if (
                            (i.isScrolling && this.emit('touchMoveOpposite', l),
                            void 0 === i.startMoving &&
                            ((r.currentX === r.startX && r.currentY === r.startY) ||
                                (i.startMoving = !0)),
                                i.isScrolling)
                        )
                            i.isTouched = !1;
                        else if (i.startMoving) {
                            (this.allowClick = !1),
                            a.cssMode || l.preventDefault(),
                            a.touchMoveStopPropagation &&
                            !a.nested &&
                            l.stopPropagation(),
                            i.isMoved ||
                            (a.loop && this.loopFix(),
                                (i.startTranslate = this.getTranslate()),
                                this.setTransition(0),
                            this.animating &&
                            this.$wrapperEl.trigger(
                                'webkitTransitionEnd transitionend'
                            ),
                                (i.allowMomentumBounce = !1),
                            !a.grabCursor ||
                            (!0 !== this.allowSlideNext &&
                                !0 !== this.allowSlidePrev) ||
                            this.setGrabCursor(!0),
                                this.emit('sliderFirstMove', l)),
                                this.emit('sliderMove', l),
                                (i.isMoved = !0);
                            var f = this.isHorizontal() ? c : u;
                            (r.diff = f),
                                (f *= a.touchRatio),
                            o && (f = -f),
                                (this.swipeDirection = f > 0 ? 'prev' : 'next'),
                                (i.currentTranslate = f + i.startTranslate);
                            var m = !0,
                                g = a.resistanceRatio;
                            if (
                                (a.touchReleaseOnEdges && (g = 0),
                                    f > 0 && i.currentTranslate > this.minTranslate()
                                        ? ((m = !1),
                                        a.resistance &&
                                        (i.currentTranslate =
                                            this.minTranslate() -
                                            1 +
                                            Math.pow(
                                                -this.minTranslate() +
                                                i.startTranslate +
                                                f,
                                                g
                                            )))
                                        : f < 0 &&
                                        i.currentTranslate < this.maxTranslate() &&
                                        ((m = !1),
                                        a.resistance &&
                                        (i.currentTranslate =
                                            this.maxTranslate() +
                                            1 -
                                            Math.pow(
                                                this.maxTranslate() -
                                                i.startTranslate -
                                                f,
                                                g
                                            ))),
                                m && (l.preventedByNestedSwiper = !0),
                                !this.allowSlideNext &&
                                'next' === this.swipeDirection &&
                                i.currentTranslate < i.startTranslate &&
                                (i.currentTranslate = i.startTranslate),
                                !this.allowSlidePrev &&
                                'prev' === this.swipeDirection &&
                                i.currentTranslate > i.startTranslate &&
                                (i.currentTranslate = i.startTranslate),
                                a.threshold > 0)
                            ) {
                                if (
                                    !(Math.abs(f) > a.threshold || i.allowThresholdMove)
                                )
                                    return void (i.currentTranslate = i.startTranslate);
                                if (!i.allowThresholdMove)
                                    return (
                                        (i.allowThresholdMove = !0),
                                            (r.startX = r.currentX),
                                            (r.startY = r.currentY),
                                            (i.currentTranslate = i.startTranslate),
                                            void (r.diff = this.isHorizontal()
                                                ? r.currentX - r.startX
                                                : r.currentY - r.startY)
                                    );
                            }
                            a.followFinger &&
                            !a.cssMode &&
                            ((a.freeMode ||
                                a.watchSlidesProgress ||
                                a.watchSlidesVisibility) &&
                            (this.updateActiveIndex(),
                                this.updateSlidesClasses()),
                            a.freeMode &&
                            (0 === i.velocities.length &&
                            i.velocities.push({
                                position:
                                    r[
                                        this.isHorizontal() ? 'startX' : 'startY'
                                        ],
                                time: i.touchStartTime,
                            }),
                                i.velocities.push({
                                    position:
                                        r[
                                            this.isHorizontal()
                                                ? 'currentX'
                                                : 'currentY'
                                            ],
                                    time: n.now(),
                                })),
                                this.updateProgress(i.currentTranslate),
                                this.setTranslate(i.currentTranslate));
                        }
                    }
                }
            }
        } else i.startMoving && i.isScrolling && this.emit('touchMoveOpposite', l);
    }
    function A(e) {
        var t = this,
            i = t.touchEventsData,
            s = t.params,
            a = t.touches,
            r = t.rtlTranslate,
            o = t.$wrapperEl,
            l = t.slidesGrid,
            d = t.snapGrid,
            h = e;
        if (
            (h.originalEvent && (h = h.originalEvent),
            i.allowTouchCallbacks && t.emit('touchEnd', h),
                (i.allowTouchCallbacks = !1),
                !i.isTouched)
        )
            return (
                i.isMoved && s.grabCursor && t.setGrabCursor(!1),
                    (i.isMoved = !1),
                    void (i.startMoving = !1)
            );
        s.grabCursor &&
        i.isMoved &&
        i.isTouched &&
        (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) &&
        t.setGrabCursor(!1);
        var p,
            c = n.now(),
            u = c - i.touchStartTime;
        if (
            (t.allowClick &&
            (t.updateClickedSlide(h),
                t.emit('tap click', h),
            u < 300 &&
            c - i.lastClickTime < 300 &&
            t.emit('doubleTap doubleClick', h)),
                (i.lastClickTime = n.now()),
                n.nextTick(function () {
                    t.destroyed || (t.allowClick = !0);
                }),
            !i.isTouched ||
            !i.isMoved ||
            !t.swipeDirection ||
            0 === a.diff ||
            i.currentTranslate === i.startTranslate)
        )
            return (i.isTouched = !1), (i.isMoved = !1), void (i.startMoving = !1);
        if (
            ((i.isTouched = !1),
                (i.isMoved = !1),
                (i.startMoving = !1),
                (p = s.followFinger
                    ? r
                        ? t.translate
                        : -t.translate
                    : -i.currentTranslate),
                !s.cssMode)
        )
            if (s.freeMode) {
                if (p < -t.minTranslate()) return void t.slideTo(t.activeIndex);
                if (p > -t.maxTranslate())
                    return void (t.slides.length < d.length
                        ? t.slideTo(d.length - 1)
                        : t.slideTo(t.slides.length - 1));
                if (s.freeModeMomentum) {
                    if (i.velocities.length > 1) {
                        var v = i.velocities.pop(),
                            f = i.velocities.pop(),
                            m = v.position - f.position,
                            g = v.time - f.time;
                        (t.velocity = m / g),
                            (t.velocity /= 2),
                        Math.abs(t.velocity) < s.freeModeMinimumVelocity &&
                        (t.velocity = 0),
                        (g > 150 || n.now() - v.time > 300) && (t.velocity = 0);
                    } else t.velocity = 0;
                    (t.velocity *= s.freeModeMomentumVelocityRatio),
                        (i.velocities.length = 0);
                    var b = 1e3 * s.freeModeMomentumRatio,
                        w = t.velocity * b,
                        y = t.translate + w;
                    r && (y = -y);
                    var x,
                        T,
                        E = !1,
                        C = 20 * Math.abs(t.velocity) * s.freeModeMomentumBounceRatio;
                    if (y < t.maxTranslate())
                        s.freeModeMomentumBounce
                            ? (y + t.maxTranslate() < -C && (y = t.maxTranslate() - C),
                                (x = t.maxTranslate()),
                                (E = !0),
                                (i.allowMomentumBounce = !0))
                            : (y = t.maxTranslate()),
                        s.loop && s.centeredSlides && (T = !0);
                    else if (y > t.minTranslate())
                        s.freeModeMomentumBounce
                            ? (y - t.minTranslate() > C && (y = t.minTranslate() + C),
                                (x = t.minTranslate()),
                                (E = !0),
                                (i.allowMomentumBounce = !0))
                            : (y = t.minTranslate()),
                        s.loop && s.centeredSlides && (T = !0);
                    else if (s.freeModeSticky) {
                        for (var S, M = 0; M < d.length; M += 1)
                            if (d[M] > -y) {
                                S = M;
                                break;
                            }
                        y = -(y =
                            Math.abs(d[S] - y) < Math.abs(d[S - 1] - y) ||
                            'next' === t.swipeDirection
                                ? d[S]
                                : d[S - 1]);
                    }
                    if (
                        (T &&
                        t.once('transitionEnd', function () {
                            t.loopFix();
                        }),
                        0 !== t.velocity)
                    ) {
                        if (
                            ((b = r
                                ? Math.abs((-y - t.translate) / t.velocity)
                                : Math.abs((y - t.translate) / t.velocity)),
                                s.freeModeSticky)
                        ) {
                            var P = Math.abs((r ? -y : y) - t.translate),
                                z = t.slidesSizesGrid[t.activeIndex];
                            b =
                                P < z
                                    ? s.speed
                                    : P < 2 * z
                                    ? 1.5 * s.speed
                                    : 2.5 * s.speed;
                        }
                    } else if (s.freeModeSticky) return void t.slideToClosest();
                    s.freeModeMomentumBounce && E
                        ? (t.updateProgress(x),
                            t.setTransition(b),
                            t.setTranslate(y),
                            t.transitionStart(!0, t.swipeDirection),
                            (t.animating = !0),
                            o.transitionEnd(function () {
                                t &&
                                !t.destroyed &&
                                i.allowMomentumBounce &&
                                (t.emit('momentumBounce'),
                                    t.setTransition(s.speed),
                                    t.setTranslate(x),
                                    o.transitionEnd(function () {
                                        t && !t.destroyed && t.transitionEnd();
                                    }));
                            }))
                        : t.velocity
                        ? (t.updateProgress(y),
                            t.setTransition(b),
                            t.setTranslate(y),
                            t.transitionStart(!0, t.swipeDirection),
                        t.animating ||
                        ((t.animating = !0),
                            o.transitionEnd(function () {
                                t && !t.destroyed && t.transitionEnd();
                            })))
                        : t.updateProgress(y),
                        t.updateActiveIndex(),
                        t.updateSlidesClasses();
                } else if (s.freeModeSticky) return void t.slideToClosest();
                (!s.freeModeMomentum || u >= s.longSwipesMs) &&
                (t.updateProgress(),
                    t.updateActiveIndex(),
                    t.updateSlidesClasses());
            } else {
                for (
                    var k = 0, $ = t.slidesSizesGrid[0], L = 0;
                    L < l.length;
                    L += s.slidesPerGroup
                )
                    void 0 !== l[L + s.slidesPerGroup]
                        ? p >= l[L] &&
                        p < l[L + s.slidesPerGroup] &&
                        ((k = L), ($ = l[L + s.slidesPerGroup] - l[L]))
                        : p >= l[L] &&
                        ((k = L), ($ = l[l.length - 1] - l[l.length - 2]));
                var I = (p - l[k]) / $;
                if (u > s.longSwipesMs) {
                    if (!s.longSwipes) return void t.slideTo(t.activeIndex);
                    'next' === t.swipeDirection &&
                    (I >= s.longSwipesRatio
                        ? t.slideTo(k + s.slidesPerGroup)
                        : t.slideTo(k)),
                    'prev' === t.swipeDirection &&
                    (I > 1 - s.longSwipesRatio
                        ? t.slideTo(k + s.slidesPerGroup)
                        : t.slideTo(k));
                } else {
                    if (!s.shortSwipes) return void t.slideTo(t.activeIndex);
                    t.navigation &&
                    (h.target === t.navigation.nextEl ||
                        h.target === t.navigation.prevEl)
                        ? h.target === t.navigation.nextEl
                        ? t.slideTo(k + s.slidesPerGroup)
                        : t.slideTo(k)
                        : ('next' === t.swipeDirection &&
                        t.slideTo(k + s.slidesPerGroup),
                        'prev' === t.swipeDirection && t.slideTo(k));
                }
            }
    }
    function G() {
        var e = this.params,
            t = this.el;
        if (!t || 0 !== t.offsetWidth) {
            e.breakpoints && this.setBreakpoint();
            var i = this.allowSlideNext,
                s = this.allowSlidePrev,
                a = this.snapGrid;
            (this.allowSlideNext = !0),
                (this.allowSlidePrev = !0),
                this.updateSize(),
                this.updateSlides(),
                this.updateSlidesClasses(),
                ('auto' === e.slidesPerView || e.slidesPerView > 1) &&
                this.isEnd &&
                !this.params.centeredSlides
                    ? this.slideTo(this.slides.length - 1, 0, !1, !0)
                    : this.slideTo(this.activeIndex, 0, !1, !0),
            this.autoplay &&
            this.autoplay.running &&
            this.autoplay.paused &&
            this.autoplay.run(),
                (this.allowSlidePrev = s),
                (this.allowSlideNext = i),
            this.params.watchOverflow &&
            a !== this.snapGrid &&
            this.checkOverflow();
        }
    }
    function B(e) {
        this.allowClick ||
        (this.params.preventClicks && e.preventDefault(),
        this.params.preventClicksPropagation &&
        this.animating &&
        (e.stopPropagation(), e.stopImmediatePropagation()));
    }
    function H() {
        var e = this.wrapperEl;
        (this.previousTranslate = this.translate),
            (this.translate = this.isHorizontal() ? -e.scrollLeft : -e.scrollTop),
        -0 === this.translate && (this.translate = 0),
            this.updateActiveIndex(),
            this.updateSlidesClasses();
        var t = this.maxTranslate() - this.minTranslate();
        (0 === t ? 0 : (this.translate - this.minTranslate()) / t) !==
        this.progress && this.updateProgress(this.translate),
            this.emit('setTranslate', this.translate, !1);
    }
    var N = !1;
    function X() {}
    var V = {
            init: !0,
            direction: 'horizontal',
            touchEventsTarget: 'container',
            initialSlide: 0,
            speed: 300,
            cssMode: !1,
            preventInteractionOnTransition: !1,
            edgeSwipeDetection: !1,
            edgeSwipeThreshold: 20,
            freeMode: !1,
            freeModeMomentum: !0,
            freeModeMomentumRatio: 1,
            freeModeMomentumBounce: !0,
            freeModeMomentumBounceRatio: 1,
            freeModeMomentumVelocityRatio: 1,
            freeModeSticky: !1,
            freeModeMinimumVelocity: 0.02,
            autoHeight: !1,
            setWrapperSize: !1,
            virtualTranslate: !1,
            effect: 'slide',
            breakpoints: void 0,
            spaceBetween: 0,
            slidesPerView: 1,
            slidesPerColumn: 1,
            slidesPerColumnFill: 'column',
            slidesPerGroup: 1,
            centeredSlides: !1,
            centeredSlidesBounds: !1,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
            normalizeSlideIndex: !0,
            centerInsufficientSlides: !1,
            watchOverflow: !1,
            roundLengths: !1,
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: !0,
            shortSwipes: !0,
            longSwipes: !0,
            longSwipesRatio: 0.5,
            longSwipesMs: 300,
            followFinger: !0,
            allowTouchMove: !0,
            threshold: 0,
            touchMoveStopPropagation: !1,
            touchStartPreventDefault: !0,
            touchStartForcePreventDefault: !1,
            touchReleaseOnEdges: !1,
            uniqueNavElements: !0,
            resistance: !0,
            resistanceRatio: 0.85,
            watchSlidesProgress: !1,
            watchSlidesVisibility: !1,
            grabCursor: !1,
            preventClicks: !0,
            preventClicksPropagation: !0,
            slideToClickedSlide: !1,
            preloadImages: !0,
            updateOnImagesReady: !0,
            loop: !1,
            loopAdditionalSlides: 0,
            loopedSlides: null,
            loopFillGroupWithBlank: !1,
            allowSlidePrev: !0,
            allowSlideNext: !0,
            swipeHandler: null,
            noSwiping: !0,
            noSwipingClass: 'swiper-no-swiping',
            noSwipingSelector: null,
            passiveListeners: !0,
            containerModifierClass: 'swiper-container-',
            slideClass: 'swiper-slide',
            slideBlankClass: 'swiper-slide-invisible-blank',
            slideActiveClass: 'swiper-slide-active',
            slideDuplicateActiveClass: 'swiper-slide-duplicate-active',
            slideVisibleClass: 'swiper-slide-visible',
            slideDuplicateClass: 'swiper-slide-duplicate',
            slideNextClass: 'swiper-slide-next',
            slideDuplicateNextClass: 'swiper-slide-duplicate-next',
            slidePrevClass: 'swiper-slide-prev',
            slideDuplicatePrevClass: 'swiper-slide-duplicate-prev',
            wrapperClass: 'swiper-wrapper',
            runCallbacksOnInit: !0,
        },
        Y = {
            update: h,
            translate: p,
            transition: c,
            slide: u,
            loop: v,
            grabCursor: f,
            manipulation: L,
            events: {
                attachEvents: function () {
                    var t = this.params,
                        i = this.touchEvents,
                        s = this.el,
                        a = this.wrapperEl;
                    (this.onTouchStart = D.bind(this)),
                        (this.onTouchMove = O.bind(this)),
                        (this.onTouchEnd = A.bind(this)),
                    t.cssMode && (this.onScroll = H.bind(this)),
                        (this.onClick = B.bind(this));
                    var r = !!t.nested;
                    if (!o.touch && o.pointerEvents)
                        s.addEventListener(i.start, this.onTouchStart, !1),
                            e.addEventListener(i.move, this.onTouchMove, r),
                            e.addEventListener(i.end, this.onTouchEnd, !1);
                    else {
                        if (o.touch) {
                            var n = !(
                                'touchstart' !== i.start ||
                                !o.passiveListener ||
                                !t.passiveListeners
                            ) && { passive: !0, capture: !1 };
                            s.addEventListener(i.start, this.onTouchStart, n),
                                s.addEventListener(
                                    i.move,
                                    this.onTouchMove,
                                    o.passiveListener ? { passive: !1, capture: r } : r
                                ),
                                s.addEventListener(i.end, this.onTouchEnd, n),
                            i.cancel &&
                            s.addEventListener(i.cancel, this.onTouchEnd, n),
                            N || (e.addEventListener('touchstart', X), (N = !0));
                        }
                        ((t.simulateTouch && !I.ios && !I.android) ||
                            (t.simulateTouch && !o.touch && I.ios)) &&
                        (s.addEventListener('mousedown', this.onTouchStart, !1),
                            e.addEventListener('mousemove', this.onTouchMove, r),
                            e.addEventListener('mouseup', this.onTouchEnd, !1));
                    }
                    (t.preventClicks || t.preventClicksPropagation) &&
                    s.addEventListener('click', this.onClick, !0),
                    t.cssMode && a.addEventListener('scroll', this.onScroll),
                        this.on(
                            I.ios || I.android
                                ? 'resize orientationchange observerUpdate'
                                : 'resize observerUpdate',
                            G,
                            !0
                        );
                },
                detachEvents: function () {
                    var t = this.params,
                        i = this.touchEvents,
                        s = this.el,
                        a = this.wrapperEl,
                        r = !!t.nested;
                    if (!o.touch && o.pointerEvents)
                        s.removeEventListener(i.start, this.onTouchStart, !1),
                            e.removeEventListener(i.move, this.onTouchMove, r),
                            e.removeEventListener(i.end, this.onTouchEnd, !1);
                    else {
                        if (o.touch) {
                            var n = !(
                                'onTouchStart' !== i.start ||
                                !o.passiveListener ||
                                !t.passiveListeners
                            ) && { passive: !0, capture: !1 };
                            s.removeEventListener(i.start, this.onTouchStart, n),
                                s.removeEventListener(i.move, this.onTouchMove, r),
                                s.removeEventListener(i.end, this.onTouchEnd, n),
                            i.cancel &&
                            s.removeEventListener(i.cancel, this.onTouchEnd, n);
                        }
                        ((t.simulateTouch && !I.ios && !I.android) ||
                            (t.simulateTouch && !o.touch && I.ios)) &&
                        (s.removeEventListener('mousedown', this.onTouchStart, !1),
                            e.removeEventListener('mousemove', this.onTouchMove, r),
                            e.removeEventListener('mouseup', this.onTouchEnd, !1));
                    }
                    (t.preventClicks || t.preventClicksPropagation) &&
                    s.removeEventListener('click', this.onClick, !0),
                    t.cssMode && a.removeEventListener('scroll', this.onScroll),
                        this.off(
                            I.ios || I.android
                                ? 'resize orientationchange observerUpdate'
                                : 'resize observerUpdate',
                            G
                        );
                },
            },
            breakpoints: {
                setBreakpoint: function () {
                    var e = this.activeIndex,
                        t = this.initialized,
                        i = this.loopedSlides;
                    void 0 === i && (i = 0);
                    var s = this.params,
                        a = this.$el,
                        r = s.breakpoints;
                    if (r && (!r || 0 !== Object.keys(r).length)) {
                        var o = this.getBreakpoint(r);
                        if (o && this.currentBreakpoint !== o) {
                            var l = o in r ? r[o] : void 0;
                            l &&
                            [
                                'slidesPerView',
                                'spaceBetween',
                                'slidesPerGroup',
                                'slidesPerColumn',
                            ].forEach(function (e) {
                                var t = l[e];
                                void 0 !== t &&
                                (l[e] =
                                    'slidesPerView' !== e ||
                                    ('AUTO' !== t && 'auto' !== t)
                                        ? 'slidesPerView' === e
                                        ? parseFloat(t)
                                        : parseInt(t, 10)
                                        : 'auto');
                            });
                            var d = l || this.originalParams,
                                h = s.slidesPerColumn > 1,
                                p = d.slidesPerColumn > 1;
                            h && !p
                                ? a.removeClass(
                                s.containerModifierClass +
                                'multirow ' +
                                s.containerModifierClass +
                                'multirow-column'
                                )
                                : !h &&
                                p &&
                                (a.addClass(s.containerModifierClass + 'multirow'),
                                'column' === d.slidesPerColumnFill &&
                                a.addClass(
                                    s.containerModifierClass + 'multirow-column'
                                ));
                            var c = d.direction && d.direction !== s.direction,
                                u =
                                    s.loop && (d.slidesPerView !== s.slidesPerView || c);
                            c && t && this.changeDirection(),
                                n.extend(this.params, d),
                                n.extend(this, {
                                    allowTouchMove: this.params.allowTouchMove,
                                    allowSlideNext: this.params.allowSlideNext,
                                    allowSlidePrev: this.params.allowSlidePrev,
                                }),
                                (this.currentBreakpoint = o),
                            u &&
                            t &&
                            (this.loopDestroy(),
                                this.loopCreate(),
                                this.updateSlides(),
                                this.slideTo(e - i + this.loopedSlides, 0, !1)),
                                this.emit('breakpoint', d);
                        }
                    }
                },
                getBreakpoint: function (e) {
                    if (e) {
                        var i = !1,
                            s = [];
                        Object.keys(e).forEach(function (e) {
                            s.push(e);
                        }),
                            s.sort(function (e, t) {
                                return parseInt(e, 10) - parseInt(t, 10);
                            });
                        for (var a = 0; a < s.length; a += 1) {
                            var r = s[a];
                            r <= t.innerWidth && (i = r);
                        }
                        return i || 'max';
                    }
                },
            },
            checkOverflow: {
                checkOverflow: function () {
                    var e = this.params,
                        t = this.isLocked,
                        i =
                            this.slides.length > 0 &&
                            e.slidesOffsetBefore +
                            e.spaceBetween * (this.slides.length - 1) +
                            this.slides[0].offsetWidth * this.slides.length;
                    e.slidesOffsetBefore && e.slidesOffsetAfter && i
                        ? (this.isLocked = i <= this.size)
                        : (this.isLocked = 1 === this.snapGrid.length),
                        (this.allowSlideNext = !this.isLocked),
                        (this.allowSlidePrev = !this.isLocked),
                    t !== this.isLocked &&
                    this.emit(this.isLocked ? 'lock' : 'unlock'),
                    t &&
                    t !== this.isLocked &&
                    ((this.isEnd = !1), this.navigation.update());
                },
            },
            classes: {
                addClasses: function () {
                    var e = this.classNames,
                        t = this.params,
                        i = this.rtl,
                        s = this.$el,
                        a = [];
                    a.push('initialized'),
                        a.push(t.direction),
                    t.freeMode && a.push('free-mode'),
                    t.autoHeight && a.push('autoheight'),
                    i && a.push('rtl'),
                    t.slidesPerColumn > 1 &&
                    (a.push('multirow'),
                    'column' === t.slidesPerColumnFill &&
                    a.push('multirow-column')),
                    I.android && a.push('android'),
                    I.ios && a.push('ios'),
                    t.cssMode && a.push('css-mode'),
                        a.forEach(function (i) {
                            e.push(t.containerModifierClass + i);
                        }),
                        s.addClass(e.join(' '));
                },
                removeClasses: function () {
                    var e = this.$el,
                        t = this.classNames;
                    e.removeClass(t.join(' '));
                },
            },
            images: {
                loadImage: function (e, i, s, a, r, n) {
                    var o;
                    function l() {
                        n && n();
                    }
                    e.complete && r
                        ? l()
                        : i
                        ? (((o = new t.Image()).onload = l),
                            (o.onerror = l),
                        a && (o.sizes = a),
                        s && (o.srcset = s),
                        i && (o.src = i))
                        : l();
                },
                preloadImages: function () {
                    var e = this;
                    function t() {
                        null != e &&
                        e &&
                        !e.destroyed &&
                        (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1),
                        e.imagesLoaded === e.imagesToLoad.length &&
                        (e.params.updateOnImagesReady && e.update(),
                            e.emit('imagesReady')));
                    }
                    e.imagesToLoad = e.$el.find('img');
                    for (var i = 0; i < e.imagesToLoad.length; i += 1) {
                        var s = e.imagesToLoad[i];
                        e.loadImage(
                            s,
                            s.currentSrc || s.getAttribute('src'),
                            s.srcset || s.getAttribute('srcset'),
                            s.sizes || s.getAttribute('sizes'),
                            !0,
                            t
                        );
                    }
                },
            },
        },
        F = {},
        W = (function (e) {
            function t() {
                for (var i, a, r, l = [], d = arguments.length; d--; )
                    l[d] = arguments[d];
                1 === l.length && l[0].constructor && l[0].constructor === Object
                    ? (r = l[0])
                    : ((a = (i = l)[0]), (r = i[1])),
                r || (r = {}),
                    (r = n.extend({}, r)),
                a && !r.el && (r.el = a),
                    e.call(this, r),
                    Object.keys(Y).forEach(function (e) {
                        Object.keys(Y[e]).forEach(function (i) {
                            t.prototype[i] || (t.prototype[i] = Y[e][i]);
                        });
                    });
                var h = this;
                void 0 === h.modules && (h.modules = {}),
                    Object.keys(h.modules).forEach(function (e) {
                        var t = h.modules[e];
                        if (t.params) {
                            var i = Object.keys(t.params)[0],
                                s = t.params[i];
                            if ('object' != typeof s || null === s) return;
                            if (!(i in r && 'enabled' in s)) return;
                            !0 === r[i] && (r[i] = { enabled: !0 }),
                            'object' != typeof r[i] ||
                            'enabled' in r[i] ||
                            (r[i].enabled = !0),
                            r[i] || (r[i] = { enabled: !1 });
                        }
                    });
                var p = n.extend({}, V);
                h.useModulesParams(p),
                    (h.params = n.extend({}, p, F, r)),
                    (h.originalParams = n.extend({}, h.params)),
                    (h.passedParams = n.extend({}, r)),
                    (h.$ = s);
                var c = s(h.params.el);
                if ((a = c[0])) {
                    if (c.length > 1) {
                        var u = [];
                        return (
                            c.each(function (e, i) {
                                var s = n.extend({}, r, { el: i });
                                u.push(new t(s));
                            }),
                                u
                        );
                    }
                    var v, f, m;
                    return (
                        (a.swiper = h),
                            c.data('swiper', h),
                            a && a.shadowRoot && a.shadowRoot.querySelector
                                ? ((v = s(
                                a.shadowRoot.querySelector(
                                    '.' + h.params.wrapperClass
                                )
                                )).children = function (e) {
                                    return c.children(e);
                                })
                                : (v = c.children('.' + h.params.wrapperClass)),
                            n.extend(h, {
                                $el: c,
                                el: a,
                                $wrapperEl: v,
                                wrapperEl: v[0],
                                classNames: [],
                                slides: s(),
                                slidesGrid: [],
                                snapGrid: [],
                                slidesSizesGrid: [],
                                isHorizontal: function () {
                                    return 'horizontal' === h.params.direction;
                                },
                                isVertical: function () {
                                    return 'vertical' === h.params.direction;
                                },
                                rtl:
                                    'rtl' === a.dir.toLowerCase() ||
                                    'rtl' === c.css('direction'),
                                rtlTranslate:
                                    'horizontal' === h.params.direction &&
                                    ('rtl' === a.dir.toLowerCase() ||
                                        'rtl' === c.css('direction')),
                                wrongRTL: '-webkit-box' === v.css('display'),
                                activeIndex: 0,
                                realIndex: 0,
                                isBeginning: !0,
                                isEnd: !1,
                                translate: 0,
                                previousTranslate: 0,
                                progress: 0,
                                velocity: 0,
                                animating: !1,
                                allowSlideNext: h.params.allowSlideNext,
                                allowSlidePrev: h.params.allowSlidePrev,
                                touchEvents:
                                    ((f = [
                                        'touchstart',
                                        'touchmove',
                                        'touchend',
                                        'touchcancel',
                                    ]),
                                        (m = ['mousedown', 'mousemove', 'mouseup']),
                                    o.pointerEvents &&
                                    (m = ['pointerdown', 'pointermove', 'pointerup']),
                                        (h.touchEventsTouch = {
                                            start: f[0],
                                            move: f[1],
                                            end: f[2],
                                            cancel: f[3],
                                        }),
                                        (h.touchEventsDesktop = {
                                            start: m[0],
                                            move: m[1],
                                            end: m[2],
                                        }),
                                        o.touch || !h.params.simulateTouch
                                            ? h.touchEventsTouch
                                            : h.touchEventsDesktop),
                                touchEventsData: {
                                    isTouched: void 0,
                                    isMoved: void 0,
                                    allowTouchCallbacks: void 0,
                                    touchStartTime: void 0,
                                    isScrolling: void 0,
                                    currentTranslate: void 0,
                                    startTranslate: void 0,
                                    allowThresholdMove: void 0,
                                    formElements:
                                        'input, select, option, textarea, button',
                                    lastClickTime: n.now(),
                                    clickTimeout: void 0,
                                    velocities: [],
                                    allowMomentumBounce: void 0,
                                    isTouchEvent: void 0,
                                    startMoving: void 0,
                                },
                                allowClick: !0,
                                allowTouchMove: h.params.allowTouchMove,
                                touches: {
                                    startX: 0,
                                    startY: 0,
                                    currentX: 0,
                                    currentY: 0,
                                    diff: 0,
                                },
                                imagesToLoad: [],
                                imagesLoaded: 0,
                            }),
                            h.useModules(),
                        h.params.init && h.init(),
                            h
                    );
                }
            }
            e && (t.__proto__ = e),
                (t.prototype = Object.create(e && e.prototype)),
                (t.prototype.constructor = t);
            var i = {
                extendedDefaults: { configurable: !0 },
                defaults: { configurable: !0 },
                Class: { configurable: !0 },
                $: { configurable: !0 },
            };
            return (
                (t.prototype.slidesPerViewDynamic = function () {
                    var e = this.params,
                        t = this.slides,
                        i = this.slidesGrid,
                        s = this.size,
                        a = this.activeIndex,
                        r = 1;
                    if (e.centeredSlides) {
                        for (
                            var n, o = t[a].swiperSlideSize, l = a + 1;
                            l < t.length;
                            l += 1
                        )
                            t[l] &&
                            !n &&
                            ((r += 1), (o += t[l].swiperSlideSize) > s && (n = !0));
                        for (var d = a - 1; d >= 0; d -= 1)
                            t[d] &&
                            !n &&
                            ((r += 1), (o += t[d].swiperSlideSize) > s && (n = !0));
                    } else
                        for (var h = a + 1; h < t.length; h += 1)
                            i[h] - i[a] < s && (r += 1);
                    return r;
                }),
                    (t.prototype.update = function () {
                        var e = this;
                        if (e && !e.destroyed) {
                            var t = e.snapGrid,
                                i = e.params;
                            i.breakpoints && e.setBreakpoint(),
                                e.updateSize(),
                                e.updateSlides(),
                                e.updateProgress(),
                                e.updateSlidesClasses(),
                                e.params.freeMode
                                    ? (s(), e.params.autoHeight && e.updateAutoHeight())
                                    : (('auto' === e.params.slidesPerView ||
                                    e.params.slidesPerView > 1) &&
                                e.isEnd &&
                                !e.params.centeredSlides
                                    ? e.slideTo(e.slides.length - 1, 0, !1, !0)
                                    : e.slideTo(e.activeIndex, 0, !1, !0)) || s(),
                            i.watchOverflow && t !== e.snapGrid && e.checkOverflow(),
                                e.emit('update');
                        }
                        function s() {
                            var t = e.rtlTranslate ? -1 * e.translate : e.translate,
                                i = Math.min(
                                    Math.max(t, e.maxTranslate()),
                                    e.minTranslate()
                                );
                            e.setTranslate(i),
                                e.updateActiveIndex(),
                                e.updateSlidesClasses();
                        }
                    }),
                    (t.prototype.changeDirection = function (e, t) {
                        void 0 === t && (t = !0);
                        var i = this.params.direction;
                        return (
                            e || (e = 'horizontal' === i ? 'vertical' : 'horizontal'),
                                e === i || ('horizontal' !== e && 'vertical' !== e)
                                    ? this
                                    : (this.$el
                                        .removeClass(
                                            '' + this.params.containerModifierClass + i
                                        )
                                        .addClass(
                                            '' + this.params.containerModifierClass + e
                                        ),
                                        (this.params.direction = e),
                                        this.slides.each(function (t, i) {
                                            'vertical' === e
                                                ? (i.style.width = '')
                                                : (i.style.height = '');
                                        }),
                                        this.emit('changeDirection'),
                                    t && this.update(),
                                        this)
                        );
                    }),
                    (t.prototype.init = function () {
                        this.initialized ||
                        (this.emit('beforeInit'),
                        this.params.breakpoints && this.setBreakpoint(),
                            this.addClasses(),
                        this.params.loop && this.loopCreate(),
                            this.updateSize(),
                            this.updateSlides(),
                        this.params.watchOverflow && this.checkOverflow(),
                        this.params.grabCursor && this.setGrabCursor(),
                        this.params.preloadImages && this.preloadImages(),
                            this.params.loop
                                ? this.slideTo(
                                this.params.initialSlide + this.loopedSlides,
                                0,
                                this.params.runCallbacksOnInit
                                )
                                : this.slideTo(
                                this.params.initialSlide,
                                0,
                                this.params.runCallbacksOnInit
                                ),
                            this.attachEvents(),
                            (this.initialized = !0),
                            this.emit('init'));
                    }),
                    (t.prototype.destroy = function (e, t) {
                        void 0 === e && (e = !0), void 0 === t && (t = !0);
                        var i = this,
                            s = i.params,
                            a = i.$el,
                            r = i.$wrapperEl,
                            o = i.slides;
                        return void 0 === i.params || i.destroyed
                            ? null
                            : (i.emit('beforeDestroy'),
                                (i.initialized = !1),
                                i.detachEvents(),
                            s.loop && i.loopDestroy(),
                            t &&
                            (i.removeClasses(),
                                a.removeAttr('style'),
                                r.removeAttr('style'),
                            o &&
                            o.length &&
                            o
                                .removeClass(
                                    [
                                        s.slideVisibleClass,
                                        s.slideActiveClass,
                                        s.slideNextClass,
                                        s.slidePrevClass,
                                    ].join(' ')
                                )
                                .removeAttr('style')
                                .removeAttr('data-swiper-slide-index')),
                                i.emit('destroy'),
                                Object.keys(i.eventsListeners).forEach(function (e) {
                                    i.off(e);
                                }),
                            !1 !== e &&
                            ((i.$el[0].swiper = null),
                                i.$el.data('swiper', null),
                                n.deleteProps(i)),
                                (i.destroyed = !0),
                                null);
                    }),
                    (t.extendDefaults = function (e) {
                        n.extend(F, e);
                    }),
                    (i.extendedDefaults.get = function () {
                        return F;
                    }),
                    (i.defaults.get = function () {
                        return V;
                    }),
                    (i.Class.get = function () {
                        return e;
                    }),
                    (i.$.get = function () {
                        return s;
                    }),
                    Object.defineProperties(t, i),
                    t
            );
        })(l),
        R = { name: 'device', proto: { device: I }, static: { device: I } },
        q = { name: 'support', proto: { support: o }, static: { support: o } },
        j = {
            isEdge: !!t.navigator.userAgent.match(/Edge/g),
            isSafari: (function () {
                var e = t.navigator.userAgent.toLowerCase();
                return (
                    e.indexOf('safari') >= 0 &&
                    e.indexOf('chrome') < 0 &&
                    e.indexOf('android') < 0
                );
            })(),
            isUiWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(
                t.navigator.userAgent
            ),
        },
        K = { name: 'browser', proto: { browser: j }, static: { browser: j } },
        U = {
            name: 'resize',
            create: function () {
                var e = this;
                n.extend(e, {
                    resize: {
                        resizeHandler: function () {
                            e &&
                            !e.destroyed &&
                            e.initialized &&
                            (e.emit('beforeResize'), e.emit('resize'));
                        },
                        orientationChangeHandler: function () {
                            e &&
                            !e.destroyed &&
                            e.initialized &&
                            e.emit('orientationchange');
                        },
                    },
                });
            },
            on: {
                init: function () {
                    t.addEventListener('resize', this.resize.resizeHandler),
                        t.addEventListener(
                            'orientationchange',
                            this.resize.orientationChangeHandler
                        );
                },
                destroy: function () {
                    t.removeEventListener('resize', this.resize.resizeHandler),
                        t.removeEventListener(
                            'orientationchange',
                            this.resize.orientationChangeHandler
                        );
                },
            },
        },
        _ = {
            func: t.MutationObserver || t.WebkitMutationObserver,
            attach: function (e, i) {
                void 0 === i && (i = {});
                var s = this,
                    a = new (0, _.func)(function (e) {
                        if (1 !== e.length) {
                            var i = function () {
                                s.emit('observerUpdate', e[0]);
                            };
                            t.requestAnimationFrame
                                ? t.requestAnimationFrame(i)
                                : t.setTimeout(i, 0);
                        } else s.emit('observerUpdate', e[0]);
                    });
                a.observe(e, {
                    attributes: void 0 === i.attributes || i.attributes,
                    childList: void 0 === i.childList || i.childList,
                    characterData: void 0 === i.characterData || i.characterData,
                }),
                    s.observer.observers.push(a);
            },
            init: function () {
                if (o.observer && this.params.observer) {
                    if (this.params.observeParents)
                        for (var e = this.$el.parents(), t = 0; t < e.length; t += 1)
                            this.observer.attach(e[t]);
                    this.observer.attach(this.$el[0], {
                        childList: this.params.observeSlideChildren,
                    }),
                        this.observer.attach(this.$wrapperEl[0], { attributes: !1 });
                }
            },
            destroy: function () {
                this.observer.observers.forEach(function (e) {
                    e.disconnect();
                }),
                    (this.observer.observers = []);
            },
        },
        Z = {
            name: 'observer',
            params: { observer: !1, observeParents: !1, observeSlideChildren: !1 },
            create: function () {
                n.extend(this, {
                    observer: {
                        init: _.init.bind(this),
                        attach: _.attach.bind(this),
                        destroy: _.destroy.bind(this),
                        observers: [],
                    },
                });
            },
            on: {
                init: function () {
                    this.observer.init();
                },
                destroy: function () {
                    this.observer.destroy();
                },
            },
        },
        Q = {
            update: function (e) {
                var t = this,
                    i = t.params,
                    s = i.slidesPerView,
                    a = i.slidesPerGroup,
                    r = i.centeredSlides,
                    o = t.params.virtual,
                    l = o.addSlidesBefore,
                    d = o.addSlidesAfter,
                    h = t.virtual,
                    p = h.from,
                    c = h.to,
                    u = h.slides,
                    v = h.slidesGrid,
                    f = h.renderSlide,
                    m = h.offset;
                t.updateActiveIndex();
                var g,
                    b,
                    w,
                    y = t.activeIndex || 0;
                (g = t.rtlTranslate ? 'right' : t.isHorizontal() ? 'left' : 'top'),
                    r
                        ? ((b = Math.floor(s / 2) + a + l),
                            (w = Math.floor(s / 2) + a + d))
                        : ((b = s + (a - 1) + l), (w = a + d));
                var x = Math.max((y || 0) - w, 0),
                    T = Math.min((y || 0) + b, u.length - 1),
                    E = (t.slidesGrid[x] || 0) - (t.slidesGrid[0] || 0);
                function C() {
                    t.updateSlides(),
                        t.updateProgress(),
                        t.updateSlidesClasses(),
                    t.lazy && t.params.lazy.enabled && t.lazy.load();
                }
                if (
                    (n.extend(t.virtual, {
                        from: x,
                        to: T,
                        offset: E,
                        slidesGrid: t.slidesGrid,
                    }),
                    p === x && c === T && !e)
                )
                    return (
                        t.slidesGrid !== v && E !== m && t.slides.css(g, E + 'px'),
                            void t.updateProgress()
                    );
                if (t.params.virtual.renderExternal)
                    return (
                        t.params.virtual.renderExternal.call(t, {
                            offset: E,
                            from: x,
                            to: T,
                            slides: (function () {
                                for (var e = [], t = x; t <= T; t += 1) e.push(u[t]);
                                return e;
                            })(),
                        }),
                            void C()
                    );
                var S = [],
                    M = [];
                if (e) t.$wrapperEl.find('.' + t.params.slideClass).remove();
                else
                    for (var P = p; P <= c; P += 1)
                        (P < x || P > T) &&
                        t.$wrapperEl
                            .find(
                                '.' +
                                t.params.slideClass +
                                '[data-swiper-slide-index="' +
                                P +
                                '"]'
                            )
                            .remove();
                for (var z = 0; z < u.length; z += 1)
                    z >= x &&
                    z <= T &&
                    (void 0 === c || e
                        ? M.push(z)
                        : (z > c && M.push(z), z < p && S.push(z)));
                M.forEach(function (e) {
                    t.$wrapperEl.append(f(u[e], e));
                }),
                    S.sort(function (e, t) {
                        return t - e;
                    }).forEach(function (e) {
                        t.$wrapperEl.prepend(f(u[e], e));
                    }),
                    t.$wrapperEl.children('.swiper-slide').css(g, E + 'px'),
                    C();
            },
            renderSlide: function (e, t) {
                var i = this.params.virtual;
                if (i.cache && this.virtual.cache[t]) return this.virtual.cache[t];
                var a = i.renderSlide
                    ? s(i.renderSlide.call(this, e, t))
                    : s(
                        '<div class="' +
                        this.params.slideClass +
                        '" data-swiper-slide-index="' +
                        t +
                        '">' +
                        e +
                        '</div>'
                    );
                return (
                    a.attr('data-swiper-slide-index') ||
                    a.attr('data-swiper-slide-index', t),
                    i.cache && (this.virtual.cache[t] = a),
                        a
                );
            },
            appendSlide: function (e) {
                if ('object' == typeof e && 'length' in e)
                    for (var t = 0; t < e.length; t += 1)
                        e[t] && this.virtual.slides.push(e[t]);
                else this.virtual.slides.push(e);
                this.virtual.update(!0);
            },
            prependSlide: function (e) {
                var t = this.activeIndex,
                    i = t + 1,
                    s = 1;
                if (Array.isArray(e)) {
                    for (var a = 0; a < e.length; a += 1)
                        e[a] && this.virtual.slides.unshift(e[a]);
                    (i = t + e.length), (s = e.length);
                } else this.virtual.slides.unshift(e);
                if (this.params.virtual.cache) {
                    var r = this.virtual.cache,
                        n = {};
                    Object.keys(r).forEach(function (e) {
                        var t = r[e],
                            i = t.attr('data-swiper-slide-index');
                        i && t.attr('data-swiper-slide-index', parseInt(i, 10) + 1),
                            (n[parseInt(e, 10) + s] = t);
                    }),
                        (this.virtual.cache = n);
                }
                this.virtual.update(!0), this.slideTo(i, 0);
            },
            removeSlide: function (e) {
                if (null != e) {
                    var t = this.activeIndex;
                    if (Array.isArray(e))
                        for (var i = e.length - 1; i >= 0; i -= 1)
                            this.virtual.slides.splice(e[i], 1),
                            this.params.virtual.cache &&
                            delete this.virtual.cache[e[i]],
                            e[i] < t && (t -= 1),
                                (t = Math.max(t, 0));
                    else
                        this.virtual.slides.splice(e, 1),
                        this.params.virtual.cache && delete this.virtual.cache[e],
                        e < t && (t -= 1),
                            (t = Math.max(t, 0));
                    this.virtual.update(!0), this.slideTo(t, 0);
                }
            },
            removeAllSlides: function () {
                (this.virtual.slides = []),
                this.params.virtual.cache && (this.virtual.cache = {}),
                    this.virtual.update(!0),
                    this.slideTo(0, 0);
            },
        },
        J = {
            name: 'virtual',
            params: {
                virtual: {
                    enabled: !1,
                    slides: [],
                    cache: !0,
                    renderSlide: null,
                    renderExternal: null,
                    addSlidesBefore: 0,
                    addSlidesAfter: 0,
                },
            },
            create: function () {
                n.extend(this, {
                    virtual: {
                        update: Q.update.bind(this),
                        appendSlide: Q.appendSlide.bind(this),
                        prependSlide: Q.prependSlide.bind(this),
                        removeSlide: Q.removeSlide.bind(this),
                        removeAllSlides: Q.removeAllSlides.bind(this),
                        renderSlide: Q.renderSlide.bind(this),
                        slides: this.params.virtual.slides,
                        cache: {},
                    },
                });
            },
            on: {
                beforeInit: function () {
                    if (this.params.virtual.enabled) {
                        this.classNames.push(
                            this.params.containerModifierClass + 'virtual'
                        );
                        var e = { watchSlidesProgress: !0 };
                        n.extend(this.params, e),
                            n.extend(this.originalParams, e),
                        this.params.initialSlide || this.virtual.update();
                    }
                },
                setTranslate: function () {
                    this.params.virtual.enabled && this.virtual.update();
                },
            },
        },
        ee = {
            handle: function (i) {
                var s = this.rtlTranslate,
                    a = i;
                a.originalEvent && (a = a.originalEvent);
                var r = a.keyCode || a.charCode;
                if (
                    !this.allowSlideNext &&
                    ((this.isHorizontal() && 39 === r) ||
                        (this.isVertical() && 40 === r) ||
                        34 === r)
                )
                    return !1;
                if (
                    !this.allowSlidePrev &&
                    ((this.isHorizontal() && 37 === r) ||
                        (this.isVertical() && 38 === r) ||
                        33 === r)
                )
                    return !1;
                if (
                    !(
                        a.shiftKey ||
                        a.altKey ||
                        a.ctrlKey ||
                        a.metaKey ||
                        (e.activeElement &&
                            e.activeElement.nodeName &&
                            ('input' === e.activeElement.nodeName.toLowerCase() ||
                                'textarea' === e.activeElement.nodeName.toLowerCase()))
                    )
                ) {
                    if (
                        this.params.keyboard.onlyInViewport &&
                        (33 === r ||
                            34 === r ||
                            37 === r ||
                            39 === r ||
                            38 === r ||
                            40 === r)
                    ) {
                        var n = !1;
                        if (
                            this.$el.parents('.' + this.params.slideClass).length >
                            0 &&
                            0 ===
                            this.$el.parents('.' + this.params.slideActiveClass)
                                .length
                        )
                            return;
                        var o = t.innerWidth,
                            l = t.innerHeight,
                            d = this.$el.offset();
                        s && (d.left -= this.$el[0].scrollLeft);
                        for (
                            var h = [
                                    [d.left, d.top],
                                    [d.left + this.width, d.top],
                                    [d.left, d.top + this.height],
                                    [d.left + this.width, d.top + this.height],
                                ],
                                p = 0;
                            p < h.length;
                            p += 1
                        ) {
                            var c = h[p];
                            c[0] >= 0 &&
                            c[0] <= o &&
                            c[1] >= 0 &&
                            c[1] <= l &&
                            (n = !0);
                        }
                        if (!n) return;
                    }
                    this.isHorizontal()
                        ? ((33 !== r && 34 !== r && 37 !== r && 39 !== r) ||
                        (a.preventDefault
                            ? a.preventDefault()
                            : (a.returnValue = !1)),
                        (((34 !== r && 39 !== r) || s) &&
                            ((33 !== r && 37 !== r) || !s)) ||
                        this.slideNext(),
                        (((33 !== r && 37 !== r) || s) &&
                            ((34 !== r && 39 !== r) || !s)) ||
                        this.slidePrev())
                        : ((33 !== r && 34 !== r && 38 !== r && 40 !== r) ||
                        (a.preventDefault
                            ? a.preventDefault()
                            : (a.returnValue = !1)),
                        (34 !== r && 40 !== r) || this.slideNext(),
                        (33 !== r && 38 !== r) || this.slidePrev()),
                        this.emit('keyPress', r);
                }
            },
            enable: function () {
                this.keyboard.enabled ||
                (s(e).on('keydown', this.keyboard.handle),
                    (this.keyboard.enabled = !0));
            },
            disable: function () {
                this.keyboard.enabled &&
                (s(e).off('keydown', this.keyboard.handle),
                    (this.keyboard.enabled = !1));
            },
        },
        te = {
            name: 'keyboard',
            params: { keyboard: { enabled: !1, onlyInViewport: !0 } },
            create: function () {
                n.extend(this, {
                    keyboard: {
                        enabled: !1,
                        enable: ee.enable.bind(this),
                        disable: ee.disable.bind(this),
                        handle: ee.handle.bind(this),
                    },
                });
            },
            on: {
                init: function () {
                    this.params.keyboard.enabled && this.keyboard.enable();
                },
                destroy: function () {
                    this.keyboard.enabled && this.keyboard.disable();
                },
            },
        };
    var ie = {
            lastScrollTime: n.now(),
            lastEventBeforeSnap: void 0,
            recentWheelEvents: [],
            event: function () {
                return t.navigator.userAgent.indexOf('firefox') > -1
                    ? 'DOMMouseScroll'
                    : (function () {
                        var t = 'onwheel' in e;
                        if (!t) {
                            var i = e.createElement('div');
                            i.setAttribute('onwheel', 'return;'),
                                (t = 'function' == typeof i.onwheel);
                        }
                        return (
                            !t &&
                            e.implementation &&
                            e.implementation.hasFeature &&
                            !0 !== e.implementation.hasFeature('', '') &&
                            (t = e.implementation.hasFeature(
                                'Events.wheel',
                                '3.0'
                            )),
                                t
                        );
                    })()
                        ? 'wheel'
                        : 'mousewheel';
            },
            normalize: function (e) {
                var t = 0,
                    i = 0,
                    s = 0,
                    a = 0;
                return (
                    'detail' in e && (i = e.detail),
                    'wheelDelta' in e && (i = -e.wheelDelta / 120),
                    'wheelDeltaY' in e && (i = -e.wheelDeltaY / 120),
                    'wheelDeltaX' in e && (t = -e.wheelDeltaX / 120),
                    'axis' in e &&
                    e.axis === e.HORIZONTAL_AXIS &&
                    ((t = i), (i = 0)),
                        (s = 10 * t),
                        (a = 10 * i),
                    'deltaY' in e && (a = e.deltaY),
                    'deltaX' in e && (s = e.deltaX),
                    e.shiftKey && !s && ((s = a), (a = 0)),
                    (s || a) &&
                    e.deltaMode &&
                    (1 === e.deltaMode
                        ? ((s *= 40), (a *= 40))
                        : ((s *= 800), (a *= 800))),
                    s && !t && (t = s < 1 ? -1 : 1),
                    a && !i && (i = a < 1 ? -1 : 1),
                        { spinX: t, spinY: i, pixelX: s, pixelY: a }
                );
            },
            handleMouseEnter: function () {
                this.mouseEntered = !0;
            },
            handleMouseLeave: function () {
                this.mouseEntered = !1;
            },
            handle: function (e) {
                var i = e,
                    s = this,
                    a = s.params.mousewheel;
                if (
                    (s.params.cssMode && i.preventDefault(),
                    !s.mouseEntered && !a.releaseOnEdges)
                )
                    return !0;
                i.originalEvent && (i = i.originalEvent);
                var r = 0,
                    o = s.rtlTranslate ? -1 : 1,
                    l = ie.normalize(i);
                if (a.forceToAxis)
                    if (s.isHorizontal()) {
                        if (!(Math.abs(l.pixelX) > Math.abs(l.pixelY))) return !0;
                        r = l.pixelX * o;
                    } else {
                        if (!(Math.abs(l.pixelY) > Math.abs(l.pixelX))) return !0;
                        r = l.pixelY;
                    }
                else
                    r =
                        Math.abs(l.pixelX) > Math.abs(l.pixelY)
                            ? -l.pixelX * o
                            : -l.pixelY;
                if (0 === r) return !0;
                if ((a.invert && (r = -r), s.params.freeMode)) {
                    var d = {
                            time: n.now(),
                            delta: Math.abs(r),
                            direction: Math.sign(r),
                        },
                        h = s.mousewheel.lastEventBeforeSnap,
                        p =
                            h &&
                            d.time < h.time + 500 &&
                            d.delta <= h.delta &&
                            d.direction === h.direction;
                    if (!p) {
                        (s.mousewheel.lastEventBeforeSnap = void 0),
                        s.params.loop && s.loopFix();
                        var c = s.getTranslate() + r * a.sensitivity,
                            u = s.isBeginning,
                            v = s.isEnd;
                        if (
                            (c >= s.minTranslate() && (c = s.minTranslate()),
                            c <= s.maxTranslate() && (c = s.maxTranslate()),
                                s.setTransition(0),
                                s.setTranslate(c),
                                s.updateProgress(),
                                s.updateActiveIndex(),
                                s.updateSlidesClasses(),
                            ((!u && s.isBeginning) || (!v && s.isEnd)) &&
                            s.updateSlidesClasses(),
                                s.params.freeModeSticky)
                        ) {
                            clearTimeout(s.mousewheel.timeout),
                                (s.mousewheel.timeout = void 0);
                            var f = s.mousewheel.recentWheelEvents;
                            f.length >= 15 && f.shift();
                            var m = f.length ? f[f.length - 1] : void 0,
                                g = f[0];
                            if (
                                (f.push(d),
                                m && (d.delta > m.delta || d.direction !== m.direction))
                            )
                                f.splice(0);
                            else if (
                                f.length >= 15 &&
                                d.time - g.time < 500 &&
                                g.delta - d.delta >= 1 &&
                                d.delta <= 6
                            ) {
                                var b = r > 0 ? 0.8 : 0.2;
                                (s.mousewheel.lastEventBeforeSnap = d),
                                    f.splice(0),
                                    (s.mousewheel.timeout = n.nextTick(function () {
                                        s.slideToClosest(s.params.speed, !0, void 0, b);
                                    }, 0));
                            }
                            s.mousewheel.timeout ||
                            (s.mousewheel.timeout = n.nextTick(function () {
                                (s.mousewheel.lastEventBeforeSnap = d),
                                    f.splice(0),
                                    s.slideToClosest(s.params.speed, !0, void 0, 0.5);
                            }, 500));
                        }
                        if (
                            (p || s.emit('scroll', i),
                            s.params.autoplay &&
                            s.params.autoplayDisableOnInteraction &&
                            s.autoplay.stop(),
                            c === s.minTranslate() || c === s.maxTranslate())
                        )
                            return !0;
                    }
                } else {
                    if (n.now() - s.mousewheel.lastScrollTime > 60)
                        if (r < 0)
                            if ((s.isEnd && !s.params.loop) || s.animating) {
                                if (a.releaseOnEdges) return !0;
                            } else s.slideNext(), s.emit('scroll', i);
                        else if ((s.isBeginning && !s.params.loop) || s.animating) {
                            if (a.releaseOnEdges) return !0;
                        } else s.slidePrev(), s.emit('scroll', i);
                    s.mousewheel.lastScrollTime = new t.Date().getTime();
                }
                return (
                    i.preventDefault ? i.preventDefault() : (i.returnValue = !1), !1
                );
            },
            enable: function () {
                var e = ie.event();
                if (this.params.cssMode)
                    return (
                        this.wrapperEl.removeEventListener(e, this.mousewheel.handle),
                            !0
                    );
                if (!e) return !1;
                if (this.mousewheel.enabled) return !1;
                var t = this.$el;
                return (
                    'container' !== this.params.mousewheel.eventsTarged &&
                    (t = s(this.params.mousewheel.eventsTarged)),
                        t.on('mouseenter', this.mousewheel.handleMouseEnter),
                        t.on('mouseleave', this.mousewheel.handleMouseLeave),
                        t.on(e, this.mousewheel.handle),
                        (this.mousewheel.enabled = !0),
                        !0
                );
            },
            disable: function () {
                var e = ie.event();
                if (this.params.cssMode)
                    return (
                        this.wrapperEl.addEventListener(e, this.mousewheel.handle), !0
                    );
                if (!e) return !1;
                if (!this.mousewheel.enabled) return !1;
                var t = this.$el;
                return (
                    'container' !== this.params.mousewheel.eventsTarged &&
                    (t = s(this.params.mousewheel.eventsTarged)),
                        t.off(e, this.mousewheel.handle),
                        (this.mousewheel.enabled = !1),
                        !0
                );
            },
        },
        se = {
            update: function () {
                var e = this.params.navigation;
                if (!this.params.loop) {
                    var t = this.navigation,
                        i = t.$nextEl,
                        s = t.$prevEl;
                    s &&
                    s.length > 0 &&
                    (this.isBeginning
                        ? s.addClass(e.disabledClass)
                        : s.removeClass(e.disabledClass),
                        s[
                            this.params.watchOverflow && this.isLocked
                                ? 'addClass'
                                : 'removeClass'
                            ](e.lockClass)),
                    i &&
                    i.length > 0 &&
                    (this.isEnd
                        ? i.addClass(e.disabledClass)
                        : i.removeClass(e.disabledClass),
                        i[
                            this.params.watchOverflow && this.isLocked
                                ? 'addClass'
                                : 'removeClass'
                            ](e.lockClass));
                }
            },
            onPrevClick: function (e) {
                e.preventDefault(),
                (this.isBeginning && !this.params.loop) || this.slidePrev();
            },
            onNextClick: function (e) {
                e.preventDefault(),
                (this.isEnd && !this.params.loop) || this.slideNext();
            },
            init: function () {
                var e,
                    t,
                    i = this.params.navigation;
                (i.nextEl || i.prevEl) &&
                (i.nextEl &&
                ((e = s(i.nextEl)),
                this.params.uniqueNavElements &&
                'string' == typeof i.nextEl &&
                e.length > 1 &&
                1 === this.$el.find(i.nextEl).length &&
                (e = this.$el.find(i.nextEl))),
                i.prevEl &&
                ((t = s(i.prevEl)),
                this.params.uniqueNavElements &&
                'string' == typeof i.prevEl &&
                t.length > 1 &&
                1 === this.$el.find(i.prevEl).length &&
                (t = this.$el.find(i.prevEl))),
                e && e.length > 0 && e.on('click', this.navigation.onNextClick),
                t && t.length > 0 && t.on('click', this.navigation.onPrevClick),
                    n.extend(this.navigation, {
                        $nextEl: e,
                        nextEl: e && e[0],
                        $prevEl: t,
                        prevEl: t && t[0],
                    }));
            },
            destroy: function () {
                var e = this.navigation,
                    t = e.$nextEl,
                    i = e.$prevEl;
                t &&
                t.length &&
                (t.off('click', this.navigation.onNextClick),
                    t.removeClass(this.params.navigation.disabledClass)),
                i &&
                i.length &&
                (i.off('click', this.navigation.onPrevClick),
                    i.removeClass(this.params.navigation.disabledClass));
            },
        },
        ae = {
            update: function () {
                var e = this.rtl,
                    t = this.params.pagination;
                if (
                    t.el &&
                    this.pagination.el &&
                    this.pagination.$el &&
                    0 !== this.pagination.$el.length
                ) {
                    var i,
                        a =
                            this.virtual && this.params.virtual.enabled
                                ? this.virtual.slides.length
                                : this.slides.length,
                        r = this.pagination.$el,
                        n = this.params.loop
                            ? Math.ceil(
                                (a - 2 * this.loopedSlides) /
                                this.params.slidesPerGroup
                            )
                            : this.snapGrid.length;
                    if (
                        (this.params.loop
                            ? ((i = Math.ceil(
                                (this.activeIndex - this.loopedSlides) /
                                this.params.slidesPerGroup
                            )) >
                            a - 1 - 2 * this.loopedSlides &&
                            (i -= a - 2 * this.loopedSlides),
                            i > n - 1 && (i -= n),
                            i < 0 &&
                            'bullets' !== this.params.paginationType &&
                            (i = n + i))
                            : (i =
                                void 0 !== this.snapIndex
                                    ? this.snapIndex
                                    : this.activeIndex || 0),
                        'bullets' === t.type &&
                        this.pagination.bullets &&
                        this.pagination.bullets.length > 0)
                    ) {
                        var o,
                            l,
                            d,
                            h = this.pagination.bullets;
                        if (
                            (t.dynamicBullets &&
                            ((this.pagination.bulletSize = h
                                .eq(0)
                                [this.isHorizontal() ? 'outerWidth' : 'outerHeight'](
                                !0
                            )),
                                r.css(
                                    this.isHorizontal() ? 'width' : 'height',
                                    this.pagination.bulletSize *
                                    (t.dynamicMainBullets + 4) +
                                    'px'
                                ),
                            t.dynamicMainBullets > 1 &&
                            void 0 !== this.previousIndex &&
                            ((this.pagination.dynamicBulletIndex +=
                                i - this.previousIndex),
                                this.pagination.dynamicBulletIndex >
                                t.dynamicMainBullets - 1
                                    ? (this.pagination.dynamicBulletIndex =
                                    t.dynamicMainBullets - 1)
                                    : this.pagination.dynamicBulletIndex < 0 &&
                                    (this.pagination.dynamicBulletIndex = 0)),
                                (o = i - this.pagination.dynamicBulletIndex),
                                (d =
                                    ((l =
                                        o +
                                        (Math.min(h.length, t.dynamicMainBullets) - 1)) +
                                        o) /
                                    2)),
                                h.removeClass(
                                    t.bulletActiveClass +
                                    ' ' +
                                    t.bulletActiveClass +
                                    '-next ' +
                                    t.bulletActiveClass +
                                    '-next-next ' +
                                    t.bulletActiveClass +
                                    '-prev ' +
                                    t.bulletActiveClass +
                                    '-prev-prev ' +
                                    t.bulletActiveClass +
                                    '-main'
                                ),
                            r.length > 1)
                        )
                            h.each(function (e, a) {
                                var r = s(a),
                                    n = r.index();
                                n === i && r.addClass(t.bulletActiveClass),
                                t.dynamicBullets &&
                                (n >= o &&
                                n <= l &&
                                r.addClass(t.bulletActiveClass + '-main'),
                                n === o &&
                                r
                                    .prev()
                                    .addClass(t.bulletActiveClass + '-prev')
                                    .prev()
                                    .addClass(
                                        t.bulletActiveClass + '-prev-prev'
                                    ),
                                n === l &&
                                r
                                    .next()
                                    .addClass(t.bulletActiveClass + '-next')
                                    .next()
                                    .addClass(
                                        t.bulletActiveClass + '-next-next'
                                    ));
                            });
                        else {
                            var p = h.eq(i),
                                c = p.index();
                            if ((p.addClass(t.bulletActiveClass), t.dynamicBullets)) {
                                for (
                                    var u = h.eq(o), v = h.eq(l), f = o;
                                    f <= l;
                                    f += 1
                                )
                                    h.eq(f).addClass(t.bulletActiveClass + '-main');
                                if (this.params.loop)
                                    if (c >= h.length - t.dynamicMainBullets) {
                                        for (var m = t.dynamicMainBullets; m >= 0; m -= 1)
                                            h.eq(h.length - m).addClass(
                                                t.bulletActiveClass + '-main'
                                            );
                                        h.eq(
                                            h.length - t.dynamicMainBullets - 1
                                        ).addClass(t.bulletActiveClass + '-prev');
                                    } else
                                        u
                                            .prev()
                                            .addClass(t.bulletActiveClass + '-prev')
                                            .prev()
                                            .addClass(t.bulletActiveClass + '-prev-prev'),
                                            v
                                                .next()
                                                .addClass(t.bulletActiveClass + '-next')
                                                .next()
                                                .addClass(
                                                    t.bulletActiveClass + '-next-next'
                                                );
                                else
                                    u
                                        .prev()
                                        .addClass(t.bulletActiveClass + '-prev')
                                        .prev()
                                        .addClass(t.bulletActiveClass + '-prev-prev'),
                                        v
                                            .next()
                                            .addClass(t.bulletActiveClass + '-next')
                                            .next()
                                            .addClass(t.bulletActiveClass + '-next-next');
                            }
                        }
                        if (t.dynamicBullets) {
                            var g = Math.min(h.length, t.dynamicMainBullets + 4),
                                b =
                                    (this.pagination.bulletSize * g -
                                        this.pagination.bulletSize) /
                                    2 -
                                    d * this.pagination.bulletSize,
                                w = e ? 'right' : 'left';
                            h.css(this.isHorizontal() ? w : 'top', b + 'px');
                        }
                    }
                    if (
                        ('fraction' === t.type &&
                        (r
                            .find('.' + t.currentClass)
                            .text(t.formatFractionCurrent(i + 1)),
                            r.find('.' + t.totalClass).text(t.formatFractionTotal(n))),
                        'progressbar' === t.type)
                    ) {
                        var y;
                        y = t.progressbarOpposite
                            ? this.isHorizontal()
                                ? 'vertical'
                                : 'horizontal'
                            : this.isHorizontal()
                                ? 'horizontal'
                                : 'vertical';
                        var x = (i + 1) / n,
                            T = 1,
                            E = 1;
                        'horizontal' === y ? (T = x) : (E = x),
                            r
                                .find('.' + t.progressbarFillClass)
                                .transform(
                                    'translate3d(0,0,0) scaleX(' +
                                    T +
                                    ') scaleY(' +
                                    E +
                                    ')'
                                )
                                .transition(this.params.speed);
                    }
                    'custom' === t.type && t.renderCustom
                        ? (r.html(t.renderCustom(this, i + 1, n)),
                            this.emit('paginationRender', this, r[0]))
                        : this.emit('paginationUpdate', this, r[0]),
                        r[
                            this.params.watchOverflow && this.isLocked
                                ? 'addClass'
                                : 'removeClass'
                            ](t.lockClass);
                }
            },
            render: function () {
                var e = this.params.pagination;
                if (
                    e.el &&
                    this.pagination.el &&
                    this.pagination.$el &&
                    0 !== this.pagination.$el.length
                ) {
                    var t =
                            this.virtual && this.params.virtual.enabled
                                ? this.virtual.slides.length
                                : this.slides.length,
                        i = this.pagination.$el,
                        s = '';
                    if ('bullets' === e.type) {
                        for (
                            var a = this.params.loop
                                ? Math.ceil(
                                    (t - 2 * this.loopedSlides) /
                                    this.params.slidesPerGroup
                                )
                                : this.snapGrid.length,
                                r = 0;
                            r < a;
                            r += 1
                        )
                            e.renderBullet
                                ? (s += e.renderBullet.call(this, r, e.bulletClass))
                                : (s +=
                                '<' +
                                e.bulletElement +
                                ' class="' +
                                e.bulletClass +
                                '"></' +
                                e.bulletElement +
                                '>');
                        i.html(s),
                            (this.pagination.bullets = i.find('.' + e.bulletClass));
                    }
                    'fraction' === e.type &&
                    ((s = e.renderFraction
                        ? e.renderFraction.call(this, e.currentClass, e.totalClass)
                        : '<span class="' +
                        e.currentClass +
                        '"></span> <span class="' +
                        e.totalClass +
                        '"></span>'),
                        i.html(s)),
                    'progressbar' === e.type &&
                    ((s = e.renderProgressbar
                        ? e.renderProgressbar.call(this, e.progressbarFillClass)
                        : '<span class="' +
                        e.progressbarFillClass +
                        '"></span>'),
                        i.html(s)),
                    'custom' !== e.type &&
                    this.emit('paginationRender', this.pagination.$el[0]);
                }
            },
            init: function () {
                var e = this,
                    t = e.params.pagination;
                if (t.el) {
                    var i = s(t.el);
                    0 !== i.length &&
                    (e.params.uniqueNavElements &&
                    'string' == typeof t.el &&
                    i.length > 1 &&
                    1 === e.$el.find(t.el).length &&
                    (i = e.$el.find(t.el)),
                    'bullets' === t.type &&
                    t.clickable &&
                    i.addClass(t.clickableClass),
                        i.addClass(t.modifierClass + t.type),
                    'bullets' === t.type &&
                    t.dynamicBullets &&
                    (i.addClass('' + t.modifierClass + t.type + '-dynamic'),
                        (e.pagination.dynamicBulletIndex = 0),
                    t.dynamicMainBullets < 1 && (t.dynamicMainBullets = 1)),
                    'progressbar' === t.type &&
                    t.progressbarOpposite &&
                    i.addClass(t.progressbarOppositeClass),
                    t.clickable &&
                    i.on('click', '.' + t.bulletClass, function (t) {
                        t.preventDefault();
                        var i = s(this).index() * e.params.slidesPerGroup;
                        e.params.loop && (i += e.loopedSlides), e.slideTo(i);
                    }),
                        n.extend(e.pagination, { $el: i, el: i[0] }));
                }
            },
            destroy: function () {
                var e = this.params.pagination;
                if (
                    e.el &&
                    this.pagination.el &&
                    this.pagination.$el &&
                    0 !== this.pagination.$el.length
                ) {
                    var t = this.pagination.$el;
                    t.removeClass(e.hiddenClass),
                        t.removeClass(e.modifierClass + e.type),
                    this.pagination.bullets &&
                    this.pagination.bullets.removeClass(e.bulletActiveClass),
                    e.clickable && t.off('click', '.' + e.bulletClass);
                }
            },
        },
        re = {
            setTranslate: function () {
                if (this.params.scrollbar.el && this.scrollbar.el) {
                    var e = this.scrollbar,
                        t = this.rtlTranslate,
                        i = this.progress,
                        s = e.dragSize,
                        a = e.trackSize,
                        r = e.$dragEl,
                        n = e.$el,
                        o = this.params.scrollbar,
                        l = s,
                        d = (a - s) * i;
                    t
                        ? (d = -d) > 0
                        ? ((l = s - d), (d = 0))
                        : -d + s > a && (l = a + d)
                        : d < 0
                        ? ((l = s + d), (d = 0))
                        : d + s > a && (l = a - d),
                        this.isHorizontal()
                            ? (r.transform('translate3d(' + d + 'px, 0, 0)'),
                                (r[0].style.width = l + 'px'))
                            : (r.transform('translate3d(0px, ' + d + 'px, 0)'),
                                (r[0].style.height = l + 'px')),
                    o.hide &&
                    (clearTimeout(this.scrollbar.timeout),
                        (n[0].style.opacity = 1),
                        (this.scrollbar.timeout = setTimeout(function () {
                            (n[0].style.opacity = 0), n.transition(400);
                        }, 1e3)));
                }
            },
            setTransition: function (e) {
                this.params.scrollbar.el &&
                this.scrollbar.el &&
                this.scrollbar.$dragEl.transition(e);
            },
            updateSize: function () {
                if (this.params.scrollbar.el && this.scrollbar.el) {
                    var e = this.scrollbar,
                        t = e.$dragEl,
                        i = e.$el;
                    (t[0].style.width = ''), (t[0].style.height = '');
                    var s,
                        a = this.isHorizontal()
                            ? i[0].offsetWidth
                            : i[0].offsetHeight,
                        r = this.size / this.virtualSize,
                        o = r * (a / this.size);
                    (s =
                        'auto' === this.params.scrollbar.dragSize
                            ? a * r
                            : parseInt(this.params.scrollbar.dragSize, 10)),
                        this.isHorizontal()
                            ? (t[0].style.width = s + 'px')
                            : (t[0].style.height = s + 'px'),
                        (i[0].style.display = r >= 1 ? 'none' : ''),
                    this.params.scrollbar.hide && (i[0].style.opacity = 0),
                        n.extend(e, {
                            trackSize: a,
                            divider: r,
                            moveDivider: o,
                            dragSize: s,
                        }),
                        e.$el[
                            this.params.watchOverflow && this.isLocked
                                ? 'addClass'
                                : 'removeClass'
                            ](this.params.scrollbar.lockClass);
                }
            },
            getPointerPosition: function (e) {
                return this.isHorizontal()
                    ? 'touchstart' === e.type || 'touchmove' === e.type
                        ? e.targetTouches[0].clientX
                        : e.clientX
                    : 'touchstart' === e.type || 'touchmove' === e.type
                        ? e.targetTouches[0].clientY
                        : e.clientY;
            },
            setDragPosition: function (e) {
                var t,
                    i = this.scrollbar,
                    s = this.rtlTranslate,
                    a = i.$el,
                    r = i.dragSize,
                    n = i.trackSize,
                    o = i.dragStartPos;
                (t =
                    (i.getPointerPosition(e) -
                        a.offset()[this.isHorizontal() ? 'left' : 'top'] -
                        (null !== o ? o : r / 2)) /
                    (n - r)),
                    (t = Math.max(Math.min(t, 1), 0)),
                s && (t = 1 - t);
                var l =
                    this.minTranslate() +
                    (this.maxTranslate() - this.minTranslate()) * t;
                this.updateProgress(l),
                    this.setTranslate(l),
                    this.updateActiveIndex(),
                    this.updateSlidesClasses();
            },
            onDragStart: function (e) {
                var t = this.params.scrollbar,
                    i = this.scrollbar,
                    s = this.$wrapperEl,
                    a = i.$el,
                    r = i.$dragEl;
                (this.scrollbar.isTouched = !0),
                    (this.scrollbar.dragStartPos =
                        e.target === r[0] || e.target === r
                            ? i.getPointerPosition(e) -
                            e.target.getBoundingClientRect()[
                                this.isHorizontal() ? 'left' : 'top'
                                ]
                            : null),
                    e.preventDefault(),
                    e.stopPropagation(),
                    s.transition(100),
                    r.transition(100),
                    i.setDragPosition(e),
                    clearTimeout(this.scrollbar.dragTimeout),
                    a.transition(0),
                t.hide && a.css('opacity', 1),
                this.params.cssMode &&
                this.$wrapperEl.css('scroll-snap-type', 'none'),
                    this.emit('scrollbarDragStart', e);
            },
            onDragMove: function (e) {
                var t = this.scrollbar,
                    i = this.$wrapperEl,
                    s = t.$el,
                    a = t.$dragEl;
                this.scrollbar.isTouched &&
                (e.preventDefault ? e.preventDefault() : (e.returnValue = !1),
                    t.setDragPosition(e),
                    i.transition(0),
                    s.transition(0),
                    a.transition(0),
                    this.emit('scrollbarDragMove', e));
            },
            onDragEnd: function (e) {
                var t = this.params.scrollbar,
                    i = this.scrollbar,
                    s = this.$wrapperEl,
                    a = i.$el;
                this.scrollbar.isTouched &&
                ((this.scrollbar.isTouched = !1),
                this.params.cssMode &&
                (this.$wrapperEl.css('scroll-snap-type', ''),
                    s.transition('')),
                t.hide &&
                (clearTimeout(this.scrollbar.dragTimeout),
                    (this.scrollbar.dragTimeout = n.nextTick(function () {
                        a.css('opacity', 0), a.transition(400);
                    }, 1e3))),
                    this.emit('scrollbarDragEnd', e),
                t.snapOnRelease && this.slideToClosest());
            },
            enableDraggable: function () {
                if (this.params.scrollbar.el) {
                    var t = this.scrollbar,
                        i = this.touchEventsTouch,
                        s = this.touchEventsDesktop,
                        a = this.params,
                        r = t.$el[0],
                        n = !(!o.passiveListener || !a.passiveListeners) && {
                            passive: !1,
                            capture: !1,
                        },
                        l = !(!o.passiveListener || !a.passiveListeners) && {
                            passive: !0,
                            capture: !1,
                        };
                    o.touch
                        ? (r.addEventListener(i.start, this.scrollbar.onDragStart, n),
                            r.addEventListener(i.move, this.scrollbar.onDragMove, n),
                            r.addEventListener(i.end, this.scrollbar.onDragEnd, l))
                        : (r.addEventListener(s.start, this.scrollbar.onDragStart, n),
                            e.addEventListener(s.move, this.scrollbar.onDragMove, n),
                            e.addEventListener(s.end, this.scrollbar.onDragEnd, l));
                }
            },
            disableDraggable: function () {
                if (this.params.scrollbar.el) {
                    var t = this.scrollbar,
                        i = this.touchEventsTouch,
                        s = this.touchEventsDesktop,
                        a = this.params,
                        r = t.$el[0],
                        n = !(!o.passiveListener || !a.passiveListeners) && {
                            passive: !1,
                            capture: !1,
                        },
                        l = !(!o.passiveListener || !a.passiveListeners) && {
                            passive: !0,
                            capture: !1,
                        };
                    o.touch
                        ? (r.removeEventListener(
                        i.start,
                        this.scrollbar.onDragStart,
                        n
                        ),
                            r.removeEventListener(i.move, this.scrollbar.onDragMove, n),
                            r.removeEventListener(i.end, this.scrollbar.onDragEnd, l))
                        : (r.removeEventListener(
                        s.start,
                        this.scrollbar.onDragStart,
                        n
                        ),
                            e.removeEventListener(s.move, this.scrollbar.onDragMove, n),
                            e.removeEventListener(s.end, this.scrollbar.onDragEnd, l));
                }
            },
            init: function () {
                if (this.params.scrollbar.el) {
                    var e = this.scrollbar,
                        t = this.$el,
                        i = this.params.scrollbar,
                        a = s(i.el);
                    this.params.uniqueNavElements &&
                    'string' == typeof i.el &&
                    a.length > 1 &&
                    1 === t.find(i.el).length &&
                    (a = t.find(i.el));
                    var r = a.find('.' + this.params.scrollbar.dragClass);
                    0 === r.length &&
                    ((r = s(
                        '<div class="' +
                        this.params.scrollbar.dragClass +
                        '"></div>'
                    )),
                        a.append(r)),
                        n.extend(e, { $el: a, el: a[0], $dragEl: r, dragEl: r[0] }),
                    i.draggable && e.enableDraggable();
                }
            },
            destroy: function () {
                this.scrollbar.disableDraggable();
            },
        },
        ne = {
            setTransform: function (e, t) {
                var i = this.rtl,
                    a = s(e),
                    r = i ? -1 : 1,
                    n = a.attr('data-swiper-parallax') || '0',
                    o = a.attr('data-swiper-parallax-x'),
                    l = a.attr('data-swiper-parallax-y'),
                    d = a.attr('data-swiper-parallax-scale'),
                    h = a.attr('data-swiper-parallax-opacity');
                if (
                    (o || l
                        ? ((o = o || '0'), (l = l || '0'))
                        : this.isHorizontal()
                            ? ((o = n), (l = '0'))
                            : ((l = n), (o = '0')),
                        (o =
                            o.indexOf('%') >= 0
                                ? parseInt(o, 10) * t * r + '%'
                                : o * t * r + 'px'),
                        (l =
                            l.indexOf('%') >= 0
                                ? parseInt(l, 10) * t + '%'
                                : l * t + 'px'),
                    null != h)
                ) {
                    var p = h - (h - 1) * (1 - Math.abs(t));
                    a[0].style.opacity = p;
                }
                if (null == d)
                    a.transform('translate3d(' + o + ', ' + l + ', 0px)');
                else {
                    var c = d - (d - 1) * (1 - Math.abs(t));
                    a.transform(
                        'translate3d(' + o + ', ' + l + ', 0px) scale(' + c + ')'
                    );
                }
            },
            setTranslate: function () {
                var e = this,
                    t = e.$el,
                    i = e.slides,
                    a = e.progress,
                    r = e.snapGrid;
                t
                    .children(
                        '[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]'
                    )
                    .each(function (t, i) {
                        e.parallax.setTransform(i, a);
                    }),
                    i.each(function (t, i) {
                        var n = i.progress;
                        e.params.slidesPerGroup > 1 &&
                        'auto' !== e.params.slidesPerView &&
                        (n += Math.ceil(t / 2) - a * (r.length - 1)),
                            (n = Math.min(Math.max(n, -1), 1)),
                            s(i)
                                .find(
                                    '[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]'
                                )
                                .each(function (t, i) {
                                    e.parallax.setTransform(i, n);
                                });
                    });
            },
            setTransition: function (e) {
                void 0 === e && (e = this.params.speed);
                this.$el
                    .find(
                        '[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]'
                    )
                    .each(function (t, i) {
                        var a = s(i),
                            r =
                                parseInt(a.attr('data-swiper-parallax-duration'), 10) ||
                                e;
                        0 === e && (r = 0), a.transition(r);
                    });
            },
        },
        oe = {
            getDistanceBetweenTouches: function (e) {
                if (e.targetTouches.length < 2) return 1;
                var t = e.targetTouches[0].pageX,
                    i = e.targetTouches[0].pageY,
                    s = e.targetTouches[1].pageX,
                    a = e.targetTouches[1].pageY;
                return Math.sqrt(Math.pow(s - t, 2) + Math.pow(a - i, 2));
            },
            onGestureStart: function (e) {
                var t = this.params.zoom,
                    i = this.zoom,
                    a = i.gesture;
                if (
                    ((i.fakeGestureTouched = !1),
                        (i.fakeGestureMoved = !1),
                        !o.gestures)
                ) {
                    if (
                        'touchstart' !== e.type ||
                        ('touchstart' === e.type && e.targetTouches.length < 2)
                    )
                        return;
                    (i.fakeGestureTouched = !0),
                        (a.scaleStart = oe.getDistanceBetweenTouches(e));
                }
                (a.$slideEl && a.$slideEl.length) ||
                ((a.$slideEl = s(e.target).closest('.swiper-slide')),
                0 === a.$slideEl.length &&
                (a.$slideEl = this.slides.eq(this.activeIndex)),
                    (a.$imageEl = a.$slideEl.find('img, svg, canvas')),
                    (a.$imageWrapEl = a.$imageEl.parent('.' + t.containerClass)),
                    (a.maxRatio =
                        a.$imageWrapEl.attr('data-swiper-zoom') || t.maxRatio),
                0 !== a.$imageWrapEl.length)
                    ? (a.$imageEl.transition(0), (this.zoom.isScaling = !0))
                    : (a.$imageEl = void 0);
            },
            onGestureChange: function (e) {
                var t = this.params.zoom,
                    i = this.zoom,
                    s = i.gesture;
                if (!o.gestures) {
                    if (
                        'touchmove' !== e.type ||
                        ('touchmove' === e.type && e.targetTouches.length < 2)
                    )
                        return;
                    (i.fakeGestureMoved = !0),
                        (s.scaleMove = oe.getDistanceBetweenTouches(e));
                }
                s.$imageEl &&
                0 !== s.$imageEl.length &&
                (o.gestures
                    ? (i.scale = e.scale * i.currentScale)
                    : (i.scale = (s.scaleMove / s.scaleStart) * i.currentScale),
                i.scale > s.maxRatio &&
                (i.scale =
                    s.maxRatio - 1 + Math.pow(i.scale - s.maxRatio + 1, 0.5)),
                i.scale < t.minRatio &&
                (i.scale =
                    t.minRatio + 1 - Math.pow(t.minRatio - i.scale + 1, 0.5)),
                    s.$imageEl.transform(
                        'translate3d(0,0,0) scale(' + i.scale + ')'
                    ));
            },
            onGestureEnd: function (e) {
                var t = this.params.zoom,
                    i = this.zoom,
                    s = i.gesture;
                if (!o.gestures) {
                    if (!i.fakeGestureTouched || !i.fakeGestureMoved) return;
                    if (
                        'touchend' !== e.type ||
                        ('touchend' === e.type &&
                            e.changedTouches.length < 2 &&
                            !I.android)
                    )
                        return;
                    (i.fakeGestureTouched = !1), (i.fakeGestureMoved = !1);
                }
                s.$imageEl &&
                0 !== s.$imageEl.length &&
                ((i.scale = Math.max(Math.min(i.scale, s.maxRatio), t.minRatio)),
                    s.$imageEl
                        .transition(this.params.speed)
                        .transform('translate3d(0,0,0) scale(' + i.scale + ')'),
                    (i.currentScale = i.scale),
                    (i.isScaling = !1),
                1 === i.scale && (s.$slideEl = void 0));
            },
            onTouchStart: function (e) {
                var t = this.zoom,
                    i = t.gesture,
                    s = t.image;
                i.$imageEl &&
                0 !== i.$imageEl.length &&
                (s.isTouched ||
                    (I.android && e.preventDefault(),
                        (s.isTouched = !0),
                        (s.touchesStart.x =
                            'touchstart' === e.type
                                ? e.targetTouches[0].pageX
                                : e.pageX),
                        (s.touchesStart.y =
                            'touchstart' === e.type
                                ? e.targetTouches[0].pageY
                                : e.pageY)));
            },
            onTouchMove: function (e) {
                var t = this.zoom,
                    i = t.gesture,
                    s = t.image,
                    a = t.velocity;
                if (
                    i.$imageEl &&
                    0 !== i.$imageEl.length &&
                    ((this.allowClick = !1), s.isTouched && i.$slideEl)
                ) {
                    s.isMoved ||
                    ((s.width = i.$imageEl[0].offsetWidth),
                        (s.height = i.$imageEl[0].offsetHeight),
                        (s.startX = n.getTranslate(i.$imageWrapEl[0], 'x') || 0),
                        (s.startY = n.getTranslate(i.$imageWrapEl[0], 'y') || 0),
                        (i.slideWidth = i.$slideEl[0].offsetWidth),
                        (i.slideHeight = i.$slideEl[0].offsetHeight),
                        i.$imageWrapEl.transition(0),
                    this.rtl && ((s.startX = -s.startX), (s.startY = -s.startY)));
                    var r = s.width * t.scale,
                        o = s.height * t.scale;
                    if (!(r < i.slideWidth && o < i.slideHeight)) {
                        if (
                            ((s.minX = Math.min(i.slideWidth / 2 - r / 2, 0)),
                                (s.maxX = -s.minX),
                                (s.minY = Math.min(i.slideHeight / 2 - o / 2, 0)),
                                (s.maxY = -s.minY),
                                (s.touchesCurrent.x =
                                    'touchmove' === e.type
                                        ? e.targetTouches[0].pageX
                                        : e.pageX),
                                (s.touchesCurrent.y =
                                    'touchmove' === e.type
                                        ? e.targetTouches[0].pageY
                                        : e.pageY),
                            !s.isMoved && !t.isScaling)
                        ) {
                            if (
                                this.isHorizontal() &&
                                ((Math.floor(s.minX) === Math.floor(s.startX) &&
                                    s.touchesCurrent.x < s.touchesStart.x) ||
                                    (Math.floor(s.maxX) === Math.floor(s.startX) &&
                                        s.touchesCurrent.x > s.touchesStart.x))
                            )
                                return void (s.isTouched = !1);
                            if (
                                !this.isHorizontal() &&
                                ((Math.floor(s.minY) === Math.floor(s.startY) &&
                                    s.touchesCurrent.y < s.touchesStart.y) ||
                                    (Math.floor(s.maxY) === Math.floor(s.startY) &&
                                        s.touchesCurrent.y > s.touchesStart.y))
                            )
                                return void (s.isTouched = !1);
                        }
                        e.preventDefault(),
                            e.stopPropagation(),
                            (s.isMoved = !0),
                            (s.currentX =
                                s.touchesCurrent.x - s.touchesStart.x + s.startX),
                            (s.currentY =
                                s.touchesCurrent.y - s.touchesStart.y + s.startY),
                        s.currentX < s.minX &&
                        (s.currentX =
                            s.minX + 1 - Math.pow(s.minX - s.currentX + 1, 0.8)),
                        s.currentX > s.maxX &&
                        (s.currentX =
                            s.maxX - 1 + Math.pow(s.currentX - s.maxX + 1, 0.8)),
                        s.currentY < s.minY &&
                        (s.currentY =
                            s.minY + 1 - Math.pow(s.minY - s.currentY + 1, 0.8)),
                        s.currentY > s.maxY &&
                        (s.currentY =
                            s.maxY - 1 + Math.pow(s.currentY - s.maxY + 1, 0.8)),
                        a.prevPositionX || (a.prevPositionX = s.touchesCurrent.x),
                        a.prevPositionY || (a.prevPositionY = s.touchesCurrent.y),
                        a.prevTime || (a.prevTime = Date.now()),
                            (a.x =
                                (s.touchesCurrent.x - a.prevPositionX) /
                                (Date.now() - a.prevTime) /
                                2),
                            (a.y =
                                (s.touchesCurrent.y - a.prevPositionY) /
                                (Date.now() - a.prevTime) /
                                2),
                        Math.abs(s.touchesCurrent.x - a.prevPositionX) < 2 &&
                        (a.x = 0),
                        Math.abs(s.touchesCurrent.y - a.prevPositionY) < 2 &&
                        (a.y = 0),
                            (a.prevPositionX = s.touchesCurrent.x),
                            (a.prevPositionY = s.touchesCurrent.y),
                            (a.prevTime = Date.now()),
                            i.$imageWrapEl.transform(
                                'translate3d(' +
                                s.currentX +
                                'px, ' +
                                s.currentY +
                                'px,0)'
                            );
                    }
                }
            },
            onTouchEnd: function () {
                var e = this.zoom,
                    t = e.gesture,
                    i = e.image,
                    s = e.velocity;
                if (t.$imageEl && 0 !== t.$imageEl.length) {
                    if (!i.isTouched || !i.isMoved)
                        return (i.isTouched = !1), void (i.isMoved = !1);
                    (i.isTouched = !1), (i.isMoved = !1);
                    var a = 300,
                        r = 300,
                        n = s.x * a,
                        o = i.currentX + n,
                        l = s.y * r,
                        d = i.currentY + l;
                    0 !== s.x && (a = Math.abs((o - i.currentX) / s.x)),
                    0 !== s.y && (r = Math.abs((d - i.currentY) / s.y));
                    var h = Math.max(a, r);
                    (i.currentX = o), (i.currentY = d);
                    var p = i.width * e.scale,
                        c = i.height * e.scale;
                    (i.minX = Math.min(t.slideWidth / 2 - p / 2, 0)),
                        (i.maxX = -i.minX),
                        (i.minY = Math.min(t.slideHeight / 2 - c / 2, 0)),
                        (i.maxY = -i.minY),
                        (i.currentX = Math.max(Math.min(i.currentX, i.maxX), i.minX)),
                        (i.currentY = Math.max(Math.min(i.currentY, i.maxY), i.minY)),
                        t.$imageWrapEl
                            .transition(h)
                            .transform(
                                'translate3d(' +
                                i.currentX +
                                'px, ' +
                                i.currentY +
                                'px,0)'
                            );
                }
            },
            onTransitionEnd: function () {
                var e = this.zoom,
                    t = e.gesture;
                t.$slideEl &&
                this.previousIndex !== this.activeIndex &&
                (t.$imageEl.transform('translate3d(0,0,0) scale(1)'),
                    t.$imageWrapEl.transform('translate3d(0,0,0)'),
                    (e.scale = 1),
                    (e.currentScale = 1),
                    (t.$slideEl = void 0),
                    (t.$imageEl = void 0),
                    (t.$imageWrapEl = void 0));
            },
            toggle: function (e) {
                var t = this.zoom;
                t.scale && 1 !== t.scale ? t.out() : t.in(e);
            },
            in: function (e) {
                var t,
                    i,
                    a,
                    r,
                    n,
                    o,
                    l,
                    d,
                    h,
                    p,
                    c,
                    u,
                    v,
                    f,
                    m,
                    g,
                    b = this.zoom,
                    w = this.params.zoom,
                    y = b.gesture,
                    x = b.image;
                (y.$slideEl ||
                ((y.$slideEl = this.clickedSlide
                    ? s(this.clickedSlide)
                    : this.slides.eq(this.activeIndex)),
                    (y.$imageEl = y.$slideEl.find('img, svg, canvas')),
                    (y.$imageWrapEl = y.$imageEl.parent('.' + w.containerClass))),
                y.$imageEl && 0 !== y.$imageEl.length) &&
                (y.$slideEl.addClass('' + w.zoomedSlideClass),
                    void 0 === x.touchesStart.x && e
                        ? ((t =
                            'touchend' === e.type
                                ? e.changedTouches[0].pageX
                                : e.pageX),
                            (i =
                                'touchend' === e.type
                                    ? e.changedTouches[0].pageY
                                    : e.pageY))
                        : ((t = x.touchesStart.x), (i = x.touchesStart.y)),
                    (b.scale =
                        y.$imageWrapEl.attr('data-swiper-zoom') || w.maxRatio),
                    (b.currentScale =
                        y.$imageWrapEl.attr('data-swiper-zoom') || w.maxRatio),
                    e
                        ? ((m = y.$slideEl[0].offsetWidth),
                            (g = y.$slideEl[0].offsetHeight),
                            (a = y.$slideEl.offset().left + m / 2 - t),
                            (r = y.$slideEl.offset().top + g / 2 - i),
                            (l = y.$imageEl[0].offsetWidth),
                            (d = y.$imageEl[0].offsetHeight),
                            (h = l * b.scale),
                            (p = d * b.scale),
                            (v = -(c = Math.min(m / 2 - h / 2, 0))),
                            (f = -(u = Math.min(g / 2 - p / 2, 0))),
                        (n = a * b.scale) < c && (n = c),
                        n > v && (n = v),
                        (o = r * b.scale) < u && (o = u),
                        o > f && (o = f))
                        : ((n = 0), (o = 0)),
                    y.$imageWrapEl
                        .transition(300)
                        .transform('translate3d(' + n + 'px, ' + o + 'px,0)'),
                    y.$imageEl
                        .transition(300)
                        .transform('translate3d(0,0,0) scale(' + b.scale + ')'));
            },
            out: function () {
                var e = this.zoom,
                    t = this.params.zoom,
                    i = e.gesture;
                i.$slideEl ||
                ((i.$slideEl = this.clickedSlide
                    ? s(this.clickedSlide)
                    : this.slides.eq(this.activeIndex)),
                    (i.$imageEl = i.$slideEl.find('img, svg, canvas')),
                    (i.$imageWrapEl = i.$imageEl.parent('.' + t.containerClass))),
                i.$imageEl &&
                0 !== i.$imageEl.length &&
                ((e.scale = 1),
                    (e.currentScale = 1),
                    i.$imageWrapEl
                        .transition(300)
                        .transform('translate3d(0,0,0)'),
                    i.$imageEl
                        .transition(300)
                        .transform('translate3d(0,0,0) scale(1)'),
                    i.$slideEl.removeClass('' + t.zoomedSlideClass),
                    (i.$slideEl = void 0));
            },
            enable: function () {
                var e = this.zoom;
                if (!e.enabled) {
                    e.enabled = !0;
                    var t = !(
                            'touchstart' !== this.touchEvents.start ||
                            !o.passiveListener ||
                            !this.params.passiveListeners
                        ) && { passive: !0, capture: !1 },
                        i = !o.passiveListener || { passive: !1, capture: !0 };
                    o.gestures
                        ? (this.$wrapperEl.on(
                        'gesturestart',
                        '.swiper-slide',
                        e.onGestureStart,
                        t
                        ),
                            this.$wrapperEl.on(
                                'gesturechange',
                                '.swiper-slide',
                                e.onGestureChange,
                                t
                            ),
                            this.$wrapperEl.on(
                                'gestureend',
                                '.swiper-slide',
                                e.onGestureEnd,
                                t
                            ))
                        : 'touchstart' === this.touchEvents.start &&
                        (this.$wrapperEl.on(
                            this.touchEvents.start,
                            '.swiper-slide',
                            e.onGestureStart,
                            t
                        ),
                            this.$wrapperEl.on(
                                this.touchEvents.move,
                                '.swiper-slide',
                                e.onGestureChange,
                                i
                            ),
                            this.$wrapperEl.on(
                                this.touchEvents.end,
                                '.swiper-slide',
                                e.onGestureEnd,
                                t
                            ),
                        this.touchEvents.cancel &&
                        this.$wrapperEl.on(
                            this.touchEvents.cancel,
                            '.swiper-slide',
                            e.onGestureEnd,
                            t
                        )),
                        this.$wrapperEl.on(
                            this.touchEvents.move,
                            '.' + this.params.zoom.containerClass,
                            e.onTouchMove,
                            i
                        );
                }
            },
            disable: function () {
                var e = this.zoom;
                if (e.enabled) {
                    this.zoom.enabled = !1;
                    var t = !(
                            'touchstart' !== this.touchEvents.start ||
                            !o.passiveListener ||
                            !this.params.passiveListeners
                        ) && { passive: !0, capture: !1 },
                        i = !o.passiveListener || { passive: !1, capture: !0 };
                    o.gestures
                        ? (this.$wrapperEl.off(
                        'gesturestart',
                        '.swiper-slide',
                        e.onGestureStart,
                        t
                        ),
                            this.$wrapperEl.off(
                                'gesturechange',
                                '.swiper-slide',
                                e.onGestureChange,
                                t
                            ),
                            this.$wrapperEl.off(
                                'gestureend',
                                '.swiper-slide',
                                e.onGestureEnd,
                                t
                            ))
                        : 'touchstart' === this.touchEvents.start &&
                        (this.$wrapperEl.off(
                            this.touchEvents.start,
                            '.swiper-slide',
                            e.onGestureStart,
                            t
                        ),
                            this.$wrapperEl.off(
                                this.touchEvents.move,
                                '.swiper-slide',
                                e.onGestureChange,
                                i
                            ),
                            this.$wrapperEl.off(
                                this.touchEvents.end,
                                '.swiper-slide',
                                e.onGestureEnd,
                                t
                            ),
                        this.touchEvents.cancel &&
                        this.$wrapperEl.off(
                            this.touchEvents.cancel,
                            '.swiper-slide',
                            e.onGestureEnd,
                            t
                        )),
                        this.$wrapperEl.off(
                            this.touchEvents.move,
                            '.' + this.params.zoom.containerClass,
                            e.onTouchMove,
                            i
                        );
                }
            },
        },
        le = {
            loadInSlide: function (e, t) {
                void 0 === t && (t = !0);
                var i = this,
                    a = i.params.lazy;
                if (void 0 !== e && 0 !== i.slides.length) {
                    var r =
                            i.virtual && i.params.virtual.enabled
                                ? i.$wrapperEl.children(
                                '.' +
                                i.params.slideClass +
                                '[data-swiper-slide-index="' +
                                e +
                                '"]'
                                )
                                : i.slides.eq(e),
                        n = r.find(
                            '.' +
                            a.elementClass +
                            ':not(.' +
                            a.loadedClass +
                            '):not(.' +
                            a.loadingClass +
                            ')'
                        );
                    !r.hasClass(a.elementClass) ||
                    r.hasClass(a.loadedClass) ||
                    r.hasClass(a.loadingClass) ||
                    (n = n.add(r[0])),
                    0 !== n.length &&
                    n.each(function (e, n) {
                        var o = s(n);
                        o.addClass(a.loadingClass);
                        var l = o.attr('data-background'),
                            d = o.attr('data-src'),
                            h = o.attr('data-srcset'),
                            p = o.attr('data-sizes');
                        i.loadImage(o[0], d || l, h, p, !1, function () {
                            if (
                                null != i &&
                                i &&
                                (!i || i.params) &&
                                !i.destroyed
                            ) {
                                if (
                                    (l
                                        ? (o.css(
                                            'background-image',
                                            'url("' + l + '")'
                                        ),
                                            o.removeAttr('data-background'))
                                        : (h &&
                                        (o.attr('srcset', h),
                                            o.removeAttr('data-srcset')),
                                        p &&
                                        (o.attr('sizes', p),
                                            o.removeAttr('data-sizes')),
                                        d &&
                                        (o.attr('src', d),
                                            o.removeAttr('data-src'))),
                                        o
                                            .addClass(a.loadedClass)
                                            .removeClass(a.loadingClass),
                                        r.find('.' + a.preloaderClass).remove(),
                                    i.params.loop && t)
                                ) {
                                    var e = r.attr('data-swiper-slide-index');
                                    if (r.hasClass(i.params.slideDuplicateClass)) {
                                        var s = i.$wrapperEl.children(
                                            '[data-swiper-slide-index="' +
                                            e +
                                            '"]:not(.' +
                                            i.params.slideDuplicateClass +
                                            ')'
                                        );
                                        i.lazy.loadInSlide(s.index(), !1);
                                    } else {
                                        var n = i.$wrapperEl.children(
                                            '.' +
                                            i.params.slideDuplicateClass +
                                            '[data-swiper-slide-index="' +
                                            e +
                                            '"]'
                                        );
                                        i.lazy.loadInSlide(n.index(), !1);
                                    }
                                }
                                i.emit('lazyImageReady', r[0], o[0]);
                            }
                        }),
                            i.emit('lazyImageLoad', r[0], o[0]);
                    });
                }
            },
            load: function () {
                var e = this,
                    t = e.$wrapperEl,
                    i = e.params,
                    a = e.slides,
                    r = e.activeIndex,
                    n = e.virtual && i.virtual.enabled,
                    o = i.lazy,
                    l = i.slidesPerView;
                function d(e) {
                    if (n) {
                        if (
                            t.children(
                                '.' +
                                i.slideClass +
                                '[data-swiper-slide-index="' +
                                e +
                                '"]'
                            ).length
                        )
                            return !0;
                    } else if (a[e]) return !0;
                    return !1;
                }
                function h(e) {
                    return n ? s(e).attr('data-swiper-slide-index') : s(e).index();
                }
                if (
                    ('auto' === l && (l = 0),
                    e.lazy.initialImageLoaded || (e.lazy.initialImageLoaded = !0),
                        e.params.watchSlidesVisibility)
                )
                    t.children('.' + i.slideVisibleClass).each(function (t, i) {
                        var a = n
                            ? s(i).attr('data-swiper-slide-index')
                            : s(i).index();
                        e.lazy.loadInSlide(a);
                    });
                else if (l > 1)
                    for (var p = r; p < r + l; p += 1) d(p) && e.lazy.loadInSlide(p);
                else e.lazy.loadInSlide(r);
                if (o.loadPrevNext)
                    if (
                        l > 1 ||
                        (o.loadPrevNextAmount && o.loadPrevNextAmount > 1)
                    ) {
                        for (
                            var c = o.loadPrevNextAmount,
                                u = l,
                                v = Math.min(r + u + Math.max(c, u), a.length),
                                f = Math.max(r - Math.max(u, c), 0),
                                m = r + l;
                            m < v;
                            m += 1
                        )
                            d(m) && e.lazy.loadInSlide(m);
                        for (var g = f; g < r; g += 1) d(g) && e.lazy.loadInSlide(g);
                    } else {
                        var b = t.children('.' + i.slideNextClass);
                        b.length > 0 && e.lazy.loadInSlide(h(b));
                        var w = t.children('.' + i.slidePrevClass);
                        w.length > 0 && e.lazy.loadInSlide(h(w));
                    }
            },
        },
        de = {
            LinearSpline: function (e, t) {
                var i,
                    s,
                    a,
                    r,
                    n,
                    o = function (e, t) {
                        for (s = -1, i = e.length; i - s > 1; )
                            e[(a = (i + s) >> 1)] <= t ? (s = a) : (i = a);
                        return i;
                    };
                return (
                    (this.x = e),
                        (this.y = t),
                        (this.lastIndex = e.length - 1),
                        (this.interpolate = function (e) {
                            return e
                                ? ((n = o(this.x, e)),
                                    (r = n - 1),
                                ((e - this.x[r]) * (this.y[n] - this.y[r])) /
                                (this.x[n] - this.x[r]) +
                                this.y[r])
                                : 0;
                        }),
                        this
                );
            },
            getInterpolateFunction: function (e) {
                this.controller.spline ||
                (this.controller.spline = this.params.loop
                    ? new de.LinearSpline(this.slidesGrid, e.slidesGrid)
                    : new de.LinearSpline(this.snapGrid, e.snapGrid));
            },
            setTranslate: function (e, t) {
                var i,
                    s,
                    a = this,
                    r = a.controller.control;
                function n(e) {
                    var t = a.rtlTranslate ? -a.translate : a.translate;
                    'slide' === a.params.controller.by &&
                    (a.controller.getInterpolateFunction(e),
                        (s = -a.controller.spline.interpolate(-t))),
                    (s && 'container' !== a.params.controller.by) ||
                    ((i =
                        (e.maxTranslate() - e.minTranslate()) /
                        (a.maxTranslate() - a.minTranslate())),
                        (s = (t - a.minTranslate()) * i + e.minTranslate())),
                    a.params.controller.inverse && (s = e.maxTranslate() - s),
                        e.updateProgress(s),
                        e.setTranslate(s, a),
                        e.updateActiveIndex(),
                        e.updateSlidesClasses();
                }
                if (Array.isArray(r))
                    for (var o = 0; o < r.length; o += 1)
                        r[o] !== t && r[o] instanceof W && n(r[o]);
                else r instanceof W && t !== r && n(r);
            },
            setTransition: function (e, t) {
                var i,
                    s = this,
                    a = s.controller.control;
                function r(t) {
                    t.setTransition(e, s),
                    0 !== e &&
                    (t.transitionStart(),
                    t.params.autoHeight &&
                    n.nextTick(function () {
                        t.updateAutoHeight();
                    }),
                        t.$wrapperEl.transitionEnd(function () {
                            a &&
                            (t.params.loop &&
                            'slide' === s.params.controller.by &&
                            t.loopFix(),
                                t.transitionEnd());
                        }));
                }
                if (Array.isArray(a))
                    for (i = 0; i < a.length; i += 1)
                        a[i] !== t && a[i] instanceof W && r(a[i]);
                else a instanceof W && t !== a && r(a);
            },
        },
        he = {
            makeElFocusable: function (e) {
                return e.attr('tabIndex', '0'), e;
            },
            addElRole: function (e, t) {
                return e.attr('role', t), e;
            },
            addElLabel: function (e, t) {
                return e.attr('aria-label', t), e;
            },
            disableEl: function (e) {
                return e.attr('aria-disabled', !0), e;
            },
            enableEl: function (e) {
                return e.attr('aria-disabled', !1), e;
            },
            onEnterKey: function (e) {
                var t = this.params.a11y;
                if (13 === e.keyCode) {
                    var i = s(e.target);
                    this.navigation &&
                    this.navigation.$nextEl &&
                    i.is(this.navigation.$nextEl) &&
                    ((this.isEnd && !this.params.loop) || this.slideNext(),
                        this.isEnd
                            ? this.a11y.notify(t.lastSlideMessage)
                            : this.a11y.notify(t.nextSlideMessage)),
                    this.navigation &&
                    this.navigation.$prevEl &&
                    i.is(this.navigation.$prevEl) &&
                    ((this.isBeginning && !this.params.loop) ||
                    this.slidePrev(),
                        this.isBeginning
                            ? this.a11y.notify(t.firstSlideMessage)
                            : this.a11y.notify(t.prevSlideMessage)),
                    this.pagination &&
                    i.is('.' + this.params.pagination.bulletClass) &&
                    i[0].click();
                }
            },
            notify: function (e) {
                var t = this.a11y.liveRegion;
                0 !== t.length && (t.html(''), t.html(e));
            },
            updateNavigation: function () {
                if (!this.params.loop) {
                    var e = this.navigation,
                        t = e.$nextEl,
                        i = e.$prevEl;
                    i &&
                    i.length > 0 &&
                    (this.isBeginning
                        ? this.a11y.disableEl(i)
                        : this.a11y.enableEl(i)),
                    t &&
                    t.length > 0 &&
                    (this.isEnd
                        ? this.a11y.disableEl(t)
                        : this.a11y.enableEl(t));
                }
            },
            updatePagination: function () {
                var e = this,
                    t = e.params.a11y;
                e.pagination &&
                e.params.pagination.clickable &&
                e.pagination.bullets &&
                e.pagination.bullets.length &&
                e.pagination.bullets.each(function (i, a) {
                    var r = s(a);
                    e.a11y.makeElFocusable(r),
                        e.a11y.addElRole(r, 'button'),
                        e.a11y.addElLabel(
                            r,
                            t.paginationBulletMessage.replace(
                                /{{index}}/,
                                r.index() + 1
                            )
                        );
                });
            },
            init: function () {
                this.$el.append(this.a11y.liveRegion);
                var e,
                    t,
                    i = this.params.a11y;
                this.navigation &&
                this.navigation.$nextEl &&
                (e = this.navigation.$nextEl),
                this.navigation &&
                this.navigation.$prevEl &&
                (t = this.navigation.$prevEl),
                e &&
                (this.a11y.makeElFocusable(e),
                    this.a11y.addElRole(e, 'button'),
                    this.a11y.addElLabel(e, i.nextSlideMessage),
                    e.on('keydown', this.a11y.onEnterKey)),
                t &&
                (this.a11y.makeElFocusable(t),
                    this.a11y.addElRole(t, 'button'),
                    this.a11y.addElLabel(t, i.prevSlideMessage),
                    t.on('keydown', this.a11y.onEnterKey)),
                this.pagination &&
                this.params.pagination.clickable &&
                this.pagination.bullets &&
                this.pagination.bullets.length &&
                this.pagination.$el.on(
                    'keydown',
                    '.' + this.params.pagination.bulletClass,
                    this.a11y.onEnterKey
                );
            },
            destroy: function () {
                var e, t;
                this.a11y.liveRegion &&
                this.a11y.liveRegion.length > 0 &&
                this.a11y.liveRegion.remove(),
                this.navigation &&
                this.navigation.$nextEl &&
                (e = this.navigation.$nextEl),
                this.navigation &&
                this.navigation.$prevEl &&
                (t = this.navigation.$prevEl),
                e && e.off('keydown', this.a11y.onEnterKey),
                t && t.off('keydown', this.a11y.onEnterKey),
                this.pagination &&
                this.params.pagination.clickable &&
                this.pagination.bullets &&
                this.pagination.bullets.length &&
                this.pagination.$el.off(
                    'keydown',
                    '.' + this.params.pagination.bulletClass,
                    this.a11y.onEnterKey
                );
            },
        },
        pe = {
            init: function () {
                if (this.params.history) {
                    if (!t.history || !t.history.pushState)
                        return (
                            (this.params.history.enabled = !1),
                                void (this.params.hashNavigation.enabled = !0)
                        );
                    var e = this.history;
                    (e.initialized = !0),
                        (e.paths = pe.getPathValues()),
                    (e.paths.key || e.paths.value) &&
                    (e.scrollToSlide(
                        0,
                        e.paths.value,
                        this.params.runCallbacksOnInit
                    ),
                    this.params.history.replaceState ||
                    t.addEventListener(
                        'popstate',
                        this.history.setHistoryPopState
                    ));
                }
            },
            destroy: function () {
                this.params.history.replaceState ||
                t.removeEventListener(
                    'popstate',
                    this.history.setHistoryPopState
                );
            },
            setHistoryPopState: function () {
                (this.history.paths = pe.getPathValues()),
                    this.history.scrollToSlide(
                        this.params.speed,
                        this.history.paths.value,
                        !1
                    );
            },
            getPathValues: function () {
                var e = t.location.pathname
                        .slice(1)
                        .split('http://innovationplans.com/')
                        .filter(function (e) {
                            return '' !== e;
                        }),
                    i = e.length;
                return { key: e[i - 2], value: e[i - 1] };
            },
            setHistory: function (e, i) {
                if (this.history.initialized && this.params.history.enabled) {
                    var s = this.slides.eq(i),
                        a = pe.slugify(s.attr('data-history'));
                    t.location.pathname.includes(e) || (a = e + '/' + a);
                    var r = t.history.state;
                    (r && r.value === a) ||
                    (this.params.history.replaceState
                        ? t.history.replaceState({ value: a }, null, a)
                        : t.history.pushState({ value: a }, null, a));
                }
            },
            slugify: function (e) {
                return e
                    .toString()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w-]+/g, '')
                    .replace(/--+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            },
            scrollToSlide: function (e, t, i) {
                if (t)
                    for (var s = 0, a = this.slides.length; s < a; s += 1) {
                        var r = this.slides.eq(s);
                        if (
                            pe.slugify(r.attr('data-history')) === t &&
                            !r.hasClass(this.params.slideDuplicateClass)
                        ) {
                            var n = r.index();
                            this.slideTo(n, e, i);
                        }
                    }
                else this.slideTo(0, e, i);
            },
        },
        ce = {
            onHashCange: function () {
                var t = e.location.hash.replace('#', '');
                if (t !== this.slides.eq(this.activeIndex).attr('data-hash')) {
                    var i = this.$wrapperEl
                        .children(
                            '.' + this.params.slideClass + '[data-hash="' + t + '"]'
                        )
                        .index();
                    if (void 0 === i) return;
                    this.slideTo(i);
                }
            },
            setHash: function () {
                if (
                    this.hashNavigation.initialized &&
                    this.params.hashNavigation.enabled
                )
                    if (
                        this.params.hashNavigation.replaceState &&
                        t.history &&
                        t.history.replaceState
                    )
                        t.history.replaceState(
                            null,
                            null,
                            '#' + this.slides.eq(this.activeIndex).attr('data-hash') ||
                            ''
                        );
                    else {
                        var i = this.slides.eq(this.activeIndex),
                            s = i.attr('data-hash') || i.attr('data-history');
                        e.location.hash = s || '';
                    }
            },
            init: function () {
                if (
                    !(
                        !this.params.hashNavigation.enabled ||
                        (this.params.history && this.params.history.enabled)
                    )
                ) {
                    this.hashNavigation.initialized = !0;
                    var i = e.location.hash.replace('#', '');
                    if (i)
                        for (var a = 0, r = this.slides.length; a < r; a += 1) {
                            var n = this.slides.eq(a);
                            if (
                                (n.attr('data-hash') || n.attr('data-history')) === i &&
                                !n.hasClass(this.params.slideDuplicateClass)
                            ) {
                                var o = n.index();
                                this.slideTo(o, 0, this.params.runCallbacksOnInit, !0);
                            }
                        }
                    this.params.hashNavigation.watchState &&
                    s(t).on('hashchange', this.hashNavigation.onHashCange);
                }
            },
            destroy: function () {
                this.params.hashNavigation.watchState &&
                s(t).off('hashchange', this.hashNavigation.onHashCange);
            },
        },
        ue = {
            run: function () {
                var e = this,
                    t = e.slides.eq(e.activeIndex),
                    i = e.params.autoplay.delay;
                t.attr('data-swiper-autoplay') &&
                (i = t.attr('data-swiper-autoplay') || e.params.autoplay.delay),
                    clearTimeout(e.autoplay.timeout),
                    (e.autoplay.timeout = n.nextTick(function () {
                        e.params.autoplay.reverseDirection
                            ? e.params.loop
                            ? (e.loopFix(),
                                e.slidePrev(e.params.speed, !0, !0),
                                e.emit('autoplay'))
                            : e.isBeginning
                                ? e.params.autoplay.stopOnLastSlide
                                    ? e.autoplay.stop()
                                    : (e.slideTo(
                                        e.slides.length - 1,
                                        e.params.speed,
                                        !0,
                                        !0
                                    ),
                                        e.emit('autoplay'))
                                : (e.slidePrev(e.params.speed, !0, !0),
                                    e.emit('autoplay'))
                            : e.params.loop
                            ? (e.loopFix(),
                                e.slideNext(e.params.speed, !0, !0),
                                e.emit('autoplay'))
                            : e.isEnd
                                ? e.params.autoplay.stopOnLastSlide
                                    ? e.autoplay.stop()
                                    : (e.slideTo(0, e.params.speed, !0, !0),
                                        e.emit('autoplay'))
                                : (e.slideNext(e.params.speed, !0, !0),
                                    e.emit('autoplay')),
                        e.params.cssMode && e.autoplay.running && e.autoplay.run();
                    }, i));
            },
            start: function () {
                return (
                    void 0 === this.autoplay.timeout &&
                    !this.autoplay.running &&
                    ((this.autoplay.running = !0),
                        this.emit('autoplayStart'),
                        this.autoplay.run(),
                        !0)
                );
            },
            stop: function () {
                return (
                    !!this.autoplay.running &&
                    void 0 !== this.autoplay.timeout &&
                    (this.autoplay.timeout &&
                    (clearTimeout(this.autoplay.timeout),
                        (this.autoplay.timeout = void 0)),
                        (this.autoplay.running = !1),
                        this.emit('autoplayStop'),
                        !0)
                );
            },
            pause: function (e) {
                this.autoplay.running &&
                (this.autoplay.paused ||
                    (this.autoplay.timeout && clearTimeout(this.autoplay.timeout),
                        (this.autoplay.paused = !0),
                        0 !== e && this.params.autoplay.waitForTransition
                            ? (this.$wrapperEl[0].addEventListener(
                            'transitionend',
                            this.autoplay.onTransitionEnd
                            ),
                                this.$wrapperEl[0].addEventListener(
                                    'webkitTransitionEnd',
                                    this.autoplay.onTransitionEnd
                                ))
                            : ((this.autoplay.paused = !1), this.autoplay.run())));
            },
        },
        ve = {
            setTranslate: function () {
                for (var e = this.slides, t = 0; t < e.length; t += 1) {
                    var i = this.slides.eq(t),
                        s = -i[0].swiperSlideOffset;
                    this.params.virtualTranslate || (s -= this.translate);
                    var a = 0;
                    this.isHorizontal() || ((a = s), (s = 0));
                    var r = this.params.fadeEffect.crossFade
                        ? Math.max(1 - Math.abs(i[0].progress), 0)
                        : 1 + Math.min(Math.max(i[0].progress, -1), 0);
                    i.css({ opacity: r }).transform(
                        'translate3d(' + s + 'px, ' + a + 'px, 0px)'
                    );
                }
            },
            setTransition: function (e) {
                var t = this,
                    i = t.slides,
                    s = t.$wrapperEl;
                if ((i.transition(e), t.params.virtualTranslate && 0 !== e)) {
                    var a = !1;
                    i.transitionEnd(function () {
                        if (!a && t && !t.destroyed) {
                            (a = !0), (t.animating = !1);
                            for (
                                var e = ['webkitTransitionEnd', 'transitionend'], i = 0;
                                i < e.length;
                                i += 1
                            )
                                s.trigger(e[i]);
                        }
                    });
                }
            },
        },
        fe = {
            setTranslate: function () {
                var e,
                    t = this.$el,
                    i = this.$wrapperEl,
                    a = this.slides,
                    r = this.width,
                    n = this.height,
                    o = this.rtlTranslate,
                    l = this.size,
                    d = this.params.cubeEffect,
                    h = this.isHorizontal(),
                    p = this.virtual && this.params.virtual.enabled,
                    c = 0;
                d.shadow &&
                (h
                    ? (0 === (e = i.find('.swiper-cube-shadow')).length &&
                    ((e = s('<div class="swiper-cube-shadow"></div>')),
                        i.append(e)),
                        e.css({ height: r + 'px' }))
                    : 0 === (e = t.find('.swiper-cube-shadow')).length &&
                    ((e = s('<div class="swiper-cube-shadow"></div>')),
                        t.append(e)));
                for (var u = 0; u < a.length; u += 1) {
                    var v = a.eq(u),
                        f = u;
                    p && (f = parseInt(v.attr('data-swiper-slide-index'), 10));
                    var m = 90 * f,
                        g = Math.floor(m / 360);
                    o && ((m = -m), (g = Math.floor(-m / 360)));
                    var b = Math.max(Math.min(v[0].progress, 1), -1),
                        w = 0,
                        y = 0,
                        x = 0;
                    f % 4 == 0
                        ? ((w = 4 * -g * l), (x = 0))
                        : (f - 1) % 4 == 0
                        ? ((w = 0), (x = 4 * -g * l))
                        : (f - 2) % 4 == 0
                            ? ((w = l + 4 * g * l), (x = l))
                            : (f - 3) % 4 == 0 && ((w = -l), (x = 3 * l + 4 * l * g)),
                    o && (w = -w),
                    h || ((y = w), (w = 0));
                    var T =
                        'rotateX(' +
                        (h ? 0 : -m) +
                        'deg) rotateY(' +
                        (h ? m : 0) +
                        'deg) translate3d(' +
                        w +
                        'px, ' +
                        y +
                        'px, ' +
                        x +
                        'px)';
                    if (
                        (b <= 1 &&
                        b > -1 &&
                        ((c = 90 * f + 90 * b), o && (c = 90 * -f - 90 * b)),
                            v.transform(T),
                            d.slideShadows)
                    ) {
                        var E = h
                            ? v.find('.swiper-slide-shadow-left')
                            : v.find('.swiper-slide-shadow-top'),
                            C = h
                                ? v.find('.swiper-slide-shadow-right')
                                : v.find('.swiper-slide-shadow-bottom');
                        0 === E.length &&
                        ((E = s(
                            '<div class="swiper-slide-shadow-' +
                            (h ? 'left' : 'top') +
                            '"></div>'
                        )),
                            v.append(E)),
                        0 === C.length &&
                        ((C = s(
                            '<div class="swiper-slide-shadow-' +
                            (h ? 'right' : 'bottom') +
                            '"></div>'
                        )),
                            v.append(C)),
                        E.length && (E[0].style.opacity = Math.max(-b, 0)),
                        C.length && (C[0].style.opacity = Math.max(b, 0));
                    }
                }
                if (
                    (i.css({
                        '-webkit-transform-origin': '50% 50% -' + l / 2 + 'px',
                        '-moz-transform-origin': '50% 50% -' + l / 2 + 'px',
                        '-ms-transform-origin': '50% 50% -' + l / 2 + 'px',
                        'transform-origin': '50% 50% -' + l / 2 + 'px',
                    }),
                        d.shadow)
                )
                    if (h)
                        e.transform(
                            'translate3d(0px, ' +
                            (r / 2 + d.shadowOffset) +
                            'px, ' +
                            -r / 2 +
                            'px) rotateX(90deg) rotateZ(0deg) scale(' +
                            d.shadowScale +
                            ')'
                        );
                    else {
                        var S = Math.abs(c) - 90 * Math.floor(Math.abs(c) / 90),
                            M =
                                1.5 -
                                (Math.sin((2 * S * Math.PI) / 360) / 2 +
                                    Math.cos((2 * S * Math.PI) / 360) / 2),
                            P = d.shadowScale,
                            z = d.shadowScale / M,
                            k = d.shadowOffset;
                        e.transform(
                            'scale3d(' +
                            P +
                            ', 1, ' +
                            z +
                            ') translate3d(0px, ' +
                            (n / 2 + k) +
                            'px, ' +
                            -n / 2 / z +
                            'px) rotateX(-90deg)'
                        );
                    }
                var $ = j.isSafari || j.isUiWebView ? -l / 2 : 0;
                i.transform(
                    'translate3d(0px,0,' +
                    $ +
                    'px) rotateX(' +
                    (this.isHorizontal() ? 0 : c) +
                    'deg) rotateY(' +
                    (this.isHorizontal() ? -c : 0) +
                    'deg)'
                );
            },
            setTransition: function (e) {
                var t = this.$el;
                this.slides
                    .transition(e)
                    .find(
                        '.swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left'
                    )
                    .transition(e),
                this.params.cubeEffect.shadow &&
                !this.isHorizontal() &&
                t.find('.swiper-cube-shadow').transition(e);
            },
        },
        me = {
            setTranslate: function () {
                for (
                    var e = this.slides, t = this.rtlTranslate, i = 0;
                    i < e.length;
                    i += 1
                ) {
                    var a = e.eq(i),
                        r = a[0].progress;
                    this.params.flipEffect.limitRotation &&
                    (r = Math.max(Math.min(a[0].progress, 1), -1));
                    var n = -180 * r,
                        o = 0,
                        l = -a[0].swiperSlideOffset,
                        d = 0;
                    if (
                        (this.isHorizontal()
                            ? t && (n = -n)
                            : ((d = l), (l = 0), (o = -n), (n = 0)),
                            (a[0].style.zIndex = -Math.abs(Math.round(r)) + e.length),
                            this.params.flipEffect.slideShadows)
                    ) {
                        var h = this.isHorizontal()
                            ? a.find('.swiper-slide-shadow-left')
                            : a.find('.swiper-slide-shadow-top'),
                            p = this.isHorizontal()
                                ? a.find('.swiper-slide-shadow-right')
                                : a.find('.swiper-slide-shadow-bottom');
                        0 === h.length &&
                        ((h = s(
                            '<div class="swiper-slide-shadow-' +
                            (this.isHorizontal() ? 'left' : 'top') +
                            '"></div>'
                        )),
                            a.append(h)),
                        0 === p.length &&
                        ((p = s(
                            '<div class="swiper-slide-shadow-' +
                            (this.isHorizontal() ? 'right' : 'bottom') +
                            '"></div>'
                        )),
                            a.append(p)),
                        h.length && (h[0].style.opacity = Math.max(-r, 0)),
                        p.length && (p[0].style.opacity = Math.max(r, 0));
                    }
                    a.transform(
                        'translate3d(' +
                        l +
                        'px, ' +
                        d +
                        'px, 0px) rotateX(' +
                        o +
                        'deg) rotateY(' +
                        n +
                        'deg)'
                    );
                }
            },
            setTransition: function (e) {
                var t = this,
                    i = t.slides,
                    s = t.activeIndex,
                    a = t.$wrapperEl;
                if (
                    (i
                        .transition(e)
                        .find(
                            '.swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left'
                        )
                        .transition(e),
                    t.params.virtualTranslate && 0 !== e)
                ) {
                    var r = !1;
                    i.eq(s).transitionEnd(function () {
                        if (!r && t && !t.destroyed) {
                            (r = !0), (t.animating = !1);
                            for (
                                var e = ['webkitTransitionEnd', 'transitionend'], i = 0;
                                i < e.length;
                                i += 1
                            )
                                a.trigger(e[i]);
                        }
                    });
                }
            },
        },
        ge = {
            setTranslate: function () {
                for (
                    var e = this.width,
                        t = this.height,
                        i = this.slides,
                        a = this.$wrapperEl,
                        r = this.slidesSizesGrid,
                        n = this.params.coverflowEffect,
                        l = this.isHorizontal(),
                        d = this.translate,
                        h = l ? e / 2 - d : t / 2 - d,
                        p = l ? n.rotate : -n.rotate,
                        c = n.depth,
                        u = 0,
                        v = i.length;
                    u < v;
                    u += 1
                ) {
                    var f = i.eq(u),
                        m = r[u],
                        g = ((h - f[0].swiperSlideOffset - m / 2) / m) * n.modifier,
                        b = l ? p * g : 0,
                        w = l ? 0 : p * g,
                        y = -c * Math.abs(g),
                        x = l ? 0 : n.stretch * g,
                        T = l ? n.stretch * g : 0;
                    Math.abs(T) < 0.001 && (T = 0),
                    Math.abs(x) < 0.001 && (x = 0),
                    Math.abs(y) < 0.001 && (y = 0),
                    Math.abs(b) < 0.001 && (b = 0),
                    Math.abs(w) < 0.001 && (w = 0);
                    var E =
                        'translate3d(' +
                        T +
                        'px,' +
                        x +
                        'px,' +
                        y +
                        'px)  rotateX(' +
                        w +
                        'deg) rotateY(' +
                        b +
                        'deg)';
                    if (
                        (f.transform(E),
                            (f[0].style.zIndex = 1 - Math.abs(Math.round(g))),
                            n.slideShadows)
                    ) {
                        var C = l
                            ? f.find('.swiper-slide-shadow-left')
                            : f.find('.swiper-slide-shadow-top'),
                            S = l
                                ? f.find('.swiper-slide-shadow-right')
                                : f.find('.swiper-slide-shadow-bottom');
                        0 === C.length &&
                        ((C = s(
                            '<div class="swiper-slide-shadow-' +
                            (l ? 'left' : 'top') +
                            '"></div>'
                        )),
                            f.append(C)),
                        0 === S.length &&
                        ((S = s(
                            '<div class="swiper-slide-shadow-' +
                            (l ? 'right' : 'bottom') +
                            '"></div>'
                        )),
                            f.append(S)),
                        C.length && (C[0].style.opacity = g > 0 ? g : 0),
                        S.length && (S[0].style.opacity = -g > 0 ? -g : 0);
                    }
                }
                (o.pointerEvents || o.prefixedPointerEvents) &&
                (a[0].style.perspectiveOrigin = h + 'px 50%');
            },
            setTransition: function (e) {
                this.slides
                    .transition(e)
                    .find(
                        '.swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left'
                    )
                    .transition(e);
            },
        },
        be = {
            init: function () {
                var e = this.params.thumbs,
                    t = this.constructor;
                e.swiper instanceof t
                    ? ((this.thumbs.swiper = e.swiper),
                        n.extend(this.thumbs.swiper.originalParams, {
                            watchSlidesProgress: !0,
                            slideToClickedSlide: !1,
                        }),
                        n.extend(this.thumbs.swiper.params, {
                            watchSlidesProgress: !0,
                            slideToClickedSlide: !1,
                        }))
                    : n.isObject(e.swiper) &&
                    ((this.thumbs.swiper = new t(
                        n.extend({}, e.swiper, {
                            watchSlidesVisibility: !0,
                            watchSlidesProgress: !0,
                            slideToClickedSlide: !1,
                        })
                    )),
                        (this.thumbs.swiperCreated = !0)),
                    this.thumbs.swiper.$el.addClass(
                        this.params.thumbs.thumbsContainerClass
                    ),
                    this.thumbs.swiper.on('tap', this.thumbs.onThumbClick);
            },
            onThumbClick: function () {
                var e = this.thumbs.swiper;
                if (e) {
                    var t = e.clickedIndex,
                        i = e.clickedSlide;
                    if (
                        !(
                            (i &&
                                s(i).hasClass(
                                    this.params.thumbs.slideThumbActiveClass
                                )) ||
                            null == t
                        )
                    ) {
                        var a;
                        if (
                            ((a = e.params.loop
                                ? parseInt(
                                    s(e.clickedSlide).attr('data-swiper-slide-index'),
                                    10
                                )
                                : t),
                                this.params.loop)
                        ) {
                            var r = this.activeIndex;
                            this.slides
                                .eq(r)
                                .hasClass(this.params.slideDuplicateClass) &&
                            (this.loopFix(),
                                (this._clientLeft = this.$wrapperEl[0].clientLeft),
                                (r = this.activeIndex));
                            var n = this.slides
                                    .eq(r)
                                    .prevAll('[data-swiper-slide-index="' + a + '"]')
                                    .eq(0)
                                    .index(),
                                o = this.slides
                                    .eq(r)
                                    .nextAll('[data-swiper-slide-index="' + a + '"]')
                                    .eq(0)
                                    .index();
                            a =
                                void 0 === n
                                    ? o
                                    : void 0 === o
                                    ? n
                                    : o - r < r - n
                                        ? o
                                        : n;
                        }
                        this.slideTo(a);
                    }
                }
            },
            update: function (e) {
                var t = this.thumbs.swiper;
                if (t) {
                    var i =
                        'auto' === t.params.slidesPerView
                            ? t.slidesPerViewDynamic()
                            : t.params.slidesPerView;
                    if (this.realIndex !== t.realIndex) {
                        var s,
                            a = t.activeIndex;
                        if (t.params.loop) {
                            t.slides.eq(a).hasClass(t.params.slideDuplicateClass) &&
                            (t.loopFix(),
                                (t._clientLeft = t.$wrapperEl[0].clientLeft),
                                (a = t.activeIndex));
                            var r = t.slides
                                    .eq(a)
                                    .prevAll(
                                        '[data-swiper-slide-index="' +
                                        this.realIndex +
                                        '"]'
                                    )
                                    .eq(0)
                                    .index(),
                                n = t.slides
                                    .eq(a)
                                    .nextAll(
                                        '[data-swiper-slide-index="' +
                                        this.realIndex +
                                        '"]'
                                    )
                                    .eq(0)
                                    .index();
                            s =
                                void 0 === r
                                    ? n
                                    : void 0 === n
                                    ? r
                                    : n - a == a - r
                                        ? a
                                        : n - a < a - r
                                            ? n
                                            : r;
                        } else s = this.realIndex;
                        t.visibleSlidesIndexes &&
                        t.visibleSlidesIndexes.indexOf(s) < 0 &&
                        (t.params.centeredSlides
                            ? (s =
                                s > a
                                    ? s - Math.floor(i / 2) + 1
                                    : s + Math.floor(i / 2) - 1)
                            : s > a && (s = s - i + 1),
                            t.slideTo(s, e ? 0 : void 0));
                    }
                    var o = 1,
                        l = this.params.thumbs.slideThumbActiveClass;
                    if (
                        (this.params.slidesPerView > 1 &&
                        !this.params.centeredSlides &&
                        (o = this.params.slidesPerView),
                            t.slides.removeClass(l),
                        t.params.loop ||
                        (t.params.virtual && t.params.virtual.enabled))
                    )
                        for (var d = 0; d < o; d += 1)
                            t.$wrapperEl
                                .children(
                                    '[data-swiper-slide-index="' +
                                    (this.realIndex + d) +
                                    '"]'
                                )
                                .addClass(l);
                    else
                        for (var h = 0; h < o; h += 1)
                            t.slides.eq(this.realIndex + h).addClass(l);
                }
            },
        },
        we = [
            R,
            q,
            K,
            U,
            Z,
            J,
            te,
            {
                name: 'mousewheel',
                params: {
                    mousewheel: {
                        enabled: !1,
                        releaseOnEdges: !1,
                        invert: !1,
                        forceToAxis: !1,
                        sensitivity: 1,
                        eventsTarged: 'container',
                    },
                },
                create: function () {
                    n.extend(this, {
                        mousewheel: {
                            enabled: !1,
                            enable: ie.enable.bind(this),
                            disable: ie.disable.bind(this),
                            handle: ie.handle.bind(this),
                            handleMouseEnter: ie.handleMouseEnter.bind(this),
                            handleMouseLeave: ie.handleMouseLeave.bind(this),
                            lastScrollTime: n.now(),
                            lastEventBeforeSnap: void 0,
                            recentWheelEvents: [],
                        },
                    });
                },
                on: {
                    init: function () {
                        !this.params.mousewheel.enabled &&
                        this.params.cssMode &&
                        this.mousewheel.disable(),
                        this.params.mousewheel.enabled && this.mousewheel.enable();
                    },
                    destroy: function () {
                        this.params.cssMode && this.mousewheel.enable(),
                        this.mousewheel.enabled && this.mousewheel.disable();
                    },
                },
            },
            {
                name: 'navigation',
                params: {
                    navigation: {
                        nextEl: null,
                        prevEl: null,
                        hideOnClick: !1,
                        disabledClass: 'swiper-button-disabled',
                        hiddenClass: 'swiper-button-hidden',
                        lockClass: 'swiper-button-lock',
                    },
                },
                create: function () {
                    n.extend(this, {
                        navigation: {
                            init: se.init.bind(this),
                            update: se.update.bind(this),
                            destroy: se.destroy.bind(this),
                            onNextClick: se.onNextClick.bind(this),
                            onPrevClick: se.onPrevClick.bind(this),
                        },
                    });
                },
                on: {
                    init: function () {
                        this.navigation.init(), this.navigation.update();
                    },
                    toEdge: function () {
                        this.navigation.update();
                    },
                    fromEdge: function () {
                        this.navigation.update();
                    },
                    destroy: function () {
                        this.navigation.destroy();
                    },
                    click: function (e) {
                        var t,
                            i = this.navigation,
                            a = i.$nextEl,
                            r = i.$prevEl;
                        !this.params.navigation.hideOnClick ||
                        s(e.target).is(r) ||
                        s(e.target).is(a) ||
                        (a
                            ? (t = a.hasClass(this.params.navigation.hiddenClass))
                            : r &&
                            (t = r.hasClass(this.params.navigation.hiddenClass)),
                            !0 === t
                                ? this.emit('navigationShow', this)
                                : this.emit('navigationHide', this),
                        a && a.toggleClass(this.params.navigation.hiddenClass),
                        r && r.toggleClass(this.params.navigation.hiddenClass));
                    },
                },
            },
            {
                name: 'pagination',
                params: {
                    pagination: {
                        el: null,
                        bulletElement: 'span',
                        clickable: !1,
                        hideOnClick: !1,
                        renderBullet: null,
                        renderProgressbar: null,
                        renderFraction: null,
                        renderCustom: null,
                        progressbarOpposite: !1,
                        type: 'bullets',
                        dynamicBullets: !1,
                        dynamicMainBullets: 1,
                        formatFractionCurrent: function (e) {
                            return e;
                        },
                        formatFractionTotal: function (e) {
                            return e;
                        },
                        bulletClass: 'swiper-pagination-bullet',
                        bulletActiveClass: 'swiper-pagination-bullet-active',
                        modifierClass: 'swiper-pagination-',
                        currentClass: 'swiper-pagination-current',
                        totalClass: 'swiper-pagination-total',
                        hiddenClass: 'swiper-pagination-hidden',
                        progressbarFillClass: 'swiper-pagination-progressbar-fill',
                        progressbarOppositeClass:
                            'swiper-pagination-progressbar-opposite',
                        clickableClass: 'swiper-pagination-clickable',
                        lockClass: 'swiper-pagination-lock',
                    },
                },
                create: function () {
                    n.extend(this, {
                        pagination: {
                            init: ae.init.bind(this),
                            render: ae.render.bind(this),
                            update: ae.update.bind(this),
                            destroy: ae.destroy.bind(this),
                            dynamicBulletIndex: 0,
                        },
                    });
                },
                on: {
                    init: function () {
                        this.pagination.init(),
                            this.pagination.render(),
                            this.pagination.update();
                    },
                    activeIndexChange: function () {
                        this.params.loop
                            ? this.pagination.update()
                            : void 0 === this.snapIndex && this.pagination.update();
                    },
                    snapIndexChange: function () {
                        this.params.loop || this.pagination.update();
                    },
                    slidesLengthChange: function () {
                        this.params.loop &&
                        (this.pagination.render(), this.pagination.update());
                    },
                    snapGridLengthChange: function () {
                        this.params.loop ||
                        (this.pagination.render(), this.pagination.update());
                    },
                    destroy: function () {
                        this.pagination.destroy();
                    },
                    click: function (e) {
                        this.params.pagination.el &&
                        this.params.pagination.hideOnClick &&
                        this.pagination.$el.length > 0 &&
                        !s(e.target).hasClass(
                            this.params.pagination.bulletClass
                        ) &&
                        (!0 ===
                        this.pagination.$el.hasClass(
                            this.params.pagination.hiddenClass
                        )
                            ? this.emit('paginationShow', this)
                            : this.emit('paginationHide', this),
                            this.pagination.$el.toggleClass(
                                this.params.pagination.hiddenClass
                            ));
                    },
                },
            },
            {
                name: 'scrollbar',
                params: {
                    scrollbar: {
                        el: null,
                        dragSize: 'auto',
                        hide: !1,
                        draggable: !1,
                        snapOnRelease: !0,
                        lockClass: 'swiper-scrollbar-lock',
                        dragClass: 'swiper-scrollbar-drag',
                    },
                },
                create: function () {
                    n.extend(this, {
                        scrollbar: {
                            init: re.init.bind(this),
                            destroy: re.destroy.bind(this),
                            updateSize: re.updateSize.bind(this),
                            setTranslate: re.setTranslate.bind(this),
                            setTransition: re.setTransition.bind(this),
                            enableDraggable: re.enableDraggable.bind(this),
                            disableDraggable: re.disableDraggable.bind(this),
                            setDragPosition: re.setDragPosition.bind(this),
                            getPointerPosition: re.getPointerPosition.bind(this),
                            onDragStart: re.onDragStart.bind(this),
                            onDragMove: re.onDragMove.bind(this),
                            onDragEnd: re.onDragEnd.bind(this),
                            isTouched: !1,
                            timeout: null,
                            dragTimeout: null,
                        },
                    });
                },
                on: {
                    init: function () {
                        this.scrollbar.init(),
                            this.scrollbar.updateSize(),
                            this.scrollbar.setTranslate();
                    },
                    update: function () {
                        this.scrollbar.updateSize();
                    },
                    resize: function () {
                        this.scrollbar.updateSize();
                    },
                    observerUpdate: function () {
                        this.scrollbar.updateSize();
                    },
                    setTranslate: function () {
                        this.scrollbar.setTranslate();
                    },
                    setTransition: function (e) {
                        this.scrollbar.setTransition(e);
                    },
                    destroy: function () {
                        this.scrollbar.destroy();
                    },
                },
            },
            {
                name: 'parallax',
                params: { parallax: { enabled: !1 } },
                create: function () {
                    n.extend(this, {
                        parallax: {
                            setTransform: ne.setTransform.bind(this),
                            setTranslate: ne.setTranslate.bind(this),
                            setTransition: ne.setTransition.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        this.params.parallax.enabled &&
                        ((this.params.watchSlidesProgress = !0),
                            (this.originalParams.watchSlidesProgress = !0));
                    },
                    init: function () {
                        this.params.parallax.enabled && this.parallax.setTranslate();
                    },
                    setTranslate: function () {
                        this.params.parallax.enabled && this.parallax.setTranslate();
                    },
                    setTransition: function (e) {
                        this.params.parallax.enabled &&
                        this.parallax.setTransition(e);
                    },
                },
            },
            {
                name: 'zoom',
                params: {
                    zoom: {
                        enabled: !1,
                        maxRatio: 3,
                        minRatio: 1,
                        toggle: !0,
                        containerClass: 'swiper-zoom-container',
                        zoomedSlideClass: 'swiper-slide-zoomed',
                    },
                },
                create: function () {
                    var e = this,
                        t = {
                            enabled: !1,
                            scale: 1,
                            currentScale: 1,
                            isScaling: !1,
                            gesture: {
                                $slideEl: void 0,
                                slideWidth: void 0,
                                slideHeight: void 0,
                                $imageEl: void 0,
                                $imageWrapEl: void 0,
                                maxRatio: 3,
                            },
                            image: {
                                isTouched: void 0,
                                isMoved: void 0,
                                currentX: void 0,
                                currentY: void 0,
                                minX: void 0,
                                minY: void 0,
                                maxX: void 0,
                                maxY: void 0,
                                width: void 0,
                                height: void 0,
                                startX: void 0,
                                startY: void 0,
                                touchesStart: {},
                                touchesCurrent: {},
                            },
                            velocity: {
                                x: void 0,
                                y: void 0,
                                prevPositionX: void 0,
                                prevPositionY: void 0,
                                prevTime: void 0,
                            },
                        };
                    'onGestureStart onGestureChange onGestureEnd onTouchStart onTouchMove onTouchEnd onTransitionEnd toggle enable disable in out'
                        .split(' ')
                        .forEach(function (i) {
                            t[i] = oe[i].bind(e);
                        }),
                        n.extend(e, { zoom: t });
                    var i = 1;
                    Object.defineProperty(e.zoom, 'scale', {
                        get: function () {
                            return i;
                        },
                        set: function (t) {
                            if (i !== t) {
                                var s = e.zoom.gesture.$imageEl
                                    ? e.zoom.gesture.$imageEl[0]
                                    : void 0,
                                    a = e.zoom.gesture.$slideEl
                                        ? e.zoom.gesture.$slideEl[0]
                                        : void 0;
                                e.emit('zoomChange', t, s, a);
                            }
                            i = t;
                        },
                    });
                },
                on: {
                    init: function () {
                        this.params.zoom.enabled && this.zoom.enable();
                    },
                    destroy: function () {
                        this.zoom.disable();
                    },
                    touchStart: function (e) {
                        this.zoom.enabled && this.zoom.onTouchStart(e);
                    },
                    touchEnd: function (e) {
                        this.zoom.enabled && this.zoom.onTouchEnd(e);
                    },
                    doubleTap: function (e) {
                        this.params.zoom.enabled &&
                        this.zoom.enabled &&
                        this.params.zoom.toggle &&
                        this.zoom.toggle(e);
                    },
                    transitionEnd: function () {
                        this.zoom.enabled &&
                        this.params.zoom.enabled &&
                        this.zoom.onTransitionEnd();
                    },
                    slideChange: function () {
                        this.zoom.enabled &&
                        this.params.zoom.enabled &&
                        this.params.cssMode &&
                        this.zoom.onTransitionEnd();
                    },
                },
            },
            {
                name: 'lazy',
                params: {
                    lazy: {
                        enabled: !1,
                        loadPrevNext: !1,
                        loadPrevNextAmount: 1,
                        loadOnTransitionStart: !1,
                        elementClass: 'swiper-lazy',
                        loadingClass: 'swiper-lazy-loading',
                        loadedClass: 'swiper-lazy-loaded',
                        preloaderClass: 'swiper-lazy-preloader',
                    },
                },
                create: function () {
                    n.extend(this, {
                        lazy: {
                            initialImageLoaded: !1,
                            load: le.load.bind(this),
                            loadInSlide: le.loadInSlide.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        this.params.lazy.enabled &&
                        this.params.preloadImages &&
                        (this.params.preloadImages = !1);
                    },
                    init: function () {
                        this.params.lazy.enabled &&
                        !this.params.loop &&
                        0 === this.params.initialSlide &&
                        this.lazy.load();
                    },
                    scroll: function () {
                        this.params.freeMode &&
                        !this.params.freeModeSticky &&
                        this.lazy.load();
                    },
                    resize: function () {
                        this.params.lazy.enabled && this.lazy.load();
                    },
                    scrollbarDragMove: function () {
                        this.params.lazy.enabled && this.lazy.load();
                    },
                    transitionStart: function () {
                        this.params.lazy.enabled &&
                        (this.params.lazy.loadOnTransitionStart ||
                            (!this.params.lazy.loadOnTransitionStart &&
                                !this.lazy.initialImageLoaded)) &&
                        this.lazy.load();
                    },
                    transitionEnd: function () {
                        this.params.lazy.enabled &&
                        !this.params.lazy.loadOnTransitionStart &&
                        this.lazy.load();
                    },
                    slideChange: function () {
                        this.params.lazy.enabled &&
                        this.params.cssMode &&
                        this.lazy.load();
                    },
                },
            },
            {
                name: 'controller',
                params: {
                    controller: { control: void 0, inverse: !1, by: 'slide' },
                },
                create: function () {
                    n.extend(this, {
                        controller: {
                            control: this.params.controller.control,
                            getInterpolateFunction:
                                de.getInterpolateFunction.bind(this),
                            setTranslate: de.setTranslate.bind(this),
                            setTransition: de.setTransition.bind(this),
                        },
                    });
                },
                on: {
                    update: function () {
                        this.controller.control &&
                        this.controller.spline &&
                        ((this.controller.spline = void 0),
                            delete this.controller.spline);
                    },
                    resize: function () {
                        this.controller.control &&
                        this.controller.spline &&
                        ((this.controller.spline = void 0),
                            delete this.controller.spline);
                    },
                    observerUpdate: function () {
                        this.controller.control &&
                        this.controller.spline &&
                        ((this.controller.spline = void 0),
                            delete this.controller.spline);
                    },
                    setTranslate: function (e, t) {
                        this.controller.control && this.controller.setTranslate(e, t);
                    },
                    setTransition: function (e, t) {
                        this.controller.control &&
                        this.controller.setTransition(e, t);
                    },
                },
            },
            {
                name: 'a11y',
                params: {
                    a11y: {
                        enabled: !0,
                        notificationClass: 'swiper-notification',
                        prevSlideMessage: 'Previous slide',
                        nextSlideMessage: 'Next slide',
                        firstSlideMessage: 'This is the first slide',
                        lastSlideMessage: 'This is the last slide',
                        paginationBulletMessage: 'Go to slide {{index}}',
                    },
                },
                create: function () {
                    var e = this;
                    n.extend(e, {
                        a11y: {
                            liveRegion: s(
                                '<span class="' +
                                e.params.a11y.notificationClass +
                                '" aria-live="assertive" aria-atomic="true"></span>'
                            ),
                        },
                    }),
                        Object.keys(he).forEach(function (t) {
                            e.a11y[t] = he[t].bind(e);
                        });
                },
                on: {
                    init: function () {
                        this.params.a11y.enabled &&
                        (this.a11y.init(), this.a11y.updateNavigation());
                    },
                    toEdge: function () {
                        this.params.a11y.enabled && this.a11y.updateNavigation();
                    },
                    fromEdge: function () {
                        this.params.a11y.enabled && this.a11y.updateNavigation();
                    },
                    paginationUpdate: function () {
                        this.params.a11y.enabled && this.a11y.updatePagination();
                    },
                    destroy: function () {
                        this.params.a11y.enabled && this.a11y.destroy();
                    },
                },
            },
            {
                name: 'history',
                params: {
                    history: { enabled: !1, replaceState: !1, key: 'slides' },
                },
                create: function () {
                    n.extend(this, {
                        history: {
                            init: pe.init.bind(this),
                            setHistory: pe.setHistory.bind(this),
                            setHistoryPopState: pe.setHistoryPopState.bind(this),
                            scrollToSlide: pe.scrollToSlide.bind(this),
                            destroy: pe.destroy.bind(this),
                        },
                    });
                },
                on: {
                    init: function () {
                        this.params.history.enabled && this.history.init();
                    },
                    destroy: function () {
                        this.params.history.enabled && this.history.destroy();
                    },
                    transitionEnd: function () {
                        this.history.initialized &&
                        this.history.setHistory(
                            this.params.history.key,
                            this.activeIndex
                        );
                    },
                    slideChange: function () {
                        this.history.initialized &&
                        this.params.cssMode &&
                        this.history.setHistory(
                            this.params.history.key,
                            this.activeIndex
                        );
                    },
                },
            },
            {
                name: 'hash-navigation',
                params: {
                    hashNavigation: {
                        enabled: !1,
                        replaceState: !1,
                        watchState: !1,
                    },
                },
                create: function () {
                    n.extend(this, {
                        hashNavigation: {
                            initialized: !1,
                            init: ce.init.bind(this),
                            destroy: ce.destroy.bind(this),
                            setHash: ce.setHash.bind(this),
                            onHashCange: ce.onHashCange.bind(this),
                        },
                    });
                },
                on: {
                    init: function () {
                        this.params.hashNavigation.enabled &&
                        this.hashNavigation.init();
                    },
                    destroy: function () {
                        this.params.hashNavigation.enabled &&
                        this.hashNavigation.destroy();
                    },
                    transitionEnd: function () {
                        this.hashNavigation.initialized &&
                        this.hashNavigation.setHash();
                    },
                    slideChange: function () {
                        this.hashNavigation.initialized &&
                        this.params.cssMode &&
                        this.hashNavigation.setHash();
                    },
                },
            },
            {
                name: 'autoplay',
                params: {
                    autoplay: {
                        enabled: !1,
                        delay: 3e3,
                        waitForTransition: !0,
                        disableOnInteraction: !0,
                        stopOnLastSlide: !1,
                        reverseDirection: !1,
                    },
                },
                create: function () {
                    var e = this;
                    n.extend(e, {
                        autoplay: {
                            running: !1,
                            paused: !1,
                            run: ue.run.bind(e),
                            start: ue.start.bind(e),
                            stop: ue.stop.bind(e),
                            pause: ue.pause.bind(e),
                            onVisibilityChange: function () {
                                'hidden' === document.visibilityState &&
                                e.autoplay.running &&
                                e.autoplay.pause(),
                                'visible' === document.visibilityState &&
                                e.autoplay.paused &&
                                (e.autoplay.run(), (e.autoplay.paused = !1));
                            },
                            onTransitionEnd: function (t) {
                                e &&
                                !e.destroyed &&
                                e.$wrapperEl &&
                                t.target === this &&
                                (e.$wrapperEl[0].removeEventListener(
                                    'transitionend',
                                    e.autoplay.onTransitionEnd
                                ),
                                    e.$wrapperEl[0].removeEventListener(
                                        'webkitTransitionEnd',
                                        e.autoplay.onTransitionEnd
                                    ),
                                    (e.autoplay.paused = !1),
                                    e.autoplay.running
                                        ? e.autoplay.run()
                                        : e.autoplay.stop());
                            },
                        },
                    });
                },
                on: {
                    init: function () {
                        this.params.autoplay.enabled &&
                        (this.autoplay.start(),
                            document.addEventListener(
                                'visibilitychange',
                                this.autoplay.onVisibilityChange
                            ));
                    },
                    beforeTransitionStart: function (e, t) {
                        this.autoplay.running &&
                        (t || !this.params.autoplay.disableOnInteraction
                            ? this.autoplay.pause(e)
                            : this.autoplay.stop());
                    },
                    sliderFirstMove: function () {
                        this.autoplay.running &&
                        (this.params.autoplay.disableOnInteraction
                            ? this.autoplay.stop()
                            : this.autoplay.pause());
                    },
                    touchEnd: function () {
                        this.params.cssMode &&
                        this.autoplay.paused &&
                        !this.params.autoplay.disableOnInteraction &&
                        this.autoplay.run();
                    },
                    destroy: function () {
                        this.autoplay.running && this.autoplay.stop(),
                            document.removeEventListener(
                                'visibilitychange',
                                this.autoplay.onVisibilityChange
                            );
                    },
                },
            },
            {
                name: 'effect-fade',
                params: { fadeEffect: { crossFade: !1 } },
                create: function () {
                    n.extend(this, {
                        fadeEffect: {
                            setTranslate: ve.setTranslate.bind(this),
                            setTransition: ve.setTransition.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        if ('fade' === this.params.effect) {
                            this.classNames.push(
                                this.params.containerModifierClass + 'fade'
                            );
                            var e = {
                                slidesPerView: 1,
                                slidesPerColumn: 1,
                                slidesPerGroup: 1,
                                watchSlidesProgress: !0,
                                spaceBetween: 0,
                                virtualTranslate: !0,
                            };
                            n.extend(this.params, e), n.extend(this.originalParams, e);
                        }
                    },
                    setTranslate: function () {
                        'fade' === this.params.effect &&
                        this.fadeEffect.setTranslate();
                    },
                    setTransition: function (e) {
                        'fade' === this.params.effect &&
                        this.fadeEffect.setTransition(e);
                    },
                },
            },
            {
                name: 'effect-cube',
                params: {
                    cubeEffect: {
                        slideShadows: !0,
                        shadow: !0,
                        shadowOffset: 20,
                        shadowScale: 0.94,
                    },
                },
                create: function () {
                    n.extend(this, {
                        cubeEffect: {
                            setTranslate: fe.setTranslate.bind(this),
                            setTransition: fe.setTransition.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        if ('cube' === this.params.effect) {
                            this.classNames.push(
                                this.params.containerModifierClass + 'cube'
                            ),
                                this.classNames.push(
                                    this.params.containerModifierClass + '3d'
                                );
                            var e = {
                                slidesPerView: 1,
                                slidesPerColumn: 1,
                                slidesPerGroup: 1,
                                watchSlidesProgress: !0,
                                resistanceRatio: 0,
                                spaceBetween: 0,
                                centeredSlides: !1,
                                virtualTranslate: !0,
                            };
                            n.extend(this.params, e), n.extend(this.originalParams, e);
                        }
                    },
                    setTranslate: function () {
                        'cube' === this.params.effect &&
                        this.cubeEffect.setTranslate();
                    },
                    setTransition: function (e) {
                        'cube' === this.params.effect &&
                        this.cubeEffect.setTransition(e);
                    },
                },
            },
            {
                name: 'effect-flip',
                params: { flipEffect: { slideShadows: !0, limitRotation: !0 } },
                create: function () {
                    n.extend(this, {
                        flipEffect: {
                            setTranslate: me.setTranslate.bind(this),
                            setTransition: me.setTransition.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        if ('flip' === this.params.effect) {
                            this.classNames.push(
                                this.params.containerModifierClass + 'flip'
                            ),
                                this.classNames.push(
                                    this.params.containerModifierClass + '3d'
                                );
                            var e = {
                                slidesPerView: 1,
                                slidesPerColumn: 1,
                                slidesPerGroup: 1,
                                watchSlidesProgress: !0,
                                spaceBetween: 0,
                                virtualTranslate: !0,
                            };
                            n.extend(this.params, e), n.extend(this.originalParams, e);
                        }
                    },
                    setTranslate: function () {
                        'flip' === this.params.effect &&
                        this.flipEffect.setTranslate();
                    },
                    setTransition: function (e) {
                        'flip' === this.params.effect &&
                        this.flipEffect.setTransition(e);
                    },
                },
            },
            {
                name: 'effect-coverflow',
                params: {
                    coverflowEffect: {
                        rotate: 50,
                        stretch: 0,
                        depth: 100,
                        modifier: 1,
                        slideShadows: !0,
                    },
                },
                create: function () {
                    n.extend(this, {
                        coverflowEffect: {
                            setTranslate: ge.setTranslate.bind(this),
                            setTransition: ge.setTransition.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        'coverflow' === this.params.effect &&
                        (this.classNames.push(
                            this.params.containerModifierClass + 'coverflow'
                        ),
                            this.classNames.push(
                                this.params.containerModifierClass + '3d'
                            ),
                            (this.params.watchSlidesProgress = !0),
                            (this.originalParams.watchSlidesProgress = !0));
                    },
                    setTranslate: function () {
                        'coverflow' === this.params.effect &&
                        this.coverflowEffect.setTranslate();
                    },
                    setTransition: function (e) {
                        'coverflow' === this.params.effect &&
                        this.coverflowEffect.setTransition(e);
                    },
                },
            },
            {
                name: 'thumbs',
                params: {
                    thumbs: {
                        swiper: null,
                        slideThumbActiveClass: 'swiper-slide-thumb-active',
                        thumbsContainerClass: 'swiper-container-thumbs',
                    },
                },
                create: function () {
                    n.extend(this, {
                        thumbs: {
                            swiper: null,
                            init: be.init.bind(this),
                            update: be.update.bind(this),
                            onThumbClick: be.onThumbClick.bind(this),
                        },
                    });
                },
                on: {
                    beforeInit: function () {
                        var e = this.params.thumbs;
                        e && e.swiper && (this.thumbs.init(), this.thumbs.update(!0));
                    },
                    slideChange: function () {
                        this.thumbs.swiper && this.thumbs.update();
                    },
                    update: function () {
                        this.thumbs.swiper && this.thumbs.update();
                    },
                    resize: function () {
                        this.thumbs.swiper && this.thumbs.update();
                    },
                    observerUpdate: function () {
                        this.thumbs.swiper && this.thumbs.update();
                    },
                    setTransition: function (e) {
                        var t = this.thumbs.swiper;
                        t && t.setTransition(e);
                    },
                    beforeDestroy: function () {
                        var e = this.thumbs.swiper;
                        e && this.thumbs.swiperCreated && e && e.destroy();
                    },
                },
            },
        ];
    return (
        void 0 === W.use &&
        ((W.use = W.Class.use), (W.installModule = W.Class.installModule)),
            W.use(we),
            W
    );
});
//# sourceMappingURL=swiper.min.js.map

!(function (t) {
    'use strict';
    function e(e) {
        return e.is('[type="checkbox"]')
            ? e.prop('checked')
            : e.is('[type="radio"]')
                ? !!t('[name="' + e.attr('name') + '"]:checked').length
                : e.val();
    }
    var r = function (a, i) {
        (this.options = i),
            (this.validators = t.extend({}, r.VALIDATORS, i.custom)),
            (this.$element = t(a)),
            (this.$btn = t('button[type="submit"], input[type="submit"]')
                .filter('[form="' + this.$element.attr('id') + '"]')
                .add(
                    this.$element.find('input[type="submit"], button[type="submit"]')
                )),
            this.update(),
            this.$element.on(
                'input.bs.validator change.bs.validator focusout.bs.validator',
                t.proxy(this.onInput, this)
            ),
            this.$element.on('submit.bs.validator', t.proxy(this.onSubmit, this)),
            this.$element.on('reset.bs.validator', t.proxy(this.reset, this)),
            this.$element.find('[data-match]').each(function () {
                var r = t(this),
                    a = r.data('match');
                t(a).on('input.bs.validator', function (t) {
                    e(r) && r.trigger('input.bs.validator');
                });
            }),
            this.$inputs
                .filter(function () {
                    return e(t(this));
                })
                .trigger('focusout'),
            this.$element.attr('novalidate', !0),
            this.toggleSubmit();
    };
    function a(e) {
        return this.each(function () {
            var a = t(this),
                i = t.extend({}, r.DEFAULTS, a.data(), 'object' == typeof e && e),
                o = a.data('bs.validator');
            (o || 'destroy' != e) &&
            (o || a.data('bs.validator', (o = new r(this, i))),
            'string' == typeof e && o[e]());
        });
    }
    (r.VERSION = '0.11.5'),
        (r.INPUT_SELECTOR =
            ':input:not([type="hidden"], [type="submit"], [type="reset"], button)'),
        (r.FOCUS_OFFSET = 20),
        (r.DEFAULTS = {
            delay: 500,
            html: !1,
            disable: !0,
            focus: !0,
            custom: {},
            errors: { match: 'Does not match', minlength: 'Not long enough' },
            feedback: { success: 'glyphicon-ok', error: 'glyphicon-remove' },
        }),
        (r.VALIDATORS = {
            native: function (t) {
                var e = t[0];
                if (e.checkValidity)
                    return (
                        !e.checkValidity() &&
                        !e.validity.valid &&
                        (e.validationMessage || 'error!')
                    );
            },
            match: function (e) {
                var a = e.data('match');
                return e.val() !== t(a).val() && r.DEFAULTS.errors.match;
            },
            minlength: function (t) {
                var e = t.data('minlength');
                return t.val().length < e && r.DEFAULTS.errors.minlength;
            },
        }),
        (r.prototype.update = function () {
            return (
                (this.$inputs = this.$element
                    .find(r.INPUT_SELECTOR)
                    .add(this.$element.find('[data-validate="true"]'))
                    .not(this.$element.find('[data-validate="false"]'))),
                    this
            );
        }),
        (r.prototype.onInput = function (e) {
            var r = this,
                a = t(e.target),
                i = 'focusout' !== e.type;
            this.$inputs.is(a) &&
            this.validateInput(a, i).done(function () {
                r.toggleSubmit();
            });
        }),
        (r.prototype.validateInput = function (r, a) {
            e(r);
            var i = r.data('bs.validator.errors');
            r.is('[type="radio"]') &&
            (r = this.$element.find('input[name="' + r.attr('name') + '"]'));
            var o = t.Event('validate.bs.validator', { relatedTarget: r[0] });
            if ((this.$element.trigger(o), !o.isDefaultPrevented())) {
                var s = this;
                return this.runValidators(r).done(function (e) {
                    r.data('bs.validator.errors', e),
                        e.length
                            ? a
                            ? s.defer(r, s.showErrors)
                            : s.showErrors(r)
                            : s.clearErrors(r),
                    (i && e.toString() === i.toString()) ||
                    ((o = e.length
                        ? t.Event('invalid.bs.validator', {
                            relatedTarget: r[0],
                            detail: e,
                        })
                        : t.Event('valid.bs.validator', {
                            relatedTarget: r[0],
                            detail: i,
                        })),
                        s.$element.trigger(o)),
                        s.toggleSubmit(),
                        s.$element.trigger(
                            t.Event('validated.bs.validator', { relatedTarget: r[0] })
                        );
                });
            }
        }),
        (r.prototype.runValidators = function (r) {
            var a = [],
                i = t.Deferred();
            function o(t) {
                return (
                    (function (t) {
                        return r.data(t + '-error');
                    })(t) ||
                    ((e = r[0].validity).typeMismatch
                        ? r.data('type-error')
                        : e.patternMismatch
                            ? r.data('pattern-error')
                            : e.stepMismatch
                                ? r.data('step-error')
                                : e.rangeOverflow
                                    ? r.data('max-error')
                                    : e.rangeUnderflow
                                        ? r.data('min-error')
                                        : e.valueMissing
                                            ? r.data('required-error')
                                            : null) ||
                    r.data('error')
                );
                var e;
            }
            return (
                r.data('bs.validator.deferred') &&
                r.data('bs.validator.deferred').reject(),
                    r.data('bs.validator.deferred', i),
                    t.each(
                        this.validators,
                        t.proxy(function (t, i) {
                            var s = null;
                            (e(r) || r.attr('required')) &&
                            (r.data(t) || 'native' == t) &&
                            (s = i.call(this, r)) &&
                            ((s = o(t) || s), !~a.indexOf(s) && a.push(s));
                        }, this)
                    ),
                    !a.length && e(r) && r.data('remote')
                        ? this.defer(r, function () {
                            var s = {};
                            (s[r.attr('name')] = e(r)),
                                t
                                    .get(r.data('remote'), s)
                                    .fail(function (t, e, r) {
                                        a.push(o('remote') || r);
                                    })
                                    .always(function () {
                                        i.resolve(a);
                                    });
                        })
                        : i.resolve(a),
                    i.promise()
            );
        }),
        (r.prototype.validate = function () {
            var e = this;
            return (
                t
                    .when(
                        this.$inputs.map(function (r) {
                            return e.validateInput(t(this), !1);
                        })
                    )
                    .then(function () {
                        e.toggleSubmit(), e.focusError();
                    }),
                    this
            );
        }),
        (r.prototype.focusError = function () {
            if (this.options.focus) {
                var e = this.$element.find('.has-error:first :input');
                0 !== e.length &&
                (t('html, body').animate(
                    { scrollTop: e.offset().top - r.FOCUS_OFFSET },
                    250
                ),
                    e.focus());
            }
        }),
        (r.prototype.showErrors = function (e) {
            var r = this.options.html ? 'html' : 'text',
                a = e.data('bs.validator.errors'),
                i = e.closest('.form-group'),
                o = i.find('.help-block.with-errors'),
                s = i.find('.form-control-feedback');
            a.length &&
            ((a = t('<ul/>')
                .addClass('list-unstyled')
                .append(
                    t.map(a, function (e) {
                        return t('<li/>')[r](e);
                    })
                )),
            void 0 === o.data('bs.validator.originalContent') &&
            o.data('bs.validator.originalContent', o.html()),
                o.empty().append(a),
                i.addClass('has-error has-danger'),
            i.hasClass('has-feedback') &&
            s.removeClass(this.options.feedback.success) &&
            s.addClass(this.options.feedback.error) &&
            i.removeClass('has-success'));
        }),
        (r.prototype.clearErrors = function (t) {
            var r = t.closest('.form-group'),
                a = r.find('.help-block.with-errors'),
                i = r.find('.form-control-feedback');
            a.html(a.data('bs.validator.originalContent')),
                r.removeClass('has-error has-danger has-success'),
            r.hasClass('has-feedback') &&
            i.removeClass(this.options.feedback.error) &&
            i.removeClass(this.options.feedback.success) &&
            e(t) &&
            i.addClass(this.options.feedback.success) &&
            r.addClass('has-success');
        }),
        (r.prototype.hasErrors = function () {
            return !!this.$inputs.filter(function () {
                return !!(t(this).data('bs.validator.errors') || []).length;
            }).length;
        }),
        (r.prototype.isIncomplete = function () {
            return !!this.$inputs.filter('[required]').filter(function () {
                var r = e(t(this));
                return !('string' == typeof r ? t.trim(r) : r);
            }).length;
        }),
        (r.prototype.onSubmit = function (t) {
            this.validate(),
            (this.isIncomplete() || this.hasErrors()) && t.preventDefault();
        }),
        (r.prototype.toggleSubmit = function () {
            this.options.disable &&
            this.$btn.toggleClass(
                'disabled',
                this.isIncomplete() || this.hasErrors()
            );
        }),
        (r.prototype.defer = function (e, r) {
            if (((r = t.proxy(r, this, e)), !this.options.delay)) return r();
            window.clearTimeout(e.data('bs.validator.timeout')),
                e.data(
                    'bs.validator.timeout',
                    window.setTimeout(r, this.options.delay)
                );
        }),
        (r.prototype.reset = function () {
            return (
                this.$element
                    .find('.form-control-feedback')
                    .removeClass(this.options.feedback.error)
                    .removeClass(this.options.feedback.success),
                    this.$inputs
                        .removeData(['bs.validator.errors', 'bs.validator.deferred'])
                        .each(function () {
                            var e = t(this),
                                r = e.data('bs.validator.timeout');
                            window.clearTimeout(r) &&
                            e.removeData('bs.validator.timeout');
                        }),
                    this.$element.find('.help-block.with-errors').each(function () {
                        var e = t(this),
                            r = e.data('bs.validator.originalContent');
                        e.removeData('bs.validator.originalContent').html(r);
                    }),
                    this.$btn.removeClass('disabled'),
                    this.$element
                        .find('.has-error, .has-danger, .has-success')
                        .removeClass('has-error has-danger has-success'),
                    this
            );
        }),
        (r.prototype.destroy = function () {
            return (
                this.reset(),
                    this.$element
                        .removeAttr('novalidate')
                        .removeData('bs.validator')
                        .off('.bs.validator'),
                    this.$inputs.off('.bs.validator'),
                    (this.options = null),
                    (this.validators = null),
                    (this.$element = null),
                    (this.$btn = null),
                    this
            );
        });
    var i = t.fn.validator;
    (t.fn.validator = a),
        (t.fn.validator.Constructor = r),
        (t.fn.validator.noConflict = function () {
            return (t.fn.validator = i), this;
        }),
        t(window).on('load', function () {
            t('form[data-toggle="validator"]').each(function () {
                var e = t(this);
                a.call(e, e.data());
            });
        });
})(jQuery);

/*! WOW wow.js - v1.3.0 - 2016-10-04
 * https://wowjs.uk
 * Copyright (c) 2016 Thomas Grainger; Licensed MIT */ !(function (a, b) {
    if ('function' == typeof define && define.amd)
        define(['module', 'exports'], b);
    else if ('undefined' != typeof exports) b(module, exports);
    else {
        var c = { exports: {} };
        b(c, c.exports), (a.WOW = c.exports);
    }
})(this, function (a, b) {
    'use strict';
    function c(a, b) {
        if (!(a instanceof b))
            throw new TypeError('Cannot call a class as a function');
    }
    function d(a, b) {
        return b.indexOf(a) >= 0;
    }
    function e(a, b) {
        for (var c in b)
            if (null == a[c]) {
                var d = b[c];
                a[c] = d;
            }
        return a;
    }
    function f(a) {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            a
        );
    }
    function g(a) {
        var b =
                arguments.length <= 1 || void 0 === arguments[1]
                    ? !1
                    : arguments[1],
            c =
                arguments.length <= 2 || void 0 === arguments[2]
                    ? !1
                    : arguments[2],
            d =
                arguments.length <= 3 || void 0 === arguments[3]
                    ? null
                    : arguments[3],
            e = void 0;
        return (
            null != document.createEvent
                ? ((e = document.createEvent('CustomEvent')),
                    e.initCustomEvent(a, b, c, d))
                : null != document.createEventObject
                ? ((e = document.createEventObject()), (e.eventType = a))
                : (e.eventName = a),
                e
        );
    }
    function h(a, b) {
        null != a.dispatchEvent
            ? a.dispatchEvent(b)
            : b in (null != a)
            ? a[b]()
            : 'on' + b in (null != a) && a['on' + b]();
    }
    function i(a, b, c) {
        null != a.addEventListener
            ? a.addEventListener(b, c, !1)
            : null != a.attachEvent
            ? a.attachEvent('on' + b, c)
            : (a[b] = c);
    }
    function j(a, b, c) {
        null != a.removeEventListener
            ? a.removeEventListener(b, c, !1)
            : null != a.detachEvent
            ? a.detachEvent('on' + b, c)
            : delete a[b];
    }
    function k() {
        return 'innerHeight' in window
            ? window.innerHeight
            : document.documentElement.clientHeight;
    }
    Object.defineProperty(b, '__esModule', { value: !0 });
    var l,
        m,
        n = (function () {
            function a(a, b) {
                for (var c = 0; c < b.length; c++) {
                    var d = b[c];
                    (d.enumerable = d.enumerable || !1),
                        (d.configurable = !0),
                    'value' in d && (d.writable = !0),
                        Object.defineProperty(a, d.key, d);
                }
            }
            return function (b, c, d) {
                return c && a(b.prototype, c), d && a(b, d), b;
            };
        })(),
        o =
            window.WeakMap ||
            window.MozWeakMap ||
            (function () {
                function a() {
                    c(this, a), (this.keys = []), (this.values = []);
                }
                return (
                    n(a, [
                        {
                            key: 'get',
                            value: function (a) {
                                for (var b = 0; b < this.keys.length; b++) {
                                    var c = this.keys[b];
                                    if (c === a) return this.values[b];
                                }
                            },
                        },
                        {
                            key: 'set',
                            value: function (a, b) {
                                for (var c = 0; c < this.keys.length; c++) {
                                    var d = this.keys[c];
                                    if (d === a) return (this.values[c] = b), this;
                                }
                                return this.keys.push(a), this.values.push(b), this;
                            },
                        },
                    ]),
                        a
                );
            })(),
        p =
            window.MutationObserver ||
            window.WebkitMutationObserver ||
            window.MozMutationObserver ||
            ((m = l =
                (function () {
                    function a() {
                        c(this, a),
                        'undefined' != typeof console &&
                        null !== console &&
                        (console.warn(
                            'MutationObserver is not supported by your browser.'
                        ),
                            console.warn(
                                'WOW.js cannot detect dom mutations, please call .sync() after loading new content.'
                            ));
                    }
                    return n(a, [{ key: 'observe', value: function () {} }]), a;
                })()),
                (l.notSupported = !0),
                m),
        q =
            window.getComputedStyle ||
            function (a) {
                var b = /(\-([a-z]){1})/g;
                return {
                    getPropertyValue: function (c) {
                        'float' === c && (c = 'styleFloat'),
                        b.test(c) &&
                        c.replace(b, function (a, b) {
                            return b.toUpperCase();
                        });
                        var d = a.currentStyle;
                        return (null != d ? d[c] : void 0) || null;
                    },
                };
            },
        r = (function () {
            function a() {
                var b =
                    arguments.length <= 0 || void 0 === arguments[0]
                        ? {}
                        : arguments[0];
                c(this, a),
                    (this.defaults = {
                        boxClass: 'wow',
                        animateClass: 'animated',
                        offset: 0,
                        mobile: !0,
                        live: !0,
                        callback: null,
                        scrollContainer: null,
                        resetAnimation: !0,
                    }),
                    (this.animate = (function () {
                        return 'requestAnimationFrame' in window
                            ? function (a) {
                                return window.requestAnimationFrame(a);
                            }
                            : function (a) {
                                return a();
                            };
                    })()),
                    (this.vendors = ['moz', 'webkit']),
                    (this.start = this.start.bind(this)),
                    (this.resetAnimation = this.resetAnimation.bind(this)),
                    (this.scrollHandler = this.scrollHandler.bind(this)),
                    (this.scrollCallback = this.scrollCallback.bind(this)),
                    (this.scrolled = !0),
                    (this.config = e(b, this.defaults)),
                null != b.scrollContainer &&
                (this.config.scrollContainer = document.querySelector(
                    b.scrollContainer
                )),
                    (this.animationNameCache = new o()),
                    (this.wowEvent = g(this.config.boxClass));
            }
            return (
                n(a, [
                    {
                        key: 'init',
                        value: function () {
                            (this.element = window.document.documentElement),
                                d(document.readyState, ['interactive', 'complete'])
                                    ? this.start()
                                    : i(document, 'DOMContentLoaded', this.start),
                                (this.finished = []);
                        },
                    },
                    {
                        key: 'start',
                        value: function () {
                            var a = this;
                            if (
                                ((this.stopped = !1),
                                    (this.boxes = [].slice.call(
                                        this.element.querySelectorAll(
                                            '.' + this.config.boxClass
                                        )
                                    )),
                                    (this.all = this.boxes.slice(0)),
                                    this.boxes.length)
                            )
                                if (this.disabled()) this.resetStyle();
                                else
                                    for (var b = 0; b < this.boxes.length; b++) {
                                        var c = this.boxes[b];
                                        this.applyStyle(c, !0);
                                    }
                            if (
                                (this.disabled() ||
                                (i(
                                    this.config.scrollContainer || window,
                                    'scroll',
                                    this.scrollHandler
                                ),
                                    i(window, 'resize', this.scrollHandler),
                                    (this.interval = setInterval(
                                        this.scrollCallback,
                                        50
                                    ))),
                                    this.config.live)
                            ) {
                                var d = new p(function (b) {
                                    for (var c = 0; c < b.length; c++)
                                        for (
                                            var d = b[c], e = 0;
                                            e < d.addedNodes.length;
                                            e++
                                        ) {
                                            var f = d.addedNodes[e];
                                            a.doSync(f);
                                        }
                                });
                                d.observe(document.body, {
                                    childList: !0,
                                    subtree: !0,
                                });
                            }
                        },
                    },
                    {
                        key: 'stop',
                        value: function () {
                            (this.stopped = !0),
                                j(
                                    this.config.scrollContainer || window,
                                    'scroll',
                                    this.scrollHandler
                                ),
                                j(window, 'resize', this.scrollHandler),
                            null != this.interval && clearInterval(this.interval);
                        },
                    },
                    {
                        key: 'sync',
                        value: function () {
                            p.notSupported && this.doSync(this.element);
                        },
                    },
                    {
                        key: 'doSync',
                        value: function (a) {
                            if (
                                (('undefined' != typeof a && null !== a) ||
                                (a = this.element),
                                1 === a.nodeType)
                            ) {
                                a = a.parentNode || a;
                                for (
                                    var b = a.querySelectorAll(
                                        '.' + this.config.boxClass
                                        ),
                                        c = 0;
                                    c < b.length;
                                    c++
                                ) {
                                    var e = b[c];
                                    d(e, this.all) ||
                                    (this.boxes.push(e),
                                        this.all.push(e),
                                        this.stopped || this.disabled()
                                            ? this.resetStyle()
                                            : this.applyStyle(e, !0),
                                        (this.scrolled = !0));
                                }
                            }
                        },
                    },
                    {
                        key: 'show',
                        value: function (a) {
                            return (
                                this.applyStyle(a),
                                    (a.className =
                                        a.className + ' ' + this.config.animateClass),
                                null != this.config.callback && this.config.callback(a),
                                    h(a, this.wowEvent),
                                this.config.resetAnimation &&
                                (i(a, 'animationend', this.resetAnimation),
                                    i(a, 'oanimationend', this.resetAnimation),
                                    i(a, 'webkitAnimationEnd', this.resetAnimation),
                                    i(a, 'MSAnimationEnd', this.resetAnimation)),
                                    a
                            );
                        },
                    },
                    {
                        key: 'applyStyle',
                        value: function (a, b) {
                            var c = this,
                                d = a.getAttribute('data-wow-duration'),
                                e = a.getAttribute('data-wow-delay'),
                                f = a.getAttribute('data-wow-iteration');
                            return this.animate(function () {
                                return c.customStyle(a, b, d, e, f);
                            });
                        },
                    },
                    {
                        key: 'resetStyle',
                        value: function () {
                            for (var a = 0; a < this.boxes.length; a++) {
                                var b = this.boxes[a];
                                b.style.visibility = 'visible';
                            }
                        },
                    },
                    {
                        key: 'resetAnimation',
                        value: function (a) {
                            if (a.type.toLowerCase().indexOf('animationend') >= 0) {
                                var b = a.target || a.srcElement;
                                b.className = b.className
                                    .replace(this.config.animateClass, '')
                                    .trim();
                            }
                        },
                    },
                    {
                        key: 'customStyle',
                        value: function (a, b, c, d, e) {
                            return (
                                b && this.cacheAnimationName(a),
                                    (a.style.visibility = b ? 'hidden' : 'visible'),
                                c && this.vendorSet(a.style, { animationDuration: c }),
                                d && this.vendorSet(a.style, { animationDelay: d }),
                                e &&
                                this.vendorSet(a.style, {
                                    animationIterationCount: e,
                                }),
                                    this.vendorSet(a.style, {
                                        animationName: b
                                            ? 'none'
                                            : this.cachedAnimationName(a),
                                    }),
                                    a
                            );
                        },
                    },
                    {
                        key: 'vendorSet',
                        value: function (a, b) {
                            for (var c in b)
                                if (b.hasOwnProperty(c)) {
                                    var d = b[c];
                                    a['' + c] = d;
                                    for (var e = 0; e < this.vendors.length; e++) {
                                        var f = this.vendors[e];
                                        a[
                                        '' +
                                        f +
                                        c.charAt(0).toUpperCase() +
                                        c.substr(1)
                                            ] = d;
                                    }
                                }
                        },
                    },
                    {
                        key: 'vendorCSS',
                        value: function (a, b) {
                            for (
                                var c = q(a), d = c.getPropertyCSSValue(b), e = 0;
                                e < this.vendors.length;
                                e++
                            ) {
                                var f = this.vendors[e];
                                d = d || c.getPropertyCSSValue('-' + f + '-' + b);
                            }
                            return d;
                        },
                    },
                    {
                        key: 'animationName',
                        value: function (a) {
                            var b = void 0;
                            try {
                                b = this.vendorCSS(a, 'animation-name').cssText;
                            } catch (c) {
                                b = q(a).getPropertyValue('animation-name');
                            }
                            return 'none' === b ? '' : b;
                        },
                    },
                    {
                        key: 'cacheAnimationName',
                        value: function (a) {
                            return this.animationNameCache.set(
                                a,
                                this.animationName(a)
                            );
                        },
                    },
                    {
                        key: 'cachedAnimationName',
                        value: function (a) {
                            return this.animationNameCache.get(a);
                        },
                    },
                    {
                        key: 'scrollHandler',
                        value: function () {
                            this.scrolled = !0;
                        },
                    },
                    {
                        key: 'scrollCallback',
                        value: function () {
                            if (this.scrolled) {
                                this.scrolled = !1;
                                for (var a = [], b = 0; b < this.boxes.length; b++) {
                                    var c = this.boxes[b];
                                    if (c) {
                                        if (this.isVisible(c)) {
                                            this.show(c);
                                            continue;
                                        }
                                        a.push(c);
                                    }
                                }
                                (this.boxes = a),
                                this.boxes.length || this.config.live || this.stop();
                            }
                        },
                    },
                    {
                        key: 'offsetTop',
                        value: function (a) {
                            for (; void 0 === a.offsetTop; ) a = a.parentNode;
                            for (var b = a.offsetTop; a.offsetParent; )
                                (a = a.offsetParent), (b += a.offsetTop);
                            return b;
                        },
                    },
                    {
                        key: 'isVisible',
                        value: function (a) {
                            var b =
                                a.getAttribute('data-wow-offset') ||
                                this.config.offset,
                                c =
                                    (this.config.scrollContainer &&
                                        this.config.scrollContainer.scrollTop) ||
                                    window.pageYOffset,
                                d = c + Math.min(this.element.clientHeight, k()) - b,
                                e = this.offsetTop(a),
                                f = e + a.clientHeight;
                            return d >= e && f >= c;
                        },
                    },
                    {
                        key: 'disabled',
                        value: function () {
                            return !this.config.mobile && f(navigator.userAgent);
                        },
                    },
                ]),
                    a
            );
        })();
    (b['default'] = r), (a.exports = b['default']);
});

/*! lozad.js - v1.16.0 - 2020-09-06
* https://github.com/ApoorvSaxena/lozad.js
* Copyright (c) 2020 Apoorv Saxena; Licensed MIT */


(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            (global.lozad = factory());
}(this, (function () { 'use strict';

    /**
     * Detect IE browser
     * @const {boolean}
     * @private
     */
    var isIE = typeof document !== 'undefined' && document.documentMode;

    var defaultConfig = {
        rootMargin: '0px',
        threshold: 0,
        load: function load(element) {
            if (element.nodeName.toLowerCase() === 'picture') {
                var img = element.querySelector('img');
                var append = false;

                if (img === null) {
                    img = document.createElement('img');
                    append = true;
                }

                if (isIE && element.getAttribute('data-iesrc')) {
                    img.src = element.getAttribute('data-iesrc');
                }

                if (element.getAttribute('data-alt')) {
                    img.alt = element.getAttribute('data-alt');
                }

                if (append) {
                    element.append(img);
                }
            }

            if (element.nodeName.toLowerCase() === 'video' && !element.getAttribute('data-src')) {
                if (element.children) {
                    var childs = element.children;
                    var childSrc = void 0;
                    for (var i = 0; i <= childs.length - 1; i++) {
                        childSrc = childs[i].getAttribute('data-src');
                        if (childSrc) {
                            childs[i].src = childSrc;
                        }
                    }

                    element.load();
                }
            }

            if (element.getAttribute('data-poster')) {
                element.poster = element.getAttribute('data-poster');
            }

            if (element.getAttribute('data-src')) {
                element.src = element.getAttribute('data-src');
            }

            if (element.getAttribute('data-srcset')) {
                element.setAttribute('srcset', element.getAttribute('data-srcset'));
            }

            var backgroundImageDelimiter = ',';
            if (element.getAttribute('data-background-delimiter')) {
                backgroundImageDelimiter = element.getAttribute('data-background-delimiter');
            }

            if (element.getAttribute('data-background-image')) {
                element.style.backgroundImage = 'url(\'' + element.getAttribute('data-background-image').split(backgroundImageDelimiter).join('\'),url(\'') + '\')';
            } else if (element.getAttribute('data-background-image-set')) {
                var imageSetLinks = element.getAttribute('data-background-image-set').split(backgroundImageDelimiter);
                var firstUrlLink = imageSetLinks[0].substr(0, imageSetLinks[0].indexOf(' ')) || imageSetLinks[0]; // Substring before ... 1x
                firstUrlLink = firstUrlLink.indexOf('url(') === -1 ? 'url(' + firstUrlLink + ')' : firstUrlLink;
                if (imageSetLinks.length === 1) {
                    element.style.backgroundImage = firstUrlLink;
                } else {
                    element.setAttribute('style', (element.getAttribute('style') || '') + ('background-image: ' + firstUrlLink + '; background-image: -webkit-image-set(' + imageSetLinks + '); background-image: image-set(' + imageSetLinks + ')'));
                }
            }

            if (element.getAttribute('data-toggle-class')) {
                element.classList.toggle(element.getAttribute('data-toggle-class'));
            }
        },
        loaded: function loaded() {}
    };

    function markAsLoaded(element) {
        element.setAttribute('data-loaded', true);
    }

    function preLoad(element) {
        if (element.getAttribute('data-placeholder-background')) {
            element.style.background = element.getAttribute('data-placeholder-background');
        }
    }

    var isLoaded = function isLoaded(element) {
        return element.getAttribute('data-loaded') === 'true';
    };

    var onIntersection = function onIntersection(load, loaded) {
        return function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.intersectionRatio > 0 || entry.isIntersecting) {
                    observer.unobserve(entry.target);

                    if (!isLoaded(entry.target)) {
                        load(entry.target);
                        markAsLoaded(entry.target);
                        loaded(entry.target);
                    }
                }
            });
        };
    };

    var getElements = function getElements(selector) {
        var root = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : document;

        if (selector instanceof Element) {
            return [selector];
        }

        if (selector instanceof NodeList) {
            return selector;
        }

        return root.querySelectorAll(selector);
    };

    function lozad () {
        var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.lozad';
        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

        var _Object$assign = Object.assign({}, defaultConfig, options),
            root = _Object$assign.root,
            rootMargin = _Object$assign.rootMargin,
            threshold = _Object$assign.threshold,
            load = _Object$assign.load,
            loaded = _Object$assign.loaded;

        var observer = void 0;

        if (typeof window !== 'undefined' && window.IntersectionObserver) {
            observer = new IntersectionObserver(onIntersection(load, loaded), {
                root: root,
                rootMargin: rootMargin,
                threshold: threshold
            });
        }

        var elements = getElements(selector, root);
        for (var i = 0; i < elements.length; i++) {
            preLoad(elements[i]);
        }

        return {
            observe: function observe() {
                var elements = getElements(selector, root);

                for (var _i = 0; _i < elements.length; _i++) {
                    if (isLoaded(elements[_i])) {
                        continue;
                    }

                    if (observer) {
                        observer.observe(elements[_i]);
                        continue;
                    }

                    load(elements[_i]);
                    markAsLoaded(elements[_i]);
                    loaded(elements[_i]);
                }
            },
            triggerLoad: function triggerLoad(element) {
                if (isLoaded(element)) {
                    return;
                }

                load(element);
                markAsLoaded(element);
                loaded(element);
            },

            observer: observer
        };
    }

    return lozad;

})));

var VanillaTilt=function(){"use strict";class t{constructor(e,i={}){if(!(e instanceof Node))throw"Can't initialize VanillaTilt because "+e+" is not a Node.";this.width=null,this.height=null,this.clientWidth=null,this.clientHeight=null,this.left=null,this.top=null,this.gammazero=null,this.betazero=null,this.lastgammazero=null,this.lastbetazero=null,this.transitionTimeout=null,this.updateCall=null,this.event=null,this.updateBind=this.update.bind(this),this.resetBind=this.reset.bind(this),this.element=e,this.settings=this.extendSettings(i),this.reverse=this.settings.reverse?-1:1,this.glare=t.isSettingTrue(this.settings.glare),this.glarePrerender=t.isSettingTrue(this.settings["glare-prerender"]),this.fullPageListening=t.isSettingTrue(this.settings["full-page-listening"]),this.gyroscope=t.isSettingTrue(this.settings.gyroscope),this.gyroscopeSamples=this.settings.gyroscopeSamples,this.elementListener=this.getElementListener(),this.glare&&this.prepareGlare(),this.fullPageListening&&this.updateClientSize(),this.addEventListeners(),this.reset(),this.updateInitialPosition()}static isSettingTrue(t){return""===t||!0===t||1===t}getElementListener(){if(this.fullPageListening)return window.document;if("string"==typeof this.settings["mouse-event-element"]){const t=document.querySelector(this.settings["mouse-event-element"]);if(t)return t}return this.settings["mouse-event-element"]instanceof Node?this.settings["mouse-event-element"]:this.element}addEventListeners(){this.onMouseEnterBind=this.onMouseEnter.bind(this),this.onMouseMoveBind=this.onMouseMove.bind(this),this.onMouseLeaveBind=this.onMouseLeave.bind(this),this.onWindowResizeBind=this.onWindowResize.bind(this),this.onDeviceOrientationBind=this.onDeviceOrientation.bind(this),this.elementListener.addEventListener("mouseenter",this.onMouseEnterBind),this.elementListener.addEventListener("mouseleave",this.onMouseLeaveBind),this.elementListener.addEventListener("mousemove",this.onMouseMoveBind),(this.glare||this.fullPageListening)&&window.addEventListener("resize",this.onWindowResizeBind),this.gyroscope&&window.addEventListener("deviceorientation",this.onDeviceOrientationBind)}removeEventListeners(){this.elementListener.removeEventListener("mouseenter",this.onMouseEnterBind),this.elementListener.removeEventListener("mouseleave",this.onMouseLeaveBind),this.elementListener.removeEventListener("mousemove",this.onMouseMoveBind),this.gyroscope&&window.removeEventListener("deviceorientation",this.onDeviceOrientationBind),(this.glare||this.fullPageListening)&&window.removeEventListener("resize",this.onWindowResizeBind)}destroy(){clearTimeout(this.transitionTimeout),null!==this.updateCall&&cancelAnimationFrame(this.updateCall),this.reset(),this.removeEventListeners(),this.element.vanillaTilt=null,delete this.element.vanillaTilt,this.element=null}onDeviceOrientation(t){if(null===t.gamma||null===t.beta)return;this.updateElementPosition(),this.gyroscopeSamples>0&&(this.lastgammazero=this.gammazero,this.lastbetazero=this.betazero,null===this.gammazero?(this.gammazero=t.gamma,this.betazero=t.beta):(this.gammazero=(t.gamma+this.lastgammazero)/2,this.betazero=(t.beta+this.lastbetazero)/2),this.gyroscopeSamples-=1);const e=this.settings.gyroscopeMaxAngleX-this.settings.gyroscopeMinAngleX,i=this.settings.gyroscopeMaxAngleY-this.settings.gyroscopeMinAngleY,s=e/this.width,n=i/this.height,l=(t.gamma-(this.settings.gyroscopeMinAngleX+this.gammazero))/s,a=(t.beta-(this.settings.gyroscopeMinAngleY+this.betazero))/n;null!==this.updateCall&&cancelAnimationFrame(this.updateCall),this.event={clientX:l+this.left,clientY:a+this.top},this.updateCall=requestAnimationFrame(this.updateBind)}onMouseEnter(){this.updateElementPosition(),this.element.style.willChange="transform",this.setTransition()}onMouseMove(t){null!==this.updateCall&&cancelAnimationFrame(this.updateCall),this.event=t,this.updateCall=requestAnimationFrame(this.updateBind)}onMouseLeave(){this.setTransition(),this.settings.reset&&requestAnimationFrame(this.resetBind)}reset(){this.event={clientX:this.left+this.width/2,clientY:this.top+this.height/2},this.element&&this.element.style&&(this.element.style.transform=`perspective(${this.settings.perspective}px) `+"rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)"),this.resetGlare()}resetGlare(){this.glare&&(this.glareElement.style.transform="rotate(180deg) translate(-50%, -50%)",this.glareElement.style.opacity="0")}updateInitialPosition(){if(0===this.settings.startX&&0===this.settings.startY)return;this.onMouseEnter(),this.fullPageListening?this.event={clientX:(this.settings.startX+this.settings.max)/(2*this.settings.max)*this.clientWidth,clientY:(this.settings.startY+this.settings.max)/(2*this.settings.max)*this.clientHeight}:this.event={clientX:this.left+(this.settings.startX+this.settings.max)/(2*this.settings.max)*this.width,clientY:this.top+(this.settings.startY+this.settings.max)/(2*this.settings.max)*this.height};let t=this.settings.scale;this.settings.scale=1,this.update(),this.settings.scale=t,this.resetGlare()}getValues(){let t,e;return this.fullPageListening?(t=this.event.clientX/this.clientWidth,e=this.event.clientY/this.clientHeight):(t=(this.event.clientX-this.left)/this.width,e=(this.event.clientY-this.top)/this.height),t=Math.min(Math.max(t,0),1),e=Math.min(Math.max(e,0),1),{tiltX:(this.reverse*(this.settings.max-t*this.settings.max*2)).toFixed(2),tiltY:(this.reverse*(e*this.settings.max*2-this.settings.max)).toFixed(2),percentageX:100*t,percentageY:100*e,angle:Math.atan2(this.event.clientX-(this.left+this.width/2),-(this.event.clientY-(this.top+this.height/2)))*(180/Math.PI)}}updateElementPosition(){let t=this.element.getBoundingClientRect();this.width=this.element.offsetWidth,this.height=this.element.offsetHeight,this.left=t.left,this.top=t.top}update(){let t=this.getValues();this.element.style.transform="perspective("+this.settings.perspective+"px) rotateX("+("x"===this.settings.axis?0:t.tiltY)+"deg) rotateY("+("y"===this.settings.axis?0:t.tiltX)+"deg) scale3d("+this.settings.scale+", "+this.settings.scale+", "+this.settings.scale+")",this.glare&&(this.glareElement.style.transform=`rotate(${t.angle}deg) translate(-50%, -50%)`,this.glareElement.style.opacity=`${t.percentageY*this.settings["max-glare"]/100}`),this.element.dispatchEvent(new CustomEvent("tiltChange",{detail:t})),this.updateCall=null}prepareGlare(){if(!this.glarePrerender){const t=document.createElement("div");t.classList.add("js-tilt-glare");const e=document.createElement("div");e.classList.add("js-tilt-glare-inner"),t.appendChild(e),this.element.appendChild(t)}this.glareElementWrapper=this.element.querySelector(".js-tilt-glare"),this.glareElement=this.element.querySelector(".js-tilt-glare-inner"),this.glarePrerender||(Object.assign(this.glareElementWrapper.style,{position:"absolute",top:"0",left:"0",width:"100%",height:"100%",overflow:"hidden","pointer-events":"none"}),Object.assign(this.glareElement.style,{position:"absolute",top:"50%",left:"50%","pointer-events":"none","background-image":"linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)",width:`${2*this.element.offsetWidth}px`,height:`${2*this.element.offsetWidth}px`,transform:"rotate(180deg) translate(-50%, -50%)","transform-origin":"0% 0%",opacity:"0"}))}updateGlareSize(){this.glare&&Object.assign(this.glareElement.style,{width:`${2*this.element.offsetWidth}`,height:`${2*this.element.offsetWidth}`})}updateClientSize(){this.clientWidth=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,this.clientHeight=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight}onWindowResize(){this.updateGlareSize(),this.updateClientSize()}setTransition(){clearTimeout(this.transitionTimeout),this.element.style.transition=this.settings.speed+"ms "+this.settings.easing,this.glare&&(this.glareElement.style.transition=`opacity ${this.settings.speed}ms ${this.settings.easing}`),this.transitionTimeout=setTimeout(()=>{this.element.style.transition="",this.glare&&(this.glareElement.style.transition="")},this.settings.speed)}extendSettings(t){let e={reverse:!1,max:15,startX:0,startY:0,perspective:1e3,easing:"cubic-bezier(.03,.98,.52,.99)",scale:1,speed:300,transition:!0,axis:null,glare:!1,"max-glare":1,"glare-prerender":!1,"full-page-listening":!1,"mouse-event-element":null,reset:!0,gyroscope:!0,gyroscopeMinAngleX:-45,gyroscopeMaxAngleX:45,gyroscopeMinAngleY:-45,gyroscopeMaxAngleY:45,gyroscopeSamples:10},i={};for(var s in e)if(s in t)i[s]=t[s];else if(this.element.hasAttribute("data-tilt-"+s)){let t=this.element.getAttribute("data-tilt-"+s);try{i[s]=JSON.parse(t)}catch(e){i[s]=t}}else i[s]=e[s];return i}static init(e,i){e instanceof Node&&(e=[e]),e instanceof NodeList&&(e=[].slice.call(e)),e instanceof Array&&e.forEach(e=>{"vanillaTilt"in e||(e.vanillaTilt=new t(e,i))})}}return"undefined"!=typeof document&&(window.VanillaTilt=t,t.init(document.querySelectorAll("[data-tilt]"))),t}();

/*
 Copyright (C) Federico Zivolo 2017
 Distributed under the MIT License (license terms are at http://opensource.org/licenses/MIT).
 */(function(e,t){'object'==typeof exports&&'undefined'!=typeof module?module.exports=t():'function'==typeof define&&define.amd?define(t):e.Popper=t()})(this,function(){'use strict';function e(e){return e&&'[object Function]'==={}.toString.call(e)}function t(e,t){if(1!==e.nodeType)return[];var o=getComputedStyle(e,null);return t?o[t]:o}function o(e){return'HTML'===e.nodeName?e:e.parentNode||e.host}function n(e){if(!e)return document.body;switch(e.nodeName){case'HTML':case'BODY':return e.ownerDocument.body;case'#document':return e.body;}var i=t(e),r=i.overflow,p=i.overflowX,s=i.overflowY;return /(auto|scroll)/.test(r+s+p)?e:n(o(e))}function r(e){var o=e&&e.offsetParent,i=o&&o.nodeName;return i&&'BODY'!==i&&'HTML'!==i?-1!==['TD','TABLE'].indexOf(o.nodeName)&&'static'===t(o,'position')?r(o):o:e?e.ownerDocument.documentElement:document.documentElement}function p(e){var t=e.nodeName;return'BODY'!==t&&('HTML'===t||r(e.firstElementChild)===e)}function s(e){return null===e.parentNode?e:s(e.parentNode)}function d(e,t){if(!e||!e.nodeType||!t||!t.nodeType)return document.documentElement;var o=e.compareDocumentPosition(t)&Node.DOCUMENT_POSITION_FOLLOWING,i=o?e:t,n=o?t:e,a=document.createRange();a.setStart(i,0),a.setEnd(n,0);var l=a.commonAncestorContainer;if(e!==l&&t!==l||i.contains(n))return p(l)?l:r(l);var f=s(e);return f.host?d(f.host,t):d(e,s(t).host)}function a(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:'top',o='top'===t?'scrollTop':'scrollLeft',i=e.nodeName;if('BODY'===i||'HTML'===i){var n=e.ownerDocument.documentElement,r=e.ownerDocument.scrollingElement||n;return r[o]}return e[o]}function l(e,t){var o=2<arguments.length&&void 0!==arguments[2]&&arguments[2],i=a(t,'top'),n=a(t,'left'),r=o?-1:1;return e.top+=i*r,e.bottom+=i*r,e.left+=n*r,e.right+=n*r,e}function f(e,t){var o='x'===t?'Left':'Top',i='Left'==o?'Right':'Bottom';return parseFloat(e['border'+o+'Width'],10)+parseFloat(e['border'+i+'Width'],10)}function m(e,t,o,i){return J(t['offset'+e],t['scroll'+e],o['client'+e],o['offset'+e],o['scroll'+e],ie()?o['offset'+e]+i['margin'+('Height'===e?'Top':'Left')]+i['margin'+('Height'===e?'Bottom':'Right')]:0)}function h(){var e=document.body,t=document.documentElement,o=ie()&&getComputedStyle(t);return{height:m('Height',e,t,o),width:m('Width',e,t,o)}}function c(e){return se({},e,{right:e.left+e.width,bottom:e.top+e.height})}function g(e){var o={};if(ie())try{o=e.getBoundingClientRect();var i=a(e,'top'),n=a(e,'left');o.top+=i,o.left+=n,o.bottom+=i,o.right+=n}catch(e){}else o=e.getBoundingClientRect();var r={left:o.left,top:o.top,width:o.right-o.left,height:o.bottom-o.top},p='HTML'===e.nodeName?h():{},s=p.width||e.clientWidth||r.right-r.left,d=p.height||e.clientHeight||r.bottom-r.top,l=e.offsetWidth-s,m=e.offsetHeight-d;if(l||m){var g=t(e);l-=f(g,'x'),m-=f(g,'y'),r.width-=l,r.height-=m}return c(r)}function u(e,o){var i=ie(),r='HTML'===o.nodeName,p=g(e),s=g(o),d=n(e),a=t(o),f=parseFloat(a.borderTopWidth,10),m=parseFloat(a.borderLeftWidth,10),h=c({top:p.top-s.top-f,left:p.left-s.left-m,width:p.width,height:p.height});if(h.marginTop=0,h.marginLeft=0,!i&&r){var u=parseFloat(a.marginTop,10),b=parseFloat(a.marginLeft,10);h.top-=f-u,h.bottom-=f-u,h.left-=m-b,h.right-=m-b,h.marginTop=u,h.marginLeft=b}return(i?o.contains(d):o===d&&'BODY'!==d.nodeName)&&(h=l(h,o)),h}function b(e){var t=e.ownerDocument.documentElement,o=u(e,t),i=J(t.clientWidth,window.innerWidth||0),n=J(t.clientHeight,window.innerHeight||0),r=a(t),p=a(t,'left'),s={top:r-o.top+o.marginTop,left:p-o.left+o.marginLeft,width:i,height:n};return c(s)}function w(e){var i=e.nodeName;return'BODY'===i||'HTML'===i?!1:'fixed'===t(e,'position')||w(o(e))}function y(e,t,i,r){var p={top:0,left:0},s=d(e,t);if('viewport'===r)p=b(s);else{var a;'scrollParent'===r?(a=n(o(t)),'BODY'===a.nodeName&&(a=e.ownerDocument.documentElement)):'window'===r?a=e.ownerDocument.documentElement:a=r;var l=u(a,s);if('HTML'===a.nodeName&&!w(s)){var f=h(),m=f.height,c=f.width;p.top+=l.top-l.marginTop,p.bottom=m+l.top,p.left+=l.left-l.marginLeft,p.right=c+l.left}else p=l}return p.left+=i,p.top+=i,p.right-=i,p.bottom-=i,p}function E(e){var t=e.width,o=e.height;return t*o}function v(e,t,o,i,n){var r=5<arguments.length&&void 0!==arguments[5]?arguments[5]:0;if(-1===e.indexOf('auto'))return e;var p=y(o,i,r,n),s={top:{width:p.width,height:t.top-p.top},right:{width:p.right-t.right,height:p.height},bottom:{width:p.width,height:p.bottom-t.bottom},left:{width:t.left-p.left,height:p.height}},d=Object.keys(s).map(function(e){return se({key:e},s[e],{area:E(s[e])})}).sort(function(e,t){return t.area-e.area}),a=d.filter(function(e){var t=e.width,i=e.height;return t>=o.clientWidth&&i>=o.clientHeight}),l=0<a.length?a[0].key:d[0].key,f=e.split('-')[1];return l+(f?'-'+f:'')}function O(e,t,o){var i=d(t,o);return u(o,i)}function L(e){var t=getComputedStyle(e),o=parseFloat(t.marginTop)+parseFloat(t.marginBottom),i=parseFloat(t.marginLeft)+parseFloat(t.marginRight),n={width:e.offsetWidth+i,height:e.offsetHeight+o};return n}function x(e){var t={left:'right',right:'left',bottom:'top',top:'bottom'};return e.replace(/left|right|bottom|top/g,function(e){return t[e]})}function S(e,t,o){o=o.split('-')[0];var i=L(e),n={width:i.width,height:i.height},r=-1!==['right','left'].indexOf(o),p=r?'top':'left',s=r?'left':'top',d=r?'height':'width',a=r?'width':'height';return n[p]=t[p]+t[d]/2-i[d]/2,n[s]=o===s?t[s]-i[a]:t[x(s)],n}function T(e,t){return Array.prototype.find?e.find(t):e.filter(t)[0]}function D(e,t,o){if(Array.prototype.findIndex)return e.findIndex(function(e){return e[t]===o});var i=T(e,function(e){return e[t]===o});return e.indexOf(i)}function C(t,o,i){var n=void 0===i?t:t.slice(0,D(t,'name',i));return n.forEach(function(t){t['function']&&console.warn('`modifier.function` is deprecated, use `modifier.fn`!');var i=t['function']||t.fn;t.enabled&&e(i)&&(o.offsets.popper=c(o.offsets.popper),o.offsets.reference=c(o.offsets.reference),o=i(o,t))}),o}function N(){if(!this.state.isDestroyed){var e={instance:this,styles:{},arrowStyles:{},attributes:{},flipped:!1,offsets:{}};e.offsets.reference=O(this.state,this.popper,this.reference),e.placement=v(this.options.placement,e.offsets.reference,this.popper,this.reference,this.options.modifiers.flip.boundariesElement,this.options.modifiers.flip.padding),e.originalPlacement=e.placement,e.offsets.popper=S(this.popper,e.offsets.reference,e.placement),e.offsets.popper.position='absolute',e=C(this.modifiers,e),this.state.isCreated?this.options.onUpdate(e):(this.state.isCreated=!0,this.options.onCreate(e))}}function k(e,t){return e.some(function(e){var o=e.name,i=e.enabled;return i&&o===t})}function W(e){for(var t=[!1,'ms','Webkit','Moz','O'],o=e.charAt(0).toUpperCase()+e.slice(1),n=0;n<t.length-1;n++){var i=t[n],r=i?''+i+o:e;if('undefined'!=typeof document.body.style[r])return r}return null}function P(){return this.state.isDestroyed=!0,k(this.modifiers,'applyStyle')&&(this.popper.removeAttribute('x-placement'),this.popper.style.left='',this.popper.style.position='',this.popper.style.top='',this.popper.style[W('transform')]=''),this.disableEventListeners(),this.options.removeOnDestroy&&this.popper.parentNode.removeChild(this.popper),this}function B(e){var t=e.ownerDocument;return t?t.defaultView:window}function H(e,t,o,i){var r='BODY'===e.nodeName,p=r?e.ownerDocument.defaultView:e;p.addEventListener(t,o,{passive:!0}),r||H(n(p.parentNode),t,o,i),i.push(p)}function A(e,t,o,i){o.updateBound=i,B(e).addEventListener('resize',o.updateBound,{passive:!0});var r=n(e);return H(r,'scroll',o.updateBound,o.scrollParents),o.scrollElement=r,o.eventsEnabled=!0,o}function I(){this.state.eventsEnabled||(this.state=A(this.reference,this.options,this.state,this.scheduleUpdate))}function M(e,t){return B(e).removeEventListener('resize',t.updateBound),t.scrollParents.forEach(function(e){e.removeEventListener('scroll',t.updateBound)}),t.updateBound=null,t.scrollParents=[],t.scrollElement=null,t.eventsEnabled=!1,t}function R(){this.state.eventsEnabled&&(cancelAnimationFrame(this.scheduleUpdate),this.state=M(this.reference,this.state))}function U(e){return''!==e&&!isNaN(parseFloat(e))&&isFinite(e)}function Y(e,t){Object.keys(t).forEach(function(o){var i='';-1!==['width','height','top','right','bottom','left'].indexOf(o)&&U(t[o])&&(i='px'),e.style[o]=t[o]+i})}function j(e,t){Object.keys(t).forEach(function(o){var i=t[o];!1===i?e.removeAttribute(o):e.setAttribute(o,t[o])})}function F(e,t,o){var i=T(e,function(e){var o=e.name;return o===t}),n=!!i&&e.some(function(e){return e.name===o&&e.enabled&&e.order<i.order});if(!n){var r='`'+t+'`';console.warn('`'+o+'`'+' modifier is required by '+r+' modifier in order to work, be sure to include it before '+r+'!')}return n}function K(e){return'end'===e?'start':'start'===e?'end':e}function q(e){var t=1<arguments.length&&void 0!==arguments[1]&&arguments[1],o=ae.indexOf(e),i=ae.slice(o+1).concat(ae.slice(0,o));return t?i.reverse():i}function V(e,t,o,i){var n=e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),r=+n[1],p=n[2];if(!r)return e;if(0===p.indexOf('%')){var s;switch(p){case'%p':s=o;break;case'%':case'%r':default:s=i;}var d=c(s);return d[t]/100*r}if('vh'===p||'vw'===p){var a;return a='vh'===p?J(document.documentElement.clientHeight,window.innerHeight||0):J(document.documentElement.clientWidth,window.innerWidth||0),a/100*r}return r}function z(e,t,o,i){var n=[0,0],r=-1!==['right','left'].indexOf(i),p=e.split(/(\+|\-)/).map(function(e){return e.trim()}),s=p.indexOf(T(p,function(e){return-1!==e.search(/,|\s/)}));p[s]&&-1===p[s].indexOf(',')&&console.warn('Offsets separated by white space(s) are deprecated, use a comma (,) instead.');var d=/\s*,\s*|\s+/,a=-1===s?[p]:[p.slice(0,s).concat([p[s].split(d)[0]]),[p[s].split(d)[1]].concat(p.slice(s+1))];return a=a.map(function(e,i){var n=(1===i?!r:r)?'height':'width',p=!1;return e.reduce(function(e,t){return''===e[e.length-1]&&-1!==['+','-'].indexOf(t)?(e[e.length-1]=t,p=!0,e):p?(e[e.length-1]+=t,p=!1,e):e.concat(t)},[]).map(function(e){return V(e,n,t,o)})}),a.forEach(function(e,t){e.forEach(function(o,i){U(o)&&(n[t]+=o*('-'===e[i-1]?-1:1))})}),n}function G(e,t){var o,i=t.offset,n=e.placement,r=e.offsets,p=r.popper,s=r.reference,d=n.split('-')[0];return o=U(+i)?[+i,0]:z(i,p,s,d),'left'===d?(p.top+=o[0],p.left-=o[1]):'right'===d?(p.top+=o[0],p.left+=o[1]):'top'===d?(p.left+=o[0],p.top-=o[1]):'bottom'===d&&(p.left+=o[0],p.top+=o[1]),e.popper=p,e}for(var _=Math.min,X=Math.floor,J=Math.max,Q='undefined'!=typeof window&&'undefined'!=typeof document,Z=['Edge','Trident','Firefox'],$=0,ee=0;ee<Z.length;ee+=1)if(Q&&0<=navigator.userAgent.indexOf(Z[ee])){$=1;break}var i,te=Q&&window.Promise,oe=te?function(e){var t=!1;return function(){t||(t=!0,window.Promise.resolve().then(function(){t=!1,e()}))}}:function(e){var t=!1;return function(){t||(t=!0,setTimeout(function(){t=!1,e()},$))}},ie=function(){return void 0==i&&(i=-1!==navigator.appVersion.indexOf('MSIE 10')),i},ne=function(e,t){if(!(e instanceof t))throw new TypeError('Cannot call a class as a function')},re=function(){function e(e,t){for(var o,n=0;n<t.length;n++)o=t[n],o.enumerable=o.enumerable||!1,o.configurable=!0,'value'in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}return function(t,o,i){return o&&e(t.prototype,o),i&&e(t,i),t}}(),pe=function(e,t,o){return t in e?Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[t]=o,e},se=Object.assign||function(e){for(var t,o=1;o<arguments.length;o++)for(var i in t=arguments[o],t)Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},de=['auto-start','auto','auto-end','top-start','top','top-end','right-start','right','right-end','bottom-end','bottom','bottom-start','left-end','left','left-start'],ae=de.slice(3),le={FLIP:'flip',CLOCKWISE:'clockwise',COUNTERCLOCKWISE:'counterclockwise'},fe=function(){function t(o,i){var n=this,r=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{};ne(this,t),this.scheduleUpdate=function(){return requestAnimationFrame(n.update)},this.update=oe(this.update.bind(this)),this.options=se({},t.Defaults,r),this.state={isDestroyed:!1,isCreated:!1,scrollParents:[]},this.reference=o&&o.jquery?o[0]:o,this.popper=i&&i.jquery?i[0]:i,this.options.modifiers={},Object.keys(se({},t.Defaults.modifiers,r.modifiers)).forEach(function(e){n.options.modifiers[e]=se({},t.Defaults.modifiers[e]||{},r.modifiers?r.modifiers[e]:{})}),this.modifiers=Object.keys(this.options.modifiers).map(function(e){return se({name:e},n.options.modifiers[e])}).sort(function(e,t){return e.order-t.order}),this.modifiers.forEach(function(t){t.enabled&&e(t.onLoad)&&t.onLoad(n.reference,n.popper,n.options,t,n.state)}),this.update();var p=this.options.eventsEnabled;p&&this.enableEventListeners(),this.state.eventsEnabled=p}return re(t,[{key:'update',value:function(){return N.call(this)}},{key:'destroy',value:function(){return P.call(this)}},{key:'enableEventListeners',value:function(){return I.call(this)}},{key:'disableEventListeners',value:function(){return R.call(this)}}]),t}();return fe.Utils=('undefined'==typeof window?global:window).PopperUtils,fe.placements=de,fe.Defaults={placement:'bottom',eventsEnabled:!0,removeOnDestroy:!1,onCreate:function(){},onUpdate:function(){},modifiers:{shift:{order:100,enabled:!0,fn:function(e){var t=e.placement,o=t.split('-')[0],i=t.split('-')[1];if(i){var n=e.offsets,r=n.reference,p=n.popper,s=-1!==['bottom','top'].indexOf(o),d=s?'left':'top',a=s?'width':'height',l={start:pe({},d,r[d]),end:pe({},d,r[d]+r[a]-p[a])};e.offsets.popper=se({},p,l[i])}return e}},offset:{order:200,enabled:!0,fn:G,offset:0},preventOverflow:{order:300,enabled:!0,fn:function(e,t){var o=t.boundariesElement||r(e.instance.popper);e.instance.reference===o&&(o=r(o));var i=y(e.instance.popper,e.instance.reference,t.padding,o);t.boundaries=i;var n=t.priority,p=e.offsets.popper,s={primary:function(e){var o=p[e];return p[e]<i[e]&&!t.escapeWithReference&&(o=J(p[e],i[e])),pe({},e,o)},secondary:function(e){var o='right'===e?'left':'top',n=p[o];return p[e]>i[e]&&!t.escapeWithReference&&(n=_(p[o],i[e]-('right'===e?p.width:p.height))),pe({},o,n)}};return n.forEach(function(e){var t=-1===['left','top'].indexOf(e)?'secondary':'primary';p=se({},p,s[t](e))}),e.offsets.popper=p,e},priority:['left','right','top','bottom'],padding:5,boundariesElement:'scrollParent'},keepTogether:{order:400,enabled:!0,fn:function(e){var t=e.offsets,o=t.popper,i=t.reference,n=e.placement.split('-')[0],r=X,p=-1!==['top','bottom'].indexOf(n),s=p?'right':'bottom',d=p?'left':'top',a=p?'width':'height';return o[s]<r(i[d])&&(e.offsets.popper[d]=r(i[d])-o[a]),o[d]>r(i[s])&&(e.offsets.popper[d]=r(i[s])),e}},arrow:{order:500,enabled:!0,fn:function(e,o){var i;if(!F(e.instance.modifiers,'arrow','keepTogether'))return e;var n=o.element;if('string'==typeof n){if(n=e.instance.popper.querySelector(n),!n)return e;}else if(!e.instance.popper.contains(n))return console.warn('WARNING: `arrow.element` must be child of its popper element!'),e;var r=e.placement.split('-')[0],p=e.offsets,s=p.popper,d=p.reference,a=-1!==['left','right'].indexOf(r),l=a?'height':'width',f=a?'Top':'Left',m=f.toLowerCase(),h=a?'left':'top',g=a?'bottom':'right',u=L(n)[l];d[g]-u<s[m]&&(e.offsets.popper[m]-=s[m]-(d[g]-u)),d[m]+u>s[g]&&(e.offsets.popper[m]+=d[m]+u-s[g]),e.offsets.popper=c(e.offsets.popper);var b=d[m]+d[l]/2-u/2,w=t(e.instance.popper),y=parseFloat(w['margin'+f],10),E=parseFloat(w['border'+f+'Width'],10),v=b-e.offsets.popper[m]-y-E;return v=J(_(s[l]-u,v),0),e.arrowElement=n,e.offsets.arrow=(i={},pe(i,m,Math.round(v)),pe(i,h,''),i),e},element:'[x-arrow]'},flip:{order:600,enabled:!0,fn:function(e,t){if(k(e.instance.modifiers,'inner'))return e;if(e.flipped&&e.placement===e.originalPlacement)return e;var o=y(e.instance.popper,e.instance.reference,t.padding,t.boundariesElement),i=e.placement.split('-')[0],n=x(i),r=e.placement.split('-')[1]||'',p=[];switch(t.behavior){case le.FLIP:p=[i,n];break;case le.CLOCKWISE:p=q(i);break;case le.COUNTERCLOCKWISE:p=q(i,!0);break;default:p=t.behavior;}return p.forEach(function(s,d){if(i!==s||p.length===d+1)return e;i=e.placement.split('-')[0],n=x(i);var a=e.offsets.popper,l=e.offsets.reference,f=X,m='left'===i&&f(a.right)>f(l.left)||'right'===i&&f(a.left)<f(l.right)||'top'===i&&f(a.bottom)>f(l.top)||'bottom'===i&&f(a.top)<f(l.bottom),h=f(a.left)<f(o.left),c=f(a.right)>f(o.right),g=f(a.top)<f(o.top),u=f(a.bottom)>f(o.bottom),b='left'===i&&h||'right'===i&&c||'top'===i&&g||'bottom'===i&&u,w=-1!==['top','bottom'].indexOf(i),y=!!t.flipVariations&&(w&&'start'===r&&h||w&&'end'===r&&c||!w&&'start'===r&&g||!w&&'end'===r&&u);(m||b||y)&&(e.flipped=!0,(m||b)&&(i=p[d+1]),y&&(r=K(r)),e.placement=i+(r?'-'+r:''),e.offsets.popper=se({},e.offsets.popper,S(e.instance.popper,e.offsets.reference,e.placement)),e=C(e.instance.modifiers,e,'flip'))}),e},behavior:'flip',padding:5,boundariesElement:'viewport'},inner:{order:700,enabled:!1,fn:function(e){var t=e.placement,o=t.split('-')[0],i=e.offsets,n=i.popper,r=i.reference,p=-1!==['left','right'].indexOf(o),s=-1===['top','left'].indexOf(o);return n[p?'left':'top']=r[o]-(s?n[p?'width':'height']:0),e.placement=x(t),e.offsets.popper=c(n),e}},hide:{order:800,enabled:!0,fn:function(e){if(!F(e.instance.modifiers,'hide','preventOverflow'))return e;var t=e.offsets.reference,o=T(e.instance.modifiers,function(e){return'preventOverflow'===e.name}).boundaries;if(t.bottom<o.top||t.left>o.right||t.top>o.bottom||t.right<o.left){if(!0===e.hide)return e;e.hide=!0,e.attributes['x-out-of-boundaries']=''}else{if(!1===e.hide)return e;e.hide=!1,e.attributes['x-out-of-boundaries']=!1}return e}},computeStyle:{order:850,enabled:!0,fn:function(e,t){var o=t.x,i=t.y,n=e.offsets.popper,p=T(e.instance.modifiers,function(e){return'applyStyle'===e.name}).gpuAcceleration;void 0!==p&&console.warn('WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!');var s,d,a=void 0===p?t.gpuAcceleration:p,l=r(e.instance.popper),f=g(l),m={position:n.position},h={left:X(n.left),top:X(n.top),bottom:X(n.bottom),right:X(n.right)},c='bottom'===o?'top':'bottom',u='right'===i?'left':'right',b=W('transform');if(d='bottom'==c?-f.height+h.bottom:h.top,s='right'==u?-f.width+h.right:h.left,a&&b)m[b]='translate3d('+s+'px, '+d+'px, 0)',m[c]=0,m[u]=0,m.willChange='transform';else{var w='bottom'==c?-1:1,y='right'==u?-1:1;m[c]=d*w,m[u]=s*y,m.willChange=c+', '+u}var E={"x-placement":e.placement};return e.attributes=se({},E,e.attributes),e.styles=se({},m,e.styles),e.arrowStyles=se({},e.offsets.arrow,e.arrowStyles),e},gpuAcceleration:!0,x:'bottom',y:'right'},applyStyle:{order:900,enabled:!0,fn:function(e){return Y(e.instance.popper,e.styles),j(e.instance.popper,e.attributes),e.arrowElement&&Object.keys(e.arrowStyles).length&&Y(e.arrowElement,e.arrowStyles),e},onLoad:function(e,t,o,i,n){var r=O(n,t,e),p=v(o.placement,r,t,e,o.modifiers.flip.boundariesElement,o.modifiers.flip.padding);return t.setAttribute('x-placement',p),Y(t,{position:'absolute'}),o},gpuAcceleration:void 0}}},fe});
//# sourceMappingURL=popper.min.js.map

/*!
 * Font Awesome Free 5.1.0-2 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
!function(){"use strict";var t=function(){},e={},n={},r=null,i={mark:t,measure:t};try{"undefined"!=typeof window&&(e=window),"undefined"!=typeof document&&(n=document),"undefined"!=typeof MutationObserver&&(r=MutationObserver),"undefined"!=typeof performance&&(i=performance)}catch(t){}var a=(e.navigator||{}).userAgent,o=void 0===a?"":a,s=e,f=n,l=r,c=i,u=!!s.document,m=!!f.documentElement&&!!f.head&&"function"==typeof f.addEventListener&&"function"==typeof f.createElement,d=~o.indexOf("MSIE")||~o.indexOf("Trident/"),h="___FONT_AWESOME___",g=16,p="svg-inline--fa",v="data-fa-i2svg",b="data-fa-pseudo-element",y="fontawesome-i2svg",w=function(){try{return!0}catch(t){return!1}}(),x=[1,2,3,4,5,6,7,8,9,10],k=x.concat([11,12,13,14,15,16,17,18,19,20]),C=["class","data-prefix","data-icon","data-fa-transform","data-fa-mask"],z=["xs","sm","lg","fw","ul","li","border","pull-left","pull-right","spin","pulse","rotate-90","rotate-180","rotate-270","flip-horizontal","flip-vertical","stack","stack-1x","stack-2x","inverse","layers","layers-text","layers-counter"].concat(x.map(function(t){return t+"x"})).concat(k.map(function(t){return"w-"+t})),N=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")},A=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),O=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t},M=function(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return Array.from(t)},L=s.FontAwesomeConfig||{},E=Object.keys(L),j=O({familyPrefix:"fa",replacementClass:p,autoReplaceSvg:!0,autoAddCss:!0,autoA11y:!0,searchPseudoElements:!1,observeMutations:!0,keepOriginalSource:!0,measurePerformance:!1,showMissingIcons:!0},L);j.autoReplaceSvg||(j.observeMutations=!1);var S=O({},j);function P(t){var e=(arguments.length>1&&void 0!==arguments[1]?arguments[1]:{}).asNewDefault,n=void 0!==e&&e,r=Object.keys(S),i=n?function(t){return~r.indexOf(t)&&!~E.indexOf(t)}:function(t){return~r.indexOf(t)};Object.keys(t).forEach(function(e){i(e)&&(S[e]=t[e])})}s.FontAwesomeConfig=S;var T=s||{};T[h]||(T[h]={}),T[h].styles||(T[h].styles={}),T[h].hooks||(T[h].hooks={}),T[h].shims||(T[h].shims=[]);var H=T[h],R=[],F=!1;m&&((F=(f.documentElement.doScroll?/^loaded|^c/:/^loaded|^i|^c/).test(f.readyState))||f.addEventListener("DOMContentLoaded",function t(){f.removeEventListener("DOMContentLoaded",t),F=1,R.map(function(t){return t()})}));var I=g,_={size:16,x:0,y:0,rotate:0,flipX:!1,flipY:!1};function B(t){if(t&&m){var e=f.createElement("style");e.setAttribute("type","text/css"),e.innerHTML=t;for(var n=f.head.childNodes,r=null,i=n.length-1;i>-1;i--){var a=n[i],o=(a.tagName||"").toUpperCase();["STYLE","LINK"].indexOf(o)>-1&&(r=a)}return f.head.insertBefore(e,r),t}}var D=0;function W(){return++D}function X(t){for(var e=[],n=(t||[]).length>>>0;n--;)e[n]=t[n];return e}function Y(t){return t.classList?X(t.classList):(t.getAttribute("class")||"").split(" ").filter(function(t){return t})}function U(t,e){var n,r=e.split("-"),i=r[0],a=r.slice(1).join("-");return i!==t||""===a||(n=a,~z.indexOf(n))?null:a}function V(t){return(""+t).replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function q(t){return Object.keys(t||{}).reduce(function(e,n){return e+(n+": ")+t[n]+";"},"")}function K(t){return t.size!==_.size||t.x!==_.x||t.y!==_.y||t.rotate!==_.rotate||t.flipX||t.flipY}function G(t){var e=t.transform,n=t.containerWidth,r=t.iconWidth;return{outer:{transform:"translate("+n/2+" 256)"},inner:{transform:"translate("+32*e.x+", "+32*e.y+") "+" "+("scale("+e.size/16*(e.flipX?-1:1)+", "+e.size/16*(e.flipY?-1:1)+") ")+" "+("rotate("+e.rotate+" 0 0)")},path:{transform:"translate("+r/2*-1+" -256)"}}}var J={x:0,y:0,width:"100%",height:"100%"},Q=function(t){var e=t.children,n=t.attributes,r=t.main,i=t.mask,a=t.transform,o=r.width,s=r.icon,f=i.width,l=i.icon,c=G({transform:a,containerWidth:f,iconWidth:o}),u={tag:"rect",attributes:O({},J,{fill:"white"})},m={tag:"g",attributes:O({},c.inner),children:[{tag:"path",attributes:O({},s.attributes,c.path,{fill:"black"})}]},d={tag:"g",attributes:O({},c.outer),children:[m]},h="mask-"+W(),g="clip-"+W(),p={tag:"defs",children:[{tag:"clipPath",attributes:{id:g},children:[l]},{tag:"mask",attributes:O({},J,{id:h,maskUnits:"userSpaceOnUse",maskContentUnits:"userSpaceOnUse"}),children:[u,d]}]};return e.push(p,{tag:"rect",attributes:O({fill:"currentColor","clip-path":"url(#"+g+")",mask:"url(#"+h+")"},J)}),{children:e,attributes:n}},Z=function(t){var e=t.children,n=t.attributes,r=t.main,i=t.transform,a=q(t.styles);if(a.length>0&&(n.style=a),K(i)){var o=G({transform:i,containerWidth:r.width,iconWidth:r.width});e.push({tag:"g",attributes:O({},o.outer),children:[{tag:"g",attributes:O({},o.inner),children:[{tag:r.icon.tag,children:r.icon.children,attributes:O({},r.icon.attributes,o.path)}]}]})}else e.push(r.icon);return{children:e,attributes:n}},$=function(t){var e=t.children,n=t.main,r=t.mask,i=t.attributes,a=t.styles,o=t.transform;if(K(o)&&n.found&&!r.found){var s=n.width/n.height/2,f=.5;i.style=q(O({},a,{"transform-origin":s+o.x/16+"em "+(f+o.y/16)+"em"}))}return[{tag:"svg",attributes:i,children:e}]},tt=function(t){var e=t.prefix,n=t.iconName,r=t.children,i=t.attributes,a=t.symbol,o=!0===a?e+"-"+S.familyPrefix+"-"+n:a;return[{tag:"svg",attributes:{style:"display: none;"},children:[{tag:"symbol",attributes:O({},i,{id:o}),children:r}]}]};function et(t){var e=t.icons,n=e.main,r=e.mask,i=t.prefix,a=t.iconName,o=t.transform,s=t.symbol,f=t.title,l=t.extra,c=t.watchable,u=void 0!==c&&c,m=r.found?r:n,d=m.width,h=m.height,g="fa-w-"+Math.ceil(d/h*16),p=[S.replacementClass,a?S.familyPrefix+"-"+a:"",g].filter(function(t){return-1===l.classes.indexOf(t)}).concat(l.classes).join(" "),b={children:[],attributes:O({},l.attributes,{"data-prefix":i,"data-icon":a,class:p,role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 "+d+" "+h})};u&&(b.attributes[v]=""),f&&b.children.push({tag:"title",attributes:{id:b.attributes["aria-labelledby"]||"title-"+W()},children:[f]});var y=O({},b,{prefix:i,iconName:a,main:n,mask:r,transform:o,symbol:s,styles:l.styles}),w=r.found&&n.found?Q(y):Z(y),x=w.children,k=w.attributes;return y.children=x,y.attributes=k,s?tt(y):$(y)}function nt(t){var e=t.content,n=t.width,r=t.height,i=t.transform,a=t.title,o=t.extra,s=t.watchable,f=void 0!==s&&s,l=O({},o.attributes,a?{title:a}:{},{class:o.classes.join(" ")});f&&(l[v]="");var c,u,m,h,p,b,y,w,x,k=O({},o.styles);K(i)&&(k.transform=(u=(c={transform:i,startCentered:!0,width:n,height:r}).transform,m=c.width,h=void 0===m?g:m,p=c.height,b=void 0===p?g:p,y=c.startCentered,x="",x+=(w=void 0!==y&&y)&&d?"translate("+(u.x/I-h/2)+"em, "+(u.y/I-b/2)+"em) ":w?"translate(calc(-50% + "+u.x/I+"em), calc(-50% + "+u.y/I+"em)) ":"translate("+u.x/I+"em, "+u.y/I+"em) ",x+="scale("+u.size/I*(u.flipX?-1:1)+", "+u.size/I*(u.flipY?-1:1)+") ",x+="rotate("+u.rotate+"deg) "),k["-webkit-transform"]=k.transform);var C=q(k);C.length>0&&(l.style=C);var z=[];return z.push({tag:"span",attributes:l,children:[e]}),a&&z.push({tag:"span",attributes:{class:"sr-only"},children:[a]}),z}var rt=function(){},it=S.measurePerformance&&c&&c.mark&&c.measure?c:{mark:rt,measure:rt},at='FA "5.1.0-2"',ot=function(t){it.mark(at+" "+t+" ends"),it.measure(at+" "+t,at+" "+t+" begins",at+" "+t+" ends")},st={begin:function(t){return it.mark(at+" "+t+" begins"),function(){return ot(t)}},end:ot},ft=function(t,e,n,r){var i,a,o,s,f,l=Object.keys(t),c=l.length,u=void 0!==r?(s=e,f=r,function(t,e,n,r){return s.call(f,t,e,n,r)}):e;for(void 0===n?(i=1,o=t[l[0]]):(i=0,o=n);i<c;i++)o=u(o,t[a=l[i]],a,t);return o},lt=H.styles,ct=H.shims,ut={},mt={},dt={},ht=function(){var t=function(t){return ft(lt,function(e,n,r){return e[r]=ft(n,t,{}),e},{})};ut=t(function(t,e,n){return t[e[3]]=n,t}),mt=t(function(t,e,n){var r=e[2];return t[n]=n,r.forEach(function(e){t[e]=n}),t});var e="far"in lt;dt=ft(ct,function(t,n){var r=n[0],i=n[1],a=n[2];return"far"!==i||e||(i="fas"),t[r]={prefix:i,iconName:a},t},{})};ht();var gt=H.styles,pt=function(){return{prefix:null,iconName:null,rest:[]}};function vt(t){return t.reduce(function(t,e){var n=U(S.familyPrefix,e);if(gt[e])t.prefix=e;else if(n){var r="fa"===t.prefix?dt[n]||{prefix:null,iconName:null}:{};t.iconName=r.iconName||n,t.prefix=r.prefix||t.prefix}else e!==S.replacementClass&&0!==e.indexOf("fa-w-")&&t.rest.push(e);return t},pt())}function bt(t,e,n){if(t&&t[e]&&t[e][n])return{prefix:e,iconName:n,icon:t[e][n]}}function yt(t){var e,n=t.tag,r=t.attributes,i=void 0===r?{}:r,a=t.children,o=void 0===a?[]:a;return"string"==typeof t?V(t):"<"+n+" "+(e=i,Object.keys(e||{}).reduce(function(t,n){return t+(n+'="')+V(e[n])+'" '},"").trim())+">"+o.map(yt).join("")+"</"+n+">"}var wt=function(){};function xt(t){return"string"==typeof(t.getAttribute?t.getAttribute(v):null)}var kt={replace:function(t){var e=t[0],n=t[1].map(function(t){return yt(t)}).join("\n");if(e.parentNode&&e.outerHTML)e.outerHTML=n+(S.keepOriginalSource&&"svg"!==e.tagName.toLowerCase()?"\x3c!-- "+e.outerHTML+" --\x3e":"");else if(e.parentNode){var r=document.createElement("span");e.parentNode.replaceChild(r,e),r.outerHTML=n}},nest:function(t){var e=t[0],n=t[1];if(~Y(e).indexOf(S.replacementClass))return kt.replace(t);var r=new RegExp(S.familyPrefix+"-.*");delete n[0].attributes.style;var i=n[0].attributes.class.split(" ").reduce(function(t,e){return e===S.replacementClass||e.match(r)?t.toSvg.push(e):t.toNode.push(e),t},{toNode:[],toSvg:[]});n[0].attributes.class=i.toSvg.join(" ");var a=n.map(function(t){return yt(t)}).join("\n");e.setAttribute("class",i.toNode.join(" ")),e.setAttribute(v,""),e.innerHTML=a}};function Ct(t,e){var n="function"==typeof e?e:wt;0===t.length?n():(s.requestAnimationFrame||function(t){return t()})(function(){var e=!0===S.autoReplaceSvg?kt.replace:kt[S.autoReplaceSvg]||kt.replace,r=st.begin("mutate");t.map(e),r(),n()})}var zt=!1;var Nt=null;var At=function(t){var e=t.getAttribute("style"),n=[];return e&&(n=e.split(";").reduce(function(t,e){var n=e.split(":"),r=n[0],i=n.slice(1);return r&&i.length>0&&(t[r]=i.join(":").trim()),t},{})),n};var Ot=function(t){var e,n,r,i,a=t.getAttribute("data-prefix"),o=t.getAttribute("data-icon"),s=void 0!==t.innerText?t.innerText.trim():"",f=vt(Y(t));return a&&o&&(f.prefix=a,f.iconName=o),f.prefix&&s.length>1?f.iconName=(r=f.prefix,i=t.innerText,mt[r][i]):f.prefix&&1===s.length&&(f.iconName=(e=f.prefix,n=function(t){for(var e="",n=0;n<t.length;n++)e+=("000"+t.charCodeAt(n).toString(16)).slice(-4);return e}(t.innerText),ut[e][n])),f},Mt=function(t){var e={size:16,x:0,y:0,flipX:!1,flipY:!1,rotate:0};return t?t.toLowerCase().split(" ").reduce(function(t,e){var n=e.toLowerCase().split("-"),r=n[0],i=n.slice(1).join("-");if(r&&"h"===i)return t.flipX=!0,t;if(r&&"v"===i)return t.flipY=!0,t;if(i=parseFloat(i),isNaN(i))return t;switch(r){case"grow":t.size=t.size+i;break;case"shrink":t.size=t.size-i;break;case"left":t.x=t.x-i;break;case"right":t.x=t.x+i;break;case"up":t.y=t.y-i;break;case"down":t.y=t.y+i;break;case"rotate":t.rotate=t.rotate+i}return t},e):e},Lt=function(t){return Mt(t.getAttribute("data-fa-transform"))},Et=function(t){var e=t.getAttribute("data-fa-symbol");return null!==e&&(""===e||e)},jt=function(t){var e=X(t.attributes).reduce(function(t,e){return"class"!==t.name&&"style"!==t.name&&(t[e.name]=e.value),t},{}),n=t.getAttribute("title");return S.autoA11y&&(n?e["aria-labelledby"]=S.replacementClass+"-title-"+W():e["aria-hidden"]="true"),e},St=function(t){var e=t.getAttribute("data-fa-mask");return e?vt(e.split(" ").map(function(t){return t.trim()})):pt()};function Pt(t){this.name="MissingIcon",this.message=t||"Icon unavailable",this.stack=(new Error).stack}Pt.prototype=Object.create(Error.prototype),Pt.prototype.constructor=Pt;var Tt={fill:"currentColor"},Ht={attributeType:"XML",repeatCount:"indefinite",dur:"2s"},Rt={tag:"path",attributes:O({},Tt,{d:"M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"})},Ft=O({},Ht,{attributeName:"opacity"}),It={tag:"g",children:[Rt,{tag:"circle",attributes:O({},Tt,{cx:"256",cy:"364",r:"28"}),children:[{tag:"animate",attributes:O({},Ht,{attributeName:"r",values:"28;14;28;28;14;28;"})},{tag:"animate",attributes:O({},Ft,{values:"1;0;1;1;0;1;"})}]},{tag:"path",attributes:O({},Tt,{opacity:"1",d:"M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"}),children:[{tag:"animate",attributes:O({},Ft,{values:"1;0;0;0;0;1;"})}]},{tag:"path",attributes:O({},Tt,{opacity:"0",d:"M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"}),children:[{tag:"animate",attributes:O({},Ft,{values:"0;0;1;1;0;0;"})}]}]},_t=H.styles,Bt="fa-layers-text",Dt=/Font Awesome 5 (Solid|Regular|Light|Brands)/,Wt={Solid:"fas",Regular:"far",Light:"fal",Brands:"fab"};function Xt(t,e){var n={found:!1,width:512,height:512,icon:It};if(t&&e&&_t[e]&&_t[e][t]){var r=_t[e][t];n={found:!0,width:r[0],height:r[1],icon:{tag:"path",attributes:{fill:"currentColor",d:r.slice(4)[0]}}}}else if(t&&e&&!S.showMissingIcons)throw new Pt("Icon is missing for prefix "+e+" with icon name "+t);return n}function Yt(t){var e,n,r,i,a,o,s,f,l,c,u,m,h,g,p,v,b,y,w,x=(n=Ot(e=t),r=n.iconName,i=n.prefix,a=n.rest,o=At(e),s=Lt(e),f=Et(e),l=jt(e),c=St(e),{iconName:r,title:e.getAttribute("title"),prefix:i,transform:s,symbol:f,mask:c,extra:{classes:a,styles:o,attributes:l}});return~x.extra.classes.indexOf(Bt)?function(t,e){var n=e.title,r=e.transform,i=e.extra,a=null,o=null;if(d){var s=parseInt(getComputedStyle(t).fontSize,10),f=t.getBoundingClientRect();a=f.width/s,o=f.height/s}return S.autoA11y&&!n&&(i.attributes["aria-hidden"]="true"),[t,nt({content:t.innerHTML,width:a,height:o,transform:r,title:n,extra:i,watchable:!0})]}(t,x):(u=t,h=(m=x).iconName,g=m.title,p=m.prefix,v=m.transform,b=m.symbol,y=m.mask,w=m.extra,[u,et({icons:{main:Xt(h,p),mask:Xt(y.iconName,y.prefix)},prefix:p,iconName:h,transform:v,symbol:b,mask:y,title:g,extra:w,watchable:!0})])}function Ut(t){"function"==typeof t.remove?t.remove():t&&t.parentNode&&t.parentNode.removeChild(t)}function Vt(t){if(m){var e=st.begin("searchPseudoElements");zt=!0,function(){X(t.querySelectorAll("*")).forEach(function(t){[":before",":after"].forEach(function(e){var n=s.getComputedStyle(t,e),r=n.getPropertyValue("font-family").match(Dt),i=X(t.children).filter(function(t){return t.getAttribute(b)===e})[0];if(i&&(i.nextSibling&&i.nextSibling.textContent.indexOf(b)>-1&&Ut(i.nextSibling),Ut(i),i=null),r&&!i){var a=n.getPropertyValue("content"),o=f.createElement("i");o.setAttribute("class",""+Wt[r[1]]),o.setAttribute(b,e),o.innerText=3===a.length?a.substr(1,1):a,":before"===e?t.insertBefore(o,t.firstChild):t.appendChild(o)}})})}(),zt=!1,e()}}function qt(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;if(m){var n=f.documentElement.classList,r=function(t){return n.add(y+"-"+t)},i=function(t){return n.remove(y+"-"+t)},a=Object.keys(_t),o=["."+Bt+":not(["+v+"])"].concat(a.map(function(t){return"."+t+":not(["+v+"])"})).join(", ");if(0!==o.length){var s=X(t.querySelectorAll(o));if(s.length>0){r("pending"),i("complete");var l=st.begin("onTree"),c=s.reduce(function(t,e){try{var n=Yt(e);n&&t.push(n)}catch(t){w||t instanceof Pt&&console.error(t)}return t},[]);l(),Ct(c,function(){r("active"),r("complete"),i("pending"),"function"==typeof e&&e()})}}}}function Kt(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=Yt(t);n&&Ct([n],e)}var Gt=function(){var t=p,e=S.familyPrefix,n=S.replacementClass,r="svg:not(:root).svg-inline--fa{overflow:visible}.svg-inline--fa{display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em}.svg-inline--fa.fa-lg{vertical-align:-.225em}.svg-inline--fa.fa-w-1{width:.0625em}.svg-inline--fa.fa-w-2{width:.125em}.svg-inline--fa.fa-w-3{width:.1875em}.svg-inline--fa.fa-w-4{width:.25em}.svg-inline--fa.fa-w-5{width:.3125em}.svg-inline--fa.fa-w-6{width:.375em}.svg-inline--fa.fa-w-7{width:.4375em}.svg-inline--fa.fa-w-8{width:.5em}.svg-inline--fa.fa-w-9{width:.5625em}.svg-inline--fa.fa-w-10{width:.625em}.svg-inline--fa.fa-w-11{width:.6875em}.svg-inline--fa.fa-w-12{width:.75em}.svg-inline--fa.fa-w-13{width:.8125em}.svg-inline--fa.fa-w-14{width:.875em}.svg-inline--fa.fa-w-15{width:.9375em}.svg-inline--fa.fa-w-16{width:1em}.svg-inline--fa.fa-w-17{width:1.0625em}.svg-inline--fa.fa-w-18{width:1.125em}.svg-inline--fa.fa-w-19{width:1.1875em}.svg-inline--fa.fa-w-20{width:1.25em}.svg-inline--fa.fa-pull-left{margin-right:.3em;width:auto}.svg-inline--fa.fa-pull-right{margin-left:.3em;width:auto}.svg-inline--fa.fa-border{height:1.5em}.svg-inline--fa.fa-li{width:2em}.svg-inline--fa.fa-fw{width:1.25em}.fa-layers svg.svg-inline--fa{bottom:0;left:0;margin:auto;position:absolute;right:0;top:0}.fa-layers{display:inline-block;height:1em;position:relative;text-align:center;vertical-align:-.125em;width:1em}.fa-layers svg.svg-inline--fa{-webkit-transform-origin:center center;transform-origin:center center}.fa-layers-counter,.fa-layers-text{display:inline-block;position:absolute;text-align:center}.fa-layers-text{left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transform-origin:center center;transform-origin:center center}.fa-layers-counter{background-color:#ff253a;border-radius:1em;color:#fff;height:1.5em;line-height:1;max-width:5em;min-width:1.5em;overflow:hidden;padding:.25em;right:0;text-overflow:ellipsis;top:0;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:top right;transform-origin:top right}.fa-layers-bottom-right{bottom:0;right:0;top:auto;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:bottom right;transform-origin:bottom right}.fa-layers-bottom-left{bottom:0;left:0;right:auto;top:auto;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:bottom left;transform-origin:bottom left}.fa-layers-top-right{right:0;top:0;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:top right;transform-origin:top right}.fa-layers-top-left{left:0;right:auto;top:0;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:top left;transform-origin:top left}.fa-lg{font-size:1.33333em;line-height:.75em;vertical-align:-.0667em}.fa-xs{font-size:.75em}.fa-sm{font-size:.875em}.fa-1x{font-size:1em}.fa-2x{font-size:2em}.fa-3x{font-size:3em}.fa-4x{font-size:4em}.fa-5x{font-size:5em}.fa-6x{font-size:6em}.fa-7x{font-size:7em}.fa-8x{font-size:8em}.fa-9x{font-size:9em}.fa-10x{font-size:10em}.fa-fw{text-align:center;width:1.25em}.fa-ul{list-style-type:none;margin-left:2.5em;padding-left:0}.fa-ul>li{position:relative}.fa-li{left:-2em;position:absolute;text-align:center;width:2em;line-height:inherit}.fa-border{border:solid .08em #eee;border-radius:.1em;padding:.2em .25em .15em}.fa-pull-left{float:left}.fa-pull-right{float:right}.fa.fa-pull-left,.fab.fa-pull-left,.fal.fa-pull-left,.far.fa-pull-left,.fas.fa-pull-left{margin-right:.3em}.fa.fa-pull-right,.fab.fa-pull-right,.fal.fa-pull-right,.far.fa-pull-right,.fas.fa-pull-right{margin-left:.3em}.fa-spin{-webkit-animation:fa-spin 2s infinite linear;animation:fa-spin 2s infinite linear}.fa-pulse{-webkit-animation:fa-spin 1s infinite steps(8);animation:fa-spin 1s infinite steps(8)}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}.fa-rotate-90{-webkit-transform:rotate(90deg);transform:rotate(90deg)}.fa-rotate-180{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.fa-rotate-270{-webkit-transform:rotate(270deg);transform:rotate(270deg)}.fa-flip-horizontal{-webkit-transform:scale(-1,1);transform:scale(-1,1)}.fa-flip-vertical{-webkit-transform:scale(1,-1);transform:scale(1,-1)}.fa-flip-horizontal.fa-flip-vertical{-webkit-transform:scale(-1,-1);transform:scale(-1,-1)}:root .fa-flip-horizontal,:root .fa-flip-vertical,:root .fa-rotate-180,:root .fa-rotate-270,:root .fa-rotate-90{-webkit-filter:none;filter:none}.fa-stack{display:inline-block;height:2em;position:relative;width:2em}.fa-stack-1x,.fa-stack-2x{bottom:0;left:0;margin:auto;position:absolute;right:0;top:0}.svg-inline--fa.fa-stack-1x{height:1em;width:1em}.svg-inline--fa.fa-stack-2x{height:2em;width:2em}.fa-inverse{color:#fff}.sr-only{border:0;clip:rect(0,0,0,0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.sr-only-focusable:active,.sr-only-focusable:focus{clip:auto;height:auto;margin:0;overflow:visible;position:static;width:auto}";if("fa"!==e||n!==t){var i=new RegExp("\\.fa\\-","g"),a=new RegExp("\\."+t,"g");r=r.replace(i,"."+e+"-").replace(a,"."+n)}return r};var Jt=function(){function t(){N(this,t),this.definitions={}}return A(t,[{key:"add",value:function(){for(var t=this,e=arguments.length,n=Array(e),r=0;r<e;r++)n[r]=arguments[r];var i=n.reduce(this._pullDefinitions,{});Object.keys(i).forEach(function(e){t.definitions[e]=O({},t.definitions[e]||{},i[e]),function t(e,n){var r=Object.keys(n).reduce(function(t,e){var r=n[e];return r.icon?t[r.iconName]=r.icon:t[e]=r,t},{});"function"==typeof H.hooks.addPack?H.hooks.addPack(e,r):H.styles[e]=O({},H.styles[e]||{},r),"fas"===e&&t("fa",n)}(e,i[e])})}},{key:"reset",value:function(){this.definitions={}}},{key:"_pullDefinitions",value:function(t,e){var n=e.prefix&&e.iconName&&e.icon?{0:e}:e;return Object.keys(n).map(function(e){var r=n[e],i=r.prefix,a=r.iconName,o=r.icon;t[i]||(t[i]={}),t[i][a]=o}),t}}]),t}();function Qt(t){return{found:!0,width:t[0],height:t[1],icon:{tag:"path",attributes:{fill:"currentColor",d:t.slice(4)[0]}}}}var Zt=!1;function $t(){S.autoAddCss&&(Zt||B(Gt()),Zt=!0)}function te(t,e){return Object.defineProperty(t,"abstract",{get:e}),Object.defineProperty(t,"html",{get:function(){return t.abstract.map(function(t){return yt(t)})}}),Object.defineProperty(t,"node",{get:function(){if(m){var e=f.createElement("div");return e.innerHTML=t.html,e.children}}}),t}function ee(t){var e=t.prefix,n=void 0===e?"fa":e,r=t.iconName;if(r)return bt(re.definitions,n,r)||bt(H.styles,n,r)}var ne,re=new Jt,ie={i2svg:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};if(m){$t();var e=t.node,n=void 0===e?f:e,r=t.callback,i=void 0===r?function(){}:r;S.searchPseudoElements&&Vt(n),qt(n,i)}},css:Gt,insertCss:function(){B(Gt())},watch:function(){var t;t=function(){Object.keys(H.styles).length>0&&se(),S.observeMutations&&"function"==typeof MutationObserver&&function(t){if(l){var e=t.treeCallback,n=t.nodeCallback,r=t.pseudoElementsCallback;Nt=new l(function(t){zt||X(t).forEach(function(t){if("childList"===t.type&&t.addedNodes.length>0&&!xt(t.addedNodes[0])&&(S.searchPseudoElements&&r(t.target),e(t.target)),"attributes"===t.type&&t.target.parentNode&&S.searchPseudoElements&&r(t.target.parentNode),"attributes"===t.type&&xt(t.target)&&~C.indexOf(t.attributeName))if("class"===t.attributeName){var i=vt(Y(t.target)),a=i.prefix,o=i.iconName;a&&t.target.setAttribute("data-prefix",a),o&&t.target.setAttribute("data-icon",o)}else n(t.target)})}),m&&Nt.observe(f.getElementsByTagName("body")[0],{childList:!0,attributes:!0,characterData:!0,subtree:!0})}}({treeCallback:qt,nodeCallback:Kt,pseudoElementsCallback:Vt})},m&&(F?setTimeout(t,0):R.push(t))}},ae=(ne=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=e.transform,r=void 0===n?_:n,i=e.symbol,a=void 0!==i&&i,o=e.mask,s=void 0===o?null:o,f=e.title,l=void 0===f?null:f,c=e.classes,u=void 0===c?[]:c,m=e.attributes,d=void 0===m?{}:m,h=e.styles,g=void 0===h?{}:h;if(t){var p=t.prefix,v=t.iconName,b=t.icon;return te(O({type:"icon"},t),function(){return $t(),S.autoA11y&&(l?d["aria-labelledby"]=S.replacementClass+"-title-"+W():d["aria-hidden"]="true"),et({icons:{main:Qt(b),mask:s?Qt(s.icon):{found:!1,width:null,height:null,icon:{}}},prefix:p,iconName:v,transform:O({},_,r),symbol:a,title:l,extra:{attributes:d,styles:g,classes:u}})})}},function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=(t||{}).icon?t:ee(t||{}),r=e.mask;return r&&(r=(r||{}).icon?r:ee(r||{})),ne(n,O({},e,{mask:r}))}),oe={noAuto:function(){var t;P({autoReplaceSvg:t=!1,observeMutations:t}),Nt&&Nt.disconnect()},dom:ie,library:re,parse:{transform:function(t){return Mt(t)}},findIconDefinition:ee,icon:ae,text:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=e.transform,r=void 0===n?_:n,i=e.title,a=void 0===i?null:i,o=e.classes,s=void 0===o?[]:o,f=e.attributes,l=void 0===f?{}:f,c=e.styles,u=void 0===c?{}:c;return te({type:"text",content:t},function(){return $t(),nt({content:t,transform:O({},_,r),title:a,extra:{attributes:l,styles:u,classes:[S.familyPrefix+"-layers-text"].concat(M(s))}})})},layer:function(t){return te({type:"layer"},function(){$t();var e=[];return t(function(t){e=Array.isArray(t)?t.map(function(t){e=e.concat(t.abstract)}):e.concat(t.abstract)}),[{tag:"span",attributes:{class:S.familyPrefix+"-layers"},children:e}]})},toHtml:yt},se=function(){m&&S.autoReplaceSvg&&oe.dom.i2svg({node:f})};Object.defineProperty(oe,"config",{get:function(){return S},set:function(t){P(t)}}),function(t){try{t()}catch(t){if(!w)throw t}}(function(){u&&(s.FontAwesome||(s.FontAwesome=oe),ie.watch()),H.hooks=O({},H.hooks,{addPack:function(t,e){H.styles[t]=O({},H.styles[t]||{},e),ht(),se()},addShims:function(t){var e;(e=H.shims).push.apply(e,M(t)),ht(),se()}})})}();
