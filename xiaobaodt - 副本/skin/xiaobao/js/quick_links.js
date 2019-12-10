// ******************************************************************common开始*******************************************************************

(function (global, document, undefined) { var rblock = /\{([^\}]*)\}/g, ds = global.ds = { noop: function () { }, mix: function (target, source, cover) { if (typeof source !== "object") { cover = source; source = target; target = this } for (var k in source) { if (cover || target[k] === undefined) { target[k] = source[k] } } return target }, mixStr: function (sStr) { var args = Array.prototype.slice.call(arguments, 1); return String(sStr).replace(rblock, function (a, i) { return args[i] != null ? args[i] : a }) }, trim: function (str) { return String(str).replace(/^\s*/, "").replace(/\s*$/, "") }, getRndNum: function (max, min) { min = isFinite(min) ? min : 0; return Math.random() * ((isFinite(max) ? max : 1000) - min) + min }, scrollTo: (function () { var duration = 480, view = $(global), setTop = function (top) { global.scrollTo(0, top) }, fxEase = function (t) { return (t *= 2) < 1 ? 0.5 * t * t : 0.5 * (1 - (--t) * (t - 2)) }; return function (top, callback) { top = Math.max(0, ~~top); var tMark = new Date(), currTop = view.scrollTop(), height = top - currTop, fx = function () { var tMap = new Date() - tMark; if (tMap >= duration) { setTop(top); return (callback || ds.noop).call(ds, top) } setTop(currTop + height * fxEase(tMap / duration)); setTimeout(fx, 16) }; fx() } })(), loadScriptCache: {}, loadScript: function (url, callback, args) { var cache = this.loadScriptCache[url]; if (!cache) { cache = this.loadScriptCache[url] = { callbacks: [], url: url }; var firstScript = document.getElementsByTagName("script")[0], script = document.createElement("script"); if (typeof args === "object") { for (var k in args) { script[k] = args[k] } } script.src = url; script.onload = script.onreadystatechange = script.onerror = function () { if (/undefined|loaded|complete/.test(this.readyState)) { script = script.onreadystatechange = script.onload = script.onerror = null; cache.loaded = true; for (var i = 0, len = cache.callbacks.length; i < len; i++) { cache.callbacks[i].call(null, url) } cache.callbacks = [] } }; firstScript.parentNode.insertBefore(script, firstScript) } if (!cache.loaded) { if (typeof callback === "function") { cache.callbacks.push(callback) } } else { (callback || ds.noop).call(null, url) } return this }, requestAnimationFrame: (function () { var handler = global.requestAnimationFrame || global.webkitRequestAnimationFrame || global.mozRequestAnimationFrame || global.msRequestAnimationFrame || global.oRequestAnimationFrame || function (callback) { return global.setTimeout(callback, 1000 / 60) }; return function (callback) { return handler(callback) } })(), animate: (function () { var easeOut = function (pos) { return (Math.pow((pos - 1), 3) + 1) }; getCurrCSS = global.getComputedStyle ? function (elem, name) { return global.getComputedStyle(elem, null)[name] } : function (elem, name) { return elem.currentStyle[name] }; return function (elem, name, to, duration, callback, easing) { var from = parseFloat(getCurrCSS(elem, name)) || 0, style = elem.style, tMark = new Date(), size = 0; function fx() { var elapsed = +new Date() - tMark; if (elapsed >= duration) { style[name] = to + "px"; return (callback || ds.noop).call(elem) } style[name] = (from + size * easing(elapsed / duration)) + "px"; ds.requestAnimationFrame(fx) } to = parseFloat(to) || 0; duration = ~~duration || 200; easing = easing || easeOut; size = to - from; fx(); return this } })(), getCookie: function (name) { var ret = new RegExp("(?:^|[^;])" + name + "=([^;]+)").exec(document.cookie); return ret ? decodeURIComponent(ret[1]) : "" }, setCookie: function (name, value, expir) { var cookie = name + "=" + encodeURIComponent(value); if (expir !== void 0) { var now = new Date(); now.setDate(now.getDate() + ~~expir); cookie += "; expires=" + now.toGMTString() } document.cookie = cookie }, transitionSupport: (function () { var name = "", prefixs = ["", "webkit", "moz", "ms", "o"], docStyle = (document.documentElement || document.body).style; for (var i = 0, len = prefixs.length; i < len; i++) { name = prefixs[i] + (prefixs[i] !== "" ? "Transition" : "transition"); if (name in docStyle) { return { propName: name, prefix: prefixs[i] } } } return null })(), isIE6: !-[1, ] && !global.XMLHttpRequest } })(this, document); (function (global) { var ds = global.ds || (global.ds = {}); var rarg1 = /\$1/g, rgquote = /\\"/g, rbr = /([\r\n])/g, rchars = /(["\\])/g, rdbgstrich = /\\\\/g, rfuns = /<%\s*(\w+|.)([\s\S]*?)\s*%>/g, rbrhash = { "10": "n", "13": "r" }, helpers = { "=": { render: "__.push($1);" } }; ds.tmpl = function (tmpl, data) { var render = new Function("_data", "var __=[];__.data=_data;" + 'with(_data){__.push("' + tmpl.replace(rchars, "\\$1").replace(rfuns, function (a, key, body) { body = body.replace(rbr, ";").replace(rgquote, '"').replace(rdbgstrich, "\\"); var helper = helpers[key], tmp = !helper ? key + body : typeof helper.render === "function" ? helper.render.call(ds, body, data) : helper.render.replace(rarg1, body); return '");' + tmp + '__.push("' }).replace(rbr, function (a, b) { return "\\" + (rbrhash[b.charCodeAt(0)] || b) }) + '");}return __.join("");'); return data ? render.call(data, data) : render }; ds.tmpl.helper = helpers })(this); (function (global, document, $, undefined) {
    var DOC = $(document), _noop = function () { }, ds = global.ds || (global.ds = {}); var _uuid = 0, _ops = { id: null, anim: true, animDuration: 320, zIndex: 999, opacity: 0.8, background: "#000", onshow: _noop, onhide: _noop, onclick: _noop }, Mask = ds.Mask = function (ops) { return this.init(ops) }; Mask._cache = {}; Mask.prototype = {
        constructor: Mask, init: function (ops) {
            this.ops = ops = ops || {}; $.each(_ops, function (k, val) { typeof ops[k] === "undefined" && (ops[k] = val) }); var id = ops.id; if (typeof id !== "string") {
                id = "ds_mask_" + (++_uuid)
            } this.id = id; if (Mask._cache[id]) { var _mask = Mask._cache[id]; _mask.ops = ops; return _mask } Mask._cache[id] = this; return this
        }, _getElem: function () { var elem = this.elem, self = this; if (!elem) { var ops = this.ops, css = "border:0;margin:0;padding:0;height:100%;width:100%;left:0;top:0;opacity:0;"; elem = this.elem = $(document.createElement("div")); elem.bind("click.jquery_mask", function () { self.ops.onclick.call(self) }); elem[0].style.cssText = css + "display:none;position:fixed;background:" + ops.background + ";z-index:" + ops.zIndex; if (!Mask.fixedPositionSupport()) { elem[0].style.position = "absolute"; css += "position:absolute;filter:Alpha(opacity=0);"; elem[0].innerHTML = '<iframe src="javascript:false" frameborder="0" height="100%" width="100%" style="' + css + 'z-index:1;"></iframe><div style="' + css + 'background:#fff;z-index:9;"></div>' } elem[0].id = this.id; elem.appendTo("body") } return elem }, show: function (opacity) { var self = this, ops = this.ops, elem = this._getElem(); opacity = typeof opacity === "number" ? opacity : ops.opacity; if (!Mask.fixedPositionSupport()) { elem.css("height", DOC.height()) } this.elem.css("background", ops.background).show(); if (ops.anim) { elem.stop().animate({ opacity: opacity }, ops.animDuration, function () { ops.onshow.call(self, opacity) }) } else { elem.stop().css("opacity", opacity); ops.onshow.call(this, opacity) } return this }, hide: function () { var self = this, ops = this.ops, elem = this._getElem(); if (ops.onhide.call(this) !== false) { if (ops.anim) { elem.stop().animate({ opacity: 0 }, ops.animDuration, function () { this.style.display = "none" }) } else { elem[0].style.display = "none" } } return this }, destory: function () { if (this.elem) { this.elem.remove(); this.elem = null } delete Mask._cache[this.id] }
    }; Mask.fixedPositionSupport = function () { if (typeof $.support.fixedPosition === "boolean") { return $.support.fixedPosition } var div, ret = false, body = document.body, css = "border:0;margin:0;padding:0;position:fixed;left:0;top:20px;"; if (body) { div = document.createElement("div"); div.style.cssText = css + "position:absolute;top:0;"; div.innerHTML = '<div style="' + css + '"></div>'; body.insertBefore(div, body.firstChild); ret = $.support.fixedPosition = div.firstChild.offsetTop === 20; body.removeChild(div) } return ret }; ds.mask = $.mask = function (opacity, background) { var ops = typeof opacity === "object" ? opacity : { opacity: opacity, background: background }; ops.id = "ds_global_mask"; return new Mask(ops).show() }
})(this, this.document, jQuery); (function (global, document, $, undefined) {
    var view = $(global), DOC = $(document), ds = global.ds || (global.ds = {}); var _guid = 0, _noop = function () { }, _tmpl = '<div class="ds_dialog_outer"><table class="ds_dialog_border"><tr><td class="ds_dialog_tl"></td><td class="ds_dialog_tc"></td><td class="ds_dialog_tr"></td></tr><tr><td class="ds_dialog_ml"></td><td class="ds_dialog_mc"><div class="ds_dialog_inner"><table class="ds_dialog_panel"><tr><td colspan="2" class="ds_dialog_header"><div class="ds_dialog_title"><h3></h3></div><div class="ds_dialog_close"><a href="javascript:;">\u00d7</a></div></td></tr><tr><td class="ds_dialog_icon" style="display:none"><div class="ds_dialog_icon_bg"></div></td><td class="ds_dialog_main"><div id="{id}_content" class="ds_dialog_content"></div></td></tr><tr><td colspan="2" class="ds_dialog_footer"><div class="ds_dialog_buttons"></div></td></tr></table></div></td><td class="ds_dialog_mr"></td></tr><tr><td class="ds_dialog_bl"></td><td class="ds_dialog_bc"></td><td class="ds_dialog_br"></td></tr></table></div>', _ops = { id: null, title: null, content: "", className: null, padding: "20px 25px", height: "auto", width: "auto", left: "50%", top: "40%", zIndex: 1990, icon: null, iconBasePath: global.iconBasePath || "images/", buttons: null, follow: null, followOffset: null, autoOpen: true, esc: true, lock: true, lockOpacity: 0.6, lockColor: "#000", showCloseButton: true, drag: true, fixed: true, anim: true, animDuration: 320, timeout: 0, oninit: _noop, onopen: _noop, onfocus: _noop, onmaskclick: _noop, onhide: _noop, onclose: _noop, yesText: "\u786e\u5b9a", noText: "\u53d6\u6d88", onyes: null, onno: null }, Dialog = ds.Dialog = function (ops) { return this.init(ops || {}) }; $.extend(Dialog, { items: {}, defaults: _ops, currIndex: 1990, defaultTmpl: _tmpl, activeDialog: null, dialogQueue: [], addDialog: function (dialog) { var queue = this.dialogQueue; this.removeDialog(dialog); queue.push(dialog); dialog.inQueue = true; dialog.queueIndex = queue.length - 1 }, removeDialog: function (dialog) { var i = dialog.queueIndex, queue = this.dialogQueue; if (dialog.inQueue) { queue.splice(i, 1); for (var len = queue.length; i < len; i++) { queue[i].queueIndex-- } } dialog.inQueue = false; dialog.queueIndex = -1 }, maskQueue: [], addMask: function (dialog) { this.removeMask(dialog); this.maskQueue.push(dialog); dialog.maskIndex = this.maskQueue.length - 1 }, removeMask: function (dialog) { var i = dialog.maskIndex, maskQueue = this.maskQueue; if (dialog.locked) { maskQueue.splice(i, 1); for (var len = maskQueue.length; i < len; i++) { maskQueue[i].maskIndex-- } } dialog.maskIndex = -1 } }); Dialog.items = {}; Dialog.defaults = _ops; Dialog.currZIndex = 1990; Dialog.defaultTmpl = _tmpl; Dialog.prototype = {
        version: "2.0", constructor: Dialog, init: function (ops) {
            var id = typeof ops.id === "string" ? ops.id : ("ds_dialog_" + (++_guid)); if (Dialog.items[id]) {
                var dialog = Dialog.items[id], rOps = dialog.ops;
                var opsChangeMaps = { left: 1, top: 1, follow: 1, onopen: 1, onfocus: 1, onhide: 1, onclose: 1, onyes: 1, onno: 1, esc: 2, lock: 2, anim: 2, drag: 2, fixed: 2, autoOpen: 2, icon: 3, content: 3 }; $.each(ops, function (k, val) { if (k in opsChangeMaps && val !== void 0) { var type = opsChangeMaps[k]; if (type === 2) { val = !!val } if (val !== rOps[k]) { rOps[k] = val; type === 3 && dialog[k](val) } } }); dialog[rOps.drag ? "initDrag" : "releaseDrag"](); dialog[rOps.fixed ? "initFixed" : "releaseFixed"](); rOps.autoOpen && dialog.show(); return dialog
            } $.each(_ops, function (k, val) { typeof ops[k] === "undefined" && (ops[k] = val) }); if (!$.isArray(ops.followOffset)) { ops.followOffset = [0, 0] } this.id = id; this.ops = ops; this._getElem(ops); Dialog.items[id] = this; this._initEvent(); this.padding(ops.padding).size(ops.width, ops.height).title(ops.title).button(ops.buttons).icon(ops.icon).content(ops.content).timeout(ops.timeout); typeof ops.oninit === "function" && ops.oninit.call(this); ops.fixed && this.initFixed && this.initFixed(); ops.drag && this.initDrag && this.initDrag(); ops.autoOpen && this.show()
        }, _getElem: function (ops) { var shell = document.createElement("div"); shell.id = this.id; shell.tabIndex = -1; shell.style.position = "absolute"; shell.className = "ds_dialog" + (ops.className ? " " + ops.className : ""); shell.innerHTML = Dialog.defaultTmpl.replace(/\{id\}/g, this.id); shell = this.shell = $(shell); this.contentShell = shell.find(".ds_dialog_content").eq(0); this.buttonShell = shell.find(".ds_dialog_buttons").eq(0); this.titleShell = shell.find(".ds_dialog_title").eq(0); this.closeShell = shell.find(".ds_dialog_close").eq(0); this.iconShell = shell.find(".ds_dialog_icon").eq(0); this.closeShell[ops.showCloseButton ? "show" : "hide"](); var buttons = ops.buttons; if (!$.isArray(buttons)) { buttons = ops.buttons = [] } if (ops.onyes === true || typeof ops.onyes === "function") { buttons.push({ autoFocus: true, text: ops.yesText, className: "ds_dialog_yes", onclick: function () { return $.type(ops.onyes) === "function" && ops.onyes.call(this) === false || !ops.onyes ? false : this.hide() } }) } if (ops.onno === true || typeof ops.onno === "function") { buttons.push({ text: ops.noText, className: "ds_dialog_no", onclick: function () { return $.type(ops.onno) === "function" && ops.onno.call(this) === false || !ops.onno ? false : this.hide() } }) } return shell }, _initEvent: function () { var self = this; this.closeShell.bind("click", function (e) { e.stopPropagation(); e.preventDefault(); self.hide() }); this.shell.bind("mousedown", function () { self.focus() }) }, isOpen: false, show: function (left, top) { var ops = this.ops, shell = this.shell; if (!this._inDOM) { this._inDOM = true; shell.appendTo("body") } if (!this.isOpen) { ops.lock && this.lock(); !ops.follow || arguments.length >= 1 ? this.position(left || ops.left, top || ops.top) : this.follow(ops.follow, ops.followOffset[0], ops.followOffset[1]); ops.anim ? shell.stop().animate({ opacity: 1 }, ops.animDuration) : shell.stop().css("opacity", 1); shell.css("display", "block"); this.isOpen = true; ops.onopen.call(this) } return this.focus() }, hide: function () { var ops = this.ops; if (this.isOpen) { this.isOpen = false; if (ops.onhide.call(this) !== false) { this.blur().unlock(); ops.anim ? this.shell.stop().animate({ opacity: 0 }, ops.animDuration, function () { this.style.display = "none" }) : this.shell.stop().hide(); Dialog.removeDialog(this) } else { this.isOpen = true } } return this }, focus: function () { var ops = this.ops; if (this.isOpen && !this.hasFocus && ops.onfocus.call(this) !== false) { Dialog.activeDialog && Dialog.activeDialog._blur(); Dialog.addDialog(this); var shell = this.shell; this.zIndex = Dialog.currZIndex = Math.max(++Dialog.currZIndex, this.ops.zIndex); shell.addClass("ds_dialog_active").css("zIndex", this.zIndex); if ("focus" in shell[0]) { shell[0].focus(); this.focusButton && this.focusButton.focus() } Dialog.activeDialog = this; this.hasFocus = true } return this }, _blur: function () { this.hasFocus = false; this.shell.removeClass("ds_dialog_active") }, blur: function () { if (this.hasFocus) { this._blur(); var queue = Dialog.dialogQueue, len = queue.length; if (len > 1) { queue[len - 2].focus() } else { Dialog.activeDialog = null } } return this }, close: function () { var self = this, ops = this.ops; if (this.shell && ops.onclose.call(this) !== false) { if (ops.anim) { this.hide(); setTimeout(function () { self.destory() }, ops.animDuration) } else { this.hide().destory() } } }, timeout: function (delay) { var self = this; clearTimeout(this.timer); if (~~delay > 0) { this.timer = setTimeout(function () { self.close() }, ~~delay * 1000) } return this }, destory: function () { delete Dialog.items[this.id]; if (this.shell) { this.shell.hide().remove() } this.shell = this.contentShell = this.buttonShell = this.titleShell = this.closeShell = this.iconShell = this.focusButton = null }, _getPositionLimit: function () {
            var ops = this.ops, shell = this.shell, offset = shell.offset(), viewScrollLeft = view.scrollLeft(), viewScrollTop = view.scrollTop(), shellWidth = shell.outerWidth(), shellHeight = shell.outerHeight(), viewWidth = view.width(), viewHeight = view.height(), minTop = ops.fixed ? 0 : viewScrollTop, minLeft = ops.fixed ? 0 : viewScrollLeft, maxTop = minTop + viewHeight - shellHeight, maxLeft = minLeft + viewWidth - shellWidth; return { minTop: minTop, minLeft: minLeft, maxTop: maxTop, maxLeft: maxLeft, viewHeight: viewHeight, viewWidth: viewWidth, height: shellHeight, width: shellWidth, top: offset.top, left: offset.left, viewScrollTop: viewScrollTop, viewScrollLeft: viewScrollLeft }
        }, _position: function (left, top) { var ops = this.ops, style = this.shell[0].style; style.left = left + "px"; style.top = top + "px" }, position: function (left, top) { if (arguments.length < 1) { return this.shell.offset() } var ops = this.ops, rper = /(\d+\.?\d+)%/, limit = this._getPositionLimit(); if (rper.test(left)) { left = (limit.viewWidth - limit.width) * parseFloat(RegExp.$1) / 100; left += ops.fixed ? 0 : limit.viewScrollLeft } if (rper.test(top)) { top = (limit.viewHeight - limit.height) * parseFloat(RegExp.$1) / 100; top += ops.fixed ? 0 : limit.viewScrollTop } left = Math.max(limit.minLeft, Math.min(limit.maxLeft, left)); top = Math.max(limit.minTop, Math.min(limit.maxTop, top)); this._position(left, top); return this }, size: function (width, height) { this.contentShell.css("width", width).css("height", height); return this }, padding: function (padding) { this.contentShell.css("padding", padding); return this }, follow: (function () { var _offsetMaps = { left: function () { return 0 }, right: function (shell, target) { return target.outerWidth() - shell.outerWidth() }, top: function (shell, target) { return -shell.outerHeight() }, bottom: function (shell, target) { return target.outerHeight() } }, _getOffset = function (shell, target, _offset) { if (_offsetMaps[_offset[0]]) { _offset[0] = _offsetMaps[_offset[0]](shell, target) } if (_offsetMaps[_offset[1]]) { _offset[1] = _offsetMaps[_offset[1]](shell, target) } return [~~_offset[0], ~~_offset[1]] }; return function (target, left, top) { target = $(target); var pos = $(target).offset(), offset = _getOffset(this.shell, target, [left, top]); if (this.ops.fixed) { pos.left -= view.scrollLeft(); pos.top -= view.scrollTop() } return this.position(pos.left + offset[0], pos.top + offset[1]) } })(), title: function (title) { if (!title) { this.titleShell.hide() } else { this.titleShell.html("<h3>" + title + "</h3>"); this.titleShell.show() } return this }, content: function (content) { this.contentShell.html(content); return this.position(this.ops.left, this.ops.top) }, button: function (buttons) { var self = this, ops = this.ops, shell = this.buttonShell.hide(); if ($.isArray(buttons) && buttons.length > 0) { $.each(buttons, function (i) { var btn = document.createElement("button"); btn.disabled = this.disabled; btn.innerHTML = "<span>" + this.text + "</span>"; btn.className = this.className + (this.disabled ? " disabled" : ""); btn = $(btn); var onclick = this.onclick; btn.bind("click", function (e) { e.stopPropagation(); typeof onclick === "function" && onclick.call(self, this, e) }); if (this.autoFocus) { self.focusButton = btn } shell.append(btn) }); shell.show() } return this }, icon: function (iconUrl) { var shell = this.iconShell; if (!!iconUrl) { shell.find("div")[0].style.backgroundImage = "url(" + this.ops.iconBasePath + iconUrl + ")"; shell.show() } else { shell.hide() } return this }, lock: function (opacity, lockColor) { var ops = this.ops, mask = Dialog.mask; if (!mask) { mask = Dialog.mask = new ds.Mask({ opacity: _ops.lockOpacity, background: _ops.lockColor, onclick: function () { var dialog = Dialog.activeDialog; dialog && dialog.ops.onmaskclick.call(dialog) } }) } Dialog.addMask(this); lockColor = lockColor || ops.lockColor; if (mask._lastBackground !== lockColor) { mask._lastBackground = lockColor; mask._getElem().css("background", lockColor) } mask.show(opacity || ops.opacity); this.locked = true; return this }, unlock: function () { if (this.locked) { Dialog.removeMask(this); var maskQueue = Dialog.maskQueue; if (maskQueue.length > 0) { maskQueue[maskQueue.length - 1].lock() } else { Dialog.mask.hide() } this.locked = false } return this }
    }; (function () { var rinput = /INPUT|TEXTAREA/i; DOC.bind("keydown", function (e) { var dialog = Dialog.activeDialog; if (dialog && dialog.ops.esc && e.keyCode === 27 && !rinput.test(e.target.nodeName)) { dialog.hide() } }) })(); $.extend(Dialog.prototype, (function () { var supportFixed; return { initFixed: function () { if (typeof supportFixed !== "boolean") { supportFixed = ds.Mask.fixedPositionSupport() } if (!this._initFixed) { var shell = this.shell; shell[0].style.position = supportFixed ? "fixed" : "absolute"; this.ops.fixed = true; if (!supportFixed) { this.ops.fixed = false } this._initFixed = true } return this }, releaseFixed: function () { if (this._initFixed) { var pos = this.position(), scrollLeft = view.scrollLeft(), scrollTop = view.scrollTop(); this.position(pos.left + scrollLeft, pos.top + scrollTop); this.shell[0].style.position = "absolute"; this.ops.fixed = false } return this } } })()); $.extend(Dialog.prototype, (function () {
        var html = document.documentElement, hasCapture = "setCapture" in html, hasCaptureEvt = "onlosecapture" in html, clearRanges = "getSelection" in global ? function () { global.getSelection().removeAllRanges() } : function () { document.selection && document.selection.empty() }, isNotDragArea = function (dialog, target) { var content = dialog.contentShell[0], close = dialog.closeShell[0]; if (target == content || $.contains(content, target) || target === close || $.contains(close, target) || $.contains(dialog.buttonShell[0], target)) { return true } return false }; return {
            initDrag: function () {
                if (!this._dragHandler) {
                    var self = this; this._dragHandler = function (e) {
                        if (e.button !== 0 && e.button !== 1 || isNotDragArea(self, e.target)) { return } var ops = self.ops, shell = self.shell, limit = self._getPositionLimit(), currDrag = Dialog._currDrag = {
                            limit: limit, dialog: self, offsetTop: e.pageY - limit.top, offsetLeft: e.pageX - limit.left, onmousemove: function (e) {
                                var top = e.pageY - currDrag.offsetTop, left = e.pageX - currDrag.offsetLeft;
                                top -= ops.fixed ? limit.viewScrollTop : 0; left -= ops.fixed ? limit.viewScrollLeft : 0; top = Math.min(limit.maxTop, top); left = Math.min(limit.maxLeft, left); ops.top = Math.max(limit.minTop, top); ops.left = Math.max(limit.minLeft, left); self._position(ops.left, ops.top); clearRanges()
                            }, onmouseup: function () { hasCapture && shell[0].releaseCapture(); hasCaptureEvt ? shell.unbind("losecapture", currDrag.onmouseup) : view.unbind("blur", currDrag.onmouseup); DOC.unbind("mousemove", currDrag.onmousemove).unbind("mouseup", currDrag.onmouseup); shell.removeClass("ds_dialog_drag"); Dialog._currDrag = null }
                        }; hasCaptureEvt ? shell.bind("losecapture", currDrag.onmouseup) : view.bind("blur", currDrag.onmouseup); hasCapture && shell[0].setCapture(); DOC.bind("mousemove", currDrag.onmousemove).bind("mouseup", currDrag.onmouseup); shell.addClass("ds_dialog_drag"); return false
                    }; this.shell.bind("mousedown", this._dragHandler)
                } return this
            }, releaseDrag: function () { if (this._dragHandler) { this.shell.unbind("mousedown", this._dragHandler); this._dragHandler = null } return this }
        }
    })()); ds.dialog = function (ops, onyes, onno) { if (typeof ops === "string") { ops = { content: ops, title: arguments[1] || "\u6d88\u606f\u63d0\u793a", onyes: onyes, onno: onno } } return new Dialog(ops || {}) }; $.extend(ds.dialog, { items: Dialog.items, alert: function (content, onhide, icon) { if (typeof onhide === "string") { icon = onhide } return new Dialog({ id: "ds_dialog_alert", fixed: true, left: "50%", top: "40%", icon: icon ? icon : "info.png", title: "\u6d88\u606f\u63d0\u793a", content: content, buttons: [{ text: "\u786e\u5b9a", autoFocus: true, className: "ds_dialog_yes", onclick: function () { this.close() } }], onhide: typeof onhide === "function" ? onhide : function () { } }) }, confirm: function (content, onyes, onno, onhide) { return new Dialog({ id: "ds_dialog_confirm", fixed: true, left: "50%", top: "40%", icon: "confirm.png", title: "\u6d88\u606f\u786e\u8ba4", content: content, onyes: onyes || true, onhide: onhide, onno: onno || true }) }, prompt: function (content, onyes, defaultValue) { return new Dialog({ id: "ds_dialog_prompt", fixed: true, left: "50%", top: "40%", icon: "confirm.png", title: "\u6d88\u606f\u786e\u8ba4", content: '<p style="margin:0;padding:0 0 5px;">' + content + '</p><div><input type="text" style="color:#333;font-size:12px;padding:.42em .33em;width:18em;" /></div>', onopen: function () { var self = this, input = this._input; if (!input) { input = this._input = this.contentShell.find("input"); input.bind("keydown", function (e) { if (e.keyCode === 13 && self.focusButton) { self.focusButton.trigger("click"); return false } }) } input.val(defaultValue || "") }, onfocus: function () { var input = this._input[0]; setTimeout(function () { input.select(); input.focus() }, 32) }, onclose: function () { this._input = null }, onyes: function () { var input = this._input[0]; return typeof onyes === "function" ? onyes.call(this, input.value, input) : void 0 }, onno: true }) }, tips: function (content, timeout, follow, lock) { if (typeof follow === "boolean") { lock = follow; follow = null } return new Dialog({ id: "ds_dialog_tips", fixed: true, esc: false, lock: !!lock, follow: follow, followOffset: [0, "bottom"], drag: false, content: content, padding: "12px 50px", showCloseButton: false, timeout: timeout || 0 }) } })
})(this, this.document, jQuery);

