// ---- START OF MODIFICATION ---- ##CHANGE2
, function(e, t, n) {
    "use strict";
    function o(e) {
        return e && e.__esModule ? e : {
            default: e
        }
    }
    function a(e, t) {
        if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function")
    }
    function r(e, t) {
        if (!e)
            throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return !t || "object" != typeof t && "function" != typeof t ? e : t
    }
    function i(e, t) {
        if ("function" != typeof t && null !== t)
            throw new TypeError("Super expression must either be null or a function, not " + typeof t);
        e.prototype = Object.create(t && t.prototype, {
            constructor: {
                value: e,
                enumerable: !1,
                writable: !0,
                configurable: !0
            }
        }),
        t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
    }
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var o = t[n];
                o.enumerable = o.enumerable || !1,
                o.configurable = !0,
                "value"in o && (o.writable = !0),
                Object.defineProperty(e, o.key, o)
            }
        }
        return function(t, n, o) {
            return n && e(t.prototype, n),
            o && e(t, o),
            t
        }
    }()
      , l = n(1)
      , wrap = o(l)
      , c = o(n(2))
      , p = n(40)
      , h = o(n(6))
      , m = o(n(3))
      , BuilderModule = o(n(10))
      , y = o(n(29))
      , E = o(n(8))
      , w = n(9)
      , M = new p.AllHtmlEntities
      , T = function(e) {
        function t(e) {
            a(this, t);
            var n = r(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
            return n.shouldComponentUpdate = c.default.shouldComponentUpdate.bind(n),
            n.defaultClasses = w.defaultClasses.bind(n),
            n.componentWillMount = w.componentWillMount.bind(n),
            n.componentWillReceiveProps = w.componentWillReceiveProps.bind(n),
            n.inheritModuleClassName = w.inheritModuleClassName.bind(n),
            n.addModuleClassName = w.addModuleClassName.bind(n),
            n.removeModuleClassName = w.removeModuleClassName.bind(n),
            n.orderClassName = w.orderClassName.bind(n),
            n.hideOnMobileClassName = w.hideOnMobileClassName.bind(n),
            n.moduleClassNameArray = w.moduleClassNameArray.bind(n),
            n.moduleClassName = w.moduleClassName.bind(n),
            n.moduleID = w.moduleID.bind(n),
            n.globalSavingClass = w.globalSavingClass.bind(n),
            n.globalModuleClass = w.globalModuleClass.bind(n),
            n
        }
        return i(t, e),
        s(t, [{
            key: "render",
            value: function() {
                var e = this.props.attrs
                  , custom_css = [];
                if (m.default.hasValue(e.max_width_tablet) || m.default.hasValue(e.max_width_phone) || m.default.hasValue(e.max_width)) {
                    var n = {
                        desktop: e.max_width,
                        tablet: e.max_width_tablet,
                        phone: e.max_width_phone
                    };
                    custom_css.push(m.default.generateResponsiveCss(n, "%order_class%", "max-width"))
                }
                var o = M.decode(this.props.content)
                  , a = (0, h.default)({
                    additional_css: custom_css,
                    moduleClassName: this.moduleClassNameArray()
                }, this.props);

                // This is the modified/important part:
                var previewText = '', previewCallback = this.props.type + '_preview';

                if ('function' === typeof window[previewCallback]) {
                    previewText = window[previewCallback].call(this, this.props.attrs, this.props);
                } else {
                    previewText = '<div style="text-align:center;border:2px solid rgba(0,0,0,0.5);background:rgba(0,0,0,0.05);padding:10px">No Preview Available</div>';
                }

                return wrap.default.createElement(
                    BuilderModule.default, a, wrap.default.createElement(
                        'div', {
                            dangerouslySetInnerHTML: {
                                __html: previewText
                            },
                        }
                    )
                )
                // End of the important part!
            }
        }]),
        t
    }(l.Component);
    T.propTypes = E.default,
    t.default = T
}
// ---- END OF MODIFICATION ----
