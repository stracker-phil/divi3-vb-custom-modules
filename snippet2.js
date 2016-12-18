/**
This block possibly needs slight changes for new versions of Divi, because internal references changes with each update.

The below module is based on the Divi "Code" module. So you have to locate that module in the bundle.js code 
and compare it to the code below.

Here are some tipps to do this:
1. Go to the place where you added snippet1.js and identify the ID of the code block
   It might be `code: b.default` (next: find `b`)
   Scroll up until you find a line like `b = o(g)`, and directly above `g = n(376)`
   This means you have to locate module 376!
2. Now the annoying part: Find that module. You have to check each module ID via trial-and-error to identify the module.
   To see the ID of a module simply insert following JS right before a "use strict" line:
   console.log( 'module ID (is it 376?)', e.id);
   (modules are in order, so e.g. when you found module 370 you have to scroll down a bit further)
   Hint: The module should be in the lower half of the file, around line 35.000
3. Now compare the code of the both modules. The top two thirds should be equal.
   Pay attention to the letters and numbers in the block `l = n(1), u = o(2), ...`
   (or simply copy-paste that block from Divi to your custom modification below)
*/

// ---- START OF MODIFICATION ---- ##CHANGE2
// See note in line 55 below
,  function(e, t, n) {
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
      , u = o(l)
      , d = n(2)
      , c = o(d)
      , p = n(40)
      , f = n(7)
      , _ = o(f)
      , h = n(3)
      , m = o(h)
      , g = n(10)
      , b = o(g)
      , v = n(29)
      , y = o(v)
      , C = n(8)
      , E = o(C)
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
                  , t = [];
                if (m.default.hasValue(e.max_width_tablet) || m.default.hasValue(e.max_width_phone) || m.default.hasValue(e.max_width)) {
                    var n = {
                        desktop: e.max_width,
                        tablet: e.max_width_tablet,
                        phone: e.max_width_phone
                    };
                    t.push(m.default.generateResponsiveCss(n, "%%order_class%%", "max-width"))
                }
                var o = M.decode(this.props.content);
                o = o.split("<!-- [et_pb_line_break_holder] -->").join("\n");
                var a = (0,
                _.default)({
                    additional_css: t,
                    moduleClassName: this.moduleClassNameArray()
                }, this.props);

                // This is the modified/important part:
                var previewText = '', previewCallback = this.props.type + '_preview';

                if ('function' === typeof window[previewCallback]) {
                    previewText = window[previewCallback].call(this, this.props.attrs, this.props);
                } else {
                    previewText = '<div style="text-align:center;border:2px solid rgba(0,0,0,0.5);background:rgba(0,0,0,0.05);padding:10px">No Preview Available</div>';
                }

                return u.default.createElement(
                    b.default, a, u.default.createElement(
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