// ******************************************************************common结束*******************************************************************

// ***************************parabola开始********************************************
var funParabola = function (element, target, options) { var defaults = { speed: 166.67, curvature: 0.001, progress: function () { }, complete: function () { } }; var params = {}; options = options || {}; for (var key in defaults) { params[key] = options[key] || defaults[key] } var exports = { mark: function () { return this }, position: function () { return this }, move: function () { return this }, init: function () { return this } }; var moveStyle = "margin", testDiv = document.createElement("div"); if ("oninput" in testDiv) { ["", "ms", "webkit"].forEach(function (prefix) { var transform = prefix + (prefix ? "T" : "t") + "ransform"; if (transform in testDiv.style) { moveStyle = transform } }) } var a = params.curvature, b = 0, c = 0; var flagMove = true; if (element && target && element.nodeType == 1 && target.nodeType == 1) { var rectElement = {}, rectTarget = {}; var centerElement = {}, centerTarget = {}; var coordElement = {}, coordTarget = {}; exports.mark = function () { if (flagMove == false) { return this } if (typeof coordElement.x == "undefined") { this.position() } element.setAttribute("data-center", [coordElement.x, coordElement.y].join()); target.setAttribute("data-center", [coordTarget.x, coordTarget.y].join()); return this }; exports.position = function () { if (flagMove == false) { return this } var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft, scrollTop = document.documentElement.scrollTop || document.body.scrollTop; if (moveStyle == "margin") { element.style.marginLeft = element.style.marginTop = "0px" } else { element.style[moveStyle] = "translate(0, 0)" } rectElement = element.getBoundingClientRect(); rectTarget = target.getBoundingClientRect(); centerElement = { x: rectElement.left + (rectElement.right - rectElement.left) / 2 + scrollLeft, y: rectElement.top + (rectElement.bottom - rectElement.top) / 2 + scrollTop }; centerTarget = { x: rectTarget.left + (rectTarget.right - rectTarget.left) / 2 + scrollLeft, y: rectTarget.top + (rectTarget.bottom - rectTarget.top) / 2 + scrollTop }; coordElement = { x: 0, y: 0 }; coordTarget = { x: -1 * (centerElement.x - centerTarget.x), y: -1 * (centerElement.y - centerTarget.y) }; b = (coordTarget.y - a * coordTarget.x * coordTarget.x) / coordTarget.x; return this }; exports.move = function () { if (flagMove == false) { return this } var startx = 0, rate = coordTarget.x > 0 ? 1 : -1; var step = function () { var tangent = 2 * a * startx + b; startx = startx + rate * Math.sqrt(params.speed / (tangent * tangent + 1)); if ((rate == 1 && startx > coordTarget.x) || (rate == -1 && startx < coordTarget.x)) { startx = coordTarget.x } var x = startx, y = a * x * x + b * x; element.setAttribute("data-center", [Math.round(x), Math.round(y)].join()); if (moveStyle == "margin") { element.style.marginLeft = x + "px"; element.style.marginTop = y + "px" } else { element.style[moveStyle] = "translate(" + [x + "px", y + "px"].join() + ")" } if (startx !== coordTarget.x) { params.progress(x, y); window.requestAnimationFrame(step) } else { params.complete(); flagMove = true } }; window.requestAnimationFrame(step); flagMove = false; return this }; exports.init = function () { this.position().mark().move() } } return exports };
/*! requestAnimationFrame.js
 * by zhangxinxu 2013-09-30
*/
(function () { var lastTime = 0; var vendors = ["webkit", "moz"]; for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) { window.requestAnimationFrame = window[vendors[x] + "RequestAnimationFrame"]; window.cancelAnimationFrame = window[vendors[x] + "CancelAnimationFrame"] || window[vendors[x] + "CancelRequestAnimationFrame"] } if (!window.requestAnimationFrame) { window.requestAnimationFrame = function (callback, element) { var currTime = new Date().getTime(); var timeToCall = Math.max(0, 16.7 - (currTime - lastTime)); var id = window.setTimeout(function () { callback(currTime + timeToCall) }, timeToCall); lastTime = currTime + timeToCall; return id } } if (!window.cancelAnimationFrame) { window.cancelAnimationFrame = function (id) { clearTimeout(id) } } }());
// *****************************parabola结束******************************************

