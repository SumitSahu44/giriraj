! function(e) {
	"use strict";
	if (e(window).on("load", (function() {
			e(".preloader").fadeOut()
		})), e(".preloader").length > 0 && e(".preloaderCls").each((function() {
			e(this).on("click", (function(t) {
				t.preventDefault(), e(".preloader").css("display", "none")
			}))
		})), e.fn.thmobilemenu = function(t) {
			var a = e.extend({
				menuToggleBtn: ".th-menu-toggle",
				bodyToggleClass: "th-body-visible",
				subMenuClass: "th-submenu",
				subMenuParent: "th-item-has-children",
				subMenuParentToggle: "th-active",
				meanExpandClass: "th-mean-expand",
				appendElement: '<span class="th-mean-expand"></span>',
				subMenuToggleClass: "th-open",
				toggleSpeed: 400
			}, t);
			return this.each((function() {
				var t = e(this);

				function s() {
					t.toggleClass(a.bodyToggleClass);
					var s = "." + a.subMenuClass;
					e(s).each((function() {
						e(this).hasClass(a.subMenuToggleClass) && (e(this).removeClass(a.subMenuToggleClass), e(this).css("display", "none"), e(this).parent().removeClass(a.subMenuParentToggle))
					}))
				}
				t.find("li").each((function() {
					var t = e(this).find("ul");
					t.addClass(a.subMenuClass), t.css("display", "none"), t.parent().addClass(a.subMenuParent), t.prev("a").append(a.appendElement), t.next("a").append(a.appendElement)
				}));
				var i = "." + a.meanExpandClass;
				e(i).each((function() {
					e(this).on("click", (function(t) {
						var s, i, n;
						t.preventDefault(), s = e(this).parent(), i = e(s).parent(), (n = i.siblings()).removeClass(a.subMenuParentToggle), n.find("ul").slideUp(a.toggleSpeed).removeClass(a.subMenuToggleClass), i.toggleClass(a.subMenuParentToggle), e(s).next("ul").slideToggle(a.toggleSpeed).toggleClass(a.subMenuToggleClass)
					}))
				})), e(a.menuToggleBtn).each((function() {
					e(this).on("click", (function() {
						s()
					}))
				})), t.on("click", (function(e) {
					e.stopPropagation(), s()
				})), t.find("div").on("click", (function(e) {
					e.stopPropagation()
				}))
			}))
		}, e(".th-menu-wrapper").thmobilemenu(), e(window).scroll((function() {
			e(this).scrollTop() > 500 ? (e(".sticky-wrapper").addClass("sticky"), e(".category-menu").addClass("close-category")) : (e(".sticky-wrapper").removeClass("sticky"), e(".category-menu").removeClass("close-category"))
		})), e(".scroll-top").length > 0) {
		var t = document.querySelector(".scroll-top"),
			a = document.querySelector(".scroll-top path"),
			s = a.getTotalLength();
		a.style.transition = a.style.WebkitTransition = "none", a.style.strokeDasharray = s + " " + s, a.style.strokeDashoffset = s, a.getBoundingClientRect(), a.style.transition = a.style.WebkitTransition = "stroke-dashoffset 10ms linear";
		var i = function() {
			var t = e(window).scrollTop(),
				i = e(document).height() - e(window).height(),
				n = s - t * s / i;
			a.style.strokeDashoffset = n
		};
		i(), e(window).scroll(i);
		jQuery(window).on("scroll", (function() {
			jQuery(this).scrollTop() > 50 ? jQuery(t).addClass("show") : jQuery(t).removeClass("show")
		})), jQuery(t).on("click", (function(e) {
			return e.preventDefault(), jQuery("html, body").animate({
				scrollTop: 0
			}, 750), !1
		}))
	}
	e("[data-bg-src]").length > 0 && e("[data-bg-src]").each((function() {
		var t = e(this).attr("data-bg-src");
		e(this).css("background-image", "url(" + t + ")"), e(this).removeAttr("data-bg-src").addClass("background-image")
	})), e("[data-bg-color]").length > 0 && e("[data-bg-color]").each((function() {
		var t = e(this).attr("data-bg-color");
		e(this).css("background-color", t), e(this).removeAttr("data-bg-color")
	})), e("[data-mask-src]").length > 0 && e("[data-mask-src]").each((function() {
		var t = e(this).attr("data-mask-src");
		e(this).css({
			"mask-image": "url(" + t + ")",
			"-webkit-mask-image": "url(" + t + ")"
		}), e(this).addClass("bg-mask"), e(this).removeAttr("data-mask-src")
	})), e(".th-slider").each((function() {
		var t = e(this),
			a = e(this).data("slider-options"),
			s = t.find(".slider-prev"),
			i = t.find(".slider-next"),
			n = t.find(".slider-pagination"),
			o = a.autoplay,
			r = {
				slidesPerView: 1,
				spaceBetween: a.spaceBetween ? a.spaceBetween : 24,
				loop: 0 != a.loop,
				speed: a.speed ? a.speed : 1e3,
				autoplay: o || {
					delay: 6e3,
					disableOnInteraction: !1
				},
				navigation: {
					nextEl: i.get(0),
					prevEl: s.get(0)
				},
				pagination: {
					el: n.get(0),
					clickable: !0,
					renderBullet: function(e, t) {
						return '<span class="' + t + '" aria-label="Go to Slide ' + (e + 1) + '"></span>'
					}
				}
			},
			l = JSON.parse(t.attr("data-slider-options"));
		l = e.extend({}, r, l);
		new Swiper(t.get(0), l);
		if (e(".slider-area").length > 0 && e(".slider-area").closest(".container").parent().addClass("arrow-wrap"), t.hasClass("slider-tab")) var c = new Swiper(t.get(0), l);
		else if (t.hasClass("tab-view")) var d = new Swiper(t.get(0), l);
		else new Swiper(t.get(0), l);
		d & c && (d.controller.control = c, c.controller.control = d)
	})), e("[data-ani]").each((function() {
		var t = e(this).data("ani");
		e(this).addClass(t)
	})), e("[data-ani-delay]").each((function() {
		var t = e(this).data("ani-delay");
		e(this).css("animation-delay", t)
	})), e("[data-slider-prev], [data-slider-next]").on("click", (function() {
		(e(this).data("slider-prev") || e(this).data("slider-next")).split(", ").forEach((function(t) {
			var a = e(t);
			if (a.length) {
				var s = a[0].swiper;
				s && (e(this).data("slider-prev") ? s.slidePrev() : s.slideNext())
			}
		}))
	})), e.fn.activateSliderThumbs = function(t) {
		var a = e.extend({
			sliderTab: !1,
			tabButton: ".tab-btn"
		}, t);
		return this.each((function() {
			var t = e(this),
				s = t.find(a.tabButton),
				i = e('<span class="indicator"></span>').appendTo(t),
				n = t.data("slider-tab"),
				o = e(n)[0].swiper;
			if (s.on("click", (function(t) {
					t.preventDefault();
					var s = e(this);
					if (s.addClass("active").siblings().removeClass("active"), c(s), a.sliderTab) {
						var i = s.index();
						o.slideTo(i)
					}
				})), a.sliderTab) {
				o.on("slideChange", (function() {
					var e = o.realIndex,
						t = s.eq(e);
					t.addClass("active").siblings().removeClass("active"), c(t)
				}));
				var r = o.activeIndex,
					l = s.eq(r);
				l.addClass("active").siblings().removeClass("active"), c(l)
			}

			function c(e) {
				var t = e.position(),
					a = parseInt(e.css("margin-top")) || 0,
					s = parseInt(e.css("margin-left")) || 0;
				i.css("--height-set", e.outerHeight() + "px"), i.css("--width-set", e.outerWidth() + "px"), i.css("--pos-y", t.top + a + "px"), i.css("--pos-x", t.left + s + "px")
			}
		}))
	}, e(".hero-thumb").length && e(".hero-thumb").activateSliderThumbs({
		sliderTab: !0,
		tabButton: ".tab-btn"
	}), e(".service-list-wrap").on("click", (function() {
		e(this).addClass("active").siblings().removeClass("active")
	})), e(".service-prev").on("click", (function() {
		var t;
		(t = e(".service-list-area .service-list-wrap.active")).prev().length > 0 ? (t.removeClass("active"), t.prev().addClass("active")) : (t.removeClass("active"), e(".service-list-area .service-list-wrap:last").addClass("active"))
	})), e(".service-next").on("click", (function() {
		var t;
		(t = e(".service-list-area .service-list-wrap.active")).next().length > 0 ? (t.removeClass("active"), t.next().addClass("active")) : (t.removeClass("active"), e(".service-list-area .service-list-wrap:first").addClass("active"))
	}));
	var n, o, r, l = ".ajax-contact",
		c = '[name="email"]',
		d = e(".form-messages");

	function p() {
		var t = e(l).serialize();
		(function() {
			var t, a = !0;

			function s(s) {
				s = s.split(",");
				for (var i = 0; i < s.length; i++) t = l + " " + s[i], e(t).val() ? (e(t).removeClass("is-invalid"), a = !0) : (e(t).addClass("is-invalid"), a = !1)
			}
			s('[name="name"],[name="email"],[name="subject"],[name="number"],[name="message"]'), e(c).val() && e(c).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/) ? (e(c).removeClass("is-invalid"), a = !0) : (e(c).addClass("is-invalid"), a = !1);
			return a
		})() && jQuery.ajax({
			url: e(l).attr("action"),
			data: t,
			type: "POST"
		}).done((function(t) {
			d.removeClass("error"), d.addClass("success"), d.text(t), e(l + ' input:not([type="submit"]),' + l + " textarea").val("")
		})).fail((function(e) {
			d.removeClass("success"), d.addClass("error"), "" !== e.responseText ? d.html(e.responseText) : d.html("Oops! An error occured and your message could not be sent.")
		}))
	}

	function u(t, a, s, i) {
		e(a).on("click", (function(a) {
			a.preventDefault(), e(t).addClass(i)
		})), e(t).on("click", (function(a) {
			a.stopPropagation(), e(t).removeClass(i)
		})), e(t + " > div").on("click", (function(a) {
			a.stopPropagation(), e(t).addClass(i)
		})), e(s).on("click", (function(a) {
			a.preventDefault(), a.stopPropagation(), e(t).removeClass(i)
		}))
	}

	function h(e) {
		return parseInt(e, 10)
	}
	e(l).on("submit", (function(e) {
		e.preventDefault(), p()
	})), n = ".popup-search-box", o = ".searchClose", r = "show", e(".searchBoxToggler").on("click", (function(t) {
		t.preventDefault(), e(n).addClass(r)
	})), e(n).on("click", (function(t) {
		t.stopPropagation(), e(n).removeClass(r)
	})), e(n).find("form").on("click", (function(t) {
		t.stopPropagation(), e(n).addClass(r)
	})), e(o).on("click", (function(t) {
		t.preventDefault(), t.stopPropagation(), e(n).removeClass(r)
	})), u(".sidemenu-cart", ".sideMenuCart", ".sideMenuCls", "show"), u(".sidemenu-info", ".sideMenuInfo", ".sideMenuCls", "show"), e(".popup-image").magnificPopup({
		type: "image",
		mainClass: "mfp-zoom-in",
		removalDelay: 260,
		gallery: {
			enabled: !0
		}
	}), e(".popup-video").magnificPopup({
		type: "iframe"
	}), e(".popup-content").magnificPopup({
		type: "inline",
		midClick: !0
	}), e.fn.sectionPosition = function(t, a) {
		e(this).each((function() {
			var s, i, n, o, r, l = e(this);
			s = Math.floor(l.height() / 2), i = l.attr(t), n = l.attr(a), o = h(e(n).css("padding-top")), r = h(e(n).css("padding-bottom")), "top-half" === i ? (e(n).css("padding-bottom", r + s + "px"), l.css("margin-top", "-" + s + "px")) : "bottom-half" === i && (e(n).css("padding-top", o + s + "px"), l.css("margin-bottom", "-" + s + "px"))
		}))
	};
	e("[data-sec-pos]").length && e("[data-sec-pos]").imagesLoaded((function() {
		e("[data-sec-pos]").sectionPosition("data-sec-pos", "data-pos-for")
	})), e(".hover-item").hover((function() {
		e(this).addClass("item-active"), e(this).siblings().removeClass("item-active")
	})), e(".filter-active").imagesLoaded((function() {
		if (e(".filter-active").length > 0) {
			var t = e(".filter-active").isotope({
				itemSelector: ".filter-item",
				filter: "*",
				masonry: {}
			});
			e(".filter-menu-active").on("click", "button", (function() {
				var a = e(this).attr("data-filter");
				t.isotope({
					filter: a
				})
			})), e(".filter-menu-active").on("click", "button", (function(t) {
				t.preventDefault(), e(this).addClass("active"), e(this).siblings(".active").removeClass("active")
			}))
		}
	})), e(".masonary-active, .woocommerce-Reviews .comment-list").imagesLoaded((function() {
		var t = ".masonary-active, .woocommerce-Reviews .comment-list";
		e(t).length > 0 && e(t).isotope({
			itemSelector: ".filter-item, .woocommerce-Reviews .comment-list li",
			filter: "*",
			masonry: {
				columnWidth: 1
			}
		}), e('[data-bs-toggle="tab"]').on("shown.bs.tab", (function(a) {
			e(t).isotope({
				filter: "*"
			})
		}))
	})), e(".counter-number").counterUp({
		delay: 10,
		time: 1e3
	}), e(".date-pick").datetimepicker({
		timepicker: !1,
		datepicker: !0,
		format: "d-m-y",
		step: 10
	}), e(".time-pick").datetimepicker({
		datepicker: !1,
		format: "H:i",
		step: 30
	}), e(".date-time-pick").datetimepicker({}), e.fn.shapeMockup = function() {
		e(this).each((function() {
			var t = e(this),
				a = t.data("top"),
				s = t.data("right"),
				i = t.data("bottom"),
				n = t.data("left");
			t.css({
				top: a,
				right: s,
				bottom: i,
				left: n
			}).removeAttr("data-top").removeAttr("data-right").removeAttr("data-bottom").removeAttr("data-left").parent().addClass("shape-mockup-wrap")
		}))
	}, e(".shape-mockup") && e(".shape-mockup").shapeMockup(), e(".progress-bar").waypoint((function() {
		e(".progress-bar").css({
			animation: "animate-positive 1.8s",
			opacity: "1"
		})
	}), {
		offset: "75%"
	}), e.fn.countdown = function() {
		e(this).each((function() {
			var t = e(this),
				a = new Date(t.data("offer-date")).getTime();

			function s(e) {
				return t.find(e)
			}
			var i = setInterval((function() {
				var e = (new Date).getTime(),
					n = a - e,
					o = Math.floor(n / 864e5),
					r = Math.floor(n % 864e5 / 36e5),
					l = Math.floor(n % 36e5 / 6e4),
					c = Math.floor(n % 6e4 / 1e3);
				o < 10 && (o = "0" + o), r < 10 && (r = "0" + r), l < 10 && (l = "0" + l), c < 10 && (c = "0" + c), n < 0 ? (clearInterval(i), t.addClass("expired"), t.find(".message").css("display", "block")) : (s(".day").html(o), s(".hour").html(r), s(".minute").html(l), s(".seconds").html(c))
			}), 1e3)
		}))
	}, e(".counter-list").length && e(".counter-list").countdown(), e.fn.indicator = function() {
		e(this).each((function() {
			var t = e(this),
				a = t.find("a"),
				s = t.find("button");
			t.append('<span class="indicator"></span>');
			var i, n = t.find(".indicator");

			function o() {
				var a = t.find(".active"),
					s = a.css("height"),
					i = a.css("width"),
					o = a.position().top + "px",
					r = a.position().left + "px";
				e(window).on("resize", (function() {
					o = a.position().top + "px", r = a.position().left + "px"
				})), n.get(0).style.setProperty("--height-set", s), n.get(0).style.setProperty("--width-set", i), n.get(0).style.setProperty("--pos-y", o), n.get(0).style.setProperty("--pos-x", r)
			}
			a.length ? i = a : s.length && (i = s), i.on("click", (function(t) {
				t.preventDefault(), e(this).addClass("active"), e(this).siblings(".active").removeClass("active"), o()
			})), o(), e(window).on("resize", (function() {
				o()
			}))
		}))
	}, e(".indicator-active").length && e(".indicator-active").indicator(), e("#compslider").on("input change", t => {
		const a = t.target.value;
		e(".foreground-img").css("width", a + "%"), e(".slider-button").css("left", `calc(${a}% - 32px)`)
	}), e("#ship-to-different-address-checkbox").on("change", (function() {
		e(this).is(":checked") ? e("#ship-to-different-address").next(".shipping_address").slideDown() : e("#ship-to-different-address").next(".shipping_address").slideUp()
	})), e(".woocommerce-form-login-toggle a").on("click", (function(t) {
		t.preventDefault(), e(".woocommerce-form-login").slideToggle()
	})), e(".woocommerce-form-coupon-toggle a").on("click", (function(t) {
		t.preventDefault(), e(".woocommerce-form-coupon").slideToggle()
	})), e(".shipping-calculator-button").on("click", (function(t) {
		t.preventDefault(), e(this).next(".shipping-calculator-form").slideToggle()
	})), e('.wc_payment_methods input[type="radio"]:checked').siblings(".payment_box").show(), e('.wc_payment_methods input[type="radio"]').each((function() {
		e(this).on("change", (function() {
			e(".payment_box").slideUp(), e(this).siblings(".payment_box").slideDown()
		}))
	})), e(".rating-select .stars a").each((function() {
		e(this).on("click", (function(t) {
			t.preventDefault(), e(this).siblings().removeClass("active"), e(this).parent().parent().addClass("selected"), e(this).addClass("active")
		}))
	})), e(".quantity-plus").each((function() {
		e(this).on("click", (function(t) {
			t.preventDefault();
			var a = e(this).siblings(".qty-input"),
				s = parseInt(a.val(), 10);
			isNaN(s) || a.val(s + 1)
		}))
	})), e(".quantity-minus").each((function() {
		e(this).on("click", (function(t) {
			t.preventDefault();
			var a = e(this).siblings(".qty-input"),
				s = parseInt(a.val(), 10);
			!isNaN(s) && s > 1 && a.val(s - 1)
		}))
	})), window.addEventListener("contextmenu", (function(e) {
		e.preventDefault()
	}), !1), document.onkeydown = function(e) {
		return 123 != event.keyCode && ((!e.ctrlKey || !e.shiftKey || e.keyCode != "I".charCodeAt(0)) && ((!e.ctrlKey || !e.shiftKey || e.keyCode != "C".charCodeAt(0)) && ((!e.ctrlKey || !e.shiftKey || e.keyCode != "J".charCodeAt(0)) && ((!e.ctrlKey || e.keyCode != "U".charCodeAt(0)) && void 0))))
	}
}(jQuery);