
(function() {
    (function k() {
        var h = "welcome.hyperesources", e = "welcome", d = "welcome_hype_container";
        if (false == !1)
            try {
                for (var f = document.getElementsByTagName("script"), b = 0; b < f.length; b++) {
                    var a = f[b].src;
                    if (null != a && -1 != a.indexOf("welcome_hype_generated_script.js")) {
                        h = a.substr(0, a.lastIndexOf("/"));
                        break
                    }
                }
            } catch (n) {
            }
        if (false == !1 && null == window.HYPE_322)
            null == window.HYPE_dtl_322 ? (window.HYPE_dtl_322 = [], window.HYPE_dtl_322.push(k), e = document.getElementsByTagName("head")[0], d = document.createElement("script"),
                    b = navigator.userAgent.match(/MSIE (\d+\.\d+)/), b = parseFloat(b && b[1]) || null, d.type = "text/javascript", d.src = h + "/" + (null != b && 10 > b ? "HYPE.ie.js" : "HYPE.js") + "?hype_version=322", e.appendChild(d)) : window.HYPE_dtl_322.push(k);
        else {
            f = window.HYPE.documents;
            if (null != f[e]) {
                a = 1;
                b = e;
                do
                    e = "" + b + "-" + a++;
                while (null != f[e]);
                for (var c = document.getElementsByTagName("div"), a = !1, b = 0; b < c.length; b++)
                    if (c[b].id == d && null == c[b].getAttribute("HYP_dn")) {
                        var a = 1, g = d;
                        do
                            d = "" + g + "-" + a++;
                        while (null != document.getElementById(d));
                        c[b].id =
                                d;
                        a = !0;
                        break
                    }
                if (!1 == a)
                    return
            }
            for (var a = new HYPE_322, c = [], c = [], g = {}, l = {}, b = 0; b < c.length; b++)
                try {
                    l[c[b].identifier] = c[b].name, g[c[b].name] = eval("(function(){return " + c[b].source + "})();")
                } catch (m) {
                    a.log(m), g[c[b].name] = function() {
                    }
                }
            a.z_a({R: 5, S: 0, aI: 0, T: 0, bG: 3, aJ: 0, bH: 2, aK: 0, X: 0, bI: 3, aL: 0, Y: 1, bJ: 3, bK: 3, bL: 3, a: 0, b: 0, c: 0, d: 0, aS: 0, e: 3, bQ: 0, aT: 0, f: 2, g: 5, bR: 2, aU: 0, bS: "NumberValueTransformer", aV: 0, aW: 3, A: 5, l: 2, aX: 0, B: 5, m: 5, C: 5, aY: 2, n: 5, D: 5, E: 0, aZ: 0, G: 5, t: 0, bA: 5, RotationAngle: 2, tX: 4, bB: 0, M: 0, N: 0, bC: 0, tY: 4, O: 0, P: 0, Q: 0});
            a.z_b({"7": {p: 1, n: "welcome2%402x.jpg", g: "10", o: true, t: "@2x"}, "3": {p: 1, n: "welcome5%402x.jpg", g: "4", o: true, t: "@2x"}, "8": {p: 1, n: "welcome1.jpg", g: "12", t: "@1x"}, "4": {p: 1, n: "welcome4.jpg", g: "6", t: "@1x"}, "0": {p: 1, n: "welcome6.jpg", g: "2", o: true, t: "@1x"}, "5": {p: 1, n: "welcome3.jpg", g: "8", t: "@1x"}, "1": {p: 1, n: "welcome6%402x.jpg", g: "2", o: true, t: "@2x"}, "6": {p: 1, n: "welcome2.jpg", g: "10", o: true, t: "@1x"}, "2": {p: 1, n: "welcome5.jpg", g: "4", o: true, t: "@1x"}});
            a.z_c([]);
            a.z_d([{x: 0, p: "600px", c: "#FFFFFF", v: {"13": {h: "12", p: "no-repeat", x: "visible", a: 0, q: "100% 100%", b: 23, j: "absolute", r: "inline", c: 750, k: "div", z: "6", d: 473, bF: "14"}, "3": {h: "2", p: "no-repeat", x: "visible", a: 3000, q: "100% 100%", b: 5, j: "absolute", r: "inline", c: 750, k: "div", z: "1", d: 514, bF: "14"}, "7": {h: "6", p: "no-repeat", x: "visible", a: 3750, q: "100% 100%", b: 0, j: "absolute", r: "inline", c: 750, k: "div", z: "3", d: 520, bF: "14"}, "11": {h: "10", p: "no-repeat", x: "visible", a: 750, q: "100% 100%", b: 11, j: "absolute", r: "inline", c: 750, k: "div", z: "5", d: 498, bF: "14"}, "14": {k: "div", x: "visible", c: 4500, d: 520, z: "1", a: 0, bS: "63", j: "absolute", b: -65}, "9": {h: "8", p: "no-repeat", x: "visible", a: 1500, q: "100% 100%", b: 11, j: "absolute", r: "inline", c: 750, k: "div", z: "4", d: 501, bF: "14"}, "5": {h: "4", p: "no-repeat", x: "visible", a: 2250, q: "100% 100%", b: 12, j: "absolute", r: "inline", c: 750, k: "div", z: "2", d: 500, bF: "14"}}, n: "Untitled Scene", T: {kTimelineDefaultIdentifier: {i: "kTimelineDefaultIdentifier", n: "Main Timeline", z: 14, a: [{f: "2", p: 2, y: 0, z: 14, i: "ActionHandler", e: {a: [{p: 3, b: "kTimelineDefaultIdentifier", z: true}]}, s: {a: [{p: 8, b: "kTimelineDefaultIdentifier", z: false}]}, o: "kTimelineDefaultIdentifier"}, {f: "2", y: 1.15, z: 1, i: "a", e: -749, s: 0, o: "14"}, {f: "2", y: 1.15, z: 1, i: "b", e: -65, s: -65, o: "14"}, {f: "2", y: 2.15, z: 1.15, i: "a", e: -749, s: -749, o: "14"}, {y: 2.15, i: "b", s: -65, z: 0, o: "14", f: "2"}, {f: "2", y: 4, z: 1, i: "a", e: -1501, s: -749, o: "14"}, {f: "2", y: 5, z: 1.15, i: "a", e: -1501, s: -1501, o: "14"}, {f: "2", y: 6.15, z: 1, i: "a", e: -2251, s: -1501, o: "14"}, {f: "2", y: 7.15, z: 1.15, i: "a", e: -2251, s: -2251, o: "14"}, {f: "2", y: 9, z: 1, i: "a", e: -3000, s: -2251, o: "14"}, {f: "2", y: 10, z: 1.15, i: "a", e: -3000, s: -3000, o: "14"}, {f: "2", y: 11.15, z: 1, i: "a", e: -3752, s: -3000, o: "14"}, {y: 12.15, i: "a", s: -3752, z: 0, o: "14", f: "2"}, {f: "2", p: 2, y: 14, z: 0, i: "ActionHandler", s: {a: [{p: 3, b: "kTimelineDefaultIdentifier", z: true}]}, o: "kTimelineDefaultIdentifier"}], f: 30}}, o: "1"}]);
            a.z_q(750, 300);
            a.z_e(l);
            a.z_p = g;
            a.z_f(0);
            a.z_g(d);
            a.z_h(h);
            a.z_i(0);
            a.z_j(false);
            a.z_k(true);
            a.z_l(true);
            a.z_m(true);
            a.z_n(e);
            f[e] = a.API;
            document.getElementById(d).setAttribute("HYP_dn", e);
            a.z_o(this.body)
        }
    })();
})();