$(document).ready(function () {
    var dockHtml = '<!--右侧贴边导航quick_links.js控制-->' +
                '<div class="mui-mbar-tabs" id="mui-mbar-tabs">' +
                  '<div class="quick_link_mian">' +
                    '<div class="quick_links_panel" id="quick_links_panel">' +
                      '<div id="quick_links" class="quick_links">' +
                    '<li >' +
                        '<a href="#" class="xiaobao_list"><i class="xiaobao"></i><div class="span"></div></a>' +
                    '</li>' +
                    '<li >' +
                        '<a href="#" class="app_list"><i class="app"></i><div class="span"></div></a>' +
                    '</li>' +
                    '<li >' +
                        '<a href="#" class="histery_list"><i class="histery"></i><div class="span"></div></a>' +
                    '</li>' +
                    '<li >' +
                        '<a href="#" class="lianxi_list"><i class="lianxi"></i><div class="span"></div></a>' +
                    '</li>' +
                    '<li >' +
                        '<a href="#" class="tell_list"><i class="tell"></i><div class="span"></div></a>' +
                    '</li>' +
                    '<li >' +
                        '<a href="#" class="mail_list"><i class="mail"></i><div class="span"></div></a>' +
                    '</li>' +
                    '<li >' +
                        '<a href="#" class="returnlest_list"><i class="returnlest"></i><div class="span"></div></a>' +
                    '</li>' +
                '</div>' +
                '<div class="quick_toggle">'+
				    '<li><a href="#top" class="return_top"><i class="top"></i></a>' +
			    '</div>'+
            '</div>' +
            '<div id="quick_links_pop" class="quick_links_pop quick_message_list hide"></div>' +
        '</div>' +
    '</div>';
    var body = $('body');
    if (body.find('#DK_flyItem').length == 0) {
       
        $('body').append('<link rel="stylesheet" href="/skin/xiaobao/css/quick_links.css" >');
        $('body').append(dockHtml);

    }
})

