/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/stripe.js":
/*!********************************!*\
  !*** ./resources/js/stripe.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /var/www/html/rakuet/resources/js/stripe.js: Unexpected token, expected \";\" (3:47)\n\n\u001b[0m \u001b[90m 1 | \u001b[39m\u001b[36mimport\u001b[39m \u001b[32m'chart.js'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 2 | \u001b[39m$(\u001b[36mfunction\u001b[39m(){\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 3 | \u001b[39m src\u001b[33m=\u001b[39m\u001b[32m\"https://checkout.stripe.com/checkout.js\"\u001b[39m \u001b[36mclass\u001b[39m\u001b[33m=\u001b[39m\u001b[32m\"stripe-button\"\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m   | \u001b[39m                                               \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 4 | \u001b[39m               data\u001b[33m-\u001b[39mkey\u001b[33m=\u001b[39m\u001b[32m\"{{ env('STRIPE_KEY') }}\"\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 5 | \u001b[39m               data\u001b[33m-\u001b[39mamount\u001b[33m=\u001b[39m\u001b[32m\"100\"\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 6 | \u001b[39m               data\u001b[33m-\u001b[39mname\u001b[33m=\u001b[39m\u001b[32m\"Stripe Demo\"\u001b[39m\u001b[0m\n    at Parser._raise (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:762:17)\n    at Parser.raiseWithData (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:755:17)\n    at Parser.raise (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:749:17)\n    at Parser.unexpected (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:8913:16)\n    at Parser.semicolon (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:8895:40)\n    at Parser.parseExpressionStatement (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11822:10)\n    at Parser.parseStatementContent (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11418:19)\n    at Parser.parseStatement (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11284:17)\n    at Parser.parseBlockOrModuleBlockBody (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11864:25)\n    at Parser.parseBlockBody (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11850:10)\n    at Parser.parseBlock (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11834:10)\n    at Parser.parseFunctionBody (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:10832:24)\n    at Parser.parseFunctionBodyAndFinish (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:10815:10)\n    at /var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:12004:12\n    at Parser.withTopicForbiddingContext (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11159:14)\n    at Parser.parseFunction (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:12003:10)\n    at Parser.parseFunctionExpression (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:10291:17)\n    at Parser.parseExprAtom (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:10170:21)\n    at Parser.parseExprSubscripts (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9759:23)\n    at Parser.parseMaybeUnary (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9739:21)\n    at Parser.parseExprOps (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9609:23)\n    at Parser.parseMaybeConditional (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9582:23)\n    at Parser.parseMaybeAssign (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9545:21)\n    at Parser.parseExprListItem (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:10920:18)\n    at Parser.parseCallExpressionArguments (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9956:22)\n    at Parser.parseSubscript (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9856:31)\n    at Parser.parseSubscripts (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9782:19)\n    at Parser.parseExprSubscripts (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9765:17)\n    at Parser.parseMaybeUnary (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9739:21)\n    at Parser.parseExprOps (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9609:23)\n    at Parser.parseMaybeConditional (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9582:23)\n    at Parser.parseMaybeAssign (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9545:21)\n    at Parser.parseExpression (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:9497:23)\n    at Parser.parseStatementContent (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11413:23)\n    at Parser.parseStatement (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11284:17)\n    at Parser.parseBlockOrModuleBlockBody (/var/www/html/rakuet/node_modules/@babel/parser/lib/index.js:11864:25)");

/***/ }),

/***/ 4:
/*!**************************************!*\
  !*** multi ./resources/js/stripe.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/rakuet/resources/js/stripe.js */"./resources/js/stripe.js");


/***/ })

/******/ });