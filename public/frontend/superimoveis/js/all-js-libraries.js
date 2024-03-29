/*!
 * Bootstrap v5.1.1 (https://getbootstrap.com/)
 * Copyright 2011-2021 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
! function (t, e) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = "undefined" != typeof globalThis ? globalThis : t || self).bootstrap = e()
}(this, (function () {
	"use strict";
	const t = t => {
			let e = t.getAttribute("data-bs-target");
			if (!e || "#" === e) {
				let i = t.getAttribute("href");
				if (!i || !i.includes("#") && !i.startsWith(".")) return null;
				i.includes("#") && !i.startsWith("#") && (i = "#" + i.split("#")[1]), e = i && "#" !== i ? i.trim() : null
			}
			return e
		},
		e = e => {
			const i = t(e);
			return i && document.querySelector(i) ? i : null
		},
		i = e => {
			const i = t(e);
			return i ? document.querySelector(i) : null
		},
		n = t => {
			t.dispatchEvent(new Event("transitionend"))
		},
		s = t => !(!t || "object" != typeof t) && (void 0 !== t.jquery && (t = t[0]), void 0 !== t.nodeType),
		o = t => s(t) ? t.jquery ? t[0] : t : "string" == typeof t && t.length > 0 ? document.querySelector(t) : null,
		r = (t, e, i) => {
			Object.keys(i).forEach(n => {
				const o = i[n],
					r = e[n],
					a = r && s(r) ? "element" : null == (l = r) ? "" + l : {}.toString.call(l).match(/\s([a-z]+)/i)[1].toLowerCase();
				var l;
				if (!new RegExp(o).test(a)) throw new TypeError(`${t.toUpperCase()}: Option "${n}" provided type "${a}" but expected type "${o}".`)
			})
		},
		a = t => !(!s(t) || 0 === t.getClientRects().length) && "visible" === getComputedStyle(t).getPropertyValue("visibility"),
		l = t => !t || t.nodeType !== Node.ELEMENT_NODE || !!t.classList.contains("disabled") || (void 0 !== t.disabled ? t.disabled : t.hasAttribute("disabled") && "false" !== t.getAttribute("disabled")),
		c = t => {
			if (!document.documentElement.attachShadow) return null;
			if ("function" == typeof t.getRootNode) {
				const e = t.getRootNode();
				return e instanceof ShadowRoot ? e : null
			}
			return t instanceof ShadowRoot ? t : t.parentNode ? c(t.parentNode) : null
		},
		h = () => {},
		d = t => {
			t.offsetHeight
		},
		u = () => {
			const {
				jQuery: t
			} = window;
			return t && !document.body.hasAttribute("data-bs-no-jquery") ? t : null
		},
		f = [],
		p = () => "rtl" === document.documentElement.dir,
		m = t => {
			var e;
			e = () => {
				const e = u();
				if (e) {
					const i = t.NAME,
						n = e.fn[i];
					e.fn[i] = t.jQueryInterface, e.fn[i].Constructor = t, e.fn[i].noConflict = () => (e.fn[i] = n, t.jQueryInterface)
				}
			}, "loading" === document.readyState ? (f.length || document.addEventListener("DOMContentLoaded", () => {
				f.forEach(t => t())
			}), f.push(e)) : e()
		},
		g = t => {
			"function" == typeof t && t()
		},
		_ = (t, e, i = !0) => {
			if (!i) return void g(t);
			const s = (t => {
				if (!t) return 0;
				let {
					transitionDuration: e,
					transitionDelay: i
				} = window.getComputedStyle(t);
				const n = Number.parseFloat(e),
					s = Number.parseFloat(i);
				return n || s ? (e = e.split(",")[0], i = i.split(",")[0], 1e3 * (Number.parseFloat(e) + Number.parseFloat(i))) : 0
			})(e) + 5;
			let o = !1;
			const r = ({
				target: i
			}) => {
				i === e && (o = !0, e.removeEventListener("transitionend", r), g(t))
			};
			e.addEventListener("transitionend", r), setTimeout(() => {
				o || n(e)
			}, s)
		},
		b = (t, e, i, n) => {
			let s = t.indexOf(e);
			if (-1 === s) return t[!i && n ? t.length - 1 : 0];
			const o = t.length;
			return s += i ? 1 : -1, n && (s = (s + o) % o), t[Math.max(0, Math.min(s, o - 1))]
		},
		v = /[^.]*(?=\..*)\.|.*/,
		y = /\..*/,
		w = /::\d+$/,
		E = {};
	let A = 1;
	const T = {
			mouseenter: "mouseover",
			mouseleave: "mouseout"
		},
		O = /^(mouseenter|mouseleave)/i,
		C = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);

	function k(t, e) {
		return e && `${e}::${A++}` || t.uidEvent || A++
	}

	function L(t) {
		const e = k(t);
		return t.uidEvent = e, E[e] = E[e] || {}, E[e]
	}

	function x(t, e, i = null) {
		const n = Object.keys(t);
		for (let s = 0, o = n.length; s < o; s++) {
			const o = t[n[s]];
			if (o.originalHandler === e && o.delegationSelector === i) return o
		}
		return null
	}

	function D(t, e, i) {
		const n = "string" == typeof e,
			s = n ? i : e;
		let o = I(t);
		return C.has(o) || (o = t), [n, s, o]
	}

	function S(t, e, i, n, s) {
		if ("string" != typeof e || !t) return;
		if (i || (i = n, n = null), O.test(e)) {
			const t = t => function (e) {
				if (!e.relatedTarget || e.relatedTarget !== e.delegateTarget && !e.delegateTarget.contains(e.relatedTarget)) return t.call(this, e)
			};
			n ? n = t(n) : i = t(i)
		}
		const [o, r, a] = D(e, i, n), l = L(t), c = l[a] || (l[a] = {}), h = x(c, r, o ? i : null);
		if (h) return void(h.oneOff = h.oneOff && s);
		const d = k(r, e.replace(v, "")),
			u = o ? function (t, e, i) {
				return function n(s) {
					const o = t.querySelectorAll(e);
					for (let {
							target: r
						} = s; r && r !== this; r = r.parentNode)
						for (let a = o.length; a--;)
							if (o[a] === r) return s.delegateTarget = r, n.oneOff && P.off(t, s.type, e, i), i.apply(r, [s]);
					return null
				}
			}(t, i, n) : function (t, e) {
				return function i(n) {
					return n.delegateTarget = t, i.oneOff && P.off(t, n.type, e), e.apply(t, [n])
				}
			}(t, i);
		u.delegationSelector = o ? i : null, u.originalHandler = r, u.oneOff = s, u.uidEvent = d, c[d] = u, t.addEventListener(a, u, o)
	}

	function N(t, e, i, n, s) {
		const o = x(e[i], n, s);
		o && (t.removeEventListener(i, o, Boolean(s)), delete e[i][o.uidEvent])
	}

	function I(t) {
		return t = t.replace(y, ""), T[t] || t
	}
	const P = {
			on(t, e, i, n) {
				S(t, e, i, n, !1)
			},
			one(t, e, i, n) {
				S(t, e, i, n, !0)
			},
			off(t, e, i, n) {
				if ("string" != typeof e || !t) return;
				const [s, o, r] = D(e, i, n), a = r !== e, l = L(t), c = e.startsWith(".");
				if (void 0 !== o) {
					if (!l || !l[r]) return;
					return void N(t, l, r, o, s ? i : null)
				}
				c && Object.keys(l).forEach(i => {
					! function (t, e, i, n) {
						const s = e[i] || {};
						Object.keys(s).forEach(o => {
							if (o.includes(n)) {
								const n = s[o];
								N(t, e, i, n.originalHandler, n.delegationSelector)
							}
						})
					}(t, l, i, e.slice(1))
				});
				const h = l[r] || {};
				Object.keys(h).forEach(i => {
					const n = i.replace(w, "");
					if (!a || e.includes(n)) {
						const e = h[i];
						N(t, l, r, e.originalHandler, e.delegationSelector)
					}
				})
			},
			trigger(t, e, i) {
				if ("string" != typeof e || !t) return null;
				const n = u(),
					s = I(e),
					o = e !== s,
					r = C.has(s);
				let a, l = !0,
					c = !0,
					h = !1,
					d = null;
				return o && n && (a = n.Event(e, i), n(t).trigger(a), l = !a.isPropagationStopped(), c = !a.isImmediatePropagationStopped(), h = a.isDefaultPrevented()), r ? (d = document.createEvent("HTMLEvents"), d.initEvent(s, l, !0)) : d = new CustomEvent(e, {
					bubbles: l,
					cancelable: !0
				}), void 0 !== i && Object.keys(i).forEach(t => {
					Object.defineProperty(d, t, {
						get: () => i[t]
					})
				}), h && d.preventDefault(), c && t.dispatchEvent(d), d.defaultPrevented && void 0 !== a && a.preventDefault(), d
			}
		},
		j = new Map;
	var M = {
		set(t, e, i) {
			j.has(t) || j.set(t, new Map);
			const n = j.get(t);
			n.has(e) || 0 === n.size ? n.set(e, i) : console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(n.keys())[0]}.`)
		},
		get: (t, e) => j.has(t) && j.get(t).get(e) || null,
		remove(t, e) {
			if (!j.has(t)) return;
			const i = j.get(t);
			i.delete(e), 0 === i.size && j.delete(t)
		}
	};
	class H {
		constructor(t) {
			(t = o(t)) && (this._element = t, M.set(this._element, this.constructor.DATA_KEY, this))
		}
		dispose() {
			M.remove(this._element, this.constructor.DATA_KEY), P.off(this._element, this.constructor.EVENT_KEY), Object.getOwnPropertyNames(this).forEach(t => {
				this[t] = null
			})
		}
		_queueCallback(t, e, i = !0) {
			_(t, e, i)
		}
		static getInstance(t) {
			return M.get(o(t), this.DATA_KEY)
		}
		static getOrCreateInstance(t, e = {}) {
			return this.getInstance(t) || new this(t, "object" == typeof e ? e : null)
		}
		static get VERSION() {
			return "5.1.1"
		}
		static get NAME() {
			throw new Error('You have to implement the static method "NAME", for each component!')
		}
		static get DATA_KEY() {
			return "bs." + this.NAME
		}
		static get EVENT_KEY() {
			return "." + this.DATA_KEY
		}
	}
	const B = (t, e = "hide") => {
		const n = "click.dismiss" + t.EVENT_KEY,
			s = t.NAME;
		P.on(document, n, `[data-bs-dismiss="${s}"]`, (function (n) {
			if (["A", "AREA"].includes(this.tagName) && n.preventDefault(), l(this)) return;
			const o = i(this) || this.closest("." + s);
			t.getOrCreateInstance(o)[e]()
		}))
	};
	class R extends H {
		static get NAME() {
			return "alert"
		}
		close() {
			if (P.trigger(this._element, "close.bs.alert").defaultPrevented) return;
			this._element.classList.remove("show");
			const t = this._element.classList.contains("fade");
			this._queueCallback(() => this._destroyElement(), this._element, t)
		}
		_destroyElement() {
			this._element.remove(), P.trigger(this._element, "closed.bs.alert"), this.dispose()
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = R.getOrCreateInstance(this);
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	B(R, "close"), m(R);
	class W extends H {
		static get NAME() {
			return "button"
		}
		toggle() {
			this._element.setAttribute("aria-pressed", this._element.classList.toggle("active"))
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = W.getOrCreateInstance(this);
				"toggle" === t && e[t]()
			}))
		}
	}

	function z(t) {
		return "true" === t || "false" !== t && (t === Number(t).toString() ? Number(t) : "" === t || "null" === t ? null : t)
	}

	function q(t) {
		return t.replace(/[A-Z]/g, t => "-" + t.toLowerCase())
	}
	P.on(document, "click.bs.button.data-api", '[data-bs-toggle="button"]', t => {
		t.preventDefault();
		const e = t.target.closest('[data-bs-toggle="button"]');
		W.getOrCreateInstance(e).toggle()
	}), m(W);
	const F = {
			setDataAttribute(t, e, i) {
				t.setAttribute("data-bs-" + q(e), i)
			},
			removeDataAttribute(t, e) {
				t.removeAttribute("data-bs-" + q(e))
			},
			getDataAttributes(t) {
				if (!t) return {};
				const e = {};
				return Object.keys(t.dataset).filter(t => t.startsWith("bs")).forEach(i => {
					let n = i.replace(/^bs/, "");
					n = n.charAt(0).toLowerCase() + n.slice(1, n.length), e[n] = z(t.dataset[i])
				}), e
			},
			getDataAttribute: (t, e) => z(t.getAttribute("data-bs-" + q(e))),
			offset(t) {
				const e = t.getBoundingClientRect();
				return {
					top: e.top + window.pageYOffset,
					left: e.left + window.pageXOffset
				}
			},
			position: t => ({
				top: t.offsetTop,
				left: t.offsetLeft
			})
		},
		U = {
			find: (t, e = document.documentElement) => [].concat(...Element.prototype.querySelectorAll.call(e, t)),
			findOne: (t, e = document.documentElement) => Element.prototype.querySelector.call(e, t),
			children: (t, e) => [].concat(...t.children).filter(t => t.matches(e)),
			parents(t, e) {
				const i = [];
				let n = t.parentNode;
				for (; n && n.nodeType === Node.ELEMENT_NODE && 3 !== n.nodeType;) n.matches(e) && i.push(n), n = n.parentNode;
				return i
			},
			prev(t, e) {
				let i = t.previousElementSibling;
				for (; i;) {
					if (i.matches(e)) return [i];
					i = i.previousElementSibling
				}
				return []
			},
			next(t, e) {
				let i = t.nextElementSibling;
				for (; i;) {
					if (i.matches(e)) return [i];
					i = i.nextElementSibling
				}
				return []
			},
			focusableChildren(t) {
				const e = ["a", "button", "input", "textarea", "select", "details", "[tabindex]", '[contenteditable="true"]'].map(t => t + ':not([tabindex^="-"])').join(", ");
				return this.find(e, t).filter(t => !l(t) && a(t))
			}
		},
		$ = {
			interval: 5e3,
			keyboard: !0,
			slide: !1,
			pause: "hover",
			wrap: !0,
			touch: !0
		},
		V = {
			interval: "(number|boolean)",
			keyboard: "boolean",
			slide: "(boolean|string)",
			pause: "(string|boolean)",
			wrap: "boolean",
			touch: "boolean"
		},
		K = "next",
		X = "prev",
		Y = "left",
		Q = "right",
		G = {
			ArrowLeft: Q,
			ArrowRight: Y
		};
	class Z extends H {
		constructor(t, e) {
			super(t), this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(e), this._indicatorsElement = U.findOne(".carousel-indicators", this._element), this._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0, this._pointerEvent = Boolean(window.PointerEvent), this._addEventListeners()
		}
		static get Default() {
			return $
		}
		static get NAME() {
			return "carousel"
		}
		next() {
			this._slide(K)
		}
		nextWhenVisible() {
			!document.hidden && a(this._element) && this.next()
		}
		prev() {
			this._slide(X)
		}
		pause(t) {
			t || (this._isPaused = !0), U.findOne(".carousel-item-next, .carousel-item-prev", this._element) && (n(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null
		}
		cycle(t) {
			t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config && this._config.interval && !this._isPaused && (this._updateInterval(), this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
		}
		to(t) {
			this._activeElement = U.findOne(".active.carousel-item", this._element);
			const e = this._getItemIndex(this._activeElement);
			if (t > this._items.length - 1 || t < 0) return;
			if (this._isSliding) return void P.one(this._element, "slid.bs.carousel", () => this.to(t));
			if (e === t) return this.pause(), void this.cycle();
			const i = t > e ? K : X;
			this._slide(i, this._items[t])
		}
		_getConfig(t) {
			return t = { ...$,
				...F.getDataAttributes(this._element),
				..."object" == typeof t ? t : {}
			}, r("carousel", t, V), t
		}
		_handleSwipe() {
			const t = Math.abs(this.touchDeltaX);
			if (t <= 40) return;
			const e = t / this.touchDeltaX;
			this.touchDeltaX = 0, e && this._slide(e > 0 ? Q : Y)
		}
		_addEventListeners() {
			this._config.keyboard && P.on(this._element, "keydown.bs.carousel", t => this._keydown(t)), "hover" === this._config.pause && (P.on(this._element, "mouseenter.bs.carousel", t => this.pause(t)), P.on(this._element, "mouseleave.bs.carousel", t => this.cycle(t))), this._config.touch && this._touchSupported && this._addTouchEventListeners()
		}
		_addTouchEventListeners() {
			const t = t => this._pointerEvent && ("pen" === t.pointerType || "touch" === t.pointerType),
				e = e => {
					t(e) ? this.touchStartX = e.clientX : this._pointerEvent || (this.touchStartX = e.touches[0].clientX)
				},
				i = t => {
					this.touchDeltaX = t.touches && t.touches.length > 1 ? 0 : t.touches[0].clientX - this.touchStartX
				},
				n = e => {
					t(e) && (this.touchDeltaX = e.clientX - this.touchStartX), this._handleSwipe(), "hover" === this._config.pause && (this.pause(), this.touchTimeout && clearTimeout(this.touchTimeout), this.touchTimeout = setTimeout(t => this.cycle(t), 500 + this._config.interval))
				};
			U.find(".carousel-item img", this._element).forEach(t => {
				P.on(t, "dragstart.bs.carousel", t => t.preventDefault())
			}), this._pointerEvent ? (P.on(this._element, "pointerdown.bs.carousel", t => e(t)), P.on(this._element, "pointerup.bs.carousel", t => n(t)), this._element.classList.add("pointer-event")) : (P.on(this._element, "touchstart.bs.carousel", t => e(t)), P.on(this._element, "touchmove.bs.carousel", t => i(t)), P.on(this._element, "touchend.bs.carousel", t => n(t)))
		}
		_keydown(t) {
			if (/input|textarea/i.test(t.target.tagName)) return;
			const e = G[t.key];
			e && (t.preventDefault(), this._slide(e))
		}
		_getItemIndex(t) {
			return this._items = t && t.parentNode ? U.find(".carousel-item", t.parentNode) : [], this._items.indexOf(t)
		}
		_getItemByOrder(t, e) {
			const i = t === K;
			return b(this._items, e, i, this._config.wrap)
		}
		_triggerSlideEvent(t, e) {
			const i = this._getItemIndex(t),
				n = this._getItemIndex(U.findOne(".active.carousel-item", this._element));
			return P.trigger(this._element, "slide.bs.carousel", {
				relatedTarget: t,
				direction: e,
				from: n,
				to: i
			})
		}
		_setActiveIndicatorElement(t) {
			if (this._indicatorsElement) {
				const e = U.findOne(".active", this._indicatorsElement);
				e.classList.remove("active"), e.removeAttribute("aria-current");
				const i = U.find("[data-bs-target]", this._indicatorsElement);
				for (let e = 0; e < i.length; e++)
					if (Number.parseInt(i[e].getAttribute("data-bs-slide-to"), 10) === this._getItemIndex(t)) {
						i[e].classList.add("active"), i[e].setAttribute("aria-current", "true");
						break
					}
			}
		}
		_updateInterval() {
			const t = this._activeElement || U.findOne(".active.carousel-item", this._element);
			if (!t) return;
			const e = Number.parseInt(t.getAttribute("data-bs-interval"), 10);
			e ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = e) : this._config.interval = this._config.defaultInterval || this._config.interval
		}
		_slide(t, e) {
			const i = this._directionToOrder(t),
				n = U.findOne(".active.carousel-item", this._element),
				s = this._getItemIndex(n),
				o = e || this._getItemByOrder(i, n),
				r = this._getItemIndex(o),
				a = Boolean(this._interval),
				l = i === K,
				c = l ? "carousel-item-start" : "carousel-item-end",
				h = l ? "carousel-item-next" : "carousel-item-prev",
				u = this._orderToDirection(i);
			if (o && o.classList.contains("active")) return void(this._isSliding = !1);
			if (this._isSliding) return;
			if (this._triggerSlideEvent(o, u).defaultPrevented) return;
			if (!n || !o) return;
			this._isSliding = !0, a && this.pause(), this._setActiveIndicatorElement(o), this._activeElement = o;
			const f = () => {
				P.trigger(this._element, "slid.bs.carousel", {
					relatedTarget: o,
					direction: u,
					from: s,
					to: r
				})
			};
			if (this._element.classList.contains("slide")) {
				o.classList.add(h), d(o), n.classList.add(c), o.classList.add(c);
				const t = () => {
					o.classList.remove(c, h), o.classList.add("active"), n.classList.remove("active", h, c), this._isSliding = !1, setTimeout(f, 0)
				};
				this._queueCallback(t, n, !0)
			} else n.classList.remove("active"), o.classList.add("active"), this._isSliding = !1, f();
			a && this.cycle()
		}
		_directionToOrder(t) {
			return [Q, Y].includes(t) ? p() ? t === Y ? X : K : t === Y ? K : X : t
		}
		_orderToDirection(t) {
			return [K, X].includes(t) ? p() ? t === X ? Y : Q : t === X ? Q : Y : t
		}
		static carouselInterface(t, e) {
			const i = Z.getOrCreateInstance(t, e);
			let {
				_config: n
			} = i;
			"object" == typeof e && (n = { ...n,
				...e
			});
			const s = "string" == typeof e ? e : n.slide;
			if ("number" == typeof e) i.to(e);
			else if ("string" == typeof s) {
				if (void 0 === i[s]) throw new TypeError(`No method named "${s}"`);
				i[s]()
			} else n.interval && n.ride && (i.pause(), i.cycle())
		}
		static jQueryInterface(t) {
			return this.each((function () {
				Z.carouselInterface(this, t)
			}))
		}
		static dataApiClickHandler(t) {
			const e = i(this);
			if (!e || !e.classList.contains("carousel")) return;
			const n = { ...F.getDataAttributes(e),
					...F.getDataAttributes(this)
				},
				s = this.getAttribute("data-bs-slide-to");
			s && (n.interval = !1), Z.carouselInterface(e, n), s && Z.getInstance(e).to(s), t.preventDefault()
		}
	}
	P.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", Z.dataApiClickHandler), P.on(window, "load.bs.carousel.data-api", () => {
		const t = U.find('[data-bs-ride="carousel"]');
		for (let e = 0, i = t.length; e < i; e++) Z.carouselInterface(t[e], Z.getInstance(t[e]))
	}), m(Z);
	const J = {
			toggle: !0,
			parent: null
		},
		tt = {
			toggle: "boolean",
			parent: "(null|element)"
		};
	class et extends H {
		constructor(t, i) {
			super(t), this._isTransitioning = !1, this._config = this._getConfig(i), this._triggerArray = [];
			const n = U.find('[data-bs-toggle="collapse"]');
			for (let t = 0, i = n.length; t < i; t++) {
				const i = n[t],
					s = e(i),
					o = U.find(s).filter(t => t === this._element);
				null !== s && o.length && (this._selector = s, this._triggerArray.push(i))
			}
			this._initializeChildren(), this._config.parent || this._addAriaAndCollapsedClass(this._triggerArray, this._isShown()), this._config.toggle && this.toggle()
		}
		static get Default() {
			return J
		}
		static get NAME() {
			return "collapse"
		}
		toggle() {
			this._isShown() ? this.hide() : this.show()
		}
		show() {
			if (this._isTransitioning || this._isShown()) return;
			let t, e = [];
			if (this._config.parent) {
				const t = U.find(".collapse .collapse", this._config.parent);
				e = U.find(".collapse.show, .collapse.collapsing", this._config.parent).filter(e => !t.includes(e))
			}
			const i = U.findOne(this._selector);
			if (e.length) {
				const n = e.find(t => i !== t);
				if (t = n ? et.getInstance(n) : null, t && t._isTransitioning) return
			}
			if (P.trigger(this._element, "show.bs.collapse").defaultPrevented) return;
			e.forEach(e => {
				i !== e && et.getOrCreateInstance(e, {
					toggle: !1
				}).hide(), t || M.set(e, "bs.collapse", null)
			});
			const n = this._getDimension();
			this._element.classList.remove("collapse"), this._element.classList.add("collapsing"), this._element.style[n] = 0, this._addAriaAndCollapsedClass(this._triggerArray, !0), this._isTransitioning = !0;
			const s = "scroll" + (n[0].toUpperCase() + n.slice(1));
			this._queueCallback(() => {
				this._isTransitioning = !1, this._element.classList.remove("collapsing"), this._element.classList.add("collapse", "show"), this._element.style[n] = "", P.trigger(this._element, "shown.bs.collapse")
			}, this._element, !0), this._element.style[n] = this._element[s] + "px"
		}
		hide() {
			if (this._isTransitioning || !this._isShown()) return;
			if (P.trigger(this._element, "hide.bs.collapse").defaultPrevented) return;
			const t = this._getDimension();
			this._element.style[t] = this._element.getBoundingClientRect()[t] + "px", d(this._element), this._element.classList.add("collapsing"), this._element.classList.remove("collapse", "show");
			const e = this._triggerArray.length;
			for (let t = 0; t < e; t++) {
				const e = this._triggerArray[t],
					n = i(e);
				n && !this._isShown(n) && this._addAriaAndCollapsedClass([e], !1)
			}
			this._isTransitioning = !0, this._element.style[t] = "", this._queueCallback(() => {
				this._isTransitioning = !1, this._element.classList.remove("collapsing"), this._element.classList.add("collapse"), P.trigger(this._element, "hidden.bs.collapse")
			}, this._element, !0)
		}
		_isShown(t = this._element) {
			return t.classList.contains("show")
		}
		_getConfig(t) {
			return (t = { ...J,
				...F.getDataAttributes(this._element),
				...t
			}).toggle = Boolean(t.toggle), t.parent = o(t.parent), r("collapse", t, tt), t
		}
		_getDimension() {
			return this._element.classList.contains("collapse-horizontal") ? "width" : "height"
		}
		_initializeChildren() {
			if (!this._config.parent) return;
			const t = U.find(".collapse .collapse", this._config.parent);
			U.find('[data-bs-toggle="collapse"]', this._config.parent).filter(e => !t.includes(e)).forEach(t => {
				const e = i(t);
				e && this._addAriaAndCollapsedClass([t], this._isShown(e))
			})
		}
		_addAriaAndCollapsedClass(t, e) {
			t.length && t.forEach(t => {
				e ? t.classList.remove("collapsed") : t.classList.add("collapsed"), t.setAttribute("aria-expanded", e)
			})
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = {};
				"string" == typeof t && /show|hide/.test(t) && (e.toggle = !1);
				const i = et.getOrCreateInstance(this, e);
				if ("string" == typeof t) {
					if (void 0 === i[t]) throw new TypeError(`No method named "${t}"`);
					i[t]()
				}
			}))
		}
	}
	P.on(document, "click.bs.collapse.data-api", '[data-bs-toggle="collapse"]', (function (t) {
		("A" === t.target.tagName || t.delegateTarget && "A" === t.delegateTarget.tagName) && t.preventDefault();
		const i = e(this);
		U.find(i).forEach(t => {
			et.getOrCreateInstance(t, {
				toggle: !1
			}).toggle()
		})
	})), m(et);
	var it = "top",
		nt = "bottom",
		st = "right",
		ot = "left",
		rt = [it, nt, st, ot],
		at = "end",
		lt = rt.reduce((function (t, e) {
			return t.concat([e + "-start", e + "-" + at])
		}), []),
		ct = [].concat(rt, ["auto"]).reduce((function (t, e) {
			return t.concat([e, e + "-start", e + "-" + at])
		}), []),
		ht = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];

	function dt(t) {
		return t ? (t.nodeName || "").toLowerCase() : null
	}

	function ut(t) {
		if (null == t) return window;
		if ("[object Window]" !== t.toString()) {
			var e = t.ownerDocument;
			return e && e.defaultView || window
		}
		return t
	}

	function ft(t) {
		return t instanceof ut(t).Element || t instanceof Element
	}

	function pt(t) {
		return t instanceof ut(t).HTMLElement || t instanceof HTMLElement
	}

	function mt(t) {
		return "undefined" != typeof ShadowRoot && (t instanceof ut(t).ShadowRoot || t instanceof ShadowRoot)
	}
	var gt = {
		name: "applyStyles",
		enabled: !0,
		phase: "write",
		fn: function (t) {
			var e = t.state;
			Object.keys(e.elements).forEach((function (t) {
				var i = e.styles[t] || {},
					n = e.attributes[t] || {},
					s = e.elements[t];
				pt(s) && dt(s) && (Object.assign(s.style, i), Object.keys(n).forEach((function (t) {
					var e = n[t];
					!1 === e ? s.removeAttribute(t) : s.setAttribute(t, !0 === e ? "" : e)
				})))
			}))
		},
		effect: function (t) {
			var e = t.state,
				i = {
					popper: {
						position: e.options.strategy,
						left: "0",
						top: "0",
						margin: "0"
					},
					arrow: {
						position: "absolute"
					},
					reference: {}
				};
			return Object.assign(e.elements.popper.style, i.popper), e.styles = i, e.elements.arrow && Object.assign(e.elements.arrow.style, i.arrow),
				function () {
					Object.keys(e.elements).forEach((function (t) {
						var n = e.elements[t],
							s = e.attributes[t] || {},
							o = Object.keys(e.styles.hasOwnProperty(t) ? e.styles[t] : i[t]).reduce((function (t, e) {
								return t[e] = "", t
							}), {});
						pt(n) && dt(n) && (Object.assign(n.style, o), Object.keys(s).forEach((function (t) {
							n.removeAttribute(t)
						})))
					}))
				}
		},
		requires: ["computeStyles"]
	};

	function _t(t) {
		return t.split("-")[0]
	}
	var bt = Math.round;

	function vt(t, e) {
		void 0 === e && (e = !1);
		var i = t.getBoundingClientRect(),
			n = 1,
			s = 1;
		if (pt(t) && e) {
			var o = t.offsetHeight,
				r = t.offsetWidth;
			r > 0 && (n = i.width / r || 1), o > 0 && (s = i.height / o || 1)
		}
		return {
			width: bt(i.width / n),
			height: bt(i.height / s),
			top: bt(i.top / s),
			right: bt(i.right / n),
			bottom: bt(i.bottom / s),
			left: bt(i.left / n),
			x: bt(i.left / n),
			y: bt(i.top / s)
		}
	}

	function yt(t) {
		var e = vt(t),
			i = t.offsetWidth,
			n = t.offsetHeight;
		return Math.abs(e.width - i) <= 1 && (i = e.width), Math.abs(e.height - n) <= 1 && (n = e.height), {
			x: t.offsetLeft,
			y: t.offsetTop,
			width: i,
			height: n
		}
	}

	function wt(t, e) {
		var i = e.getRootNode && e.getRootNode();
		if (t.contains(e)) return !0;
		if (i && mt(i)) {
			var n = e;
			do {
				if (n && t.isSameNode(n)) return !0;
				n = n.parentNode || n.host
			} while (n)
		}
		return !1
	}

	function Et(t) {
		return ut(t).getComputedStyle(t)
	}

	function At(t) {
		return ["table", "td", "th"].indexOf(dt(t)) >= 0
	}

	function Tt(t) {
		return ((ft(t) ? t.ownerDocument : t.document) || window.document).documentElement
	}

	function Ot(t) {
		return "html" === dt(t) ? t : t.assignedSlot || t.parentNode || (mt(t) ? t.host : null) || Tt(t)
	}

	function Ct(t) {
		return pt(t) && "fixed" !== Et(t).position ? t.offsetParent : null
	}

	function kt(t) {
		for (var e = ut(t), i = Ct(t); i && At(i) && "static" === Et(i).position;) i = Ct(i);
		return i && ("html" === dt(i) || "body" === dt(i) && "static" === Et(i).position) ? e : i || function (t) {
			var e = -1 !== navigator.userAgent.toLowerCase().indexOf("firefox");
			if (-1 !== navigator.userAgent.indexOf("Trident") && pt(t) && "fixed" === Et(t).position) return null;
			for (var i = Ot(t); pt(i) && ["html", "body"].indexOf(dt(i)) < 0;) {
				var n = Et(i);
				if ("none" !== n.transform || "none" !== n.perspective || "paint" === n.contain || -1 !== ["transform", "perspective"].indexOf(n.willChange) || e && "filter" === n.willChange || e && n.filter && "none" !== n.filter) return i;
				i = i.parentNode
			}
			return null
		}(t) || e
	}

	function Lt(t) {
		return ["top", "bottom"].indexOf(t) >= 0 ? "x" : "y"
	}
	var xt = Math.max,
		Dt = Math.min,
		St = Math.round;

	function Nt(t, e, i) {
		return xt(t, Dt(e, i))
	}

	function It(t) {
		return Object.assign({}, {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0
		}, t)
	}

	function Pt(t, e) {
		return e.reduce((function (e, i) {
			return e[i] = t, e
		}), {})
	}
	var jt = {
		name: "arrow",
		enabled: !0,
		phase: "main",
		fn: function (t) {
			var e, i = t.state,
				n = t.name,
				s = t.options,
				o = i.elements.arrow,
				r = i.modifiersData.popperOffsets,
				a = _t(i.placement),
				l = Lt(a),
				c = [ot, st].indexOf(a) >= 0 ? "height" : "width";
			if (o && r) {
				var h = function (t, e) {
						return It("number" != typeof (t = "function" == typeof t ? t(Object.assign({}, e.rects, {
							placement: e.placement
						})) : t) ? t : Pt(t, rt))
					}(s.padding, i),
					d = yt(o),
					u = "y" === l ? it : ot,
					f = "y" === l ? nt : st,
					p = i.rects.reference[c] + i.rects.reference[l] - r[l] - i.rects.popper[c],
					m = r[l] - i.rects.reference[l],
					g = kt(o),
					_ = g ? "y" === l ? g.clientHeight || 0 : g.clientWidth || 0 : 0,
					b = p / 2 - m / 2,
					v = h[u],
					y = _ - d[c] - h[f],
					w = _ / 2 - d[c] / 2 + b,
					E = Nt(v, w, y),
					A = l;
				i.modifiersData[n] = ((e = {})[A] = E, e.centerOffset = E - w, e)
			}
		},
		effect: function (t) {
			var e = t.state,
				i = t.options.element,
				n = void 0 === i ? "[data-popper-arrow]" : i;
			null != n && ("string" != typeof n || (n = e.elements.popper.querySelector(n))) && wt(e.elements.popper, n) && (e.elements.arrow = n)
		},
		requires: ["popperOffsets"],
		requiresIfExists: ["preventOverflow"]
	};

	function Mt(t) {
		return t.split("-")[1]
	}
	var Ht = {
		top: "auto",
		right: "auto",
		bottom: "auto",
		left: "auto"
	};

	function Bt(t) {
		var e, i = t.popper,
			n = t.popperRect,
			s = t.placement,
			o = t.variation,
			r = t.offsets,
			a = t.position,
			l = t.gpuAcceleration,
			c = t.adaptive,
			h = t.roundOffsets,
			d = !0 === h ? function (t) {
				var e = t.x,
					i = t.y,
					n = window.devicePixelRatio || 1;
				return {
					x: St(St(e * n) / n) || 0,
					y: St(St(i * n) / n) || 0
				}
			}(r) : "function" == typeof h ? h(r) : r,
			u = d.x,
			f = void 0 === u ? 0 : u,
			p = d.y,
			m = void 0 === p ? 0 : p,
			g = r.hasOwnProperty("x"),
			_ = r.hasOwnProperty("y"),
			b = ot,
			v = it,
			y = window;
		if (c) {
			var w = kt(i),
				E = "clientHeight",
				A = "clientWidth";
			w === ut(i) && "static" !== Et(w = Tt(i)).position && "absolute" === a && (E = "scrollHeight", A = "scrollWidth"), w = w, s !== it && (s !== ot && s !== st || o !== at) || (v = nt, m -= w[E] - n.height, m *= l ? 1 : -1), s !== ot && (s !== it && s !== nt || o !== at) || (b = st, f -= w[A] - n.width, f *= l ? 1 : -1)
		}
		var T, O = Object.assign({
			position: a
		}, c && Ht);
		return l ? Object.assign({}, O, ((T = {})[v] = _ ? "0" : "", T[b] = g ? "0" : "", T.transform = (y.devicePixelRatio || 1) <= 1 ? "translate(" + f + "px, " + m + "px)" : "translate3d(" + f + "px, " + m + "px, 0)", T)) : Object.assign({}, O, ((e = {})[v] = _ ? m + "px" : "", e[b] = g ? f + "px" : "", e.transform = "", e))
	}
	var Rt = {
			name: "computeStyles",
			enabled: !0,
			phase: "beforeWrite",
			fn: function (t) {
				var e = t.state,
					i = t.options,
					n = i.gpuAcceleration,
					s = void 0 === n || n,
					o = i.adaptive,
					r = void 0 === o || o,
					a = i.roundOffsets,
					l = void 0 === a || a,
					c = {
						placement: _t(e.placement),
						variation: Mt(e.placement),
						popper: e.elements.popper,
						popperRect: e.rects.popper,
						gpuAcceleration: s
					};
				null != e.modifiersData.popperOffsets && (e.styles.popper = Object.assign({}, e.styles.popper, Bt(Object.assign({}, c, {
					offsets: e.modifiersData.popperOffsets,
					position: e.options.strategy,
					adaptive: r,
					roundOffsets: l
				})))), null != e.modifiersData.arrow && (e.styles.arrow = Object.assign({}, e.styles.arrow, Bt(Object.assign({}, c, {
					offsets: e.modifiersData.arrow,
					position: "absolute",
					adaptive: !1,
					roundOffsets: l
				})))), e.attributes.popper = Object.assign({}, e.attributes.popper, {
					"data-popper-placement": e.placement
				})
			},
			data: {}
		},
		Wt = {
			passive: !0
		},
		zt = {
			name: "eventListeners",
			enabled: !0,
			phase: "write",
			fn: function () {},
			effect: function (t) {
				var e = t.state,
					i = t.instance,
					n = t.options,
					s = n.scroll,
					o = void 0 === s || s,
					r = n.resize,
					a = void 0 === r || r,
					l = ut(e.elements.popper),
					c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
				return o && c.forEach((function (t) {
						t.addEventListener("scroll", i.update, Wt)
					})), a && l.addEventListener("resize", i.update, Wt),
					function () {
						o && c.forEach((function (t) {
							t.removeEventListener("scroll", i.update, Wt)
						})), a && l.removeEventListener("resize", i.update, Wt)
					}
			},
			data: {}
		},
		qt = {
			left: "right",
			right: "left",
			bottom: "top",
			top: "bottom"
		};

	function Ft(t) {
		return t.replace(/left|right|bottom|top/g, (function (t) {
			return qt[t]
		}))
	}
	var Ut = {
		start: "end",
		end: "start"
	};

	function $t(t) {
		return t.replace(/start|end/g, (function (t) {
			return Ut[t]
		}))
	}

	function Vt(t) {
		var e = ut(t);
		return {
			scrollLeft: e.pageXOffset,
			scrollTop: e.pageYOffset
		}
	}

	function Kt(t) {
		return vt(Tt(t)).left + Vt(t).scrollLeft
	}

	function Xt(t) {
		var e = Et(t),
			i = e.overflow,
			n = e.overflowX,
			s = e.overflowY;
		return /auto|scroll|overlay|hidden/.test(i + s + n)
	}

	function Yt(t, e) {
		var i;
		void 0 === e && (e = []);
		var n = function t(e) {
				return ["html", "body", "#document"].indexOf(dt(e)) >= 0 ? e.ownerDocument.body : pt(e) && Xt(e) ? e : t(Ot(e))
			}(t),
			s = n === (null == (i = t.ownerDocument) ? void 0 : i.body),
			o = ut(n),
			r = s ? [o].concat(o.visualViewport || [], Xt(n) ? n : []) : n,
			a = e.concat(r);
		return s ? a : a.concat(Yt(Ot(r)))
	}

	function Qt(t) {
		return Object.assign({}, t, {
			left: t.x,
			top: t.y,
			right: t.x + t.width,
			bottom: t.y + t.height
		})
	}

	function Gt(t, e) {
		return "viewport" === e ? Qt(function (t) {
			var e = ut(t),
				i = Tt(t),
				n = e.visualViewport,
				s = i.clientWidth,
				o = i.clientHeight,
				r = 0,
				a = 0;
			return n && (s = n.width, o = n.height, /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (r = n.offsetLeft, a = n.offsetTop)), {
				width: s,
				height: o,
				x: r + Kt(t),
				y: a
			}
		}(t)) : pt(e) ? function (t) {
			var e = vt(t);
			return e.top = e.top + t.clientTop, e.left = e.left + t.clientLeft, e.bottom = e.top + t.clientHeight, e.right = e.left + t.clientWidth, e.width = t.clientWidth, e.height = t.clientHeight, e.x = e.left, e.y = e.top, e
		}(e) : Qt(function (t) {
			var e, i = Tt(t),
				n = Vt(t),
				s = null == (e = t.ownerDocument) ? void 0 : e.body,
				o = xt(i.scrollWidth, i.clientWidth, s ? s.scrollWidth : 0, s ? s.clientWidth : 0),
				r = xt(i.scrollHeight, i.clientHeight, s ? s.scrollHeight : 0, s ? s.clientHeight : 0),
				a = -n.scrollLeft + Kt(t),
				l = -n.scrollTop;
			return "rtl" === Et(s || i).direction && (a += xt(i.clientWidth, s ? s.clientWidth : 0) - o), {
				width: o,
				height: r,
				x: a,
				y: l
			}
		}(Tt(t)))
	}

	function Zt(t) {
		var e, i = t.reference,
			n = t.element,
			s = t.placement,
			o = s ? _t(s) : null,
			r = s ? Mt(s) : null,
			a = i.x + i.width / 2 - n.width / 2,
			l = i.y + i.height / 2 - n.height / 2;
		switch (o) {
			case it:
				e = {
					x: a,
					y: i.y - n.height
				};
				break;
			case nt:
				e = {
					x: a,
					y: i.y + i.height
				};
				break;
			case st:
				e = {
					x: i.x + i.width,
					y: l
				};
				break;
			case ot:
				e = {
					x: i.x - n.width,
					y: l
				};
				break;
			default:
				e = {
					x: i.x,
					y: i.y
				}
		}
		var c = o ? Lt(o) : null;
		if (null != c) {
			var h = "y" === c ? "height" : "width";
			switch (r) {
				case "start":
					e[c] = e[c] - (i[h] / 2 - n[h] / 2);
					break;
				case at:
					e[c] = e[c] + (i[h] / 2 - n[h] / 2)
			}
		}
		return e
	}

	function Jt(t, e) {
		void 0 === e && (e = {});
		var i = e,
			n = i.placement,
			s = void 0 === n ? t.placement : n,
			o = i.boundary,
			r = void 0 === o ? "clippingParents" : o,
			a = i.rootBoundary,
			l = void 0 === a ? "viewport" : a,
			c = i.elementContext,
			h = void 0 === c ? "popper" : c,
			d = i.altBoundary,
			u = void 0 !== d && d,
			f = i.padding,
			p = void 0 === f ? 0 : f,
			m = It("number" != typeof p ? p : Pt(p, rt)),
			g = "popper" === h ? "reference" : "popper",
			_ = t.rects.popper,
			b = t.elements[u ? g : h],
			v = function (t, e, i) {
				var n = "clippingParents" === e ? function (t) {
						var e = Yt(Ot(t)),
							i = ["absolute", "fixed"].indexOf(Et(t).position) >= 0 && pt(t) ? kt(t) : t;
						return ft(i) ? e.filter((function (t) {
							return ft(t) && wt(t, i) && "body" !== dt(t)
						})) : []
					}(t) : [].concat(e),
					s = [].concat(n, [i]),
					o = s[0],
					r = s.reduce((function (e, i) {
						var n = Gt(t, i);
						return e.top = xt(n.top, e.top), e.right = Dt(n.right, e.right), e.bottom = Dt(n.bottom, e.bottom), e.left = xt(n.left, e.left), e
					}), Gt(t, o));
				return r.width = r.right - r.left, r.height = r.bottom - r.top, r.x = r.left, r.y = r.top, r
			}(ft(b) ? b : b.contextElement || Tt(t.elements.popper), r, l),
			y = vt(t.elements.reference),
			w = Zt({
				reference: y,
				element: _,
				strategy: "absolute",
				placement: s
			}),
			E = Qt(Object.assign({}, _, w)),
			A = "popper" === h ? E : y,
			T = {
				top: v.top - A.top + m.top,
				bottom: A.bottom - v.bottom + m.bottom,
				left: v.left - A.left + m.left,
				right: A.right - v.right + m.right
			},
			O = t.modifiersData.offset;
		if ("popper" === h && O) {
			var C = O[s];
			Object.keys(T).forEach((function (t) {
				var e = [st, nt].indexOf(t) >= 0 ? 1 : -1,
					i = [it, nt].indexOf(t) >= 0 ? "y" : "x";
				T[t] += C[i] * e
			}))
		}
		return T
	}

	function te(t, e) {
		void 0 === e && (e = {});
		var i = e,
			n = i.placement,
			s = i.boundary,
			o = i.rootBoundary,
			r = i.padding,
			a = i.flipVariations,
			l = i.allowedAutoPlacements,
			c = void 0 === l ? ct : l,
			h = Mt(n),
			d = h ? a ? lt : lt.filter((function (t) {
				return Mt(t) === h
			})) : rt,
			u = d.filter((function (t) {
				return c.indexOf(t) >= 0
			}));
		0 === u.length && (u = d);
		var f = u.reduce((function (e, i) {
			return e[i] = Jt(t, {
				placement: i,
				boundary: s,
				rootBoundary: o,
				padding: r
			})[_t(i)], e
		}), {});
		return Object.keys(f).sort((function (t, e) {
			return f[t] - f[e]
		}))
	}
	var ee = {
		name: "flip",
		enabled: !0,
		phase: "main",
		fn: function (t) {
			var e = t.state,
				i = t.options,
				n = t.name;
			if (!e.modifiersData[n]._skip) {
				for (var s = i.mainAxis, o = void 0 === s || s, r = i.altAxis, a = void 0 === r || r, l = i.fallbackPlacements, c = i.padding, h = i.boundary, d = i.rootBoundary, u = i.altBoundary, f = i.flipVariations, p = void 0 === f || f, m = i.allowedAutoPlacements, g = e.options.placement, _ = _t(g), b = l || (_ !== g && p ? function (t) {
						if ("auto" === _t(t)) return [];
						var e = Ft(t);
						return [$t(t), e, $t(e)]
					}(g) : [Ft(g)]), v = [g].concat(b).reduce((function (t, i) {
						return t.concat("auto" === _t(i) ? te(e, {
							placement: i,
							boundary: h,
							rootBoundary: d,
							padding: c,
							flipVariations: p,
							allowedAutoPlacements: m
						}) : i)
					}), []), y = e.rects.reference, w = e.rects.popper, E = new Map, A = !0, T = v[0], O = 0; O < v.length; O++) {
					var C = v[O],
						k = _t(C),
						L = "start" === Mt(C),
						x = [it, nt].indexOf(k) >= 0,
						D = x ? "width" : "height",
						S = Jt(e, {
							placement: C,
							boundary: h,
							rootBoundary: d,
							altBoundary: u,
							padding: c
						}),
						N = x ? L ? st : ot : L ? nt : it;
					y[D] > w[D] && (N = Ft(N));
					var I = Ft(N),
						P = [];
					if (o && P.push(S[k] <= 0), a && P.push(S[N] <= 0, S[I] <= 0), P.every((function (t) {
							return t
						}))) {
						T = C, A = !1;
						break
					}
					E.set(C, P)
				}
				if (A)
					for (var j = function (t) {
							var e = v.find((function (e) {
								var i = E.get(e);
								if (i) return i.slice(0, t).every((function (t) {
									return t
								}))
							}));
							if (e) return T = e, "break"
						}, M = p ? 3 : 1; M > 0 && "break" !== j(M); M--);
				e.placement !== T && (e.modifiersData[n]._skip = !0, e.placement = T, e.reset = !0)
			}
		},
		requiresIfExists: ["offset"],
		data: {
			_skip: !1
		}
	};

	function ie(t, e, i) {
		return void 0 === i && (i = {
			x: 0,
			y: 0
		}), {
			top: t.top - e.height - i.y,
			right: t.right - e.width + i.x,
			bottom: t.bottom - e.height + i.y,
			left: t.left - e.width - i.x
		}
	}

	function ne(t) {
		return [it, st, nt, ot].some((function (e) {
			return t[e] >= 0
		}))
	}
	var se = {
			name: "hide",
			enabled: !0,
			phase: "main",
			requiresIfExists: ["preventOverflow"],
			fn: function (t) {
				var e = t.state,
					i = t.name,
					n = e.rects.reference,
					s = e.rects.popper,
					o = e.modifiersData.preventOverflow,
					r = Jt(e, {
						elementContext: "reference"
					}),
					a = Jt(e, {
						altBoundary: !0
					}),
					l = ie(r, n),
					c = ie(a, s, o),
					h = ne(l),
					d = ne(c);
				e.modifiersData[i] = {
					referenceClippingOffsets: l,
					popperEscapeOffsets: c,
					isReferenceHidden: h,
					hasPopperEscaped: d
				}, e.attributes.popper = Object.assign({}, e.attributes.popper, {
					"data-popper-reference-hidden": h,
					"data-popper-escaped": d
				})
			}
		},
		oe = {
			name: "offset",
			enabled: !0,
			phase: "main",
			requires: ["popperOffsets"],
			fn: function (t) {
				var e = t.state,
					i = t.options,
					n = t.name,
					s = i.offset,
					o = void 0 === s ? [0, 0] : s,
					r = ct.reduce((function (t, i) {
						return t[i] = function (t, e, i) {
							var n = _t(t),
								s = [ot, it].indexOf(n) >= 0 ? -1 : 1,
								o = "function" == typeof i ? i(Object.assign({}, e, {
									placement: t
								})) : i,
								r = o[0],
								a = o[1];
							return r = r || 0, a = (a || 0) * s, [ot, st].indexOf(n) >= 0 ? {
								x: a,
								y: r
							} : {
								x: r,
								y: a
							}
						}(i, e.rects, o), t
					}), {}),
					a = r[e.placement],
					l = a.x,
					c = a.y;
				null != e.modifiersData.popperOffsets && (e.modifiersData.popperOffsets.x += l, e.modifiersData.popperOffsets.y += c), e.modifiersData[n] = r
			}
		},
		re = {
			name: "popperOffsets",
			enabled: !0,
			phase: "read",
			fn: function (t) {
				var e = t.state,
					i = t.name;
				e.modifiersData[i] = Zt({
					reference: e.rects.reference,
					element: e.rects.popper,
					strategy: "absolute",
					placement: e.placement
				})
			},
			data: {}
		},
		ae = {
			name: "preventOverflow",
			enabled: !0,
			phase: "main",
			fn: function (t) {
				var e = t.state,
					i = t.options,
					n = t.name,
					s = i.mainAxis,
					o = void 0 === s || s,
					r = i.altAxis,
					a = void 0 !== r && r,
					l = i.boundary,
					c = i.rootBoundary,
					h = i.altBoundary,
					d = i.padding,
					u = i.tether,
					f = void 0 === u || u,
					p = i.tetherOffset,
					m = void 0 === p ? 0 : p,
					g = Jt(e, {
						boundary: l,
						rootBoundary: c,
						padding: d,
						altBoundary: h
					}),
					_ = _t(e.placement),
					b = Mt(e.placement),
					v = !b,
					y = Lt(_),
					w = "x" === y ? "y" : "x",
					E = e.modifiersData.popperOffsets,
					A = e.rects.reference,
					T = e.rects.popper,
					O = "function" == typeof m ? m(Object.assign({}, e.rects, {
						placement: e.placement
					})) : m,
					C = {
						x: 0,
						y: 0
					};
				if (E) {
					if (o || a) {
						var k = "y" === y ? it : ot,
							L = "y" === y ? nt : st,
							x = "y" === y ? "height" : "width",
							D = E[y],
							S = E[y] + g[k],
							N = E[y] - g[L],
							I = f ? -T[x] / 2 : 0,
							P = "start" === b ? A[x] : T[x],
							j = "start" === b ? -T[x] : -A[x],
							M = e.elements.arrow,
							H = f && M ? yt(M) : {
								width: 0,
								height: 0
							},
							B = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : {
								top: 0,
								right: 0,
								bottom: 0,
								left: 0
							},
							R = B[k],
							W = B[L],
							z = Nt(0, A[x], H[x]),
							q = v ? A[x] / 2 - I - z - R - O : P - z - R - O,
							F = v ? -A[x] / 2 + I + z + W + O : j + z + W + O,
							U = e.elements.arrow && kt(e.elements.arrow),
							$ = U ? "y" === y ? U.clientTop || 0 : U.clientLeft || 0 : 0,
							V = e.modifiersData.offset ? e.modifiersData.offset[e.placement][y] : 0,
							K = E[y] + q - V - $,
							X = E[y] + F - V;
						if (o) {
							var Y = Nt(f ? Dt(S, K) : S, D, f ? xt(N, X) : N);
							E[y] = Y, C[y] = Y - D
						}
						if (a) {
							var Q = "x" === y ? it : ot,
								G = "x" === y ? nt : st,
								Z = E[w],
								J = Z + g[Q],
								tt = Z - g[G],
								et = Nt(f ? Dt(J, K) : J, Z, f ? xt(tt, X) : tt);
							E[w] = et, C[w] = et - Z
						}
					}
					e.modifiersData[n] = C
				}
			},
			requiresIfExists: ["offset"]
		};

	function le(t, e, i) {
		void 0 === i && (i = !1);
		var n, s, o = pt(e),
			r = pt(e) && function (t) {
				var e = t.getBoundingClientRect(),
					i = e.width / t.offsetWidth || 1,
					n = e.height / t.offsetHeight || 1;
				return 1 !== i || 1 !== n
			}(e),
			a = Tt(e),
			l = vt(t, r),
			c = {
				scrollLeft: 0,
				scrollTop: 0
			},
			h = {
				x: 0,
				y: 0
			};
		return (o || !o && !i) && (("body" !== dt(e) || Xt(a)) && (c = (n = e) !== ut(n) && pt(n) ? {
			scrollLeft: (s = n).scrollLeft,
			scrollTop: s.scrollTop
		} : Vt(n)), pt(e) ? ((h = vt(e, !0)).x += e.clientLeft, h.y += e.clientTop) : a && (h.x = Kt(a))), {
			x: l.left + c.scrollLeft - h.x,
			y: l.top + c.scrollTop - h.y,
			width: l.width,
			height: l.height
		}
	}
	var ce = {
		placement: "bottom",
		modifiers: [],
		strategy: "absolute"
	};

	function he() {
		for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++) e[i] = arguments[i];
		return !e.some((function (t) {
			return !(t && "function" == typeof t.getBoundingClientRect)
		}))
	}

	function de(t) {
		void 0 === t && (t = {});
		var e = t,
			i = e.defaultModifiers,
			n = void 0 === i ? [] : i,
			s = e.defaultOptions,
			o = void 0 === s ? ce : s;
		return function (t, e, i) {
			void 0 === i && (i = o);
			var s, r, a = {
					placement: "bottom",
					orderedModifiers: [],
					options: Object.assign({}, ce, o),
					modifiersData: {},
					elements: {
						reference: t,
						popper: e
					},
					attributes: {},
					styles: {}
				},
				l = [],
				c = !1,
				h = {
					state: a,
					setOptions: function (i) {
						var s = "function" == typeof i ? i(a.options) : i;
						d(), a.options = Object.assign({}, o, a.options, s), a.scrollParents = {
							reference: ft(t) ? Yt(t) : t.contextElement ? Yt(t.contextElement) : [],
							popper: Yt(e)
						};
						var r, c, u = function (t) {
							var e = function (t) {
								var e = new Map,
									i = new Set,
									n = [];
								return t.forEach((function (t) {
									e.set(t.name, t)
								})), t.forEach((function (t) {
									i.has(t.name) || function t(s) {
										i.add(s.name), [].concat(s.requires || [], s.requiresIfExists || []).forEach((function (n) {
											if (!i.has(n)) {
												var s = e.get(n);
												s && t(s)
											}
										})), n.push(s)
									}(t)
								})), n
							}(t);
							return ht.reduce((function (t, i) {
								return t.concat(e.filter((function (t) {
									return t.phase === i
								})))
							}), [])
						}((r = [].concat(n, a.options.modifiers), c = r.reduce((function (t, e) {
							var i = t[e.name];
							return t[e.name] = i ? Object.assign({}, i, e, {
								options: Object.assign({}, i.options, e.options),
								data: Object.assign({}, i.data, e.data)
							}) : e, t
						}), {}), Object.keys(c).map((function (t) {
							return c[t]
						}))));
						return a.orderedModifiers = u.filter((function (t) {
							return t.enabled
						})), a.orderedModifiers.forEach((function (t) {
							var e = t.name,
								i = t.options,
								n = void 0 === i ? {} : i,
								s = t.effect;
							if ("function" == typeof s) {
								var o = s({
									state: a,
									name: e,
									instance: h,
									options: n
								});
								l.push(o || function () {})
							}
						})), h.update()
					},
					forceUpdate: function () {
						if (!c) {
							var t = a.elements,
								e = t.reference,
								i = t.popper;
							if (he(e, i)) {
								a.rects = {
									reference: le(e, kt(i), "fixed" === a.options.strategy),
									popper: yt(i)
								}, a.reset = !1, a.placement = a.options.placement, a.orderedModifiers.forEach((function (t) {
									return a.modifiersData[t.name] = Object.assign({}, t.data)
								}));
								for (var n = 0; n < a.orderedModifiers.length; n++)
									if (!0 !== a.reset) {
										var s = a.orderedModifiers[n],
											o = s.fn,
											r = s.options,
											l = void 0 === r ? {} : r,
											d = s.name;
										"function" == typeof o && (a = o({
											state: a,
											options: l,
											name: d,
											instance: h
										}) || a)
									} else a.reset = !1, n = -1
							}
						}
					},
					update: (s = function () {
						return new Promise((function (t) {
							h.forceUpdate(), t(a)
						}))
					}, function () {
						return r || (r = new Promise((function (t) {
							Promise.resolve().then((function () {
								r = void 0, t(s())
							}))
						}))), r
					}),
					destroy: function () {
						d(), c = !0
					}
				};
			if (!he(t, e)) return h;

			function d() {
				l.forEach((function (t) {
					return t()
				})), l = []
			}
			return h.setOptions(i).then((function (t) {
				!c && i.onFirstUpdate && i.onFirstUpdate(t)
			})), h
		}
	}
	var ue = de(),
		fe = de({
			defaultModifiers: [zt, re, Rt, gt]
		}),
		pe = de({
			defaultModifiers: [zt, re, Rt, gt, oe, ee, ae, jt, se]
		}),
		me = Object.freeze({
			__proto__: null,
			popperGenerator: de,
			detectOverflow: Jt,
			createPopperBase: ue,
			createPopper: pe,
			createPopperLite: fe,
			top: it,
			bottom: nt,
			right: st,
			left: ot,
			auto: "auto",
			basePlacements: rt,
			start: "start",
			end: at,
			clippingParents: "clippingParents",
			viewport: "viewport",
			popper: "popper",
			reference: "reference",
			variationPlacements: lt,
			placements: ct,
			beforeRead: "beforeRead",
			read: "read",
			afterRead: "afterRead",
			beforeMain: "beforeMain",
			main: "main",
			afterMain: "afterMain",
			beforeWrite: "beforeWrite",
			write: "write",
			afterWrite: "afterWrite",
			modifierPhases: ht,
			applyStyles: gt,
			arrow: jt,
			computeStyles: Rt,
			eventListeners: zt,
			flip: ee,
			hide: se,
			offset: oe,
			popperOffsets: re,
			preventOverflow: ae
		});
	const ge = new RegExp("ArrowUp|ArrowDown|Escape"),
		_e = p() ? "top-end" : "top-start",
		be = p() ? "top-start" : "top-end",
		ve = p() ? "bottom-end" : "bottom-start",
		ye = p() ? "bottom-start" : "bottom-end",
		we = p() ? "left-start" : "right-start",
		Ee = p() ? "right-start" : "left-start",
		Ae = {
			offset: [0, 2],
			boundary: "clippingParents",
			reference: "toggle",
			display: "dynamic",
			popperConfig: null,
			autoClose: !0
		},
		Te = {
			offset: "(array|string|function)",
			boundary: "(string|element)",
			reference: "(string|element|object)",
			display: "string",
			popperConfig: "(null|object|function)",
			autoClose: "(boolean|string)"
		};
	class Oe extends H {
		constructor(t, e) {
			super(t), this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar()
		}
		static get Default() {
			return Ae
		}
		static get DefaultType() {
			return Te
		}
		static get NAME() {
			return "dropdown"
		}
		toggle() {
			return this._isShown() ? this.hide() : this.show()
		}
		show() {
			if (l(this._element) || this._isShown(this._menu)) return;
			const t = {
				relatedTarget: this._element
			};
			if (P.trigger(this._element, "show.bs.dropdown", t).defaultPrevented) return;
			const e = Oe.getParentFromElement(this._element);
			this._inNavbar ? F.setDataAttribute(this._menu, "popper", "none") : this._createPopper(e), "ontouchstart" in document.documentElement && !e.closest(".navbar-nav") && [].concat(...document.body.children).forEach(t => P.on(t, "mouseover", h)), this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.add("show"), this._element.classList.add("show"), P.trigger(this._element, "shown.bs.dropdown", t)
		}
		hide() {
			if (l(this._element) || !this._isShown(this._menu)) return;
			const t = {
				relatedTarget: this._element
			};
			this._completeHide(t)
		}
		dispose() {
			this._popper && this._popper.destroy(), super.dispose()
		}
		update() {
			this._inNavbar = this._detectNavbar(), this._popper && this._popper.update()
		}
		_completeHide(t) {
			P.trigger(this._element, "hide.bs.dropdown", t).defaultPrevented || ("ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach(t => P.off(t, "mouseover", h)), this._popper && this._popper.destroy(), this._menu.classList.remove("show"), this._element.classList.remove("show"), this._element.setAttribute("aria-expanded", "false"), F.removeDataAttribute(this._menu, "popper"), P.trigger(this._element, "hidden.bs.dropdown", t))
		}
		_getConfig(t) {
			if (t = { ...this.constructor.Default,
					...F.getDataAttributes(this._element),
					...t
				}, r("dropdown", t, this.constructor.DefaultType), "object" == typeof t.reference && !s(t.reference) && "function" != typeof t.reference.getBoundingClientRect) throw new TypeError("dropdown".toUpperCase() + ': Option "reference" provided type "object" without a required "getBoundingClientRect" method.');
			return t
		}
		_createPopper(t) {
			if (void 0 === me) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
			let e = this._element;
			"parent" === this._config.reference ? e = t : s(this._config.reference) ? e = o(this._config.reference) : "object" == typeof this._config.reference && (e = this._config.reference);
			const i = this._getPopperConfig(),
				n = i.modifiers.find(t => "applyStyles" === t.name && !1 === t.enabled);
			this._popper = pe(e, this._menu, i), n && F.setDataAttribute(this._menu, "popper", "static")
		}
		_isShown(t = this._element) {
			return t.classList.contains("show")
		}
		_getMenuElement() {
			return U.next(this._element, ".dropdown-menu")[0]
		}
		_getPlacement() {
			const t = this._element.parentNode;
			if (t.classList.contains("dropend")) return we;
			if (t.classList.contains("dropstart")) return Ee;
			const e = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
			return t.classList.contains("dropup") ? e ? be : _e : e ? ye : ve
		}
		_detectNavbar() {
			return null !== this._element.closest(".navbar")
		}
		_getOffset() {
			const {
				offset: t
			} = this._config;
			return "string" == typeof t ? t.split(",").map(t => Number.parseInt(t, 10)) : "function" == typeof t ? e => t(e, this._element) : t
		}
		_getPopperConfig() {
			const t = {
				placement: this._getPlacement(),
				modifiers: [{
					name: "preventOverflow",
					options: {
						boundary: this._config.boundary
					}
				}, {
					name: "offset",
					options: {
						offset: this._getOffset()
					}
				}]
			};
			return "static" === this._config.display && (t.modifiers = [{
				name: "applyStyles",
				enabled: !1
			}]), { ...t,
				..."function" == typeof this._config.popperConfig ? this._config.popperConfig(t) : this._config.popperConfig
			}
		}
		_selectMenuItem({
			key: t,
			target: e
		}) {
			const i = U.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", this._menu).filter(a);
			i.length && b(i, e, "ArrowDown" === t, !i.includes(e)).focus()
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = Oe.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
		static clearMenus(t) {
			if (t && (2 === t.button || "keyup" === t.type && "Tab" !== t.key)) return;
			const e = U.find('[data-bs-toggle="dropdown"]');
			for (let i = 0, n = e.length; i < n; i++) {
				const n = Oe.getInstance(e[i]);
				if (!n || !1 === n._config.autoClose) continue;
				if (!n._isShown()) continue;
				const s = {
					relatedTarget: n._element
				};
				if (t) {
					const e = t.composedPath(),
						i = e.includes(n._menu);
					if (e.includes(n._element) || "inside" === n._config.autoClose && !i || "outside" === n._config.autoClose && i) continue;
					if (n._menu.contains(t.target) && ("keyup" === t.type && "Tab" === t.key || /input|select|option|textarea|form/i.test(t.target.tagName))) continue;
					"click" === t.type && (s.clickEvent = t)
				}
				n._completeHide(s)
			}
		}
		static getParentFromElement(t) {
			return i(t) || t.parentNode
		}
		static dataApiKeydownHandler(t) {
			if (/input|textarea/i.test(t.target.tagName) ? "Space" === t.key || "Escape" !== t.key && ("ArrowDown" !== t.key && "ArrowUp" !== t.key || t.target.closest(".dropdown-menu")) : !ge.test(t.key)) return;
			const e = this.classList.contains("show");
			if (!e && "Escape" === t.key) return;
			if (t.preventDefault(), t.stopPropagation(), l(this)) return;
			const i = this.matches('[data-bs-toggle="dropdown"]') ? this : U.prev(this, '[data-bs-toggle="dropdown"]')[0],
				n = Oe.getOrCreateInstance(i);
			if ("Escape" !== t.key) return "ArrowUp" === t.key || "ArrowDown" === t.key ? (e || n.show(), void n._selectMenuItem(t)) : void(e && "Space" !== t.key || Oe.clearMenus());
			n.hide()
		}
	}
	P.on(document, "keydown.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', Oe.dataApiKeydownHandler), P.on(document, "keydown.bs.dropdown.data-api", ".dropdown-menu", Oe.dataApiKeydownHandler), P.on(document, "click.bs.dropdown.data-api", Oe.clearMenus), P.on(document, "keyup.bs.dropdown.data-api", Oe.clearMenus), P.on(document, "click.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', (function (t) {
		t.preventDefault(), Oe.getOrCreateInstance(this).toggle()
	})), m(Oe);
	class Ce {
		constructor() {
			this._element = document.body
		}
		getWidth() {
			const t = document.documentElement.clientWidth;
			return Math.abs(window.innerWidth - t)
		}
		hide() {
			const t = this.getWidth();
			this._disableOverFlow(), this._setElementAttributes(this._element, "paddingRight", e => e + t), this._setElementAttributes(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", "paddingRight", e => e + t), this._setElementAttributes(".sticky-top", "marginRight", e => e - t)
		}
		_disableOverFlow() {
			this._saveInitialAttribute(this._element, "overflow"), this._element.style.overflow = "hidden"
		}
		_setElementAttributes(t, e, i) {
			const n = this.getWidth();
			this._applyManipulationCallback(t, t => {
				if (t !== this._element && window.innerWidth > t.clientWidth + n) return;
				this._saveInitialAttribute(t, e);
				const s = window.getComputedStyle(t)[e];
				t.style[e] = i(Number.parseFloat(s)) + "px"
			})
		}
		reset() {
			this._resetElementAttributes(this._element, "overflow"), this._resetElementAttributes(this._element, "paddingRight"), this._resetElementAttributes(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", "paddingRight"), this._resetElementAttributes(".sticky-top", "marginRight")
		}
		_saveInitialAttribute(t, e) {
			const i = t.style[e];
			i && F.setDataAttribute(t, e, i)
		}
		_resetElementAttributes(t, e) {
			this._applyManipulationCallback(t, t => {
				const i = F.getDataAttribute(t, e);
				void 0 === i ? t.style.removeProperty(e) : (F.removeDataAttribute(t, e), t.style[e] = i)
			})
		}
		_applyManipulationCallback(t, e) {
			s(t) ? e(t) : U.find(t, this._element).forEach(e)
		}
		isOverflowing() {
			return this.getWidth() > 0
		}
	}
	const ke = {
			className: "modal-backdrop",
			isVisible: !0,
			isAnimated: !1,
			rootElement: "body",
			clickCallback: null
		},
		Le = {
			className: "string",
			isVisible: "boolean",
			isAnimated: "boolean",
			rootElement: "(element|string)",
			clickCallback: "(function|null)"
		};
	class xe {
		constructor(t) {
			this._config = this._getConfig(t), this._isAppended = !1, this._element = null
		}
		show(t) {
			this._config.isVisible ? (this._append(), this._config.isAnimated && d(this._getElement()), this._getElement().classList.add("show"), this._emulateAnimation(() => {
				g(t)
			})) : g(t)
		}
		hide(t) {
			this._config.isVisible ? (this._getElement().classList.remove("show"), this._emulateAnimation(() => {
				this.dispose(), g(t)
			})) : g(t)
		}
		_getElement() {
			if (!this._element) {
				const t = document.createElement("div");
				t.className = this._config.className, this._config.isAnimated && t.classList.add("fade"), this._element = t
			}
			return this._element
		}
		_getConfig(t) {
			return (t = { ...ke,
				..."object" == typeof t ? t : {}
			}).rootElement = o(t.rootElement), r("backdrop", t, Le), t
		}
		_append() {
			this._isAppended || (this._config.rootElement.append(this._getElement()), P.on(this._getElement(), "mousedown.bs.backdrop", () => {
				g(this._config.clickCallback)
			}), this._isAppended = !0)
		}
		dispose() {
			this._isAppended && (P.off(this._element, "mousedown.bs.backdrop"), this._element.remove(), this._isAppended = !1)
		}
		_emulateAnimation(t) {
			_(t, this._getElement(), this._config.isAnimated)
		}
	}
	const De = {
			trapElement: null,
			autofocus: !0
		},
		Se = {
			trapElement: "element",
			autofocus: "boolean"
		};
	class Ne {
		constructor(t) {
			this._config = this._getConfig(t), this._isActive = !1, this._lastTabNavDirection = null
		}
		activate() {
			const {
				trapElement: t,
				autofocus: e
			} = this._config;
			this._isActive || (e && t.focus(), P.off(document, ".bs.focustrap"), P.on(document, "focusin.bs.focustrap", t => this._handleFocusin(t)), P.on(document, "keydown.tab.bs.focustrap", t => this._handleKeydown(t)), this._isActive = !0)
		}
		deactivate() {
			this._isActive && (this._isActive = !1, P.off(document, ".bs.focustrap"))
		}
		_handleFocusin(t) {
			const {
				target: e
			} = t, {
				trapElement: i
			} = this._config;
			if (e === document || e === i || i.contains(e)) return;
			const n = U.focusableChildren(i);
			0 === n.length ? i.focus() : "backward" === this._lastTabNavDirection ? n[n.length - 1].focus() : n[0].focus()
		}
		_handleKeydown(t) {
			"Tab" === t.key && (this._lastTabNavDirection = t.shiftKey ? "backward" : "forward")
		}
		_getConfig(t) {
			return t = { ...De,
				..."object" == typeof t ? t : {}
			}, r("focustrap", t, Se), t
		}
	}
	const Ie = {
			backdrop: !0,
			keyboard: !0,
			focus: !0
		},
		Pe = {
			backdrop: "(boolean|string)",
			keyboard: "boolean",
			focus: "boolean"
		};
	class je extends H {
		constructor(t, e) {
			super(t), this._config = this._getConfig(e), this._dialog = U.findOne(".modal-dialog", this._element), this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._isShown = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1, this._scrollBar = new Ce
		}
		static get Default() {
			return Ie
		}
		static get NAME() {
			return "modal"
		}
		toggle(t) {
			return this._isShown ? this.hide() : this.show(t)
		}
		show(t) {
			this._isShown || this._isTransitioning || P.trigger(this._element, "show.bs.modal", {
				relatedTarget: t
			}).defaultPrevented || (this._isShown = !0, this._isAnimated() && (this._isTransitioning = !0), this._scrollBar.hide(), document.body.classList.add("modal-open"), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), P.on(this._dialog, "mousedown.dismiss.bs.modal", () => {
				P.one(this._element, "mouseup.dismiss.bs.modal", t => {
					t.target === this._element && (this._ignoreBackdropClick = !0)
				})
			}), this._showBackdrop(() => this._showElement(t)))
		}
		hide() {
			if (!this._isShown || this._isTransitioning) return;
			if (P.trigger(this._element, "hide.bs.modal").defaultPrevented) return;
			this._isShown = !1;
			const t = this._isAnimated();
			t && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), this._focustrap.deactivate(), this._element.classList.remove("show"), P.off(this._element, "click.dismiss.bs.modal"), P.off(this._dialog, "mousedown.dismiss.bs.modal"), this._queueCallback(() => this._hideModal(), this._element, t)
		}
		dispose() {
			[window, this._dialog].forEach(t => P.off(t, ".bs.modal")), this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
		}
		handleUpdate() {
			this._adjustDialog()
		}
		_initializeBackDrop() {
			return new xe({
				isVisible: Boolean(this._config.backdrop),
				isAnimated: this._isAnimated()
			})
		}
		_initializeFocusTrap() {
			return new Ne({
				trapElement: this._element
			})
		}
		_getConfig(t) {
			return t = { ...Ie,
				...F.getDataAttributes(this._element),
				..."object" == typeof t ? t : {}
			}, r("modal", t, Pe), t
		}
		_showElement(t) {
			const e = this._isAnimated(),
				i = U.findOne(".modal-body", this._dialog);
			this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.append(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.scrollTop = 0, i && (i.scrollTop = 0), e && d(this._element), this._element.classList.add("show"), this._queueCallback(() => {
				this._config.focus && this._focustrap.activate(), this._isTransitioning = !1, P.trigger(this._element, "shown.bs.modal", {
					relatedTarget: t
				})
			}, this._dialog, e)
		}
		_setEscapeEvent() {
			this._isShown ? P.on(this._element, "keydown.dismiss.bs.modal", t => {
				this._config.keyboard && "Escape" === t.key ? (t.preventDefault(), this.hide()) : this._config.keyboard || "Escape" !== t.key || this._triggerBackdropTransition()
			}) : P.off(this._element, "keydown.dismiss.bs.modal")
		}
		_setResizeEvent() {
			this._isShown ? P.on(window, "resize.bs.modal", () => this._adjustDialog()) : P.off(window, "resize.bs.modal")
		}
		_hideModal() {
			this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._backdrop.hide(() => {
				document.body.classList.remove("modal-open"), this._resetAdjustments(), this._scrollBar.reset(), P.trigger(this._element, "hidden.bs.modal")
			})
		}
		_showBackdrop(t) {
			P.on(this._element, "click.dismiss.bs.modal", t => {
				this._ignoreBackdropClick ? this._ignoreBackdropClick = !1 : t.target === t.currentTarget && (!0 === this._config.backdrop ? this.hide() : "static" === this._config.backdrop && this._triggerBackdropTransition())
			}), this._backdrop.show(t)
		}
		_isAnimated() {
			return this._element.classList.contains("fade")
		}
		_triggerBackdropTransition() {
			if (P.trigger(this._element, "hidePrevented.bs.modal").defaultPrevented) return;
			const {
				classList: t,
				scrollHeight: e,
				style: i
			} = this._element, n = e > document.documentElement.clientHeight;
			!n && "hidden" === i.overflowY || t.contains("modal-static") || (n || (i.overflowY = "hidden"), t.add("modal-static"), this._queueCallback(() => {
				t.remove("modal-static"), n || this._queueCallback(() => {
					i.overflowY = ""
				}, this._dialog)
			}, this._dialog), this._element.focus())
		}
		_adjustDialog() {
			const t = this._element.scrollHeight > document.documentElement.clientHeight,
				e = this._scrollBar.getWidth(),
				i = e > 0;
			(!i && t && !p() || i && !t && p()) && (this._element.style.paddingLeft = e + "px"), (i && !t && !p() || !i && t && p()) && (this._element.style.paddingRight = e + "px")
		}
		_resetAdjustments() {
			this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
		}
		static jQueryInterface(t, e) {
			return this.each((function () {
				const i = je.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === i[t]) throw new TypeError(`No method named "${t}"`);
					i[t](e)
				}
			}))
		}
	}
	P.on(document, "click.bs.modal.data-api", '[data-bs-toggle="modal"]', (function (t) {
		const e = i(this);
		["A", "AREA"].includes(this.tagName) && t.preventDefault(), P.one(e, "show.bs.modal", t => {
			t.defaultPrevented || P.one(e, "hidden.bs.modal", () => {
				a(this) && this.focus()
			})
		});
		const n = U.findOne(".modal.show");
		n && je.getInstance(n).hide(), je.getOrCreateInstance(e).toggle(this)
	})), B(je), m(je);
	const Me = {
			backdrop: !0,
			keyboard: !0,
			scroll: !1
		},
		He = {
			backdrop: "boolean",
			keyboard: "boolean",
			scroll: "boolean"
		};
	class Be extends H {
		constructor(t, e) {
			super(t), this._config = this._getConfig(e), this._isShown = !1, this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._addEventListeners()
		}
		static get NAME() {
			return "offcanvas"
		}
		static get Default() {
			return Me
		}
		toggle(t) {
			return this._isShown ? this.hide() : this.show(t)
		}
		show(t) {
			this._isShown || P.trigger(this._element, "show.bs.offcanvas", {
				relatedTarget: t
			}).defaultPrevented || (this._isShown = !0, this._element.style.visibility = "visible", this._backdrop.show(), this._config.scroll || (new Ce).hide(), this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.classList.add("show"), this._queueCallback(() => {
				this._config.scroll || this._focustrap.activate(), P.trigger(this._element, "shown.bs.offcanvas", {
					relatedTarget: t
				})
			}, this._element, !0))
		}
		hide() {
			this._isShown && (P.trigger(this._element, "hide.bs.offcanvas").defaultPrevented || (this._focustrap.deactivate(), this._element.blur(), this._isShown = !1, this._element.classList.remove("show"), this._backdrop.hide(), this._queueCallback(() => {
				this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._element.style.visibility = "hidden", this._config.scroll || (new Ce).reset(), P.trigger(this._element, "hidden.bs.offcanvas")
			}, this._element, !0)))
		}
		dispose() {
			this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
		}
		_getConfig(t) {
			return t = { ...Me,
				...F.getDataAttributes(this._element),
				..."object" == typeof t ? t : {}
			}, r("offcanvas", t, He), t
		}
		_initializeBackDrop() {
			return new xe({
				className: "offcanvas-backdrop",
				isVisible: this._config.backdrop,
				isAnimated: !0,
				rootElement: this._element.parentNode,
				clickCallback: () => this.hide()
			})
		}
		_initializeFocusTrap() {
			return new Ne({
				trapElement: this._element
			})
		}
		_addEventListeners() {
			P.on(this._element, "keydown.dismiss.bs.offcanvas", t => {
				this._config.keyboard && "Escape" === t.key && this.hide()
			})
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = Be.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	P.on(document, "click.bs.offcanvas.data-api", '[data-bs-toggle="offcanvas"]', (function (t) {
		const e = i(this);
		if (["A", "AREA"].includes(this.tagName) && t.preventDefault(), l(this)) return;
		P.one(e, "hidden.bs.offcanvas", () => {
			a(this) && this.focus()
		});
		const n = U.findOne(".offcanvas.show");
		n && n !== e && Be.getInstance(n).hide(), Be.getOrCreateInstance(e).toggle(this)
	})), P.on(window, "load.bs.offcanvas.data-api", () => U.find(".offcanvas.show").forEach(t => Be.getOrCreateInstance(t).show())), B(Be), m(Be);
	const Re = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
		We = /^(?:(?:https?|mailto|ftp|tel|file):|[^#&/:?]*(?:[#/?]|$))/i,
		ze = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
		qe = (t, e) => {
			const i = t.nodeName.toLowerCase();
			if (e.includes(i)) return !Re.has(i) || Boolean(We.test(t.nodeValue) || ze.test(t.nodeValue));
			const n = e.filter(t => t instanceof RegExp);
			for (let t = 0, e = n.length; t < e; t++)
				if (n[t].test(i)) return !0;
			return !1
		};

	function Fe(t, e, i) {
		if (!t.length) return t;
		if (i && "function" == typeof i) return i(t);
		const n = (new window.DOMParser).parseFromString(t, "text/html"),
			s = Object.keys(e),
			o = [].concat(...n.body.querySelectorAll("*"));
		for (let t = 0, i = o.length; t < i; t++) {
			const i = o[t],
				n = i.nodeName.toLowerCase();
			if (!s.includes(n)) {
				i.remove();
				continue
			}
			const r = [].concat(...i.attributes),
				a = [].concat(e["*"] || [], e[n] || []);
			r.forEach(t => {
				qe(t, a) || i.removeAttribute(t.nodeName)
			})
		}
		return n.body.innerHTML
	}
	const Ue = new Set(["sanitize", "allowList", "sanitizeFn"]),
		$e = {
			animation: "boolean",
			template: "string",
			title: "(string|element|function)",
			trigger: "string",
			delay: "(number|object)",
			html: "boolean",
			selector: "(string|boolean)",
			placement: "(string|function)",
			offset: "(array|string|function)",
			container: "(string|element|boolean)",
			fallbackPlacements: "array",
			boundary: "(string|element)",
			customClass: "(string|function)",
			sanitize: "boolean",
			sanitizeFn: "(null|function)",
			allowList: "object",
			popperConfig: "(null|object|function)"
		},
		Ve = {
			AUTO: "auto",
			TOP: "top",
			RIGHT: p() ? "left" : "right",
			BOTTOM: "bottom",
			LEFT: p() ? "right" : "left"
		},
		Ke = {
			animation: !0,
			template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
			trigger: "hover focus",
			title: "",
			delay: 0,
			html: !1,
			selector: !1,
			placement: "top",
			offset: [0, 0],
			container: !1,
			fallbackPlacements: ["top", "right", "bottom", "left"],
			boundary: "clippingParents",
			customClass: "",
			sanitize: !0,
			sanitizeFn: null,
			allowList: {
				"*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
				a: ["target", "href", "title", "rel"],
				area: [],
				b: [],
				br: [],
				col: [],
				code: [],
				div: [],
				em: [],
				hr: [],
				h1: [],
				h2: [],
				h3: [],
				h4: [],
				h5: [],
				h6: [],
				i: [],
				img: ["src", "srcset", "alt", "title", "width", "height"],
				li: [],
				ol: [],
				p: [],
				pre: [],
				s: [],
				small: [],
				span: [],
				sub: [],
				sup: [],
				strong: [],
				u: [],
				ul: []
			},
			popperConfig: null
		},
		Xe = {
			HIDE: "hide.bs.tooltip",
			HIDDEN: "hidden.bs.tooltip",
			SHOW: "show.bs.tooltip",
			SHOWN: "shown.bs.tooltip",
			INSERTED: "inserted.bs.tooltip",
			CLICK: "click.bs.tooltip",
			FOCUSIN: "focusin.bs.tooltip",
			FOCUSOUT: "focusout.bs.tooltip",
			MOUSEENTER: "mouseenter.bs.tooltip",
			MOUSELEAVE: "mouseleave.bs.tooltip"
		};
	class Ye extends H {
		constructor(t, e) {
			if (void 0 === me) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
			super(t), this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this._config = this._getConfig(e), this.tip = null, this._setListeners()
		}
		static get Default() {
			return Ke
		}
		static get NAME() {
			return "tooltip"
		}
		static get Event() {
			return Xe
		}
		static get DefaultType() {
			return $e
		}
		enable() {
			this._isEnabled = !0
		}
		disable() {
			this._isEnabled = !1
		}
		toggleEnabled() {
			this._isEnabled = !this._isEnabled
		}
		toggle(t) {
			if (this._isEnabled)
				if (t) {
					const e = this._initializeOnDelegatedTarget(t);
					e._activeTrigger.click = !e._activeTrigger.click, e._isWithActiveTrigger() ? e._enter(null, e) : e._leave(null, e)
				} else {
					if (this.getTipElement().classList.contains("show")) return void this._leave(null, this);
					this._enter(null, this)
				}
		}
		dispose() {
			clearTimeout(this._timeout), P.off(this._element.closest(".modal"), "hide.bs.modal", this._hideModalHandler), this.tip && this.tip.remove(), this._disposePopper(), super.dispose()
		}
		show() {
			if ("none" === this._element.style.display) throw new Error("Please use show on visible elements");
			if (!this.isWithContent() || !this._isEnabled) return;
			const t = P.trigger(this._element, this.constructor.Event.SHOW),
				e = c(this._element),
				i = null === e ? this._element.ownerDocument.documentElement.contains(this._element) : e.contains(this._element);
			if (t.defaultPrevented || !i) return;
			"tooltip" === this.constructor.NAME && this.tip && this.getTitle() !== this.tip.querySelector(".tooltip-inner").innerHTML && (this._disposePopper(), this.tip.remove(), this.tip = null);
			const n = this.getTipElement(),
				s = (t => {
					do {
						t += Math.floor(1e6 * Math.random())
					} while (document.getElementById(t));
					return t
				})(this.constructor.NAME);
			n.setAttribute("id", s), this._element.setAttribute("aria-describedby", s), this._config.animation && n.classList.add("fade");
			const o = "function" == typeof this._config.placement ? this._config.placement.call(this, n, this._element) : this._config.placement,
				r = this._getAttachment(o);
			this._addAttachmentClass(r);
			const {
				container: a
			} = this._config;
			M.set(n, this.constructor.DATA_KEY, this), this._element.ownerDocument.documentElement.contains(this.tip) || (a.append(n), P.trigger(this._element, this.constructor.Event.INSERTED)), this._popper ? this._popper.update() : this._popper = pe(this._element, n, this._getPopperConfig(r)), n.classList.add("show");
			const l = this._resolvePossibleFunction(this._config.customClass);
			l && n.classList.add(...l.split(" ")), "ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach(t => {
				P.on(t, "mouseover", h)
			});
			const d = this.tip.classList.contains("fade");
			this._queueCallback(() => {
				const t = this._hoverState;
				this._hoverState = null, P.trigger(this._element, this.constructor.Event.SHOWN), "out" === t && this._leave(null, this)
			}, this.tip, d)
		}
		hide() {
			if (!this._popper) return;
			const t = this.getTipElement();
			if (P.trigger(this._element, this.constructor.Event.HIDE).defaultPrevented) return;
			t.classList.remove("show"), "ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach(t => P.off(t, "mouseover", h)), this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1;
			const e = this.tip.classList.contains("fade");
			this._queueCallback(() => {
				this._isWithActiveTrigger() || ("show" !== this._hoverState && t.remove(), this._cleanTipClass(), this._element.removeAttribute("aria-describedby"), P.trigger(this._element, this.constructor.Event.HIDDEN), this._disposePopper())
			}, this.tip, e), this._hoverState = ""
		}
		update() {
			null !== this._popper && this._popper.update()
		}
		isWithContent() {
			return Boolean(this.getTitle())
		}
		getTipElement() {
			if (this.tip) return this.tip;
			const t = document.createElement("div");
			t.innerHTML = this._config.template;
			const e = t.children[0];
			return this.setContent(e), e.classList.remove("fade", "show"), this.tip = e, this.tip
		}
		setContent(t) {
			this._sanitizeAndSetContent(t, this.getTitle(), ".tooltip-inner")
		}
		_sanitizeAndSetContent(t, e, i) {
			const n = U.findOne(i, t);
			e || !n ? this.setElementContent(n, e) : n.remove()
		}
		setElementContent(t, e) {
			if (null !== t) return s(e) ? (e = o(e), void(this._config.html ? e.parentNode !== t && (t.innerHTML = "", t.append(e)) : t.textContent = e.textContent)) : void(this._config.html ? (this._config.sanitize && (e = Fe(e, this._config.allowList, this._config.sanitizeFn)), t.innerHTML = e) : t.textContent = e)
		}
		getTitle() {
			const t = this._element.getAttribute("data-bs-original-title") || this._config.title;
			return this._resolvePossibleFunction(t)
		}
		updateAttachment(t) {
			return "right" === t ? "end" : "left" === t ? "start" : t
		}
		_initializeOnDelegatedTarget(t, e) {
			return e || this.constructor.getOrCreateInstance(t.delegateTarget, this._getDelegateConfig())
		}
		_getOffset() {
			const {
				offset: t
			} = this._config;
			return "string" == typeof t ? t.split(",").map(t => Number.parseInt(t, 10)) : "function" == typeof t ? e => t(e, this._element) : t
		}
		_resolvePossibleFunction(t) {
			return "function" == typeof t ? t.call(this._element) : t
		}
		_getPopperConfig(t) {
			const e = {
				placement: t,
				modifiers: [{
					name: "flip",
					options: {
						fallbackPlacements: this._config.fallbackPlacements
					}
				}, {
					name: "offset",
					options: {
						offset: this._getOffset()
					}
				}, {
					name: "preventOverflow",
					options: {
						boundary: this._config.boundary
					}
				}, {
					name: "arrow",
					options: {
						element: `.${this.constructor.NAME}-arrow`
					}
				}, {
					name: "onChange",
					enabled: !0,
					phase: "afterWrite",
					fn: t => this._handlePopperPlacementChange(t)
				}],
				onFirstUpdate: t => {
					t.options.placement !== t.placement && this._handlePopperPlacementChange(t)
				}
			};
			return { ...e,
				..."function" == typeof this._config.popperConfig ? this._config.popperConfig(e) : this._config.popperConfig
			}
		}
		_addAttachmentClass(t) {
			this.getTipElement().classList.add(`${this._getBasicClassPrefix()}-${this.updateAttachment(t)}`)
		}
		_getAttachment(t) {
			return Ve[t.toUpperCase()]
		}
		_setListeners() {
			this._config.trigger.split(" ").forEach(t => {
				if ("click" === t) P.on(this._element, this.constructor.Event.CLICK, this._config.selector, t => this.toggle(t));
				else if ("manual" !== t) {
					const e = "hover" === t ? this.constructor.Event.MOUSEENTER : this.constructor.Event.FOCUSIN,
						i = "hover" === t ? this.constructor.Event.MOUSELEAVE : this.constructor.Event.FOCUSOUT;
					P.on(this._element, e, this._config.selector, t => this._enter(t)), P.on(this._element, i, this._config.selector, t => this._leave(t))
				}
			}), this._hideModalHandler = () => {
				this._element && this.hide()
			}, P.on(this._element.closest(".modal"), "hide.bs.modal", this._hideModalHandler), this._config.selector ? this._config = { ...this._config,
				trigger: "manual",
				selector: ""
			} : this._fixTitle()
		}
		_fixTitle() {
			const t = this._element.getAttribute("title"),
				e = typeof this._element.getAttribute("data-bs-original-title");
			(t || "string" !== e) && (this._element.setAttribute("data-bs-original-title", t || ""), !t || this._element.getAttribute("aria-label") || this._element.textContent || this._element.setAttribute("aria-label", t), this._element.setAttribute("title", ""))
		}
		_enter(t, e) {
			e = this._initializeOnDelegatedTarget(t, e), t && (e._activeTrigger["focusin" === t.type ? "focus" : "hover"] = !0), e.getTipElement().classList.contains("show") || "show" === e._hoverState ? e._hoverState = "show" : (clearTimeout(e._timeout), e._hoverState = "show", e._config.delay && e._config.delay.show ? e._timeout = setTimeout(() => {
				"show" === e._hoverState && e.show()
			}, e._config.delay.show) : e.show())
		}
		_leave(t, e) {
			e = this._initializeOnDelegatedTarget(t, e), t && (e._activeTrigger["focusout" === t.type ? "focus" : "hover"] = e._element.contains(t.relatedTarget)), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = "out", e._config.delay && e._config.delay.hide ? e._timeout = setTimeout(() => {
				"out" === e._hoverState && e.hide()
			}, e._config.delay.hide) : e.hide())
		}
		_isWithActiveTrigger() {
			for (const t in this._activeTrigger)
				if (this._activeTrigger[t]) return !0;
			return !1
		}
		_getConfig(t) {
			const e = F.getDataAttributes(this._element);
			return Object.keys(e).forEach(t => {
				Ue.has(t) && delete e[t]
			}), (t = { ...this.constructor.Default,
				...e,
				..."object" == typeof t && t ? t : {}
			}).container = !1 === t.container ? document.body : o(t.container), "number" == typeof t.delay && (t.delay = {
				show: t.delay,
				hide: t.delay
			}), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), r("tooltip", t, this.constructor.DefaultType), t.sanitize && (t.template = Fe(t.template, t.allowList, t.sanitizeFn)), t
		}
		_getDelegateConfig() {
			const t = {};
			for (const e in this._config) this.constructor.Default[e] !== this._config[e] && (t[e] = this._config[e]);
			return t
		}
		_cleanTipClass() {
			const t = this.getTipElement(),
				e = new RegExp(`(^|\\s)${this._getBasicClassPrefix()}\\S+`, "g"),
				i = t.getAttribute("class").match(e);
			null !== i && i.length > 0 && i.map(t => t.trim()).forEach(e => t.classList.remove(e))
		}
		_getBasicClassPrefix() {
			return "bs-tooltip"
		}
		_handlePopperPlacementChange(t) {
			const {
				state: e
			} = t;
			e && (this.tip = e.elements.popper, this._cleanTipClass(), this._addAttachmentClass(this._getAttachment(e.placement)))
		}
		_disposePopper() {
			this._popper && (this._popper.destroy(), this._popper = null)
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = Ye.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	m(Ye);
	const Qe = { ...Ye.Default,
			placement: "right",
			offset: [0, 8],
			trigger: "click",
			content: "",
			template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		},
		Ge = { ...Ye.DefaultType,
			content: "(string|element|function)"
		},
		Ze = {
			HIDE: "hide.bs.popover",
			HIDDEN: "hidden.bs.popover",
			SHOW: "show.bs.popover",
			SHOWN: "shown.bs.popover",
			INSERTED: "inserted.bs.popover",
			CLICK: "click.bs.popover",
			FOCUSIN: "focusin.bs.popover",
			FOCUSOUT: "focusout.bs.popover",
			MOUSEENTER: "mouseenter.bs.popover",
			MOUSELEAVE: "mouseleave.bs.popover"
		};
	class Je extends Ye {
		static get Default() {
			return Qe
		}
		static get NAME() {
			return "popover"
		}
		static get Event() {
			return Ze
		}
		static get DefaultType() {
			return Ge
		}
		isWithContent() {
			return this.getTitle() || this._getContent()
		}
		setContent(t) {
			this._sanitizeAndSetContent(t, this.getTitle(), ".popover-header"), this._sanitizeAndSetContent(t, this._getContent(), ".popover-body")
		}
		_getContent() {
			return this._resolvePossibleFunction(this._config.content)
		}
		_getBasicClassPrefix() {
			return "bs-popover"
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = Je.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	m(Je);
	const ti = {
			offset: 10,
			method: "auto",
			target: ""
		},
		ei = {
			offset: "number",
			method: "string",
			target: "(string|element)"
		},
		ii = ".nav-link, .list-group-item, .dropdown-item";
	class ni extends H {
		constructor(t, e) {
			super(t), this._scrollElement = "BODY" === this._element.tagName ? window : this._element, this._config = this._getConfig(e), this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, P.on(this._scrollElement, "scroll.bs.scrollspy", () => this._process()), this.refresh(), this._process()
		}
		static get Default() {
			return ti
		}
		static get NAME() {
			return "scrollspy"
		}
		refresh() {
			const t = this._scrollElement === this._scrollElement.window ? "offset" : "position",
				i = "auto" === this._config.method ? t : this._config.method,
				n = "position" === i ? this._getScrollTop() : 0;
			this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), U.find(ii, this._config.target).map(t => {
				const s = e(t),
					o = s ? U.findOne(s) : null;
				if (o) {
					const t = o.getBoundingClientRect();
					if (t.width || t.height) return [F[i](o).top + n, s]
				}
				return null
			}).filter(t => t).sort((t, e) => t[0] - e[0]).forEach(t => {
				this._offsets.push(t[0]), this._targets.push(t[1])
			})
		}
		dispose() {
			P.off(this._scrollElement, ".bs.scrollspy"), super.dispose()
		}
		_getConfig(t) {
			return (t = { ...ti,
				...F.getDataAttributes(this._element),
				..."object" == typeof t && t ? t : {}
			}).target = o(t.target) || document.documentElement, r("scrollspy", t, ei), t
		}
		_getScrollTop() {
			return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
		}
		_getScrollHeight() {
			return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
		}
		_getOffsetHeight() {
			return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
		}
		_process() {
			const t = this._getScrollTop() + this._config.offset,
				e = this._getScrollHeight(),
				i = this._config.offset + e - this._getOffsetHeight();
			if (this._scrollHeight !== e && this.refresh(), t >= i) {
				const t = this._targets[this._targets.length - 1];
				this._activeTarget !== t && this._activate(t)
			} else {
				if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0) return this._activeTarget = null, void this._clear();
				for (let e = this._offsets.length; e--;) this._activeTarget !== this._targets[e] && t >= this._offsets[e] && (void 0 === this._offsets[e + 1] || t < this._offsets[e + 1]) && this._activate(this._targets[e])
			}
		}
		_activate(t) {
			this._activeTarget = t, this._clear();
			const e = ii.split(",").map(e => `${e}[data-bs-target="${t}"],${e}[href="${t}"]`),
				i = U.findOne(e.join(","), this._config.target);
			i.classList.add("active"), i.classList.contains("dropdown-item") ? U.findOne(".dropdown-toggle", i.closest(".dropdown")).classList.add("active") : U.parents(i, ".nav, .list-group").forEach(t => {
				U.prev(t, ".nav-link, .list-group-item").forEach(t => t.classList.add("active")), U.prev(t, ".nav-item").forEach(t => {
					U.children(t, ".nav-link").forEach(t => t.classList.add("active"))
				})
			}), P.trigger(this._scrollElement, "activate.bs.scrollspy", {
				relatedTarget: t
			})
		}
		_clear() {
			U.find(ii, this._config.target).filter(t => t.classList.contains("active")).forEach(t => t.classList.remove("active"))
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = ni.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	P.on(window, "load.bs.scrollspy.data-api", () => {
		U.find('[data-bs-spy="scroll"]').forEach(t => new ni(t))
	}), m(ni);
	class si extends H {
		static get NAME() {
			return "tab"
		}
		show() {
			if (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains("active")) return;
			let t;
			const e = i(this._element),
				n = this._element.closest(".nav, .list-group");
			if (n) {
				const e = "UL" === n.nodeName || "OL" === n.nodeName ? ":scope > li > .active" : ".active";
				t = U.find(e, n), t = t[t.length - 1]
			}
			const s = t ? P.trigger(t, "hide.bs.tab", {
				relatedTarget: this._element
			}) : null;
			if (P.trigger(this._element, "show.bs.tab", {
					relatedTarget: t
				}).defaultPrevented || null !== s && s.defaultPrevented) return;
			this._activate(this._element, n);
			const o = () => {
				P.trigger(t, "hidden.bs.tab", {
					relatedTarget: this._element
				}), P.trigger(this._element, "shown.bs.tab", {
					relatedTarget: t
				})
			};
			e ? this._activate(e, e.parentNode, o) : o()
		}
		_activate(t, e, i) {
			const n = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? U.children(e, ".active") : U.find(":scope > li > .active", e))[0],
				s = i && n && n.classList.contains("fade"),
				o = () => this._transitionComplete(t, n, i);
			n && s ? (n.classList.remove("show"), this._queueCallback(o, t, !0)) : o()
		}
		_transitionComplete(t, e, i) {
			if (e) {
				e.classList.remove("active");
				const t = U.findOne(":scope > .dropdown-menu .active", e.parentNode);
				t && t.classList.remove("active"), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1)
			}
			t.classList.add("active"), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), d(t), t.classList.contains("fade") && t.classList.add("show");
			let n = t.parentNode;
			if (n && "LI" === n.nodeName && (n = n.parentNode), n && n.classList.contains("dropdown-menu")) {
				const e = t.closest(".dropdown");
				e && U.find(".dropdown-toggle", e).forEach(t => t.classList.add("active")), t.setAttribute("aria-expanded", !0)
			}
			i && i()
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = si.getOrCreateInstance(this);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	P.on(document, "click.bs.tab.data-api", '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]', (function (t) {
		["A", "AREA"].includes(this.tagName) && t.preventDefault(), l(this) || si.getOrCreateInstance(this).show()
	})), m(si);
	const oi = {
			animation: "boolean",
			autohide: "boolean",
			delay: "number"
		},
		ri = {
			animation: !0,
			autohide: !0,
			delay: 5e3
		};
	class ai extends H {
		constructor(t, e) {
			super(t), this._config = this._getConfig(e), this._timeout = null, this._hasMouseInteraction = !1, this._hasKeyboardInteraction = !1, this._setListeners()
		}
		static get DefaultType() {
			return oi
		}
		static get Default() {
			return ri
		}
		static get NAME() {
			return "toast"
		}
		show() {
			P.trigger(this._element, "show.bs.toast").defaultPrevented || (this._clearTimeout(), this._config.animation && this._element.classList.add("fade"), this._element.classList.remove("hide"), d(this._element), this._element.classList.add("show"), this._element.classList.add("showing"), this._queueCallback(() => {
				this._element.classList.remove("showing"), P.trigger(this._element, "shown.bs.toast"), this._maybeScheduleHide()
			}, this._element, this._config.animation))
		}
		hide() {
			this._element.classList.contains("show") && (P.trigger(this._element, "hide.bs.toast").defaultPrevented || (this._element.classList.add("showing"), this._queueCallback(() => {
				this._element.classList.add("hide"), this._element.classList.remove("showing"), this._element.classList.remove("show"), P.trigger(this._element, "hidden.bs.toast")
			}, this._element, this._config.animation)))
		}
		dispose() {
			this._clearTimeout(), this._element.classList.contains("show") && this._element.classList.remove("show"), super.dispose()
		}
		_getConfig(t) {
			return t = { ...ri,
				...F.getDataAttributes(this._element),
				..."object" == typeof t && t ? t : {}
			}, r("toast", t, this.constructor.DefaultType), t
		}
		_maybeScheduleHide() {
			this._config.autohide && (this._hasMouseInteraction || this._hasKeyboardInteraction || (this._timeout = setTimeout(() => {
				this.hide()
			}, this._config.delay)))
		}
		_onInteraction(t, e) {
			switch (t.type) {
				case "mouseover":
				case "mouseout":
					this._hasMouseInteraction = e;
					break;
				case "focusin":
				case "focusout":
					this._hasKeyboardInteraction = e
			}
			if (e) return void this._clearTimeout();
			const i = t.relatedTarget;
			this._element === i || this._element.contains(i) || this._maybeScheduleHide()
		}
		_setListeners() {
			P.on(this._element, "mouseover.bs.toast", t => this._onInteraction(t, !0)), P.on(this._element, "mouseout.bs.toast", t => this._onInteraction(t, !1)), P.on(this._element, "focusin.bs.toast", t => this._onInteraction(t, !0)), P.on(this._element, "focusout.bs.toast", t => this._onInteraction(t, !1))
		}
		_clearTimeout() {
			clearTimeout(this._timeout), this._timeout = null
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = ai.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	return B(ai), m(ai), {
		Alert: R,
		Button: W,
		Carousel: Z,
		Collapse: et,
		Dropdown: Oe,
		Modal: je,
		Offcanvas: Be,
		Popover: Je,
		ScrollSpy: ni,
		Tab: si,
		Toast: ai,
		Tooltip: Ye
	}
}));
//# sourceMappingURL=bootstrap.bundle.min.js.map
/* plain JS slideToggle https://github.com/ericbutler555/plain-js-slidetoggle */
function slideToggle(t, e, o) {
	0 === t.clientHeight ? j(t, e, o, !0) : j(t, e, o)
}

function slideUp(t, e, o) {
	j(t, e, o)
}

function slideDown(t, e, o) {
	j(t, e, o, !0)
}

function j(t, e, o, i) {
	void 0 === e && (e = 400), void 0 === i && (i = !1), t.style.overflow = "hidden", i && (t.style.display = "block");
	var p, l = window.getComputedStyle(t),
		n = parseFloat(l.getPropertyValue("height")),
		a = parseFloat(l.getPropertyValue("padding-top")),
		s = parseFloat(l.getPropertyValue("padding-bottom")),
		r = parseFloat(l.getPropertyValue("margin-top")),
		d = parseFloat(l.getPropertyValue("margin-bottom")),
		g = n / e,
		y = a / e,
		m = s / e,
		u = r / e,
		h = d / e;
	window.requestAnimationFrame(function l(x) {
		void 0 === p && (p = x);
		var f = x - p;
		i ? (t.style.height = g * f + "px", t.style.paddingTop = y * f + "px", t.style.paddingBottom = m * f + "px", t.style.marginTop = u * f + "px", t.style.marginBottom = h * f + "px") : (t.style.height = n - g * f + "px", t.style.paddingTop = a - y * f + "px", t.style.paddingBottom = s - m * f + "px", t.style.marginTop = r - u * f + "px", t.style.marginBottom = d - h * f + "px"), f >= e ? (t.style.height = "", t.style.paddingTop = "", t.style.paddingBottom = "", t.style.marginTop = "", t.style.marginBottom = "", t.style.overflow = "", i || (t.style.display = "none"), "function" == typeof o && o()) : window.requestAnimationFrame(l)
	})
}
var tns = function () {
	var t = window,
		Ai = t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.msRequestAnimationFrame || function (t) {
			return setTimeout(t, 16)
		},
		e = window,
		Ni = e.cancelAnimationFrame || e.mozCancelAnimationFrame || function (t) {
			clearTimeout(t)
		};

	function Li() {
		for (var t, e, n, i = arguments[0] || {}, a = 1, r = arguments.length; a < r; a++)
			if (null !== (t = arguments[a]))
				for (e in t) i !== (n = t[e]) && void 0 !== n && (i[e] = n);
		return i
	}

	function Bi(t) {
		return 0 <= ["true", "false"].indexOf(t) ? JSON.parse(t) : t
	}

	function Si(t, e, n, i) {
		if (i) try {
			t.setItem(e, n)
		} catch (t) {}
		return n
	}

	function Hi() {
		var t = document,
			e = t.body;
		return e || ((e = t.createElement("body")).fake = !0), e
	}
	var n = document.documentElement;

	function Oi(t) {
		var e = "";
		return t.fake && (e = n.style.overflow, t.style.background = "", t.style.overflow = n.style.overflow = "hidden", n.appendChild(t)), e
	}

	function Di(t, e) {
		t.fake && (t.remove(), n.style.overflow = e, n.offsetHeight)
	}

	function ki(t, e, n, i) {
		"insertRule" in t ? t.insertRule(e + "{" + n + "}", i) : t.addRule(e, n, i)
	}

	function Ri(t) {
		return ("insertRule" in t ? t.cssRules : t.rules).length
	}

	function Ii(t, e, n) {
		for (var i = 0, a = t.length; i < a; i++) e.call(n, t[i], i)
	}
	var i = "classList" in document.createElement("_"),
		Pi = i ? function (t, e) {
			return t.classList.contains(e)
		} : function (t, e) {
			return 0 <= t.className.indexOf(e)
		},
		zi = i ? function (t, e) {
			Pi(t, e) || t.classList.add(e)
		} : function (t, e) {
			Pi(t, e) || (t.className += " " + e)
		},
		Wi = i ? function (t, e) {
			Pi(t, e) && t.classList.remove(e)
		} : function (t, e) {
			Pi(t, e) && (t.className = t.className.replace(e, ""))
		};

	function qi(t, e) {
		return t.hasAttribute(e)
	}

	function Fi(t, e) {
		return t.getAttribute(e)
	}

	function r(t) {
		return void 0 !== t.item
	}

	function ji(t, e) {
		if (t = r(t) || t instanceof Array ? t : [t], "[object Object]" === Object.prototype.toString.call(e))
			for (var n = t.length; n--;)
				for (var i in e) t[n].setAttribute(i, e[i])
	}

	function Vi(t, e) {
		t = r(t) || t instanceof Array ? t : [t];
		for (var n = (e = e instanceof Array ? e : [e]).length, i = t.length; i--;)
			for (var a = n; a--;) t[i].removeAttribute(e[a])
	}

	function Gi(t) {
		for (var e = [], n = 0, i = t.length; n < i; n++) e.push(t[n]);
		return e
	}

	function Qi(t, e) {
		"none" !== t.style.display && (t.style.display = "none")
	}

	function Xi(t, e) {
		"none" === t.style.display && (t.style.display = "")
	}

	function Yi(t) {
		return "none" !== window.getComputedStyle(t).display
	}

	function Ki(e) {
		if ("string" == typeof e) {
			var n = [e],
				i = e.charAt(0).toUpperCase() + e.substr(1);
			["Webkit", "Moz", "ms", "O"].forEach(function (t) {
				"ms" === t && "transform" !== e || n.push(t + i)
			}), e = n
		}
		for (var t = document.createElement("fakeelement"), a = (e.length, 0); a < e.length; a++) {
			var r = e[a];
			if (void 0 !== t.style[r]) return r
		}
		return !1
	}

	function Ji(t, e) {
		var n = !1;
		return /^Webkit/.test(t) ? n = "webkit" + e + "End" : /^O/.test(t) ? n = "o" + e + "End" : t && (n = e.toLowerCase() + "end"), n
	}
	var a = !1;
	try {
		var o = Object.defineProperty({}, "passive", {
			get: function () {
				a = !0
			}
		});
		window.addEventListener("test", null, o)
	} catch (t) {}
	var u = !!a && {
		passive: !0
	};

	function Ui(t, e, n) {
		for (var i in e) {
			var a = 0 <= ["touchstart", "touchmove"].indexOf(i) && !n && u;
			t.addEventListener(i, e[i], a)
		}
	}

	function _i(t, e) {
		for (var n in e) {
			var i = 0 <= ["touchstart", "touchmove"].indexOf(n) && u;
			t.removeEventListener(n, e[n], i)
		}
	}

	function Zi() {
		return {
			topics: {},
			on: function (t, e) {
				this.topics[t] = this.topics[t] || [], this.topics[t].push(e)
			},
			off: function (t, e) {
				if (this.topics[t])
					for (var n = 0; n < this.topics[t].length; n++)
						if (this.topics[t][n] === e) {
							this.topics[t].splice(n, 1);
							break
						}
			},
			emit: function (e, n) {
				n.type = e, this.topics[e] && this.topics[e].forEach(function (t) {
					t(n, e)
				})
			}
		}
	}
	Object.keys || (Object.keys = function (t) {
		var e = [];
		for (var n in t) Object.prototype.hasOwnProperty.call(t, n) && e.push(n);
		return e
	}), "remove" in Element.prototype || (Element.prototype.remove = function () {
		this.parentNode && this.parentNode.removeChild(this)
	});
	var $i = function (H) {
		H = Li({
			container: ".slider",
			mode: "carousel",
			axis: "horizontal",
			items: 1,
			gutter: 0,
			edgePadding: 0,
			fixedWidth: !1,
			autoWidth: !1,
			viewportMax: !1,
			slideBy: 1,
			center: !1,
			controls: !0,
			controlsPosition: "top",
			controlsText: ["prev", "next"],
			controlsContainer: !1,
			prevButton: !1,
			nextButton: !1,
			nav: !0,
			navPosition: "top",
			navContainer: !1,
			navAsThumbnails: !1,
			arrowKeys: !1,
			speed: 300,
			autoplay: !1,
			autoplayPosition: "top",
			autoplayTimeout: 5e3,
			autoplayDirection: "forward",
			autoplayText: ["start", "stop"],
			autoplayHoverPause: !1,
			autoplayButton: !1,
			autoplayButtonOutput: !0,
			autoplayResetOnVisibility: !0,
			animateIn: "tns-fadeIn",
			animateOut: "tns-fadeOut",
			animateNormal: "tns-normal",
			animateDelay: !1,
			loop: !0,
			rewind: !1,
			autoHeight: !1,
			responsive: !1,
			lazyload: !1,
			lazyloadSelector: ".tns-lazy-img",
			touch: !0,
			mouseDrag: !1,
			swipeAngle: 15,
			nested: !1,
			preventActionWhenRunning: !1,
			preventScrollOnTouch: !1,
			freezable: !0,
			onInit: !1,
			useLocalStorage: !0,
			nonce: !1
		}, H || {});
		var O = document,
			m = window,
			a = {
				ENTER: 13,
				SPACE: 32,
				LEFT: 37,
				RIGHT: 39
			},
			e = {},
			n = H.useLocalStorage;
		if (n) {
			var t = navigator.userAgent,
				i = new Date;
			try {
				(e = m.localStorage) ? (e.setItem(i, i), n = e.getItem(i) == i, e.removeItem(i)) : n = !1, n || (e = {})
			} catch (t) {
				n = !1
			}
			n && (e.tnsApp && e.tnsApp !== t && ["tC", "tPL", "tMQ", "tTf", "t3D", "tTDu", "tTDe", "tADu", "tADe", "tTE", "tAE"].forEach(function (t) {
				e.removeItem(t)
			}), localStorage.tnsApp = t)
		}
		var y = e.tC ? Bi(e.tC) : Si(e, "tC", function () {
				var t = document,
					e = Hi(),
					n = Oi(e),
					i = t.createElement("div"),
					a = !1;
				e.appendChild(i);
				try {
					for (var r, o = "(10px * 10)", u = ["calc" + o, "-moz-calc" + o, "-webkit-calc" + o], l = 0; l < 3; l++)
						if (r = u[l], i.style.width = r, 100 === i.offsetWidth) {
							a = r.replace(o, "");
							break
						}
				} catch (t) {}
				return e.fake ? Di(e, n) : i.remove(), a
			}(), n),
			g = e.tPL ? Bi(e.tPL) : Si(e, "tPL", function () {
				var t, e = document,
					n = Hi(),
					i = Oi(n),
					a = e.createElement("div"),
					r = e.createElement("div"),
					o = "";
				a.className = "tns-t-subp2", r.className = "tns-t-ct";
				for (var u = 0; u < 70; u++) o += "<div></div>";
				return r.innerHTML = o, a.appendChild(r), n.appendChild(a), t = Math.abs(a.getBoundingClientRect().left - r.children[67].getBoundingClientRect().left) < 2, n.fake ? Di(n, i) : a.remove(), t
			}(), n),
			D = e.tMQ ? Bi(e.tMQ) : Si(e, "tMQ", function () {
				if (window.matchMedia || window.msMatchMedia) return !0;
				var t, e = document,
					n = Hi(),
					i = Oi(n),
					a = e.createElement("div"),
					r = e.createElement("style"),
					o = "@media all and (min-width:1px){.tns-mq-test{position:absolute}}";
				return r.type = "text/css", a.className = "tns-mq-test", n.appendChild(r), n.appendChild(a), r.styleSheet ? r.styleSheet.cssText = o : r.appendChild(e.createTextNode(o)), t = window.getComputedStyle ? window.getComputedStyle(a).position : a.currentStyle.position, n.fake ? Di(n, i) : a.remove(), "absolute" === t
			}(), n),
			r = e.tTf ? Bi(e.tTf) : Si(e, "tTf", Ki("transform"), n),
			o = e.t3D ? Bi(e.t3D) : Si(e, "t3D", function (t) {
				if (!t) return !1;
				if (!window.getComputedStyle) return !1;
				var e, n = document,
					i = Hi(),
					a = Oi(i),
					r = n.createElement("p"),
					o = 9 < t.length ? "-" + t.slice(0, -9).toLowerCase() + "-" : "";
				return o += "transform", i.insertBefore(r, null), r.style[t] = "translate3d(1px,1px,1px)", e = window.getComputedStyle(r).getPropertyValue(o), i.fake ? Di(i, a) : r.remove(), void 0 !== e && 0 < e.length && "none" !== e
			}(r), n),
			x = e.tTDu ? Bi(e.tTDu) : Si(e, "tTDu", Ki("transitionDuration"), n),
			u = e.tTDe ? Bi(e.tTDe) : Si(e, "tTDe", Ki("transitionDelay"), n),
			b = e.tADu ? Bi(e.tADu) : Si(e, "tADu", Ki("animationDuration"), n),
			l = e.tADe ? Bi(e.tADe) : Si(e, "tADe", Ki("animationDelay"), n),
			s = e.tTE ? Bi(e.tTE) : Si(e, "tTE", Ji(x, "Transition"), n),
			c = e.tAE ? Bi(e.tAE) : Si(e, "tAE", Ji(b, "Animation"), n),
			f = m.console && "function" == typeof m.console.warn,
			d = ["container", "controlsContainer", "prevButton", "nextButton", "navContainer", "autoplayButton"],
			v = {};
		if (d.forEach(function (t) {
				if ("string" == typeof H[t]) {
					var e = H[t],
						n = O.querySelector(e);
					if (v[t] = e, !n || !n.nodeName) return void(f && console.warn("Can't find", H[t]));
					H[t] = n
				}
			}), !(H.container.children.length < 1)) {
			var k = H.responsive,
				R = H.nested,
				I = "carousel" === H.mode;
			if (k) {
				0 in k && (H = Li(H, k[0]), delete k[0]);
				var p = {};
				for (var h in k) {
					var w = k[h];
					w = "number" == typeof w ? {
						items: w
					} : w, p[h] = w
				}
				k = p, p = null
			}
			if (I || function t(e) {
					for (var n in e) I || ("slideBy" === n && (e[n] = "page"), "edgePadding" === n && (e[n] = !1), "autoHeight" === n && (e[n] = !1)), "responsive" === n && t(e[n])
				}(H), !I) {
				H.axis = "horizontal", H.slideBy = "page", H.edgePadding = !1;
				var P = H.animateIn,
					z = H.animateOut,
					C = H.animateDelay,
					W = H.animateNormal
			}
			var M, q, F = "horizontal" === H.axis,
				T = O.createElement("div"),
				j = O.createElement("div"),
				V = H.container,
				E = V.parentNode,
				A = V.outerHTML,
				G = V.children,
				Q = G.length,
				X = rn(),
				Y = !1;
			k && En(), I && (V.className += " tns-vpfix");
			var N, L, B, S, K, J, U, _, Z, $ = H.autoWidth,
				tt = sn("fixedWidth"),
				et = sn("edgePadding"),
				nt = sn("gutter"),
				it = un(),
				at = sn("center"),
				rt = $ ? 1 : Math.floor(sn("items")),
				ot = sn("slideBy"),
				ut = H.viewportMax || H.fixedWidthViewportWidth,
				lt = sn("arrowKeys"),
				st = sn("speed"),
				ct = H.rewind,
				ft = !ct && H.loop,
				dt = sn("autoHeight"),
				vt = sn("controls"),
				pt = sn("controlsText"),
				ht = sn("nav"),
				mt = sn("touch"),
				yt = sn("mouseDrag"),
				gt = sn("autoplay"),
				xt = sn("autoplayTimeout"),
				bt = sn("autoplayText"),
				wt = sn("autoplayHoverPause"),
				Ct = sn("autoplayResetOnVisibility"),
				Mt = (U = null, _ = sn("nonce"), Z = document.createElement("style"), U && Z.setAttribute("media", U), _ && Z.setAttribute("nonce", _), document.querySelector("head").appendChild(Z), Z.sheet ? Z.sheet : Z.styleSheet),
				Tt = H.lazyload,
				Et = H.lazyloadSelector,
				At = [],
				Nt = ft ? (K = function () {
					{
						if ($ || tt && !ut) return Q - 1;
						var t = tt ? "fixedWidth" : "items",
							e = [];
						if ((tt || H[t] < Q) && e.push(H[t]), k)
							for (var n in k) {
								var i = k[n][t];
								i && (tt || i < Q) && e.push(i)
							}
						return e.length || e.push(0), Math.ceil(tt ? ut / Math.min.apply(null, e) : Math.max.apply(null, e))
					}
				}(), J = I ? Math.ceil((5 * K - Q) / 2) : 4 * K - Q, J = Math.max(K, J), ln("edgePadding") ? J + 1 : J) : 0,
				Lt = I ? Q + 2 * Nt : Q + Nt,
				Bt = !(!tt && !$ || ft),
				St = tt ? _n() : null,
				Ht = !I || !ft,
				Ot = F ? "left" : "top",
				Dt = "",
				kt = "",
				Rt = tt ? function () {
					return at && !ft ? Q - 1 : Math.ceil(-St / (tt + nt))
				} : $ ? function () {
					for (var t = 0; t < Lt; t++)
						if (N[t] >= -St) return t
				} : function () {
					return at && I && !ft ? Q - 1 : ft || I ? Math.max(0, Lt - Math.ceil(rt)) : Lt - 1
				},
				It = en(sn("startIndex")),
				Pt = It,
				zt = (tn(), 0),
				Wt = $ ? null : Rt(),
				qt = H.preventActionWhenRunning,
				Ft = H.swipeAngle,
				jt = !Ft || "?",
				Vt = !1,
				Gt = H.onInit,
				Qt = new Zi,
				Xt = " tns-slider tns-" + H.mode,
				Yt = V.id || (S = window.tnsId, window.tnsId = S ? S + 1 : 1, "tns" + window.tnsId),
				Kt = sn("disable"),
				Jt = !1,
				Ut = H.freezable,
				_t = !(!Ut || $) && Tn(),
				Zt = !1,
				$t = {
					click: oi,
					keydown: function (t) {
						t = pi(t);
						var e = [a.LEFT, a.RIGHT].indexOf(t.keyCode);
						0 <= e && (0 === e ? we.disabled || oi(t, -1) : Ce.disabled || oi(t, 1))
					}
				},
				te = {
					click: function (t) {
						if (Vt) {
							if (qt) return;
							ai()
						}
						var e = hi(t = pi(t));
						for (; e !== Ae && !qi(e, "data-nav");) e = e.parentNode;
						if (qi(e, "data-nav")) {
							var n = Se = Number(Fi(e, "data-nav")),
								i = tt || $ ? n * Q / Le : n * rt,
								a = le ? n : Math.min(Math.ceil(i), Q - 1);
							ri(a, t), He === n && (Pe && fi(), Se = -1)
						}
					},
					keydown: function (t) {
						t = pi(t);
						var e = O.activeElement;
						if (!qi(e, "data-nav")) return;
						var n = [a.LEFT, a.RIGHT, a.ENTER, a.SPACE].indexOf(t.keyCode),
							i = Number(Fi(e, "data-nav"));
						0 <= n && (0 === n ? 0 < i && vi(Ee[i - 1]) : 1 === n ? i < Le - 1 && vi(Ee[i + 1]) : ri(Se = i, t))
					}
				},
				ee = {
					mouseover: function () {
						Pe && (li(), ze = !0)
					},
					mouseout: function () {
						ze && (ui(), ze = !1)
					}
				},
				ne = {
					visibilitychange: function () {
						O.hidden ? Pe && (li(), qe = !0) : qe && (ui(), qe = !1)
					}
				},
				ie = {
					keydown: function (t) {
						t = pi(t);
						var e = [a.LEFT, a.RIGHT].indexOf(t.keyCode);
						0 <= e && oi(t, 0 === e ? -1 : 1)
					}
				},
				ae = {
					touchstart: xi,
					touchmove: bi,
					touchend: wi,
					touchcancel: wi
				},
				re = {
					mousedown: xi,
					mousemove: bi,
					mouseup: wi,
					mouseleave: wi
				},
				oe = ln("controls"),
				ue = ln("nav"),
				le = !!$ || H.navAsThumbnails,
				se = ln("autoplay"),
				ce = ln("touch"),
				fe = ln("mouseDrag"),
				de = "tns-slide-active",
				ve = "tns-slide-cloned",
				pe = "tns-complete",
				he = {
					load: function (t) {
						kn(hi(t))
					},
					error: function (t) {
						e = hi(t), zi(e, "failed"), Rn(e);
						var e
					}
				},
				me = "force" === H.preventScrollOnTouch;
			if (oe) var ye, ge, xe = H.controlsContainer,
				be = H.controlsContainer ? H.controlsContainer.outerHTML : "",
				we = H.prevButton,
				Ce = H.nextButton,
				Me = H.prevButton ? H.prevButton.outerHTML : "",
				Te = H.nextButton ? H.nextButton.outerHTML : "";
			if (ue) var Ee, Ae = H.navContainer,
				Ne = H.navContainer ? H.navContainer.outerHTML : "",
				Le = $ ? Q : Mi(),
				Be = 0,
				Se = -1,
				He = an(),
				Oe = He,
				De = "tns-nav-active",
				ke = "Carousel Page ",
				Re = " (Current Slide)";
			if (se) var Ie, Pe, ze, We, qe, Fe = "forward" === H.autoplayDirection ? 1 : -1,
				je = H.autoplayButton,
				Ve = H.autoplayButton ? H.autoplayButton.outerHTML : "",
				Ge = ["<span class='tns-visually-hidden'>", " animation</span>"];
			if (ce || fe) var Qe, Xe, Ye = {},
				Ke = {},
				Je = !1,
				Ue = F ? function (t, e) {
					return t.x - e.x
				} : function (t, e) {
					return t.y - e.y
				};
			$ || $e(Kt || _t), r && (Ot = r, Dt = "translate", o ? (Dt += F ? "3d(" : "3d(0px, ", kt = F ? ", 0px, 0px)" : ", 0px)") : (Dt += F ? "X(" : "Y(", kt = ")")), I && (V.className = V.className.replace("tns-vpfix", "")),
				function () {
					ln("gutter");
					T.className = "tns-outer", j.className = "tns-inner", T.id = Yt + "-ow", j.id = Yt + "-iw", "" === V.id && (V.id = Yt);
					Xt += g || $ ? " tns-subpixel" : " tns-no-subpixel", Xt += y ? " tns-calc" : " tns-no-calc", $ && (Xt += " tns-autowidth");
					Xt += " tns-" + H.axis, V.className += Xt, I ? ((M = O.createElement("div")).id = Yt + "-mw", M.className = "tns-ovh", T.appendChild(M), M.appendChild(j)) : T.appendChild(j);
					if (dt) {
						var t = M || j;
						t.className += " tns-ah"
					}
					if (E.insertBefore(T, V), j.appendChild(V), Ii(G, function (t, e) {
							zi(t, "tns-item"), t.id || (t.id = Yt + "-item" + e), !I && W && zi(t, W), ji(t, {
								"aria-hidden": "true",
								tabindex: "-1"
							})
						}), Nt) {
						for (var e = O.createDocumentFragment(), n = O.createDocumentFragment(), i = Nt; i--;) {
							var a = i % Q,
								r = G[a].cloneNode(!0);
							if (zi(r, ve), Vi(r, "id"), n.insertBefore(r, n.firstChild), I) {
								var o = G[Q - 1 - a].cloneNode(!0);
								zi(o, ve), Vi(o, "id"), e.appendChild(o)
							}
						}
						V.insertBefore(e, V.firstChild), V.appendChild(n), G = V.children
					}
				}(),
				function () {
					if (!I)
						for (var t = It, e = It + Math.min(Q, rt); t < e; t++) {
							var n = G[t];
							n.style.left = 100 * (t - It) / rt + "%", zi(n, P), Wi(n, W)
						}
					F && (g || $ ? (ki(Mt, "#" + Yt + " > .tns-item", "font-size:" + m.getComputedStyle(G[0]).fontSize + ";", Ri(Mt)), ki(Mt, "#" + Yt, "font-size:0;", Ri(Mt))) : I && Ii(G, function (t, e) {
						var n;
						t.style.marginLeft = (n = e, y ? y + "(" + 100 * n + "% / " + Lt + ")" : 100 * n / Lt + "%")
					}));
					if (D) {
						if (x) {
							var i = M && H.autoHeight ? hn(H.speed) : "";
							ki(Mt, "#" + Yt + "-mw", i, Ri(Mt))
						}
						i = cn(H.edgePadding, H.gutter, H.fixedWidth, H.speed, H.autoHeight), ki(Mt, "#" + Yt + "-iw", i, Ri(Mt)), I && (i = F && !$ ? "width:" + fn(H.fixedWidth, H.gutter, H.items) + ";" : "", x && (i += hn(st)), ki(Mt, "#" + Yt, i, Ri(Mt))), i = F && !$ ? dn(H.fixedWidth, H.gutter, H.items) : "", H.gutter && (i += vn(H.gutter)), I || (x && (i += hn(st)), b && (i += mn(st))), i && ki(Mt, "#" + Yt + " > .tns-item", i, Ri(Mt))
					} else {
						I && dt && (M.style[x] = st / 1e3 + "s"), j.style.cssText = cn(et, nt, tt, dt), I && F && !$ && (V.style.width = fn(tt, nt, rt));
						var i = F && !$ ? dn(tt, nt, rt) : "";
						nt && (i += vn(nt)), i && ki(Mt, "#" + Yt + " > .tns-item", i, Ri(Mt))
					}
					if (k && D)
						for (var a in k) {
							a = parseInt(a);
							var r = k[a],
								i = "",
								o = "",
								u = "",
								l = "",
								s = "",
								c = $ ? null : sn("items", a),
								f = sn("fixedWidth", a),
								d = sn("speed", a),
								v = sn("edgePadding", a),
								p = sn("autoHeight", a),
								h = sn("gutter", a);
							x && M && sn("autoHeight", a) && "speed" in r && (o = "#" + Yt + "-mw{" + hn(d) + "}"), ("edgePadding" in r || "gutter" in r) && (u = "#" + Yt + "-iw{" + cn(v, h, f, d, p) + "}"), I && F && !$ && ("fixedWidth" in r || "items" in r || tt && "gutter" in r) && (l = "width:" + fn(f, h, c) + ";"), x && "speed" in r && (l += hn(d)), l && (l = "#" + Yt + "{" + l + "}"), ("fixedWidth" in r || tt && "gutter" in r || !I && "items" in r) && (s += dn(f, h, c)), "gutter" in r && (s += vn(h)), !I && "speed" in r && (x && (s += hn(d)), b && (s += mn(d))), s && (s = "#" + Yt + " > .tns-item{" + s + "}"), (i = o + u + l + s) && Mt.insertRule("@media (min-width: " + a / 16 + "em) {" + i + "}", Mt.cssRules.length)
						}
				}(), yn();
			var _e = ft ? I ? function () {
					var t = zt,
						e = Wt;
					t += ot, e -= ot, et ? (t += 1, e -= 1) : tt && (it + nt) % (tt + nt) && (e -= 1), Nt && (e < It ? It -= Q : It < t && (It += Q))
				} : function () {
					if (Wt < It)
						for (; zt + Q <= It;) It -= Q;
					else if (It < zt)
						for (; It <= Wt - Q;) It += Q
				} : function () {
					It = Math.max(zt, Math.min(Wt, It))
				},
				Ze = I ? function () {
					var e, n, i, a, t, r, o, u, l, s, c;
					Jn(V, ""), x || !st ? (ti(), st && Yi(V) || ai()) : (e = V, n = Ot, i = Dt, a = kt, t = Zn(), r = st, o = ai, u = Math.min(r, 10), l = 0 <= t.indexOf("%") ? "%" : "px", t = t.replace(l, ""), s = Number(e.style[n].replace(i, "").replace(a, "").replace(l, "")), c = (t - s) / r * u, setTimeout(function t() {
						r -= u, s += c, e.style[n] = i + s + l + a, 0 < r ? setTimeout(t, u) : o()
					}, u)), F || Ci()
				} : function () {
					At = [];
					var t = {};
					t[s] = t[c] = ai, _i(G[Pt], t), Ui(G[It], t), ei(Pt, P, z, !0), ei(It, W, P), s && c && st && Yi(V) || ai()
				};
			return {
				version: "2.9.3",
				getInfo: Ei,
				events: Qt,
				goTo: ri,
				play: function () {
					gt && !Pe && (ci(), We = !1)
				},
				pause: function () {
					Pe && (fi(), We = !0)
				},
				isOn: Y,
				updateSliderHeight: Fn,
				refresh: yn,
				destroy: function () {
					if (Mt.disabled = !0, Mt.ownerNode && Mt.ownerNode.remove(), _i(m, {
							resize: Cn
						}), lt && _i(O, ie), xe && _i(xe, $t), Ae && _i(Ae, te), _i(V, ee), _i(V, ne), je && _i(je, {
							click: di
						}), gt && clearInterval(Ie), I && s) {
						var t = {};
						t[s] = ai, _i(V, t)
					}
					mt && _i(V, ae), yt && _i(V, re);
					var r = [A, be, Me, Te, Ne, Ve];
					for (var e in d.forEach(function (t, e) {
							var n = "container" === t ? T : H[t];
							if ("object" == typeof n && n) {
								var i = !!n.previousElementSibling && n.previousElementSibling,
									a = n.parentNode;
								n.outerHTML = r[e], H[t] = i ? i.nextElementSibling : a.firstElementChild
							}
						}), d = P = z = C = W = F = T = j = V = E = A = G = Q = q = X = $ = tt = et = nt = it = rt = ot = ut = lt = st = ct = ft = dt = Mt = Tt = N = At = Nt = Lt = Bt = St = Ht = Ot = Dt = kt = Rt = It = Pt = zt = Wt = Ft = jt = Vt = Gt = Qt = Xt = Yt = Kt = Jt = Ut = _t = Zt = $t = te = ee = ne = ie = ae = re = oe = ue = le = se = ce = fe = de = pe = he = L = vt = pt = xe = be = we = Ce = ye = ge = ht = Ae = Ne = Ee = Le = Be = Se = He = Oe = De = ke = Re = gt = xt = Fe = bt = wt = je = Ve = Ct = Ge = Ie = Pe = ze = We = qe = Ye = Ke = Qe = Je = Xe = Ue = mt = yt = null, this) "rebuild" !== e && (this[e] = null);
					Y = !1
				},
				rebuild: function () {
					return $i(Li(H, v))
				}
			}
		}

		function $e(t) {
			t && (vt = ht = mt = yt = lt = gt = wt = Ct = !1)
		}

		function tn() {
			for (var t = I ? It - Nt : It; t < 0;) t += Q;
			return t % Q + 1
		}

		function en(t) {
			return t = t ? Math.max(0, Math.min(ft ? Q - 1 : Q - rt, t)) : 0, I ? t + Nt : t
		}

		function nn(t) {
			for (null == t && (t = It), I && (t -= Nt); t < 0;) t += Q;
			return Math.floor(t % Q)
		}

		function an() {
			var t, e = nn();
			return t = le ? e : tt || $ ? Math.ceil((e + 1) * Le / Q - 1) : Math.floor(e / rt), !ft && I && It === Wt && (t = Le - 1), t
		}

		function rn() {
			return m.innerWidth || O.documentElement.clientWidth || O.body.clientWidth
		}

		function on(t) {
			return "top" === t ? "afterbegin" : "beforeend"
		}

		function un() {
			var t = et ? 2 * et - nt : 0;
			return function t(e) {
				if (null != e) {
					var n, i, a = O.createElement("div");
					return e.appendChild(a), i = (n = a.getBoundingClientRect()).right - n.left, a.remove(), i || t(e.parentNode)
				}
			}(E) - t
		}

		function ln(t) {
			if (H[t]) return !0;
			if (k)
				for (var e in k)
					if (k[e][t]) return !0;
			return !1
		}

		function sn(t, e) {
			if (null == e && (e = X), "items" === t && tt) return Math.floor((it + nt) / (tt + nt)) || 1;
			var n = H[t];
			if (k)
				for (var i in k) e >= parseInt(i) && t in k[i] && (n = k[i][t]);
			return "slideBy" === t && "page" === n && (n = sn("items")), I || "slideBy" !== t && "items" !== t || (n = Math.floor(n)), n
		}

		function cn(t, e, n, i, a) {
			var r = "";
			if (void 0 !== t) {
				var o = t;
				e && (o -= e), r = F ? "margin: 0 " + o + "px 0 " + t + "px;" : "margin: " + t + "px 0 " + o + "px 0;"
			} else if (e && !n) {
				var u = "-" + e + "px";
				r = "margin: 0 " + (F ? u + " 0 0" : "0 " + u + " 0") + ";"
			}
			return !I && a && x && i && (r += hn(i)), r
		}

		function fn(t, e, n) {
			return t ? (t + e) * Lt + "px" : y ? y + "(" + 100 * Lt + "% / " + n + ")" : 100 * Lt / n + "%"
		}

		function dn(t, e, n) {
			var i;
			if (t) i = t + e + "px";
			else {
				I || (n = Math.floor(n));
				var a = I ? Lt : n;
				i = y ? y + "(100% / " + a + ")" : 100 / a + "%"
			}
			return i = "width:" + i, "inner" !== R ? i + ";" : i + " !important;"
		}

		function vn(t) {
			var e = "";
			!1 !== t && (e = (F ? "padding-" : "margin-") + (F ? "right" : "bottom") + ": " + t + "px;");
			return e
		}

		function pn(t, e) {
			var n = t.substring(0, t.length - e).toLowerCase();
			return n && (n = "-" + n + "-"), n
		}

		function hn(t) {
			return pn(x, 18) + "transition-duration:" + t / 1e3 + "s;"
		}

		function mn(t) {
			return pn(b, 17) + "animation-duration:" + t / 1e3 + "s;"
		}

		function yn() {
			if (ln("autoHeight") || $ || !F) {
				var t = V.querySelectorAll("img");
				Ii(t, function (t) {
					var e = t.src;
					Tt || (e && e.indexOf("data:image") < 0 ? (t.src = "", Ui(t, he), zi(t, "loading"), t.src = e) : kn(t))
				}), Ai(function () {
					zn(Gi(t), function () {
						L = !0
					})
				}), ln("autoHeight") && (t = In(It, Math.min(It + rt - 1, Lt - 1))), Tt ? gn() : Ai(function () {
					zn(Gi(t), gn)
				})
			} else I && $n(), bn(), wn()
		}

		function gn() {
			if ($ && 1 < Q) {
				var i = ft ? It : Q - 1;
				! function t() {
					var e = G[i].getBoundingClientRect().left,
						n = G[i - 1].getBoundingClientRect().right;
					Math.abs(e - n) <= 1 ? xn() : setTimeout(function () {
						t()
					}, 16)
				}()
			} else xn()
		}

		function xn() {
			F && !$ || (jn(), $ ? (St = _n(), Ut && (_t = Tn()), Wt = Rt(), $e(Kt || _t)) : Ci()), I && $n(), bn(), wn()
		}

		function bn() {
			if (Vn(), T.insertAdjacentHTML("afterbegin", '<div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">' + Hn() + "</span>  of " + Q + "</div>"), B = T.querySelector(".tns-liveregion .current"), se) {
				var t = gt ? "stop" : "start";
				je ? ji(je, {
					"data-action": t
				}) : H.autoplayButtonOutput && (T.insertAdjacentHTML(on(H.autoplayPosition), '<button type="button" data-action="' + t + '">' + Ge[0] + t + Ge[1] + bt[0] + "</button>"), je = T.querySelector("[data-action]")), je && Ui(je, {
					click: di
				}), gt && (ci(), wt && Ui(V, ee), Ct && Ui(V, ne))
			}
			if (ue) {
				if (Ae) ji(Ae, {
					"aria-label": "Carousel Pagination"
				}), Ii(Ee = Ae.children, function (t, e) {
					ji(t, {
						"data-nav": e,
						tabindex: "-1",
						"aria-label": ke + (e + 1),
						"aria-controls": Yt
					})
				});
				else {
					for (var e = "", n = le ? "" : 'style="display:none"', i = 0; i < Q; i++) e += '<button type="button" data-nav="' + i + '" tabindex="-1" aria-controls="' + Yt + '" ' + n + ' aria-label="' + ke + (i + 1) + '"></button>';
					e = '<div class="tns-nav" aria-label="Carousel Pagination">' + e + "</div>", T.insertAdjacentHTML(on(H.navPosition), e), Ae = T.querySelector(".tns-nav"), Ee = Ae.children
				}
				if (Ti(), x) {
					var a = x.substring(0, x.length - 18).toLowerCase(),
						r = "transition: all " + st / 1e3 + "s";
					a && (r = "-" + a + "-" + r), ki(Mt, "[aria-controls^=" + Yt + "-item]", r, Ri(Mt))
				}
				ji(Ee[He], {
					"aria-label": ke + (He + 1) + Re
				}), Vi(Ee[He], "tabindex"), zi(Ee[He], De), Ui(Ae, te)
			}
			oe && (xe || we && Ce || (T.insertAdjacentHTML(on(H.controlsPosition), '<div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button" data-controls="prev" tabindex="-1" aria-controls="' + Yt + '">' + pt[0] + '</button><button type="button" data-controls="next" tabindex="-1" aria-controls="' + Yt + '">' + pt[1] + "</button></div>"), xe = T.querySelector(".tns-controls")), we && Ce || (we = xe.children[0], Ce = xe.children[1]), H.controlsContainer && ji(xe, {
				"aria-label": "Carousel Navigation",
				tabindex: "0"
			}), (H.controlsContainer || H.prevButton && H.nextButton) && ji([we, Ce], {
				"aria-controls": Yt,
				tabindex: "-1"
			}), (H.controlsContainer || H.prevButton && H.nextButton) && (ji(we, {
				"data-controls": "prev"
			}), ji(Ce, {
				"data-controls": "next"
			})), ye = Qn(we), ge = Qn(Ce), Kn(), xe ? Ui(xe, $t) : (Ui(we, $t), Ui(Ce, $t))), An()
		}

		function wn() {
			if (I && s) {
				var t = {};
				t[s] = ai, Ui(V, t)
			}
			mt && Ui(V, ae, H.preventScrollOnTouch), yt && Ui(V, re), lt && Ui(O, ie), "inner" === R ? Qt.on("outerResized", function () {
				Mn(), Qt.emit("innerLoaded", Ei())
			}) : (k || tt || $ || dt || !F) && Ui(m, {
				resize: Cn
			}), dt && ("outer" === R ? Qt.on("innerLoaded", Pn) : Kt || Pn()), Dn(), Kt ? Bn() : _t && Ln(), Qt.on("indexChanged", Wn), "inner" === R && Qt.emit("innerLoaded", Ei()), "function" == typeof Gt && Gt(Ei()), Y = !0
		}

		function Cn(t) {
			Ai(function () {
				Mn(pi(t))
			})
		}

		function Mn(t) {
			if (Y) {
				"outer" === R && Qt.emit("outerResized", Ei(t)), X = rn();
				var e, n = q,
					i = !1;
				k && (En(), (e = n !== q) && Qt.emit("newBreakpointStart", Ei(t)));
				var a, r, o, u, l = rt,
					s = Kt,
					c = _t,
					f = lt,
					d = vt,
					v = ht,
					p = mt,
					h = yt,
					m = gt,
					y = wt,
					g = Ct,
					x = It;
				if (e) {
					var b = tt,
						w = dt,
						C = pt,
						M = at,
						T = bt;
					if (!D) var E = nt,
						A = et
				}
				if (lt = sn("arrowKeys"), vt = sn("controls"), ht = sn("nav"), mt = sn("touch"), at = sn("center"), yt = sn("mouseDrag"), gt = sn("autoplay"), wt = sn("autoplayHoverPause"), Ct = sn("autoplayResetOnVisibility"), e && (Kt = sn("disable"), tt = sn("fixedWidth"), st = sn("speed"), dt = sn("autoHeight"), pt = sn("controlsText"), bt = sn("autoplayText"), xt = sn("autoplayTimeout"), D || (et = sn("edgePadding"), nt = sn("gutter"))), $e(Kt), it = un(), F && !$ || Kt || (jn(), F || (Ci(), i = !0)), (tt || $) && (St = _n(), Wt = Rt()), (e || tt) && (rt = sn("items"), ot = sn("slideBy"), (r = rt !== l) && (tt || $ || (Wt = Rt()), _e())), e && Kt !== s && (Kt ? Bn() : function () {
						if (!Jt) return;
						if (Mt.disabled = !1, V.className += Xt, $n(), ft)
							for (var t = Nt; t--;) I && Xi(G[t]), Xi(G[Lt - t - 1]);
						if (!I)
							for (var e = It, n = It + Q; e < n; e++) {
								var i = G[e],
									a = e < It + rt ? P : W;
								i.style.left = 100 * (e - It) / rt + "%", zi(i, a)
							}
						Nn(), Jt = !1
					}()), Ut && (e || tt || $) && (_t = Tn()) !== c && (_t ? (ti(Zn(en(0))), Ln()) : (! function () {
						if (!Zt) return;
						et && D && (j.style.margin = "");
						if (Nt)
							for (var t = "tns-transparent", e = Nt; e--;) I && Wi(G[e], t), Wi(G[Lt - e - 1], t);
						Nn(), Zt = !1
					}(), i = !0)), $e(Kt || _t), gt || (wt = Ct = !1), lt !== f && (lt ? Ui(O, ie) : _i(O, ie)), vt !== d && (vt ? xe ? Xi(xe) : (we && Xi(we), Ce && Xi(Ce)) : xe ? Qi(xe) : (we && Qi(we), Ce && Qi(Ce))), ht !== v && (ht ? (Xi(Ae), Ti()) : Qi(Ae)), mt !== p && (mt ? Ui(V, ae, H.preventScrollOnTouch) : _i(V, ae)), yt !== h && (yt ? Ui(V, re) : _i(V, re)), gt !== m && (gt ? (je && Xi(je), Pe || We || ci()) : (je && Qi(je), Pe && fi())), wt !== y && (wt ? Ui(V, ee) : _i(V, ee)), Ct !== g && (Ct ? Ui(O, ne) : _i(O, ne)), e) {
					if (tt === b && at === M || (i = !0), dt !== w && (dt || (j.style.height = "")), vt && pt !== C && (we.innerHTML = pt[0], Ce.innerHTML = pt[1]), je && bt !== T) {
						var N = gt ? 1 : 0,
							L = je.innerHTML,
							B = L.length - T[N].length;
						L.substring(B) === T[N] && (je.innerHTML = L.substring(0, B) + bt[N])
					}
				} else at && (tt || $) && (i = !0);
				if ((r || tt && !$) && (Le = Mi(), Ti()), (a = It !== x) ? (Qt.emit("indexChanged", Ei()), i = !0) : r ? a || Wn() : (tt || $) && (Dn(), Vn(), Sn()), r && !I && function () {
						for (var t = It + Math.min(Q, rt), e = Lt; e--;) {
							var n = G[e];
							It <= e && e < t ? (zi(n, "tns-moving"), n.style.left = 100 * (e - It) / rt + "%", zi(n, P), Wi(n, W)) : n.style.left && (n.style.left = "", zi(n, W), Wi(n, P)), Wi(n, z)
						}
						setTimeout(function () {
							Ii(G, function (t) {
								Wi(t, "tns-moving")
							})
						}, 300)
					}(), !Kt && !_t) {
					if (e && !D && (et === A && nt === E || (j.style.cssText = cn(et, nt, tt, st, dt)), F)) {
						I && (V.style.width = fn(tt, nt, rt));
						var S = dn(tt, nt, rt) + vn(nt);
						u = Ri(o = Mt) - 1, "deleteRule" in o ? o.deleteRule(u) : o.removeRule(u), ki(Mt, "#" + Yt + " > .tns-item", S, Ri(Mt))
					}
					dt && Pn(), i && ($n(), Pt = It)
				}
				e && Qt.emit("newBreakpointEnd", Ei(t))
			}
		}

		function Tn() {
			if (!tt && !$) return Q <= (at ? rt - (rt - 1) / 2 : rt);
			var t = tt ? (tt + nt) * Q : N[Q],
				e = et ? it + 2 * et : it + nt;
			return at && (e -= tt ? (it - tt) / 2 : (it - (N[It + 1] - N[It] - nt)) / 2), t <= e
		}

		function En() {
			for (var t in q = 0, k)(t = parseInt(t)) <= X && (q = t)
		}

		function An() {
			!gt && je && Qi(je), !ht && Ae && Qi(Ae), vt || (xe ? Qi(xe) : (we && Qi(we), Ce && Qi(Ce)))
		}

		function Nn() {
			gt && je && Xi(je), ht && Ae && Xi(Ae), vt && (xe ? Xi(xe) : (we && Xi(we), Ce && Xi(Ce)))
		}

		function Ln() {
			if (!Zt) {
				if (et && (j.style.margin = "0px"), Nt)
					for (var t = "tns-transparent", e = Nt; e--;) I && zi(G[e], t), zi(G[Lt - e - 1], t);
				An(), Zt = !0
			}
		}

		function Bn() {
			if (!Jt) {
				if (Mt.disabled = !0, V.className = V.className.replace(Xt.substring(1), ""), Vi(V, ["style"]), ft)
					for (var t = Nt; t--;) I && Qi(G[t]), Qi(G[Lt - t - 1]);
				if (F && I || Vi(j, ["style"]), !I)
					for (var e = It, n = It + Q; e < n; e++) {
						var i = G[e];
						Vi(i, ["style"]), Wi(i, P), Wi(i, W)
					}
				An(), Jt = !0
			}
		}

		function Sn() {
			var t = Hn();
			B.innerHTML !== t && (B.innerHTML = t)
		}

		function Hn() {
			var t = On(),
				e = t[0] + 1,
				n = t[1] + 1;
			return e === n ? e + "" : e + " to " + n
		}

		function On(t) {
			null == t && (t = Zn());
			var n, i, a, r = It;
			if (at || et ? ($ || tt) && (i = -(parseFloat(t) + et), a = i + it + 2 * et) : $ && (i = N[It], a = i + it), $) N.forEach(function (t, e) {
				e < Lt && ((at || et) && t <= i + .5 && (r = e), .5 <= a - t && (n = e))
			});
			else {
				if (tt) {
					var e = tt + nt;
					at || et ? (r = Math.floor(i / e), n = Math.ceil(a / e - 1)) : n = r + Math.ceil(it / e) - 1
				} else if (at || et) {
					var o = rt - 1;
					if (at ? (r -= o / 2, n = It + o / 2) : n = It + o, et) {
						var u = et * rt / it;
						r -= u, n += u
					}
					r = Math.floor(r), n = Math.ceil(n)
				} else n = r + rt - 1;
				r = Math.max(r, 0), n = Math.min(n, Lt - 1)
			}
			return [r, n]
		}

		function Dn() {
			if (Tt && !Kt) {
				var t = On();
				t.push(Et), In.apply(null, t).forEach(function (t) {
					if (!Pi(t, pe)) {
						var e = {};
						e[s] = function (t) {
							t.stopPropagation()
						}, Ui(t, e), Ui(t, he), t.src = Fi(t, "data-src");
						var n = Fi(t, "data-srcset");
						n && (t.srcset = n), zi(t, "loading")
					}
				})
			}
		}

		function kn(t) {
			zi(t, "loaded"), Rn(t)
		}

		function Rn(t) {
			zi(t, pe), Wi(t, "loading"), _i(t, he)
		}

		function In(t, e, n) {
			var i = [];
			for (n || (n = "img"); t <= e;) Ii(G[t].querySelectorAll(n), function (t) {
				i.push(t)
			}), t++;
			return i
		}

		function Pn() {
			var t = In.apply(null, On());
			Ai(function () {
				zn(t, Fn)
			})
		}

		function zn(n, t) {
			return L ? t() : (n.forEach(function (t, e) {
				!Tt && t.complete && Rn(t), Pi(t, pe) && n.splice(e, 1)
			}), n.length ? void Ai(function () {
				zn(n, t)
			}) : t())
		}

		function Wn() {
			Dn(), Vn(), Sn(), Kn(),
				function () {
					if (ht && (He = 0 <= Se ? Se : an(), Se = -1, He !== Oe)) {
						var t = Ee[Oe],
							e = Ee[He];
						ji(t, {
							tabindex: "-1",
							"aria-label": ke + (Oe + 1)
						}), Wi(t, De), ji(e, {
							"aria-label": ke + (He + 1) + Re
						}), Vi(e, "tabindex"), zi(e, De), Oe = He
					}
				}()
		}

		function qn(t, e) {
			for (var n = [], i = t, a = Math.min(t + e, Lt); i < a; i++) n.push(G[i].offsetHeight);
			return Math.max.apply(null, n)
		}

		function Fn() {
			var t = dt ? qn(It, rt) : qn(Nt, Q),
				e = M || j;
			e.style.height !== t && (e.style.height = t + "px")
		}

		function jn() {
			N = [0];
			var n = F ? "left" : "top",
				i = F ? "right" : "bottom",
				a = G[0].getBoundingClientRect()[n];
			Ii(G, function (t, e) {
				e && N.push(t.getBoundingClientRect()[n] - a), e === Lt - 1 && N.push(t.getBoundingClientRect()[i] - a)
			})
		}

		function Vn() {
			var t = On(),
				n = t[0],
				i = t[1];
			Ii(G, function (t, e) {
				n <= e && e <= i ? qi(t, "aria-hidden") && (Vi(t, ["aria-hidden", "tabindex"]), zi(t, de)) : qi(t, "aria-hidden") || (ji(t, {
					"aria-hidden": "true",
					tabindex: "-1"
				}), Wi(t, de))
			})
		}

		function Gn(t) {
			return t.nodeName.toLowerCase()
		}

		function Qn(t) {
			return "button" === Gn(t)
		}

		function Xn(t) {
			return "true" === t.getAttribute("aria-disabled")
		}

		function Yn(t, e, n) {
			t ? e.disabled = n : e.setAttribute("aria-disabled", n.toString())
		}

		function Kn() {
			if (vt && !ct && !ft) {
				var t = ye ? we.disabled : Xn(we),
					e = ge ? Ce.disabled : Xn(Ce),
					n = It <= zt,
					i = !ct && Wt <= It;
				n && !t && Yn(ye, we, !0), !n && t && Yn(ye, we, !1), i && !e && Yn(ge, Ce, !0), !i && e && Yn(ge, Ce, !1)
			}
		}

		function Jn(t, e) {
			x && (t.style[x] = e)
		}

		function Un(t) {
			return null == t && (t = It), $ ? (it - (et ? nt : 0) - (N[t + 1] - N[t] - nt)) / 2 : tt ? (it - tt) / 2 : (rt - 1) / 2
		}

		function _n() {
			var t = it + (et ? nt : 0) - (tt ? (tt + nt) * Lt : N[Lt]);
			return at && !ft && (t = tt ? -(tt + nt) * (Lt - 1) - Un() : Un(Lt - 1) - N[Lt - 1]), 0 < t && (t = 0), t
		}

		function Zn(t) {
			var e;
			if (null == t && (t = It), F && !$)
				if (tt) e = -(tt + nt) * t, at && (e += Un());
				else {
					var n = r ? Lt : rt;
					at && (t -= Un()), e = 100 * -t / n
				}
			else e = -N[t], at && $ && (e += Un());
			return Bt && (e = Math.max(e, St)), e += !F || $ || tt ? "px" : "%"
		}

		function $n(t) {
			Jn(V, "0s"), ti(t)
		}

		function ti(t) {
			null == t && (t = Zn()), V.style[Ot] = Dt + t + kt
		}

		function ei(t, e, n, i) {
			var a = t + rt;
			ft || (a = Math.min(a, Lt));
			for (var r = t; r < a; r++) {
				var o = G[r];
				i || (o.style.left = 100 * (r - It) / rt + "%"), C && u && (o.style[u] = o.style[l] = C * (r - t) / 1e3 + "s"), Wi(o, e), zi(o, n), i && At.push(o)
			}
		}

		function ni(t, e) {
			Ht && _e(), (It !== Pt || e) && (Qt.emit("indexChanged", Ei()), Qt.emit("transitionStart", Ei()), dt && Pn(), Pe && t && 0 <= ["click", "keydown"].indexOf(t.type) && fi(), Vt = !0, Ze())
		}

		function ii(t) {
			return t.toLowerCase().replace(/-/g, "")
		}

		function ai(t) {
			if (I || Vt) {
				if (Qt.emit("transitionEnd", Ei(t)), !I && 0 < At.length)
					for (var e = 0; e < At.length; e++) {
						var n = At[e];
						n.style.left = "", l && u && (n.style[l] = "", n.style[u] = ""), Wi(n, z), zi(n, W)
					}
				if (!t || !I && t.target.parentNode === V || t.target === V && ii(t.propertyName) === ii(Ot)) {
					if (!Ht) {
						var i = It;
						_e(), It !== i && (Qt.emit("indexChanged", Ei()), $n())
					}
					"inner" === R && Qt.emit("innerLoaded", Ei()), Vt = !1, Pt = It
				}
			}
		}

		function ri(t, e) {
			if (!_t)
				if ("prev" === t) oi(e, -1);
				else if ("next" === t) oi(e, 1);
			else {
				if (Vt) {
					if (qt) return;
					ai()
				}
				var n = nn(),
					i = 0;
				if ("first" === t ? i = -n : "last" === t ? i = I ? Q - rt - n : Q - 1 - n : ("number" != typeof t && (t = parseInt(t)), isNaN(t) || (e || (t = Math.max(0, Math.min(Q - 1, t))), i = t - n)), !I && i && Math.abs(i) < rt) {
					var a = 0 < i ? 1 : -1;
					i += zt <= It + i - Q ? Q * a : 2 * Q * a * -1
				}
				It += i, I && ft && (It < zt && (It += Q), Wt < It && (It -= Q)), nn(It) !== nn(Pt) && ni(e)
			}
		}

		function oi(t, e) {
			if (Vt) {
				if (qt) return;
				ai()
			}
			var n;
			if (!e) {
				for (var i = hi(t = pi(t)); i !== xe && [we, Ce].indexOf(i) < 0;) i = i.parentNode;
				var a = [we, Ce].indexOf(i);
				0 <= a && (n = !0, e = 0 === a ? -1 : 1)
			}
			if (ct) {
				if (It === zt && -1 === e) return void ri("last", t);
				if (It === Wt && 1 === e) return void ri("first", t)
			}
			e && (It += ot * e, $ && (It = Math.floor(It)), ni(n || t && "keydown" === t.type ? t : null))
		}

		function ui() {
			Ie = setInterval(function () {
				oi(null, Fe)
			}, xt), Pe = !0
		}

		function li() {
			clearInterval(Ie), Pe = !1
		}

		function si(t, e) {
			ji(je, {
				"data-action": t
			}), je.innerHTML = Ge[0] + t + Ge[1] + e
		}

		function ci() {
			ui(), je && si("stop", bt[1])
		}

		function fi() {
			li(), je && si("start", bt[0])
		}

		function di() {
			Pe ? (fi(), We = !0) : (ci(), We = !1)
		}

		function vi(t) {
			t.focus()
		}

		function pi(t) {
			return mi(t = t || m.event) ? t.changedTouches[0] : t
		}

		function hi(t) {
			return t.target || m.event.srcElement
		}

		function mi(t) {
			return 0 <= t.type.indexOf("touch")
		}

		function yi(t) {
			t.preventDefault ? t.preventDefault() : t.returnValue = !1
		}

		function gi() {
			return a = Ke.y - Ye.y, r = Ke.x - Ye.x, t = Math.atan2(a, r) * (180 / Math.PI), e = Ft, n = !1, i = Math.abs(90 - Math.abs(t)), 90 - e <= i ? n = "horizontal" : i <= e && (n = "vertical"), n === H.axis;
			var t, e, n, i, a, r
		}

		function xi(t) {
			if (Vt) {
				if (qt) return;
				ai()
			}
			gt && Pe && li(), Je = !0, Xe && (Ni(Xe), Xe = null);
			var e = pi(t);
			Qt.emit(mi(t) ? "touchStart" : "dragStart", Ei(t)), !mi(t) && 0 <= ["img", "a"].indexOf(Gn(hi(t))) && yi(t), Ke.x = Ye.x = e.clientX, Ke.y = Ye.y = e.clientY, I && (Qe = parseFloat(V.style[Ot].replace(Dt, "")), Jn(V, "0s"))
		}

		function bi(t) {
			if (Je) {
				var e = pi(t);
				Ke.x = e.clientX, Ke.y = e.clientY, I ? Xe || (Xe = Ai(function () {
					! function t(e) {
						if (!jt) return void(Je = !1);
						Ni(Xe);
						Je && (Xe = Ai(function () {
							t(e)
						}));
						"?" === jt && (jt = gi());
						if (jt) {
							!me && mi(e) && (me = !0);
							try {
								e.type && Qt.emit(mi(e) ? "touchMove" : "dragMove", Ei(e))
							} catch (t) {}
							var n = Qe,
								i = Ue(Ke, Ye);
							if (!F || tt || $) n += i, n += "px";
							else {
								var a = r ? i * rt * 100 / ((it + nt) * Lt) : 100 * i / (it + nt);
								n += a, n += "%"
							}
							V.style[Ot] = Dt + n + kt
						}
					}(t)
				})) : ("?" === jt && (jt = gi()), jt && (me = !0)), ("boolean" != typeof t.cancelable || t.cancelable) && me && t.preventDefault()
			}
		}

		function wi(i) {
			if (Je) {
				Xe && (Ni(Xe), Xe = null), I && Jn(V, ""), Je = !1;
				var t = pi(i);
				Ke.x = t.clientX, Ke.y = t.clientY;
				var a = Ue(Ke, Ye);
				if (Math.abs(a)) {
					if (!mi(i)) {
						var n = hi(i);
						Ui(n, {
							click: function t(e) {
								yi(e), _i(n, {
									click: t
								})
							}
						})
					}
					I ? Xe = Ai(function () {
						if (F && !$) {
							var t = -a * rt / (it + nt);
							t = 0 < a ? Math.floor(t) : Math.ceil(t), It += t
						} else {
							var e = -(Qe + a);
							if (e <= 0) It = zt;
							else if (e >= N[Lt - 1]) It = Wt;
							else
								for (var n = 0; n < Lt && e >= N[n];) e > N[It = n] && a < 0 && (It += 1), n++
						}
						ni(i, a), Qt.emit(mi(i) ? "touchEnd" : "dragEnd", Ei(i))
					}) : jt && oi(i, 0 < a ? -1 : 1)
				}
			}
			"auto" === H.preventScrollOnTouch && (me = !1), Ft && (jt = "?"), gt && !Pe && ui()
		}

		function Ci() {
			(M || j).style.height = N[It + rt] - N[It] + "px"
		}

		function Mi() {
			var t = tt ? (tt + nt) * Q / it : Q / rt;
			return Math.min(Math.ceil(t), Q)
		}

		function Ti() {
			if (ht && !le && Le !== Be) {
				var t = Be,
					e = Le,
					n = Xi;
				for (Le < Be && (t = Le, e = Be, n = Qi); t < e;) n(Ee[t]), t++;
				Be = Le
			}
		}

		function Ei(t) {
			return {
				container: V,
				slideItems: G,
				navContainer: Ae,
				navItems: Ee,
				controlsContainer: xe,
				hasControls: oe,
				prevButton: we,
				nextButton: Ce,
				items: rt,
				slideBy: ot,
				cloneCount: Nt,
				slideCount: Q,
				slideCountNew: Lt,
				index: It,
				indexCached: Pt,
				displayIndex: tn(),
				navCurrentIndex: He,
				navCurrentIndexCached: Oe,
				pages: Le,
				pagesCached: Be,
				sheet: Mt,
				isOn: Y,
				event: t || {}
			}
		}
		f && console.warn("No slides found in", H.container)
	};
	return $i
}();
//# sourceMappingURL=../sourcemaps/tiny-slider.js.map

! function (e, t) {
	"object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.counterUp = t() : e.counterUp = t()
}(self, (function () {
	return (() => {
		"use strict";
		var e = {
				d: (t, n) => {
					for (var o in n) e.o(n, o) && !e.o(t, o) && Object.defineProperty(t, o, {
						enumerable: !0,
						get: n[o]
					})
				},
				o: (e, t) => Object.prototype.hasOwnProperty.call(e, t),
				r: e => {
					"undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
						value: "Module"
					}), Object.defineProperty(e, "__esModule", {
						value: !0
					})
				}
			},
			t = {};
		e.r(t), e.d(t, {
			default: () => n,
			divideNumbers: () => r
		});
		const n = (e, t = {}) => {
				const {
					action: n = "start",
					duration: i = 1e3,
					delay: u = 16
				} = t;
				if ("stop" === n) return void o(e);
				if (o(e), !/[0-9]/.test(e.innerHTML)) return;
				const l = r(e.innerHTML, {
					duration: i || e.getAttribute("data-duration"),
					delay: u || e.getAttribute("data-delay")
				});
				e._countUpOrigInnerHTML = e.innerHTML, e.innerHTML = l[0] || " ", e.style.visibility = "visible";
				const c = function () {
					e.innerHTML = l.shift() || " ", l.length ? (clearTimeout(e.countUpTimeout), e.countUpTimeout = setTimeout(c, u)) : e._countUpOrigInnerHTML = void 0
				};
				e.countUpTimeout = setTimeout(c, u)
			},
			o = e => {
				clearTimeout(e.countUpTimeout), e._countUpOrigInnerHTML && (e.innerHTML = e._countUpOrigInnerHTML, e._countUpOrigInnerHTML = void 0), e.style.visibility = ""
			},
			r = (e, t = {}) => {
				const {
					duration: n = 1e3,
					delay: o = 16
				} = t, r = n / o, i = e.toString().split(/(<[^>]+>|[0-9.][,.0-9]*[0-9]*)/), u = [];
				for (let e = 0; e < r; e++) u.push("");
				for (let e = 0; e < i.length; e++)
					if (/([0-9.][,.0-9]*[0-9]*)/.test(i[e]) && !/<[^>]+>/.test(i[e])) {
						let t = i[e];
						const n = [...t.matchAll(/[.,]/g)].map((e => ({
							char: e[0],
							i: t.length - e.index - 1
						}))).sort(((e, t) => e.i - t.i));
						t = t.replace(/[.,]/g, "");
						let o = u.length - 1;
						for (let e = r; e >= 1; e--) {
							let i = parseInt(t / r * e, 10);
							i = n.reduce(((e, {
								char: t,
								i: n
							}) => e.length <= n ? e : e.slice(0, -n) + t + e.slice(-n)), i.toString()), u[o--] += i
						}
					} else
						for (let t = 0; t < r; t++) u[t] += i[e];
				return u[u.length] = e.toString(), u
			};
		return t
	})()
}));
/*!
 * baguetteBox.js
 * @author  feimosi
 * @version 1.11.1
 * @url https://github.com/feimosi/baguetteBox.js
 */
! function (e, t) {
	"use strict";
	"function" == typeof define && define.amd ? define(t) : "object" == typeof exports ? module.exports = t() : e.baguetteBox = t()
}(this, function () {
	"use strict";
	var r, l, u, c, d, f = '<svg width="44" height="60"><polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4"stroke-linecap="butt" fill="none" stroke-linejoin="round"/></svg>',
		g = '<svg width="44" height="60"><polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4"stroke-linecap="butt" fill="none" stroke-linejoin="round"/></svg>',
		p = '<svg width="30" height="30"><g stroke="rgb(160,160,160)" stroke-width="4"><line x1="5" y1="5" x2="25" y2="25"/><line x1="5" y1="25" x2="25" y2="5"/></g></svg>',
		b = {},
		v = {
			captions: !0,
			buttons: "auto",
			fullScreen: !1,
			noScrollbars: !1,
			bodyClass: "baguetteBox-open",
			titleTag: !1,
			async: !1,
			preload: 2,
			animation: "slideIn",
			afterShow: null,
			afterHide: null,
			onChange: null,
			overlayBackgroundColor: "rgba(0,0,0,.8)"
		},
		m = {},
		h = [],
		o = 0,
		n = !1,
		i = {},
		a = !1,
		y = /.+\.(gif|jpe?g|png|webp)/i,
		w = {},
		k = [],
		s = null,
		x = function (e) {
			-1 !== e.target.id.indexOf("baguette-img") && j()
		},
		E = function (e) {
			e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0, D()
		},
		C = function (e) {
			e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0, X()
		},
		B = function (e) {
			e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0, j()
		},
		T = function (e) {
			i.count++, 1 < i.count && (i.multitouch = !0), i.startX = e.changedTouches[0].pageX, i.startY = e.changedTouches[0].pageY
		},
		N = function (e) {
			if (!a && !i.multitouch) {
				e.preventDefault ? e.preventDefault() : e.returnValue = !1;
				var t = e.touches[0] || e.changedTouches[0];
				40 < t.pageX - i.startX ? (a = !0, D()) : t.pageX - i.startX < -40 ? (a = !0, X()) : 100 < i.startY - t.pageY && j()
			}
		},
		L = function () {
			i.count--, i.count <= 0 && (i.multitouch = !1), a = !1
		},
		A = function () {
			L()
		},
		P = function (e) {
			"block" === r.style.display && r.contains && !r.contains(e.target) && (e.stopPropagation(), Y())
		};

	function S(e) {
		if (w.hasOwnProperty(e)) {
			var t = w[e].galleries;
			[].forEach.call(t, function (e) {
				[].forEach.call(e, function (e) {
					W(e.imageElement, "click", e.eventHandler)
				}), h === e && (h = [])
			}), delete w[e]
		}
	}

	function F(e) {
		switch (e.keyCode) {
			case 37:
				D();
				break;
			case 39:
				X();
				break;
			case 27:
				j();
				break;
			case 36:
				! function t(e) {
					e && e.preventDefault();
					return M(0)
				}(e);
				break;
			case 35:
				! function n(e) {
					e && e.preventDefault();
					return M(h.length - 1)
				}(e)
		}
	}

	function H(e, t) {
		if (h !== e) {
			for (h = e, function s(e) {
					e = e || {};
					for (var t in v) b[t] = v[t], "undefined" != typeof e[t] && (b[t] = e[t]);
					l.style.transition = l.style.webkitTransition = "fadeIn" === b.animation ? "opacity .4s ease" : "slideIn" === b.animation ? "" : "none", "auto" === b.buttons && ("ontouchstart" in window || 1 === h.length) && (b.buttons = !1);
					u.style.display = c.style.display = b.buttons ? "" : "none";
					try {
						r.style.backgroundColor = b.overlayBackgroundColor
					} catch (n) {}
				}(t); l.firstChild;) l.removeChild(l.firstChild);
			for (var n, o = [], i = [], a = k.length = 0; a < e.length; a++)(n = J("div")).className = "full-image", n.id = "baguette-img-" + a, k.push(n), o.push("baguetteBox-figure-" + a), i.push("baguetteBox-figcaption-" + a), l.appendChild(k[a]);
			r.setAttribute("aria-labelledby", o.join(" ")), r.setAttribute("aria-describedby", i.join(" "))
		}
	}

	function I(e) {
		b.noScrollbars && (document.documentElement.style.overflowY = "hidden", document.body.style.overflowY = "scroll"), "block" !== r.style.display && (U(document, "keydown", F), i = {
			count: 0,
			startX: null,
			startY: null
		}, q(o = e, function () {
			z(o), V(o)
		}), R(), r.style.display = "block", b.fullScreen && function t() {
			r.requestFullscreen ? r.requestFullscreen() : r.webkitRequestFullscreen ? r.webkitRequestFullscreen() : r.mozRequestFullScreen && r.mozRequestFullScreen()
		}(), setTimeout(function () {
			r.className = "visible", b.bodyClass && document.body.classList && document.body.classList.add(b.bodyClass), b.afterShow && b.afterShow()
		}, 50), b.onChange && b.onChange(o, k.length), s = document.activeElement, Y(), n = !0)
	}

	function Y() {
		b.buttons ? u.focus() : d.focus()
	}

	function j() {
		b.noScrollbars && (document.documentElement.style.overflowY = "auto", document.body.style.overflowY = "auto"), "none" !== r.style.display && (W(document, "keydown", F), r.className = "", setTimeout(function () {
			r.style.display = "none", document.fullscreen && function e() {
				document.exitFullscreen ? document.exitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen()
			}(), b.bodyClass && document.body.classList && document.body.classList.remove(b.bodyClass), b.afterHide && b.afterHide(), s && s.focus(), n = !1
		}, 500))
	}

	function q(t, n) {
		var e = k[t],
			o = h[t];
		if (void 0 !== e && void 0 !== o)
			if (e.getElementsByTagName("img")[0]) n && n();
			else {
				var i = o.imageElement,
					a = i.getElementsByTagName("img")[0],
					s = "function" == typeof b.captions ? b.captions.call(h, i) : i.getAttribute("data-caption") || i.title,
					r = function d(e) {
						var t = e.href;
						if (e.dataset) {
							var n = [];
							for (var o in e.dataset) "at-" !== o.substring(0, 3) || isNaN(o.substring(3)) || (n[o.replace("at-", "")] = e.dataset[o]);
							for (var i = Object.keys(n).sort(function (e, t) {
									return parseInt(e, 10) < parseInt(t, 10) ? -1 : 1
								}), a = window.innerWidth * window.devicePixelRatio, s = 0; s < i.length - 1 && i[s] < a;) s++;
							t = n[i[s]] || t
						}
						return t
					}(i),
					l = J("figure");
				if (l.id = "baguetteBox-figure-" + t, l.innerHTML = '<div class="baguetteBox-spinner"><div class="baguetteBox-double-bounce1"></div><div class="baguetteBox-double-bounce2"></div></div>', b.captions && s) {
					var u = J("figcaption");
					u.id = "baguetteBox-figcaption-" + t, u.innerHTML = s, l.appendChild(u)
				}
				e.appendChild(l);
				var c = J("img");
				c.onload = function () {
					var e = document.querySelector("#baguette-img-" + t + " .baguetteBox-spinner");
					l.removeChild(e), !b.async && n && n()
				}, c.setAttribute("src", r), c.alt = a && a.alt || "", b.titleTag && s && (c.title = s), l.appendChild(c), b.async && n && n()
			}
	}

	function X() {
		return M(o + 1)
	}

	function D() {
		return M(o - 1)
	}

	function M(e, t) {
		return !n && 0 <= e && e < t.length ? (H(t, b), I(e), !0) : e < 0 ? (b.animation && O("left"), !1) : e >= k.length ? (b.animation && O("right"), !1) : (q(o = e, function () {
			z(o), V(o)
		}), R(), b.onChange && b.onChange(o, k.length), !0)
	}

	function O(e) {
		l.className = "bounce-from-" + e, setTimeout(function () {
			l.className = ""
		}, 400)
	}

	function R() {
		var e = 100 * -o + "%";
		"fadeIn" === b.animation ? (l.style.opacity = 0, setTimeout(function () {
			m.transforms ? l.style.transform = l.style.webkitTransform = "translate3d(" + e + ",0,0)" : l.style.left = e, l.style.opacity = 1
		}, 400)) : m.transforms ? l.style.transform = l.style.webkitTransform = "translate3d(" + e + ",0,0)" : l.style.left = e
	}

	function z(e) {
		e - o >= b.preload || q(e + 1, function () {
			z(e + 1)
		})
	}

	function V(e) {
		o - e >= b.preload || q(e - 1, function () {
			V(e - 1)
		})
	}

	function U(e, t, n, o) {
		e.addEventListener ? e.addEventListener(t, n, o) : e.attachEvent("on" + t, function (e) {
			(e = e || window.event).target = e.target || e.srcElement, n(e)
		})
	}

	function W(e, t, n, o) {
		e.removeEventListener ? e.removeEventListener(t, n, o) : e.detachEvent("on" + t, n)
	}

	function G(e) {
		return document.getElementById(e)
	}

	function J(e) {
		return document.createElement(e)
	}
	return [].forEach || (Array.prototype.forEach = function (e, t) {
		for (var n = 0; n < this.length; n++) e.call(t, this[n], n, this)
	}), [].filter || (Array.prototype.filter = function (e, t, n, o, i) {
		for (n = this, o = [], i = 0; i < n.length; i++) e.call(t, n[i], i, n) && o.push(n[i]);
		return o
	}), {
		run: function K(e, t) {
			return m.transforms = function n() {
					var e = J("div");
					return "undefined" != typeof e.style.perspective || "undefined" != typeof e.style.webkitPerspective
				}(), m.svg = function o() {
					var e = J("div");
					return e.innerHTML = "<svg/>", "http://www.w3.org/2000/svg" === (e.firstChild && e.firstChild.namespaceURI)
				}(), m.passiveEvents = function i() {
					var e = !1;
					try {
						var t = Object.defineProperty({}, "passive", {
							get: function () {
								e = !0
							}
						});
						window.addEventListener("test", null, t)
					} catch (n) {}
					return e
				}(),
				function a() {
					if (r = G("baguetteBox-overlay")) return l = G("baguetteBox-slider"), u = G("previous-button"), c = G("next-button"), void(d = G("close-button"));
					(r = J("div")).setAttribute("role", "dialog"), r.id = "baguetteBox-overlay", document.getElementsByTagName("body")[0].appendChild(r), (l = J("div")).id = "baguetteBox-slider", r.appendChild(l), (u = J("button")).setAttribute("type", "button"), u.id = "previous-button", u.setAttribute("aria-label", "Previous"), u.innerHTML = m.svg ? f : "<", r.appendChild(u), (c = J("button")).setAttribute("type", "button"), c.id = "next-button", c.setAttribute("aria-label", "Next"), c.innerHTML = m.svg ? g : ">", r.appendChild(c), (d = J("button")).setAttribute("type", "button"), d.id = "close-button", d.setAttribute("aria-label", "Close"), d.innerHTML = m.svg ? p : "×", r.appendChild(d), u.className = c.className = d.className = "baguetteBox-button",
						function n() {
							var e = m.passiveEvents ? {
									passive: !1
								} : null,
								t = m.passiveEvents ? {
									passive: !0
								} : null;
							U(r, "click", x), U(u, "click", E), U(c, "click", C), U(d, "click", B), U(l, "contextmenu", A), U(r, "touchstart", T, t), U(r, "touchmove", N, e), U(r, "touchend", L), U(document, "focus", P, !0)
						}()
				}(), S(e),
				function s(e, a) {
					var t = document.querySelectorAll(e),
						n = {
							galleries: [],
							nodeList: t
						};
					return w[e] = n, [].forEach.call(t, function (e) {
						a && a.filter && (y = a.filter);
						var t = [];
						if (t = "A" === e.tagName ? [e] : e.getElementsByTagName("a"), 0 !== (t = [].filter.call(t, function (e) {
								if (-1 === e.className.indexOf(a && a.ignoreClass)) return y.test(e.href)
							})).length) {
							var i = [];
							[].forEach.call(t, function (e, t) {
								var n = function (e) {
										e.preventDefault ? e.preventDefault() : e.returnValue = !1, H(i, a), I(t)
									},
									o = {
										eventHandler: n,
										imageElement: e
									};
								U(e, "click", n), i.push(o)
							}), n.galleries.push(i)
						}
					}), n.galleries
				}(e, t)
		},
		show: M,
		showNext: X,
		showPrevious: D,
		hide: j,
		destroy: function e() {
			! function n() {
				var e = m.passiveEvents ? {
						passive: !1
					} : null,
					t = m.passiveEvents ? {
						passive: !0
					} : null;
				W(r, "click", x), W(u, "click", E), W(c, "click", C), W(d, "click", B), W(l, "contextmenu", A), W(r, "touchstart", T, t), W(r, "touchmove", N, e), W(r, "touchend", L), W(document, "focus", P, !0)
			}(),
			function t() {
				for (var e in w) w.hasOwnProperty(e) && S(e)
			}(), W(document, "keydown", F), document.getElementsByTagName("body")[0].removeChild(document.getElementById("baguetteBox-overlay")), w = {}, h = [], o = 0
		}
	}
});
/*!
 * imagesLoaded PACKAGED v4.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

! function (e, t) {
	"function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", t) : "object" == typeof module && module.exports ? module.exports = t() : e.EvEmitter = t()
}("undefined" != typeof window ? window : this, function () {
	function e() {}
	var t = e.prototype;
	return t.on = function (e, t) {
		if (e && t) {
			var i = this._events = this._events || {},
				n = i[e] = i[e] || [];
			return n.indexOf(t) == -1 && n.push(t), this
		}
	}, t.once = function (e, t) {
		if (e && t) {
			this.on(e, t);
			var i = this._onceEvents = this._onceEvents || {},
				n = i[e] = i[e] || {};
			return n[t] = !0, this
		}
	}, t.off = function (e, t) {
		var i = this._events && this._events[e];
		if (i && i.length) {
			var n = i.indexOf(t);
			return n != -1 && i.splice(n, 1), this
		}
	}, t.emitEvent = function (e, t) {
		var i = this._events && this._events[e];
		if (i && i.length) {
			i = i.slice(0), t = t || [];
			for (var n = this._onceEvents && this._onceEvents[e], o = 0; o < i.length; o++) {
				var r = i[o],
					s = n && n[r];
				s && (this.off(e, r), delete n[r]), r.apply(this, t)
			}
			return this
		}
	}, t.allOff = function () {
		delete this._events, delete this._onceEvents
	}, e
}),
function (e, t) {
	"use strict";
	"function" == typeof define && define.amd ? define(["ev-emitter/ev-emitter"], function (i) {
		return t(e, i)
	}) : "object" == typeof module && module.exports ? module.exports = t(e, require("ev-emitter")) : e.imagesLoaded = t(e, e.EvEmitter)
}("undefined" != typeof window ? window : this, function (e, t) {
	function i(e, t) {
		for (var i in t) e[i] = t[i];
		return e
	}

	function n(e) {
		if (Array.isArray(e)) return e;
		var t = "object" == typeof e && "number" == typeof e.length;
		return t ? d.call(e) : [e]
	}

	function o(e, t, r) {
		if (!(this instanceof o)) return new o(e, t, r);
		var s = e;
		return "string" == typeof e && (s = document.querySelectorAll(e)), s ? (this.elements = n(s), this.options = i({}, this.options), "function" == typeof t ? r = t : i(this.options, t), r && this.on("always", r), this.getImages(), h && (this.jqDeferred = new h.Deferred), void setTimeout(this.check.bind(this))) : void a.error("Bad element for imagesLoaded " + (s || e))
	}

	function r(e) {
		this.img = e
	}

	function s(e, t) {
		this.url = e, this.element = t, this.img = new Image
	}
	var h = e.jQuery,
		a = e.console,
		d = Array.prototype.slice;
	o.prototype = Object.create(t.prototype), o.prototype.options = {}, o.prototype.getImages = function () {
		this.images = [], this.elements.forEach(this.addElementImages, this)
	}, o.prototype.addElementImages = function (e) {
		"IMG" == e.nodeName && this.addImage(e), this.options.background === !0 && this.addElementBackgroundImages(e);
		var t = e.nodeType;
		if (t && u[t]) {
			for (var i = e.querySelectorAll("img"), n = 0; n < i.length; n++) {
				var o = i[n];
				this.addImage(o)
			}
			if ("string" == typeof this.options.background) {
				var r = e.querySelectorAll(this.options.background);
				for (n = 0; n < r.length; n++) {
					var s = r[n];
					this.addElementBackgroundImages(s)
				}
			}
		}
	};
	var u = {
		1: !0,
		9: !0,
		11: !0
	};
	return o.prototype.addElementBackgroundImages = function (e) {
		var t = getComputedStyle(e);
		if (t)
			for (var i = /url\((['"])?(.*?)\1\)/gi, n = i.exec(t.backgroundImage); null !== n;) {
				var o = n && n[2];
				o && this.addBackground(o, e), n = i.exec(t.backgroundImage)
			}
	}, o.prototype.addImage = function (e) {
		var t = new r(e);
		this.images.push(t)
	}, o.prototype.addBackground = function (e, t) {
		var i = new s(e, t);
		this.images.push(i)
	}, o.prototype.check = function () {
		function e(e, i, n) {
			setTimeout(function () {
				t.progress(e, i, n)
			})
		}
		var t = this;
		return this.progressedCount = 0, this.hasAnyBroken = !1, this.images.length ? void this.images.forEach(function (t) {
			t.once("progress", e), t.check()
		}) : void this.complete()
	}, o.prototype.progress = function (e, t, i) {
		this.progressedCount++, this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded, this.emitEvent("progress", [this, e, t]), this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, e), this.progressedCount == this.images.length && this.complete(), this.options.debug && a && a.log("progress: " + i, e, t)
	}, o.prototype.complete = function () {
		var e = this.hasAnyBroken ? "fail" : "done";
		if (this.isComplete = !0, this.emitEvent(e, [this]), this.emitEvent("always", [this]), this.jqDeferred) {
			var t = this.hasAnyBroken ? "reject" : "resolve";
			this.jqDeferred[t](this)
		}
	}, r.prototype = Object.create(t.prototype), r.prototype.check = function () {
		var e = this.getIsImageComplete();
		return e ? void this.confirm(0 !== this.img.naturalWidth, "naturalWidth") : (this.proxyImage = new Image, this.proxyImage.addEventListener("load", this), this.proxyImage.addEventListener("error", this), this.img.addEventListener("load", this), this.img.addEventListener("error", this), void(this.proxyImage.src = this.img.src))
	}, r.prototype.getIsImageComplete = function () {
		return this.img.complete && this.img.naturalWidth
	}, r.prototype.confirm = function (e, t) {
		this.isLoaded = e, this.emitEvent("progress", [this, this.img, t])
	}, r.prototype.handleEvent = function (e) {
		var t = "on" + e.type;
		this[t] && this[t](e)
	}, r.prototype.onload = function () {
		this.confirm(!0, "onload"), this.unbindEvents()
	}, r.prototype.onerror = function () {
		this.confirm(!1, "onerror"), this.unbindEvents()
	}, r.prototype.unbindEvents = function () {
		this.proxyImage.removeEventListener("load", this), this.proxyImage.removeEventListener("error", this), this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
	}, s.prototype = Object.create(r.prototype), s.prototype.check = function () {
		this.img.addEventListener("load", this), this.img.addEventListener("error", this), this.img.src = this.url;
		var e = this.getIsImageComplete();
		e && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents())
	}, s.prototype.unbindEvents = function () {
		this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
	}, s.prototype.confirm = function (e, t) {
		this.isLoaded = e, this.emitEvent("progress", [this, this.element, t])
	}, o.makeJQueryPlugin = function (t) {
		t = t || e.jQuery, t && (h = t, h.fn.imagesLoaded = function (e, t) {
			var i = new o(this, e, t);
			return i.jqDeferred.promise(h(this))
		})
	}, o.makeJQueryPlugin(), o
});
/*!
 * Isotope PACKAGED v3.0.6
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * https://isotope.metafizzy.co
 * Copyright 2010-2018 Metafizzy
 */

! function (t, e) {
	"function" == typeof define && define.amd ? define("jquery-bridget/jquery-bridget", ["jquery"], function (i) {
		return e(t, i)
	}) : "object" == typeof module && module.exports ? module.exports = e(t, require("jquery")) : t.jQueryBridget = e(t, t.jQuery)
}(window, function (t, e) {
	"use strict";

	function i(i, s, a) {
		function u(t, e, o) {
			var n, s = "$()." + i + '("' + e + '")';
			return t.each(function (t, u) {
				var h = a.data(u, i);
				if (!h) return void r(i + " not initialized. Cannot call methods, i.e. " + s);
				var d = h[e];
				if (!d || "_" == e.charAt(0)) return void r(s + " is not a valid method");
				var l = d.apply(h, o);
				n = void 0 === n ? l : n
			}), void 0 !== n ? n : t
		}

		function h(t, e) {
			t.each(function (t, o) {
				var n = a.data(o, i);
				n ? (n.option(e), n._init()) : (n = new s(o, e), a.data(o, i, n))
			})
		}
		a = a || e || t.jQuery, a && (s.prototype.option || (s.prototype.option = function (t) {
			a.isPlainObject(t) && (this.options = a.extend(!0, this.options, t))
		}), a.fn[i] = function (t) {
			if ("string" == typeof t) {
				var e = n.call(arguments, 1);
				return u(this, t, e)
			}
			return h(this, t), this
		}, o(a))
	}

	function o(t) {
		!t || t && t.bridget || (t.bridget = i)
	}
	var n = Array.prototype.slice,
		s = t.console,
		r = "undefined" == typeof s ? function () {} : function (t) {
			s.error(t)
		};
	return o(e || t.jQuery), i
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", e) : "object" == typeof module && module.exports ? module.exports = e() : t.EvEmitter = e()
}("undefined" != typeof window ? window : this, function () {
	function t() {}
	var e = t.prototype;
	return e.on = function (t, e) {
		if (t && e) {
			var i = this._events = this._events || {},
				o = i[t] = i[t] || [];
			return o.indexOf(e) == -1 && o.push(e), this
		}
	}, e.once = function (t, e) {
		if (t && e) {
			this.on(t, e);
			var i = this._onceEvents = this._onceEvents || {},
				o = i[t] = i[t] || {};
			return o[e] = !0, this
		}
	}, e.off = function (t, e) {
		var i = this._events && this._events[t];
		if (i && i.length) {
			var o = i.indexOf(e);
			return o != -1 && i.splice(o, 1), this
		}
	}, e.emitEvent = function (t, e) {
		var i = this._events && this._events[t];
		if (i && i.length) {
			i = i.slice(0), e = e || [];
			for (var o = this._onceEvents && this._onceEvents[t], n = 0; n < i.length; n++) {
				var s = i[n],
					r = o && o[s];
				r && (this.off(t, s), delete o[s]), s.apply(this, e)
			}
			return this
		}
	}, e.allOff = function () {
		delete this._events, delete this._onceEvents
	}, t
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("get-size/get-size", e) : "object" == typeof module && module.exports ? module.exports = e() : t.getSize = e()
}(window, function () {
	"use strict";

	function t(t) {
		var e = parseFloat(t),
			i = t.indexOf("%") == -1 && !isNaN(e);
		return i && e
	}

	function e() {}

	function i() {
		for (var t = {
				width: 0,
				height: 0,
				innerWidth: 0,
				innerHeight: 0,
				outerWidth: 0,
				outerHeight: 0
			}, e = 0; e < h; e++) {
			var i = u[e];
			t[i] = 0
		}
		return t
	}

	function o(t) {
		var e = getComputedStyle(t);
		return e || a("Style returned " + e + ". Are you running this code in a hidden iframe on Firefox? See https://bit.ly/getsizebug1"), e
	}

	function n() {
		if (!d) {
			d = !0;
			var e = document.createElement("div");
			e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style.boxSizing = "border-box";
			var i = document.body || document.documentElement;
			i.appendChild(e);
			var n = o(e);
			r = 200 == Math.round(t(n.width)), s.isBoxSizeOuter = r, i.removeChild(e)
		}
	}

	function s(e) {
		if (n(), "string" == typeof e && (e = document.querySelector(e)), e && "object" == typeof e && e.nodeType) {
			var s = o(e);
			if ("none" == s.display) return i();
			var a = {};
			a.width = e.offsetWidth, a.height = e.offsetHeight;
			for (var d = a.isBorderBox = "border-box" == s.boxSizing, l = 0; l < h; l++) {
				var f = u[l],
					c = s[f],
					m = parseFloat(c);
				a[f] = isNaN(m) ? 0 : m
			}
			var p = a.paddingLeft + a.paddingRight,
				y = a.paddingTop + a.paddingBottom,
				g = a.marginLeft + a.marginRight,
				v = a.marginTop + a.marginBottom,
				_ = a.borderLeftWidth + a.borderRightWidth,
				z = a.borderTopWidth + a.borderBottomWidth,
				I = d && r,
				x = t(s.width);
			x !== !1 && (a.width = x + (I ? 0 : p + _));
			var S = t(s.height);
			return S !== !1 && (a.height = S + (I ? 0 : y + z)), a.innerWidth = a.width - (p + _), a.innerHeight = a.height - (y + z), a.outerWidth = a.width + g, a.outerHeight = a.height + v, a
		}
	}
	var r, a = "undefined" == typeof console ? e : function (t) {
			console.error(t)
		},
		u = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"],
		h = u.length,
		d = !1;
	return s
}),
function (t, e) {
	"use strict";
	"function" == typeof define && define.amd ? define("desandro-matches-selector/matches-selector", e) : "object" == typeof module && module.exports ? module.exports = e() : t.matchesSelector = e()
}(window, function () {
	"use strict";
	var t = function () {
		var t = window.Element.prototype;
		if (t.matches) return "matches";
		if (t.matchesSelector) return "matchesSelector";
		for (var e = ["webkit", "moz", "ms", "o"], i = 0; i < e.length; i++) {
			var o = e[i],
				n = o + "MatchesSelector";
			if (t[n]) return n
		}
	}();
	return function (e, i) {
		return e[t](i)
	}
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["desandro-matches-selector/matches-selector"], function (i) {
		return e(t, i)
	}) : "object" == typeof module && module.exports ? module.exports = e(t, require("desandro-matches-selector")) : t.fizzyUIUtils = e(t, t.matchesSelector)
}(window, function (t, e) {
	var i = {};
	i.extend = function (t, e) {
		for (var i in e) t[i] = e[i];
		return t
	}, i.modulo = function (t, e) {
		return (t % e + e) % e
	};
	var o = Array.prototype.slice;
	i.makeArray = function (t) {
		if (Array.isArray(t)) return t;
		if (null === t || void 0 === t) return [];
		var e = "object" == typeof t && "number" == typeof t.length;
		return e ? o.call(t) : [t]
	}, i.removeFrom = function (t, e) {
		var i = t.indexOf(e);
		i != -1 && t.splice(i, 1)
	}, i.getParent = function (t, i) {
		for (; t.parentNode && t != document.body;)
			if (t = t.parentNode, e(t, i)) return t
	}, i.getQueryElement = function (t) {
		return "string" == typeof t ? document.querySelector(t) : t
	}, i.handleEvent = function (t) {
		var e = "on" + t.type;
		this[e] && this[e](t)
	}, i.filterFindElements = function (t, o) {
		t = i.makeArray(t);
		var n = [];
		return t.forEach(function (t) {
			if (t instanceof HTMLElement) {
				if (!o) return void n.push(t);
				e(t, o) && n.push(t);
				for (var i = t.querySelectorAll(o), s = 0; s < i.length; s++) n.push(i[s])
			}
		}), n
	}, i.debounceMethod = function (t, e, i) {
		i = i || 100;
		var o = t.prototype[e],
			n = e + "Timeout";
		t.prototype[e] = function () {
			var t = this[n];
			clearTimeout(t);
			var e = arguments,
				s = this;
			this[n] = setTimeout(function () {
				o.apply(s, e), delete s[n]
			}, i)
		}
	}, i.docReady = function (t) {
		var e = document.readyState;
		"complete" == e || "interactive" == e ? setTimeout(t) : document.addEventListener("DOMContentLoaded", t)
	}, i.toDashed = function (t) {
		return t.replace(/(.)([A-Z])/g, function (t, e, i) {
			return e + "-" + i
		}).toLowerCase()
	};
	var n = t.console;
	return i.htmlInit = function (e, o) {
		i.docReady(function () {
			var s = i.toDashed(o),
				r = "data-" + s,
				a = document.querySelectorAll("[" + r + "]"),
				u = document.querySelectorAll(".js-" + s),
				h = i.makeArray(a).concat(i.makeArray(u)),
				d = r + "-options",
				l = t.jQuery;
			h.forEach(function (t) {
				var i, s = t.getAttribute(r) || t.getAttribute(d);
				try {
					i = s && JSON.parse(s)
				} catch (a) {
					return void(n && n.error("Error parsing " + r + " on " + t.className + ": " + a))
				}
				var u = new e(t, i);
				l && l.data(t, o, u)
			})
		})
	}, i
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("outlayer/item", ["ev-emitter/ev-emitter", "get-size/get-size"], e) : "object" == typeof module && module.exports ? module.exports = e(require("ev-emitter"), require("get-size")) : (t.Outlayer = {}, t.Outlayer.Item = e(t.EvEmitter, t.getSize))
}(window, function (t, e) {
	"use strict";

	function i(t) {
		for (var e in t) return !1;
		return e = null, !0
	}

	function o(t, e) {
		t && (this.element = t, this.layout = e, this.position = {
			x: 0,
			y: 0
		}, this._create())
	}

	function n(t) {
		return t.replace(/([A-Z])/g, function (t) {
			return "-" + t.toLowerCase()
		})
	}
	var s = document.documentElement.style,
		r = "string" == typeof s.transition ? "transition" : "WebkitTransition",
		a = "string" == typeof s.transform ? "transform" : "WebkitTransform",
		u = {
			WebkitTransition: "webkitTransitionEnd",
			transition: "transitionend"
		}[r],
		h = {
			transform: a,
			transition: r,
			transitionDuration: r + "Duration",
			transitionProperty: r + "Property",
			transitionDelay: r + "Delay"
		},
		d = o.prototype = Object.create(t.prototype);
	d.constructor = o, d._create = function () {
		this._transn = {
			ingProperties: {},
			clean: {},
			onEnd: {}
		}, this.css({
			position: "absolute"
		})
	}, d.handleEvent = function (t) {
		var e = "on" + t.type;
		this[e] && this[e](t)
	}, d.getSize = function () {
		this.size = e(this.element)
	}, d.css = function (t) {
		var e = this.element.style;
		for (var i in t) {
			var o = h[i] || i;
			e[o] = t[i]
		}
	}, d.getPosition = function () {
		var t = getComputedStyle(this.element),
			e = this.layout._getOption("originLeft"),
			i = this.layout._getOption("originTop"),
			o = t[e ? "left" : "right"],
			n = t[i ? "top" : "bottom"],
			s = parseFloat(o),
			r = parseFloat(n),
			a = this.layout.size;
		o.indexOf("%") != -1 && (s = s / 100 * a.width), n.indexOf("%") != -1 && (r = r / 100 * a.height), s = isNaN(s) ? 0 : s, r = isNaN(r) ? 0 : r, s -= e ? a.paddingLeft : a.paddingRight, r -= i ? a.paddingTop : a.paddingBottom, this.position.x = s, this.position.y = r
	}, d.layoutPosition = function () {
		var t = this.layout.size,
			e = {},
			i = this.layout._getOption("originLeft"),
			o = this.layout._getOption("originTop"),
			n = i ? "paddingLeft" : "paddingRight",
			s = i ? "left" : "right",
			r = i ? "right" : "left",
			a = this.position.x + t[n];
		e[s] = this.getXValue(a), e[r] = "";
		var u = o ? "paddingTop" : "paddingBottom",
			h = o ? "top" : "bottom",
			d = o ? "bottom" : "top",
			l = this.position.y + t[u];
		e[h] = this.getYValue(l), e[d] = "", this.css(e), this.emitEvent("layout", [this])
	}, d.getXValue = function (t) {
		var e = this.layout._getOption("horizontal");
		return this.layout.options.percentPosition && !e ? t / this.layout.size.width * 100 + "%" : t + "px"
	}, d.getYValue = function (t) {
		var e = this.layout._getOption("horizontal");
		return this.layout.options.percentPosition && e ? t / this.layout.size.height * 100 + "%" : t + "px"
	}, d._transitionTo = function (t, e) {
		this.getPosition();
		var i = this.position.x,
			o = this.position.y,
			n = t == this.position.x && e == this.position.y;
		if (this.setPosition(t, e), n && !this.isTransitioning) return void this.layoutPosition();
		var s = t - i,
			r = e - o,
			a = {};
		a.transform = this.getTranslate(s, r), this.transition({
			to: a,
			onTransitionEnd: {
				transform: this.layoutPosition
			},
			isCleaning: !0
		})
	}, d.getTranslate = function (t, e) {
		var i = this.layout._getOption("originLeft"),
			o = this.layout._getOption("originTop");
		return t = i ? t : -t, e = o ? e : -e, "translate3d(" + t + "px, " + e + "px, 0)"
	}, d.goTo = function (t, e) {
		this.setPosition(t, e), this.layoutPosition()
	}, d.moveTo = d._transitionTo, d.setPosition = function (t, e) {
		this.position.x = parseFloat(t), this.position.y = parseFloat(e)
	}, d._nonTransition = function (t) {
		this.css(t.to), t.isCleaning && this._removeStyles(t.to);
		for (var e in t.onTransitionEnd) t.onTransitionEnd[e].call(this)
	}, d.transition = function (t) {
		if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(t);
		var e = this._transn;
		for (var i in t.onTransitionEnd) e.onEnd[i] = t.onTransitionEnd[i];
		for (i in t.to) e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
		if (t.from) {
			this.css(t.from);
			var o = this.element.offsetHeight;
			o = null
		}
		this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
	};
	var l = "opacity," + n(a);
	d.enableTransition = function () {
		if (!this.isTransitioning) {
			var t = this.layout.options.transitionDuration;
			t = "number" == typeof t ? t + "ms" : t, this.css({
				transitionProperty: l,
				transitionDuration: t,
				transitionDelay: this.staggerDelay || 0
			}), this.element.addEventListener(u, this, !1)
		}
	}, d.onwebkitTransitionEnd = function (t) {
		this.ontransitionend(t)
	}, d.onotransitionend = function (t) {
		this.ontransitionend(t)
	};
	var f = {
		"-webkit-transform": "transform"
	};
	d.ontransitionend = function (t) {
		if (t.target === this.element) {
			var e = this._transn,
				o = f[t.propertyName] || t.propertyName;
			if (delete e.ingProperties[o], i(e.ingProperties) && this.disableTransition(), o in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[o]), o in e.onEnd) {
				var n = e.onEnd[o];
				n.call(this), delete e.onEnd[o]
			}
			this.emitEvent("transitionEnd", [this])
		}
	}, d.disableTransition = function () {
		this.removeTransitionStyles(), this.element.removeEventListener(u, this, !1), this.isTransitioning = !1
	}, d._removeStyles = function (t) {
		var e = {};
		for (var i in t) e[i] = "";
		this.css(e)
	};
	var c = {
		transitionProperty: "",
		transitionDuration: "",
		transitionDelay: ""
	};
	return d.removeTransitionStyles = function () {
		this.css(c)
	}, d.stagger = function (t) {
		t = isNaN(t) ? 0 : t, this.staggerDelay = t + "ms"
	}, d.removeElem = function () {
		this.element.parentNode.removeChild(this.element), this.css({
			display: ""
		}), this.emitEvent("remove", [this])
	}, d.remove = function () {
		return r && parseFloat(this.layout.options.transitionDuration) ? (this.once("transitionEnd", function () {
			this.removeElem()
		}), void this.hide()) : void this.removeElem()
	}, d.reveal = function () {
		delete this.isHidden, this.css({
			display: ""
		});
		var t = this.layout.options,
			e = {},
			i = this.getHideRevealTransitionEndProperty("visibleStyle");
		e[i] = this.onRevealTransitionEnd, this.transition({
			from: t.hiddenStyle,
			to: t.visibleStyle,
			isCleaning: !0,
			onTransitionEnd: e
		})
	}, d.onRevealTransitionEnd = function () {
		this.isHidden || this.emitEvent("reveal")
	}, d.getHideRevealTransitionEndProperty = function (t) {
		var e = this.layout.options[t];
		if (e.opacity) return "opacity";
		for (var i in e) return i
	}, d.hide = function () {
		this.isHidden = !0, this.css({
			display: ""
		});
		var t = this.layout.options,
			e = {},
			i = this.getHideRevealTransitionEndProperty("hiddenStyle");
		e[i] = this.onHideTransitionEnd, this.transition({
			from: t.visibleStyle,
			to: t.hiddenStyle,
			isCleaning: !0,
			onTransitionEnd: e
		})
	}, d.onHideTransitionEnd = function () {
		this.isHidden && (this.css({
			display: "none"
		}), this.emitEvent("hide"))
	}, d.destroy = function () {
		this.css({
			position: "",
			left: "",
			right: "",
			top: "",
			bottom: "",
			transition: "",
			transform: ""
		})
	}, o
}),
function (t, e) {
	"use strict";
	"function" == typeof define && define.amd ? define("outlayer/outlayer", ["ev-emitter/ev-emitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function (i, o, n, s) {
		return e(t, i, o, n, s)
	}) : "object" == typeof module && module.exports ? module.exports = e(t, require("ev-emitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.EvEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
}(window, function (t, e, i, o, n) {
	"use strict";

	function s(t, e) {
		var i = o.getQueryElement(t);
		if (!i) return void(u && u.error("Bad element for " + this.constructor.namespace + ": " + (i || t)));
		this.element = i, h && (this.$element = h(this.element)), this.options = o.extend({}, this.constructor.defaults), this.option(e);
		var n = ++l;
		this.element.outlayerGUID = n, f[n] = this, this._create();
		var s = this._getOption("initLayout");
		s && this.layout()
	}

	function r(t) {
		function e() {
			t.apply(this, arguments)
		}
		return e.prototype = Object.create(t.prototype), e.prototype.constructor = e, e
	}

	function a(t) {
		if ("number" == typeof t) return t;
		var e = t.match(/(^\d*\.?\d*)(\w*)/),
			i = e && e[1],
			o = e && e[2];
		if (!i.length) return 0;
		i = parseFloat(i);
		var n = m[o] || 1;
		return i * n
	}
	var u = t.console,
		h = t.jQuery,
		d = function () {},
		l = 0,
		f = {};
	s.namespace = "outlayer", s.Item = n, s.defaults = {
		containerStyle: {
			position: "relative"
		},
		initLayout: !0,
		originLeft: !0,
		originTop: !0,
		resize: !0,
		resizeContainer: !0,
		transitionDuration: "0.4s",
		hiddenStyle: {
			opacity: 0,
			transform: "scale(0.001)"
		},
		visibleStyle: {
			opacity: 1,
			transform: "scale(1)"
		}
	};
	var c = s.prototype;
	o.extend(c, e.prototype), c.option = function (t) {
		o.extend(this.options, t)
	}, c._getOption = function (t) {
		var e = this.constructor.compatOptions[t];
		return e && void 0 !== this.options[e] ? this.options[e] : this.options[t]
	}, s.compatOptions = {
		initLayout: "isInitLayout",
		horizontal: "isHorizontal",
		layoutInstant: "isLayoutInstant",
		originLeft: "isOriginLeft",
		originTop: "isOriginTop",
		resize: "isResizeBound",
		resizeContainer: "isResizingContainer"
	}, c._create = function () {
		this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), o.extend(this.element.style, this.options.containerStyle);
		var t = this._getOption("resize");
		t && this.bindResize()
	}, c.reloadItems = function () {
		this.items = this._itemize(this.element.children)
	}, c._itemize = function (t) {
		for (var e = this._filterFindItemElements(t), i = this.constructor.Item, o = [], n = 0; n < e.length; n++) {
			var s = e[n],
				r = new i(s, this);
			o.push(r)
		}
		return o
	}, c._filterFindItemElements = function (t) {
		return o.filterFindElements(t, this.options.itemSelector)
	}, c.getItemElements = function () {
		return this.items.map(function (t) {
			return t.element
		})
	}, c.layout = function () {
		this._resetLayout(), this._manageStamps();
		var t = this._getOption("layoutInstant"),
			e = void 0 !== t ? t : !this._isLayoutInited;
		this.layoutItems(this.items, e), this._isLayoutInited = !0
	}, c._init = c.layout, c._resetLayout = function () {
		this.getSize()
	}, c.getSize = function () {
		this.size = i(this.element)
	}, c._getMeasurement = function (t, e) {
		var o, n = this.options[t];
		n ? ("string" == typeof n ? o = this.element.querySelector(n) : n instanceof HTMLElement && (o = n), this[t] = o ? i(o)[e] : n) : this[t] = 0
	}, c.layoutItems = function (t, e) {
		t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
	}, c._getItemsForLayout = function (t) {
		return t.filter(function (t) {
			return !t.isIgnored
		})
	}, c._layoutItems = function (t, e) {
		if (this._emitCompleteOnItems("layout", t), t && t.length) {
			var i = [];
			t.forEach(function (t) {
				var o = this._getItemLayoutPosition(t);
				o.item = t, o.isInstant = e || t.isLayoutInstant, i.push(o)
			}, this), this._processLayoutQueue(i)
		}
	}, c._getItemLayoutPosition = function () {
		return {
			x: 0,
			y: 0
		}
	}, c._processLayoutQueue = function (t) {
		this.updateStagger(), t.forEach(function (t, e) {
			this._positionItem(t.item, t.x, t.y, t.isInstant, e)
		}, this)
	}, c.updateStagger = function () {
		var t = this.options.stagger;
		return null === t || void 0 === t ? void(this.stagger = 0) : (this.stagger = a(t), this.stagger)
	}, c._positionItem = function (t, e, i, o, n) {
		o ? t.goTo(e, i) : (t.stagger(n * this.stagger), t.moveTo(e, i))
	}, c._postLayout = function () {
		this.resizeContainer()
	}, c.resizeContainer = function () {
		var t = this._getOption("resizeContainer");
		if (t) {
			var e = this._getContainerSize();
			e && (this._setContainerMeasure(e.width, !0), this._setContainerMeasure(e.height, !1))
		}
	}, c._getContainerSize = d, c._setContainerMeasure = function (t, e) {
		if (void 0 !== t) {
			var i = this.size;
			i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
		}
	}, c._emitCompleteOnItems = function (t, e) {
		function i() {
			n.dispatchEvent(t + "Complete", null, [e])
		}

		function o() {
			r++, r == s && i()
		}
		var n = this,
			s = e.length;
		if (!e || !s) return void i();
		var r = 0;
		e.forEach(function (e) {
			e.once(t, o)
		})
	}, c.dispatchEvent = function (t, e, i) {
		var o = e ? [e].concat(i) : i;
		if (this.emitEvent(t, o), h)
			if (this.$element = this.$element || h(this.element), e) {
				var n = h.Event(e);
				n.type = t, this.$element.trigger(n, i)
			} else this.$element.trigger(t, i)
	}, c.ignore = function (t) {
		var e = this.getItem(t);
		e && (e.isIgnored = !0)
	}, c.unignore = function (t) {
		var e = this.getItem(t);
		e && delete e.isIgnored
	}, c.stamp = function (t) {
		t = this._find(t), t && (this.stamps = this.stamps.concat(t), t.forEach(this.ignore, this))
	}, c.unstamp = function (t) {
		t = this._find(t), t && t.forEach(function (t) {
			o.removeFrom(this.stamps, t), this.unignore(t)
		}, this)
	}, c._find = function (t) {
		if (t) return "string" == typeof t && (t = this.element.querySelectorAll(t)), t = o.makeArray(t)
	}, c._manageStamps = function () {
		this.stamps && this.stamps.length && (this._getBoundingRect(), this.stamps.forEach(this._manageStamp, this))
	}, c._getBoundingRect = function () {
		var t = this.element.getBoundingClientRect(),
			e = this.size;
		this._boundingRect = {
			left: t.left + e.paddingLeft + e.borderLeftWidth,
			top: t.top + e.paddingTop + e.borderTopWidth,
			right: t.right - (e.paddingRight + e.borderRightWidth),
			bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
		}
	}, c._manageStamp = d, c._getElementOffset = function (t) {
		var e = t.getBoundingClientRect(),
			o = this._boundingRect,
			n = i(t),
			s = {
				left: e.left - o.left - n.marginLeft,
				top: e.top - o.top - n.marginTop,
				right: o.right - e.right - n.marginRight,
				bottom: o.bottom - e.bottom - n.marginBottom
			};
		return s
	}, c.handleEvent = o.handleEvent, c.bindResize = function () {
		t.addEventListener("resize", this), this.isResizeBound = !0
	}, c.unbindResize = function () {
		t.removeEventListener("resize", this), this.isResizeBound = !1
	}, c.onresize = function () {
		this.resize()
	}, o.debounceMethod(s, "onresize", 100), c.resize = function () {
		this.isResizeBound && this.needsResizeLayout() && this.layout()
	}, c.needsResizeLayout = function () {
		var t = i(this.element),
			e = this.size && t;
		return e && t.innerWidth !== this.size.innerWidth
	}, c.addItems = function (t) {
		var e = this._itemize(t);
		return e.length && (this.items = this.items.concat(e)), e
	}, c.appended = function (t) {
		var e = this.addItems(t);
		e.length && (this.layoutItems(e, !0), this.reveal(e))
	}, c.prepended = function (t) {
		var e = this._itemize(t);
		if (e.length) {
			var i = this.items.slice(0);
			this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
		}
	}, c.reveal = function (t) {
		if (this._emitCompleteOnItems("reveal", t), t && t.length) {
			var e = this.updateStagger();
			t.forEach(function (t, i) {
				t.stagger(i * e), t.reveal()
			})
		}
	}, c.hide = function (t) {
		if (this._emitCompleteOnItems("hide", t), t && t.length) {
			var e = this.updateStagger();
			t.forEach(function (t, i) {
				t.stagger(i * e), t.hide()
			})
		}
	}, c.revealItemElements = function (t) {
		var e = this.getItems(t);
		this.reveal(e)
	}, c.hideItemElements = function (t) {
		var e = this.getItems(t);
		this.hide(e)
	}, c.getItem = function (t) {
		for (var e = 0; e < this.items.length; e++) {
			var i = this.items[e];
			if (i.element == t) return i
		}
	}, c.getItems = function (t) {
		t = o.makeArray(t);
		var e = [];
		return t.forEach(function (t) {
			var i = this.getItem(t);
			i && e.push(i)
		}, this), e
	}, c.remove = function (t) {
		var e = this.getItems(t);
		this._emitCompleteOnItems("remove", e), e && e.length && e.forEach(function (t) {
			t.remove(), o.removeFrom(this.items, t)
		}, this)
	}, c.destroy = function () {
		var t = this.element.style;
		t.height = "", t.position = "", t.width = "", this.items.forEach(function (t) {
			t.destroy()
		}), this.unbindResize();
		var e = this.element.outlayerGUID;
		delete f[e], delete this.element.outlayerGUID, h && h.removeData(this.element, this.constructor.namespace)
	}, s.data = function (t) {
		t = o.getQueryElement(t);
		var e = t && t.outlayerGUID;
		return e && f[e]
	}, s.create = function (t, e) {
		var i = r(s);
		return i.defaults = o.extend({}, s.defaults), o.extend(i.defaults, e), i.compatOptions = o.extend({}, s.compatOptions), i.namespace = t, i.data = s.data, i.Item = r(n), o.htmlInit(i, t), h && h.bridget && h.bridget(t, i), i
	};
	var m = {
		ms: 1,
		s: 1e3
	};
	return s.Item = n, s
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("isotope-layout/js/item", ["outlayer/outlayer"], e) : "object" == typeof module && module.exports ? module.exports = e(require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.Item = e(t.Outlayer))
}(window, function (t) {
	"use strict";

	function e() {
		t.Item.apply(this, arguments)
	}
	var i = e.prototype = Object.create(t.Item.prototype),
		o = i._create;
	i._create = function () {
		this.id = this.layout.itemGUID++, o.call(this), this.sortData = {}
	}, i.updateSortData = function () {
		if (!this.isIgnored) {
			this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
			var t = this.layout.options.getSortData,
				e = this.layout._sorters;
			for (var i in t) {
				var o = e[i];
				this.sortData[i] = o(this.element, this)
			}
		}
	};
	var n = i.destroy;
	return i.destroy = function () {
		n.apply(this, arguments), this.css({
			display: ""
		})
	}, e
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("isotope-layout/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], e) : "object" == typeof module && module.exports ? module.exports = e(require("get-size"), require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.LayoutMode = e(t.getSize, t.Outlayer))
}(window, function (t, e) {
	"use strict";

	function i(t) {
		this.isotope = t, t && (this.options = t.options[this.namespace], this.element = t.element, this.items = t.filteredItems, this.size = t.size)
	}
	var o = i.prototype,
		n = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout", "_getOption"];
	return n.forEach(function (t) {
		o[t] = function () {
			return e.prototype[t].apply(this.isotope, arguments)
		}
	}), o.needsVerticalResizeLayout = function () {
		var e = t(this.isotope.element),
			i = this.isotope.size && e;
		return i && e.innerHeight != this.isotope.size.innerHeight
	}, o._getMeasurement = function () {
		this.isotope._getMeasurement.apply(this, arguments)
	}, o.getColumnWidth = function () {
		this.getSegmentSize("column", "Width")
	}, o.getRowHeight = function () {
		this.getSegmentSize("row", "Height")
	}, o.getSegmentSize = function (t, e) {
		var i = t + e,
			o = "outer" + e;
		if (this._getMeasurement(i, o), !this[i]) {
			var n = this.getFirstItemSize();
			this[i] = n && n[o] || this.isotope.size["inner" + e]
		}
	}, o.getFirstItemSize = function () {
		var e = this.isotope.filteredItems[0];
		return e && e.element && t(e.element)
	}, o.layout = function () {
		this.isotope.layout.apply(this.isotope, arguments)
	}, o.getSize = function () {
		this.isotope.getSize(), this.size = this.isotope.size
	}, i.modes = {}, i.create = function (t, e) {
		function n() {
			i.apply(this, arguments)
		}
		return n.prototype = Object.create(o), n.prototype.constructor = n, e && (n.options = e), n.prototype.namespace = t, i.modes[t] = n, n
	}, i
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("masonry-layout/masonry", ["outlayer/outlayer", "get-size/get-size"], e) : "object" == typeof module && module.exports ? module.exports = e(require("outlayer"), require("get-size")) : t.Masonry = e(t.Outlayer, t.getSize)
}(window, function (t, e) {
	var i = t.create("masonry");
	i.compatOptions.fitWidth = "isFitWidth";
	var o = i.prototype;
	return o._resetLayout = function () {
		this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns(), this.colYs = [];
		for (var t = 0; t < this.cols; t++) this.colYs.push(0);
		this.maxY = 0, this.horizontalColIndex = 0
	}, o.measureColumns = function () {
		if (this.getContainerWidth(), !this.columnWidth) {
			var t = this.items[0],
				i = t && t.element;
			this.columnWidth = i && e(i).outerWidth || this.containerWidth
		}
		var o = this.columnWidth += this.gutter,
			n = this.containerWidth + this.gutter,
			s = n / o,
			r = o - n % o,
			a = r && r < 1 ? "round" : "floor";
		s = Math[a](s), this.cols = Math.max(s, 1)
	}, o.getContainerWidth = function () {
		var t = this._getOption("fitWidth"),
			i = t ? this.element.parentNode : this.element,
			o = e(i);
		this.containerWidth = o && o.innerWidth
	}, o._getItemLayoutPosition = function (t) {
		t.getSize();
		var e = t.size.outerWidth % this.columnWidth,
			i = e && e < 1 ? "round" : "ceil",
			o = Math[i](t.size.outerWidth / this.columnWidth);
		o = Math.min(o, this.cols);
		for (var n = this.options.horizontalOrder ? "_getHorizontalColPosition" : "_getTopColPosition", s = this[n](o, t), r = {
				x: this.columnWidth * s.col,
				y: s.y
			}, a = s.y + t.size.outerHeight, u = o + s.col, h = s.col; h < u; h++) this.colYs[h] = a;
		return r
	}, o._getTopColPosition = function (t) {
		var e = this._getTopColGroup(t),
			i = Math.min.apply(Math, e);
		return {
			col: e.indexOf(i),
			y: i
		}
	}, o._getTopColGroup = function (t) {
		if (t < 2) return this.colYs;
		for (var e = [], i = this.cols + 1 - t, o = 0; o < i; o++) e[o] = this._getColGroupY(o, t);
		return e
	}, o._getColGroupY = function (t, e) {
		if (e < 2) return this.colYs[t];
		var i = this.colYs.slice(t, t + e);
		return Math.max.apply(Math, i)
	}, o._getHorizontalColPosition = function (t, e) {
		var i = this.horizontalColIndex % this.cols,
			o = t > 1 && i + t > this.cols;
		i = o ? 0 : i;
		var n = e.size.outerWidth && e.size.outerHeight;
		return this.horizontalColIndex = n ? i + t : this.horizontalColIndex, {
			col: i,
			y: this._getColGroupY(i, t)
		}
	}, o._manageStamp = function (t) {
		var i = e(t),
			o = this._getElementOffset(t),
			n = this._getOption("originLeft"),
			s = n ? o.left : o.right,
			r = s + i.outerWidth,
			a = Math.floor(s / this.columnWidth);
		a = Math.max(0, a);
		var u = Math.floor(r / this.columnWidth);
		u -= r % this.columnWidth ? 0 : 1, u = Math.min(this.cols - 1, u);
		for (var h = this._getOption("originTop"), d = (h ? o.top : o.bottom) + i.outerHeight, l = a; l <= u; l++) this.colYs[l] = Math.max(d, this.colYs[l])
	}, o._getContainerSize = function () {
		this.maxY = Math.max.apply(Math, this.colYs);
		var t = {
			height: this.maxY
		};
		return this._getOption("fitWidth") && (t.width = this._getContainerFitWidth()), t
	}, o._getContainerFitWidth = function () {
		for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];) t++;
		return (this.cols - t) * this.columnWidth - this.gutter
	}, o.needsResizeLayout = function () {
		var t = this.containerWidth;
		return this.getContainerWidth(), t != this.containerWidth
	}, i
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("isotope-layout/js/layout-modes/masonry", ["../layout-mode", "masonry-layout/masonry"], e) : "object" == typeof module && module.exports ? module.exports = e(require("../layout-mode"), require("masonry-layout")) : e(t.Isotope.LayoutMode, t.Masonry)
}(window, function (t, e) {
	"use strict";
	var i = t.create("masonry"),
		o = i.prototype,
		n = {
			_getElementOffset: !0,
			layout: !0,
			_getMeasurement: !0
		};
	for (var s in e.prototype) n[s] || (o[s] = e.prototype[s]);
	var r = o.measureColumns;
	o.measureColumns = function () {
		this.items = this.isotope.filteredItems, r.call(this)
	};
	var a = o._getOption;
	return o._getOption = function (t) {
		return "fitWidth" == t ? void 0 !== this.options.isFitWidth ? this.options.isFitWidth : this.options.fitWidth : a.apply(this.isotope, arguments)
	}, i
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("isotope-layout/js/layout-modes/fit-rows", ["../layout-mode"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function (t) {
	"use strict";
	var e = t.create("fitRows"),
		i = e.prototype;
	return i._resetLayout = function () {
		this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
	}, i._getItemLayoutPosition = function (t) {
		t.getSize();
		var e = t.size.outerWidth + this.gutter,
			i = this.isotope.size.innerWidth + this.gutter;
		0 !== this.x && e + this.x > i && (this.x = 0, this.y = this.maxY);
		var o = {
			x: this.x,
			y: this.y
		};
		return this.maxY = Math.max(this.maxY, this.y + t.size.outerHeight), this.x += e, o
	}, i._getContainerSize = function () {
		return {
			height: this.maxY
		}
	}, e
}),
function (t, e) {
	"function" == typeof define && define.amd ? define("isotope-layout/js/layout-modes/vertical", ["../layout-mode"], e) : "object" == typeof module && module.exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function (t) {
	"use strict";
	var e = t.create("vertical", {
			horizontalAlignment: 0
		}),
		i = e.prototype;
	return i._resetLayout = function () {
		this.y = 0
	}, i._getItemLayoutPosition = function (t) {
		t.getSize();
		var e = (this.isotope.size.innerWidth - t.size.outerWidth) * this.options.horizontalAlignment,
			i = this.y;
		return this.y += t.size.outerHeight, {
			x: e,
			y: i
		}
	}, i._getContainerSize = function () {
		return {
			height: this.y
		}
	}, e
}),
function (t, e) {
	"function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "desandro-matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope-layout/js/item", "isotope-layout/js/layout-mode", "isotope-layout/js/layout-modes/masonry", "isotope-layout/js/layout-modes/fit-rows", "isotope-layout/js/layout-modes/vertical"], function (i, o, n, s, r, a) {
		return e(t, i, o, n, s, r, a)
	}) : "object" == typeof module && module.exports ? module.exports = e(t, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("isotope-layout/js/item"), require("isotope-layout/js/layout-mode"), require("isotope-layout/js/layout-modes/masonry"), require("isotope-layout/js/layout-modes/fit-rows"), require("isotope-layout/js/layout-modes/vertical")) : t.Isotope = e(t, t.Outlayer, t.getSize, t.matchesSelector, t.fizzyUIUtils, t.Isotope.Item, t.Isotope.LayoutMode)
}(window, function (t, e, i, o, n, s, r) {
	function a(t, e) {
		return function (i, o) {
			for (var n = 0; n < t.length; n++) {
				var s = t[n],
					r = i.sortData[s],
					a = o.sortData[s];
				if (r > a || r < a) {
					var u = void 0 !== e[s] ? e[s] : e,
						h = u ? 1 : -1;
					return (r > a ? 1 : -1) * h
				}
			}
			return 0
		}
	}
	var u = t.jQuery,
		h = String.prototype.trim ? function (t) {
			return t.trim()
		} : function (t) {
			return t.replace(/^\s+|\s+$/g, "")
		},
		d = e.create("isotope", {
			layoutMode: "masonry",
			isJQueryFiltering: !0,
			sortAscending: !0
		});
	d.Item = s, d.LayoutMode = r;
	var l = d.prototype;
	l._create = function () {
		this.itemGUID = 0, this._sorters = {}, this._getSorters(), e.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
		for (var t in r.modes) this._initLayoutMode(t)
	}, l.reloadItems = function () {
		this.itemGUID = 0, e.prototype.reloadItems.call(this)
	}, l._itemize = function () {
		for (var t = e.prototype._itemize.apply(this, arguments), i = 0; i < t.length; i++) {
			var o = t[i];
			o.id = this.itemGUID++
		}
		return this._updateItemsSortData(t), t
	}, l._initLayoutMode = function (t) {
		var e = r.modes[t],
			i = this.options[t] || {};
		this.options[t] = e.options ? n.extend(e.options, i) : i, this.modes[t] = new e(this)
	}, l.layout = function () {
		return !this._isLayoutInited && this._getOption("initLayout") ? void this.arrange() : void this._layout()
	}, l._layout = function () {
		var t = this._getIsInstant();
		this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, t), this._isLayoutInited = !0
	}, l.arrange = function (t) {
		this.option(t), this._getIsInstant();
		var e = this._filter(this.items);
		this.filteredItems = e.matches, this._bindArrangeComplete(), this._isInstant ? this._noTransition(this._hideReveal, [e]) : this._hideReveal(e), this._sort(), this._layout()
	}, l._init = l.arrange, l._hideReveal = function (t) {
		this.reveal(t.needReveal), this.hide(t.needHide)
	}, l._getIsInstant = function () {
		var t = this._getOption("layoutInstant"),
			e = void 0 !== t ? t : !this._isLayoutInited;
		return this._isInstant = e, e
	}, l._bindArrangeComplete = function () {
		function t() {
			e && i && o && n.dispatchEvent("arrangeComplete", null, [n.filteredItems])
		}
		var e, i, o, n = this;
		this.once("layoutComplete", function () {
			e = !0, t()
		}), this.once("hideComplete", function () {
			i = !0, t()
		}), this.once("revealComplete", function () {
			o = !0, t()
		})
	}, l._filter = function (t) {
		var e = this.options.filter;
		e = e || "*";
		for (var i = [], o = [], n = [], s = this._getFilterTest(e), r = 0; r < t.length; r++) {
			var a = t[r];
			if (!a.isIgnored) {
				var u = s(a);
				u && i.push(a), u && a.isHidden ? o.push(a) : u || a.isHidden || n.push(a)
			}
		}
		return {
			matches: i,
			needReveal: o,
			needHide: n
		}
	}, l._getFilterTest = function (t) {
		return u && this.options.isJQueryFiltering ? function (e) {
			return u(e.element).is(t);
		} : "function" == typeof t ? function (e) {
			return t(e.element)
		} : function (e) {
			return o(e.element, t)
		}
	}, l.updateSortData = function (t) {
		var e;
		t ? (t = n.makeArray(t), e = this.getItems(t)) : e = this.items, this._getSorters(), this._updateItemsSortData(e)
	}, l._getSorters = function () {
		var t = this.options.getSortData;
		for (var e in t) {
			var i = t[e];
			this._sorters[e] = f(i)
		}
	}, l._updateItemsSortData = function (t) {
		for (var e = t && t.length, i = 0; e && i < e; i++) {
			var o = t[i];
			o.updateSortData()
		}
	};
	var f = function () {
		function t(t) {
			if ("string" != typeof t) return t;
			var i = h(t).split(" "),
				o = i[0],
				n = o.match(/^\[(.+)\]$/),
				s = n && n[1],
				r = e(s, o),
				a = d.sortDataParsers[i[1]];
			return t = a ? function (t) {
				return t && a(r(t))
			} : function (t) {
				return t && r(t)
			}
		}

		function e(t, e) {
			return t ? function (e) {
				return e.getAttribute(t)
			} : function (t) {
				var i = t.querySelector(e);
				return i && i.textContent
			}
		}
		return t
	}();
	d.sortDataParsers = {
		parseInt: function (t) {
			return parseInt(t, 10)
		},
		parseFloat: function (t) {
			return parseFloat(t)
		}
	}, l._sort = function () {
		if (this.options.sortBy) {
			var t = n.makeArray(this.options.sortBy);
			this._getIsSameSortBy(t) || (this.sortHistory = t.concat(this.sortHistory));
			var e = a(this.sortHistory, this.options.sortAscending);
			this.filteredItems.sort(e)
		}
	}, l._getIsSameSortBy = function (t) {
		for (var e = 0; e < t.length; e++)
			if (t[e] != this.sortHistory[e]) return !1;
		return !0
	}, l._mode = function () {
		var t = this.options.layoutMode,
			e = this.modes[t];
		if (!e) throw new Error("No layout mode: " + t);
		return e.options = this.options[t], e
	}, l._resetLayout = function () {
		e.prototype._resetLayout.call(this), this._mode()._resetLayout()
	}, l._getItemLayoutPosition = function (t) {
		return this._mode()._getItemLayoutPosition(t)
	}, l._manageStamp = function (t) {
		this._mode()._manageStamp(t)
	}, l._getContainerSize = function () {
		return this._mode()._getContainerSize()
	}, l.needsResizeLayout = function () {
		return this._mode().needsResizeLayout()
	}, l.appended = function (t) {
		var e = this.addItems(t);
		if (e.length) {
			var i = this._filterRevealAdded(e);
			this.filteredItems = this.filteredItems.concat(i)
		}
	}, l.prepended = function (t) {
		var e = this._itemize(t);
		if (e.length) {
			this._resetLayout(), this._manageStamps();
			var i = this._filterRevealAdded(e);
			this.layoutItems(this.filteredItems), this.filteredItems = i.concat(this.filteredItems), this.items = e.concat(this.items)
		}
	}, l._filterRevealAdded = function (t) {
		var e = this._filter(t);
		return this.hide(e.needHide), this.reveal(e.matches), this.layoutItems(e.matches, !0), e.matches
	}, l.insert = function (t) {
		var e = this.addItems(t);
		if (e.length) {
			var i, o, n = e.length;
			for (i = 0; i < n; i++) o = e[i], this.element.appendChild(o.element);
			var s = this._filter(e).matches;
			for (i = 0; i < n; i++) e[i].isLayoutInstant = !0;
			for (this.arrange(), i = 0; i < n; i++) delete e[i].isLayoutInstant;
			this.reveal(s)
		}
	};
	var c = l.remove;
	return l.remove = function (t) {
		t = n.makeArray(t);
		var e = this.getItems(t);
		c.call(this, t);
		for (var i = e && e.length, o = 0; i && o < i; o++) {
			var s = e[o];
			n.removeFrom(this.filteredItems, s)
		}
	}, l.shuffle = function () {
		for (var t = 0; t < this.items.length; t++) {
			var e = this.items[t];
			e.sortData.random = Math.random()
		}
		this.options.sortBy = "random", this._sort(), this._layout()
	}, l._noTransition = function (t, e) {
		var i = this.options.transitionDuration;
		this.options.transitionDuration = 0;
		var o = t.apply(this, e);
		return this.options.transitionDuration = i, o
	}, l.getFilteredItemElements = function () {
		return this.filteredItems.map(function (t) {
			return t.element
		})
	}, d
});
/*! mediabox v1.1.3 | (c) 2018 Pedro Rogerio | https://github.com/pinceladasdaweb/mediabox */
! function (e, t) {
	"use strict";
	"function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? module.exports = t() : e.MediaBox = t()
}(this, function () {
	"use strict";
	var e = function (t, o) {
		var i = {
				autoplay: "1"
			},
			o = o || 0;
		return this && this instanceof e ? !!t && (this.params = Object.assign(i, o), this.selector = t instanceof NodeList ? t : document.querySelectorAll(t), this.root = document.querySelector("body"), void this.run()) : new e(t, o)
	};
	return e.prototype = {
		run: function () {
			Array.prototype.forEach.call(this.selector, function (e) {
				e.addEventListener("click", function (t) {
					t.preventDefault();
					var o = this.parseUrl(e.getAttribute("href"));
					this.render(o), this.events()
				}.bind(this), !1)
			}.bind(this)), this.root.addEventListener("keyup", function (e) {
				27 === (e.keyCode || e.which) && this.close(this.root.querySelector(".mediabox-wrap"))
			}.bind(this), !1)
		},
		template: function (e, t) {
			var o;
			for (o in t) t.hasOwnProperty(o) && (e = e.replace(new RegExp("{" + o + "}", "g"), t[o]));
			return e
		},
		parseUrl: function (e) {
			var t, o = {};
			return (t = e.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/)) ? (o.provider = "youtube", o.id = t[2]) : (t = e.match(/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/)) ? (o.provider = "vimeo", o.id = t[3]) : (o.provider = "Unknown", o.id = ""), o
		},
		render: function (e) {
			var t, o, i;
			if ("youtube" === e.provider) t = "https://www.youtube.com/embed/" + e.id;
			else {
				if ("vimeo" !== e.provider) throw new Error("Invalid video URL");
				t = "https://player.vimeo.com/video/" + e.id
			}
			i = this.serialize(this.params), o = this.template('<div class="mediabox-wrap" role="dialog" aria-hidden="false"><div class="mediabox-content" role="document" tabindex="0"><span id="mediabox-esc" class="mediabox-close" aria-label="close" tabindex="1"></span><iframe src="{embed}{params}" frameborder="0" allowfullscreen></iframe></div></div>', {
				embed: t,
				params: i
			}), this.lastFocusElement = document.activeElement, this.root.insertAdjacentHTML("beforeend", o), document.body.classList.add("stop-scroll")
		},
		events: function () {
			var e = document.querySelector(".mediabox-wrap"),
				t = document.querySelector(".mediabox-content");
			e.addEventListener("click", function (t) {
				(t.target && "SPAN" === t.target.nodeName && "mediabox-close" === t.target.className || "DIV" === t.target.nodeName && "mediabox-wrap" === t.target.className || "mediabox-content" === t.target.className && "IFRAME" !== t.target.nodeName) && this.close(e)
			}.bind(this), !1), document.addEventListener("focus", function (e) {
				t && !t.contains(e.target) && (e.stopPropagation(), t.focus())
			}, !0), t.addEventListener("keypress", function (t) {
				13 === t.keyCode && this.close(e)
			}.bind(this), !1)
		},
		close: function (e) {
			if (null === e) return !0;
			var t = null;
			t && clearTimeout(t), e.classList.add("mediabox-hide"), t = setTimeout(function () {
				var e = document.querySelector(".mediabox-wrap");
				null !== e && (document.body.classList.remove("stop-scroll"), this.root.removeChild(e), this.lastFocusElement.focus())
			}.bind(this), 500)
		},
		serialize: function (e) {
			return "?" + Object.keys(e).reduce(function (t, o) {
				return t.push(o + "=" + encodeURIComponent(e[o])), t
			}, []).join("&")
		}
	}, e
}), "function" != typeof Object.assign && Object.defineProperty(Object, "assign", {
	value: function (e, t) {
		"use strict";
		if (null == e) throw new TypeError("Cannot convert undefined or null to object");
		for (var o = Object(e), i = 1; i < arguments.length; i++) {
			var r = arguments[i];
			if (null != r)
				for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (o[n] = r[n])
		}
		return o
	},
	writable: !0,
	configurable: !0
});
/*! WOW - v1.1.2 - 2016-04-08
 * Copyright (c) 2016 Matthieu Aussaguel;*/
(function () {
	var a, b, c, d, e, f = function (a, b) {
			return function () {
				return a.apply(b, arguments)
			}
		},
		g = [].indexOf || function (a) {
			for (var b = 0, c = this.length; c > b; b++)
				if (b in this && this[b] === a) return b;
			return -1
		};
	b = function () {
		function a() {}
		return a.prototype.extend = function (a, b) {
			var c, d;
			for (c in b) d = b[c], null == a[c] && (a[c] = d);
			return a
		}, a.prototype.isMobile = function (a) {
			return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)
		}, a.prototype.createEvent = function (a, b, c, d) {
			var e;
			return null == b && (b = !1), null == c && (c = !1), null == d && (d = null), null != document.createEvent ? (e = document.createEvent("CustomEvent"), e.initCustomEvent(a, b, c, d)) : null != document.createEventObject ? (e = document.createEventObject(), e.eventType = a) : e.eventName = a, e
		}, a.prototype.emitEvent = function (a, b) {
			return null != a.dispatchEvent ? a.dispatchEvent(b) : b in (null != a) ? a[b]() : "on" + b in (null != a) ? a["on" + b]() : void 0
		}, a.prototype.addEvent = function (a, b, c) {
			return null != a.addEventListener ? a.addEventListener(b, c, !1) : null != a.attachEvent ? a.attachEvent("on" + b, c) : a[b] = c
		}, a.prototype.removeEvent = function (a, b, c) {
			return null != a.removeEventListener ? a.removeEventListener(b, c, !1) : null != a.detachEvent ? a.detachEvent("on" + b, c) : delete a[b]
		}, a.prototype.innerHeight = function () {
			return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight
		}, a
	}(), c = this.WeakMap || this.MozWeakMap || (c = function () {
		function a() {
			this.keys = [], this.values = []
		}
		return a.prototype.get = function (a) {
			var b, c, d, e, f;
			for (f = this.keys, b = d = 0, e = f.length; e > d; b = ++d)
				if (c = f[b], c === a) return this.values[b]
		}, a.prototype.set = function (a, b) {
			var c, d, e, f, g;
			for (g = this.keys, c = e = 0, f = g.length; f > e; c = ++e)
				if (d = g[c], d === a) return void(this.values[c] = b);
			return this.keys.push(a), this.values.push(b)
		}, a
	}()), a = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (a = function () {
		function a() {
			"undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")
		}
		return a.notSupported = !0, a.prototype.observe = function () {}, a
	}()), d = this.getComputedStyle || function (a, b) {
		return this.getPropertyValue = function (b) {
			var c;
			return "float" === b && (b = "styleFloat"), e.test(b) && b.replace(e, function (a, b) {
				return b.toUpperCase()
			}), (null != (c = a.currentStyle) ? c[b] : void 0) || null
		}, this
	}, e = /(\-([a-z]){1})/g, this.WOW = function () {
		function e(a) {
			null == a && (a = {}), this.scrollCallback = f(this.scrollCallback, this), this.scrollHandler = f(this.scrollHandler, this), this.resetAnimation = f(this.resetAnimation, this), this.start = f(this.start, this), this.scrolled = !0, this.config = this.util().extend(a, this.defaults), null != a.scrollContainer && (this.config.scrollContainer = document.querySelector(a.scrollContainer)), this.animationNameCache = new c, this.wowEvent = this.util().createEvent(this.config.boxClass)
		}
		return e.prototype.defaults = {
			boxClass: "wow",
			animateClass: "animated",
			offset: 0,
			mobile: !0,
			live: !0,
			callback: null,
			scrollContainer: null
		}, e.prototype.init = function () {
			var a;
			return this.element = window.document.documentElement, "interactive" === (a = document.readyState) || "complete" === a ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = []
		}, e.prototype.start = function () {
			var b, c, d, e;
			if (this.stopped = !1, this.boxes = function () {
					var a, c, d, e;
					for (d = this.element.querySelectorAll("." + this.config.boxClass), e = [], a = 0, c = d.length; c > a; a++) b = d[a], e.push(b);
					return e
				}.call(this), this.all = function () {
					var a, c, d, e;
					for (d = this.boxes, e = [], a = 0, c = d.length; c > a; a++) b = d[a], e.push(b);
					return e
				}.call(this), this.boxes.length)
				if (this.disabled()) this.resetStyle();
				else
					for (e = this.boxes, c = 0, d = e.length; d > c; c++) b = e[c], this.applyStyle(b, !0);
			return this.disabled() || (this.util().addEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live ? new a(function (a) {
				return function (b) {
					var c, d, e, f, g;
					for (g = [], c = 0, d = b.length; d > c; c++) f = b[c], g.push(function () {
						var a, b, c, d;
						for (c = f.addedNodes || [], d = [], a = 0, b = c.length; b > a; a++) e = c[a], d.push(this.doSync(e));
						return d
					}.call(a));
					return g
				}
			}(this)).observe(document.body, {
				childList: !0,
				subtree: !0
			}) : void 0
		}, e.prototype.stop = function () {
			return this.stopped = !0, this.util().removeEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval ? clearInterval(this.interval) : void 0
		}, e.prototype.sync = function (b) {
			return a.notSupported ? this.doSync(this.element) : void 0
		}, e.prototype.doSync = function (a) {
			var b, c, d, e, f;
			if (null == a && (a = this.element), 1 === a.nodeType) {
				for (a = a.parentNode || a, e = a.querySelectorAll("." + this.config.boxClass), f = [], c = 0, d = e.length; d > c; c++) b = e[c], g.call(this.all, b) < 0 ? (this.boxes.push(b), this.all.push(b), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(b, !0), f.push(this.scrolled = !0)) : f.push(void 0);
				return f
			}
		}, e.prototype.show = function (a) {
			return this.applyStyle(a), a.className = a.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(a), this.util().emitEvent(a, this.wowEvent), this.util().addEvent(a, "animationend", this.resetAnimation), this.util().addEvent(a, "oanimationend", this.resetAnimation), this.util().addEvent(a, "webkitAnimationEnd", this.resetAnimation), this.util().addEvent(a, "MSAnimationEnd", this.resetAnimation), a
		}, e.prototype.applyStyle = function (a, b) {
			var c, d, e;
			return d = a.getAttribute("data-wow-duration"), c = a.getAttribute("data-wow-delay"), e = a.getAttribute("data-wow-iteration"), this.animate(function (f) {
				return function () {
					return f.customStyle(a, b, d, c, e)
				}
			}(this))
		}, e.prototype.animate = function () {
			return "requestAnimationFrame" in window ? function (a) {
				return window.requestAnimationFrame(a)
			} : function (a) {
				return a()
			}
		}(), e.prototype.resetStyle = function () {
			var a, b, c, d, e;
			for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) a = d[b], e.push(a.style.visibility = "visible");
			return e
		}, e.prototype.resetAnimation = function (a) {
			var b;
			return a.type.toLowerCase().indexOf("animationend") >= 0 ? (b = a.target || a.srcElement, b.className = b.className.replace(this.config.animateClass, "").trim()) : void 0
		}, e.prototype.customStyle = function (a, b, c, d, e) {
			return b && this.cacheAnimationName(a), a.style.visibility = b ? "hidden" : "visible", c && this.vendorSet(a.style, {
				animationDuration: c
			}), d && this.vendorSet(a.style, {
				animationDelay: d
			}), e && this.vendorSet(a.style, {
				animationIterationCount: e
			}), this.vendorSet(a.style, {
				animationName: b ? "none" : this.cachedAnimationName(a)
			}), a
		}, e.prototype.vendors = ["moz", "webkit"], e.prototype.vendorSet = function (a, b) {
			var c, d, e, f;
			d = [];
			for (c in b) e = b[c], a["" + c] = e, d.push(function () {
				var b, d, g, h;
				for (g = this.vendors, h = [], b = 0, d = g.length; d > b; b++) f = g[b], h.push(a["" + f + c.charAt(0).toUpperCase() + c.substr(1)] = e);
				return h
			}.call(this));
			return d
		}, e.prototype.vendorCSS = function (a, b) {
			var c, e, f, g, h, i;
			for (h = d(a), g = h.getPropertyCSSValue(b), f = this.vendors, c = 0, e = f.length; e > c; c++) i = f[c], g = g || h.getPropertyCSSValue("-" + i + "-" + b);
			return g
		}, e.prototype.animationName = function (a) {
			var b;
			try {
				b = this.vendorCSS(a, "animation-name").cssText
			} catch (c) {
				b = d(a).getPropertyValue("animation-name")
			}
			return "none" === b ? "" : b
		}, e.prototype.cacheAnimationName = function (a) {
			return this.animationNameCache.set(a, this.animationName(a))
		}, e.prototype.cachedAnimationName = function (a) {
			return this.animationNameCache.get(a)
		}, e.prototype.scrollHandler = function () {
			return this.scrolled = !0
		}, e.prototype.scrollCallback = function () {
			var a;
			return !this.scrolled || (this.scrolled = !1, this.boxes = function () {
				var b, c, d, e;
				for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) a = d[b], a && (this.isVisible(a) ? this.show(a) : e.push(a));
				return e
			}.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop()
		}, e.prototype.offsetTop = function (a) {
			for (var b; void 0 === a.offsetTop;) a = a.parentNode;
			for (b = a.offsetTop; a = a.offsetParent;) b += a.offsetTop;
			return b
		}, e.prototype.isVisible = function (a) {
			var b, c, d, e, f;
			return c = a.getAttribute("data-wow-offset") || this.config.offset, f = this.config.scrollContainer && this.config.scrollContainer.scrollTop || window.pageYOffset, e = f + Math.min(this.element.clientHeight, this.util().innerHeight()) - c, d = this.offsetTop(a), b = d + a.clientHeight, e >= d && b >= f
		}, e.prototype.util = function () {
			return null != this._util ? this._util : this._util = new b
		}, e.prototype.disabled = function () {
			return !this.config.mobile && this.util().isMobile(navigator.userAgent)
		}, e
	}()
}).call(this);
"use strict";
const $ = e => document.querySelector(e),
	countdown = function (e) {
		const t = $(e.target).getAttribute("data-date").split("-"),
			r = parseInt(t[0]),
			n = parseInt(t[1]),
			a = parseInt(t[2]);
		let o, d, i = $(e.target).getAttribute("data-time");
		null != i && (i = i.split(":"), o = parseInt(i[0]), d = parseInt(i[1])), (new Date).getFullYear();
		let u = new Date;
		u.getDate(), u.getMonth(), u.getFullYear(), u.getHours(), u.getMinutes();
		const g = new Date(a, n - 1, r, o, d, 0, 0).getTime();
		$(e.target + " .day .word").innerHTML = e.dayWord, $(e.target + " .hour .word").innerHTML = e.hourWord, $(e.target + " .min .word").innerHTML = e.minWord, $(e.target + " .sec .word").innerHTML = e.secWord;
		const s = () => {
			const t = (new Date).getTime(),
				r = g - t,
				n = Math.floor(r / 864e5),
				a = Math.floor(r % 864e5 / 36e5),
				o = Math.floor(r % 36e5 / 6e4),
				d = Math.floor(r % 6e4 / 1e3);
			requestAnimationFrame(s), $(e.target + " .day .num").innerHTML = addZero(n), $(e.target + " .hour .num").innerHTML = addZero(a), $(e.target + " .min .num").innerHTML = addZero(o), $(e.target + " .sec .num").innerHTML = addZero(d), r < 0 && ($(".countdown").innerHTML = "EXPIRED")
		};
		s()
	},
	addZero = e => e < 10 && e >= 0 ? "0" + e : e;
! function () {
	"use strict";
	var e = document.querySelector(".cookiealert"),
		t = document.querySelector(".acceptcookies");
	e && (e.offsetHeight, function (e) {
		for (var t = e + "=", o = decodeURIComponent(document.cookie).split(";"), c = 0; c < o.length; c++) {
			for (var n = o[c];
				" " === n.charAt(0);) n = n.substring(1);
			if (0 === n.indexOf(t)) return n.substring(t.length, n.length)
		}
		return ""
	}("acceptCookies") || e.classList.add("show"), t.addEventListener("click", function () {
		! function (e, t, o) {
			var c = new Date;
			c.setTime(c.getTime() + 24 * o * 60 * 60 * 1e3);
			var n = "expires=" + c.toUTCString();
			document.cookie = e + "=" + t + ";" + n + ";path=/"
		}("acceptCookies", !0, 365), e.classList.remove("show")
	}))
}();