// 格式化函数
$.format = function (source, params) {
    if (arguments.length == 1)
        return function () {
            var args = $.makeArray(arguments);
            args.unshift(source);
            return $.format.apply(this, args);
        };
    if (arguments.length > 2 && params.constructor != Array) {
        params = $.makeArray(arguments).slice(1);
    }
    if (params.constructor != Array) {
        params = [params];
    }
    $.each(params, function (i, n) {
        source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
    });
    return source;
};

function getLoginInfo() {

}

// 异步请求地址
var url = AJPath+"?action=rightwin";

// 登录提示
var loginDiv = '<div class="sw-tbar-tipbox hide" id="S-cart-tips" style="display: block;"><img src="/template/content/shopcartnew/cart/images/logoimg.png" /><br />{0}</div>';

var tipCart = '<div class="ibar_plugin_content"><div class="bar-head"><span title="关闭面板" class="btn-close">&gt;&gt;</span>' +
    '<a style="color:white;" href="/tradecart/tradecartlist.aspx">我的采购车</a></div><div id="shopCartProducts" class="ibar-moudle-product"><div style="margin-top:50%; margin-left:30%;">{0}</div></div>' +
    '</div><div class="cart_handler"><div id="cart_handler_header" class="cart_handler_header"><span class="cart_handler_left">共' +
    '<span id="totalCountCart" class="cart_price">0</span>件商品</span><span class="cart_handler_right_total">总计：' +
    '<span id="totalPriceCart" class="cart_handler_right">￥0.00</span></span></div><a onclick="DK_goToSettlement();" href="javascript:void(0);" class="cart_go_btn">去结算</a></div>';

// 小宝招商
var xiaoCart   = '<div class="ibar_plugin_content"><img src="/skin/default/image/loading.gif"></div>';
var appCart    = '<div class="ibar_plugin_content"><img src="/skin/default/image/loading.gif"></div>';
var lianxiCart = '<div class="ibar_plugin_content"><img src="/skin/default/image/loading.gif"></div>';
var tellCart   = '<div class="ibar_plugin_content"><img src="/skin/default/image/loading.gif"></div>';
var mailCart   = '<div class="ibar_plugin_content"><img src="/skin/default/image/loading.gif"></div>';
// 小宝招商
// var appCart = '<div class="ibar_plugin_content">' +
//                '   <ul class="app_content">' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_05.png" alt="" /></a></li>' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_06.png" alt="" /></a></li>' +
//                 '   </ul>' +
//                 '</div>'
// 小宝招商
// var lianxiCart = '<div class="ibar_plugin_content">' +
//                '   <ul class="lianxi_content">' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_07.png" alt="" /></a></li>' +
//                 '   </ul>' +
//                 '</div>'
// 小宝招商
// var tellCart = '<div class="ibar_plugin_content">' +
//                '   <ul class="tell_content">' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_08.png" alt="" /></a></li>' +
//                 '   </ul>' +
//                 '</div>'
// 小宝招商
// var mailCart = '<div class="ibar_plugin_content">' +
//                '   <ul class="mail_content">' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_09.png" alt="" /></a></li>' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_10.png" alt="" /></a></li>' +
//                '       <li><a href=""><img src="/skin/xiaobao/images/pic_left_11.png" alt="" /></a></li>' +
//                '       <li><a href="" class="btn">立即注册</a></li>' +
//                 '   </ul>' +
//                 '</div>'
// 加入采购车






window.quickDataFns;
// 自定义
$(document).ready(function () {

    //创建DOM
    var
	quickHTML = document.querySelector("div.quick_link_mian"),
	quickShell = $(document.createElement('div')).html(quickHTML).addClass('quick_links_wrap'),
	quickLinks = quickShell.find('.quick_links');
    quickPanel = quickLinks.next();
    quickShell.appendTo('.mui-mbar-tabs');

    //具体数据操作 
    var
	quickPopXHR,
	loadingTmpl = '<div class="loading" style="padding:30px 80px"><i></i><span>Loading...</span></div>',
	// popTmpl = '<a href="javascript:;" class="ibar_closebtn" title="关闭"></a><div class="ibar_plugin_title"><h3><%=title%></h3></div><div class="pop_panel"><%=content%></div><div class="arrow"><i></i></div><div class="fix_bg"></div>',
    popTmpl = '<div class="pop_panel"><%=content%></div><div class="arrow"><i></i></div><div class="fix_bg"></div>',
	historyListTmpl = '<ul><%for(var i=0,len=items.length; i<5&&i<len; i++){%><li><a href="<%=items[i].productUrl%>" target="_blank" class="pic"><img alt="<%=items[i].productName%>" src="<%=items[i].productImage%>" width="60" height="60"/></a><a href="<%=items[i].productUrl%>" title="<%=items[i].productName%>" target="_blank" class="tit"><%=items[i].productName%></a><div class="price" title="单价"><em>&yen;<%=items[i].productPrice%></em></div></li><%}%></ul>',
	newMsgTmpl = '<ul><li><a href="#"><span class="tips">新回复<em class="num"><b><%=items.commentNewReply%></b></em></span>商品评价/晒单</a></li><li><a href="#"><span class="tips">新回复<em class="num"><b><%=items.consultNewReply%></b></em></span>商品咨询</a></li><li><a href="#"><span class="tips">新回复<em class="num"><b><%=items.messageNewReply%></b></em></span>我的留言</a></li><li><a href="#"><span class="tips">新通知<em class="num"><b><%=items.arrivalNewNotice%></b></em></span>到货通知</a></li><li><a href="#"><span class="tips">新通知<em class="num"><b><%=items.reduceNewNotice%></b></em></span>降价提醒</a></li></ul>',
	quickPop = quickShell.find('#quick_links_pop'),
    quickPanel = quickShell.find('#quick_links_panel'),
    muiMbarTabs = quickShell.find('div.quick_link_mian');
    quickDataFns = {
        //购物信息
        xiaobao_list: {
            title: '小宝招商',
            content: $.format(xiaoCart, "数据加载中，请稍候...", ""),
            init: xiaobaoinit
        },
        app_list: {
            title: '小宝招商',
            content: $.format(appCart, "数据加载中，请稍候...", ""),
            init: appinit
        },
        lianxi_list: {
            title: '小宝招商',
            content: $.format(lianxiCart, "数据加载中，请稍候...", ""),
            init: lianxiinit
        },
        tell_list: {
            title: '小宝招商',
            content: $.format(tellCart, "数据加载中，请稍候...", ""),
            init: tellinit
        },
        mail_list: {
            title: '小宝招商',
            content: $.format(mailCart, "数据加载中，请稍候...", ""),
            init: mailinit
        },
        mpbtn_histroy: {
            title: '我看过的商品',
            content: $.format(loginDiv, "数据加载中，请稍候...", ""),
            init: $.noop
        },
        mpbtn_wdsc: {
            title: '收藏的产品',
            content: $.format(loginDiv, "数据加载中，请稍候...", ""),
            init: $.noop
        }
    };



    // 右侧购物车面板
    var
	prevPopType,
	prevTrigger,
	doc = $(document),
	popDisplayed = false,
	hideQuickPop = function () {
	    if (prevTrigger) {
	        prevTrigger.removeClass('current');
	    }
	    popDisplayed = false;
	    prevPopType = '';

	    // 隐藏购物车面板
	    DK_showOrHideDock(false);
	},
    // 显示购物车面板
	showQuickPop = function (type) {
	    if (quickPopXHR && quickPopXHR.abort) {
	        quickPopXHR.abort();
	    }
	    if (type !== prevPopType) {
	        var fn = quickDataFns[type];
	        var html = ds.tmpl(popTmpl, fn);
	        quickPop.html(html);
	        fn.init.call(this, fn);
	    }
	    doc.unbind('click.quick_links').one('click.quick_links', hideQuickPop);

	    quickPop[0].className = 'quick_links_pop quick_' + type;
	    popDisplayed = true;
	    prevPopType = type;

	    // 显示购物车面板
	    DK_showOrHideDock(true);
	};
    quickShell.bind('click.quick_links', function (e) {
        e.stopPropagation();
    });
    quickPop.delegate('span.btn-close', 'click', function () {

        // 隐藏购物车面板
        DK_showOrHideDock(false);

        if (prevTrigger) {
            prevTrigger.removeClass('current');
        }
    });

    // 显示/隐藏购物车
    function DK_showOrHideDock(isShow) {
        if (isShow) {
            // 显示购物车面板
            //quickPop.animate({ left: 40, queue: true }).show();
            //quickPanel.animate({ right: 280, queue: true }).show();
            $(".quick_links_wrap").animate({ right: 0, queue: true }).show();
        }
        else {
            // 隐藏购物车面板
            //quickPop.animate({ left: 320, queue: true }).show();
            //quickPanel.animate({ right: 0, queue: true }).show();

            $(".quick_links_wrap").animate({ right: -238, queue: true }).show();
        }
    }

    //通用事件处理
    var
	view = $(window),
	quickLinkCollapsed = !!ds.getCookie('ql_collapse'),
	getHandlerType = function (className) {
	    return className.replace(/current/g, '').replace(/\s+/, '');
	},
	showPopFn = function () {
	    var type = getHandlerType(this.className);
	    if (popDisplayed && type === prevPopType) {
	        return hideQuickPop();
	    }
	    showQuickPop(this.className);
	    if (prevTrigger) {
	        prevTrigger.removeClass('current');
	    }
	    prevTrigger = $(this).addClass('current');
	},
	quickHandlers = {
	    //购物车，最近浏览，商品咨询
	    xiaobao_list: showPopFn,
	    app_list: showPopFn,
	    histery_list: showPopFn,
	    lianxi_list : showPopFn,
	    tell_list: showPopFn,
	    mail_list: showPopFn,
        returnlest_list: showPopFn,

	    //返回顶部
	    return_top: function () {
	        ds.scrollTo(0, 0);
	        hideReturnTop();
	    }
	};
    quickShell.delegate('a', 'click', function (e) {
        var type = getHandlerType(this.className);
        if (type && quickHandlers[type]) {
            quickHandlers[type].call(this);
            e.preventDefault();
        }
    });

    //Return top
    var scrollTimer, resizeTimer, minWidth = 1350;

    function resizeHandler() {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(checkScroll, 160);
    }

    function checkResize() {
        quickShell[view.width() > 1340 ? 'removeClass' : 'addClass']('quick_links_dockright');
    }
    function scrollHandler() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(checkResize, 160);
    }
    function checkScroll() {
        view.scrollTop() > 100 ? showReturnTop() : hideReturnTop();
    }
    function showReturnTop() {
        quickPanel.addClass('quick_links_allow_gotop');
    }
    function hideReturnTop() {
        quickPanel.removeClass('quick_links_allow_gotop');
    }
    view.bind('scroll.go_top', resizeHandler).bind('resize.quick_links', scrollHandler);
    quickLinkCollapsed && quickShell.addClass('quick_links_min');
    resizeHandler();
    scrollHandler();


    $(".quick_links_panel li").mouseenter(function () {
        $(this).children(".mp_tooltip").animate({ width: 92, queue: true });
        $(this).children(".mp_tooltip").css("visibility", "visible");
        $(this).children(".ibar_login_box").css("display", "block");
    });
    $(".quick_links_panel li").mouseleave(function () {
        $(this).children(".mp_tooltip").css("visibility", "hidden");
        $(this).children(".mp_tooltip").animate({ width: 35, queue: true });
        $(this).children(".ibar_login_box").css("display", "none");
    });
    //$(".quick_toggle li").mouseover(function(){
    //	$(this).children(".mp_qrcode").show();
    //});
    //$(".quick_toggle li").mouseleave(function(){
    //	$(this).children(".mp_qrcode").hide();
    //});

    // 小宝招商 init
    function xiaobaoinit() {
        $.post(url,"locname=xiaobao",function (data) {
        var dobj = JSON.parse(data);
        var html = ds.tmpl(popTmpl, dobj);
        quickPop.html(html);
        console.log("我运行了")
        })
    }
    // app init
    function appinit() {
        $.post(url,"locname=app",function (data) {
        var dobj = JSON.parse(data);
        var html = ds.tmpl(popTmpl, dobj);
        quickPop.html(html);
        console.log("我运行了")
        })
    }
    // 联系 init
    function lianxiinit() {
        $.post(url,"locname=lianxi",function (data) {
        var dobj = JSON.parse(data);
        var html = ds.tmpl(popTmpl, dobj);
        quickPop.html(html);
        console.log("我运行了")
        })
    }
    // 电话 init
    function tellinit() {
        $.post(url,"locname=tell",function (data) {
        var dobj = JSON.parse(data);
        var html = ds.tmpl(popTmpl, dobj);
        quickPop.html(html);
        console.log("我运行了")
        })
    }
    // 电话 init
    function mailinit() {
        $.post(url,"locname=mail",function (data) {
        var dobj = JSON.parse(data);
        var html = ds.tmpl(popTmpl, dobj);
        quickPop.html(html);
        console.log("我运行了")
        })
    }
});

// 加入购物车
function DK_AddCart(num, event) {
    /**********************点击加入购物车按钮的动画效果开始***********************/

    var sNum = $(".cart_num").text(); // 读取现有购物车产品数量

    // 元素以及其他一些变量
    var eleFlyElement = document.querySelector("#DK_flyItem"),
        eleShopCart = document.querySelector("#DK_shopCart");
    var numberItem = sNum == "" ? 0 : parseInt(sNum);
    // 抛物线运动
    var myParabola = funParabola(eleFlyElement, eleShopCart, {
        speed: 400, //抛物线速度
        curvature: 0.0008, //控制抛物线弧度
        complete: function () {
            eleFlyElement.style.visibility = "hidden";

            var tNum = numberItem + (num == undefined ? 1 : num); // 数量+1

            eleShopCart.querySelector("span").innerHTML = tNum;

            // 重新获取购物车
            DK_getShopCart();
        }
    });
    // 绑定点击加入购物车
    if (eleFlyElement && eleShopCart) {

        //[].slice.call(document.getElementsByClassName("btn-buy")).forEach(function (button) {
        //    button.addEventListener("click", function (event) {

        // 滚动大小
        var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft || 0,
            scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;
        eleFlyElement.style.left = event.clientX + scrollLeft + "px";
        eleFlyElement.style.top = event.clientY + scrollTop + "px";
        eleFlyElement.style.visibility = "visible";

        // 需要重定位
        myParabola.position().move();
        //    });
        //});
    }
    /**********************点击加入购物车按钮的动画效果结束***********************/
}

// 数量加1
function DK_addProNum(id, goodid) {
    var obj = $("#" + id);
    var type = /^\d{1,}$/;
    if (!type.test(obj.val())) {
        obj.val("1");
    }

    var n = parseInt(obj.val());
    obj.val(n + 1);

    var m = parseInt($("#" + id).val());

    if (n >= m) {
        obj.val(m);
    }
    // 更新购物车
    DK_UpdateShopCart(goodid, obj.val());
}
// 数量减1
function DK_decProNum(id, goodid) {
    var obj = $("#" + id);
    var type = /^\d{1,}$/;
    if (!type.test(obj.val())) {
        obj.val(obj.attr("val"));
    }

    var n = parseInt(obj.val());
    if (n == 1) {
        obj.value = 1;
    } else {
        obj.val(n - 1);
    }
    // 更新购物车
    DK_UpdateShopCart(goodid, obj.val());
}
// 判断是否为数字
function DK_isNumber(id, goodid) {
    var obj = $("#" + id);
    var type = /^\d{1,}$/;
    if (!type.test(obj.val())) {
        obj.val(obj.attr("val"));
    }

    var n = parseInt(obj.val());
    if (n == 0) {
        obj.val("1");
    }

    var m = parseInt($("#" + id).val());
    if (n > m) {
        obj.val(m);
    }
    // 更新购物车
    DK_UpdateShopCart(goodid, parseInt(obj.val()))
}

// 鼠标离开数量文本框时校验数量是否为数字
function setProNum(id, goodid) {
    var obj = $("#" + id);
    DK_isNumber(id, goodid);
}

function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' +
        num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num + '.' + cents);
}


// 图片鼠标滑过事件
$(document).ready(function () {

    var hoverDiv = '<p class="bot-cover cap" style="top: 248px;">' +
                      '<a class="btn-tb" href="javascript:void(0);" onclick="PushToTaobao({0},1);">传淘宝</a>' +
                      '<a class="btn-wx" href="javascript:void(0);" onclick="addWxf({0});">传微信</a>' +
                      '<a class="btn-pt" href="javascript:void(0);" onclick="ExportCSV(\'\',{0});">传平台</a>' +
                   '</p>';

    // 取所有li
    var lis = $('.p-list li');
    for (var i = 0; i < lis.length; i++) {
        var li = lis[i];
        var reg = new RegExp('details_(\\d+).html');
        var pid = 0; // 产品ID

        var href = $(li).find("a").attr("href");
        if (!reg.test(href)) {
            pid = 0;
        } else {
            var detail = href.match(reg);
            pid = detail[1];
        }

        //var liid = $(li).attr("id");
        //var pid = liid == undefined ? 0 : liid.replace("li_"); // TODO:此处要获取商品ID
        $(li).html($(li).html() + $.format(hoverDiv, pid));

        // $('body').append(hoverDiv); // 将hoverDiv添加到页面
    }

    $('.p-list li').hover(function () {
        $(".bot-cover", this).stop().animate({ top: '200px' }, { queue: false, duration: 160 });
    }, function () {
        $(".bot-cover", this).stop().animate({ top: '248px' }, { queue: false, duration: 160 });
    });
});

